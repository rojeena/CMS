/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.5.34 : Database - db_kbic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kbic` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kbic`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('601eee82b1a0a0614fa742d9e7778205','::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0',1453700870,''),('c73d0e2eda941bd4c13622cc81050a84','192.168.88.136','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36',1453457355,'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:10:\"superadmin\";s:7:\"user_id\";s:1:\"7\";s:7:\"role_id\";s:1:\"1\";s:5:\"email\";s:21:\"rojeena@amniltech.com\";s:4:\"name\";s:16:\"Rojeena Shrestha\";}'),('ea2de7327bb3242cf6f94aa14875ef42','::1','Mozilla/5.0 (Windows NT 6.3; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0',1453288847,'a:6:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:10:\"superadmin\";s:7:\"user_id\";s:1:\"7\";s:7:\"role_id\";s:1:\"1\";s:5:\"email\";s:21:\"rojeena@amniltech.com\";s:4:\"name\";s:16:\"Rojeena Shrestha\";}');

/*Table structure for table `tbl_banner` */

DROP TABLE IF EXISTS `tbl_banner`;

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `orderNumber` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_banner` */

insert  into `tbl_banner`(`id`,`title`,`description`,`link`,`image`,`secondary_image`,`category_id`,`status`,`orderNumber`) values (4,'About 3','','','uploads/images/content/about-banner.jpg','',4,'Active',7),(5,'Rehabilitation','<p>The relief operations are going on and it will take some more time to provide complete relief and rehabilitation. 17 National volunteers engaged themselves at the relief work at Bhimdhunga-Ramkot and Chisapani-Icchangu areas on Wednesday. The volunteer','http://google.com','uploads/images/banner/main-image/banner-2(1).jpg','uploads/images/banner/secondary-image/logo-sadbhab.png',5,'Active',2),(6,'Reconstruction','<p>The relief operations are going on and it will take some more time to provide complete relief and rehabilitation. 17 National volunteers engaged themselves at the relief work at Bhimdhunga-Ramkot and Chisapani-Icchangu areas on Wednesday. The volunteer','','uploads/images/banner/main-image/banner-3(1).jpg','uploads/images/banner/secondary-image/logo-sadbhab.png',5,'Active',3),(7,'Relief','<p>The relief operations are going on and it will take some more time to provide complete relief and rehabilitation. 17 National volunteers engaged themselves at the relief work at Bhimdhunga-Ramkot and Chisapani-Icchangu areas on Wednesday. The volunteer','','uploads/images/banner/main-image/banner-4(1).jpg','uploads/images/banner/secondary-image/logo-sadbhab.png',5,'Active',1),(8,'Sustainability','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem.</p>\r\n','','uploads/images/banner/main-image/banner-4(1).jpg','uploads/images/project/logo-home-resilient.png',5,'Active',4);

/*Table structure for table `tbl_blog` */

DROP TABLE IF EXISTS `tbl_blog`;

CREATE TABLE `tbl_blog` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `slug` varbinary(255) NOT NULL,
  `category_id` int(15) NOT NULL,
  `status` enum('Active','InActive') NOT NULL DEFAULT 'InActive',
  `created_on` int(15) NOT NULL,
  `source` varchar(255) NOT NULL,
  `updated_on` int(15) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `created_by` int(15) DEFAULT NULL,
  `featured` enum('Yes','No') DEFAULT 'No',
  `orderNumber` int(11) DEFAULT '1',
  `gallery_id` int(15) DEFAULT NULL,
  `fileAttachment_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_blog` */

insert  into `tbl_blog`(`id`,`name`,`sub_title`,`short_description`,`long_description`,`cover_image`,`meta_description`,`meta_keyword`,`slug`,`category_id`,`status`,`created_on`,`source`,`updated_on`,`publish_date`,`created_by`,`featured`,`orderNumber`,`gallery_id`,`fileAttachment_id`) values (1,'test','','<p>asfasd</p>\r\n','<p>asdfad</p>\r\n','','','','test',2,'Active',1453264102,'',1453283177,'2015-12-29',7,'No',1,0,6);

/*Table structure for table `tbl_blog_article_comment` */

DROP TABLE IF EXISTS `tbl_blog_article_comment`;

CREATE TABLE `tbl_blog_article_comment` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `blog_id` int(15) DEFAULT NULL,
  `comment_msg` text,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_blog_article_comment` */

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `type` int(11) NOT NULL DEFAULT '1',
  `slug` varchar(100) NOT NULL,
  `created_on` int(15) DEFAULT NULL,
  `updated_on` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`id`,`name`,`status`,`type`,`slug`,`created_on`,`updated_on`) values (1,'Uncategorised','Active',1,'uncategorised',NULL,NULL),(2,'Blog by admin','Active',2,'blog-by-admin',NULL,NULL),(3,'Media','Active',1,'media',NULL,NULL),(4,'About Page','Active',4,'about-page',NULL,NULL),(5,'Awareness, Sensitization and Ideation','Active',5,'awareness-sensitization-and-ideation',NULL,NULL),(6,'Home Content','Active',1,'home-content',NULL,NULL),(8,'Blog by user','Active',2,'blog-by-user',NULL,NULL),(11,'Business incubation','Active',5,'business-incubation',NULL,NULL),(12,'Institutionalization, Spin-off and scale','Active',5,'institutionalization-spin-off-and-scale',NULL,NULL),(13,'Home Partner Content','Active',1,'home-partner-content',NULL,NULL),(16,'Signin Content','Active',1,'signin-content',NULL,NULL),(17,'Signup Content','Active',1,'signup-content',NULL,NULL),(20,'Whats Happining','Active',1,'whats-happining',NULL,NULL),(21,'test','Active',5,'test',NULL,NULL);

/*Table structure for table `tbl_category_type` */

DROP TABLE IF EXISTS `tbl_category_type`;

CREATE TABLE `tbl_category_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category_type` */

insert  into `tbl_category_type`(`id`,`name`) values (0,''),(1,'Other'),(2,'Blog'),(3,'Events'),(5,'Our Work Process');

/*Table structure for table `tbl_configuration` */

DROP TABLE IF EXISTS `tbl_configuration`;

CREATE TABLE `tbl_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `meta_keyword` varchar(160) NOT NULL,
  `meta_description` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `gplus` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `infobox` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_configuration` */

