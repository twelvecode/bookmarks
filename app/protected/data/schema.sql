
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- config
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config`
(
    `name` VARCHAR(128) NOT NULL,
    `value` TEXT,
    PRIMARY KEY (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- bookmark
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bookmark`;

CREATE TABLE `bookmark`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(256),
    `description` VARCHAR(1024),
    `location` VARCHAR(256),
    `category_id` INTEGER,
    `user_id` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `bookmark_FI_1` (`user_id`),
    CONSTRAINT `bookmark_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `parent_category_id` INTEGER,
    `tree_left` INTEGER,
    `tree_right` INTEGER,
    `tree_level` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `category_FI_1` (`parent_category_id`),
    CONSTRAINT `category_FK_1`
        FOREIGN KEY (`parent_category_id`)
        REFERENCES `category` (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- tag
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(256),
    `password` VARCHAR(256),
    `name` VARCHAR(256),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `owner_id` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user_group_member
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_group_member`;

CREATE TABLE `user_group_member`
(
    `group_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`group_id`,`user_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user_share_category_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_share_category_request`;

CREATE TABLE `user_share_category_request`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- group_share_category_request
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group_share_category_request`;

CREATE TABLE `group_share_category_request`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- user_shared_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_shared_category`;

CREATE TABLE `user_shared_category`
(
    `category_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`category_id`,`user_id`),
    INDEX `user_shared_category_FI_2` (`user_id`),
    CONSTRAINT `user_shared_category_FK_1`
        FOREIGN KEY (`category_id`)
        REFERENCES `category` (`id`),
    CONSTRAINT `user_shared_category_FK_2`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- group_shared_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `group_shared_category`;

CREATE TABLE `group_shared_category`
(
    `category_id` INTEGER NOT NULL,
    `group_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`category_id`,`group_id`),
    INDEX `group_shared_category_FI_2` (`group_id`),
    CONSTRAINT `group_shared_category_FK_1`
        FOREIGN KEY (`category_id`)
        REFERENCES `category` (`id`),
    CONSTRAINT `group_shared_category_FK_2`
        FOREIGN KEY (`group_id`)
        REFERENCES `user_group` (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
