-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 18, 2020 lúc 10:46 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `organicfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prioty` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `link`, `position`, `description`, `sub_description`, `deleted_at`, `status`, `created_at`, `updated_at`, `prioty`) VALUES
(1, 'Giảm giá rau củ', 'http://localhost/organicfood/uploads/banners/lothar-bodingbauer-VlEBIWMfZ-w-unsplash.jpg', 's', 0, 'Rau củ quả đang rất hot', 'Mua ngay nào !', '2020-08-16 22:38:27', 1, '2020-08-16 15:04:10', '2020-08-16 15:38:27', 0),
(2, 'lee', 'http://localhost/organicfood/uploads/banners/the-matter-of-food-EjqNZ34x_qY-unsplash.jpg', 'dsadd', 0, 'dfjdlkadjl;ajddas', 'Mua ngay nào !', '2020-08-16 22:06:49', 1, '2020-08-16 15:05:56', '2020-08-16 15:06:49', 0),
(3, 'Áo thun', 'http://localhost/organicfood/uploads/banners/the-matter-of-food-EjqNZ34x_qY-unsplash.jpg', 'dsadd', 0, 'dsadasds', 'Mua ngay nào !', '2020-08-16 22:38:24', 1, '2020-08-16 15:07:00', '2020-08-16 15:38:24', 0),
(4, 'lee', 'banners/mike-dorner-sf_1ZDA1YFw-unsplash.jpg', 'dsadd', 0, 'Một quả mỗi sáng', 'Fighting !', NULL, 1, '2020-08-16 15:14:06', '2020-08-16 15:40:06', 0),
(5, 'banner', 'banners/inigo-de-la-maza-s285sDw5Ikc-unsplash.jpg', 'das', 0, 'Thực phẩm sạch tốt cho sức khỏe', NULL, NULL, 1, '2020-08-16 15:39:31', '2020-08-16 15:39:31', 0),
(6, 'banner', 'banners/donna-elliot-XLnWSO6hzwg-unsplash.jpg', 'dsd', 0, 'Bài viết mới nhất', NULL, NULL, 1, '2020-08-16 15:40:45', '2020-08-16 15:49:52', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_descript` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `image`, `summary`, `content`, `status`, `meta_key`, `meta_descript`, `meta_title`, `created_at`, `updated_at`) VALUES
(1, 'THỰC PHẨM SẠCH LÀ GÌ', 'thuc-pham-sach-la-gi', '1597610237-do-xanh.jpg', 'dsaasasdas', '<span>THỰC PHẨM SẠCH LÀ GÌ Đăng bởi: marketingNgày tạo: 30 Nov0 Bình luận Chúng ta luôn tự đặt câu hỏi thực phẩm sạch là gì, luôn có nhu cầu về thực phẩm sạch. Tuy nhiên không phải ai cũng hiểu hết về đặc điểm và tính chất của loại thực phẩm này. Theo nhiều nghiên cứu và khảo sát của chuyên gia trong lĩnh vực y tế cho thấy thực phẩm sạch đóng vai trò quan trọng trong cuộc sống của con người. Sự an toàn của thực phẩm giúp cơ thể luôn khoẻ mạnh và có một sức khoẻ được đảm bảo. Bạn sẽ luôn cảm thấy yên tâm khi được sử dụng nguồn thực phẩm sạch cho mỗi bữa ăn của mình. Trái lại với thực phẩm sạch là thực phẩm bẩn, một trong những nguyên nhân của bệnh tật và ốm đau, khiến nhiều người tiêu dùng cảm thấy hoang mang khi sử dụng loại thực phẩm này. Ưu điểm của thực phẩm sạch là gì Thực phẩm sạch là loại thực phẩm được gieo trồng bởi kĩ thuật nông nghiệp an toàn, nói không với hoá chất độc hại, không sử dụng kích thích tăng trưởng để nâng cao sản lượng hay lợi nhuận. Bằng công nghệ hiện đại cũng như sự tỉ mỉ mà các nông dân tại các nông trường có thể mang lại cho người tiêu dùng nói chung nguồn thực phẩm sạch an toàn và chất lượng. Vậy ưu điểm của thực phẩm sạch là gì Thực phẩm sạch có chức năng cung cấp đầy đủ các dưỡng chất cần thiết mà con người có nhu cầu được đáp ứng. Bên cạnh đó còn là sự an toàn cho hệ tiêu hoá của con người, hệ sinh thái của môi trường. Với những ưu điểm nổi bật đó cũng đủ để chứng minh được ưu điểm cũng như sự an toàn khi sử dụng loại thực phẩm này. Chúng tôi chuyên mang đến cho khách hàng của mình nguồn thực phẩm uy tín, chất lượng của thực phẩm sạch, thực phẩm hữu cơ để bạn có thể lựa chọn cho mình những điều tốt nhất cho gia đình mình. Nhược điểm không đáng kể của thực phẩm sạch là gì Thực phẩm sạch thường được bán ở các cửa hàng hay siêu thị riêng nên mức giá của nó khá đắt so với những loại thực phẩm được bày bán ở chợ, tuy nhiên chất lượng thì hơn hẳn. Cũng vì mức giá cao mà nhiều người không có khả năng chi trả cho việc sử dụng thực phẩm sạch hay thường xuyên.</span><br><br><span>Link nguồn : </span><a href=\"https://organicfood.vn/Thuc-pham-sach-la-gi.html\">https://organicfood.vn/Thuc-pham-sach-la-gi.html</a>', 0, NULL, NULL, NULL, '2020-08-16 20:37:17', '2020-08-18 07:29:53'),
(2, 'Trái cây giảm cân', 'trai-cay-giam-can', 'blogs/0-trai-cay-giam-can.png', 'Trái cây giảm cân – lựa chọn thông minh và an toàn cho sức khỏe', '<h2><em>Ăn trái cây giảm cân<span> </span></em>thì nên lựa chọn những trái gì?</h2>\r\n<ol>\r\n<li><strong>Nước dừa</strong></li>\r\n</ol>\r\n<p>Nước dừa được biết đến là một loại nước ngọt từ thiên nhiên và có chất béo. Nước dừa chứa lượng kaki, magie và những chất không béo tốt cho sức khỏe, không tích mỡ. Nước dừa bổ sung dinh dưỡng nhưng tạo cảm giác nhanh no, giảm sự thèm ăn.</p>\r\n<p><img class=\"alignnone size-medium wp-image-4374\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/1-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-601x400.jpg\" alt=\"\" width=\"601\" height=\"400\" srcset=\"https://fruitstt.vn/wp-content/uploads/2020/04/1-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-601x400.jpg 601w, https://fruitstt.vn/wp-content/uploads/2020/04/1-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg 640w\" sizes=\"(max-width: 601px) 100vw, 601px\"></p>\r\n<p>Vào mỗi buổi sáng, bạn có thể uống một ly nước dừa và thưởng thức đĩa salad hoa quả. Bữa trưa, thì uống khoảng 1-1,5 ly nước dừa nguyên chất và thưởng thức thêm những loại trái cây giảm cân khác để đạt hiệu quả tốt nhất.</p>\r\n<ol start=\"2\">\r\n<li><strong>Trái cam</strong></li>\r\n</ol>\r\n<p><img class=\"alignnone size-medium wp-image-4375\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/2-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-400x400.jpg\" alt=\"\" width=\"400\" height=\"400\" srcset=\"https://fruitstt.vn/wp-content/uploads/2020/04/2-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-400x400.jpg 400w, https://fruitstt.vn/wp-content/uploads/2020/04/2-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-280x280.jpg 280w, https://fruitstt.vn/wp-content/uploads/2020/04/2-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-600x600.jpg 600w, https://fruitstt.vn/wp-content/uploads/2020/04/2-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-100x100.jpg 100w, https://fruitstt.vn/wp-content/uploads/2020/04/2-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg 640w\" sizes=\"(max-width: 400px) 100vw, 400px\"></p>\r\n<p>Vitamin C trong cam hỗ trợ làm tăng thể lực, điều hòa và loại lượng mỡ thừa tích tụ trong cơ thể. Mỗi ngày<span> </span><strong><em>ăn trái cây giảm cân đẹp da</em><span> </span></strong>với một cam sẽ tốt cho đường ruột, hệ tiêu hóa, giảm tích lũy độc tố rất tốt. Uống nước cam mỗi ngày cũng là cách bổ sung dinh dưỡng và hạn chế mỡ thừa hiệu quả. Khi pha cam thì đừng thêm gia vị khác để đạt hiệu quả tốt nhất.</p>\r\n<ol start=\"3\">\r\n<li><strong>Dưa hấu</strong></li>\r\n</ol>\r\n<p><img class=\"alignnone size-full wp-image-4376\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/3-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg\" alt=\"\" width=\"640\" height=\"394\"></p>\r\n<p>Dưa hấu là loại quả chứa lượng nước cao và dồi dào vitamin A, vitamin C, sắt, photpho, canxi, magie, nhiều loại axit amin. Dưa hấu dễ ăn, ngọt, thanh mát, nhanh no, hỗ trợ giảm béo tốt.<span> </span><em>Trái cây giảm cân</em><span> </span>với dưa hấu tươi hoặc uống 1 ly nước ép dưa hấu trước khoảng 15 phút khi ăn để có những hiệu quả tốt hơn cho quá trình giảm cân của mình nhé.</p>\r\n<ol start=\"4\">\r\n<li><strong>Trái bưởi</strong></li>\r\n</ol>\r\n<p><img class=\"alignnone size-medium wp-image-4377\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/4-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-400x400.jpg\" alt=\"\" width=\"400\" height=\"400\" srcset=\"https://fruitstt.vn/wp-content/uploads/2020/04/4-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-400x400.jpg 400w, https://fruitstt.vn/wp-content/uploads/2020/04/4-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-280x280.jpg 280w, https://fruitstt.vn/wp-content/uploads/2020/04/4-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-600x600.jpg 600w, https://fruitstt.vn/wp-content/uploads/2020/04/4-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-100x100.jpg 100w, https://fruitstt.vn/wp-content/uploads/2020/04/4-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg 640w\" sizes=\"(max-width: 400px) 100vw, 400px\"></p>\r\n<p>Bười mọng nước nên sẽ tăng cảm giác no hơn. Các enzyme có trong bưởi sẽ hỗ trợ đốt cháy chất béo hiệu quả nhưng cực kỳ an toàn. Lượng Vitamin C, chất xơ, protein giúp đốt cháy chất béo, làm giảm cân một cách nhanh chóng. Sau mỗi bữa ăn khoảng tầm 15 phút, hãy thưởng thức vài tép bưởi tráng miệng nhé.</p>\r\n<ol start=\"5\">\r\n<li><strong>Trái bơ</strong></li>\r\n</ol>\r\n<p>Bơ có vị béo ngậy khi thưởng thức nhưng theo nhiều nghiên cứu thì bản thân quả bơ lại giúp giảm cân khá hiệu quả. Bơ có chứa lượng chất béo tự nhiên tốt cho sức khỏe, hỗ trợ giảm cholesterol trong máu, không tăng cân.</p>\r\n<p><img class=\"alignnone size-full wp-image-4378\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/5-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg\" alt=\"\" width=\"640\" height=\"359\"></p>\r\n<p>Tuy nhiên, bạn không nên<span> </span><em>ăn trái cây giảm cân</em><span> </span>bằng cách ăn chung bơ với đường hay sữa sẽ gây tác dụng ngược. Mỗi ngày dùng 1 trái bơ nguyên chất sẽ không tăng cân và giúp lọc lượng cholesterol ra khỏi máu.</p>\r\n<ol start=\"6\">\r\n<li><strong>Trái táo</strong></li>\r\n</ol>\r\n<p>Táo đỏ không chín quá, còn vị hơi chua sẽ giúp giảm cân hiệu quả nhất. Trong  táo chứa lượng chất xơ lớn góp phần thúc đẩy tiêu hóa tốt hơn. Ngoài ra, các loại vitamin A, C, E, canxi,… trong táo cung cấp dưỡng chất cho cơ thể khỏe mạnh.</p>\r\n<p><img class=\"alignnone size-medium wp-image-4379\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/6-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-601x400.jpg\" alt=\"\" width=\"601\" height=\"400\" srcset=\"https://fruitstt.vn/wp-content/uploads/2020/04/6-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe-601x400.jpg 601w, https://fruitstt.vn/wp-content/uploads/2020/04/6-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg 640w\" sizes=\"(max-width: 601px) 100vw, 601px\"></p>\r\n<p>Táo chỉ chứa 60-100 kcal và hoàn toàn không chứa chất béo, natri. Mỗi ngày ăn từ 2-3 trái táo. Thực hiện liên tục trong 3 tháng để đạt được hiệu quả mong muốn hơn.</p>\r\n<ol start=\"7\">\r\n<li><strong>Trái chuối</strong></li>\r\n</ol>\r\n<p><img class=\"alignnone size-full wp-image-4380\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/7-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg\" alt=\"\" width=\"640\" height=\"384\"></p>\r\n<p>Chuối là loại quả được phổ biến trong thực đơn<span> </span><em>ăn trái cây giảm cân đẹp da<span> </span></em>của nhiều người. Uống một ly nước ấm và ăn một trái chuối vào mỗi buổi sáng sẽ hỗ trợ giảm cân vô cùng hiệu quả. Chuối có thể cung cấp đủ năng lượng cho hoạt động của bạn vào buổi sáng và đánh bay mỡ thừa hiệu quả.</p>\r\n<ol start=\"8\">\r\n<li><strong>Trái chanh</strong></li>\r\n</ol>\r\n<p><img class=\"alignnone size-full wp-image-4381\" src=\"https://fruitstt.vn/wp-content/uploads/2020/04/8-trai-cay-giam-can-lua-chon-thong-minh-va-an-toan-cho-suc-khoe.jpg\" alt=\"\" width=\"640\" height=\"360\"></p>\r\n<p>Chanh được biết đến là loại trái cây có chứa nhiều axit hỗ trợ đốt cháy mỡ thừa hiệu quả, Chanh còn giúp cơ thể thải độc tố trong gan, hạn chế tích tụ mỡ thừa. Bạn có thể uống nước chanh pha loãng với xíu muối. Nếu có vấn đề về dạ dày thì bạn nên cân nhắc việc giảm cân bằng chanh.</p>', 1, 'Sức khỏe', 'Trái cây giảm cân – lựa chọn thông minh và an toàn cho sức khỏe', 'Trái cây giảm cân', '2020-08-18 07:26:01', '2020-08-18 07:26:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prioty` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `prioty`, `parent_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'lee', 'lee', NULL, NULL, NULL, NULL, NULL, 0, 1, '2020-08-18 12:18:19', '2020-08-16 09:09:07', '2020-08-18 05:18:19'),
(7, 'Rau củ quả', 'rau-cu-qua', 'categories/dana-devolk-N_0Wi_OrucE-unsplash.jpg', NULL, NULL, NULL, 2, 0, 1, NULL, '2020-08-16 10:24:46', '2020-08-18 07:11:00'),
(8, 'Trái cây', 'trai-cay', 'categories/elizabeth-explores-GLIxn88h28M-unsplash.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, '2020-08-16 10:30:42', '2020-08-18 04:49:52'),
(9, 'Thức uống', 'thuc-uong', 'categories/david-emrich-bZ0kAKTlk6s-unsplash.jpg', NULL, NULL, NULL, 1, 0, 1, NULL, '2020-08-16 10:31:13', '2020-08-18 04:50:08'),
(10, 'Ngũ cốc, đậu và hạt', 'ngu-coc-dau-va-hat', 'categories/amanda-belec-Bnfo-UWJgB8-unsplash.jpg', NULL, NULL, NULL, 2, 0, 1, NULL, '2020-08-16 10:33:04', '2020-08-16 10:33:04'),
(11, 'Gia vị', 'gia-vi', 'categories/sigmund-B2BR05q9acc-unsplash.jpg', NULL, NULL, NULL, 2, 0, 1, '2020-08-18 13:34:30', '2020-08-16 11:01:35', '2020-08-18 06:34:30'),
(12, 'Phi thực phẩm', 'phi-thuc-pham', 'categories/ecopanda-u4h6VuYYEB8-unsplash.jpg', NULL, NULL, NULL, 2, 0, 1, NULL, '2020-08-16 13:14:41', '2020-08-18 07:10:19'),
(13, 'Rau lá', 'rau-la', '', 'Rau lá', 'Rau lá', 'rau', NULL, 7, 1, NULL, '2020-08-18 05:21:09', '2020-08-18 05:21:09'),
(14, 'Rau hoa quả', 'rau-hoa-qua', '', 'Rau hoa quả', 'Rau hoa quả', 'Rau hoa quả', NULL, 7, 1, NULL, '2020-08-18 05:21:46', '2020-08-18 05:21:46'),
(15, 'Rau thân củ', 'rau-than-cu', '', 'Rau thân củ', 'Rau thân củ', 'Rau thân củ', NULL, 7, 1, NULL, '2020-08-18 05:22:11', '2020-08-18 05:22:11'),
(16, 'Đậu khô', 'dau-kho', '', 'Đậu khô', 'Đậu khô', 'Đậu khô', NULL, 10, 1, NULL, '2020-08-18 06:28:52', '2020-08-18 06:28:52'),
(17, 'Gạo, mỳ', 'gao-my', '', 'Gạo, mỳ', 'Gạo, mỳ', 'Gạo, mỳ', NULL, 10, 1, NULL, '2020-08-18 06:29:17', '2020-08-18 06:29:17'),
(18, 'ngũ cốc khác', 'ngu-coc-khac', '', 'ngũ cốc khác', 'ngũ cốc khác', 'ngũ cốc khác', NULL, 10, 1, NULL, '2020-08-18 06:29:44', '2020-08-18 06:29:44'),
(19, 'Nước ép hoa quả', 'nuoc-ep-hoa-qua', '', 'Nước ép hoa quả', 'Nước ép hoa quả', 'Nước ép', NULL, 9, 1, NULL, '2020-08-18 06:30:33', '2020-08-18 06:30:33'),
(20, 'Thức uống dinh dưỡng', 'thuc-uong-dinh-duong', '', 'Thức uống dinh dưỡng', 'Thức uống dinh dưỡng', 'Thức uống', NULL, 9, 1, NULL, '2020-08-18 06:30:57', '2020-08-18 06:30:57'),
(21, 'Trái cây việt nam', 'trai-cay-viet-nam', '', 'Trái cây việt nam', 'Trái cây việt nam', 'Trái cây', NULL, 8, 1, NULL, '2020-08-18 06:31:32', '2020-08-18 06:31:32'),
(22, 'Trái cây ngoại nhập', 'trai-cay-ngoai-nhap', '', 'Trái cây ngoại nhập', 'Trái cây ngoại nhập', 'Trái cây', NULL, 8, 1, NULL, '2020-08-18 06:31:56', '2020-08-18 06:31:56'),
(23, 'Trái cây khô', 'trai-cay-kho', '', 'Trái cây khô', 'Trái cây khô', 'Trái cây', NULL, 8, 1, NULL, '2020-08-18 06:32:16', '2020-08-18 06:32:16'),
(24, 'Sản phẩm từ sữa', 'san-pham-tu-sua', 'categories/Sua-chua-bo.jpg', NULL, 'Sản phẩm từ sữa', 'sữa', 2, 0, 1, NULL, '2020-08-18 06:33:14', '2020-08-18 07:12:30'),
(25, 'Sữa, sữa chua', 'sua-sua-chua', '', 'Sữa, sữa chua', 'Sữa, sữa chua', 'Sữa', NULL, 24, 1, NULL, '2020-08-18 06:33:49', '2020-08-18 06:33:49'),
(26, 'Bơ, phô mai', 'bo-pho-mai', '', 'Bơ, phô mai', 'Bơ, phô mai', 'Bơ, phô mai', NULL, 24, 1, NULL, '2020-08-18 06:34:10', '2020-08-18 06:34:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `customer_id`, `parent_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(8, 2, 2, NULL, 'Bài viết rất hay', 0, '2020-08-18 07:33:14', '2020-08-18 07:33:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `map` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `phone`, `address`, `map`, `status`, `created_at`, `updated_at`) VALUES
(1, 'organicfood@gmail.com', '0969906925', '203 Kim Ngưu, phường Thanh Lương, quận Hai Bà Trưng, Hà Nội', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.68138531789!2d105.8593926144542!3d21.00540519395214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac0833bd5bb7%3A0x284ad85c45d5f4e8!2zMjAzIEtpbSBOZ8awdSwgVGhhbmggTMawxqFuZywgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1597718433093!5m2!1svi!2s\" width=\"100%\" height=\"500\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 1, '2020-08-18 02:44:57', '2020-08-18 03:03:38'),
(2, 'admin@gmail.com', '0969906925', 'ha noi', 'asd', 0, '2020-08-18 03:05:18', '2020-08-18 03:05:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sex` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_active` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `status`, `sex`, `remember_token`, `created_at`, `updated_at`, `code_active`) VALUES
(1, 'lee', 'leloantamduong@gmail.com', NULL, NULL, NULL, '$2y$10$r0J7d6obcx2irl1UYKXCSeyHSxF10BApO72jYXfBB/hcWNxwc2zAi', 1, NULL, NULL, '2020-08-10 12:47:19', '2020-08-10 12:47:19', NULL),
(2, 'Lê Việt Anh', 'leohell1995@gmail.com', NULL, NULL, '2020-08-15 09:38:08', '$2y$10$bIKbZ2K9rZRnhnUirTUV/OS5fc9DAYn96bmA/V95pa3wMRmDaoDGG', 1, NULL, NULL, '2020-08-15 09:37:00', '2020-08-16 21:09:28', '$2y$10$boiIBdnlcEtB5.Fj5rRfFu0w7WFzH..MessNIq0zmY7p/AHRljqOi'),
(3, 'nguyễn Thị Lựu', 'luunt88.dp@gmail.com', NULL, NULL, NULL, '$2y$10$E.I2fic8Q2pZIFe4f/5YEOrXsB3k0hSOINSgrQtMAQBTwY77KGg1K', 0, NULL, NULL, '2020-08-15 11:00:54', '2020-08-15 11:00:54', '$2y$10$1p0JvaKkCkE9A0.ARV7h3.qWk6JNnQHWD5fQ5SL/tFLTX90enGjH.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_orders`
--

CREATE TABLE `detail_orders` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_orders`
--

INSERT INTO `detail_orders` (`product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 27000.00, '2020-08-18 05:33:01', '2020-08-18 05:33:01'),
(1, 2, 38, 27000.00, '2020-08-18 06:18:35', '2020-08-18 06:18:35'),
(3, 3, 1, 46200.00, '2020-08-18 07:54:23', '2020-08-18 07:54:23'),
(6, 3, 1, 41000.00, '2020-08-18 07:54:23', '2020-08-18 07:54:23'),
(8, 3, 1, 180000.00, '2020-08-18 07:54:23', '2020-08-18 07:54:23'),
(9, 3, 1, 25000.00, '2020-08-18 07:54:23', '2020-08-18 07:54:23'),
(10, 3, 1, 290000.00, '2020-08-18 07:54:23', '2020-08-18 07:54:23'),
(11, 3, 1, 150000.00, '2020-08-18 07:54:23', '2020-08-18 07:54:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prioty` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faqs`
--

INSERT INTO `faqs` (`id`, `name`, `prioty`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What Shipping Methods are Available?', NULL, '<span>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span>', 1, '2020-08-18 05:05:35', '2020-08-18 05:05:35'),
(2, 'Lorem Ipsum is simply dummy text of the printing?', NULL, '<span>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span>', 1, '2020-08-18 05:06:37', '2020-08-18 05:06:37'),
(3, 'When an unknown printer took a galley of type and scrambled?', NULL, '<span>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.</span>', 1, '2020-08-18 05:06:57', '2020-08-18 05:06:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prioty` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2020_06_29_035101_create_categories_table', 1),
(40, '2020_07_07_024756_create_units_table', 1),
(42, '2020_07_07_025609_create_images_table', 1),
(44, '2020_07_10_084234_create_faqs_table', 1),
(45, '2020_07_15_110551_create_roles_table', 1),
(46, '2020_07_20_110639_create_user_roles_table', 1),
(47, '2020_07_22_101752_create_blogs_table', 1),
(48, '2020_07_30_134924_create_customers_table', 1),
(49, '2020_07_31_001435_create_comments_table', 1),
(62, '2020_08_11_045907_create_ratings_table', 5),
(64, '2020_08_13_012920_add_column_active_to_customers_table', 5),
(73, '2020_07_07_022621_create_suppliers_table', 8),
(76, '2020_07_09_023001_create_banners_table', 10),
(77, '2020_08_16_224545_add_prioty_column_to_banners_table', 11),
(78, '2020_08_17_083713_create_subscribes_table', 12),
(79, '2020_08_17_104357_create_feedback_table', 12),
(84, '2020_08_08_154842_create_tags_table', 13),
(87, '2020_08_18_021520_create_wishlists_table', 14),
(88, '2020_08_14_085312_create_contacts_table', 15),
(99, '2020_07_07_024914_create_products_table', 17),
(100, '2020_08_08_154948_create_product_tags_table', 18),
(102, '2020_08_11_020153_create_payments_table', 19),
(103, '2020_08_12_145751_create_shippings_table', 19),
(104, '2020_08_13_142825_create_orders_table', 19),
(105, '2020_08_13_143001_create_detail_orders_table', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` double(20,2) NOT NULL,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `payment_id`, `shipping_id`, `name`, `phone`, `address`, `email`, `note`, `total`, `shipping_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2, 'Lê Việt Anh', '0965142899', 'Duy phiên, Tam Dương, Vĩnh Phúc', 'leohell1995@gmail.com', 'Giao trước 7h', 135000.00, 37000.00, 4, '2020-08-18 05:33:00', '2020-08-18 05:53:47'),
(2, 2, 2, 1, 'Usb 3.0 Kingston', '0969906925', 'ha noi', 'admin@gmail.com', 'fdsfsdf', 1026000.00, 20000.00, 3, '2020-08-18 06:18:35', '2020-08-18 06:18:58'),
(3, 2, 2, 1, 'Usb 3.0 Kingston', '0969906925', 'ha noi', 'admin@gmail.com', 'fdsfsdfsd', 732200.00, 20000.00, 0, '2020-08-18 07:54:23', '2020-08-18 07:54:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `name`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'leedsfds', '2020-08-18 11:35:56', 0, '2020-08-18 04:28:33', '2020-08-18 04:35:56'),
(2, 'Thanh toán online', NULL, 1, '2020-08-18 05:32:35', '2020-08-18 05:32:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(15,2) NOT NULL,
  `sale` double(15,2) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `image`, `price`, `sale`, `description`, `content`, `status`, `category_id`, `supplier_id`, `unit_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bắp cải tim', 'bap-cai-tim', 'products/bapcai.jpg', 27000.00, 0.00, 'là một loại rau chủ lực trong họ Cải - Người Pháp gọi nó là Su (Chon) nên từ đó còn có tên là Sú. Bắp cải tim có hình dạng thuôn nhỏ, nhọn ở đầu, hình trái tim khi bổ đôi.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Bắp cải tim</strong> có vị ngọt, tính mát, ngoài là món ăn ngon ra còn có tác dụng chữa được nhiều bệnh. Trong bắp cải có chứa Vitamin A, C, U, canxi, kali, phốt pho, protein, calo và một số khoáng chất cần thiết cho sức khỏe.</li>\r\n<li class=\"list__item\"><strong>Bắp cải tim</strong> có tác dụng giảm cholestorol trong máu, giảm nguy xơ vữa động mạch máu, chống béo phì, chữa tiểu đường, giảm đau nhức, giải độc cơ thể, lọc máu.</li>\r\n<li class=\"list__item\"><strong>Bắp cải tim</strong> cũng làm giảm nguy cơ bị ung thư đặc biệt là ung thư phổi, ung thư dạ dày, ung thư vú và tuyến tiền liệt ruột kết.</li>\r\n</ul>\r\n<br>\r\n<h1 class=\"heading--7\"><span>Cách Thức Sử Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Bắp cải tim</strong> thường được chế biến bằng cách luộc, hoặc xào với thịt nạc và tôm hoặc nấu canh thịt. Người ta còn nhồi thịt heo nạc băm nhỏ vào các lá Bắp Cải rồi hầm nhừ, hoặc dùng các lá Bắp Cải cuốn thịt nạc để vào xửng mà hấp. Đối với những người không ăn được bắp cải có thể chuyển qua dùng nước ép bắp cải.</li>\r\n</ul>\r\n<br>\r\n<h1 class=\"heading--7\"><span>Bảo Quản</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Bảo quản:</strong>Tủ mát nhiệt độ từ 2-10°C</li>\r\n</ul>', 3, 13, 3, 1, NULL, '2020-08-18 05:27:20', '2020-08-18 07:06:48'),
(2, 'Cải Thảo', 'cai-thao', 'products/aditya-saxena-Kr2zQhCl4WY-unsplash.jpg', 26400.00, 0.00, 'có tên tiếng Anh là Chinese Cabbage, được trồng nhiều tại Đà Lạt. Bắp cải thảo hình trụ, tròn, có màu sắc khá giống với cải bắp, phần lá bao ngoài của bắp cải thảo màu xanh đậm, còn lá cuộn ở bên trong (gọi là lá non) có màu xanh nhạt, phần cuống lá có màu trắng. Cải thảo nặng trung bình 800gr, dài 15 -25 cm.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Cải thảo</strong>, có tác dụng hạ khí, thanh nhiệt nhuận thấp, có công dụng làm mềm cổ họng, bớt rát, đỡ ho; lại bổ ích trường vị, là loại rau ngon chứa nhiều vitamin A, B, C, E.</li>\r\n<li class=\"list__item\"><strong>Dùng cải thảo nấu canh</strong> cho người bị bệnh trường nhiệt, bệnh sốt rét và các bệnh có sốt lâu, tuỳ ý thêm giá đậu xanh hoặc giá đậu nành, cà, rau cần, nấu chung, canh ăn bổ lại hạ sốt.</li>\r\n<li class=\"list__item\"><strong>Người bị bệnh viêm bàng quang</strong>, viêm đường tiết niệu, tiểu tiện không bình thường, đau buốt; dùng cải thảo và rau cần nấu canh hoặc nấu chín lấy nước uống liền vài ngày.</li>\r\n</ul>', 3, 13, 3, 1, NULL, '2020-08-18 06:38:01', '2020-08-18 07:07:05'),
(3, 'Cần tây', 'can-tay', 'products/t%E1%BA%A3i%20xu%E1%BB%91ng.jpg', 46200.00, 0.00, 'à loại cây thảo sống 1-2 năm có thân mọc đứng, cao khoảng 1m, có rãnh dọc. Hoa màu trắng hay xanh lục, xếp thành tán. Hương vị: Tính the mát, vị ngọt đắng.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Cần tây</strong> có tính chất lọc máu, điều hòa huyết, làm giảm béo, khai vị, bổ thần kinh, cung cấp chất khoáng, chống hoại huyết, lợi tiêu hoá, kích thích tuyến thượng thận, giải nhiệt, chống lỵ, lợi tiểu, điều khí và dẫn mật, chống thấp khớp và kháng khuẩn, làm liền sẹo...</li>\r\n<li class=\"list__item\"><strong>Cần tây</strong> có công dụng chữa mỡ trong máu cao, chữa mụn nhọt, viêm nhiễm, chữa cảm cúm, viêm miệng, họng, viêm gan mạn, chữa các bệnh về đường hô hấp, giúp ngăn ngừa sỏi thận, giúp xương khỏe mạnh, lợi tiểu, trị táo bón, chống ung thư...</li>\r\n<li class=\"list__item\"><strong>Cần tây</strong> chứa chất chống oxy hóa, có tác dụng chăm sóc da, trị mụn đầu đen, trị nám da.</li>\r\n</ul>', 3, 13, 3, 1, NULL, '2020-08-18 06:40:48', '2020-08-18 07:07:22'),
(4, 'đọt su su', 'dot-su-su', 'products/74GcDk0l.jpg', 27000.00, 0.00, 'Đọt su su là phần ngọn non của cây su su, một loài cây xứ ôn đới, thân leo, ưa mát. Chỉ đơn giản ra giàn su su và chọn cắt vài đọt su su ở nhánh lá thứ hai kể từ ngọn vì đó là phần mềm và ngọt nhất, bạn có thể đem vào và chế biến thành nhiều món ngon.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Đọt su su</strong> với hương đặc trưng, tươi mát, ngọt bùi, thành phần nhiều vitamin, chất xơ, đã trở thành một món ăn ngon giúp giảm cân.</li>\r\n<li class=\"list__item\"><strong>Đọt su su</strong> là thực phẩm giàu folate, chất xơ, chất đồng, chất kẽm và vitamin B, giúp ngăn chặn sự hình thành của Homocystein là chất có khả năng gây nên bệnh tim và đột quỵ. Vitamin C, K có trong su su giúp chống ô xy hóa, loãng xương.</li>\r\n<li class=\"list__item\"><strong>Đọt su su</strong> còn là thực phẩm tốt cho sức khỏe, nó có tác dụng chữa nhiều bệnh tật rất hiệu quả chỉ bằng cách đơn giản là ăn su su đều đặn hàng ngày: tốt cho tim mạch, làm chậm hoặc ngăn chặn bệnh ung thư phát triển, tốt cho tuyến giáp, chống loãng xương, giúp giảm huyết áp, ngăn ngừa mụn, đẹp da, sản sinh nguồn năng lượng dồi dào, đủ cho cả ngày làm việc mệt mỏi.</li>\r\n</ul>', 3, 13, 3, 1, NULL, '2020-08-18 06:42:53', '2020-08-18 07:07:30'),
(5, 'Cải Xanh', 'cai-xanh', 'products/orfarm-rau-cai-xanh-huu-co_1501669679.jpg.jpg', 26500.00, 0.00, 'Cải xanh, hay còn gọi là cải bẹ xanh, cải cay, cải dưa, thuộc họ cải, là loại cải chủ yếu được dùng để muối dưa. Cải bẹ dưa có thân to, lá có màu xanh đậm hoặc xanh nõn lá chuối.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Thành phần dinh dưỡng </strong>trong cải xanh gồm có: vitamin A, B, C, K, axit nicotic, catoten, abumin..., nên được các chuyên gia dinh dưỡng khuyên dùng vì có nhiều lợi ích đối với sức khỏe cũng như có tác dụng phòng chống bệnh tật.</li>\r\n</ul>\r\n<br>\r\n<h1 class=\"heading--7\"><span>Cách Thức Sử Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Lá và thân cây</strong> thường dùng phổ biến nhất là nấu canh, hay để muối dưa (dưa cải).</li>\r\n<li class=\"list__item\"><strong>Ngoài việc</strong> dùng lá làm rau nấu canh hay làm dưa ăn, người ta còn dùng lá đắp ngoài trị ung thũng. Rễ củ và hạt được dùng chống bệnh scorbut (là bệnh do thiếu hụt vitamin C). Còn hạt và hoa được dùng trong phạm vi dân gian làm thuốc trị mụn nhọt.</li>\r\n<li class=\"list__item\"><strong>Lượng dùng: </strong>Sử dụng mỗi ngày</li>\r\n</ul>', 3, 13, 3, 1, NULL, '2020-08-18 06:45:08', '2020-08-18 07:07:37'),
(6, 'Chanh dây', 'chanh-day', 'products/022772d22d963730a8c139186a8ebf00.jpg', 41000.00, 0.00, 'Chanh dây là một loại quả quen thuộc với mọi người nhưng không phải ai cũng tận dụng được hết khả năng mà nó mang lại. Đừng bỏ phí những thực phẩm tốt nếu ngay trong nhà bạn đang có. Sử dụng mọi thức từ thiên nhiên luôn cho bạn một sức khỏe tốt mà không lo bệnh tật tìm đến.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Xung quanh hạt chanh dây</strong> có các bợm cơm với mùi thơm tự nhiên, chứa một lượng chất xơ tốt cho cơ thể, vì vậy chúng ta có thể ăn cả hạt mà không cần bỏ</li>\r\n<li class=\"list__item\"><strong>Để giảm cân</strong> bằng chanh dây cũng rất đơn giản, các bạn chỉ cần làm nước chanh dây để uống hằng ngày</li>\r\n<li class=\"list__item\"><strong>Uống chanh dây</strong> hằng ngày giúp ngăn ngừa sự phát triển của các tế bào ung thư, ngăn ngừa bệnh tim mạch và chống nhiễm trùng.</li>\r\n<li class=\"list__item\"><strong>Chanh dây </strong>cung cấp các vitamin, sắt, kali và các thành phần tốt cho da, giúp chống oxy hóa rất tốt.</li>\r\n</ul>', 5, 21, 1, 1, NULL, '2020-08-18 06:46:57', '2020-08-18 07:07:49'),
(7, 'Dưa hấu', 'dua-hau', 'products/D%C6%B0a-h%E1%BA%A5u.jpg', 71000.00, 0.00, 'Dưa hấu rất đa dạng về hình dạng và màu sắc.', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Dưa hấu tốt cho hệ xương và tim mạch</strong>:Lycopene có tác dụng đặc biệt quan trọng với hệ tim mạh và hệ xương. Ăn nhiều dưa hấu giúp cải thiện lưu lượng máu, giúp xương khớp khỏe mạnh</li>\r\n<li class=\"list__item\"><strong>Dưa hấu giúp giảm lượng mỡ trong cơ thể</strong>:làm giảm quá trình tích tụ mỡ trong cơ thể do chứa nhiều axit amin.</li>\r\n<li class=\"list__item\"><strong>Chống viêm, chống oxy hóa</strong>:Dưa hấu chứa nhiều các hợp chất phenolic bao gồm: flavonoid, carotenoid và triterpenoids. Đây là những hợp chất có lợi có tác dụng chống viêm nhiễm, nhiễm trùng và oxy hóa rất tốt.</li>\r\n<li class=\"list__item\"><strong>Dưa hấu lợi tiểu và thận</strong>:có tác dụng loại bỏ các chất thải sinh ra từ quá trình tiêu hóa đạm. Được ví là loại thuốc lợi tiểu tự nhiên, không hại thận</li>\r\n<li class=\"list__item\"><strong>Giúp hệ cơ và hệ thần kinh khỏe mạnh</strong>:Dưa hấu là loại hoa quả chứa nhiều kali. Ăn nhiều dưa hấu tăng sự hấp thụ kali. Giúp điều hòa hoạt động dây thần kinh và cơ bắp toàn cơ thể</li>\r\n<li class=\"list__item\"><strong>Tăng tính kiềm hóa của cơ thể </strong>:Tăng tính kiềm hóa của cơ thể.Ăn nhiều dưa hấu cũng giống như ăn nhiều rau xanh, hoa quả chín… có tác dụng kiềm hóa cơ thể. Tốt cho người ăn nhiều thực phẩm giàu axit như thịt, trứng, sữa…</li>\r\n<li class=\"list__item\"><strong>Dưa hấu tốt cho mắt Vitamin A tốt cho mắt</strong> :Trong dưa hấu chứa beta-carotene – là hợp chất tham gia vào quá trình chuyển hóa dinh dưỡng thành Vitamin A. Ngăn ngừa bệnh quáng gà, bệnh điểm vàng ở mắt</li>\r\n<li class=\"list__item\"><strong>Tác dụng làm đẹp da của dưa hấu.</strong> Vitamin A, Vitamin C và B6 cũng như Kali trong dưa hấu giúp bạn có làn da mịn màng. Hạn chế tối đa hiện tượng mọc mụn trứng cá. Dưa hấu chứa nhiều nước, những người đang trong giai đoạn ăn kiêng giảm cân và làm đẹp vóc dáng cũng nên ăn nhiều dưa hấu trong ngày (<em>khoảng 1.5 kg/ 1 ngày</em>).</li>\r\n</ul>', 5, 21, 1, 1, NULL, '2020-08-18 06:50:33', '2020-08-18 07:08:01'),
(8, 'Dâu tây', 'dau-tay', 'products/Dau-tay-Uc-vinfruits.com-3-546x546.jpg', 180000.00, 0.00, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzz z', '<span>Trái dâu rất mọng, đỏ, size lớn, Vị ngọt đậm đà (tương tự các loại dâu Nhật), Dâu rất thơm, đóng gói quy cách hộp 250g, Nhập khẩu từ Úc</span>', 5, 22, 1, 1, NULL, '2020-08-18 06:52:47', '2020-08-18 07:08:14'),
(9, 'Chuối Laba', 'chuoi-laba', 'products/chuoi-laba-500x500.jpg', 25000.00, 0.00, 'ádsadsa sdas ádas sa á', '<span>i Laba được coi là mặt hàng đặc sản của Đà Lạt – Lâm Đồng trong nhiều năm trở lại đây được nhiều người tiêu dùng trong và ...</span>', 3, 21, 1, 1, NULL, '2020-08-18 06:54:46', '2020-08-18 07:08:24'),
(10, 'Táo Envy', 'tao-envy', 'products/Tao-envy-new-Zealand.jpg', 290000.00, 0.00, 'Táo Envy Mỹ được mệnh danh là loại táo ngon độc nhất vô nhị của thế giới loài táo,đem đi biếu,đi tặng đều hay', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\"><strong>Táo chứa nhiều chất chống oxy hóa</strong> ngăn chặn tế bào và tổn thương mô khỏi các gốc tự do trong cơ thể bằng cách ngăn chặn hoặc làm giảm quá trình oxy hóa. Quả táo giúp giảm nguy cơ bệnh tim, tiểu đường và ung thư.</li>\r\n<li class=\"list__item\"><strong>Vitamin và các khoáng chất </strong>trong táo cung cấp 2.000 calo mỗi ngày, một quả táo Envy, trung bình cung cấp  cho 8% giá trị vitamin C, 2% Fe và Vitamin A, 5% kali.</li>\r\n<li class=\"list__item\"><strong>Carbohydrate và chất xơ tự nhiên</strong> có trong táo Envy là pectin.Pectin có nhiều trong táo giúp làm giảm huyết áp và ngăn ngừa ung thư ruột kết. </li>\r\n<li class=\"list__item\"><strong>Ngoài ra</strong> táo cũng chứa Phytochemical và Flavonoids có chức năng chống dị ứng, chống viêm, chống khối u và các hiệu ứng chất chống oxy hóa trên cơ thể và bảo vệ chống lại quá trình lão hóa.</li>\r\n</ul>', 3, 22, 1, 1, NULL, '2020-08-18 06:57:11', '2020-08-18 07:08:39'),
(11, 'Cam vàng', 'cam-vang', 'products/Cam-vang.jpg', 150000.00, 0.00, 'Trái cam tròn, to, màu vàng tươi tự nhiên như ánh nắng mặt trời,', '<h1 class=\"heading--7\"><span>Công Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li><b>Cam Vàng</b> có chứa nhiều Vitamin C, tốt cho da, chống lão hóa, giảm Cholesterol, có tác dụng hồi phục sức khỏe nhanh, tăng cường chức năng tạo hồng huyết cầu, giảm căng thẳng thần kinh.</li>\r\n<li><strong>Việc tiêu thụ vitamin C</strong><span> </span>ở liều cao (khoảng 500mg mỗi ngày) rất tốt cho người ốm.</li>\r\n<li class=\"list__item\"><strong>Quả cam </strong>mọng nước chứa một hàm lượng Vitamin C cao đến mức chỉ cần ăn một quả cũng đáp ứng được 130% nhu cầu vitaminC hàng ngày của chúng ta.</li>\r\n<li class=\"list__item\"><strong>Ngoài ra,</strong> cam Navel còn được biết tới như một loại đồ ăn kiêng giàu chất xơ, Vitamin A, B, Canxi, Magnesium, Sắt, Đồng, Iốt…</li>\r\n<li class=\"list__item\"><strong>Ăn cam thường xuyên</strong> sẽ giúp phòng tránh các bệnh truyền nhiễm do virus; giảm đáng kể nguy cơ mắc bệnh sỏi thận.</li>\r\n<li class=\"list__item\"><strong>Để tránh lượng calo dư thừa</strong>, hãy bổ sung camvào chế độ dinh dưỡng hàng ngày của mình.</li>\r\n</ul>', 3, 22, 1, 1, NULL, '2020-08-18 07:04:21', '2020-08-18 07:09:01'),
(12, 'Kiwi Vàng', 'kiwi-vang', 'products/kiwi-new-oganic-1.jpg', 265000.00, 0.00, 'ị thơm ngọt đặc trưng, dễ ăn thích hợp dùng làm món tráng miệng', '<h1 class=\"heading--7\"><span>ông Dụng</span></h1>\r\n<ul class=\"list--bullet--flex list--vertical theme--ah\">\r\n<li class=\"list__item\">Phòng ngừa các bệnh hô hấp</li>\r\n<li class=\"list__item\">Phòng ngừa các bệnh tim mạch</li>\r\n<li class=\"list__item\">Chống lại bệnh ung thư</li>\r\n<li class=\"list__item\">Có lợi cho tiêu hóa</li>\r\n<li class=\"list__item\">Bảo vệ mắt</li>\r\n<li class=\"list__item\">Kiểm soát huyết áp</li>\r\n<li class=\"list__item\">Tốt cho da</li>\r\n<li class=\"list__item\">Nâng cao sự miễn dịch</li>\r\n<li class=\"list__item\">Chống lại bệnh liệt dương</li>\r\n<li class=\"list__item\">Tốt cho phụ nữ mang thai và thai nhi</li>\r\n</ul>', 5, 22, 1, 1, NULL, '2020-08-18 07:05:55', '2020-08-18 07:05:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 5, '2020-08-18 07:06:48', '2020-08-18 07:06:48'),
(1, 6, '2020-08-18 07:06:48', '2020-08-18 07:06:48'),
(2, 5, '2020-08-18 07:07:05', '2020-08-18 07:07:05'),
(3, 5, '2020-08-18 07:07:22', '2020-08-18 07:07:22'),
(3, 6, '2020-08-18 07:07:22', '2020-08-18 07:07:22'),
(4, 5, '2020-08-18 07:07:30', '2020-08-18 07:07:30'),
(5, 5, '2020-08-18 07:07:37', '2020-08-18 07:07:37'),
(6, 3, '2020-08-18 07:07:49', '2020-08-18 07:07:49'),
(6, 4, '2020-08-18 07:07:49', '2020-08-18 07:07:49'),
(6, 6, '2020-08-18 07:07:49', '2020-08-18 07:07:49'),
(7, 2, '2020-08-18 07:08:01', '2020-08-18 07:08:01'),
(7, 3, '2020-08-18 07:08:01', '2020-08-18 07:08:01'),
(7, 4, '2020-08-18 07:08:01', '2020-08-18 07:08:01'),
(7, 6, '2020-08-18 07:08:01', '2020-08-18 07:08:01'),
(8, 4, '2020-08-18 07:08:14', '2020-08-18 07:08:14'),
(8, 6, '2020-08-18 07:08:14', '2020-08-18 07:08:14'),
(9, 4, '2020-08-18 07:08:24', '2020-08-18 07:08:24'),
(9, 6, '2020-08-18 07:08:24', '2020-08-18 07:08:24'),
(10, 2, '2020-08-18 07:08:39', '2020-08-18 07:08:39'),
(10, 3, '2020-08-18 07:08:39', '2020-08-18 07:08:39'),
(10, 4, '2020-08-18 07:08:39', '2020-08-18 07:08:39'),
(10, 6, '2020-08-18 07:08:39', '2020-08-18 07:08:39'),
(11, 2, '2020-08-18 07:09:01', '2020-08-18 07:09:01'),
(11, 3, '2020-08-18 07:09:01', '2020-08-18 07:09:01'),
(11, 4, '2020-08-18 07:09:01', '2020-08-18 07:09:01'),
(12, 2, '2020-08-18 07:05:55', '2020-08-18 07:05:55'),
(12, 3, '2020-08-18 07:05:55', '2020-08-18 07:05:55'),
(12, 4, '2020-08-18 07:05:55', '2020-08-18 07:05:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `number` double(8,2) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `customer_id`, `number`, `status`, `content`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 4.00, 1, 'Rau rất ngon', '2020-08-18 07:13:25', '2020-08-18 07:13:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '[\"admin.index\",\"admin.categories.index\",\"admin.categories.create\",\"admin.categories.store\",\"admin.categories.show\",\"admin.categories.edit\",\"admin.categories.update\",\"admin.categories.destroy\",\"admin.suppliers.index\",\"admin.suppliers.create\",\"admin.suppliers.store\",\"admin.suppliers.show\",\"admin.suppliers.edit\",\"admin.suppliers.update\",\"admin.suppliers.destroy\",\"admin.units.index\",\"admin.units.create\",\"admin.units.store\",\"admin.units.show\",\"admin.units.edit\",\"admin.units.update\",\"admin.units.destroy\",\"admin.banners.index\",\"admin.banners.create\",\"admin.banners.store\",\"admin.banners.show\",\"admin.banners.edit\",\"admin.banners.update\",\"admin.banners.destroy\",\"admin.faqs.index\",\"admin.faqs.create\",\"admin.faqs.store\",\"admin.faqs.show\",\"admin.faqs.edit\",\"admin.faqs.update\",\"admin.faqs.destroy\",\"admin.products.index\",\"admin.products.create\",\"admin.products.store\",\"admin.products.show\",\"admin.products.edit\",\"admin.products.update\",\"admin.products.destroy\",\"admin.images.index\",\"admin.images.create\",\"admin.images.store\",\"admin.images.show\",\"admin.images.edit\",\"admin.images.update\",\"admin.images.destroy\",\"admin.roles.index\",\"admin.roles.create\",\"admin.roles.store\",\"admin.roles.show\",\"admin.roles.edit\",\"admin.roles.update\",\"admin.roles.destroy\",\"admin.users.index\",\"admin.users.create\",\"admin.users.store\",\"admin.users.show\",\"admin.users.edit\",\"admin.users.update\",\"admin.users.destroy\",\"admin.blogs.index\",\"admin.blogs.create\",\"admin.blogs.store\",\"admin.blogs.show\",\"admin.blogs.edit\",\"admin.blogs.update\",\"admin.blogs.destroy\",\"admin.tags.index\",\"admin.tags.create\",\"admin.tags.store\",\"admin.tags.show\",\"admin.tags.edit\",\"admin.tags.update\",\"admin.tags.destroy\",\"admin.contacts.index\",\"admin.contacts.create\",\"admin.contacts.store\",\"admin.contacts.show\",\"admin.contacts.edit\",\"admin.contacts.update\",\"admin.contacts.destroy\",\"admin.shippings.index\",\"admin.shippings.create\",\"admin.shippings.store\",\"admin.shippings.show\",\"admin.shippings.edit\",\"admin.shippings.update\",\"admin.shippings.destroy\",\"admin.payments.index\",\"admin.payments.create\",\"admin.payments.store\",\"admin.payments.show\",\"admin.payments.edit\",\"admin.payments.update\",\"admin.payments.destroy\",\"admin.categories.trash\",\"admin.categories.restore\",\"admin.products.trash\",\"admin.products.restore\",\"admin.suppliers.trash\",\"admin.suppliers.restore\",\"admin.orders.index\",\"admin.orders.show\",\"admin.orders.status_update\",\"admin.customers.customer_list\",\"admin.customers.customer_update_status\",\"admin.subscribe_list\",\"admin.subscribe_del\",\"admin.feedback_list\",\"admin.reply_feedback\",\"admin.rating_list\",\"admin.rating_del\",\"admin.rating_up\",\"admin.login\",\"admin.logout\",\"admin.error\",\"admin.comment_list\",\"admin.comment_del\"]', '2020-08-08 12:15:05', '2020-08-18 04:25:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `cost`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Giao hàng tiêu chuẩn', 20000.00, NULL, 1, '2020-08-18 04:10:46', '2020-08-18 04:10:46'),
(2, 'Giao hàng nhanh', 37000.00, NULL, 1, '2020-08-18 04:11:07', '2020-08-18 04:33:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `image`, `address`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Công ty TNHH rau củ quả Hà Nội', '1597516775-do-xanh.jpg', NULL, NULL, 1, '2020-08-15 18:39:35', '2020-08-15 18:39:35'),
(2, 'Usb 3.0 Kingston', '1597516970-do-xanh.jpg', NULL, NULL, 1, '2020-08-15 18:42:50', '2020-08-15 18:43:33'),
(3, 'DALATGAP STORE', 'suppliers/15823598_1095693627210313_1035706846751178316_n.jpg', NULL, NULL, 0, '2020-08-16 14:01:02', '2020-08-16 14:11:16'),
(4, 'Orfarm', 'suppliers/66219989_1207724006073760_9206761620204683264_o.png', NULL, NULL, 0, '2020-08-16 14:14:06', '2020-08-16 14:17:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Giải nhiệt hè', 1, 'giai-nhiet-he', NULL, '2020-08-17 16:14:21', '2020-08-18 07:00:16'),
(3, 'Ăn cùng bạn', 1, 'an-cung-ban', NULL, '2020-08-17 16:14:48', '2020-08-18 07:00:27'),
(4, 'Ngọt lịm', 1, 'ngot-lim', NULL, '2020-08-18 07:00:49', '2020-08-18 07:00:49'),
(5, 'Bữa ăn xanh', 1, 'bua-an-xanh', NULL, '2020-08-18 07:06:28', '2020-08-18 07:06:28'),
(6, 'Vitamin', 1, 'vitamin', NULL, '2020-08-18 07:06:33', '2020-08-18 07:06:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kg', '2020-08-08 12:16:33', '2020-08-08 12:16:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `birthday`, `email`, `address`, `phone`, `description`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$ltWfawFQiPb7Zpk2p4on2uNrx39OjtrtPF12Xg1H5bJeshkLSdkmq', NULL, NULL, NULL),
(2, 'Cora Price', NULL, 'burnice.schiller@yahoo.com', NULL, NULL, NULL, NULL, '2020-08-08 12:15:05', '$2y$10$M53dXXnsTv8OYQqoXUgKlO8Aju2C74gYaNDrA5bcp1xnew9TVqgG6', 'SjhCmPDy8FyHagjLhKFO8VOA7sjPkIdnmoLF7UTchVmh99mL4haZ3GGWNepM', '2020-08-08 12:15:05', '2020-08-08 12:15:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`),
  ADD KEY `comments_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detail_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Các ràng buộc cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
