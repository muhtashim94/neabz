-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 08:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neabz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account_settings`
--

CREATE TABLE `admin_account_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_organizers`
--

CREATE TABLE `contact_organizers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_organizers`
--

INSERT INTO `contact_organizers` (`id`, `user_id`, `organizer_id`, `name`, `email`, `contact_reason`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Demo', 'demo@gmail.com', 'Question about the event', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2022-03-24 12:45:18', '2022-03-24 12:45:18'),
(2, 2, 1, 'Demo', 'demo@gmail.com', 'Question about my ticket', 'sdsadsadsadsadsadsadsadsa', '2022-03-24 13:07:09', '2022-03-24 13:07:09'),
(3, 2, 1, 'Demo', 'demo@gmail.com', 'Question about the event', 'fsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsd', '2022-03-24 13:07:52', '2022-03-24 13:07:52'),
(4, 2, 3, 'fsdfsdf', 'dsfsd@gmail.com', 'Question about the event', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2022-03-25 13:47:01', '2022-03-25 13:47:01'),
(5, 2, 1, 'Robert', 'rober@gmail.com', 'Question about the event', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2022-03-25 13:50:17', '2022-03-25 13:50:17'),
(6, 2, 4, 'Jack', 'jack@gmail.com', 'Question about the event', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2022-03-25 13:53:29', '2022-03-25 13:53:29'),
(7, 11, 5, 'Habbit Organizer', 'demo@gmail.com', 'Question about the event', 'sadsadsadsadsadsadsadsa\r\nsadsadsadsadsad\r\nsaddsadsadsad', '2022-04-01 14:06:41', '2022-04-01 14:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phonecode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', 1, 1, '2022-03-29 11:54:25', '2022-03-29 11:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone_id` int(11) DEFAULT NULL,
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_summary` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `organizer_id`, `type_id`, `category_id`, `sub_category_id`, `location`, `location_type`, `time_zone_id`, `event_image`, `event_summary`, `event_details`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Eat Food Festival', 1, 1, 1, 1, 'Texas 6228 Beverly Dr 6228 Beverly Dr Beverly Hills, CA 62285 United States', 'venue', 1, 'assets/images/eventImages/1.jpg', 'Eat is an iconic part of the Eat Food Festivals. It is built around the idea of creating a platform for people who love food and entertainment. It will be held at Beach View Park, from January 14th to 16th 2022 in USA.', '<p><strong>No males are allowed entry without a female present. Families only.&nbsp;</strong></p>\r\n\r\n<p><strong>Vaccinated persons only. If you are not vaccinated or are not carrying your certificate, you will be denied entry even if you have purchased a ticket. Rights of admission are reserved (management reserved the right to deny entry or ask anyone to leave the premises at any time)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Friday - 14th January (3 PM - 11.30 PM) ( No Stags Allowed )</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Standard Entry ( Until 14th Jan )</th>\r\n			<td>PKR 400</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Saturday - 15th January (12:30 PM - 10.30 PM) ( No Stags Allowed )</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Discounted Ticket (Until 8th Jan)</th>\r\n			<td>PKR 400</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Standard Entry ( Until 14th Jan )</th>\r\n			<td>PKR 400</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Sunday - 16th January (12:30 PM - 10.30 PM) ( No Stags Allowed )</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Discounted Ticket (Until 8th Jan)</th>\r\n			<td>PKR 400</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Standard Entry ( Until 14th Jan )</th>\r\n			<td>PKR 400</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1', '2022-03-10 10:46:24', '2022-03-11 12:44:21'),
(2, 2, 'Pitchfork Music Festival 2022', 2, 1, 1, 1, 'Wild Venture Water Park & Resort', 'venue', 1, 'assets/images/eventImages/2.jpeg', 'Wild Venture Water Park & Resort arranging Pitchfork Music Festival 2022 on 12th March 2022', '<p><strong>Scope of The Event:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Audience:</strong>&nbsp;All Age Group</p>\r\n\r\n<p><strong>Venue:</strong>&nbsp;Wild Venture Water Park &amp; Resort</p>\r\n\r\n<p><strong>Expected Footfall:</strong>&nbsp;10000 +</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Program Design</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Water Activities</li>\r\n	<li>Festive Ambiance</li>\r\n	<li>Live Concert &amp; Stage activities</li>\r\n	<li>Car / Bike Show</li>\r\n	<li>Food Court</li>\r\n	<li>Cultural Performances</li>\r\n	<li>Carnival Games</li>\r\n	<li>Carnival Shows</li>\r\n	<li>Stalls Deployment</li>\r\n	<li>Our Sponsors</li>\r\n	<li>Media Endorsement</li>\r\n	<li>Security</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Itinerary of Jashan-e-Baharan 2022</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Water Activities&nbsp;&nbsp;&nbsp;(10:00am &ndash; 05:00 pm)</li>\r\n	<li>Pet Show&nbsp;(02:00pm onwards)</li>\r\n	<li>Carnival Games/Kids Arena&nbsp;(02:00pm onwards)</li>\r\n	<li>Jumping castles for kids&nbsp;(02:00pm onwards)</li>\r\n	<li>Food Stalls&nbsp;(10:00am onwards)</li>\r\n	<li>General Stalls&nbsp;(10:00pm onwards)</li>\r\n	<li>Culture Show&nbsp;(04:00pm to 06:00pm)</li>\r\n	<li>Cars &amp; Bike Show&nbsp;(05:00pm-07:00pm)</li>\r\n	<li>Magic Show for kids&nbsp;(02:00pm-06:00pm)</li>\r\n	<li>Musical Concert&nbsp;(07:00pm onwards)</li>\r\n	<li>Fireworks&nbsp;(09:00 pm)</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For Sponsorship &amp; Stall booking call 0333-2946356</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tickets</p>\r\n\r\n<p>Tickets for Pitchfork Music Festival 2022 can be booked here.</p>', '1', '2022-03-10 11:30:20', '2022-03-14 12:56:44'),
(3, 2, 'Austin City Limits Music Festival', 1, 1, 1, 1, 'House 3, Taxis, USA', 'venue', 1, 'assets/images/eventImages/3.jpg', 'After the success of the 12th Education Fair, FES proudly presents the FES 13th Global Education Expo 2022 happening in Austin City Limits Music Festival on 26th March 2022.', '<p>After the success of the 12th Education Fair, FES proudly presents the FES 13th Global Education Expo 2022 happening in Austin City Limits Music Festival on 26th March 2022. This event will give you a chance to meet our expert education counselors as well as representatives from international universities from 20+ study abroad destinations.<br />\r\nYour dream to study at an international, reputable university is closer than you think! Make a list of your queries and be able to discuss all of them with our expert counselors.<br />\r\nGet ready to take advantage of this fantastic opportunity. At FES, We Guide, You Lead!<br />\r\nClick the link below for free registration to the event<br />\r\nhttp://expo.fespak.com/Smart-Expo/StudentRegistration</p>\r\n\r\n<p><br />\r\nAlso check out other Business Events in Austin City Limits Music Festival, Exhibitions in Austin City Limits Music Festival, Festivals in Austin City Limits Music Festival.</p>', '1', '2022-03-10 13:43:28', '2022-03-11 12:54:19'),
(4, 3, 'USA Festival', 2, 1, 1, 1, '8479 Trantow Island, Bilzen,', 'venue', 1, 'assets/images/eventImages/4.jpg', 'This event is organized for dummy purpose.', '<p>This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.This event is organized for dummy purpose.</p>', '1', '2022-03-11 14:38:43', '2022-03-11 14:39:26'),
(9, 8, 'Coachella  2022', 1, 1, 1, 1, 'Indio, California', 'venue', 1, 'assets/images/eventImages/9.jpg', 'Coachella is North America\'s most famous music festival, held at its now iconic home at the Empire Polo Club in Indio, California.', '<p>Coachella is North America&#39;s most famous music festival, held at its now iconic home at the Empire Polo Club in Indio, California.</p>\r\n\r\n<p>A festival on every true music fan&#39;s bucket list, Coachella has a world-beating lineup of some of music&#39;s biggest stars, covering a range of genres, including rock, indie, hip-hop and dance.</p>\r\n\r\n<p>Coachella&#39;s illustrious history has seen it feature legendary headline sets from the likes of Beyonc&eacute;, Daft Punk, Prince, Radiohead, and Rage Against The Machine over its two decade-long lifespan.</p>', '1', '2022-03-14 14:31:28', '2022-03-14 14:31:46'),
(10, 10, 'Mardi Gras (New Orleans, Louisiana)', 5, 1, 1, 1, '523 Stark Hollow Road, Mountain View, Colorado, United States.', 'venue', 1, 'assets/images/eventImages/10.jpg', 'The Boston Marathon is an annual running event which takes place throughout various cities in the greater Boston area in Massachusetts.', '<p>The Boston Marathon is an annual running event which takes place throughout various cities in the greater Boston area in Massachusetts.<br />\r\nThe Boston Marathon began in 1897, with only 15 participants, and is the world&rsquo;s oldest annual marathon! Today, the marathon draws runners<br />\r\nfrom far and wide, and spectators line the streets. The jovial atmosphere is legendary. The event takes place on Patriot&rsquo;s Day (the third Monday of April).&nbsp;<br />\r\nIf you want to cheer on the athletes, you can just pitch up on the day. If you want to partake, registration begins in September each year and spots fill up fast.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Boston Marathon is an annual running event which takes place throughout various cities in the greater Boston area in Massachusetts.<br />\r\nThe Boston Marathon began in 1897, with only 15 participants, and is the world&rsquo;s oldest annual marathon! Today, the marathon draws runners<br />\r\nfrom far and wide, and spectators line the streets. The jovial atmosphere is legendary. The event takes place on Patriot&rsquo;s Day (the third Monday of April).&nbsp;<br />\r\nIf you want to cheer on the athletes, you can just pitch up on the day. If you want to partake, registration begins in September each year and spots fill up fast.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Boston Marathon is an annual running event which takes place throughout various cities in the greater Boston area in Massachusetts.<br />\r\nThe Boston Marathon began in 1897, with only 15 participants, and is the world&rsquo;s oldest annual marathon! Today, the marathon draws runners<br />\r\nfrom far and wide, and spectators line the streets. The jovial atmosphere is legendary. The event takes place on Patriot&rsquo;s Day (the third Monday of April).&nbsp;<br />\r\nIf you want to cheer on the athletes, you can just pitch up on the day. If you want to partake, registration begins in September each year and spots fill up fast.</p>', '1', '2022-04-01 11:51:04', '2022-04-01 11:52:19'),
(11, 11, 'Lollapalooza (Chicago, Illinois)', 6, 1, 1, 1, '523 Stark Hollow Road, Mountain View, Colorado, United States.', 'venue', 1, 'assets/images/eventImages/11.jpg', 'If heavy metal, pop or rock is your thing, Lollapalooza in Chicago is the music festival for you. \r\nThis festival also features EDM bands, artists, dancers and stand-up comedians. \r\nIt basically plays host to A-list bands across all genres. Grant Park provides the perfect backdrop for this remarkable event. \r\nThere are various ticket types available. So, if you’re on tour, you can purchase a day pass if you plan it correctly.', '<p>If heavy metal, pop or rock is your thing, Lollapalooza in Chicago is the music festival for you.&nbsp;<br />\r\nThis festival also features EDM bands, artists, dancers and stand-up comedians.&nbsp;<br />\r\nIt basically plays host to A-list bands across all genres. Grant Park provides the perfect backdrop for this remarkable event.&nbsp;<br />\r\nThere are various ticket types available. So, if you&rsquo;re on tour, you can purchase a day pass if you plan it correctly.</p>\r\n\r\n<p>If heavy metal, pop or rock is your thing, Lollapalooza in Chicago is the music festival for you.&nbsp;<br />\r\nThis festival also features EDM bands, artists, dancers and stand-up comedians.&nbsp;<br />\r\nIt basically plays host to A-list bands across all genres. Grant Park provides the perfect backdrop for this remarkable event.&nbsp;<br />\r\nThere are various ticket types available. So, if you&rsquo;re on tour, you can purchase a day pass if you plan it correctly.</p>\r\n\r\n<p>If heavy metal, pop or rock is your thing, Lollapalooza in Chicago is the music festival for you.&nbsp;<br />\r\nThis festival also features EDM bands, artists, dancers and stand-up comedians.&nbsp;<br />\r\nIt basically plays host to A-list bands across all genres. Grant Park provides the perfect backdrop for this remarkable event.&nbsp;<br />\r\nThere are various ticket types available. So, if you&rsquo;re on tour, you can purchase a day pass if you plan it correctly.</p>', '1', '2022-04-01 13:52:31', '2022-04-01 13:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_bridge_sub_categories`
--

