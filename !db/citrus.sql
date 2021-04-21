-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 02:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `name`, `email`, `text`, `approved`, `date`) VALUES
(1, 0, 'Jon Doe', 'jon@mail.com', 'Lorem ipsum', 0, '2021-04-21 07:42:57'),
(2, 0, 'Steve Smith', 'steve@mail.com', 'sample of comment', 0, '2021-04-20 19:34:43'),
(3, 1, 'jon doe', 'jon@mail.com', 'The orange is the fruit of various citrus species in the family Rutaceae (see list of plants known as orange); it primarily refers to Citrus × sinensis, which is also called sweet orange', 1, '2021-04-20 19:40:47'),
(4, 1, 'Steve smith', 'steve@gmail.com', 'In 2019, 79 million tonnes of oranges were grown worldwide, with Brazil producing 22% of the total, followed by China and India.[13]', 1, '2021-04-20 19:40:50'),
(9, 0, 'nilos', 'admin@admin.com', 'asdfasdfaf', 1, '2021-04-20 19:40:31'),
(16, 2, 'Pera Peric', 'milos.glogovac@gmail.com', 'ccc', 0, '2021-04-20 19:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `title`, `description`, `image`) VALUES
(1, 'Orange123', ' The orange is the fruit of various citrus species in the family Rutaceae; it primarily refers to Citrus × sinensis, which is also called sweet orange, to distinguish it from the related Citrus × aurantium, referred to as bitter orange. The sweet orange reproduces asexually; varieties of sweet orange arise through mutations.123\r\n   ', 'orange.jpg'),
(2, 'Lemon', 'The lemon, Citrus limon, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily Northeast India. The tree\'s ellipsoidal yellow fruit is used for culinary and non-culinary purposes throughout the world, primarily for its juice, which has both culinary and cleaning uses. The pulp and rind are also used in cooking and baking. The juice of the lemon is about 5% to 6% citric acid, with a pH of around 2.2, giving it a sour taste. The distinctive sour taste of lemon juice makes it a key ingredient in drinks and foods such as lemonade and lemon meringue pie.\r\n  ', 'lemon.png'),
(3, 'Grapefruit', 'The grapefruit is a subtropical citrus tree known for its relatively large sour to semisweet, somewhat bitter fruit. The interior flesh is segmented and varies in color from pale yellow to dark pink.\r\n', 'Grapefruit.jpg'),
(4, 'Bergamot orange', 'Citrus bergamia, the bergamot orange, is a fragrant citrus fruit the size of an orange, with a yellow or green color similar to a lime, depending on ripeness. Genetic research into the ancestral origins of extant citrus cultivars found bergamot orange to be a probable hybrid of lemon and bitter orange. Extracts have been used as an aromatic ingredient in food, tea, snus, perfumes, and cosmetics. Use on the skin can increase photosensitivity, resulting in greater damage from sun exposure.\r\n', 'Bergamotfruit.jpg'),
(5, 'Lime', 'A lime, is a citrus fruit, which is typically round, green in color, 3–6 centimetres in diameter, and contains acidic juice vesicles. There are several species of citrus trees whose fruits are called limes, including the Key lime, Persian lime, kaffir lime, and desert lime', 'large.jpg'),
(6, 'Pineapple', 'The pineapple is a tropical plant with an edible fruit and the most economically significant plant in the family Bromeliaceae. The pineapple is indigenous to South America, where it has been cultivated for many centuries', 'pineapple.jpg'),
(7, 'Pomelo', 'The pomelo, pummelo, or in scientific terms Citrus maxima or Citrus grandis, is the largest citrus fruit from the family Rutaceae and the principal ancestor of the grapefruit. It is a natural, i.e., non-hybrid, citrus fruit, native to Southeast Asia.', 'pomelo.jpg'),
(8, 'Kumquat', 'Kumquats are a group of small fruit-bearing trees in the flowering plant family Rutaceae. They were previously classified as forming the now-historical genus Fortunella, or placed within Citrus, sensu lato.', 'cumquat.jpg'),
(9, 'Yuzu', 'Yuzu is a citrus fruit and plant in the family Rutaceae of East Asian origin. Yuzu has been cultivated mainly in East Asia, recently also in Australia, Spain, Italy and France. It is believed to have originated in central China as a hybrid of mandarin orange and the ichang papeda.', 'yuzu.jpg'),
(24, 'sunset', 'sad;d\'asld,asasf  sdgsdg  ', 'skysong2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@citrus.com', '$2y$10$z4kOAbFAORbwS91uSynKxO.VwLazmzQGxpy4n8l4FHrmEmRe75McG', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
