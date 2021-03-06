

CREATE TABLE `batcheditem` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `oldq` int(11) NOT NULL,
  `newq` int(11) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `selingprice` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO batcheditem VALUES("2","1","1","20","100","150","8","2014-09-17","Added","0");





CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `soldprice` varchar(20) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `transID` varchar(30) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO cart VALUES("1","Cabin Biscuit","400","450","2","2","1","2014-09-16","1141087734582");
INSERT INTO cart VALUES("2","Cabin Biscuit","400","450","2","2","1","2014-09-16","1141087734582");
INSERT INTO cart VALUES("3","Milk","300","320","1","4","1","2014-09-16","1141087734582");
INSERT INTO cart VALUES("4","Gino Tomatoes","100","130","3","3","1","2014-09-16","9141087757588");
INSERT INTO cart VALUES("5","Milk","300","320","1","2","1","2014-09-16","9141087757588");
INSERT INTO cart VALUES("6","Milk","300","320","1","2","1","2014-09-16","9141087757588");
INSERT INTO cart VALUES("7","Milk","300","320","1","1","1","2014-09-16","2141087785354");
INSERT INTO cart VALUES("8","Milk","300","320","1","1","8","2014-09-17","4141093740754");
INSERT INTO cart VALUES("9","Milk","300","320","1","1","8","2014-09-17","4141094736992");
INSERT INTO cart VALUES("10","Milk","300","320","1","1","8","2014-09-17","3141095459051");
INSERT INTO cart VALUES("11","Gino Tomatoes","100","130","3","5","8","2014-09-17","3141095459051");
INSERT INTO cart VALUES("12","Gino Tomatoes","100","130","3","5","8","2014-09-17","3141095459051");
INSERT INTO cart VALUES("13","Cabin Biscuit","200","240","2","3","8","2014-09-17","2141096819572");
INSERT INTO cart VALUES("14","Milk","300","320","1","1","8","2014-09-17","2141096819572");
INSERT INTO cart VALUES("15","Gino Tomatoes","100","130","3","7","8","2014-09-17","2141096819572");
INSERT INTO cart VALUES("16","Cabin Biscuit","200","240","2","2","8","2014-09-17","10141096891532");
INSERT INTO cart VALUES("17","Gino Tomatoes","100","130","3","4","8","2014-09-17","10141096891532");
INSERT INTO cart VALUES("18","Cabin Biscuit","200","240","2","2","8","2014-09-17","101410969375105");
INSERT INTO cart VALUES("19","Milk","320","330","1","4","1","2014-10-31","614147446021010");
INSERT INTO cart VALUES("20","Cabin Biscuit","200","240","2","2","1","2014-10-31","614147446021010");
INSERT INTO cart VALUES("21","Milk","320","330","1","4","1","2014-10-31","4141474481685");
INSERT INTO cart VALUES("22","Cabin Biscuit","200","240","2","2","1","2014-12-16","6141873145017");
INSERT INTO cart VALUES("23","Gino Tomatoes","100","130","3","6","1","2014-12-16","6141873145017");
INSERT INTO cart VALUES("24","Cabin Biscuit","200","240","2","5","1","2014-12-16","5141873787683");
INSERT INTO cart VALUES("25","Gino Tomatoes","100","130","3","7","1","2014-12-16","5141873787683");
INSERT INTO cart VALUES("26","Cabin Biscuit","200","240","2","5","1","2014-12-16","8141874313645");
INSERT INTO cart VALUES("27","Gino Tomatoes","100","130","3","3","1","2014-12-16","8141874313645");
INSERT INTO cart VALUES("28","Gino Tomatoes","100","130","3","6","1","2014-12-20","31419074528106");





CREATE TABLE `categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO categories VALUES("1","Category A","1","2014-09-13");
INSERT INTO categories VALUES("2","Food Item","1","2014-09-16");





CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `regnof` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO company VALUES("2","Noble Microsystems","<p>Ndoro Oboro,&nbsp;</p>
<p>Ikwuano L.G.A</p>
<p>Abia State</p>","WSN","nobleogyify@yahoo.com","09058905005","noble","NDS1821","st.fw.png","Ifeanyi","2014-09-13","1");





CREATE TABLE `counter` (
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `customers` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `idno` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO customers VALUES("1","4","Enyika Iheanyi","nobleogyify@yahoo.com","08062439476","12345","8","2014-09-16");
INSERT INTO customers VALUES("2","6","ijj","dffdf@tt.vnn","dfgfg","10947222","8","2014-09-17");
INSERT INTO customers VALUES("3","3","Tina Ema","Tina@yahoo.com","080673839933","109471793","8","2014-09-17");
INSERT INTO customers VALUES("4","6","Adanmd John","jon@yajj.cpm","08062439476","10953594","8","2014-09-17");
INSERT INTO customers VALUES("5","6","Emaka Ike","ike@yahoo.com","080673839933","109534144","8","2014-09-17");





CREATE TABLE `items` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `saleprice` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `descript` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `bestSeller` int(11) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO items VALUES("1","1","Milk","320","330","download.jpg","7","296","1","2014-09-16","14");
INSERT INTO items VALUES("2","1","Cabin Biscuit","200","240","download (2).jpg","dkjkd","15","1","2014-09-16","13");
INSERT INTO items VALUES("3","2","Gino Tomatoes","100","130","images (1).jpg","for cooking","4","1","2014-09-16","26");





CREATE TABLE `items_update` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `oldq` int(11) NOT NULL,
  `newq` int(11) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `saleprice` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `udate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

