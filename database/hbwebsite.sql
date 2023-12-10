-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 03:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'sumiwebdev', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'booked',
  `order_id` varchar(150) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(2, 'IMG_58089.png'),
(3, 'IMG_44124.png'),
(4, 'IMG_30203.png'),
(5, 'IMG_63814.png'),
(6, 'IMG_35161.png'),
(7, 'IMG_52451.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'Phường 11, Gò Vấp, Thành phố Hồ Chí Minh', 'https://maps.app.goo.gl/Ato6wXuTZvrdkqKG7', 84938617409, 84827617709, 'lordnhu8@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31348.59835851001!2d106.66183400000001!3d10.843816!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529b94b7c2d71:0xa417e9929d9312a2!2sSUMI HOTEL!5e0!3m2!1sen!2sus!4v1701421476635!5m2!1sen!2sus');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(8, 'IMG_94554.svg', 'Phòng hội nghị', 'Phòng hội nghị trong khách sạn này được thiết kế để đáp ứng nhu cầu tổ chức các cuộc họp, hội thảo và sự kiện. Phòng có diện tích rộng rãi, trang bị các thiết bị âm thanh, ánh sáng và hệ thống trình chiếu hiện đại. Ngoài ra, phòng hội nghị còn có dịc'),
(10, 'IMG_61605.svg', 'Tủ lạnh', 'Tủ lạnh trong khách sạn này được trang bị để khách hàng lưu trữ và bảo quản thực phẩm và đồ uống. Nó cung cấp không gian rộng rãi và có chức năng điều chỉnh nhiệt độ, đảm bảo thực phẩm luôn được giữ tươi ngon và đồ uống được làm lạnh.'),
(12, 'IMG_42772.svg', 'Máy lạnh', 'Máy lạnh trong khách sạn này đảm bảo khách hàng có một môi trường mát mẻ và thoải mái trong suốt thời gian lưu trú. Nó có hiệu suất cao và có thể điều chỉnh nhiệt độ theo sự ưa thích của khách hàng, mang đến không gian lưu trú mát mẻ và thoáng đãng.'),
(15, 'IMG_84742.svg', 'Wifi', 'Wifi trong khách sạn này được cung cấp miễn phí và có tốc độ nhanh, đảm bảo khách hàng có kết nối Internet ổn định và thuận tiện trong suốt thời gian lưu trú.'),
(16, 'IMG_20178.svg', 'TV', 'TV trong nhà nghỉ là một thiết bị điện tử có màn hình lớn và chất lượng hình ảnh cao. Nó được đặt trong phòng nghỉ để cung cấp cho khách hàng khả năng xem các kênh truyền hình và giải trí. TV thường có các công nghệ hiển thị như LCD, LED hoặc OLED, v'),
(17, 'IMG_39609.svg', 'Điều khiển', 'Thiết bị điều khiển trong khách sạn này tiện lợi và dễ sử dụng. Với nó, khách hàng có thể điều chỉnh ánh sáng, nhiệt độ và các thiết bị điện tử trong phòng một cách thuận tiện, tạo ra một môi trường lưu trú thoải mái và theo ý muốn.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(13, 'Phòng ngủ'),
(14, 'Nhà bếp'),
(15, 'Ban công');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(7, 'Phòng tiêu chuẩn', 200, 200000, 10, 5, 4, 'Phòng tiêu chuẩn', 1, 1),
(8, 'Phòng cao cấp', 400, 250000, 20, 10, 6, 'Cao cấp', 1, 1),
(9, 'Phòng đơn', 250, 300000, 10, 5, 3, 'Phòng đơn là một loại phòng khách sạn có diện tích nhỏ và được thiết kế để phục vụ một người du khách hoặc một cặp đôi. Phòng Đơn thường đi kèm với một giường đơn hoặc giường đôi nhỏ, phòng tắm riêng và các tiện nghi cơ bản như TV, điều hòa nhiệt đới và kết nối Wi-Fi. Phòng Đơn thường là sự lựa chọn phổ biến cho những du khách muốn tiết kiệm chi ph', 1, 1),
(10, 'Phòng cao cấp', 300, 500000, 10, 3, 2, 'Phòng cao cấp là một loại phòng khách sạn mang đến trải nghiệm sang trọng và tiện nghi cao hơn. Phòng Cao cấp thường có diện tích lớn hơn so với phòng tiêu chuẩn, với trang thiết bị và tiện nghi đẳng cấp. Phòng này thường được thiết kế đẹp mắt và sang trọng, với nội thất cao cấp và không gian rộng rãi.\r\nTrong một phòng Cao cấp, bạn có thể mong đợi', 1, 1),
(11, 'Phòng sang trọng', 600, 600000, 5, 8, 6, 'Phòng sang trọng là một loại phòng khách sạn cao cấp nhất, mang đến cho du khách trải nghiệm đẳng cấp và sang trọng tối đa. Phòng Sang trọng thường có diện tích rộng lớn và được thiết kế với sự tinh tế và sự chăm sóc đặc biệt đến từng chi tiết.\r\nTrong một phòng Sang trọng, bạn sẽ tận hưởng không gian rộng rãi và tinh tế, với nội thất cao cấp và các', 1, 1),
(12, 'Phòng', 123, 123, 123, 123, 123, 'P', 1, 1),
(13, 'Phòng tiêu chuẩn', 250, 300000, 10, 5, 3, 'Phòng tiêu chuẩn là một loại phòng khách sạn có diện tích nhỏ và được thiết kế để phục vụ một người du khách hoặc một cặp đôi. Phòng Đơn thường đi kèm với một giường đơn hoặc giường đôi nhỏ, phòng tắm riêng và các tiện nghi cơ bản như TV, điều hòa nhiệt đới và kết nối Wi-Fi. Phòng Đơn thường là sự lựa chọn phổ biến cho những du khách muốn tiết kiệm', 1, 1),
(14, 'Phòng cao cấp', 300, 450000, 10, 3, 2, 'Phòng cao cấp là một loại phòng được thiết kế và trang trí đặc biệt để mang đến trải nghiệm sang trọng và thoải mái cho khách hàng. Dưới đây là mô tả về một phòng cao cấp:\r\nKhi bạn bước vào phòng, bạn sẽ ngay lập tức cảm nhận được không gian rộng rãi, thông thoáng và sang trọng. Sàn nhà được lát bằng sàn gỗ hoặc sàn đá cao cấp, mang lại một cảm giá', 1, 1),
(15, 'Phòng sang trọng', 600, 600000, 5, 9, 6, 'Phòng sang là một loại phòng được thiết kế và trang trí với mục tiêu mang đến sự xa hoa, sang trọng và đẳng cấp. Dưới đây là mô tả về một phòng sang:\r\n\r\nKhi bạn adọ vào phòng, bạn sẽ ngay lập tức cảm nhận được không gian mở rộng, rực rỡ và lộng lẫy. Sàn nhà thường được lát bằng sàn gỗ hoặc đá tự nhiên cao cấp, tạo ra một nền tảng hoàn hảo cho không', 1, 1),
(16, 'Phòng cao cấp', 300, 450000, 10, 3, 2, 'Phòng cao cấp là một loại phòng được thiết kế và trang trí đặc biệt để mang đến trải nghiệm sang trọng và thoải mái cho khách hàng. Dưới đây là mô tả về một phòng cao cấp:\r\nKhi bạn bước vào phòng, bạn sẽ ngay lập tức cảm nhận được không gian rộng rãi, thông thoáng và sang trọng. Sàn nhà được lát bằng sàn gỗ hoặc sàn đá cao cấp, mang lại một cảm giá', 1, 1),
(17, 'Phòng cao cấp', 450, 450000, 10, 3, 2, 'Phòng cao cấp của khách sạn là phòng rộng, sang trọng và được trang bị tiện nghi cao cấp như giường lớn, nội thất sang trọng, phòng tắm riêng và dịch vụ chất lượng.', 1, 1),
(18, 'Phòng sang trọng', 600, 600000, 5, 6, 4, 'Phòng sang trọng là một loại phòng cao cấp với nội thất và trang thiết bị đẳng cấp, tạo cảm giác sang trọng và thoải mái.', 1, 1),
(19, 'Phòng tiêu chuẩn', 250, 250000, 10, 5, 3, 'Phòng tiêu chuẩn là một loại phòng khách sạn có diện tích nhỏ và được thiết kế để phục vụ một người du khách hoặc một cặp đôi. Phòng Đơn thường đi kèm với một giường đơn hoặc giường đôi nhỏ, phòng tắm riêng và các tiện nghi cơ bản như TV, điều hòa nhiệt đới và kết nối Wi-Fi.', 1, 1),
(20, 'Phòng tiêu chuẩn', 200, 200000, 10, 5, 3, 'Phòng tiêu chuẩn là một loại phòng cơ bản, thường có kích thước trung bình và trang bị các tiện nghi cơ bản như giường, bàn làm việc, ghế, tủ quần áo và phòng tắm riêng.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(72, 20, 10),
(73, 20, 12),
(74, 20, 15),
(75, 20, 16),
(76, 20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(71, 20, 13),
(72, 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(44, 20, 'IMG_79454.png', 1),
(45, 20, 'IMG_15745.png', 0),
(46, 20, 'IMG_97324.png', 0),
(47, 20, 'IMG_29736.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'SUMI HOTEL', 'Khách sạn chúng tôi mang đến trải nghiệm tuyệt vời với dịch vụ chuyên nghiệp, phòng sạch sẽ và thoải mái. \nHãy đến và tận hưởng kỳ nghỉ của bạn tại chúng tôi ngay hôm nay!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(8, 'John', 'IMG_58812.png'),
(9, 'Kariel', 'IMG_47331.png'),
(10, 'Linda', 'IMG_64482.png'),
(11, 'Lisa', 'IMG_81738.png'),
(12, 'Olivia', 'IMG_28459.png'),
(13, 'Sofia', 'IMG_59545.png'),
(14, 'Wilson', 'IMG_55281.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 1,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `rm id` (`room_id`),
  ADD KEY `features id` (`features_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
