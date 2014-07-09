CREATE TABLE IF NOT EXISTS `razgovori`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `registration_date` DATETIME NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


CREATE TABLE IF NOT EXISTS `razgovori`.`threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing thread_id of each thread, unique index',
  `thread_name` varchar(80) COLLATE utf8_unicode_ci NOT NULL COMMENT 'thread''s name, unique',
  `user_id` int(11) NOT NULL,
  `thread_date` DATETIME NOT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


CREATE TABLE IF NOT EXISTS `razgovori`.`messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing message_id of each message, unique index',
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` TEXT (500) NOT NULL,
  `thread_date` DATETIME NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


ova tabela nije u redu jer ima dve iste kolone a to su primar_id i secundar_id
CREATE TABLE IF NOT EXISTS `razgovori`.`friends` (
  `friends_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing message_id of each message, unique index',
  `primar_id` int(11) NOT NULL,
  `secundar_id` int(11) NOT NULL,
  PRIMARY KEY (`friends_id`),
  UNIQUE INDEX (primar_id, secundar_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';