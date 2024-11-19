CREAT DATABASE  test COLLATE utf8_unicode_ci ;


CREATE TABLE users(
`id` integer(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` varchar(25) not null ,
    `email` varchar(30) not null UNIQUE,
    `phone` varchar(30),
    `age` integer(3),
    `gender` ENUM('female','male') DEFAULT 'male',
    `bio` text not null,
    `created_at` DATETIME DEFAULT CURRENT_TIME

)