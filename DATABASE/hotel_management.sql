CREATE DATABASE IF NOT EXISTS hotel_management;
USE hotel_management;

CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(50) NOT NULL UNIQUE,
    type VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status ENUM('Available', 'Occupied', 'Maintenance') DEFAULT 'Available',
    description TEXT
);

INSERT INTO rooms (room_number, type, price, status, description) VALUES
('101', 'Single', 100.00, 'Available', 'Cozy single room with a view.'),
('102', 'Double', 150.00, 'Available', 'Spacious double room, perfect for couples.'),
('201', 'Suite', 300.00, 'Occupied', 'Luxury suite with all amenities.'),
('202', 'Single', 95.00, 'Maintenance', 'Standard single room.'),
('301', 'Deluxe', 250.00, 'Available', 'Deluxe room with balcony.');
