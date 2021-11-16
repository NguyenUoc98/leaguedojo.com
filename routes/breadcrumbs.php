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

// Trang chủ > Cơ sở tập luyện
Breadcrumbs::for('co-so-tap-luyen', function ($trail) {
    $trail->parent('trang-chu');
    $trail->push('Các cơ sở tập luyện', route('dojos.index'));
});

Breadcrumbs::for('co-so', function ($trail, $dojo) {
    $trail->parent('co-so-tap-luyen');
    $trail->push($dojo->name, route('dojos.show', $dojo));
});