CREATE TABLE `event_bridge_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_category_id` int(11) NOT NULL,
  `event_sub_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_bridge_sub_categories`
--

INSERT INTO `event_bridge_sub_categories` (`id`, `event_category_id`, `event_sub_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-08 16:38:15', '2022-03-08 16:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food & Drink', '2022-03-08 16:07:08', '2022-03-08 16:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `event_date_times`
--

CREATE TABLE `event_date_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `event_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_start_time` int(11) DEFAULT NULL,
  `display_end_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_date_times`
--

INSERT INTO `event_date_times` (`id`, `event_id`, `event_type`, `event_start`, `start_time`, `event_end`, `end_time`, `display_start_time`, `display_end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'single_event', '2022-04-26', '20:45', '2022-03-29', '21:46', 0, 1, '2022-03-10 10:46:24', '2022-03-10 10:46:24'),
(2, 2, 'single_event', '2022-04-26', '09:30', '2022-04-08', '21:30', 0, 1, '2022-03-10 11:30:20', '2022-03-10 11:30:20'),
(3, 3, 'single_event', '2022-04-26', '00:44', '2022-03-31', '02:46', 1, 1, '2022-03-10 13:43:28', '2022-03-10 13:43:28'),
(4, 4, 'single_event', '2022-03-18', '13:39', '2022-03-31', '00:38', 1, 1, '2022-03-11 14:38:43', '2022-03-11 14:38:43'),
(9, 9, 'single_event', '2022-03-20', '00:31', '2022-03-25', '13:32', 1, 1, '2022-03-14 14:31:28', '2022-03-14 14:31:28'),
(10, 10, 'single_event', '2022-04-22', '21:50', '2022-04-24', '21:50', 1, 1, '2022-04-01 11:51:04', '2022-04-01 11:51:04'),
(11, 11, 'single_event', '2022-04-15', '23:52', '2022-04-18', '23:52', 1, 1, '2022-04-01 13:52:31', '2022-04-01 13:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `event_likeds`
--

CREATE TABLE `event_likeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `is_liked` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_likeds`
--

INSERT INTO `event_likeds` (`id`, `user_id`, `event_id`, `is_liked`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2022-03-25 17:51:52', '2022-04-14 01:49:12'),
(2, 2, 1, 0, '2022-03-28 12:04:24', '2022-04-14 06:39:31'),
(3, 2, 10, 1, '2022-04-01 18:33:56', '2022-04-01 18:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `event_planner_account_settings`
--

CREATE TABLE `event_planner_account_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address_zip_code` int(11) NOT NULL,
  `home_address_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_zip` int(11) NOT NULL,
  `billing_address_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address_zip` int(11) NOT NULL,
  `shipping_address_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address_zip` int(11) NOT NULL,
  `work_address_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_planner_account_settings`
--

INSERT INTO `event_planner_account_settings` (`id`, `user_id`, `prefix`, `img`, `first_name`, `last_name`, `suffix`, `home_phone`, `cell_phone`, `job_title`, `company`, `website`, `blog`, `home_address_one`, `home_address_two`, `home_address_city`, `home_address_country`, `home_address_zip_code`, `home_address_state`, `billing_address_one`, `billing_address_two`, `billing_address_city`, `billing_address_country`, `billing_address_zip`, `billing_address_state`, `shipping_address_one`, `shipping_address_two`, `shipping_address_city`, `shipping_address_country`, `shipping_address_zip`, `shipping_address_state`, `work_address_one`, `work_address_two`, `work_address_city`, `work_address_country`, `work_address_zip`, `work_address_state`, `created_at`, `updated_at`) VALUES
(1, '2', 'Mr.', 'assets/images/eventProfile/2.jpg', 'Lauren', 'Barrak', 'Barrak', '2025550191', '2025550123', 'CEO', 'Zack Planner', 'https://www.google.com/', 'https://www.google.com/', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', '2022-03-29 10:44:20', '2022-03-29 10:44:20'),
(2, '11', 'Mr.', 'assets/images/eventProfile/11.png', 'Lauren', 'Barrak', 'Barrak', '2025550191', '2025550123', 'CEO', 'Zack Planner', 'https://www.google.com/', 'https://www.google.com/', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', 'House no 66, Street 2, Area Barak, California USA', 'House no 66, Street 2, Area Barak, California USA', 'California', '1', 99950, '1', '2022-04-01 14:05:59', '2022-04-01 14:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `event_publishes`
--

CREATE TABLE `event_publishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `public` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_publishes`
--

INSERT INTO `event_publishes` (`id`, `event_id`, `public`, `audience`, `publish`, `date`, `time`, `privacy`, `created_at`, `updated_at`) VALUES
(1, 1, 'public', 'Anyone with the link', 'publish_now', '2022-03-11', '11:45', 'No, Keep it private', '2022-03-10 11:22:38', '2022-03-11 12:44:54'),
(2, 2, 'public', 'Anyone with the link', 'publish_now', '2022-03-23', '00:46', 'No, Keep it private', '2022-03-10 11:43:38', '2022-03-10 11:43:38'),
(3, 3, 'public', 'Anyone with the link', 'publish_now', '2022-03-10', '00:46', 'No, Keep it private', '2022-03-10 13:45:20', '2022-03-10 13:45:20'),
(4, 4, 'public', 'Anyone with the link', 'publish_now', '2022-03-12', '00:40', 'Yes, schedule to share publicly', '2022-03-11 14:40:42', '2022-03-11 14:40:42'),
(5, 6, 'public', 'Anyone with the link', 'publish_now', '2022-03-18', '00:54', 'No, Keep it private', '2022-03-14 13:53:52', '2022-03-14 13:53:52'),
(6, 7, 'public', 'Anyone with the link', 'publish_now', '2022-03-24', '00:05', 'No, Keep it private', '2022-03-14 14:05:35', '2022-03-14 14:05:35'),
(7, 8, 'public', 'Anyone with the link', 'publish_now', '2022-03-21', '13:27', 'Yes, schedule to share publicly', '2022-03-14 14:26:24', '2022-03-14 14:26:24'),
(8, 9, 'public', 'Anyone with the link', 'publish_now', '2022-03-16', '00:32', 'No, Keep it private', '2022-03-14 14:32:47', '2022-03-14 14:33:15'),
(9, 10, 'public', 'Anyone with the link', 'publish_now', '2022-04-01', '21:54', 'Yes, schedule to share publicly', '2022-04-01 11:54:24', '2022-04-01 11:54:24'),
(10, 11, 'public', 'Anyone with the link', 'publish_now', '2022-04-01', '23:53', 'Yes, schedule to share publicly', '2022-04-01 13:53:54', '2022-04-01 13:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_sub_categories`
--

CREATE TABLE `event_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_sub_categories`
--

INSERT INTO `event_sub_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Beer', '2022-03-08 16:07:51', '2022-03-08 16:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_tags`
--

CREATE TABLE `event_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_tags`
--

INSERT INTO `event_tags` (`id`, `event_id`, `event_tag_id`, `created_at`, `updated_at`) VALUES
(7, 7, 2, '2022-03-09 10:10:39', '2022-03-14 14:05:48'),
(20, 1, 1, '2022-03-10 10:46:24', '2022-03-11 10:13:48'),
(21, 1, 2, '2022-03-10 10:46:24', '2022-03-10 10:46:24'),
(22, 2, 2, '2022-03-10 11:30:20', '2022-03-11 12:51:46'),
(23, 2, 2, '2022-03-10 11:30:20', '2022-03-10 11:30:20'),
(24, 3, 2, '2022-03-10 13:43:28', '2022-03-11 12:53:41'),
(25, 3, 2, '2022-03-10 13:43:28', '2022-03-10 13:43:28'),
(26, 4, 1, '2022-03-11 14:38:43', '2022-03-11 14:38:43'),
(27, 4, 2, '2022-03-11 14:38:43', '2022-03-11 14:38:43'),
(28, 5, 1, '2022-03-14 13:49:03', '2022-03-14 13:49:03'),
(29, 5, 2, '2022-03-14 13:49:03', '2022-03-14 13:49:03'),
(30, 6, 1, '2022-03-14 13:52:01', '2022-03-14 13:52:01'),
(31, 6, 2, '2022-03-14 13:52:01', '2022-03-14 13:52:01'),
(32, 7, 1, '2022-03-14 14:04:02', '2022-03-14 14:04:02'),
(33, 7, 2, '2022-03-14 14:04:02', '2022-03-14 14:04:02'),
(34, 8, 2, '2022-03-14 14:24:45', '2022-03-14 14:26:36'),
(35, 8, 2, '2022-03-14 14:24:45', '2022-03-14 14:24:45'),
(36, 9, 2, '2022-03-14 14:31:28', '2022-03-14 14:32:59'),
(37, 9, 2, '2022-03-14 14:31:28', '2022-03-14 14:31:28'),
(38, 10, 1, '2022-04-01 11:51:04', '2022-04-01 11:51:04'),
(39, 10, 2, '2022-04-01 11:51:04', '2022-04-01 11:51:04'),
(40, 11, 1, '2022-04-01 13:52:31', '2022-04-01 13:52:31'),
(41, 11, 2, '2022-04-01 13:52:31', '2022-04-01 13:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ticket_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_start_date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_end_date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_ticket` int(11) DEFAULT NULL,
  `min_ticket` int(11) DEFAULT NULL,
  `sale_channel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `will_call` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `type`, `event_id`, `name`, `available_quantity`, `price`, `ticket_available`, `sales_start_date_time`, `sale_end_date_time`, `description`, `visibility`, `max_ticket`, `min_ticket`, `sale_channel`, `eticket`, `will_call`, `status`, `created_at`, `updated_at`) VALUES
(1, 'paid', 1, 'Eat Food Ticket', 10000, 6000, 'Date & time', '2022-03-10T20:50', '2022-03-23T20:50', 'No males are allowed entry without a female present. Families only. \r\nVaccinated persons only. If you are not vaccinated or are not carrying your certificate, you will be denied entry even if you have purchased a ticket.', 'Visible', 5, 1, 'Online Only', NULL, NULL, 1, '2022-03-10 10:51:30', '2022-03-11 12:44:37'),
(2, 'paid', 2, 'Pitchfork Music Festival Ticket', 1000, 800, 'Date & time', '2022-03-13T21:41', '2022-03-25T21:41', 'All age group can avail tickets. Please hurry up and get your passes before its too late.', 'Visible', 20, 2, 'Online Only', NULL, NULL, 1, '2022-03-10 11:43:17', '2022-03-14 12:56:47'),
(3, 'paid', 3, 'Austin City Limits Music Festival Ticket', 1000, 500, 'Date & time', '2022-03-10T23:44', '2022-03-25T00:45', 'Tickets are available for all the people. Hurry up and get your passes.', 'Visible', 12, 2, 'Online Only', 'eTicket', 'will_call', 1, '2022-03-10 13:44:57', '2022-03-11 12:54:33'),
(4, 'paid', 4, 'USA Festival Ticket', 10000, 8000, 'Date & time', '2022-03-12T00:39', '2022-03-25T00:39', 'This event is organized for dummy purpose. This event is organized for dummy purpose. This event is organized for dummy purpose.', 'Visible', 5, 2, 'Online Only', 'eTicket', 'will_call', 1, '2022-03-11 14:40:22', '2022-03-11 14:40:22'),
(5, 'paid', 6, 'Coachella  Ticket', 1000, 500, 'Date & time', '2022-03-14T23:52', '2022-03-22T23:52', 'All age groups are allowed. Hurry up get your passes.', 'Visible', 5, 1, 'Online Only', 'eTicket', 'will_call', 1, '2022-03-14 13:53:34', '2022-03-14 13:53:34'),
(6, 'paid', 7, 'Coachella  Ticket', 1000, 500, 'Date & time', '2022-03-20T00:04', '2022-03-26T00:04', 'All age groups can buy tickets. Hurry up, get your passes.', 'Visible', 5, 1, 'Online Only', 'eTicket', 'will_call', 1, '2022-03-14 14:05:17', '2022-03-14 14:05:17'),
(7, 'paid', 8, 'Coachella  Ticket', 1000, 200, 'Date & time', '2022-03-17T00:25', '2022-03-21T00:25', 'Tickets are available for all age groups. Hurry up get your passes.', 'Visible', 5, 1, 'Online Only', NULL, NULL, 1, '2022-03-14 14:26:05', '2022-03-14 14:26:48'),
(8, 'paid', 9, 'Coachella  Ticket', 1000, 200, 'Date & time', '2022-03-16T00:31', '2022-03-19T00:32', 'Tickets are available for all age groups.', 'Visible', 5, 1, 'Online Only', NULL, NULL, 1, '2022-03-14 14:32:30', '2022-03-14 14:33:11'),
(9, 'paid', 10, 'Mardi Gras Ticket', 2000, 200, 'Date & time', '2022-04-05T21:52', '2022-04-22T21:52', 'Tickets are available for all the genders. No age limits.', 'Visible', 10, 1, 'Online Only', 'eTicket', 'will_call', 1, '2022-04-01 11:53:59', '2022-04-01 11:53:59'),
(10, 'paid', 11, 'Lollapalooza Tickets', 1000, 200, 'Date & time', '2022-04-02T23:53', '2022-04-16T23:53', 'All can avail tickets of all genders', 'Visible', 10, 1, 'Online Only', 'eTicket', 'will_call', 1, '2022-04-01 13:53:42', '2022-04-01 13:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Festival or Fair', '2022-03-08 16:06:06', '2022-03-08 16:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_08_142442_create_time_zones_table', 2),
(5, '2022_03_08_142545_create_tags_table', 2),
(6, '2022_03_08_142634_create_event_tags_table', 2),
(7, '2022_03_08_142746_create_event_bridge_sub_categories_table', 2),
(8, '2022_03_08_142854_create_event_sub_categories_table', 2),
(9, '2022_03_08_142939_create_event_categories_table', 2),
(10, '2022_03_08_143008_create_event_types_table', 2),
(12, '2022_03_08_143305_create_event_date_times_table', 2),
(13, '2022_03_08_144148_create_events_table', 2),
(14, '2022_03_08_145220_create_event_tickets_table', 2),
(16, '2022_03_10_152123_create_event_publishes_table', 3),
(17, '2022_03_08_143118_create_organizers_table', 4),
(18, '2021_11_23_010940_create_countries_table', 5),
(19, '2021_11_23_011040_create_states_table', 5),
(20, '2022_03_21_170550_create_organizer_followers_table', 6),
(21, '2022_03_24_170012_create_contact_organizers_table', 7),
(22, '2022_03_25_121905_create_user_account_settings_table', 8),
(23, '2022_03_25_153458_create_event_likeds_table', 9),
(26, '2022_03_28_175908_create_event_planner_account_settings_table', 10),
(27, '2022_03_30_145913_create_order_tickets_table', 11),
(28, '2022_04_06_111208_create_admin_account_settings_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_tickets`
--

CREATE TABLE `order_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `additional1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_tickets`
--

INSERT INTO `order_tickets` (`id`, `order_id`, `user_id`, `event_id`, `no_of_tickets`, `ticket_price`, `additional1`, `additional2`, `additional3`, `first_name`, `last_name`, `email`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(3, 582, 2, 1, 4, 24000, NULL, NULL, NULL, 'Hackeyyyy', 'John', 'demo@gmail.com', 0, 0, '2022-04-01 06:33:31', '2022-04-01 06:33:31'),
(4, 99, 2, 10, 4, 800, NULL, NULL, NULL, 'Hackeyyyy', 'John', 'demo@gmail.com', 0, 0, '2022-04-01 13:38:01', '2022-04-01 13:38:01'),
(5, 849, 11, 10, 4, 800, NULL, NULL, NULL, 'Hackeyyyy', 'Barrak', 'testerplanner@gmail.com', 0, 0, '2022-04-01 14:07:45', '2022-04-01 14:07:45'),
(6, 824, 2, 2, 6, 4800, NULL, NULL, NULL, 'Hackeyyyy', 'John', 'demo@gmail.com', 0, 0, '2022-04-05 02:46:32', '2022-04-05 02:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `soft_del` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `name`, `user_id`, `website`, `image`, `bio`, `description`, `soft_del`, `created_at`, `updated_at`) VALUES
(1, 'Beacon Organizer', 2, 'https://www.google.com/', 'assets/images/organizerImages/Gn6.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 1, '2022-03-16 09:14:21', '2022-04-06 05:57:10'),
(2, 'Scooby Organizer', 2, 'https://www.google.com/', 'assets/images/organizerImages/0WE.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.&nbsp;</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2022-03-16 13:14:44', '2022-04-06 05:57:09'),
(3, 'Habbit  Keratin Organizer', 2, 'https://www.google.com/', 'assets/images/organizerImages/hrN.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\\</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 1, '2022-03-25 13:46:22', '2022-04-06 05:57:09'),
(4, 'Jerry William  Organizer', 2, 'https://www.google.com/', 'assets/images/organizerImages/mTk.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 1, '2022-03-25 13:52:49', '2022-04-06 05:57:07'),
(5, 'Gason Organizer', 10, 'https://www.google.com/', 'assets/images/organizerImages/Ocd.png', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2022-04-01 11:49:01', '2022-04-06 05:57:06'),
(6, 'Gerry Organizer', 11, 'https://www.google.com/', 'assets/images/organizerImages/UZF.png', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2022-04-01 13:51:27', '2022-04-06 05:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_followers`
--

CREATE TABLE `organizer_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizer_followers`
--

INSERT INTO `organizer_followers` (`id`, `user_id`, `organizer_id`, `created_at`, `updated_at`) VALUES
(79, 2, 2, '2022-03-28 12:44:58', '2022-03-28 12:44:58'),
(83, 2, 1, '2022-04-05 04:01:46', '2022-04-05 04:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `status`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Alabama', 1, 1, '2022-03-29 12:21:18', NULL),
(2, 'Alaska', 1, 1, NULL, NULL),
(3, 'Arizona', 1, 1, NULL, NULL),
(4, 'Arkansas', 1, 1, NULL, NULL),
(5, 'Byram', 1, 1, NULL, NULL),
(6, 'California', 1, 1, NULL, NULL),
(7, 'Cokato', 1, 1, NULL, NULL),
(8, 'Colorado', 1, 1, NULL, NULL),
(9, 'Connecticut', 1, 1, NULL, NULL),
(10, 'Delaware', 1, 1, NULL, NULL),
(11, 'District of Columbia', 1, 1, NULL, NULL),
(12, 'Florida', 1, 1, NULL, NULL),
(13, 'Georgia', 1, 1, NULL, NULL),
(14, 'Hawaii', 1, 1, NULL, NULL),
(15, 'Idaho', 1, 1, NULL, NULL),
(16, 'Illinois', 1, 1, NULL, NULL),
(17, 'Indiana', 1, 1, NULL, NULL),
(18, 'Iowa', 1, 1, NULL, NULL),
(19, 'Kansas', 1, 1, NULL, NULL),
(20, 'Kentucky', 1, 1, NULL, NULL),
(21, 'Louisiana', 1, 1, NULL, NULL),
(22, 'Lowa', 1, 1, NULL, NULL),
(23, 'Maine', 1, 1, NULL, NULL),
(24, 'Maryland', 1, 1, NULL, NULL),
(25, 'Massachusetts', 1, 1, NULL, NULL),
(26, 'Medfield', 1, 1, NULL, NULL),
(27, 'Michigan', 1, 1, NULL, NULL),
(28, 'Minnesota', 1, 1, NULL, NULL),
(29, 'Mississippi', 1, 1, NULL, NULL),
(30, 'Missouri', 1, 1, NULL, NULL),
(31, 'Montana', 1, 1, NULL, NULL),
(32, 'Nebraska', 1, 1, NULL, NULL),
(33, 'Nevada', 1, 1, NULL, NULL),
(34, 'New Hampshire', 1, 1, NULL, NULL),
(35, 'New Jersey', 1, 1, NULL, NULL),
(36, 'New Jersy', 1, 1, NULL, NULL),
(37, 'New Mexico', 1, 1, NULL, NULL),
(38, 'New York', 1, 1, NULL, NULL),
(39, 'North Carolina', 1, 1, NULL, NULL),
(40, 'North Dakota', 1, 1, NULL, NULL),
(41, 'Ohio', 1, 1, NULL, NULL),
(42, 'Oklahoma', 1, 1, NULL, NULL),
(43, 'Ontario', 1, 1, NULL, NULL),
(44, 'Oregon', 1, 1, NULL, NULL),
(45, 'Pennsylvania', 1, 1, NULL, NULL),
(46, 'Ramey', 1, 1, NULL, NULL),
(47, 'Rhode Island', 1, 1, NULL, NULL),
(48, 'South Carolina', 1, 1, NULL, NULL),
(49, 'South Dakota', 1, 1, NULL, NULL),
(50, 'Sublimity', 1, 1, NULL, NULL),
(51, 'Tennessee', 1, 1, NULL, NULL),
(52, 'Texas', 1, 1, NULL, NULL),
(53, 'Trimble', 1, 1, NULL, NULL),
(54, 'Utah', 1, 1, NULL, NULL),
(55, 'Vermont', 1, 1, NULL, NULL),
(56, 'Virginia', 1, 1, NULL, NULL),
(57, 'Washington', 1, 1, NULL, NULL),
(58, 'West Virginia', 1, 1, NULL, NULL),
(59, 'Wisconsin', 1, 1, NULL, NULL),
(60, 'Wyoming', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'food', '2022-03-08 16:04:18', '2022-03-08 16:04:23'),
(2, 'drinks', '2022-03-08 16:42:20', '2022-03-08 16:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `time_zones`
--

CREATE TABLE `time_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_zones`
--

INSERT INTO `time_zones` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '(GMT-1100) American Samoa Time', '2022-03-08 16:03:42', '2022-03-08 16:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 0, NULL, '$2y$10$CNuQ2U9lwaFpzuceLwHbse.9J9w0.nbKPJGiaCD/lYDihY3o24KkG', NULL, '2022-03-08 06:54:38', '2022-03-08 06:54:38'),
(2, 'Demo', 'demo@gmail.com', 1, NULL, '$2y$10$m8iivbo46nDmp.pmVZElx.nnTiUZHPgcuq5cXM3daEyOHRJmaI25y', NULL, '2022-03-08 07:10:26', '2022-03-08 07:10:26'),
(3, 'Planner', 'planner@gmail.com', 1, NULL, '$2y$10$qd.m0b0RwKWnTCbSkJmFce.2h0R2O2Itiz5JzWozPJ17Kq5DiTi.y', NULL, '2022-03-11 14:38:01', '2022-03-11 14:38:01'),
(8, 'Test Planner', 'test@gmail.com', 1, NULL, '$2y$10$KgdatmLYxe9R1JU7wjGCluw6XE2SzZSbFXVvHoRb7Q1Uz03kIip0i', NULL, '2022-03-14 14:30:48', '2022-03-14 14:30:48'),
(9, 'asas', 'asa@gmail.com', 1, NULL, '$2y$10$sggDp0BIJcyPgFQxwvLyc.09trJXkEL9DQac9qpDcjUkyw.sPhWzm', NULL, '2022-03-24 11:54:11', '2022-03-24 11:54:11'),
(10, 'Event Planner', 'eventplanner@gmail.com', 1, NULL, '$2y$10$dimicwDpoa32XiYtrjCzFeyDnB9Shc5p34okOmSOu.3qA4/D8lkfq', NULL, '2022-04-01 11:46:13', '2022-04-01 11:46:13'),
(11, 'Tester Planner', 'testerplanner@gmail.com', 1, NULL, '$2y$10$/UVsWY1UvtReOyX0PA7ew.ki4HXV4eNljMj.S2xDCE5FuetyGYmDC', NULL, '2022-04-01 13:50:39', '2022-04-01 13:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_account_settings`
--

CREATE TABLE `user_account_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_account_settings`
--

INSERT INTO `user_account_settings` (`id`, `user_id`, `prefix`, `img`, `first_name`, `last_name`, `suffix`, `home_phone`, `cell_phone`, `designation`, `address`, `created_at`, `updated_at`) VALUES
(2, 2, 'Mr.', 'assets/images/organizerprofile/2.jpg', 'Hackeyyyy', 'John', 'John', '1-888-501-8430', '1-888-222-8577', 'Event Manager', 'House 2, Austin Street California USA', '2022-03-25 09:53:49', '2022-04-05 05:12:29'),
(3, 11, 'Mr.', 'assets/images/organizerprofile/11.png', 'Hackeyyyy', 'Barrak', 'Barrak', '2025550191', '2025550123', 'Event Head', 'Street XYZ, House XYZ, California, United States', '2022-04-01 14:04:27', '2022-04-01 14:04:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account_settings`
--
ALTER TABLE `admin_account_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_organizers`
--
ALTER TABLE `contact_organizers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_bridge_sub_categories`
--
ALTER TABLE `event_bridge_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_date_times`
--
ALTER TABLE `event_date_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_likeds`
--
ALTER TABLE `event_likeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_planner_account_settings`
--
ALTER TABLE `event_planner_account_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_publishes`
--
ALTER TABLE `event_publishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_sub_categories`
--
ALTER TABLE `event_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tags`
--
ALTER TABLE `event_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tickets`
--
ALTER TABLE `order_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizer_followers`
--
ALTER TABLE `organizer_followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_zones`
--
ALTER TABLE `time_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_account_settings`
--
ALTER TABLE `user_account_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account_settings`
--
ALTER TABLE `admin_account_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_organizers`
--
ALTER TABLE `contact_organizers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_bridge_sub_categories`
--
ALTER TABLE `event_bridge_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_date_times`
--
ALTER TABLE `event_date_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event_likeds`
--
ALTER TABLE `event_likeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_planner_account_settings`
--
ALTER TABLE `event_planner_account_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_publishes`
--
ALTER TABLE `event_publishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_sub_categories`
--
ALTER TABLE `event_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_tags`
--
ALTER TABLE `event_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_tickets`
--
ALTER TABLE `order_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organizer_followers`
--
ALTER TABLE `organizer_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `time_zones`
--
ALTER TABLE `time_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_account_settings`
--
ALTER TABLE `user_account_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
