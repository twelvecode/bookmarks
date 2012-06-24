
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
-- bookmark_tag
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bookmark_tag`;

CREATE TABLE `bookmark_tag`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- bookmark_category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bookmark_category`;

CREATE TABLE `bookmark_category`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(256),
    `description` VARCHAR(512),
    `user_id` INTEGER,
    `tree_left` INTEGER,
    `tree_right` INTEGER,
    `tree_level` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `bookmark_category_FI_1` (`user_id`),
    CONSTRAINT `bookmark_category_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`)
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
    INDEX `bookmark_FI_2` (`category_id`),
    CONSTRAINT `bookmark_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `user` (`id`),
    CONSTRAINT `bookmark_FK_2`
        FOREIGN KEY (`category_id`)
        REFERENCES `bookmark_category` (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- bookmark_tag_relation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `bookmark_tag_relation`;

CREATE TABLE `bookmark_tag_relation`
(
    `bookmark_id` INTEGER NOT NULL,
    `tag_id` INTEGER NOT NULL,
    PRIMARY KEY (`bookmark_id`,`tag_id`),
    INDEX `bookmark_tag_relation_FI_2` (`tag_id`),
    CONSTRAINT `bookmark_tag_relation_FK_1`
        FOREIGN KEY (`bookmark_id`)
        REFERENCES `bookmark` (`id`),
    CONSTRAINT `bookmark_tag_relation_FK_2`
        FOREIGN KEY (`tag_id`)
        REFERENCES `bookmark_tag` (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
