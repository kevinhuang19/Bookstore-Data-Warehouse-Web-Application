SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE `Awards` (
  `award_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `award_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) 

INSERT INTO `Awards` (`award_id`, `award_title`) VALUES
('1', 'Goodreads Choice Awards'),
('10', 'BestBook Award'),
('11', 'Goodreads Choice Awards'),
('12', 'Goodreads Choice Awards'),
('13', 'BestBook Award'),
('14', 'BestBook Award'),
('2', 'People\'s Choice Awards'),
('3', 'BestBook Award'),
('4', 'Goodreads Choice Awards'),
('5', 'BestBook Award'),
('6', 'BestBook Award'),
('7', 'BestBook Award'),
('8', 'BestBook Award'),
('9', 'Goodreads Choice Awards');

CREATE TABLE `Book` (
  `book_id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_shelf_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn_10` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isbn_13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) 

INSERT INTO `Book` (`book_id`, `title`, `book_shelf_id`, `author`, `publisher`, `year`, `fee_id`, `isbn_10`, `isbn_13`, `genre_id`, `img`) VALUES
(1, 'Catching Fire', '2', 'Suzanne Collins', 'Scholastic Press', '2009', '2', '', '', '2', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338682410/alternate/2/renditions/900'),
(2, 'The Hunger Games', '2', 'Suzanne Collins', 'Scholastic Press', '2008', '2', '', '9780439023528', '2', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338682410/alternate/0/renditions/900'),
(3, 'Mocking Jay', '2', 'Suzanne Collins', 'Scholastic Press', '2010', '2', '', '', '2', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338682410/alternate/3/renditions/900'),
(4, 'Much Ado About Nothing', '3', 'William Shakespeare', 'Simon & Schuster', '1600', '1', '', '', '3', 'https://dynamic.indigoimages.ca/books/0143130188.jpg?maxheight=200&width=200&quality=85&sale=9&lang=en'),
(5, 'Percy Jackson and The Last Olympians: The Lightning Thief', '1', 'Rick Riordan', 'Disney Hyperion', '2005', '3', '9781423121701', '', '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/0/renditions/900'),
(6, 'Percy Jackson and The Olympians: The Sea Monsters', '1', 'Rick Riordan', 'Disney Hyperion', '2006', '3', '', '', '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/2/renditions/900'),
(7, 'Percy Jackson and The Olympians: The Titan\'s Curse', '1', 'Rick Riordan', 'Disney Hyperion', '2007', '3', '', '', '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/4/renditions/900'),
(8, 'Percy Jackson and the Last Olympian', '1', 'Rick Riordan', 'Disney Hyperion', '2009', '3', '', '', '1', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780545922722/alternate/8/renditions/900'),
(9, 'The Lord of the Rings', '', 'J. R. R. Tolkien', 'Harper Collins', '2007', '1', '8471282', '9780008471286', '9', 'https://dynamic.indigoimages.ca/books/0261102354.jpg?maxheight=200&width=200&quality=85&sale=0&lang=en'),
(10, '1984', '', 'George Orwell', 'Signet Classic', '1961', '1', '9780451524', '9780451524935', '2', 'https://dynamic.indigoimages.ca/books/2072938228.jpg?maxheight=200&width=200&quality=85&sale=0&lang=en'),
(11, 'Guns, Germs, and Steel', '', 'Jared Diamond', 'WW Norton', '2017', '1', '393354326', '9780393354324', '4', 'https://dynamic.indigoimages.ca/books/1504046579.jpg?maxheight=200&width=200&quality=85&sale=0&lang=en'),
(12, 'Gordon Ramsay\'s Home Cooking', '', 'Gordon Ramsay', 'Grand Central Publishing', '2013', '1', '1455525251', '9781455525256', '10', 'https://images-na.ssl-images-amazon.com/images/I/51KRDDw84EL._SX198_BO1,204,203,200_QL40_ML2_.jpg'),
(13, 'Harry Potter and the Chamber of Secrets', '', 'J.K Rowling', 'Bloomsbury Children\'s books', '2014', '1', '1408855666', '9781408855669', '9', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338299151/primary/renditions/900'),
(14, 'You\'ll Be the Death of Me', '', 'Karen M. McManus', 'Delacorte Press', '2021', '2', '', '', '5', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780593175866/primary/renditions/900'),
(15, 'Goosebumps Slappy World Escape From Shudder Mansion', '', 'R. L. Stine', 'Scholastic Paperbacks', '2018', '3', '1338222996', '9781338222999', '6', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781338575613/alternate/5/renditions/900'),
(16, 'To All the Boys I’ve Loved Before', '', 'Jenny Han', 'Simon & Schuster', '2014', '2', '1442426705', '9781442426702', '7', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9781534438378/primary/renditions/900'),
(17, 'Call Us What We Carry', '2', 'Amanda Gorman', 'PRH\'s Viking Books imprint', '2021', '2', '1234567895', '9780593465066', '8', 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780593465066/primary/renditions/900');

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

CREATE TABLE `orders` (
  `sno` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fee_id` float NOT NULL,
  `award_id` int(11) NOT NULL
) 

INSERT INTO `orders` (`sno`, `cart_id`, `book_id`, `quantity`, `user_Id`, `address`, `time`, `fee_id`, `award_id`) VALUES
(1, 70, 1, 1, '31', 'employeeaddress', '2022-04-13 16:00:31', 2, 1),
(2, 71, 2, 1, '31', 'employeeaddress', '2022-04-13 16:01:40', 2, 2),
(3, 72, 4, 1, '31', 'employeeaddress', '2022-04-13 16:01:57', 1, 4),
(4, 73, 1, 1, '31', 'employeeaddress', '2022-04-13 16:06:38', 2, 1),
(5, 74, 7, 1, '31', 'employeeaddress', '2022-04-13 16:07:49', 3, 7),
(6, 75, 3, 2, '27', 'employeeaddress', '2022-04-13 16:08:51', 2, 3),
(7, 76, 2, 1, '27', 'customer', '2022-04-13 16:11:45', 2, 2),
(8, 77, 9, 1, '27', 'employeeaddress', '2022-04-13 16:19:47', 1, 9),
(9, 78, 5, 3, '30', '123 test', '2022-04-13 16:37:57', 3, 5),
(10, 79, 4, 3, '30', '123 test', '2022-04-13 16:37:57', 1, 4),
(12, 80, 3, 1, '1', 'admintest', '2022-04-13 16:46:43', 2, 3),
(13, 81, 5, 3, '1', 'admintest', '2022-04-13 16:46:43', 3, 5),
(15, 82, 3, 7, '1', '123', '2022-04-13 16:48:28', 2, 3),
(16, 83, 3, 3, '1', 'test', '2022-04-13 16:53:06', 2, 3),
(17, 85, 4, 2, '34', 'asdasd123', '2022-04-13 19:26:01', 1, 4),
(18, 86, 2, 1, '34', 'asdasd123', '2022-04-13 19:26:01', 2, 2),
(20, 87, 8, 2, '34', 'hello123', '2022-04-13 19:26:02', 3, 8),
(21, 88, 11, 1, '27', '3324 Howsrd Ave', '2022-04-13 20:17:11', 1, 11),
(22, 89, 1, 1, '31', 'this house', '2022-04-13 21:36:23', 2, 1),
(23, 90, 2, 1, '35', 'customeraddress', '2022-04-13 21:49:48', 2, 2);

CREATE TABLE `stock` (
  `book_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(20) NOT NULL,
  `ti` timestamp NOT NULL DEFAULT current_timestamp()
) 

INSERT INTO `stock` (`book_id`, `quantity`, `ti`) VALUES
('1', 10, '2022-04-13 15:57:00'),
('2', 10, '2022-04-13 15:57:07'),
('3', 10, '2022-04-13 15:57:13'),
('4', 10, '2022-04-13 15:57:20'),
('5', 10, '2022-04-13 15:57:45'),
('7', 10, '2022-04-13 15:57:54'),
('8', 10, '2022-04-13 15:58:03'),
('9', 10, '2022-04-13 15:58:08'),
('10', 10, '2022-04-13 15:58:13'),
('9', 10, '2022-04-13 15:58:20'),
('11', 10, '2022-04-13 15:58:25'),
('12', 10, '2022-04-13 15:58:30'),
('13', 10, '2022-04-13 15:58:35'),
('14', 10, '2022-04-13 15:58:40'),
('15', 10, '2022-04-13 15:58:46'),
('16', 10, '2022-04-13 15:58:51'),
('17', 10, '2022-04-13 15:58:56'),
('3', 2, '2022-04-13 16:39:40'),
('3', 7, '2022-04-13 18:11:56'),
('2', 3, '2022-04-13 20:17:48');

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ttt` timestamp NOT NULL DEFAULT current_timestamp()
) 

INSERT INTO `Users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_role_id`, `ttt`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$RncPKtB9cMIfbVgm2jNPte4850yj/Zm5hjKtTEl.hBJf7qm/2qolq', '3', '2022-04-07 01:29:49'),
(2, 'employee', 'employee', 'employee@employee.com', '$2y$10$M1ueiLStpUWjv2AROog0Y.85T3w54izG.BhvjzaX9aEgeak5j2qzO', '2', '2022-04-07 01:29:49'),
(3, 'test', 'test', 'test@test.com', '$2y$10$ilG.GMChYLm5Arpy8G6PtOxrGN6ZeM7VtAdHAbhvHGd.hti3iZxi6', '1', '2022-04-07 01:29:49'),
(4, 'hello', 'hello', 'hello@hello.com', '$2y$10$GHxfvpSZSW1iNfyJzuHLXu2p48j2qEr6mUMqQ57CUMOJGElk6tdY2', '1', '2022-04-07 01:29:49'),
(5, 'Abhimanyu', 'Manchanda', 'manchana@uwindsor.ca', '$2y$10$M1ailcLAbH1xpF2R2qt.ju5aMEMc9w1WO1wS6JHRJkhRQT7wnQoQ.', '1', '2022-04-07 01:29:49'),
(7, 'Abhimanyu', 'Manchanda', 'admin123@admin.com', '$2y$10$wMGyZLCTRDjsOvqVFNN1/eN2WV/QFeX60u6viVuTWKAZBGFn.IoBS', '1', '2022-04-07 01:29:49'),
(12, 'employee', 'employee', 'employee@employee.com', '$2y$10$Z9WYt.OrPHPVHbRF88l/duKhaVe0tX9rXEEgYJzJDhLla0DzFQzgi', '2', '2022-04-07 01:29:49'),
(13, 'test', 'test', 'employeetest@test.com', '$2y$10$GrNsVKnQGIyB/wJWZjJIy.KVDdUpWzXcOS4sEY1Nc3msALJakdsym', '2', '2022-04-07 01:29:49'),
(14, 'test', 'test', 'employeetest1@test.com', '$2y$10$Jyzca1J.n4kZNVeJwIzf/.4M7YKAmTDX9/9pvuZFGMCwdI/6dRfV2', '2', '2022-04-07 01:29:49'),
(15, 'test', 'test', 'employeetest3@test.com', '$2y$10$T5ZRs48ibx7Lju0UHwTbd.vAsqFEddBhdoAiKnrTD7UTySSayp/bW', '2', '2022-04-07 01:29:49'),
(16, 'test', 'test', 'admin4@emplaoyee.com', '$2y$10$o4JsThwWCALiQVw.P1MQfuWRnuRbgimo7eDeCZDAsSzuq6g0vTDmK', '2', '2022-04-07 01:29:49'),
(17, 'Abhimanyu', 'Manchanda', 'admintesting@admin.com', '$2y$10$hW2kzbtLuRNz.XyjtMWkf.JfZqfAHXGz54vtScykFf/Ro.jrUThGy', '1', '2022-04-07 01:29:49'),
(18, 'new', 'new', 'new@new.com', '$2y$10$piMt1OSPjT1khJTAkRZRQum1bYAs.V8PnpGV0ygpTMuBZO2Vhqvz6', '1', '2022-04-07 15:49:40'),
(19, 'Abhimanyu', 'Manchanda', 'test15@test.com', '$2y$10$zN9QRRgIazcH8wlil2BadecWBS/EeeDOQUOIcZ/8Luga8fzLfDfGu', '1', '2022-04-07 21:32:30'),
(20, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$KxPlZ8PWChkOt/YB/JtmNe0MaiT95s0j.vdDdVtz7ImB9WgGgLW5G', '1', '2022-04-07 21:40:42'),
(21, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$FZrWR8dHcmtSdyilZDm8F.mz7uMGLf17raCeE0WiwwCLxO/vLjnbK', '1', '2022-04-07 22:12:55'),
(22, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$wF21Y4p4lQUqwKrz9EeN1OoDFUHsxcvneWcsafIcgIZBUJhC84d7u', '1', '2022-04-07 22:14:21'),
(23, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$bL5oiLc5mQfIKOwkrs0EYuao66k7P1SvPRYuv9QyPWos0Wj8CyVPa', '1', '2022-04-07 22:16:35'),
(24, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$CRm27CoKW27dMYT5y9SzIO9iERgqxeeGBv.V45LMyUpJ5dpEMdUq6', '1', '2022-04-07 22:19:07'),
(25, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$3YHtK/idSPg4OcJordbdA.ebOXFFbPkMVedOwbtqjtvkZ1ftJ0U/G', '1', '2022-04-07 22:33:21'),
(26, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$BL96W1qPLQdjr0NS111nT.xrFCu43VvDQXN.yagFSAs1H.vlB3XNS', '1', '2022-04-07 22:33:45'),
(27, 'Abhimanyu', 'Manchanda', 'customer@customer.com', '$2y$10$/rB6KleSO10o5gHLQBh4p.bjBncn4nZe0CIfq31mlrDsqddl1avT6', '1', '2022-04-07 22:36:47'),
(28, 'Abhimanyu', 'Manchanda', 'employeetest@employee.com', '$2y$10$1/KjTllz8RanWI2ytQ1uP.Uk//x.vsbBnPbb6mJuxM.iNdMO0eiVu', '2', '2022-04-07 22:40:16'),
(29, 'test', 'test', 'test@test.com', '$2y$10$z2S1mBI.rrGV/fvFRdun7ezgWNy8opdajWLk0fejfQ8RIiKtQulve', '1', '2022-04-07 23:51:52'),
(30, 'test', 'test', 'test@test.com', '$2y$10$B8nbSc5pauqPImZQDUFCK.Y/yKJtoybC77MKV6xPrH3GXZ6S87WGy', '1', '2022-04-07 23:52:26'),
(31, 'employee', 'employee', 'employee@employee.com', '$2y$10$bura/jjig75JKTNe47yZmuhbfB82Yv.SIpVq8FlyeEX2WJnYjuE7u', '2', '2022-04-08 01:16:46'),
(32, 'test', 'test', 'huang@huang.com', '$2y$10$oQ89VgOrKmkxrfvofrMS9uKvJhgITcLqc9IjOuVM5pmbzPBJblEau', '1', '2022-04-08 11:06:16'),
(33, 'kevin', 'huang', 'kevin@huang.com', '$2y$10$BWi8RpRvTSbtIm5f6Mg7GOn0xXAiLA4GdaNjy3csS0ULvopmhPq.K', '1', '2022-04-13 17:45:32'),
(34, 'test', 'test', 'test@test.com', '$2y$10$KHyTfZJoQz9kwW7LHbjTL.IghZJF8I1FBG5a5wzqhq8HJD6dI0zFe', '1', '2022-04-13 18:11:16'),
(35, 'customer', 'test', 'customertest@customer.com', '$2y$10$Xxn6aab9KE0TUPRMxmUJDeIzN4VtxDvkFQmU33GRWJ6uGbzC8hizq', '1', '2022-04-13 21:40:00');


ALTER TABLE `Awards`
  ADD PRIMARY KEY (`award_id`);

ALTER TABLE `Book`
  ADD PRIMARY KEY (`book_id`);

ALTER TABLE `Fees`
  ADD PRIMARY KEY (`fee_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