INSERT INTO items_update VALUES("5","1","18","2","200","250","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("6","2","29","1","150","200","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("7","3","0","7","700","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("46","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("47","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("48","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("49","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("50","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("51","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("52","3","7","2","750","800","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("53","1","0","20","200","300","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("54","2","0","30","200","250","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("55","1","0","40","200","230","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("56","2","0","30","200","250","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("57","3","0","30","100","130","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("58","1","0","10","300","320","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("59","2","0","4","400","450","1","2014-09-16","Added","0");
INSERT INTO items_update VALUES("60","2","0","24","200","240","8","2014-09-17","Added","0");
INSERT INTO items_update VALUES("61","1","0","300","320","330","8","2014-09-17","Added","0");





CREATE TABLE `lowstock` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `lowstock` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO lowstock VALUES("1","10","1","2014-09-16");





CREATE TABLE `passmarks2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passmark` varchar(120) NOT NULL,
  `xdate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `paymenthistory` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `custID` int(11) NOT NULL,
  `transID` int(11) NOT NULL,
  `amt` varchar(20) NOT NULL,
  `paid` varchar(20) NOT NULL,
  `bal` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO paymenthistory VALUES("1","0","2147483647","1000","1200","200","8","2014-09-17");
INSERT INTO paymenthistory VALUES("2","5","2147483647","1800","2000","200","1","2014-10-31");
INSERT INTO paymenthistory VALUES("3","0","2147483647","1260","5000","3740","1","2014-12-16");
INSERT INTO paymenthistory VALUES("4","0","2147483647","780","1000","220","1","2014-12-20");





CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `soldprice` varchar(20) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `transID` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO sales VALUES("1","Cabin Biscuit","400","450","2","2","1","2014-09-16","1141087734582","0");
INSERT INTO sales VALUES("2","Cabin Biscuit","400","450","2","2","1","2014-09-16","1141087734582","0");
INSERT INTO sales VALUES("3","Milk","300","320","1","4","1","2014-09-16","1141087734582","0");
INSERT INTO sales VALUES("4","Gino Tomatoes","100","130","3","3","1","2014-09-16","9141087757588","0");
INSERT INTO sales VALUES("5","Milk","300","320","1","2","1","2014-09-16","9141087757588","0");
INSERT INTO sales VALUES("6","Milk","300","320","1","2","1","2014-09-16","9141087757588","0");
INSERT INTO sales VALUES("7","Milk","300","320","1","1","1","2014-09-16","2141087785354","0");
INSERT INTO sales VALUES("8","Cabin Biscuit","200","240","2","3","8","2014-09-17","2141096819572","0");
INSERT INTO sales VALUES("9","Milk","300","320","1","1","8","2014-09-17","2141096819572","0");
INSERT INTO sales VALUES("10","Gino Tomatoes","100","130","3","7","8","2014-09-17","2141096819572","0");
INSERT INTO sales VALUES("11","Cabin Biscuit","200","240","2","2","8","2014-09-17","10141096891532","0");
INSERT INTO sales VALUES("12","Gino Tomatoes","100","130","3","4","8","2014-09-17","10141096891532","0");
INSERT INTO sales VALUES("13","Milk","320","330","1","4","1","2014-10-31","614147446021010","0");
INSERT INTO sales VALUES("14","Cabin Biscuit","200","240","2","2","1","2014-10-31","614147446021010","0");
INSERT INTO sales VALUES("15","Cabin Biscuit","200","240","2","2","1","2014-12-16","6141873145017","0");
INSERT INTO sales VALUES("16","Gino Tomatoes","100","130","3","6","1","2014-12-16","6141873145017","0");
INSERT INTO sales VALUES("17","Gino Tomatoes","100","130","3","6","1","2014-12-20","31419074528106","0");





CREATE TABLE `systemusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `xdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `login` int(2) NOT NULL,
  `login_date` date NOT NULL,
  `cat` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO systemusers VALUES("1","admin","admin","nobleogyify@yahoo.com","2012-10-12","0","Enyika","Iheanyi","1","2015-12-11","2");
INSERT INTO systemusers VALUES("8","mich","mich","mcik@yahoo.com","2013-02-03","0","michael","Onwugburu","0","2014-12-16","13");
INSERT INTO systemusers VALUES("9","noble","noble","nobleogyify@yahoo.com","2014-12-19","0","Enyika","Iheanyi","0","2014-12-19","14");





CREATE TABLE `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(20) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL,
  `sch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO title VALUES("1","Mr","2014-05-27","1","0");
INSERT INTO title VALUES("2","Mrs","2014-05-27","1","0");
INSERT INTO title VALUES("3","Miss","2014-05-27","1","0");
INSERT INTO title VALUES("4","Dr","2014-05-27","1","0");
INSERT INTO title VALUES("5","Prof","2014-05-27","1","0");
INSERT INTO title VALUES("6","Engr","2014-05-27","1","0");





CREATE TABLE `usercat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(255) NOT NULL,
  `role1` int(11) NOT NULL DEFAULT '0',
  `role2` int(11) NOT NULL DEFAULT '0',
  `role3` int(11) NOT NULL DEFAULT '0',
  `role4` int(11) NOT NULL DEFAULT '0',
  `role5` int(11) NOT NULL DEFAULT '0',
  `role6` int(11) NOT NULL DEFAULT '0',
  `role7` int(11) NOT NULL DEFAULT '0',
  `role8` int(11) NOT NULL DEFAULT '0',
  `role9` int(11) NOT NULL DEFAULT '0',
  `role10` int(11) NOT NULL DEFAULT '0',
  `role11` int(11) NOT NULL DEFAULT '0',
  `role12` int(11) NOT NULL DEFAULT '0',
  `xdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO usercat VALUES("2","Admin","1","1","1","1","1","1","1","1","1","1","1","1","2012-11-16");
INSERT INTO usercat VALUES("14","Staff","0","0","0","0","0","0","0","0","1","0","1","1","2014-12-19");



