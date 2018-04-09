-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2014 at 06:04 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storyboard`
--
CREATE DATABASE IF NOT EXISTS `storyboard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `storyboard`;

-- --------------------------------------------------------

--
-- Table structure for table `ats`
--

DROP TABLE IF EXISTS `ats`;
CREATE TABLE IF NOT EXISTS `ats` (
  `postID` int(11) NOT NULL,
  `ats` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

DROP TABLE IF EXISTS `boards`;
CREATE TABLE IF NOT EXISTS `boards` (
  `boardID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `boardName` text NOT NULL,
  `edit` int(11) NOT NULL,
  `peopleAllowed` longtext NOT NULL,
  `see` int(11) NOT NULL,
  `favorite` int(11) NOT NULL,
  UNIQUE KEY `boardID` (`boardID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`boardID`, `userID`, `boardName`, `edit`, `peopleAllowed`, `see`, `favorite`) VALUES
(1, 1, 'Me', 0, '', 1, 1),
(4, 2, 'Me', 0, '', 1, 1),
(6, 3, 'Me', 0, '', 1, 1),
(8, 30, 'Me', 0, '', 1, 1),
(11, 39, 'Me', 0, '', 1, 1),
(12, 2, 'helloWorld', 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buddys`
--

DROP TABLE IF EXISTS `buddys`;
CREATE TABLE IF NOT EXISTS `buddys` (
  `friendUnoID` int(11) NOT NULL,
  `friendDosID` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `seen2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buddys`
--

INSERT INTO `buddys` (`friendUnoID`, `friendDosID`, `seen`, `seen2`) VALUES
(3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `datePlusTime` datetime NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
CREATE TABLE IF NOT EXISTS `follows` (
  `boardID` int(11) NOT NULL,
  `followerID` int(11) NOT NULL,
  `seen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`boardID`, `followerID`, `seen`) VALUES
(4, 2, 0),
(4, 1, 1),
(1, 1, 0),
(1, 2, 1),
(1, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friendRequests`
--

DROP TABLE IF EXISTS `friendRequests`;
CREATE TABLE IF NOT EXISTS `friendRequests` (
  `friendSenderID` int(11) NOT NULL,
  `newFriendID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

DROP TABLE IF EXISTS `hashtags`;
CREATE TABLE IF NOT EXISTS `hashtags` (
  `postID` int(11) NOT NULL,
  `hashtag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`postID`, `hashtag`) VALUES
(1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `boardID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `datePlusTime` datetime NOT NULL,
  `content` text NOT NULL,
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `topper` int(11) NOT NULL,
  `lefter` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=322 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`boardID`, `userID`, `datePlusTime`, `content`, `postID`, `topper`, `lefter`, `seen`) VALUES
(1, 3, '2014-08-01 22:47:15', 'div0', 320, 176, 223, 1),
(6, 1, '2014-08-01 23:01:30', 'div0', 321, 125, 212, 1);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

DROP TABLE IF EXISTS `search`;
CREATE TABLE IF NOT EXISTS `search` (
  `text` text NOT NULL,
  `searches` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`text`, `searches`) VALUES
('HEY', 1),
('s', 97),
('', 125),
('h', 2),
('hg', 3),
('hgd', 2),
('hgd', 2),
('hgde', 1),
('ddssaaa', 6),
('hey avi :) the search works sorta', 1),
('hey avi :) the search works sort', 1),
('hgtuk', 1),
('hgi', 1),
('bguh', 1),
('bguhf', 2),
('dfvsdcz', 1),
('hhhgggg', 2),
('hfdgzsf', 1),
('hfdgzsfbf', 1),
('hfdgzsfbfngxbf', 1),
('hfdgzsfbfngxbffgbx', 1),
('ndgbdfz', 1),
('nfgbv', 1),
('nfgbxv', 1),
('ujtryte', 1),
('steven is awesome', 1),
('ujtydh', 1),
('mhnbv', 1),
('afg', 1),
('qwrewtr', 1),
('xcbv', 1),
('mjhnfgb', 1),
('pudding', 1),
('avi is awesome', 341),
('YEEEESSS IT WORKS!!!!', 13),
('This should be the first suggestion', 335),
('SDFH', 1),
('SDFHGESR', 1),
('HRT', 1),
('HRTGFN', 1),
('HRTGFNGFN', 1),
('HRTGFNGFNGF', 1),
('HRTGFNGFNGFXFGN', 1),
('HRTGFNGFNGFXFGNGFN', 2),
('search', 242),
('This is SO COOOOOLLLL', 96),
('av', 5),
('avi is awesome4', 2),
('hgg', 1),
('iiiiiiii', 1),
('i', 11),
('iyy', 58),
('hgd cotflbuygcdygfi kyt', 4),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi kyt]\\', 1),
('hgd cotflbuygcdygfi ky', 67),
('avi respond', 545),
('IT WORKS !!!!!!!!!!!!!!!!!!!!!', 753),
('gihjfsldkhhe', 1),
('hfdj', 1),
('hi grandpa', 252),
('httey', 1),
('ggrt', 3),
('fgf', 1),
('gbhkj', 2),
('ghjkj', 3),
('ghjk', 3),
('ghj', 2),
('gh', 5),
('g', 14),
('gy', 1),
('igubh', 13),
('jnkm', 4),
('jnkmhn', 6),
('bjnk', 28),
('hijok', 2),
('cfygu', 1),
('cfyguj', 2),
('cfygujk', 1),
('vgbuh', 1),
('hunkl', 3),
('gbj', 1),
('bkhm', 1),
('no', 1),
('jhk', 1),
('ugh', 1),
('fyvgi', 1),
('fygjk', 1),
('j', 1),
('guh', 2),
('jmgfhd', 1),
('hdg', 1),
('hey wats up', 1),
('jk', 1),
('guhiljk', 1),
('fyugiuh', 3),
('jjjs', 1),
('hjjjs', 1),
('jjdjs', 1),
('jkjd', 1),
('jkjens', 1),
('iknjkss', 1),
('hiks', 1),
('jkjsn', 2),
('gfxsr', 1),
('bkme', 1),
('jjns', 1),
('hbxf', 1),
('jbbj', 1),
('hjbch', 1),
('kknjs', 1),
('gjjs', 1),
('hjb', 1),
('jkvg', 1),
('thcc', 1),
('hhvv', 1),
('hjbv', 1),
('tjvsd', 1),
('fhvx', 1),
('jjfg', 1),
('hhvj', 1),
('jkcfv', 2),
('hjbvs', 1),
('ghbv', 1),
('hkfg', 1),
('fnks', 1),
('hgbd', 6),
('hgsefa', 1),
('Ste', 15),
('cjyvgjh', 1),
('cfvgjh', 1),
('dvgj', 1),
('S', 95),
('fhgj', 1),
('vgsd', 1),
('Steven Grutman', 2),
('Avi Goldman', 2),
('Avi Goldmanq', 1),
('gjh', 1),
('gubhnjsfd', 1),
('Peters', 1),
('jlm', 2),
('bhkj', 1),
('fdzf', 1),
('Hailey', 1),
('dtfygu', 1),
('Avu', 1),
('Av', 5),
('fyvguhk', 1),
('hinj;k', 1),
('a', 28),
('gubhij', 1),
('A', 27),
('Steven grutman', 2),
('steven grutman', 2),
('stev', 2),
('Stev', 2),
('sh', 2),
('Avi', 2),
('st', 4),
('St', 2),
('sT', 1),
('sTeVEN gRuTmaN', 2),
('Sh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `profPicLoc` text NOT NULL,
  `password` text NOT NULL,
  `realName` text NOT NULL,
  `birthday` date NOT NULL,
  `meBoardID` int(11) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `profPicLoc`, `password`, `realName`, `birthday`, `meBoardID`, `email`) VALUES
(1, 'sgrutman978', 'doggyImage.jpg', 'temporary', 'Steven Grutman', '1997-05-06', 1, 'sgrutman978@gmail.com'),
(2, 'avigoldmankid', 'avs.jpg', 'temporary', 'Avi Goldman', '1997-07-03', 4, '0'),
(3, 'smiley1121', 'heySmiles.jpg', 'temporary', 'Smiley (Evan) Quartner', '1997-06-24', 6, '0'),
(30, 'musicIsMyLife', '151257788215_n.jpg', 'temporary', 'Shani Goloskov', '1997-08-24', 8, 'musicismylife@gmail.com'),
(39, 'sgrutman830', 'mom5678312_n.jpg', 'stevenhailey', 'Sharon Grutman', '1970-08-30', 11, 'sharonbg1@msn.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
