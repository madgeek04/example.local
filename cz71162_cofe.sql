-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 08 2024 г., 00:26
-- Версия сервера: 5.7.44-48
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cz71162_cofe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `records`
--

INSERT INTO `records` (`id`, `title`, `description`, `slug`) VALUES
(11, 'Эспрессо-Тропико', 'Эспрессо-Тропико - это уютная кофейня, где каждая чашка напитка - это путешествие в тропические уголки мира. Насладитесь атмосферой отдыха под пальмами, попивая свежесваренный кофе, созданный с любовью к искусству. Наши бариста искусно смешивают лучшие сорта кофе со вкуснейшими ингредиентами, чтобы каждый глоток был настоящим удовольствием. Присоединяйтесь к нам и откройте для себя новые вкусы кофейного рая!', 'mag_name_1'),
(12, 'О Нас', 'Вкуснейшие и неповторимые - наши блюда представляют собой искусство кулинарии, воплощенное в каждой тарелке. Мы с гордостью предлагаем широкий выбор блюд, приготовленных с использованием только самых свежих ингредиентов. Независимо от того, предпочитаете ли вы классические рецепты или экспериментируете с новыми вкусами, у нас есть что-то для всех. От утренних завтраков до изысканных ужинов, каждое блюдо приготовлено с любовью и вниманием к деталям, чтобы удовлетворить ваши вкусовые пристрастия и порадовать вас неповторимым опытом.', 'mag_about_1'),
(13, 'Наши блюда', 'Наши блюда - это истинное творение кулинарного искусства, каждое из которых представляет собой уникальное сочетание вкусов и текстур. Мы гордимся своим разнообразием блюд, включающим в себя как классические, так и современные рецепты. От изысканных закусок до сытных основных блюд и неповторимых десертов - наша кухня готова удовлетворить самые изысканные вкусовые предпочтения. Каждое блюдо приготовлено с особым вниманием к деталям, чтобы обеспечить вам незабываемый опыт и наслаждение каждым кусочком.', 'mag_desc_2'),
(14, 'Вкусная Авантюра ждет вас!', 'Откройте для себя мир вкуса и уюта в нашей кофейне! Насладитесь ароматным кофе, свежеиспеченными десертами и уютной атмосферой. Приглашаем на настоящее кулинарное путешествие!', 'mag_banner_1'),
(15, 'Анна Иванова', 'Волшебное место с потрясающим кофе и великолепными десертами! Обязательно вернусь снова!', 'client_say_1'),
(16, 'Петр Смирнов', 'Отличное обслуживание и прекрасная атмосфера. Вкус кофе просто завораживает! Рекомендую!', 'client_say_2'),
(17, 'Елена Козлова', 'Кофейня с самым вкусным кофе в городе! Уютное место для встреч с друзьями или работы. Буду рекомендовать всем!', 'client_say_3'),
(18, 'Иван Попов', 'Настоящий рай для кофеманов! Безупречное качество напитков и десертов, приветливый персонал. Очень доволен визитом!', 'client_say_4'),
(19, 'Ростов', '', 'contact_adress'),
(20, '8 999 999 99 99', '', 'contact_tel'),
(21, 'test@mail.test', '', 'contact_mail'),
(22, 'Магазин', '', 'mag_name_main');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(2, 'mad_geek@mail.ru', '$2y$10$UDngcD7FfMlITi4ZM7nmr.4Huvz5C.BgjBg4g8fnP0Z61u3Kb2zya', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
