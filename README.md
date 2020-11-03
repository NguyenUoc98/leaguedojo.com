<p align="center"><img src="https://res.cloudinary.com/nguyenuoc/image/upload/v1588213502/page-logo_duc3cx.png" max-width="100%"></p>

# Karate League Dojo

Karate League Dojo là một hệ thống với các võ đường karate trên địa bàn Hà Nội, dưới sự quản lý và giảng dạy trực tiếp của HLV Trần Mạnh Dũng - kiện tướng Karate-do quốc gia.
Trang web là nơi tổng hợp các tin tức, hình ảnh, video thi đấu, đồng thời cung cấp các chức năng phục vụ cho việc tập luyện của võ sinh cũng như việc quản lý của HLV.

## Features

- Giới thiệu công ty
- Tin tức (Các bài viết, sự kiện, thông báo của võ đường, các tin tức trong và ngoài nước)
- VideoTube (Liên kết với trang youtube của hệ thống)
- Tài liệu về võ thuật (Các bộ luật thi đấu, sách võ thuật,…)
- Đăng ký tập luyện
- Book phòng tập
- Quản lý học phí
- Tính điểm rèn luyện, xếp hạng thi đua
- Trang cá nhân
- Quản lý dữ liệu
- Ghi Log

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Về Laravel

Laravel là một framework phát triển ứng dụng web thông dụng và khá phổ biến hiện nay, hỗ trợ lập trình viên bằng cách giảm bớt các tác vụ phổ biến được sử dụng nhiều trong các dự án web, ví dụ như:

