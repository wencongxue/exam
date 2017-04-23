-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-04-22 14:49:01
-- 服务器版本： 5.7.17
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='鐝?骇琛';

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(1, '计算机1501'),
(2, '计算机1502'),
(3, '计算机1503'),
(4, '营销1501');

-- --------------------------------------------------------

--
-- 表的结构 `exam`
--

CREATE TABLE `exam` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `paperId` int(10) UNSIGNED NOT NULL,
  `beginTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `subject` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='考试表';

--
-- 转存表中的数据 `exam`
--

INSERT INTO `exam` (`id`, `title`, `paperId`, `beginTime`, `endTime`, `subject`) VALUES
(4, 'java期末测试01', 3, '2017-04-21 15:57:13', '2017-04-21 16:57:21', 1),
(5, 'java测试02', 4, '2017-04-21 22:22:26', '2017-04-21 23:22:29', 1),
(6, 'java期末测试02', 3, '2017-04-22 14:42:27', '2017-04-22 16:42:32', 1);

-- --------------------------------------------------------

--
-- 表的结构 `paper`
--

CREATE TABLE `paper` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `qIds` text NOT NULL,
  `sScore` tinyint(3) UNSIGNED DEFAULT NULL,
  `mScore` tinyint(3) UNSIGNED DEFAULT NULL,
  `cScore` tinyint(3) UNSIGNED DEFAULT NULL,
  `totalScore` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `passScore` int(10) UNSIGNED NOT NULL DEFAULT '60',
  `subject` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='试卷表';

--
-- 转存表中的数据 `paper`
--

INSERT INTO `paper` (`id`, `title`, `qIds`, `sScore`, `mScore`, `cScore`, `totalScore`, `passScore`, `subject`) VALUES
(1, 'java试卷01', '27,598b39e618b39e638b39e', 3, 5, 2, 13, 7, 1),
(2, 'java试卷02', '22,408b39e618b39e638b39e', 3, 5, 2, 13, 7, 1),
(3, 'java试卷03', '38,488b39e618b39e628b39e', 3, 5, 2, 13, 7, 1),
(4, 'java试卷04', '27,358b39e618b39e8b39e', 3, 5, 0, 11, 6, 1);

-- --------------------------------------------------------

--
-- 表的结构 `qtype`
--

CREATE TABLE `qType` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='棰樼洰绫诲瀷琛';

--
-- 转存表中的数据 `qtype`
--

INSERT INTO `qtype` (`id`, `type`) VALUES
(1, '单选题'),
(2, '多选题'),
(3, '判断题');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL,
  `cont` text NOT NULL,
  `answer` varchar(10) NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `subject` varchar(20) NOT NULL DEFAULT 'java'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='璇曢?琛';

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `cont`, `answer`, `type`, `subject`) VALUES
(7, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '3'),
(12, '刚才代码写错了8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '2'),
(17, 'dff8b39eA.ff', 'A', 1, '1'),
(20, '&lt;h1&gt;测试攻击&lt;/h1&gt;8b39eA.ff8b39eB.ff8b39eC.ff8b39eD.ff', 'D', 1, '1'),
(21, '多选题8b39eA.dff8b39eB.adfdas8b39eC.asdfsdf8b39eD.asdfsd', 'AB', 2, '2'),
(22, 'dfdsafas8b39eA.fasdfasd8b39eB.asdfasdf8b39eC.asdfasdfa8b39eD.sdfasdf', 'D', 1, '1'),
(27, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(28, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(29, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '3'),
(30, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(31, '刚才代码写错了8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '2'),
(32, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(33, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(34, '&lt;h1&gt;测试攻击&lt;/h1&gt;8b39eA.ff8b39eB.ff8b39eC.ff8b39eD.ff', 'D', 1, '1'),
(35, 'dfdsafas8b39eA.fasdfasd8b39eB.asdfasdf8b39eC.asdfasdfa8b39eD.sdfasdf', 'D', 1, '1'),
(36, '多选题8b39eA.dff8b39eB.adfdas8b39eC.asdfsdf8b39eD.asdfsd', 'AB', 2, '2'),
(37, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '3'),
(38, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(39, '刚才代码写错了8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '2'),
(40, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(41, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(42, '&lt;h1&gt;测试攻击&lt;/h1&gt;8b39eA.ff8b39eB.ff8b39eC.ff8b39eD.ff', 'D', 1, '1'),
(43, 'dfdsafas8b39eA.fasdfasd8b39eB.asdfasdf8b39eC.asdfasdfa8b39eD.sdfasdf', 'D', 1, '1'),
(44, '多选题8b39eA.dff8b39eB.adfdas8b39eC.asdfsdf8b39eD.asdfsd', 'AB', 2, '2'),
(45, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '3'),
(46, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(47, '刚才代码写错了8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '2'),
(48, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(49, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(50, '&lt;h1&gt;测试攻击&lt;/h1&gt;8b39eA.ff8b39eB.ff8b39eC.ff8b39eD.ff', 'D', 1, '1'),
(51, 'dfdsafas8b39eA.fasdfasd8b39eB.asdfasdf8b39eC.asdfasdfa8b39eD.sdfasdf', 'D', 1, '1'),
(52, '多选题8b39eA.dff8b39eB.adfdas8b39eC.asdfsdf8b39eD.asdfsd', 'AB', 2, '2'),
(53, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '3'),
(54, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(55, '刚才代码写错了8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '2'),
(56, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(57, '修改后的8b39eA.fdasfds8b39eB.fdf8b39eC.dfdf8b39eD.dfdf', 'A', 1, '1'),
(58, '&lt;h1&gt;测试攻击&lt;/h1&gt;8b39eA.ff8b39eB.ff8b39eC.ff8b39eD.ff', 'D', 1, '1'),
(59, 'dfdsafas8b39eA.fasdfasd8b39eB.asdfasdf8b39eC.asdfasdfa8b39eD.sdfasdf', 'D', 1, '1'),
(60, '多选题8b39eA.dff8b39eB.adfdas8b39eC.asdfsdf8b39eD.asdfsd', 'AB', 2, '2'),
(61, 'java多选题8b39eA.发发斯蒂芬8b39eB.发发送到 8b39eC.发送到发送到发8b39eD.发斯蒂芬斯蒂芬', 'AC', 2, '1'),
(62, '这是一道判断题', 'A', 3, '1'),
(63, '判断题', 'B', 3, '1');

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE `score` (
  `id` int(10) UNSIGNED NOT NULL,
  `stuId` int(10) UNSIGNED NOT NULL,
  `examId` int(10) UNSIGNED NOT NULL,
  `stuScore` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='鎴愮哗琛';

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`id`, `stuId`, `examId`, `stuScore`) VALUES
(1, 5, 5, 8),
(2, 5, 6, 13),
(3, 6, 6, 13),
(4, 7, 6, 13),
(5, 10, 6, 13),
(6, 11, 6, 13);

-- --------------------------------------------------------

--
-- 表的结构 `subject`
--

CREATE TABLE `subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `sName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='绉戠洰琛';

--
-- 转存表中的数据 `subject`
--

INSERT INTO `subject` (`id`, `sName`) VALUES
(1, 'JAVA'),
(2, 'VB'),
(3, '高等数学'),
(4, '编译原理');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(40) NOT NULL,
  `class` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='鐢ㄦ埛琛';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `class`, `type`) VALUES
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', -1, 1),
(5, '薛文聪', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 0),
(6, '黑崎一护', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0),
(7, '蜡笔小新', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 0),
(8, '&lt;h1&gt;恶意注册测试&lt;', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 0),
(9, '蜡笔小新', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 0),
(10, 'test01', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0),
(11, 'test02', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0),
(12, 'test03', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qtype`
--
ALTER TABLE `qtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `qtype`
--
ALTER TABLE `qtype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- 使用表AUTO_INCREMENT `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
