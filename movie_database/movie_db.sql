-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 01:45 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `defined_genre`
--

CREATE TABLE `defined_genre` (
  `id` int(11) NOT NULL,
  `genretype` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `defined_genre`
--

INSERT INTO `defined_genre` (`id`, `genretype`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Crime'),
(5, 'Drama'),
(6, 'Fantasy'),
(7, 'Historical'),
(8, 'Horror'),
(9, 'Mystery'),
(10, 'Political'),
(11, 'Romance'),
(12, 'Thriller'),
(13, 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `episode_images`
--

CREATE TABLE `episode_images` (
  `id` int(11) NOT NULL,
  `episode_backdrop` varchar(255) DEFAULT NULL,
  `episode_posterl` varchar(255) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episode_images`
--

INSERT INTO `episode_images` (`id`, `episode_backdrop`, `episode_posterl`, `episode_id`) VALUES
(1, 'e.jpg', NULL, 1),
(2, 'episode1.jpg', NULL, 1),
(4, 'E2.jpg', NULL, 2),
(5, 'episode2.jpg', NULL, 2),
(6, 'epo2.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `episode_of_seasons`
--

CREATE TABLE `episode_of_seasons` (
  `id` int(11) NOT NULL,
  `episode_name` varchar(45) NOT NULL,
  `episode_number` varchar(45) DEFAULT NULL,
  `seasons_id` int(11) DEFAULT NULL,
  `released_date` date NOT NULL,
  `episode_revenue` double DEFAULT NULL,
  `episode_budget` double DEFAULT NULL,
  `episode_overview` text,
  `duration` int(11) DEFAULT NULL,
  `popularity` int(11) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episode_of_seasons`
--

INSERT INTO `episode_of_seasons` (`id`, `episode_name`, `episode_number`, `seasons_id`, `released_date`, `episode_revenue`, `episode_budget`, `episode_overview`, `duration`, `popularity`, `image`) VALUES
(1, 'Winter Is Coming', 'episode 1', 1, '2011-04-17', NULL, 10000000, 'Jon Arryn, the Hand of the King, is dead. King Robert Baratheon plans to ask his oldest friend, Eddard Stark, to take Jon\'s place.\r\n Across the sea, Viserys Targaryen plans to wed his sister to a nomadic warlord in exchange for an army', 62, NULL, 'e.jpg'),
(2, 'The Kingsroad', 'episode 2', 1, '2011-04-24', NULL, 6000000, 'While Bran recovers from his fall, Ned takes only his daughters to Kings Landing. Jon Snow goes with his uncle Benjen to The Wall. \r\nTyrion joins them.', 56, NULL, 'epo2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `episode_trailer`
--

CREATE TABLE `episode_trailer` (
  `id` int(11) NOT NULL,
  `episode_trailer` varchar(255) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `films_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `films_id`, `episode_id`, `user_id`) VALUES
(2, 1, NULL, 2),
(3, 3, NULL, 2),
(4, 4, NULL, 4),
(5, 1, NULL, 4),
(6, 11, NULL, 2),
(7, NULL, 1, 2),
(8, NULL, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `video_title` varchar(255) DEFAULT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `released_date` date DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `budget` double DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `popularity` int(11) DEFAULT '0',
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `video_title`, `overview`, `released_date`, `revenue`, `budget`, `duration`, `popularity`, `image`) VALUES
(1, 'War for the Planet of the Apes', 'After the apes suffer unimaginable losses, Caesar wrestles with his darker instincts and begins his own mythic quest to avenge his kind.', '2017-07-14', 103, 150000000, 140, 219, 'waroftheplanet.jpg'),
(2, 'John Wick: Chapter 2', 'After returning to the criminal underworld to repay a debt, John Wick discovers that a large bounty has been put on his life.', '2017-02-10', 43, 40000000, 120, 24, 'johnwick.jpg'),
(3, 'A Wrinkle in Time', 'After the disappearance of her scientist father, three peculiar beings send Meg, her brother, and her friend to space in order to find him.', '2018-03-09', NULL, 103000000, NULL, 22, 'wrinkkle.jpg'),
(4, 'Incredibles 2', 'Bob Parr (Mr. Incredible) is left to care for Jack-Jack while Helen (Elastigirl) is out saving the world.', '2018-06-15', NULL, NULL, NULL, 12, 'Incridible.jpg'),
(11, 'Titanic', '84 years later, a 100 year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titan', '1997-09-12', 600, 200000000, 194, 25, 'titanic_poster.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `film_images`
--

CREATE TABLE `film_images` (
  `id` int(11) NOT NULL,
  `film_backdrop` text,
  `film_poster` text,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film_images`
--

INSERT INTO `film_images` (`id`, `film_backdrop`, `film_poster`, `film_id`) VALUES
(1, 'waroftheplanet_backdrop_1.jpg', 'waroftheplanet_poster_1.jpg', 1),
(2, 'waroftheplanet_backdrop_2.jpg', 'waroftheplanet_poster_2.jpg', 1),
(3, 'waroftheplanet_backdrop_3.jpg', NULL, 1),
(4, 'johnwick_backdrop_1.jpg', 'johnwick_poster_1.jpg', 2),
(5, 'johnwick_backdrop_2.jpg', 'johnwick_poster_2.jpg', 2),
(6, 'johnwick_backdrop_3.jpg', NULL, 2),
(7, 'Incridible_backdrop_1.jpg', 'Incridible_poster.jpg', 4),
(8, 'Incridible_backdrop_2.jpg', NULL, 4),
(9, 'wrinkkle_backdrop_1.jpg', 'wrinkkle_poster.jpg', 3),
(10, 'wrinkkle_backdrop_2.jpg', NULL, 3),
(13, 'titanic_backdrop.jpg', 'titanic_poster2.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `film_trailer`
--

CREATE TABLE `film_trailer` (
  `id` int(11) NOT NULL,
  `film_trailer` text,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film_trailer`
--

INSERT INTO `film_trailer` (`id`, `film_trailer`, `film_id`) VALUES
(1, 'Warforthe PlanetoftheApesFinalTrailer.MP4', 1),
(2, 'warfortheplanet.MP4', 1),
(3, 'JohnWickChapter 2.MP4', 2),
(4, 'johnwick.MP4', 2),
(5, 'TheIncredibles2.MP4', 4),
(6, 'AWrinkleInTime.MP4', 3),
(7, 'Titanic.MP4', 11);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `films_id` int(11) DEFAULT NULL,
  `tv_shows_id` int(11) DEFAULT NULL,
  `defined_genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `films_id`, `tv_shows_id`, `defined_genre_id`) VALUES
(1, 1, NULL, 1),
(2, 1, NULL, 2),
(3, 1, NULL, 5),
(4, 2, NULL, 1),
(5, 2, NULL, 4),
(6, 2, NULL, 12),
(7, 3, NULL, 2),
(8, 3, NULL, 6),
(9, 4, NULL, 1),
(10, 4, NULL, 2),
(11, 4, NULL, 13),
(12, NULL, 1, 2),
(13, NULL, 1, 5),
(14, NULL, 1, 6),
(15, NULL, 1, 11),
(30, 11, NULL, 5),
(31, 11, NULL, 11),
(32, 11, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `image_of_lists`
--

CREATE TABLE `image_of_lists` (
  `id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(100) DEFAULT NULL,
  `films_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `films_id`, `episode_id`) VALUES
(1, 'English', 1, NULL),
(2, 'English', 2, NULL),
(3, 'Italian', 2, NULL),
(4, 'Russian', 2, NULL),
(5, 'English', 3, NULL),
(6, 'English', 4, NULL),
(7, 'Czech', 4, NULL),
(8, 'English', NULL, 1),
(9, 'English', NULL, 2),
(11, 'English', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `listname` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `films_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL,
  `images_id` int(11) DEFAULT NULL,
  `list_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `listname`, `users_id`, `films_id`, `episode_id`, `images_id`, `list_image`) VALUES
(1, 'Best-Movie', 4, 1, 1, NULL, 'Lighthouse.jpg'),
(2, 'Best-Movie', 4, 2, 1, NULL, 'Lighthouse.jpg'),
(14, 'epo', 4, NULL, 1, NULL, 'Koala.jpg'),
(15, 'epo', 4, 2, 2, NULL, 'Koala.jpg'),
(21, 'only epo', 4, NULL, 1, NULL, 'Hydrangeas.jpg'),
(22, 'only epo', 4, NULL, 2, NULL, 'Hydrangeas.jpg'),
(23, 'only film', 4, 11, NULL, NULL, 'Desert.jpg'),
(24, 'only film', 4, 1, NULL, NULL, 'Desert.jpg'),
(25, 'My Films', 2, 11, NULL, NULL, 'Lighthouse.jpg'),
(26, 'My Films', 2, 1, NULL, NULL, 'Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `production_company`
--

CREATE TABLE `production_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `films_id` int(11) DEFAULT NULL,
  `tv_shows_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `production_company`
--

INSERT INTO `production_company` (`id`, `company_name`, `films_id`, `tv_shows_id`) VALUES
(1, ' cherninEntertainment', 1, NULL),
(2, 'TSGEntertainment', 1, NULL),
(3, ' SummitEntertainment', 2, NULL),
(4, 'ThunderRoadPictures', 2, NULL),
(5, '87Eleven', 2, NULL),
(6, 'Lionsgate', 2, NULL),
(7, 'TIKFilms', 2, NULL),
(8, 'WaltDisneyPictures', 3, NULL),
(9, 'WhitakerEntertainment', 3, NULL),
(10, 'PixarAnimationStudios', 4, NULL),
(11, 'WaltDisneyPictures', 4, NULL),
(12, 'Home Box Office', NULL, 1),
(13, 'Television 360', NULL, 1),
(14, 'Grok! Studio', NULL, 1),
(15, 'Generator Entertainment', NULL, 1),
(16, 'Bighead Littlehead', NULL, 1),
(21, '', 11, NULL),
(22, '', 11, NULL),
(23, '', 11, NULL),
(24, '', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `production_country`
--

CREATE TABLE `production_country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `films_id` int(11) DEFAULT NULL,
  `tv_shows_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `production_country`
--

INSERT INTO `production_country` (`id`, `country_name`, `films_id`, `tv_shows_id`) VALUES
(1, 'USA', 1, NULL),
(2, 'canada', 1, NULL),
(3, 'newzealand', 1, NULL),
(4, 'USA', 2, NULL),
(5, 'USA', 3, NULL),
(6, 'USA', 4, NULL),
(7, 'USA', NULL, 1),
(14, 'United States', 11, NULL),
(15, '', 11, NULL),
(16, '', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rated` decimal(2,1) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `episod_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rated`, `film_id`, `episod_id`, `user_id`) VALUES
(4, '5.0', 1, NULL, 2),
(5, '4.0', 2, NULL, 4),
(6, '5.0', 4, NULL, 4),
(7, '5.0', 1, NULL, 4),
(8, '5.0', 11, NULL, 2),
(9, '2.0', NULL, 1, 2),
(10, '4.0', NULL, 2, 4),
(14, '3.0', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `season_of_tvshow`
--

CREATE TABLE `season_of_tvshow` (
  `id` int(11) NOT NULL,
  `season` varchar(45) DEFAULT NULL,
  `tv_shows_id` int(11) DEFAULT NULL,
  `overview` text NOT NULL,
  `year` year(4) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `season_of_tvshow`
--

INSERT INTO `season_of_tvshow` (`id`, `season`, `tv_shows_id`, `overview`, `year`, `image`) VALUES
(1, 'season 1', 1, 'Trouble is brewing in the Seven Kingdoms of Westeros. For the driven inhabitants of this visionary world, control of Westeros\' Iron Throne \r\nholds the lure of great power. But in a land where the seasons can last a lifetime, winter is coming...and beyond the Great Wall that protects them, \r\nan ancient evil has returned. In Season One, the story centers on three primary areas: the Stark and the Lannister families, \r\nwhose designs on controlling the throne threaten a tenuous peace; the dragon princess Daenerys, heir to the former dynasty, \r\nwho waits just over the Narrow Sea with her malevolent brother Viserys; and the Great Wall--a massive barrier of ice where a forgotten danger is stirring.', 2011, 'season1.jpg'),
(2, 'season 2', 1, 'The cold winds of winter are rising in Westeros...war is coming...and five kings continue their savage quest for control of the all-powerful Iron Throne\r\n. With winter fast approaching, the coveted Iron Throne is occupied by the cruel Joffrey, counseled by his conniving mother Cersei and uncle Tyrion.\r\n But the Lannister hold on the Throne is under assault on many fronts. Meanwhile, a new leader is rising among the wildings outside the Great Wall, \r\nadding new perils for Jon Snow and the order of the Night\'s Watch.\r\n', 2012, 'season2.jpg'),
(3, 'season 3 ', 1, 'Duplicity and treachery...nobility and honor...conquest and triumph...and, of course, dragons. In Season 3, family and loyalty are the overarching themes as many critical storylines from the first two seasons come to a brutal head. Meanwhile, the Lannisters maintain their hold on King\'s Landing, though stirrings in the North threaten to alter the balance of power; Robb Stark, King of the North, faces a major calamity as he tries to build on his victories; a massive army of wildlings led by Mance Rayder march for the Wall; and Daenerys Targaryen--reunited with her dragons--attempts to raise an army in her quest for the Iron Throne.\r\n', 2013, 'season3.jpg'),
(4, 'season 1', 2, '', 2010, 'season1poster.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tv_shows`
--

CREATE TABLE `tv_shows` (
  `id` int(11) NOT NULL,
  `tvshow_title` varchar(255) DEFAULT NULL,
  `overview` text NOT NULL,
  `image` text NOT NULL,
  `popularity` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tv_shows`
--

INSERT INTO `tv_shows` (`id`, `tvshow_title`, `overview`, `image`, `popularity`) VALUES
(1, 'Game of Thrones', 'Seven noble families fight for control of the mythical land of Westeros. Friction between the houses leads to full-scale war.\r\n All while a very ancient evil awakens in the farthest north. Amidst the war, a neglected military order of misfits, the Night\'s Watch, \r\nis all that stands between the realms of men and icy horrors beyond.', 'posterGOT.jpg', 27),
(2, 'The Walking Dead', 'Sheriff\'s deputy Rick Grimes awakens from a coma to find a post-apocalyptic world dominated by flesh-eating zombies. He sets out to find his family and encounters many other survivors along the way.', 'walkingdeadposter.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `user_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `gender`, `created_at`, `user_role`) VALUES
(2, 'kak_brwa', '$2y$10$CWU9UFLCtatsDMHe06yv3eUXLqGTC72BiTbEFi8OjJB/ui7pbfONG', 'male', '2017-07-30', 'admin'),
(3, 'wafa', '$2y$10$EeQaM8BnIR2rwVWGEgidDeV0QE6Fs/ET.hwX/H7hc1/WSehXZ1/Tm', 'male', '2017-07-30', 'admin'),
(4, 'balen', '$2y$10$GWIC71Moto3UpO/9NFT8FuAvD1hDNyxYXfPw3IYdUr2NE0ddsLIH.', 'male', '2017-07-30', 'normal'),
(5, 'rabar', '$2y$10$K9SN7tMCDUmqy4ZLdlkFQOvxVExKTyVmiz46e3MLsD7p4/VXbPeie', 'male', '2017-07-30', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `film_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `episode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `film_id`, `user_id`, `episode_id`) VALUES
(4, 2, 2, NULL),
(5, 4, 2, NULL),
(6, 1, 2, NULL),
(7, 2, 4, NULL),
(8, NULL, 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defined_genre`
--
ALTER TABLE `defined_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episode_images`
--
ALTER TABLE `episode_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episode_images_FK_idx` (`episode_id`);

--
-- Indexes for table `episode_of_seasons`
--
ALTER TABLE `episode_of_seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seasonn_idx` (`seasons_id`);

--
-- Indexes for table `episode_trailer`
--
ALTER TABLE `episode_trailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episode_trailer_FK_idx` (`episode_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_movie_id_idx` (`films_id`),
  ADD KEY `FK_series_id_idx` (`episode_id`),
  ADD KEY `FK_user_id_idx` (`user_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video_title_UNIQUE` (`video_title`);

--
-- Indexes for table `film_images`
--
ALTER TABLE `film_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_images_FK_idx` (`film_id`);

--
-- Indexes for table `film_trailer`
--
ALTER TABLE `film_trailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_trailer_FK_idx` (`film_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_id_FK_idx` (`films_id`),
  ADD KEY `tv_shows_id_FK_idx` (`tv_shows_id`),
  ADD KEY `defined_genre_FK_idx` (`defined_genre_id`);

--
-- Indexes for table `image_of_lists`
--
ALTER TABLE `image_of_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_id_idx` (`films_id`),
  ADD KEY `episode_season_foreign_idx` (`episode_id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_Fkey_idx` (`users_id`),
  ADD KEY `films_Fkey_idx` (`films_id`),
  ADD KEY `episode_Fkey_idx` (`episode_id`),
  ADD KEY `images_Fkey_idx` (`images_id`);

--
-- Indexes for table `production_company`
--
ALTER TABLE `production_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_id_idx` (`films_id`),
  ADD KEY `tv_shows_id_idx` (`tv_shows_id`);

--
-- Indexes for table `production_country`
--
ALTER TABLE `production_country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flms_id_idx` (`films_id`),
  ADD KEY `tv_shows_id_idx` (`tv_shows_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id_FK_idx` (`film_id`),
  ADD KEY `episod_id_FK_idx` (`episod_id`),
  ADD KEY `users_id_FK_idx` (`user_id`);

--
-- Indexes for table `season_of_tvshow`
--
ALTER TABLE `season_of_tvshow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tv_show_id_idx` (`tv_shows_id`);

--
-- Indexes for table `tv_shows`
--
ALTER TABLE `tv_shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id_FK_idx` (`film_id`),
  ADD KEY `FK_users_id_idx` (`user_id`),
  ADD KEY `series_id_fk_idx` (`episode_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defined_genre`
--
ALTER TABLE `defined_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `episode_images`
--
ALTER TABLE `episode_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `episode_of_seasons`
--
ALTER TABLE `episode_of_seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `episode_trailer`
--
ALTER TABLE `episode_trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `film_images`
--
ALTER TABLE `film_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `film_trailer`
--
ALTER TABLE `film_trailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `image_of_lists`
--
ALTER TABLE `image_of_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `production_company`
--
ALTER TABLE `production_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `production_country`
--
ALTER TABLE `production_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `season_of_tvshow`
--
ALTER TABLE `season_of_tvshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tv_shows`
--
ALTER TABLE `tv_shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode_images`
--
ALTER TABLE `episode_images`
  ADD CONSTRAINT `episode_images_FK` FOREIGN KEY (`episode_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `episode_of_seasons`
--
ALTER TABLE `episode_of_seasons`
  ADD CONSTRAINT `fk_seasonn` FOREIGN KEY (`seasons_id`) REFERENCES `season_of_tvshow` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `episode_trailer`
--
ALTER TABLE `episode_trailer`
  ADD CONSTRAINT `episode_trailer_FK` FOREIGN KEY (`episode_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `FK_movie_id` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_series_id` FOREIGN KEY (`episode_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film_images`
--
ALTER TABLE `film_images`
  ADD CONSTRAINT `film_images_FK` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film_trailer`
--
ALTER TABLE `film_trailer`
  ADD CONSTRAINT `film_trailer_FK` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `defined_genre_FK` FOREIGN KEY (`defined_genre_id`) REFERENCES `defined_genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `films_id_FK` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tv_shows_id_FK` FOREIGN KEY (`tv_shows_id`) REFERENCES `tv_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `episode_season_foreign` FOREIGN KEY (`episode_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `films_id_foreign` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `episode_Fkey` FOREIGN KEY (`episode_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `films_Fkey` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `images_Fkey` FOREIGN KEY (`images_id`) REFERENCES `image_of_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_Fkey` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `production_company`
--
ALTER TABLE `production_company`
  ADD CONSTRAINT `production_company_ibfk_1` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `production_company_ibfk_2` FOREIGN KEY (`tv_shows_id`) REFERENCES `tv_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `production_country`
--
ALTER TABLE `production_country`
  ADD CONSTRAINT `flms_id` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tv_shows_id` FOREIGN KEY (`tv_shows_id`) REFERENCES `tv_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `episod_id_FK` FOREIGN KEY (`episod_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_id_FK` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_id_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `season_of_tvshow`
--
ALTER TABLE `season_of_tvshow`
  ADD CONSTRAINT `tv_show_FK` FOREIGN KEY (`tv_shows_id`) REFERENCES `tv_shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `FK_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_id_FK` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `series_id_fk` FOREIGN KEY (`episode_id`) REFERENCES `episode_of_seasons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
