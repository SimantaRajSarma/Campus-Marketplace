CREATE TABLE `users` (
  `user_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL
);

CREATE TABLE `sellers` (
  `seller_id` int(11) PRIMARY KEY,
  FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
);

CREATE TABLE `categories` (
  `category_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL
);

CREATE TABLE `items` (
  `item_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE
);

CREATE TABLE `item_images` (
  `image_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE
);

CREATE TABLE `transactions` (
  `transaction_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (`buyer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE
);

CREATE TABLE `feedback` (
  `feedback_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE
);

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`) VALUES
(1, 'sima', 'sima@prakity.com', 'hello@123');

INSERT INTO `sellers` (`seller_id`) VALUES
(1);
