SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE `Awards` (
  `award_id` int(11) NOT NULL,
  `award_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Awards` (`award_id`, `award_title`) VALUES
(1, 'Goodreads Choice Awards'),
(2, 'People\'s Choice Awards'),
(3, 'BestBook Award'),
(4, 'Goodreads Choice Awards'),
(5, 'BestBook Award'),
(6, 'BestBook Award'),
(7, 'BestBook Award'),
(8, 'BestBook Award'),
(9, 'Goodreads Choice Awards'),
(10, 'BestBook Award'),
(11, 'Goodreads Choice Awards'),
(12, 'Goodreads Choice Awards'),
(13, 'BestBook Award');

CREATE TABLE `Book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_shelf_id` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `isbn_10` bigint(11) DEFAULT NULL,
  `isbn_13` bigint(11) DEFAULT NULL,
  `genre_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quanlity` int(11) NOT NULL,
  `award_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) 

INSERT INTO `Book` (`book_id`, `title`, `book_shelf_id`, `author`, `publisher`, `year`, `fee_id`, `isbn_10`, `isbn_13`, `genre_id`, `img`, `quanlity`, `award_id`) VALUES
(1, 'Catching Fire', 2, 'Suzanne Collins', 'Scholastic Press', 2009, 2, NULL, NULL, '2', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338682410/alternate/2/renditions/900', 7, '1'),
(2, 'The Hunger Games', 2, 'Suzanne Collins', 'Scholastic Press', 2008, 2, NULL, 9780439023528, '2', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338682410/alternate/0/renditions/900', 9, '2'),
(3, 'Mocking Jay', 2, 'Suzanne Collins', 'Scholastic Press', 2010, 2, NULL, NULL, '2', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338682410/alternate/3/renditions/900', 6, '3'),
(4, 'Much Ado About Nothing', 3, 'William Shakespeare', 'Simon & Schuster', 1600, 1, NULL, NULL, '3', 'https://dynamic.indigoimages.ca/books/0143130188.jpg?maxheight=200&width=200&quality=85&sale=9&lang=en', 4, '4'),
(5, 'Percy Jackson and The Last Olympians: The Lightning Thief', 1, 'Rick Riordan', 'Disney Hyperion', 2005, 3, 9781423121701, NULL, '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/0/renditions/900', 4, '5'),
(6, 'Percy Jackson and The Olympians: The Sea Monsters', 1, 'Rick Riordan', 'Disney Hyperion', 2006, 3, NULL, NULL, '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/2/renditions/900', 0, '6'),
(7, 'Percy Jackson and The Olympians: The Titan\'s Curse', 1, 'Rick Riordan', 'Disney Hyperion', 2007, 3, NULL, NULL, '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/4/renditions/900', 1, '7'),
(8, 'Percy Jackson and the Last Olympian', 1, 'Rick Riordan', 'Disney Hyperion', 2009, 3, NULL, NULL, '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/8/renditions/900', 8, '8'),
(9, 'The Lord of the Rings', NULL, 'J. R. R. Tolkien', 'Harper Collins', 2007, 1, 8471282, 9780008471286, '9', 'https://dynamic.indigoimages.ca/books/0261102354.jpg?maxheight=200&width=200&quality=85&sale=0&lang=en', 19, '9'),
(10, '1984', NULL, 'George Orwell', 'Signet Classic', 1961, 1, 9780451524, 9780451524935, '2', 'https://dynamic.indigoimages.ca/books/2072938228.jpg?maxheight=200&width=200&quality=85&sale=0&lang=en', 10, '10'),
(11, 'Guns, Germs, and Steel', NULL, 'Jared Diamond', 'WW Norton', 2017, 1, 393354326, 9780393354324, '4', 'https://dynamic.indigoimages.ca/books/1504046579.jpg?maxheight=200&width=200&quality=85&sale=0&lang=en', 9, '11'),
(12, 'Gordon Ramsay\'s Home Cooking', NULL, 'Gordon Ramsay', 'Grand Central Publishing', 2013, 1, 1455525251, 9781455525256, '10', 'https://images-na.ssl-images-amazon.com/images/I/51KRDDw84EL._SX198_BO1,204,203,200_QL40_ML2_.jpg', 10, '12'),
(13, 'Harry Potter and the Chamber of Secrets', NULL, 'J.K Rowling', 'Bloomsbury Children\'s books', 2014, 1, 1408855666, 9781408855669, '9', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338299151/primary/renditions/900', 10, '13'),
(15, 'Goosebumps Slappy World Escape From Shudder Mansion', NULL, 'R. L. Stine', 'Scholastic Paperbacks', 2018, 3, 1338222996, 9781338222999, '6', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338575613/alternate/5/renditions/900', 10, '0'),
(16, 'To All the Boys I’ve Loved Before', NULL, 'Jenny Han', 'Simon & Schuster', 2014, 2, 1442426705, 9781442426702, '7', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781534438378/primary/renditions/900', 10, '0');

CREATE TABLE `Cart` (
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Fees_id` int(11) NOT NULL
) 

