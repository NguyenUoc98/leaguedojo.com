-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 01, 2020 lúc 09:05 PM
-- Phiên bản máy phục vụ: 5.7.20-log
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `leaguedojo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `medal` enum('GOLD','SILVER','BRONZE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BRONZE',
  `tournaments` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `achievements`
--

INSERT INTO `achievements` (`id`, `student_id`, `medal`, `tournaments`, `content`, `date`, `created_at`, `updated_at`, `image`) VALUES
(1, 20200001, 'BRONZE', 'Vô địch Karate Arido mở rộng năm 2017 - lần thứ I', 'Kata cá nhân nam trên 18 tuổi', '2017-01-12', '2020-04-13 09:16:36', '2020-06-30 07:29:26', 'achievements\\June2020\\1Mtt7HOSdQ4oPhIUYTPv.jpg'),
(2, 20200001, 'SILVER', 'Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'Kata đồng đội hỗn hợp trên 16 tuổi', '2019-04-07', '2020-04-13 09:17:25', '2020-06-30 07:32:50', 'achievements\\June2020\\jkAqWGElLdywFhjyj2LQ.jpg'),
(3, 20200003, 'SILVER', 'Giải vô địch Suzucho Karate-do mở rộng lần thứ V năm 2018', 'Kata cá nhân nữ trên 18 tuổi', '2018-11-11', '2020-04-13 09:17:49', '2020-04-13 09:17:49', NULL),
(4, 20200003, 'SILVER', 'Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'Kata đồng đội hỗn hợp trên 16 tuổi', '2019-04-07', '2020-04-13 09:18:10', '2020-04-13 09:18:10', NULL),
(8, 20200005, 'BRONZE', 'Giải vô địch Karate-do Đại học Luật mở rộng lần thứ V', 'Kumite đồng đội nam trên 18 tuổi', '2018-11-11', '2020-06-17 10:08:12', '2020-06-17 10:08:12', NULL),
(9, 20200005, 'BRONZE', 'Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'Kumite cá nhân nam trên 18 tuổi (hạng cân trên 70kg)', '2019-04-07', '2020-06-17 10:09:40', '2020-06-17 10:09:40', NULL),
(10, 20200005, 'SILVER', 'Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'Kumite đồng đội nam trên 18 tuổi', '2019-04-07', '2020-06-17 10:10:21', '2020-06-17 10:10:21', NULL),
(11, 20200005, 'BRONZE', 'Vô địch Karate Yama Sport mở rộng lần thứ 2', 'Kumite cá nhân nam trên 18 tuổi (hạng cân trên 75kg)', '2019-08-11', '2020-06-17 10:11:38', '2020-06-17 10:11:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attends`
--

CREATE TABLE `attends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `confirmed` enum('WAIT','CONFIRMED','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WAIT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason_reject` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attends`
--

INSERT INTO `attends` (`id`, `student_id`, `event_id`, `image`, `note`, `confirmed`, `created_at`, `updated_at`, `reason_reject`) VALUES
(2, 20200020, 4, '[\"attends\\\\June2020\\\\15934288760.png\",\"attends\\\\June2020\\\\15934288771.png\"]', 'tesst', 'WAIT', '2020-06-29 11:07:58', '2020-06-30 09:25:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonus_defaults`
--

CREATE TABLE `bonus_defaults` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_count` int(11) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kuy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `dojo_id` bigint(20) UNSIGNED NOT NULL,
  `first` tinyint(1) NOT NULL DEFAULT '0',
  `percent` int(11) NOT NULL,
  `max_price` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bonus_defaults`
--

INSERT INTO `bonus_defaults` (`id`, `month_count`, `role_id`, `kuy`, `level`, `dojo_id`, `first`, `percent`, `max_price`, `note`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 1, 2, 0, 10, 200000, 'Nộp ít nhất 3 tháng học phí liên tiếp được giảm 10% tổng học phí nộp, tối đa 200.000VNĐ', NULL, '2020-04-08 03:41:03'),
(2, 3, 2, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 1, 1, 0, 10, 150000, 'Nộp ít nhất 3 tháng học phí liên tiếp được giảm 10% tổng học phí nộp, tối đa 150.000VNĐ', NULL, '2020-04-08 03:40:45'),
(3, 3, 2, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 0, 2, 1, 15, 200000, 'Nộp ít nhất 3 tháng học phí liên tiếp trong lần đầu đăng ký được giảm 15% tổng học phí nộp, tối đa 200.000VNĐ\r\nTặng 1 bộ võ phục trị giá 250.000VNĐ', NULL, '2020-04-02 21:21:55'),
(4, 3, 2, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\"]', 0, 1, 1, 10, 250000, 'Nộp ít nhất 3 tháng học phí liên tiếp trong lần đầu đăng ký được giảm 10% tổng học phí nộp, tối đa 250.000VNĐ\r\nTặng 1 bộ võ phục trị giá 250.000VNĐ', NULL, '2020-04-02 21:30:26'),
(5, 1, 2, '[\"11\",\"12\",\"13\",\"14\",\"15\"]', 2, 1, 0, 5, 100000, 'Đạt trình độ huyền đai, có hỗ trợ giảng dạy, giảm 5% tổng số tiền nộp học phí, tối đa 100.000VNĐ', NULL, '2020-04-02 21:32:20'),
(6, 1, 2, '[\"11\",\"12\",\"13\",\"14\",\"15\"]', 2, 2, 0, 5, 100000, 'Đạt trình độ huyền đai, có hỗ trợ giảng dạy, giảm 5% tổng số tiền nộp học phí, tối đa 100.000VNĐ', NULL, '2020-04-02 21:32:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_rooms`
--

CREATE TABLE `book_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` enum('WAIT','CONFIRMED','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WAIT',
  `reason_reject` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_rooms`
--

INSERT INTO `book_rooms` (`id`, `room_id`, `student_id`, `date`, `start_at`, `end_at`, `note`, `confirmed`, `reason_reject`, `created_at`, `updated_at`) VALUES
(1, 3, 20200001, '2020-06-01', '18:00:00', '20:00:00', 'test', 'CONFIRMED', NULL, NULL, '2020-06-01 21:02:54'),
(2, 1, 20200001, '2020-06-18', '19:30:00', '20:00:00', 'asmhdbjahbs,djba,sjdba.skdjba,sjdb', 'CONFIRMED', NULL, '2020-06-15 14:05:05', '2020-06-15 14:05:40'),
(3, 2, 20200020, '2020-06-30', '13:00:00', '14:30:00', 'Mượn phòng để tập thêm', 'CONFIRMED', NULL, '2020-06-29 09:45:02', '2020-06-29 09:50:56'),
(4, 2, 20200020, '2020-07-07', '13:00:00', '14:30:00', 'test cập nhật thời gian hoạt động', 'REJECTED', 'Thời gian hoạt động của phòng thay đổi: từ 13:00 đến 14:00, từ 15:00 đến 16:30, từ 17:00 đến 19:00, ', '2020-06-29 09:55:33', '2020-06-29 09:56:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `image`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'categories\\January2020\\7Uoj1IaYJ2hami7pb8oC.jpg', 'Bài viết', 'bai-viet', '2020-01-01 05:08:24', '2020-01-01 05:11:11'),
(2, NULL, 2, 'categories\\January2020\\RanFRp3Zsu2h0wZwSfAy.jpg', 'Thông báo', 'thong-bao', '2020-01-01 05:09:09', '2020-01-01 05:11:11'),
(3, NULL, 3, 'categories\\January2020\\0jZBfqIPENPFyNlvjoGb.jpg', 'Thông tin tuyển sinh', 'thong-tin-tuyen-sinh', '2020-01-01 05:09:00', '2020-01-01 05:11:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `likes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `commenter_id`, `commenter_type`, `guest_name`, `guest_email`, `commentable_type`, `commentable_id`, `comment`, `approved`, `child_id`, `likes`, `created_at`, `updated_at`) VALUES
(13, '33', 'App\\User', NULL, NULL, 'App\\Models\\Video', '28', 'test1', 1, NULL, NULL, '2020-06-30 02:36:36', '2020-06-30 02:36:36'),
(14, '5', 'App\\User', NULL, NULL, 'App\\Models\\Video', '28', 'reply', 1, 13, '[33]', '2020-06-30 02:37:04', '2020-06-30 02:37:32'),
(15, '33', 'App\\User', NULL, NULL, 'App\\Models\\Post', '2', 'test2😩😩😩', 1, NULL, '[5]', '2020-06-30 02:38:12', '2020-06-30 02:39:55'),
(16, '5', 'App\\User', NULL, NULL, 'App\\Models\\Post', '2', 'test3', 1, 15, '[33]', '2020-06-30 02:38:33', '2020-06-30 02:39:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 4),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 5),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 6),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 7),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 2),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 0, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 12),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 13),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 10),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '{}', 11),
(31, 5, 'category_id', 'text', 'Category', 0, 0, 1, 1, 1, 0, '{}', 12),
(32, 5, 'title', 'text', 'Tiêu đề', 1, 1, 1, 1, 1, 1, '{}', 2),
(33, 5, 'excerpt', 'text_area', 'Tóm tắt', 0, 0, 1, 1, 1, 1, '{}', 13),
(34, 5, 'body', 'rich_text_box', 'Nội dung', 1, 0, 1, 1, 1, 1, '{}', 14),
(35, 5, 'image', 'multiple_images', 'Ảnh', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"400\",\"height\":\"300\"}}]}', 3),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 15),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 16),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 17),
(39, 5, 'status', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"Ph\\u00e1t h\\u00e0nh\",\"DRAFT\":\"Nh\\u00e1p\",\"PENDING\":\"\\u0110ang ch\\u1ec9nh s\\u1eeda\"}}', 5),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 18),
(41, 5, 'updated_at', 'timestamp', 'Cập nhật', 0, 1, 0, 0, 0, 0, '{\"format\":\"%Y\\/%m\\/%d l\\u00fac %H:%M\"}', 10),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 0, 1, 1, 1, 1, '{}', 19),
(43, 5, 'featured', 'checkbox', 'Đặc sắc', 1, 1, 1, 1, 1, 1, '{\"on\":\"C\\u00f3\",\"off\":\"Kh\\u00f4ng\",\"checked\":false}', 6),
(56, 7, 'id', 'text', 'MSVS', 1, 1, 0, 0, 0, 0, '{}', 1),
(57, 7, 'image', 'image', 'Ảnh thẻ', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"}]}', 2),
(60, 7, 'phone', 'text', 'Điện thoại', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"numeric\",\"messages\":{\"numeric\":\"\\u0110i\\u1ec7n tho\\u1ea1i ph\\u1ea3i l\\u00e0 d\\u1ea1ng s\\u1ed1.\"}}}', 6),
(61, 7, 'cmnd', 'text', 'CMND', 0, 0, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"numeric\",\"messages\":{\"numeric\":\"CMND ph\\u1ea3i l\\u00e0 d\\u1ea1ng s\\u1ed1.\"}}}', 12),
(62, 7, 'birthday', 'date', 'Ngày sinh', 1, 1, 1, 1, 1, 1, '{\"format\":\"%d-%m-%Y\"}', 5),
(63, 7, 'address', 'text', 'Địa chỉ', 1, 0, 1, 1, 1, 1, '{}', 13),
(64, 7, 'type', 'select_dropdown', 'Đối tượng', 1, 1, 1, 1, 1, 1, '{\"default\":\"2\",\"options\":{\"0\":\"Thi\\u1ebfu ni\\u00ean - Nhi \\u0111\\u1ed3ng\",\"1\":\"H\\u1ecdc sinh\",\"2\":\"Sinh vi\\u00ean\",\"3\":\"Ng\\u01b0\\u1eddi \\u0111i l\\u00e0m\",\"4\":\"\\u0110\\u1ed1i t\\u01b0\\u1ee3ng kh\\u00e1c\"}}', 7),
(65, 7, 'work_unit', 'text', 'Đơn vị công tác', 0, 0, 1, 1, 1, 1, '{}', 14),
(66, 7, 'kuy', 'select_dropdown', 'Kyu', 1, 1, 1, 1, 1, 1, '{\"default\":\"10\",\"options\":{\"1\":\"Kyu 1\",\"2\":\"Kyu 2\",\"3\":\"Kyu 3\",\"4\":\"Kyu 4\",\"5\":\"Kyu 5\",\"6\":\"Kyu 6\",\"7\":\"Kyu 7\",\"8\":\"Kyu 8\",\"9\":\"Kyu 9\",\"10\":\"Kyu 10\",\"11\":\"Nh\\u1ea5t \\u0111\\u1eb3ng\",\"12\":\"Nh\\u1ecb \\u0111\\u1eb3ng\",\"13\":\"Tam \\u0111\\u1eb3ng\",\"14\":\"T\\u1ee9 \\u0111\\u1eb3ng\",\"15\":\"Ng\\u0169 \\u0111\\u1eb3ng\"}}', 8),
(67, 7, 'weight', 'number', 'Cân nặng(kg)', 1, 0, 1, 1, 1, 1, '{\"min\":20,\"max\":120}', 15),
(68, 7, 'height', 'number', 'Chiều cao(cm)', 1, 0, 1, 1, 1, 1, '{\"min\":100,\"max\":200}', 16),
(69, 7, 'sex', 'select_dropdown', 'Giới tính', 1, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"options\":{\"0\":\"Nam\",\"1\":\"N\\u1eef\",\"2\":\"Kh\\u00e1c\"}}', 4),
(70, 7, 'link_fb', 'text', 'Link Facebook', 0, 0, 1, 1, 1, 1, '{}', 17),
(71, 7, 'admission_day', 'date', 'Ngày nhập học', 1, 0, 1, 1, 1, 1, '{\"format\":\"%d-%m-%Y\"}', 18),
(72, 7, 'diligence', 'number', 'Số buổi nghỉ', 1, 0, 1, 1, 1, 1, '{\"default\":0}', 19),
(80, 7, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 0, '{}', 27),
(81, 7, 'updated_at', 'timestamp', 'Cập nhật lúc', 0, 0, 1, 1, 0, 0, '{\"format\":\"%d\\/%m\\/%Y l\\u00fac %H:%M\"}', 28),
(83, 1, 'user_belongsto_student_relationship', 'relationship', 'Võ sinh', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsTo\",\"column\":\"student_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(84, 1, 'email_verified_at', 'timestamp', 'Xác thực lúc', 0, 1, 1, 1, 1, 1, '{}', 8),
(85, 1, 'student_id', 'text', 'MSVS', 0, 1, 1, 1, 1, 1, '{}', 15),
(89, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(90, 9, 'image', 'multiple_images', 'Ảnh', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"400\",\"height\":\"300\"}}]}', 2),
(91, 9, 'name', 'text', 'Tên', 1, 1, 1, 1, 1, 1, '{}', 3),
(92, 9, 'start_at', 'time', 'Bắt đầu', 1, 1, 1, 1, 1, 1, '{\"format\":\"%H:%M\"}', 5),
(93, 9, 'finish_at', 'time', 'Kết thúc', 1, 1, 1, 1, 1, 1, '{\"format\":\"%H:%M\"}', 6),
(95, 9, 'schedule', 'multiple_checkbox', 'Lịch tập', 1, 1, 1, 1, 1, 1, '{\"options\":{\"2\":\"Th\\u1ee9 Hai\",\"3\":\"Th\\u1ee9 Ba\",\"4\":\"Th\\u1ee9 T\\u01b0\",\"5\":\"Th\\u1ee9 N\\u0103m\",\"6\":\"Th\\u1ee9 S\\u00e1u\",\"7\":\"Th\\u1ee9 B\\u1ea3y\",\"8\":\"Ch\\u1ee7 nh\\u1eadt\"}}', 10),
(96, 9, 'address', 'text', 'Địa chỉ', 1, 1, 1, 1, 1, 1, '{}', 11),
(97, 9, 'coach', 'text', 'Huấn luyện viên', 1, 1, 1, 1, 1, 1, '{}', 12),
(98, 9, 'description', 'rich_text_box', 'Mô tả', 1, 0, 1, 1, 1, 1, '{}', 9),
(99, 9, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 14),
(100, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(101, 9, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 16),
(103, 5, 'post_belongsto_category_relationship', 'relationship', 'Thể loại', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(104, 5, 'post_belongsto_user_relationship', 'relationship', 'Người viết', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"author_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(105, 5, 'source', 'text', 'Nguồn', 1, 0, 1, 1, 1, 1, '{}', 7),
(106, 5, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 1, 1, 1, '{}', 20),
(107, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(108, 10, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(109, 10, 'image', 'image', 'Image', 1, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true}', 3),
(110, 10, 'link', 'text', 'Link', 0, 1, 1, 1, 1, 1, '{}', 4),
(111, 10, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 5),
(112, 10, 'updated_at', 'timestamp', 'Updated At', 0, 1, 0, 0, 0, 0, '{\"format\":\"%d\\/%m\\/%Y l\\u00fac %H:%M\"}', 6),
(124, 12, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(126, 12, 'seo_title', 'text', 'Seo Title', 1, 0, 1, 1, 1, 1, '{}', 5),
(127, 12, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 8),
(128, 12, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 9),
(129, 12, 'status', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"Ph\\u00e1t h\\u00e0nh\",\"DRAFT\":\"Nh\\u00e1p\",\"PENDING\":\"\\u0110ang ch\\u1ec9nh s\\u1eeda\"}}', 12),
(130, 12, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:videos,slug\",\"messages\":{\"unique\":\"Slug \\u0111\\u00e3 t\\u1ed3n t\\u1ea1i trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u.\"}},\"readonly\":true}', 10),
(131, 12, 'featured', 'checkbox', 'Đặc sắc', 1, 1, 1, 1, 1, 1, '{\"on\":\"C\\u00f3\",\"off\":\"Kh\\u00f4ng\",\"checked\":false}', 11),
(132, 12, 'created_at', 'timestamp', 'Đăng lúc', 0, 0, 1, 0, 0, 0, '{\"format\":\"%Y\\/%m\\/%d l\\u00fac %H:%M\"}', 14),
(133, 12, 'updated_at', 'timestamp', 'Cập nhật lúc', 0, 1, 0, 0, 0, 0, '{\"format\":\"%Y\\/%m\\/%d l\\u00fac %H:%M\"}', 15),
(134, 12, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 0, 0, 0, 0, '{}', 16),
(135, 1, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 1, 1, 1, '{}', 16),
(136, 9, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true}}', 4),
(138, 7, 'dojo_id', 'text', 'Cơ sở tập luyện', 1, 0, 1, 1, 1, 1, '{}', 9),
(139, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(140, 13, 'parent_id', 'select_dropdown', 'Parent', 0, 1, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 3),
(141, 13, 'order', 'number', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 4),
(142, 13, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\"}', 5),
(143, 13, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 6),
(144, 13, 'slug', 'text', 'Slug', 1, 0, 1, 0, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:categories,slug\"}}', 7),
(145, 13, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 8),
(146, 13, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(148, 7, 'name', 'text', 'Họ và tên', 1, 1, 1, 1, 1, 1, '{}', 3),
(149, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(150, 14, 'name', 'text', 'Tên', 1, 1, 1, 1, 1, 1, '{}', 2),
(151, 14, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:playlists,slug\"}}', 3),
(152, 14, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 7),
(153, 14, 'updated_at', 'timestamp', 'Cập nhật lúc', 0, 1, 0, 0, 0, 0, '{\"format\":\"%d\\/%m\\/%Y l\\u00fac %H:%M\"}', 6),
(154, 12, 'video_belongsto_playlist_relationship', 'relationship', 'Playlists', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Playlist\",\"table\":\"playlists\",\"type\":\"belongsTo\",\"column\":\"playlist_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(155, 12, 'playlist_id', 'text', 'playlists', 0, 0, 0, 0, 0, 0, '{}', 7),
(157, 12, 'title', 'text', 'Tiêu đề', 1, 1, 1, 1, 1, 1, '{\"readonly\":true}', 4),
(158, 12, 'thumbnail', 'text', 'Ảnh thu nhỏ', 1, 1, 1, 1, 1, 1, '{\"readonly\":true}', 3),
(159, 12, 'youtubeId', 'text', 'ID trên Youtube', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"unique:videos,youtubeId\",\"messages\":{\"unique\":\"Video \\u0111\\u00e3 c\\u00f3 trong c\\u01a1 s\\u1edf d\\u1eef li\\u1ec7u.\"}},\"readonly\":true}', 2),
(160, 12, 'duration', 'hidden', 'duration', 1, 0, 1, 1, 1, 1, '{}', 17),
(162, 12, 'view_count', 'hidden', 'view_count', 1, 0, 1, 1, 1, 1, '{}', 19),
(163, 12, 'like_count', 'hidden', 'like_count', 1, 0, 1, 1, 1, 1, '{}', 20),
(164, 12, 'dislike_count', 'hidden', 'dislike_count', 1, 0, 1, 1, 1, 1, '{}', 21),
(165, 12, 'comment_count', 'hidden', 'comment_count', 1, 0, 1, 1, 1, 1, '{}', 22),
(166, 12, 'description', 'hidden', 'description', 1, 0, 1, 1, 1, 1, '{}', 18),
(167, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(168, 15, 'title', 'text', 'Tiêu đề', 1, 1, 1, 1, 1, 1, '{}', 2),
(169, 15, 'description', 'text_area', 'Mô tả', 0, 0, 1, 1, 1, 1, '{\"display\":{\"rows\":10}}', 3),
(170, 15, 'file', 'media_picker', 'File (*chỉ được upload file PDF)', 1, 1, 1, 1, 1, 1, '{\"min\":1,\"max\":2,\"expanded\":true,\"show_folders\":true,\"show_toolbar\":true,\"allow_upload\":true,\"allow_move\":true,\"allow_delete\":true,\"allow_create_folder\":true,\"allow_rename\":true,\"allowed\":[\"pdf\"]}', 4),
(171, 15, 'source', 'text', 'Nguồn', 1, 1, 1, 1, 1, 1, '{}', 5),
(172, 15, 'meta_keywords', 'text', 'Từ khóa', 0, 1, 1, 1, 1, 1, '{}', 6),
(173, 15, 'created_at', 'timestamp', 'Đăng lúc', 0, 1, 1, 0, 0, 1, '{\"format\":\"%d\\/%m\\/%Y l\\u00fac %H:%M\"}', 7),
(174, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(175, 15, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:documents,slug\"},\"readonly\":true}', 9),
(177, 9, 'dojo_hasmany_student_relationship', 'relationship', 'Võ sinh', 0, 1, 1, 1, 0, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"hasMany\",\"column\":\"dojo_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(178, 14, 'playlist_hasmany_video_relationship_1', 'relationship', 'Video', 0, 1, 1, 1, 0, 1, '{\"model\":\"App\\\\Models\\\\Video\",\"table\":\"videos\",\"type\":\"hasMany\",\"column\":\"playlist_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(188, 7, 'status', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{\"default\":\"WAITING_CONFIRM\",\"options\":{\"WAITING_CONFIRM\":\"Ch\\u1edd x\\u00e1c nh\\u1eadn\",\"STUDYING\":\"\\u0110ang t\\u1eadp\",\"PAUSE\":\"T\\u1ea1m ngh\\u1ec9\",\"STOPPED\":\"Ngh\\u1ec9 t\\u1eadp\"}}', 11),
(189, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(190, 18, 'student_id', 'text', 'Student Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(191, 18, 'cashier', 'text', 'Người thu(*)', 1, 1, 1, 1, 1, 1, '{}', 4),
(192, 18, 'amount', 'number', 'Khách đưa (VNĐ)', 1, 1, 1, 1, 1, 1, '{}', 6),
(193, 18, 'note', 'text_area', 'Ghi chú', 0, 0, 1, 1, 1, 1, '{\"display\":{\"rows\":13}}', 13),
(195, 18, 'excess_cash', 'number', 'Tiền dư (VNĐ)', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"readonly\":true}', 9),
(196, 18, 'created_at', 'timestamp', 'Ngày nộp', 0, 1, 1, 1, 0, 1, '{\"format\":\"%d\\/%m\\/%Y l\\u00fac %H:%M\"}', 15),
(197, 18, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 16),
(198, 18, 'tuition_belongsto_student_relationship', 'relationship', 'Võ sinh', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsTo\",\"column\":\"student_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(199, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(200, 19, 'month_count', 'number', 'Số tháng tối thiểu', 0, 1, 1, 1, 1, 1, '{\"min\":1,\"max\":12}', 7),
(201, 19, 'role_id', 'text', 'Role Id', 0, 1, 1, 1, 1, 1, '{}', 9),
(202, 19, 'kuy', 'select_multiple', 'Kyu', 1, 1, 1, 1, 1, 1, '{\"default\":\"10\",\"options\":{\"1\":\"Kyu 1\",\"2\":\"Kyu 2\",\"3\":\"Kyu 3\",\"4\":\"Kyu 4\",\"5\":\"Kyu 5\",\"6\":\"Kyu 6\",\"7\":\"Kyu 7\",\"8\":\"Kyu 8\",\"9\":\"Kyu 9\",\"10\":\"Kyu 10\",\"11\":\"Nh\\u1ea5t \\u0111\\u1eb3ng\",\"12\":\"Nh\\u1ecb \\u0111\\u1eb3ng\",\"13\":\"Tam \\u0111\\u1eb3ng\",\"14\":\"T\\u1ee9 \\u0111\\u1eb3ng\",\"15\":\"Ng\\u0169 \\u0111\\u1eb3ng\"}}', 10),
(203, 19, 'level', 'number', 'Độ ưu tiên', 1, 1, 1, 1, 1, 1, '{\"min\":0}', 2),
(204, 19, 'dojo_id', 'text', 'Dojo Id', 1, 1, 1, 1, 1, 1, '{}', 11),
(205, 19, 'first', 'checkbox', 'Cho lần đầu nộp HP', 1, 1, 1, 1, 1, 1, '{\"on\":\"C\\u00f3\",\"off\":\"Kh\\u00f4ng\",\"checked\":false}', 8),
(206, 19, 'percent', 'number', 'Mức ưu đãi (%)(*)', 1, 1, 1, 1, 1, 1, '{\"max\":100,\"min\":0}', 3),
(207, 19, 'max_price', 'number', 'Số tiền tối đa (VNĐ)', 0, 1, 1, 1, 1, 1, '{\"min\":1000}', 4),
(208, 19, 'note', 'text_area', 'Ghi chú', 1, 1, 1, 1, 1, 1, '{\"display\":{\"rows\":15}}', 12),
(209, 19, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 13),
(210, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 14),
(211, 19, 'bonus_default_belongsto_role_relationship', 'relationship', 'Đối tượng áp dụng', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(212, 19, 'bonus_default_belongsto_dojo_relationship', 'relationship', 'Cơ sở áp dụng(*)', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(213, 20, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(214, 20, 'code', 'text', 'Code(*)', 1, 1, 1, 1, 1, 1, '{}', 3),
(215, 20, 'percent', 'number', 'Mức ưu đãi (%)(*)', 1, 1, 1, 1, 1, 1, '{\"min\":0,\"max\":100}', 4),
(216, 20, 'max_price', 'number', 'Số tiền tối đa (VNĐ)', 0, 1, 1, 1, 1, 1, '{\"min\":1000}', 5),
(217, 20, 'expiry_date', 'date', 'Ngày hết hạn(*)', 1, 1, 1, 1, 1, 1, '{\"format\":\"%d\\/%m\\/%Y\"}', 7),
(218, 20, 'note', 'text_area', 'Ghi chú', 1, 1, 1, 1, 1, 1, '{\"display\":{\"rows\":7}}', 12),
(219, 20, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 14),
(220, 20, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(222, 20, 'amount', 'number', 'Số lượng(*)', 1, 0, 1, 1, 1, 1, '{\"default\":1,\"min\":1}', 8),
(223, 20, 'used', 'number', 'Đã được thu thập(*)', 1, 0, 1, 1, 1, 1, '{\"default\":0}', 9),
(224, 20, 'voucher_belongsto_dojo_relationship', 'relationship', 'Cơ sở áp dụng(*)', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"dojo_voucher\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(225, 18, 'month_start', 'month', 'Tháng bắt đầu', 0, 1, 1, 1, 1, 1, '{\"format\":\"%m\\/%Y\"}', 7),
(226, 18, 'month_end', 'month', 'Tháng kết thúc', 0, 1, 1, 1, 1, 1, '{\"format\":\"%m\\/%Y\"}', 8),
(227, 18, 'refunds', 'number', 'Trả lại (VNĐ)', 1, 1, 1, 1, 1, 1, '{\"default\":0}', 10),
(229, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(230, 22, 'dojo_id', 'text', 'Dojo Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(231, 22, 'policy', 'checkbox', 'Bảo lưu theo tháng', 1, 1, 1, 1, 1, 1, '{\"on\":\"B\\u1ea3o l\\u01b0u\",\"off\":\"Kh\\u00f4ng b\\u1ea3o l\\u01b0u\",\"checked\":\"on\",\"description\":\"N\\u1ebfu b\\u1ea1n ch\\u1ecdn c\\u00f3, nh\\u1eefng th\\u00e1ng \\u0111\\u00e3 n\\u1ed9p h\\u1ecdc ph\\u00ed s\\u1ebd \\u0111\\u01b0\\u1ee3c b\\u1ea3o l\\u01b0u khi c\\u1eadp nh\\u1eadt h\\u1ecdc ph\\u00ed\"}', 5),
(232, 22, 'date_apply', 'month', 'Tháng bắt đầu', 1, 1, 1, 1, 1, 1, '{\"format\":\"%m\\/%Y\"}', 6),
(233, 22, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 8),
(234, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(235, 22, 'tuition_policy_belongsto_dojo_relationship', 'relationship', 'Cơ sở', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(236, 22, 'price', 'number', 'Học phí (VNĐ)', 1, 1, 1, 1, 1, 1, '{\"min\":1000}', 4),
(237, 20, 'type', 'select_dropdown', 'Loại(*)', 1, 1, 1, 1, 1, 1, '{\"default\":\"S\\u1ef0 KI\\u1ec6N\",\"options\":{\"S\\u1ef0 KI\\u1ec6N\":\"S\\u1ef0 KI\\u1ec6N\",\"THAM GIA\":\"THAM GIA\",\"TH\\u01af\\u1edeNG\":\"TH\\u01af\\u1eceNG\",\"KH\\u00c1C\":\"KH\\u00c1C\"}}', 10),
(238, 20, 'month_limit', 'number', 'Số tháng tối thiểu(*)', 1, 0, 1, 1, 1, 1, '{\"min\":0,\"default\":0}', 6),
(239, 18, 'month', 'number', 'Số tháng', 1, 0, 0, 1, 1, 1, '{}', 14),
(240, 18, 'total', 'number', 'Cần thanh toán (VNĐ)', 1, 1, 1, 1, 1, 1, '{\"readonly\":true}', 5),
(241, 20, 'image', 'image', 'Ảnh', 0, 1, 1, 1, 1, 1, '{\"quality\":\"70%\",\"upsize\":true,\"default\":\"vouchers\\/default.png\"}', 2),
(242, 23, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(243, 23, 'student_id', 'text', 'Student Id', 1, 0, 1, 1, 1, 1, '{}', 3),
(244, 23, 'current_dojo_id', 'text', 'Current Dojo Id', 1, 0, 1, 1, 1, 1, '{}', 5),
(245, 23, 'new_dojo_id', 'text', 'New Dojo Id', 1, 0, 1, 1, 1, 1, '{}', 7),
(246, 23, 'date_transfer', 'date', 'Ngày chuyển', 1, 1, 1, 1, 1, 1, '{\"format\":\"%m\\/%Y\"}', 8),
(247, 23, 'reason', 'text_area', 'Ghi chú', 1, 1, 1, 1, 1, 1, '{}', 9),
(248, 23, 'created_at', 'timestamp', 'Ngày tạo', 0, 0, 1, 1, 0, 1, '{\"format\":\"%d\\/%m\\/%Y l\\u00fac %H:%M\"}', 12),
(249, 23, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(250, 23, 'confirmed', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{\"default\":\"WAIT\",\"options\":{\"WAIT\":\"Ch\\u1edd x\\u00e1c nh\\u1eadn\",\"CONFIRMED\":\"\\u0110\\u00e3 x\\u00e1c nh\\u1eadn\",\"REJECTED\":\"\\u0110\\u00e3 t\\u1eeb ch\\u1ed1i\"}}', 10),
(254, 23, 'transfer_dojo_belongsto_student_relationship', 'relationship', 'Võ sinh', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsTo\",\"column\":\"student_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(255, 23, 'transfer_dojo_belongsto_dojo_relationship', 'relationship', 'Cơ sở hiện tại', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"current_dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(256, 23, 'transfer_dojo_belongsto_dojo_relationship_1', 'relationship', 'Chuyển đến', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"new_dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(257, 7, 'student_belongsto_dojo_relationship', 'relationship', 'Cơ sở tập luyện', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(258, 24, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(259, 24, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(260, 24, 'path', 'text', 'Path', 1, 1, 1, 1, 1, 1, '{}', 5),
(261, 24, 'method', 'text', 'Method', 1, 1, 1, 1, 1, 1, '{}', 4),
(262, 24, 'ip', 'text', 'Ip', 1, 1, 1, 1, 1, 1, '{}', 6),
(263, 24, 'input', 'text', 'Data', 1, 1, 1, 1, 1, 1, '{}', 7),
(264, 24, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 8),
(265, 24, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(266, 24, 'operation_log_belongsto_user_relationship', 'relationship', 'User', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"bonus_defaults\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(267, 26, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(268, 26, 'student_id', 'text', 'Student Id', 1, 0, 1, 1, 1, 1, '{}', 4),
(269, 26, 'medal', 'select_dropdown', 'Huy chương', 1, 1, 1, 1, 1, 1, '{\"default\":\"BRONZE\",\"options\":{\"GOLD\":\"V\\u00e0ng\",\"SILVER\":\"B\\u1ea1c\",\"BRONZE\":\"\\u0110\\u1ed3ng\"}}', 5),
(270, 26, 'tournaments', 'text', 'Giải đấu', 1, 1, 1, 1, 1, 1, '{}', 7),
(271, 26, 'created_at', 'timestamp', 'Created_at', 0, 0, 0, 0, 0, 0, '{}', 9),
(272, 26, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(273, 26, 'achievement_belongsto_student_relationship', 'relationship', 'Võ sinh', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsTo\",\"column\":\"student_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(274, 26, 'content', 'text', 'Nội dung thi đấu', 1, 1, 1, 1, 1, 1, '{}', 6),
(275, 26, 'date', 'date', 'Ngày thi đấu', 1, 1, 1, 1, 1, 1, '{\"format\":\"%Y\\/%m\\/%d\"}', 8),
(276, 27, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(277, 27, 'test_day', 'date', 'Ngày thi', 1, 1, 1, 1, 1, 1, '{\"format\":\"%d\\/%m\\/%Y\"}', 2),
(278, 27, 'student_id', 'text', 'MSVS', 1, 1, 1, 1, 1, 1, '{}', 3),
(279, 27, 'kihon', 'number', 'Kihon', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"min\":0,\"max\":10}', 4),
(280, 27, 'kata', 'number', 'Kata', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"min\":0,\"max\":10}', 5),
(281, 27, 'kumite', 'number', 'Kumite', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"min\":0,\"max\":10}', 6),
(282, 27, 'physical', 'number', 'Thể lực', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"min\":0,\"max\":10}', 7),
(283, 27, 'total', 'number', 'Tổng', 1, 1, 1, 1, 1, 1, '{\"default\":0,\"min\":0,\"max\":40}', 8),
(284, 27, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 10),
(285, 27, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(286, 28, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(287, 28, 'student_id', 'text', 'Student Id', 1, 1, 1, 0, 1, 0, '{}', 3),
(288, 28, 'event_id', 'text', 'Event Id', 1, 1, 1, 0, 1, 0, '{}', 5),
(289, 28, 'image', 'multiple_images', 'Ảnh minh chứng', 0, 1, 1, 1, 1, 0, '{}', 6),
(290, 28, 'note', 'text', 'Ghi chú', 0, 1, 1, 0, 1, 0, '{}', 8),
(291, 28, 'confirmed', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 0, '{\"default\":\"WAIT\",\"options\":{\"WAIT\":\"Ch\\u1edd x\\u00e1c nh\\u1eadn\",\"CONFIRMED\":\"\\u0110\\u00e3 x\\u00e1c nh\\u1eadn\",\"REJECTED\":\"\\u0110\\u00e3 t\\u1eeb ch\\u1ed1i\"}}', 7),
(292, 28, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, '{}', 9),
(293, 28, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(295, 29, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(296, 29, 'name', 'text', 'Tên', 1, 1, 1, 1, 1, 1, '{}', 3),
(297, 29, 'date', 'date', 'Ngày', 1, 1, 1, 1, 1, 1, '{\"format\":\"%d\\/%m\\/%Y\"}', 4),
(298, 29, 'start_at', 'time', 'Bắt đầu', 1, 1, 1, 1, 1, 1, '{\"format\":\"%H:%M\"}', 5),
(299, 29, 'end_at', 'time', 'Kết thúc', 1, 1, 1, 1, 1, 1, '{\"format\":\"%H:%M\"}', 6),
(300, 29, 'address', 'text', 'Địa điểm', 1, 1, 1, 1, 1, 1, '{}', 7),
(301, 29, 'point', 'number', 'Điểm', 1, 1, 1, 1, 1, 1, '{\"min\":0,\"max\":10}', 8),
(302, 29, 'note', 'text_area', 'Ghi chú', 0, 1, 1, 1, 1, 1, '{\"display\":{\"rows\":13}}', 9),
(303, 29, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 10),
(304, 29, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(306, 29, 'image', 'image', 'Ảnh', 0, 1, 1, 1, 1, 1, '{\"quality\":\"70%\",\"upsize\":true}', 2),
(307, 28, 'attend_belongsto_student_relationship', 'relationship', 'Võ sinh', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsTo\",\"column\":\"student_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(308, 28, 'attend_belongsto_event_relationship', 'relationship', 'Sự kiện', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\Models\\\\Event\",\"table\":\"events\",\"type\":\"belongsTo\",\"column\":\"event_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(309, 27, 'valedictorian', 'checkbox', 'Thủ khoa', 1, 1, 1, 1, 1, 1, '{\"on\":\"C\\u00f3\",\"off\":\"Kh\\u00f4ng\",\"checked\":false}', 9),
(310, 30, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(311, 30, 'name', 'text', 'Tên', 1, 1, 1, 1, 1, 1, '{}', 2),
(312, 30, 'address', 'text', 'Địa chỉ', 1, 1, 1, 1, 1, 1, '{}', 3),
(316, 30, 'dojo_id', 'text', 'Dojo Id', 1, 1, 1, 1, 1, 1, '{}', 8),
(317, 30, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 9),
(318, 30, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(319, 30, 'room_belongsto_dojo_relationship', 'relationship', 'Cơ sở', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(320, 31, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(321, 31, 'room_id', 'text', 'Room Id', 1, 0, 1, 1, 1, 1, '{}', 3),
(322, 31, 'student_id', 'text', 'Student Id', 1, 0, 1, 1, 1, 1, '{}', 5),
(323, 31, 'date', 'date', 'Ngày', 1, 1, 1, 1, 1, 1, '{\"format\":\"%d\\/%m\\/%Y\"}', 6),
(324, 31, 'start_at', 'time', 'Nhận phòng', 1, 1, 1, 1, 1, 1, '{\"format\":\"%H:%M\"}', 7),
(325, 31, 'end_at', 'time', 'Trả phòng', 1, 1, 1, 1, 1, 1, '{\"format\":\"%H:%M\"}', 8),
(326, 31, 'note', 'text_area', 'Note', 1, 1, 1, 1, 1, 1, '{}', 9),
(327, 31, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 12),
(328, 31, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(329, 31, 'book_room_belongsto_room_relationship', 'relationship', 'Phòng', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Room\",\"table\":\"rooms\",\"type\":\"belongsTo\",\"column\":\"room_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(330, 31, 'book_room_belongsto_student_relationship', 'relationship', 'Người đặt', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsTo\",\"column\":\"student_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(331, 30, 'note', 'text_area', 'Ghi chú', 0, 1, 1, 1, 1, 1, '{\"display\":{\"rows\":8}}', 5),
(332, 32, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 4),
(333, 32, 'room_id', 'text', 'Room Id', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\",\"messages\":{\"required\":\"Ch\\u01b0a ch\\u1ecdn ph\\u00f2ng.\"}}}', 2),
(334, 32, 'weekdays', 'select_dropdown', 'Ngày hoạt động', 1, 1, 1, 1, 1, 1, '{\"options\":{\"0\":\"Ch\\u1ee7 nh\\u1eadt\",\"1\":\"Th\\u1ee9 hai\",\"2\":\"Th\\u1ee9 ba\",\"3\":\"Th\\u1ee9 t\\u01b0\",\"4\":\"Th\\u1ee9 n\\u0103m\",\"5\":\"Th\\u1ee9 s\\u00e1u\",\"6\":\"Th\\u1ee9 b\\u1ea3y\"}}', 3),
(335, 32, 'uptimes', 'text', 'Thời gian hoạt động', 1, 1, 1, 1, 1, 1, '{}', 5),
(336, 32, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 6),
(337, 32, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(338, 32, 'uptime_belongsto_room_relationship', 'relationship', 'Phòng', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Room\",\"table\":\"rooms\",\"type\":\"belongsTo\",\"column\":\"room_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 1),
(339, 31, 'reason_reject', 'text_area', 'Lý do từ chối', 0, 1, 1, 1, 1, 1, '{}', 11),
(340, 31, 'confirmed', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{\"default\":\"WAIT\",\"options\":{\"WAIT\":\"Ch\\u1edd x\\u00e1c nh\\u1eadn\",\"CONFIRMED\":\"\\u0110\\u00e3 x\\u00e1c nh\\u1eadn\",\"REJECTED\":\"\\u0110\\u00e3 t\\u1eeb ch\\u1ed1i\"}}', 10),
(341, 5, 'keywords', 'text', 'Từ khóa', 1, 1, 1, 1, 1, 1, '{}', 9),
(342, 12, 'keywords', 'text', 'Từ khóa', 0, 1, 1, 1, 1, 1, '{}', 13),
(343, 18, 'type', 'checkbox', 'Hình thức', 1, 1, 1, 0, 0, 1, '{\"on\":\"Online\",\"off\":\"Offline\",\"checked\":false}', 11),
(344, 18, 'trans_id', 'text', 'Mã giao dịch', 0, 1, 1, 1, 1, 1, '{}', 12),
(345, 33, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(346, 33, 'dojo_id', 'text', 'Dojo Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(347, 33, 'name', 'text', 'Họ và tên', 1, 1, 1, 1, 1, 1, '{}', 4),
(348, 33, 'phone', 'text', 'Điện thoại', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"numeric\",\"messages\":{\"numeric\":\"\\u0110i\\u1ec7n tho\\u1ea1i ph\\u1ea3i l\\u00e0 d\\u1ea1ng s\\u1ed1.\"}}}', 5),
(349, 33, 'cmnd', 'text', 'Số CMND', 0, 0, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"numeric\",\"messages\":{\"numeric\":\"CMND ph\\u1ea3i l\\u00e0 d\\u1ea1ng s\\u1ed1.\"}}}', 6),
(350, 33, 'birthday', 'date', 'Ngày sinh', 1, 0, 1, 1, 1, 1, '{\"format\":\"%d\\/%m\\/%Y\"}', 7),
(351, 33, 'address', 'text', 'Địa chỉ hiện tại', 1, 0, 1, 1, 1, 1, '{}', 8),
(352, 33, 'work_unit', 'text', 'Nơi làm việc', 0, 0, 1, 1, 1, 1, '{}', 9),
(353, 33, 'type', 'select_dropdown', 'Đối tượng', 1, 1, 1, 1, 1, 1, '{\"default\":\"2\",\"options\":{\"0\":\"Thi\\u1ebfu ni\\u00ean - Nhi \\u0111\\u1ed3ng\",\"1\":\"H\\u1ecdc sinh\",\"2\":\"Sinh vi\\u00ean\",\"3\":\"Ng\\u01b0\\u1eddi \\u0111i l\\u00e0m\",\"4\":\"\\u0110\\u1ed1i t\\u01b0\\u1ee3ng kh\\u00e1c\"}}', 10),
(354, 33, 'weight', 'number', 'Cân nặng(kg)', 1, 0, 1, 1, 1, 1, '{\"min\":20,\"max\":120}', 11),
(355, 33, 'height', 'number', 'Chiều cao(cm)', 1, 0, 1, 1, 1, 1, '{\"min\":100,\"max\":200}', 12),
(356, 33, 'sex', 'select_dropdown', 'Giới tính', 1, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"options\":{\"0\":\"Nam\",\"1\":\"N\\u1eef\",\"2\":\"Kh\\u00e1c\"}}', 13),
(357, 33, 'link_fb', 'text', 'Link Facebook', 0, 1, 1, 1, 1, 1, '{}', 14),
(358, 33, 'confirmed', 'select_dropdown', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{\"default\":\"WAIT\",\"options\":{\"WAIT\":\"Ch\\u1edd x\\u00e1c nh\\u1eadn\",\"CONFIRMED\":\"\\u0110\\u00e3 x\\u00e1c nh\\u1eadn\",\"REJECTED\":\"\\u0110\\u00e3 t\\u1eeb ch\\u1ed1i\"}}', 15),
(359, 33, 'created_at', 'timestamp', 'ĐK lúc', 0, 0, 1, 1, 0, 1, '{\"format\":\"%d\\/%m\\/%Y %H:%M\"}', 17),
(360, 33, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 18),
(361, 33, 'workout_registration_belongsto_dojo_relationship', 'relationship', 'Cơ sở', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Dojo\",\"table\":\"dojos\",\"type\":\"belongsTo\",\"column\":\"dojo_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"achievements\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(362, 22, 'note', 'text_area', 'Ghi chú', 0, 1, 1, 1, 1, 1, '{}', 7),
(363, 23, 'reason_reject', 'text_area', 'Lý do từ chối', 0, 1, 1, 1, 1, 1, '{}', 11),
(364, 28, 'reason_reject', 'text_area', 'Lý do từ chối', 0, 1, 1, 1, 1, 1, '{}', 9),
(365, 33, 'reason_reject', 'text_area', 'Lý do từ chối', 0, 1, 1, 1, 1, 1, '{}', 16),
(366, 33, 'homeland', 'select_dropdown', 'Quê quán', 1, 1, 1, 1, 1, 1, '{\"default\":\"H\\u00e0 N\\u1ed9i\",\"options\":{\"An Giang\":\"An Giang\",\"B\\u00e0 R\\u1ecba \\u2013 V\\u0169ng T\\u00e0u\":\"B\\u00e0 R\\u1ecba \\u2013 V\\u0169ng T\\u00e0u\",\"B\\u1eafc Giang\":\"B\\u1eafc Giang\",\"B\\u1eafc K\\u1ea1n\":\"B\\u1eafc K\\u1ea1n\",\"B\\u1ea1c Li\\u00eau\":\"B\\u1ea1c Li\\u00eau\",\"B\\u1eafc Ninh\":\"B\\u1eafc Ninh\",\"B\\u1ebfn Tre\":\"B\\u1ebfn Tre\",\"B\\u00ecnh \\u0110\\u1ecbnh\":\"B\\u00ecnh \\u0110\\u1ecbnh\",\"B\\u00ecnh D\\u01b0\\u01a1ng\":\"B\\u00ecnh D\\u01b0\\u01a1ng\",\"B\\u00ecnh Ph\\u01b0\\u1edbc\":\"B\\u00ecnh Ph\\u01b0\\u1edbc\",\"B\\u00ecnh Thu\\u1eadn\":\"B\\u00ecnh Thu\\u1eadn\",\"C\\u00e0 Mau\":\"C\\u00e0 Mau\",\"C\\u1ea7n Th\\u01a1\":\"C\\u1ea7n Th\\u01a1\",\"Cao B\\u1eb1ng\":\"Cao B\\u1eb1ng\",\"\\u0110\\u00e0 N\\u1eb5ng\":\"\\u0110\\u00e0 N\\u1eb5ng\",\"\\u0110\\u1eafk L\\u1eafk\":\"\\u0110\\u1eafk L\\u1eafk\",\"\\u0110\\u1eafk N\\u00f4ng\":\"\\u0110\\u1eafk N\\u00f4ng\",\"\\u0110i\\u1ec7n Bi\\u00ean\":\"\\u0110i\\u1ec7n Bi\\u00ean\",\"\\u0110\\u1ed3ng Nai\":\"\\u0110\\u1ed3ng Nai\",\"\\u0110\\u1ed3ng Th\\u00e1p\":\"\\u0110\\u1ed3ng Th\\u00e1p\",\"Gia Lai\":\"Gia Lai\",\"H\\u00e0 Giang\":\"H\\u00e0 Giang\",\"H\\u00e0 Nam\":\"H\\u00e0 Nam\",\"H\\u00e0 N\\u1ed9i\":\"H\\u00e0 N\\u1ed9i\",\"H\\u00e0 T\\u0129nh\":\"H\\u00e0 T\\u0129nh\",\"H\\u1ea3i D\\u01b0\\u01a1ng\":\"H\\u1ea3i D\\u01b0\\u01a1ng\",\"H\\u1ea3i Ph\\u00f2ng\":\"H\\u1ea3i Ph\\u00f2ng\",\"H\\u1eadu Giang\":\"H\\u1eadu Giang\",\"H\\u00f2a B\\u00ecnh\":\"H\\u00f2a B\\u00ecnh\",\"H\\u01b0ng Y\\u00ean\":\"H\\u01b0ng Y\\u00ean\",\"Kh\\u00e1nh H\\u00f2a\":\"Kh\\u00e1nh H\\u00f2a\",\"Ki\\u00ean Giang\":\"Ki\\u00ean Giang\",\"Kon Tum\":\"Kon Tum\",\"Lai Ch\\u00e2u\":\"Lai Ch\\u00e2u\",\"L\\u00e2m \\u0110\\u1ed3ng\":\"L\\u00e2m \\u0110\\u1ed3ng\",\"L\\u1ea1ng S\\u01a1n\":\"L\\u1ea1ng S\\u01a1n\",\"L\\u00e0o Cai\":\"L\\u00e0o Cai\",\"Long An\":\"Long An\",\"Nam \\u0110\\u1ecbnh\":\"Nam \\u0110\\u1ecbnh\",\"Ngh\\u1ec7 An\":\"Ngh\\u1ec7 An\",\"Ninh B\\u00ecnh\":\"Ninh B\\u00ecnh\",\"Ninh Thu\\u1eadn\":\"Ninh Thu\\u1eadn\",\"Ph\\u00fa Th\\u1ecd\":\"Ph\\u00fa Th\\u1ecd\",\"Ph\\u00fa Y\\u00ean\":\"Ph\\u00fa Y\\u00ean\",\"Qu\\u1ea3ng B\\u00ecnh\":\"Qu\\u1ea3ng B\\u00ecnh\",\"Qu\\u1ea3ng Nam\":\"Qu\\u1ea3ng Nam\",\"Qu\\u1ea3ng Ng\\u00e3i\":\"Qu\\u1ea3ng Ng\\u00e3i\",\"Qu\\u1ea3ng Ninh\":\"Qu\\u1ea3ng Ninh\",\"Qu\\u1ea3ng Tr\\u1ecb\":\"Qu\\u1ea3ng Tr\\u1ecb\",\"S\\u00f3c Tr\\u0103ng\":\"S\\u00f3c Tr\\u0103ng\",\"S\\u01a1n La\":\"S\\u01a1n La\",\"T\\u00e2y Ninh\":\"T\\u00e2y Ninh\",\"Th\\u00e1i B\\u00ecnh\":\"Th\\u00e1i B\\u00ecnh\",\"Th\\u00e1i Nguy\\u00ean\":\"Th\\u00e1i Nguy\\u00ean\",\"Thanh H\\u00f3a\":\"Thanh H\\u00f3a\",\"Th\\u1eeba Thi\\u00ean Hu\\u1ebf\":\"Th\\u1eeba Thi\\u00ean Hu\\u1ebf\",\"Ti\\u1ec1n Giang\":\"Ti\\u1ec1n Giang\",\"Tp.H\\u1ed3 Ch\\u00ed Minh\":\"Tp.H\\u1ed3 Ch\\u00ed Minh\",\"Tr\\u00e0 Vinh\":\"Tr\\u00e0 Vinh\",\"Tuy\\u00ean Quang\":\"Tuy\\u00ean Quang\",\"V\\u0129nh Long\":\"V\\u0129nh Long\",\"V\\u0129nh Ph\\u00fac\":\"V\\u0129nh Ph\\u00fac\",\"Y\\u00ean B\\u00e1i\":\"Y\\u00ean B\\u00e1i\"}}', 8),
(367, 7, 'homeland', 'select_dropdown', 'Quê quán', 1, 1, 1, 1, 1, 1, '{\"default\":\"H\\u00e0 N\\u1ed9i\",\"options\":{\"An Giang\":\"An Giang\",\"B\\u00e0 R\\u1ecba \\u2013 V\\u0169ng T\\u00e0u\":\"B\\u00e0 R\\u1ecba \\u2013 V\\u0169ng T\\u00e0u\",\"B\\u1eafc Giang\":\"B\\u1eafc Giang\",\"B\\u1eafc K\\u1ea1n\":\"B\\u1eafc K\\u1ea1n\",\"B\\u1ea1c Li\\u00eau\":\"B\\u1ea1c Li\\u00eau\",\"B\\u1eafc Ninh\":\"B\\u1eafc Ninh\",\"B\\u1ebfn Tre\":\"B\\u1ebfn Tre\",\"B\\u00ecnh \\u0110\\u1ecbnh\":\"B\\u00ecnh \\u0110\\u1ecbnh\",\"B\\u00ecnh D\\u01b0\\u01a1ng\":\"B\\u00ecnh D\\u01b0\\u01a1ng\",\"B\\u00ecnh Ph\\u01b0\\u1edbc\":\"B\\u00ecnh Ph\\u01b0\\u1edbc\",\"B\\u00ecnh Thu\\u1eadn\":\"B\\u00ecnh Thu\\u1eadn\",\"C\\u00e0 Mau\":\"C\\u00e0 Mau\",\"C\\u1ea7n Th\\u01a1\":\"C\\u1ea7n Th\\u01a1\",\"Cao B\\u1eb1ng\":\"Cao B\\u1eb1ng\",\"\\u0110\\u00e0 N\\u1eb5ng\":\"\\u0110\\u00e0 N\\u1eb5ng\",\"\\u0110\\u1eafk L\\u1eafk\":\"\\u0110\\u1eafk L\\u1eafk\",\"\\u0110\\u1eafk N\\u00f4ng\":\"\\u0110\\u1eafk N\\u00f4ng\",\"\\u0110i\\u1ec7n Bi\\u00ean\":\"\\u0110i\\u1ec7n Bi\\u00ean\",\"\\u0110\\u1ed3ng Nai\":\"\\u0110\\u1ed3ng Nai\",\"\\u0110\\u1ed3ng Th\\u00e1p\":\"\\u0110\\u1ed3ng Th\\u00e1p\",\"Gia Lai\":\"Gia Lai\",\"H\\u00e0 Giang\":\"H\\u00e0 Giang\",\"H\\u00e0 Nam\":\"H\\u00e0 Nam\",\"H\\u00e0 N\\u1ed9i\":\"H\\u00e0 N\\u1ed9i\",\"H\\u00e0 T\\u0129nh\":\"H\\u00e0 T\\u0129nh\",\"H\\u1ea3i D\\u01b0\\u01a1ng\":\"H\\u1ea3i D\\u01b0\\u01a1ng\",\"H\\u1ea3i Ph\\u00f2ng\":\"H\\u1ea3i Ph\\u00f2ng\",\"H\\u1eadu Giang\":\"H\\u1eadu Giang\",\"H\\u00f2a B\\u00ecnh\":\"H\\u00f2a B\\u00ecnh\",\"H\\u01b0ng Y\\u00ean\":\"H\\u01b0ng Y\\u00ean\",\"Kh\\u00e1nh H\\u00f2a\":\"Kh\\u00e1nh H\\u00f2a\",\"Ki\\u00ean Giang\":\"Ki\\u00ean Giang\",\"Kon Tum\":\"Kon Tum\",\"Lai Ch\\u00e2u\":\"Lai Ch\\u00e2u\",\"L\\u00e2m \\u0110\\u1ed3ng\":\"L\\u00e2m \\u0110\\u1ed3ng\",\"L\\u1ea1ng S\\u01a1n\":\"L\\u1ea1ng S\\u01a1n\",\"L\\u00e0o Cai\":\"L\\u00e0o Cai\",\"Long An\":\"Long An\",\"Nam \\u0110\\u1ecbnh\":\"Nam \\u0110\\u1ecbnh\",\"Ngh\\u1ec7 An\":\"Ngh\\u1ec7 An\",\"Ninh B\\u00ecnh\":\"Ninh B\\u00ecnh\",\"Ninh Thu\\u1eadn\":\"Ninh Thu\\u1eadn\",\"Ph\\u00fa Th\\u1ecd\":\"Ph\\u00fa Th\\u1ecd\",\"Ph\\u00fa Y\\u00ean\":\"Ph\\u00fa Y\\u00ean\",\"Qu\\u1ea3ng B\\u00ecnh\":\"Qu\\u1ea3ng B\\u00ecnh\",\"Qu\\u1ea3ng Nam\":\"Qu\\u1ea3ng Nam\",\"Qu\\u1ea3ng Ng\\u00e3i\":\"Qu\\u1ea3ng Ng\\u00e3i\",\"Qu\\u1ea3ng Ninh\":\"Qu\\u1ea3ng Ninh\",\"Qu\\u1ea3ng Tr\\u1ecb\":\"Qu\\u1ea3ng Tr\\u1ecb\",\"S\\u00f3c Tr\\u0103ng\":\"S\\u00f3c Tr\\u0103ng\",\"S\\u01a1n La\":\"S\\u01a1n La\",\"T\\u00e2y Ninh\":\"T\\u00e2y Ninh\",\"Th\\u00e1i B\\u00ecnh\":\"Th\\u00e1i B\\u00ecnh\",\"Th\\u00e1i Nguy\\u00ean\":\"Th\\u00e1i Nguy\\u00ean\",\"Thanh H\\u00f3a\":\"Thanh H\\u00f3a\",\"Th\\u1eeba Thi\\u00ean Hu\\u1ebf\":\"Th\\u1eeba Thi\\u00ean Hu\\u1ebf\",\"Ti\\u1ec1n Giang\":\"Ti\\u1ec1n Giang\",\"Tp.H\\u1ed3 Ch\\u00ed Minh\":\"Tp.H\\u1ed3 Ch\\u00ed Minh\",\"Tr\\u00e0 Vinh\":\"Tr\\u00e0 Vinh\",\"Tuy\\u00ean Quang\":\"Tuy\\u00ean Quang\",\"V\\u0129nh Long\":\"V\\u0129nh Long\",\"V\\u0129nh Ph\\u00fac\":\"V\\u0129nh Ph\\u00fac\",\"Y\\u00ean B\\u00e1i\":\"Y\\u00ean B\\u00e1i\"}}', 9),
(368, 20, 'voucher_belongstomany_student_relationship', 'relationship', 'students', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Student\",\"table\":\"students\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"student_voucher\",\"pivot\":\"1\",\"taggable\":\"0\"}', 13),
(369, 18, 'total_price', 'hidden', 'Tổng học phí', 1, 1, 1, 1, 1, 1, '{}', 7),
(370, 18, 'status', 'hidden', 'Trạng thái', 1, 1, 1, 1, 1, 1, '{}', 15),
(371, 26, 'image', 'image', 'Ảnh', 0, 1, 1, 1, 1, 1, '{\"quality\":\"70%\"}', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'App\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":\"student_id\",\"order_display_column\":\"student_id\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-28 00:46:45', '2020-04-23 07:37:22'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-11-28 00:46:47', '2019-11-28 00:46:47'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-11-28 00:46:47', '2019-11-28 00:46:47'),
(5, 'posts', 'posts', 'Bài viết', 'Bài viết', 'voyager-news', 'App\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', 'App\\Http\\Controllers\\Admin\\PostController', NULL, 1, 0, '{\"order_column\":\"updated_at\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-11-28 00:46:52', '2020-05-07 04:20:51'),
(7, 'students', 'students', 'Võ sinh', 'Võ sinh', 'voyager-belt', 'App\\Models\\Student', NULL, 'App\\Http\\Controllers\\Admin\\StudentController', NULL, 1, 0, '{\"order_column\":\"status\",\"order_display_column\":\"name\",\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-11-28 01:57:44', '2020-06-17 04:59:36'),
(9, 'dojos', 'dojos', 'Cơ sở tập luyện', 'Cơ sở tập luyện', 'voyager-company', 'App\\Models\\Dojo', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-30 19:50:36', '2020-05-29 20:17:19'),
(10, 'slides', 'slides', 'Trang bìa', 'Trang bìa', 'voyager-photo', 'App\\Models\\Slide', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"created_at\",\"order_display_column\":\"created_at\",\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-12-02 02:42:16', '2020-01-10 17:04:36'),
(12, 'videos', 'videos', 'Video', 'Video', 'voyager-tv', 'App\\Models\\Video', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"updated_at\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-12-02 09:32:54', '2020-05-07 04:20:33'),
(13, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'App\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"order\",\"order_display_column\":\"name\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-01-01 04:47:10', '2020-01-10 16:17:02'),
(14, 'playlists', 'playlists', 'Playlist', 'Playlists', 'voyager-play', 'App\\Models\\Playlist', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-01-10 16:21:34', '2020-02-05 16:01:10'),
(15, 'documents', 'documents', 'Tài liệu', 'Tài liệu', 'voyager-file-text', 'App\\Models\\Document', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"updated_at\",\"order_display_column\":\"updated_at\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-01-21 09:06:07', '2020-01-31 20:00:56'),
(18, 'tuitions', 'tuitions', 'Lịch sử học phí', 'Lịch sử học phí', 'voyager-wallet', 'App\\Models\\Tuition', NULL, 'App\\Http\\Controllers\\Admin\\TuitionController', NULL, 1, 0, '{\"order_column\":\"updated_at\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-03-26 10:32:21', '2020-06-30 07:02:51'),
(19, 'bonus_defaults', 'bonus-defaults', 'Ưu đãi mặc định', 'Ưu đãi mặc định', 'voyager-wallet', 'App\\Models\\BonusDefault', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"level\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-03-27 08:03:39', '2020-06-17 04:59:54'),
(20, 'vouchers', 'vouchers', 'Mã giảm giá', 'Mã giảm giá', 'voyager-gift', 'App\\Models\\Voucher', NULL, 'App\\Http\\Controllers\\Admin\\VoucherController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-03-27 10:43:46', '2020-05-29 20:34:50'),
(22, 'tuition_policies', 'tuition-policies', 'Chính sách học phí', 'Chính sách học phí', 'voyager-lock', 'App\\Models\\TuitionPolicy', NULL, 'App\\Http\\Controllers\\Admin\\TuitionPolicyController', NULL, 1, 0, '{\"order_column\":\"dojo_id\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-01 19:47:29', '2020-06-30 19:00:46'),
(23, 'transfer_dojos', 'transfer-dojos', 'Đăng ký chuyển cơ sở', 'Đăng ký chuyển cơ sở', 'voyager-mail', 'App\\Models\\TransferDojo', 'App\\Policies\\TransferDojoPolicy', NULL, NULL, 1, 0, '{\"order_column\":\"confirmed\",\"order_display_column\":\"confirmed\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-08 23:43:43', '2020-05-22 22:20:45'),
(24, 'operation_logs', 'operation-logs', 'Nhật ký hoạt động', 'Nhật ký hoạt động', 'voyager-logbook', 'App\\Models\\OperationLog', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-10 22:32:41', '2020-04-10 23:46:12'),
(26, 'achievements', 'achievements', 'Thành tích', 'Thành tích', 'voyager-trophy', 'App\\Models\\Achievement', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"date\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-04-12 22:32:02', '2020-06-30 07:26:32'),
(27, 'test_scores', 'test-scores', 'Điểm thi', 'Điểm thi', 'voyager-bar-chart', 'App\\Models\\TestScore', NULL, 'App\\Http\\Controllers\\Admin\\TestScoreController', NULL, 1, 0, '{\"order_column\":\"test_day\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-04-14 06:13:58', '2020-05-13 09:52:59'),
(28, 'attends', 'attends', 'Tham gia', 'Tham gia', 'voyager-activity', 'App\\Models\\Attend', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-14 20:53:02', '2020-05-22 22:56:05'),
(29, 'events', 'events', 'Sự kiện', 'Sự kiện', 'voyager-puzzle', 'App\\Models\\Event', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-14 20:57:12', '2020-04-15 10:52:22'),
(30, 'rooms', 'rooms', 'Phòng tập', 'Phòng tập', 'voyager-shop', 'App\\Models\\Room', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"dojo_id\",\"order_display_column\":\"dojo_id\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-19 08:58:56', '2020-04-19 18:51:02'),
(31, 'book_rooms', 'book-rooms', 'Đặt phòng', 'Đặt phòng', 'voyager-calendar', 'App\\Models\\BookRoom', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"confirmed\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-19 09:10:19', '2020-05-22 22:16:55'),
(32, 'uptimes', 'uptimes', 'Thời gian hoạt động', 'Thời gian hoạt động', 'voyager-alarm-clock', 'App\\Models\\Uptime', NULL, 'App\\Http\\Controllers\\Admin\\UptimeController', NULL, 1, 0, '{\"order_column\":\"room_id\",\"order_display_column\":\"room_id\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-19 19:08:07', '2020-04-22 20:01:54'),
(33, 'workout_registrations', 'workout-registrations', 'Đăng ký tập luyện', 'Đăng ký tập luyện', 'voyager-barbell', 'App\\Models\\WorkoutRegistration', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"confirmed\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-05-22 16:11:28', '2020-05-27 22:13:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `documents`
--

INSERT INTO `documents` (`id`, `title`, `slug`, `description`, `file`, `source`, `keywords`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Luật thi đấu Karate 2019 [Bản lưu hành nội bộ]', 'luat-thi-dau-karate-2019-ban-luu-hanh-noi-bo', 'HLV Trần Mạnh Dũng - huyền đai đệ tam đẳng Karate-do, cựu VĐV đội tuyển Quốc gia, kiện tướng Karate-do Quốc gia, giáo viên giảng dạy Karate-do Học viện Cảnh sát phòng cháy chữa cháy...\r\nCuốn sách với những kiến thức chuẩn về luật thi đấu Karate quốc tế sẽ giúp các võ sinh của võ đường hiểu và nắm bắt rõ về luật thi đấu Karate, sẵn sàng cho các kỳ thi thăng đẳng huyền đai cấp Quốc gia cũng như áp dụng vào thực tế trên con đường rèn luyện, thi đấu và sự nghiệp  Karate của mình.', '[\"documents/Luật/LUẬT THI ĐẤU KARATE 2019.pdf\"]', 'Karate League Dojo', NULL, 'luật thi đấu', '2020-01-21 18:06:25', '2020-01-31 11:07:43'),
(2, 'test', 'test', 'tesst', '[\"documents/test/DATN_NguyenVanUoc.pdf\"]', 'Karate League Dojo', NULL, 'abc', '2020-06-29 09:07:09', '2020-06-29 09:07:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dojos`
--

CREATE TABLE `dojos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` time NOT NULL,
  `finish_at` time NOT NULL,
  `schedule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dojos`
--

INSERT INTO `dojos` (`id`, `image`, `name`, `slug`, `start_at`, `finish_at`, `schedule`, `address`, `coach`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '[\"dojos\\\\December2019\\\\8GUxk2KNYzYirAoqxv5h.jpg\",\"dojos\\\\December2019\\\\rBM8ekCbmcyaQSZr3CnC.jpg\"]', 'Karate League Dojo', 'karate-league-dojo', '17:30:00', '19:00:00', '{\"3\":\"3\",\"4\":\"4\",\"6\":\"6\",\"7\":\"7\"}', 'Sảnh 1 - Đơn Nguyên 2 CT3 - Khu đô thị mới Trung Văn-Hà Nội', 'Trần Mạnh Dũng', '<p class=\"MsoNormal\" style=\"line-height: normal; background: white; text-align: left;\"><span style=\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\">V&otilde; đường với trang thiết bị hiện đại, ti&ecirc;u chuẩn ph&ograve;ng tập đội tuyến sẽ mang đến những điệu tốt nhất gi&agrave;nh cho c&aacute;c v&otilde; sinh.</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: 200%; background: white; text-align: center;\" align=\"center\"><span style=\"font-size: 10.5pt; line-height: 200%; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21; mso-no-proof: yes;\"><!-- [if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"Hình_x0020_ảnh_x0020_3\" o:spid=\"_x0000_i1027\"\r\n type=\"#_x0000_t75\" alt=\"http://localhost:8000/storage/dojos/December2019/35145893_2539803739578456_6139076672076382208_o.jpg\"\r\n style=\'width:249pt;height:165.75pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/UOC~1.NV1/AppData/Local/Temp/msohtmlclip1/01/clip_image001.jpg\"\r\n  o:title=\"35145893_2539803739578456_6139076672076382208_o\"/>\r\n</v:shape><![endif]--><!-- [if !vml]--><img src=\"http://leaguedojo.tk/storage/dojos/December2019/35145893_2539803739578456_6139076672076382208_o.jpg\" alt=\"http://leaguedojo.tk/storage/dojos/December2019/35145893_2539803739578456_6139076672076382208_o.jpg\" width=\"90%\" height=\"auto\" /> &nbsp;<img src=\"http://leaguedojo.tk/storage/dojos/December2019/37022211_2573406232884873_3193762549166243840_o.jpg\" alt=\"http://leaguedojo.tk/storage/dojos/December2019/37022211_2573406232884873_3193762549166243840_o.jpg\" width=\"90%\" height=\"auto\" /><!--[endif]--></span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal; background: white; text-align: left;\"><span style=\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\">Với nhiều năm kinh nghiệm thi đấu, huấn luyện v&agrave; giảng dạy m&ocirc;n v&otilde; Karatedo c&aacute;c HLV sẽ trau đổi tinh thần thượng v&otilde; NH&Acirc;N - NGHĨA - LỄ -TR&Iacute; - T&Iacute;N.</span></p>\r\n<p class=\"MsoNormal\" style=\"line-height: normal; background: white; text-align: left;\"><span style=\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\">HLV Trần Mạnh Dũng: huyễn đai đệ tam đẳng Karatedo, cựu VĐV đội tuyển Quốc gia, kiện tướng Karate Quốc gia, gi&aacute;o vi&ecirc;n giảng dạy Karatedo Cảnh s&aacute;t ph&ograve;ng ch&aacute;y chữa ch&aacute;y...</span></p>\r\n<figure class=\"image align-center\" style=\"text-align: center;\"><img src=\"http://leaguedojo.tk/storage/dojos/December2019/35053850_2539805709578259_1385784409373802496_o.jpg\" alt=\"HLV. Trần Mạnh Dũng\" width=\"80%\" height=\"auto\" />\r\n<figcaption><br />HLV. Trần Mạnh Dũng</figcaption>\r\n</figure>\r\n<p class=\"MsoNormal\" style=\"line-height: normal; background: white; text-align: left;\" align=\"center\"><span style=\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\">Với kinh nghiệm thi đấu v&agrave; giảng dạy của m&igrave;nh. HLV Trần Mạnh Dũng sẽ mang lại cho bạn những giờ ph&uacute;t tập luyện mướt mồ h&ocirc;i với những kỹ thuật chuy&ecirc;n m&ocirc;n cao đầy hiệu quả để bạn c&oacute; thể tự tin tr&ecirc;n thảm đấu.</span></p>', NULL, '2020-06-01 01:52:45', NULL),
(2, '[\"dojos\\\\December2019\\\\Ru3KnTXAkXquQXpxUmKt.jpg\",\"dojos\\\\December2019\\\\EQUuMVc5EcEWfE1FvT1W.jpg\",\"dojos\\\\December2019\\\\INZpL9ZJBp9mNG7zL4Zk.jpg\"]', 'Karate Nông Nghiệp - K.L.D', 'karate-nong-nghiep-k-l-d', '19:00:00', '20:30:00', '{\"2\":\"2\",\"5\":\"5\"}', 'Nhà thể chất Học Viện Nông Nghiệp Việt Nam', 'Trần Mạnh Dũng', '<p><strong><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">KHI THAM GIA CLB C&Aacute;C BẠN L&Agrave; TH&Agrave;NH VI&Ecirc;N V&Otilde; ĐƯỜNG SẼ ĐƯỢC ƯU TI&Ecirc;N CỘNG ĐIỂM HỌC GDTC C&Aacute;C M&Ocirc;N HỌC NHƯ : CẦU L&Ocirc;NG, ĐIỀN KINH, TENIS.....</span></strong><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\');\">👉</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Miễn ph&iacute; học thử trước khi đăng k&yacute; tập luyện.</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t38/1/16/1f44a_1f3ff.png\');\">👊🏿</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Tặng ngay 01 bộ v&otilde; phục trị gi&aacute; 250.000 k&egrave;m logo v&otilde; đường khi đ&oacute;ng học ph&iacute; 6 th&aacute;ng.</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t5d/1/16/1f3d6.png\');\">🏖</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Tham gia c&aacute;c chương tr&igrave;nh sinh nhật , li&ecirc;n hoan , picnic ngoại kho&aacute;...</span></p>\r\n<p><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.tk/storage/dojos/December2019/56528983_2576310309109714_5139167642292060160_o.jpg\" alt=\"http://leaguedojo.tk/storage/dojos/December2019/56528983_2576310309109714_5139167642292060160_o.jpg\" width=\"1800\" height=\"1013\" /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.com/storage/dojos/December2019/56528983_2576310309109714_5139167642292060160_o.jpg\" alt=\"\" width=\"90%\" height=\"auto\" /></span></p>\r\n<p><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">V&agrave; tận hưởng kh&ocirc;ng kh&iacute; tập luyện hăng say v&agrave; cuồng lửa tại c&acirc;u lạc bộ:</span></p>\r\n<p style=\"text-align: center;\"><img src=\"http://leaguedojo.tk/storage/posts/May2020/69859886_2971218249618916_6902064503970594816_n.jpg\" alt=\"http://leaguedojo.tk/storage/posts/May2020/69859886_2971218249618916_6902064503970594816_n.jpg\" width=\"45%\" height=\"auto\" /><img src=\"http://leaguedojo.vn/storage/dojos/December2019/EQUuMVc5EcEWfE1FvT1W-cropped.jpg\" alt=\"\" width=\"48%\" height=\"auto\" /><img src=\"http://leaguedojo.com/storage/dojos/December2019/70240175_2990376614369746_2467002985457123328_n.jpg\" alt=\"\" width=\"48%\" height=\"auto\" /> &nbsp;<img src=\"http://leaguedojo.com/storage/dojos/December2019/69859886_2971218249618916_6902064503970594816_n.jpg\" alt=\"\" width=\"48%\" height=\"auto\" />&nbsp;<img src=\"http://leaguedojo.vn/storage/dojos/December2019/69859886_2971218249618916_6902064503970594816_n.jpg\" alt=\"\" width=\"48%\" height=\"auto\" /><img src=\"http://leaguedojo.tk/storage/posts/December2019/70240175_2990376614369746_2467002985457123328_n.jpg\" alt=\"http://leaguedojo.tk/storage/posts/December2019/70240175_2990376614369746_2467002985457123328_n.jpg\" width=\"45%\" height=\"auto\" /></p>\r\n<p style=\"text-align: left;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f3c6.png\');\">🏆</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Được đại diện cho trường tham gia thi đấu c&aacute;c gải Karate sinh vi&ecirc;n cấp th&agrave;nh phố , to&agrave;n quốc....</span></p>\r\n<p style=\"text-align: center;\"><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.vn/storage/dojos/December2019/68393728_2915143145226427_3829384397207896064_o.jpg\" alt=\"\" width=\"90%\" height=\"auto\" /><img src=\"http://leaguedojo.tk/storage/posts/May2020/68393728_2915143145226427_3829384397207896064_o.jpg\" alt=\"http://leaguedojo.tk/storage/posts/May2020/68393728_2915143145226427_3829384397207896064_o.jpg\" width=\"90%\" height=\"auto\" />&nbsp;<br /></span></p>\r\n<p style=\"text-align: left;\"><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br />Karate N&ocirc;ng Ngiệp - K.L.D<br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span>NƠI HỘI TỤ ĐAM M&Ecirc;&nbsp;<span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t34/1/16/23f0.png\');\">⏰</span></span>&nbsp;: 19h - 20h30\' Thứ 2 v&agrave; Thứ 5 h&agrave;ng tuần<br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/te1/1/16/26e9.png\');\">⛩</span></span>&nbsp;:Nh&agrave; thể chất HVNN Việt Nam<br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t22/1/16/260e.png\');\">☎️</span></span>&nbsp;:Li&ecirc;n hệ : 0942332444</span></p>', NULL, '2020-06-01 01:57:03', NULL),
(3, '[\"dojos\\\\December2019\\\\i6LE6yocNis7TAomaqy1.jpg\"]', 'Karate Đại Thanh - K.L.D', 'karate-dai-thanh-k-l-d', '18:00:00', '19:30:00', '[\"5\",\"8\"]', 'Trường mầm non Ngôi Sao', 'Nguyễn Văn Ước', '<p><span style=\"color: #000000; font-family: \'Open Sans\', sans-serif;\">HLV Trưởng: Nguyễn Văn Ước</span></p>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dojo_voucher`
--

CREATE TABLE `dojo_voucher` (
  `dojo_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dojo_voucher`
--

INSERT INTO `dojo_voucher` (`dojo_id`, `voucher_id`) VALUES
(2, 1),
(1, 2),
(2, 2),
(3, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'events/default.jpg',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `image`, `name`, `date`, `start_at`, `end_at`, `address`, `point`, `note`, `created_at`, `updated_at`) VALUES
(1, 'events\\April2020\\3NPOgLj6KEEOLhNkSqIR.png', 'Lễ trao huyền đai karate và pinic dã ngoại', '2019-09-15', '09:00:00', '17:00:00', 'Công viên thống nhất', 2, NULL, '2020-04-14 21:15:48', '2020-05-13 22:02:50'),
(2, 'events/default.jpg', 'Sinh nhật võ đường Karate League Dojo 2 tuổi', '2020-01-28', '17:00:00', '20:00:00', 'League dojo - sảnh 1 Đơn nguyên 2 CT3 khu đô thị mới Trung Văn - Nam Từ Liêm - Hà Nội.', 5, NULL, '2020-04-14 21:19:55', '2020-04-17 18:14:40'),
(3, 'events\\April2020\\bz45KEYpNeOAr0POPw38.png', 'Du lịch Tây Thiên đầu năm 2019', '2020-02-07', '07:00:00', '20:00:00', 'Tây Thiên', 5, NULL, '2020-04-15 21:28:14', '2020-04-16 02:43:10'),
(4, 'events\\April2020\\zvcqHIEXRRLbdVhkNcOo.png', 'Hỗ trợ tuyển sinh cơ sở Học viện Nông nghiệp Việt Nam', '2020-03-15', '08:00:00', '17:00:00', 'Nhà thể chất HVNN VN', 2, NULL, '2020-04-16 03:03:37', '2020-04-16 03:03:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(2, 'site', '2019-12-16 02:22:07', '2019-12-16 02:27:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-11-28 00:46:49', '2019-11-28 00:46:49', 'voyager.dashboard', NULL),
(2, 1, 'Đa Phương Tiện', '', '_self', 'voyager-images', '#000000', NULL, 9, '2019-11-28 00:46:49', '2020-05-22 16:58:11', 'voyager.media.index', 'null'),
(3, 1, 'Tài khoản', '', '_self', 'voyager-dot-2', '#000000', 15, 2, '2019-11-28 00:46:49', '2020-02-05 15:46:57', 'voyager.users.index', 'null'),
(4, 1, 'Quyền Truy Cập', '', '_self', 'voyager-dot-2', '#000000', 15, 1, '2019-11-28 00:46:49', '2019-11-30 17:26:30', 'voyager.roles.index', 'null'),
(5, 1, 'Công Cụ Quản Trị', '', '_self', 'voyager-params', '#000000', NULL, 11, '2019-11-28 00:46:49', '2020-05-22 16:58:11', NULL, ''),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-11-28 00:46:49', '2020-04-11 10:17:41', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-11-28 00:46:49', '2020-04-11 10:17:41', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 4, '2019-11-28 00:46:49', '2020-04-11 10:17:41', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 3, '2019-11-28 00:46:49', '2020-04-11 10:17:41', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, 5, 6, '2019-11-28 00:46:49', '2020-04-11 10:17:41', 'voyager.settings.index', NULL),
(12, 1, 'Bài viết', '', '_self', 'voyager-dot-2', '#000000', 16, 4, '2019-11-28 00:46:54', '2020-01-21 09:06:38', 'voyager.posts.index', 'null'),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-11-28 00:46:57', '2020-04-11 10:17:41', 'voyager.hooks', NULL),
(15, 1, 'Người Dùng', '', '_self', 'voyager-people', '#000000', NULL, 2, '2019-11-28 01:46:32', '2019-11-28 01:46:42', NULL, ''),
(16, 1, 'Công Cụ Đăng Bài', '', '_self', 'voyager-file-text', '#000000', NULL, 3, '2019-11-28 01:48:35', '2019-11-28 01:48:51', NULL, ''),
(17, 1, 'Võ sinh', '', '_self', 'voyager-dot-2', '#000000', 15, 3, '2019-11-28 01:57:44', '2019-11-30 17:26:26', 'voyager.students.index', 'null'),
(19, 1, 'Cơ sở tập luyện', '', '_self', 'voyager-dot-2', '#000000', 51, 1, '2019-11-30 19:50:37', '2020-04-19 19:13:55', 'voyager.dojos.index', 'null'),
(20, 1, 'Trang bìa', '', '_self', 'voyager-dot-2', '#000000', 16, 1, '2019-12-02 02:42:16', '2019-12-02 06:48:46', 'voyager.slides.index', 'null'),
(22, 1, 'Video', '', '_self', 'voyager-dot-2', '#000000', 16, 6, '2019-12-02 09:32:55', '2020-01-21 09:06:38', 'voyager.videos.index', 'null'),
(23, 2, 'Trang chủ', '', '_self', NULL, '#000000', NULL, 1, '2019-12-16 02:22:58', '2019-12-31 06:30:04', 'home', 'null'),
(24, 2, 'Tin tức', '', '_self', NULL, '#000000', NULL, 2, '2019-12-16 02:24:56', '2019-12-31 06:30:04', 'news', 'null'),
(25, 2, 'Các cơ sở', '', '_self', NULL, '#000000', NULL, 5, '2019-12-16 02:25:49', '2020-01-22 19:36:01', 'dojos.index', 'null'),
(26, 2, 'Video', '', '_self', NULL, '#000000', NULL, 3, '2019-12-31 06:27:56', '2019-12-31 06:30:04', 'videos.index', 'null'),
(27, 1, 'Thể loại', '', '_self', 'voyager-dot-2', '#000000', 16, 3, '2020-01-01 04:47:11', '2020-01-21 09:06:38', 'voyager.categories.index', 'null'),
(28, 1, 'Playlists', '', '_self', 'voyager-dot-2', '#000000', 16, 5, '2020-01-10 16:21:34', '2020-01-21 09:06:38', 'voyager.playlists.index', 'null'),
(29, 1, 'Tài liệu', '', '_self', 'voyager-dot-2', '#000000', 16, 2, '2020-01-21 09:06:08', '2020-01-21 09:06:50', 'voyager.documents.index', 'null'),
(30, 2, 'Tài liệu', '', '_self', NULL, '#000000', NULL, 4, '2020-01-22 19:35:55', '2020-01-22 19:36:01', 'documents.index', NULL),
(31, 1, 'Biểu mẫu', '', '_self', 'voyager-paperclip', '#000000', NULL, 8, '2020-02-23 09:28:41', '2020-05-22 16:58:10', NULL, ''),
(32, 1, 'Thẻ thi đấu', '', '_self', 'voyager-dot-2', '#000000', 31, 3, '2020-02-23 09:30:10', '2020-05-26 22:13:31', 'reports.competition', 'null'),
(34, 1, 'Nộp học phí', '', '_self', 'voyager-dot-2', '#000000', 35, 5, '2020-03-26 10:32:21', '2020-05-14 09:10:33', 'voyager.tuitions.index', 'null'),
(35, 1, 'Học phí', '', '_self', 'voyager-dollar', '#000000', NULL, 6, '2020-03-26 10:34:13', '2020-05-22 16:58:10', NULL, ''),
(36, 1, 'Ưu đãi mặc định', '', '_self', 'voyager-dot-2', '#000000', 35, 1, '2020-03-27 08:03:39', '2020-03-27 09:02:25', 'voyager.bonus-defaults.index', 'null'),
(37, 1, 'Mã giảm giá', '', '_self', 'voyager-dot-2', '#000000', 35, 2, '2020-03-27 10:43:46', '2020-03-27 10:44:17', 'voyager.vouchers.index', 'null'),
(38, 1, 'Chính sách học phí', '', '_self', 'voyager-dot-2', '#000000', 35, 3, '2020-04-01 19:47:29', '2020-04-01 19:56:20', 'voyager.tuition-policies.index', 'null'),
(39, 1, 'Đăng ký chuyển cơ sở', '', '_self', 'voyager-dot-2', '#000000', 35, 4, '2020-04-08 23:43:43', '2020-05-14 06:36:17', 'voyager.transfer-dojos.index', 'null'),
(40, 1, 'Lịch sử truy cập', '', '_self', 'voyager-dot-2', '#000000', 41, 1, '2020-04-10 22:32:41', '2020-04-11 10:18:49', 'voyager.operation-logs.index', 'null'),
(41, 1, 'Log', '', '_self', 'voyager-logbook', '#000000', NULL, 10, '2020-04-11 10:17:24', '2020-05-22 16:58:11', NULL, ''),
(42, 1, 'Log hệ thống', '', '_self', 'voyager-dot-2', '#000000', 41, 2, '2020-04-11 10:36:53', '2020-05-26 08:09:37', 'logs.index', 'null'),
(43, 1, 'Thành tích', '', '_self', 'voyager-dot-2', '#000000', 44, 4, '2020-04-12 22:32:02', '2020-04-14 21:05:26', 'voyager.achievements.index', 'null'),
(44, 1, 'Điểm rèn luyện', '', '_self', 'voyager-trophy', '#000000', NULL, 7, '2020-04-12 22:35:03', '2020-05-22 16:58:10', NULL, ''),
(45, 1, 'Điểm thi', '', '_self', 'voyager-dot-2', '#000000', 44, 3, '2020-04-14 06:13:58', '2020-04-14 21:05:26', 'voyager.test-scores.index', 'null'),
(46, 1, 'Tham gia', '', '_self', 'voyager-dot-2', '#000000', 44, 2, '2020-04-14 20:53:02', '2020-04-14 21:05:33', 'voyager.attends.index', 'null'),
(47, 1, 'Sự kiện', '', '_self', 'voyager-dot-2', '#000000', 44, 1, '2020-04-14 20:57:13', '2020-04-14 21:05:17', 'voyager.events.index', 'null'),
(48, 1, 'Phòng tập', '', '_self', 'voyager-dot-2', '#000000', 51, 2, '2020-04-19 08:58:57', '2020-04-19 19:14:10', 'voyager.rooms.index', 'null'),
(49, 1, 'Đặt phòng', '', '_self', 'voyager-dot-2', '#000000', 51, 4, '2020-04-19 09:10:20', '2020-04-19 19:14:37', 'voyager.book-rooms.index', 'null'),
(50, 1, 'Thời gian hoạt động', '', '_self', 'voyager-dot-2', '#000000', 51, 3, '2020-04-19 19:08:08', '2020-04-19 19:14:24', 'voyager.uptimes.index', 'null'),
(51, 1, 'Cơ sở vật chất', '', '_self', 'voyager-company', '#000000', NULL, 5, '2020-04-19 19:12:59', '2020-05-22 16:58:10', NULL, ''),
(52, 1, 'Đăng ký tập luyện', '', '_self', 'voyager-barbell', NULL, NULL, 4, '2020-05-22 16:11:29', '2020-05-22 16:58:10', 'voyager.workout-registrations.index', NULL),
(53, 2, 'Đăng ký tập luyện', '', '_self', NULL, '#000000', NULL, 12, '2020-05-24 01:41:43', '2020-05-24 01:41:43', 'workout-registrations.create', NULL),
(54, 1, 'Chứng nhận thủ khoa', '', '_self', 'voyager-dot-2', '#000000', 31, 1, '2020-05-26 08:09:01', '2020-05-26 22:13:31', 'reports.valedictorian', 'null'),
(55, 1, 'Chứng nhận đẳng cấp', '', '_self', 'voyager-dot-2', '#000000', 31, 2, '2020-05-26 22:13:08', '2020-05-26 22:13:31', 'reports.kuy', NULL),
(56, 1, 'Giấy giới thiệu', '', '_self', 'voyager-dot-2', '#000000', 31, 5, '2020-05-27 10:47:34', '2020-05-28 18:54:22', 'reports.referral', NULL),
(57, 1, 'Giấy xác nhận tập luyện', '', '_self', 'voyager-dot-2', '#000000', 31, 6, '2020-05-28 09:34:10', '2020-05-28 18:54:22', 'reports.workout-confirm', NULL),
(58, 1, 'Thông báo thi thăng đai', '', '_self', 'voyager-dot-2', '#000000', 31, 4, '2020-05-28 18:54:05', '2020-05-28 18:54:22', 'reports.exam-notification', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(17, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(18, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(19, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(20, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(21, '2017_08_05_000000_add_group_to_settings_table', 1),
(22, '2017_11_26_013050_add_user_role_relationship', 1),
(23, '2017_11_26_015000_create_user_roles_table', 1),
(24, '2018_03_11_000000_add_user_settings', 1),
(25, '2018_03_14_000000_add_details_to_data_types_table', 1),
(26, '2018_03_16_000000_make_settings_value_nullable', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_11_28_082356_create_students_table', 2),
(29, '2019_11_30_091348_create_dojos_table', 3),
(30, '2019_11_30_091516_create_slides_table', 3),
(31, '2019_11_30_091633_create_videos_table', 3),
(32, '2019_12_01_005946_create_vosinhs_table', 4),
(33, '2019_12_02_134028_create_views_table', 5),
(34, '2018_06_30_113500_create_comments_table', 6),
(36, '2019_12_21_182559_add_likes_to_comments_table', 7),
(37, '2019_12_24_152639_add_dojo_id_to_students_table', 8),
(38, '2020_01_09_132402_add_category_id_to_videos_table', 9),
(39, '2020_01_10_220602_create_playlists_table', 9),
(40, '2020_01_10_233315_add_playlist_id_to_videos_table', 10),
(41, '2020_01_21_154542_create_documents_table', 11),
(42, '2020_02_04_151538_create_playlist_videos_table', 12),
(43, '2020_03_21_175408_create_notifications_table', 13),
(44, '2020_03_26_161906_create_tuitions_table', 14),
(45, '2020_03_26_163746_add_status_to_students_table', 14),
(46, '2020_03_27_144157_create_bonus_defaults_table', 15),
(47, '2020_03_27_170240_create_vouchers_table', 16),
(48, '2020_03_28_002047_add_dojo_id_to_vouchers_table', 17),
(49, '2020_03_28_002421_add_amount_to_vouchers_table', 18),
(50, '2020_03_29_032125_add_refunds_to_tuitions_table', 19),
(51, '2020_03_29_213806_create_student_voucher_table', 20),
(52, '2020_04_01_160235_add_type_to_vouchers_table', 21),
(53, '2020_04_02_022444_create_tuition_policies_table', 22),
(54, '2020_04_03_032513_add_month_limit_to_vouchers_table', 23),
(57, '2020_04_03_034102_create_dojo_voucher_table', 24),
(58, '2020_04_04_050026_add_month_to_tuitions_table', 25),
(59, '2020_04_04_230136_add_image_to_vouchers_table', 26),
(60, '2020_04_08_235657_create_transfer_dojos_table', 27),
(61, '2020_04_09_010427_add_foreign_key_to_posts_table', 28),
(62, '2020_04_09_011022_add_foreign_key', 29),
(63, '2020_04_09_013448_add_foreign_key_to_users_table', 30),
(65, '2020_04_09_062646_add_confirmed_to_transfer_dojos_table', 31),
(66, '2020_04_11_040409_create_operation_logs_table', 32),
(67, '2020_04_13_050155_create_achievements_table', 33),
(68, '2020_04_13_054735_add_content_to_achievements_table', 34),
(69, '2020_04_13_055410_add_date_to_achievements_table', 35),
(73, '2020_04_14_125534_create_test_scores_table', 36),
(74, '2020_04_15_033100_create_events_table', 37),
(77, '2020_04_15_172503_add_image_to_events_table', 39),
(79, '2020_04_15_033606_create_attends_table', 40),
(81, '2020_04_18_173310_add_valedictorian_to_test_scores_table', 41),
(84, '2020_04_19_153027_create_rooms_table', 42),
(85, '2020_04_19_154320_create_book_rooms_table', 42),
(86, '2020_04_20_015432_create_uptimes_table', 43),
(88, '2020_04_24_064554_add_reason_reject_to_book_rooms_table', 44),
(89, '2020_05_06_180038_add_tag_to_documentation', 45),
(90, '2020_05_22_041701_add_type_to_tuitions_table', 46),
(96, '2020_05_22_171257_create_workout_registrations_table', 47),
(97, '2020_05_23_003813_add_note_to_tuition_polices_table', 48),
(98, '2020_05_23_050709_add_reason_reject_to_transfer_dojos_table', 49),
(99, '2020_05_23_051422_add_reason_reject_to_workout_registration_table', 49),
(100, '2020_05_23_055449_add_reason_reject_to_attends_table', 50),
(101, '2020_05_28_042644_add_homeland_to_students_table', 51),
(102, '2020_06_27_120059_add_status_to_tuitions_table', 52),
(103, '2020_06_27_122210_add_money_reduction_to_student_voucher_table', 52),
(104, '2020_06_27_124521_add_total_price_to_tuitions_table', 52),
(105, '2020_06_30_141545_add_image_to_achievements_table', 53);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('01e798f5-f661-4782-aa0e-20fde42e2918', 'App\\Notifications\\Notify', 'App\\User', 4, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:38:12.805907Z\"}}', NULL, '2020-06-30 02:38:13', '2020-06-30 02:38:13'),
('08ee8dd3-8e68-47b2-9a2a-bcd6b3974564', 'App\\Notifications\\Notify', 'App\\User', 4, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/videos\\/ky-thuat-kizami-tsuki-tay-truoc-kumite\",\"time\":\"2020-06-30T02:36:36.542283Z\"}}', NULL, '2020-06-30 02:36:36', '2020-06-30 02:36:36'),
('0b7484b4-d853-4647-98b0-6235fc221477', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 th\\u00edch m\\u1ed9t b\\u00ecnh lu\\u1eadn c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-like.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:39:12.109378Z\"}}', NULL, '2020-06-30 02:39:12', '2020-06-30 02:39:12'),
('1251ed76-941f-4863-945f-0dc00c3aaa49', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:38:12.805907Z\"}}', NULL, '2020-06-30 02:38:13', '2020-06-30 02:38:13'),
('13c71b3f-3eb6-427f-acf4-8774be54a1c9', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T05:41:40.413099Z\"}}', NULL, '2020-06-30 05:41:40', '2020-06-30 05:41:40'),
('1da53dc4-bc1b-4e68-8965-733c57a37140', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/6\",\"time\":\"2020-06-30T06:10:14.692686Z\"}}', NULL, '2020-06-30 06:10:15', '2020-06-30 06:10:15'),
('264e9c37-bb63-4f7c-b201-407703d01f22', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T06:19:27.635476Z\"}}', NULL, '2020-06-30 06:19:27', '2020-06-30 06:19:27'),
('26fb2272-f8a8-433e-8489-b2843fc400f0', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/7\",\"time\":\"2020-06-30T06:18:07.943887Z\"}}', NULL, '2020-06-30 06:18:07', '2020-06-30 06:18:07'),
('2c16f49e-c392-46ce-800a-5c8372018418', 'App\\Notifications\\Notify', 'App\\User', 33, '{\"type\":\"reply\",\"data\":{\"text\":\"<b>Bi Tr\\u1ea9n<\\/b> \\u0111\\u00e3 tr\\u1ea3 l\\u1eddi b\\u00ecnh lu\\u1eadn c\\u1ee7a b\\u1ea1n v\\u1ec1 m\\u1ed9t b\\u00e0i vi\\u1ebft.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:38:33.021549Z\"}}', NULL, '2020-06-30 02:38:33', '2020-06-30 02:38:33'),
('47a1ea8f-7e34-4304-86cc-d7d2ecd641c0', 'App\\Notifications\\Notify', 'App\\User', 33, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Bi Tr\\u1ea9n<\\/b> \\u0111\\u00e3 th\\u00edch m\\u1ed9t b\\u00ecnh lu\\u1eadn c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-like.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:39:05.345121Z\"}}', NULL, '2020-06-30 02:39:05', '2020-06-30 02:39:05'),
('531767c8-803e-45b2-8c83-0d79b60d9a5b', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T06:22:27.723438Z\"}}', NULL, '2020-06-30 06:22:27', '2020-06-30 06:22:27'),
('54b41287-2218-46c0-a745-ec6bd682c6f1', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/6\",\"time\":\"2020-06-30T06:10:14.692686Z\"}}', NULL, '2020-06-30 06:10:14', '2020-06-30 06:10:14'),
('59cad810-e748-499f-9a0f-2b97ad5ba540', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T06:08:26.197927Z\"}}', NULL, '2020-06-30 06:08:26', '2020-06-30 06:08:26'),
('5e07f2e5-4d81-4cbc-b265-aae9e60d1feb', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T06:01:53.871069Z\"}}', NULL, '2020-06-30 06:01:53', '2020-06-30 06:01:53'),
('5e22e6a9-5579-4944-aa28-792cdf3269e2', 'App\\Notifications\\Notify', 'App\\User', 13, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/videos\\/ky-thuat-kizami-tsuki-tay-truoc-kumite\",\"time\":\"2020-06-30T02:36:36.542283Z\"}}', NULL, '2020-06-30 02:36:36', '2020-06-30 02:36:36'),
('6dc5da9f-b6bc-4a3b-b64a-a289fef052ba', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:38:12.805907Z\"}}', NULL, '2020-06-30 02:38:12', '2020-06-30 02:38:12'),
('713c4da7-34ba-46b5-8578-1d1d100d20a8', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/4\",\"time\":\"2020-06-30T02:42:33.779773Z\"}}', NULL, '2020-06-30 02:42:33', '2020-06-30 02:42:33'),
('7fa51776-3d5a-474c-a8a1-5343a894ef41', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/5\",\"time\":\"2020-06-30T05:34:08.974295Z\"}}', NULL, '2020-06-30 05:34:09', '2020-06-30 05:34:09'),
('82e8b3fb-c5a8-4db1-b892-8aed421bc6fb', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T05:34:48.495209Z\"}}', NULL, '2020-06-30 05:34:48', '2020-06-30 05:34:48'),
('87c41064-6eef-4156-b8c0-ca6d584c93d1', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"reply\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 tr\\u1ea3 l\\u1eddi b\\u00ecnh lu\\u1eadn c\\u1ee7a b\\u1ea1n v\\u1ec1 m\\u1ed9t b\\u00e0i vi\\u1ebft.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:38:50.589512Z\"}}', NULL, '2020-06-30 02:38:50', '2020-06-30 02:38:50'),
('96106339-d1fd-4fb4-a046-04a2af437cb8', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/9\",\"time\":\"2020-07-01T08:37:32.938479Z\"}}', NULL, '2020-07-01 08:37:34', '2020-07-01 08:37:34'),
('975d8978-ba5b-4342-9833-86179fb366b0', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/5\",\"time\":\"2020-06-30T05:34:08.974295Z\"}}', NULL, '2020-06-30 05:34:10', '2020-06-30 05:34:10'),
('9bc63406-f7f3-4afa-a9cd-4b1efbab90a0', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/videos\\/ky-thuat-kizami-tsuki-tay-truoc-kumite\",\"time\":\"2020-06-30T02:36:36.542283Z\"}}', NULL, '2020-06-30 02:36:36', '2020-06-30 02:36:36'),
('9e711cad-e4cb-40dd-97f0-a1e28f2a4e83', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T06:10:25.734708Z\"}}', NULL, '2020-06-30 06:10:25', '2020-06-30 06:10:25'),
('a5c97946-0507-40fb-a94c-eecdb42317ed', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 th\\u00edch m\\u1ed9t b\\u00ecnh lu\\u1eadn c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-like.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/videos\\/ky-thuat-kizami-tsuki-tay-truoc-kumite\",\"time\":\"2020-06-30T02:37:32.562235Z\"}}', '2020-06-30 02:37:43', '2020-06-30 02:37:32', '2020-06-30 02:37:43'),
('a5e191d9-fe9a-4fd7-9e02-12794fa38c5e', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-06-30T05:53:05.078359Z\"}}', NULL, '2020-06-30 05:53:05', '2020-06-30 05:53:05'),
('ba02b801-899b-4b88-9f32-24ce12c0fdb1', 'App\\Notifications\\Notify', 'App\\User', 33, '{\"type\":\"reply\",\"data\":{\"text\":\"<b>Bi Tr\\u1ea9n<\\/b> \\u0111\\u00e3 tr\\u1ea3 l\\u1eddi b\\u00ecnh lu\\u1eadn c\\u1ee7a b\\u1ea1n v\\u1ec1 m\\u1ed9t b\\u00e0i vi\\u1ebft.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/videos\\/ky-thuat-kizami-tsuki-tay-truoc-kumite\",\"time\":\"2020-06-30T02:37:04.962223Z\"}}', NULL, '2020-06-30 02:37:04', '2020-06-30 02:37:04'),
('bb3bbafe-30cc-473c-b05c-77a3f14665f5', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/videos\\/ky-thuat-kizami-tsuki-tay-truoc-kumite\",\"time\":\"2020-06-30T02:36:36.542283Z\"}}', NULL, '2020-06-30 02:36:36', '2020-06-30 02:36:36'),
('c1d7a800-f782-431e-9807-00a9fdeeb971', 'App\\Notifications\\Notify', 'App\\User', 1, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/9\",\"time\":\"2020-07-01T08:37:32.938479Z\"}}', NULL, '2020-07-01 08:37:33', '2020-07-01 08:37:33'),
('c42609ca-e794-4114-9887-475c1955cf35', 'App\\Notifications\\Notify', 'App\\User', 13, '{\"type\":\"comment\",\"data\":{\"text\":\"<b>Test<\\/b> \\u0111\\u00e3 b\\u00ecnh lu\\u1eadn m\\u1ed9t b\\u00e0i vi\\u1ebft c\\u1ee7a b\\u1ea1n.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/default.png\",\"icon\":\"\\/img\\/core-img\\/icon-cmt.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/posts\\/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"time\":\"2020-06-30T02:38:12.805907Z\"}}', NULL, '2020-06-30 02:38:13', '2020-06-30 02:38:13'),
('de0a5963-ec22-4669-915b-cb9c38d54e9e', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/4\",\"time\":\"2020-06-30T02:42:33.779773Z\"}}', NULL, '2020-06-30 02:42:34', '2020-06-30 02:42:34'),
('f7dda5b6-b32d-4d5e-9754-5edbe63fb5d9', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"\\u0110\\u0103ng k\\u00fd chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Karate League Dojo<\\/b> sang <b>Karate \\u0110\\u1ea1i Thanh - K.L.D<\\/b> \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c ch\\u1ea5p nh\\u1eadn.\",\"img\":\"\\/img\\/core-img\\/notification.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"#\",\"time\":\"2020-07-01T08:38:05.056463Z\"}}', NULL, '2020-07-01 08:38:05', '2020-07-01 08:38:05'),
('fd3839ad-b77b-4879-9648-e56135013024', 'App\\Notifications\\Notify', 'App\\User', 5, '{\"type\":\"transfer-dojo\",\"data\":{\"text\":\"B\\u1ea1n nh\\u1eadn \\u0111\\u01b0\\u1ee3c 1 \\u0111\\u01a1n xin chuy\\u1ec3n c\\u01a1 s\\u1edf t\\u1eadp luy\\u1ec7n t\\u1eeb <b>Nguy\\u1ec5n V\\u0103n \\u01af\\u1edbc<\\/b>.\",\"img\":\"http:\\/\\/leaguedojo.vn\\/storage\\/users\\/June2020\\/1592320783.png\",\"icon\":\"\\/img\\/core-img\\/icon-notify.png\",\"href\":\"http:\\/\\/leaguedojo.vn\\/admin\\/transfer-dojos\\/7\",\"time\":\"2020-06-30T06:18:07.943887Z\"}}', NULL, '2020-06-30 06:18:08', '2020-06-30 06:18:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `operation_logs`
--

CREATE TABLE `operation_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `operation_logs`
--

INSERT INTO `operation_logs` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, NULL, '/', 'GET', '172.68.253.184', '[]', '2020-05-31 18:02:36', '2020-05-31 18:02:36'),
(2, NULL, 'admin', 'GET', '162.158.178.68', '[]', '2020-05-31 18:02:49', '2020-05-31 18:02:49'),
(3, NULL, 'admin/login', 'GET', '162.158.178.68', '[]', '2020-05-31 18:02:50', '2020-05-31 18:02:50'),
(4, NULL, 'admin/voyager-assets', 'GET', '162.158.179.243', '{\"path\":\"css\\/app.css\"}', '2020-05-31 18:02:50', '2020-05-31 18:02:50'),
(5, NULL, 'admin/voyager-assets', 'GET', '162.158.179.55', '{\"path\":\"fonts\\/voyager.woff\"}', '2020-05-31 18:02:58', '2020-05-31 18:02:58'),
(6, NULL, 'admin/login', 'POST', '162.158.178.68', '{\"_token\":\"ZdIMUzqpEmKK0wK9iNgm4Z3dhBiguasKV2Fbn2TY\",\"email\":\"uocnv.soict.hust@gmail.com\",\"password\":\"uocnv1998\"}', '2020-05-31 18:02:58', '2020-05-31 18:02:58'),
(7, 5, 'admin', 'GET', '162.158.178.68', '[]', '2020-05-31 18:02:58', '2020-05-31 18:02:58'),
(8, 5, 'admin/voyager-assets', 'GET', '172.68.255.19', '{\"path\":\"images\\/logo-icon.png\"}', '2020-05-31 18:02:58', '2020-05-31 18:02:58'),
(9, 5, 'admin/voyager-assets', 'GET', '162.158.178.70', '{\"path\":\"js\\/app.js\"}', '2020-05-31 18:02:58', '2020-05-31 18:02:58'),
(10, 5, 'admin', 'GET', '172.68.253.184', '{\"fix-missing-storage-symlink\":\"1\"}', '2020-05-31 18:03:01', '2020-05-31 18:03:01'),
(11, NULL, 'admin/login', 'GET', '162.158.119.6', '[]', '2020-05-31 18:03:02', '2020-05-31 18:03:02'),
(12, NULL, 'admin/voyager-assets', 'GET', '162.158.118.237', '{\"path\":\"css\\/app.css\"}', '2020-05-31 18:03:04', '2020-05-31 18:03:04'),
(13, 5, 'news', 'GET', '172.68.253.184', '[]', '2020-05-31 18:03:10', '2020-05-31 18:03:10'),
(14, 5, 'news', 'GET', '162.158.178.26', '[]', '2020-05-31 18:18:35', '2020-05-31 18:18:35'),
(15, NULL, '/', 'HEAD', '162.158.106.155', '[]', '2020-05-31 18:19:19', '2020-05-31 18:19:19'),
(16, NULL, '/', 'GET', '162.158.78.183', '[]', '2020-05-31 18:19:19', '2020-05-31 18:19:19'),
(17, NULL, '/', 'GET', '108.162.245.133', '[]', '2020-05-31 18:19:20', '2020-05-31 18:19:20'),
(18, NULL, '/', 'GET', '108.162.246.136', '[]', '2020-05-31 18:19:27', '2020-05-31 18:19:27'),
(19, NULL, '/', 'GET', '162.158.78.183', '[]', '2020-05-31 18:19:31', '2020-05-31 18:19:31'),
(20, NULL, 'register', 'GET', '172.69.63.164', '[]', '2020-05-31 18:19:32', '2020-05-31 18:19:32'),
(21, NULL, 'login', 'GET', '162.158.78.161', '[]', '2020-05-31 18:19:35', '2020-05-31 18:19:35'),
(22, NULL, 'login', 'GET', '162.158.78.161', '[]', '2020-05-31 18:19:37', '2020-05-31 18:19:37'),
(23, NULL, 'dojos', 'GET', '172.69.62.253', '[]', '2020-05-31 18:19:40', '2020-05-31 18:19:40'),
(24, NULL, 'documents', 'GET', '172.68.65.169', '[]', '2020-05-31 18:19:45', '2020-05-31 18:19:45'),
(25, NULL, 'videos', 'GET', '172.69.63.250', '[]', '2020-05-31 18:19:47', '2020-05-31 18:19:47'),
(26, NULL, 'news', 'GET', '172.69.62.209', '[]', '2020-05-31 18:19:50', '2020-05-31 18:19:50'),
(27, NULL, 'home', 'GET', '172.69.63.200', '[]', '2020-05-31 18:19:52', '2020-05-31 18:19:52'),
(28, NULL, 'home', 'GET', '172.69.63.200', '[]', '2020-05-31 18:20:03', '2020-05-31 18:20:03'),
(29, NULL, 'videos/hean-shodan-bui-tuan-phuc-7-tuoi', 'GET', '172.68.65.193', '[]', '2020-05-31 18:20:04', '2020-05-31 18:20:04'),
(30, NULL, 'videos/kata-ca-nhan-nam-duoi-11-tuoi-ban-ket-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '162.158.78.55', '[]', '2020-05-31 18:20:09', '2020-05-31 18:20:09'),
(31, NULL, 'videos/kata-ca-nhan-nam-duoi-11-tuoi-tran-2-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '173.245.54.136', '[]', '2020-05-31 18:20:11', '2020-05-31 18:20:11'),
(32, NULL, 'videos/kata-ca-nhan-nam-duoi-11-tuoi-tran-1-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '162.158.79.22', '[]', '2020-05-31 18:20:13', '2020-05-31 18:20:13'),
(33, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '172.69.63.168', '[]', '2020-05-31 18:20:15', '2020-05-31 18:20:15'),
(34, NULL, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '162.158.78.55', '[]', '2020-05-31 18:20:17', '2020-05-31 18:20:17'),
(35, NULL, 'posts/doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '162.158.78.203', '[]', '2020-05-31 18:20:19', '2020-05-31 18:20:19'),
(36, NULL, 'videos/cuoi-tuan-khoi-dong-chut-nao', 'GET', '162.158.78.25', '[]', '2020-05-31 18:20:22', '2020-05-31 18:20:22'),
(37, NULL, 'videos/makiwara-handmade-by-league-dojo', 'GET', '172.69.63.220', '[]', '2020-05-31 18:20:24', '2020-05-31 18:20:24'),
(38, NULL, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '173.245.54.94', '[]', '2020-05-31 18:20:26', '2020-05-31 18:20:26'),
(39, NULL, 'videos/kumite-dong-doi-nam-chung-ket-tran-1-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '172.69.63.102', '[]', '2020-05-31 18:20:28', '2020-05-31 18:20:28'),
(40, 5, 'news', 'GET', '162.158.178.24', '[]', '2020-05-31 18:21:54', '2020-05-31 18:21:54'),
(41, 5, 'documents', 'GET', '162.158.178.24', '[]', '2020-05-31 18:22:48', '2020-05-31 18:22:48'),
(42, 5, 'documents/luat-thi-dau-karate-2019-ban-luu-hanh-noi-bo', 'GET', '162.158.178.24', '[]', '2020-05-31 18:22:55', '2020-05-31 18:22:55'),
(43, NULL, 'documents/luat-thi-dau-karate-2019-ban-luu-hanh-noi-bo', 'GET', '172.69.71.83', '[]', '2020-05-31 18:23:40', '2020-05-31 18:23:40'),
(44, NULL, 'documents/luat-thi-dau-karate-2019-ban-luu-hanh-noi-bo', 'GET', '108.162.221.213', '[]', '2020-05-31 18:23:40', '2020-05-31 18:23:40'),
(45, NULL, 'documents/luat-thi-dau-karate-2019-ban-luu-hanh-noi-bo', 'GET', '172.69.69.207', '[]', '2020-05-31 18:23:41', '2020-05-31 18:23:41'),
(46, 5, 'videos', 'GET', '162.158.178.214', '[]', '2020-05-31 18:23:52', '2020-05-31 18:23:52'),
(47, 5, 'videos', 'GET', '162.158.178.24', '{\"page\":\"2\"}', '2020-05-31 18:23:59', '2020-05-31 18:23:59'),
(48, 5, 'videos', 'GET', '162.158.178.24', '{\"page\":\"3\"}', '2020-05-31 18:24:00', '2020-05-31 18:24:00'),
(49, 5, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '162.158.178.24', '[]', '2020-05-31 18:24:04', '2020-05-31 18:24:04'),
(50, 5, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '162.158.178.24', '{\"page\":\"2\"}', '2020-05-31 18:24:07', '2020-05-31 18:24:07'),
(51, NULL, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.69.207', '[]', '2020-05-31 18:24:29', '2020-05-31 18:24:29'),
(52, NULL, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.71.83', '[]', '2020-05-31 18:24:29', '2020-05-31 18:24:29'),
(53, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.69.129', '[]', '2020-05-31 18:24:30', '2020-05-31 18:24:30'),
(54, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '108.162.221.69', '[]', '2020-05-31 18:24:30', '2020-05-31 18:24:30'),
(55, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.69.207', '[]', '2020-05-31 18:24:31', '2020-05-31 18:24:31'),
(56, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.69.27', '[]', '2020-05-31 18:24:32', '2020-05-31 18:24:32'),
(57, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.71.155', '[]', '2020-05-31 18:24:32', '2020-05-31 18:24:32'),
(58, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.69.129', '[]', '2020-05-31 18:24:35', '2020-05-31 18:24:35'),
(59, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '108.162.221.69', '[]', '2020-05-31 18:24:36', '2020-05-31 18:24:36'),
(60, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.71.77', '[]', '2020-05-31 18:24:36', '2020-05-31 18:24:36'),
(61, NULL, 'posts/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '172.69.69.27', '[]', '2020-05-31 18:24:36', '2020-05-31 18:24:36'),
(62, NULL, '/', 'GET', '172.69.71.55', '[]', '2020-05-31 18:24:36', '2020-05-31 18:24:36'),
(63, 5, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '162.158.178.24', '[]', '2020-05-31 18:26:01', '2020-05-31 18:26:01'),
(64, 5, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '162.158.178.24', '{\"page\":\"2\"}', '2020-05-31 18:26:11', '2020-05-31 18:26:11'),
(65, 5, 'videos/bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 'GET', '162.158.178.24', '[]', '2020-05-31 18:26:51', '2020-05-31 18:26:51'),
(66, 5, 'dojos', 'GET', '162.158.178.24', '[]', '2020-05-31 18:27:25', '2020-05-31 18:27:25'),
(67, 5, 'dojos/karate-league-dojo', 'GET', '162.158.178.24', '[]', '2020-05-31 18:27:27', '2020-05-31 18:27:27'),
(68, NULL, '/', 'GET', '162.158.7.22', '[]', '2020-05-31 18:27:58', '2020-05-31 18:27:58'),
(69, NULL, 'dojos', 'GET', '162.158.7.22', '[]', '2020-05-31 18:28:06', '2020-05-31 18:28:06'),
(70, NULL, 'dojos/karate-league-dojo', 'GET', '162.158.6.249', '[]', '2020-05-31 18:28:14', '2020-05-31 18:28:14'),
(71, NULL, 'categories/thong-tin-tuyen-sinh', 'GET', '162.158.7.58', '[]', '2020-05-31 18:28:24', '2020-05-31 18:28:24'),
(72, NULL, 'news', 'GET', '162.158.6.249', '[]', '2020-05-31 18:28:36', '2020-05-31 18:28:36'),
(73, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.144', '[]', '2020-05-31 18:29:05', '2020-05-31 18:29:05'),
(74, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '172.69.71.155', '[]', '2020-05-31 18:29:46', '2020-05-31 18:29:46'),
(75, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '172.69.71.155', '[]', '2020-05-31 18:29:47', '2020-05-31 18:29:47'),
(76, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.144', '[]', '2020-05-31 18:30:30', '2020-05-31 18:30:30'),
(77, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.144', '[]', '2020-05-31 18:30:39', '2020-05-31 18:30:39'),
(78, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.144', '[]', '2020-05-31 18:31:25', '2020-05-31 18:31:25'),
(79, NULL, 'login', 'GET', '162.158.7.144', '[]', '2020-05-31 18:31:29', '2020-05-31 18:31:29'),
(80, NULL, 'login', 'POST', '162.158.7.144', '{\"_token\":\"S4BthT5OmrxnJ2B666FEWcHRSkEWNgL3Pusb7zuK\",\"email\":\"uocnv.soict.hust@gmail.com\",\"password\":\"uocnv1998\",\"remember\":\"on\"}', '2020-05-31 18:31:43', '2020-05-31 18:31:43'),
(81, 5, 'home', 'GET', '162.158.7.162', '[]', '2020-05-31 18:31:43', '2020-05-31 18:31:43'),
(82, 5, 'admin', 'GET', '162.158.7.58', '[]', '2020-05-31 18:32:19', '2020-05-31 18:32:19'),
(83, 5, 'admin/voyager-assets', 'GET', '162.158.7.208', '{\"path\":\"css\\/app.css\"}', '2020-05-31 18:32:20', '2020-05-31 18:32:20'),
(84, 5, 'admin/voyager-assets', 'GET', '162.158.6.243', '{\"path\":\"images\\/logo-icon.png\"}', '2020-05-31 18:32:20', '2020-05-31 18:32:20'),
(85, 5, 'admin/voyager-assets', 'GET', '162.158.7.136', '{\"path\":\"js\\/app.js\"}', '2020-05-31 18:32:20', '2020-05-31 18:32:20'),
(86, 5, 'admin/voyager-assets', 'GET', '162.158.7.120', '{\"path\":\"fonts\\/voyager.woff\"}', '2020-05-31 18:32:21', '2020-05-31 18:32:21'),
(87, 5, 'admin/posts', 'GET', '162.158.7.58', '[]', '2020-05-31 18:32:43', '2020-05-31 18:32:43'),
(88, 5, 'admin/posts/3/edit', 'GET', '162.158.7.58', '[]', '2020-05-31 18:32:58', '2020-05-31 18:32:58'),
(89, 5, 'admin/voyager-assets', 'GET', '162.158.6.207', '{\"path\":\"js\\/skins\\/voyager\\/skin.min.css\"}', '2020-05-31 18:33:00', '2020-05-31 18:33:00'),
(90, 5, 'admin/voyager-assets', 'GET', '162.158.6.219', '{\"path\":\"js\\/skins\\/voyager\\/content.min.css\"}', '2020-05-31 18:33:00', '2020-05-31 18:33:00'),
(91, 5, 'admin/voyager-assets', 'GET', '162.158.7.218', '{\"path\":\"js\\/skins\\/voyager\\/fonts\\/tinymce.woff\"}', '2020-05-31 18:33:00', '2020-05-31 18:33:00'),
(92, 5, 'admin/posts/3/edit', 'GET', '162.158.7.58', '[]', '2020-05-31 18:34:05', '2020-05-31 18:34:05'),
(93, 5, 'admin/posts/clone-fields', 'POST', '162.158.7.58', '{\"divCount\":2}', '2020-05-31 18:35:19', '2020-05-31 18:35:19'),
(94, 5, 'admin/posts/3', 'PUT', '162.158.7.58', '{\"_method\":\"PUT\",\"_token\":\"Q971kERuNzBkCujtbEvwKYPGOaloVgbz4QK9DQjj\",\"title\":\"Th\\u00f4ng tin tuy\\u1ec3n sinh Karate N\\u00f4ng Nghi\\u1ec7p - K.L.D\",\"excerpt\":null,\"body\":\"<p><strong><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">KHI THAM GIA CLB C&Aacute;C B\\u1ea0N L&Agrave; TH&Agrave;NH VI&Ecirc;N V&Otilde; \\u0110\\u01af\\u1edcNG S\\u1ebc \\u0110\\u01af\\u1ee2C \\u01afU TI&Ecirc;N C\\u1ed8NG \\u0110I\\u1ec2M H\\u1eccC GDTC C&Aacute;C M&Ocirc;N H\\u1eccC NH\\u01af : C\\u1ea6U L&Ocirc;NG, \\u0110I\\u1ec0N KINH, TENIS.....<\\/span><\\/strong><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png\');\\\">\\ud83d\\udc49<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Mi\\u1ec5n ph&iacute; h\\u1ecdc th\\u1eed tr\\u01b0\\u1edbc khi \\u0111\\u0103ng k&yacute; t\\u1eadp luy\\u1ec7n.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t38\\/1\\/16\\/1f44a_1f3ff.png\');\\\">\\ud83d\\udc4a\\ud83c\\udfff<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">T\\u1eb7ng ngay 01 b\\u1ed9 v&otilde; ph\\u1ee5c tr\\u1ecb gi&aacute; 250.000 k&egrave;m logo v&otilde; \\u0111\\u01b0\\u1eddng khi \\u0111&oacute;ng h\\u1ecdc ph&iacute; 6 th&aacute;ng.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t5d\\/1\\/16\\/1f3d6.png\');\\\">\\ud83c\\udfd6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Tham gia c&aacute;c ch\\u01b0\\u01a1ng tr&igrave;nh sinh nh\\u1eadt , li&ecirc;n hoan , picnic ngo\\u1ea1i kho&aacute;...<\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" title=\\\"Ch\\u1ecb em ph\\u1ee5 n\\u1eef t\\u1ed5 ch\\u1ee9c 6\\/4\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"Ch\\u1ecb em ph\\u1ee5 n\\u1eef t\\u1ed5 ch\\u1ee9c 6\\/4\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">V&agrave; t\\u1eadn h\\u01b0\\u1edfng kh&ocirc;ng kh&iacute; t\\u1eadp luy\\u1ec7n h\\u0103ng say v&agrave; cu\\u1ed3ng l\\u1eeda t\\u1ea1i c&acirc;u l\\u1ea1c b\\u1ed9:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img title=\\\"Kh&ocirc;ng kh&iacute; t\\u1eadp luy\\u1ec7n h\\u0103ng say c\\u1ee7a c&aacute;c v&otilde; sinh\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"Kh&ocirc;ng kh&iacute; t\\u1eadp luy\\u1ec7n h\\u0103ng say c\\u1ee7a c&aacute;c v&otilde; sinh\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/posts\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" alt=\\\"\\\" width=\\\"47%\\\" \\/> &nbsp;<img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/posts\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"47%\\\" \\/><\\/span><\\/p>\\r\\n<p><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tbe\\/1\\/16\\/1f3c6.png\');\\\">\\ud83c\\udfc6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">\\u0110\\u01b0\\u1ee3c \\u0111\\u1ea1i di\\u1ec7n cho tr\\u01b0\\u1eddng tham gia thi \\u0111\\u1ea5u c&aacute;c g\\u1ea3i Karate sinh vi&ecirc;n c\\u1ea5p th&agrave;nh ph\\u1ed1 , to&agrave;n qu\\u1ed1c....<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img title=\\\"Tham gia gi\\u1ea3i v&ocirc; \\u0111\\u1ecbch Karate \\u0110H C&ocirc;ng \\u0111o&agrave;n m\\u1edf r\\u1ed9ng\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"Tham gia gi\\u1ea3i v&ocirc; \\u0111\\u1ecbch Karate \\u0110H C&ocirc;ng \\u0111o&agrave;n m\\u1edf r\\u1ed9ng\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/posts\\/December2019\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"\\\" width=\\\"80%\\\" \\/><\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br \\/>Karate N&ocirc;ng Ngi\\u1ec7p - K.L.D<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span>N\\u01a0I H\\u1ed8I T\\u1ee4 \\u0110AM M&Ecirc;&nbsp;<span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t34\\/1\\/16\\/23f0.png\');\\\">\\u23f0<\\/span><\\/span>&nbsp;: 19h - 20h30\' Th\\u1ee9 2 v&agrave; Th\\u1ee9 5 h&agrave;ng tu\\u1ea7n<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/te1\\/1\\/16\\/26e9.png\');\\\">\\u26e9<\\/span><\\/span>&nbsp;:Nh&agrave; th\\u1ec3 ch\\u1ea5t HVNN Vi\\u1ec7t Nam<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t22\\/1\\/16\\/260e.png\');\\\">\\u260e\\ufe0f<\\/span><\\/span> :Li&ecirc;n h\\u1ec7 : 0942332444<\\/span><\\/p>\",\"slug\":\"thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d\",\"status\":\"PUBLISHED\",\"category_id\":\"3\",\"source\":\"Karate N\\u00f4ng Nghi\\u1ec7p\",\"featured\":\"on\",\"keywords\":[\"tuy\\u1ec3n sinh\",\"hvnn\"],\"meta_description\":\"Ho\\u1ea1t \\u0111\\u1ed9ng tuy\\u1ec3n sinh \\u0111\\u01b0\\u1ee3c di\\u1ec5n ra th\\u01b0\\u1eddng xuy\\u00ean. C\\u00e1c b\\u1ea1n c\\u00f3 th\\u1ec3 li\\u00ean h\\u1ec7 v\\u00e0 \\u0111ang k\\u00fd t\\u1eadp luy\\u1ec7n ngay khi c\\u00f3 th\\u1ec3\",\"meta_keywords\":\"tuy\\u1ec3n sinh, karate n\\u00f4ng nghi\\u1ec7p\",\"seo_title\":\"Th\\u00f4ng tin tuy\\u1ec3n sinh Karate N\\u00f4ng Nghi\\u1ec7p - K.L.D\"}', '2020-05-31 18:36:34', '2020-05-31 18:36:34'),
(95, 5, 'admin/posts', 'GET', '162.158.7.58', '[]', '2020-05-31 18:36:34', '2020-05-31 18:36:34'),
(96, 5, 'admin/posts/3/edit', 'GET', '162.158.7.58', '[]', '2020-05-31 18:36:42', '2020-05-31 18:36:42'),
(97, 5, 'admin/posts/1/edit', 'GET', '162.158.7.58', '[]', '2020-05-31 18:37:01', '2020-05-31 18:37:01'),
(98, 5, 'admin/posts/1', 'PUT', '162.158.7.70', '{\"_method\":\"PUT\",\"_token\":\"Q971kERuNzBkCujtbEvwKYPGOaloVgbz4QK9DQjj\",\"title\":\"\\u0110o\\u00e0n Karate League Dojo \\u0111\\u00e3 \\u0111\\u1ea1t k\\u1ebft qu\\u1ea3 t\\u1ed1t t\\u1ea1i gi\\u1ea3i V\\u00f4 \\u0111\\u1ecbch Karate \\u0110\\u1ea1i h\\u1ecdc C\\u00f4ng \\u0111o\\u00e0n m\\u1edf r\\u1ed9ng l\\u1ea7n th\\u1ee9 2\",\"excerpt\":\"Gi\\u1ea3i v\\u00f4 \\u0111\\u1ecbch Karate \\u0110\\u1ea1i h\\u1ecdc C\\u00f4ng \\u0110o\\u00e0n m\\u1edf r\\u1ed9ng l\\u1ea7n th\\u1ee9 2 di\\u1ec5n ra trong 2 ng\\u00e0y 7-8\\/4\\/2019 \\u0111\\u01b0\\u1ee3c t\\u1ed5 ch\\u1ee9c t\\u1ea1i tr\\u01b0\\u1eddng \\u0110\\u1ea1i h\\u1ecdc C\\u00f4ng \\u0110o\\u00e0n. Tham gia gi\\u1ea3i \\u0111\\u1ea5u v\\u1edbi tinh th\\u1ea7n giao l\\u01b0u, h\\u1ecdc h\\u1ecfi v\\u00e0 th\\u1ec3 hi\\u1ec7n b\\u1ea3n th\\u00e2n, \\u0111o\\u00e0n V\\u0110V Karate League Dojo \\u0111\\u00e3 \\u0111\\u1ea1t \\u0111\\u01b0\\u1ee3c nh\\u1eefng th\\u00e0nh t\\u00edch cao.\",\"body\":\"<p style=\\\"text-align: left;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">K\\u1ebft th&uacute;c gi\\u1ea3i V&ocirc; \\u0111\\u1ecbch Karate \\u0110\\u1ea1i h\\u1ecdc C&ocirc;ng \\u0111o&agrave;n m\\u1edf r\\u1ed9ng l\\u1ea7n th\\u1ee9 2, \\u0110o&agrave;n Karate League Dojo \\u0111&atilde; gi&agrave;nh \\u0111\\u01b0\\u1ee3c c&aacute;c gi\\u1ea3i:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: left;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><a href=\\\"https:\\/\\/www.youtube.com\\/watch?v=vSzKprJ4VFU\\\">https:\\/\\/www.youtube.com\\/watch?v=vSzKprJ4VFU<\\/a><\\/span><\\/p>\\r\\n<figure class=\\\"image\\\" style=\\\"text-align: center;\\\"><img title=\\\"Team Kata xu\\u1ea5t s\\u1eafc gi&agrave;nh huy ch\\u01b0\\u01a1ng b\\u1ea1c h\\u1ed9i dung Kata \\u0111\\u1ed3ng \\u0111\\u1ed9i h\\u1ed7n h\\u1ecdp tr&ecirc;n 16 tu\\u1ed5i\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/December2019\\/IMG_2982.JPG\\\" alt=\\\"Team Kata xu\\u1ea5t s\\u1eafc gi&agrave;nh huy ch\\u01b0\\u01a1ng b\\u1ea1c h\\u1ed9i dung Kata \\u0111\\u1ed3ng \\u0111\\u1ed9i h\\u1ed7n h\\u1ecdp tr&ecirc;n 16 tu\\u1ed5i\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/>\\r\\n<figcaption><br \\/>Team Kata xu\\u1ea5t s\\u1eafc gi&agrave;nh huy ch\\u01b0\\u01a1ng b\\u1ea1c h\\u1ed9i dung Kata \\u0111\\u1ed3ng \\u0111\\u1ed9i h\\u1ed7n h\\u1ecdp tr&ecirc;n 16 tu\\u1ed5i<\\/figcaption>\\r\\n<\\/figure>\\r\\n<p style=\\\"text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t15\\/1\\/16\\/1f948.png?_nc_eui2=AeFk2JIaZidjHIE__PG6Gf9jdPaRDpku-vezgfSs3_SmI7wRmctplp0KYWoks5dS-yUUakwA1KuTKg3v-p_2wbTL-8JaDbNxAP01B3EW9nCocg\');\\\">\\ud83e\\udd48<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">HCB n\\u1ed9i dung Kumite \\u0111\\u1ed3ng \\u0111\\u1ed9i nam tr&ecirc;n 18 tu\\u1ed5i<\\/span><\\/p>\\r\\n<figure class=\\\"image\\\" style=\\\"text-align: center;\\\"><img title=\\\"Team Kumite c\\u0169ng xu\\u1ea5t s\\u1eafc gi&agrave;nh t\\u1ea5m huy ch\\u01b0\\u01a1ng b\\u1ea1c t\\u1ea1i n\\u1ed9i dung kumite \\u0111\\u1ed3ng \\u0111\\u1ed9i nam tr&ecirc;n 16 tu\\u1ed1i\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/December2019\\/56599791_2798086877083473_1095563444729413632_o.jpg\\\" alt=\\\"Team Kumite c\\u0169ng xu\\u1ea5t s\\u1eafc gi&agrave;nh t\\u1ea5m huy ch\\u01b0\\u01a1ng b\\u1ea1c t\\u1ea1i n\\u1ed9i dung kumite \\u0111\\u1ed3ng \\u0111\\u1ed9i nam tr&ecirc;n 16 tu\\u1ed1i\\\" width=\\\"70%\\\" height=\\\"auto\\\" \\/>\\r\\n<figcaption><br \\/>Team Kumite c\\u0169ng xu\\u1ea5t s\\u1eafc gi&agrave;nh t\\u1ea5m huy ch\\u01b0\\u01a1ng b\\u1ea1c t\\u1ea1i n\\u1ed9i dung kumite \\u0111\\u1ed3ng \\u0111\\u1ed9i nam tr&ecirc;n 16 tu\\u1ed1i<\\/figcaption>\\r\\n<\\/figure>\\r\\n<p style=\\\"text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t15\\/1\\/16\\/1f948.png?_nc_eui2=AeFk2JIaZidjHIE__PG6Gf9jdPaRDpku-vezgfSs3_SmI7wRmctplp0KYWoks5dS-yUUakwA1KuTKg3v-p_2wbTL-8JaDbNxAP01B3EW9nCocg\');\\\">\\ud83e\\udd48<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">HCB n\\u1ed9i dung Kata \\u0111\\u1ed3ng \\u0111\\u1ed9i h\\u1ed7n h\\u1ee3p tr&ecirc;n 16 tu\\u1ed5i<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t96\\/1\\/16\\/1f949.png?_nc_eui2=AeHHuN-1MpIbQkMzACBa_M2IAx6xcC6roH_oUHIaJti-LRng79OCmYb7XsRoG1oGjwNhVTMtqHOUHSTpdCYWPQWbmRDHzI3wDDDS6EOCWCxqXg\');\\\">\\ud83e\\udd49<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">HC\\u0110 c&aacute;c n\\u1ed9i dung c&aacute; nh&acirc;n bao g\\u1ed3m:<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\\\">\\ud83d\\udc49<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Kumite c&aacute; nh&acirc;n nam tr&ecirc;n 18 tu\\u1ed5i c&aacute;c h\\u1ea1ng c&acirc;n d\\u01b0\\u1edbi 55kg, tr&ecirc;n 75kg;<\\/span><span class=\\\"text_exposed_show\\\" style=\\\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\\\">\\ud83d\\udc49<\\/span><\\/span>Kumite c&aacute; nh&acirc;n n\\u1eef tr&ecirc;n 18 tu\\u1ed5i h\\u1ea1ng c&acirc;n d\\u01b0\\u1edbi 44kg;<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\\\">\\ud83d\\udc49<\\/span><\\/span>Kumite c&aacute; nh&acirc;n nam 9-11 tu\\u1ed5i c&aacute;c h\\u1ea1ng c&acirc;n d\\u01b0\\u1edbi 30kg, tr&ecirc;n 44kg ;<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\\\">\\ud83d\\udc49<\\/span><\\/span>Kata c&aacute; nh&acirc;n n\\u1eef d\\u01b0\\u1edbi 11 tu\\u1ed5i;<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\\\">\\ud83d\\udc49<\\/span><\\/span>Kata c&aacute; nh&acirc;n nam d\\u01b0\\u1edbi 11 tu\\u1ed5i<\\/span><\\/p>\",\"slug\":\"doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2\",\"status\":\"PUBLISHED\",\"category_id\":\"2\",\"source\":\"Karate League Dojo\",\"featured\":\"on\",\"keywords\":[\"tuy\\u1ec3n sinh\",\"HVNN\"],\"meta_description\":\"Gi\\u1ea3i v\\u00f4 \\u0111\\u1ecbch Karate \\u0110\\u1ea1i h\\u1ecdc C\\u00f4ng \\u0110o\\u00e0n m\\u1edf r\\u1ed9ng l\\u1ea7n th\\u1ee9 2 di\\u1ec5n ra trong 2 ng\\u00e0y 7-8\\/4\\/2019 \\u0111\\u01b0\\u1ee3c t\\u1ed5 ch\\u1ee9c t\\u1ea1i tr\\u01b0\\u1eddng \\u0110\\u1ea1i h\\u1ecdc C\\u00f4ng \\u0110o\\u00e0n. Tham gia gi\\u1ea3i \\u0111\\u1ea5u v\\u1edbi tinh th\\u1ea7n giao l\\u01b0u, h\\u1ecdc h\\u1ecfi v\\u00e0 th\\u1ec3 hi\\u1ec7n b\\u1ea3n th\\u00e2n, \\u0111o\\u00e0n V\\u0110V Karate League Dojo \\u0111\\u00e3 \\u0111\\u1ea1t \\u0111\\u01b0\\u1ee3c nh\\u1eefng th\\u00e0nh t\\u00edch cao.\",\"meta_keywords\":\"v\\u00f4 \\u0111\\u1ecbch karate, \\u0111\\u1ea1i h\\u1ecdc c\\u00f4ng \\u0111o\\u00e0n\",\"seo_title\":\"\\u0110o\\u00e0n Karate League Dojo \\u0111\\u00e3 \\u0111\\u1ea1t k\\u1ebft qu\\u1ea3 t\\u1ed1t t\\u1ea1i gi\\u1ea3i V\\u00f4 \\u0111\\u1ecbch Karate \\u0110\\u1ea1i h\\u1ecdc C\\u00f4ng \\u0111o\\u00e0n m\\u1edf r\\u1ed9ng l\\u1ea7n th\\u1ee9 2\"}', '2020-05-31 18:38:10', '2020-05-31 18:38:10'),
(99, 5, 'admin/posts', 'GET', '162.158.7.70', '[]', '2020-05-31 18:38:10', '2020-05-31 18:38:10'),
(100, 5, 'admin/posts/2/edit', 'GET', '162.158.7.70', '[]', '2020-05-31 18:38:18', '2020-05-31 18:38:18'),
(101, 5, 'admin/posts/clone-fields', 'POST', '162.158.7.70', '{\"divCount\":3}', '2020-05-31 18:38:56', '2020-05-31 18:38:56'),
(102, 5, 'admin/posts/2', 'PUT', '162.158.7.70', '{\"_method\":\"PUT\",\"_token\":\"Q971kERuNzBkCujtbEvwKYPGOaloVgbz4QK9DQjj\",\"title\":\"Th\\u00f4ng tin tuy\\u1ec3n sinh v\\u00f5 \\u0111\\u01b0\\u1eddng Karate League Dojo\",\"excerpt\":\"V\\u1edb\\u00ec nh\\u1eefng b\\u1eadc ph\\u1ee5 huynh quan t\\u00e2m t\\u1edbi gi\\u00e1o d\\u1ee5c con c\\u00e1i th\\u00ec s\\u1ebd lu\\u00f4n bi\\u1ebft r\\u1eb1ng b\\u00ean c\\u1ea1nh g\\u00ec\\u00e2o d\\u1ee5c tri th\\u1ee9c l\\u00e0 gi\\u00e1o d\\u1ee5c th\\u1ec3 ch\\u1ea5t kh\\u00f4ng th\\u1ec3 thi\\u1ebfu trong qu\\u00e1 tr\\u00ecnh gi\\u00e1o d\\u1ee5c v\\u00e0 h\\u1ecdc t\\u1eadp c\\u1ee7a con c\\u00e1i. \\u1ede tu\\u1ed5i n\\u00e0y, tr\\u1ebb \\u0111\\u01b0\\u1ee3c v\\u1eadn \\u0111\\u1ed9ng \\u0111\\u00fang c\\u00e1ch s\\u1ebd ph\\u00e1t tri\\u1ec3n t\\u00e2m sinh l\\u00fd theo \\u0111\\u00fang di\\u1ec5n bi\\u1ec3n t\\u1ed1t. V\\u1edbi nhi\\u1ec1u n\\u0103m kinh nghi\\u1ec7m thi \\u0111\\u1ea5u, hu\\u1ea5n luy\\u1ec7n v\\u00e0 gi\\u1ea3ng d\\u1ea1y m\\u00f4n v\\u00f5 Karatedo c\\u00e1c HLV s\\u1ebd trau \\u0111\\u1ed5i tinh th\\u1ea7n th\\u01b0\\u1ee3ng v\\u00f5 NH\\u00c2N - NGH\\u0128A - L\\u1ec4 -TR\\u00cd - T\\u00cdN.\\r\\nH\\u00e3y nhanh tay \\u0111\\u0103ng k\\u00fd n\\u00e0o!\",\"body\":\"<p style=\\\"margin: 6px 0px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\">V&otilde; \\u0111\\u01b0\\u1eddng League dojo th&ocirc;ng b&aacute;o tuy\\u1ec3n sinh c&aacute;c b\\u1ea1n thi\\u1ebfu nhi t\\u1eeb 4 tu\\u1ed5i tr\\u1edf l&ecirc;n y&ecirc;u th&iacute;ch v\\u1eadn \\u0111\\u1ed9ng, ph&aacute;t tri\\u1ec3n th\\u1ec3 ch\\u1ea5t n&acirc;ng cao s\\u1ee9c kh\\u1ecfe, h\\u1ecdc t\\u1eadp \\u0111\\u1ea1o \\u0111\\u1ee9c, th\\u01b0 gi&atilde;n sau gi\\u01a1 h\\u1ecdc v\\u0103n h&oacute;a c\\u0103ng th\\u1eb3ng.<\\/p>\\r\\n<p style=\\\"margin: 6px 0px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\\\">\\ud83d\\udc49<\\/span><\\/span>\\u0110\\u1ecba \\u0111i\\u1ec3m: League dojo - s\\u1ea3nh 1 \\u0110\\u01a1n nguy&ecirc;n 2 CT3 khu \\u0111&ocirc; th\\u1ecb m\\u1edbi Trung V\\u0103n - Nam T\\u1eeb Li&ecirc;m - .H&agrave; N\\u1ed9i.<\\/p>\\r\\n<div class=\\\"text_exposed_show\\\" style=\\\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\">\\r\\n<p style=\\\"margin: 0px 0px 6px; font-family: inherit;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tb7\\/1\\/16\\/1f917.png?_nc_eui2=AeGkTF_qKg6ex4RK4ZOcxycPmqT5dC5g8P4UHrVwXu88rHruuEBEltugQZJ1EjEQX6p1S3tMWSV2UP9TuHQ29obRCbLPcapBa_1QV3X6iBezgg\');\\\">\\ud83e\\udd17<\\/span><\\/span>L\\u1edbp 01: 17h30-19h th\\u1ee9 3 v&agrave; th\\u1ee9 6 h&agrave;ng tu\\u1ea7n.<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tb7\\/1\\/16\\/1f917.png?_nc_eui2=AeGkTF_qKg6ex4RK4ZOcxycPmqT5dC5g8P4UHrVwXu88rHruuEBEltugQZJ1EjEQX6p1S3tMWSV2UP9TuHQ29obRCbLPcapBa_1QV3X6iBezgg\');\\\">\\ud83e\\udd17<\\/span><\\/span>L\\u1edbp 02: 17h30-19h th\\u1ee9 4 v&agrave; th\\u1ee9 7 h&agrave;ng tu\\u1ea7n<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t0\\/1\\/16\\/1f60b.png?_nc_eui2=AeHmHQa5DQPoqhXBvNHfmB4AuFMMUEBchYZqBF1Zh_FRQ0SlafeBJ-0d__y7dgy4tw4ZBF5Y9Qkli72j2W-DCRtNRLC4q-YKiq4fzoRxG_2zCw\');\\\">\\ud83d\\ude0b<\\/span><\\/span>L\\u1edbp 03:17h30- 19h th\\u1ee9 2 v&agrave; th\\u1ee9 5 h&agrave;ng tu\\u1ea7n<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t2\\/1\\/16\\/1f60d.png?_nc_eui2=AeFB-OA4TKZtFFFm1OMnW-ySTXtuEZ2uPeYwBnuSfYTq-8vApVoG075NTEOdL4BfMKtI3b63mQYPEJQmmJs7HcT9Yro_113vDJ4cufjBR-i6AA\');\\\">\\ud83d\\ude0d<\\/span><\\/span>L\\u1edbp 04:7h30- 9h s&aacute;ng th\\u1ee9 7 v&agrave; ch\\u1ee7 nh\\u1eadt h&agrave;ng tu\\u1ea7n<\\/p>\\r\\n<p style=\\\"margin: 6px 0px; font-family: inherit;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t33\\/1\\/16\\/2705.png?_nc_eui2=AeFls8t9Jw9u3CTdmnqSdxPtglbtifYtqQ1i1fBnisvBY7JJQNdtquReoMSG1Fof4eD4Cwh87Ymt0532u7qjCrMF_L3uJ9zXhdodvhXwhNtsSA\');\\\">\\u2705<\\/span><\\/span>V\\u1edb&igrave; nh\\u1eefng b\\u1eadc ph\\u1ee5 huynh quan t&acirc;m t\\u1edbi gi&aacute;o d\\u1ee5c con c&aacute;i th&igrave; s\\u1ebd lu&ocirc;n bi\\u1ebft r\\u1eb1ng b&ecirc;n c\\u1ea1nh g&igrave;&acirc;o d\\u1ee5c tri th\\u1ee9c l&agrave; gi&aacute;o d\\u1ee5c th\\u1ec3 ch\\u1ea5t kh&ocirc;ng th\\u1ec3 thi\\u1ebfu trong qu&aacute; tr&igrave;nh gi&aacute;o d\\u1ee5c v&agrave; h\\u1ecdc t\\u1eadp c\\u1ee7a con c&aacute;i. \\u1ede tu\\u1ed5i n&agrave;y, tr\\u1ebb \\u0111\\u01b0\\u1ee3c v\\u1eadn \\u0111\\u1ed9ng \\u0111&uacute;ng c&aacute;ch s\\u1ebd ph&aacute;t tri\\u1ec3n t&acirc;m sinh l&yacute; theo \\u0111&uacute;ng di\\u1ec5n bi\\u1ec3n t\\u1ed1t. V\\u1edbi nhi\\u1ec1u n\\u0103m kinh nghi\\u1ec7m thi \\u0111\\u1ea5u, hu\\u1ea5n luy\\u1ec7n v&agrave; gi\\u1ea3ng d\\u1ea1y m&ocirc;n v&otilde; Karatedo c&aacute;c HLV s\\u1ebd trau \\u0111\\u1ed5i tinh th\\u1ea7n th\\u01b0\\u1ee3ng v&otilde; NH&Acirc;N - NGH\\u0128A - L\\u1ec4 -TR&Iacute; - T&Iacute;N.<\\/p>\\r\\n<p style=\\\"margin: 6px 0px; font-family: inherit; text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t33\\/1\\/16\\/2705.png?_nc_eui2=AeFls8t9Jw9u3CTdmnqSdxPtglbtifYtqQ1i1fBnisvBY7JJQNdtquReoMSG1Fof4eD4Cwh87Ymt0532u7qjCrMF_L3uJ9zXhdodvhXwhNtsSA\');\\\">\\u2705<\\/span><\\/span>V&otilde; \\u0111\\u01b0\\u1eddng v\\u1edbi trang thi\\u1ebft b\\u1ecb hi\\u1ec7n \\u0111\\u1ea1i, ti&ecirc;u chu\\u1ea9n ph&ograve;ng t\\u1eadp \\u0111\\u1ed9i tuy\\u1ebfn s\\u1ebd mang \\u0111\\u1ebfn nh\\u1eefng \\u0111i\\u1ec7u t\\u1ed1t nh\\u1ea5t gi&agrave;nh cho c&aacute;c v&otilde; sinh.<\\/p>\\r\\n<\\/div>\\r\\n<figure class=\\\"image\\\" style=\\\"text-align: center;\\\"><img title=\\\"V&otilde; \\u0111\\u01b0\\u1eddng Karate League Dojo v\\u1edbi trang thi\\u1ebft b\\u1ecb hi\\u1ec7n \\u0111\\u1ea1i\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/37022211_2573406232884873_3193762549166243840_o1.jpg\\\" alt=\\\"V&otilde; \\u0111\\u01b0\\u1eddng Karate League Dojo v\\u1edbi trang thi\\u1ebft b\\u1ecb hi\\u1ec7n \\u0111\\u1ea1i\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/>\\r\\n<figcaption><br \\/>V&otilde; \\u0111\\u01b0\\u1eddng Karate League Dojo v\\u1edbi trang thi\\u1ebft b\\u1ecb hi\\u1ec7n \\u0111\\u1ea1i<\\/figcaption>\\r\\n<\\/figure>\\r\\n<div class=\\\"text_exposed_show\\\" style=\\\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\">\\r\\n<p style=\\\"margin: 6px 0px; font-family: inherit; text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tac\\/1\\/16\\/1f64b_200d_2642.png?_nc_eui2=AeExf-QcVUGdm5j6A_eNYrQlLA1i03QDuKeRmKqU6-gJ7I1KJ2lt8yA13Di6cnh4D6GNGVJbwepYBPMgFpMXxkSHfL65be8X_TAHotcFW9t64A\');\\\">\\ud83d\\ude4b&zwj;\\u2642\\ufe0f<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tac\\/1\\/16\\/1f64b_200d_2642.png?_nc_eui2=AeExf-QcVUGdm5j6A_eNYrQlLA1i03QDuKeRmKqU6-gJ7I1KJ2lt8yA13Di6cnh4D6GNGVJbwepYBPMgFpMXxkSHfL65be8X_TAHotcFW9t64A\');\\\">\\ud83d\\ude4b&zwj;\\u2642\\ufe0f<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tac\\/1\\/16\\/1f64b_200d_2642.png?_nc_eui2=AeExf-QcVUGdm5j6A_eNYrQlLA1i03QDuKeRmKqU6-gJ7I1KJ2lt8yA13Di6cnh4D6GNGVJbwepYBPMgFpMXxkSHfL65be8X_TAHotcFW9t64A\');\\\">\\ud83d\\ude4b&zwj;\\u2642\\ufe0f<\\/span><\\/span>&nbsp;HLV Tr\\u1ea7n M\\u1ea1nh D\\u0169ng: huy\\u1ec5n \\u0111ai \\u0111\\u1ec7 tam \\u0111\\u1eb3ng Karatedo, c\\u1ef1u V\\u0110V \\u0111\\u1ed9i tuy\\u1ec3n Qu\\u1ed1c gia, ki\\u1ec7n t\\u01b0\\u1edbng Karate Qu\\u1ed1c gia, gi&aacute;o vi&ecirc;n gi\\u1ea3ng d\\u1ea1y Karatedo C\\u1ea3nh s&aacute;t ph&ograve;ng ch&aacute;y ch\\u1eefa ch&aacute;y... .<\\/p>\\r\\n<\\/div>\\r\\n<figure class=\\\"image align-center\\\" style=\\\"text-align: center;\\\"><img title=\\\"HLV. Tr\\u1ea7n M\\u1ea1nh D\\u0169ng\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/35053850_2539805709578259_1385784409373802496_o.jpg\\\" alt=\\\"HLV. Tr\\u1ea7n M\\u1ea1nh D\\u0169ng\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/>\\r\\n<figcaption><br \\/>HLV. Tr\\u1ea7n M\\u1ea1nh D\\u0169ng<\\/figcaption>\\r\\n<\\/figure>\\r\\n<div class=\\\"text_exposed_show\\\" style=\\\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\">\\r\\n<p style=\\\"margin: 6px 0px; font-family: inherit; text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: inherit;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t4d\\/1\\/16\\/1f4de.png?_nc_eui2=AeFkJjG5btRq26UmPgKSV4pYKerOEKUdSiLwesMpFuSSNVtETcWyeevHrSqgCpxn0xIRnznWNC2THAWIovfdhKBHysFdm9rsci6ayAzw-331MQ\');\\\">\\ud83d\\udcde<\\/span><\\/span> Li\\u1ec7n h\\u1ec7 ngay \\u0111\\u1ec3 bi\\u1ebft th&ecirc;m th&ocirc;ng tin chi ti\\u1ebft: 094.2332.444 - 0937.186.444<\\/p>\\r\\n<\\/div>\\r\\n<div class=\\\"ddict_btn\\\" style=\\\"top: 1169px; left: -3.35543e+07px;\\\"><img src=\\\"chrome-extension:\\/\\/bpggmmljdiliancllaapiggllnkbjocb\\/icon\\/16.png\\\" \\/><\\/div>\",\"slug\":\"thong-tin-tuyen-sinh-vo-duong-karate-league-dojo\",\"status\":\"PUBLISHED\",\"category_id\":\"3\",\"source\":\"Karate League Dojo\",\"featured\":\"on\",\"keywords\":[\"tuy\\u1ec3n sinh\",\"Karate League Dojo\",\"k.l.d\"],\"meta_description\":\"V\\u1edb\\u00ec nh\\u1eefng b\\u1eadc ph\\u1ee5 huynh quan t\\u00e2m t\\u1edbi gi\\u00e1o d\\u1ee5c con c\\u00e1i th\\u00ec s\\u1ebd lu\\u00f4n bi\\u1ebft r\\u1eb1ng b\\u00ean c\\u1ea1nh g\\u00ec\\u00e2o d\\u1ee5c tri th\\u1ee9c l\\u00e0 gi\\u00e1o d\\u1ee5c th\\u1ec3 ch\\u1ea5t kh\\u00f4ng th\\u1ec3 thi\\u1ebfu trong qu\\u00e1 tr\\u00ecnh gi\\u00e1o d\\u1ee5c v\\u00e0 h\\u1ecdc t\\u1eadp c\\u1ee7a con c\\u00e1i. \\u1ede tu\\u1ed5i n\\u00e0y, tr\\u1ebb \\u0111\\u01b0\\u1ee3c v\\u1eadn \\u0111\\u1ed9ng \\u0111\\u00fang c\\u00e1ch s\\u1ebd ph\\u00e1t tri\\u1ec3n t\\u00e2m sinh l\\u00fd theo \\u0111\\u00fang di\\u1ec5n bi\\u1ec3n t\\u1ed1t. V\\u1edbi nhi\\u1ec1u n\\u0103m kinh nghi\\u1ec7m thi \\u0111\\u1ea5u, hu\\u1ea5n luy\\u1ec7n v\\u00e0 gi\\u1ea3ng d\\u1ea1y m\\u00f4n v\\u00f5 Karatedo c\\u00e1c HLV s\\u1ebd trau \\u0111\\u1ed5i tinh th\\u1ea7n th\\u01b0\\u1ee3ng v\\u00f5 NH\\u00c2N - NGH\\u0128A - L\\u1ec4 -TR\\u00cd - T\\u00cdN.\\r\\nH\\u00e3y nhanh tay \\u0111\\u0103ng k\\u00fd n\\u00e0o!\",\"meta_keywords\":\"tuy\\u1ec3n sinh, karate league dojo\",\"seo_title\":\"Th\\u00f4ng tin tuy\\u1ec3n sinh v\\u00f5 \\u0111\\u01b0\\u1eddng Karate league Dojo\"}', '2020-05-31 18:40:09', '2020-05-31 18:40:09'),
(103, 5, 'admin/posts', 'GET', '162.158.7.58', '[]', '2020-05-31 18:40:09', '2020-05-31 18:40:09');
INSERT INTO `operation_logs` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(104, 5, 'news', 'GET', '162.158.7.58', '[]', '2020-05-31 18:40:25', '2020-05-31 18:40:25'),
(105, 5, 'videos', 'GET', '162.158.7.58', '[]', '2020-05-31 18:40:43', '2020-05-31 18:40:43'),
(106, 5, 'videos', 'GET', '162.158.179.51', '[]', '2020-05-31 18:41:04', '2020-05-31 18:41:04'),
(107, 5, 'videos', 'GET', '162.158.179.51', '{\"page\":\"2\"}', '2020-05-31 18:41:08', '2020-05-31 18:41:08'),
(108, 5, 'videos', 'GET', '162.158.179.51', '{\"page\":\"3\"}', '2020-05-31 18:41:22', '2020-05-31 18:41:22'),
(109, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"4\"}', '2020-05-31 18:41:43', '2020-05-31 18:41:43'),
(110, 5, 'videos', 'GET', '162.158.179.51', '{\"page\":\"5\"}', '2020-05-31 18:41:58', '2020-05-31 18:41:58'),
(111, 5, 'videos', 'GET', '162.158.179.51', '{\"page\":\"6\"}', '2020-05-31 18:42:03', '2020-05-31 18:42:03'),
(112, 5, 'videos', 'GET', '162.158.179.51', '[]', '2020-05-31 18:42:46', '2020-05-31 18:42:46'),
(113, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"2\"}', '2020-05-31 18:42:48', '2020-05-31 18:42:48'),
(114, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"3\"}', '2020-05-31 18:42:49', '2020-05-31 18:42:49'),
(115, 5, 'videos', 'GET', '162.158.7.58', '{\"page\":\"2\"}', '2020-05-31 18:43:09', '2020-05-31 18:43:09'),
(116, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"4\"}', '2020-05-31 18:43:13', '2020-05-31 18:43:13'),
(117, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"5\"}', '2020-05-31 18:43:13', '2020-05-31 18:43:13'),
(118, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"6\"}', '2020-05-31 18:43:15', '2020-05-31 18:43:15'),
(119, 5, 'videos', 'GET', '162.158.7.58', '{\"page\":\"3\"}', '2020-05-31 18:43:22', '2020-05-31 18:43:22'),
(120, 5, 'profile', 'GET', '162.158.7.58', '[]', '2020-05-31 18:43:27', '2020-05-31 18:43:27'),
(121, 5, 'categories/bai-viet', 'GET', '162.158.7.58', '[]', '2020-05-31 18:43:59', '2020-05-31 18:43:59'),
(122, 5, 'categories/thong-bao', 'GET', '162.158.7.58', '[]', '2020-05-31 18:44:05', '2020-05-31 18:44:05'),
(123, 5, 'home', 'GET', '162.158.7.58', '[]', '2020-05-31 18:44:12', '2020-05-31 18:44:12'),
(124, 5, 'news', 'GET', '162.158.7.58', '[]', '2020-05-31 18:44:41', '2020-05-31 18:44:41'),
(125, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.58', '[]', '2020-05-31 18:45:15', '2020-05-31 18:45:15'),
(126, 5, 'notification/read', 'POST', '162.158.7.58', '[]', '2020-05-31 18:47:18', '2020-05-31 18:47:18'),
(127, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.70', '[]', '2020-05-31 18:47:18', '2020-05-31 18:47:18'),
(128, 5, 'notification/read', 'POST', '162.158.7.70', '{\"id\":\"8d009a05-8940-417c-9d80-1170aa19e8ea\"}', '2020-05-31 18:47:27', '2020-05-31 18:47:27'),
(129, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.58', '[]', '2020-05-31 18:47:27', '2020-05-31 18:47:27'),
(130, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.70', '[]', '2020-05-31 18:47:42', '2020-05-31 18:47:42'),
(131, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.70', '[]', '2020-05-31 18:47:51', '2020-05-31 18:47:51'),
(132, 5, 'dojos', 'GET', '162.158.6.177', '[]', '2020-05-31 18:56:13', '2020-05-31 18:56:13'),
(133, 5, 'dojos/karate-league-dojo', 'GET', '162.158.6.177', '[]', '2020-05-31 18:56:16', '2020-05-31 18:56:16'),
(134, 5, 'home', 'GET', '162.158.6.177', '[]', '2020-05-31 18:56:28', '2020-05-31 18:56:28'),
(135, 5, 'notification/readAll', 'GET', '162.158.6.177', '[]', '2020-05-31 18:56:34', '2020-05-31 18:56:34'),
(136, 5, 'home', 'GET', '162.158.6.177', '[]', '2020-05-31 18:56:34', '2020-05-31 18:56:34'),
(137, 5, 'news', 'GET', '162.158.6.177', '[]', '2020-05-31 18:56:38', '2020-05-31 18:56:38'),
(138, 5, 'news', 'GET', '162.158.7.210', '[]', '2020-05-31 19:01:10', '2020-05-31 19:01:10'),
(139, NULL, '/', 'GET', '212.142.154.141', '[]', '2020-05-31 19:35:53', '2020-05-31 19:35:53'),
(140, 5, 'news', 'GET', '162.158.7.162', '[]', '2020-05-31 21:20:59', '2020-05-31 21:20:59'),
(141, 5, 'workout-registrations', 'GET', '162.158.7.162', '[]', '2020-05-31 21:21:07', '2020-05-31 21:21:07'),
(142, NULL, 'login', 'GET', '108.162.246.136', '[]', '2020-05-31 21:22:26', '2020-05-31 21:22:26'),
(143, NULL, 'login', 'GET', '108.162.245.65', '[]', '2020-05-31 21:22:27', '2020-05-31 21:22:27'),
(144, NULL, 'login', 'GET', '108.162.246.112', '[]', '2020-05-31 21:22:28', '2020-05-31 21:22:28'),
(145, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.7.162', '[]', '2020-05-31 21:25:14', '2020-05-31 21:25:14'),
(146, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '108.162.245.65', '[]', '2020-05-31 21:25:38', '2020-05-31 21:25:38'),
(147, NULL, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '108.162.245.23', '[]', '2020-05-31 21:25:39', '2020-05-31 21:25:39'),
(148, 5, 'posts/doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '162.158.7.162', '[]', '2020-05-31 21:26:34', '2020-05-31 21:26:34'),
(149, NULL, 'posts/doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '162.158.107.174', '[]', '2020-05-31 21:26:56', '2020-05-31 21:26:56'),
(150, NULL, 'posts/doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'GET', '108.162.245.81', '[]', '2020-05-31 21:26:57', '2020-05-31 21:26:57'),
(151, NULL, '/', 'GET', '108.162.246.136', '[]', '2020-05-31 21:27:02', '2020-05-31 21:27:02'),
(152, 5, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '162.158.7.162', '[]', '2020-05-31 21:27:29', '2020-05-31 21:27:29'),
(153, NULL, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '108.162.245.23', '[]', '2020-05-31 21:27:54', '2020-05-31 21:27:54'),
(154, NULL, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '108.162.245.65', '[]', '2020-05-31 21:27:55', '2020-05-31 21:27:55'),
(155, NULL, '/', 'GET', '212.154.5.119', '[]', '2020-05-31 21:45:43', '2020-05-31 21:45:43'),
(156, NULL, '/', 'GET', '209.17.96.42', '[]', '2020-05-31 21:46:01', '2020-05-31 21:46:01'),
(157, 5, 'admin', 'GET', '162.158.7.120', '[]', '2020-05-31 23:47:29', '2020-05-31 23:47:29'),
(158, 5, 'admin/achievements', 'GET', '162.158.7.120', '[]', '2020-05-31 23:47:52', '2020-05-31 23:47:52'),
(159, NULL, '/', 'GET', '103.138.185.142', '[]', '2020-05-31 23:48:38', '2020-05-31 23:48:38'),
(160, NULL, '/', 'GET', '209.17.96.26', '[]', '2020-05-31 23:50:09', '2020-05-31 23:50:09'),
(161, NULL, '/', 'GET', '172.68.253.184', '[]', '2020-06-01 00:43:54', '2020-06-01 00:43:54'),
(162, NULL, 'login', 'GET', '162.158.179.51', '[]', '2020-06-01 00:44:15', '2020-06-01 00:44:15'),
(163, NULL, 'login', 'POST', '162.158.179.237', '{\"_token\":\"IZM6C1hOAouIilVaXIFk28DZGaUmNqLBmGPOF2Wm\",\"email\":\"uocnv.soict.hust@gmail.com\",\"password\":\"uocnv1998\"}', '2020-06-01 00:44:23', '2020-06-01 00:44:23'),
(164, 5, 'home', 'GET', '162.158.179.237', '[]', '2020-06-01 00:44:24', '2020-06-01 00:44:24'),
(165, 5, 'tuitions', 'GET', '162.158.179.237', '[]', '2020-06-01 00:44:29', '2020-06-01 00:44:29'),
(166, 5, 'rooms', 'GET', '162.158.179.237', '[]', '2020-06-01 00:45:02', '2020-06-01 00:45:02'),
(167, 5, 'rooms/find', 'POST', '162.158.179.237', '{\"date\":\"01-06-2020\",\"dojo_id\":\"1\",\"start_at\":null,\"end_at\":null}', '2020-06-01 00:45:07', '2020-06-01 00:45:07'),
(168, NULL, '/', 'GET', '94.102.49.65', '[]', '2020-06-01 00:47:12', '2020-06-01 00:47:12'),
(169, 5, 'news', 'GET', '162.158.178.26', '[]', '2020-06-01 00:51:38', '2020-06-01 00:51:38'),
(170, 5, 'videos', 'GET', '162.158.178.160', '[]', '2020-06-01 00:53:33', '2020-06-01 00:53:33'),
(171, 5, 'videos', 'GET', '162.158.178.160', '{\"page\":\"2\"}', '2020-06-01 00:53:49', '2020-06-01 00:53:49'),
(172, 5, 'categories/thong-tin-tuyen-sinh', 'GET', '162.158.178.160', '[]', '2020-06-01 00:53:52', '2020-06-01 00:53:52'),
(173, 5, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '162.158.178.160', '[]', '2020-06-01 00:53:57', '2020-06-01 00:53:57'),
(174, NULL, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '172.69.71.155', '[]', '2020-06-01 00:54:03', '2020-06-01 00:54:03'),
(175, NULL, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '172.69.71.55', '[]', '2020-06-01 00:54:03', '2020-06-01 00:54:03'),
(176, NULL, 'posts/thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'GET', '108.162.221.201', '[]', '2020-06-01 00:54:04', '2020-06-01 00:54:04'),
(177, 5, 'dojos', 'GET', '162.158.179.31', '[]', '2020-06-01 00:54:50', '2020-06-01 00:54:50'),
(178, 5, 'rooms', 'GET', '162.158.179.31', '[]', '2020-06-01 00:56:43', '2020-06-01 00:56:43'),
(179, 5, 'tuitions', 'GET', '162.158.179.31', '[]', '2020-06-01 00:57:31', '2020-06-01 00:57:31'),
(180, 5, 'admin/tuitions/check', 'POST', '162.158.179.31', '{\"student_id\":\"20200001\",\"month\":\"1\"}', '2020-06-01 00:57:55', '2020-06-01 00:57:55'),
(181, 5, 'home', 'GET', '162.158.179.31', '[]', '2020-06-01 01:02:16', '2020-06-01 01:02:16'),
(182, 5, 'news', 'GET', '162.158.179.31', '[]', '2020-06-01 01:02:52', '2020-06-01 01:02:52'),
(183, 5, 'videos', 'GET', '162.158.179.31', '[]', '2020-06-01 01:03:07', '2020-06-01 01:03:07'),
(184, 5, 'videos', 'GET', '162.158.179.31', '{\"page\":\"2\"}', '2020-06-01 01:03:13', '2020-06-01 01:03:13'),
(185, 5, 'videos', 'GET', '162.158.179.31', '{\"page\":\"3\"}', '2020-06-01 01:03:14', '2020-06-01 01:03:14'),
(186, 5, 'videos', 'GET', '162.158.179.31', '{\"page\":\"4\"}', '2020-06-01 01:03:17', '2020-06-01 01:03:17'),
(187, 5, 'videos', 'GET', '162.158.179.31', '{\"page\":\"5\"}', '2020-06-01 01:03:17', '2020-06-01 01:03:17'),
(188, 5, 'videos', 'GET', '162.158.179.31', '{\"page\":\"6\"}', '2020-06-01 01:03:19', '2020-06-01 01:03:19'),
(189, 5, 'documents', 'GET', '162.158.179.31', '[]', '2020-06-01 01:03:31', '2020-06-01 01:03:31'),
(190, 5, 'dojos', 'GET', '162.158.179.31', '[]', '2020-06-01 01:03:35', '2020-06-01 01:03:35'),
(191, 5, 'workout-registrations', 'GET', '162.158.179.31', '[]', '2020-06-01 01:03:41', '2020-06-01 01:03:41'),
(192, NULL, '/', 'GET', '162.158.75.57', '[]', '2020-06-01 01:16:30', '2020-06-01 01:16:30'),
(193, NULL, '/', 'GET', '108.162.221.69', '[]', '2020-06-01 01:17:41', '2020-06-01 01:17:41'),
(194, NULL, 'home', 'GET', '172.69.71.155', '[]', '2020-06-01 01:17:42', '2020-06-01 01:17:42'),
(195, NULL, 'home', 'GET', '108.162.221.213', '[]', '2020-06-01 01:17:43', '2020-06-01 01:17:43'),
(196, NULL, '/', 'GET', '108.162.221.201', '[]', '2020-06-01 01:17:46', '2020-06-01 01:17:46'),
(197, NULL, '/', 'GET', '172.69.69.27', '[]', '2020-06-01 01:17:46', '2020-06-01 01:17:46'),
(198, NULL, 'home', 'GET', '172.69.68.174', '[]', '2020-06-01 01:17:46', '2020-06-01 01:17:46'),
(199, NULL, '/', 'GET', '108.162.221.69', '[]', '2020-06-01 01:17:49', '2020-06-01 01:17:49'),
(200, 5, 'home', 'GET', '162.158.178.68', '[]', '2020-06-01 01:30:58', '2020-06-01 01:30:58'),
(201, 5, 'news', 'GET', '162.158.178.68', '[]', '2020-06-01 01:31:02', '2020-06-01 01:31:02'),
(202, 5, 'videos', 'GET', '162.158.178.68', '[]', '2020-06-01 01:31:21', '2020-06-01 01:31:21'),
(203, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"2\"}', '2020-06-01 01:31:27', '2020-06-01 01:31:27'),
(204, 5, 'videos', 'GET', '162.158.178.68', '{\"page\":\"3\"}', '2020-06-01 01:31:29', '2020-06-01 01:31:29'),
(205, 5, 'workout-registrations', 'GET', '162.158.178.204', '[]', '2020-06-01 01:37:58', '2020-06-01 01:37:58'),
(206, 5, 'home', 'GET', '162.158.178.204', '[]', '2020-06-01 01:40:49', '2020-06-01 01:40:49'),
(207, 5, 'dojos', 'GET', '162.158.178.204', '[]', '2020-06-01 01:41:47', '2020-06-01 01:41:47'),
(208, 5, 'dojos', 'GET', '162.158.178.204', '[]', '2020-06-01 01:46:33', '2020-06-01 01:46:33'),
(209, NULL, 'login', 'GET', '162.158.75.57', '[]', '2020-06-01 01:46:51', '2020-06-01 01:46:51'),
(210, NULL, 'login', 'GET', '162.158.7.162', '[]', '2020-06-01 01:47:05', '2020-06-01 01:47:05'),
(211, NULL, 'dojos', 'GET', '173.245.54.178', '[]', '2020-06-01 01:47:20', '2020-06-01 01:47:20'),
(212, 5, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '162.158.178.204', '[]', '2020-06-01 01:50:55', '2020-06-01 01:50:55'),
(213, 5, 'admin', 'GET', '162.158.178.174', '[]', '2020-06-01 01:51:09', '2020-06-01 01:51:09'),
(214, 5, 'admin/voyager-assets', 'GET', '162.158.178.70', '{\"path\":\"js\\/app.js\"}', '2020-06-01 01:51:10', '2020-06-01 01:51:10'),
(215, 5, 'admin/voyager-assets', 'GET', '172.68.255.19', '{\"path\":\"images\\/logo-icon.png\"}', '2020-06-01 01:51:10', '2020-06-01 01:51:10'),
(216, 5, 'admin/voyager-assets', 'GET', '162.158.179.55', '{\"path\":\"fonts\\/voyager.woff\"}', '2020-06-01 01:51:10', '2020-06-01 01:51:10'),
(217, 5, 'admin/dojos', 'GET', '172.68.253.82', '[]', '2020-06-01 01:51:26', '2020-06-01 01:51:26'),
(218, 5, 'admin/dojos/1/edit', 'GET', '172.68.253.82', '[]', '2020-06-01 01:51:31', '2020-06-01 01:51:31'),
(219, 5, 'admin/voyager-assets', 'GET', '172.68.254.167', '{\"path\":\"js\\/skins\\/voyager\\/skin.min.css\"}', '2020-06-01 01:51:33', '2020-06-01 01:51:33'),
(220, 5, 'admin/voyager-assets', 'GET', '172.68.253.106', '{\"path\":\"js\\/skins\\/voyager\\/content.min.css\"}', '2020-06-01 01:51:33', '2020-06-01 01:51:33'),
(221, 5, 'admin/voyager-assets', 'GET', '172.68.254.252', '{\"path\":\"js\\/skins\\/voyager\\/fonts\\/tinymce.woff\"}', '2020-06-01 01:51:33', '2020-06-01 01:51:33'),
(222, NULL, 'login', 'GET', '108.162.245.133', '[]', '2020-06-01 01:52:44', '2020-06-01 01:52:44'),
(223, 5, 'admin/dojos/1', 'PUT', '172.68.253.82', '{\"_method\":\"PUT\",\"_token\":\"nnoViveTb5LBUzZJsfh0Wb2KtOmUDzKzrDxIa0VV\",\"name\":\"Karate League Dojo\",\"start_at\":\"17:30:00\",\"finish_at\":\"19:00:00\",\"slug\":\"karate-league-dojo\",\"address\":\"S\\u1ea3nh 1 - \\u0110\\u01a1n Nguy\\u00ean 2 CT3 - Khu \\u0111\\u00f4 th\\u1ecb m\\u1edbi Trung V\\u0103n-H\\u00e0 N\\u1ed9i\",\"coach\":\"Tr\\u1ea7n M\\u1ea1nh D\\u0169ng\",\"schedule\":{\"3\":\"3\",\"4\":\"4\",\"6\":\"6\",\"7\":\"7\"},\"description\":\"<p class=\\\"MsoNormal\\\" style=\\\"line-height: normal; background: white; text-align: left;\\\"><span style=\\\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\\\">V&otilde; \\u0111\\u01b0\\u1eddng v\\u1edbi trang thi\\u1ebft b\\u1ecb hi\\u1ec7n \\u0111\\u1ea1i, ti&ecirc;u chu\\u1ea9n ph&ograve;ng t\\u1eadp \\u0111\\u1ed9i tuy\\u1ebfn s\\u1ebd mang \\u0111\\u1ebfn nh\\u1eefng \\u0111i\\u1ec7u t\\u1ed1t nh\\u1ea5t gi&agrave;nh cho c&aacute;c v&otilde; sinh.<\\/span><\\/p>\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"line-height: 200%; background: white; text-align: center;\\\" align=\\\"center\\\"><span style=\\\"font-size: 10.5pt; line-height: 200%; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21; mso-no-proof: yes;\\\"><!-- [if gte vml 1]><v:shapetype\\r\\n id=\\\"_x0000_t75\\\" coordsize=\\\"21600,21600\\\" o:spt=\\\"75\\\" o:preferrelative=\\\"t\\\"\\r\\n path=\\\"m@4@5l@4@11@9@11@9@5xe\\\" filled=\\\"f\\\" stroked=\\\"f\\\">\\r\\n <v:stroke joinstyle=\\\"miter\\\"\\/>\\r\\n <v:formulas>\\r\\n  <v:f eqn=\\\"if lineDrawn pixelLineWidth 0\\\"\\/>\\r\\n  <v:f eqn=\\\"sum @0 1 0\\\"\\/>\\r\\n  <v:f eqn=\\\"sum 0 0 @1\\\"\\/>\\r\\n  <v:f eqn=\\\"prod @2 1 2\\\"\\/>\\r\\n  <v:f eqn=\\\"prod @3 21600 pixelWidth\\\"\\/>\\r\\n  <v:f eqn=\\\"prod @3 21600 pixelHeight\\\"\\/>\\r\\n  <v:f eqn=\\\"sum @0 0 1\\\"\\/>\\r\\n  <v:f eqn=\\\"prod @6 1 2\\\"\\/>\\r\\n  <v:f eqn=\\\"prod @7 21600 pixelWidth\\\"\\/>\\r\\n  <v:f eqn=\\\"sum @8 21600 0\\\"\\/>\\r\\n  <v:f eqn=\\\"prod @7 21600 pixelHeight\\\"\\/>\\r\\n  <v:f eqn=\\\"sum @10 21600 0\\\"\\/>\\r\\n <\\/v:formulas>\\r\\n <v:path o:extrusionok=\\\"f\\\" gradientshapeok=\\\"t\\\" o:connecttype=\\\"rect\\\"\\/>\\r\\n <o:lock v:ext=\\\"edit\\\" aspectratio=\\\"t\\\"\\/>\\r\\n<\\/v:shapetype><v:shape id=\\\"H\\u00ecnh_x0020_\\u1ea3nh_x0020_3\\\" o:spid=\\\"_x0000_i1027\\\"\\r\\n type=\\\"#_x0000_t75\\\" alt=\\\"http:\\/\\/localhost:8000\\/storage\\/dojos\\/December2019\\/35145893_2539803739578456_6139076672076382208_o.jpg\\\"\\r\\n style=\'width:249pt;height:165.75pt;visibility:visible;mso-wrap-style:square\'>\\r\\n <v:imagedata src=\\\"file:\\/\\/\\/C:\\/Users\\/UOC~1.NV1\\/AppData\\/Local\\/Temp\\/msohtmlclip1\\/01\\/clip_image001.jpg\\\"\\r\\n  o:title=\\\"35145893_2539803739578456_6139076672076382208_o\\\"\\/>\\r\\n<\\/v:shape><![endif]--><!-- [if !vml]--><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/35145893_2539803739578456_6139076672076382208_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/35145893_2539803739578456_6139076672076382208_o.jpg\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/> &nbsp;<img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/37022211_2573406232884873_3193762549166243840_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/37022211_2573406232884873_3193762549166243840_o.jpg\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><!--[endif]--><\\/span><\\/p>\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"line-height: normal; background: white; text-align: left;\\\"><span style=\\\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\\\">V\\u1edbi nhi\\u1ec1u n\\u0103m kinh nghi\\u1ec7m thi \\u0111\\u1ea5u, hu\\u1ea5n luy\\u1ec7n v&agrave; gi\\u1ea3ng d\\u1ea1y m&ocirc;n v&otilde; Karatedo c&aacute;c HLV s\\u1ebd trau \\u0111\\u1ed5i tinh th\\u1ea7n th\\u01b0\\u1ee3ng v&otilde; NH&Acirc;N - NGH\\u0128A - L\\u1ec4 -TR&Iacute; - T&Iacute;N.<\\/span><\\/p>\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"line-height: normal; background: white; text-align: left;\\\"><span style=\\\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\\\">HLV Tr\\u1ea7n M\\u1ea1nh D\\u0169ng: huy\\u1ec5n \\u0111ai \\u0111\\u1ec7 tam \\u0111\\u1eb3ng Karatedo, c\\u1ef1u V\\u0110V \\u0111\\u1ed9i tuy\\u1ec3n Qu\\u1ed1c gia, ki\\u1ec7n t\\u01b0\\u1edbng Karate Qu\\u1ed1c gia, gi&aacute;o vi&ecirc;n gi\\u1ea3ng d\\u1ea1y Karatedo C\\u1ea3nh s&aacute;t ph&ograve;ng ch&aacute;y ch\\u1eefa ch&aacute;y...<\\/span><\\/p>\\r\\n<figure class=\\\"image align-center\\\" style=\\\"text-align: center;\\\"><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/35053850_2539805709578259_1385784409373802496_o.jpg\\\" alt=\\\"HLV. Tr\\u1ea7n M\\u1ea1nh D\\u0169ng\\\" width=\\\"80%\\\" height=\\\"auto\\\" \\/>\\r\\n<figcaption><br \\/>HLV. Tr\\u1ea7n M\\u1ea1nh D\\u0169ng<\\/figcaption>\\r\\n<\\/figure>\\r\\n<p class=\\\"MsoNormal\\\" style=\\\"line-height: normal; background: white; text-align: left;\\\" align=\\\"center\\\"><span style=\\\"font-size: 10.5pt; font-family: \'Helvetica\',sans-serif; mso-fareast-font-family: \'Times New Roman\'; color: #1c1e21;\\\">V\\u1edbi kinh nghi\\u1ec7m thi \\u0111\\u1ea5u v&agrave; gi\\u1ea3ng d\\u1ea1y c\\u1ee7a m&igrave;nh. HLV Tr\\u1ea7n M\\u1ea1nh D\\u0169ng s\\u1ebd mang l\\u1ea1i cho b\\u1ea1n nh\\u1eefng gi\\u1edd ph&uacute;t t\\u1eadp luy\\u1ec7n m\\u01b0\\u1edbt m\\u1ed3 h&ocirc;i v\\u1edbi nh\\u1eefng k\\u1ef9 thu\\u1eadt chuy&ecirc;n m&ocirc;n cao \\u0111\\u1ea7y hi\\u1ec7u qu\\u1ea3 \\u0111\\u1ec3 b\\u1ea1n c&oacute; th\\u1ec3 t\\u1ef1 tin tr&ecirc;n th\\u1ea3m \\u0111\\u1ea5u.<\\/span><\\/p>\"}', '2020-06-01 01:52:45', '2020-06-01 01:52:45'),
(224, 5, 'admin/dojos', 'GET', '172.68.253.82', '[]', '2020-06-01 01:52:45', '2020-06-01 01:52:45'),
(225, 5, 'admin/dojos/2/edit', 'GET', '172.68.253.82', '[]', '2020-06-01 01:52:48', '2020-06-01 01:52:48'),
(226, 5, 'admin/dojos/2', 'PUT', '162.158.178.174', '{\"_method\":\"PUT\",\"_token\":\"nnoViveTb5LBUzZJsfh0Wb2KtOmUDzKzrDxIa0VV\",\"name\":\"Karate N\\u00f4ng Nghi\\u1ec7p - K.L.D\",\"start_at\":\"19:00:00\",\"finish_at\":\"20:30:00\",\"slug\":\"karate-nong-nghiep-k-l-d\",\"address\":\"Nh\\u00e0 th\\u1ec3 ch\\u1ea5t H\\u1ecdc Vi\\u1ec7n N\\u00f4ng Nghi\\u1ec7p Vi\\u1ec7t Nam\",\"coach\":\"Tr\\u1ea7n M\\u1ea1nh D\\u0169ng\",\"schedule\":{\"2\":\"2\",\"5\":\"5\"},\"description\":\"<p><strong><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">KHI THAM GIA CLB C&Aacute;C B\\u1ea0N L&Agrave; TH&Agrave;NH VI&Ecirc;N V&Otilde; \\u0110\\u01af\\u1edcNG S\\u1ebc \\u0110\\u01af\\u1ee2C \\u01afU TI&Ecirc;N C\\u1ed8NG \\u0110I\\u1ec2M H\\u1eccC GDTC C&Aacute;C M&Ocirc;N H\\u1eccC NH\\u01af : C\\u1ea6U L&Ocirc;NG, \\u0110I\\u1ec0N KINH, TENIS.....<\\/span><\\/strong><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png\');\\\">\\ud83d\\udc49<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Mi\\u1ec5n ph&iacute; h\\u1ecdc th\\u1eed tr\\u01b0\\u1edbc khi \\u0111\\u0103ng k&yacute; t\\u1eadp luy\\u1ec7n.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t38\\/1\\/16\\/1f44a_1f3ff.png\');\\\">\\ud83d\\udc4a\\ud83c\\udfff<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">T\\u1eb7ng ngay 01 b\\u1ed9 v&otilde; ph\\u1ee5c tr\\u1ecb gi&aacute; 250.000 k&egrave;m logo v&otilde; \\u0111\\u01b0\\u1eddng khi \\u0111&oacute;ng h\\u1ecdc ph&iacute; 6 th&aacute;ng.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t5d\\/1\\/16\\/1f3d6.png\');\\\">\\ud83c\\udfd6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Tham gia c&aacute;c ch\\u01b0\\u01a1ng tr&igrave;nh sinh nh\\u1eadt , li&ecirc;n hoan , picnic ngo\\u1ea1i kho&aacute;...<\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" width=\\\"1800\\\" height=\\\"1013\\\" \\/><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">V&agrave; t\\u1eadn h\\u01b0\\u1edfng kh&ocirc;ng kh&iacute; t\\u1eadp luy\\u1ec7n h\\u0103ng say v&agrave; cu\\u1ed3ng l\\u1eeda t\\u1ea1i c&acirc;u l\\u1ea1c b\\u1ed9:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><img src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/EQUuMVc5EcEWfE1FvT1W-cropped.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/> &nbsp;<img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/>&nbsp;<img src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/><\\/p>\\r\\n<p style=\\\"text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tbe\\/1\\/16\\/1f3c6.png\');\\\">\\ud83c\\udfc6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">\\u0110\\u01b0\\u1ee3c \\u0111\\u1ea1i di\\u1ec7n cho tr\\u01b0\\u1eddng tham gia thi \\u0111\\u1ea5u c&aacute;c g\\u1ea3i Karate sinh vi&ecirc;n c\\u1ea5p th&agrave;nh ph\\u1ed1 , to&agrave;n qu\\u1ed1c....<\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><\\/span><\\/p>\\r\\n<p style=\\\"text-align: left;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br \\/>Karate N&ocirc;ng Ngi\\u1ec7p - K.L.D<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span>N\\u01a0I H\\u1ed8I T\\u1ee4 \\u0110AM M&Ecirc;&nbsp;<span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t34\\/1\\/16\\/23f0.png\');\\\">\\u23f0<\\/span><\\/span>&nbsp;: 19h - 20h30\' Th\\u1ee9 2 v&agrave; Th\\u1ee9 5 h&agrave;ng tu\\u1ea7n<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/te1\\/1\\/16\\/26e9.png\');\\\">\\u26e9<\\/span><\\/span>&nbsp;:Nh&agrave; th\\u1ec3 ch\\u1ea5t HVNN Vi\\u1ec7t Nam<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t22\\/1\\/16\\/260e.png\');\\\">\\u260e\\ufe0f<\\/span><\\/span>&nbsp;:Li&ecirc;n h\\u1ec7 : 0942332444<\\/span><\\/p>\"}', '2020-06-01 01:53:12', '2020-06-01 01:53:12'),
(227, 5, 'admin/dojos', 'GET', '162.158.178.174', '[]', '2020-06-01 01:53:12', '2020-06-01 01:53:12'),
(228, 5, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '162.158.178.174', '[]', '2020-06-01 01:53:14', '2020-06-01 01:53:14'),
(229, 5, 'admin/dojos/2/edit', 'GET', '162.158.178.174', '[]', '2020-06-01 01:53:25', '2020-06-01 01:53:25'),
(230, 5, 'categories/thong-tin-tuyen-sinh', 'GET', '162.158.178.174', '[]', '2020-06-01 01:53:43', '2020-06-01 01:53:43'),
(231, 5, 'posts/thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'GET', '162.158.178.174', '[]', '2020-06-01 01:53:46', '2020-06-01 01:53:46'),
(232, 5, 'admin/dojos/2', 'PUT', '172.68.253.184', '{\"_method\":\"PUT\",\"_token\":\"nnoViveTb5LBUzZJsfh0Wb2KtOmUDzKzrDxIa0VV\",\"name\":\"Karate N\\u00f4ng Nghi\\u1ec7p - K.L.D\",\"start_at\":\"19:00:00\",\"finish_at\":\"20:30:00\",\"slug\":\"karate-nong-nghiep-k-l-d\",\"address\":\"Nh\\u00e0 th\\u1ec3 ch\\u1ea5t H\\u1ecdc Vi\\u1ec7n N\\u00f4ng Nghi\\u1ec7p Vi\\u1ec7t Nam\",\"coach\":\"Tr\\u1ea7n M\\u1ea1nh D\\u0169ng\",\"schedule\":{\"2\":\"2\",\"5\":\"5\"},\"description\":\"<p><strong><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">KHI THAM GIA CLB C&Aacute;C B\\u1ea0N L&Agrave; TH&Agrave;NH VI&Ecirc;N V&Otilde; \\u0110\\u01af\\u1edcNG S\\u1ebc \\u0110\\u01af\\u1ee2C \\u01afU TI&Ecirc;N C\\u1ed8NG \\u0110I\\u1ec2M H\\u1eccC GDTC C&Aacute;C M&Ocirc;N H\\u1eccC NH\\u01af : C\\u1ea6U L&Ocirc;NG, \\u0110I\\u1ec0N KINH, TENIS.....<\\/span><\\/strong><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png\');\\\">\\ud83d\\udc49<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Mi\\u1ec5n ph&iacute; h\\u1ecdc th\\u1eed tr\\u01b0\\u1edbc khi \\u0111\\u0103ng k&yacute; t\\u1eadp luy\\u1ec7n.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t38\\/1\\/16\\/1f44a_1f3ff.png\');\\\">\\ud83d\\udc4a\\ud83c\\udfff<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">T\\u1eb7ng ngay 01 b\\u1ed9 v&otilde; ph\\u1ee5c tr\\u1ecb gi&aacute; 250.000 k&egrave;m logo v&otilde; \\u0111\\u01b0\\u1eddng khi \\u0111&oacute;ng h\\u1ecdc ph&iacute; 6 th&aacute;ng.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t5d\\/1\\/16\\/1f3d6.png\');\\\">\\ud83c\\udfd6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Tham gia c&aacute;c ch\\u01b0\\u01a1ng tr&igrave;nh sinh nh\\u1eadt , li&ecirc;n hoan , picnic ngo\\u1ea1i kho&aacute;...<\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" width=\\\"1800\\\" height=\\\"1013\\\" \\/><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">V&agrave; t\\u1eadn h\\u01b0\\u1edfng kh&ocirc;ng kh&iacute; t\\u1eadp luy\\u1ec7n h\\u0103ng say v&agrave; cu\\u1ed3ng l\\u1eeda t\\u1ea1i c&acirc;u l\\u1ea1c b\\u1ed9:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" width=\\\"45%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/EQUuMVc5EcEWfE1FvT1W-cropped.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/> &nbsp;<img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/>&nbsp;<img src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" width=\\\"45%\\\" height=\\\"auto\\\" \\/><\\/p>\\r\\n<p style=\\\"text-align: left;\\\"><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tbe\\/1\\/16\\/1f3c6.png\');\\\">\\ud83c\\udfc6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">\\u0110\\u01b0\\u1ee3c \\u0111\\u1ea1i di\\u1ec7n cho tr\\u01b0\\u1eddng tham gia thi \\u0111\\u1ea5u c&aacute;c g\\u1ea3i Karate sinh vi&ecirc;n c\\u1ea5p th&agrave;nh ph\\u1ed1 , to&agrave;n qu\\u1ed1c....<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/>&nbsp;<br \\/><\\/span><\\/p>\\r\\n<p style=\\\"text-align: left;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br \\/>Karate N&ocirc;ng Ngi\\u1ec7p - K.L.D<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span>N\\u01a0I H\\u1ed8I T\\u1ee4 \\u0110AM M&Ecirc;&nbsp;<span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t34\\/1\\/16\\/23f0.png\');\\\">\\u23f0<\\/span><\\/span>&nbsp;: 19h - 20h30\' Th\\u1ee9 2 v&agrave; Th\\u1ee9 5 h&agrave;ng tu\\u1ea7n<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/te1\\/1\\/16\\/26e9.png\');\\\">\\u26e9<\\/span><\\/span>&nbsp;:Nh&agrave; th\\u1ec3 ch\\u1ea5t HVNN Vi\\u1ec7t Nam<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t22\\/1\\/16\\/260e.png\');\\\">\\u260e\\ufe0f<\\/span><\\/span>&nbsp;:Li&ecirc;n h\\u1ec7 : 0942332444<\\/span><\\/p>\"}', '2020-06-01 01:57:03', '2020-06-01 01:57:03'),
(233, 5, 'admin/dojos', 'GET', '172.68.253.184', '[]', '2020-06-01 01:57:03', '2020-06-01 01:57:03'),
(234, 5, 'admin/workout-registrations', 'GET', '172.68.253.184', '[]', '2020-06-01 01:57:09', '2020-06-01 01:57:09'),
(235, 5, 'admin/posts', 'GET', '172.68.253.184', '[]', '2020-06-01 01:57:12', '2020-06-01 01:57:12'),
(236, 5, 'admin/posts/3/edit', 'GET', '172.68.253.82', '[]', '2020-06-01 01:57:17', '2020-06-01 01:57:17'),
(237, 5, 'admin/dojos', 'GET', '172.68.253.82', '[]', '2020-06-01 01:58:15', '2020-06-01 01:58:15'),
(238, 5, 'admin/dojos/2/edit', 'GET', '172.68.253.82', '[]', '2020-06-01 01:58:19', '2020-06-01 01:58:19');
INSERT INTO `operation_logs` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(239, 5, 'admin/posts/3', 'PUT', '172.68.253.82', '{\"_method\":\"PUT\",\"_token\":\"nnoViveTb5LBUzZJsfh0Wb2KtOmUDzKzrDxIa0VV\",\"title\":\"Th\\u00f4ng tin tuy\\u1ec3n sinh Karate N\\u00f4ng Nghi\\u1ec7p - K.L.D\",\"excerpt\":null,\"body\":\"<p><strong><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">KHI THAM GIA CLB C&Aacute;C B\\u1ea0N L&Agrave; TH&Agrave;NH VI&Ecirc;N V&Otilde; \\u0110\\u01af\\u1edcNG S\\u1ebc \\u0110\\u01af\\u1ee2C \\u01afU TI&Ecirc;N C\\u1ed8NG \\u0110I\\u1ec2M H\\u1eccC GDTC C&Aacute;C M&Ocirc;N H\\u1eccC NH\\u01af : C\\u1ea6U L&Ocirc;NG, \\u0110I\\u1ec0N KINH, TENIS.....<\\/span><\\/strong><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t51\\/1\\/16\\/1f449.png\');\\\">\\ud83d\\udc49<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Mi\\u1ec5n ph&iacute; h\\u1ecdc th\\u1eed tr\\u01b0\\u1edbc khi \\u0111\\u0103ng k&yacute; t\\u1eadp luy\\u1ec7n.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t38\\/1\\/16\\/1f44a_1f3ff.png\');\\\">\\ud83d\\udc4a\\ud83c\\udfff<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">T\\u1eb7ng ngay 01 b\\u1ed9 v&otilde; ph\\u1ee5c tr\\u1ecb gi&aacute; 250.000 k&egrave;m logo v&otilde; \\u0111\\u01b0\\u1eddng khi \\u0111&oacute;ng h\\u1ecdc ph&iacute; 6 th&aacute;ng.<\\/span><br style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\" \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t5d\\/1\\/16\\/1f3d6.png\');\\\">\\ud83c\\udfd6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">Tham gia c&aacute;c ch\\u01b0\\u01a1ng tr&igrave;nh sinh nh\\u1eadt , li&ecirc;n hoan , picnic ngo\\u1ea1i kho&aacute;...<\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" width=\\\"1800\\\" height=\\\"1013\\\" \\/><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/56528983_2576310309109714_5139167642292060160_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">V&agrave; t\\u1eadn h\\u01b0\\u1edfng kh&ocirc;ng kh&iacute; t\\u1eadp luy\\u1ec7n h\\u0103ng say v&agrave; cu\\u1ed3ng l\\u1eeda t\\u1ea1i c&acirc;u l\\u1ea1c b\\u1ed9:<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" width=\\\"45%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/EQUuMVc5EcEWfE1FvT1W-cropped.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/>&nbsp;&nbsp;<img src=\\\"http:\\/\\/leaguedojo.com\\/storage\\/dojos\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/>&nbsp;<img src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/69859886_2971218249618916_6902064503970594816_n.jpg\\\" alt=\\\"\\\" width=\\\"48%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/December2019\\/70240175_2990376614369746_2467002985457123328_n.jpg\\\" width=\\\"45%\\\" height=\\\"auto\\\" \\/><\\/p>\\r\\n<p><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/tbe\\/1\\/16\\/1f3c6.png\');\\\">\\ud83c\\udfc6<\\/span><\\/span><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">\\u0110\\u01b0\\u1ee3c \\u0111\\u1ea1i di\\u1ec7n cho tr\\u01b0\\u1eddng tham gia thi \\u0111\\u1ea5u c&aacute;c g\\u1ea3i Karate sinh vi&ecirc;n c\\u1ea5p th&agrave;nh ph\\u1ed1 , to&agrave;n qu\\u1ed1c....<\\/span><\\/p>\\r\\n<p style=\\\"text-align: center;\\\"><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\"><img style=\\\"display: block; margin-left: auto; margin-right: auto;\\\" src=\\\"http:\\/\\/leaguedojo.vn\\/storage\\/dojos\\/December2019\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/><img src=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" alt=\\\"http:\\/\\/leaguedojo.tk\\/storage\\/posts\\/May2020\\/68393728_2915143145226427_3829384397207896064_o.jpg\\\" width=\\\"90%\\\" height=\\\"auto\\\" \\/>&nbsp;<br \\/><\\/span><\\/p>\\r\\n<p><span style=\\\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\\\">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br \\/>Karate N&ocirc;ng Ngi\\u1ec7p - K.L.D<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span>N\\u01a0I H\\u1ed8I T\\u1ee4 \\u0110AM M&Ecirc;&nbsp;<span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t3f\\/1\\/16\\/1f94b.png\');\\\">\\ud83e\\udd4b<\\/span><\\/span><br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t34\\/1\\/16\\/23f0.png\');\\\">\\u23f0<\\/span><\\/span>&nbsp;: 19h - 20h30\' Th\\u1ee9 2 v&agrave; Th\\u1ee9 5 h&agrave;ng tu\\u1ea7n<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/te1\\/1\\/16\\/26e9.png\');\\\">\\u26e9<\\/span><\\/span>&nbsp;:Nh&agrave; th\\u1ec3 ch\\u1ea5t HVNN Vi\\u1ec7t Nam<br \\/><span class=\\\"_5mfr\\\" style=\\\"margin: 0px 1px;\\\"><span class=\\\"_6qdm\\\" style=\\\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https:\\/\\/static.xx.fbcdn.net\\/images\\/emoji.php\\/v9\\/t22\\/1\\/16\\/260e.png\');\\\">\\u260e\\ufe0f<\\/span><\\/span> :Li&ecirc;n h\\u1ec7 : 0942332444<\\/span><\\/p>\",\"slug\":\"thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d\",\"status\":\"PUBLISHED\",\"category_id\":\"3\",\"source\":\"Karate N\\u00f4ng Nghi\\u1ec7p\",\"featured\":\"on\",\"keywords\":[\"tuy\\u1ec3n sinh\",\"hvnn\"],\"meta_description\":\"Ho\\u1ea1t \\u0111\\u1ed9ng tuy\\u1ec3n sinh \\u0111\\u01b0\\u1ee3c di\\u1ec5n ra th\\u01b0\\u1eddng xuy\\u00ean. C\\u00e1c b\\u1ea1n c\\u00f3 th\\u1ec3 li\\u00ean h\\u1ec7 v\\u00e0 \\u0111ang k\\u00fd t\\u1eadp luy\\u1ec7n ngay khi c\\u00f3 th\\u1ec3\",\"meta_keywords\":\"tuy\\u1ec3n sinh, karate n\\u00f4ng nghi\\u1ec7p\",\"seo_title\":\"Th\\u00f4ng tin tuy\\u1ec3n sinh Karate N\\u00f4ng Nghi\\u1ec7p - K.L.D\"}', '2020-06-01 01:58:43', '2020-06-01 01:58:43'),
(240, 5, 'admin/posts', 'GET', '172.68.253.82', '[]', '2020-06-01 01:58:43', '2020-06-01 01:58:43'),
(241, 5, 'admin/posts/2/edit', 'GET', '172.68.253.82', '[]', '2020-06-01 01:58:48', '2020-06-01 01:58:48'),
(242, 5, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '172.68.253.82', '[]', '2020-06-01 02:00:18', '2020-06-01 02:00:18'),
(243, NULL, '/', 'GET', '172.68.146.253', '[]', '2020-06-01 02:00:26', '2020-06-01 02:00:26'),
(244, 5, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '172.68.253.184', '[]', '2020-06-01 02:01:18', '2020-06-01 02:01:18'),
(245, NULL, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '108.162.221.69', '[]', '2020-06-01 02:02:09', '2020-06-01 02:02:09'),
(246, NULL, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '172.69.71.83', '[]', '2020-06-01 02:02:09', '2020-06-01 02:02:09'),
(247, NULL, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '172.69.71.55', '[]', '2020-06-01 02:02:10', '2020-06-01 02:02:10'),
(248, NULL, 'dojos/karate-nong-nghiep-k-l-d', 'GET', '172.69.71.83', '[]', '2020-06-01 02:02:10', '2020-06-01 02:02:10'),
(249, 5, 'dojos/karate-league-dojo', 'GET', '172.68.253.184', '[]', '2020-06-01 02:02:22', '2020-06-01 02:02:22'),
(250, NULL, 'dojos/karate-league-dojo', 'GET', '172.69.69.207', '[]', '2020-06-01 02:02:31', '2020-06-01 02:02:31'),
(251, NULL, 'dojos/karate-league-dojo', 'GET', '172.69.71.77', '[]', '2020-06-01 02:02:31', '2020-06-01 02:02:31'),
(252, NULL, 'dojos/karate-league-dojo', 'GET', '108.162.221.201', '[]', '2020-06-01 02:02:32', '2020-06-01 02:02:32'),
(253, NULL, 'dojos/karate-league-dojo', 'GET', '172.69.69.207', '[]', '2020-06-01 02:02:32', '2020-06-01 02:02:32'),
(254, 5, 'home', 'GET', '172.68.253.184', '[]', '2020-06-01 02:05:59', '2020-06-01 02:05:59'),
(255, 5, '/', 'GET', '162.158.178.214', '{\"fbclid\":\"IwAR1nhsQUTPhHgaxbLReIjyzzZ9ryvh75aKuAnX-Y7iIoadVHBUcC7ra3RCY\"}', '2020-06-01 02:13:11', '2020-06-01 02:13:11'),
(256, NULL, '/', 'GET', '172.69.69.129', '[]', '2020-06-01 02:13:11', '2020-06-01 02:13:11'),
(257, NULL, 'home', 'GET', '172.69.69.27', '[]', '2020-06-01 02:13:12', '2020-06-01 02:13:12'),
(258, 5, 'admin', 'GET', '162.158.178.214', '[]', '2020-06-01 02:14:11', '2020-06-01 02:14:11'),
(259, NULL, '/', 'GET', '42.157.195.85', '[]', '2020-06-01 02:25:31', '2020-06-01 02:25:31'),
(260, NULL, '/', 'GET', '198.108.66.247', '[]', '2020-06-01 03:20:44', '2020-06-01 03:20:44'),
(261, NULL, 'dojos', 'GET', '172.69.71.55', '[]', '2020-06-01 03:34:37', '2020-06-01 03:34:37'),
(262, NULL, 'dojos/karate-league-dojo', 'GET', '162.158.187.244', '[]', '2020-06-01 04:33:50', '2020-06-01 04:33:50'),
(263, NULL, '/', 'GET', '103.121.57.130', '[]', '2020-06-01 05:26:00', '2020-06-01 05:26:00'),
(264, NULL, '/', 'GET', '96.126.103.73', '[]', '2020-06-01 05:31:51', '2020-06-01 05:31:51'),
(265, NULL, '/', 'GET', '128.14.209.242', '[]', '2020-06-01 05:50:21', '2020-06-01 05:50:21'),
(266, NULL, '/', 'GET', '167.99.40.21', '[]', '2020-06-01 07:03:10', '2020-06-01 07:03:10'),
(267, NULL, 'dojos/karate-league-dojo', 'GET', '162.158.75.181', '[]', '2020-06-01 07:12:56', '2020-06-01 07:12:56'),
(268, NULL, '/', 'GET', '139.99.141.237', '[]', '2020-06-01 07:39:34', '2020-06-01 07:39:34'),
(269, NULL, '/', 'GET', '190.124.31.97', '[]', '2020-06-01 08:26:00', '2020-06-01 08:26:00'),
(270, NULL, '/', 'GET', '190.94.148.225', '[]', '2020-06-01 08:30:13', '2020-06-01 08:30:13'),
(271, NULL, '/', 'GET', '128.14.134.134', '[]', '2020-06-01 08:33:54', '2020-06-01 08:33:54'),
(272, NULL, '/', 'GET', '178.93.13.26', '[]', '2020-06-01 09:10:21', '2020-06-01 09:10:21'),
(273, NULL, '/', 'GET', '80.82.78.104', '[]', '2020-06-01 10:25:15', '2020-06-01 10:25:15'),
(274, NULL, 'dojos', 'GET', '162.158.7.212', '[]', '2020-06-01 11:38:22', '2020-06-01 11:38:22'),
(275, NULL, 'dojos/karate-league-dojo', 'GET', '162.158.7.212', '[]', '2020-06-01 11:38:34', '2020-06-01 11:38:34'),
(276, NULL, 'dojos/karate-dai-thanh-k-l-d', 'GET', '162.158.7.212', '[]', '2020-06-01 11:39:35', '2020-06-01 11:39:35'),
(277, 5, 'workout-registrations', 'GET', '162.158.7.182', '[]', '2020-06-01 11:45:33', '2020-06-01 11:45:33'),
(278, NULL, 'dojos/karate-league-dojo', 'GET', '141.101.77.19', '[]', '2020-06-01 11:48:25', '2020-06-01 11:48:25'),
(279, NULL, '/', 'GET', '172.69.71.55', '[]', '2020-06-01 11:49:34', '2020-06-01 11:49:34'),
(280, NULL, 'home', 'GET', '172.69.71.55', '[]', '2020-06-01 11:49:34', '2020-06-01 11:49:34'),
(281, NULL, 'home', 'GET', '172.69.71.55', '[]', '2020-06-01 11:49:43', '2020-06-01 11:49:43'),
(282, NULL, '/', 'GET', '172.69.71.55', '[]', '2020-06-01 11:49:46', '2020-06-01 11:49:46'),
(283, NULL, '/', 'GET', '80.82.78.104', '[]', '2020-06-01 12:11:54', '2020-06-01 12:11:54'),
(284, NULL, '/', 'GET', '172.104.108.109', '[]', '2020-06-01 12:12:48', '2020-06-01 12:12:48'),
(285, NULL, '/', 'HEAD', '172.69.62.245', '[]', '2020-06-01 12:34:16', '2020-06-01 12:34:16'),
(286, NULL, '/', 'GET', '212.83.171.224', '[]', '2020-06-01 12:46:52', '2020-06-01 12:46:52'),
(287, NULL, '/', 'GET', '103.247.216.217', '[]', '2020-06-01 13:02:55', '2020-06-01 13:02:55'),
(288, NULL, '/', 'GET', '195.54.160.135', '{\"a\":\"fetch\",\"content\":\"<php>die(@md5(HelloThinkCMF))<\\/php>\"}', '2020-06-01 13:05:07', '2020-06-01 13:05:07'),
(289, NULL, '/', 'GET', '195.54.160.135', '{\"XDEBUG_SESSION_START\":\"phpstorm\"}', '2020-06-01 13:05:07', '2020-06-01 13:05:07'),
(290, NULL, '/', 'GET', '195.54.160.135', '{\"s\":\"\\/Index\\/\\\\think\\\\app\\/invokefunction\",\"function\":\"call_user_func_array\",\"vars\":[\"md5\",[\"HelloThinkPHP\"]]}', '2020-06-01 13:18:07', '2020-06-01 13:18:07'),
(291, NULL, '/', 'GET', '162.158.75.139', '[]', '2020-06-01 14:12:52', '2020-06-01 14:12:52'),
(292, NULL, 'home', 'GET', '162.158.74.94', '[]', '2020-06-01 14:12:52', '2020-06-01 14:12:52'),
(293, NULL, '/', 'GET', '162.158.74.220', '[]', '2020-06-01 14:12:53', '2020-06-01 14:12:53'),
(294, NULL, '/', 'GET', '162.158.7.22', '[]', '2020-06-01 14:12:56', '2020-06-01 14:12:56'),
(295, NULL, '/', 'GET', '172.69.135.213', '[]', '2020-06-01 14:13:07', '2020-06-01 14:13:07'),
(296, NULL, 'news', 'GET', '162.158.7.120', '[]', '2020-06-01 14:13:11', '2020-06-01 14:13:11'),
(297, NULL, 'news', 'GET', '162.158.166.220', '[]', '2020-06-01 14:14:44', '2020-06-01 14:14:44'),
(298, NULL, 'register', 'GET', '172.69.135.217', '[]', '2020-06-01 14:17:05', '2020-06-01 14:17:05'),
(299, NULL, 'login', 'GET', '162.158.166.112', '[]', '2020-06-01 14:17:34', '2020-06-01 14:17:34'),
(300, NULL, 'register', 'GET', '162.158.166.112', '[]', '2020-06-01 14:17:38', '2020-06-01 14:17:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(2, 'browse_bread', NULL, '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(3, 'browse_database', NULL, '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(4, 'browse_media', NULL, '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(5, 'browse_compass', NULL, '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(6, 'browse_menus', 'menus', '2019-11-28 00:46:49', '2019-11-28 00:46:49'),
(7, 'read_menus', 'menus', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(8, 'edit_menus', 'menus', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(9, 'add_menus', 'menus', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(10, 'delete_menus', 'menus', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(11, 'browse_roles', 'roles', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(12, 'read_roles', 'roles', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(13, 'edit_roles', 'roles', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(14, 'add_roles', 'roles', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(15, 'delete_roles', 'roles', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(16, 'browse_users', 'users', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(17, 'read_users', 'users', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(18, 'edit_users', 'users', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(19, 'add_users', 'users', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(20, 'delete_users', 'users', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(21, 'browse_settings', 'settings', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(22, 'read_settings', 'settings', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(23, 'edit_settings', 'settings', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(24, 'add_settings', 'settings', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(25, 'delete_settings', 'settings', '2019-11-28 00:46:50', '2019-11-28 00:46:50'),
(31, 'browse_posts', 'posts', '2019-11-28 00:46:54', '2019-11-28 00:46:54'),
(32, 'read_posts', 'posts', '2019-11-28 00:46:54', '2019-11-28 00:46:54'),
(33, 'edit_posts', 'posts', '2019-11-28 00:46:54', '2019-11-28 00:46:54'),
(34, 'add_posts', 'posts', '2019-11-28 00:46:54', '2019-11-28 00:46:54'),
(35, 'delete_posts', 'posts', '2019-11-28 00:46:55', '2019-11-28 00:46:55'),
(41, 'browse_hooks', NULL, '2019-11-28 00:46:58', '2019-11-28 00:46:58'),
(42, 'browse_students', 'students', '2019-11-28 01:57:44', '2019-11-28 01:57:44'),
(43, 'read_students', 'students', '2019-11-28 01:57:44', '2019-11-28 01:57:44'),
(44, 'edit_students', 'students', '2019-11-28 01:57:44', '2019-11-28 01:57:44'),
(45, 'add_students', 'students', '2019-11-28 01:57:44', '2019-11-28 01:57:44'),
(46, 'delete_students', 'students', '2019-11-28 01:57:44', '2019-11-28 01:57:44'),
(52, 'browse_dojos', 'dojos', '2019-11-30 19:50:37', '2019-11-30 19:50:37'),
(53, 'read_dojos', 'dojos', '2019-11-30 19:50:37', '2019-11-30 19:50:37'),
(54, 'edit_dojos', 'dojos', '2019-11-30 19:50:37', '2019-11-30 19:50:37'),
(55, 'add_dojos', 'dojos', '2019-11-30 19:50:37', '2019-11-30 19:50:37'),
(56, 'delete_dojos', 'dojos', '2019-11-30 19:50:37', '2019-11-30 19:50:37'),
(57, 'browse_slides', 'slides', '2019-12-02 02:42:16', '2019-12-02 02:42:16'),
(58, 'read_slides', 'slides', '2019-12-02 02:42:16', '2019-12-02 02:42:16'),
(59, 'edit_slides', 'slides', '2019-12-02 02:42:16', '2019-12-02 02:42:16'),
(60, 'add_slides', 'slides', '2019-12-02 02:42:16', '2019-12-02 02:42:16'),
(61, 'delete_slides', 'slides', '2019-12-02 02:42:16', '2019-12-02 02:42:16'),
(67, 'browse_videos', 'videos', '2019-12-02 09:32:55', '2019-12-02 09:32:55'),
(68, 'read_videos', 'videos', '2019-12-02 09:32:55', '2019-12-02 09:32:55'),
(69, 'edit_videos', 'videos', '2019-12-02 09:32:55', '2019-12-02 09:32:55'),
(70, 'add_videos', 'videos', '2019-12-02 09:32:55', '2019-12-02 09:32:55'),
(71, 'delete_videos', 'videos', '2019-12-02 09:32:55', '2019-12-02 09:32:55'),
(72, 'browse_categories', 'categories', '2020-01-01 04:47:10', '2020-01-01 04:47:10'),
(73, 'read_categories', 'categories', '2020-01-01 04:47:10', '2020-01-01 04:47:10'),
(74, 'edit_categories', 'categories', '2020-01-01 04:47:10', '2020-01-01 04:47:10'),
(75, 'add_categories', 'categories', '2020-01-01 04:47:10', '2020-01-01 04:47:10'),
(76, 'delete_categories', 'categories', '2020-01-01 04:47:10', '2020-01-01 04:47:10'),
(77, 'browse_playlists', 'playlists', '2020-01-10 16:21:34', '2020-01-10 16:21:34'),
(78, 'read_playlists', 'playlists', '2020-01-10 16:21:34', '2020-01-10 16:21:34'),
(79, 'edit_playlists', 'playlists', '2020-01-10 16:21:34', '2020-01-10 16:21:34'),
(80, 'add_playlists', 'playlists', '2020-01-10 16:21:34', '2020-01-10 16:21:34'),
(81, 'delete_playlists', 'playlists', '2020-01-10 16:21:34', '2020-01-10 16:21:34'),
(82, 'browse_documents', 'documents', '2020-01-21 09:06:08', '2020-01-21 09:06:08'),
(83, 'read_documents', 'documents', '2020-01-21 09:06:08', '2020-01-21 09:06:08'),
(84, 'edit_documents', 'documents', '2020-01-21 09:06:08', '2020-01-21 09:06:08'),
(85, 'add_documents', 'documents', '2020-01-21 09:06:08', '2020-01-21 09:06:08'),
(86, 'delete_documents', 'documents', '2020-01-21 09:06:08', '2020-01-21 09:06:08'),
(92, 'browse_tuitions', 'tuitions', '2020-03-26 10:32:21', '2020-03-26 10:32:21'),
(93, 'read_tuitions', 'tuitions', '2020-03-26 10:32:21', '2020-03-26 10:32:21'),
(94, 'edit_tuitions', 'tuitions', '2020-03-26 10:32:21', '2020-03-26 10:32:21'),
(95, 'add_tuitions', 'tuitions', '2020-03-26 10:32:21', '2020-03-26 10:32:21'),
(96, 'delete_tuitions', 'tuitions', '2020-03-26 10:32:21', '2020-03-26 10:32:21'),
(97, 'browse_bonus_defaults', 'bonus_defaults', '2020-03-27 08:03:39', '2020-03-27 08:03:39'),
(98, 'read_bonus_defaults', 'bonus_defaults', '2020-03-27 08:03:39', '2020-03-27 08:03:39'),
(99, 'edit_bonus_defaults', 'bonus_defaults', '2020-03-27 08:03:39', '2020-03-27 08:03:39'),
(100, 'add_bonus_defaults', 'bonus_defaults', '2020-03-27 08:03:39', '2020-03-27 08:03:39'),
(101, 'delete_bonus_defaults', 'bonus_defaults', '2020-03-27 08:03:39', '2020-03-27 08:03:39'),
(102, 'browse_vouchers', 'vouchers', '2020-03-27 10:43:46', '2020-03-27 10:43:46'),
(103, 'read_vouchers', 'vouchers', '2020-03-27 10:43:46', '2020-03-27 10:43:46'),
(104, 'edit_vouchers', 'vouchers', '2020-03-27 10:43:46', '2020-03-27 10:43:46'),
(105, 'add_vouchers', 'vouchers', '2020-03-27 10:43:46', '2020-03-27 10:43:46'),
(106, 'delete_vouchers', 'vouchers', '2020-03-27 10:43:46', '2020-03-27 10:43:46'),
(107, 'browse_tuition_policies', 'tuition_policies', '2020-04-01 19:47:29', '2020-04-01 19:47:29'),
(108, 'read_tuition_policies', 'tuition_policies', '2020-04-01 19:47:29', '2020-04-01 19:47:29'),
(109, 'edit_tuition_policies', 'tuition_policies', '2020-04-01 19:47:29', '2020-04-01 19:47:29'),
(110, 'add_tuition_policies', 'tuition_policies', '2020-04-01 19:47:29', '2020-04-01 19:47:29'),
(111, 'delete_tuition_policies', 'tuition_policies', '2020-04-01 19:47:29', '2020-04-01 19:47:29'),
(112, 'browse_transfer_dojos', 'transfer_dojos', '2020-04-08 23:43:43', '2020-04-08 23:43:43'),
(113, 'read_transfer_dojos', 'transfer_dojos', '2020-04-08 23:43:43', '2020-04-08 23:43:43'),
(114, 'edit_transfer_dojos', 'transfer_dojos', '2020-04-08 23:43:43', '2020-04-08 23:43:43'),
(115, 'add_transfer_dojos', 'transfer_dojos', '2020-04-08 23:43:43', '2020-04-08 23:43:43'),
(116, 'delete_transfer_dojos', 'transfer_dojos', '2020-04-08 23:43:43', '2020-04-08 23:43:43'),
(117, 'confirm_transfer_dojos', 'transfer_dojos', '2020-04-08 23:43:43', '2020-04-08 23:43:43'),
(118, 'browse_operation_logs', 'operation_logs', '2020-04-10 22:32:41', '2020-04-10 22:32:41'),
(119, 'read_operation_logs', 'operation_logs', '2020-04-10 22:32:41', '2020-04-10 22:32:41'),
(120, 'edit_operation_logs', 'operation_logs', '2020-04-10 22:32:41', '2020-04-10 22:32:41'),
(121, 'add_operation_logs', 'operation_logs', '2020-04-10 22:32:41', '2020-04-10 22:32:41'),
(122, 'delete_operation_logs', 'operation_logs', '2020-04-10 22:32:41', '2020-04-10 22:32:41'),
(123, 'browse_achievements', 'achievements', '2020-04-12 22:32:02', '2020-04-12 22:32:02'),
(124, 'read_achievements', 'achievements', '2020-04-12 22:32:02', '2020-04-12 22:32:02'),
(125, 'edit_achievements', 'achievements', '2020-04-12 22:32:02', '2020-04-12 22:32:02'),
(126, 'add_achievements', 'achievements', '2020-04-12 22:32:02', '2020-04-12 22:32:02'),
(127, 'delete_achievements', 'achievements', '2020-04-12 22:32:02', '2020-04-12 22:32:02'),
(128, 'browse_test_scores', 'test_scores', '2020-04-14 06:13:58', '2020-04-14 06:13:58'),
(129, 'read_test_scores', 'test_scores', '2020-04-14 06:13:58', '2020-04-14 06:13:58'),
(130, 'edit_test_scores', 'test_scores', '2020-04-14 06:13:58', '2020-04-14 06:13:58'),
(131, 'add_test_scores', 'test_scores', '2020-04-14 06:13:58', '2020-04-14 06:13:58'),
(132, 'delete_test_scores', 'test_scores', '2020-04-14 06:13:58', '2020-04-14 06:13:58'),
(133, 'browse_attends', 'attends', '2020-04-14 20:53:02', '2020-04-14 20:53:02'),
(134, 'read_attends', 'attends', '2020-04-14 20:53:02', '2020-04-14 20:53:02'),
(135, 'edit_attends', 'attends', '2020-04-14 20:53:02', '2020-04-14 20:53:02'),
(136, 'add_attends', 'attends', '2020-04-14 20:53:02', '2020-04-14 20:53:02'),
(137, 'delete_attends', 'attends', '2020-04-14 20:53:02', '2020-04-14 20:53:02'),
(138, 'browse_events', 'events', '2020-04-14 20:57:13', '2020-04-14 20:57:13'),
(139, 'read_events', 'events', '2020-04-14 20:57:13', '2020-04-14 20:57:13'),
(140, 'edit_events', 'events', '2020-04-14 20:57:13', '2020-04-14 20:57:13'),
(141, 'add_events', 'events', '2020-04-14 20:57:13', '2020-04-14 20:57:13'),
(142, 'delete_events', 'events', '2020-04-14 20:57:13', '2020-04-14 20:57:13'),
(143, 'confirm_attends', 'attends', '2020-04-14 20:53:02', '2020-04-14 20:53:02'),
(144, 'browse_rooms', 'rooms', '2020-04-19 08:58:56', '2020-04-19 08:58:56'),
(145, 'read_rooms', 'rooms', '2020-04-19 08:58:56', '2020-04-19 08:58:56'),
(146, 'edit_rooms', 'rooms', '2020-04-19 08:58:56', '2020-04-19 08:58:56'),
(147, 'add_rooms', 'rooms', '2020-04-19 08:58:56', '2020-04-19 08:58:56'),
(148, 'delete_rooms', 'rooms', '2020-04-19 08:58:56', '2020-04-19 08:58:56'),
(149, 'browse_book_rooms', 'book_rooms', '2020-04-19 09:10:19', '2020-04-19 09:10:19'),
(150, 'read_book_rooms', 'book_rooms', '2020-04-19 09:10:19', '2020-04-19 09:10:19'),
(151, 'edit_book_rooms', 'book_rooms', '2020-04-19 09:10:19', '2020-04-19 09:10:19'),
(152, 'add_book_rooms', 'book_rooms', '2020-04-19 09:10:19', '2020-04-19 09:10:19'),
(153, 'delete_book_rooms', 'book_rooms', '2020-04-19 09:10:19', '2020-04-19 09:10:19'),
(154, 'browse_uptimes', 'uptimes', '2020-04-19 19:08:08', '2020-04-19 19:08:08'),
(155, 'read_uptimes', 'uptimes', '2020-04-19 19:08:08', '2020-04-19 19:08:08'),
(156, 'edit_uptimes', 'uptimes', '2020-04-19 19:08:08', '2020-04-19 19:08:08'),
(157, 'add_uptimes', 'uptimes', '2020-04-19 19:08:08', '2020-04-19 19:08:08'),
(158, 'delete_uptimes', 'uptimes', '2020-04-19 19:08:08', '2020-04-19 19:08:08'),
(159, 'confirm_book_rooms', 'book_rooms', '2020-04-19 09:10:19', '2020-04-19 09:10:19'),
(160, 'browse_workout_registrations', 'workout_registrations', '2020-05-22 16:11:29', '2020-05-22 16:11:29'),
(161, 'read_workout_registrations', 'workout_registrations', '2020-05-22 16:11:29', '2020-05-22 16:11:29'),
(162, 'edit_workout_registrations', 'workout_registrations', '2020-05-22 16:11:29', '2020-05-22 16:11:29'),
(163, 'add_workout_registrations', 'workout_registrations', '2020-05-22 16:11:29', '2020-05-22 16:11:29'),
(164, 'delete_workout_registrations', 'workout_registrations', '2020-05-22 16:11:29', '2020-05-22 16:11:29'),
(165, 'confirm_workout_registrations', 'workout_registrations', '2020-05-22 16:11:29', '2020-05-22 16:11:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 5),
(17, 1),
(17, 5),
(18, 1),
(19, 1),
(19, 5),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(31, 1),
(31, 3),
(31, 4),
(31, 5),
(32, 1),
(32, 3),
(32, 4),
(32, 5),
(33, 1),
(33, 3),
(33, 4),
(33, 5),
(34, 1),
(34, 3),
(34, 4),
(34, 5),
(35, 1),
(35, 3),
(35, 4),
(35, 5),
(42, 1),
(42, 5),
(43, 1),
(43, 5),
(44, 1),
(44, 5),
(45, 1),
(45, 5),
(46, 5),
(52, 1),
(52, 5),
(53, 1),
(53, 5),
(54, 1),
(54, 5),
(55, 1),
(55, 5),
(56, 1),
(56, 5),
(57, 1),
(57, 3),
(57, 4),
(57, 5),
(58, 1),
(58, 3),
(58, 4),
(58, 5),
(59, 1),
(59, 3),
(59, 4),
(59, 5),
(60, 1),
(60, 3),
(60, 4),
(60, 5),
(61, 1),
(61, 3),
(61, 4),
(61, 5),
(67, 1),
(67, 3),
(67, 4),
(67, 5),
(68, 1),
(68, 3),
(68, 4),
(68, 5),
(69, 1),
(69, 3),
(69, 4),
(69, 5),
(70, 1),
(70, 3),
(70, 4),
(70, 5),
(71, 1),
(71, 3),
(71, 4),
(71, 5),
(72, 1),
(72, 3),
(72, 4),
(72, 5),
(73, 1),
(73, 3),
(73, 4),
(73, 5),
(74, 1),
(74, 3),
(74, 4),
(74, 5),
(75, 1),
(75, 3),
(75, 4),
(75, 5),
(76, 1),
(76, 3),
(76, 4),
(76, 5),
(77, 1),
(77, 3),
(77, 4),
(77, 5),
(78, 1),
(78, 3),
(78, 4),
(78, 5),
(79, 1),
(79, 3),
(79, 4),
(79, 5),
(80, 1),
(80, 3),
(80, 4),
(80, 5),
(81, 1),
(81, 3),
(81, 4),
(81, 5),
(82, 1),
(82, 3),
(82, 4),
(82, 5),
(83, 1),
(83, 3),
(83, 4),
(83, 5),
(84, 1),
(84, 3),
(84, 4),
(84, 5),
(85, 1),
(85, 3),
(85, 4),
(85, 5),
(86, 1),
(86, 3),
(86, 4),
(86, 5),
(92, 1),
(92, 5),
(93, 1),
(93, 5),
(94, 1),
(95, 1),
(95, 5),
(96, 1),
(97, 1),
(97, 5),
(98, 1),
(98, 5),
(99, 1),
(99, 5),
(100, 1),
(100, 5),
(101, 1),
(101, 5),
(102, 1),
(102, 5),
(103, 1),
(103, 5),
(104, 1),
(105, 1),
(105, 5),
(106, 1),
(106, 5),
(107, 1),
(107, 5),
(108, 1),
(108, 5),
(109, 1),
(109, 5),
(110, 1),
(110, 5),
(111, 1),
(111, 5),
(112, 1),
(112, 5),
(113, 1),
(113, 5),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(117, 5),
(118, 1),
(119, 1),
(122, 1),
(123, 1),
(123, 4),
(123, 5),
(124, 1),
(124, 4),
(124, 5),
(125, 1),
(125, 4),
(125, 5),
(126, 1),
(126, 4),
(126, 5),
(127, 1),
(127, 4),
(127, 5),
(128, 1),
(128, 5),
(129, 1),
(129, 5),
(130, 1),
(130, 5),
(131, 1),
(131, 5),
(132, 1),
(132, 5),
(133, 1),
(133, 4),
(133, 5),
(134, 1),
(134, 4),
(134, 5),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(138, 4),
(138, 5),
(139, 1),
(139, 4),
(139, 5),
(140, 1),
(140, 4),
(140, 5),
(141, 1),
(141, 4),
(141, 5),
(142, 1),
(142, 4),
(142, 5),
(143, 1),
(143, 4),
(143, 5),
(144, 1),
(144, 4),
(144, 5),
(145, 1),
(145, 4),
(145, 5),
(146, 1),
(146, 4),
(146, 5),
(147, 1),
(147, 4),
(147, 5),
(148, 1),
(148, 4),
(148, 5),
(149, 1),
(149, 4),
(149, 5),
(150, 1),
(150, 4),
(150, 5),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(154, 4),
(154, 5),
(155, 1),
(155, 4),
(155, 5),
(156, 1),
(156, 4),
(156, 5),
(157, 1),
(157, 4),
(157, 5),
(158, 1),
(158, 4),
(158, 5),
(159, 1),
(159, 4),
(159, 5),
(160, 1),
(160, 4),
(160, 5),
(161, 1),
(161, 4),
(161, 5),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(165, 4),
(165, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'GIẢI VÔ ĐỊCH KARATE ĐẠI HỌC CÔNG ĐOÀN MỞ RỘNG LẦN THỨ II', 'giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-ii', '2020-01-10 16:29:00', '2020-01-10 17:23:14'),
(2, 'NỘI DUNG THI LÊN ĐAI', 'noi-dung-thi-len-dai', '2020-01-13 09:28:25', '2020-01-13 09:28:25'),
(3, 'test', 'test', '2020-06-29 09:09:49', '2020-06-29 09:09:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `source`, `keywords`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 2, 'Đoàn Karate League Dojo đã đạt kết quả tốt tại giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'Đoàn Karate League Dojo đã đạt kết quả tốt tại giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'Giải vô địch Karate Đại học Công Đoàn mở rộng lần thứ 2 diễn ra trong 2 ngày 7-8/4/2019 được tổ chức tại trường Đại học Công Đoàn. Tham gia giải đấu với tinh thần giao lưu, học hỏi và thể hiện bản thân, đoàn VĐV Karate League Dojo đã đạt được những thành tích cao.', '<p style=\"text-align: left;\"><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Kết th&uacute;c giải V&ocirc; địch Karate Đại học C&ocirc;ng đo&agrave;n mở rộng lần thứ 2, Đo&agrave;n Karate League Dojo đ&atilde; gi&agrave;nh được c&aacute;c giải:</span></p>\r\n<p style=\"text-align: left;\"><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\"><a href=\"https://www.youtube.com/watch?v=vSzKprJ4VFU\">https://www.youtube.com/watch?v=vSzKprJ4VFU</a></span></p>\r\n<figure class=\"image\" style=\"text-align: center;\"><img title=\"Team Kata xuất sắc gi&agrave;nh huy chương bạc hội dung Kata đồng đội hỗn họp tr&ecirc;n 16 tuổi\" src=\"http://leaguedojo.tk/storage/posts/December2019/IMG_2982.JPG\" alt=\"Team Kata xuất sắc gi&agrave;nh huy chương bạc hội dung Kata đồng đội hỗn họp tr&ecirc;n 16 tuổi\" width=\"90%\" height=\"auto\" />\r\n<figcaption><br />Team Kata xuất sắc gi&agrave;nh huy chương bạc hội dung Kata đồng đội hỗn họp tr&ecirc;n 16 tuổi</figcaption>\r\n</figure>\r\n<p style=\"text-align: left;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t15/1/16/1f948.png?_nc_eui2=AeFk2JIaZidjHIE__PG6Gf9jdPaRDpku-vezgfSs3_SmI7wRmctplp0KYWoks5dS-yUUakwA1KuTKg3v-p_2wbTL-8JaDbNxAP01B3EW9nCocg\');\">🥈</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">HCB nội dung Kumite đồng đội nam tr&ecirc;n 18 tuổi</span></p>\r\n<figure class=\"image\" style=\"text-align: center;\"><img title=\"Team Kumite cũng xuất sắc gi&agrave;nh tấm huy chương bạc tại nội dung kumite đồng đội nam tr&ecirc;n 16 tuối\" src=\"http://leaguedojo.tk/storage/posts/December2019/56599791_2798086877083473_1095563444729413632_o.jpg\" alt=\"Team Kumite cũng xuất sắc gi&agrave;nh tấm huy chương bạc tại nội dung kumite đồng đội nam tr&ecirc;n 16 tuối\" width=\"70%\" height=\"auto\" />\r\n<figcaption><br />Team Kumite cũng xuất sắc gi&agrave;nh tấm huy chương bạc tại nội dung kumite đồng đội nam tr&ecirc;n 16 tuối</figcaption>\r\n</figure>\r\n<p style=\"text-align: left;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t15/1/16/1f948.png?_nc_eui2=AeFk2JIaZidjHIE__PG6Gf9jdPaRDpku-vezgfSs3_SmI7wRmctplp0KYWoks5dS-yUUakwA1KuTKg3v-p_2wbTL-8JaDbNxAP01B3EW9nCocg\');\">🥈</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">HCB nội dung Kata đồng đội hỗn hợp tr&ecirc;n 16 tuổi</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t96/1/16/1f949.png?_nc_eui2=AeHHuN-1MpIbQkMzACBa_M2IAx6xcC6roH_oUHIaJti-LRng79OCmYb7XsRoG1oGjwNhVTMtqHOUHSTpdCYWPQWbmRDHzI3wDDDS6EOCWCxqXg\');\">🥉</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">HCĐ c&aacute;c nội dung c&aacute; nh&acirc;n bao gồm:</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Kumite c&aacute; nh&acirc;n nam tr&ecirc;n 18 tuổi c&aacute;c hạng c&acirc;n dưới 55kg, tr&ecirc;n 75kg;</span><span class=\"text_exposed_show\" style=\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kumite c&aacute; nh&acirc;n nữ tr&ecirc;n 18 tuổi hạng c&acirc;n dưới 44kg;<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kumite c&aacute; nh&acirc;n nam 9-11 tuổi c&aacute;c hạng c&acirc;n dưới 30kg, tr&ecirc;n 44kg ;<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kata c&aacute; nh&acirc;n nữ dưới 11 tuổi;<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kata c&aacute; nh&acirc;n nam dưới 11 tuổi</span></p>', '[\"posts\\\\May2020\\\\6dF57jHaOFeY9Yle2HeR.jpg\",\"posts\\\\May2020\\\\S8pUpLg1dpprT99GaaC4.jpg\",\"posts\\\\May2020\\\\P8GLLp0ZeCox9q0KcnSW.JPG\",\"posts\\\\May2020\\\\rxSCP9q4m721nCDRoBKC.JPG\",\"posts\\\\May2020\\\\18ym0Ev8iYZWuZ4QuYQK.JPG\",\"posts\\\\May2020\\\\wh8D0Qlb2JcVu9qlCQqO.JPG\",\"posts\\\\May2020\\\\xlqDDDGZQtVMHqstEOBY.jpeg\"]', 'doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 'Karate League Dojo', '[\"tuy\\u1ec3n sinh\",\"HVNN\"]', 'Giải vô địch Karate Đại học Công Đoàn mở rộng lần thứ 2 diễn ra trong 2 ngày 7-8/4/2019 được tổ chức tại trường Đại học Công Đoàn. Tham gia giải đấu với tinh thần giao lưu, học hỏi và thể hiện bản thân, đoàn VĐV Karate League Dojo đã đạt được những thành tích cao.', 'vô địch karate, đại học công đoàn', 'PUBLISHED', 1, '2019-12-09 19:41:11', '2020-05-31 18:38:10', NULL),
(2, 5, 3, 'Thông tin tuyển sinh võ đường Karate League Dojo', 'Thông tin tuyển sinh võ đường Karate league Dojo', 'Vớì những bậc phụ huynh quan tâm tới giáo dục con cái thì sẽ luôn biết rằng bên cạnh gìâo dục tri thức là giáo dục thể chất không thể thiếu trong quá trình giáo dục và học tập của con cái. Ở tuổi này, trẻ được vận động đúng cách sẽ phát triển tâm sinh lý theo đúng diễn biển tốt. Với nhiều năm kinh nghiệm thi đấu, huấn luyện và giảng dạy môn võ Karatedo các HLV sẽ trau đổi tinh thần thượng võ NHÂN - NGHĨA - LỄ -TRÍ - TÍN.\r\nHãy nhanh tay đăng ký nào!', '<p style=\"margin: 6px 0px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\">V&otilde; đường League dojo th&ocirc;ng b&aacute;o tuyển sinh c&aacute;c bạn thiếu nhi từ 4 tuổi trở l&ecirc;n y&ecirc;u th&iacute;ch vận động, ph&aacute;t triển thể chất n&acirc;ng cao sức khỏe, học tập đạo đức, thư gi&atilde;n sau giơ học văn h&oacute;a căng thẳng.</p>\r\n<p style=\"margin: 6px 0px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Địa điểm: League dojo - sảnh 1 Đơn nguy&ecirc;n 2 CT3 khu đ&ocirc; thị mới Trung Văn - Nam Từ Li&ecirc;m - .H&agrave; Nội.</p>\r\n<div class=\"text_exposed_show\" style=\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\">\r\n<p style=\"margin: 0px 0px 6px; font-family: inherit;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/16/1f917.png?_nc_eui2=AeGkTF_qKg6ex4RK4ZOcxycPmqT5dC5g8P4UHrVwXu88rHruuEBEltugQZJ1EjEQX6p1S3tMWSV2UP9TuHQ29obRCbLPcapBa_1QV3X6iBezgg\');\">🤗</span></span>Lớp 01: 17h30-19h thứ 3 v&agrave; thứ 6 h&agrave;ng tuần.<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/16/1f917.png?_nc_eui2=AeGkTF_qKg6ex4RK4ZOcxycPmqT5dC5g8P4UHrVwXu88rHruuEBEltugQZJ1EjEQX6p1S3tMWSV2UP9TuHQ29obRCbLPcapBa_1QV3X6iBezgg\');\">🤗</span></span>Lớp 02: 17h30-19h thứ 4 v&agrave; thứ 7 h&agrave;ng tuần<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t0/1/16/1f60b.png?_nc_eui2=AeHmHQa5DQPoqhXBvNHfmB4AuFMMUEBchYZqBF1Zh_FRQ0SlafeBJ-0d__y7dgy4tw4ZBF5Y9Qkli72j2W-DCRtNRLC4q-YKiq4fzoRxG_2zCw\');\">😋</span></span>Lớp 03:17h30- 19h thứ 2 v&agrave; thứ 5 h&agrave;ng tuần<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t2/1/16/1f60d.png?_nc_eui2=AeFB-OA4TKZtFFFm1OMnW-ySTXtuEZ2uPeYwBnuSfYTq-8vApVoG075NTEOdL4BfMKtI3b63mQYPEJQmmJs7HcT9Yro_113vDJ4cufjBR-i6AA\');\">😍</span></span>Lớp 04:7h30- 9h s&aacute;ng thứ 7 v&agrave; chủ nhật h&agrave;ng tuần</p>\r\n<p style=\"margin: 6px 0px; font-family: inherit;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png?_nc_eui2=AeFls8t9Jw9u3CTdmnqSdxPtglbtifYtqQ1i1fBnisvBY7JJQNdtquReoMSG1Fof4eD4Cwh87Ymt0532u7qjCrMF_L3uJ9zXhdodvhXwhNtsSA\');\">✅</span></span>Vớ&igrave; những bậc phụ huynh quan t&acirc;m tới gi&aacute;o dục con c&aacute;i th&igrave; sẽ lu&ocirc;n biết rằng b&ecirc;n cạnh g&igrave;&acirc;o dục tri thức l&agrave; gi&aacute;o dục thể chất kh&ocirc;ng thể thiếu trong qu&aacute; tr&igrave;nh gi&aacute;o dục v&agrave; học tập của con c&aacute;i. Ở tuổi n&agrave;y, trẻ được vận động đ&uacute;ng c&aacute;ch sẽ ph&aacute;t triển t&acirc;m sinh l&yacute; theo đ&uacute;ng diễn biển tốt. Với nhiều năm kinh nghiệm thi đấu, huấn luyện v&agrave; giảng dạy m&ocirc;n v&otilde; Karatedo c&aacute;c HLV sẽ trau đổi tinh thần thượng v&otilde; NH&Acirc;N - NGHĨA - LỄ -TR&Iacute; - T&Iacute;N.</p>\r\n<p style=\"margin: 6px 0px; font-family: inherit; text-align: left;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t33/1/16/2705.png?_nc_eui2=AeFls8t9Jw9u3CTdmnqSdxPtglbtifYtqQ1i1fBnisvBY7JJQNdtquReoMSG1Fof4eD4Cwh87Ymt0532u7qjCrMF_L3uJ9zXhdodvhXwhNtsSA\');\">✅</span></span>V&otilde; đường với trang thiết bị hiện đại, ti&ecirc;u chuẩn ph&ograve;ng tập đội tuyến sẽ mang đến những điệu tốt nhất gi&agrave;nh cho c&aacute;c v&otilde; sinh.</p>\r\n</div>\r\n<figure class=\"image\" style=\"text-align: center;\"><img title=\"V&otilde; đường Karate League Dojo với trang thiết bị hiện đại\" src=\"http://leaguedojo.tk/storage/posts/May2020/37022211_2573406232884873_3193762549166243840_o1.jpg\" alt=\"V&otilde; đường Karate League Dojo với trang thiết bị hiện đại\" width=\"90%\" height=\"auto\" />\r\n<figcaption><br />V&otilde; đường Karate League Dojo với trang thiết bị hiện đại</figcaption>\r\n</figure>\r\n<div class=\"text_exposed_show\" style=\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\">\r\n<p style=\"margin: 6px 0px; font-family: inherit; text-align: left;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f64b_200d_2642.png?_nc_eui2=AeExf-QcVUGdm5j6A_eNYrQlLA1i03QDuKeRmKqU6-gJ7I1KJ2lt8yA13Di6cnh4D6GNGVJbwepYBPMgFpMXxkSHfL65be8X_TAHotcFW9t64A\');\">🙋&zwj;♂️</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f64b_200d_2642.png?_nc_eui2=AeExf-QcVUGdm5j6A_eNYrQlLA1i03QDuKeRmKqU6-gJ7I1KJ2lt8yA13Di6cnh4D6GNGVJbwepYBPMgFpMXxkSHfL65be8X_TAHotcFW9t64A\');\">🙋&zwj;♂️</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tac/1/16/1f64b_200d_2642.png?_nc_eui2=AeExf-QcVUGdm5j6A_eNYrQlLA1i03QDuKeRmKqU6-gJ7I1KJ2lt8yA13Di6cnh4D6GNGVJbwepYBPMgFpMXxkSHfL65be8X_TAHotcFW9t64A\');\">🙋&zwj;♂️</span></span>&nbsp;HLV Trần Mạnh Dũng: huyễn đai đệ tam đẳng Karatedo, cựu VĐV đội tuyển Quốc gia, kiện tướng Karate Quốc gia, gi&aacute;o vi&ecirc;n giảng dạy Karatedo Cảnh s&aacute;t ph&ograve;ng ch&aacute;y chữa ch&aacute;y... .</p>\r\n</div>\r\n<figure class=\"image align-center\" style=\"text-align: center;\"><img title=\"HLV. Trần Mạnh Dũng\" src=\"http://leaguedojo.tk/storage/posts/May2020/35053850_2539805709578259_1385784409373802496_o.jpg\" alt=\"HLV. Trần Mạnh Dũng\" width=\"90%\" height=\"auto\" />\r\n<figcaption><br />HLV. Trần Mạnh Dũng</figcaption>\r\n</figure>\r\n<div class=\"text_exposed_show\" style=\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\">\r\n<p style=\"margin: 6px 0px; font-family: inherit; text-align: left;\"><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t4d/1/16/1f4de.png?_nc_eui2=AeFkJjG5btRq26UmPgKSV4pYKerOEKUdSiLwesMpFuSSNVtETcWyeevHrSqgCpxn0xIRnznWNC2THAWIovfdhKBHysFdm9rsci6ayAzw-331MQ\');\">📞</span></span> Liện hệ ngay để biết th&ecirc;m th&ocirc;ng tin chi tiết: 094.2332.444 - 0937.186.444</p>\r\n</div>\r\n<div class=\"ddict_btn\" style=\"top: 1169px; left: -3.35543e+07px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/icon/16.png\" /></div>', '[\"posts\\\\December2019\\\\SHsZhng7xZMef9xSMGGR.jpg\",\"posts\\\\December2019\\\\uV8zuiMvabDTcXznrrrR.jpg\"]', 'thong-tin-tuyen-sinh-vo-duong-karate-league-dojo', 'Karate League Dojo', '[\"tuy\\u1ec3n sinh\",\"Karate League Dojo\",\"k.l.d\"]', 'Vớì những bậc phụ huynh quan tâm tới giáo dục con cái thì sẽ luôn biết rằng bên cạnh gìâo dục tri thức là giáo dục thể chất không thể thiếu trong quá trình giáo dục và học tập của con cái. Ở tuổi này, trẻ được vận động đúng cách sẽ phát triển tâm sinh lý theo đúng diễn biển tốt. Với nhiều năm kinh nghiệm thi đấu, huấn luyện và giảng dạy môn võ Karatedo các HLV sẽ trau đổi tinh thần thượng võ NHÂN - NGHĨA - LỄ -TRÍ - TÍN.\r\nHãy nhanh tay đăng ký nào!', 'tuyển sinh, karate league dojo', 'PUBLISHED', 1, '2019-12-09 20:52:28', '2020-05-31 18:40:09', NULL),
(3, 5, 3, 'Thông tin tuyển sinh Karate Nông Nghiệp - K.L.D', 'Thông tin tuyển sinh Karate Nông Nghiệp - K.L.D', NULL, '<p><strong><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">KHI THAM GIA CLB C&Aacute;C BẠN L&Agrave; TH&Agrave;NH VI&Ecirc;N V&Otilde; ĐƯỜNG SẼ ĐƯỢC ƯU TI&Ecirc;N CỘNG ĐIỂM HỌC GDTC C&Aacute;C M&Ocirc;N HỌC NHƯ : CẦU L&Ocirc;NG, ĐIỀN KINH, TENIS.....</span></strong><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png\');\">👉</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Miễn ph&iacute; học thử trước khi đăng k&yacute; tập luyện.</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t38/1/16/1f44a_1f3ff.png\');\">👊🏿</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Tặng ngay 01 bộ v&otilde; phục trị gi&aacute; 250.000 k&egrave;m logo v&otilde; đường khi đ&oacute;ng học ph&iacute; 6 th&aacute;ng.</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t5d/1/16/1f3d6.png\');\">🏖</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Tham gia c&aacute;c chương tr&igrave;nh sinh nhật , li&ecirc;n hoan , picnic ngoại kho&aacute;...</span></p>\r\n<p><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.tk/storage/dojos/December2019/56528983_2576310309109714_5139167642292060160_o.jpg\" alt=\"http://leaguedojo.tk/storage/dojos/December2019/56528983_2576310309109714_5139167642292060160_o.jpg\" width=\"100%\" height=\"auto\" /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.com/storage/dojos/December2019/56528983_2576310309109714_5139167642292060160_o.jpg\" alt=\"\" width=\"90%\" height=\"auto\" /></span></p>\r\n<p><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">V&agrave; tận hưởng kh&ocirc;ng kh&iacute; tập luyện hăng say v&agrave; cuồng lửa tại c&acirc;u lạc bộ:</span></p>\r\n<p><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\"><a href=\"https://www.youtube.com/watch?v=k7x7Q3-nU6o&amp;list=PLzrVYRai0riSRJ3M3bifVWWRq5eJMu6tv&amp;index=1\">https://www.youtube.com/watch?v=k7x7Q3-nU6o&amp;list=PLzrVYRai0riSRJ3M3bifVWWRq5eJMu6tv&amp;index=1</a></span></p>\r\n<p style=\"text-align: center;\"><img src=\"http://leaguedojo.tk/storage/posts/May2020/69859886_2971218249618916_6902064503970594816_n.jpg\" alt=\"http://leaguedojo.tk/storage/posts/May2020/69859886_2971218249618916_6902064503970594816_n.jpg\" width=\"45%\" height=\"auto\" /><img src=\"http://leaguedojo.com/storage/dojos/December2019/70240175_2990376614369746_2467002985457123328_n.jpg\" alt=\"\" width=\"48%\" height=\"auto\" />&nbsp;&nbsp;<img src=\"http://leaguedojo.com/storage/dojos/December2019/69859886_2971218249618916_6902064503970594816_n.jpg\" alt=\"\" width=\"48%\" height=\"auto\" /> <img src=\"http://leaguedojo.tk/storage/posts/December2019/70240175_2990376614369746_2467002985457123328_n.jpg\" alt=\"http://leaguedojo.tk/storage/posts/December2019/70240175_2990376614369746_2467002985457123328_n.jpg\" width=\"45%\" height=\"auto\" /></p>\r\n<p><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/tbe/1/16/1f3c6.png\');\">🏆</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Được đại diện cho trường tham gia thi đấu c&aacute;c gải Karate sinh vi&ecirc;n cấp th&agrave;nh phố , to&agrave;n quốc....</span></p>\r\n<p style=\"text-align: center;\"><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.vn/storage/dojos/December2019/68393728_2915143145226427_3829384397207896064_o.jpg\" alt=\"\" width=\"90%\" height=\"auto\" />&nbsp;<br /></span></p>\r\n<p><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br />Karate N&ocirc;ng Ngiệp - K.L.D<br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span>NƠI HỘI TỤ ĐAM M&Ecirc;&nbsp;<span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t3f/1/16/1f94b.png\');\">🥋</span></span><br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t34/1/16/23f0.png\');\">⏰</span></span>&nbsp;: 19h - 20h30\' Thứ 2 v&agrave; Thứ 5 h&agrave;ng tuần<br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/te1/1/16/26e9.png\');\">⛩</span></span>&nbsp;:Nh&agrave; thể chất HVNN Việt Nam<br /><span class=\"_5mfr\" style=\"margin: 0px 1px;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t22/1/16/260e.png\');\">☎️</span></span> :Li&ecirc;n hệ : 0942332444</span></p>', '[\"posts\\\\December2019\\\\EqeRc6aNSTXuHVxy6NVz.jpg\"]', 'thong-tin-tuyen-sinh-karate-nong-nghiep-k-l-d', 'Karate Nông Nghiệp', '[\"tuy\\u1ec3n sinh\",\"hvnn\",\"t\\u1eadp luy\\u1ec7n\"]', 'Hoạt động tuyển sinh được diễn ra thường xuyên. Các bạn có thể liên hệ và đang ký tập luyện ngay khi có thể', 'tuyển sinh, karate nông nghiệp', 'PUBLISHED', 1, '2019-12-09 20:57:07', '2020-06-15 14:02:15', NULL),
(4, 5, 1, 'Test1', 'Đây là tiêu đề seo', 'Đây là tóm tắt', '<p>Đ&acirc;y l&agrave; phần nội dung</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://leaguedojo.vn/storage/posts/June2020/50815317_2743650359193792_2258962552119623680_n1.jpg\" alt=\"\" width=\"90%\" height=\"auto\" /></p>', '[\"posts\\\\June2020\\\\UdwCaMQF0DwKSFUz4U0Z.jpg\",\"posts\\\\June2020\\\\dFdC7p3alKltsO4C67VW.jpg\",\"posts\\\\June2020\\\\8eSuSOZoteGo04TgASek.jpg\"]', 'test1', 'Karate League Dojo', '[\"test\"]', 'Đây là mô tả', 'test1, test2', 'PUBLISHED', 0, '2020-06-29 08:46:15', '2020-07-01 09:00:53', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị viên', '2019-11-28 00:46:49', '2020-05-22 17:12:59'),
(2, 'user', 'Người dùng cơ bản', '2019-11-28 00:46:49', '2020-05-22 17:13:16'),
(3, 'editor', 'Biên tập viên', '2020-03-28 16:45:02', '2020-03-28 16:45:02'),
(4, 'monitor', 'Lớp trưởng', '2020-05-22 17:06:07', '2020-05-22 17:06:07'),
(5, 'manager', 'Quản lý', '2020-03-28 16:46:14', '2020-03-28 16:46:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dojo_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `address`, `dojo_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Nhà thể chất HV Nông nghiệp', 'Học viện Nông Nghiệp Việt Nam', 2, NULL, '2020-04-19 18:52:00', '2020-04-19 18:52:00'),
(2, 'Võ đường League Dojo', 'sảnh 1, Đơn Nguyên 2, KĐT mới Trung Văn, Nam Từ Liêm', 1, NULL, NULL, '2020-04-24 20:10:09'),
(3, 'Nhà thể chất trường THCS Thanh Xuân Nam', 'Trường THCS Thanh Xuân Nam, Thanh Xuân', 1, NULL, '2020-04-19 18:53:38', '2020-04-19 18:53:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'League Dojo ● Hệ thống đào tạo và phát triển Karate chất lượng Hà Nội', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Nơi đào tạo và phát triển những tài năng Karate', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\December2019\\hXRiI1xWtM0kkaULkbzq.png', '', 'image', 4, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 6, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings\\January2020\\96MnvizVD6EW84iSceSZ.png', '', 'image', 7, 'Admin'),
(6, 'admin.title', 'Admin Title', 'League Dojo - K.L.D', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Trang quản trị hệ thống League Dojo', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\December2019\\VDBG5mCN2X2S9haYGvDN.jpg', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '52867832915-9mbk3cmvl3dhhqprlhoi52cpt7akkrka.apps.googleusercontent.com', '', 'text', 1, 'Admin'),
(11, 'site.site_details', 'Site Details', 'Võ đường với trang thiết bị hiện đại, tiêu chuẩn phòng tập đội tuyển sẽ mang đến những điều tốt nhất giành cho các võ sinh.Với nhiều năm kinh nghiệm thi đấu, huấn luyện và giảng dạy môn võ Karatedo các HLV sẽ trau dồi tinh thần thượng võ NHÂN - NGHĨA - LỄ - TRÍ - TÍN.', NULL, 'text', 3, 'Site'),
(13, 'app.bonus_default', 'Ưu đãi mặc định', '1', '{\r\n    \"on\": \"Áp dụng nhiều ưu đãi\",\r\n    \"off\": \"Chỉ áp dụng 1 ưu đãi\",\r\n    \"checked\": false\r\n}', 'checkbox', 8, 'App'),
(16, 'app.deadline_tuition', 'Hạn nộp học phí hàng tháng', '15', NULL, 'text', 9, 'App'),
(18, 'app.deadline_point', 'Ngày chốt điểm rèn luyện', '20/11', NULL, 'text', 10, 'App'),
(19, 'app.most_viewed', 'Bài viết xem nhiều nhất', '4', NULL, 'text', 12, 'App'),
(20, 'app.latest_post', 'Bài viết mới nhất', '11', NULL, 'text', 13, 'App'),
(22, 'app.most_featured', 'Bài viết đặc sắc nhất', '7', NULL, 'text', 14, 'App'),
(23, 'app.orther_in_chanel', 'Video khác', '10', NULL, 'text', 15, 'App'),
(24, 'app.latest_video', 'Video mới nhất', '7', NULL, 'text', 16, 'App'),
(25, 'app.order_by_view', 'Video xem nhiều', '10', NULL, 'text', 17, 'App'),
(26, 'app.event_profile', 'Sự kiện trang cá nhân', '2', NULL, 'text', 11, 'App'),
(37, 'app.goldMedal', 'Trọng số điểm HC Vàng', '15', NULL, 'text', 18, 'App'),
(38, 'app.silverMedal', 'Trọng số điểm HC Bạc', '10', NULL, 'text', 19, 'App'),
(39, 'app.bronzeMedal', 'Trọng số điểm HC Đồng', '5', NULL, 'text', 20, 'App'),
(40, 'app.mediumScore', 'Trọng số điểm thi', '10', NULL, 'text', 21, 'App'),
(41, 'app.valedictorian', 'Trọng số điểm thủ khoa', '30', NULL, 'text', 22, 'App'),
(42, 'app.pointCollected', 'Trọng số điểm sự kiện', '5', NULL, 'text', 23, 'App'),
(43, 'app.diligence', 'Trọng số điểm chuyên cần', '-5', NULL, 'text', 24, 'App');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Kỳ thi thăng đai Karate Nông nghiệp - K.L.D', 'slides\\December2019\\HOwCQMqPAXhN7kjQsCtR.png', NULL, '2019-12-08 20:12:40', '2019-12-08 20:12:40'),
(2, 'Karate Nông nghiệp liên tục tuyển sinh', 'slides\\December2019\\PkQEt8zCACVdMaSlMCu3.png', NULL, '2019-12-08 20:13:08', '2019-12-08 20:13:08'),
(3, 'Lễ trao huyền đai', 'slides\\December2019\\eXk47Mx2no8IAPvzim5K.png', NULL, '2019-12-08 20:13:31', '2019-12-08 20:13:31'),
(4, 'Kỳ thi thăng đai - K.L.D Nông Nghiệp', 'slides/June2020/kbJ19Pt6Of4qVcf2mc00.jpeg', NULL, '2020-06-19 03:56:23', '2020-06-19 03:56:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'students/default.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeland` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hà Nội',
  `type` int(11) NOT NULL DEFAULT '2',
  `work_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuy` int(11) NOT NULL DEFAULT '10',
  `weight` decimal(10,1) NOT NULL DEFAULT '0.0',
  `height` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `link_fb` text COLLATE utf8mb4_unicode_ci,
  `admission_day` date NOT NULL DEFAULT '2018-10-23',
  `dojo_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `diligence` int(11) NOT NULL DEFAULT '0',
  `status` enum('WAITING_CONFIRM','STUDYING','PAUSE','STOPPED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WAITING_CONFIRM',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `image`, `name`, `phone`, `cmnd`, `birthday`, `address`, `homeland`, `type`, `work_unit`, `kuy`, `weight`, `height`, `sex`, `link_fb`, `admission_day`, `dojo_id`, `diligence`, `status`, `created_at`, `updated_at`) VALUES
(20200001, 'students/June2020/1592207662.png', 'Nguyễn Văn Ước', '03759336848', '030098000658', '1998-09-14', 'số 21c, ngõ 77 Bùi Xương Trạch, Thanh Xuân, Hà Nội', 'Hải Dương', 2, 'Karate League Dojo', 12, '42.5', 163, 0, 'https://www.facebook.com/uoc.nguyenvan.5891', '2017-10-23', 3, 0, 'STUDYING', NULL, '2020-07-01 08:38:09'),
(20200002, 'students\\December2019\\JHbXHiv8qAm4CAyIWHZS.png', 'Nguyễn Hoàng Tuấn', '0942692123', '184215694', '1995-05-28', 'Mỹ Thành, Cẩm Thạch, Cẩm Xuyên, Hà Tĩnh', 'Hà Tĩnh', 3, 'Bs thú y', 3, '70.0', 170, 0, NULL, '2018-10-23', 2, 0, 'STUDYING', NULL, '2020-06-16 15:05:36'),
(20200003, 'students/June2020/1592314031.png', 'Phạm Thị Thư', '0394452411', '187761632', '1999-11-11', 'Nghĩa Đàn,Nghệ An', 'Nghệ An', 2, 'Học viện nông nghiệp Việt Nam', 1, '40.0', 155, 1, 'https://www.facebook.com/profile.php?id=100006343122323', '2018-10-23', 2, 0, 'STUDYING', NULL, '2020-06-16 13:27:38'),
(20200004, 'students\\December2019\\gP70Ytehrbavbrs7d3Z7.png', 'Đỗ Văn Lãm', '0969988343', '11111111111', '1996-08-18', 'Hà Nội', 'Hà Nội', 3, 'Hà Nội', 11, '0.9', 169, 0, NULL, '2018-10-23', 2, 0, 'STUDYING', NULL, '2020-03-26 17:17:52'),
(20200005, 'students\\December2019\\4SQpu9UvqjwPIf6Evj7v.png', 'Vũ Quang Long', '0979334543', '001092003007', '1992-10-29', 'Dương Xá - Gia Lâm - Hà Nội', 'Hà Nội', 3, 'UBND quận Long Biên', 11, '74.0', 170, 0, NULL, '2017-11-02', 2, 0, 'STUDYING', NULL, NULL),
(20200007, 'students/default.png', 'Nguyễn Thành Đạt', '0379689263', '013678344', '2000-12-06', '62 ngõ Ngô Sỹ Liên,Văn Miếu,Đống Đa,Hà Nội', 'Hà Nội', 2, 'Học Viện Nông Nghiệp Việt Nam', 10, '83.0', 175, 0, 'https://www.facebook.com/thdat612', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 12:08:03', '2020-06-16 12:08:03'),
(20200008, 'students/default.png', 'Nguyễn Thị Phương Anh', '0386968142', '030300003605', '2000-10-28', 'Trâu Quỳ, Gia Lâm, Hà Nội', 'Hà Nội', 2, 'Học viện nông nghiệp Việt Nam', 10, '45.0', 155, 1, 'https://www.facebook.com/profile.php?id=100012416162851', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 12:09:51', '2020-06-16 12:09:51'),
(20200009, 'students/default.png', 'Lê Thị Diệu Lâm', '0368354911', '187696831', '1998-01-11', 'Trâu Quỳ-Gia Lâm-Hà Nội', 'Hà Nội', 2, 'Học viện Nông Nghiệp Việt Nam', 10, '48.0', 153, 1, 'https://m.facebook.com/#!/lamsuj.sui?ref=bookmarks', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 12:12:39', '2020-06-16 12:12:39'),
(20200010, 'students/default.png', 'Trịnh Thị Quỳnh', '0363353582', '038300003536', '2000-07-15', 'trâu quỳ gia lâm hà nội', 'Hà Nội', 2, 'Học viên Nông nghiệp Việt Nam', 10, '43.0', 150, 1, 'https://www.facebook.com/profile.php?id=100049869795644', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 13:02:35', '2020-06-16 13:02:35'),
(20200011, 'students/default.png', 'Phạm Nguyên Hương', '0889069768', '073533130', '2001-03-16', 'Học viện Nông Nghiệp Việt Nam, Trâu Quỳ , Gia Lâm', 'Hà Nội', 2, 'Sinh viên', 10, '48.0', 163, 1, 'https://m.facebook.com/phamnguyenhuong.163?ref=bookmarks', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 13:10:48', '2020-06-16 13:10:48'),
(20200012, 'students/default.png', 'Phạm Thị Diệu Thanh', '0398280164', '001301002761', '2001-02-10', 'Gia Lâm', 'Hà Nội', 2, NULL, 10, '52.0', 158, 1, 'https://www.facebook.com/baotran.phamnguyen.14', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 13:11:08', '2020-06-16 13:11:08'),
(20200013, 'students/default.png', 'Huyền', '0328160600', '001300009070', '2020-06-06', 'Gia Lâm', 'Hà Nội', 2, 'Học Viện Nông Nghiệp Việt Nam', 10, '50.0', 156, 1, 'https://www.facebook.com/dang.thu.huyen06', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 14:06:29', '2020-06-16 14:06:29'),
(20200014, 'students/default.png', 'Nguyễn Thị Sen', '0975540604', '152251390', '1999-11-06', 'Số 77 ngõ 62 Trâu Quỳ, Gia Lâm, Hà Nội', 'Hà Nội', 2, 'Học viện Nông nghiệp Việt Nam', 10, '43.0', 150, 1, 'https://www.facebook.com/sen.thi.376695', '2020-06-16', 2, 0, 'STUDYING', NULL, NULL),
(20200015, 'students/default.png', 'Nguyễn Phương Tuấn', '0355205003', '035200000236', '2020-10-14', 'Kim Bảng, Hà Nam', 'Hà Nội', 2, 'Học Viện nông Nghiệp Việt Nam', 10, '70.0', 170, 0, 'https://www.facebook.com/lepham.phuongtuan.3', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 14:06:58', '2020-06-16 14:06:58'),
(20200016, 'students/June2020/1592320566.png', 'Đặng Thu Huyền', '0328160600', '001300009070', '2000-06-06', 'Gia Lâm', 'Hà Nội', 2, 'Học Viện Nông Nghiệp Việt Nam', 10, '50.0', 156, 1, 'https://www.facebook.com/dang.thu.huyen06', '2020-06-16', 2, 0, 'STUDYING', '2020-06-16 14:07:22', '2020-06-16 15:16:30'),
(20200017, 'students/default.png', 'Trần Việt Hà', '0889419698', '038301012839', '2001-08-24', 'Số 111, cửu việt 1, gia lâm , hà nội', 'Hà Nội', 2, 'Học viện nông nghiệp việt nam', 10, '54.0', 160, 1, 'https://www.facebook.com/Ha.Tran.24081999', '2020-06-17', 2, 0, 'STUDYING', '2020-06-17 09:03:32', '2020-06-17 09:03:32'),
(20200018, 'students/default.png', 'Lều Hoàng Sơn', '0522680659', '152221707', '1998-07-27', 'Vũ Công - Kiến Xương - Thái Nìn', 'Hà Nội', 2, 'Học viện Nông nghiệp Việt Nam', 10, '48.0', 166, 0, 'Lều Sơn', '2020-06-17', 2, 0, 'STUDYING', '2020-06-17 09:04:36', '2020-06-17 09:04:36'),
(20200019, 'students/default.png', 'Nguyễn Kim Phượng', '0365663010', '122327761', '2000-10-30', 'Học viện Nông nghiệp- Gia Lâm- Hà Nội', 'Hà Nội', 2, 'Học viện Nông nghiệp Việt Nam', 10, '40.0', 150, 1, 'https://www.facebook.com/profile.php?id=100034515364555', '2020-06-18', 2, 0, 'STUDYING', '2020-06-17 18:53:59', '2020-06-17 18:53:59'),
(20200020, 'students/June2020/1593510417.png', 'Nguyễn Văn Hiệp', '0375933684', '030000055', '0000-00-00', 'số 21c, ngõ 77 Bùi Xương Trạch, Thanh Xuân, Hà Nội', 'Hà Nội', 3, 'UBND quận Long Biên', 10, '56.0', 162, 0, 'https://www.facebook.com/uoc.nguyenvan.5891', '2020-06-29', 3, 0, 'STUDYING', '2020-06-29 09:31:33', '2020-06-30 09:46:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_voucher`
--

CREATE TABLE `student_voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `money_reduction` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_voucher`
--

INSERT INTO `student_voucher` (`id`, `student_id`, `voucher_id`, `used`, `money_reduction`, `created_at`, `updated_at`) VALUES
(1, 20200001, 3, 1, 50000, '2020-06-28 00:03:42', '2020-06-28 00:03:42'),
(2, 20200001, 1, 1, 50000, '2020-06-27 23:46:11', '2020-06-28 00:18:17'),
(3, 20200020, 2, 0, 0, '2020-06-29 10:02:23', '2020-06-29 10:02:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test_scores`
--

CREATE TABLE `test_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_day` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `kihon` int(11) NOT NULL DEFAULT '0',
  `kata` int(11) NOT NULL DEFAULT '0',
  `kumite` int(11) NOT NULL DEFAULT '0',
  `physical` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `valedictorian` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test_scores`
--

INSERT INTO `test_scores` (`id`, `test_day`, `student_id`, `kihon`, `kata`, `kumite`, `physical`, `total`, `valedictorian`, `created_at`, `updated_at`) VALUES
(3, '2020-06-15', 20200020, 8, 5, 0, 10, 23, 1, '2020-06-30 09:34:21', '2020-06-30 09:34:21'),
(1, '2020-06-30', 20200001, 8, 10, 8, 9, 35, 0, '2020-06-29 11:17:03', '2020-06-29 11:17:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transfer_dojos`
--

CREATE TABLE `transfer_dojos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `current_dojo_id` bigint(20) UNSIGNED NOT NULL,
  `new_dojo_id` bigint(20) UNSIGNED NOT NULL,
  `date_transfer` date NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` enum('WAIT','CONFIRMED','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WAIT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reason_reject` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transfer_dojos`
--

INSERT INTO `transfer_dojos` (`id`, `student_id`, `current_dojo_id`, `new_dojo_id`, `date_transfer`, `reason`, `confirmed`, `created_at`, `updated_at`, `reason_reject`) VALUES
(9, 20200001, 1, 3, '2020-09-01', 'hshshkasdksajkdasjkfsdajhfsdbjsfdjfds', 'CONFIRMED', '2020-07-01 08:37:32', '2020-07-01 08:38:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-11-28 00:46:56', '2019-11-28 00:46:56'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-11-28 00:46:57', '2019-11-28 00:46:57'),
(31, 'menu_items', 'title', 17, 'en', 'Students', '2019-11-30 17:26:15', '2019-11-30 17:26:15'),
(32, 'menu_items', 'title', 15, 'en', 'Người Dùng', '2019-11-30 17:27:41', '2019-11-30 17:27:41'),
(38, 'data_rows', 'display_name', 1, 'en', 'ID', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(39, 'data_rows', 'display_name', 21, 'en', 'Role', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(40, 'data_rows', 'display_name', 2, 'en', 'Name', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(41, 'data_rows', 'display_name', 3, 'en', 'Email', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(42, 'data_rows', 'display_name', 8, 'en', 'Avatar', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(43, 'data_rows', 'display_name', 4, 'en', 'Password', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(44, 'data_rows', 'display_name', 5, 'en', 'Remember Token', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(45, 'data_rows', 'display_name', 11, 'en', 'Settings', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(46, 'data_rows', 'display_name', 6, 'en', 'Created At', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(47, 'data_rows', 'display_name', 7, 'en', 'Updated At', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(48, 'data_rows', 'display_name', 9, 'en', 'Role', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(49, 'data_rows', 'display_name', 10, 'en', 'Roles', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(50, 'data_rows', 'display_name', 83, 'en', 'students', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(51, 'data_types', 'display_name_singular', 1, 'en', 'User', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(52, 'data_types', 'display_name_plural', 1, 'en', 'Users', '2019-11-30 17:47:19', '2019-11-30 17:47:19'),
(53, 'data_rows', 'display_name', 56, 'en', 'Id', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(54, 'data_rows', 'display_name', 57, 'en', 'Ảnh thẻ', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(55, 'data_rows', 'display_name', 58, 'en', 'Họ & tên đệm', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(56, 'data_rows', 'display_name', 59, 'en', 'Tên', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(57, 'data_rows', 'display_name', 60, 'en', 'Điện thoại', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(58, 'data_rows', 'display_name', 61, 'en', 'CMND', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(59, 'data_rows', 'display_name', 62, 'en', 'Ngày sinh', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(60, 'data_rows', 'display_name', 63, 'en', 'Địa chỉ', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(61, 'data_rows', 'display_name', 64, 'en', 'Đối tượng', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(62, 'data_rows', 'display_name', 65, 'en', 'Đơn vị công tác', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(63, 'data_rows', 'display_name', 66, 'en', 'Kuy', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(64, 'data_rows', 'display_name', 67, 'en', 'Cân nặng', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(65, 'data_rows', 'display_name', 68, 'en', 'Chiều cao', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(66, 'data_rows', 'display_name', 69, 'en', 'Giới tính', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(67, 'data_rows', 'display_name', 70, 'en', 'Link Facebook', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(68, 'data_rows', 'display_name', 71, 'en', 'Ngày nhập học', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(69, 'data_rows', 'display_name', 72, 'en', 'Số buổi nghỉ', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(70, 'data_rows', 'display_name', 73, 'en', 'Giải đấu', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(71, 'data_rows', 'display_name', 74, 'en', 'HC Vàng', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(72, 'data_rows', 'display_name', 75, 'en', 'HC Bạc', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(73, 'data_rows', 'display_name', 76, 'en', 'HC Đồng', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(74, 'data_rows', 'display_name', 77, 'en', 'Thủ khoa', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(75, 'data_rows', 'display_name', 78, 'en', 'Điểm thăng đai', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(76, 'data_rows', 'display_name', 79, 'en', 'Thành tích', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(77, 'data_rows', 'display_name', 80, 'en', 'Created At', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(78, 'data_rows', 'display_name', 81, 'en', 'Updated At', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(79, 'data_rows', 'display_name', 82, 'en', 'Deleted At', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(80, 'data_types', 'display_name_singular', 7, 'en', 'Student', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(81, 'data_types', 'display_name_plural', 7, 'en', 'Students', '2019-11-30 18:18:49', '2019-11-30 18:18:49'),
(85, 'data_rows', 'display_name', 22, 'en', 'ID', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(86, 'data_rows', 'display_name', 23, 'en', 'Parent', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(87, 'data_rows', 'display_name', 24, 'en', 'Order', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(88, 'data_rows', 'display_name', 25, 'en', 'Name', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(89, 'data_rows', 'display_name', 26, 'en', 'Slug', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(90, 'data_rows', 'display_name', 27, 'en', 'Created At', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(91, 'data_rows', 'display_name', 28, 'en', 'Updated At', '2019-12-02 02:11:26', '2019-12-02 02:11:26'),
(103, 'data_rows', 'display_name', 29, 'en', 'ID', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(104, 'data_rows', 'display_name', 30, 'en', 'Author', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(105, 'data_rows', 'display_name', 31, 'en', 'Category', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(106, 'data_rows', 'display_name', 32, 'en', 'Title', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(107, 'data_rows', 'display_name', 42, 'en', 'SEO Title', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(108, 'data_rows', 'display_name', 33, 'en', 'Excerpt', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(109, 'data_rows', 'display_name', 34, 'en', 'Body', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(110, 'data_rows', 'display_name', 35, 'en', 'Post Image', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(111, 'data_rows', 'display_name', 36, 'en', 'Slug', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(112, 'data_rows', 'display_name', 37, 'en', 'Meta Description', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(113, 'data_rows', 'display_name', 38, 'en', 'Meta Keywords', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(114, 'data_rows', 'display_name', 39, 'en', 'Status', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(115, 'data_rows', 'display_name', 43, 'en', 'Featured', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(116, 'data_rows', 'display_name', 40, 'en', 'Created At', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(117, 'data_rows', 'display_name', 41, 'en', 'Updated At', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(118, 'data_rows', 'display_name', 103, 'en', 'categories', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(119, 'data_rows', 'display_name', 104, 'en', 'users', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(120, 'data_types', 'display_name_singular', 5, 'en', 'Post', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(121, 'data_types', 'display_name_plural', 5, 'en', 'Posts', '2019-12-02 02:40:47', '2019-12-02 02:40:47'),
(122, 'data_rows', 'display_name', 113, 'en', 'Id', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(123, 'data_rows', 'display_name', 114, 'en', 'Link video (Youtube)', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(124, 'data_rows', 'display_name', 115, 'en', 'Seo Title', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(125, 'data_rows', 'display_name', 116, 'en', 'Meta Description', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(126, 'data_rows', 'display_name', 117, 'en', 'Meta Keywords', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(127, 'data_rows', 'display_name', 118, 'en', 'Trạng thái', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(128, 'data_rows', 'display_name', 119, 'en', 'Slug', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(129, 'data_rows', 'display_name', 120, 'en', 'Đặc sắc', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(130, 'data_rows', 'display_name', 121, 'en', 'Created At', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(131, 'data_rows', 'display_name', 122, 'en', 'Updated At', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(132, 'data_rows', 'display_name', 123, 'en', 'Deleted At', '2019-12-02 02:48:39', '2019-12-02 02:48:39'),
(135, 'data_rows', 'display_name', 102, 'en', 'Ảnh', '2019-12-02 06:46:56', '2019-12-02 06:46:56'),
(140, 'menu_items', 'title', 20, 'en', 'Trang bìa', '2019-12-02 06:48:46', '2019-12-02 06:48:46'),
(141, 'menu_items', 'title', 21, 'en', 'Videos', '2019-12-02 06:48:57', '2019-12-02 06:48:57'),
(142, 'data_rows', 'display_name', 105, 'en', 'Nguồn', '2019-12-02 06:51:07', '2019-12-02 06:51:07'),
(143, 'data_rows', 'display_name', 106, 'en', 'Deleted At', '2019-12-02 06:51:07', '2019-12-02 06:51:07'),
(144, 'menu_items', 'title', 12, 'en', 'Tin tức', '2019-12-02 07:32:29', '2019-12-02 07:32:29'),
(145, 'menu_items', 'title', 22, 'en', 'Video', '2019-12-02 09:33:25', '2019-12-02 09:33:25'),
(146, 'data_rows', 'display_name', 124, 'en', 'Id', '2019-12-02 09:34:39', '2019-12-02 09:34:39'),
(147, 'data_rows', 'display_name', 125, 'en', 'Link video (Youtube)', '2019-12-02 09:34:39', '2019-12-02 09:34:39'),
(148, 'data_rows', 'display_name', 126, 'en', 'Seo Title', '2019-12-02 09:34:39', '2019-12-02 09:34:39'),
(149, 'data_rows', 'display_name', 127, 'en', 'Meta Description', '2019-12-02 09:34:39', '2019-12-02 09:34:39'),
(150, 'data_rows', 'display_name', 128, 'en', 'Meta Keywords', '2019-12-02 09:34:39', '2019-12-02 09:34:39'),
(151, 'data_rows', 'display_name', 129, 'en', 'Trạng thái', '2019-12-02 09:34:39', '2019-12-02 09:34:39'),
(152, 'data_rows', 'display_name', 130, 'en', 'Slug', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(153, 'data_rows', 'display_name', 131, 'en', 'Featured', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(154, 'data_rows', 'display_name', 132, 'en', 'Created At', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(155, 'data_rows', 'display_name', 133, 'en', 'Updated At', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(156, 'data_rows', 'display_name', 134, 'en', 'Deleted At', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(157, 'data_types', 'display_name_singular', 12, 'en', 'Video', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(158, 'data_types', 'display_name_plural', 12, 'en', 'Video', '2019-12-02 09:34:40', '2019-12-02 09:34:40'),
(159, 'data_rows', 'display_name', 89, 'en', 'Id', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(160, 'data_rows', 'display_name', 90, 'en', 'Ảnh', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(161, 'data_rows', 'display_name', 91, 'en', 'Tên', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(162, 'data_rows', 'display_name', 92, 'en', 'Bắt đầu', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(163, 'data_rows', 'display_name', 93, 'en', 'Kết thúc', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(164, 'data_rows', 'display_name', 94, 'en', 'Học phí (VNĐ/tháng)', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(165, 'data_rows', 'display_name', 95, 'en', 'Lịch tập', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(166, 'data_rows', 'display_name', 96, 'en', 'Địa chỉ', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(167, 'data_rows', 'display_name', 97, 'en', 'Huấn luyện viên', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(168, 'data_rows', 'display_name', 98, 'en', 'Mô tả', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(169, 'data_rows', 'display_name', 99, 'en', 'Created At', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(170, 'data_rows', 'display_name', 100, 'en', 'Updated At', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(171, 'data_rows', 'display_name', 101, 'en', 'Deleted At', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(172, 'data_types', 'display_name_singular', 9, 'en', 'Cơ sở tập luyện', '2019-12-02 09:41:57', '2019-12-02 09:41:57'),
(173, 'data_types', 'display_name_plural', 9, 'en', 'Cơ sở tập luyện', '2019-12-02 09:41:58', '2019-12-02 09:41:58'),
(174, 'posts', 'title', 2, 'en', 'My Sample Post', '2019-12-02 09:57:44', '2019-12-02 09:57:44'),
(175, 'posts', 'excerpt', 2, 'en', 'This is the excerpt for the sample Post', '2019-12-02 09:57:44', '2019-12-02 09:57:44'),
(176, 'posts', 'body', 2, 'en', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', '2019-12-02 09:57:44', '2019-12-02 09:57:44'),
(177, 'posts', 'slug', 2, 'en', 'my-sample-post', '2019-12-02 09:57:44', '2019-12-02 09:57:44'),
(178, 'posts', 'meta_description', 2, 'en', 'Meta Description for sample post', '2019-12-02 09:57:44', '2019-12-02 09:57:44'),
(179, 'posts', 'meta_keywords', 2, 'en', 'keyword1, keyword2, keyword3', '2019-12-02 09:57:44', '2019-12-02 09:57:44'),
(180, 'posts', 'title', 3, 'en', 'Latest Post', '2019-12-02 09:58:06', '2019-12-02 09:58:06'),
(181, 'posts', 'excerpt', 3, 'en', 'This is the excerpt for the latest post', '2019-12-02 09:58:06', '2019-12-02 09:58:06'),
(182, 'posts', 'body', 3, 'en', '<p>This is the body for the latest post</p>', '2019-12-02 09:58:06', '2019-12-02 09:58:06'),
(183, 'posts', 'slug', 3, 'en', 'latest-post', '2019-12-02 09:58:06', '2019-12-02 09:58:06'),
(184, 'posts', 'meta_description', 3, 'en', 'This is the meta description', '2019-12-02 09:58:06', '2019-12-02 09:58:06'),
(185, 'posts', 'meta_keywords', 3, 'en', 'keyword1, keyword2, keyword3', '2019-12-02 09:58:06', '2019-12-02 09:58:06'),
(186, 'posts', 'title', 4, 'en', 'Yarr Post', '2019-12-02 09:58:20', '2019-12-02 09:58:20'),
(187, 'posts', 'excerpt', 4, 'en', 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '2019-12-02 09:58:20', '2019-12-02 09:58:20'),
(188, 'posts', 'body', 4, 'en', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', '2019-12-02 09:58:20', '2019-12-02 09:58:20'),
(189, 'posts', 'slug', 4, 'en', 'yarr-post', '2019-12-02 09:58:20', '2019-12-02 09:58:20'),
(190, 'posts', 'meta_description', 4, 'en', 'this be a meta descript', '2019-12-02 09:58:20', '2019-12-02 09:58:20'),
(191, 'posts', 'meta_keywords', 4, 'en', 'keyword1, keyword2, keyword3', '2019-12-02 09:58:20', '2019-12-02 09:58:20'),
(192, 'posts', 'title', 1, 'en', 'Lorem Ipsum Post', '2019-12-02 09:58:36', '2019-12-02 09:58:36'),
(193, 'posts', 'excerpt', 1, 'en', 'This is the excerpt for the Lorem Ipsum Post', '2019-12-02 09:58:37', '2019-12-02 09:58:37'),
(194, 'posts', 'body', 1, 'en', '<p>This is the body of the lorem ipsum post</p>', '2019-12-02 09:58:37', '2019-12-02 09:58:37'),
(195, 'posts', 'slug', 1, 'en', 'lorem-ipsum-post', '2019-12-02 09:58:37', '2019-12-02 09:58:37'),
(196, 'posts', 'meta_description', 1, 'en', 'This is the meta description', '2019-12-02 09:58:37', '2019-12-02 09:58:37'),
(197, 'posts', 'meta_keywords', 1, 'en', 'keyword1, keyword2, keyword3', '2019-12-02 09:58:37', '2019-12-02 09:58:37'),
(200, 'data_rows', 'display_name', 84, 'en', 'Xác thực lúc', '2019-12-02 19:27:37', '2019-12-02 19:27:37'),
(201, 'data_rows', 'display_name', 85, 'en', 'student_id', '2019-12-02 19:27:37', '2019-12-02 19:27:37'),
(202, 'posts', 'source', 1, 'en', 'Karate League Dojo', '2019-12-03 20:03:59', '2019-12-03 20:03:59'),
(203, 'posts', 'source', 4, 'en', 'Karate Nông Nghiệp', '2019-12-03 20:24:14', '2019-12-03 20:24:14'),
(204, 'posts', 'source', 3, 'en', 'Karate League Dojo', '2019-12-03 20:31:51', '2019-12-03 20:31:51'),
(205, 'posts', 'source', 2, 'en', 'Karate League Dojo', '2019-12-03 20:50:41', '2019-12-03 20:50:41'),
(206, 'posts', 'seo_title', 3, 'en', 'Võ đường Karate League Dojo thông báo tuyển sinh', '2019-12-03 20:58:00', '2019-12-03 20:58:00'),
(207, 'posts', 'seo_title', 1, 'en', 'Lorem Ipsum Post', '2019-12-03 21:09:00', '2019-12-03 21:09:00'),
(208, 'posts', 'seo_title', 4, 'en', 'CLB KarateDo Học viện Nông Nghiệp Việt Nam thông báo tuyển võ sinh', '2019-12-03 21:09:26', '2019-12-03 21:09:26'),
(209, 'data_rows', 'display_name', 136, 'en', 'Slug', '2019-12-04 08:02:48', '2019-12-04 08:02:48'),
(210, 'data_rows', 'display_name', 107, 'en', 'Id', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(211, 'data_rows', 'display_name', 108, 'en', 'Name', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(212, 'data_rows', 'display_name', 109, 'en', 'Image', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(213, 'data_rows', 'display_name', 110, 'en', 'Link', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(214, 'data_rows', 'display_name', 111, 'en', 'Created At', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(215, 'data_rows', 'display_name', 112, 'en', 'Updated At', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(216, 'data_types', 'display_name_singular', 10, 'en', 'Trang bìa', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(217, 'data_types', 'display_name_plural', 10, 'en', 'Trang bìa', '2019-12-06 20:52:04', '2019-12-06 20:52:04'),
(218, 'data_rows', 'display_name', 135, 'en', 'Deleted At', '2019-12-08 07:37:00', '2019-12-08 07:37:00'),
(219, 'posts', 'title', 11, 'en', 'Đoàn Karate League Dojo đã đạt kết quả tốt tại giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', '2019-12-09 20:53:24', '2019-12-09 20:53:24'),
(220, 'posts', 'seo_title', 11, 'en', 'Đoàn Karate League Dojo đã đạt kết quả tốt tại giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', '2019-12-09 20:53:24', '2019-12-09 20:53:24'),
(221, 'posts', 'excerpt', 11, 'en', 'Giải vô địch Karate Đại học Công Đoàn mở rộng lần thứ 2 diễn ra trong 2 ngày 7-8/4/2019 được tổ chức tại trường Đại học Công Đoàn. Tham gia giải đấu với tinh thần giao luw, học hỏi và thể hiện bản thân, đoàn VĐV Karate League Dojo đã đạt được những thành tích cao.', '2019-12-09 20:53:24', '2019-12-09 20:53:24'),
(222, 'posts', 'body', 11, 'en', '<p style=\"text-align: left;\"><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Kết th&uacute;c giải V&ocirc; địch Karate Đại học C&ocirc;ng đo&agrave;n mở rộng lần thứ 2, Đo&agrave;n Karate League Dojo đ&atilde; gi&agrave;nh được c&aacute;c giải:</span></p>\n<figure class=\"image\" style=\"text-align: center;\"><img title=\"Team Kata xuất sắc gi&agrave;nh huy chương bạc hội dung Kata đồng đội hỗn họp tr&ecirc;n 16 tuổi\" src=\"http://localhost:8000/storage/posts/December2019/IMG_2982.JPG\" alt=\"Team Kata xuất sắc gi&agrave;nh huy chương bạc hội dung Kata đồng đội hỗn họp tr&ecirc;n 16 tuổi\" width=\"90%\" height=\"auto\" />\n<figcaption><br />Team Kata xuất sắc gi&agrave;nh huy chương bạc hội dung Kata đồng đội hỗn họp tr&ecirc;n 16 tuổi</figcaption>\n</figure>\n<p style=\"text-align: left;\"><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t15/1/16/1f948.png?_nc_eui2=AeFk2JIaZidjHIE__PG6Gf9jdPaRDpku-vezgfSs3_SmI7wRmctplp0KYWoks5dS-yUUakwA1KuTKg3v-p_2wbTL-8JaDbNxAP01B3EW9nCocg\');\">🥈</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">HCB nội dung Kumite đồng đội nam tr&ecirc;n 18 tuổi</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t15/1/16/1f948.png?_nc_eui2=AeFk2JIaZidjHIE__PG6Gf9jdPaRDpku-vezgfSs3_SmI7wRmctplp0KYWoks5dS-yUUakwA1KuTKg3v-p_2wbTL-8JaDbNxAP01B3EW9nCocg\');\">🥈</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">HCB nội dung Kata đồng đội hỗn hợp tr&ecirc;n 16 tuổi</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t96/1/16/1f949.png?_nc_eui2=AeHHuN-1MpIbQkMzACBa_M2IAx6xcC6roH_oUHIaJti-LRng79OCmYb7XsRoG1oGjwNhVTMtqHOUHSTpdCYWPQWbmRDHzI3wDDDS6EOCWCxqXg\');\">🥉</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">HCĐ c&aacute;c nội dung c&aacute; nh&acirc;n bao gồm:</span><br style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\" /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span><span style=\"color: #1c1e21; font-family: Helvetica, Arial, sans-serif;\">Kumite c&aacute; nh&acirc;n nam tr&ecirc;n 18 tuổi c&aacute;c hạng c&acirc;n dưới 55kg, tr&ecirc;n 75kg;</span><span class=\"text_exposed_show\" style=\"display: inline; font-family: Helvetica, Arial, sans-serif; color: #1c1e21;\"><br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kumite c&aacute; nh&acirc;n nữ tr&ecirc;n 18 tuổi hạng c&acirc;n dưới 44kg;<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kumite c&aacute; nh&acirc;n nam 9-11 tuổi c&aacute;c hạng c&acirc;n dưới 30kg, tr&ecirc;n 44kg ;<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kata c&aacute; nh&acirc;n nữ dưới 11 tuổi;<br /><span class=\"_5mfr\" style=\"margin: 0px 1px; font-family: inherit;\"><span class=\"_6qdm\" style=\"background-repeat: no-repeat; background-size: contain; color: transparent; display: inline-block; text-shadow: none; vertical-align: text-bottom; font-family: inherit; height: 16px; width: 16px; font-size: 16px; background-image: url(\'https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/1f449.png?_nc_eui2=AeEN2ku_HafA21rCCLWSssN7PfV9klgPZPqJ3iGWsGVArAVd7RRRPJJqB4vAUSNwv1DFZwPrjGJ-YMoIuCQYG2D3QSdulaU_tFmvDKxUMJ6iMg\');\">👉</span></span>Kata c&aacute; nh&acirc;n nam dưới 11 tuổi</span></p>\n<figure class=\"image\" style=\"text-align: center;\"><img title=\"Team Kumite cũng xuất sắc gi&agrave;nh tấm huy chương bạc tại nội dung kumite đồng đội nam tr&ecirc;n 16 tuối\" src=\"http://localhost:8000/storage/posts/December2019/56599791_2798086877083473_1095563444729413632_o.jpg\" alt=\"Team Kumite cũng xuất sắc gi&agrave;nh tấm huy chương bạc tại nội dung kumite đồng đội nam tr&ecirc;n 16 tuối\" width=\"70%\" height=\"auto\" />\n<figcaption>Team Kumite cũng xuất sắc gi&agrave;nh tấm huy chương bạc tại nội dung kumite đồng đội nam tr&ecirc;n 16 tuối</figcaption>\n</figure>\n<p style=\"text-align: center;\">&nbsp;</p>\n<div class=\"ddict_btn\" style=\"top: 662px; left: 531.563px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/icon/16.png\" /></div>', '2019-12-09 20:53:24', '2019-12-09 20:53:24'),
(223, 'posts', 'slug', 11, 'en', 'doan-karate-league-dojo-da-dat-ket-qua-tot-tai-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', '2019-12-09 20:53:25', '2019-12-09 20:53:25'),
(224, 'posts', 'meta_keywords', 11, 'en', 'vô địch karate, đại học công đoàn', '2019-12-09 20:53:25', '2019-12-09 20:53:25'),
(225, 'posts', 'source', 11, 'en', 'Karate League Dojo', '2019-12-09 20:53:25', '2019-12-09 20:53:25'),
(226, 'posts', 'seo_title', 2, 'en', 'Thông tin tuyển sinh võ đường Karate league Dojo', '2019-12-09 22:04:39', '2019-12-09 22:04:39'),
(227, 'posts', 'title', 10, 'en', 'Accusantium ut maiores rerum voluptatem et non libero.', '2019-12-09 22:42:21', '2019-12-09 22:42:21'),
(228, 'posts', 'excerpt', 10, 'en', 'Doloremque quia ipsa sint qui ea iste. Modi esse vitae aperiam voluptatem ad autem eos tempore. A voluptatem molestiae sit. Voluptatem blanditiis sequi labore quidem deserunt laboriosam a.', '2019-12-09 22:42:21', '2019-12-09 22:42:21'),
(229, 'posts', 'body', 10, 'en', '<p>Ipsum qui et porro neque ea qui consectetur. Odio sint est voluptatibus. Molestiae laudantium officia omnis. Consequatur eaque iure et doloremque at aut.</p><p>Adipisci architecto fugiat ea inventore. In eligendi qui odit blanditiis recusandae veritatis eaque. Qui officiis molestiae id velit ex voluptatem eius.</p><p>Soluta sapiente distinctio omnis. Quis placeat cupiditate quasi ab. Non omnis vel aliquam incidunt est repudiandae consectetur.</p>', '2019-12-09 22:42:21', '2019-12-09 22:42:21'),
(230, 'posts', 'slug', 10, 'en', 'in-vel-ad-consequuntur-rerum-quis-mollitia-corporis', '2019-12-09 22:42:21', '2019-12-09 22:42:21'),
(231, 'posts', 'meta_keywords', 10, 'en', 'veritatis, distinctio, ad', '2019-12-09 22:42:21', '2019-12-09 22:42:21'),
(232, 'posts', 'source', 10, 'en', 'Karte League Dojo', '2019-12-09 22:42:21', '2019-12-09 22:42:21'),
(233, 'menu_items', 'title', 23, 'en', 'Trang chủ', '2019-12-16 02:24:30', '2019-12-16 02:24:30'),
(234, 'menu_items', 'title', 24, 'en', 'Tin tức', '2019-12-16 02:32:57', '2019-12-16 02:32:57'),
(235, 'menu_items', 'title', 25, 'en', 'Các cơ sở', '2019-12-16 02:33:10', '2019-12-16 02:33:10'),
(236, 'data_rows', 'display_name', 137, 'en', 'dojos', '2019-12-25 17:09:12', '2019-12-25 17:09:12'),
(237, 'data_rows', 'display_name', 138, 'en', 'dojos', '2019-12-25 17:12:06', '2019-12-25 17:12:06'),
(238, 'menu_items', 'title', 26, 'en', 'Video', '2019-12-31 06:27:56', '2019-12-31 06:27:56'),
(239, 'menu_items', 'title', 27, 'en', 'Categories', '2020-01-01 04:47:48', '2020-01-01 04:47:48'),
(240, 'data_rows', 'display_name', 139, 'en', 'Id', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(241, 'data_rows', 'display_name', 140, 'en', 'Parent', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(242, 'data_rows', 'display_name', 141, 'en', 'Order', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(243, 'data_rows', 'display_name', 142, 'en', 'Image', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(244, 'data_rows', 'display_name', 143, 'en', 'Name', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(245, 'data_rows', 'display_name', 144, 'en', 'Slug', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(246, 'data_rows', 'display_name', 145, 'en', 'Created At', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(247, 'data_rows', 'display_name', 146, 'en', 'Updated At', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(248, 'data_types', 'display_name_singular', 13, 'en', 'Category', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(249, 'data_types', 'display_name_plural', 13, 'en', 'Categories', '2020-01-01 04:52:27', '2020-01-01 04:52:27'),
(256, 'categories', 'slug', 4, 'en', 'tin-tuc', '2020-01-01 05:03:48', '2020-01-01 05:03:48'),
(257, 'categories', 'name', 4, 'en', 'Tin tức', '2020-01-01 05:03:48', '2020-01-01 05:03:48'),
(258, 'categories', 'slug', 10, 'en', 'thong-tin-tuyen-sinh', '2020-01-01 05:10:07', '2020-01-01 05:10:07'),
(259, 'categories', 'name', 10, 'en', 'Thông tin tuyển sinh', '2020-01-01 05:10:07', '2020-01-01 05:10:07'),
(260, 'data_rows', 'display_name', 147, 'en', 'categories', '2020-01-01 05:14:56', '2020-01-01 05:14:56'),
(261, 'posts', 'title', 12, 'en', 'Dolores temporibus quod rerum cupiditate ut adipisci hic.', '2020-01-01 06:35:13', '2020-01-01 06:35:13'),
(262, 'posts', 'excerpt', 12, 'en', 'Magni et autem doloremque corporis. Sed odio sunt ducimus. Aut accusantium id reprehenderit aut ratione occaecati quia. Dolorum sint accusamus qui itaque molestiae ut neque.', '2020-01-01 06:35:13', '2020-01-01 06:35:13'),
(263, 'posts', 'body', 12, 'en', '<p>Non aut in mollitia odio consequuntur alias. Minus sint quod rerum qui accusantium voluptate. Iste quia molestiae nihil harum voluptatem. Aut est saepe eos autem quo non.</p><p>Impedit in beatae et doloribus et sed. Consectetur reiciendis tempore maiores libero. Rerum magnam quidem aut sint. Eaque sit temporibus dolores laboriosam est molestias corrupti.</p><p>Quis quibusdam exercitationem esse iusto unde est. Deserunt iure distinctio est asperiores sapiente occaecati recusandae. Est omnis deserunt in consequatur ducimus nam. Sit tempore vel id consequatur quia doloribus.</p>', '2020-01-01 06:35:13', '2020-01-01 06:35:13'),
(264, 'posts', 'slug', 12, 'en', 'exercitationem-ab-eum-nesciunt-doloribus-et-molestias-accusamus', '2020-01-01 06:35:13', '2020-01-01 06:35:13'),
(265, 'posts', 'meta_keywords', 12, 'en', 'voluptatem, voluptates, odio', '2020-01-01 06:35:13', '2020-01-01 06:35:13'),
(266, 'posts', 'source', 12, 'en', 'Karte League Dojo', '2020-01-01 06:35:13', '2020-01-01 06:35:13'),
(267, 'data_rows', 'display_name', 148, 'en', 'Tên', '2020-01-04 21:28:30', '2020-01-04 21:28:30'),
(268, 'posts', 'title', 7, 'en', 'Hic doloremque sunt in repellendus.', '2020-01-06 06:56:22', '2020-01-06 06:56:22'),
(269, 'posts', 'excerpt', 7, 'en', 'Rerum provident modi libero totam. Incidunt magnam placeat ut aliquam quia necessitatibus. Consequatur hic sunt vitae in facilis debitis consequatur. Accusamus eum velit quam ratione ipsa neque. Est et quibusdam rerum doloribus.', '2020-01-06 06:56:22', '2020-01-06 06:56:22'),
(270, 'posts', 'body', 7, 'en', '<p>Nulla temporibus alias est nostrum repellat modi veniam facilis. Expedita temporibus et sunt voluptatem pariatur. Provident rerum dignissimos modi vero aut.</p><p>Hic tenetur quia dolores impedit at officiis aspernatur voluptas. Sequi minus consequatur ipsam et. Maxime laborum nemo accusamus quis inventore.</p><p>Alias eos autem fuga repellendus nobis. Modi incidunt dolores eaque. Beatae et est reprehenderit sunt aut. Eos perspiciatis omnis aut dolorum et magni.</p>', '2020-01-06 06:56:22', '2020-01-06 06:56:22'),
(271, 'posts', 'slug', 7, 'en', 'porro-qui-qui-dignissimos-quisquam-deleniti-quae', '2020-01-06 06:56:22', '2020-01-06 06:56:22'),
(272, 'posts', 'meta_keywords', 7, 'en', 'debitis, earum, non', '2020-01-06 06:56:22', '2020-01-06 06:56:22'),
(273, 'posts', 'source', 7, 'en', 'Karte League Dojo', '2020-01-06 06:56:22', '2020-01-06 06:56:22'),
(274, 'posts', 'title', 13, 'en', 'Distinctio at porro et accusamus hic voluptatum eum.', '2020-01-06 06:56:55', '2020-01-06 06:56:55'),
(275, 'posts', 'excerpt', 13, 'en', 'Debitis deleniti laudantium ullam dicta quod est cupiditate. Consequatur enim maiores nostrum hic voluptatum quaerat. Pariatur ut quas est cum sunt qui. Distinctio veritatis doloremque mollitia repellendus voluptatem. Error mollitia explicabo est non.', '2020-01-06 06:56:55', '2020-01-06 06:56:55'),
(276, 'posts', 'body', 13, 'en', '<p>Minima similique ut nam. Et est rerum nobis. Nobis et aut veritatis eos natus a vero. Non iusto quaerat minima corporis ipsam dolorum. Sit sit suscipit excepturi mollitia.</p><p>Commodi tenetur quas nobis accusantium quisquam similique. Fugit distinctio unde numquam voluptatem.</p><p>Molestias debitis accusamus et nostrum. Sapiente mollitia sed similique et. Nesciunt et commodi qui dolor at repudiandae consequuntur. Odit qui et in sit dignissimos iste.</p>', '2020-01-06 06:56:55', '2020-01-06 06:56:55'),
(277, 'posts', 'slug', 13, 'en', 'doloribus-maxime-minus-voluptatem-omnis-laudantium-dolor-vel', '2020-01-06 06:56:55', '2020-01-06 06:56:55'),
(278, 'posts', 'meta_keywords', 13, 'en', 'enim, odio, a', '2020-01-06 06:56:55', '2020-01-06 06:56:55'),
(279, 'posts', 'source', 13, 'en', 'Karte League Dojo', '2020-01-06 06:56:55', '2020-01-06 06:56:55'),
(280, 'menu_items', 'title', 28, 'en', 'Playlists', '2020-01-10 16:22:44', '2020-01-10 16:22:44'),
(281, 'data_rows', 'display_name', 154, 'en', 'playlists', '2020-01-10 16:36:39', '2020-01-10 16:36:39'),
(282, 'data_rows', 'display_name', 155, 'en', 'playlists', '2020-01-10 16:37:09', '2020-01-10 16:37:09'),
(283, 'data_rows', 'display_name', 149, 'en', 'Id', '2020-01-10 17:04:18', '2020-01-10 17:04:18'),
(284, 'data_rows', 'display_name', 150, 'en', 'Tên', '2020-01-10 17:04:18', '2020-01-10 17:04:18'),
(285, 'data_rows', 'display_name', 151, 'en', 'Slug', '2020-01-10 17:04:18', '2020-01-10 17:04:18'),
(286, 'data_rows', 'display_name', 152, 'en', 'Created At', '2020-01-10 17:04:18', '2020-01-10 17:04:18'),
(287, 'data_rows', 'display_name', 153, 'en', 'Updated At', '2020-01-10 17:04:18', '2020-01-10 17:04:18'),
(288, 'data_types', 'display_name_singular', 14, 'en', 'Playlist', '2020-01-10 17:04:19', '2020-01-10 17:04:19'),
(289, 'data_types', 'display_name_plural', 14, 'en', 'Playlists', '2020-01-10 17:04:19', '2020-01-10 17:04:19'),
(290, 'data_rows', 'display_name', 156, 'en', 'Youtube ID', '2020-01-11 05:30:36', '2020-01-11 05:30:36'),
(291, 'data_rows', 'display_name', 157, 'en', 'Tiêu đề', '2020-01-11 05:30:36', '2020-01-11 05:30:36'),
(292, 'data_rows', 'display_name', 158, 'en', 'Link ảnh thu nhỏ', '2020-01-11 05:30:36', '2020-01-11 05:30:36'),
(293, 'data_rows', 'display_name', 159, 'en', 'ID trên Youtube', '2020-01-11 05:44:51', '2020-01-11 05:44:51'),
(294, 'data_rows', 'display_name', 160, 'en', 'duration', '2020-01-17 19:06:54', '2020-01-17 19:06:54'),
(295, 'data_rows', 'display_name', 161, 'en', 'embed_html', '2020-01-17 19:06:54', '2020-01-17 19:06:54'),
(296, 'data_rows', 'display_name', 162, 'en', 'view_count', '2020-01-17 19:06:54', '2020-01-17 19:06:54'),
(297, 'data_rows', 'display_name', 163, 'en', 'like_count', '2020-01-17 19:06:54', '2020-01-17 19:06:54'),
(298, 'data_rows', 'display_name', 164, 'en', 'dislike_count', '2020-01-17 19:06:54', '2020-01-17 19:06:54'),
(299, 'data_rows', 'display_name', 165, 'en', 'comment_count', '2020-01-17 19:06:54', '2020-01-17 19:06:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuitions`
--

CREATE TABLE `tuitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `cashier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL DEFAULT '0',
  `month_start` date DEFAULT NULL,
  `month_end` date DEFAULT NULL,
  `total_price` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `excess_cash` int(11) NOT NULL DEFAULT '0',
  `refunds` int(11) NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `trans_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('FAIL','SUCCESS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FAIL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuitions`
--

INSERT INTO `tuitions` (`id`, `student_id`, `cashier`, `month`, `month_start`, `month_end`, `total_price`, `total`, `amount`, `excess_cash`, `refunds`, `note`, `type`, `trans_id`, `status`, `created_at`, `updated_at`) VALUES
(27, 20200001, 'Trần Mạnh Dũng', 3, '2020-07-01', '2020-09-01', 1400000, 1260000, 1500000, 290000, 0, 'Học phí:                         2020-07: 500.000VNĐ\r\n                                        2020-08: 450.000VNĐ\r\n                                        2020-09: 450.000VNĐ\r\nTổng học phí:                1.400.000VNĐ\r\nƯu đãi mặc định:        -140.000VNĐ(10%)\r\nTổng:                               1.260.000VNĐ\r\nKhách đưa:                    1500000VNĐ\r\nCòn dư:                          240000VNĐ\r\nTrả lại:                            0VNĐ\r\n=================================\r\nNộp ít nhất 3 tháng học phí liên tiếp trong lần đầu đăng ký được giảm 10% tổng học phí nộp, tối đa 250.000VNĐ\r\nTặng 1 bộ võ phục trị giá 250.000VNĐ. Cập nhật học phí 1 tháng, chênh lệch học phí dược tính vào số dư 50.000VNĐ do bạn chuyển cơ sở tập luyện', 0, NULL, 'SUCCESS', '2020-07-01 08:33:18', '2020-07-01 08:38:05'),
(28, 20200001, 'MOMO', 1, '2020-10-01', '2020-10-01', 470000, 180000, 180000, 0, 0, 'Học phí:                         2020-10: 470.000VNĐ\r\nTổng học phí:                470.000VNĐ\r\nTiền dư đợt trước:        -290.000VNĐ\r\nTổng:                               180.000VNĐ\r\n=================================', 1, '2319517903', 'SUCCESS', '2020-07-01 08:43:02', '2020-07-01 08:43:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuition_policies`
--

CREATE TABLE `tuition_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dojo_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `policy` tinyint(1) NOT NULL DEFAULT '1',
  `date_apply` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuition_policies`
--

INSERT INTO `tuition_policies` (`id`, `dojo_id`, `price`, `policy`, `date_apply`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 450000, 0, '2020-04-01', 'Nộp học phí theo kỳ 3 tháng.', NULL, '2020-05-30 14:28:44'),
(2, 2, 200000, 0, '2020-05-01', 'Nộp học phí theo kỳ 3 tháng.', NULL, '2020-05-30 14:29:00'),
(3, 1, 500000, 0, '2020-06-01', 'Nộp học phí theo kỳ 3 tháng.', NULL, '2020-05-30 14:29:08'),
(4, 3, 400000, 1, '2020-04-01', 'Nộp học phí theo từng tháng.', NULL, '2020-05-30 14:29:19'),
(10, 3, 470000, 0, '2020-10-01', NULL, '2020-06-30 05:32:00', '2020-06-30 05:32:00'),
(11, 1, 450000, 0, '2020-08-01', NULL, '2020-06-30 19:01:22', '2020-06-30 19:01:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uptimes`
--

CREATE TABLE `uptimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `weekdays` int(11) NOT NULL,
  `uptimes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `uptimes`
--

INSERT INTO `uptimes` (`id`, `room_id`, `weekdays`, `uptimes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '[[\"08:00\",\"11:45\"],[\"14:00\",\"17:00\"],[\"19:00\",\"21:00\"]]', '2020-04-22 21:35:35', '2020-04-22 20:43:53'),
(2, 1, 4, '[[\"19:30\",\"21:00\"]]', '2020-04-22 21:35:35', '2020-04-22 21:35:35'),
(3, 2, 0, '[[\"07:00\",\"11:00\"],[\"14:00\",\"21:00\"]]', '2020-04-22 21:35:35', '2020-04-22 21:40:09'),
(4, 2, 2, '[[\"13:00\",\"14:00\"],[\"15:00\",\"16:30\"],[\"17:00\",\"19:00\"]]', NULL, '2020-06-29 09:57:03'),
(5, 2, 3, '[[\"13:00\",\"20:00\"]]', '2020-04-22 21:38:15', '2020-04-22 21:38:15'),
(6, 2, 5, '[[\"13:00\",\"20:00\"]]', '2020-04-22 21:39:04', '2020-04-22 21:39:04'),
(7, 2, 6, '[[\"07:00\",\"11:00\"],[\"14:00\",\"21:00\"]]', '2020-04-22 21:35:35', '2020-04-22 21:40:35'),
(9, 3, 1, '[[\"18:00\",\"20:00\"]]', '2020-04-22 21:41:42', '2020-04-22 21:41:42'),
(11, 3, 2, '[[\"18:00\",\"20:00\"]]', NULL, '2020-04-26 01:33:24'),
(10, 3, 6, '[[\"18:00\",\"20:00\"]]', NULL, '2020-04-26 02:23:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT '2',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `student_id`, `remember_token`, `settings`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'League Dojo - K.L.D', 'admin@admin.com', 'users\\December2019\\UQTMaIjt5m1QO4pHnIcJ.jpg', NULL, '$2y$10$0d6.Zts831N6arhw7KSplOWL5tnpeBOEEUEf/Ntlf0koX2pBiCcLq', NULL, 'oHOfq0E36F7WciP6UGpjZVXbgkCHxsBnICwha70atvNBLrBcLatvdrPvWzDl', '{\"locale\":\"vi\"}', '2019-11-28 00:46:52', '2019-12-20 12:02:16', NULL),
(2, 2, 'Phạm Thị Thư', 'nunuqtkdb@gmail.com', 'users/June2020/1592313996.png', '2020-06-15 07:15:15', '$2y$10$AKL4GJSDTZZHQmLLp3/w3.JHYszkYKBEtfYMZzf8fOn9lO94nhWme', 20200003, 'DfVq1T8wW0DK4m3bTVoSJbS4wIXXBhPH8suYhS43bHM9kecs9CwqnGLmqqqH', '{\"locale\":\"vi\"}', '2019-12-02 03:08:42', '2020-06-16 13:26:36', NULL),
(3, 2, 'SIN', 'hoangtuan.k40.cb@gmail.com', 'users/June2020/1592313751.png', '2020-06-16 13:17:56', '$2y$10$u8oKATTpSxgZSjKErN6VYOw8l7ZqHqc6djucu/6lOQwjT4R3yt2f.', 20200002, 'XYN3HssbbRzkojfDpCN26hWL2j8hI95NQBryg3MXArjiE4030TklftRcbj2o', '{\"locale\":\"vi\"}', '2019-12-02 03:09:39', '2020-06-16 13:22:31', NULL),
(4, 4, 'Long Rồng', 'vuquanglong2992@gmail.com', 'users/June2020/1592310377.png', '2020-06-16 12:33:19', '$2y$10$3zQ4qn2qGA.uKForD.dT2umXXtXygR.39KcaJrQASv1vyqnPF521e', 20200005, 'S2U4GKzTsliUxtIkzdSltCrjqZvHLe6LJjFNBhXj1IqzrAHahP95sU7jlMuU', '{\"locale\":\"vi\"}', '2019-12-02 03:10:12', '2020-06-16 12:33:19', NULL),
(5, 1, 'Bi Trẩn', 'uocnv.soict.hust@gmail.com', 'users/June2020/1592320783.png', '2020-06-16 12:33:19', '$2y$10$ynQuib2laZBW7ej7duP2se2vMEaEpipmTYXNJUDXqoP3OdzGII4qO', 20200001, '3eyEgZ2sQgr2QSpY2MQKRcBQiP0T2NybZgL0eUq73c2ARlGrZmJLr4wRJhEa', '{\"locale\":\"vi\"}', '2019-12-02 03:10:42', '2020-06-16 15:19:43', NULL),
(6, 2, 'Lãm Đz', 'lamdv@gmail.com', 'users/default.png', NULL, '$2y$10$ENVkPjkjEnHx2X6mRdRbe.S9PmUdQKSbA0AQt7.mqGg/1eq.sKH/C', 20200004, NULL, '{\"locale\":\"vi\"}', '2019-12-02 06:15:05', '2020-04-23 07:35:51', NULL),
(9, 2, 'Nguyên Hoang Anh', 'Nghoaganh1010@gmail.com', 'users/default.png', NULL, '$2y$10$4zT9QlSRsCLWBDMBSQywi..bNNpcp3Laz8jr8WEHp0duTSw9CuMri', NULL, NULL, NULL, '2020-06-15 15:04:02', '2020-06-15 15:04:02', NULL),
(10, 2, 'Viiiii', 'lethituongvycc2001@gmail.com', 'users/default.png', NULL, '$2y$10$3zw6slIlVbBGEsAvKHCNqens61cBfzVnZBJhQAt1aZiRT0cuEpyXS', NULL, NULL, NULL, '2020-06-15 15:07:21', '2020-06-15 15:07:21', NULL),
(11, 2, 'Đăng Huy', 'Nguyendanghuy23012001@gmail.com', 'users/default.png', '2020-06-16 10:20:57', '$2y$10$5Dth7OFzAVgAWhMcMuf8peNYKIwbFsNpQP7kDBXJlHFUboJ2OZ/oq', NULL, NULL, NULL, '2020-06-16 10:16:18', '2020-06-16 10:20:57', NULL),
(12, 2, 'Nguyễn Thành Đạt', 'dat6122000@gmail.com', 'users/default.png', NULL, '$2y$10$4IwrFC043GnYY6Snxo4grez3X5W0Lwa.Y68r4Q.xQpRlA5SWq0mki', 20200007, NULL, NULL, '2020-06-16 10:36:15', '2020-06-16 12:08:03', NULL),
(13, 3, 'Lê Thị Diệu Lâm', 'Suibb2211@gmail.com', 'users/June2020/1592313169.png', '2020-06-16 12:42:20', '$2y$10$0gsjgKNl2tI4TcbMdST3zOtSOTHFL/D614aLrVw4UCsQzan58scsC', 20200009, NULL, '{\"locale\":\"vi\"}', '2020-06-16 12:01:01', '2020-06-16 13:12:49', NULL),
(14, 2, 'Pham Huong', 'phamhuong16301@gmail.com', 'users/default.png', NULL, '$2y$10$cn/1f33EnF0YzwBfzTDp4uMfm1uv3qz3ASOpcs7pgppsPuBzQj22G', 20200011, NULL, NULL, '2020-06-16 12:01:33', '2020-06-16 13:10:48', NULL),
(15, 2, 'Nguyễn Thị Phương Anh', 'Nguyenphuonganhm@gmail.com', 'users/default.png', NULL, '$2y$10$1PpZGKD1M1b7bBgDivmLr.141P9HIggYx.Kh2.pnxWHkpwYAajJ4O', 20200008, NULL, NULL, '2020-06-16 12:03:55', '2020-06-16 12:09:51', NULL),
(16, 2, 'Trịnh Thị Quỳnh', 'baoboine15@gmail.com', 'users/default.png', NULL, '$2y$10$RCuQ6GBcCr5VH4Vc8PwYi.CK8haDC8LyJe/D1fQIR5QkJKYvIHz4W', 20200010, NULL, NULL, '2020-06-16 12:13:01', '2020-06-16 13:02:35', NULL),
(17, 2, '0963036809', 'manhmanh0018@gmail.c0m', 'users/default.png', NULL, '$2y$10$Ld8il2UrShum6tUFOh3Tae3d84iKLdZ.a3R/0P5ZGagPwU6guvt1G', NULL, NULL, NULL, '2020-06-16 12:36:23', '2020-06-16 12:36:23', NULL),
(18, 2, 'Nguyễn Thị Sen', 'St290611@gmail.com', 'users/June2020/1592313175.png', '2020-06-16 13:08:39', '$2y$10$dgyHMjPp5AXGM6W9A7txuOll6w8pVMjClNK1CBtVopl2scwclttB2', 20200014, 'giWNk0gZbLtbXw9Zpbe4ALA5BLFnMkwl6oTqBvkC7VBToxqypRVwvvkKsSbr', NULL, '2020-06-16 12:52:51', '2020-06-16 14:06:49', NULL),
(19, 2, 'Thanhthanh', 'thanhpollux@gmail.com', 'users/default.png', NULL, '$2y$10$W6AigvW2lQ3nDQcFwKddgOU7O4fqAN8ylMv7qrV.uG5e2hBZRz.3q', 20200012, NULL, NULL, '2020-06-16 12:52:56', '2020-06-16 13:11:08', NULL),
(20, 2, 'Tuấn nguyễn', 'Phuongtuan2k0@gmail.com', 'users/June2020/1592313738.png', '2020-06-16 13:20:27', '$2y$10$5oZ.k7dWj9HGjiE1xonzkeCo9n.R8qaDQmYxOn9sdyLVxF..47UUC', 20200015, 'aIEBj7Kfmv9kNGQ1Oa71BQdIpW5iG2MZqcsJYjw2fit0YD0eUStYUBntx811', NULL, '2020-06-16 12:58:56', '2020-06-16 14:06:58', NULL),
(21, 2, 'Kieunga', 'Nguyenthikieunga123lk@gmail.com', 'users/default.png', NULL, '$2y$10$gNbR6FjCkmx5s3fo7NwLEeGnwXLq9mUuAyeRGcDqDWn.FItERnic2', NULL, NULL, NULL, '2020-06-16 12:58:58', '2020-06-16 12:58:58', NULL),
(22, 2, 'Đặng Thu Huyền', 'Dangthuhuyen29100606@gmail.com', 'users/June2020/1592317434.png', '2020-06-16 13:27:25', '$2y$10$jMzWZIVtkVIBKUj7PG6J2uUXwzLsTZmcgnHet.iT7Je.Cfo4YrSCm', 20200016, NULL, NULL, '2020-06-16 13:20:12', '2020-06-16 14:23:54', NULL),
(23, 2, 'Buidacluc', 'Lucliulo1995@gmail.com', 'users/default.png', NULL, '$2y$10$EMkB3SoxlR7i8qqK1btBJOkbtEpyEHu7x4TZsGn9Je1EGJLam5DQq', NULL, NULL, NULL, '2020-06-16 13:22:29', '2020-06-16 13:22:29', NULL),
(24, 2, 'Ngọc Minh', 'Daongocminh01092001@gmail.com', 'users/default.png', '2020-06-16 13:45:24', '$2y$10$MN57Gq41gwlQqzaG/bdGhuT5l54/5V18wK.YoSbTmacanmdyrMkTm', NULL, NULL, NULL, '2020-06-16 13:39:58', '2020-06-16 13:45:24', NULL),
(25, 2, 'Tô Thị Hồng Ngát', 'tothihingngat.k64qldda@gmail.com', 'users/default.png', NULL, '$2y$10$IEQQB6oFJJvbsT4r7vA5JuJY2oNTzc1O/ePJ2dkvKD4ijo0Dq0C1.', NULL, NULL, NULL, '2020-06-17 03:07:54', '2020-06-17 03:07:54', NULL),
(26, 2, 'Đỗ Lãm', 'dovanlam.cne59.hua@gmail.com', 'users/default.png', NULL, '$2y$10$zYnzAYKHfw2oG2E0954Z..jTNUh0qX1bvlNDSVyP2Ansxk2FIDH9S', NULL, NULL, NULL, '2020-06-17 03:50:00', '2020-06-17 03:50:00', NULL),
(27, 2, 'Sonleu27071998', 'Sonleu27071998@gmail.com', 'users/default.png', NULL, '$2y$10$DOmAtdWV2qcTTdq5TG3umeHzo7n0cvBS4C2bYfvlWr2upIOnTn.uS', 20200018, 'A3vg8ZmvEWLs9iuTAi0pjnn7eplj06oJPdmhLSi96mkwAqpIxMRfyMtOahZk', NULL, '2020-06-17 07:42:42', '2020-06-17 09:04:36', NULL),
(28, 2, 'ManhManh29', 'tranvietha.mana10x@gmail.com', 'users/default.png', '2020-06-17 07:46:11', '$2y$10$rZOKATeUj8qSKPZjHIuljuk32lT6GUAHJVnhxd7OzhJetGNmSL3R.', 20200017, NULL, NULL, '2020-06-17 07:42:50', '2020-06-17 09:03:32', NULL),
(29, 2, 'ManhDQ', 'manhmanh0018@gmail.com', 'users/default.png', NULL, '$2y$10$snGV/7NunZxeb1Lb0XYmgucSN8vN8iFwgtteLDbbo2qkhAxq8ua1C', NULL, NULL, NULL, '2020-06-17 08:05:25', '2020-06-17 08:05:25', NULL),
(30, 2, 'Nguyễn Kim Phượng', 'nguyenkimphuong3120@gmail.com', 'users/default.png', '2020-06-17 15:53:46', '$2y$10$wK0DziBhiLtmeIHYVfSC5e.0KWcUvtugHQn2fkldvyux/HPOdhAeW', 20200019, NULL, NULL, '2020-06-17 15:10:03', '2020-06-17 18:53:59', NULL),
(31, 2, 'Nguyễn Trọng Nguyên', 'kakainguyen@gmail.com', 'users/default.png', NULL, '$2y$10$d3kiCEMuv8we7F1FX/dmLuhZZdYPX3exKDJcu5MLS1vows/r0/t3i', NULL, NULL, NULL, '2020-06-17 15:29:17', '2020-06-17 15:29:17', NULL),
(32, 2, 'Trương Thị Hiền', 'truonghien82910@gmail.com', 'users/default.png', NULL, '$2y$10$572EkSeq74cmrfVvCRsL.eR12sY1tN1cIC9HCpSng13k9aHAwQCu2', NULL, NULL, NULL, '2020-06-17 16:04:29', '2020-06-17 16:04:29', NULL),
(33, 2, 'Test', 'uocnobiph98@gmail.com', 'users/default.png', '2020-06-29 11:07:17', '$2y$10$sl2TJQLGeFxUqPP.Uj9doOvgxgtGoi2aded0Btt06VS.Dt4M7yo8i', 20200020, 'OAh1uKhYphlJSHruivo2kwKcdePGtsLBAGXujDKb6oIa3srqi4nv7zFgrN4L', '{\"locale\":\"vi\"}', '2020-06-29 08:53:19', '2020-06-29 11:07:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `youtubeId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `playlist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL,
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `youtubeId`, `seo_title`, `meta_description`, `meta_keywords`, `keywords`, `status`, `slug`, `featured`, `playlist_id`, `title`, `thumbnail`, `duration`, `description`, `view_count`, `like_count`, `dislike_count`, `comment_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'KU4ZIFGHphU', 'Trận 2 Kata cá nhân nữ trên 16 tuổi || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kata\"]', 'PUBLISHED', 'tran-2-kata-ca-nhan-nu-tren-16-tuoi-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Trận 2 Kata cá nhân nữ trên 16 tuổi || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/KU4ZIFGHphU/hqdefault.jpg', 'PT3M31S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata cá nhân nữ trên 16 tuổi - Trận 2 - AO (đai xanh)\nVĐV: Phạm Thị Thư\nBài quyền: Shienchin', 127, 1, 0, 6, '2020-01-13 09:08:45', '2020-05-29 18:58:24', NULL),
(2, 'vSzKprJ4VFU', 'Chung kết Kata đồng đội hỗn hợp trên 16 tuổi  || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kata\"]', 'PUBLISHED', 'chung-ket-kata-dong-doi-hon-hop-tren-16-tuoi-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Chung kết Kata đồng đội hỗn hợp trên 16 tuổi  || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/vSzKprJ4VFU/hqdefault.jpg', 'PT3M6S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata đồng đội hỗn hợp trên 16 tuổi - Chung kết - AO (đai xanh)\nBài quyền: Hean godan', 87, 0, 0, 0, '2020-01-13 09:09:32', '2020-06-14 21:03:40', NULL),
(3, 'X1dI4gFDb60', 'Bán kết Kata đồng đội hỗn hợp trên 16 tuổi  || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'ban-ket-kata-dong-doi-hon-hop-tren-16-tuoi-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Bán kết Kata đồng đội hỗn hợp trên 16 tuổi  || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/X1dI4gFDb60/hqdefault.jpg', 'PT1M25S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata đồng đội hỗn hợp trên 16 tuổi - Bán kết - AO (đai xanh)\nBài quyền: Jion', 50, 0, 0, 0, '2020-01-13 09:09:59', '2020-01-18 17:00:14', NULL),
(4, 'bkWH3yXR5fo', 'Trận 1 Kata đồng đội hỗn hợp trên 16 tuổi  || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'tran-1-kata-dong-doi-hon-hop-tren-16-tuoi-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Trận 1 Kata đồng đội hỗn hợp trên 16 tuổi  || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/bkWH3yXR5fo/hqdefault.jpg', 'PT1M34S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata đồng đội hỗn hợp trên 16 tuổi - Trận 1 - AO (đai xanh)\nBài quyền: Bassai dai', 43, 0, 0, 0, '2020-01-13 09:10:26', '2020-01-18 17:00:14', NULL),
(5, 'icQ45oihzgg', 'Kata cá nhân nữ trên 16 tuổi || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'kata-ca-nhan-nu-tren-16-tuoi-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kata cá nhân nữ trên 16 tuổi || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/icQ45oihzgg/hqdefault.jpg', 'PT2M15S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata cá nhân nữ trên 16 tuổi - Trận 1 - AK (đai đỏ)\nVĐV: Lê Thị Diệu Lâm\nBài quyền: Bassai dai', 55, 0, 0, 0, '2020-01-13 09:10:50', '2020-05-15 10:17:41', NULL),
(6, '2cp99RlfWe8', 'Kata cá nhân nữ trên 16 tuổi - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kata\"]', 'PUBLISHED', 'kata-ca-nhan-nu-tren-16-tuoi-tran-1-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kata cá nhân nữ trên 16 tuổi - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/2cp99RlfWe8/hqdefault.jpg', 'PT1M30S', 'Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata cá nhân nữ trên 16 tuổi - Trận 1 - AK (đai đỏ)\nVĐV: Phạm Thị Thư\nBài quyền: Bassai dai', 109, 1, 0, 0, '2020-01-13 09:11:14', '2020-05-15 10:17:42', NULL),
(7, '1pe6A_yn8X0', 'Kumite cá nhân nữ trên 18 dưới 44kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nu-tren-18-duoi-44kg-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nữ trên 18 dưới 44kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/1pe6A_yn8X0/hqdefault.jpg', 'PT35S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nữ trên 18 tuổi dưới 44kg - Trận 1 - AK (đai đỏ)\nVĐV: Trịnh Thị Quỳnh', 54, 0, 0, 0, '2020-01-13 09:11:37', '2020-06-29 09:25:48', NULL),
(8, 'MzKjMxy1f4Y', 'Kumite cá nhân nam trên 18 dưới 75kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nam-tren-18-duoi-75kg-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nam trên 18 dưới 75kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/MzKjMxy1f4Y/hqdefault.jpg', 'PT1M21S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nam trên 18 tuổi dưới 75kg - Trận 1 - AK (đai đỏ)\nVĐV: Đào Quang Mạnh', 66, 1, 0, 0, '2020-01-13 09:12:26', '2020-06-14 21:03:40', NULL),
(9, 'E9TZycssqSk', 'Kumite cá nhân nam trên 18 dưới 67kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nam-tren-18-duoi-67kg-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nam trên 18 dưới 67kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/E9TZycssqSk/hqdefault.jpg', 'PT1M53S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nam trên 18 tuổi dưới 67kg - Trận 1 - AK (đai đỏ)\nVĐV: Đỗ Văn Lãm', 116, 2, 0, 0, '2020-01-13 09:13:30', '2020-05-15 10:17:43', NULL),
(10, 'xa19VS7Sz-M', 'Kumite cá nhân nam trên 18 trên 75kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"\\u0110H C\\u00f4ng \\u0111o\\u00e0n\",\"V\\u00f4 \\u0111\\u1ecbch Karate\",\"thi \\u0111\\u1ea5u\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nam-tren-18-tren-75kg-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nam trên 18 trên 75kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/xa19VS7Sz-M/hqdefault.jpg', 'PT2M48S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nam trên 18 tuổi trên 75kg - Trận 1 - AK (đai đỏ)\nVĐV: Vũ Quang Long', 57, 0, 0, 0, '2020-01-13 09:13:54', '2020-06-29 09:25:49', NULL),
(11, 'D-SPrMyWMGo', 'Kumite cá nhân nam trên 18 dưới 60kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nam-tren-18-duoi-60kg-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nam trên 18 dưới 60kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/D-SPrMyWMGo/hqdefault.jpg', 'PT2M52S', 'Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nam trên 18 tuổi dưới 60kg - Trận 1 - AK (đai đỏ)\nVĐV: Nguyễn Đức Trung', 48, 0, 0, 0, '2020-01-13 09:14:15', '2020-06-29 09:25:49', NULL),
(12, 'Tvr8lYWD244', 'Kumite cá nhân nam trên 18 dưới 55kg - Trận 2 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nam-tren-18-duoi-55kg-tran-2-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nam trên 18 dưới 55kg - Trận 2 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/Tvr8lYWD244/hqdefault.jpg', 'PT2M57S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nam trên 18 tuổi dưới 55kg - Trận 2 - AO (đai xanh)\nVĐV: Lê Đức Bình', 56, 0, 0, 0, '2020-01-13 09:14:40', '2020-06-29 09:25:50', NULL),
(13, 'LYUAxIwXjH0', 'Kumite cá nhân nam trên 18 dưới 55kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-ca-nhan-nam-tren-18-duoi-55kg-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite cá nhân nam trên 18 dưới 55kg - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/LYUAxIwXjH0/hqdefault.jpg', 'PT5M5S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite cá nhân nam trên 18 tuổi dưới 55kg - Trận 1 - AK (đai đỏ)\nVĐV: Lê Đức Bình', 88, 0, 0, 0, '2020-01-13 09:15:06', '2020-06-29 09:25:50', NULL),
(14, 'EOMQqbLCtCA', 'Kumite đồng đội nam - Chung kết - Trận 2 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-chung-ket-tran-2-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam - Chung kết - Trận 2 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/EOMQqbLCtCA/hqdefault.jpg', 'PT2M28S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam - Chung kết - Trận 2 - AK (đai đỏ)', 78, 0, 0, 0, '2020-01-13 09:15:34', '2020-05-29 18:58:28', NULL),
(15, '4yFaKNPzWXE', 'Kumite đồng đội nam - Chung kết - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-chung-ket-tran-1-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam - Chung kết - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/4yFaKNPzWXE/hqdefault.jpg', 'PT4M30S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam - Chung kết - Trận 1 - AK (đai đỏ)', 115, 2, 0, 0, '2020-01-13 09:15:55', '2020-06-29 09:25:50', NULL),
(16, 'V4NIUs0nZWM', 'Kumite đồng đội nam - Bán kết - Trận 2 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'kumite-dong-doi-nam-ban-ket-tran-2-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam - Bán kết - Trận 2 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/V4NIUs0nZWM/hqdefault.jpg', 'PT2M3S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam - Bán kết - Trận 2 - AK (đai đỏ)', 36, 0, 0, 0, '2020-01-13 09:16:31', '2020-05-15 10:17:46', NULL),
(17, 'q-oIawff3aI', 'Kumite đồng đội nam - Bán kết - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-ban-ket-tran-1-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam - Bán kết - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/q-oIawff3aI/hqdefault.jpg', 'PT1M37S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam - Bán kết - Trận 1 - AK (đai đỏ)', 65, 1, 0, 0, '2020-01-13 09:17:06', '2020-05-15 10:17:46', NULL),
(18, '0cURRwRM_ck', 'Kumite đồng đội nam lượt trận thứ 2 - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-luot-tran-thu-2-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam lượt trận thứ 2 - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/0cURRwRM_ck/hqdefault.jpg', 'PT2M32S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam lượt trận thứ 2 - Trận 1 - AO (đai xanh)', 62, 0, 0, 0, '2020-01-13 09:17:32', '2020-05-15 10:17:46', NULL),
(19, 'A1N8DmY__D4', 'Kumite đồng đội nam lượt trận thứ 2 - Trận 2 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'kumite-dong-doi-nam-luot-tran-thu-2-tran-2-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam lượt trận thứ 2 - Trận 2 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/A1N8DmY__D4/hqdefault.jpg', 'PT1M29S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam lượt trận thứ 2 - Trận 2 - AO (đai xanh)', 62, 0, 0, 0, '2020-01-13 09:17:56', '2020-06-29 09:25:52', NULL),
(20, 'ZLpDrFpoaZ0', 'Kumite đồng đội nam lượt trận thứ 1 - Trận 3 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-luot-tran-thu-1-tran-3-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam lượt trận thứ 1 - Trận 3 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/ZLpDrFpoaZ0/hqdefault.jpg', 'PT3M', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam lượt trận thứ 1 - Trận 3 - AO (đai xanh)', 67, 0, 0, 0, '2020-01-13 09:25:02', '2020-05-15 10:17:47', NULL),
(21, '1h0SqKr_dMo', 'Kumite đồng đội nam lượt trận thứ 1 - Trận 2 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kumite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-luot-tran-thu-1-tran-2-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam lượt trận thứ 1 - Trận 2 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/1h0SqKr_dMo/hqdefault.jpg', 'PT2M56S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam lượt trận thứ 1 - Trận 2 - AO (đai xanh)', 80, 0, 0, 0, '2020-01-13 09:25:58', '2020-05-15 10:17:47', NULL),
(22, 'CxU2rTKpCGk', 'Kumite đồng đội nam lượt trận thứ 1 - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\",\"kunite\"]', 'PUBLISHED', 'kumite-dong-doi-nam-luot-tran-thu-1-tran-1-giai-vo-dich-karate-dh-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kumite đồng đội nam lượt trận thứ 1 - Trận 1 || Giải Vô địch Karate ĐH Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/CxU2rTKpCGk/hqdefault.jpg', 'PT2M43S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kumite đồng đội nam lượt trận thứ 1 - Trận 1 - AO (đai xanh)', 128, 1, 1, 1, '2020-01-13 09:26:30', '2020-06-29 09:25:52', NULL),
(23, 'XEea2WDLx28', 'Nội dung thi lên đai: Phần thi kihon Kuy 8 (Đai vàng) lên Kuy 7 (Đai xanh nhạt)', NULL, NULL, '[\"thăng đai\",\"tập luyện\",\"đai vàng\",\"kuy 8\"]', 'PUBLISHED', 'noi-dung-thi-len-dai-phan-thi-kihon-kuy-8-dai-vang-len-kuy-7-dai-xanh-nhat', 0, 2, 'Nội dung thi lên đai: Phần thi kihon Kuy 8 (Đai vàng) lên Kuy 7 (Đai xanh nhạt)', 'https://i.ytimg.com/vi/XEea2WDLx28/hqdefault.jpg', 'PT3M3S', 'KARATE LEAGUE DOJO\nVõ đường với trang thiết bị hiện đại, tiêu chuẩn phòng tập đội tuyển sẽ mang đến những điều tốt nhất giành cho các võ sinh.Với nhiều năm kinh nghiệm thi đấu, huấn luyện và giảng dạy môn võ Karatedo các HLV sẽ trau dồi tinh thần thượng võ NHÂN - NGHĨA - LỄ - TRÍ - TÍN.\nHLV Trần Mạnh Dũng: huyền đai đệ tam đẳng Karatedo, cựu VĐV đội tuyển Quốc gia, kiện tướng Karatedo Quốc gia, giáo viên giảng dạy Karatedo Cảnh sát phòng cháy chữa cháy...', 353, 6, 1, 0, '2020-01-13 09:28:35', '2020-06-29 09:25:53', NULL),
(24, 'vouN5yKWfVU', 'Nội dung thi lên đai: Phần thi kihon Kuy 9 (Đai trắng) lên Kuy 8 (Đai vàng)', NULL, NULL, '[\"thăng đai\",\"đai trắng\",\"tập luyện\",\"kuy 9\",\"kuy 10\"]', 'PUBLISHED', 'noi-dung-thi-len-dai-phan-thi-kihon-kuy-9-dai-trang-len-kuy-8-dai-vang', 0, 2, 'Nội dung thi lên đai: Phần thi kihon Kuy 9 (Đai trắng) lên Kuy 8 (Đai vàng)', 'https://i.ytimg.com/vi/vouN5yKWfVU/hqdefault.jpg', 'PT2M38S', 'KARATE LEAGUE DOJO\nVõ đường với trang thiết bị hiện đại, tiêu chuẩn phòng tập đội tuyển sẽ mang đến những điều tốt nhất giành cho các võ sinh.Với nhiều năm kinh nghiệm thi đấu, huấn luyện và giảng dạy môn võ Karatedo các HLV sẽ trau dồi tinh thần thượng võ NHÂN - NGHĨA - LỄ - TRÍ - TÍN.\nHLV Trần Mạnh Dũng: huyền đai đệ tam đẳng Karatedo, cựu VĐV đội tuyển Quốc gia, kiện tướng Karatedo Quốc gia, giáo viên giảng dạy Karatedo Cảnh sát phòng cháy chữa cháy...', 536, 8, 1, 2, '2020-01-13 09:29:00', '2020-06-29 09:25:53', NULL),
(25, 'Goi2bSfLSIg', 'Sanbon Kumite - Karate', NULL, NULL, '[\"thăng đai\",\"đai xanh\",\"kuy 8\"]', 'PUBLISHED', 'sanbon-kumite-karate', 0, 2, 'Sanbon Kumite - Karate', 'https://i.ytimg.com/vi/Goi2bSfLSIg/hqdefault.jpg', 'PT1M57S', 'KARATE LEAGUE DOJO - K.L.D\nVõ đường với trang thiết bị hiện đại, tiêu chuẩn phòng tập đội tuyển sẽ mang đến những điều tốt nhất giành cho các võ sinh.Với nhiều năm kinh nghiệm thi đấu, huấn luyện và giảng dạy môn võ Karatedo các HLV sẽ trau dồi tinh thần thượng võ NHÂN - NGHĨA - LỄ - TRÍ - TÍN.\nHLV Trần Mạnh Dũng: huyền đai đệ tam đẳng Karatedo, cựu VĐV đội tuyển Quốc gia, kiện tướng Karatedo Quốc gia, giáo viên giảng dạy Karatedo Cảnh sát phòng cháy chữa cháy...', 85, 4, 0, 0, '2020-01-13 09:29:50', '2020-06-29 09:25:53', NULL),
(26, 'PUguwLbAbwg', 'BỊT MẮT ĐỐI LUYỆN, BẠN ĐÃ ÁP DỤNG ĐỂ TẬP LUYỆN CHƯA?', NULL, NULL, '[\"tập luyện\",\"trò chơi\",\"bịt mắt\"]', 'PUBLISHED', 'bit-mat-doi-luyen-ban-da-ap-dung-de-tap-luyen-chua', 1, NULL, 'BỊT MẮT ĐỐI LUYỆN, BẠN ĐÃ ÁP DỤNG ĐỂ TẬP LUYỆN CHƯA?', 'https://i.ytimg.com/vi/PUguwLbAbwg/hqdefault.jpg', 'PT13M30S', 'Karate League Dojo đã áp dụng một bài tập mới giúp tăng khả năng phản xạ và cảm nhận. Hãy cùng áp dụng vào giáo án tập luyện của bạn nào!', 89, 4, 0, 0, '2020-01-13 09:30:29', '2020-06-14 21:03:42', NULL),
(27, 'PusjQlMki60', '[TỰ VỆ] LÀM GÌ KHI BỊ TÚM TAY ? - KIỆN TƯỚNG KARATE TRẦN MẠNH DŨNG', NULL, NULL, '[\"tự vệ\",\"học tập\"]', 'PUBLISHED', 'tu-ve-lam-gi-khi-bi-tum-tay-kien-tuong-karate-tran-manh-d-ng', 1, NULL, '[TỰ VỆ] LÀM GÌ KHI BỊ TÚM TAY ? - KIỆN TƯỚNG KARATE TRẦN MẠNH DŨNG', 'https://i.ytimg.com/vi/PusjQlMki60/hqdefault.jpg', 'PT2M21S', '', 134, 4, 0, 0, '2020-01-13 09:30:59', '2020-05-29 18:58:32', NULL),
(28, 'zPd1B3HMVsI', 'KỸ THUẬT KIZAMI TSUKI (TAY TRƯỚC) KUMITE', NULL, NULL, '[\"kizami\",\"tay trước\",\"kỹ thuật\",\"tập luyện\"]', 'PUBLISHED', 'ky-thuat-kizami-tsuki-tay-truoc-kumite', 1, NULL, 'KỸ THUẬT KIZAMI TSUKI (TAY TRƯỚC) KUMITE', 'https://i.ytimg.com/vi/zPd1B3HMVsI/hqdefault.jpg', 'PT2M1S', '', 562, 13, 0, 0, '2020-01-13 09:31:45', '2020-06-29 09:25:54', NULL),
(29, 'FaVX2Sa3rhQ', 'MAKIWARA HANDMADE BY LEAGUE DOJO', NULL, NULL, '[\"makiwara\",\"học tập\"]', 'PUBLISHED', 'makiwara-handmade-by-league-dojo', 1, NULL, 'MAKIWARA HANDMADE BY LEAGUE DOJO', 'https://i.ytimg.com/vi/FaVX2Sa3rhQ/hqdefault.jpg', 'PT53S', '', 71, 2, 0, 0, '2020-01-13 09:32:25', '2020-05-29 18:58:32', NULL),
(30, '7Up7eIxngmw', 'CUỐI TUẦN KHỞI ĐỘNG CHÚT NÀO', NULL, NULL, '[\"tập luyện\"]', 'PUBLISHED', 'cuoi-tuan-khoi-dong-chut-nao', 1, NULL, 'CUỐI TUẦN KHỞI ĐỘNG CHÚT NÀO', 'https://i.ytimg.com/vi/7Up7eIxngmw/hqdefault.jpg', 'PT2M57S', 'Là một trong những yếu tố quan trọng thi đấu và tập luyện, thể lực luôn là yếu tố được chú trọng và nâng cao rèn luyện. Cùng xem một buổi tập thể lực diễn ra vào buổi cuối tuần tại Karate League Dojo sẽ thú vị như thế nào nhé!', 35, 1, 0, 0, '2020-01-13 09:33:10', '2020-06-29 09:25:55', NULL),
(31, 'x5RN7Pv22Q8', 'Start at  Karate League Dojo   K L D', NULL, NULL, '[\"kld\"]', 'PUBLISHED', 'start-at-karate-league-dojo-k-l-d', 0, NULL, 'Start at  Karate League Dojo   K L D', 'https://i.ytimg.com/vi/x5RN7Pv22Q8/hqdefault.jpg', 'PT25S', '', 42, 2, 0, 0, '2020-01-13 09:34:02', '2020-05-15 10:17:50', NULL),
(32, 'X6G60mTDMjo', 'Hean Shodan - Bùi Tuấn Phúc(7 tuổi)', NULL, NULL, '[\"kata\",\"hean\",\"tập luyện\"]', 'PUBLISHED', 'hean-shodan-bui-tuan-phuc-7-tuoi', 0, NULL, 'Hean Shodan - Bùi Tuấn Phúc(7 tuổi)', 'https://i.ytimg.com/vi/X6G60mTDMjo/hqdefault.jpg', 'PT1M3S', '', 19, 2, 0, 0, '2020-01-13 09:34:26', '2020-05-07 10:39:39', NULL),
(33, 'TfywaJp2ODI', 'Kata cá nhân nam dưới 11 tuổi - Bán kết || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'kata-ca-nhan-nam-duoi-11-tuoi-ban-ket-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kata cá nhân nam dưới 11 tuổi - Bán kết || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/TfywaJp2ODI/hqdefault.jpg', 'PT1M26S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata cá nhân nam dưới 11 tuổi - Bán kết - AO (đai xanh)\nVĐV: Bùi Tuấn Phúc\nBài quyền: Hean shandan', 12, 0, 0, 0, '2020-01-13 09:35:28', '2020-01-18 17:00:23', NULL),
(34, '3bDpLOpV7tI', 'Kata cá nhân nam dưới 11 tuổi - Trận 2 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"Vô địch Karate\",\"thi đấu\"]', 'PUBLISHED', 'kata-ca-nhan-nam-duoi-11-tuoi-tran-2-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kata cá nhân nam dưới 11 tuổi - Trận 2 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/3bDpLOpV7tI/hqdefault.jpg', 'PT1M4S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata cá nhân nam dưới 11 tuổi - Trận 2 - AK (đai đỏ)\nVĐV: Bùi Tuấn Phúc\nBài quyền: Heian yondan', 5, 0, 0, 0, '2020-01-13 09:35:52', '2020-01-18 17:00:23', NULL),
(35, 'yh6geXaEeA8', 'Kata cá nhân nam dưới 11 tuổi - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', NULL, NULL, '[\"ĐH Công đoàn\",\"vô địch karate\",\"thi đấu\",\"kata\"]', 'PUBLISHED', 'kata-ca-nhan-nam-duoi-11-tuoi-tran-1-giai-vo-dich-karate-dai-hoc-cong-doan-mo-rong-lan-thu-2', 0, 1, 'Kata cá nhân nam dưới 11 tuổi - Trận 1 || Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2', 'https://i.ytimg.com/vi/yh6geXaEeA8/hqdefault.jpg', 'PT1M33S', 'Giải Vô địch Karate Đại học Công đoàn mở rộng lần thứ 2\n=================\nNội dung Kata cá nhân nam dưới 11 tuổi - Trận 1 - AK (đai đỏ)\nVĐV: Bùi Tuấn Phúc\nBài quyền: Heian shandan', 9, 0, 0, 0, '2020-01-13 09:36:16', '2020-05-15 10:17:52', NULL),
(37, 'Y_FfPgHTzBU', 'Hướng dẫn học 7 bài quyền cơ bản karate do', NULL, 'kata, 7 bài quyền cơ bản karate', '[\"kata\",\"tập luyện\"]', 'PUBLISHED', 'huong-dan-hoc-7-bai-quyen-co-ban-karate-do', 0, NULL, 'hướng dẫn học 7 bài quyền cơ bản karate do', 'https://i.ytimg.com/vi/Y_FfPgHTzBU/hqdefault.jpg', 'PT5M14S', 'môn võ karate là môn võ có rất nhiều hệ phái hệ phái này là hệ phái thứ 3 trong karatedo', 867943, 5161, 605, 450, '2020-06-19 05:26:31', '2020-06-29 09:25:56', NULL),
(38, 'nE30BG71XkI', 'TÌNH YÊU KHỦNG LONG - FAY | LYRICS VIDEO', NULL, NULL, '[\"test\"]', 'PUBLISHED', 'tinh-yeu-khung-long-fay-lyrics-video', 1, NULL, 'TÌNH YÊU KHỦNG LONG - FAY | LYRICS VIDEO', 'https://i.ytimg.com/vi/nE30BG71XkI/hqdefault.jpg', 'PT3M45S', 'Song: Tình Yêu Khủng Long | Lyrics Video\n\nComposer & Singer: FAY\nLink MV: https://youtu.be/4Of38ZUnV7Q\n\nLyrics\n---------------\n1 2 3 mộng tình yêu tan ra\nEm ngồi đếm nổi đau bên cạch ly soda\nAnh buồn không? Em rất buồn\nNhưng tại sao? Em chẳng thể hiểu\n\nAnh đợi chi, anh đợi anh ? Thế anh\nNhìn xa xăm, bên hiên nhà anh đang vô tư cười với ai ?\nÔii tình yêu đơn phương thật rất mỏi mệt\nThế nên là ...\nEm có nên nói ra những lời ...\n\n[ĐK:]\nSâu thẳm trong trái tim em\nMột tình yêu siêu khủng long\nAnh nói anh thích giản đơn\nVậy em cũng sẽ giản đơn\n\nMiễn là anh yêu em\nMiễn là anh bên em\nĐơn giản và rất giản đơn\nTình yêu em như ly trà sữa trân trâu\n\nÍt trân trâu , nhưng siêu to tình iu của em\nDốt toán nhưng em biết tính anh\nNhút nhát nhưng cũng biết nói yêu\nVậy nên yêu em nhé anhhh\n\nKỳ ghê ta ? Ôi sao lần nào cũng thế\nKhông gặp anh một hôm thôi tưởng như cả năm\nLà anh không thấy hay anh không hiểu ra vấn đề\nAnh ngốc nghếch anh vô tâm với em\n\nNhìn xa xăm , bên hiên nhà anh đang vô tư cười với ai?\nÔii tình yêu đơn phương thật rất mỏi mệt\nThế nên là ...\nEm có nên nói ra những lời ...\n\n[ĐK:]\nSâu thẳm trong trái tim em\nMột tình yêu siêu khủng long\nAnh nói anh thích giản đơn\nVậy em cũng sẽ giản đơn\n\nMiễn là anh yêu em\nMiễn là anh bên em\nĐơn giản và rất giản đơn\n...', 639408, 11632, 123, 143, '2020-06-29 09:13:32', '2020-06-29 09:25:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `viewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewable_id` bigint(20) UNSIGNED NOT NULL,
  `visitor` text COLLATE utf8mb4_unicode_ci,
  `collection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `views`
--

INSERT INTO `views` (`id`, `viewable_type`, `viewable_id`, `visitor`, `collection`, `viewed_at`) VALUES
(1, 'App\\Models\\Document', 1, 'hhWTazXqjBn7nLhxT8CDswXMVrJCr5LZ1v75pwHNQiUOf7wZPE8FRugO7VgA8prrfs3HYqyNIAmfhn3J', NULL, '2020-05-31 18:22:55'),
(2, 'App\\Models\\Post', 3, 'BMFXHSsDB0tixjXwl7MzTc3WXZPZnjCgV7RYnG6ouV3FJvMUpJ2DfUjSwgW489RD0mEoyIdcaaEiKCwN', NULL, '2020-05-31 18:29:05'),
(3, 'App\\Models\\Post', 3, 'BMFXHSsDB0tixjXwl7MzTc3WXZPZnjCgV7RYnG6ouV3FJvMUpJ2DfUjSwgW489RD0mEoyIdcaaEiKCwN', NULL, '2020-05-31 18:45:15'),
(4, 'App\\Models\\Post', 3, 'BMFXHSsDB0tixjXwl7MzTc3WXZPZnjCgV7RYnG6ouV3FJvMUpJ2DfUjSwgW489RD0mEoyIdcaaEiKCwN', NULL, '2020-05-31 21:25:14'),
(5, 'App\\Models\\Post', 1, 'BMFXHSsDB0tixjXwl7MzTc3WXZPZnjCgV7RYnG6ouV3FJvMUpJ2DfUjSwgW489RD0mEoyIdcaaEiKCwN', NULL, '2020-05-31 21:26:34'),
(6, 'App\\Models\\Post', 2, 'BMFXHSsDB0tixjXwl7MzTc3WXZPZnjCgV7RYnG6ouV3FJvMUpJ2DfUjSwgW489RD0mEoyIdcaaEiKCwN', NULL, '2020-05-31 21:27:29'),
(7, 'App\\Models\\Post', 2, 'hhWTazXqjBn7nLhxT8CDswXMVrJCr5LZ1v75pwHNQiUOf7wZPE8FRugO7VgA8prrfs3HYqyNIAmfhn3J', NULL, '2020-06-01 00:53:57'),
(8, 'App\\Models\\Post', 3, 'hhWTazXqjBn7nLhxT8CDswXMVrJCr5LZ1v75pwHNQiUOf7wZPE8FRugO7VgA8prrfs3HYqyNIAmfhn3J', NULL, '2020-06-01 01:53:46'),
(9, 'App\\Models\\Post', 3, 'YVC0VFDM0DUVlyRC8nPRaVrXlM5n6FMqLx0FMmJydXzEcQ2fSaZ8dFwjHxdHBXikujDLEIqZT080LBQK', NULL, '2020-06-14 21:21:23'),
(10, 'App\\Models\\Document', 1, 'Z3OseAYuQucOFOXr09bjlMIRbQUfkNLCYy6TJfbhfocau3KY2bVjh7yXXZvaQFYtFzzhBIl4B2GV4vcO', NULL, '2020-06-15 13:53:20'),
(11, 'App\\Models\\Post', 3, 'Z3OseAYuQucOFOXr09bjlMIRbQUfkNLCYy6TJfbhfocau3KY2bVjh7yXXZvaQFYtFzzhBIl4B2GV4vcO', NULL, '2020-06-15 13:55:45'),
(12, 'App\\Models\\Document', 1, 'Z3OseAYuQucOFOXr09bjlMIRbQUfkNLCYy6TJfbhfocau3KY2bVjh7yXXZvaQFYtFzzhBIl4B2GV4vcO', NULL, '2020-06-17 10:23:32'),
(13, 'App\\Models\\Document', 1, 'gvNOuUNl7BncWLXnxeHXk4TM4rLUlbWWPCYJjtAlFgfVtTKMdJA5LfabVMt5EIsKrVekER6GSeHqIGsn', NULL, '2020-06-17 13:16:45'),
(14, 'App\\Models\\Post', 2, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-29 08:40:06'),
(15, 'App\\Models\\Post', 4, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-29 08:47:26'),
(16, 'App\\Models\\Post', 1, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-29 08:50:55'),
(17, 'App\\Models\\Post', 2, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-29 09:00:06'),
(18, 'App\\Models\\Document', 1, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-29 09:02:10'),
(19, 'App\\Models\\Document', 2, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-29 09:07:26'),
(20, 'App\\Models\\Post', 4, 'Y5E3XGqhtSJ7SZlUDqod0AvoMXyPKVMmO34GB1LD0Y5vk1GEi2PeBnT4S15Sx8MVTtE9baVnGPXIuLbd', NULL, '2020-06-30 02:24:31'),
(21, 'App\\Models\\Post', 2, 'Y5E3XGqhtSJ7SZlUDqod0AvoMXyPKVMmO34GB1LD0Y5vk1GEi2PeBnT4S15Sx8MVTtE9baVnGPXIuLbd', NULL, '2020-06-30 02:38:02'),
(22, 'App\\Models\\Post', 2, 'HWGg0skqvxB7EffCg9PtodKFuRAa0QFGVAXtBV3kKAkvgt1z2vVfg4R6fVtWDWIljDs3pbVgNuEXR6LU', NULL, '2020-06-30 02:38:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'vouchers/default.png',
  `percent` int(11) NOT NULL,
  `max_price` int(11) DEFAULT NULL,
  `month_limit` int(11) NOT NULL DEFAULT '0',
  `expiry_date` date NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `used` int(11) NOT NULL DEFAULT '0',
  `type` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SỰ KIỆN',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `image`, `percent`, `max_price`, `month_limit`, `expiry_date`, `amount`, `used`, `type`, `note`, `created_at`, `updated_at`) VALUES
(1, 'SINHNHAT2', 'vouchers\\April2020\\nb1qM53YQTqt4vdTiKit.png', 10, 50000, 1, '2020-03-30', 10, 1, 'SỰ KIỆN', 'Mừng sinh nhật 2 tuổi cơ sở Học viện Nông Nghiệp, giảm 10% tối đa 50.000VNĐ', '2020-04-15 10:50:20', '2020-04-15 10:50:20'),
(2, 'TRUNGTHU2020', 'vouchers/default.png', 10, 20000, 3, '2020-09-20', 12, 1, 'SỰ KIỆN', 'Mừng trung thu 2020, giảm 10% tối đa 20.000VNĐ', '2020-06-14 21:56:29', '2020-06-29 10:02:23'),
(3, 'SINHNHAT3', 'vouchers\\April2020\\p6QWBxErdCK74Ng9rZnD.png', 10, 50000, 1, '2021-01-28', 20, 1, 'THAM GIA', 'Mừng sinh nhật 3 tuổi cơ sở Karate League Dojo, giảm 10% tối đa 50.000VNĐ', '2020-05-14 07:45:19', '2020-05-14 07:45:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `workout_registrations`
--

CREATE TABLE `workout_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dojo_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeland` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hà Nội',
  `work_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `link_fb` text COLLATE utf8mb4_unicode_ci,
  `confirmed` enum('WAIT','CONFIRMED','REJECTED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WAIT',
  `reason_reject` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `workout_registrations`
--

INSERT INTO `workout_registrations` (`id`, `dojo_id`, `name`, `phone`, `cmnd`, `birthday`, `address`, `homeland`, `work_unit`, `type`, `weight`, `height`, `sex`, `link_fb`, `confirmed`, `reason_reject`, `created_at`, `updated_at`) VALUES
(12, 2, 'Nguyễn Thành Đạt', '0379689263', '013678344', '2000-12-06', '62 ngõ Ngô Sỹ Liên,Văn Miếu,Đống Đa,Hà Nội', 'Hà Nội', 'Học Viện Nông Nghiệp Việt Nam', '2', 83, 175, 0, 'https://www.facebook.com/thdat612', 'CONFIRMED', NULL, '2020-06-16 12:06:31', '2020-06-16 12:08:05'),
(13, 2, 'Lê Thị Diệu Lâm', '0368354911', '187696831', '1998-01-11', 'Trâu Quỳ-Gia Lâm-Hà Nội', 'Nghệ An', 'Học viện Nông Nghiệp Việt Nam', '2', 48, 153, 1, 'https://m.facebook.com/#!/lamsuj.sui?ref=bookmarks', 'CONFIRMED', NULL, '2020-06-16 12:11:41', '2020-06-16 12:12:42'),
(14, 2, 'Phạm Nguyên Hương', '0889069768', '073533130', '2001-03-16', 'Học viện Nông Nghiệp Việt Nam, Trâu Quỳ , Gia Lâm', 'Hà Giang', 'Sinh viên', '2', 48, 163, 1, 'https://m.facebook.com/phamnguyenhuong.163?ref=bookmarks', 'CONFIRMED', NULL, '2020-06-16 13:04:37', '2020-06-16 13:10:51'),
(15, 2, 'Nguyễn Thị Phương Anh', '0386968142', '030300003605', '2000-10-28', 'Trâu Quỳ, Gia Lâm, Hà Nội', 'Hà Nội', 'Học viện nông nghiệp Việt Nam', '2', 45, 155, 1, 'https://www.facebook.com/profile.php?id=100012416162851', 'CONFIRMED', NULL, '2020-06-16 12:08:50', '2020-06-16 12:09:54'),
(16, 2, 'Trịnh Thị Quỳnh', '0363353582', '038300003536', '2000-07-15', 'trâu quỳ gia lâm hà nội', 'Thanh Hóa', 'Học viên Nông nghiệp Việt Nam', '2', 43, 150, 1, 'https://www.facebook.com/profile.php?id=100049869795644', 'CONFIRMED', NULL, '2020-06-16 13:01:01', '2020-06-16 13:02:38'),
(18, 2, 'Nguyễn Thị Sen', '0975540604', '152251390', '1999-11-06', 'Số 77 ngõ 62 Trâu Quỳ, Gia Lâm, Hà Nội', 'Thái Bình', 'Học viện Nông nghiệp Việt Nam', '2', 43, 150, 1, 'https://www.facebook.com/sen.thi.376695', 'CONFIRMED', NULL, NULL, '2020-06-18 14:24:36'),
(19, 2, 'Phạm Thị Diệu Thanh', '0398280164', '001301002761', '2001-02-10', 'Gia Lâm', 'Hà Nội', NULL, '2', 52, 158, 1, 'https://www.facebook.com/baotran.phamnguyen.14', 'CONFIRMED', NULL, '2020-06-16 13:08:30', '2020-06-16 13:11:11'),
(20, 2, 'Nguyễn Phương Tuấn', '0355205003', '035200000236', '2020-10-14', 'Kim Bảng, Hà Nam', 'Hà Nam', 'Học Viện nông Nghiệp Việt Nam', '2', 70, 170, 0, 'https://www.facebook.com/lepham.phuongtuan.3', 'CONFIRMED', NULL, '2020-06-16 13:15:41', '2020-06-16 14:07:02'),
(22, 2, 'Huyền', '0328160600', '001300009070', '2020-06-06', 'Gia Lâm', 'Hà Nội', 'Học Viện Nông Nghiệp Việt Nam', '2', 50, 156, 1, 'https://www.facebook.com/dang.thu.huyen06', 'CONFIRMED', NULL, '2020-06-16 14:05:09', '2020-06-16 14:06:32'),
(27, 2, 'Lều Hoàng Sơn', '0522680659', '152221707', '1998-07-27', 'Vũ Công - Kiến Xương - Thái Nìn', 'Thái Bình', 'Học viện Nông nghiệp Việt Nam', '2', 48, 166, 0, 'Lều Sơn', 'CONFIRMED', NULL, '2020-06-17 08:22:58', '2020-06-17 09:04:39'),
(28, 2, 'Trần Việt Hà', '0889419698', '038301012839', '2001-08-24', 'Số 111, cửu việt 1, gia lâm , hà nội', 'Thanh Hóa', 'Học viện nông nghiệp việt nam', '2', 54, 160, 1, 'https://www.facebook.com/Ha.Tran.24081999', 'CONFIRMED', NULL, '2020-06-17 07:51:26', '2020-06-17 09:03:35'),
(30, 2, 'Nguyễn Kim Phượng', '0365663010', '122327761', '2000-10-30', 'Học viện Nông nghiệp- Gia Lâm- Hà Nội', 'Bắc Giang', 'Học viện Nông nghiệp Việt Nam', '2', 40, 150, 1, 'https://www.facebook.com/profile.php?id=100034515364555', 'CONFIRMED', NULL, '2020-06-17 15:13:46', '2020-06-17 18:54:03'),
(33, 3, 'Nguyễn Văn A', '0375933684', '030000055', '1995-01-02', 'số 21c, ngõ 77 Bùi Xương Trạch, Thanh Xuân, Hà Nội', 'Hà Nội', 'UBND quận Long Biên', '3', 56, 162, 0, 'https://www.facebook.com/uoc.nguyenvan.5891', 'CONFIRMED', NULL, '2020-06-29 09:29:59', '2020-06-29 09:31:37');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achievements_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`student_id`,`event_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `attends_event_id_foreign` (`event_id`);

--
-- Chỉ mục cho bảng `bonus_defaults`
--
ALTER TABLE `bonus_defaults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonus_defaults_dojo_id_foreign` (`dojo_id`),
  ADD KEY `bonus_defaults_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `book_rooms`
--
ALTER TABLE `book_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_rooms_room_id_foreign` (`room_id`),
  ADD KEY `book_rooms_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commenter_id_commenter_type_index` (`commenter_id`,`commenter_type`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_child_id_foreign` (`child_id`);

--
-- Chỉ mục cho bảng `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Chỉ mục cho bảng `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `dojos`
--
ALTER TABLE `dojos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `dojo_voucher`
--
ALTER TABLE `dojo_voucher`
  ADD KEY `dojo_voucher_dojo_id_index` (`dojo_id`),
  ADD KEY `dojo_voucher_voucher_id_index` (`voucher_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Chỉ mục cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `operation_logs`
--
ALTER TABLE `operation_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operation_logs_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Chỉ mục cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `playlists_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_dojo_id_foreign` (`dojo_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_dojo_id_foreign` (`dojo_id`);

--
-- Chỉ mục cho bảng `student_voucher`
--
ALTER TABLE `student_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_voucher_student_id_index` (`student_id`),
  ADD KEY `student_voucher_voucher_id_index` (`voucher_id`);

--
-- Chỉ mục cho bảng `test_scores`
--
ALTER TABLE `test_scores`
  ADD PRIMARY KEY (`test_day`,`student_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `test_scores_student_id_foreign` (`student_id`),
  ADD KEY `id_2` (`id`);

--
-- Chỉ mục cho bảng `transfer_dojos`
--
ALTER TABLE `transfer_dojos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_dojos_student_id_foreign` (`student_id`),
  ADD KEY `transfer_dojos_current_dojo_id_foreign` (`current_dojo_id`),
  ADD KEY `transfer_dojos_new_dojo_id_foreign` (`new_dojo_id`);

--
-- Chỉ mục cho bảng `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Chỉ mục cho bảng `tuitions`
--
ALTER TABLE `tuitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuitions_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `tuition_policies`
--
ALTER TABLE `tuition_policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuition_policies_dojo_id_foreign` (`dojo_id`);

--
-- Chỉ mục cho bảng `uptimes`
--
ALTER TABLE `uptimes`
  ADD PRIMARY KEY (`room_id`,`weekdays`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `videos_playlist_id_foreign` (`playlist_id`);

--
-- Chỉ mục cho bảng `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_viewable_type_viewable_id_index` (`viewable_type`,`viewable_id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `workout_registrations`
--
ALTER TABLE `workout_registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `attends`
--
ALTER TABLE `attends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bonus_defaults`
--
ALTER TABLE `bonus_defaults`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `book_rooms`
--
ALTER TABLE `book_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT cho bảng `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dojos`
--
ALTER TABLE `dojos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `operation_logs`
--
ALTER TABLE `operation_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20200021;

--
-- AUTO_INCREMENT cho bảng `student_voucher`
--
ALTER TABLE `student_voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `test_scores`
--
ALTER TABLE `test_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `transfer_dojos`
--
ALTER TABLE `transfer_dojos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT cho bảng `tuitions`
--
ALTER TABLE `tuitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tuition_policies`
--
ALTER TABLE `tuition_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `uptimes`
--
ALTER TABLE `uptimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `workout_registrations`
--
ALTER TABLE `workout_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `attends_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attends_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `bonus_defaults`
--
ALTER TABLE `bonus_defaults`
  ADD CONSTRAINT `bonus_defaults_dojo_id_foreign` FOREIGN KEY (`dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bonus_defaults_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `book_rooms`
--
ALTER TABLE `book_rooms`
  ADD CONSTRAINT `book_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_rooms_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dojo_voucher`
--
ALTER TABLE `dojo_voucher`
  ADD CONSTRAINT `dojo_voucher_dojo_id_foreign` FOREIGN KEY (`dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dojo_voucher_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_dojo_id_foreign` FOREIGN KEY (`dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_dojo_id_foreign` FOREIGN KEY (`dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `student_voucher`
--
ALTER TABLE `student_voucher`
  ADD CONSTRAINT `student_voucher_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_voucher_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `test_scores`
--
ALTER TABLE `test_scores`
  ADD CONSTRAINT `test_scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transfer_dojos`
--
ALTER TABLE `transfer_dojos`
  ADD CONSTRAINT `transfer_dojos_current_dojo_id_foreign` FOREIGN KEY (`current_dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfer_dojos_new_dojo_id_foreign` FOREIGN KEY (`new_dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfer_dojos_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tuitions`
--
ALTER TABLE `tuitions`
  ADD CONSTRAINT `tuitions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `tuition_policies`
--
ALTER TABLE `tuition_policies`
  ADD CONSTRAINT `tuition_policies_dojo_id_foreign` FOREIGN KEY (`dojo_id`) REFERENCES `dojos` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `uptimes`
--
ALTER TABLE `uptimes`
  ADD CONSTRAINT `uptimes_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
