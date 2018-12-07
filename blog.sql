-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2018 às 17:48
-- Versão do servidor: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `post_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `online` int(1) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `content`, `user_id`, `type`, `created`, `online`, `category_id`) VALUES
(18, '1234', '0', '<p>asdfasdfasdfasdf</p>', 1, 'post', '2018-12-07 16:40:53', 1, 0),
(19, 'asdfasdf', '0', '<p>asdfasdfasdf</p>', 1, 'post', '2018-12-07 16:43:20', 1, 0),
(20, 'qwerfqweràwedf', 'qwerfqwerawedf', '<p>asdfasdfasdfasd</p>', 1, 'post', '2018-12-07 17:01:15', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_tags`
--

CREATE TABLE IF NOT EXISTS `posts_tags` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`) VALUES
(20, 20, 8),
(21, 20, 9),
(22, 20, 10),
(23, 19, 10),
(24, 19, 10),
(25, 19, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tags`
--

INSERT INTO `tags` (`id`, `name`, `count`) VALUES
(8, 'asdfasdf', 1),
(9, '1234123', 1),
(10, 'teste', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '557bad4f9dbb89a96f0ccc5e16bafbb298e4f886', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
 ADD PRIMARY KEY (`id`), ADD KEY `post_id` (`post_id`), ADD KEY `type` (`type`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `type` (`type`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
