-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 15 2023 г., 21:56
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dZENcode_interview`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `comment_body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `comment_body`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, 'qweqweqwe', '2023-02-09 16:16:17', '2023-02-09 16:16:17'),
(3, 1, 1, NULL, 'qweqqwfqfw', '2023-02-09 16:18:26', '2023-02-09 16:18:26'),
(4, 1, 1, NULL, 'ewfsefsef', '2023-02-09 16:34:02', '2023-02-09 16:34:02'),
(5, 1, 1, 2, 'qweqqwfqfw', '2023-02-09 16:18:26', '2023-02-09 16:18:26'),
(6, 1, 1, 2, 'qweqqwfqfw', '2023-02-09 16:18:26', '2023-02-09 16:18:26'),
(7, 1, 1, 6, 'qweqqwfqfw', '2023-02-09 16:18:26', '2023-02-09 16:18:26'),
(8, 1, 1, NULL, 'test captcha', '2023-02-15 12:29:08', '2023-02-15 12:29:08'),
(10, 1, 1, 8, 'test reply', '2023-02-15 13:06:28', '2023-02-15 13:06:28'),
(11, 1, 1, 4, 'reply test 2', '2023-02-15 13:06:53', '2023-02-15 13:06:53'),
(12, 1, 1, 11, 'reply test3', '2023-02-15 13:07:02', '2023-02-15 13:07:02'),
(13, 1, 1, 12, 'reply test 4', '2023-02-15 13:07:12', '2023-02-15 13:07:12'),
(14, 2, 1, NULL, 'new comment', '2023-02-15 13:59:06', '2023-02-15 13:59:06'),
(15, 3, 1, NULL, 'test privet', '2023-02-15 16:13:54', '2023-02-15 16:13:54'),
(16, 3, 1, NULL, 'Top user', '2023-02-15 16:14:32', '2023-02-15 16:14:32');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_08_143603_create_posts_table', 1),
(6, '2023_02_08_143653_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `body_content`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer viverra turpis a dui euismod cursus. Duis in vestibulum arcu. Pellentesque vehicula pulvinar sapien ac porta. Quisque tristique, magna sed lacinia iaculis, enim nisl suscipit augue, ut gravida nulla enim dapibus nunc. Phasellus posuere cursus diam, a fringilla ipsum posuere pellentesque. Integer quis metus eget nisi congue fermentum. In laoreet diam et turpis imperdiet venenatis. Praesent eget tristique augue. Nullam dictum magna facilisis turpis aliquet vehicula. Aenean cursus, sapien at accumsan ultrices, tortor elit rhoncus purus, eu finibus ante mauris eget arcu. Nullam quam sapien, tristique et volutpat at, rutrum consequat ex. Aenean tempus feugiat nibh, at hendrerit leo interdum nec. Nulla eu metus est. Quisque cursus venenatis dolor, eu dignissim sem efficitur sed.\n\nAenean fringilla eleifend risus, eget lobortis leo tincidunt sed.', '2023-02-08 16:18:02', '2023-02-08 16:18:12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vitalii', 'test@gmail.com', NULL, '$2y$10$53NLesXdOocoE2QCpAxpaO9Z012QsV5He/XFk/IIi0JfPOtDC7XM2', NULL, '2023-02-08 13:42:21', '2023-02-08 13:42:21'),
(2, 'Kondr', 'top@gmail.com', NULL, '$2y$10$V2ugLNiQx.1MKrBFXnrg7eXwZpr9SR/zcfsjv8T/QjpLTpWPxRMKS', NULL, '2023-02-15 13:57:49', '2023-02-15 13:57:49'),
(3, 'Віталій Кондратенко', 'aaaar@gmail.com', NULL, '$2y$10$mtsg1BbeIsIYWoqL2T5M6uENTZX4xajTPQxIMhdnapVCUg/nk3AMu', NULL, '2023-02-15 16:13:28', '2023-02-15 16:13:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
