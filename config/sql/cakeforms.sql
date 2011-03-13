-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2011 at 10:54 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plugins`
--

-- --------------------------------------------------------

--
-- Table structure for table `cforms_cforms`
--

CREATE TABLE IF NOT EXISTS `cforms_cforms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `next` int(10) unsigned DEFAULT NULL,
  `redirect` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `auto_confirmation` tinyint(1) NOT NULL DEFAULT '0',
  `require_ssl` tinyint(1) NOT NULL DEFAULT '0',
  `hide_after_submission` tinyint(1) NOT NULL DEFAULT '0',
  `success_message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cforms_cforms`
--


-- --------------------------------------------------------

--
-- Table structure for table `cforms_form_fields`
--

CREATE TABLE IF NOT EXISTS `cforms_form_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT 'New Field',
  `label` varchar(255) DEFAULT NULL,
  `type` varchar(45) NOT NULL COMMENT 'text',
  `length` int(10) unsigned DEFAULT NULL COMMENT '255',
  `null` varchar(45) DEFAULT NULL,
  `default` varchar(255) DEFAULT NULL,
  `cform_id` int(10) unsigned NOT NULL,
  `required` tinyint(1) NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `options` text NOT NULL,
  `depends_on` varchar(45) DEFAULT NULL,
  `depends_value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cforms_form_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `cforms_form_fields_validation_rules`
--

CREATE TABLE IF NOT EXISTS `cforms_form_fields_validation_rules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_field_id` int(10) unsigned NOT NULL,
  `validation_rule_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cforms_form_fields_validation_rules`
--


-- --------------------------------------------------------

--
-- Table structure for table `cforms_submissions`
--

CREATE TABLE IF NOT EXISTS `cforms_submissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cform_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `ip` int(4) unsigned DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cforms_submissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `cforms_submission_fields`
--

CREATE TABLE IF NOT EXISTS `cforms_submission_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `submission_id` int(10) unsigned NOT NULL,
  `form_field` varchar(255) NOT NULL,
  `response` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cforms_submission_fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `cforms_validation_rules`
--

CREATE TABLE IF NOT EXISTS `cforms_validation_rules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rule` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cforms_validation_rules`
--

INSERT INTO `cforms_validation_rules` (`id`, `rule`, `message`, `name`) VALUES
(1, 'email', 'Please enter a valid email address.', 'Email'),
(3, 'alphaNumeric', 'This field may only contain letters and numbers.', 'AlphaNumeric'),
(4, 'cc', 'Please enter a valid credit card number.', 'Credit Card'),
(5, 'date', 'Please enter a valid date.', 'Date'),
(6, 'decimal', 'Please enter a decimal number.', 'Decimal'),
(7, 'money', 'Please enter a valid monetary amount.', 'Money'),
(8, 'numeric', 'Please enter a valid whole number.', 'Numeric'),
(9, 'phone', 'Please enter a valid US phone number.', 'Phone(US)'),
(10, 'postal', 'Please enter a valid Postal Code.', 'Postal Code'),
(11, 'ssn', 'Please enter a valid Social Securit Number.', 'SSN'),
(12, 'url', 'Please enter a valid URL.', 'Url');
