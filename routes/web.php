<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['middleware' => ['operation-log']], function () {
    Route::get('/', 'Front\HomeController@index')->name('home');

    Route::get('/home', 'Front\HomeController@index')->name('home');

    Route::get('fetch-data', 'Front\HomeController@fetchData');

    Route::get('news', 'Front\PageController@news')->name('news');

    Route::get('profile', 'Front\PageController@profile')->name('profile')->middleware('auth')->middleware('verified');

    Route::post('vouchers/getVoucher', 'Site\VoucherController@getVoucher')->name('vouchers.getVoucher')->middleware('auth')->middleware('verified');

    Route::post('rooms/find', 'Site\RoomController@find')->name('rooms.find')->middleware('auth')->middleware('verified');

    Route::post('rooms/book', 'Site\RoomController@book')->name('rooms.book')->middleware('auth')->middleware('verified');

    Route::delete('rooms/cancel-book/{id}', 'Site\RoomController@cancelBook')->name('rooms.cancel-book')->middleware('auth')->middleware('verified');

    Route::resources([
        'dojos' => 'Site\DojoController',    
        'posts' => 'Site\PostController',
        'categories' => 'Site\CategoryController',
        'videos' => 'Site\VideoController',
        'users' => 'Site\UserController',
        'students' => 'Site\StudentController',
        'documents' => 'Site\DocumentController',
        'vouchers' => 'Site\VoucherController',
        'tuitions' => 'Site\TuitionController',
        'transfer-dojos' => 'Site\TransferDojoController',
        'events' => 'Site\EventController',
        'attends' => 'Site\AttendController',
        'rooms' => 'Site\RoomController',
    ]);

    // Workout Registration
    Route::get('workout-registrations', 'Site\WorkoutRegistrationController@create')->name('workout-registrations.create');
    Route::post('workout-registrations', 'Site\WorkoutRegistrationController@store')->name('workout-registrations.store');

    // Pay AIO Momo
    Route::post('tuitions/ipn-momo', 'Site\TuitionController@ipn')->name('tuitions.ipn');
    Route::get('paymomo/result', 'Site\TuitionController@result')->name('tuitions.result');
    
    // Like and Unlike Comment
    Route::post('comments/like/{comment}', 'Site\CommentController@like');
    Route::post('comments/unlike/{comment}', 'Site\CommentController@unLike');
    Route::post('/comments/get-liker/{comment}', 'Site\CommentController@getLiker');
    
    // Authentication...
    Auth::routes();
    Auth::routes(['verify' => true]);

    // Notification
    Route::post('/notification/read', 'Front\NotificationController@read');    
    Route::get('/notification/readAll', 'Front\NotificationController@readAll');    
});

Route::group(['prefix' => 'admin', 'middleware' => ['operation-log']], function () {
    Voyager::routes();
    foreach (Voyager::model('DataType')::all() as $dataType) {
        Route::get('alone-' . $dataType->slug, 'Admin\BaseController@relation')->name($dataType->slug . '.alone');
        Route::post('add-into-' . $dataType->slug, 'Admin\BaseController@addRelation')->name($dataType->slug . '.addRelation');

        // Route for Excel
        Route::post($dataType->slug . '/export', 'Admin\BaseController@export')->name('voyager.' . $dataType->slug . '.export');
    }

    Route::post('students/import', 'Admin\StudentController@import')->name('voyager.students.import');
    Route::post('test-scores/import', 'Admin\TestScoreController@import')->name('voyager.test-scores.import');

    // Route for video
    Route::get('sync', 'Admin\VideoController@syncData')->name('videos.sync');
    Route::get('videos/remove/{video}', 'Admin\VideoController@removePlaylist')->name('videos.remove');
    Route::post('videos/check', 'Admin\VideoController@check')->name('videos.check');

    // Route for tuition
    Route::post('tuitions/check', 'Admin\TuitionController@checkHistory')->name('tuitions.check');
    Route::post('tuitions/apply-voucher', 'Admin\TuitionController@applyVoucher')->name('tuitions.applyVouchers');
    Route::post('students/vouchers', 'Admin\StudentController@getVouchers')->name('students.vouchers');

    // Route for confirm or reject
    Route::post('transfer-dojos/confirm', 'Admin\TransferDojoController@confirm')->name('voyager.transfer-dojos.confirm');
    Route::post('transfer-dojos/reject', 'Admin\TransferDojoController@reject')->name('voyager.transfer-dojos.reject');

    Route::post('attends/confirm', 'Admin\AttendController@confirm')->name('voyager.attends.confirm');
    Route::post('attends/reject', 'Admin\AttendController@reject')->name('voyager.attends.reject');

    Route::post('book-rooms/confirm', 'Admin\BookRoomController@confirm')->name('voyager.book-rooms.confirm');
    Route::post('book-rooms/reject', 'Admin\BookRoomController@reject')->name('voyager.book-rooms.reject');

    Route::post('workout-registrations/confirm', 'Admin\WorkoutRegistrationController@confirm')->name('voyager.workout-registrations.confirm');
    Route::post('workout-registrations/reject', 'Admin\WorkoutRegistrationController@reject')->name('voyager.workout-registrations.reject');

    // Add field
    Route::post('uptimes/clone-fields', 'Admin\UptimeController@getCloneFields')->name('uptimes.clone-fields');
    Route::post('posts/clone-fields', 'Admin\PostController@getCloneFields')->name('posts.clone-fields');
    Route::post('videos/clone-fields', 'Admin\VideoController@getCloneFields')->name('videos.clone-fields');
    Route::post('reports/content-fields', 'Admin\ReportController@getContentFields')->name('reports.content-fields');
    Route::post('reports/tuition-fields', 'Admin\ReportController@getTuitionFields')->name('reports.tuition-fields');

    // Route for logs
    Route::get('logs', 'Admin\LogController@index')->name('logs.index'); 

    // Route for reports
    Route::get('reports/competition', 'Admin\ReportController@getCompetition')->name('reports.competition');
    Route::get('reports/valedictorian', 'Admin\ReportController@getValedictorian')->name('reports.valedictorian');
    Route::get('reports/kuy-confirmation', 'Admin\ReportController@getKuy')->name('reports.kuy');
    Route::get('reports/referral', 'Admin\ReportController@getReferral')->name('reports.referral');
    Route::get('reports/workout-confirm', 'Admin\ReportController@getWorkoutConfirm')->name('reports.workout-confirm');
    Route::get('reports/exam-notification', 'Admin\ReportController@getExamNotification')->name('reports.exam-notification');
    Route::post('reports/info-student', 'Admin\ReportController@getInfoStudent')->name('reports.info-student');
});
