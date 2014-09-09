SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


/*Table structure for table `authassignment` */

DROP TABLE IF EXISTS `authassignment`;

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authassignment` */

insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('admin','1',NULL,'N;');

/*Table structure for table `authitem` */

DROP TABLE IF EXISTS `authitem`;

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authitem` */

insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('admin',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Authenticated',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.ChooseRoles',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.ConfirmDelete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Character.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.ModifyComment',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.Signup',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.ToggleAvailable',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.ToggleHolder',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('CharacterEvent.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Classe.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Config.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.ConfirmDelete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Crea',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.List',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.MyEvents',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Show',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.ViewDay',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Faction.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Gender.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guest',2,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guild.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guildmaster',2,'Guild Master',NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Guildrole.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Race.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raid.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Raidleader',2,'Raid Leader',NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Role.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Activate',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Contact',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Error',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Login',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Logout',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Site.Register',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Spec.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.*',1,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.Admin',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.Profile',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('User.View',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Userattributes.*',1,NULL,NULL,'N;');

/*Table structure for table `authitemchild` */

DROP TABLE IF EXISTS `authitemchild`;

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `authitemchild` */

insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Authenticated');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','Authenticated');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','Character.*');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Character.ChooseRoles');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Character.ConfirmDelete');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Character.Create');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','CharacterEvent.Delete');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.ModifyComment');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.Signup');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.ToggleAvailable');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','CharacterEvent.ToggleHolder');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Config.*');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','Event.*');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Event.Show');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Event.ViewDay');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Guild.*');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Guildrole.*');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','Raid.*');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Raidleader');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','User.*');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','User.Profile');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Event.List');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Event.MyEvents');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.Delete');

/*Table structure for table `rights` */

DROP TABLE IF EXISTS `rights`;

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

CREATE  TABLE IF NOT EXISTS `user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `surname` VARCHAR(45) NULL ,
  `username` VARCHAR(45) NULL ,
  `password` CHAR(32) NULL ,
  `email` VARCHAR(45) NULL ,
  `portrait_URL` VARCHAR(255) NULL ,
  `creation_date` DATETIME NULL ,
  `status` INT NULL ,
  `activation_key` VARCHAR(32) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `class` ;

CREATE  TABLE IF NOT EXISTS `class` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `color` VARCHAR(7) NULL ,
  `name` VARCHAR(45) NULL ,
  `icon` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `faction`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `faction` ;

CREATE  TABLE IF NOT EXISTS `faction` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `icon` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gender`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gender` ;

CREATE  TABLE IF NOT EXISTS `gender` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `icon` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `race`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `race` ;

CREATE  TABLE IF NOT EXISTS `race` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guild`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guild` ;

CREATE  TABLE IF NOT EXISTS `guild` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `realm` VARCHAR(45) NULL ,
  `name` VARCHAR(45) NULL ,
  `tag` VARCHAR(45) NULL ,
  `guild_master_id` INT NULL ,
  `faction_id` INT NULL ,
  `URL` VARCHAR(255) NULL ,
  `img` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `character`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `character` ;

CREATE  TABLE IF NOT EXISTS `character` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `class_id` INT NOT NULL ,
  `race_id` INT NOT NULL ,
  `gender_id` INT NOT NULL ,
  `faction_id` INT NOT NULL ,
  `guild_id` INT NULL ,
  `name` VARCHAR(45) NULL ,
  `level` INT NULL ,
  `title` VARCHAR(255) NULL ,
  `item_level` VARCHAR(10) NULL ,
  `portrait_URL` VARCHAR(255) NULL ,
  `armory_URL` VARCHAR(255) NULL ,
  `is_main` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_user_id` (`user_id` ASC) ,
  INDEX `fk_class_id` (`class_id` ASC) ,
  INDEX `fk_faction_id` (`faction_id` ASC) ,
  INDEX `fk_gender_id` (`gender_id` ASC) ,
  INDEX `fk_race_id` (`race_id` ASC) ,
  INDEX `fk_guild_id` (`guild_id` ASC) ,
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_id`
    FOREIGN KEY (`class_id` )
    REFERENCES `class` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faction_id`
    FOREIGN KEY (`faction_id` )
    REFERENCES `faction` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gender_id`
    FOREIGN KEY (`gender_id` )
    REFERENCES `gender` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_race_id`
    FOREIGN KEY (`race_id` )
    REFERENCES `race` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_guild_id`
    FOREIGN KEY (`guild_id` )
    REFERENCES `guild` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `raid`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `raid` ;

CREATE  TABLE IF NOT EXISTS `raid` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `level` INT NULL ,
  `img` VARCHAR(255) NULL ,
  `number_of_players` INT NULL ,
  `description` VARCHAR(500) NULL ,
  `color` VARCHAR(45) NULL ,
  `type` VARCHAR(45) NULL COMMENT 'Raid type: Normal, Heroic, Flex, ecc' ,
  `is_heroic` INT NULL DEFAULT 0 ,
  `is_active` INT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `event` ;

CREATE  TABLE IF NOT EXISTS `event` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `raid_id` INT NULL ,
  `raid_leader_id` INT NULL ,
  `event_date` DATETIME NULL ,
  `creation_date` DATETIME NULL ,
  `description` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_raid_id` (`raid_id` ASC) ,
  CONSTRAINT `fk_raid_id`
    FOREIGN KEY (`raid_id` )
    REFERENCES `raid` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `role` ;

