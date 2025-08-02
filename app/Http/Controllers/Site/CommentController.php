<?php

namespace App\Http\Controllers\Site;

use App\Models\Post;
use App\Notifications\Notify;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Notification;
use Spatie\Honeypot\ProtectAgainstSpam;
use Laravelista\Comments\Comment;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Role;

class CommentController extends Controller
{
    use ValidatesRequests, AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('web');

        if (config('comments.guest_commenting') == true) {
            $this->middleware('auth')->except('store');
            $this->middleware(ProtectAgainstSpam::class)->only('store');
        } else {
            $this->middleware('auth');
        }
    }

    /**
     * Creates a new comment for given model.
     */
    public function store(Request $request)
    {
        // If guest commenting is turned off, authorize this action.
        if (config('comments.guest_commenting') == false) {
            $this->authorize('create-comment', Comment::class);
        }

        // Define guest rules if user is not logged in.
        if (!auth()->check()) {
            $guest_rules = [
                'guest_name'  => 'required|string|max:255',
                'guest_email' => 'required|string|email|max:255',
            ];
        }

        // Merge guest rules, if any, with normal validation rules.
        $this->validate($request, array_merge($guest_rules ?? [], [
            'commentable_type' => 'required|string',
            'commentable_id'   => 'required|string|min:1',
            'message'          => 'required|string'
        ]));

        $model = $request->commentable_type::findOrFail($request->commentable_id);

        $commentClass = config('comments.model');
        $comment      = new $commentClass;

        if (!auth()->check()) {
            $comment->guest_name  = $request->guest_name;
            $comment->guest_email = $request->guest_email;
        } else {
            $comment->commenter()->associate(auth()->user());
        }

        $comment->commentable()->associate($model);
        $comment->comment  = $request->message;
        $comment->approved = !config('comments.approval_required');
        $comment->save();

        $commenter = User::find($comment->commenter_id);
        $slug      = $comment->commentable_type::find($comment->commentable_id)->slug;
        $data      = [
            "text" => '<b>' . $commenter->name . '</b> đã bình luận một bài viết của bạn.',
            "img"  => $commenter->avatar,
            "icon" => '/img/core-img/icon-cmt.png',
            "href" => route($model->getTable() . '.show', $slug),
            "time" => Carbon::now(),
        ];

        $role = Role::whereIn('name', ['admin', 'manager', 'editor', 'monitor'])->select('id')->get();
        $user = User::whereIn('role_id', $role)->get();
        Notification::send($user, new Notify($data, 'comment'));

        return View::make('vendor.comments._comment', [
            'comment'          => $comment,
            'grouped_comments' => ''
        ]);
    }

    /**
     * Updates the message of the comment.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('edit-comment', $comment);

        $this->validate($request, [
            'message' => 'required|string'
        ]);

        $comment->update([
            'comment' => $request->message
        ]);

        return $request->message;
    }

    /**
     * Deletes a comment.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete-comment', $comment);

        $comment->delete();

        return redirect()->back();
    }

    /**
     * Creates a reply "comment" to a comment.
     */
    public function reply(Request $request, Comment $comment)
    {
        $this->authorize('reply-to-comment', $comment);

        $this->validate($request, [
            'message' => 'required|string'
        ]);

        $commentClass = config('comments.model');
        $reply        = new $commentClass;
        $reply->commenter()->associate(auth()->user());
        $reply->commentable()->associate($comment->commentable);
        $reply->parent()->associate($comment);
        $reply->comment  = $request->message;
        $reply->approved = !config('comments.approval_required');
        $reply->save();

        $commenter = User::find($reply->commenter_id);
        $model     = $comment->commentable_type::find($comment->commentable_id);
        $slug      = $model->slug;
        $data      = [
            "text" => '<b>' . $commenter->name . '</b> đã trả lời bình luận của bạn về một bài viết.',
            "img"  => $commenter->avatar,
            "icon" => '/img/core-img/icon-cmt.png',
            "href" => route($model->getTable() . '.show', $slug),
            "time" => Carbon::now(),
        ];

        $parent = Comment::find($reply->child_id)->commenter_id;
        $user   = User::find($parent);
        Notification::send($user, new Notify($data, 'reply'));

        return View::make('vendor.comments._comment', [
            'comment'          => $reply,
            'reply'            => true,
            'grouped_comments' => ''
        ]);
    }

    /**
     * Creates a like to a comment.
     */
    public function like(Request $request, Comment $comment)
    {
        $this->authorize('like-comment', $comment);
        $list = [];

        if ($comment->likes != '') {
            $list = json_decode($comment->likes);
        }
        array_push($list, auth()->user()->id);
        $comment->likes = json_encode($list);
        $comment->save();

        $commenter = User::find(auth()->user()->id);
        $model     = $comment->commentable_type::find($comment->commentable_id);
        $slug      = $model->slug;
        $data      = [
            "text" => '<b>' . $commenter->name . '</b> đã thích một bình luận của bạn.',
            "img"  => $commenter->avatar,
            "icon" => '/img/core-img/icon-like.png',
            "href" => route($model->getTable() . '.show', $slug),
            "time" => Carbon::now(),
        ];

        $user = User::find($comment->commenter_id);
        Notification::send($user, new Notify($data, 'comment'));

    }

    /**
     * Creates a like to a comment.
     */
    public function unLike(Request $request, Comment $comment)
    {
        $this->authorize('unlike-comment', $comment);
        $list = json_decode($comment->likes);
        array_splice($list, array_search(auth()->user()->id, $list), 1);
        $comment->likes = json_encode($list);
        $comment->save();
    }

    /**
     * Get all user liked this comment
     */
    public function getLiker(Request $request, Comment $comment)
    {
        $list  = json_decode($comment->likes);
        $users = User::find($list);
        return view('vendor.comments.list_liker', compact('users'));
    }
}
