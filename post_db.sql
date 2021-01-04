-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Січ 04 2021 р., 14:17
-- Версія сервера: 10.4.17-MariaDB
-- Версія PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `post_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `authors`
--

CREATE TABLE `authors` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `id_author` int(11) UNSIGNED DEFAULT NULL COMMENT 'fk',
  `id_post` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `Desctiption` text NOT NULL,
  `Date_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `author_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `category_id` int(11) UNSIGNED DEFAULT NULL COMMENT 'fk',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('saved','posted','inprocess','rejected','approved') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `author_id` int(11) UNSIGNED DEFAULT NULL COMMENT 'fk',
  `post_id` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `post_photos`
--

CREATE TABLE `post_photos` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'pk',
  `id_post` int(11) UNSIGNED NOT NULL COMMENT 'fk',
  `Photo_Path` varchar(100) NOT NULL COMMENT 'Text(photo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author` (`id_author`) USING BTREE,
  ADD KEY `fk_post` (`id_post`) USING BTREE;

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author_id` (`author_id`) USING BTREE,
  ADD KEY `fk_category_id` (`category_id`) USING BTREE;

--
-- Індекси таблиці `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Індекси таблиці `post_photos`
--
ALTER TABLE `post_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `post_photos`
--
ALTER TABLE `post_photos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk', AUTO_INCREMENT=5;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_post` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Обмеження зовнішнього ключа таблиці `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `post_photos`
--
ALTER TABLE `post_photos`
  ADD CONSTRAINT `post_photos_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