CREATE  TABLE IF NOT EXISTS `role` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `character_event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `character_event` ;

CREATE  TABLE IF NOT EXISTS `character_event` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `event_id` INT NOT NULL ,
  `char_id` INT NOT NULL ,
  `role_id` INT NOT NULL ,
  `available_flag` INT NULL ,
  `holder_flag` INT NULL ,
  `comment` VARCHAR(500) NULL ,
  `comment_date` DATETIME NULL ,
  PRIMARY KEY (`id`, `event_id`, `char_id`, `role_id`) ,
  INDEX `fk_character_id` (`char_id` ASC) ,
  INDEX `fk_role_id` (`role_id` ASC) ,
  CONSTRAINT `fk_character_id`
    FOREIGN KEY (`char_id` )
    REFERENCES `character` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_event_id`
    FOREIGN KEY (`event_id` )
    REFERENCES `event` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_role_id`
    FOREIGN KEY (`role_id` )
    REFERENCES `role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `config` ;

CREATE  TABLE IF NOT EXISTS `config` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `timezone` VARCHAR(45) NULL ,
  `locale` VARCHAR(45) NULL ,
  `armory_region` VARCHAR(45) NULL ,
  `armory_realm` VARCHAR(45) NULL ,
  `brand` VARCHAR(45) NULL ,
  `debug_mode` VARCHAR(45) NULL ,
  `event_notification_active` VARCHAR(45) NULL ,
  `welcome_message` TEXT NULL ,
  `template` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `spec`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `spec` ;

CREATE  TABLE IF NOT EXISTS `spec` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `class_id` INT NULL ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `character_has_spec`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `character_has_spec` ;

