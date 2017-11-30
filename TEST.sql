-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-11-30 10:57:05
-- 服务器版本： 5.7.11
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TEST`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_apply`
--

CREATE TABLE `think_apply` (
  `ID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Applytime` datetime NOT NULL,
  `Agentsname` varchar(50) NOT NULL,
  `Agentsize` varchar(25) NOT NULL,
  `AgentNum` int(4) NOT NULL,
  `SinglePrize` decimal(11,2) NOT NULL,
  `Discount` decimal(10,2) NOT NULL,
  `Saler` varchar(10) NOT NULL,
  `Company` varchar(15) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `ReID` varchar(25) NOT NULL,
  `Connect` varchar(20) NOT NULL,
  `OrderID` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_apply`
--

INSERT INTO `think_apply` (`ID`, `Applytime`, `Agentsname`, `Agentsize`, `AgentNum`, `SinglePrize`, `Discount`, `Saler`, `Company`, `Remarks`, `ReID`, `Connect`, `OrderID`) VALUES
('111777', '2017-11-30 13:44:40', 'CommonD', '50ML', 7, '99.00', '0.90', 'KEVIN', 'HFHWIUJ', 'jnfkwjfnkwef', '99797814', '1891793411', '11177720171130134440'),
('444111', '2017-11-30 16:18:27', 'CommonE', '1000mL', 1, '80.00', '0.90', 'djqifuiqfq', 'FWEFWFWF', 'effwfwfe', '8174981041', '1314141131', '44411120171130161827'),
('444111', '2017-11-30 16:18:35', 'CommonE', '1000mL', 1, '80.00', '0.90', 'djqifuiqfq', 'FWEFWFWF', 'effwfwfe', '8174981041', '1314141131', '44411120171130161835'),
('999999', '2017-11-30 13:31:45', 'CommonE', '150ML', 6, '90.00', '0.80', 'OOO', 'feferrefwf', '', '888089', '138999123', '99999920171130133145'),
('999999', '2017-11-30 14:19:58', 'CommonD', '400mL', 7, '88.60', '0.90', 'fw', '11131412', 'fwefwf', '8174941021', '09-294-104', '99999920171130141958');

-- --------------------------------------------------------

--
-- 表的结构 `think_checkapp`
--

CREATE TABLE `think_checkapp` (
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `CheckID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `OrderID` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `think_checkapp`
--

INSERT INTO `think_checkapp` (`status`, `comment`, `CheckID`, `OrderID`) VALUES
('yes', 'TEST2', '444111', '11177720171130134440'),
('yes', 'dfsfsf', '999999', '11177720171130134440'),
('no', 'SADFQWFQF', '999999', '99999920171130133145'),
('yes', 'joihoio', '999999', '99999920171130141958');

-- --------------------------------------------------------

--
-- 表的结构 `think_comment`
--

CREATE TABLE `think_comment` (
  `commID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `stuID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subtime` date NOT NULL,
  `score` decimal(10,1) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `commtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_comment`
--

INSERT INTO `think_comment` (`commID`, `stuID`, `subtime`, `score`, `comments`, `commtime`) VALUES
('111777', '999999', '2017-11-17', '6.0', '', '2017-11-13 21:11:51'),
('444111', '444111', '2017-11-27', '9.9', '大大大', '2017-11-26 23:21:47'),
('999999', '111777', '2017-11-04', '5.5', 'ufuifhuwief ', '2017-11-09 15:42:43'),
('999999', '111777', '2017-11-09', '7.4', 'DEFAULT', '2017-11-24 11:40:19'),
('999999', '888111', '2017-11-09', '3.4', 'qfuiqhugeq', '2017-11-09 15:41:22'),
('999999', '999999', '2017-11-17', '1.2', 'fqefqefqf', '2017-11-17 11:27:48'),
('999999', '999999', '2017-11-24', '10.0', 'TESTTEST', '2017-11-17 11:31:24'),
('999999', '999999', '2017-11-29', '7.7', '测试TEST', '2017-11-17 11:28:50');

-- --------------------------------------------------------

--
-- 表的结构 `think_editin`
--

CREATE TABLE `think_editin` (
  `ID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Edtime` datetime NOT NULL,
  `Reagent` varchar(20) NOT NULL,
  `Number` int(4) NOT NULL,
  `Store` varchar(10) NOT NULL,
  `Size` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `action` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_editin`
--

INSERT INTO `think_editin` (`ID`, `Edtime`, `Reagent`, `Number`, `Store`, `Size`, `action`) VALUES
('999999', '2017-11-29 22:29:57', 'TESTA', 4, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:30:44', 'TESTA', 4, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:35:12', 'TESTA', 1, 'ClosetA', '200mL', 'fetch'),
('999999', '2017-11-29 22:39:29', 'TESTA', 12, 'ClosetA', '100mL', 'deposit'),
('999999', '2017-11-29 22:42:04', 'TESTA', 1, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:42:22', 'TESTA', 1, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:42:38', 'TESTA', 1, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:42:55', 'TESTA', 1, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:43:07', 'TESTA', 1, 'ClosetA', '100mL', 'fetch'),
('999999', '2017-11-29 22:43:54', 'TESTA', 1, 'ClosetA', '100mL', 'deposit'),
('999999', '2017-11-29 22:44:13', 'TESTA', 1, 'ClosetA', '100mL', 'deposit'),
('999999', '2017-11-29 22:44:29', 'TESTA', 1, 'ClosetA', '100mL', 'deposit');

-- --------------------------------------------------------

--
-- 表的结构 `think_file`
--

CREATE TABLE `think_file` (
  `ID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subtime` date NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `realuptime` datetime NOT NULL,
  `FileAddres` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Filesize` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_file`
--

INSERT INTO `think_file` (`ID`, `subtime`, `FileName`, `realuptime`, `FileAddres`, `Filesize`) VALUES
('111777', '2017-11-04', '徐轶舟工作小结171029.docx', '2017-11-03 21:17:21', './2017-11-04/11177720171103211721.docx', 4048156),
('111777', '2017-11-09', 'php2.ppt', '2017-11-03 20:52:05', './2017-11-09/11177720171103205205.ppt', 239104),
('444111', '2017-11-27', '徐轶舟工作小结171119.docx', '2017-11-26 23:21:01', './2017-11-27/44411120171126232101.docx', 3278214),
('444111', '2017-11-29', '徐轶舟工作小结171112.docx', '2017-11-26 23:20:00', './2017-11-29/44411120171126232000.docx', 3178420),
('888111', '2017-11-09', '工作报告10.9-10.22.docx', '2017-11-09 14:52:05', './2017-11-09/88811120171109145205.docx', 3106544),
('999999', '2017-11-16', 'HW2.docx', '2017-11-13 21:06:03', './2017-11-16/99999920171113210603.docx', 92754),
('999999', '2017-11-17', '研究生应该怎样高效规划学习研究生涯.docx', '2017-11-13 21:06:24', './2017-11-17/99999920171113210624.docx', 143067),
('999999', '2017-11-24', 'hw3.docx', '2017-11-13 21:31:09', './2017-11-24/99999920171113213109.docx', 91501),
('999999', '2017-11-29', '研究生应该怎样高效规划学习研究生涯.docx', '2017-11-16 11:01:57', './2017-11-29/99999920171116110157.docx', 143067);

-- --------------------------------------------------------

--
-- 表的结构 `think_profile`
--

CREATE TABLE `think_profile` (
  `ID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RealName` varchar(15) NOT NULL,
  `Grade` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Gender` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LastEdit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Guider` varchar(15) NOT NULL,
  `Image` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_profile`
--

INSERT INTO `think_profile` (`ID`, `RealName`, `Grade`, `Gender`, `LastEdit`, `Guider`, `Image`) VALUES
('000002', 'TEST', 'Master', '0', '2017-11-03 03:55:58', 'EXAMPLE', './image/00000220171103115558.png'),
('111777', '0', '0', '0', '2017-10-31 13:37:37', '0', './image/exp.jpg'),
('1117771', '0', '0', '0', '2017-11-02 03:37:40', '0', './image/exp.jpg'),
('123198911', '0', '0', '0', '2017-10-25 10:48:54', '0', '0'),
('123451', '0', '0', '0', '2017-10-25 12:56:21', '0', './image/exp.jpg'),
('134211', '0', '0', '0', '2017-11-02 04:00:28', '0', './image/exp.jpg'),
('13421113', '0', '0', '0', '2017-11-02 12:53:03', '0', './image/exp.jpg'),
('144121131', '0', '0', '0', '2017-11-02 03:42:47', '0', './image/exp.jpg'),
('3113111313', '0', '0', '0', '2017-11-02 12:53:42', '0', './image/exp.jpg'),
('444111', '0', '0', '0', '2017-11-26 15:18:35', '0', './image/exp.jpg'),
('6743123', '0', '0', '0', '2017-10-25 10:50:34', '0', '0'),
('777111', '0', '0', '0', '2017-10-31 13:36:24', '0', './image/exp.jpg'),
('888111', '0', '0', '0', '2017-11-09 06:50:56', '0', './image/exp.jpg'),
('999999', '测试', 'Master', 'Male', '2017-11-09 03:31:07', '测试2', './image/99999920171030213351.png'),
('9999991', '0', '0', '0', '2017-11-02 12:51:34', '0', './image/exp.jpg'),
('ddsfqqw', '0', '0', '0', '2017-11-02 03:45:37', '0', './image/exp.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `think_reagent`
--

CREATE TABLE `think_reagent` (
  `Name` varchar(20) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Store` varchar(10) NOT NULL,
  `Number` int(4) NOT NULL,
  `Lasttime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_reagent`
--

INSERT INTO `think_reagent` (`Name`, `Size`, `Store`, `Number`, `Lasttime`) VALUES
('TESTA', '100mL', 'ClosetA', 21, '2017-11-29 22:44:29'),
('TESTA', '100mL', 'ClosetC', 7, '2017-11-30 14:43:50'),
('TESTA', '200mL', 'ClosetA', 16, '2017-11-29 22:35:12'),
('TESTB', '5mL', 'ClosetA', 14, '2017-11-29 22:37:01'),
('TESTB', '5mL', 'ClosetC', 18, '2017-11-24 10:33:09'),
('TESTC', '1000mL', 'ClosetB', 9, '2017-06-29 21:00:45'),
('TESTC', '1000mL', 'ClosetC', 42, '2017-11-29 22:44:57');

-- --------------------------------------------------------

--
-- 表的结构 `think_register`
--

CREATE TABLE `think_register` (
  `ID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `regtime` datetime NOT NULL,
  `lastlog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `auth` decimal(10,1) NOT NULL,
  `loginip` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `regip` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_register`
--

INSERT INTO `think_register` (`ID`, `Name`, `Password`, `email`, `regtime`, `lastlog`, `auth`, `loginip`, `regip`) VALUES
('000002', 'EDIT', '96e79218965eb72c92a549dd5a330112', 'edit@qq.com', '2017-11-03 11:48:45', '2017-11-03 03:48:54', '0.0', '::1', '::1'),
('111333', 'hhh', '7fa8282ad93047a4d6fe6111c93b308a', 'ggg@qq.com', '2017-10-17 23:20:06', '2017-10-26 10:58:25', '0.0', '', '0'),
('111777', 'AUTH', '96e79218965eb72c92a549dd5a330112', 'AUTH@sjtu.cn', '2017-10-31 21:37:37', '2017-11-30 06:24:50', '1.8', '::1', '::1'),
('1117771', '13d13r', '96e79218965eb72c92a549dd5a330112', '123123@qq.com', '2017-11-02 11:37:40', '2017-11-02 03:37:40', '0.0', '0', '::1'),
('123123123', 'ASSS', '7fa8282ad93047a4d6fe6111c93b308a', '111111@qq.com', '2017-10-19 11:33:27', '2017-10-26 10:58:25', '0.0', '', '0'),
('123123131', 'fewfwefwf', '7fa8282ad93047a4d6fe6111c93b308a', '2314@qq.com', '2017-10-20 20:38:35', '2017-10-26 10:58:25', '0.0', '', '0'),
('1231231312', 'fewfwefwf2', '7fa8282ad93047a4d6fe6111c93b308a', '23142@qq.com', '2017-10-20 20:42:18', '2017-10-26 10:58:25', '0.0', '', '0'),
('1231989', '1123123', '7fa8282ad93047a4d6fe6111c93b308a', '13131@qq.com', '2017-10-25 18:46:53', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('12319891', '11231232', '7fa8282ad93047a4d6fe6111c93b308a', '133131@qq.com', '2017-10-25 18:47:40', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('123198911', '112312322', '7fa8282ad93047a4d6fe6111c93b308a', '1331321@qq.com', '2017-10-25 18:48:54', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('123213123', '13dwef', '7fa8282ad93047a4d6fe6111c93b308a', '231123@qq.com', '2017-10-23 10:44:58', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('123412', 'DWADADA', '7fa8282ad93047a4d6fe6111c93b308a', 'example@email.com', '2017-10-20 12:00:25', '2017-10-26 10:58:25', '0.0', '', '0'),
('1234123', 'DWADADAA', '7fa8282ad93047a4d6fe6111c93b308a', 'example1@email.com', '2017-10-20 12:00:42', '2017-10-26 10:58:25', '0.0', '', '0'),
('123451', '1234511', '7fa8282ad93047a4d6fe6111c93b308a', '1234511@qq.com', '2017-10-25 19:32:07', '2017-10-26 10:58:25', '0.0', '::1', '::1'),
('12345678', 'DDDDD', '7fa8282ad93047a4d6fe6111c93b308a', 'molle_faust@hotmail.com', '2017-10-17 23:20:06', '2017-10-26 10:58:25', '0.0', '', '0'),
('123456781', '1312312d', '7fa8282ad93047a4d6fe6111c93b308a', 'ffdf@qq.com', '2017-10-25 18:45:37', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('1314124', '23dwe', '7fa8282ad93047a4d6fe6111c93b308a', '1111121@qq.com', '2017-10-20 11:44:37', '2017-10-26 10:58:25', '0.0', '', '0'),
('134211', 'testss', '96e79218965eb72c92a549dd5a330112', '23131@qq.com', '2017-11-02 12:00:28', '2017-11-02 04:00:28', '0.0', '0', '::1'),
('13421113', '1131313', '96e79218965eb72c92a549dd5a330112', '2312321d@qq.com', '2017-11-02 20:53:03', '2017-11-02 12:53:03', '0.0', '0', '::1'),
('144121131', '111231', '96e79218965eb72c92a549dd5a330112', 'hhhh@qq.com', '2017-11-02 11:42:47', '2017-11-02 03:42:47', '0.0', '0', '::1'),
('3113111313', '对的大大', '96e79218965eb72c92a549dd5a330112', '131ddd31@qq.com', '2017-11-02 20:53:42', '2017-11-02 12:53:42', '0.0', '0', '::1'),
('34121', 'DFQ', '7fa8282ad93047a4d6fe6111c93b308a', '2222@QQ.COM', '2017-10-19 10:24:41', '2017-10-26 10:58:25', '0.0', '', '0'),
('34123', 'FFFW', '7fa8282ad93047a4d6fe6111c93b308a', 'FFF@QQ.COM', '2017-10-19 10:23:15', '2017-10-26 10:58:25', '0.0', '', '0'),
('345123', 'GGgSS', '7fa8282ad93047a4d6fe6111c93b308a', 'DDD@QQ.COM', '2017-10-19 10:17:19', '2017-10-26 10:58:25', '0.0', '', '0'),
('345123456', 'hteh', '7fa8282ad93047a4d6fe6111c93b308a', '345123@qq.com', '2017-10-19 10:21:24', '2017-10-26 10:58:25', '0.0', '', '0'),
('421', 'SAS', '7fa8282ad93047a4d6fe6111c93b308a', 'FEWF@QQ.COM', '2017-10-19 17:34:21', '2017-10-26 10:58:25', '0.0', '', '0'),
('444111', 'testdd', '96e79218965eb72c92a549dd5a330112', 'mmm@mmm.com', '2017-11-26 23:18:35', '2017-11-30 07:25:47', '2.0', '::1', '::1'),
('444123', 'PROFILE', '7fa8282ad93047a4d6fe6111c93b308a', '123@qq.com', '2017-10-25 18:43:19', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('444555', 'EEQ', '7fa8282ad93047a4d6fe6111c93b308a', '4455@QQ.COM', '2017-10-17 15:20:25', '2017-10-26 10:58:25', '0.0', '', '0'),
('456456', 'hhhhh', '7fa8282ad93047a4d6fe6111c93b308a', '222@qq.com', '2017-10-19 10:19:50', '2017-10-26 10:58:25', '0.0', '', '0'),
('52352525', 'AASAS', '7fa8282ad93047a4d6fe6111c93b308a', '1231312@QQ.COM', '2017-10-20 20:36:31', '2017-10-26 10:58:25', '0.0', '', '0'),
('562', 'HET', '7fa8282ad93047a4d6fe6111c93b308a', 'EERW@QQ.COM', '2017-10-19 10:23:50', '2017-10-26 10:58:25', '0.0', '', '0'),
('645635636', '1dddddd', '7fa8282ad93047a4d6fe6111c93b308a', '23451@qq.com', '2017-10-23 10:43:59', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('666666', 'HFS', '7fa8282ad93047a4d6fe6111c93b308a', '666666@ww.com', '2017-10-17 23:23:20', '2017-10-26 10:58:25', '0.0', '', '0'),
('6743123', '123123123', '7fa8282ad93047a4d6fe6111c93b308a', 'KKFJU@QQ.COM', '2017-10-25 18:50:34', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('777111', 'NOAUTH', '96e79218965eb72c92a549dd5a330112', 'noauth@sjtu.cn', '2017-10-31 21:36:24', '2017-10-31 13:39:10', '0.0', '::1', '::1'),
('777666', 'f123', '7fa8282ad93047a4d6fe6111c93b308a', '777@qq.com', '2017-10-19 10:18:31', '2017-10-26 10:58:25', '0.0', '', '0'),
('777777', '1312313', '7fa8282ad93047a4d6fe6111c93b308a', '888777@qq.com', '2017-10-23 11:28:45', '2017-10-26 10:58:25', '0.0', '::1', '::1'),
('789789789', 'XYZXYZ', '7fa8282ad93047a4d6fe6111c93b308a', '12554@qq.com', '2017-10-18 21:51:12', '2017-10-26 10:58:25', '0.0', '', '0'),
('857585', 'efqfeqf', '7fa8282ad93047a4d6fe6111c93b308a', 'fe2f@qq.com', '2017-10-23 11:36:48', '2017-10-26 10:58:25', '0.0', '0', '::1'),
('888111', 'TEST2', '96e79218965eb72c92a549dd5a330112', 'TEST2@QQ.COM', '2017-11-09 14:50:56', '2017-11-24 04:00:41', '1.0', '::1', '::1'),
('888888', 'sss', '7fa8282ad93047a4d6fe6111c93b308a', 'faustx@sjtu.edu.cn', '2017-10-17 23:20:06', '2017-10-26 10:58:25', '0.0', '', '0'),
('8888888', '123123131', '7fa8282ad93047a4d6fe6111c93b308a', '8888777@qq.com', '2017-10-23 11:34:25', '2017-10-26 10:58:25', '0.0', '::1', '::1'),
('9090', 'DDSA', '7fa8282ad93047a4d6fe6111c93b308a', '234@qq.com', '2017-10-19 20:35:45', '2017-10-26 10:58:25', '0.0', '', '0'),
('999999', '999111', '7fa8282ad93047a4d6fe6111c93b308a', '12123131@qq.com', '2017-10-25 19:46:08', '2017-11-30 06:47:04', '2.0', '::1', '::1'),
('9999991', '好的的', '96e79218965eb72c92a549dd5a330112', 'dudajda@qq.com', '2017-11-02 20:51:34', '2017-11-02 12:51:34', '0.0', '0', '::1'),
('ddsfqqw', '1112311', '96e79218965eb72c92a549dd5a330112', '12311231@qq.com', '2017-11-02 11:45:37', '2017-11-02 03:45:37', '0.0', '0', '::1');

-- --------------------------------------------------------

--
-- 表的结构 `think_search`
--

CREATE TABLE `think_search` (
  `ID` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subtime` date NOT NULL,
  `realtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `think_search`
--

INSERT INTO `think_search` (`ID`, `subtime`, `realtime`) VALUES
('111777', '2017-11-09', '2017-11-24 04:00:03'),
('444111', '2017-11-27', '2017-11-26 15:22:33'),
('888111', '2017-11-09', '2017-11-24 04:02:52'),
('999999', '2017-11-17', '2017-11-24 03:50:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_apply`
--
ALTER TABLE `think_apply`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `think_checkapp`
--
ALTER TABLE `think_checkapp`
  ADD PRIMARY KEY (`CheckID`,`OrderID`),
  ADD KEY `checkapp_orID` (`OrderID`);

--
-- Indexes for table `think_comment`
--
ALTER TABLE `think_comment`
  ADD PRIMARY KEY (`commID`,`stuID`,`subtime`),
  ADD KEY `stuID` (`stuID`);

--
-- Indexes for table `think_editin`
--
ALTER TABLE `think_editin`
  ADD PRIMARY KEY (`ID`,`Edtime`),
  ADD KEY `edinv_Re` (`Reagent`);

--
-- Indexes for table `think_file`
--
ALTER TABLE `think_file`
  ADD PRIMARY KEY (`ID`,`subtime`);

--
-- Indexes for table `think_profile`
--
ALTER TABLE `think_profile`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `think_reagent`
--
ALTER TABLE `think_reagent`
  ADD PRIMARY KEY (`Name`,`Size`,`Store`);

--
-- Indexes for table `think_register`
--
ALTER TABLE `think_register`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `think_search`
--
ALTER TABLE `think_search`
  ADD PRIMARY KEY (`ID`);

--
-- 限制导出的表
--

--
-- 限制表 `think_checkapp`
--
ALTER TABLE `think_checkapp`
  ADD CONSTRAINT `checkapp_orID` FOREIGN KEY (`OrderID`) REFERENCES `think_apply` (`OrderID`);

--
-- 限制表 `think_editin`
--
ALTER TABLE `think_editin`
  ADD CONSTRAINT `edinv_ID` FOREIGN KEY (`ID`) REFERENCES `think_register` (`ID`),
  ADD CONSTRAINT `edinv_Re` FOREIGN KEY (`Reagent`) REFERENCES `think_reagent` (`Name`);

--
-- 限制表 `think_file`
--
ALTER TABLE `think_file`
  ADD CONSTRAINT `FI_ID` FOREIGN KEY (`ID`) REFERENCES `think_register` (`ID`);

--
-- 限制表 `think_profile`
--
ALTER TABLE `think_profile`
  ADD CONSTRAINT `PR_ID` FOREIGN KEY (`ID`) REFERENCES `think_register` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
