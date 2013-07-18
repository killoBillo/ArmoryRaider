/*Table structure for table `authassignment` */

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
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Authenticated','1',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Authenticated','2',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Authenticated','3',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Guildmaster','1',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Raidleader','1',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Raidleader','2',NULL,'N;');
insert  into `authassignment`(`itemname`,`userid`,`bizrule`,`data`) values ('Raidleader','3',NULL,'N;');

/*Table structure for table `authitem` */

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
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Crea',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Create',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Delete',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Index',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.Update',0,NULL,NULL,'N;');
insert  into `authitem`(`name`,`type`,`description`,`bizrule`,`data`) values ('Event.View',0,NULL,NULL,'N;');
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

/*Table structure for table `authitemchild` */

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
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','Character.Create');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','CharacterEvent.Delete');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.ModifyComment');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.Signup');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','CharacterEvent.ToggleAvailable');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','CharacterEvent.ToggleHolder');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Config.*');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','Event.*');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Guild.*');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Guildrole.*');
insert  into `authitemchild`(`parent`,`child`) values ('Raidleader','Raid.*');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','Raidleader');
insert  into `authitemchild`(`parent`,`child`) values ('Guildmaster','User.*');
insert  into `authitemchild`(`parent`,`child`) values ('Authenticated','User.Profile');

/*Table structure for table `character` */

CREATE TABLE `character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `faction_id` int(11) NOT NULL,
  `guild_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `item_level` varchar(10) DEFAULT NULL,
  `portrait_URL` varchar(255) DEFAULT NULL,
  `armory_URL` varchar(255) DEFAULT NULL,
  `is_main` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_class_id` (`class_id`),
  KEY `fk_faction_id` (`faction_id`),
  KEY `fk_gender_id` (`gender_id`),
  KEY `fk_race_id` (`race_id`),
  KEY `fk_guild_id` (`guild_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_faction_id` FOREIGN KEY (`faction_id`) REFERENCES `faction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_race_id` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guild_id` FOREIGN KEY (`guild_id`) REFERENCES `guild` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `character` */

/*Table structure for table `character_event` */

CREATE TABLE `character_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `available_flag` int(11) DEFAULT NULL,
  `holder_flag` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`event_id`,`char_id`,`role_id`),
  KEY `fk_character_id` (`char_id`),
  KEY `fk_role_id` (`role_id`),
  KEY `fk_event_id` (`event_id`),
  CONSTRAINT `fk_character_id` FOREIGN KEY (`char_id`) REFERENCES `character` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `character_event` */

/*Table structure for table `character_has_role` */

CREATE TABLE `character_has_role` (
  `character_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`character_id`,`role_id`),
  KEY `fk_character_has_role_role1` (`role_id`),
  KEY `fk_character_has_role_character1` (`character_id`),
  CONSTRAINT `fk_character_has_role_character1` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_character_has_role_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `character_has_role` */

/*Table structure for table `character_has_spec` */

