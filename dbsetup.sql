
-- You can use the following SQL commands to set up the database and tables with sample data for testing. Make sure to adjust the database name, user, and password to match .env as needed.
-- You can also use the migration files in Laravel to create the tables at database/migrations, but no testing data will be included in those.



-- First, drop the database if it already exists to start fresh
-- DROP DATABASE IF EXISTS lsapp;

-- Create database
CREATE DATABASE IF NOT EXISTS lsapp;
USE lsapp;

-- Create user for database access (if not already created)
CREATE USER 'plantuser'@'localhost' IDENTIFIED BY '6characters';
GRANT ALL PRIVILEGES ON lsapp.* TO 'plantuser'@'localhost';
FLUSH PRIVILEGES;

-- Users table (from User.php)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

-- Plant Groups table (from Group.php)
CREATE TABLE plant_group (
    GroupID INT AUTO_INCREMENT PRIMARY KEY,
    GroupName VARCHAR(100) NOT NULL
);

-- Flowering Groups table (from FloweringGroup.php)
CREATE TABLE flower_group (
    FlowerGroupID INT AUTO_INCREMENT PRIMARY KEY,
    FlowerGroupName VARCHAR(100) NOT NULL
);

-- Plants table (from Plant.php)
CREATE TABLE arboretumplants (
    PlantID INT AUTO_INCREMENT PRIMARY KEY,
    Scientific_Name VARCHAR(150) NOT NULL,
    Common_Name VARCHAR(100) NOT NULL,
    Family VARCHAR(100),
    Other_Names VARCHAR(150),
    GroupID INT,
    FlowerID INT,
    Credit_links TEXT,
    Useful_links TEXT,
    Description TEXT,
    user_id INT,
    Images VARCHAR(255),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (GroupID) REFERENCES plant_group(GroupID),
    FOREIGN KEY (FlowerID) REFERENCES flower_group(FlowerGroupID),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Sample data for users (use bcrypt hashes for passwords instead of plain text in a real application)
INSERT INTO users (name, email, password) VALUES
('Alice Botanist', 'alice@example.com', 'password1'),
('Bob Gardener', 'bob@example.com', 'password2');

-- Sample data for plant groups
INSERT INTO plant_group (GroupName) VALUES
('Mosses and Liverworts'),
('Ferns'),
('Gymnosperms'),
('Angiosperms');

-- Sample data for flowering groups
INSERT INTO flower_group (FlowerGroupName) VALUES
('Monocotyledons'),
('Dicotyledons'),
('Non-Flowering');

-- Sample data for plants (6-7 entries, various categories)
-- All image paths do not need to include public/images/
INSERT INTO arboretumplants
(Scientific_Name, Common_Name, Family, Other_Names, GroupID, FlowerID, Credit_links, Useful_links, Description, user_id, Images, created_at, updated_at)
VALUES
('Magnolia grandiflora', 'Southern Magnolia', 'Magnoliaceae', 'Bull Bay', 4, 2, 'https://pixabay.com', 'https://info1.com', 'Large evergreen tree with fragrant white flowers.', 1, 'plants/tank6962-southern-magnolia-5991341_1280.jpg', NOW(), NOW()),
('Pinus taeda', 'Loblolly Pine', 'Pinaceae', NULL, 3, 3, 'https://example.com', 'https://info2.com', 'Tall pine native to the southeastern US.', 2, 'plants/loblolly_pine.jpg', NOW(), NOW()),
('Athyrium filix-femina', 'Lady Fern', 'Athyriaceae', NULL, 2, 3, 'https://pixabay.com', 'https://info3.com', 'Delicate fern with feathery fronds.', 1, 'plants/aliare-fern-7196443_1280.jpg', NOW(), NOW()),
('Taraxacum officinale', 'Dandelion', 'Asteraceae', NULL, 4, 2, 'https://pixabay.com', 'https://info4.com', 'Common yellow-flowered weed.', 2, 'plants/noname_13-dandelion-3382663_1920.jpg', NOW(), NOW()),
('Marchantia polymorpha', 'Common Liverwort', 'Marchantiaceae', NULL, 1, 3, 'https://pixabay.com', 'https://info5.com', 'Liverwort found in moist habitats.', 1, 'plants/adege-liverflower-4061671_1280.jpg', NOW(), NOW()),
('Zea mays', 'Corn', 'Poaceae', NULL, 4, 1, 'https://pixabay.com', 'https://info6.com', 'Tall annual grass, staple crop.', 2, 'plants/couleur-corn-1690387_1280.jpg', NOW(), NOW()),
('Nymphaea odorata', 'American White Waterlily', 'Nymphaeaceae', NULL, 4, 2, 'https://pixabay.com', 'https://info7.com', 'Aquatic plant with floating leaves and white flowers.', 1, 'plants/kimdaejeung-waterlily-8007670_1280.jpg', NOW(), NOW());
