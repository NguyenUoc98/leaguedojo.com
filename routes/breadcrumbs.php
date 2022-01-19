<?php
/**
 * Created by PhpStorm.
 * Filename: breadcrumbs.php
 * User: Nguyễn Văn Ước
 * Date: 14/11/2021
 * Time: 17:09
 */

// Trang chủ
Breadcrumbs::for('trang-chu', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});

// Trang chủ > Tin tức
Breadcrumbs::for('tin-tuc', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Tin tức', route('news'));
});

Breadcrumbs::for('the-loai', function ($trail, $category) {
    $trail->parent('tin-tuc');
    $trail->push($category->name, route('categories.show', $category->slug));
});

Breadcrumbs::for('bai-viet', function ($trail, $post) {
    $trail->parent('the-loai', $post->category);
    $trail->push($post->title, route('posts.show', $post->slug));
});

// Trang chủ > Cơ sở tập luyện
Breadcrumbs::for('co-so-tap-luyen', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Các cơ sở tập luyện', route('dojos.index'));
});

Breadcrumbs::for('co-so', function ($trail, $dojo) {
    $trail->parent('co-so-tap-luyen');
    $trail->push($dojo->name, route('dojos.show', $dojo));
});

// Trang chủ > Tài liệu
Breadcrumbs::for('tai-lieu', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Tài liệu', route('documents.index'));
});

Breadcrumbs::for('chi-tiet-tai-lieu', function ($trail, $document) {
    $trail->parent('tai-lieu');
    $trail->push($document->title, route('documents.show', $document->slug));
});

// Trang chủ > Đăng ký tập luyện
Breadcrumbs::for('dang-ky-tap-luyen', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Đăng ký tập luyện', route('workout-registrations.create'));
});

// Trang chủ > Video
Breadcrumbs::for('videos', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Video', route('videos.index'));
});

Breadcrumbs::for('video', function ($trail, $video) {
    $trail->parent('videos');
    $trail->push($video->title, route('videos.show', $video->slug));
});

// Trang chủ > Mã giảm giá
Breadcrumbs::for('ma-giam-gia', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Mã giảm giá', route('vouchers.index'));
});

// Trang chủ > Học phí
Breadcrumbs::for('hoc-phi', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Học phí', route('tuitions.index'));
});

// Trang chủ > Học phí
Breadcrumbs::for('su-kien', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Sự kiện', route('events.index'));
});

Breadcrumbs::for('dang-ky-su-kien', function ($trail) {
    $trail->parent('su-kien');
    $trail->push('Đăng ký xác nhận sự kiện', route('attends.create'));
});