CREATE TABLE `character_has_spec` (
  `character_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  PRIMARY KEY (`character_id`,`spec_id`),
  KEY `fk_character_has_spec_spec1` (`spec_id`),
  KEY `fk_character_has_spec_character1` (`character_id`),
  CONSTRAINT `fk_character_has_spec_character1` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_character_has_spec_spec1` FOREIGN KEY (`spec_id`) REFERENCES `spec` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `character_has_spec` */

/*Table structure for table `class` */

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(7) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `class` */

insert  into `class`(`id`,`color`,`name`,`icon`) values (1,'#FF7C0A','Druid',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (2,'#AAD372','Hunter',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (3,'#68CCEF','Mage',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (4,'#F48CBA','Paladin',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (5,'#AAAAAA','Priest',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (6,'#FFF468','Rogue',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (7,'#2359FF','Shaman',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (8,'#9382C9','Warlock',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (9,'#C69B6D','Warrior',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (10,'#C41E3B','Death Knight',NULL);
insert  into `class`(`id`,`color`,`name`,`icon`) values (11,'#008467','Monk',NULL);

/*Table structure for table `config` */

CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timezone` varchar(45) DEFAULT NULL,
  `locale` varchar(45) DEFAULT NULL,
  `armory_region` varchar(45) DEFAULT NULL,
  `armory_realm` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `debug_mode` varchar(45) DEFAULT NULL,
  `event_notification_active` varchar(45) DEFAULT NULL,
  `welcome_message` text,
  `template` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `config` */

/*Table structure for table `dahboard` */

CREATE TABLE `dahboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tipo Eventi:',
  `user_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `dahboard` */

/*Table structure for table `event` */

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raid_id` int(11) DEFAULT NULL,
  `raid_leader_id` int(11) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_raid_id` (`raid_id`),
  CONSTRAINT `fk_raid_id` FOREIGN KEY (`raid_id`) REFERENCES `raid` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `event` */

/*Table structure for table `faction` */

CREATE TABLE `faction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `faction` */

insert  into `faction`(`id`,`name`,`icon`) values (1,'Alliance',NULL);
insert  into `faction`(`id`,`name`,`icon`) values (2,'Horde',NULL);

/*Table structure for table `gender` */

CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `gender` */

insert  into `gender`(`id`,`name`,`icon`) values (1,'Male',NULL);
insert  into `gender`(`id`,`name`,`icon`) values (2,'Female',NULL);

/*Table structure for table `guild` */

CREATE TABLE `guild` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realm` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `tag` varchar(45) DEFAULT NULL,
  `guild_master_id` int(11) DEFAULT NULL,
  `faction_id` int(11) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `guild` */

/*Table structure for table `guildrole` */

CREATE TABLE `guildrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `guildrole` */

insert  into `guildrole`(`id`,`label`) values (1,'Guild Master');
insert  into `guildrole`(`id`,`label`) values (2,'Default');

/*Table structure for table `race` */

CREATE TABLE `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `race` */

insert  into `race`(`id`,`name`) values (1,'Worgen');
insert  into `race`(`id`,`name`) values (2,'Draenei');
insert  into `race`(`id`,`name`) values (3,'Dwarf');
insert  into `race`(`id`,`name`) values (4,'Gnome');
insert  into `race`(`id`,`name`) values (5,'Human');
insert  into `race`(`id`,`name`) values (6,'Night Elf');
insert  into `race`(`id`,`name`) values (7,'Goblin');
insert  into `race`(`id`,`name`) values (8,'Blood Elf');
insert  into `race`(`id`,`name`) values (9,'Orc');
insert  into `race`(`id`,`name`) values (10,'Tauren');
insert  into `race`(`id`,`name`) values (11,'Troll');
insert  into `race`(`id`,`name`) values (12,'Forsaken');
insert  into `race`(`id`,`name`) values (13,'Pandaren');

/*Table structure for table `raid` */

CREATE TABLE `raid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `number_of_players` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `is_heroic` int(11) DEFAULT '0',
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `raid` */

insert  into `raid`(`id`,`name`,`level`,`img`,`number_of_players`,`description`,`color`,`is_heroic`,`is_active`) values (1,'Firelands',85,'firelands.jpg',10,'\"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt \"','#FF8A00',0,1);
insert  into `raid`(`id`,`name`,`level`,`img`,`number_of_players`,`description`,`color`,`is_heroic`,`is_active`) values (2,'Dragon Soul Normal',85,'wi-deathwingvsthrall.jpg',10,'\"Lorem Ipsum excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt\"','#FF0000',0,1);
insert  into `raid`(`id`,`name`,`level`,`img`,`number_of_players`,`description`,`color`,`is_heroic`,`is_active`) values (3,'Dragon Soul LFR',85,'wi-deathwingvsthrall.jpg',25,'\"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt \"','#85CF81',0,1);
insert  into `raid`(`id`,`name`,`level`,`img`,`number_of_players`,`description`,`color`,`is_heroic`,`is_active`) values (4,'Dragon Soul Heroic',85,'wow_ds.jpg',10,'\"Sed ut perspiciatis unde omnis iste natus\"','#47548F',1,1);

/*Table structure for table `rights` */

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `rights` */

/*Table structure for table `role` */

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`name`) values (1,'Tank');
insert  into `role`(`id`,`name`) values (2,'Healer');
insert  into `role`(`id`,`name`) values (3,'DPS Melee');
insert  into `role`(`id`,`name`) values (4,'DPS Ranged');

/*Table structure for table `spec` */

CREATE TABLE `spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `spec` */

insert  into `spec`(`id`,`class_id`,`name`) values (1,1,'Balance');
insert  into `spec`(`id`,`class_id`,`name`) values (2,1,'Feral Combat');
insert  into `spec`(`id`,`class_id`,`name`) values (3,1,'Restoration');
insert  into `spec`(`id`,`class_id`,`name`) values (4,2,'Beast Mastery');
insert  into `spec`(`id`,`class_id`,`name`) values (5,2,'Marksmanship');
insert  into `spec`(`id`,`class_id`,`name`) values (6,2,'Survival');
insert  into `spec`(`id`,`class_id`,`name`) values (7,3,'Arcane');
insert  into `spec`(`id`,`class_id`,`name`) values (8,3,'Fire');
insert  into `spec`(`id`,`class_id`,`name`) values (9,3,'Frost');
insert  into `spec`(`id`,`class_id`,`name`) values (10,4,'Holy');
insert  into `spec`(`id`,`class_id`,`name`) values (11,4,'Protection');
insert  into `spec`(`id`,`class_id`,`name`) values (12,4,'Retribution');
insert  into `spec`(`id`,`class_id`,`name`) values (13,5,'Discipline');
insert  into `spec`(`id`,`class_id`,`name`) values (14,5,'Holy');
insert  into `spec`(`id`,`class_id`,`name`) values (15,5,'Shadow');
insert  into `spec`(`id`,`class_id`,`name`) values (16,6,'Assassination');
insert  into `spec`(`id`,`class_id`,`name`) values (17,6,'Combat');
insert  into `spec`(`id`,`class_id`,`name`) values (18,6,'Subtlety');
insert  into `spec`(`id`,`class_id`,`name`) values (19,7,'Elemental');
insert  into `spec`(`id`,`class_id`,`name`) values (20,7,'Enhancement');
insert  into `spec`(`id`,`class_id`,`name`) values (21,7,'Restoration');
insert  into `spec`(`id`,`class_id`,`name`) values (22,8,'Affliction');
insert  into `spec`(`id`,`class_id`,`name`) values (23,8,'Demonology');
insert  into `spec`(`id`,`class_id`,`name`) values (24,8,'Destruction');
insert  into `spec`(`id`,`class_id`,`name`) values (25,9,'Arms');
insert  into `spec`(`id`,`class_id`,`name`) values (26,9,'Fury');
insert  into `spec`(`id`,`class_id`,`name`) values (27,9,'Protection');
insert  into `spec`(`id`,`class_id`,`name`) values (28,10,'Blood');
insert  into `spec`(`id`,`class_id`,`name`) values (29,10,'Frost');
insert  into `spec`(`id`,`class_id`,`name`) values (30,10,'Unholy');
insert  into `spec`(`id`,`class_id`,`name`) values (31,11,'Brewmaster');
insert  into `spec`(`id`,`class_id`,`name`) values (32,11,'Mistweaver');
insert  into `spec`(`id`,`class_id`,`name`) values (33,11,'Windwalker');

/*Table structure for table `user` */

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `portrait_URL` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `activation_key` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`surname`,`username`,`password`,`email`,`portrait_URL`,`creation_date`,`status`,`activation_key`) values (1,'admin','','admin','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,1,NULL);

/*Table structure for table `userattributes` */

CREATE TABLE `userattributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `guildrole_id` int(11) NOT NULL,
  `portrait` varchar(45) DEFAULT NULL,
  `second_email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `site_URL` varchar(45) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `locale` varchar(45) DEFAULT NULL,
  `timezone` varchar(45) DEFAULT NULL,
  `is_raidleader` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userattributes_user1` (`user_id`),
  KEY `fk_userattributes_guildrole1` (`guildrole_id`),
  CONSTRAINT `fk_userattributes_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userattributes_guildrole1` FOREIGN KEY (`guildrole_id`) REFERENCES `guildrole` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `userattributes` */

insert  into `userattributes`(`id`,`user_id`,`guildrole_id`,`portrait`,`second_email`,`phone_number`,`site_URL`,`last_login`,`locale`,`timezone`,`is_raidleader`) values (1,1,1,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','en_GB','Europe/Rome',NULL);