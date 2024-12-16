-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 10, 2024 lúc 02:41 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_product`
--

CREATE TABLE `img_product` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `img_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `img_product`
--

INSERT INTO `img_product` (`id`, `id_product`, `img_product`) VALUES
(249, 54, 'bcfbef192a8756613fe2760505e9a5e0.jpg'),
(254, 54, '250-22413-b--n-ph--m-giga-5.jpg'),
(259, 43, '39022_asus_vivobook_a515ea_bq498t_2_ae076f2dcd524f35a4c679b293cb9734_master.png'),
(260, 43, '39022_asus_vivobook_a515ea_bq498t_4_c96e752b8d9f45eda43c3a7d1628b1de_master (1).png'),
(261, 55, 'Tai-nghe-Kingston-HyperX-Cloud-II-7.1-Red-2-songphuong.vn_-600x600.jpg.webp'),
(262, 55, 'Tai-nghe-Kingston-HyperX-Cloud-II-7.1-Red-1-songphuong.vn_-600x600.jpg.webp'),
(263, 55, 'Tai-nghe-Kingston-HyperX-Cloud-II-7.1-Red-4-songphuong.vn_-100x100.jpg.webp'),
(266, 59, '39022_asus_vivobook_a515ea_bq498t_2_ae076f2dcd524f35a4c679b293cb9734_master.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_cmt`
--

CREATE TABLE `shop_cmt` (
  `id_comment_shop` int(11) NOT NULL,
  `id_comment_user` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `time_comment` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shop_cmt`
--

INSERT INTO `shop_cmt` (`id_comment_shop`, `id_comment_user`, `noidung`, `time_comment`) VALUES
(8, 54, 'Oke bạn , shop sẽ liên hệ qua zalo hoặc gmail của bạn', '2022-03-23 22:35:53'),
(9, 8, 'Còn Nhiều lắm bạn ạ', '2022-03-23 22:38:13'),
(10, 9, 'được chứ', '2022-04-06 22:25:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'admin', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `id` int(11) NOT NULL,
  `tenbaiviet` varchar(255) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `noidung` longtext NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`id`, `tenbaiviet`, `tomtat`, `noidung`, `id_danhmuc`, `tinhtrang`, `hinhanh`, `time`) VALUES
(5, 'Đối mặt nguy cơ không trả nợ được, Nga dọa kiện phương Tây 2', '<p>(NLĐO) - Bộ trưởng Tài chính Nga Anton Siluanov ngày 11-4 tuyên bố Moscow sẽ hành động pháp lý nếu bị phương Tây chèn ép vỡ nợ.</p>\r\n', '<p>\"Tất nhiên, chúng tôi sẽ kiện vì chúng tôi đã triển khai mọi bước đi cần thiết để đảm bảo các nhà đầu tư nhận được các khoản thanh toán. Chúng tôi sẽ trình lên tòa án hóa đơn xác nhận nỗ lực chi trả bằng đơn vị tiền tệ nước ngoài lẫn đồng rúp. Đây không phải là một quy trình dễ dàng. Chúng tôi sẽ phải nỗ lực để chứng minh, bất chấp mọi khó khăn\" - Bộ trưởng Siluanov nhấn mạnh nhưng không thông tin chi tiết về lựa chọn pháp lý của Moscow.</p>\r\n\r\n<p>Tuyên bố trên thể hiện lập trường cứng rắn của Moscow trong cuộc chiến tài chính với phương Tây.</p>\r\n\r\n<p>\"Nga đã cố gắng thanh toán cho các chủ nợ nước ngoài một cách thiện chí. Tuy nhiên, các nước phương Tây đang cố tình triển khai những chính sách để tạo ra một sự kiện vỡ nợ nhân tạo bằng mọi giá\" - Bộ trưởng Siluanov nói thêm, theo <em>Reuters</em>.</p>\r\n\r\n<p>Theo ông Siluanov, các khoản nợ nước ngoài của Nga hiện chiếm khoảng 20% tổng nợ công, vốn đang ở ngưỡng 21.000 tỉ rúp (261,7 tỉ USD). Trong số này, khoảng 4.500-4.700 tỉ rúp là nợ nước ngoài.</p>\r\n\r\n<p><img alt=\"Đối mặt nguy cơ không trả nợ được, Nga dọa kiện phương Tây - Ảnh 1.\" src=\"https://nld.mediacdn.vn/thumb_w/684/291774122806476800/2022/4/11/photo-1-16496409071271927891321.jpg\" /></p>\r\n\r\n<p>Bộ trưởng Tài chính Nga Anton Siluanov. Ảnh: Reuters</p>\r\n\r\n<p>\"Một cuộc chiến tài chính và kinh tế được phát động chống lại đất nước của chúng tôi. Chúng tôi buộc phải hành động trong khi nỗ lực hoàn thành mọi nghĩa vụ của mình. Nếu chúng tôi không được phép trả nợ bằng đơn vị tiền tệ nước ngoài, chúng tôi sẽ làm điều này bằng đồng rúp\" - Bộ trưởng Siluanov tuyên bố.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p>Nga lần đầu tiên đối mặt sức ép vỡ nợ trong hơn 100 năm, sau khi thực hiện các thỏa thuận để hoàn trả trái phiếu quốc tế bằng đồng rúp, thay vì USD, hồi đầu tuần này.</p>\r\n\r\n<p>Nga vỡ nợ vốn là kịch bản không tưởng cho đến khi Moscow bị Mỹ và đồng minh đồng loạt áp lệnh trừng phạt để phản ứng với chiến dịch quân sự đặc biệt của Điện Kremlin ở Ukraine.</p>\r\n\r\n<p>Cơ quan xếp hạng tín dụng Standard & Poor’s (Mỹ) mới đây hạ cấp khả năng thanh toán nợ nước ngoài của Nga, phát tín hiệu cho thấy Moscow đang đối mặt với nguy cơ vỡ nợ gia tăng.</p>\r\n\r\n<p>Theo hãng tin <em>AP</em>, động thái trên được Standard & Poor’s thực hiện với lập luận rằng các biện pháp trừng phạt nhằm vào Moscow vì cuộc chiến ở Ukraine \"nhiều khả năng được áp bổ sung trong những tuần tới, cản trở khả năng và ý chí của Nga trong việc tuân thủ điều khoản và nghĩa vụ đối với chủ nợ nước ngoài\".</p>\r\n', 3, 0, '1709865053_photo-1-16496409071271927891321.webp', '2022-04-12 18:23:20'),
(7, 'Thượng Hải nới phong tỏa, thành phố Mỹ bắt buộc đeo khẩu trang phòng Covid-19', '<p>Thành phố đông dân nhất của Trung Quốc cho phép tiến hành một số hoạt động thích hợp ở các khu vực nơi không có ca nhiễm nào trong ít nhất hai tuần.</p>\r\n', '<p><img src=\"https://static-images.vnncdn.net/files/publish/nguoi-dan-trung-quoc-xep-hang-cho-xet-nghiem-covid-19-06be5db029764ff8abd5fb173c995d94.jpg\" /></p>\r\n\r\n<p>Người dân Trung Quốc xếp hàng chờ xét nghiệm Covid-19</p>\r\n\r\n<p>Theo báo The Guardian, từ ngày 11/4 giới chức Thượng Hải bắt đầu nới lỏng phong tỏa tại một số khu vực bất chấp số ca mắc Covid-19 tăng kỷ lục, hơn 25.000 trường hợp.</p>\r\n\r\n<p>Gu Honghui, một quan chức của đô thị 26 triệu dân này cho biết, người dân được phép tiến hành một số hoạt động thích hợp ở những khu vực không có ca mắc Covid-19 nào trong ít nhất hai tuần. Cư dân của những khu vực sạch Covid-19 này không được phép tới những nơi đang bị phong tỏa chặt chẽ. </p>\r\n\r\n<p>Phát biểu tại một cuộc họp báo, ông Gu cho biết, mỗi quận sẽ công bố tên những cộng đồng đầu tiên được nới lỏng phong tỏa.</p>\r\n\r\n<p>Hôm qua (11/4), Thượng Hải ghi nhận 914 ca nhiễm virus corona có triệu chứng và 25.173 ca không triệu chứng. </p>\r\n\r\n<p><strong>Thành phố Mỹ tái bắt buộc đeo khẩu trang bên trong nhà</strong></p>\r\n\r\n<p><img src=\"https://static-images.vnncdn.net/files/publish/anh-ap-04fe4212569343b3a15f31fadfd65f55.jpg\" /></p>\r\n\r\n<p>Ảnh: AP</p>\r\n\r\n<p>Ngày 11/4, Philadelphia đã trở thành thành phố lớn đầu tiên của Mỹ tái khôi phục việc bắt buộc đeo khẩu trong nhà sau khi số ca nhiễm virus corona tăng mạnh. Quan chức y tế hàng đầu của thành phố này cho biết, bà muốn chặn trước làn sóng lây nhiễm mới do các biến thể phụ của biến thể Omicron gây ra. </p>\r\n\r\n<p>Hãng tin AP dẫn lời Tiến sĩ Cheryl Bettigole, một ủy viên y tế của Philadelphia cho biết, trong vòng 10 ngày, số ca mắc Covid-19 tại thành phố này đã tăng hơn 50%, đây là mức mà theo hướng dẫn của thành phố là người dân cần đeo khẩu trang. </p>\r\n\r\n<p>Giới chức y tế tại đây cho biết, số ca nhiễm gần đây tăng cao là do biến thể phụ dễ lây nhiễm BA.2 của biến thể Omicron, loại đã lan truyền rất nhanh ở khắp châu Âu và châu Á và trở thành biến thể trội ở Mỹ trong vài tuần gần đây. </p>\r\n\r\n<p><strong>Đức sắp vứt bỏ 3 triệu liều vắc xin ngừa Covid-19</strong></p>\r\n\r\n<p>Hãng AP đưa tin, Bộ Y tế Đức ngày 11/4 cho biết, nước này có thể phải vứt bỏ 3 triệu liều vắc xin ngừa Covid-19 hết hạn vào cuối tháng 6. Phát ngôn viên bộ này là Hanno Kautz nói, cho tới giờ Berlin chưa phải tiêu hủy nhiều liều vắc xin nhưng không đưa ra con số chính xác. \"Chúng tôi hiện có nhiều vắc xin hơn số lượng cần dùng và số lượng có thể hiến tặng\".</p>\r\n\r\n<p>Quan chức này cho biết, chương trình phân phối vắc xin tới các quốc gia nghèo hơn COVAX hiện không nhận quyên góp vắc xin. \"Có nguy cơ số vắc xin này sẽ bị vứt bỏ\", ông Kautz nói và cho biết thêm, do gần đây xuất hiện thông tin vắc xin BioNTech-Pfizer có thể lưu trữ lâu hơn, nên tới cuối tháng 6, chỉ có 3 triệu liệu bị vứt bỏ hoặc tiêu hủy thay vì 10 triệu liều như ước tính trước đó.  </p>\r\n\r\n<p>Chương trình tiêm chủng của Đức đang bị chậm đáng kể, trung bình mỗi ngày nước này chỉ tiêm 33.000 mũi vắc xin ngừa Covid-19 vào tuần trước. Trong khi đó, vào thời điểm Đức đẩy mạnh tiêm chủng, mỗi ngày có hơn 1 triệu liều vắc xin được sử dụng. </p>\r\n\r\n<p> </p>\r\n', 3, 0, '1709865096_nguoi-dan-trung-quoc-xep-hang-cho-xet-nghiem-covid-19-06be5db029764ff8abd5fb173c995d94.jpg', '2022-04-12 18:23:20'),
(8, 'Tên Lửa siêu vượt âm của Nga sẵn sàng tiêu diệt căn cứ quân sự trong lãnh thổ Ukarina', '<p>Quân đội Nga lần thứ 3 khai hỏa tên lửa siêu vượt âm Kinzhal ở Ukraine, nhắm mục tiêu vào một sở chỉ huy lực lượng Ukraine ở vùng Donbass.</p>\r\n', '<p>Interfax dẫn lời Thiếu tướng Igor Konashenkov, phát ngôn viên Bộ Quốc phòng <a href=\"https://www.24h.com.vn/tin-tuc-nga-c415e3808.html\">Nga</a>, ngày 11/4 xác nhận một tên lửa Kinzhal được khai hỏa từ đường không đã phá hủy sở chỉ huy ngầm được bảo vệ kiên cố của một đơn vị quân đội Ukraine gần làng Chasov Yar tại vùng Donbass.</p>\r\n\r\n<p>Đây là lần thứ 3 tên lửa Kinzhal được sử dụng ở Ukraine. Bộ Quốc phòng Nga ngày 19/3 xác nhận lần đầu tiên sử dụng Kinzhal tấn công một căn cứ ở vùng Ivano-Frankivsk ở miền Đông Ukraine. Một ngày sau, một quả Kinzhal khác được khai hỏa vào kho nhiên liệu ở tỉnh Mykolaiv.</p>\r\n\r\n<p>Kinzhal có tốc độ tối đa khoảng Mach 10-12 (gấp 10-12 lần vận tốc âm thanh). Tổng thống Mỹ Joe Biden hôm 21/3 cho rằng Kinzhal là \"vũ khí có tác động lớn nhưng không tạo ra nhiều khác biệt ngoại trừ việc gần như không thể bị đánh chặn\".</p>\r\n\r\n<p>Tại họp báo cùng ngày, Tướng Konashenko thông báo thêm, quân đội Nga đã bắn hạ một máy bay chiến đấu Su-27 của Ukraine gần làng Sinelnikovo, tỉnh Dnepropetrovsk, gần nơi Moscow trước đó vài giờ xác nhận phá hủy tổ hợp tên lửa phòng không S-300 do một quốc gia châu Âu gửi sang Ukraine.</p>\r\n\r\n<p><img alt=\"Tên lửa siêu vượt âm Nga san phẳng sở chỉ huy Ukraine - 1\" src=\"https://cdn.24h.com.vn/upload/2-2022/images/2022-04-12/1649738268-cover_5b640ac1193f65_31461794-1649728740489-width600height337.png\" style=\"width:660px\" /></p>\r\n\r\n<p>Máy bay Nga mang theo tên lửa Kinzhal. Ảnh: Getty Images</p>\r\n\r\n<p>\"Các tên lửa phóng từ trên không có độ chính xác cao đã phá hủy một bệ phóng Tochka-U, 2 bệ phóng tên lửa trong hầm ngầm ở khu vực Selidovo, tỉnh Donetsk\", quan chức Nga tiết lộ, cho biết khoảng 40 quân nhân Ukraine đã thiệt mạng.</p>\r\n\r\n<p>Ông Konashenkov cũng tuyên bố, \"trong quá trình trinh sát và tìm kiếm cách thành phố Izyum khoảng 5 km về phía Nam, một nhóm đặc nhiệm Nga đã tiêu diệt Taras Bobanich, một trong những thủ lĩnh cộm cán của nhóm cực hữu Right Sector\".</p>\r\n\r\n<p>Phía Nga mô tả Bobanich là người đứng đầu \"nhóm tân phát xít Lvov\". Từ năm 2014, Bobanich tham gia chiến dịch của Kiev tại khu vực Donbass, miền Đông Ukraine và \"chịu trách nhiệm ra lệnh pháo kích các khu dân cư ở Donetsk và Luhansk\". Quân đội Nga khẳng định sẽ tiếp tục tìm kiếm và loại bỏ \"thủ lĩnh của những tổ chức theo chủ nghĩa tân phát xít ở Ukraine\".</p>\r\n', 3, 0, '1709865128_zircon-6-JPG-3286-1707867259.jpg', '2022-04-12 18:23:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `anh_banner` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `anh_banner`, `thutu`) VALUES
(4, '1709866271_Intel-14th.jpg', 1),
(5, '1709866298_08_Apr099637c88cfae81b31442d55041f10fa.png', 2),
(6, '1709866309_Banner-Launch-CPU-AMD-Ryzen-7000X3D-songphuong.vn_.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id_brand` int(11) NOT NULL,
  `tenbrand` varchar(255) NOT NULL,
  `hinhanhbrand` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`id_brand`, `tenbrand`, `hinhanhbrand`, `thutu`) VALUES
(11, 'Gigabytes', '1709866108_logo2.png', 2),
(14, 'Kingston', '1709866142_tải xuống (1).png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_date`) VALUES
(100, 138, '4815', 0, '2022-03-31 23:56:06'),
(101, 138, '2197', 0, '2022-04-01 00:24:46'),
(103, 138, '2714', 0, '2022-04-01 22:40:38'),
(104, 138, '5811', 0, '2022-04-02 21:13:26'),
(105, 138, '753', 0, '2022-04-02 21:56:56'),
(106, 138, '671', 0, '2022-04-03 20:23:56'),
(107, 138, '6502', 0, '2022-04-03 20:25:33'),
(108, 138, '6539', 0, '2022-04-04 15:30:21'),
(110, 138, '1721', 0, '2022-04-06 10:11:54'),
(111, 138, '755', 0, '2022-04-06 10:12:37'),
(112, 138, '6023', 0, '2022-04-06 22:01:23'),
(113, 138, '920', 0, '2022-04-06 22:04:53'),
(114, 138, '290', 0, '2022-04-06 22:05:17'),
(115, 138, '4295', 0, '2022-04-07 23:49:22'),
(116, 138, '2332', 0, '2022-04-07 23:50:00'),
(118, 141, '4337', 0, '2022-04-12 21:01:29'),
(119, 141, '7481', 2, '2022-04-13 09:56:33'),
(120, 141, '2787', 1, '2022-04-13 09:57:46'),
(121, 138, '5822', 1, '2022-04-14 16:14:31'),
(122, 138, '7892', 1, '2022-04-14 21:24:36'),
(123, 138, '302', 1, '2022-04-16 20:57:52'),
(124, 143, '7625', 0, '2024-03-08 08:30:21'),
(125, 144, '941', 2, '2024-03-08 10:38:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(103, '4273', 54, 1),
(104, '2274', 55, 1),
(105, '4815', 55, 1),
(106, '2197', 43, 3),
(107, '2197', 54, 1),
(108, '5741', 43, 5),
(109, '2714', 43, 1),
(110, '5811', 43, 1),
(111, '753', 54, 1),
(112, '671', 54, 1),
(113, '6502', 43, 1),
(114, '6539', 54, 1),
(115, '9119', 43, 1),
(116, '1721', 43, 1),
(117, '755', 43, 1),
(118, '755', 54, 1),
(119, '6023', 54, 2),
(120, '920', 54, 1),
(121, '290', 54, 1),
(122, '4295', 55, 1),
(123, '2332', 55, 3),
(124, '7127', 54, 2),
(125, '4337', 54, 1),
(126, '7481', 43, 1),
(127, '2787', 43, 1),
(128, '5822', 54, 1),
(129, '7892', 55, 1),
(130, '302', 55, 1),
(131, '7625', 55, 1),
(132, '7625', 54, 1),
(133, '941', 43, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `noidungcmt` text NOT NULL,
  `time_cmt` datetime NOT NULL DEFAULT current_timestamp(),
  `tinhtrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comments`
--

INSERT INTO `tbl_comments` (`id_comment`, `id_user`, `id_sp`, `noidungcmt`, `time_cmt`, `tinhtrang`) VALUES
(8, 126, 54, 'Mình Muốn nhận tư vấn', '2022-03-23 22:35:25', 1),
(9, 138, 54, 'Tôi muốn mua cái này ,được không\r\n', '2022-04-06 22:24:15', 1),
(10, 138, 54, '', '2022-04-16 22:00:33', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucbv`
--

CREATE TABLE `tbl_danhmucbv` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc_bv` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucbv`
--

INSERT INTO `tbl_danhmucbv` (`id_danhmuc`, `tendanhmuc_bv`, `thutu`) VALUES
(2, 'Tin tức quốc tế', 1),
(3, 'Tin Tức Covid 19', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucsp`
--

CREATE TABLE `tbl_danhmucsp` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL,
  `id_loaisp` int(11) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucsp`
--

INSERT INTO `tbl_danhmucsp` (`id_danhmuc`, `tendanhmuc`, `id_loaisp`, `thutu`) VALUES
(18, 'Bàn Phím Cơ', 18, 1),
(20, 'Laptop', 18, 1),
(21, 'Tai Nghe Gaming', 18, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisp`
--

CREATE TABLE `tbl_loaisp` (
  `id_loaisp` int(11) NOT NULL,
  `tenloaisp` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisp`
--

INSERT INTO `tbl_loaisp` (`id_loaisp`, `tenloaisp`, `thutu`) VALUES
(16, 'Phụ Kiện Máy Tính', 1),
(18, 'Laptop & PC', 2),
(19, 'SmartPhone', 3),
(20, 'Phụ Kiện', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `masp` varchar(255) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `sanxuat` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `thongso` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `add_sale` int(11) NOT NULL DEFAULT 0,
  `add_hot` int(11) NOT NULL DEFAULT 0,
  `luongmua` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `sale`, `sanxuat`, `hinhanh`, `tomtat`, `noidung`, `thongso`, `tinhtrang`, `id_danhmuc`, `id_brand`, `add_sale`, `add_hot`, `luongmua`) VALUES
(43, 'Laptop Asus VivoBook A515EP-BQ498T (i5 1135G7/8GB RAM/512GB SSD/15.6 FHD/MX330 2GB/Win10/Bạc)', ' LTAU599', '3400000', 10, 20, 'Viêt Nam', '1709865187_39022_a515_fb573e53ece9433098c2cff24b0c49b3_master.png', '<ul>\r\n	<li>CPU: Intel Core i5 1135G7</li>\r\n	<li>RAM: 8GB (trống 1 khe ram)</li>\r\n	<li>Ổ cứng: 512GB SSD (có thể lắp thêm ổ 2.5)</li>\r\n	<li>VGA: Nvidia MX330 2GB</li>\r\n	<li>Màn hình: 15.6 inch FHD</li>\r\n	<li>HĐH: Win 10</li>\r\n</ul>\r\n', '<h3>Cấu hình xịn</h3>\r\n\r\n<p><a href=\"https://www.hanoicomputer.vn/laptop-asus-vivobook?cpu-laptop=intel-core-i5-1-1-1-1\">Laptop Asus VivoBook core I5</a> trang bị vi xử lý Intel® Core™ i thế hệ 11 cùng với bộ nhớ trong 4 hoặc 8GB RAM cung cấp khả năng hỗ trợ tốt mọi ứng dụng về văn phòng như Word, Excel, PowerPoint. Bên cạnh đó máy có thể xử lí Photoshop với nhu cầu cắt ghép đơn giản, không chuyên. Ngoài ra máy còn được trang bị ổ ssd tăng tốc độ xử lý file và boot win cực nhanh.</p>\r\n\r\n<p><img alt=\"Laptop Asus VivoBook A515EP-1\" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_3.png\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<p> </p>\r\n\r\n<h3>Màn hình</h3>\r\n\r\n<p>Màn hình NanoEdge viền siêu mỏng mang lại trải nghiệm hình ảnh đắm chìm, không gian hình ảnh được mở rộng bằng cách mang đến màn hình lớn hơn trong một khung máy nhỏ hơn. Màn hình Full HD với góc nhìn rộng và khả năng tái tạo màu sắc vượt trội đem lại hình ảnh chân thực, sống động</p>\r\n\r\n<p><img alt=\"Laptop Asus VivoBook A515EP-2\" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_6.png\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<h3>Bảo mật </h3>\r\n\r\n<p>Truy cập ASUS VivoBook 15 chưa bao giờ dễ hơn và bảo mật hơn. Với cảm biến vân tay tích hợp tại bàn di chuột và Windows Hello, bạn không cần phải gõ mật khẩu cho mỗi lần đăng nhập – chỉ cần một chạm để mở máy tính!</p>\r\n\r\n<p>Bàn phím fullsize được thiết kế nguyên khối và hành trình phím 1.4mm cho trải nghiệm đánh máy thoải mái, phù hợp cho mọi tác vụ văn phòng.</p>\r\n\r\n<p><img alt=\"Laptop Asus VivoBook A515EP-3\" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_5.png\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<h3>Cổng cắm đa dạng</h3>\r\n\r\n<p>VivoBook 15 được trang bị cổng USB 3.2 Gen 1 Type-C™ đảo chiều cho việc kết nối các thiết bị dễ dàng hơn. Máy cũng có cổng USB 3.2 Gen 1, USB 2.0, HDMI và khe đọc thẻ microSD – để việc kết nối với các thiết bị ngoại vi, màn hình, máy chiếu thuận tiện hơn.</p>\r\n\r\n<p><img alt=\"Laptop Asus VivoBook A515EP-4\" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_1.png\" style=\"height:850px; width:850px\" /></p>\r\n', '21', 0, 21, 14, 1, 1, 3),
(54, 'Keyboard Gigabyte Aorus K1 RGB - Red switch', 'KBGI033', '2179000', 3, 10, 'Trung Quốc', '1709865410_250-22413-b--n-ph--m-giga-3.jpg', '<ul>\r\n	<li>Keyboard Gigabyte Aorus K1 RGB</li>\r\n	<li>Thiết kế layout Fullsize 104 phím</li>\r\n	<li>Sử dụng switch Cherry MX cao cấp</li>\r\n	<li>Tích hợp phím Media tiện lợi</li>\r\n	<li>Led RGB Fusion 2.0, đồng bộ led với các thiết bị linh kiện Aorus khác</li>\r\n</ul>\r\n', '<h3>Switch Cherry MX cao cấp</h3>\r\n\r\n<p>Cherry Red Switch mang lại cảm giác phản hồi của phím vượt trội và lực nhấn tối ưu. Hành trình phím 2mm, không có khấc cản giúp cải thiện thời gian phản hồi cũng như giảm thiểu tiếng ồn</p>\r\n\r\n<p><img alt=\"Keyboard Gigabyte Aorus K1 RGB (USB/Red sw) sử dụng switch Cherry MX cao cấp\" src=\"https://hanoicomputercdn.com/media/lib/05-05-2021/switch-cua-keyboard-gigabyte-aorus-k1-rgb-usb-red-sw.png\" style=\"width:100%\" /></p>\r\n\r\n<h3>Led RGB Fusion</h3>\r\n\r\n<p>Với dải led 16.7 triệu màu và đi kèm nhiều hiệu ứng ánh sáng, có thể cài đặt cho từng phím hoặc đồng bộ hiệu ứng với các thiết bị Aorus khác</p>\r\n\r\n<p><img alt=\"Keyboard Gigabyte Aorus K1 RGB (USB/Red sw) tích hợp led RGB Fusion 2.0\" src=\"https://hanoicomputercdn.com/media/lib/05-05-2021/led-cua-keyboard-gigabyte-aorus-k1-rgb-usb-red-sw.png\" style=\"width:100%\" /></p>\r\n\r\n<h3>Các phím có thể lập trình</h3>\r\n\r\n<p>Cài đặt chức năng cho phím hoặc gán Macro, tổ hợp phím bất kỳ mà bạn muốn. Với bộ nhớ được tích hợp bên trong, bạn có thể thiết lập các cấu hình gần như không giới hạn.</p>\r\n\r\n<p><img alt=\"Keyboard Gigabyte Aorus K1 RGB (USB/Red sw) có thể gán macro dễ dàng\" src=\"https://hanoicomputercdn.com/media/lib/05-05-2021/macro-cua-keyboard-gigabyte-aorus-k1-rgb-usb-red-sw.png\" style=\"width:100%\" /></p>\r\n\r\n<h3>Anti-Ghosting</h3>\r\n\r\n<p>Aorus K1 cung cấp tính năng Anti-Ghosting cực kì hữu dụng, đảm bảo cho các tổ hợp phím bấm nhiều và phức tạp được thực hiện 1 cách chính xác nhất. Hỗ trợ đồng thời 64 phím cùng lúc với kết nối USB</p>\r\n\r\n<p><img alt=\"Keyboard Gigabyte Aorus K1 RGB (USB/Red sw) trang bị tính năng anti-ghosting hữu ích\" src=\"https://hanoicomputercdn.com/media/lib/05-05-2021/tinh-nang-anti-ghosting-cua-keyboard-gigabyte-aorus-k1-rgb-usb-red-sw.png\" style=\"width:100%\" /></p>\r\n\r\n<h3>On-The-Fly</h3>\r\n\r\n<p>Các phím chức năng được tích hợp thuận tiện cung cấp khả năng điều khiển đa phương tiện dễ dàng và cho phép bạn tinh chỉnh đèn led một cách thoải mái</p>\r\n\r\n<p><img alt=\"Keyboard Gigabyte Aorus K1 RGB (USB/Red sw) tích hợp phím chức năng tiện lợi\" src=\"https://hanoicomputercdn.com/media/lib/05-05-2021/phim-media-cua-keyboard-gigabyte-aorus-k1-rgb-usb-red-sw.png\" style=\"width:100%\" /></p>\r\n', '18', 0, 18, 14, 1, 1, 6),
(55, 'Tai nghe Kingston HyperX Cloud II Gaming  Red (KHX-HSCP-RD)', 'TNKT003', '2529000', 6, 10, 'Nhật Bản', '1709865967_cloud-ii-red-4_8db24425022743a4a9370e5aaf92ba6f_grande.webp', '<ul>\r\n	<li>Phiên bản Cloud 2 II với công nghệ giả lập âm thanh vòm 7.1</li>\r\n	<li>Sử dụng chiếc Soundcard 7.1, chỉ cần cắm và sử dụng</li>\r\n	<li>Không cần Driver điều chỉnh</li>\r\n	<li>Thiết kế cứng cáp, cảm giác đeo thoải mái trong nhiều giờ</li>\r\n	<li>Chất âm thiên sáng, chi tiết tốt, phù hợp với các game thi đấu ESPORTS</li>\r\n	<li>Microphone có thể được tháo rời thuận tiện</li>\r\n	<li>Được khuyên dùng bởi các game thủ CS:GO chuyên nghiệp</li>\r\n</ul>\r\n', '<p>Trong một vài năm gần đây, dòng sản phẩm HyperX của Kingston đang làm mưa làm gió trên thị trường gaming gear Việt Nam. Vốn chỉ là một thương hiệu chuyên về thiết bị lưu trữ như thẻ nhớ, <a href=\"https://www.hanoicomputer.vn/ram-bo-nho-trong/c32.html\" target=\"_blank\">SSD</a>, <a href=\"https://www.hanoicomputer.vn/ram-bo-nho-trong/c32.html\" target=\"_blank\">RAM</a>.. những tưởng khi lấn sân sang mảng phụ kiện gaming này, Kingston sẽ gặp phải không ít khó khăn. Nhưng với chất lượng của mình, dòng sản phẩm này của Kingston nhanh chóng tạo dựng được thương hiệu trong cộng đồng game thủ đặc biệt là mảng tai nghe. Mới đây, sản phẩm <strong>Tai nghe Kingston HyperX Cloud II Gaming Red</strong> đã được ra mắt. Đây là một mẫu tai nghe chuyên dụng cho game thủ, và được đánh giá là xứng đáng đồng tiền bát gạo.</p>\r\n\r\n<h3>Thiết kế giữ nguyên so với phiên bản cũ</h3>\r\n\r\n<p>Nếu có theo dõi về tin tức của dòng tai nghe Kingston, anh em có thể thấy rằng <a href=\"https://www.hanoicomputer.vn/tai-nghe-kingston-hyperx-cloud-2-gaming-red/p27422.html\">Kingston HyperX Cloud II Gaming</a> có thiết kế không khác mấy so với người anh tiền nhiệm HyperX Cloud. Vốn dĩ thiết kế ban đầu được người dùng đón nhận nhiệt tình, do vậy ở phiên bản này Kingston cũng chả tội gì mà phải thay đổi thiết kế cũ cả. Về mặt cơ bản, Kingston HyperX Cloud II vẫn có Micro có thể tháo rời để tăng tính khả dụng cho từng mục đích của bạn. </p>\r\n\r\n<p><img alt=\"\" src=\"https://www.hanoicomputer.vn/media/lib/tainghekingstonhyperxcloudiigamingred_1.jpg\" style=\"height:478px; width:850px\" /></p>\r\n\r\n<p><strong>Cloud II</strong> được trang bị cáp kết nối dài 1m với đầu jack 3.5mm. Nếu cảm thấy chiều dài của dây hơi ngắn, bạn có thể cắm tai nghe qua Sound Card 7.1 được trang bị sẵn kèm với sản phẩm. Với chiếc Sound card USB được Kingston ưu ái cho chiều dài lên tới 2m bạn cộng với 1m cáp từ tai nghe bạn đã có tổng chiều dài sử dụng lên tới 3m, thoải mái cho bạn sử dụng trong không gian chơi game của mình.</p>\r\n\r\n<p><strong>HyperX Cloud II</strong> có thiết kế over-ear mang lại cảm giác thoải mái cho người sử dụng khi đôi tai của bạn sẽ nằm gọn bên trong ốp lót tai cũng như hạn chế tối đa ảnh hưởng của tiếng ồn bên ngoài. Với thiết kế khung nhôm và các ốp đệm bằng da không chỉ đem lại cảm giác cứng cáp mà lại vô cùng sang trọng cho sản phẩm này. Và một điểm cộng nữa là việc microphone có thể tháo rời tránh vướng víu khi không phải sử dụng đến mic.</p>\r\n\r\n<p>Trong hộp, tai nghe <strong>Kingston HyperX Cloud II Gaming</strong> còn được khuyến mãi thêm một cặp đệm tai nghe dự phòng với chất liệu giả da siêu mềm. Theo mình đánh giá thì phần ốp tai này của HyperX Cloud II tốt hơn nhiều so với các loại đệm nhung đi kèm với mẫu HyperX Cloud trước đây. Phần đệm trong tai được làm với dạng mút bọt rất thoải mái kể cả khi sử dụng trong thời gian dài. Nói tóm lại, HyperX Cloud II có thiết kế vô cùng đơn giản nhưng vô cùng phù hợp với mọi đối tượng game thủ. Ngoài đệm tai chất lượng, HyperX Cloud II vẫn giữ nguyên thiết kế với phần vỏ bằng nhựa cao cấp và khung kim loại bên trong. Sound card USB cũng được làm bằng nhựa. Nó có một nút để kích hoạt âm thanh 7.1 và các nút điều chỉnh âm lượng riêng cho tai nghe và micrô.</p>\r\n\r\n<h3>Âm thanh vòm Virtual 7.1</h3>\r\n\r\n<p>Soundcard 7.1 chính là điểm khác biệt giữa Cloud và Cloud II. Ở phiên bản Cloud II khi sử dụng kèm chiếc soundcard này sẽ đem lại một trải nghiệm “đã hay lại còn hay hơn” so với việc sử dụng cổng cắm 3.5mm bình thường. Theo như Kingston thì chiếc soundcard 7.1 của hãng tạo ra được tối ưu cho các dòng game đặc biệt là dòng game FPS. Với các tựa game bắn súng cơ bản như PUBG, CS-GO hay Battlefield 4, âm thanh vòm được xử lý qua Sound card này sẽ giúp bạn xác định chính xác vị trí của kẻ thù. Âm thanh của tiếng súng được tạo ra từ HyperX Cloud II nghe rất đanh và chắc chắn nhờ âm bass mạnh mẽ. Các vụ nổ từ bom, hay lựu đạn thì sống động như bạn đang chứng kiến chúng trong thực tế vậy.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.hanoicomputer.vn/media/lib/tainghekingstonhyperxcloudiigamingred_2.jpg\" style=\"height:397px; width:850px\" /></p>\r\n\r\n<p>Âm thanh vòm 7.1 của Kingston HyperX Cloud II cho trải nghiệm vô cùng thú vị khi xem phim , đặc biệt là những phim chứa đầy các cảnh hành động hard core. Mô phỏng âm thanh vòm không có nghĩa là cho âm nhạc stereo. Điều đó đồng nghĩa  rằng, khả năng nghe nhạc của Cloud II cũng không tệ. Về trải nghiệm nghe nhạc, mình thực sự thích mids punchy, những âm thanh trong dải tần số cao hơn là hơi thiếu.</p>\r\n\r\n<p> </p>\r\n\r\n<p><img alt=\"Tai nghe Kingston HyperX Cloud 2 Gaming  Red (KHX-HSCP-RD) trang bị âm thanh vòm 7.1\" src=\"https://hanoicomputercdn.com/media/lib/27422_am-thanh-vom-cua-tai-nghe-kingston-hyperx-cloud-2-gaming-red.jpg\" style=\"width:800px\" /></p>\r\n', '21', 0, 21, 14, 1, 0, 6),
(59, 'LapTop ', 'LECV-3245', '350000', 20, 3400000, 'Việt Nam', '1709869284_39022_a515_fb573e53ece9433098c2cff24b0c49b3_master.png', 'Mã SP: LTAU599 | Số lượng có sẵn : 10 sản phẩm | Số lượng đã bán : 3 sản phẩm\r\n\r\nThông Số sản phẩm\r\nCPU: Intel Core i5 1135G7\r\nRAM: 8GB (trống 1 khe ram)\r\nỔ cứng: 512GB SSD (có thể lắp thêm ổ 2.5)\r\nVGA: Nvidia MX330 2GB\r\nMàn hình: 15.6 inch FHD\r\nHĐH: Win 10', '<h3>Cấu hình xịn</h3>\r\n\r\n<p><a href=\"https://www.hanoicomputer.vn/laptop-asus-vivobook?cpu-laptop=intel-core-i5-1-1-1-1\">Laptop Acer Aspire 3 N23H4 </a> – một chiếc Laptop Phổ thông dành cho Văn phòng và Doanh nghiệp, Học sinh – Sinh viên. Aspire 3 N23H4 với giá cả phù hợp cùng thiết kế mỏng nhẹ, thuận tiện. Máy có thiết kế đơn giản nhưng chắc chắn, màn hình 15.6 inch độ phân giải HD, bộ vi xử lý, Intel Core i3, RAM 8GB và ổ cứng SSD 512GB. Máy cũng được trang bị đầy đủ các cổng kết nối như USB 3.0, HDMI, LAN và Wi-Fi. Acer Aspire 3 N23H4 phù hợp cho các nhu cầu văn phòng, học tập và giải trí cơ bản.\r\n\r\n</p>\r\n\r\n<p><img alt=\"Laptop Acer Aspire 3 N23H4 \" src=\"https://hanoicomputercdn.com/media/product/72092_laptop_acer_aspire_3_a314_11.png\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<p> </p>\r\n\r\n<h3>Màn hình</h3>\r\n\r\n<p>Màn hình NanoEdge viền siêu mỏng mang lại trải nghiệm hình ảnh đắm chìm, không gian hình ảnh được mở rộng bằng cách mang đến màn hình lớn hơn trong một khung máy nhỏ hơn. Màn hình Full HD với góc nhìn rộng và khả năng tái tạo màu sắc vượt trội đem lại hình ảnh chân thực, sống động</p>\r\n\r\n<p><img alt=\"Laptop Acer Aspire 3 N23H4 \" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_6.png\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<h3>Bảo mật </h3>\r\n\r\n<p>Truy cập Laptop Acer Aspire 3 N23H4  chưa bao giờ dễ hơn và bảo mật hơn. Với cảm biến vân tay tích hợp tại bàn di chuột và Windows Hello, bạn không cần phải gõ mật khẩu cho mỗi lần đăng nhập – chỉ cần một chạm để mở máy tính!</p>\r\n\r\n<p>Bàn phím fullsize được thiết kế nguyên khối và hành trình phím 1.4mm cho trải nghiệm đánh máy thoải mái, phù hợp cho mọi tác vụ văn phòng.</p>\r\n\r\n<p><img alt=\"Laptop Acer Aspire 3 N23H4 \" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_5.png\" style=\"height:850px; width:850px\" /></p>\r\n\r\n<h3>Cổng cắm đa dạng</h3>\r\n\r\n<p>VivoBook 15 được trang bị cổng USB 3.2 Gen 1 Type-C™ đảo chiều cho việc kết nối các thiết bị dễ dàng hơn. Máy cũng có cổng USB 3.2 Gen 1, USB 2.0, HDMI và khe đọc thẻ microSD – để việc kết nối với các thiết bị ngoại vi, màn hình, máy chiếu thuận tiện hơn.</p>\r\n\r\n<p><img alt=\"Laptop Acer Aspire 3 N23H4 \" src=\"https://hanoicomputercdn.com/media/product/60640_laptop_asus_vivobook_a515ep_bq498t_bac_1.png\" style=\"height:850px; width:850px\" /></p>\r\n', '20', 1, 20, 11, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(50) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(5, '2022-04-01', 3, '41906000', 4),
(6, '2022-04-02', 1, '2179000', 1),
(7, '2022-04-04', 3, '22957000', 1),
(8, '2022-04-06', 6, '64513000', 1),
(9, '2022-04-10', 3, '7237000', 2),
(10, '2022-04-12', 1, '2179000', 1),
(11, '2024-03-08', 1, '18599000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `diachicuthe` text NOT NULL,
  `tinh` varchar(100) NOT NULL,
  `tp` varchar(255) NOT NULL,
  `donhangdamua` int(11) NOT NULL DEFAULT 0,
  `tongtien` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `fullname`, `sdt`, `email`, `hinhanh`, `diachicuthe`, `tinh`, `tp`, `donhangdamua`, `tongtien`) VALUES
(138, 'quan7', '202cb962ac59075b964b07152d234b70', 'Quân Nguyễn 1', '+84853001127', 'qquannguyentrong123@gmail.com', '1649571928_tải xuống.jpg', '09 , Phúc Trung , Phúc thanh 1', 'Ninh Bình', 'Thành phố Ninh Bình', 12, 10435500),
(139, 'quan8', '202cb962ac59075b964b07152d234b70', 'Nguyễn Trọng Quân', '0853001127', 'qquannguyentrong123@gmail.com', '1649773041_tải xuống (3).jpg', '09 , Phúc Trung , Phúc thanh', 'Ninh Bình', 'Thành phố Ninh Bình', 0, 0),
(140, 'quan9', '202cb962ac59075b964b07152d234b70', 'Quân Nguyễn', '+84853001127', 'qquannguyentrong123@gmail.com', '1649521865_tải xuống.jpg', '09 , Phúc Trung , Phúc thành', 'Ninh Bình', 'Thành phố Ninh Bình', 0, 0),
(141, 'quan10', '202cb962ac59075b964b07152d234b70', 'Quân Nguyễn', '+84853001127', 'qquannguyentrong123@gmail.com', '1649562828_tải xuống.jpg', '09 , Phúc Trung , Phúc thanh', 'Ninh Bình', 'Thành phố Ninh Bình', 3, 34695340),
(144, 'ngochuyen', '202cb962ac59075b964b07152d234b70', 'Trần Thị Ngọc Huyền ', '0939643264', 'huyenit20x@gmail.com', '1709869040_7e623b8458fd0f25f56bd6281d80b444.jpg', 'Lợi A', 'Tiền Giang', 'Huyện Cái Bè', 1, 16367120);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time_sale`
--

CREATE TABLE `time_sale` (
  `id` int(11) NOT NULL,
  `time1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `time_sale`
--

INSERT INTO `time_sale` (`id`, `time1`) VALUES
(1, '2024-05-08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_cmt`
--
ALTER TABLE `shop_cmt`
  ADD PRIMARY KEY (`id_comment_shop`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `tbl_danhmucbv`
--
ALTER TABLE `tbl_danhmucbv`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_danhmucsp`
--
ALTER TABLE `tbl_danhmucsp`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_loaisp`
--
ALTER TABLE `tbl_loaisp`
  ADD PRIMARY KEY (`id_loaisp`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `time_sale`
--
ALTER TABLE `time_sale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT cho bảng `shop_cmt`
--
ALTER TABLE `shop_cmt`
  MODIFY `id_comment_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucbv`
--
ALTER TABLE `tbl_danhmucbv`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucsp`
--
ALTER TABLE `tbl_danhmucsp`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisp`
--
ALTER TABLE `tbl_loaisp`
  MODIFY `id_loaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `time_sale`
--
ALTER TABLE `time_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
