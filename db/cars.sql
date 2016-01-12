-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 12 2016 г., 10:36
-- Версия сервера: 5.6.24
-- Версия PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `Lessons`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(56) COLLATE utf8mb4_bin NOT NULL,
  `model` varchar(52) COLLATE utf8mb4_bin NOT NULL,
  `price` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `engine` int(11) NOT NULL,
  `max_speed` int(11) NOT NULL,
  `url_site` text COLLATE utf8mb4_bin NOT NULL,
  `image1` varchar(96) COLLATE utf8mb4_bin NOT NULL,
  `image2` varchar(96) COLLATE utf8mb4_bin NOT NULL,
  `image3` varchar(96) COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `max_torque` text COLLATE utf8mb4_bin NOT NULL,
  `acceleration_time` decimal(3,1) NOT NULL,
  `consumption_city` decimal(3,1) NOT NULL,
  `consumption_road` decimal(3,1) NOT NULL,
  `mixed` decimal(3,1) NOT NULL,
  `video` varchar(112) COLLATE utf8mb4_bin NOT NULL,
  `country` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `price`, `title`, `description`, `engine`, `max_speed`, `url_site`, `image1`, `image2`, `image3`, `timestamp`, `max_torque`, `acceleration_time`, `consumption_city`, `consumption_road`, `mixed`, `video`, `country`, `active`) VALUES
