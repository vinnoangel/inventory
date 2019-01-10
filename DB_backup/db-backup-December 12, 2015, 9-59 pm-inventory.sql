

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

INSERT INTO company VALUES("2","AfrikPlus Company","  <p>Plot 2,Block J,Cowbell Way, </p>
<p>Isolo Industrial Estate</p>
<p>Apapa-Oshodi Expressway, 
Isolo,Lagos.</p>","APO","info@afrikplusoils.com","09058905005","afrikplus","NDS1821","afrikplus-logo.png","The leading premium lubricants ","2015-12-12","1");





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
INSERT INTO customers VALUES("3","3","Tina Ema","Tina@yahoo.com","08067383993","109471793","8","2014-09-17");
INSERT INTO customers VALUES("4","6","Adanmd John","jon@yajj.cpm","08062439476","10953594","8","2014-09-17");
INSERT INTO customers VALUES("5","6","Emaka Ike","ike@yahoo.com","08067383993","109534144","8","2014-09-17");





CREATE TABLE `dailyexpenses` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `termid` int(11) NOT NULL,
  `sessionid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO dailyexpenses VALUES("1","3","2000","2","4","1","2015-10-20");
INSERT INTO dailyexpenses VALUES("2","2","5000","2","4","1","2015-10-21");





CREATE TABLE `expensestype` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO expensestype VALUES("1","Transportation","1","2015-10-20");
INSERT INTO expensestype VALUES("2","Fueling","1","2015-10-20");
INSERT INTO expensestype VALUES("3","Accessories","1","2015-10-20");
INSERT INTO expensestype VALUES("4","Food","1","2015-10-21");





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





CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operation` varchar(50) NOT NULL,
  `otable` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` varchar(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;






CREATE TABLE `lowstock` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `lowstock` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO lowstock VALUES("1","10","1","2014-09-16");





CREATE TABLE `messages` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `Sender` text NOT NULL,
  `Content` varchar(500) NOT NULL,
  `towhom` int(11) NOT NULL,
  `phones` longtext NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO messages VALUES("2","Acadasuite","    huhjhj","2","

7066380146, 8024726193, 08168487719, 08022677095, 8037869187, 8030529681, 07887, 8029519454, 8027568446, 8033616794, \"08056260625, 08163180810\", 8028821501, 8039421202, 08030677210, 08051670547, 8038166790, 803722481, 8056572984, 8026667541, 08102311347, 08056260625, 08163180810, ","1","2015-02-19");





CREATE TABLE `passmarks2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passmark` varchar(120) NOT NULL,
  `xdate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `payees` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other` varchar(120) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `accname` varchar(100) NOT NULL,
  `accno` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `payeeid` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO payees VALUES("1","Noble Microsystems","15B Awolowo Road, Ikoyi Lagos","08062439476","info@noblemst.com"," Software Development Company ","Zennith Bank","Noble Microsystems","7889909090","1","2015-02-05","CKIS20151");
INSERT INTO payees VALUES("2","Felix Company","hjjuei","08009","jhd@yahoo.com"," gfhhjjjke","GTbank","felix Company","78670979076","1","2015-02-11","CKIS20152");





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





CREATE TABLE `paymentvoucher` (
  `pvid` int(11) NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL,
  `sesion_id` int(11) NOT NULL,
  `refno` varchar(20) NOT NULL,
  `no` varchar(20) NOT NULL,
  `payeeid` varchar(20) NOT NULL,
  `payeename` varchar(100) NOT NULL,
  `bank` varchar(60) NOT NULL,
  `accname` varchar(100) NOT NULL,
  `accno` varchar(20) NOT NULL,
  `chequeno` varchar(30) NOT NULL,
  `duedate` date NOT NULL,
  `amout` varchar(20) NOT NULL,
  `ctcode` varchar(10) NOT NULL,
  `narration` varchar(200) NOT NULL,
  `amtb4tax` varchar(10) NOT NULL,
  `withtax` varchar(10) NOT NULL,
  `vat` varchar(10) NOT NULL,
  `levy` varchar(10) NOT NULL,
  `netpay` varchar(15) NOT NULL,
  `grandtotal` varchar(20) NOT NULL,
  `raisedby` varchar(60) NOT NULL,
  `raiseddate` date NOT NULL,
  `Auditedby` varchar(60) NOT NULL,
  `Auditeddate` date NOT NULL,
  `Authorizedby` varchar(60) NOT NULL,
  `Authorizeddate` date NOT NULL,
  `issuedby` varchar(60) NOT NULL,
  `issueddate` date NOT NULL,
  `amtinword` varchar(200) NOT NULL,
  `cc1` varchar(100) NOT NULL,
  `ccdate` date NOT NULL,
  `cc2` varchar(100) NOT NULL,
  `cc3` varchar(100) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`pvid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO paymentvoucher VALUES("1","0","0","1423492741","8998","CKIS20151","Noble Microsystems","Zennith Bank","Noble Microsystems","7889909090","98989","2015-02-09","450,000.00","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Four Hundred and Fifty Thousand Naira Only","","0000-00-00","","","2015-02-09","1");
INSERT INTO paymentvoucher VALUES("2","0","0","1423678945","","CKIS20152","Felix Company","GTbank","felix Company","78670979076","87899890","2015-02-04","678,490.00","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Six Hundred and Seventy-Eight Thousand Four Hundred and Ninety Naira Only","","0000-00-00","","","2015-02-11","1");
INSERT INTO paymentvoucher VALUES("3","0","0","1423752139","","CKIS20152","Felix Company","GTbank","felix Company","78670979076","767878","2015-02-12","90,000.00","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Ninety Thousand Naira Only","","0000-00-00","","","2015-02-12","1");
INSERT INTO paymentvoucher VALUES("4","0","0","1423752139","","CKIS20152","Felix Company","GTbank","felix Company","78670979076","767878","2015-02-12","90,000.00","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Ninety Thousand Naira Only","","0000-00-00","","","2015-02-12","1");
INSERT INTO paymentvoucher VALUES("5","0","0","1423752139","","CKIS20152","Felix Company","GTbank","felix Company","78670979076","767878","2015-02-12","90,000.00","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Ninety Thousand Naira Only","","0000-00-00","","","2015-02-12","1");
INSERT INTO paymentvoucher VALUES("6","0","0","1425037920","","CKIS20152","Felix Company","GTbank","felix Company","78670979076","343","2015-02-20","20,000.00","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Twenty Thousand Naira Only","","0000-00-00","","","2015-02-27","1");
INSERT INTO paymentvoucher VALUES("7","3","3","1440226748","","CKIS20151","Noble Microsystems","Zennith Bank","Noble Microsystems","7889909090","788989","2015-08-13","45,678,888","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Fourty-Five Million Six Hundred and Seventy-Eight Thousand Eight Hundred and Eigthy-Eight Naira Only","","0000-00-00","","","2015-08-22","1");
INSERT INTO paymentvoucher VALUES("8","3","3","1441026176","","CKIS20151","Noble Microsystems","Zennith Bank","Noble Microsystems","7889909090","775778","2015-08-12","70,000","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Seventy Thousand Naira Only","","0000-00-00","","","2015-08-31","1");
INSERT INTO paymentvoucher VALUES("9","2","4","1443128507","","CKIS20152","Felix Company","GTbank","felix Company","78670979076","455454","2015-09-09","20,000","","","","","","","","","","0000-00-00","","0000-00-00","","0000-00-00","Enyika Iheanyi","0000-00-00","Twenty Thousand Naira Only","","0000-00-00","","","2015-09-24","1");





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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `log` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `xdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `deptids` int(11) NOT NULL,
  `cat` int(255) NOT NULL,
  `txt1` int(11) NOT NULL DEFAULT '0',
  `txt2` int(11) NOT NULL DEFAULT '0',
  `txt3` int(11) NOT NULL DEFAULT '0',
  `txt4` int(11) NOT NULL DEFAULT '0',
  `txt5` int(11) NOT NULL DEFAULT '0',
  `txt6` int(11) NOT NULL DEFAULT '0',
  `txt7` int(11) NOT NULL DEFAULT '0',
  `txt8` int(11) NOT NULL DEFAULT '0',
  `txt9` int(11) NOT NULL DEFAULT '0',
  `txt10` int(11) NOT NULL DEFAULT '0',
  `txt11` int(11) NOT NULL DEFAULT '0',
  `txt12` int(11) NOT NULL DEFAULT '0',
  `txt13` int(11) NOT NULL DEFAULT '0',
  `txt14` int(11) NOT NULL DEFAULT '0',
  `txt15` int(11) NOT NULL DEFAULT '0',
  `txt16` int(11) NOT NULL DEFAULT '0',
  `txt17` int(11) NOT NULL DEFAULT '0',
  `txt18` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO systemusers VALUES("1","admin","admin","2015-11-14 19:05:38","nobleogyify@yahoo.com","2012-10-12","0","Enyika","Iheanyi","0","2","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO systemusers VALUES("8","mich","NCD2448","0000-00-00 00:00:00","mcik@yahoo.com","2013-02-03","0","michael","Onwugburu","0","13","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO systemusers VALUES("9","Oyegbemi","NCD4626","0000-00-00 00:00:00","koluniyi@yahoo.com","2015-04-08","0","Oyegbemi","Kehinde O.","0","13","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO systemusers VALUES("10","Kenny","PROFFS","0000-00-00 00:00:00","koluniyi@yahoo.com","2015-04-09","0","Oyegbemi","Kehinde O.","0","13","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO systemusers VALUES("11"," Alex","NCD7446","0000-00-00 00:00:00","alexchi22@yahoo.com","2015-04-27","1","Umeh","Alex","0","13","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO systemusers VALUES("12","Alex","pastor","0000-00-00 00:00:00","alexchi22@yahoo.com","2015-04-29","0","Umeh","Alex","0","13","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");
INSERT INTO systemusers VALUES("13","Abraham","year2015","0000-00-00 00:00:00","giver4life2015@gmail.com","2015-04-29","0","Ebhom.","Abraham","0","13","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO systemusers VALUES("14","PROF","KENNY","0000-00-00 00:00:00","koluniyi@yahoo.com","2015-04-29","0","Oyegbemi","Kenny O","0","13","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO systemusers VALUES("16","Bursary","bursary","0000-00-00 00:00:00","giver4life2015@gmail.com","2015-05-21","0","Bursary","B","0","15","1","1","0","1","1","0","1","1","1","1","1","1","1","0","1","1","1","1");
INSERT INTO systemusers VALUES("17","admin","dan","2015-06-11 10:20:47","Ok","2015-06-11","0","Dan","Ijeoma","0","13","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO systemusers VALUES("18","iheanyi","iheanyi","0000-00-00 00:00:00","ok","2015-09-08","0","Daniel","Okechu","0","2","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0");





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



