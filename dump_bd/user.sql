-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 13 2019 г., 11:10
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `edu`
--

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'dead0343@gmail.com', '$2y$12$l2tgzfOi89J/7VlWuMJ/CeT0oUt0Y4CyTbXzTePbjzJxAXU/qYYsC', 'HeTDg_RQ_NeCDKyVWgrW1EfB3cATC35w', 1567763351, NULL, NULL, '127.0.0.1', 1567763352, 1567763409, 0, 1568361791),
(2, 'manager', 'manager@manager.ru', '$2y$10$seEORcvsfKVQhank2R2/e.9jwr1Qz9zpVIMhB5Ql2FnuRcmt9eg46', 'hRhG-n4YXvUMahJOwhABfRakefL49C6T', 1568356920, NULL, NULL, '127.0.0.1', 1568356920, 1568356920, 0, 1568361615),
(3, 'manager1', 'manager1@manager.ru', '$2y$10$HnM/xAQXgGKLVbG2th8n0eljvG3c.vp7m6kl2Bwwej.XVOOoGEYuS', 'dI59fwuB1n6gux4_teYsTYQBGtqLyXFN', 1568356966, NULL, NULL, '127.0.0.1', 1568356966, 1568356966, 0, 1568361551);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
