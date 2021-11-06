<?php

namespace App\Providers;

use App\Actions\Confirm;
use App\Actions\DeleteAction as ActionsDeleteAction;
use App\Actions\EditAction as ActionsEditAction;
use App\Actions\Reject;
use App\Actions\ViewAction as ActionsViewAction;
use App\Actions\RemovePlaylist;
use App\Actions\Restore;
use App\Facades\TimeYoutube;
use App\FormFields\MonthFormField;
use App\FormFields\TextBadgeFormField;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Actions\DeleteAction;
use TCG\Voyager\Actions\EditAction;
use TCG\Voyager\Actions\RestoreAction;
use TCG\Voyager\Actions\ViewAction;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TimeYoutube',function(){
            return new TimeYoutube();
        });

        Voyager::addFormField(MonthFormField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        $post = new Post();
        $video = new Video();
        $mostFeatured = $post->mostFeatured();
        $latestPost = $post->latestPost();
        $latestVideos = $video->latestVideos();
        View::share([
            'categories'   => $categories,
            'mostFeatured' => $mostFeatured,
            'latestPost'   => $latestPost,
            'latestVideos' => $latestVideos,
        ]);
        Schema::defaultStringLength(191);
        Voyager::replaceAction(RestoreAction::class, Restore::class);
        Voyager::replaceAction(DeleteAction::class, ActionsDeleteAction::class);
        Voyager::replaceAction(EditAction::class, ActionsEditAction::class);
        Voyager::replaceAction(ViewAction::class, ActionsViewAction::class);
        Voyager::addAction(RemovePlaylist::class);
        Voyager::addAction(Confirm::class);
        Voyager::addAction(Reject::class);
    }
}
