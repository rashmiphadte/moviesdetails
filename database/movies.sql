-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 10:17 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(250) NOT NULL,
  `movie_length` varchar(250) NOT NULL,
  `movie_release_date` date NOT NULL,
  `delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `featured_image`, `movie_length`, `movie_release_date`, `delete`) VALUES
(1, 'Kick', 'Salman khans movie', 'kick.jpg', '30 minutes', '2012-09-25', 0),
(3, 'Jurassic World', 'A movie about dinosaurs', 'world.jpg', '90 minutes', '2011-05-03', 0),
(4, 'Timepass', 'Dagdu, the son of an autorickshaw driver, falls in love with a girl named Prajakta. ', 'timepass.jpg', '20 minutes', '2008-07-11', 0),
(5, 'Spiderman', 'Spider-Man is a fictional superhero created by writer-editor Stan Lee and writer-artist Steve Ditko', 'spiderman.jpg', '40 minutes', '2000-09-25', 0),
(6, 'Titanic', 'Seventeen-year-old Rose hails from an aristocratic family and is set to be married. When she boards the Titanic, she meets Jack Dawson, an artist, and falls in love with him.', 'titanic.jpg', '55 minutes', '2016-10-23', 0),
(7, 'Ice Age', 'An ice age is a long period of reduction in the temperature of the Earth''s surface and atmosphere, resulting in the presence or expansion of continental and polar', 'iceage.jpg', '35 minutes', '2000-10-23', 0),
(8, 'Andhadhun', 'A series of mysterious events take place in the life of a blind pianist (Ayushmann Khurrana). Now, he must report a crime that he never actually witnessed.', 'andhadun.jpg', '55 minutes', '2018-10-05', 0),
(9, 'Antar', 'Antar is a Marathi short film about relationship between the grandfather and the granddaughter', 'antar.jpg', '15 minutes', '2000-06-25', 0),
(10, 'Kal Ho Naa Ho', 'Kal Ho Naa Ho also abbreviated as KHNH, is a 2003 Indian romantic drama film directed by Nikkhil Advani.', 'kalhonaho.jpg', '60 minutes', '2003-11-12', 0),
(11, 'Kung Fu Panda ', 'Kung Fu Panda is a 2008 American computer-animated action comedy martial arts film produced by DreamWorks Animation', 'kungfu.jpg', '45 minutes', '2008-07-21', 0),
(12, 'Johnny English', 'Johnny English is a 2003 British spy comedy film directed by Peter Howitt and written by Neal Purvis, Robert Wade and William Davies.', 'jonny.jpg', '80 minutes', '2003-12-22', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
