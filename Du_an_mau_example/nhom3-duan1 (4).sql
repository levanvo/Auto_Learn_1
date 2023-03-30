-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2021 lúc 04:53 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom3-duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_dh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_dh`, `id_sp`, `price`, `quantity`) VALUES
(90, 6, 500000, 3),
(91, 9, 12000, 4),
(93, 6, 500000, 1),
(94, 10, 30000, 4),
(94, 8, 15000, 5),
(99, 9, 12000, 12),
(101, 4, 500000, 4),
(101, 7, 40000, 3),
(102, 7, 40000, 1),
(103, 4, 500000, 4),
(104, 5, 300000, 3),
(105, 9, 12000, 3),
(105, 15, 12000, 3),
(106, 12, 40000, 3),
(106, 8, 15000, 4),
(107, 5, 300000, 4),
(107, 10, 30000, 4),
(107, 9, 12000, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `name`) VALUES
(6, 'hoa quả'),
(7, 'Rau củ'),
(8, 'Hải sản'),
(9, 'Các loại hạt'),
(10, 'Thực phẩm tươi sống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `time` datetime NOT NULL,
  `payments` varchar(250) NOT NULL,
  `id_tt` int(10) NOT NULL DEFAULT 1,
  `id_vc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_dh`, `id_kh`, `phone`, `address`, `note`, `time`, `payments`, `id_tt`, `id_vc`) VALUES
(90, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', '123', '2021-12-03 15:04:14', 'Thanh toán online', 3, 0),
(91, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', '123', '2021-12-09 15:04:49', 'Thanh toán online', 1, 0),
(93, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', '', '2021-12-07 15:05:05', 'Thanh toán khi nhận hàng', 1, 10),
(94, 12, '0123456789', 'dịch vọng - Mai dịch - Trần đức bô - hưng yên', '', '2021-12-09 15:05:27', 'Thanh toán online', 4, 13),
(99, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', '', '2021-10-23 15:23:57', 'Thanh toán online', 3, 12),
(101, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', 'Xin chào ae!', '2021-12-10 00:00:00', 'Thanh toán khi nhận hàng', 1, 0),
(102, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', '', '2021-12-10 00:00:00', 'Thanh toán khi nhận hàng', 3, 10),
(103, 13, '0123456789', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', 'a lô a lô', '2021-08-01 00:00:00', 'Thanh toán khi nhận hàng', 1, 10),
(104, 13, '0123456789', 'thôn 4 - Mường thanh - Mường lái - Thái bình', 'Xin chào ae !', '2021-12-01 00:00:00', 'Thanh toán khi nhận hàng', 2, 12),
(105, 14, '0123456789', 'dịch vọng - Tân Xã - Cầu giấy - Thái bình', 'LINH xinh ', '2021-12-07 00:00:00', 'Thanh toán khi nhận hàng', 4, 0),
(106, 14, '0123456789', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', 'Hello !', '2021-12-06 00:00:00', 'Thanh toán online', 2, 12),
(107, 5, '0359875710', 'Mục Uyên 1 - Tân Xã - Thạch Thất - Hà nội', 'Xin chào ae !', '2021-12-10 00:00:00', 'Thanh toán online', 3, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `avt` varchar(250) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `user`, `avt`, `pass`, `email`, `phone`, `address`, `id_role`) VALUES
(5, 'Lê Văn Vương', 'person_2.jpg', '123456', 'vuonglv@fpt', '0359875710', 'Việt Nam', 1),
(12, 'Bùi Đăng Long', 'person_1.jpg', '123456', 'longbd@fpt', '0123456789', 'Hưng Yên', 1),
(13, 'Nguyễn Xuân Tường', 'person_3.jpg', '123456', 'tuong@fpt', '0123456789', 'Thái Bình', 1),
(14, 'Lê Thị Linh', 'avt.jpg', '123456', 'linh@fpt', '0123456789', 'Thái Bình', 1),
(15, 'khách hàng 1', 'avt.jpg', '123456', 'user@fpt', '1234567890', 'Hà Nội 2', 2),
(16, 'mai xinh', 'anhthe.jpg', '123456', 'maimai@fpt.com', '0123456789', 'Hà nội', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `name`, `email`, `title`, `note`) VALUES
(4, 'Vuong Le Van', 'vuonglv@fpt', 'Phản ánh thái độ phục vụ của nhân viên', 'vào ngày hôm qua tôi có ghép quá của hàng nhưng có 1 anh nhân viên có thái độ xem thường và thiếu tông tọng LONG BD'),
(5, 'Linh xing gái', 'linh@fpt', 'Phản ánh về sản phẩm quá ngon', 'sản phẩm quá ngon nên đã bị tăng cân '),
(6, 'Linh xing gái', 'linh@fpt', 'Phản ánh về sản phẩm quá ngon', 'sản phẩm quá ngon nên đã bị tăng cân ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id_vc` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `startday` varchar(50) NOT NULL,
  `endday` varchar(50) NOT NULL,
  `salemony` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`id_vc`, `code`, `startday`, `endday`, `salemony`, `quantity`) VALUES