- [Công cụ định tuyến đơn giản, nhanh chóng](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Nhiều back-end cho [session](https://laravel.com/docs/session) và [cache](https://laravel.com/docs/cache).
- [Cơ sở dữ liệu ORM](https://laravel.com/docs/eloquent) trực quan.
- Tạo cơ sở dữ liệu nhanh chóng và mạnh mẽ với [schema migrations](https://laravel.com/docs/migrations).
- [Xử lý công việc mạnh mẽ](https://laravel.com/docs/queues).
- [Truyền sự kiện trong thời gian thực](https://laravel.com/docs/broadcasting).

Laravel có thể truy cập, mạnh mẽ và cung cấp các công cụ cần thiết cho các ứng dụng lớn, mạnh mẽ.

## Cài đặt

1. Clone project.
1. Chỉnh sửa file cấu hình:
    - Đổi tên file `.env.example` thành `.env`.
    - Thêm giá trị sau vào cuối file: `YOUTUBE_API_KEY = AIzaSyDRmM1M2OISorppX37xV5BmixCmsi2vluY`.
1. Tải các thư viện:
    - `composer install`
    - `npm install`
1. Cài đặt cơ sở dữ liệu:
    - Nhập cơ sở dữ liệu bằng file `leaguedojo.vn\league_dojo.sql` trong project.
1. Tạo khóa cho project `php artisan key:generate`.
1. Khởi chạy project:
    - `php artisan serve`
    - Truy cập `localhost:8000/admin` và đăng nhập bằng tài khoản username: `admin@admin`, password: `password`.
    - Nhấn chọn “Fix it” để tạo liên kết thư mục lưu trữ public của project:
    <p align="center"><img src="https://res.cloudinary.com/nguyenuoc/image/upload/v1588216835/fix_it_wryysq.png" max-width="70%"></p>
1. Setup tài nguyên cho project:
    - Giải nén file `leaguedojo.vn\vi.zip` trong thư mục của project đã clone, dời thư mục vừa giải nén vào đường dẫn `leaguedojo.vn\vendor\tcg\voyager\publishable\lang`.
    - Giải nén file `leaguedojo.vn\storage_p.zip` trong thư mục của project đã clone, coppy tất cả thư mục trong thư mục vừa giải nén được vào đường dẫn `leaguedojo.vn\public\storage`.
1. Load lại trang web!

## Các thư viện chính được sử dụng

1. **VOYAGER – THE MISSING LARAVEL ADMIN** [(the-control-group/voyager)](https://github.com/the-control-group/voyager):
    - Giao diện quản trị cho ứng dụng Laravel
    - Một cách dễ dàng để thêm / chỉnh sửa / xóa dữ liệu cho ứng dụng của bạn
    - Trình tạo menu (xây dựng menu trong Voyager cho ứng dụng)
    - Trình quản lý tệp
    - Trình tạo CRUD / BREAD
    - Voyager chỉ đơn giản là một quản trị viên cho ứng dụng Laravel. Bằng cách sử dụng Voyager, việc thêm dữ liệu, chỉnh sửa người dùng, tạo menu và nhiều tác vụ quản trị khác sẽ dễ dàng và thuận tiện hơn rất nhiều.
1. **YouTube Provider for Faker** [(aalaap/faker-youtube)](https://github.com/aalaap/faker-youtube):
    - Gói này sẽ cho phép Faker tạo các URL YouTube giả, nhưng hợp lệ về mặt kỹ thuật ở các định dạng khác nhau cũng như HTML nhúng.
    - Thuật toán của YouTube đảm bảo rằng khả năng va chạm là rất thấp, do đó, khả năng URI ngẫu nhiên được tạo ra bởi gói này là một video thực sự cũng rất thấp, nhưng không phải là không thể.

1. **Youtube** [(alaouy/Youtube)](https://github.com/alaouy/Youtube):
    - Một Laravel Facade/Wrapper để lấy dữ liệu từ Youtube thông qua Youtube API v3 ( Non-OAuth )
1. **Eloquent Viewable** [(cyrildewit/eloquent-viewable)](https://github.com/cyrildewit/eloquent-viewable):
    - Công cụ quản lý lượt xem trang của các đối tượng Eloquent với các chức năng như:
        - Lấy tổng lượt xem.
        - Lấy số lượt xem trong 1 khoảng thời gian cụ thể.
        - Lấy số lượt xem theo từng đối tượng.
        - Đặt thời gian dãn cách cho từng lượt xem...
1. **Comments** [(laravelista/comments)](https://github.com/laravelista/comments) :
    - Cung cấp chức năng bình luận cơ bản.
    - Được sử dụng để comment về bất kỳ mô hình nào có trong project.
    - Tất cả các bình luận được lưu trữ trong một bảng duy nhất có mối quan hệ đa hình cho nội dung và quan hệ đa hình cho người dùng đã đăng bình luận.
1. **Laravel Excel** [(maatwebsite/excel)](https://github.com/Maatwebsite/Laravel-Excel):
    - Giúp thao tác với file Excel (Nhập/Xuất)

## Cấu trúc project

Các thư mục quan trọng của project bao gồm:

- `app`: Thư mục app, chứa tất cả các project được tạo, hầu hết các class trong project được tạo đều ở trong đây. Không giống các framework khác, các file model không được chứa trong một thư mục riêng biệt, mà được chứa ngay tại thư mục app này.
    - `app\Actions`: Chứa các file định nghĩa actions trong quản lý dữ liệu trang Admin như create, edit, view, delete, confirm, reject... của Voyager
    - `app\Console`: Chứa các file định nghĩa các câu lệnh trên artisan.
    - `app\Exceptions`: Chứa các file quản lý, điều hướng lỗi.
    - `app\Exports`: Chứa các file định nghĩa các lớp xuất dữ liệu ra file excel.
    - `app\Facades`: Chứa các facades của người dùng tự định nghĩa.
    - `app\FormFields`: Chứa các thẻ input html người dùng tự định nghĩa cho trang admin voyager.
    - `app\Http\Controller`: Chứa các controller của project, phần 'C' trong mô hình MVC.
        - `app\Http\Controller\Admin`: Chứa các controller của trang Admin, trong đó thư mục Voyager là các controller cơ bản của Voyager.
        - `app\Http\Controller\Auth`: Chứa các controller của lớp Auth - liên quan đến quản lý tài khoản truy cập của người dùng như đăng nhập, đăng xuất, quên mật khẩu...
        - `app\Http\Controller\Front`: Chứa các controller của trang chủ và các trang tổng hợp, thông báo.
        - `app\Http\Controller\Site`: Chứa các controller về phía người dùng.
    - `app\Http\Middleware`: Chứa các file lọc và ngăn chặn các requests.
    - `app\Http\Requests`: Chứa các file request người dùng tự định nghĩa, phục vụ cho việc validate dữ liệu từ view người dùng gửi lên server
    - `app\Imports`: Chứa các file định nghĩa các lớp nhập dữ liệu từ file excel vào database.
    - `app\Models`: Chứa các model của ứng dụng, riêng model User được để bên ngoài thư mục này, phần 'M' trong mô hình MVC.
    - `app\Notifications`: Chứa các lớp Notification của ứng dụng tạo thông báo tới người dùng (database, broadcast, email,...)
    - `app\Traits` : Khai báo các trait ngừi dùng tự định nghĩa.
    - `app\Widgets`: Khai báo các widget của Voyager trong trang drashboard.
- `config`: Chứa các file cài đặt cấu hình của ứng dụng.
- `database`: Chứa 3 thư mục migration (tạo và thao tác database), factories và seeds (tạo dữ liệu mẫu), tiện lợi để lưu trữ dữ liệu sau này.
- `public`: Chứa tất cả dữ liệu công khai như file index.php, css, js, ảnh, fonts và các dữ liệu khác...
- `resources`: Chứa những file view và raw, các file biên soạn như LESS, SASS, hoặc JavaScript phục vụ cho VueJs của ứng dụng. Ngoài ra còn chứa tất cả các file lang trong project.
    - `resources\views`: Chứa các file view xuất giao diện người dùng, phần 'V' trong mô hình MVC. Thư mục này được chia nhỏ thành các thư mục tương ứng với từng models của ứng dụng. Ngoài ra các thư mục khác:
        - `resources\views\layouts`: Chứa các file views cơ bản mà các file khác extends nó.
        - `resources\views\menus`: Chứa các blades views của riêng phần menu.
        - `resources\views\pages`: Chứa view của các trang tổng hợp: trang chủ, tin tức, trang cá nhân.
        - `resources\views\vendor`: Chứa các file view của các thư viện, trong đó thư mục mail và noitfications phục vụ cho việc thông báo bằng email.
- `routes`: Chứa tất cả các điều khiển route (đường dẫn) trong project. Chứa các file route sẵn có: web.php, channels.php, api.php, và console.php.
- `vendor`: Chứa các thư viện của Composer
- `.env`: File cấu hình của Laravel

