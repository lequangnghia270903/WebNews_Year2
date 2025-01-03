-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 03:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doancs2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangxephang`
--

CREATE TABLE `bangxephang` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `tendoibong` varchar(30) NOT NULL,
  `sotran` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `hoa` int(11) NOT NULL,
  `thua` int(11) NOT NULL,
  `tg` int(11) NOT NULL,
  `th` int(11) NOT NULL,
  `hs` int(11) NOT NULL,
  `diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bangxephang`
--

INSERT INTO `bangxephang` (`id`, `anh`, `tendoibong`, `sotran`, `thang`, `hoa`, `thua`, `tg`, `th`, `hs`, `diem`) VALUES
(1, 'Mancity.jpg', 'Man City', 14, 10, 2, 2, 40, 14, 26, 32),
(2, 'arsenal', 'Arsenal', 14, 12, 1, 1, 33, 11, 22, 37),
(3, 'newcastle', 'Newcastle', 15, 8, 6, 1, 29, 11, 18, 30),
(4, 'totenham', 'Tottenham', 15, 9, 2, 4, 31, 21, 10, 29),
(5, 'mu.jpg', 'Man United', 14, 8, 2, 4, 20, 20, 0, 26),
(6, 'liver.jpg', 'Liverpool', 14, 6, 4, 4, 28, 17, 11, 22),
(7, 'brighton.jpg', 'Brighton', 14, 6, 3, 5, 23, 19, 4, 21),
(8, 'chelsea.jpg', 'Chelsea', 14, 6, 3, 5, 17, 17, 0, 21),
(9, 'fulham.jpg', 'Fulham', 15, 5, 4, 6, 24, 26, -2, 19),
(10, 'brentford.jpg', 'Brentford', 15, 5, 4, 6, 24, 26, -2, 19),
(11, 'crystal.jpg', 'Crystal Palace', 14, 5, 4, 5, 15, 18, -3, 19),
(12, 'astonvilla.jpg', 'Aston Villa', 15, 5, 3, 7, 16, 22, -6, 18),
(13, 'leicester.jpg', 'Leicester City', 15, 5, 2, 8, 25, 25, 0, 17),
(14, 'bournemouth.jpg', 'Bournement', 15, 4, 4, 7, 22, 26, -4, 15),
(15, 'ledds.jpg', 'Leeds United', 14, 4, 3, 7, 22, 26, -4, 15),
(16, 'westham.jpg', 'West Ham', 15, 4, 2, 9, 12, 17, -5, 14),
(17, 'everton.jpg', 'Everton', 15, 3, 5, 7, 11, 17, -6, 14),
(18, 'nottm.jpg', 'Nottm Forest', 15, 3, 4, 8, 11, 30, -19, 13),
(19, 'southampton.jpg', 'Southampton', 15, 3, 3, 9, 13, 27, -14, 12),
(20, 'wolves.jpg', 'Wolves', 15, 2, 4, 9, 8, 24, -16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `noidung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bxhc1`
--

CREATE TABLE `bxhc1` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `tendoituyen` varchar(20) NOT NULL,
  `sotran` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `hoa` int(11) NOT NULL,
  `thua` int(11) NOT NULL,
  `banthang` int(11) NOT NULL,
  `banthua` int(11) NOT NULL,
  `heso` int(11) NOT NULL,
  `diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bxhc1`
--

INSERT INTO `bxhc1` (`id`, `anh`, `tendoituyen`, `sotran`, `thang`, `hoa`, `thua`, `banthang`, `banthua`, `heso`, `diem`) VALUES
(1, 'napoli.jpg', 'Napoli', 6, 5, 0, 1, 20, 6, 14, 15),
(2, 'liver.jpg', 'Liverpool', 6, 5, 0, 1, 17, 6, 11, 15),
(4, 'ajax.jpg', 'Ajax', 6, 2, 0, 4, 11, 16, -5, 6),
(5, 'rangers', 'Rangers', 6, 0, 0, 6, 2, 22, -20, 0),
(6, 'porto.jpg', 'Porto', 6, 4, 0, 2, 14, 7, 5, 12),
(7, 'clubbrugge.jpg', 'Club Brugge', 6, 3, 2, 1, 7, 4, 3, 11),
(8, 'bayer-leverkusen.jpg', 'Bayer Leverkusen', 6, 1, 2, 3, 4, 8, -4, 5),
(9, 'atletico.jpg', 'Atlético Madrid', 6, 1, 2, 3, 5, 9, -4, 5),
(10, 'bayern.jpg', 'Bayern Munchen', 6, 6, 0, 0, 18, 2, 16, 18),
(11, 'inter.jpg', 'Inter Milan', 6, 3, 1, 2, 10, 7, 3, 10),
(12, 'barcelona.jpg', 'Barcelona', 6, 2, 1, 3, 12, 12, 0, 7),
(13, 'viktoria.jpg', 'Viktoria Plzen', 6, 0, 0, 6, 5, 24, -19, 0),
(14, 'tottenham.jpg', 'Tottenham Hotspur', 6, 3, 2, 1, 8, 6, 12, 11),
(15, 'frankfurt.jpg', 'Eintracht Frankfurt', 6, 3, 1, 2, 7, 8, -1, 10),
(16, 'sporting.jpg', 'Sporting Cp', 6, 2, 1, 3, 8, 9, -1, 7),
(17, 'marseille.jpg', 'Olympique Marseille', 6, 2, 0, 4, 8, 8, 0, 6),
(18, 'chelsea.jpg', 'Chelsea', 6, 4, 1, 1, 10, 4, 6, 13),
(19, 'milan.jpg', 'Milan', 6, 3, 1, 2, 12, 7, 5, 10),
(20, 'salzburg.jpg', 'Salzburg', 6, 1, 3, 2, 5, 9, -4, 6),
(21, 'dinamo.jpg', 'Dinamo Zagreb', 6, 1, 1, 4, 4, 11, -7, 4),
(22, 'real.jpg', 'Real Madrid', 6, 4, 1, 1, 15, 6, 9, 13),
(23, 'leipzig.jpg', 'RB Leipzig', 6, 4, 0, 2, 13, 9, 4, 12),
(24, 'shakhtar.jpg', 'Shakhtar Donetsk', 6, 1, 3, 2, 8, 10, -2, 6),
(25, 'celtic.jpg', 'Celtic', 6, 0, 2, 4, 4, 15, -11, 2),
(26, 'mancity.jpg', 'Manchester City', 6, 4, 2, 0, 14, 2, 12, 14),
(27, 'dortmund.jpg', 'Borussia Dortmund', 6, 2, 3, 1, 10, 5, 5, 9),
(28, 'sevilla.jpg', 'Sevilla', 6, 1, 2, 3, 6, 12, -6, 5),
(29, 'kobenhavn.jpg', 'Kobenhavn', 6, 0, 3, 3, 1, 12, -11, 3),
(30, 'benfica.jpg', 'Benfica', 6, 4, 2, 0, 16, 7, 9, 14),
(31, 'psg.jpg', 'PSG', 6, 4, 2, 0, 16, 7, 9, 14),
(32, 'juve.jpg', 'Juventus', 6, 1, 0, 5, 9, 13, -4, 3),
(33, 'maccabi.jpg', 'Maccabi Haifa', 6, 1, 0, 5, 7, 21, -14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bxhlaliga`
--

CREATE TABLE `bxhlaliga` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `tendoituyen` varchar(20) NOT NULL,
  `sotran` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `hoa` int(11) NOT NULL,
  `thua` int(11) NOT NULL,
  `banthang` int(11) NOT NULL,
  `banthua` int(11) NOT NULL,
  `heso` int(11) NOT NULL,
  `diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bxhlaliga`
--

