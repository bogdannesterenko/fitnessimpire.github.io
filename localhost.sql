-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 03 2018 г., 00:02
-- Версия сервера: 5.7.21-20-log
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `host1681855`
--
CREATE DATABASE IF NOT EXISTS `host1681855` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `host1681855`;

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author_name`, `approved`, `body`, `created_at`, `updated_at`) VALUES
(4, 9, 'Евгения', 1, 'Благодарю за замечательную статью.', '2018-06-02 02:12:20', '2018-06-02 02:12:38'),
(5, 11, 'Дмитрий', 1, 'Очень полезная статья, я узнал много полезного для себя.', '2018-06-02 02:15:44', '2018-06-02 02:18:34'),
(6, 8, 'mvhj', 1, 'hfkjsdhfkjs', '2018-06-02 05:02:32', '2018-06-02 05:08:58');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2017_09_11_174816_create_social_accounts_table', 1),
(15, '2017_09_26_140609_create_jobs_table', 1),
(35, '2014_10_12_000000_create_users_table', 2),
(36, '2014_10_12_100000_create_password_resets_table', 2),
(37, '2017_09_03_144628_create_permission_tables', 2),
(38, '2017_09_26_140332_create_cache_table', 2),
(39, '2017_09_26_140528_create_sessions_table', 2),
(40, '2018_05_16_205113_add_tables_post_comment_page', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\Models\\Auth\\User'),
(2, 2, 'App\\Models\\Auth\\User'),
(3, 3, 'App\\Models\\Auth\\User');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `body`) VALUES
(1, 'Главная, блок \"О нас\"', 'home_about', '<h2>Все возможно</h2><h3>Вместе с нами</h3><p>С тысячами активных членов и десятками выполняемых тренеров, клуб Fitness Empire является одним из самых больших в местном районе. С тысячами активных членов и десятками выполняемых тренеров, клуб Fitness Empire является одним из самых больших в местном районе.</p><p>Бег, бег и многочисленные марафоны теперь составляют большой кусок мероприятий на открытом воздухе для миллиона людей, как в США, так и по всей планете</p><p><a href=\"http://host1681855.hostland.pro/about\">Читать подробнее</a><br></p>'),
(2, 'Главная, Наши программы', 'home_training', '<h2>Наши программы</h2><h3>Тренируйтесь с нашими программами</h3>'),
(3, 'Главная, Слайдер', 'home_slider', '<h2>Сделай тело</h2><h3>Своей мечты</h3><h5>Тренируйся <br>вместе с нами</h5><p><a href=\"http://host1681855.hostland.pro/#\">Начать сегодня</a><br></p>'),
(4, 'О нас', 'about', '<h1>О НАС</h1><p>С тысячами активных членов и десятками выполняемых тренеров, клуб Fitness Empire является одним из самых больших в местном районе. С тысячами активных членов и десятками выполняемых тренеров, клуб Fitness Empire является одним из самых больших в местном районе.</p><p>Бег, бег и многочисленные марафоны теперь составляют большой кусок мероприятий на открытом воздухе для миллиона людей, как в США, так и по всей планете</p>');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view backend', 'web', '2018-05-17 19:35:39', '2018-05-17 19:35:39');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `thumb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `type`, `body`, `thumb_url`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Начальный Crossfit', 'train', '<p>Наш персонал включает в себя удивительных профессионалов, которые имеют глаз на перекрестку.</p>', '/uploads/a26f025ba273c4b3772042f401446282entrenamiento-mujeres_creatina-fyn.jpg', 1, '2018-05-23 17:01:00', '2018-06-02 02:10:36'),
(7, 'Фитнес-студия', 'train', '<p>Работайте в фитнес-группах или с персональным сертифицированным тренеров в нашем тренажерном зале.</p>', '/uploads/e917e1903234ad97af32599047584863corpo-autoestima-em-baixa1.jpg', 1, '2018-05-23 17:01:50', '2018-05-27 07:32:16'),
(8, 'Занятия йогой', 'train', '<p>Что вы думаете об йоге ? Если у вас есть страсть к этой деятельности, у нас есть специальная программа.</p>', '/uploads/ee447ead5fb579db9e67fec03f96f2773107f30a0e6c7604f31bafaa5d9668c0.jpg', 1, '2018-05-23 17:02:12', '2018-06-01 18:42:00'),
(9, 'Летняя тренировка для женщин!', 'blog', '<p>Улицы вокруг нас. Гудение газонокосилок яростно режет вечером, запах травы, долгих дней и орошение солнечного света. Нам говорят, что лето идет! Вы можете реагировать двумя способами, когда вы это слышите. Некоторые из вас могут бросить ваши глаза на небо и вздохнуть: «Конечно, это уже давно!».</p><p><span style=\"font-size: 0.875rem;\">Мне нравится это чувство. Это немного нервирующая смесь страха, волнения и потенциала. У вас все еще есть время, но вам нужно действовать сейчас, чтобы избежать будущего разочарования. Вот как я себя чувствовал, когда в этом месяце я создал видеоролик Women\'s Summer Body Body Workout. Да, мы только в апреле, но преобразование и скульптура вашего тела, конечно, не происходит за одну ночь. Вам нужны недели и месяцы, чтобы быть на вашей стороне. Как только мы позволили себе достаточно времени, следующий акцент будет сделан на том, что мы стремимся делать.</span></p>', '/uploads/6b3b76c7d698560eb78f15b598bcbf342.jpg', 1, '2018-06-02 02:00:17', '2018-06-02 02:10:47'),
(10, 'Эффективность упражнений на пресс', 'blog', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\";\"=\"\" ui\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-color:=\"\" transparent;=\"\" font-weight:=\"\" 400;=\"\" font-style:=\"\" normal;=\"\" font-variant:=\"\" text-decoration:=\"\" none;=\"\" vertical-align:=\"\" baseline;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Если Вы качаете пресс многие годы, но результат не удовлетворяет - эта статья для вас.</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\";\"=\"\" ui\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-color:=\"\" transparent;=\"\" font-weight:=\"\" 400;=\"\" font-style:=\"\" normal;=\"\" font-variant:=\"\" text-decoration:=\"\" none;=\"\" vertical-align:=\"\" baseline;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Все повально кинулись качать пресс, изголяются над этой несчастной прямой мышцей днем и ночью. А ведь все ради красивого плоского животика, ради сладкой мечты и светлого образа себя стройной в бикини на берегу моря. Какие только упражнения я не встречала в тренажерном зале. Мужчины выполняют скручиваю с огромными увесистыми блинами на груди, девушки стоят в “березке” целыми часами, но особых результатов так и не получают.</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\";\"=\"\" ui\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-color:=\"\" transparent;=\"\" font-weight:=\"\" 400;=\"\" font-style:=\"\" normal;=\"\" font-variant:=\"\" text-decoration:=\"\" none;=\"\" vertical-align:=\"\" baseline;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Давайте же вместе разберемся в данной тематике и начнем действовать правильно и добиваться желаемого эффекта. Для начала разберемся в строении мышц живота и их функциях. Все очень просто: мышцы живота вместе с мышцами спины и др.мелкими мускулами образуют так называемый “корсет” туловища, который отвечает за нашу осанку, процессы дыхания, поддержание внутренних органов и позвоночника, а также много других различных задач. К мышцам живота относятся, грубо говоря, три крупных мышцы: прямая (которую мы так усердно качаем, выполняя скручивания и подъемы ног), косые (3 их разновидности) и поперечная (самый глубокий слой мышц брюшной стенки). </span></p><p><span id=\"docs-internal-guid-e7303347-bee1-beb6-2dfd-2646deddafb6\"></span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span style=\"font-size: 12pt; font-family: \" segoe=\"\" ui\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-color:=\"\" transparent;=\"\" font-weight:=\"\" 400;=\"\" font-style:=\"\" normal;=\"\" font-variant:=\"\" text-decoration:=\"\" none;=\"\" vertical-align:=\"\" baseline;=\"\" white-space:=\"\" pre-wrap;\"=\"\"><span style=\"font-family: \" segoe=\"\" ui\";\"=\"\">Зная детально расположение и функции каждой из вышеперечисленных мышц, можно добиться хороших результатов во время тренинга и создать красивый живот.</span> </span></p>', '/uploads/52ac75bbad2f6bfec33b6a9968c66c4511.jpg', 1, '2018-06-02 02:04:28', '2018-06-02 02:10:56'),
(11, 'Идеальная формула приема фруктов!', 'blog', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span style=\"font-size: 14pt; font-family: \" segoe=\"\" ui\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-color:=\"\" transparent;=\"\" font-weight:=\"\" 400;=\"\" font-style:=\"\" normal;=\"\" font-variant:=\"\" text-decoration:=\"\" none;=\"\" vertical-align:=\"\" baseline;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Давно для всех не секрет, что укрепить здоровье и защитные свойства организма можно, добавив в рацион фрукты и овощи, но исключив животные жиры. Но, следуя однобоким фруктовым диетам, мы рискуем набрать лишнего. Так сколько же нужно кушать фруктов в день, если вы хотите снизить содержание жира в организме и выглядеть восхитительно? Я ознакомлю вас с универсальной формулой, которую использую сама. </span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span id=\"docs-internal-guid-399e3958-bee4-68d2-2dfd-7e0bdd163c08\"></span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;text-align: justify;\"><span style=\"font-size: 14pt; font-family: \" segoe=\"\" ui\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-color:=\"\" transparent;=\"\" font-weight:=\"\" 400;=\"\" font-style:=\"\" normal;=\"\" font-variant:=\"\" text-decoration:=\"\" none;=\"\" vertical-align:=\"\" baseline;=\"\" white-space:=\"\" pre-wrap;\"=\"\">Первый делом я определяю сезонные фрукты, которые доступны именно в данную пору года. Возьмем актуальный на сегодня сезон - осенний (в плане фруктов и овощей - мой фаворит). Самый богатый и щедрый, пахнущий виноградом, сладкими яблоками и корицей, а ближе к зиме - цитрусовый и хурмовый, кисло-сладкий и ярко-желтый. Осенью кушать фрукты нужно, как никогда много, чтобы укрепить организм и противостоять вирусам и простудным заболеваниям. Определив набор доступных фруктов по сезону, я вычеркиваю самые сахарные и опасные для фигуры - виноград, грушу и даже апельсины. </span></p>', '/uploads/4b213b293643b9735355a0087daf0f233.1.jpg', 1, '2018-06-02 02:05:55', '2018-06-02 02:11:05');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2018-05-17 19:35:39', '2018-05-17 19:35:39'),
(2, 'executive', 'web', '2018-05-17 19:35:39', '2018-05-17 19:35:39'),
(3, 'user', 'web', '2018-05-17 19:35:39', '2018-05-17 19:35:39');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UTC',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `uuid`, `first_name`, `last_name`, `email`, `avatar_type`, `avatar_location`, `password`, `password_changed_at`, `active`, `confirmation_code`, `confirmed`, `timezone`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'e9cc19b3-7191-4a16-8380-64a6e130fe2a', 'Admin', 'Istrator', 'admin@admin.com', 'gravatar', NULL, '$2y$10$lcb5pz8oYZTrM3onHSZc2ePEjxSrtNWo2cmYlU7cmX4T06K0iyDH.', NULL, 1, 'e9d7653cedc86208ae2ae8fcedf1e8c4', 1, 'UTC', 'qSaxszM8AmDqO0rO4xY8e2dADEWQkvAgBOqXk4bYVAKFrfv2oeupP1L4ROy1', '2018-05-17 19:35:39', '2018-05-17 19:35:39', NULL),
(2, 'ee6ae386-5e72-4c73-a2dc-9c529671e563', 'Backend', 'User', 'executive@executive.com', 'gravatar', NULL, '$2y$10$J5yeS09lf.ftkxFevc/TK.rLPgMbtc/OP7Uen1LxN61NEWErxjhLu', NULL, 1, 'cd48d6498644d353ab3a6979e4cb3b15', 1, 'UTC', NULL, '2018-05-17 19:35:39', '2018-05-17 19:35:39', NULL),
(3, 'b0315899-eb09-4dc1-b08c-ba7df2757823', 'Default', 'User', 'user@user.com', 'gravatar', NULL, '$2y$10$lkOmeNUHBQ5MZEuAdNsz4.s5xMQQXH8WJ.XpxxK25WL7SEQUQTs26', NULL, 1, 'f1d66332e07aa167b63ca3f15f210a15', 1, 'UTC', NULL, '2018-05-17 19:35:39', '2018-05-17 19:35:39', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