insert  into `tbl_configuration`(`id`,`site_title`,`site_email`,`site_logo`,`address`,`phone`,`meta_keyword`,`meta_description`,`facebook`,`twitter`,`gplus`,`skype`,`youtube`,`latitude`,`longitude`,`infobox`) values (1,'KBIC','rojeena@amniltech.com','','<p>KBIC</p>\r\n','+977 1 4428976 / 4442568','KBIC','KBIC','http://facebook.com','http://twitter.com','','','http://youtube.com','84.6898','27.6722','<p>KBIC</p>\r\n');

/*Table structure for table `tbl_content` */

DROP TABLE IF EXISTS `tbl_content`;

CREATE TABLE `tbl_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `created_on` int(15) NOT NULL,
  `source` varchar(255) NOT NULL,
  `updated_on` int(15) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `featured` enum('Yes','No') DEFAULT 'No',
  `orderNumber` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_content` */

insert  into `tbl_content`(`id`,`name`,`sub_title`,`short_description`,`long_description`,`cover_image`,`image`,`meta_description`,`meta_keyword`,`slug`,`category_id`,`parent_id`,`status`,`created_on`,`source`,`updated_on`,`publish_date`,`created_by`,`featured`,`orderNumber`) values (1,'Post-quake rehabilitation at Ramkot and Icchangu','','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla el','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla elit. Vivamus eros lacus, ullamcorper ac venenatis at, tincidunt eu dolor. Praesent sit amet pretium odio, a eleifend dolor. Maecenas egestas augue mi, non varius ex posuere non. Praesent quam eros, blandit nec semper at, blandit sed tortor. Fusce vel aliquam tellus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla elit. Vivamus eros lacus, ullamcorper ac venenatis at, tincidunt eu dolor. Praesent sit amet pretium odio, a eleifend dolor. Maecenas egestas augue mi, non varius ex posuere non. Praesent quam eros, blandit nec semper at, blandit sed tortor. Fusce vel aliquam tellus.</p>\r\n','uploads/images/news/wats-happening-1.jpg','uploads/images/news/impact-bg.jpg','Post-quake rehabilitation at Ramkot and Icchangu','Post-quake rehabilitation at Ramkot and Icchangu','post-quake-rehabilitation-at-ramkot-and-icchangu',2,0,'InActive',1449045804,'',1453197311,'2015-12-09',7,'Yes',1),(7,'What\'s Happening','','','<p><span class=\"content-sub-head\">Get to know what we are currently involved in with.</span></p>\r\n',NULL,'','','','whats-happening',6,0,'Active',1449490444,'',1450351860,'0000-00-00',7,'No',7),(8,'Create An Impact','','','<p>NVP inspires Nepali citizens to volunteer for the country, enrolls them, provides them orientation, and deploys them in relief, rehabilitation and reconstruction efforts. NVP expedites the volunteers to develop projects in this regard, and use innovative means to raise resources to implement such projects.</p>\r\n',NULL,'','','','create-an-impact',6,0,'Active',1449490528,'',1450351374,'0000-00-00',7,'No',8),(12,'News & Event','','','<p>Get to know what we are currently involved in with.</p>\r\n',NULL,'','','','news-event',6,0,'Active',1450094466,'',1450351374,'0000-00-00',7,'No',9),(13,'EVERYBODY IS TALKING ABOUT NVP','','','<p>Here is what some of our members and organizations have to say about us.</p>\r\n',NULL,'','','','everybody-is-talking-about-nvp',6,0,'Active',1450094497,'',1450351838,'0000-00-00',7,'No',10),(14,'OUR PARTNERS','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n',NULL,'','','','our-partners-1',6,0,'Active',1450094706,'',1450351374,'0000-00-00',7,'No',11),(15,'Sign In','','','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n',NULL,'','','','sign-in',16,0,'InActive',1450778748,'',1453197311,'0000-00-00',7,'No',1),(16,'Sign Up','','','<p><span class=\"content-sub-head flat-text\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</span></p>\r\n',NULL,'','','','sign-up',17,0,'InActive',1450940501,'',1453197311,'0000-00-00',7,'No',1),(17,'Contact','','<p><span class=\"footer-title\">CONTACT</span> <span>NVP Secretariat</span></p>\r\n\r\n<p><span>GPO Box: 12123, House No. 692</span></p>\r\n\r\n<p><span>Subarna Marg, Baluwatar, </span></p>\r\n\r\n<p><span>Kathmandu, Nepal</span></p>\r\n\r\n<p><span class=\"contact-no\">+977','<p><span class=\"footer-title\">CONTACT</span> <span>NVP Secretariat</span></p>\r\n\r\n<p><span>GPO Box: 12123, House No. 692</span></p>\r\n\r\n<p><span>Subarna Marg, Baluwatar, </span></p>\r\n\r\n<p><span>Kathmandu, Nepal</span></p>\r\n\r\n<p><span class=\"contact-no\">+977 1 4428976 / 4442568</span></p>\r\n','','','','','contact',1,0,'InActive',1451282970,'',1453197311,'0000-00-00',7,'No',1),(18,'Rubble Clearing','testing','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla el','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla elit. Vivamus eros lacus, ullamcorper ac venenatis at, tincidunt eu dolor. Praesent sit amet pretium odio, a eleifend dolor. Maecenas egestas augue mi, non varius ex posuere non. Praesent quam eros, blandit nec semper at, blandit sed tortor. Fusce vel aliquam tellus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla elit. Vivamus eros lacus, ullamcorper ac venenatis at, tincidunt eu dolor. Praesent sit amet pretium odio, a eleifend dolor. Maecenas egestas augue mi, non varius ex posuere non. Praesent quam eros, blandit nec semper at, blandit sed tortor. Fusce vel aliquam tellus.</p>\r\n','uploads/images/gallery/_DSC4322.jpg','uploads/images/news/news-events-1.jpg','this is testing ','this is testing ','rubble-clearing',2,0,'InActive',1451391019,'',1453197311,'2015-12-31',7,'No',1),(19,'Happy Moments','test','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla el','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla elit. Vivamus eros lacus, ullamcorper ac venenatis at, tincidunt eu dolor. Praesent sit amet pretium odio, a eleifend dolor. Maecenas egestas augue mi, non varius ex posuere non. Praesent quam eros, blandit nec semper at, blandit sed tortor. Fusce vel aliquam tellus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra egestas odio, sit amet sodales nisl pulvinar vitae. Nam placerat, justo non placerat condimentum, nulla orci pretium mauris, vel mollis justo nunc vel elit. Phasellus vel fringilla elit. Vivamus eros lacus, ullamcorper ac venenatis at, tincidunt eu dolor. Praesent sit amet pretium odio, a eleifend dolor. Maecenas egestas augue mi, non varius ex posuere non. Praesent quam eros, blandit nec semper at, blandit sed tortor. Fusce vel aliquam tellus.</p>\r\n','uploads/images/gallery/_DSC4314.jpg','uploads/images/news/news-events-3.jpg','this is testing ','this is testing ','happy-moments',2,0,'InActive',1451391048,'',1453197311,'2015-12-01',7,'No',1),(20,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(21,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(22,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(23,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(24,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(25,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(26,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(27,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(28,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(29,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(30,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(31,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(32,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(33,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(34,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(35,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(36,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(37,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(38,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(39,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(40,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(41,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(42,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(43,'',NULL,'','',NULL,'','','','',0,0,'',0,'',0,NULL,NULL,'',0),(44,'Messages','','','<div class=\"center\">\r\n<div class=\"row\">\r\n<div class=\"col s12 m12 l12\">\r\n<div class=\"projects card-panel\">\r\n<h3 class=\"content-title\">Prof. Dr. Govind Raj Pokhrel</h3>\r\n\r\n<div class=\"row valign-wrapper\">\r\n<div class=\"col s12 m3 l3\"><img alt=\"\" class=\"responsive-img\" src=\"/nvp/uploads/images/content/govind.jpg\" /></div>\r\n\r\n<div class=\"col s12 m9 l9\">\r\n<div class=\"flat-text\">\r\n<p>The disastrous earthquake and its aftershocks took away thousands of innocent lives, and damaged hundreds of thousands of private homes and public buildings. The loss is simply colossus. This tragedy will haunt us all our lives. The death and destruction make us think how vulnerable we remain as a society even in this age and times. It makes us ponder how long we still have to go while building a truly resilient society.</p>\r\n\r\n<p>This natural calamity was neither the first nor the last to hit our country. While it is important that we recommit ourselves to relief, rehabilitation and reconstruction in the wake of this crisis, it is also important that we prepare ourselves for dealing with such calamities in future. With these current and future needs in mind, I am delighted to launch National Volunteering Program (NVP) in partnership with Himalayan Climate Initiative- one of the most trusted civil society organizations driven by some of most committed Nepali citizens.</p>\r\n\r\n<p>Let&#39;s build back. Let&#39;s build better. Let&#39;s build safer.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"center\">\r\n<div class=\"row\">\r\n<div class=\"col s12 m12 l12\">\r\n<div class=\"projects card-panel\">\r\n<h3 class=\"content-title\">Prof. Dr. Govind Raj Pokhrel</h3>\r\n\r\n<div class=\"row valign-wrapper\">\r\n<div class=\"col s12 m3 l3\"><img alt=\"\" class=\"responsive-img\" src=\"/nvp/uploads/images/content/govind.jpg\" /></div>\r\n\r\n<div class=\"col s12 m9 l9\">\r\n<div class=\"flat-text\">\r\n<p>The disastrous earthquake and its aftershocks took away thousands of innocent lives, and damaged hundreds of thousands of private homes and public buildings. The loss is simply colossus. This tragedy will haunt us all our lives. The death and destruction make us think how vulnerable we remain as a society even in this age and times. It makes us ponder how long we still have to go while building a truly resilient society.</p>\r\n\r\n<p>This natural calamity was neither the first nor the last to hit our country. While it is important that we recommit ourselves to relief, rehabilitation and reconstruction in the wake of this crisis, it is also important that we prepare ourselves for dealing with such calamities in future. With these current and future needs in mind, I am delighted to launch National Volunteering Program (NVP) in partnership with Himalayan Climate Initiative- one of the most trusted civil society organizations driven by some of most committed Nepali citizens.</p>\r\n\r\n<p>Let&#39;s build back. Let&#39;s build better. Let&#39;s build safer.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n','','','','','messages',1,0,'InActive',1452484665,'',1453197311,'0000-01-11',7,'No',1),(48,'National Volunteering Program launch 14 Districts Reconstruction','','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem. Pellentesque suscipit tellus ac ligula laoreet, ut consectetur purus efficitur. Sed nec rutrum erat, sed auct','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem. Pellentesque suscipit tellus ac ligula laoreet, ut consectetur purus efficitur. Sed nec rutrum erat, sed auctor odio. Duis et purus sed diam mollis luctus sed eget nibh. Phasellus consequat aliquet bibendum. Aenean ac libero porta, maximus massa sit amet, lobortis ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In tempus, nibh vitae condimentum consequat, neque lorem luctus nibh, quis dignissim elit tortor et ante.</p>\r\n','uploads/images/whatshappining/wats-happening-4.jpg','','','','national-volunteering-program-launch-14-districts-reconstruction-1',20,0,'Active',1452767609,'',1452767861,'2016-01-14',7,'No',1),(49,'Post-quake rehabilitation at Ramkot and Icchangu','','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem. Pellentesque suscipit tellus ac ligula laoreet, ut consectetur purus efficitur. Sed nec rutrum erat, sed auct','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem. Pellentesque suscipit tellus ac ligula laoreet, ut consectetur purus efficitur. Sed nec rutrum erat, sed auctor odio. Duis et purus sed diam mollis luctus sed eget nibh. Phasellus consequat aliquet bibendum. Aenean ac libero porta, maximus massa sit amet, lobortis ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In tempus, nibh vitae condimentum consequat, neque lorem luctus nibh, quis dignissim elit tortor et ante.</p>\r\n','uploads/images/whatshappining/wats-happening-5.jpg','','','','post-quake-rehabilitation-at-ramkot-and-icchangu-5',20,0,'Active',1452767644,'',1452767879,'2016-01-14',7,'No',1),(50,'Childrenâ€™s right to education.','','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem. Pellentesque suscipit tellus ac ligula laoreet, ut consectetur purus efficitur. Sed nec rutrum erat, sed auct','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus iaculis ipsum, eu facilisis felis pharetra sed. Aliquam eu lacus sem. Pellentesque suscipit tellus ac ligula laoreet, ut consectetur purus efficitur. Sed nec rutrum erat, sed auctor odio. Duis et purus sed diam mollis luctus sed eget nibh. Phasellus consequat aliquet bibendum. Aenean ac libero porta, maximus massa sit amet, lobortis ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In tempus, nibh vitae condimentum consequat, neque lorem luctus nibh, quis dignissim elit tortor et ante.</p>\r\n','uploads/images/whatshappining/wats-happening-6.jpg','','','','childrens-right-to-education-1',20,0,'Active',1452767685,'',1452767891,'2016-01-14',7,'No',1);

/*Table structure for table `tbl_download` */

DROP TABLE IF EXISTS `tbl_download`;

CREATE TABLE `tbl_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `publishDate` varchar(50) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL,
  `orderNumber` int(11) DEFAULT '1',
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User Download` (`updated_by`),
  KEY `Category Download` (`categoryId`),
  CONSTRAINT `Category Download` FOREIGN KEY (`categoryId`) REFERENCES `tbl_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `User Download` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_download` */

insert  into `tbl_download`(`id`,`name`,`publishDate`,`updated_by`,`updated_on`,`status`,`orderNumber`,`categoryId`) values (5,'test 1','01/29/2016',7,1453270858,'Active',1,NULL),(6,'File Attachment 2','01/30/2016',7,1453283114,'Active',1,NULL);

/*Table structure for table `tbl_download_media` */

DROP TABLE IF EXISTS `tbl_download_media`;

CREATE TABLE `tbl_download_media` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `download_id` int(15) NOT NULL,
  `file` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_download_media` */

insert  into `tbl_download_media`(`id`,`download_id`,`file`,`description`) values (4,5,'uploads/images/Internship Presentation.pptx','description 4'),(5,5,'uploads/images/Internship Presentation copy 1.pptx','description 5'),(6,5,'uploads/images/Internship Presentation copy 2.pptx','description 6'),(7,5,'uploads/images/Internship Presentation copy 3.pptx','description 7'),(8,5,'uploads/images/Internship Presentation.pptx','description 1'),(9,5,'uploads/images/Internship Presentation copy 2.pptx','description 2'),(10,5,'uploads/images/Internship Presentation copy 3.pptx','description 3'),(11,6,'uploads/images/Internship Presentation.pptx','sdfa'),(12,6,'uploads/images/Internship Presentation copy 1.pptx','asd'),(13,6,'uploads/images/Internship Presentation copy 2.pptx','asd');

/*Table structure for table `tbl_email_category` */

DROP TABLE IF EXISTS `tbl_email_category`;

CREATE TABLE `tbl_email_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_email_category` */

insert  into `tbl_email_category`(`id`,`name`) values (1,'Contact Us');

/*Table structure for table `tbl_email_template` */

DROP TABLE IF EXISTS `tbl_email_template`;

CREATE TABLE `tbl_email_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emailCategoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `adminEmail` varchar(255) DEFAULT NULL,
  `adminSubject` varchar(255) DEFAULT NULL,
  `adminMessage` text,
  `userEmail` varchar(255) DEFAULT NULL,
  `userSubject` varchar(255) DEFAULT NULL,
  `userMessage` text,
  `status` enum('Active','InActive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_email_template` */

insert  into `tbl_email_template`(`id`,`emailCategoryId`,`name`,`adminEmail`,`adminSubject`,`adminMessage`,`userEmail`,`userSubject`,`userMessage`,`status`) values (1,1,'Test','ads@amniltech.com','adfa','<p>asdsasdasd</p>\r\n',NULL,'asd','<p>asdasd</p>\r\n','Active');

/*Table structure for table `tbl_event` */

DROP TABLE IF EXISTS `tbl_event`;

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `short_description` text,
  `long_description` text,
  `cover_image` varchar(255) DEFAULT NULL,
  `gallery_id` int(15) DEFAULT NULL,
  `category_id` int(15) DEFAULT NULL,
  `created_on` int(15) DEFAULT NULL,
  `created_by` int(15) DEFAULT NULL,
  `updated_on` int(15) DEFAULT NULL,
  `updated_by` int(15) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `slug` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `orderNumber` int(25) DEFAULT NULL,
  `color` varchar(52) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_event` */

insert  into `tbl_event`(`id`,`name`,`sub_title`,`short_description`,`long_description`,`cover_image`,`gallery_id`,`category_id`,`created_on`,`created_by`,`updated_on`,`updated_by`,`status`,`slug`,`start_date`,`end_date`,`orderNumber`,`color`) values (5,'Event 1','terst','<p>asdasdasd</p>\r\n','<p>arasdfasdasd</p>\r\n','uploads/images/_DSC4820 copy 1.jpg',0,0,1453272461,7,1453284553,NULL,'Active','event-1','2016-01-13','2016-01-15',NULL,'#00ff40'),(6,'event 2','asd','<p>asfdasdasd</p>\r\n','<p>zsadafasdfa</p>\r\n','uploads/images/_DSC4820 copy 1.jpg',0,0,1453281384,7,1453284535,NULL,'Active','event-2','2016-01-12','2016-01-25',NULL,'#ff8000'),(7,'EVENT 3','fsads','asdas','sdad','uploads/images/_DSC4820.jpg',0,0,1453281661,7,1453284587,NULL,'Active','event-3','2016-01-25','2016-01-27',NULL,'#ff00ff');

/*Table structure for table `tbl_faq` */

DROP TABLE IF EXISTS `tbl_faq`;

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `answer` text,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `position` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` int(15) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_faq` */

insert  into `tbl_faq`(`id`,`question`,`slug`,`answer`,`status`,`position`,`created_by`,`created_on`,`updated_by`,`updated_on`) values (2,'What we do ?','what-we-do','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consectetur arcu id faucibus interdum. Nunc commodo nec est eget consectetur. Curabitur malesuada efficitur laoreet. Sed mattis enim non leo egestas, vel fermentum leo porta. In hac habitasse platea dictumst. Nullam posuere elit interdum bibendum mattis. Phasellus sodales, nibh non consectetur cursus, dolor ipsum porttitor est, vel consectetur nisi diam posuere quam. Donec tristique rutrum cursus. Sed sit amet purus in nulla sagittis feugiat nec vel mauris. Nullam euismod blandit velit, vitae porta elit malesuada non. Ut faucibus rhoncus malesuada. Phasellus felis orci, cursus vel dui sit amet, laoreet posuere ante. Morbi enim sapien, cursus in mauris in, pharetra condimentum erat. Cras ex risus, vestibulum non congue quis, dapibus in magna.</p>\r\n\r\n<p>Mauris sagittis mi a gravida tempor. Proin urna massa, posuere et elit at, ultricies ultricies lorem. Morbi quis nunc sed libero malesuada tempor. Quisque ante sapien, varius vel posuere quis, ullamcorper et lacus. Fusce venenatis accumsan est, tempus aliquet lorem porta ut. Cras venenatis, arcu sed aliquet suscipit, ante urna convallis sem, in rutrum risus dui eu arcu. Praesent felis sapien, blandit ut semper sit amet, pretium quis nulla. Sed consequat leo a tellus aliquet, in feugiat quam ullamcorper. Morbi nec facilisis nisi. In feugiat fermentum aliquet. Sed id lectus gravida, faucibus lacus vitae, varius elit. Nullam egestas ultrices libero, eu iaculis orci commodo molestie. Integer faucibus pretium scelerisque. Nullam luctus sollicitudin lectus, eu aliquet eros facilisis vitae. Nulla facilisi.</p>\r\n','Active',1,1,0,7,1453193338);

/*Table structure for table `tbl_form` */

DROP TABLE IF EXISTS `tbl_form`;

CREATE TABLE `tbl_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `form_related` varchar(255) NOT NULL,
  `form_relation_link` varchar(255) NOT NULL,
  `form_description` text NOT NULL,
  `form_unique_name` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Format = form_name-id',
  `form_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `form_class` varchar(255) CHARACTER SET latin1 NOT NULL,
  `form_attribute` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `category_id` int(11) NOT NULL,
  `submit_action` enum('email','database','both') CHARACTER SET latin1 NOT NULL DEFAULT 'database',
  `success_msg` tinytext CHARACTER SET latin1 NOT NULL,
  `admin_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_email_subject` varchar(255) DEFAULT NULL,
  `admin_email_msg` text CHARACTER SET latin1 NOT NULL,
  `email_to_user` tinyint(1) NOT NULL,
  `user_email_subject` varchar(255) DEFAULT NULL,
  `user_email_msg` text CHARACTER SET latin1 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` int(15) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form` */

insert  into `tbl_form`(`id`,`form_name`,`form_related`,`form_relation_link`,`form_description`,`form_unique_name`,`form_title`,`form_class`,`form_attribute`,`status`,`category_id`,`submit_action`,`success_msg`,`admin_email`,`admin_email_subject`,`admin_email_msg`,`email_to_user`,`user_email_subject`,`user_email_msg`,`created_by`,`created_on`,`updated_by`,`updated_on`) values (1,'inquiry_form','0','','<p>Inquiry Form</p>\r\n','','Inquiry Form','','','Active',0,'both','<p>Inquiry has been successfully submitted.</p>\r\n','rojeena@amniltech.com','Inquiry','<p>Greetings,</p>\r\n\r\n<p>A new inquiry has been submitted.</p>\r\n\r\n<p>Following are the details:</p>\r\n\r\n<ul>\r\n	<li><strong>Full Name : </strong>{full_name}</li>\r\n	<li><strong>Email : </strong>{email}</li>\r\n	<li><strong>Contact :</strong>{mobile}</li>\r\n	<li><strong>Subject :</strong>{subject}</li>\r\n	<li><strong>Message :</strong>{message}</li>\r\n</ul>\r\n\r\n<p>Regards</p>\r\n',0,'Inquiry Submitted','<p>Greetings, {full_name},</p>\r\n\r\n<p>Your inquiry has been successfully submitted. We will be contacting you soon.</p>\r\n\r\n<p>Regards,</p>\r\n',1,1451663485,7,1453261414);

/*Table structure for table `tbl_form_column_names` */

DROP TABLE IF EXISTS `tbl_form_column_names`;

CREATE TABLE `tbl_form_column_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `google_form_id` int(11) NOT NULL,
  `column_name` varchar(255) NOT NULL,
  `column_name_key` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_column_names` */

insert  into `tbl_form_column_names`(`id`,`type`,`type_id`,`google_form_id`,`column_name`,`column_name_key`) values (1,'event',1,3,'Timestamp',0),(2,'event',1,3,'Full Name',1),(3,'event',1,3,'Description',2),(4,'event',2,2,'Timestamp',0),(5,'event',2,2,'full name',1),(6,'event',2,2,'email address',2),(7,'event',2,2,'mobile nos',3),(8,'race',1,5,'Timestamp',0),(9,'race',1,5,'full name',1),(10,'race',1,5,'email',2),(11,'race',1,5,'gender',3),(12,'race',1,5,'age',4),(13,'race',1,6,'Timestamp',0),(14,'race',1,6,'full name',1),(15,'race',1,6,'email',2),(16,'race',1,6,'gender',3),(17,'race',1,6,'age',4);

/*Table structure for table `tbl_form_data` */

DROP TABLE IF EXISTS `tbl_form_data`;

CREATE TABLE `tbl_form_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_column_name_id` int(11) NOT NULL,
  `form_data_submission_id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_data` */

insert  into `tbl_form_data`(`id`,`form_column_name_id`,`form_data_submission_id`,`data`) values (1,1,1,'1/14/2016 16:52:59'),(2,2,1,'samjhana joshi'),(3,3,1,'desription'),(4,1,2,'1/14/2016 16:53:36'),(5,2,2,'satish shanker dongol'),(6,3,2,'satish description'),(7,4,3,'1/14/2016 14:49:16'),(8,5,3,'samjhana joshi'),(9,6,3,'samjhana@amniltech.com'),(10,7,3,'9856321478'),(11,4,4,'1/14/2016 14:50:11'),(12,5,4,'rojeena shrestha'),(13,6,4,'rojeena@amniltech.com'),(14,7,4,'98563214789'),(15,4,5,'1/14/2016 14:51:22'),(16,5,5,'satish shanker dongol'),(17,6,5,'satish@amniltech.com'),(18,7,5,'9856321488'),(19,4,6,'1/14/2016 14:51:41'),(20,5,6,'yajan duwal shrestha'),(21,6,6,'yajan@amniltech.com'),(22,7,6,'9856321478'),(23,8,7,'1/14/2016 17:01:55'),(24,9,7,'kishor subedi'),(25,10,7,'kishor@amniltech.com'),(26,11,7,'Male'),(27,12,7,'30'),(28,8,8,'1/14/2016 17:02:19'),(29,9,8,'deepesh sinnya'),(30,10,8,'deepesh@amniltech.com'),(31,11,8,'Male'),(32,12,8,'29'),(33,13,9,'1/14/2016 17:01:55'),(34,14,9,'kishor subedi'),(35,15,9,'kishor@amniltech.com'),(36,16,9,'Male'),(37,17,9,'30'),(38,13,10,'1/14/2016 17:02:19'),(39,14,10,'deepesh sinnya'),(40,15,10,'deepesh@amniltech.com'),(41,16,10,'Male'),(42,17,10,'29'),(43,13,11,'1/14/2016 17:11:55'),(44,14,11,'nischaal shrestha'),(45,15,11,'nischal@amniltech.com'),(46,16,11,'Male'),(47,17,11,'No Data'),(48,13,12,'1/14/2016 17:12:18'),(49,14,12,'yajan duwal shrestha'),(50,15,12,'yajan@amniltech.com'),(51,16,12,'Male'),(52,17,12,'No Data');

/*Table structure for table `tbl_form_data_submissions` */

DROP TABLE IF EXISTS `tbl_form_data_submissions`;

CREATE TABLE `tbl_form_data_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `google_form_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_data_submissions` */

insert  into `tbl_form_data_submissions`(`id`,`type`,`type_id`,`google_form_id`) values (1,'event',1,3),(2,'event',1,3),(3,'event',2,2),(4,'event',2,2),(5,'event',2,2),(6,'event',2,2),(7,'race',1,5),(8,'race',1,5),(9,'race',1,6),(10,'race',1,6),(11,'race',1,6),(12,'race',1,6);

/*Table structure for table `tbl_form_field` */

DROP TABLE IF EXISTS `tbl_form_field`;

CREATE TABLE `tbl_form_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_label` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_placeholder` varchar(255) NOT NULL,
  `default_value` varchar(255) NOT NULL,
  `field_attribute` varchar(255) DEFAULT NULL,
  `field_class` varchar(100) DEFAULT NULL,
  `position` int(5) NOT NULL,
  `show_in_grid` enum('0','1') NOT NULL,
  `front_display` enum('0','1') NOT NULL,
  `validation_rule` varchar(255) NOT NULL COMMENT 'separated by |',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_field` */

insert  into `tbl_form_field`(`id`,`form_id`,`field_type`,`field_label`,`field_name`,`field_placeholder`,`default_value`,`field_attribute`,`field_class`,`position`,`show_in_grid`,`front_display`,`validation_rule`) values (1,1,'input','Full Name','full_name','Full Name *','',NULL,NULL,1,'1','1','required|alpha'),(2,1,'input','Email Address','email_address','Email Address *','',NULL,NULL,2,'1','1','required|email'),(3,1,'input','Mobile Number','mobile_number','Mobile Number *','',NULL,NULL,3,'1','1','required'),(4,1,'input','Subject','subject','Subject *','',NULL,NULL,4,'1','1','required'),(5,1,'textarea','Message','message','Message *','',NULL,NULL,5,'0','1','required');

/*Table structure for table `tbl_form_field_types` */

DROP TABLE IF EXISTS `tbl_form_field_types`;

CREATE TABLE `tbl_form_field_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `display_text` varchar(100) CHARACTER SET latin1 NOT NULL,
  `multiple_values` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_field_types` */

insert  into `tbl_form_field_types`(`id`,`field_type`,`display_text`,`multiple_values`) values (1,'input','Text box',0),(2,'password','Password',0),(3,'radio','Radio Button',1),(4,'select','Dropdown Menu',1),(5,'upload','Upload Files',0),(6,'textarea','Textarea',0),(7,'checkbox','Checkbox',1),(8,'multiple_upload','Multiple Uploads',0);

/*Table structure for table `tbl_form_field_values` */

DROP TABLE IF EXISTS `tbl_form_field_values`;

CREATE TABLE `tbl_form_field_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_field_id` int(11) NOT NULL,
  `display_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_field_values` */

/*Table structure for table `tbl_form_submission_fields` */

DROP TABLE IF EXISTS `tbl_form_submission_fields`;

CREATE TABLE `tbl_form_submission_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_submission_id` int(11) NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_field_value` text NOT NULL,
  `form_display_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_submission_fields` */

insert  into `tbl_form_submission_fields`(`id`,`form_submission_id`,`form_field_id`,`form_field_value`,`form_display_text`) values (11,3,1,'samjhana joshi',''),(12,3,2,'samjhanajsh@gmail.com',''),(13,3,3,'9856321478',''),(14,3,4,'test subject',''),(15,3,5,'This is just the test message for mail sending testing.',''),(16,4,1,'satish shanker dongol',''),(17,4,2,'samjhanajsh@gmail.com',''),(18,4,3,'9856321478',''),(19,4,4,'test subject satish',''),(20,4,5,'test test test test test test test test test test test ',''),(21,5,1,'rojeena shrestha',''),(22,5,2,'samjhanajsh@gmail.com',''),(23,5,3,'9856321478',''),(24,5,4,'subject subject',''),(25,5,5,'message message message',''),(26,6,1,'test ',''),(27,6,2,'test@gmail.com',''),(28,6,3,'1234567890',''),(29,6,4,'test',''),(30,6,5,'tewst','');

/*Table structure for table `tbl_form_submissions` */

DROP TABLE IF EXISTS `tbl_form_submissions`;

CREATE TABLE `tbl_form_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_submissions` */

insert  into `tbl_form_submissions`(`id`,`form_id`,`order`) values (3,1,NULL),(4,1,NULL),(5,1,NULL),(6,1,NULL);

/*Table structure for table `tbl_form_validation_rules` */

DROP TABLE IF EXISTS `tbl_form_validation_rules`;

CREATE TABLE `tbl_form_validation_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `validation_rule` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` tinytext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_form_validation_rules` */

insert  into `tbl_form_validation_rules`(`id`,`validation_rule`,`description`) values (1,'required','Required'),(2,'alpha','Alphabetical characters.'),(3,'alpha_numeric','Alpha-numeric characters'),(4,'number','Numeric characters'),(5,'email','Valid email address'),(6,'integer','Only Integer'),(7,'date','Date'),(8,'minSize','Minimum length value'),(9,'maxSize','Maximum length of value');

/*Table structure for table `tbl_gallery` */

DROP TABLE IF EXISTS `tbl_gallery`;

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `type` enum('Image','Video') NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `status` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `contentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gallery` */

/*Table structure for table `tbl_gallery_media` */

DROP TABLE IF EXISTS `tbl_gallery_media`;

CREATE TABLE `tbl_gallery_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `type` enum('Video','Image') DEFAULT 'Image',
  `title` varchar(255) DEFAULT NULL,
  `caption` text,
  PRIMARY KEY (`id`),
  KEY `Gallery media` (`gallery_id`),
  CONSTRAINT `Gallery media` FOREIGN KEY (`gallery_id`) REFERENCES `tbl_gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gallery_media` */

/*Table structure for table `tbl_impact` */

DROP TABLE IF EXISTS `tbl_impact`;

CREATE TABLE `tbl_impact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `statistic` varchar(100) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_impact` */

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_link_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','InActive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `front_display` enum('1','0') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `orderNumber` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id`,`menu_title`,`menu_alias`,`menu_type`,`menu_link_type`,`menu_parent`,`link`,`link_target`,`status`,`front_display`,`description`,`created_at`,`created_by`,`updated_at`,`updated_by`,`orderNumber`) values (2,'Projects','projects','mainmenu','none',0,'',NULL,'InActive',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ',NULL,NULL,NULL,NULL,6),(3,'Partners','partners','mainmenu','none',0,'',NULL,'InActive',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud ',NULL,NULL,NULL,NULL,8),(4,'Media','media','mainmenu','module',0,'4',NULL,'InActive',NULL,'',NULL,NULL,NULL,NULL,10),(5,'News','news','mainmenu','none',0,'',NULL,'InActive',NULL,'',NULL,NULL,NULL,NULL,16),(6,'Download','download','mainmenu','module',0,'40',NULL,'InActive',NULL,'This is the description about the downloads page in this website.',NULL,NULL,NULL,NULL,15),(8,'Photo Gallery','photo-gallery','mainmenu','module',4,'4',NULL,'InActive',NULL,'this is photo gallery description',NULL,NULL,NULL,NULL,14),(9,'Video Gallery','video-gallery','mainmenu','module',4,'4',NULL,'InActive',NULL,'',NULL,NULL,NULL,NULL,11),(11,'Home','home','bottommenu','none',10,'',NULL,'Active',NULL,'',NULL,NULL,NULL,NULL,5),(12,'About','about','bottommenu','none',10,'',NULL,'Active',NULL,'',NULL,NULL,NULL,NULL,7),(13,'News','news','bottommenu','none',10,'',NULL,'Active',NULL,'',NULL,NULL,NULL,NULL,9),(15,'Download','download','bottommenu','none',10,'',NULL,'Active',NULL,'',NULL,NULL,NULL,NULL,12),(24,'Our Team','our-team','mainmenu','module',1,'58',NULL,'Active',NULL,'Ligula nibh parturient vestibulum primis suscipit nostra volutpat scelerisque dignissim a in phasellus maecenas nisi a a mus a adipiscing nec ad neque consectetur. Eget suscipit laoreet iaculis adipiscing ipsum pretium consectetur a ligula id nunc lobortis mauris ut est velit parturient elit. Tempor nisl gravida purus diam condimentum per a adipiscing nec suspendisse consequat ac a a ante maecenas elit dapibus.',NULL,NULL,NULL,NULL,1),(25,'About Nvp','about','mainmenu','content',1,'5',NULL,'Active',NULL,'',NULL,NULL,NULL,NULL,2),(26,'Message','message','mainmenu','content',1,'44',NULL,'Active',NULL,'',NULL,NULL,NULL,NULL,3);

/*Table structure for table `tbl_menu_link_types` */

DROP TABLE IF EXISTS `tbl_menu_link_types`;

CREATE TABLE `tbl_menu_link_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linktype` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `linktable` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_link_types` */

insert  into `tbl_menu_link_types`(`id`,`linktype`,`title`,`description`,`linktable`) values (1,'none','None','No Links.','none'),(2,'content','Content','Links to the content od the site.','contents'),(3,'url','Url','Links to internal or external links.','url'),(4,'module','Module','',NULL);

/*Table structure for table `tbl_menu_types` */

DROP TABLE IF EXISTS `tbl_menu_types`;

CREATE TABLE `tbl_menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_types` */

insert  into `tbl_menu_types`(`id`,`menutype`,`title`,`description`) values (1,'mainmenu','Main Menu ','The Main Menu'),(2,'bottommenu','Bottom Menu','The Bottom Menu');

/*Table structure for table `tbl_module` */

DROP TABLE IF EXISTS `tbl_module`;

CREATE TABLE `tbl_module` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `icon_class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `social` enum('On','Off') COLLATE utf8_unicode_ci DEFAULT 'Off',
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `orderNumber` int(11) DEFAULT '1',
  `public_module` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'Yes',
  `global_module` tinyint(1) DEFAULT '1',
  `show_in_navigation` enum('1') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User Module` (`updated_by`),
  CONSTRAINT `User Module` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_module` */

insert  into `tbl_module`(`id`,`name`,`slug`,`priority`,`parent_id`,`icon_class`,`social`,`updated_by`,`updated_time`,`orderNumber`,`public_module`,`global_module`,`show_in_navigation`) values (1,'CMS','#',0,0,'fa fa-files-o','Off',NULL,NULL,7,'Yes',1,'1'),(2,'Contents','content',0,1,'','On',NULL,NULL,23,'Yes',1,'1'),(3,'Banners','banner',0,1,'','Off',NULL,NULL,24,'Yes',1,'1'),(4,'Gallery','gallery',0,1,'','On',NULL,NULL,25,'Yes',1,'1'),(5,'Categories','category',0,1,'','Off',NULL,NULL,26,'Yes',1,'1'),(6,'Media','media',0,1,'','Off',NULL,NULL,27,'Yes',1,'1'),(7,'Settings','#',0,0,'fa fa-cogs','Off',NULL,NULL,6,'No',1,'1'),(8,'Site Configuration','configuration',0,7,'','Off',NULL,NULL,29,'No',1,'1'),(9,'Module Manager','module',0,7,'','Off',NULL,NULL,31,'No',1,'1'),(10,'Role Module Manager','rolemodule',0,7,'','Off',NULL,NULL,30,'No',1,'1'),(20,'Users','user',0,0,'fa fa-users','Off',NULL,NULL,10,'No',1,'1'),(35,'Menu','menu',0,1,'','Off',NULL,NULL,32,'Yes',1,'1'),(37,'Events','event',0,0,'fa fa-tasks','Off',NULL,NULL,20,'Yes',1,'1'),(57,'Email Template','emailTemplate',0,1,'','Off',NULL,NULL,28,'No',1,'1'),(61,'Registration Sucessful Message','registration_msg',0,52,'','Off',NULL,NULL,1,'No',1,'1'),(62,'Notification','notification',0,0,'fa fa-bell-o','Off',NULL,NULL,1,'No',1,''),(64,'FAQ','faq',0,1,'','Off',NULL,NULL,1,'Yes',1,'1'),(78,'Forms','dynamic_form',13,1,'1','',NULL,NULL,1,'Yes',0,'1'),(79,'Form Structure','form_fields',0,1,'1','',NULL,NULL,1,'Yes',0,NULL),(80,'Form Data','form_data',0,1,'','',NULL,NULL,1,'Yes',0,NULL),(84,'Blog List','blog',0,85,'','On',NULL,NULL,1,'Yes',1,'1'),(85,'Blog','#',0,0,'fa fa-rss-square','Off',NULL,NULL,1,'Yes',1,'1'),(86,'File Attachment','download',0,85,'','Off',NULL,NULL,1,'Yes',1,'1'),(87,'Calendar','calendar',0,0,'fa fa-calendar','Off',NULL,NULL,1,'Yes',1,'1');

/*Table structure for table `tbl_notification` */

DROP TABLE IF EXISTS `tbl_notification`;

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text,
  `content_id` int(11) DEFAULT NULL,
  `created_on` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` varchar(255) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_notification` */

/*Table structure for table `tbl_partner` */

DROP TABLE IF EXISTS `tbl_partner`;

CREATE TABLE `tbl_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `partner_category` int(11) DEFAULT NULL,
  `created_on` int(15) DEFAULT NULL,
  `created_by` int(15) DEFAULT NULL,
  `updated_on` int(15) DEFAULT NULL,
  `updated_by` int(15) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_partner` */

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User Role` (`updated_by`),
  CONSTRAINT `User Role` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`id`,`name`,`description`,`updated_by`,`updated_on`) values (1,'Super Administrator','Super Administrator',NULL,NULL),(2,'Administrator','Administrator',NULL,NULL),(3,'Moderator','Moderator',NULL,NULL);

/*Table structure for table `tbl_role_module` */

DROP TABLE IF EXISTS `tbl_role_module`;

CREATE TABLE `tbl_role_module` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `module_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `permission` varchar(4) COLLATE utf8_unicode_ci DEFAULT '1111',
  PRIMARY KEY (`id`),
  KEY `FK Module Role` (`module_id`),
  KEY `FK User Role` (`role_id`),
  CONSTRAINT `FK Module Role` FOREIGN KEY (`module_id`) REFERENCES `tbl_module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK User Role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1262 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_role_module` */

insert  into `tbl_role_module`(`id`,`module_id`,`role_id`,`permission`) values (1083,1,3,'0000'),(1084,2,3,'1010'),(1085,3,3,'1010'),(1086,4,3,'1010'),(1087,5,3,'1000'),(1088,6,3,'1010'),(1089,35,3,'1000'),(1224,1,2,'0000'),(1225,2,2,'1111'),(1226,3,2,'1111'),(1227,4,2,'1111'),(1228,5,2,'1111'),(1229,6,2,'1111'),(1230,35,2,'1111'),(1233,57,2,'1111'),(1236,7,2,'0000'),(1237,8,2,'1111'),(1238,9,2,'1111'),(1239,10,2,'1111'),(1240,20,2,'1111'),(1242,37,2,'1111'),(1260,61,2,'1111'),(1261,62,2,'1111');

/*Table structure for table `tbl_social_data` */

DROP TABLE IF EXISTS `tbl_social_data`;

CREATE TABLE `tbl_social_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `link` text,
  `module_id` int(10) DEFAULT NULL,
  `data_id` int(10) DEFAULT NULL,
  `social_site` enum('Facebook','Twitter') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_social_data` */

/*Table structure for table `tbl_telephone_directory` */

DROP TABLE IF EXISTS `tbl_telephone_directory`;

CREATE TABLE `tbl_telephone_directory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(100) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `ext_number` int(11) DEFAULT NULL,
  `status` enum('InActive','Active') DEFAULT NULL,
  `created_on` int(200) DEFAULT NULL,
  `updated_on` int(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_telephone_directory` */

/*Table structure for table `tbl_testimonial` */

DROP TABLE IF EXISTS `tbl_testimonial`;

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `message` text,
  `image` varchar(255) DEFAULT NULL,
  `date` int(15) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'InActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_testimonial` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) NOT NULL,
  `status` enum('Active','InActive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `userType` enum('Admin','Volunteer','Agency') COLLATE utf8_unicode_ci DEFAULT 'Admin',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `user user` (`updated_by`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user user` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`name`,`email`,`username`,`password`,`role_id`,`status`,`updated_by`,`updated_time`,`userType`) values (7,'Rojeena Shrestha','rojeena@amniltech.com','superadmin','amniltech',1,'Active',NULL,NULL,'Admin'),(9,'Admin','admin@admin.com','admin','admin',2,'Active',NULL,NULL,'Admin'),(10,'Modarator','mod@mod.com','mod','mod',3,'Active',NULL,NULL,'Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
