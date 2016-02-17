-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 05:21 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `ak`
--

CREATE TABLE `ak` (
  `id` int(11) NOT NULL auto_increment,
  `booked_lawer` varchar(500) default NULL,
  `case_sub` varchar(500) default NULL,
  `desc` varchar(500) NOT NULL,
  `time_date` datetime NOT NULL,
  `check` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ak`
--

INSERT INTO `ak` (`id`, `booked_lawer`, `case_sub`, `desc`, `time_date`, `check`) VALUES
(1, 'akash patel', 'dont know', 'dontknow', '2016-02-02 17:00:00', 0),
(3, 'akash3379', 'w', 'w', '2016-02-18 05:05:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `akash3379`
--

CREATE TABLE `akash3379` (
  `id` int(11) NOT NULL auto_increment,
  `client_name` varchar(100) NOT NULL,
  `case_sub` varchar(500) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `time_date` datetime NOT NULL,
  `check` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `akash3379`
--

INSERT INTO `akash3379` (`id`, `client_name`, `case_sub`, `desc`, `time_date`, `check`) VALUES
(3, 'ak', 's', 'a', '2016-02-11 01:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `avl`
--

CREATE TABLE `avl` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(500) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `avl`
--

INSERT INTO `avl` (`id`, `username`, `date1`, `date2`) VALUES
(1, 'akash3379', '2016-02-01', '2016-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lawer_or_client` int(2) NOT NULL default '0',
  `image` longblob,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `username`, `pass`, `city`, `phone`, `email`, `lawer_or_client`, `image`) VALUES
(1, 'akash patel', 'akash3379', 'akash', 'surat', '2147483647', 'akash3379@gmail.com', 1, NULL),
(2, 'ak', 'ak', 'ak', 'ak', '0', 'akash3379@gmail.com', 0, NULL);