(1, 'SsangYong', 'Korando', 565900, 'Встречайте...New Korando!', 'Истинный городской кроссовер с великолепными ходовыми характеристиками и отличным внедорожным потенциалом.    Оригинальный передний бампер, решетка радиатора и светодиодные фары сделали образ автомобиля более мужественным. Стильный и динамичный New Korando – это новый уровень комфорта, и драйва от вождения.\r\n\r\n', 1998, 190, 'http://sy.com.ua/new-korando.html', '1.jpg', 'ssang2.jpg', 'ssang3.jpg', '2015-11-30 16:04:10', '197/ 4000', '11.5', '10.9', '7.5', '9.2', 'https://www.youtube.com/embed/Pb_wbkoKPL8', 'Korea', 1),
(2, 'Suzuki', 'Vitara', 636000, 'Представляем новый SUZUKI Vitara!', 'Впервые представлен журналистам на Парижском автосалоне исполнительным вице-президентом Suzuki Motor Corporation Тосихиро Сузуки. Новый автомобиль является серийной версией прошлогоднего концепта iV-4 и получил возрожденное имя Vitara. Такое же название носил небольшой внедорожник, выпускавшийся ранее с 1988 по 1997 год.  Нынешнее поколение компактного кроссовера ориентировано на городских жителей с активной жизненной позицией и предпочитающих свой собственный стиль.', 1586, 180, 'http://vitara.suzuki.ua/ua/#overview', '2.jpg', 'suzuki2.jpg', 'suzuki3.jpg', '2015-11-30 16:04:10', '156/4400', '13.0', '7.9', '5.5', '6.3', 'https://www.youtube.com/embed/QqKfmFARz-4', 'Japan', 1),
(3, 'Nissan', ' X-Trail', 840070, 'Встречайте...Nissan X-TRAIL!', 'Это кроссовер? Это внедорожник? Нет, это новый Nissan X-TRAIL. Nissan X-TRAIL сочетает в себе энергичный дизайн и аэродинамические характеристики кроссоверов Nissan с надежностью внедорожников, что делает его динамичным и стильным. Благодаря четким и элегантным линиям и наличию панорамного люка с электроприводом, который оценят ваши пассажиры, дизайн этого автомобиля излучает решимость.\r\nЗадние фары, напоминающие бумеранг, светодиодные передние фары формируют фирменный стиль нового Nissan X-TRAIL.', 2488, 190, 'http://www.nissan.ua/UA/ru/vehicle/crossovers/new-x-trail.html', '3.jpg', 'niss2.jpg', 'niss3.jpg', '2015-11-30 16:05:13', '200/4400', '12.1', '9.4', '6.4', '7.5', 'https://www.youtube.com/embed/XixbDn32iCk', 'Japan', 1),
(4, 'Mitsubishi', 'Outlander', 885500, 'Представляем новый Mitsubishi OUTLANDER!', 'Автомобиль предлагает идеальное сочетание основных принципов Mitsubishi - комфорт для пассажиров, безопасность и забота об окружающей среде при отменных ходовых качествах на автостраде и бездорожье.', 2400, 198, 'http://www.mitsubishi-motors.com.ua/model/outlander/#equipment', '4.jpg', 'mit2.jpg', 'mit3.jpg', '2015-11-30 16:05:13', '222/4100', '10.2', '9.8', '6.5', '7.7', 'https://www.youtube.com/embed/625yLjj6NgE', 'Japan', 1),
(5, 'Mazda', 'CX-5', 929000, 'Встречайте...Mazda CX-5!', 'Обновленная Mazda CX-5 - это воплощение пожеланий, стремлений и замечаний владельцев Mazda. Это воплощение именно Ваших идей, которые для Mazda стали демонстрацией, декларацией и обязательством непрерывно прилагать все усилия для соответствия требованиям своих клиентов, не только путем создания и внедрения новых технологий, но и путем реализации тех идей, которые делают этот продукт еще более изысканным и значимым для своего владельца.', 2500, 192, 'http://mazda.ua/ua/showroom/cx-5-fl/overview', '5.jpg', 'mazda2.jpg', 'mazda3.jpg', '2015-11-30 16:06:28', '256/4000', '7.2', '9.3', '6.1', '7.3', 'https://www.youtube.com/embed/LYQ7d3PdB5Q?list=PL0546474F5AD1AE9B', 'Japan', 1),
(6, 'BMW', 'X1', 982698, 'Представляем вашему вниманию BMW X1!', 'Новый BMW X1 не следует по проложенным маршрутам. Он создает их сам. С первого взгляда на новую модель становится понятно, что это настоящий представитель моделей линейки Х: короткие свесы и длинная колесная база формируют привлекательный и динамичный облик. Философия моделей X прослеживается и в интерьере. Водитель и пассажиры нового BMW X1, сидящие в высоко установленных креслах, окружены высококачественными материалами. Управление всеми функциями в автомобиле - легкое и интуитивно понятное. Интерьер не только чрезвычайно комфортный, но и универсальный в плане регулировок: второй ряд сидений оснащен электроприводом складывания спинок, за счет чего пространство автомобиля легко адаптируется и трансформируется в соответствии с вашими пожелании и дорожной ситуацией за считанные мгновения. Экономичные и динамичные дизельные и бензиновые двигатели нового поколения с технологией BMW EfficientDynamics способны подарить вам новые эмоции и удовольствие за рулем.', 1998, 223, 'http://www.bmw.ua/ua/en/newvehicles/x/x1/2015/keep_informed/index.html', '6.jpg', 'bmw2.jpeg', 'bmw3.jpg', '2015-11-30 16:06:28', '280/1250', '7.4', '7.7', '5.6', '6.4', 'https://www.youtube.com/embed/-dN-yZSJDLA', 'Germany', 1),
(7, 'Infiniti ', 'QX70', 1273700, 'Встречайте...Infiniti QX70!', 'Динамика нового Infiniti QX70 воплощена в ультрамощных двигателях, созданных для тех, кто не идет на компромиссы. 32-клапанный двигатель V8 объемом 5 л мощностью 400 л. с., обновленный 24-клапанный двигатель V6 объемом 3,7 л мощностью 333 л. с. и новый дизельный V6 объемом 3,0 л мощностью 238 л. с. – три способа выразить энергию Вашего Infiniti QX70.\r\n', 3700, 233, 'http://www.infiniti.ua/ru/qx70.html', '7.jpg', 'inf2.jpg', 'inf3.jpg', '2015-11-30 16:07:15', '363/5200', '6.8', '17.1', '9.4', '12.2', 'https://www.youtube.com/embed/REkiVvB3C3Y', 'Japan', 1),
(8, 'Geely', 'EMGRAND X7', 419900, 'Представляем вашему вниманию Geely EMGRAND X7!', 'Emgrand X7 –  автомобиль, отличающийся от своих конкурентов просторным салоном, большим дорожным просветом и высоким уровнем безопасности. За счет общей длины  в 4541 мм и колесной базе в 2661 мм Geely Emgrand Х7 предоставляет своим пассажирам гораздо больше места, чем аналогичные автомобили от других производителей, и при этом является одним из самых доступных предложений в своем классе на рынке Украины. Также, Вас обязательно порадует вместительное багажное отделение, объемом в 580 л. и возможность складывать по отдельности или вместе задний ряд сидений.', 2378, 170, 'http://geely.ua/emgrand-x7.html', 'geely.jpg', 'geely2.jpg', 'geely3.jpg', '2015-12-24 18:48:43', '220/4000', '11.4', '10.5', '6.5', '9.5', 'https://www.youtube.com/embed/dRtQQRzqjOg', 'China', 1),
(9, 'BMW', 'X6 M', 3116156, 'Представляем вашему вниманию BMW X6 M!', 'Широкий. Мускулистый. Динамичный. Новый BMW X6 сочетает в себе солидность серии X со спортивностью купе. Решительная передняя часть с большими воздухозаборниками недвусмысленно намекает на то, какая мощь скрыта под капотом.', 4395, 250, 'http://www.bmw.ua/ua/en/newvehicles/mseries/x6m/2014/showroom/index.html', 'bmw.jpg', 'bmw_2.jpg', 'bmw_3.jpg', '2015-12-24 20:00:29', '750/2,200–5,000', '4.2', '14.7', '9.0', '11.1', 'https://www.youtube.com/embed/8QJigHtz40E', 'Germany', 1),
(17, 'Nissan', 'Qashqai', 836130, 'Встречайте...Новый Nissan Qashqai!', 'Оцените новый Nissan Qashqai — отличный городской кроссовер.  Компания Nissan создала первый в мире кроссовер, а сегодня представляет новое поколение Nissan QASHQAI.  Сочетая в себе характеристики внедорожника и традиционного хэтчбэка, этот кроссовер олицетворяет собой отличное качество. Узнайте больше о кроссовере Nissan.', 1997, 183, 'http://www.nissan.ua/UA/ru/vehicle/crossovers/new-qashqai/discover/main-features.html', '', '', '', '2016-01-05 18:22:07', '', '0.0', '0.0', '0.0', '0.0', '', '', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