CREATE  TABLE IF NOT EXISTS `character_has_spec` (
  `character_id` INT NOT NULL ,
  `spec_id` INT NOT NULL ,
  PRIMARY KEY (`character_id`, `spec_id`) ,
  INDEX `fk_character_has_spec_spec1` (`spec_id` ASC) ,
  INDEX `fk_character_has_spec_character1` (`character_id` ASC) ,
  CONSTRAINT `fk_character_has_spec_character1`
    FOREIGN KEY (`character_id` )
    REFERENCES `character` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_character_has_spec_spec1`
    FOREIGN KEY (`spec_id` )
    REFERENCES `spec` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `character_has_role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `character_has_role` ;

CREATE  TABLE IF NOT EXISTS `character_has_role` (
  `character_id` INT NOT NULL ,
  `role_id` INT NOT NULL ,
  PRIMARY KEY (`character_id`, `role_id`) ,
  INDEX `fk_character_has_role_role1` (`role_id` ASC) ,
  INDEX `fk_character_has_role_character1` (`character_id` ASC) ,
  CONSTRAINT `fk_character_has_role_character1`
    FOREIGN KEY (`character_id` )
    REFERENCES `character` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_character_has_role_role1`
    FOREIGN KEY (`role_id` )
    REFERENCES `role` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dashboard`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dashboard` ;

CREATE  TABLE IF NOT EXISTS `dashboard` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Tipo Eventi:' ,
  `user_id` INT NOT NULL ,
  `event_type` INT NOT NULL ,
  `creation_date` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guildrole`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guildrole` ;

CREATE  TABLE IF NOT EXISTS `guildrole` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `label` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `userattributes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `userattributes` ;

CREATE  TABLE IF NOT EXISTS `userattributes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `guildrole_id` INT NOT NULL ,
  `portrait` VARCHAR(45) NULL ,
  `second_email` VARCHAR(45) NULL ,
  `phone_number` VARCHAR(45) NULL ,
  `site_URL` VARCHAR(45) NULL ,
  `last_login` DATETIME NULL ,
  `locale` VARCHAR(45) NULL ,
  `timezone` VARCHAR(45) NULL ,
  `is_raidleader` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_userattributes_user1` (`user_id` ASC) ,
  INDEX `fk_userattributes_guildrole1` (`guildrole_id` ASC) ,
  CONSTRAINT `fk_userattributes_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_userattributes_guildrole1`
    FOREIGN KEY (`guildrole_id` )
    REFERENCES `guildrole` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reset_password`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reset_password` ;

CREATE  TABLE IF NOT EXISTS `reset_password` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `psw_temp` VARCHAR(45) NOT NULL ,
  `activated` INT NULL ,
  `data_richiesta` DATETIME NULL ,
  `data_attivazione` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_reset_password_user1` (`user_id` ASC) ,
  CONSTRAINT `fk_reset_password_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `user`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `user` (`id`, `name`, `surname`, `username`, `password`, `email`, `portrait_URL`, `creation_date`, `status`, `activation_key`) VALUES (1, 'Super', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, 1, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `class`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (1, '#FF7C0A', 'Druid', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (2, '#AAD372', 'Hunter', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (3, '#68CCEF', 'Mage', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (4, '#F48CBA', 'Paladin', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (5, '#AAAAAA', 'Priest', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (6, '#FFF468', 'Rogue', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (7, '#2359FF', 'Shaman', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (8, '#9382C9', 'Warlock', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (9, '#C69B6D', 'Warrior', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (10, '#C41E3B', 'Death Knight', NULL);
INSERT INTO `class` (`id`, `color`, `name`, `icon`) VALUES (11, '#008467', 'Monk', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `faction`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `faction` (`id`, `name`, `icon`) VALUES (1, 'Alliance', NULL);
INSERT INTO `faction` (`id`, `name`, `icon`) VALUES (2, 'Horde', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `gender`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `gender` (`id`, `name`, `icon`) VALUES (1, 'Male', NULL);
INSERT INTO `gender` (`id`, `name`, `icon`) VALUES (2, 'Female', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `race`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `race` (`id`, `name`) VALUES (1, 'Worgen');
INSERT INTO `race` (`id`, `name`) VALUES (2, 'Draenei');
INSERT INTO `race` (`id`, `name`) VALUES (3, 'Dwarf');
INSERT INTO `race` (`id`, `name`) VALUES (4, 'Gnome');
INSERT INTO `race` (`id`, `name`) VALUES (5, 'Human');
INSERT INTO `race` (`id`, `name`) VALUES (6, 'Night Elf');
INSERT INTO `race` (`id`, `name`) VALUES (7, 'Goblin');
INSERT INTO `race` (`id`, `name`) VALUES (8, 'Blood Elf');
INSERT INTO `race` (`id`, `name`) VALUES (9, 'Orc');
INSERT INTO `race` (`id`, `name`) VALUES (10, 'Tauren');
INSERT INTO `race` (`id`, `name`) VALUES (11, 'Troll');
INSERT INTO `race` (`id`, `name`) VALUES (12, 'Forsaken');
INSERT INTO `race` (`id`, `name`) VALUES (13, 'Pandaren');

COMMIT;

-- -----------------------------------------------------
-- Data for table `role`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `role` (`id`, `name`) VALUES (1, 'Tank');
INSERT INTO `role` (`id`, `name`) VALUES (2, 'Healer');
INSERT INTO `role` (`id`, `name`) VALUES (3, 'DPS Melee');
INSERT INTO `role` (`id`, `name`) VALUES (4, 'DPS Ranged');

COMMIT;

-- -----------------------------------------------------
-- Data for table `spec`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (1, 1, 'Balance');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (2, 1, 'Feral Combat');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (3, 1, 'Restoration');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (4, 2, 'Beast Mastery');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (5, 2, 'Marksmanship');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (6, 2, 'Survival');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (7, 3, 'Arcane');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (8, 3, 'Fire');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (9, 3, 'Frost');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (10, 4, 'Holy');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (11, 4, 'Protection');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (12, 4, 'Retribution');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (13, 5, 'Discipline');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (14, 5, 'Holy');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (15, 5, 'Shadow');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (16, 6, 'Assassination');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (17, 6, 'Combat');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (18, 6, 'Subtlety');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (19, 7, 'Elemental');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (20, 7, 'Enhancement');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (21, 7, 'Restoration');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (22, 8, 'Affliction');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (23, 8, 'Demonology');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (24, 8, 'Destruction');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (25, 9, 'Arms');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (26, 9, 'Fury');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (27, 9, 'Protection');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (28, 10, 'Blood');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (29, 10, 'Frost');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (30, 10, 'Unholy');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (31, 11, 'Brewmaster');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (32, 11, 'Mistweaver');
INSERT INTO `spec` (`id`, `class_id`, `name`) VALUES (33, 11, 'Windwalker');

COMMIT;

-- -----------------------------------------------------
-- Data for table `guildrole`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `guildrole` (`id`, `label`) VALUES (1, 'Guild Master');
INSERT INTO `guildrole` (`id`, `label`) VALUES (2, 'Default');

COMMIT;

-- -----------------------------------------------------
-- Data for table `userattributes`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `userattributes` (`id`, `user_id`, `guildrole_id`, `portrait`, `second_email`, `phone_number`, `site_URL`, `last_login`, `locale`, `timezone`, `is_raidleader`) VALUES (1, 1, 1, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 'en_GB', 'Europe/Rome', NULL);

COMMIT;