CREATE TABLE `confirmed` (
  `sno` int(30) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL
) 

INSERT INTO `confirmed` (`sno`, `cart_id`, `book_id`, `quantity`, `email`, `address`, `fee_id`, `user_id`, `award_id`) VALUES
(1, 70, 1, 1, 'employee@employee.com', 'employeeaddress', 2, 31, 1),
(2, 71, 2, 1, 'employee@employee.com', 'employeeaddress', 2, 31, 2),
(3, 72, 4, 1, 'employee@employee.com', 'employeeaddress', 1, 31, 4),
(4, 73, 1, 1, 'employee@employee.com', 'employeeaddress', 2, 31, 1),
(5, 74, 7, 1, 'employee@employee.com', 'employeeaddress', 3, 31, 7),
(6, 75, 3, 2, 'customer@customer.com', 'employeeaddress', 2, 27, 3),
(7, 76, 2, 1, 'customer@customer.com', 'customer', 2, 27, 2),
(8, 77, 9, 1, 'customer@customer.com', 'employeeaddress', 1, 27, 9),
(12, 80, 3, 1, 'admin@admin.com', 'admintest', 2, 1, 3),
(13, 81, 5, 3, 'admin@admin.com', 'admintest', 3, 1, 5),
(15, 82, 3, 7, 'admin@admin.com', '123', 2, 1, 3),
(16, 83, 3, 3, 'admin@admin.com', 'test', 2, 1, 3),
(17, 85, 4, 2, 'test@test.com', 'asdasd123', 1, 34, 4),
(18, 86, 2, 1, 'test@test.com', 'asdasd123', 2, 34, 2),
(20, 87, 8, 2, 'test@test.com', 'hello123', 3, 34, 8),
(21, 88, 11, 1, 'customer@customer.com', '3324 Howsrd Ave', 1, 27, 11),
(22, 89, 1, 1, 'employee@employee.com', 'this house', 2, 31, 1),
(23, 90, 2, 1, 'customertest@customer.com', 'customeraddress', 2, 35, 2);

CREATE TABLE `Fees` (
  `fee_id` int(11) NOT NULL,
  `rent_price` double DEFAULT NULL,
  `purchase_price` double DEFAULT NULL
) 

INSERT INTO `Fees` (`fee_id`, `rent_price`, `purchase_price`) VALUES
(1, 2.99, 10.99),
(2, 6.99, 16.99),
(3, 5.99, 12.99),
(4, 3.99, 15.99);

CREATE TABLE `Genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) 

INSERT INTO `Genre` (`genre_id`, `genre_name`) VALUES
(1, 'Fiction'),
(2, 'Science Fiction'),
(3, 'Comedy'),
(4, 'Historical'),
(5, 'Thriller'),
(6, 'Horror'),
(7, 'Romance'),
(8, 'Poetry'),
(9, 'Fantasy'),
(10, 'Cooking');

CREATE TABLE `UserRoles` (
  `user_role_id` int(8) NOT NULL,
  `access_level` int(8) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) 

INSERT INTO `UserRoles` (`user_role_id`, `access_level`, `description`) VALUES
(1, 1, 'Customer'),
(2, 2, 'Employee'),
(3, 3, 'Admin');

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) 

INSERT INTO `Users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_role_id`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$RncPKtB9cMIfbVgm2jNPte4850yj/Zm5hjKtTEl.hBJf7qm/2qolq', '3'),
(4, 'hello', 'hello', 'hello@hello.com', '$2y$10$GHxfvpSZSW1iNfyJzuHLXu2p48j2qEr6mUMqQ57CUMOJGElk6tdY2', '1'),
(7, 'Abhimanyu', 'Manchanda', 'admin123@admin.com', '$2y$10$wMGyZLCTRDjsOvqVFNN1/eN2WV/QFeX60u6viVuTWKAZBGFn.IoBS', '1'),
(27, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$/rB6KleSO10o5gHLQBh4p.bjBncn4nZe0CIfq31mlrDsqddl1avT6', '1'),
(31, 'employee', 'employee', 'employee@employee.com', '$2y$10$bura/jjig75JKTNe47yZmuhbfB82Yv.SIpVq8FlyeEX2WJnYjuE7u', '2'),
(34, 'test', 'test', 'test@test.com', '$2y$10$KHyTfZJoQz9kwW7LHbjTL.IghZJF8I1FBG5a5wzqhq8HJD6dI0zFe', '1');


ALTER TABLE `Awards`
  ADD PRIMARY KEY (`award_id`);

ALTER TABLE `Book`
  ADD PRIMARY KEY (`book_id`);

ALTER TABLE `Cart`
  ADD PRIMARY KEY (`cart_id`);

ALTER TABLE `confirmed`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `Fees`
  ADD PRIMARY KEY (`fee_id`);

ALTER TABLE `Genre`
  ADD PRIMARY KEY (`genre_id`);

ALTER TABLE `UserRoles`
  ADD PRIMARY KEY (`user_role_id`);

ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `Book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

ALTER TABLE `Cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

ALTER TABLE `confirmed`
  MODIFY `sno` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
