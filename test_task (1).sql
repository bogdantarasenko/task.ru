-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2016 г., 23:54
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
('2016_05_09_102256_create_mains_table', 2),
('2016_05_11_102023_create_users_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `post_text` text COLLATE utf8_unicode_ci NOT NULL,
  `post_time` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `parent_id`, `post_text`, `post_time`) VALUES
(6, 0, 'test', 1462792315),
(7, 0, 'test', 1462792366),
(8, 7, 'test', 1462796819),
(9, 8, 'another comment', 1462796819),
(12, 7, 'test', 1462907759),
(13, 7, 'test2', 1462907769),
(14, 8, 'test', 1462907776),
(15, 12, 'test', 1462907780),
(16, 13, 'test3', 1462907788),
(18, 0, 'test', 1462908572),
(19, 0, 'test', 1462970558),
(20, 0, '11 05', 1462970569),
(21, 20, '12 05', 1462970827),
(22, 0, 'тестовый пост', 1462999632),
(23, 22, 'ответ на тестовый пост', 1462999645),
(24, 23, 'ответ на ответ на тестовый пост', 1462999663),
(25, 20, '12 05', 1462999683);

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_github_id_unique` (`github_id`),
  UNIQUE KEY `facebook_id` (`facebook_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `github_id`, `facebook_id`, `name`, `email`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '8645393', '', 'bogdantarasenko', 'apogel@yandex.ru', 'https://avatars.githubusercontent.com/u/8645393?v=3', 'PJbqbzl0xkRHS9URBc7L3a6M1xR29vSSTJdY1CDw4yKILU6EKkY0ygYdolih', '2016-05-11 08:47:46', '2016-05-11 17:45:05'),
(4, '', '1715940225354661', 'Богдан Тарасенко', 'apogel@yandex.ru', 'https://graph.facebook.com/v2.5/1715940225354661/picture?type=normal', 'CyHuPYVeWWXpzBPy0tdnOnvb1hOPFkTpOJI8ZfIG9tWjh7tDnlsykkuJJP5F', '2016-05-11 16:46:35', '2016-05-11 17:34:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