(0, '', '', '', 0, 0),
(10, '12/12bigsale', '12/12/2021', '30/12/2021', 0.5, 20),
(12, 'salecuoinam', '01/12/2021', '30/12/2021', 0.3, 10),
(13, 'blackfriday', '24/11/2021', '30/12/2021', 0.2, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

CREATE TABLE `phanhoi` (
  `id_kh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `note_feedback` text NOT NULL,
  `ngaydang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanhoi`
--

INSERT INTO `phanhoi` (`id_kh`, `id_sp`, `note_feedback`, `ngaydang`) VALUES
(5, 11, 'quá chất lượng', '03/12/2021'),
(5, 9, 'chua quá ae ơi !', '07/12/2021'),
(5, 5, 'quá chất lượng', '10/12/2021'),
(13, 4, 'quá chất lượng', '10/12/2021'),
(13, 5, 'ngon bổ rẻ', '10/12/2021'),
(14, 9, 'mua về pha nước uống rất mát ', '10/12/2021'),
(14, 15, 'ngon bổ rẻ', '10/12/2021'),
(14, 12, 'đồ ăn vặt thì rất ngon không béo nha <3', '10/12/2021'),
(5, 5, 'quá chất lượng', '10/12/2021'),
(5, 14, 'Vương đẹp trai', '10/12/2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id_role`, `name`) VALUES
(1, 'Quản trị viên'),
(2, 'Thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` text NOT NULL,
  `new_price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name`, `img`, `new_price`, `old_price`, `description`, `quantity`, `id_dm`) VALUES
(4, 'Thịt bò', 'bo.jpg', 500000, 500000, 'Thịt có màu đỏ tươi, mỡ màu trắng hoặc hơi ngả vàng, thớ thịt nhỏ. Nếu thớ thịt càng nhỏ và mỡ càng trắng thì đó là thịt của bò tơ, thịt mềm.', 42, 10),
(5, 'Thịt Bò CaNaDa', 'bo_canada.jpg', 300000, 500000, 'Thịt có màu đỏ tươi, mỡ màu trắng hoặc hơi ngả vàng, thớ thịt nhỏ. Nếu thớ thịt càng nhỏ và mỡ càng trắng thì đó là thịt của bò tơ, thịt mềm.', 93, 10),
(6, 'Thịt Bò Mĩ', 'bo_mi.jpg', 500000, 500000, 'Thịt có màu đỏ tươi, mỡ màu trắng hoặc hơi ngả vàng, thớ thịt nhỏ. Nếu thớ thịt càng nhỏ và mỡ càng trắng thì đó là thịt của bò tơ, thịt mềm.', 96, 10),
(7, 'Cá Hồi', 'ca_h.jpg', 40000, 40000, 'Một phần cá hồi có chứa khoảng 200 calo, ít chất béo bão hòa, nhiều protein tốt và đây cũng là một trong những nguồn vitamin B12, Kali, sắt và vitamin D rất ...', 96, 8),
(8, 'Cam', 'cam.jpg', 15000, 12000, 'Cam (danh pháp hai phần: Citrus × sinensis) là loài cây ăn quả cùng họ với bưởi. Nó có quả nhỏ hơn quả bưởi, vỏ mỏng, khi chín thường có màu da cam, ...', 87, 6),
(9, 'Chanh', 'chanh.jpg', 12000, 15000, 'Chanh là một số loài thực vật cho quả nhỏ, thuộc chi Cam chanh (Citrus), khi chín có màu xanh hoặc vàng, thịt quả có vị chua.', 73, 6),
(10, 'Đào tiên', 'dao.jpg', 30000, 500000, 'Đào (danh pháp khoa học: Prunus persica) là một loài cây được trồng để lấy quả hay hoa. Nó là một loài cây sớm rụng lá, thân gỗ nhỏ, có thể cao tới 5–10 m.', 81, 6),
(11, 'Dâu tây', 'dau_tay.jpg', 30000, 40000, 'Dâu tây vườn hay gọi đơn giản là dâu tây (danh pháp khoa học: Fragaria × ananassa) là một chi thực vật hạt kín và loài thực vật có hoa thuộc họ Hoa hồng ...', 0, 6),
(12, 'Hạnh nhân', 'hanh_nhan.jpg', 40000, 45000, 'Hạnh nhân là một nguồn cung cấp chất chống oxy hóa tuyệt vời. Chất chống oxy hóa giúp bảo vệ chống lại stress, có thể làm hỏng các phân tử trong tế bào và góp ...', 93, 9),
(13, 'Hạt điều', 'hat_dieu_kho.jpg', 15000, 320000, 'Hạt điều là hạt thuộc họ Anacardium occidentale có nguồn gốc từ Brazil được trồng nhiều ở các tỉnh phía Nam của Việt Nam. Ngoài hương vị thơm ngon thì hạt ...', 0, 9),
(14, 'Hạt óc chó', 'oc_cho.jpg', 300000, 500000, 'Quả óc chó đã được xem là loại hạt tốt cho tim mạch. Các cuộc nghiên cứu trong nhiều thập kỷ qua đã chỉ ra, quả óc chó có vô số lợi ích cho trái tim và hiệu quả ...', 96, 9),
(15, 'Cà rốt', 'product-7.jpg', 12000, 15000, 'Cà rốt(danh pháp hai phần: Solanum lycopersicum), thuộc họ Cà (Solanaceae), là một loại rau quả làm thực phẩm. Quả ban đầu có màu xanh, chín ngả màu từ ...', 4, 7),
(16, 'Súp lơ', 'sup_lo.jpg', 15000, 45000, 'Súp lơ là một loại rau họ cải có nhiều chất xơ, khoáng chất, chất chống oxy hóa tự nhiên. Nhờ đặc tính này mà súp lơ có tác dụng kháng viêm, chống ung thư, ...', 200, 7),
(17, 'Thịt lợn', 'thit_lon.jpg', 15000, 500000, 'Hãy cùng Organica khám phá 20 trong số các món ăn độc đáo và hấp dẫn từ thịt heo góp phần làm cho bữa cơm gia đình mình được phong phú hớn nhé!', 100, 10),
(20, 'Cá hồi châu Âu', 'ca_hoi.jpg', 250000, 300000, 'Để giữ vị tươi ngon tự nhiên vốn có trong thịt cá hồi mà vẫn chế biến được một món ăn vừa ngon vừa đơn giản, bạn có thể thử món cá hồi áp chảo. Cá hồi có thể được chế biến theo rất nhiều cách như cá hồi áp chảo sốt bơ chanh, sốt cam, giúp thịt cá hồi mềm béo đậm vị, có chút chua chua ngọt ngọt, lạ miệng nhưng cực hấp dẫn.  Bạn cũng có thể thử áp chảo cá hồi cùng với sốt mayonnaise thơm béo, sốt mật ong thơm lừng hoặc áp chảo cùng với sốt teriyaki, tất cả đều cho ra hương vị tuyệt vời riêng biệt, thử ngay nào!', 20, 8),
(21, 'Hành Tây', 'hanh_tay.jpg', 15000, 15000, 'Hành tây thực phẩm thuộc họ Hành. Khi sử dụng hành tây sẽ khiến cho hơi thở bị bốc mùi hoặc cay mắt chảy nước là do thành phần hợp chất trong hành có chứa lưu huỳnh. Tuy nhiên, theo các chuyên gia những hợp chất này là thành phần chính quyết định lợi ích của hành đối với sức khoẻ. Vậy, ăn hành tây như thế nào để phát huy được lợi ích của nó.', 20, 7),
(22, 'Nho Trung Quốc', 'nho.jpg', 200000, 250000, 'Nho là một loại quả mọng lấy từ các loài cây thân leo thuộc chi Nho (Vitis). Quả nho mọc thành chùm từ 6 đến 300 quả, chúng có màu đen, lam, vàng, lục, đỏ-tía hay trắng. Khi chín, quả nho có thể ăn tươi hoặc được sấy khô để làm nho khô, cũng như được dùng để sản xuất các loại rượu vang, thạch nho, nước quả, mật nho, dầu hạt nho. Trong tiếng Trung, nó được gọi là bồ đào (葡萄) và khi người ta nói đến rượu bồ đào tức là rượu sản xuất từ quả nho. Tuy nhiên, các loài nho dại lại bị coi là một loại cỏ dại gây nhiều phiền toái, do chúng che phủ các loài thực vật khác với tốc độ tăng trưởng rất nhanh của mình. Nho bị ấu trùng của một số loài côn trùng thuộc bộ Lepidoptera phá hại - xem thêm tại Danh sách các loài cánh vẩy phá hại nho.', 50, 6),
(23, 'Táo tàu', 'tao.jpg', 40000, 50000, 'Một quả táo mỗi ngày thực sự có thể khiến bạn tránh xa bác sĩ. Một nghiên cứu về việc ăn táo trên những người phụ nữ mãn kinh cho thấy, những người ăn hai quả táo vừa mỗi ngày trong vòng một năm đã giảm 23% cholesterol xấu (LDL). Nguyên nhân của sự suy giảm cholesterol xấu này đến từ pectin (một chất xơ mạnh mẽ) đã liên kết với cholesterol và quét chúng ra khỏi cơ thể. Táo giúp điều chỉnh lượng đường trong máu và kiểm soát sự thèm ăn. Nhiều nghiên cứu còn cho thấy ăn táo sẽ giúp giảm cân.', 50, 6),
(24, 'Vải thiều châu Phi', 'vai.jpg', 200000, 250000, 'Vải là cây thường xanh với kích thước trung bình, có thể cao tới 15–20 m, có lá hình lông chim mọc so le, mỗi lá dài 15–25 cm, với 2-8 lá chét ở bên dài 5–10 cm và không có lá chét ở đỉnh. Các lá non mới mọc có màu đỏ đồng sáng, sau đó chuyển dần thành màu xanh lục khi đạt tới kích thước cực đại. Hoa nhỏ màu trắng ánh xanh lục hoặc trắng ánh vàng, mọc thành các chùy hoa dài tới 30 cm.', 20, 6),
(25, 'Tôm Hoàng Đế', 'tom.jpg', 950000, 1000000, 'Thịt tôm rất nhiều chất dinh dưỡng, tốt cho sức khỏe, làm giảm nguy cơ mắc bệnh tim mạch. - Tôm Hùm thích hợp dùng cho ngày tiệc cuối tuần, ngày lễ ăn uống cùng gia đình.  - Quà biếu sang trọng tặng bạn bè, người thân, đồng nghiệp, sếp.', 50, 8),
(26, 'Cà chua Boom', 'product-5.jpg', 25000, 25000, 'Đầu tiên, chúng ta cần rửa sạch hết tất cả nguyên liệu trước khi chế biến để đảm bảo an toàn thực phẩm. Tuy nhiên, điều quan trọng là bạn có thể phân biệt được tôm tươi và tôm bơm tạp chất. Để nhận biết tôm có bơm tạp chất hay không bạn cần chú ý như sau: Tôm tươi sạch thường không xòe đuôi, mà lại cúp đuôi xuống, tôm bơm tạp chất sẽ nhanh chết hơn hơn tôm tươi sạch. Tôm bị bơm thường có mang cứng, thẳng đơ, phồng căng trong khi mang tôm thường mềm, phẳng.Vì thế khi mua tôm thì chúng ta nên mua những con tôm còn sống khỏe mạnh nhé.', 20, 7),
(27, 'Bắp cải tím', 'product-4.jpg', 250000, 250000, 'Bắp cải tím chứa chất phytonutrients, có thể hỗ trợ giảm viêm mạn tính. Bên cạnh đó, một hợp chất khác là sulforaphane (tìm thấy trong nhiều loại rau họ cải) được biết đến với khả năng đầy lùi viêm nhiễm một cách tích cực.', 20, 7),
(28, 'Đậu quả', 'product-3.jpg', 180000, 200000, 'Cây họ đậu (tiếng Anh: legume) là một loại cây thuộc họ Fabaceae (hoặc Leguminosae), hoặc quả hoặc hạt của cây đó (còn được gọi là xung, đặc biệt là trong điều kiện khô, trưởng thành). Cây họ đậu được trồng trong nông nghiệp, chủ yếu được con người tiêu thụ, làm thức ăn ủ chua cho gia súc và làm phân xanh tăng cường cho đất. Các loại đậu nổi tiếng bao gồm cỏ linh lăng, cỏ ba lá, đậu, đậu Hà Lan, đậu xanh, đậu lăng, đậu lupin, cây gỗ thông vàng (mesquite), minh quyết, đậu nành, đậu phộng và me. Các loại đậu tạo ra một loại quả độc đáo - một loại quả khô đơn giản phát triển từ một lá noãn đơn giản và thường tách vỏ (mở dọc theo một đường gân) ở hai bên.', 20, 7),
(29, 'Ớt Chuông', 'product-1.jpg', 200000, 200000, 'Ớt chuông có thành phần chất dinh dưỡng khá giàu gồm: vitamin A, vitamin C và các chất dinh dưỡng khác. Hàm lượng vitamin A trong 149 gam chuông xanh cung cấp khoảng 551 IU vitamin A, tương đương với một chén nhỏ. Tuy nhiên, hàm lượng vitamin A trong ớt chuông đỏ nhiều hơn và tốt hơn cho sự phát triển của thị lực và mắt. Sử dụng một chén ớt xắt nhỏ với nhiều màu sắc có thể cung cấp hơn 100% giá trị hàng ngày.', 50, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `img` text NOT NULL,
  `ngaydang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `title`, `content`, `img`, `ngaydang`) VALUES
(3, ' \"Black-Friday\" giảm giá ưu đãi khi nhập ngay voucher \"12/12bigsale\"', 'Với mức giảm khủng 50-90%, thậm chí là 0 đồng, Black Friday trở thành mùa mua sắm giảm giá lớn nhất năm được nhiều người săn đón.', 'Black-Friday-3.jpg', '28/11/2021'),
(4, 'Nhanh tay nhập ngay voucher \"salecuoinam\" để nhận ngay ưu đãi lên đến 30%', 'Với mức giảm khủng 50-90%, thậm chí là 0 đồng, Black Friday trở thành mùa mua sắm giảm giá lớn nhất năm được nhiều người săn đón.', 'daytayden.jpg', '28/11/2021'),
(6, 'Vegefoods đạt được được danh hiệu Thực phẩm \"Sạch - An toàn chất lượng\"', 'Vegefoods -  Vinh dự nhận giải thưởng Top 100 doanh nghiệp Thực phẩm sạch - Chất lượng cao Vietnam Top Food 2016', 'giaithuong.jpg', '27/05/2021'),
(7, 'Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù quáng', 'Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.', 'image_4.jpg', '27/11/2021'),
(8, 'Ngay cả Pointing toàn năng cũng không kiểm soát được các văn bản mù quáng', 'Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt.', 'image_2.jpg', '27/05/2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `id_tt` int(11) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthaidonhang`
--

INSERT INTO `trangthaidonhang` (`id_tt`, `trangthai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Xác nhận thành công'),
(3, 'Đang vận chuyển'),
(4, 'Giao hàng thành công');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `lk_chitietdonhang_donhang` (`id_dh`),
  ADD KEY `lk_sp_chitietdonhang` (`id_sp`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD UNIQUE KEY `id_dh` (`id_dh`),
  ADD KEY `lk_user_donhang` (`id_kh`),
  ADD KEY `lk_donhang_trangthai` (`id_tt`),
  ADD KEY `lk_donhang_magiamgia` (`id_vc`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`),
  ADD KEY `lk_user_phanquyen` (`id_role`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id_vc`);

--
-- Chỉ mục cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD KEY `lk_user_phanhoi` (`id_kh`),
  ADD KEY `lk_phanhoi_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `lk_dm-sp` (`id_dm`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- Chỉ mục cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`id_tt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id_vc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `lk_chitietdonhang_donhang` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_sp_chitietdonhang` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `lk_donhang_trangthai` FOREIGN KEY (`id_tt`) REFERENCES `trangthaidonhang` (`id_tt`),
  ADD CONSTRAINT `lk_user_donhang` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `lk_user_phanquyen` FOREIGN KEY (`id_role`) REFERENCES `phanquyen` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `lk_phanhoi_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_user_phanhoi` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_dm-sp` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
