-- LuxeStay Hotel Management Database
-- Robust Auto-Setup SQL

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- ---------------------------------------------------------
-- 1. Create Members Table
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `avatar` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert team members (Only if they don't exist)
INSERT INTO `members` (`id`, `name`, `student_id`, `section`, `avatar`) VALUES
(1, 'Emandoyesus Tesfay', 'UGR/188057/16', 'Section-1', 'ET'),
(2, 'Dawit Gerezgiher', 'UGR/188001/16', 'Section-1', 'DG'),
(3, 'Haftom Gebrehiwot', 'UGR/188215/16', 'Section-2', 'HG'),
(4, 'Kiros Gebremariam', 'UGR/188336/16', 'Section-1', 'KG'),
(5, 'Edilawit Kalau', 'UGR/188034/16', 'Section-1', 'EK'),
(6, 'Saron Felege', 'UGR/188639/16', 'Section-1', 'SF'),
(7, 'Abeba Gebru', 'EITM/TUR182021/17', 'Section-1', 'AG')
ON DUPLICATE KEY UPDATE `id`=`id`;

-- ---------------------------------------------------------
-- 2. Create Rooms Table
-- ---------------------------------------------------------
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('Available','Occupied','Maintenance') DEFAULT 'Available',
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_number` (`room_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample rooms (Only if they don't exist)
INSERT INTO `rooms` (`id`, `room_number`, `type`, `price`, `status`, `description`) VALUES
(1, '101', 'Single', 100.00, 'Available', 'Cozy single room with a view.'),
(2, '102', 'Double', 150.00, 'Available', 'Spacious double room, perfect for couples.'),
(3, '201', 'Suite', 300.00, 'Occupied', 'Luxury suite with all amenities.'),
(4, '202', 'Single', 95.00, 'Maintenance', 'Standard single room.')
ON DUPLICATE KEY UPDATE `id`=`id`;