INSERT INTO `bxhlaliga` (`id`, `anh`, `tendoituyen`, `sotran`, `thang`, `hoa`, `thua`, `banthang`, `banthua`, `heso`, `diem`) VALUES
(1, 'barcelona.jpg', 'Barcelona', 14, 12, 1, 1, 33, 5, 28, 37),
(2, 'real.jpg', 'Real Madrid', 14, 11, 2, 1, 33, 14, 19, 35),
(4, 'sociedad.jpg', 'Sociedad', 14, 8, 2, 4, 19, 17, 2, 26),
(5, 'athletic.jpg', 'Athlectic Club', 14, 7, 3, 4, 24, 14, 10, 24),
(6, 'atletico.jpg', 'Atlético Madrid', 14, 7, 3, 4, 21, 14, 7, 24),
(7, 'realbetis.jpg', 'Real Betis', 14, 7, 3, 4, 17, 12, 5, 24),
(8, 'osasuna.jpg', 'Osasuna', 14, 7, 2, 5, 16, 14, 2, 23),
(9, 'rayo.jpg', 'Rayo Vallecana', 14, 6, 4, 4, 20, 16, 4, 22),
(10, 'villareal.jpg', 'Villarreal', 14, 6, 3, 5, 15, 10, 5, 21),
(11, 'valencia.jpg', 'Valencia', 14, 5, 4, 5, 22, 15, 7, 19),
(12, 'mallorca.jpg', 'Mallorca', 14, 5, 4, 5, 13, 13, 0, 19),
(13, 'valladolid.jpg', 'Real Valladolid', 14, 5, 2, 7, 13, 21, -8, 17),
(14, 'girno.jpg', 'Girona', 14, 4, 4, 6, 20, 22, -2, 16),
(15, 'almeria.jpg', 'Almeria', 14, 5, 1, 8, 16, 22, -6, 16),
(16, 'getafe.jpg', 'Getafe', 14, 3, 5, 6, 12, 20, -8, 14),
(17, 'espanyol.jpg', 'Espanyol', 14, 2, 6, 6, 16, 22, -6, 12),
(18, 'celta.jpg', 'Celta de Vigo', 14, 3, 3, 8, 14, 26, -12, 12),
(19, 'sevilla.jpg', 'Sevilla', 14, 2, 5, 7, 13, 22, -9, 11),
(20, 'cadiz.jpg', 'Cádiz', 14, 2, 5, 7, 9, 26, -17, 11),
(21, 'elche.jpg', 'Elche', 14, 0, 4, 10, 10, 31, -21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bxhwc`
--

CREATE TABLE `bxhwc` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `doituyen` varchar(20) NOT NULL,
  `sotran` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `hoa` int(11) NOT NULL,
  `thua` int(11) NOT NULL,
  `banthang` int(11) NOT NULL,
  `banthua` int(11) NOT NULL,
  `hieuso` int(11) NOT NULL,
  `diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bxhwc`
--

INSERT INTO `bxhwc` (`id`, `anh`, `doituyen`, `sotran`, `thang`, `hoa`, `thua`, `banthang`, `banthua`, `hieuso`, `diem`) VALUES
(1, 'halan.jpg', 'Hà Lan', 3, 2, 1, 0, 5, 1, 4, 7),
(2, 'senegal.jpg', 'Senegal', 3, 2, 0, 1, 5, 4, 1, 6),
(4, 'ecuaddor.jpg', 'Ecuador', 3, 1, 1, 1, 4, 3, 1, 4),
(5, 'qatar.jpg', 'Qatar', 3, 0, 0, 3, 1, 7, -6, 0),
(6, 'anh.jpg', 'Anh', 3, 2, 1, 0, 9, 2, 7, 7),
(7, 'my.jpg', 'Mỹ', 3, 1, 2, 0, 2, 1, 1, 5),
(8, 'iran.jpg', 'Iran', 3, 1, 0, 2, 4, 7, -3, 3),
(9, 'wales.jpg', 'Wales', 3, 0, 1, 2, 4, 7, -3, 3),
(10, 'argentina.jpg', 'Argentina', 3, 2, 0, 1, 5, 2, 3, 6),
(11, 'balan.jpg', 'Balan', 3, 1, 1, 1, 2, 2, 0, 4),
(12, 'mexico.jpg', 'Mexico', 3, 1, 1, 1, 2, 3, -1, 4),
(13, 'saudi.jpg', 'Saudi Arabia', 3, 1, 0, 2, 3, 5, -2, 3),
(14, 'phap.jpg', 'Pháp', 3, 2, 0, 1, 6, 3, 3, 6),
(15, 'uc.jpg', 'Australia', 3, 2, 0, 1, 3, 4, -1, 6),
(16, 'tunisia.jpg', 'Tunisia', 3, 1, 1, 1, 1, 1, 0, 4),
(17, 'danmach.jpg', 'Đan mạch', 3, 0, 1, 2, 1, 3, -2, 1),
(18, 'taybannha.jpg', 'Tây Ban Nha', 2, 1, 1, 0, 8, 1, 7, 4),
(19, 'nhatban.jpg', 'Nhật Bản', 2, 1, 0, 1, 2, 2, 0, 3),
(20, 'costa.jpg', 'Costa Rica', 2, 1, 0, 1, 1, 7, -6, 3),
(21, 'duc.jpg', 'Đức', 2, 0, 1, 1, 2, 3, -1, 1),
(22, 'croatina.jpg', 'Croatia', 2, 1, 1, 0, 4, 1, 3, 4),
(23, 'morocco.jpg', 'Morocco', 2, 1, 1, 0, 2, 0, 2, 4),
(24, 'bi.jpg', 'Bỉ', 2, 1, 0, 1, 1, 2, -1, 3),
(25, 'canada.jpg', 'Canada', 2, 0, 0, 2, 1, 5, -4, 0),
(26, 'brazil.jpg', 'Brazil', 2, 2, 0, 0, 3, 0, 3, 6),
(27, 'thuysi.jpg', 'Thụy Sĩ', 2, 1, 0, 1, 1, 3, 0, 3),
(28, 'cameroon.jpg', 'Cameroon', 2, 0, 1, 1, 3, 4, -1, 1),
(29, 'serbia.jpg', 'Serbia', 2, 0, 1, 1, 3, 5, -2, 1),
(30, 'bodaonha.jpg', 'Bồ Đào Nha', 2, 0, 0, 0, 5, 2, 3, 6),
(31, 'gana.jpg', 'Ghana', 2, 1, 0, 1, 5, 5, 0, 3),
(32, 'hanquoc.jpg', 'Hàn Quốc', 2, 0, 1, 1, 2, 3, -1, 1),
(33, 'uruguay.jpg', 'Uruguay', 2, 0, 1, 1, 0, 2, -2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuctintuc`
--

CREATE TABLE `danhmuctintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `anh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmuctintuc`
--

INSERT INTO `danhmuctintuc` (`id`, `tieude`, `anh`) VALUES
(1, 'Trực tiếp bóng đá Benfica vs Liverpool 2h00<br>\nngày 6/4 (Champions League 2021/22)', 'Tin-1.webp'),
(2, 'Trực tiếp Man City vs Atletico Madrid 2h00<br>\nngày 6/4 (Champions League 2021/22)', 'Tin-2.webp'),
(5, 'Ronaldo chia tay đồng đội ở Juventus, sắp<br>\ncập bến Man United?', 'Tin-3.png'),
(6, 'Messi tuyên bố sau khi gia nhập PSG:phù<br> hợp với tham vọng của tôi', 'Tin-4.jpeg'),
(7, '(Quả bóng Vàng 2021) Bảng xếp hạng các<br>ứng viên: Ai có thể ngăn cản Messi?', 'Tin-5.webp'),
(8, 'Arsenal tự bắn vào chân trong cuộc đua Top 4', 'Tin-6.jpg'),
(9, 'Erik ten Hag xác định 2 tân binh đầu tiên<br> sau khi đến MU', 'Tin-7.jpg'),
(10, 'Xác nhận: Chủ nhân FIFA The Best 2021 sẵn<br> sàng gia nhập Barca', 'Tin-8.jpeg'),
(11, 'Son Heung Min rực sáng với hat-trick: Vượt <br>mặt Torres - Hazard', 'tin-10.jpg'),
(12, 'MU thua đội đua trụ hạng Everton, Rangnick và <br>De Gea nói lời cay đắng', 'tin-11.jpg'),
(13, 'Levante – Barcelona: Quyết giành 3 điểm bám <br>đuổi Real Madrid (Vòng 31 La Liga)', 'tin-12.jpg'),
(22, 'Xavi hài lòng dù Barcelona hòa hú vía', 'tin-13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lichthidau`
--

CREATE TABLE `lichthidau` (
  `id` int(11) NOT NULL,
  `thoigian` time NOT NULL,
  `ngay` datetime NOT NULL,
  `doi1` varchar(20) NOT NULL,
  `tiso` int(11) NOT NULL,
  `doi2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tin`
--

CREATE TABLE `tin` (
  `id` int(10) NOT NULL,
  `tieudetin` text NOT NULL,
  `anh` varchar(50) NOT NULL,
  `noidung` text NOT NULL,
  `idtintuc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tin`
--

INSERT INTO `tin` (`id`, `tieudetin`, `anh`, `noidung`, `idtintuc`) VALUES
(1, 'Trực tiếp bóng đá Benfica vs Liverpool 2h00<br>\r\nngày 6/4 (Champions League 2021/22)', 'Tin-1.webp', '<h5>Nhận định bóng đá Benfica vs Liverpool: Trở lại mạch thắng </h5>\r\n<br>\r\n<h5>Liverpool đang có phong độ ấn tượng tại giải quốc nội cũng như Champions League, dù để thua Inter Milan ở trận lượt về vòng 1/8 cúp C1, nhưng sau đó đội bóng nước Anh đã vực dậy tinh thần với 4 chiến thắng liên tiếp gần đây.</h5>\r\n<br>\r\n<h5>Dù vậy, làm khách trước Benfica, HLV Jurgen Klopp cần phải thận trọng bởi lúc này ông không có trong tay đội hình mạnh nhất. Salah chưa chắc có thể đá chính, trong khi Mane và Diaz cũng có thể phải được ngồi dự bị.</h5>\r\n\r\n\r\n<h5>Liverpool được đánh giá cao hơn đối thủ dù phải thi đấu trên sân khách\r\nLịch sử đối đầu cho thấy Liverpool luôn thất thế trước Benfica khi phải làm khách. Tuy nhiên, kết quả chung cuộc The Kop đều giành chiến thắng, đây có thể là điểm tựa tinh thần dành cho đại diện đến từ Ngoại hạng Anh.</h5>\r\n<br>\r\n<h5>Thế nhưng Liverpool hiện tại đã khác, họ thi đấu dưới sự dẫn dắt của HLV Klopp và chiến thắng là điều họ hướng tới trước Benfica.\r\n\r\nVề phía Benfica, chắc chắn họ bị đánh giá thấp hơn ở trận đối đầu này. Ngay cả chuyên trang dự đoán Five Thirty Eight dựa và các phân tích từ siêu máy tính, họ cho rằng Benfica chỉ có 18% cơ hội vượt qua Liverpool ở vòng tứ kết lần này.\r\n\r\n\r\nBenfica có thể kỳ vọng chiến thắng trên sân nhà\r\nTrong bóng đá bất cứ điều gì cũng có thể xảy ra, vì vậy NHM Benfica vẫn kỳ vọng vào chiến thắng trên sân nhà, qua đó mang về lợi thế để tự tin hơn khi hành quân tới Anfield.\r\n\r\nXem trực tiếp Benfica vs Liverpool ở đâu? Kênh nào?\r\nTruyền hình FPT là đơn vị sở hữu bản quyền phát sóng Champions League, vì vậy quý độc giả có thể theo dõi trận đấu lượt đ vòng tứ kết cúp C1 giữa Benfica vs Liverpool trên hệ thống kênh của Truyền hình FPT và ứng dụng FPT Play.</h5>', 1),
(2, 'Ronaldo chia tay đồng đội ở Juventus, sắp cập bến Man United?', 'Tin-3.png', '<h3>Thương vụ trở về M.U của Cristiano Ronaldo kịch tính như một bom tấn điện ảnh của Hollywood. 3 ngày trước khi trở lại nước Anh, Ronaldo vẫn tập luyện cùng Juventus.</h3>\r\n<br>\r\n<h3>Người đại diện Jorge Mendes khi ấy đang đàm phán với Manchester City (Man City) để đưa Ronaldo đến chơi cho đội chủ sân Etihad. Ronaldo dường như đã “xuôi” với phương án trở thành học trò của Pep Guardiola. </h3>\r\n<h3>Đó là lựa chọn đúng về tình. Old Trafford là bệ phóng đưa Ronaldo lên đỉnh cao sự nghiệp. Tại M.U, Ronaldo được cổ động viên, đồng đội yêu mến như một huyền thoại. Anh chiếm một suất đá chính và có khởi đầu như mơ với 2 bàn\r\nthắng vào lưới Newcastle United.</h3>\r\n<h3>Dù vậy, tuần trăng mật ngắn ngủi của Ronaldo sớm khép lại. M.U thua 6/7 trận gần nhất ở Ngoại hạng Anh, HLV Ole Solskjaer bị sa thải. Ronaldo cùng M.U đang đứng trước mùa giải tăm tối.</h3>\r\n<br>\r\n<h3>Ronaldo vẫn chơi tốt như thói quen. 5 bàn thắng ở Champions League của anh giúp M.U giành 7 điểm, đứng đầu bảng F dù chơi thiếu thuyết phục. Nhưng, đội bóng thành Manchester chưa phải bệ phóng phù hợp để Ronaldo nghĩ đến những\r\ndanh hiệu cuối sự nghiệp.</h3>\r\n<h3>Chia sẻ trên Sky Sports, chuyên gia bóng đá Paul Merson đánh giá: “Ronaldo đã phá hỏng kế hoạch của Solskjaer. Cậu ấy không phù hợp với lối đá phản công, khiến M.U không thể chơi phản công.</h3>\r\n<br>\r\n<h3> Ronaldo vẫn chơi tốt, nhưng M.U không cần một cầu thủ, dồn bóng để anh ta ghi 20 bàn mỗi mùa. Họ cần một đội bóng đúng nghĩa. Khi đưa Ronaldo trở về, M.U đã tự ném mình khỏi cuộc đua vô địch”.</h3>', 5),
(3, 'Trực tiếp Man City vs Atletico Madrid 2h00\r\nngày 6/4 (Champions League 2021/22)', 'Tin-2.webp', '<h5>(Techz) Trực tiếp Man City vs Atletico Madrid; Trực tiếp bóng đá Man City vs Atletico Madrid; Trực tiếp tứ kết Champions League hôm nay; Trực tiếp Man City vs Atletico Madrid trên FPT Play; Xem trực tiếp bóng đá Man City vs Atletico Madrid; Trực tiếp cúp C1 hôm nay.\r\n<br>\r\nNhận định bóng đá Man City vs Atletico Madrid:<br> \r\nMan City là một trong những đội bóng được đánh giá cao nhất ở mùa bóng năm nay, họ không chỉ có phong độ tốt tại Ngoại hạng Anh, tại đấu trường châu Âu đoàn quân áo xanh thành Manchester cũng đã thể hiện sức mạnh đáng nể.\r\n\r\n<br>\r\nTại vòng 1/8 Champions League, Man City đã vượt qua Sporting Lisbon với tổng tỉ số 5-0 để đi tiếp. Bước vào vòng tứ kết, thử thách tiếp theo của thầy trò HLV Pep Guardiola là Atletico Madrid, đội bóng chơi phòng ngự hiện đại và phản công sắc nét.\r\n\r\n<br>\r\nĐón tiếp đối thủ tử La Liga, Man City đối mặt với khó khăn khi không có được lực lượng mạnh nhất, Kyle Walker bị treo giò, trong khi Ruben Dias dính chấn thương. Ngoài ra, tài năng Cole Palmer cũng không chắc khả năng ra sân thi đấu với Atletico Madrid.\r\n\r\n<br>\r\nVề phía Atletico Madrid, họ đã vượt qua Man Utd ở vòng đấu trước và bước tiếp với sự tự tin cao độ. HLV Diego Simeone có thể tiếp tục áp dụng chiến thuật đã làm nên thương hiệu tại Madrid, thế nhưng chắc chắn ông sẽ cảnh giác cao độ, bởi sức công phá của Man City là không dễ bị hóa giải.\r\n\r\n<br>\r\nChuyến hành quân tới Anh lần này HLV Simeone mất Carrasco vì bị treo giò, nhưng ông có thể sử dụng Koke, Correa, Gimenez hay Hector Herrera...</h5>', 2),
(4, 'Messi tuyên bố sau khi gia nhập PSG:phù hợp với tham vọng của tôi', 'Tin-4.jpeg', '<h5>TTO - Rạng sáng 11-8, CLB Paris Saint-Germain (PSG) đã chính thức công bố việc chiêu mộ thành công siêu sao người Argentina Lionel Messi theo dạng chuyển nhượng tự do.\r\n<br>\r\nMessi chính thức gia nhập PSG sau khi rời Barca\r\n<br>\r\nMessi sẽ gắn bó với đội chủ sân Parc des Princes trong bản hợp đồng có thời hạn 2 năm, và ưu tiên gia hạn thêm 1 năm. Mức lương dự kiến Messi nhận được ở PSG là 35 triệu euro/năm.\r\n<br>\r\nMessi chia sẻ trên trang web của CLB: \"Tôi rất nôn nóng để bắt đầu chương mới trong sự nghiệp của mình ở Paris\". Chủ nhân của 6 quả bóng vàng nói tiếp: \"PSG và tầm nhìn của CLB hoàn toàn phù hợp với tham vọng của tôi\".\r\nMessi cho biết, PSG là đội bóng tuyệt vời với rất nhiều cầu thủ giỏi và cam kết cùng nhau xây dựng \"điều gì đó tuyệt vời cho CLB và người hâm mộ ở đây\".\r\n<br>\r\nKhông giấu được niềm vui khi ký hợp đồng với một trong những cầu thủ vĩ đại nhất lịch sử bóng đá, chủ tịch PSG Nasser Al-Khelaifi cho biết: \"Chúng tôi tự hào chào đón Messi đến với Paris. Messi không giấu giếm mong muốn tiếp tục thi đấu ở đẳng cấp cao nhất và giành các danh hiệu\".\r\n<br>\r\nTại PSG, Messi sẽ mặc áo số 30 - một trong những số áo khởi đầu sự nghiệp của siêu sao này. Anh dự kiến sẽ có buổi họp báo ra mắt vào lúc 16h hôm nay 11-8 (giờ Việt Nam). Đến PSG, Messi sẽ hội ngộ người đồng đội cũ Neymar và bạn thân Angel Di Maria.\r\nVà cũng rất đặc biệt khi Messi trở thành đồng đội của cựu trung vệ CLB Real Sergio Ramos. Cả hai từng nhiều lần đối đầu với nhau trong sự nghiệp và cũng có không ít va chạm quyết liệt.\r\n<br>\r\nHiện vẫn chưa rõ Messi sẽ có trận ra mắt PSG vào thời điểm nào. Tuy nhiên, các CĐV tại sân Công viên các hoàng tử chắc chắn sẽ được nhìn thấy Messi đá ít nhất 1 trận trước khi trở về khoác áo tuyển Argentina dự vòng loại World Cup 2022 khu vực Nam Mỹ vào đầu tháng 9 tới.\r\n<br>\r\nTrước khi gia nhập PSG, Messi đã có 21 năm chơi bóng cho Barca, thi đấu 778 trận, ghi 672 bàn và cùng với đội bóng này chinh phục tổng cộng 35 danh hiệu, trong đó có 10 chức vô địch La Liga và 4 Champions League.</h5>', 6),
(5, '(Quả bóng Vàng 2021) Bảng xếp hạng các ứng viên: Ai có thể ngăn cản Messi?', 'Tin-5.webp', '<h5>Biến động lớn nhất mang tên Messi ở cuộc đua Quả bóng vàng 2021 sau khi 2 giải đấu quốc tế EURO 2020 và Copa America hạ màn.\r\n<br>\r\nHai tháng trước, khi mùa giải cấp CLB khép lại, Messi dù nằm trong top ứng viên nhưng không chiếm nhiều ưu thế, bởi Barca của anh thất bại 2 đấu trường lớn: Champions League và La Liga.\r\nĐội trưởng số 10 chỉ cùng các đội nhận danh hiệu Cúp Nhà vua an ủi.\r\n<br>\r\nVì điều này mà thành tích cá nhân Vua phá lưới La Liga và cũng chiếm luôn danh hiệu Cầu thủ kiến tạo của giải đấu phần nào bị lu mờ.\r\n<br>\r\nNhưng tháng 7 tươi đẹp thực sự đến với Leo Messi khi anh cùng ĐT Argentina lần đầu được nếm trải vinh quang giành chiếc cúp Copa America sau khi thắng kình địch Brazil 1-0 ở trận chung kết.\r\n<br>\r\nChiến thắng ấy là của cả tập thể nhưng Messi là nổi bật nhất, dẫn dắt đội đi đến vinh quang với vai trò là Cầu thủ xuất sắc nhất giải đấu và Vua phá lưới (4 bàn), 5 pha kiến tạo.\r\nVì lẽ này, tên Messi nhảy vọt lên vị trí dẫn đầu của các nhà cái trong cuộc đua Quả bóng vàng danh giá.\r\n<br>\r\nNếu chiến thắng, đây sẽ là Quả bóng vàng thứ 7 mà Messi giành được trong sự nghiệp của mình.\r\nRonaldo, đối thủ lớn nhất của Messi trong thập kỷ qua, đã không còn tạo nên cuộc đua hấp dẫn ở giải thưởng này, đặc biệt là năm nay do trắng tay với Juventus và tuyển Bồ Đào Nha cũng bị loại từ vòng 16 đội EURO 2020. Nhưng chân sút 36 tuổi vẫn cho thấy giá trị đáng nể khi là Vua phá lưới EURO 2020 (5 bàn).\r\n<br>\r\nHarry Kane đã có thể đua gắt với Messi nếu như cùng tuyển Anh đăng quang chức vô địch EURO 2020. Bởi lẽ, ở cấp CLB, chân sút số 9 có thành tích tương tự M10, là Vua phá lưới Ngoại hạng Anh, cũng như kiến tạo.\r\n<br>\r\nĐội trưởng Tam sư cũng có 4 bàn tại EURO 2020, tuy nhiên việc Anh để thua Italy ở chung kết vô địch châu Âu khiến Harry Kane vẫn là một ngôi sao không danh hiệu bao năm ở cả cấp CLB lẫn ĐTQG.\r\n<br>\r\nTrong các cái tên nổi bật, có lẽ Robert Lewandowski là người có khả năng cao nhất ngăn Messi chiến thắng Quả bóng vàng lần thứ 7.\r\n<br>\r\nLewandowski là ngôi sao xứng đáng nhất trong năm 2020, và đã có thể được vinh danh nếu giải thưởng không bị hủy.</h5>\r\n\r\n', 7),
(6, 'Arsenal tự bắn vào chân trong cuộc đua Top 4', 'Tin-6.jpg', '<h5>Việc để thua trước Crystal Palace khiến cho cuộc đua Top 4 của Arsenal thêm phần trắc trở.\r\n<br>\r\nBước hụt của Pháo thủ\r\nSau khi tỉnh dậy trong một buổi sáng đầu tuần và nhấc chiếc điện thoại lên để đọc tin tức, hẳn chẳng có CĐV nào của Arsenal có thể tin được rằng thầy trò HLV Mikel Arteta bất ngờ sảy chân trước Crystal Palace trên SVĐ Selhurst Park vào rạng sáng 5/4. Thậm chí, đội bóng thuộc phía Bắc London còn phải nhận tới 3 bàn thua, và muối mặt trở về nhà.\r\n<br>\r\nỞ loạt trận quốc tế vừa qua, đa số các cầu thủ trong đội hình chính của Pháo thủ đều được triệu tập lên ĐTQG. Có lẽ vì lý do đó mà họ chơi dưới sức sau khi trở về đấu trường Ngoại Hạng Anh. Arsenal ra sân với đội hình gần như mạnh nhất, nhưng tất cả đều cảm nhận được sự rệu rã trên đôi chân của các học trò HLV Arteta. Họ thi đấu thiếu hiệu quả và mắc nhiều sai lầm đáng trách.\r\n<br>\r\nĐầu tiên phải nói về hai cánh của đội khách. Trước trận đấu, nhà cầm quân người Tây Ban Nha đón nhận tin không vui khi hậu vệ Tierney gặp chấn thương, và được dự báo nghỉ hết mùa giải năm nay. Dĩ nhiên, ông phải lựa chọn Nuno Tavares, một phương án thay thế khác. Để rồi cầu thủ trẻ người Bồ Đào Nha có ngày thi đấu thảm họa, anh được rút ra ngay sau giờ nghỉ. Còn với Cedric Soares ở cánh đối diện, anh cũng không chơi được như sự kỳ vọng ban đầu.\r\n<br>\r\narsenal-thua-tham-truoc-crystal-palace-conte-cuoi-suong-9\r\nHai cánh của Pháo thủ đã chơi không tốt trước Crystal Palace\r\nĐó không phải nhược điểm duy nhất của Arsenal ở trận đấu vừa qua. Tuyến giữa của họ cũng gặp vấn đề nghiêm trọng khi Thomas Partey đã không thể hiện được vai trò của mình. Cựu cầu thủ Atletico Madrid chơi thiếu tốc độ và nhiều lần để mất bóng ở một số khu vực nguy hiểm. Những đường chuyền của tiền vệ 28 tuổi thường không đúng địa chỉ, hàng phòng ngự thiếu chắc chắn một phần bởi Partey không thể càn quét ở giữa sân.\r\n\r\nĐó là những lý do căn bản nhất để khiến The Gunner nhận trận thua mà chẳng ai muốn xem lại. Cũng cần phải nói thêm rằng Crystal Palace đã chơi cực kỳ cố gắng và tập trung. Đội chủ nhà đi theo đúng đấu pháp của HLV Patrick Vieira và thành quả như nhiều người đã thấy, một chiến thắng tưng bừng ngay tại Selhurst Park.\r\n<br>\r\nNóng bỏng cuộc đua Top 4\r\nThay vì chiếm lại vị trí thứ 4 trên BXH Ngoại Hạng Anh và bỏ lại Tottenham với khoảng cách 3 điểm, Arsenal lại tự đánh mất lợi thế của mình. Đương nhiên, các fan Pháo thủ chỉ hy vọng đó là cú sảy chân tạm thời và mong thầy trò HLV Mikel Arteta sẽ nhanh chóng lấy lại phong độ như quãng thời gian vừa qua, nếu không muốn đánh mất cơ hội dự C1 mùa giải năm sau.\r\n<br>\r\nỞ thời điểm hiện tại, đội bóng thuộc phía Bắc London vẫn có lợi thế lớn hơn so với các đội cạnh tranh là họ mới đá 29 trận. Thế nhưng, cần phải nhớ rằng đối thủ của Arsenal ở trận đá bù ấy lại chính là Tottenham, đội bóng đang có sự hồi sinh mạnh mẽ dưới thời HLV Antonio Conte khi họ thắng tới 5 trong 6 vòng đấu gần nhất. Gặp ‘Gà trống’ sẽ là trận cầu 6 điểm đối với The Gunner.\r\nChưa kể, trận thua của Arsenal vừa qua còn là cơ hội cho Man Utd. Dù đang xếp ở vị trí thứ 7 nhưng Quỷ đỏ vẫn có thể cạnh tranh Top 4 một cách công bằng nếu đạt thành tích tốt ở những trận đấu còn lại. Rõ ràng, đó là thách thức với đội bóng thành Manchester nhưng đây là thời cơ không thể tốt hơn cho Ronaldo cùng các đồng đội.\r\n<br>\r\nChính vì thế, gáo nước đủ lạnh từ Crystal Palace sẽ giúp The Gunner tỉnh táo hơn trong cuộc đua Top 4. Sẽ thực sự khốc liệt cho Arsenal nhưng họ cần phải chứng minh được rằng mình xứng đáng được dự Champions League mùa giải năm sau, khi mà Ngoại Hạng Anh chỉ còn 7 vòng đấu.\r\n</h5>\r\n', 8),
(7, 'Erik ten Hag xác định 2 tân binh đầu tiên sau khi đến MU', 'Tin-7.jpg', '<h5>Cập bến Old Trafford, nhà cầm quân người Hà Lan hứa hẹn sẽ đem về những tân binh chất lượng cho Quỷ đỏ.\r\n<br>\r\nSau một quãng thời gian dài tìm kiếm kéo dài từ cuối năm ngoái, Manchester United cuối cùng cũng đã thực hiện những bước đi cụ thể đầu tiên trong việc bổ nhiệm HLV mới.\r\n<br>\r\nTrong khi các đội tuyển quốc gia tập trung đá giao hữu cũng như thi đấu tại vòng loại World Cup, The Reds đã tiến hành phỏng vấn hai ứng viên tiềm năng là Erik ten Hag và Mauricio Pochettino.\r\n<br>\r\nỞ thời điểm hiện tại, những người đứng đầu tại Man Utd cảm thấy ấn tượng hơn đối với vị HLV đang dẫn dắt Ajax Amsterdam. Tầm nhìn của Ten Hag được cho là thu hút sự chú ý của BLĐ Quỷ đỏ.\r\n<br>\r\nNgoài ra, họ cũng sẽ chỉ mất 2 triệu euro để phá vỡ hợp đồng của ‘Pep Guardiola 2.0’, so với con số 20 triệu nếu lựa chọn Pochettino.\r\n<br>\r\nBenfica-Ajax-Jurrien-Timber\r\nTimber có thể giúp Man Utd giải bài toán ở hàng phòng ngự\r\nVà theo thông tin mới đây từ tờ Mirror, Ten Hag đã có sẵn cho mình phương án bổ sung nhân sự sau khi cập bến Old Trafford.\r\n<br>\r\nCụ thể, ‘bộ óc’ 52 tuổi muốn mang theo hai học trò của mình là Antony và Jurrien Timber đến Ngoại hạng Anh. Với 20 bàn thắng trong mùa giải này, Antony sẽ giúp cho hàng công Man Utd trở nên khó lường hơn.\r\n<br>\r\nTrong khi đó, Timber sẽ là phương án giúp nâng cấp hàng thủ của Ten Hag. Bởi lẽ, nhà cầm quân sinh năm 1970 đã xác định việc cải thiện khả năng phòng ngự của đội bóng từng 20 lần vô địch nước Anh là ưu tiên hàng đầu của mình.\r\n<br>\r\nDù mới chỉ 20 tuổi nhưng đã thể hiện được tài năng đáng nể tại Ajax và được HLV Louis Van Gaal triệu tập lên đội tuyển Hà Lan. Nếu không có gì anh bất ngờ, anh sẽ có một suất tham dự World Cup 2022 vào mùa đông tới.</h5>', 9),
(8, 'Xác nhận: Chủ nhân FIFA The Best 2021 sẵn sàng gia nhập Barca', 'Tin-8.jpeg', '<h5>Tương lai của Lewandowski đang trở nên nóng hơn sau khi anh bế tắc trong việc gia hạn với Bayern.\r\n<br>\r\nTrong vài năm trở lại đây, Robert Lewandowski đã nổi lên để phá vỡ sự thống trị của Cristiano Ronaldo và Lionel Messi. Dù không có được Quả bóng vàng 2020 và thất bại trong việc cạnh tranh giải thưởng này ở năm 2021 nhưng anh cũng đã có 2 danh hiệu FIFA The Best.\r\n<br>\r\nKhi nhắc đến Lewandowski, người ta nghĩ đến ngay khả năng săn bàn đáng sợ của siêu sao này. Kể từ khi gia nhập Bayern Munich, chân sút người Ba Lan đã có đến 6 mùa giải ghi từ 40 bàn trở lên.\r\n<br>\r\nVà ở mùa giải năm nay, Lewandowski vẫn chưa cho thấy sự giảm sút về mặt phong độ dù anh sắp bước sang tuổi 34. Cụ thể, sau 38 lần ra sân ở trên mọi đấu trường, cầu thủ quan trọng hàng đầu của Hùm xám xứ Bavaria đã có tới 45 pha lập công.\r\n<br>\r\nlewandowski-bayern-barca-chuyen-nhuong-2022\r\nLewandowski vừa giúp ĐT Ba Lan đoạt vé dự World Cup 2022\r\nTuy nhiên khi hợp đồng của Lewandowski chỉ còn thời hạn đến năm 2023, Bayern lại tỏ ra e dè trong việc giữ chân ‘số 9’ xuất sắc nhất thế giới vào lúc này.\r\n<br>\r\nTheo Sport, mối quan hệ giữa Lewy với các nhà ĐKVĐ Bundesliga đang xấu đi, khi họ chỉ đề nghị bản hợp đồng gia hạn thêm 1 năm với tiền đạo người Ba Lan.\r\n<br>\r\nVà mới đây nhất, nhà báo Fabrizio Romano cũng xác nhận, Lewandowski cũng đã sẵn sàng để chuyển đến La Liga. Cụ thể, ký giả người Ý cho biết:\r\n<br>\r\n“Robert Lewandowski sẵn sàng để thử trải nghiệm cảm giác chơi bóng tại La Liga vào một ngày nào đó - anh ấy được thông báo rất rõ về sự quan tâm của Barca và người đại diện của anh ấy cũng vậy. Tất cả sẽ phụ thuộc vào Bayern”.\r\n</h5>', 10),
(9, 'Son Heung Min rực sáng với hat-trick: Vượt mặt Torres - Hazard', 'tin-10.jpg', '<h5>Son Heung Min vừa có màn trình diễn không thể chê vào đâu được trong cuộc đối đầu giữa Aston Villa và Tottenham ở vòng 32 Ngoại hạng Anh. Tiền đạo người Hàn Quốc đóng góp tới 3/4 bàn thắng đội khách ghi được trong trận đấu này, đáng chú ý hơn 3 bàn thắng tới chỉ sau 3 lần dứt điểm, hiệu suất đạt 100%.\r\n<br>\r\nSon Heung Min rực sáng với hat-trick: Sánh ngang Ronaldo, vượt mặt Torres - Hazard - 1\r\nSon Heung Min rực sáng với một cú hat-trick\r\n<br>\r\nSố 7 của Tottenham chính là người mở tỉ số trận đấu ở ngay phút thứ 3 với một cú ra chân cực nhanh. Son Heung Min cho thấy kỹ năng dứt điểm bằng chân trái (chân không thuận) chẳng kém gì chân phải (chân thuận) khi bắt bóng “sống” nảy ra từ người một hậu vệ Aston Villa.\r\n<br>\r\nBàn thắng thứ hai của cầu thủ này cũng là một pha ghi bàn bằng chân trái. Đây là kết quả của bài tấn công quá quen thuộc của Tottenham trong vài năm qua. Harry Kane làm tường và Son Heung Min bứt tốc, băng xuống rồi hạ gục thủ môn đối phương.\r\n<br>\r\nBàn ấn định tỉ số 4-0 của Son Heung Min tới ở phút 72 là cú sút bằng chân phải cực kỳ quyết đoán trong vòng cấm. Với bàn thắng này, tiền đạo người Hàn Quốc trở thành cầu thủ ghi bàn nhiều nhất tại Ngoại hạng Anh 2021/22 nếu không tính phạt đền với 17 bàn thắng, hơn Salah đúng 2 bàn.\r\n<br>\r\nSon Heung Min rực sáng với hat-trick: Sánh ngang Ronaldo, vượt mặt Torres - Hazard - 2\r\n<br>\r\nSon Heung Min ghi bàn nhiều nhất Ngoại hạng Anh nếu không tính bàn thắng từ chấm phạt đền\r\n<br>\r\nĐây là lần thứ hai Son Heung Min có được hat-trick tại Ngoại hạng Anh, sánh ngang với thành tích của Cristiano Ronaldo, thần tượng của cầu thủ này. Tính tổng thành tích kể từ khi gia nhập Ngoại hạng Anh năm 2015, tiền đạo người Hàn Quốc đã có 87 bàn thắng, vượt mặt rất nhiều chân sút nổi tiếng của giải đấu như Luis Saha, Fernando Torres, Eden Hazard (85 bàn) hay Carlos Tevez (84 bàn).\r\n<br>\r\nTrong số 87 bàn này, Son Heung Min có tới 35 lần dứt điểm bằng chân không thuận (48 lần chân phải, 4 lần bằng đầu). Đây là thành tích ghi bàn bằng chân không thuận tốt thứ hai lịch sử Ngoại hạng Anh, chỉ kém kỷ lục của người đồng đội Harry Kane và cựu danh thủ Robin Van Persie đúng 4 lần (39 lần). \r\n<br>\r\nVới pha kiến tạo trong trận đấu này, Harry Kane đã có lần thứ 21 chuyền bóng giúp Son Heung Min lập công tại Ngoại hạng Anh. Tiền đạo người Anh chỉ còn kém kỷ lục của Frank Lampard đúng 3 lần kiến tạo nữa. Cựu tiền vệ của Chelsea đang giữ kỷ lục kiến tạo cho 1 cầu thủ (Didier Drogba) nhiều nhất giải đấu với 24 lần.\r\n<br>\r\nNói không ngoa, Tottenham đang \"bay trên đôi cánh\" của Son Heung Min và Harry Kane. \"Gà trống\" vẫn còn 7 trận đấu nữa tại Ngoại hạng Anh trước khi kết thúc mùa giải. Bởi vậy, cặp đôi này vẫn còn cơ hội để bắt kịp, thậm chí là xô đổ những kỷ lục của giải đấu.</h5>', 11),
(10, 'MU thua đội đua trụ hạng Everton, Rangnick và De Gea nói lời cay đắng', 'tin-11.jpg', '<h5>Thất bại ở Goodison Park khiến hy vọng vào top 4 Ngoại hạng Anh của MU thêm hẹp lại. Sau trận đấu, người Manchester tỏ ra vô cùng ngao ngán.\r\n\"Việc đội bóng tìm kiếm HLV mới không thể là cái cớ để bào chữa cho thất bại hôm nay. Chúng tôi là Manchester United, chúng tôi có nhiều cầu thủ quốc tế trong đội hình. Nó không thể là cái cớ cho bất kỳ ai\" - HLV Ralf Rangnick bực dọc nói sau trận thua 0-1 của MU trên sân Everton.\r\n<br>\r\nMU thua đội đua trụ hạng Everton, HLV Rangnick và De Gea nói lời cay đắng - 1\r\nMU thua cay đắng Everton\r\n<br>\r\nNhà cầm quân người Đức cảnh báo các học trò: \"Nếu HLV mới được công bố trong 10, 14 hay 21 ngày nữa, điều đó sẽ không ảnh hưởng đến một trận đấu như hôm nay. Các kết quả của đội bóng không phụ thuộc vào việc HLV là ai, mà đó là nhiệm vụ của tất cả\".\r\n<br>\r\nNói về tình cảnh bi đát hiện tại, HLV Rangnick không khỏi ngao ngán: \"Bây giờ chúng tôi có Fred dính chấn thương, bên cạnh McTominay. Hy vọng rằng đây không phải vấn đề tồi tệ. Tất cả những gì chúng tôi có thể làm là chuẩn bị cho trận đấu với Norwich\".\r\n<br>\r\nNhư vậy, MU tiếp tục đẩy mình vào thế khó sau thất bại 0-1 ở vòng 32 Ngoại hạng Anh. Suốt trận đấu, \"Quỷ đỏ\" không tạo ra được một cơ hội nào thực sự rõ rệt trước khung thành của thủ môn Jordan Pickford, bất chấp sự trở lại của siêu sao Ronaldo trong đội hình.\r\n<br>\r\nBàn thắng duy nhất của Anthony Gordon ở phút 27 đã khiến thầy trò Rangnick ra về tay trắng. Không chỉ HLV Rangnick và các cổ động viên thất vọng, mà người cảm thấy ngao ngán nhất có lẽ là David de Gea. Thủ môn người Tây Ban Nha thừa nhận rằng đội bóng của anh rất khó để vào top 4.\r\n<br>\r\nMU thua đội đua trụ hạng Everton, HLV Rangnick và De Gea nói lời cay đắng - 2\r\n\r\nHLV Rangnick bực dọc với dàn sao MU\r\n<br>\r\nTrả lời phỏng vấn của BT Sports, De Gea chia sẻ: “Chúng tôi đã biết trước rằng sẽ có một trận đấu khó khăn trước Everton. Nhưng mọi thứ tệ hơn tưởng tượng, chúng tôi không ghi bàn, thậm chí không tạo ra những cơ hội nguy hiểm”.\r\n<br>\r\nThủ môn số 1 của MU khẳng khái thừa nhận đây là một nỗi ô nhục: “Thực sự vào lúc này tôi không biết phải nói gì. MU không đủ tốt để gây áp lực cho đối thủ. Bây giờ sẽ rất khó khăn để kết thúc mùa giải ở top 4. Tất nhiên, bầu không khí sẽ ảm đạm, các cầu thủ mệt mỏi và lo lắng.\r\n<br>\r\nEverton đã cho thấy họ khát khao hơn chúng tôi. Thật buồn khi để thua ngày hôm nay. Đó là một sự sỉ nhục với một đội bóng như Manchester United. Đáng lẽ chúng tôi phải thắng ở những trận đấu như thế này”.</h5>', 12),
(11, 'Levante – Barcelona: Quyết giành 3 điểm bám đuổi Real Madrid (Vòng 31 La Liga)', 'tin-12.jpg', '<h5>(Nhận định bóng đá Levante – Barcelona, 2h, 11/4, vòng 31 La Liga) Barcelona sẽ quyết tâm giành trọn 3 điểm để nuôi hy vọng về kỳ tích.\r\nBarcelona đang trở lại cuộc đua vô địch La Liga 2021/22 cực kỳ mạnh mẽ. Thầy trò Xavi Hernandez đã leo lên vị trí thứ 3 trên bảng xếp hạng sau vòng đấu thứ 30 với 57 điểm sau 29 trận. Cửa vô địch không phải là đã hết với đội bóng xứ Cataluyna bởi họ còn kém Real Madrid 15 điểm và vẫn còn 2 trận chưa đấu trong tay.\r\n<br>\r\nNhận định bóng đá Levante – Barcelona: Quyết giành 3 điểm, bám đuổi Real Madrid (Vòng 31 La Liga) - 1\r\nBarcelona đang có chuỗi thắng dài tại La Liga\r\n<br>\r\nNếu Barcelona có thể đăng quang mùa bóng này, đó sẽ là kỳ tích. Điều kiện đủ là Real Madrid liên tục để thua trong những vòng đấu tiếp theo và điều kiện cần là Barcelona phải toàn thắng cho tới cuối mùa giải.\r\n<br>\r\nĐó không phải là câu chuyện hoang đường nhưng đầu tiên, thầy trò Xavi Hernandez cần phải làm tốt nhiệm vụ của mình. Barcelona sẽ có chuyến làm khách của Levante, đội đang xếp thứ 19/20 trên bảng xếp hạng. Đó là cơ hội giành trọn vẹn 3 điểm của đội bóng xứ Catalunya.\r\n<br>\r\nLevante đang cố gắng thoát khỏi “vũng lầy”. Lần gần nhất ra sân, họ giành chiến thắng trước Villareal với tỉ số 2-0. Tuy nhiên, “Tàu ngầm vàng” để dành sức để đấu Bayern Munich tại Cúp C1 nên chiến thắng này không thể khẳng định Levante đã thoát khỏi khủng hoảng.\r\n<br>\r\nNhận định bóng đá Levante – Barcelona: Quyết giành 3 điểm, bám đuổi Real Madrid (Vòng 31 La Liga) - 2\r\n<br>\r\nLevante (áo xọc đỏ xanh) đang vất vả trong cuộc chiến trụ hạng\r\n<br>\r\nTrước đó, họ liên tục toàn hòa và thua trước những đội bóng chỉ ở tầm khá cho đến trung bình tại La Liga. Trong khi đó, Barcelona đang có phong độ cực tốt tại giải quốc nội với chuỗi 6 trận thắng thông. Đáng chú ý là  thầy trò Xavi có tới 4 lần ghi được 4 bàn trong chuỗi trận này.\r\n<br>\r\nVới những bổ sung hồi tháng 1, ông thầy người Tây Ban Nha đang tạo ra phiên bản Barcelona hay nhất thời hậu Messi. Những mũi tấn công của đội bóng xứ Catalunya tới từ mọi tuyến. Đây là điều cực kỳ khó khăn cho hàng phòng ngự đối phương vì chẳng biết phải kèm ai.\r\n<br>\r\nTuy nhiên, một điểm đáng lưu ý là Barcelona đang thua 2 và hòa 1 trong 3 lần làm khách gần nhất của Levante tính trên mọi đấu trường. Levante cũng đang có chuỗi 3 trận bất bại (2 thắng, 1 hòa) khi được chơi trên sân nhà tại La Liga.\r\n<br>\r\nSo về mặt phong độ và lực lượng, Barcelona đang được đánh giá nhỉnh hơn hẳn đối thủ. Điều duy nhất đội bóng xứ Catalunya cần làm chỉ là không đánh mất chính mình. Nếu làm được, họ sẽ có một chiến thắng dễ dàng để nuôi hy vọng về một kỳ tích.\r\n<br>\r\nDự đoán tỉ số: Levante 0-2 Barcelona\r\n<br>\r\nĐội hình dự kiến:\r\n<br>\r\nLevante: Cardenas; Miramon, Rober, Postigo, Vezo, Franquesa; Melero, Pepelu, Radoja; Morales, Marti\r\n<br>\r\nBarcelona: Ter Stegen; Alves, Araujo, E Garcia, Alba; Pedri, Busquets, F de Jong; Dembele, Aubameyang, Ferran', 13),
(13, 'Xavi hài lòng dù Barcelona hòa hú via 123', 'tin-13.jpg', '13', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tinnoibat`
--

CREATE TABLE `tinnoibat` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `noidung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tinnoibat`
--

INSERT INTO `tinnoibat` (`id`, `anh`, `noidung`) VALUES
(1, 'hinh-5.jpg', 'Fan MU nể Rangnick vì quyết định thay người \"dị\", liên tưởng đến Van...'),
(2, 'hinh-1.jpg', 'Tin mới nhất bóng đá tối 14/5: Trung Quốc rút lui, không đăng cai Asian Cup 2023...'),
(3, 'hinh-6.jpg', 'UEFA bất ngờ thêm 2 suất Cúp C1 “tình thương”, MU trong diện được xét'),
(4, 'hinh-2.jpg', 'Sốc: Cựu HLV MU Van Gaal bị ung thư, bỏ ngỏ dự World Cup với ĐT Hà Lan...'),
(5, 'hinh-3.jpg', 'Salah tiết lộ tình trạng chấn thương, Liverpool lo \"thảm họa\" chung kết Cúp C1...'),
(6, 'tin-7.jpeg', 'Ronaldo và thông điệp cứng rắn gửi đến HLV Erick ten Hag');

-- --------------------------------------------------------

--
-- Table structure for table `top10cauthu`
--

CREATE TABLE `top10cauthu` (
  `id` int(11) NOT NULL,
  `tencauthu` varchar(30) NOT NULL,
  `anh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `top10cauthu`
--

INSERT INTO `top10cauthu` (`id`, `tencauthu`, `anh`) VALUES
(1, 'Cristiano Ronaldo', 'ronaldo.jpg'),
(2, 'Lionel Messi', 'messi.jpg'),
(3, 'Neymar', 'neymar.jpg'),
(4, 'Erling Haaland', 'Haaland-Man-City-1.jpg'),
(5, 'Manuel Neuer', 'Manuel-Neuer.jpg'),
(6, 'Karim Benzema', 'Karim-Benzema.jpg'),
(7, 'Sergio Ramos', 'Sergio-Ramos.jpg'),
(8, 'Kylian Mbappe', 'Kylian-Mbappe.jpg'),
(9, 'Robert Lewandowski', 'Robert-Lewandowski.jpg'),
(10, 'Mohamed Salah', 'Sala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `sdt` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `anh`, `tendangnhap`, `matkhau`, `ten`, `sdt`, `email`, `diachi`, `role`) VALUES
(3, '', 'nghia', '123', 'Nghĩa', 367287058, 'nghiale200218@gmail.com', 'Quang Dien, Thua Thien Hue', 1),
(12, '', 'nghiale123', 'c8b2f17833a4c73bb20f88876219ddcd', 'nghia', 123456789, 'nghiale270903@gmail.com', 'hạ lang1', 0),
(15, 'Arijon.webp', 'nghiale123', '202cb962ac59075b964b07152d234b70', 'nghia1', 258147369, 'nghiale270903@gmail.com', '12', 0),
(16, 'bale.jpg', 'nghiale123', '202cb962ac59075b964b07152d234b70', 'nghia', 258147369, 'nghiale270903@gmail.com', 'bao la', 0),
(18, 'AmBAUYOUNG.webp', 'hoa1', '202cb962ac59075b964b07152d234b70', 'Hòa', 935036194, 'hoa@gmail.com', 'Đà nẳng', 0),
(19, '', 'kevin123', '202cb962ac59075b964b07152d234b70', 'Bruyne', 123456789, 'kevin123@gmail.com', 'Bỉ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videonha`
--

CREATE TABLE `videonha` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `tieudevd` varchar(200) NOT NULL,
  `noivd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videonha`
--

INSERT INTO `videonha` (`id`, `anh`, `tieudevd`, `noivd`) VALUES
(1, 'img-match1.gif', 'Video bóng đá Aston Villa - Liverpool: Ngược dòng ấn tượng, sao sáng lập công (Vòng 33 Ngoại hạng Anh)', '(Video bóng đá, kết quả bóng đá, Aston Villa - Liverpool, đá bù vòng 33 giải Ngoại hạng Anh) Đội bóng của HLV Jurgen Klopp đã sớm phải nhận bàn thua từ đối thủ nhưng đó cũng là lúc mà bản lĩnh của một'),
(2, 'img-match4.gif', 'Trực tiếp bóng đá Leeds United - Chelsea: 3 điểm tặng quà chủ mới (vòng 33 Ngoại hạng Anh)', '(Trực tiếp bóng đá Leeds United - Chelsea, 1h30, 12/5, đá bù vòng 33 Ngoại hạng Anh) Chelsea vừa có chủ mới và 3 điểm là món quà không thể tuyệt vời hơn.');

-- --------------------------------------------------------

--
-- Table structure for table `videowc`
--

CREATE TABLE `videowc` (
  `id` int(11) NOT NULL,
  `anh` varchar(20) NOT NULL,
  `tieudewc` varchar(100) NOT NULL,
  `noidungwc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videowc`
--

INSERT INTO `videowc` (`id`, `anh`, `tieudewc`, `noidungwc`) VALUES
(1, 'gif-world.gif', 'Đêm kỳ diệu của số 9 xuất sắc nhất hành tinh, Ferdinand muốn Benzema giành QBV', 'Karim Benzema được nhắc đến nhiều nhất sau trận Real Madrid thắng Chelsea ở lượt đi tứ kết Champions League..'),
(2, 'gif-world2.gif', 'Với chỉ số này ĐT Anh ở bảng đấu khó nhất World Cup, cơ hội vô địch sau 1 đội', 'Tính theo bảng xếp hạng FIFA, kết quả bốc thăm của ĐT Anh tại vòng bảng World Cup 2022 là khó khăn nhất. ĐT Anh thắng Bờ Biển Ngà ở trận giao hữu mới ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangxephang`
--
ALTER TABLE `bangxephang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bxhc1`
--
ALTER TABLE `bxhc1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bxhlaliga`
--
ALTER TABLE `bxhlaliga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bxhwc`
--
ALTER TABLE `bxhwc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tin`
--
ALTER TABLE `tin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinnoibat`
--
ALTER TABLE `tinnoibat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top10cauthu`
--
ALTER TABLE `top10cauthu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`id`);

--
-- Indexes for table `videonha`
--
ALTER TABLE `videonha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videowc`
--
ALTER TABLE `videowc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangxephang`
--
ALTER TABLE `bangxephang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bxhc1`
--
ALTER TABLE `bxhc1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `bxhlaliga`
--
ALTER TABLE `bxhlaliga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bxhwc`
--
ALTER TABLE `bxhwc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `danhmuctintuc`
--
ALTER TABLE `danhmuctintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tin`
--
ALTER TABLE `tin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tinnoibat`
--
ALTER TABLE `tinnoibat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `top10cauthu`
--
ALTER TABLE `top10cauthu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `videonha`
--
ALTER TABLE `videonha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videowc`
--
ALTER TABLE `videowc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
