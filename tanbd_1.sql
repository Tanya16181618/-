-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2022 г., 00:45
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tanbd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `номер_админа` int NOT NULL,
  `e-mail` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `пароль` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`номер_админа`, `e-mail`, `пароль`) VALUES
(1, 'tanya@mail.ru', '1234'),
(2, 'S5@mail.ru', 'Secret');

-- --------------------------------------------------------

--
-- Структура таблицы `магазин`
--

CREATE TABLE `магазин` (
  `номер_кондитерской` tinyint NOT NULL,
  `Название` varchar(16) DEFAULT NULL,
  `Часы_работы` varchar(11) DEFAULT NULL,
  `Телефон` varchar(11) DEFAULT NULL,
  `Адрес` varchar(22) DEFAULT NULL,
  `Геолокация` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `магазин`
--

INSERT INTO `магазин` (`номер_кондитерской`, `Название`, `Часы_работы`, `Телефон`, `Адрес`, `Геолокация`) VALUES
(1, 'Кофейня №1', '10:00-22:00', '88124567712', 'Большая Морская, 4', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.6138179618683!2d30.315790315440253!3d59.93742166915964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696311001a251a5%3A0xea5aaef84f7e911!2z0JHQvtC70YzRiNCw0Y8g0JzQvtGA0YHQutCw0Y8g0YPQuy4sIDQsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTExODY!5e1!3m2!1sru!2sru!4v1587562970538!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(2, 'Кофейня №2', '10:00-21:00', '88125530245', 'Думская,7', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.8066863043312!2d30.32556901544005!3d59.93316206950329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963106136092e9%3A0x15518e957e292957!2z0JTRg9C80YHQutCw0Y8g0YPQuy4sIDcsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTExODY!5e1!3m2!1sru!2sru!4v1587563255337!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(3, 'Кофейня №3', '10:00-22:00', '88125572366', 'Гороховая,27', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.9194802824293!2d30.316290115439898!3d59.930670869704215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631047573eb15%3A0x1a6c3fc2835e06af!2z0JPQvtGA0L7RhdC-0LLQsNGPINGD0LsuLCAyNywg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5MDAzMQ!5e1!3m2!1sru!2sru!4v1587563316725!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(4, 'Кофейня №4', '10:00-22:00', '88124563003', 'Индустриальный,15', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.3927127858271!2d30.476368415440536!3d59.94230466876574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46962de4b4ab1801%3A0x869f99fcac8cce71!2z0JjQvdC00YPRgdGC0YDQuNCw0LvRjNC90YvQuSDQv9GALiwgMTUsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTU0MjY!5e1!3m2!1sru!2sru!4v1587563344722!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(5, 'Кофейня №5', '10:00-21:00', '88127451235', 'Индустриальный,66', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1500.047141332992!2d30.454599215442137!3d59.97201576636848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696326c1c571d49%3A0xfb7abf384501a4c6!2z0JjQvdC00YPRgdGC0YDQuNCw0LvRjNC90YvQuSDQv9GALiwgNjYsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTUyNzk!5e1!3m2!1sru!2sru!4v1587563397033!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(6, 'Кофейня №6', '10:00-22:00', '88123007455', 'Невский проспект, 9', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.6496520026953!2d30.31191781544017!3d59.936630269223464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696311abfd9c3fb%3A0x799b3ca28beba349!2z0J3QtdCy0YHQutC40Lkg0L_RgC4sIDksINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTExODY!5e1!3m2!1sru!2sru!4v1587563958909!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(7, 'Кофейня №7', '10:00-21:00', '88127884221', 'Прачечный переулок,29', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1502.0425172000096!2d30.29968531543978!3d59.92795336992343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469630e29ef2b60d%3A0xbc8959f0f4680f40!2z0J_RgNCw0YfQtdGH0L3Ri9C5INC_0LXRgC4sIDI5LCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTkwMDAw!5e1!3m2!1sru!2sru!4v1587563987733!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(8, 'Кофейня №8', '10:00-21:00', '88125330012', 'Лиговский проспект,162', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1502.7618137058828!2d30.347016515438927!3d59.9120648712049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696304b8e84da99%3A0xfb0899f33ce49418!2z0JvQuNCz0L7QstGB0LrQuNC5INC_0YAuLCAxNjIsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTIwMDc!5e1!3m2!1sru!2sru!4v1587564012464!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(9, 'Кофейня №9', '10:00-22:00', '88126669574', 'Малая морская, 13', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.6988520272027!2d30.309582315440178!3d59.935543669311166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696311ae1c3fd6b%3A0x443d63bcccbf172e!2z0JzQsNC70LDRjyDQnNC-0YDRgdC60LDRjyDRg9C7LiwgMTMsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTExODY!5e1!3m2!1sru!2sru!4v1587564034208!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(10, 'Кофейня №10', '10:00-22:00', '88124552002', 'Садовая,7', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.6862102171358!2d30.333108915440157!3d59.93582286928864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631085568dbdb%3A0x75758374cd9d1b7c!2z0KHQsNC00L7QstCw0Y8g0YPQuy4sIDcsINCh0LDQvdC60YIt0J_QtdGC0LXRgNCx0YPRgNCzLCAxOTExODY!5e1!3m2!1sru!2sru!4v1587564052596!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>'),
(11, 'Кофейня №11', '10:00-21:00', '8812457844', 'Большая Морская,11', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.6895246206473!2d30.314396315440213!3d59.935749669294495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696310535bbb2eb%3A0xb897d0ecab4828ba!2z0JHQvtC70YzRiNCw0Y8g0JzQvtGA0YHQutCw0Y8g0YPQuy4sIDExLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTkxMTg2!5e1!3m2!1sru!2sru!4v1587564072878!5m2!1sru!2sru\" width=\"300\" height=\"350\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

-- --------------------------------------------------------

--
-- Структура таблицы `клиенты`
--

CREATE TABLE `клиенты` (
  `Номер_Клиента` tinyint NOT NULL,
  `телефон` bigint DEFAULT NULL,
  `e-mail` varchar(30) DEFAULT NULL,
  `пароль` varchar(50) NOT NULL,
  `карта` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `клиенты`
--

INSERT INTO `клиенты` (`Номер_Клиента`, `телефон`, `e-mail`, `пароль`, `карта`) VALUES
(1, 89184567866, 'bbb@mail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(2, 89185412300, 'qwsd@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(3, 89245663025, 'gfghf@rambler.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '10%'),
(4, 89165420336, 'qwerty@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '7%'),
(5, 89146649126, 'dfgr@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '10%'),
(6, 89154578852, 'rtyu@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '7%'),
(7, 89245687522, 'ghjjn@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '10%'),
(8, 89184572245, 'gbnjk@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '15%'),
(9, 89645878956, 'oikk@rambler.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '10%'),
(10, 89184578892, 'qwecc@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '7%'),
(11, 89145458121, 'zasde@yandex.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '10%'),
(20, 123, '123@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(21, 123, 'test@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(22, 89213040123, 'stn@mail.ru', '7fd86b25e0992e825dfeddd325c9dc5bc72af38e', '5%'),
(23, 89213413232, 'testmail@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(24, 8921312321, 'test2@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(25, 89215553535, 'istom@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(26, 89215553535, 'istomind@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '5%'),
(27, 79500420811, 'antoniy1999@mail.ru', '0f783cd62ff335eda54c110ab8e2317a4f838448', '5%'),
(28, 321242451421, 'asda@mail.ru', '02cc2a69720bd8bf1661deb23018e16470c069da', '5%'),
(29, 111, 'evreynew@mail.ru1', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '5%'),
(30, 111, 'evreynew@mail.ru11', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '5%'),
(31, 1, '1@mail.ru', '356a192b7913b04c54574d18c28d46e6395428ab', '5%'),
(32, 79500420811, 'evreynew@mail.ru', '577021b5ac1fd91592b596ffb034ccaa90633df3', '5%'),
(33, 89522725845, 'asd@mail', '9529e677b4eb8319befe675cc6bb1ed5d2381ede', '5%'),
(34, 89967700492, 'tan@mail.ru', 'c1bb9b7f16309395f6ca5d48a084987a96ccdf8c', '5%'),
(35, 89967700492, 'hyt@mail.ru', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '5%'),
(36, 89967700492, 'bbb@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', '5%'),
(37, 89940598283, 'h1@mail.ru', '123456', NULL),
(39, 89967700492, 'b2@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '5%'),
(40, 89404747395, 'b3@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', '5%'),
(41, 89404747395, 'antoniy1999@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%'),
(42, 89404747395, 'tan2@mail.ru', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '5%'),
(43, 89404747395, 'bbb4@mail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5%');

-- --------------------------------------------------------

--
-- Структура таблицы `покупают`
--

CREATE TABLE `покупают` (
  `Номер_Клиента` tinyint DEFAULT NULL,
  `номер_товара` tinyint DEFAULT NULL,
  `количество` tinyint NOT NULL,
  `дата` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `покупают`
--

INSERT INTO `покупают` (`Номер_Клиента`, `номер_товара`, `количество`, `дата`) VALUES
(1, 1, 0, ''),
(2, 2, 0, ''),
(1, 3, 0, ''),
(3, 4, 0, ''),
(4, 6, 0, ''),
(6, 3, 0, ''),
(6, 13, 0, ''),
(6, 6, 0, ''),
(2, 15, 0, ''),
(7, 5, 0, ''),
(1, 6, 0, ''),
(3, 15, 0, ''),
(5, 11, 0, ''),
(1, 12, 0, ''),
(21, 6, 1, '2020-04-23 10:01:13'),
(21, 6, 1, '2020-04-23 10:01:45'),
(21, 3, 5, '2020-04-23 10:01:45'),
(21, 8, 2, '2020-04-23 10:03:37'),
(22, 11, 1, '2020-04-23 10:39:34'),
(22, 7, 1, '2020-04-23 10:39:34'),
(22, 10, 1, '2020-04-23 10:39:34'),
(22, 3, 9, '2020-04-23 10:42:05'),
(22, 19, 2, '2020-04-23 10:42:05'),
(24, 16, 2, '2020-04-23 11:55:25'),
(24, 15, 2, '2020-04-23 11:55:25'),
(24, 1, 1, '2020-04-23 11:55:41'),
(26, 2, 3, '2020-04-23 12:51:16'),
(26, 20, 1, '2020-04-23 12:51:16'),
(27, 5, 1, '2021-06-17 20:46:16'),
(27, 2, 1, '2021-06-18 01:48:35'),
(27, 6, 1, '2021-06-18 01:48:35'),
(27, 1, 1, '2021-06-18 04:54:40'),
(27, 21, 2, '2021-06-18 04:54:40'),
(27, 5, 1, '2021-06-18 04:54:40'),
(27, 1, 1, '2022-04-28 15:12:10'),
(34, 1, 2, '2022-04-28 17:00:16'),
(34, 2, 1, '2022-04-28 20:29:00'),
(34, 6, 1, '2022-04-28 20:29:00'),
(34, 7, 1, '2022-04-28 20:29:00'),
(34, 10, 1, '2022-04-28 20:29:00');

-- --------------------------------------------------------

--
-- Структура таблицы `поставляют`
--

CREATE TABLE `поставляют` (
  `номер_поставщика` tinyint NOT NULL,
  `номер_товара` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `поставляют`
--

INSERT INTO `поставляют` (`номер_поставщика`, `номер_товара`) VALUES
(1, 1),
(2, 2),
(3, 3),
(5, 7),
(4, 8),
(6, 9),
(7, 10),
(8, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `поставщики`
--

CREATE TABLE `поставщики` (
  `номер_поставщика` tinyint NOT NULL,
  `Объем_поставок` smallint DEFAULT NULL,
  `страна` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `поставщики`
--

INSERT INTO `поставщики` (`номер_поставщика`, `Объем_поставок`, `страна`) VALUES
(1, 30, 'Россия'),
(2, 20, 'Швейцария'),
(3, 45, 'Болгария'),
(4, 3, 'Россия'),
(5, 150, 'Россия'),
(6, 220, 'Германия'),
(7, 10, 'Финляндия'),
(8, 160, 'Швейцария');

-- --------------------------------------------------------

--
-- Структура таблицы `тип товара`
--

CREATE TABLE `тип товара` (
  `номер_вида` tinyint NOT NULL,
  `название` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `тип товара`
--

INSERT INTO `тип товара` (`номер_вида`, `название`) VALUES
(1, 'с молоком'),
(2, 'Без молока'),
(3, 'Чай');

-- --------------------------------------------------------

--
-- Структура таблицы `товар`
--

CREATE TABLE `товар` (
  `номер_товара` int NOT NULL,
  `название` varchar(19) DEFAULT NULL,
  `цена` smallint DEFAULT NULL,
  `номер_вида` tinyint DEFAULT NULL,
  `Калории` smallint DEFAULT NULL,
  `Фото` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `товар`
--

INSERT INTO `товар` (`номер_товара`, `название`, `цена`, `номер_вида`, `Калории`, `Фото`) VALUES
(1, 'Горячий шоколад', 150, 1, 240, '1.jpg'),
(2, 'Индийский', 100, 2, 100, '2.jpg'),
(3, 'Американо', 120, 2, 280, '3.jpg'),
(4, 'Капучино', 45, 1, 320, '4.jpg'),
(5, 'Фраппе', 90, 3, 152, '5.jpg'),
(6, 'Тоник', 122, 1, 200, '6.jpg'),
(7, 'Эспрессо', 147, 2, 140, '7.jpg'),
(8, 'Какао', 230, 3, 160, '9.jpg'),
(9, 'Бельгийский шоколад', 190, 2, 95, '8.jpg'),
(10, 'Чай зелёный', 122, 2, 100, '10.jpg'),
(24, 'Латте', 50, 1, 140, '11.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`номер_админа`);

--
-- Индексы таблицы `магазин`
--
ALTER TABLE `магазин`
  ADD PRIMARY KEY (`номер_кондитерской`);

--
-- Индексы таблицы `клиенты`
--
ALTER TABLE `клиенты`
  ADD PRIMARY KEY (`Номер_Клиента`);

--
-- Индексы таблицы `покупают`
--
ALTER TABLE `покупают`
  ADD KEY `Номер_Клиента` (`Номер_Клиента`);

--
-- Индексы таблицы `поставляют`
--
ALTER TABLE `поставляют`
  ADD PRIMARY KEY (`номер_поставщика`) USING BTREE,
  ADD UNIQUE KEY `vneshn` (`номер_товара`) USING BTREE;

--
-- Индексы таблицы `поставщики`
--
ALTER TABLE `поставщики`
  ADD PRIMARY KEY (`номер_поставщика`);

--
-- Индексы таблицы `тип товара`
--
ALTER TABLE `тип товара`
  ADD PRIMARY KEY (`номер_вида`);

--
-- Индексы таблицы `товар`
--
ALTER TABLE `товар`
  ADD PRIMARY KEY (`номер_товара`),
  ADD UNIQUE KEY `номер_товара` (`номер_товара`),
  ADD KEY `type` (`номер_вида`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `номер_админа` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `клиенты`
--
ALTER TABLE `клиенты`
  MODIFY `Номер_Клиента` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `тип товара`
--
ALTER TABLE `тип товара`
  MODIFY `номер_вида` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `товар`
--
ALTER TABLE `товар`
  MODIFY `номер_товара` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `покупают`
--
ALTER TABLE `покупают`
  ADD CONSTRAINT `покупают_ibfk_1` FOREIGN KEY (`Номер_Клиента`) REFERENCES `клиенты` (`Номер_Клиента`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `поставляют`
--
ALTER TABLE `поставляют`
  ADD CONSTRAINT `поставляют_ibfk_1` FOREIGN KEY (`номер_поставщика`) REFERENCES `поставщики` (`номер_поставщика`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `товар`
--
ALTER TABLE `товар`
  ADD CONSTRAINT `type` FOREIGN KEY (`номер_вида`) REFERENCES `тип товара` (`номер_вида`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
