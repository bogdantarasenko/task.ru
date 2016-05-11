-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2016 г., 01:58
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mains`
--

CREATE TABLE IF NOT EXISTS `mains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_09_083810_create_posts_table', 1),
('2016_05_09_102256_create_mains_table', 1),
('2016_05_11_193259_create_users_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `post_text` text COLLATE utf8_unicode_ci NOT NULL,
  `post_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `parent_id`, `post_text`, `post_time`) VALUES
(1, 0, 'test comment', 1463007300),
(2, 1, 'responce to comment', 1463007311),
(3, 0, 'test second comment', 1463007345),
(4, 1, 'responce to seccond comment', 1463007363);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `github_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `github_id`, `facebook_id`, `name`, `email`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '8645393', '', 'bogdantarasenko', 'apogel@yandex.ru', 'https://avatars.githubusercontent.com/u/8645393?v=3', 'SU9P4LogL7HJcihCHuA6UIleYHkBrrektPqAHdyQkXjZprR07PcHXURsF6Ww', '2016-05-11 19:54:46', '2016-05-11 19:56:21'),
(2, '', '1715940225354661', 'Богдан Тарасенко', 'apogel@yandex.ru', 'https://graph.facebook.com/v2.5/1715940225354661/picture?type=normal', 'wTb3t9CZ5Yd87z3uQoH1hTPNgbpivYTU23lw1iqlQsInzMh1KintXU7yAcUs', '2016-05-11 19:55:35', '2016-05-11 19:57:41'),
(3, '', '717676925047101', 'Bogdan Tarasenko', 'apogel41@yandex.ru', 'https://graph.facebook.com/v2.5/717676925047101/picture?type=normal', 'FYeQeeBxbjkd6XMZOZeUkWfuEkoGkBYuZpFB53OlSq4Lb9swkvSKw1NtcILV', '2016-05-11 19:57:54', '2016-05-11 19:57:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
