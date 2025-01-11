

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4 COLLATE utf8mb4_general_ci;

-- Database: cantik

CREATE DATABASE IF NOT EXISTS cantik;
USE cantik;
-- Setting database collation
ALTER DATABASE cantik CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- --------------------------------------------------------

-- Table structure for table account
CREATE TABLE account (
  id int NOT NULL,
  username varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  password varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  role enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

-- Table structure for table home_content
CREATE TABLE home_content (
  id int NOT NULL,
  title varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  description text COLLATE utf8mb4_general_ci NOT NULL,
  image varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

-- Table structure for table products
CREATE TABLE products (
  id int NOT NULL,
  name varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  price decimal(10,2) NOT NULL,
  stock int NOT NULL,
  image varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

-- Table structure for table promos
CREATE TABLE promos (
  id int NOT NULL,
  title varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  description text COLLATE utf8mb4_general_ci NOT NULL,
  valid_until date DEFAULT NULL,
  discount int DEFAULT NULL,
  image varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  created_at datetime DEFAULT CURRENT_TIMESTAMP,
  updated_at datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

-- Table structure for table treatments
CREATE TABLE treatments (
  id int NOT NULL,
  name varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  description text COLLATE utf8mb4_general_ci NOT NULL,
  price decimal(10,2) NOT NULL,
  image varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

-- Table structure for table users
CREATE TABLE users (
  id int NOT NULL,
  username varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  email varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  password varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  role enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, 'asdasdasdfaf', 'asu'),
(2, 'qweqweqwe', 'weq'),
(3, 'dsfgkjbsdg', 'sodjfbnnsdgf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

CREATE TABLE `isipaket` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`price` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`features` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`rekomendasi` ENUM('Ya','Tidak') NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;
CREATE TABLE `konsultasi` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`gender` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`phone` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`address` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`complaint` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`specialist` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`doctor` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci',
	`visit_date` DATE NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;


COMMIT;

