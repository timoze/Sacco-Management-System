

CREATE TABLE `audit_trail` (
  `trail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `trail_date` datetime NOT NULL,
  `trail_desc` longtext COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_addr` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `trail_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1007 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO audit_trail VALUES("1","2022-10-18 11:15:38","Registered new memberTimothy Kipkemei","1","::1","1");
INSERT INTO audit_trail VALUES("2","2022-10-18 11:42:20","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("3","2022-10-18 12:11:46","Deactivated Member details for (Timothy Kipkemei)","1","::1","1");
INSERT INTO audit_trail VALUES("4","2022-10-18 13:59:42","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("5","2022-10-18 21:18:29","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("6","2022-10-18 21:18:49","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("7","2022-10-18 21:22:26","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("8","2022-10-18 21:24:35","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("9","2022-10-18 21:49:45","Registered new member (Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("10","2022-10-18 21:50:12","Updated Member details for (Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("11","2022-10-19 06:29:38","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("12","2022-10-19 10:00:49","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("13","2022-10-19 14:58:03","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("14","2022-10-19 16:30:14","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("15","2022-10-19 16:35:20","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("16","2022-10-19 17:48:50","Registered new member (Timothy Kipkemei)","1","::1","1");
INSERT INTO audit_trail VALUES("17","2022-10-19 17:58:10","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("18","2022-10-19 17:58:17","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("19","2022-10-19 18:01:47","Updated Member details for (Timothy Kipkemei )","1","::1","1");
INSERT INTO audit_trail VALUES("20","2022-10-19 19:33:00","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("21","2022-10-20 08:24:28","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("22","2022-10-20 08:27:46","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("23","2022-10-20 09:17:52","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("24","2022-10-20 09:33:13","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("25","2022-10-20 09:39:26","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("26","2022-10-20 11:46:14","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("27","2022-10-20 11:47:12","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("28","2022-10-20 11:50:06","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("29","2022-10-20 13:27:17","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("30","2022-10-20 13:52:31","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("31","2022-10-20 13:54:31","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("32","2022-10-20 13:58:19","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("33","2022-10-21 11:06:12","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("34","2022-10-21 11:09:03","Updated Member details for (Lazz Korir)","1","::1","1");
INSERT INTO audit_trail VALUES("35","2022-10-21 11:09:42","Updated Member details for (Sammy Gathaiya)","1","::1","1");
INSERT INTO audit_trail VALUES("36","2022-10-21 13:59:49","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("37","2022-10-21 19:18:55","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("38","2022-10-21 19:19:42","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("39","2022-10-21 23:30:29","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("40","2022-10-22 00:21:42","Cancelled Contribution for (Timothy Kipkemei) TXN ID :- ","1","::1","1");
INSERT INTO audit_trail VALUES("41","2022-10-22 00:22:41","Cancelled Contribution for (Lazz Korir) TXN ID :- vcfg","1","::1","1");
INSERT INTO audit_trail VALUES("42","2022-10-22 09:24:00","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("43","2022-10-22 11:48:28","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("44","2022-10-22 12:04:57","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("45","2022-10-22 12:24:17","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("46","2022-10-24 19:37:28","Successfull User Login","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("47","2022-10-24 19:50:54","Registered new member ( )","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("48","2022-10-24 19:53:25","Registered new member contribution (Timothy Kipkemei Arusei)","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("49","2022-10-24 19:55:11","Registered new member contribution (Kipkemei Arusei)","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("50","2022-10-25 18:44:29","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("51","2022-10-25 18:45:13","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("52","2022-10-25 18:49:25","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("53","2022-10-25 18:49:53","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("54","2022-10-25 18:54:14","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("55","2022-10-25 19:49:20","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("56","2022-10-25 19:50:36","Registered new member (Wilfred Kipng\'etich)","1","::1","1");
INSERT INTO audit_trail VALUES("57","2022-10-25 19:58:21","Registered new member (Kelvin Njoroge)","1","::1","1");
INSERT INTO audit_trail VALUES("58","2022-10-25 20:11:00","Successfull User Login","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("59","2022-10-25 20:13:01","Deactivated Member details for (Wilfred Kipng\'etich)","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("60","2022-10-25 20:13:01","Deactivated Member details for (Kelvin Njoroge)","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("61","2022-10-25 20:14:02","Registered new member contribution (Lazz Korir)","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("62","2022-10-25 20:46:14","Registered new member contribution (Sammy Gathaiya)","1","192.168.100.5","1");
INSERT INTO audit_trail VALUES("63","2022-10-25 21:10:01","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("64","2022-10-25 22:09:17","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("65","2022-10-26 07:03:48","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("66","2022-10-26 07:04:06","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("67","2022-10-27 11:17:13","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("68","2022-10-28 20:46:02","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("69","2022-10-28 20:46:24","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("70","2022-10-28 21:20:53","Updated Member Contribution for (Lazz Korir) ID: 9","1","::1","1");
INSERT INTO audit_trail VALUES("71","2022-10-29 00:01:06","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("72","2022-10-29 00:04:14","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("73","2022-10-29 08:41:42","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("74","2022-10-29 10:06:44","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("75","2022-10-29 12:15:30","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("76","2022-10-29 12:19:19","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("77","2022-10-29 12:40:33","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("80","2022-10-30 09:03:13","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("81","2022-10-30 09:37:06","Deactivated Member details for (Lazz Korir)","1","::1","1");
INSERT INTO audit_trail VALUES("82","2022-10-30 09:37:06","Deactivated Member details for (Sammy Gathaiya)","1","::1","1");
INSERT INTO audit_trail VALUES("83","2022-10-30 09:37:06","Deactivated Member details for (Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("84","2022-10-30 09:37:06","Deactivated Member details for (Timothy Kipkemei)","1","::1","1");
INSERT INTO audit_trail VALUES("85","2022-10-30 11:28:37","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("86","2022-10-30 14:24:20","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("87","2022-11-01 17:43:28","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("88","2022-11-01 20:49:48","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("89","2022-11-04 19:54:35","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("90","2022-11-04 22:43:58","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("91","2022-11-06 18:40:21","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("92","2022-11-08 20:17:48","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("93","2022-11-10 21:10:25","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("94","2022-11-10 23:44:44","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("95","2022-11-15 17:23:37","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("96","2022-11-15 18:11:22","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("97","2022-11-15 19:58:12","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("98","2022-11-15 20:01:15","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("99","2022-11-15 20:27:27","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("100","2022-11-19 12:39:59","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("101","2022-11-19 14:02:44","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("102","2022-11-22 20:17:51","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("103","2022-11-23 14:32:02","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("104","2022-11-23 14:35:38","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("105","2022-11-23 14:42:45","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("106","2022-11-23 14:44:39","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("107","2022-11-23 14:45:52","Registered new member contribution (Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("108","2022-11-23 14:46:45","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("109","2022-11-23 14:54:25","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("110","2022-11-23 14:56:02","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("111","2022-11-23 17:56:16","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("112","2022-11-26 10:35:58","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("113","2022-11-26 13:13:32","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("114","2022-11-28 16:33:07","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("115","2022-12-03 12:33:36","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("116","2022-12-03 12:34:27","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("117","2022-12-04 07:48:36","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("118","2022-12-04 13:01:09","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("119","2022-12-04 22:34:54","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("120","2022-12-05 18:04:13","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("121","2022-12-05 19:31:55","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("122","2022-12-05 22:23:23","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("123","2022-12-06 06:44:16","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("124","2022-12-06 14:53:13","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("125","2022-12-06 17:38:42","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("126","2022-12-06 17:38:57","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("127","2022-12-06 19:40:20","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("128","2022-12-06 23:30:44","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("129","2022-12-06 23:39:18","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("130","2022-12-06 23:52:51","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("131","2022-12-06 23:54:05","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("132","2022-12-07 00:02:49","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("133","2022-12-07 06:47:11","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("134","2022-12-07 06:55:04","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("135","2022-12-07 20:47:21","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("136","2022-12-07 20:59:42","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("137","2022-12-07 21:25:40","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("138","2022-12-07 21:25:49","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("139","2022-12-07 21:29:00","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("140","2022-12-07 22:08:54","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("141","2022-12-07 22:08:59","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("142","2022-12-07 22:09:29","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("143","2022-12-07 22:10:08","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("144","2022-12-07 22:10:34","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("145","2022-12-07 22:12:00","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("146","2022-12-07 22:12:39","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("147","2022-12-07 22:21:32","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("148","2022-12-07 22:21:49","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("149","2022-12-07 22:23:01","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("150","2022-12-07 22:24:25","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("151","2022-12-07 22:26:01","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("152","2022-12-07 22:31:15","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("153","2022-12-07 22:54:28","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("154","2022-12-07 23:05:38","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("155","2022-12-07 23:19:41","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("156","2022-12-07 23:30:46","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("157","2022-12-07 23:31:52","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("158","2022-12-07 23:32:01","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("159","2022-12-07 23:32:37","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("160","2022-12-07 23:33:24","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("161","2022-12-08 06:47:33","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("162","2022-12-08 07:06:29","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("163","2022-12-08 07:09:25","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("164","2022-12-08 07:36:42","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("165","2022-12-08 07:41:45","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("166","2022-12-08 08:08:36","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("167","2022-12-08 08:59:33","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("168","2022-12-08 15:36:24","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("169","2022-12-08 17:07:54","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("170","2022-12-08 21:23:09","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("171","2022-12-08 21:24:10","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("172","2022-12-08 22:35:55","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("173","2022-12-09 05:41:01","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("174","2022-12-09 05:42:47","Updated loan No. 37/2022 (Timothy Kipkemei Arusei )","1","::1","1");
INSERT INTO audit_trail VALUES("175","2022-12-09 05:43:25","Updated loan No. 37/2022 (Timothy Kipkemei Arusei )","1","::1","1");
INSERT INTO audit_trail VALUES("176","2022-12-09 05:49:16","Updated loan No. 37/2022 (Timothy Kipkemei Arusei )","1","::1","1");
INSERT INTO audit_trail VALUES("177","2022-12-09 05:49:29","Updated loan No. 37/2022 (Timothy Kipkemei Arusei )","1","::1","1");
INSERT INTO audit_trail VALUES("178","2022-12-09 06:01:26","Updated loan No. 37/2022 (Timothy Kipkemei Arusei )","1","::1","1");
INSERT INTO audit_trail VALUES("179","2022-12-09 21:34:52","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("180","2022-12-09 21:47:22","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("181","2022-12-09 21:47:59","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("182","2022-12-10 08:51:26","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("183","2022-12-10 08:56:10","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("184","2022-12-10 12:18:34","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("185","2022-12-10 12:18:58","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("186","2022-12-10 13:38:14","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("187","2022-12-10 19:34:38","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("188","2022-12-10 21:48:56","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("189","2022-12-10 22:57:05","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("190","2022-12-11 00:06:49","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("191","2022-12-11 00:09:27","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("192","2022-12-11 12:36:14","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("193","2022-12-11 15:14:04","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("194","2022-12-11 20:52:04","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("195","2022-12-11 22:53:39","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("196","2022-12-11 23:38:23","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("197","2022-12-12 00:20:47","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("198","2022-12-12 00:20:59","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("199","2022-12-12 00:21:43","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("200","2022-12-12 00:31:05","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("201","2022-12-12 00:33:03","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("202","2022-12-12 00:36:35","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("203","2022-12-12 09:16:32","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("204","2022-12-12 09:39:35","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("205","2022-12-12 09:42:06","Registered new member (Sylvia Njango)","1","::1","1");
INSERT INTO audit_trail VALUES("206","2022-12-12 09:47:24","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("207","2022-12-12 09:47:29","Updated Member details for (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("208","2022-12-12 11:29:20","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("209","2022-12-12 11:29:41","Registered new member contribution (Sammy Gathaiya)","1","::1","1");
INSERT INTO audit_trail VALUES("210","2022-12-12 11:33:23","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("211","2022-12-12 11:38:26","Registered new member contribution (Sammy Gathaiya)","1","::1","1");
INSERT INTO audit_trail VALUES("212","2022-12-12 11:59:40","Registered new member contribution (Sammy Gathaiya)","1","::1","1");
INSERT INTO audit_trail VALUES("213","2022-12-12 12:00:07","Registered new member contribution (Wilfred Kipng\'etich)","1","::1","1");
INSERT INTO audit_trail VALUES("214","2022-12-12 17:02:10","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("215","2022-12-12 20:00:28","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("216","2022-12-13 08:39:35","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("217","2022-12-13 09:05:14","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("218","2022-12-13 18:25:46","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("219","2022-12-13 19:58:41","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("220","2022-12-13 20:45:52","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("221","2022-12-14 19:44:44","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("222","2022-12-14 20:35:44","Updated loan No. 39/2022 (Timothy Kipkemei Arusei )","1","::1","1");
INSERT INTO audit_trail VALUES("223","2022-12-14 23:49:55","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("224","2022-12-15 00:08:55","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("225","2022-12-15 20:43:34","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("226","2022-12-15 20:46:28","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("227","2022-12-15 20:50:36","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("228","2022-12-15 20:52:16","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("229","2022-12-15 20:53:21","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("230","2022-12-15 23:07:18","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("231","2022-12-16 22:46:26","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("232","2022-12-17 00:03:32","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("233","2022-12-17 08:39:24","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("234","2022-12-17 08:42:46","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("235","2022-12-17 13:10:56","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("236","2022-12-17 20:24:00","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("237","2022-12-17 23:27:28","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("238","2022-12-18 10:30:32","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("239","2022-12-18 12:38:47","Added new Role (Test)","1","::1","1");
INSERT INTO audit_trail VALUES("240","2022-12-18 12:48:21","Deleted User role ID 1 - ()","1","::1","1");
INSERT INTO audit_trail VALUES("241","2022-12-18 12:48:57","Added new Role (Test 1)","1","::1","1");
INSERT INTO audit_trail VALUES("242","2022-12-18 12:49:03","Added new Role (test 2)","1","::1","1");
INSERT INTO audit_trail VALUES("243","2022-12-18 12:49:10","Added new Role (test 3)","1","::1","1");
INSERT INTO audit_trail VALUES("244","2022-12-18 12:49:22","Deleted User role ID 2 - ()","1","::1","1");
INSERT INTO audit_trail VALUES("245","2022-12-18 12:49:22","Deleted User role ID 4 - ()","1","::1","1");
INSERT INTO audit_trail VALUES("246","2022-12-18 12:49:41","Deleted User role ID 3 - ()","1","::1","1");
INSERT INTO audit_trail VALUES("247","2022-12-18 12:49:54","Added new Role (Test edit)","1","::1","1");
INSERT INTO audit_trail VALUES("248","2022-12-18 12:56:56","Updated User Role (Test edit updated)","1","::1","1");
INSERT INTO audit_trail VALUES("249","2022-12-18 15:12:47","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("250","2022-12-18 15:27:49","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("251","2022-12-18 15:53:05","Applied for loan (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("252","2022-12-18 19:36:46","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("253","2022-12-18 19:37:00","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("254","2022-12-18 19:37:22","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("255","2022-12-18 19:41:50","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("256","2022-12-18 19:50:26","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("257","2022-12-18 19:52:31","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("258","2022-12-18 19:52:48","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("259","2022-12-18 19:53:46","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("260","2022-12-18 19:53:56","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("261","2022-12-18 19:59:12","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("262","2022-12-18 20:04:48","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("263","2022-12-18 20:06:08","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("264","2022-12-18 20:14:45","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("265","2022-12-18 20:17:24","Deleted User role ID 5 - ()","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("266","2022-12-18 20:18:26","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("267","2022-12-18 20:21:04","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("268","2022-12-18 20:21:41","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("269","2022-12-18 20:27:41","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("270","2022-12-18 20:31:30","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("271","2022-12-18 20:38:10","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("272","2022-12-18 21:07:00","Successfull User Login","5","105.163.2.122","1");
INSERT INTO audit_trail VALUES("273","2022-12-18 21:08:20","Successfull User Login","5","105.163.2.122","1");
INSERT INTO audit_trail VALUES("274","2022-12-18 23:12:57","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("275","2022-12-19 07:49:50","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("276","2022-12-19 10:32:04","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("277","2022-12-19 12:24:49","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("278","2022-12-19 12:25:28","Updated Member details for (Sammy Gathaiya)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("279","2022-12-19 12:29:05","Successfull User Login","6","105.163.2.122","1");
INSERT INTO audit_trail VALUES("280","2022-12-19 13:04:19","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("281","2022-12-19 14:43:05","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("282","2022-12-19 16:13:31","Updated Member details for (Wilfred Kipng\'etich)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("283","2022-12-19 16:14:48","Successfull User Login","7","105.163.2.122","1");
INSERT INTO audit_trail VALUES("284","2022-12-19 16:16:07","Successfull User Login","7","105.163.2.122","1");
INSERT INTO audit_trail VALUES("285","2022-12-19 16:19:40","Updated Member details for (Philip Njuguna)","7","105.163.2.122","1");
INSERT INTO audit_trail VALUES("286","2022-12-19 16:22:33","Updated Member details for (Beth Kananu)","7","105.163.2.122","1");
INSERT INTO audit_trail VALUES("287","2022-12-19 16:24:15","Updated Member details for (Duncan Omwoyo)","7","105.163.2.122","1");
INSERT INTO audit_trail VALUES("288","2022-12-19 16:26:16","Successfull User Login","8","105.163.2.122","1");
INSERT INTO audit_trail VALUES("289","2022-12-19 16:26:35","Successfull User Login","8","105.163.2.122","1");
INSERT INTO audit_trail VALUES("290","2022-12-19 16:28:02","Successfull User Login","8","105.163.2.122","1");
INSERT INTO audit_trail VALUES("291","2022-12-19 16:28:31","Successfull User Login","9","105.163.2.122","1");
INSERT INTO audit_trail VALUES("292","2022-12-19 16:29:17","Successfull User Login","9","105.163.2.122","1");
INSERT INTO audit_trail VALUES("293","2022-12-19 16:29:48","Successfull User Login","10","105.163.2.122","1");
INSERT INTO audit_trail VALUES("294","2022-12-19 16:30:58","Successfull User Login","10","105.163.2.122","1");
INSERT INTO audit_trail VALUES("295","2022-12-19 17:42:17","Successfull User Login","10","105.160.37.84","1");
INSERT INTO audit_trail VALUES("296","2022-12-19 19:38:00","Successfull User Login","7","102.219.208.38","1");
INSERT INTO audit_trail VALUES("297","2022-12-19 19:57:28","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("298","2022-12-19 20:23:57","Successfull User Login","7","102.219.208.38","1");
INSERT INTO audit_trail VALUES("299","2022-12-19 20:42:11","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("300","2022-12-20 10:11:40","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("301","2022-12-20 19:15:05","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("302","2022-12-20 19:18:11","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("303","2022-12-20 20:17:10","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720.00","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("304","2022-12-20 20:17:53","Declined Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720.00","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("305","2022-12-20 20:37:31","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("306","2022-12-20 20:57:55","Registered new member contribution ( )","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("307","2022-12-20 21:43:51","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("308","2022-12-20 21:51:51","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("309","2022-12-20 21:54:24","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("310","2022-12-20 21:57:16","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("311","2022-12-20 21:57:51","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("312","2022-12-20 21:58:08","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("313","2022-12-20 21:58:21","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("314","2022-12-20 22:04:42","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("315","2022-12-20 22:18:43","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 28","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("316","2022-12-20 22:44:42","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 32","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("317","2022-12-21 07:56:12","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("318","2022-12-21 08:06:29","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 26","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("319","2022-12-21 08:19:36","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 26","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("320","2022-12-21 08:20:15","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 26","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("321","2022-12-21 08:26:32","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("322","2022-12-21 08:35:08","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("323","2022-12-21 08:35:27","Registered new member contribution (Lazz Korir)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("324","2022-12-21 08:37:18","Registered new member contribution (Lazz Korir)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("325","2022-12-21 08:58:31","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("326","2022-12-21 09:33:36","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("327","2022-12-21 11:32:11","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("328","2022-12-21 11:43:58","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("329","2022-12-21 11:49:40","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("330","2022-12-21 11:50:17","Approved Guarantee for Loan Application No. (24/2022)  for (Timothy Kipkemei Arusei) Amount : 126,720.00","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("331","2022-12-21 12:21:16","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("332","2022-12-21 12:22:48","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("333","2022-12-21 12:29:42","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("334","2022-12-21 15:24:02","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("335","2022-12-21 16:10:05","Approved Expense ID (4 )  ","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("336","2022-12-21 16:18:37","Approved Expense ID (0 )  ","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("337","2022-12-21 16:35:59","Posted new Expense (test west)","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("338","2022-12-21 16:36:30","Cancelled Expense ID (5 ) ","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("339","2022-12-21 17:39:24","Successfull User Login","1","105.163.2.122","1");
INSERT INTO audit_trail VALUES("340","2022-12-21 19:59:19","Successfull User Login","1","105.163.0.69","1");
INSERT INTO audit_trail VALUES("341","2022-12-22 06:39:29","Successfull User Login","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("342","2022-12-22 07:19:49","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("343","2022-12-22 07:44:34","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720.00","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("344","2022-12-22 07:45:57","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("345","2022-12-22 08:29:35","Successfull User Login","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("346","2022-12-22 09:24:42","Successfull User Login","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("347","2022-12-22 10:23:06","Successfull User Login","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("348","2022-12-22 10:29:06","Successfull User Login","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("349","2022-12-22 13:15:54","Successfull User Login","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("350","2022-12-22 13:25:58","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("351","2022-12-22 13:26:30","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.156.76","1");
INSERT INTO audit_trail VALUES("352","2022-12-22 17:38:55","Successfull User Login","1","105.163.157.98","1");
INSERT INTO audit_trail VALUES("353","2022-12-22 17:39:52","Successfull User Login","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("354","2022-12-22 17:44:22","Successfull User Login","1","105.163.157.98","1");
INSERT INTO audit_trail VALUES("355","2022-12-22 17:58:30","Successfull User Login","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("356","2022-12-22 17:58:53","Applied for loan (Lazz Korir)","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("357","2022-12-22 17:59:53","Successfull User Login","1","105.163.157.98","1");
INSERT INTO audit_trail VALUES("358","2022-12-22 18:04:33","Applied for loan (Lazz Korir)","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("359","2022-12-22 18:55:52","Deleted Loan Application ID 37 ","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("360","2022-12-22 18:55:52","Deleted Loan Application ID 38 ","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("361","2022-12-22 18:55:52","Deleted Loan Application ID 36 ","5","105.163.157.98","1");
INSERT INTO audit_trail VALUES("362","2022-12-22 20:00:20","Successfull User Login","1","105.163.157.98","1");
INSERT INTO audit_trail VALUES("363","2022-12-23 07:26:04","Successfull User Login","1","154.153.172.109","1");
INSERT INTO audit_trail VALUES("364","2022-12-23 07:43:47","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720","1","154.153.172.109","1");
INSERT INTO audit_trail VALUES("365","2022-12-23 13:55:45","Successfull User Login","1","154.77.249.178","1");
INSERT INTO audit_trail VALUES("366","2022-12-24 06:39:57","Successfull User Login","1","154.159.237.214","1");
INSERT INTO audit_trail VALUES("367","2022-12-25 16:46:58","Successfull User Login","1","154.159.237.165","1");
INSERT INTO audit_trail VALUES("368","2022-12-30 15:53:23","Successfull User Login","8","41.81.28.227","1");
INSERT INTO audit_trail VALUES("369","2022-12-30 16:38:32","Successfull User Login","1","197.179.88.100","1");
INSERT INTO audit_trail VALUES("370","2023-01-03 20:13:18","Successfull User Login","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("371","2023-01-03 20:30:56","Successfull User Login","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("372","2023-01-03 20:33:20","Successfull User Login","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("373","2023-01-03 20:46:34","Successfull User Login","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("374","2023-01-03 20:48:06","Updated Member details for (Sylvia Njango)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("375","2023-01-03 20:48:13","Updated Member details for (Sylvia Njango)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("376","2023-01-03 20:50:16","Registered new member (Juliet Stonick)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("377","2023-01-03 20:51:19","Updated Member details for (Sylvia Njango)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("378","2023-01-03 20:54:07","Registered new member (Festus Simiyu)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("379","2023-01-03 20:56:00","Registered new member (Thomas Kamau)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("380","2023-01-03 20:57:51","Registered new member (Kamau Muitiriri)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("381","2023-01-03 21:01:34","Registered new member (Kelvin Njoroge)","1","105.161.100.206","1");
INSERT INTO audit_trail VALUES("382","2023-01-03 21:02:41","Successfull User Login","6","41.90.69.185","1");
INSERT INTO audit_trail VALUES("383","2023-01-03 21:05:47","Registered new member (Samuel Njoroge)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("384","2023-01-03 21:08:07","Successfull User Login","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("385","2023-01-03 21:12:46","Updated Member details for (Sylvia Njango)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("386","2023-01-03 21:13:33","Updated Member details for (Juliet Stonick)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("387","2023-01-03 21:14:08","Updated Member details for (Festus Simiyu)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("388","2023-01-03 21:14:59","Updated Member details for (Thomas Kamau)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("389","2023-01-03 21:16:17","Updated Member details for (Kelvin Njoroge)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("390","2023-01-03 21:17:07","Updated Member details for (Kamau Muitiriri)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("391","2023-01-03 21:18:08","Updated Member details for (Samuel Njoroge)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("392","2023-01-03 21:21:22","Registered new member (Charles Macharia)","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("393","2023-01-03 21:47:15","Successfull User Login","11","154.159.237.239","1");
INSERT INTO audit_trail VALUES("394","2023-01-03 21:49:38","Successfull User Login","1","154.159.237.239","1");
INSERT INTO audit_trail VALUES("395","2023-01-03 22:04:06","Successfull User Login","12","196.106.46.247","1");
INSERT INTO audit_trail VALUES("396","2023-01-03 22:07:58","Successfull User Login","14","196.250.212.171","1");
INSERT INTO audit_trail VALUES("397","2023-01-03 22:14:13","Successfull User Login","18","102.217.157.210","1");
INSERT INTO audit_trail VALUES("398","2023-01-04 07:53:45","Successfull User Login","1","105.54.159.100","1");
INSERT INTO audit_trail VALUES("399","2023-01-04 22:02:52","Successfull User Login","1","154.159.237.20","1");
INSERT INTO audit_trail VALUES("400","2023-01-04 22:23:33","Successfull User Login","1","154.159.237.20","1");
INSERT INTO audit_trail VALUES("401","2023-01-04 22:33:10","Successfull User Login","1","154.159.237.20","1");
INSERT INTO audit_trail VALUES("402","2023-01-05 09:14:35","Successfull User Login","15","154.159.252.82","1");
INSERT INTO audit_trail VALUES("403","2023-01-05 13:29:36","Successfull User Login","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("404","2023-01-05 13:34:12","Registered new member contribution (Sylvia Njango)","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("405","2023-01-05 20:47:23","Successfull User Login","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("406","2023-01-05 20:48:09","Successfull User Login","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("407","2023-01-05 20:49:41","Registered new member contribution (Timothy Kipkemei Arusei)","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("408","2023-01-05 20:50:33","Registered new member contribution (Timothy Kipkemei Arusei)","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("409","2023-01-05 20:51:51","Declined Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 126720","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("410","2023-01-05 21:18:18","Successfull User Login","5","196.201.210.143","1");
INSERT INTO audit_trail VALUES("411","2023-01-05 21:20:18","Registered new member contribution (Timothy Kipkemei Arusei)","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("412","2023-01-05 21:24:06","Registered new member contribution (Timothy Kipkemei Arusei)","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("413","2023-01-05 21:24:57","Registered new member contribution (Timothy Kipkemei Arusei)","1","154.159.252.63","1");
INSERT INTO audit_trail VALUES("414","2023-01-05 22:14:17","Successfull User Login","1","154.159.237.210","1");
INSERT INTO audit_trail VALUES("415","2023-01-06 20:28:46","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("416","2023-01-06 21:50:09","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("417","2023-01-06 21:51:12","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("418","2023-01-06 21:51:46","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("419","2023-01-06 21:52:11","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("420","2023-01-06 21:52:25","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("421","2023-01-06 21:52:46","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("422","2023-01-06 21:53:00","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("423","2023-01-06 21:53:26","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("424","2023-01-06 21:53:49","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("425","2023-01-06 21:54:09","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("426","2023-01-06 21:54:25","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("427","2023-01-06 21:54:51","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("428","2023-01-06 21:55:13","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("429","2023-01-07 09:19:17","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("430","2023-01-07 09:26:26","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("431","2023-01-07 09:29:07","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("432","2023-01-07 09:32:18","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("433","2023-01-07 09:33:06","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("434","2023-01-07 09:33:15","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("435","2023-01-07 09:35:15","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("436","2023-01-07 09:38:19","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("437","2023-01-07 09:38:29","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("438","2023-01-07 09:40:24","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("439","2023-01-07 09:43:16","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("440","2023-01-07 09:44:21","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("441","2023-01-07 09:45:21","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("442","2023-01-07 09:45:46","Successfull User Login","1","105.163.0.189","1");
INSERT INTO audit_trail VALUES("443","2023-01-07 17:05:38","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("444","2023-01-07 20:16:28","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("445","2023-01-08 09:35:52","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("446","2023-01-08 12:11:42","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("447","2023-01-08 16:03:25","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("448","2023-01-09 09:29:18","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("449","2023-01-09 20:36:43","Successfull User Login","1","105.163.156.224","1");
INSERT INTO audit_trail VALUES("450","2023-01-10 18:27:18","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("451","2023-01-10 19:26:56","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("452","2023-01-10 19:36:35","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("453","2023-01-10 19:46:41","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("454","2023-01-10 19:51:06","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("455","2023-01-10 20:37:21","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("456","2023-01-10 20:37:49","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("457","2023-01-10 20:48:54","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("458","2023-01-10 21:37:04","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("459","2023-01-10 21:48:44","Updated Member details for (Lazz Korir)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("460","2023-01-10 21:52:01","Deleted Loan Application ID 29 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("461","2023-01-10 21:52:01","Deleted Loan Application ID 32 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("462","2023-01-10 21:52:01","Deleted Loan Application ID 28 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("463","2023-01-10 21:52:01","Deleted Loan Application ID 20 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("464","2023-01-10 21:52:23","Deleted Loan Application ID 21 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("465","2023-01-10 21:52:23","Deleted Loan Application ID 22 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("466","2023-01-10 21:52:23","Deleted Loan Application ID 23 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("467","2023-01-10 21:52:23","Deleted Loan Application ID 24 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("468","2023-01-10 21:52:33","Deleted Loan Application ID 25 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("469","2023-01-10 21:52:33","Deleted Loan Application ID 26 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("470","2023-01-10 21:52:33","Deleted Loan Application ID 5 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("471","2023-01-10 21:52:33","Deleted Loan Application ID 6 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("472","2023-01-10 21:52:43","Deleted Loan Application ID 7 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("473","2023-01-10 21:53:09","Deleted Loan Application ID 13 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("474","2023-01-10 21:53:09","Deleted Loan Application ID 14 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("475","2023-01-10 21:53:09","Deleted Loan Application ID 15 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("476","2023-01-10 21:53:09","Deleted Loan Application ID 17 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("477","2023-01-10 21:53:09","Deleted Loan Application ID 18 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("478","2023-01-10 21:53:09","Deleted Loan Application ID 19 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("479","2023-01-10 21:53:21","Deleted Loan Application ID 4 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("480","2023-01-10 21:53:54","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("481","2023-01-10 21:56:27","Deleted Loan Application ID 36 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("482","2023-01-10 21:56:52","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("483","2023-01-10 21:58:35","Deleted Loan Application ID 37 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("484","2023-01-10 21:59:06","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("485","2023-01-10 22:01:23","Deleted Loan Application ID 38 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("486","2023-01-10 22:01:38","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("487","2023-01-10 22:04:41","Deleted Loan Application ID 39 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("488","2023-01-10 22:05:42","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("489","2023-01-10 22:15:53","Deleted Loan Application ID 40 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("490","2023-01-10 22:16:10","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("491","2023-01-10 22:19:21","Deleted Loan Application ID 41 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("492","2023-01-10 22:19:27","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("493","2023-01-10 22:21:27","Deleted Loan Application ID 42 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("494","2023-01-10 22:21:35","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("495","2023-01-10 23:02:50","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("496","2023-01-10 23:04:12","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("497","2023-01-10 23:04:38","Updated Member details for (Lazz Korir)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("498","2023-01-11 06:03:27","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("499","2023-01-11 06:07:05","Deleted Loan Application ID 43 ","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("500","2023-01-11 06:07:40","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("501","2023-01-11 06:47:30","Updated loan No. 58/2023 (Timothy Kipkemei Arusei )","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("502","2023-01-11 10:44:07","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("503","2023-01-11 14:22:05","Successfull User Login","15","105.160.123.108","1");
INSERT INTO audit_trail VALUES("504","2023-01-11 17:48:20","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("505","2023-01-11 18:11:48","Updated loan No. 58/2023 (Timothy Kipkemei Arusei )","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("506","2023-01-11 18:11:58","Updated loan No. 58/2023 (Timothy Kipkemei Arusei )","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("507","2023-01-11 22:33:33","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("508","2023-01-11 23:09:49","Posted new Expense (Test expense)","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("509","2023-01-11 23:10:01","Updated Expense Details for (Test expense) ID: 6","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("510","2023-01-11 23:17:32","Updated loan No. 58/2023 (Timothy Kipkemei Arusei )","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("511","2023-01-12 13:50:15","Successfull User Login","1","154.154.70.2","1");
INSERT INTO audit_trail VALUES("512","2023-01-12 16:54:08","Successfull User Login","1","197.248.16.53","1");
INSERT INTO audit_trail VALUES("513","2023-01-12 19:57:03","Successfull User Login","1","105.163.157.161","1");
INSERT INTO audit_trail VALUES("514","2023-01-13 16:03:47","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("515","2023-01-13 17:04:15","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("516","2023-01-13 17:20:54","Approved Guarantee for Loan Application No. (58/2023)  for (Timothy Kipkemei Arusei) Amount : 400.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("517","2023-01-13 17:25:00","Declined Guarantee Request for Loan Application No. (58/2023)  for (Timothy Kipkemei Arusei) Amount : 400.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("518","2023-01-13 17:31:49","Approved Guarantee for Loan Application No. (58/2023)  for (Timothy Kipkemei Arusei) Amount : 12.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("519","2023-01-13 17:36:04","Approved Guarantee for Loan Application No. (58/2023)  for (Timothy Kipkemei Arusei) Amount : 12.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("520","2023-01-13 17:36:54","Approved Guarantee for Loan Application No. (58/2023)  for (Timothy Kipkemei Arusei) Amount : 12.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("521","2023-01-13 17:40:47","Approved Guarantee for Loan Application No. (58/2023)  for (Timothy Kipkemei Arusei) Amount : 12,000.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("522","2023-01-13 17:44:22","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 50000","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("523","2023-01-13 18:31:52","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("524","2023-01-13 18:32:23","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("525","2023-01-13 18:34:44","Approved Guarantee for Loan Application No. (59/2023)  for (Timothy Kipkemei Arusei) Amount : 400.00","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("526","2023-01-13 18:54:46","Deleted Loan Application ID 45 ","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("527","2023-01-13 18:55:07","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("528","2023-01-13 18:56:44","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("529","2023-01-13 19:59:01","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("530","2023-01-13 20:53:29","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("531","2023-01-14 08:41:19","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("532","2023-01-14 10:34:29","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("533","2023-01-14 11:56:04","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("534","2023-01-14 11:58:36","Updated Company Details","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("535","2023-01-14 11:58:46","Updated Company Details","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("536","2023-01-14 12:52:10","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("537","2023-01-14 12:58:24","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("538","2023-01-14 14:23:26","Successfull User Login","1","105.163.156.239","1");
INSERT INTO audit_trail VALUES("539","2023-01-15 10:56:02","Successfull User Login","1","41.80.114.224","1");
INSERT INTO audit_trail VALUES("540","2023-01-15 17:10:22","Successfull User Login","15","196.250.212.158","1");
INSERT INTO audit_trail VALUES("541","2023-01-15 22:52:24","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("542","2023-01-15 23:07:10","Updated Member details for (Timothy Kipkemei Arusei)","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("543","2023-01-15 23:54:58","Updated Configuration Details","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("544","2023-01-15 23:56:08","Updated Configuration Details","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("545","2023-01-15 23:56:55","Updated Configuration Details","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("546","2023-01-15 23:57:02","Updated Configuration Details","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("547","2023-01-16 18:13:07","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("548","2023-01-16 20:20:56","Successfull User Login","9","105.163.2.46","1");
INSERT INTO audit_trail VALUES("549","2023-01-16 20:22:11","Registered new member contribution (Beth Kananu)","9","105.163.2.46","1");
INSERT INTO audit_trail VALUES("550","2023-01-16 20:22:55","Successfull User Login","16","105.163.1.100","1");
INSERT INTO audit_trail VALUES("551","2023-01-16 20:23:54","Cancelled Contribution for (Beth Kananu) TXN ID :- QLV9F2VX0D","9","105.163.2.46","1");
INSERT INTO audit_trail VALUES("552","2023-01-16 20:25:00","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("553","2023-01-16 20:25:07","Successfull User Login","14","196.250.212.137","1");
INSERT INTO audit_trail VALUES("554","2023-01-16 20:25:53","Applied for loan (Beth Kananu)","9","105.163.2.46","1");
INSERT INTO audit_trail VALUES("555","2023-01-16 20:27:53","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("556","2023-01-16 20:29:39","Successfull User Login","5","105.163.42.20","1");
INSERT INTO audit_trail VALUES("557","2023-01-16 20:31:09","Approved Member Loan Application  for (Beth Kananu) Amount : 8000","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("558","2023-01-16 21:35:44","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("559","2023-01-16 22:13:09","Successfull User Login","5","105.163.42.20","1");
INSERT INTO audit_trail VALUES("560","2023-01-17 06:18:13","Successfull User Login","13","196.108.233.81","1");
INSERT INTO audit_trail VALUES("561","2023-01-17 06:48:50","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("562","2023-01-17 09:09:34","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("563","2023-01-17 09:21:30","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("564","2023-01-17 10:43:25","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("565","2023-01-17 11:51:59","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("566","2023-01-17 18:02:53","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("567","2023-01-17 20:11:33","Successfull User Login","1","105.163.0.142","1");
INSERT INTO audit_trail VALUES("568","2023-01-18 17:43:02","Successfull User Login","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("569","2023-01-20 21:13:28","Successfull User Login","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("570","2023-01-20 21:15:12","Updated Configuration Details","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("571","2023-01-20 21:16:38","Updated Configuration Details","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("572","2023-01-20 22:06:01","Successfull User Login","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("573","2023-01-21 11:31:09","Successfull User Login","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("574","2023-01-21 13:08:59","Successfull User Login","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("575","2023-01-21 16:21:23","Successfull User Login","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("576","2023-01-21 16:24:53","Deleted Loan Application ID 46 ","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("577","2023-01-21 16:26:42","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.1.41","1");
INSERT INTO audit_trail VALUES("578","2023-01-21 22:28:14","Successfull User Login","5","105.163.51.79","1");
INSERT INTO audit_trail VALUES("579","2023-01-22 09:40:03","Successfull User Login","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("580","2023-01-22 09:40:41","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("581","2023-01-22 12:38:39","Successfull User Login","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("582","2023-01-22 14:07:10","Successfull User Login","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("583","2023-01-22 14:09:11","Added new Role (Add member contribution)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("584","2023-01-22 14:09:27","Added new Role (Approve Loan Application)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("585","2023-01-22 14:09:42","Added new Role (Approve Expenses)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("586","2023-01-22 14:10:30","Added new Role (View All Member Contributions and Loans)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("587","2023-01-22 14:10:55","Updated User Role (Approve Expense)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("588","2023-01-22 14:10:59","Updated User Role (Approve Expenses)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("589","2023-01-22 14:11:34","Added new Role (Register Members)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("590","2023-01-22 14:13:14","Updated User Role (Register and Manage Members)","1","105.163.157.102","1");
INSERT INTO audit_trail VALUES("591","2023-01-22 15:36:51","Successfull User Login","5","105.163.36.176","1");
INSERT INTO audit_trail VALUES("592","2023-01-22 16:06:24","Successfull User Login","1","105.163.158.134","1");
INSERT INTO audit_trail VALUES("593","2023-01-25 07:54:37","Successfull User Login","1","105.163.156.95","1");
INSERT INTO audit_trail VALUES("594","2023-01-25 13:59:25","Successfull User Login","5","105.163.26.160","1");
INSERT INTO audit_trail VALUES("595","2023-01-25 14:01:08","Registered new member contribution (Lazz Korir)","5","105.163.26.160","1");
INSERT INTO audit_trail VALUES("596","2023-01-25 14:01:29","Registered new member contribution (Lazz Korir)","5","105.163.26.160","1");
INSERT INTO audit_trail VALUES("597","2023-01-25 14:01:58","Registered new member contribution (Lazz Korir)","5","105.163.26.160","1");
INSERT INTO audit_trail VALUES("598","2023-01-25 14:41:03","Successfull User Login","1","105.163.1.96","1");
INSERT INTO audit_trail VALUES("599","2023-01-25 14:42:59","Updated loan No. 62/2023 (Timothy Kipkemei Arusei )","1","105.163.1.96","1");
INSERT INTO audit_trail VALUES("600","2023-01-25 14:44:10","Updated loan No. 62/2023 (Timothy Kipkemei Arusei )","1","105.163.1.96","1");
INSERT INTO audit_trail VALUES("601","2023-01-25 14:44:43","Updated loan No. 62/2023 (Timothy Kipkemei Arusei )","1","105.163.1.96","1");
INSERT INTO audit_trail VALUES("602","2023-01-25 14:51:16","Updated loan No. 62/2023 (Timothy Kipkemei Arusei )","1","105.163.1.96","1");
INSERT INTO audit_trail VALUES("603","2023-01-25 14:52:25","Updated loan No. 62/2023 (Timothy Kipkemei Arusei )","1","105.163.1.96","1");
INSERT INTO audit_trail VALUES("604","2023-01-26 12:45:44","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("605","2023-01-26 23:07:00","Successfull User Login","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("606","2023-01-27 22:35:41","Successfull User Login","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("607","2023-01-28 09:11:29","Successfull User Login","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("608","2023-01-28 16:49:39","Successfull User Login","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("609","2023-01-28 17:03:28","Updated Member Contribution for (Lazz Korir) ID: 1","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("610","2023-01-28 17:03:33","Updated Member Contribution for (Lazz Korir) ID: 1","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("611","2023-01-28 18:59:44","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("612","2023-01-28 19:07:31","Successfull User Login","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("613","2023-01-28 19:08:20","Registered new member contribution (Sylvia Njango)","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("614","2023-01-28 19:08:50","Deleted Contribution Item for (Sylvia Njango) ","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("615","2023-01-28 19:09:55","Registered new member contribution (Sylvia Njango)","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("616","2023-01-28 19:10:35","Updated Member Contribution for (Sylvia Njango) ID: 2","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("617","2023-01-28 19:10:46","Updated Member Contribution for (Sylvia Njango) ID: 2","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("618","2023-01-28 19:10:50","Updated Member Contribution for (Sylvia Njango) ID: 2","11","105.161.35.105","1");
INSERT INTO audit_trail VALUES("619","2023-01-28 20:23:23","Successfull User Login","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("620","2023-01-28 23:31:56","Successfull User Login","1","105.163.158.200","1");
INSERT INTO audit_trail VALUES("621","2023-01-29 09:18:48","Successfull User Login","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("622","2023-01-29 09:55:18","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("623","2023-01-29 10:00:38","Updated loan No. 62/2023 (Timothy Kipkemei Arusei )","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("624","2023-01-29 10:06:08","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 55000","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("625","2023-01-29 11:01:20","Successfull User Login","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("626","2023-01-29 11:02:36","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("627","2023-01-29 11:09:53","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("628","2023-01-29 11:10:48","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("629","2023-01-29 11:24:21","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("630","2023-01-29 11:26:09","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("631","2023-01-29 11:42:00","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("632","2023-01-29 11:51:17","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("633","2023-01-29 11:52:08","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("634","2023-01-29 11:53:12","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("635","2023-01-29 11:54:28","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("636","2023-01-29 12:02:05","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("637","2023-01-29 12:02:30","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("638","2023-01-29 12:03:18","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("639","2023-01-29 12:04:58","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("640","2023-01-29 12:05:42","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.157.238","1");
INSERT INTO audit_trail VALUES("641","2023-01-29 15:06:20","Successfull User Login","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("642","2023-01-29 15:29:56","Deleted Contribution for (Sylvia Njango) TXN ID :- 324555","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("643","2023-01-29 15:29:57","Deleted Contribution for (Sylvia Njango) TXN ID :- 123345","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("644","2023-01-29 15:29:57","Deleted Contribution for (Timothy Kipkemei Arusei) TXN ID :- 21456","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("645","2023-01-29 15:29:57","Deleted Contribution for (Timothy Kipkemei Arusei) TXN ID :- 21456","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("646","2023-01-29 15:29:57","Deleted Contribution for (Timothy Kipkemei Arusei) TXN ID :- 21456","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("647","2023-01-29 15:29:57","Deleted Contribution for ( ) TXN ID :- ","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("648","2023-01-29 15:29:58","Deleted Contribution for ( ) TXN ID :- ","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("649","2023-01-29 15:29:58","Deleted Contribution for ( ) TXN ID :- ","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("650","2023-01-29 15:30:10","Deleted Contribution for ( ) TXN ID :- ","1","105.163.156.225","1");
INSERT INTO audit_trail VALUES("651","2023-01-29 21:43:52","Successfull User Login","1","105.163.2.164","1");
INSERT INTO audit_trail VALUES("652","2023-01-30 09:47:47","Successfull User Login","1","105.163.2.164","1");
INSERT INTO audit_trail VALUES("653","2023-01-30 18:54:33","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("654","2023-01-30 20:20:54","Successfull User Login","14","196.250.212.186","1");
INSERT INTO audit_trail VALUES("655","2023-01-30 20:30:23","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("656","2023-01-30 20:35:08","Registered new member contribution (Duncan Omwoyo)","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("657","2023-01-30 20:41:34","Registered new member contribution (Beth Kananu)","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("658","2023-01-30 20:46:52","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("659","2023-01-30 20:47:58","Successfull User Login","5","105.163.26.160","1");
INSERT INTO audit_trail VALUES("660","2023-01-30 20:48:08","Successfull User Login","8","102.68.78.50","1");
INSERT INTO audit_trail VALUES("661","2023-01-30 20:49:49","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 56000","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("662","2023-01-30 20:57:54","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("663","2023-01-30 20:58:35","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("664","2023-01-30 20:59:25","Updated loan No. 64/2023 (Timothy Kipkemei Arusei )","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("665","2023-01-30 21:00:14","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("666","2023-01-30 21:07:39","Updated loan No. 64/2023 (Timothy Kipkemei Arusei )","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("667","2023-01-31 09:38:34","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("668","2023-01-31 11:12:59","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("669","2023-01-31 16:43:56","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("670","2023-01-31 18:11:36","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("671","2023-01-31 18:59:24","Registered new member contribution (Timothy Kipkemei Arusei)","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("672","2023-01-31 19:00:30","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 23","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("673","2023-01-31 20:10:16","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("674","2023-01-31 22:33:33","Successfull User Login","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("675","2023-01-31 22:45:23","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","105.163.158.53","1");
INSERT INTO audit_trail VALUES("676","2023-02-02 15:05:20","Successfull User Login","1","105.163.1.120","1");
INSERT INTO audit_trail VALUES("677","2023-02-03 20:30:01","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("678","2023-02-04 11:22:19","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("679","2023-02-04 16:50:38","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("680","2023-02-04 20:34:18","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("681","2023-02-06 19:25:23","Successfull User Login","1","105.163.1.68","1");
INSERT INTO audit_trail VALUES("682","2023-02-06 20:13:27","Successfull User Login","5","41.90.59.15","1");
INSERT INTO audit_trail VALUES("683","2023-02-06 20:34:37","Registered new member contribution (Timothy Kipkemei Arusei)","5","41.90.59.15","1");
INSERT INTO audit_trail VALUES("684","2023-02-06 20:35:57","Registered new member contribution (Sammy Gathaiya)","5","41.90.59.15","1");
INSERT INTO audit_trail VALUES("685","2023-02-06 20:37:32","Registered new member contribution (Wilfred Kipng\'etich)","5","41.90.59.15","1");
INSERT INTO audit_trail VALUES("686","2023-02-06 20:38:18","Registered new member contribution (Thomas Kamau)","5","41.90.59.15","1");
INSERT INTO audit_trail VALUES("687","2023-02-06 20:39:21","Registered new member contribution (Sylvia Njango)","5","41.90.59.15","1");
INSERT INTO audit_trail VALUES("688","2023-02-06 21:04:30","Successfull User Login","1","105.163.1.68","1");
INSERT INTO audit_trail VALUES("689","2023-02-07 11:53:10","Successfull User Login","5","41.90.41.195","1");
INSERT INTO audit_trail VALUES("690","2023-02-07 11:53:56","Successfull User Login","14","196.250.212.174","1");
INSERT INTO audit_trail VALUES("691","2023-02-07 11:56:11","Successfull User Login","18","102.217.157.210","1");
INSERT INTO audit_trail VALUES("692","2023-02-07 11:59:10","Successfull User Login","1","197.232.26.189","1");
INSERT INTO audit_trail VALUES("693","2023-02-07 12:10:08","Updated Member details for (Timothy Kipkemei Arusei)","1","197.232.26.189","1");
INSERT INTO audit_trail VALUES("694","2023-02-07 14:01:53","Successfull User Login","1","105.163.1.68","1");
INSERT INTO audit_trail VALUES("695","2023-02-07 14:41:59","Successfull User Login","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("696","2023-02-07 14:44:47","Registered new member contribution (Lazz Korir)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("697","2023-02-07 15:24:56","Successfull User Login","1","105.163.158.42","1");
INSERT INTO audit_trail VALUES("698","2023-02-07 18:19:51","Successfull User Login","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("699","2023-02-07 18:20:59","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("700","2023-02-07 18:21:45","Registered new member contribution (Sammy Gathaiya)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("701","2023-02-07 18:22:33","Registered new member contribution (Wilfred Kipng\'etich)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("702","2023-02-07 18:23:15","Registered new member contribution (Philip Njuguna)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("703","2023-02-07 18:23:54","Registered new member contribution (Beth Kananu)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("704","2023-02-07 18:24:40","Registered new member contribution (Duncan Omwoyo)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("705","2023-02-07 18:25:25","Registered new member contribution (Sylvia Njango)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("706","2023-02-07 18:26:05","Registered new member contribution (Juliet Stonick)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("707","2023-02-07 18:26:51","Registered new member contribution (Festus Simiyu)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("708","2023-02-07 18:27:42","Registered new member contribution (Thomas Kamau)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("709","2023-02-07 18:28:22","Registered new member contribution (Kelvin Njoroge)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("710","2023-02-07 18:29:04","Registered new member contribution (Samuel Njoroge)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("711","2023-02-07 18:29:43","Registered new member contribution (Charles Macharia)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("712","2023-02-07 18:31:40","Updated Member Contribution for (Lazz Korir) ID: 1","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("713","2023-02-07 19:46:49","Successfull User Login","1","105.163.158.42","1");
INSERT INTO audit_trail VALUES("714","2023-02-08 21:05:50","Successfull User Login","1","105.163.158.42","1");
INSERT INTO audit_trail VALUES("715","2023-02-09 09:11:57","Successfull User Login","1","105.163.158.42","1");
INSERT INTO audit_trail VALUES("716","2023-02-10 17:41:12","Successfull User Login","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("717","2023-02-10 17:45:13","Successfull User Login","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("718","2023-02-10 17:46:54","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("719","2023-02-10 17:48:21","Updated Member details for (Timothy Kipkemei Arusei)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("720","2023-02-10 17:52:49","Registered new member contribution (Charles Macharia)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("721","2023-02-10 17:55:14","Registered new member contribution (Lazz Korir)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("722","2023-02-10 17:56:05","Registered new member contribution (Charles Macharia)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("723","2023-02-10 17:56:16","Updated Member Contribution for (Lazz Korir) ID: 23","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("724","2023-02-10 17:57:11","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 21","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("725","2023-02-10 17:57:31","Updated Member Contribution for (Charles Macharia) ID: 22","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("726","2023-02-10 17:57:51","Updated Member Contribution for (Lazz Korir) ID: 23","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("727","2023-02-10 18:00:51","Registered new member contribution (Charles Macharia)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("728","2023-02-10 18:01:20","Deleted Contribution Item for (Charles Macharia) ","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("729","2023-02-10 18:03:26","Registered new member contribution (Sammy Gathaiya)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("730","2023-02-10 18:03:57","Registered new member contribution (Samuel Njoroge)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("731","2023-02-10 18:06:48","Registered new member contribution (Samuel Njoroge)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("732","2023-02-10 18:09:25","Registered new member contribution (Samuel Njoroge)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("733","2023-02-10 18:09:49","Registered new member contribution (Wilfred Kipng\'etich)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("734","2023-02-10 18:12:17","Registered new member contribution (Kelvin Njoroge)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("735","2023-02-10 18:13:52","Registered new member contribution (Philip Njuguna)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("736","2023-02-10 18:15:10","Registered new member contribution (Kelvin Njoroge)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("737","2023-02-10 18:17:30","Registered new member contribution (Beth Kananu)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("738","2023-02-10 18:18:15","Registered new member contribution (Kelvin Njoroge)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("739","2023-02-10 18:19:36","Deleted Contribution Item for (Kelvin Njoroge) ","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("740","2023-02-10 18:21:57","Registered new member contribution (Duncan Omwoyo)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("741","2023-02-10 18:23:48","Registered new member contribution (Thomas Kamau)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("742","2023-02-10 18:26:41","Registered new member contribution (Thomas Kamau)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("743","2023-02-10 18:29:42","Registered new member contribution (Thomas Kamau)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("744","2023-02-10 18:29:50","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("745","2023-02-10 18:32:57","Registered new member contribution (Festus Simiyu)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("746","2023-02-10 18:33:58","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("747","2023-02-10 18:35:40","Registered new member contribution (Festus Simiyu)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("748","2023-02-10 18:38:11","Registered new member contribution (Festus Simiyu)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("749","2023-02-10 18:38:41","Registered new member contribution (Lazz Korir)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("750","2023-02-10 18:42:31","Registered new member contribution (Lazz Korir)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("751","2023-02-10 18:43:27","Registered new member contribution (Juliet Stonick)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("752","2023-02-10 18:44:18","Deleted Contribution Item for (Lazz Korir) ","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("753","2023-02-10 18:48:05","Registered new member contribution (Juliet Stonick)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("754","2023-02-10 18:48:23","Registered new member contribution (Sammy Gathaiya)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("755","2023-02-10 18:50:20","Registered new member contribution (Juliet Stonick)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("756","2023-02-10 18:51:42","Registered new member contribution (Sammy Gathaiya)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("757","2023-02-10 18:52:05","Deleted Contribution Item for (Sammy Gathaiya) ","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("758","2023-02-10 18:53:03","Registered new member contribution (Sylvia Njango)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("759","2023-02-10 18:55:37","Registered new member contribution (Sylvia Njango)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("760","2023-02-10 18:55:55","Registered new member contribution (Wilfred Kipng\'etich)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("761","2023-02-10 18:58:01","Registered new member contribution (Sylvia Njango)","1","105.163.156.178","1");
INSERT INTO audit_trail VALUES("762","2023-02-10 19:00:20","Registered new member contribution (Wilfred Kipng\'etich)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("763","2023-02-10 19:00:50","Deleted Contribution Item for (Wilfred Kipng\'etich) ","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("764","2023-02-10 19:04:03","Registered new member contribution (Philip Njuguna)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("765","2023-02-10 19:07:19","Registered new member contribution (Philip Njuguna)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("766","2023-02-10 19:15:18","Registered new member contribution (Beth Kananu)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("767","2023-02-10 19:18:48","Registered new member contribution (Beth Kananu)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("768","2023-02-10 19:21:42","Registered new member contribution (Duncan Omwoyo)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("769","2023-02-10 19:24:49","Registered new member contribution (Duncan Omwoyo)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("770","2023-02-10 19:36:47","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("771","2023-02-10 19:37:57","Applied for loan (Charles Macharia)","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("772","2023-02-10 19:38:20","Registered new member contribution (Lazz Korir)","5","105.163.38.178","1");
INSERT INTO audit_trail VALUES("773","2023-02-10 19:39:53","Successfull User Login","8","105.163.0.180","1");
INSERT INTO audit_trail VALUES("774","2023-02-10 19:41:27","Applied for loan (Philip Njuguna)","8","105.163.0.180","1");
INSERT INTO audit_trail VALUES("775","2023-02-10 19:43:30","Deleted Loan Application ID 1 ","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("776","2023-02-10 20:05:07","Successfull User Login","13","105.235.158.175","1");
INSERT INTO audit_trail VALUES("777","2023-02-10 21:19:45","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("778","2023-02-10 21:28:48","Applied for loan (Sylvia Njango)","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("779","2023-02-10 21:47:09","Successfull User Login","13","105.235.158.175","1");
INSERT INTO audit_trail VALUES("780","2023-02-13 11:53:13","Successfull User Login","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("781","2023-02-13 11:56:57","Registered new member contribution (Samuel Njoroge)","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("782","2023-02-13 17:09:50","Successfull User Login","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("783","2023-02-13 17:19:29","Successfull User Login","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("784","2023-02-13 17:21:49","Registered new member contribution (Kelvin Njoroge)","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("785","2023-02-13 17:23:02","Registered new member contribution (Kelvin Njoroge)","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("786","2023-02-13 20:05:20","Successfull User Login","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("787","2023-02-13 20:10:57","Successfull User Login","6","41.90.68.44","1");
INSERT INTO audit_trail VALUES("788","2023-02-13 20:11:36","Successfull User Login","8","102.68.78.50","1");
INSERT INTO audit_trail VALUES("789","2023-02-13 20:13:25","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("790","2023-02-13 20:13:35","Updated Member details for (Timothy Kipkemei Arusei)","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("791","2023-02-13 20:13:51","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("792","2023-02-13 20:15:34","Applied for loan (Timothy Kipkemei Arusei)","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("793","2023-02-13 20:16:59","Successfull User Login","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("794","2023-02-13 20:17:04","Successfull User Login","16","41.90.64.58","1");
INSERT INTO audit_trail VALUES("795","2023-02-13 20:17:21","Approved Member Loan Application  for (Philip Njuguna) Amount : 25000","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("796","2023-02-13 20:23:22","Applied for loan (Charles Macharia)","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("797","2023-02-13 20:24:16","Deleted Loan Application ID 5 ","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("798","2023-02-13 20:25:01","Registered new member contribution (Beth Kananu)","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("799","2023-02-13 20:58:42","Successfull User Login","5","41.90.40.67","1");
INSERT INTO audit_trail VALUES("800","2023-02-13 21:04:43","Updated Configuration Details","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("801","2023-02-13 21:05:30","Updated Configuration Details","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("802","2023-02-13 21:06:10","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("803","2023-02-13 21:09:23","Successfull User Login","6","41.90.68.44","1");
INSERT INTO audit_trail VALUES("804","2023-02-14 10:26:55","Successfull User Login","1","105.163.156.191","1");
INSERT INTO audit_trail VALUES("805","2023-02-15 13:17:19","Successfull User Login","1","105.163.156.74","1");
INSERT INTO audit_trail VALUES("806","2023-02-15 14:43:04","Successfull User Login","1","105.163.156.74","1");
INSERT INTO audit_trail VALUES("807","2023-02-15 14:58:57","Successfull User Login","6","41.84.143.206","1");
INSERT INTO audit_trail VALUES("808","2023-02-15 19:51:56","Successfull User Login","1","105.163.156.74","1");
INSERT INTO audit_trail VALUES("809","2023-02-15 22:18:33","Successfull User Login","1","105.163.156.74","1");
INSERT INTO audit_trail VALUES("810","2023-02-16 16:22:43","Successfull User Login","1","105.163.158.243","1");
INSERT INTO audit_trail VALUES("811","2023-02-17 09:50:47","Successfull User Login","5","41.80.240.147","1");
INSERT INTO audit_trail VALUES("812","2023-02-17 09:54:23","Registered new member contribution (Juliet Stonick)","5","41.80.240.147","1");
INSERT INTO audit_trail VALUES("813","2023-02-17 22:18:55","Successfull User Login","1","105.163.1.30","1");
INSERT INTO audit_trail VALUES("814","2023-02-18 21:46:22","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("815","2023-02-19 09:42:47","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("816","2023-02-19 10:38:01","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("817","2023-02-20 11:23:38","Successfull User Login","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("818","2023-02-20 11:26:22","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("819","2023-02-20 15:17:08","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("820","2023-02-20 19:55:09","Successfull User Login","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("821","2023-02-20 19:56:19","Registered new member contribution (Philip Njuguna)","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("822","2023-02-20 19:57:52","Registered new member contribution (Festus Simiyu)","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("823","2023-02-20 20:08:23","Successfull User Login","1","105.163.0.117","1");
INSERT INTO audit_trail VALUES("824","2023-02-20 20:16:31","Successfull User Login","14","196.250.212.187","1");
INSERT INTO audit_trail VALUES("825","2023-02-20 20:19:52","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("826","2023-02-20 20:20:53","Registered new member contribution (Timothy Kipkemei Arusei)","5","105.163.46.2","1");
INSERT INTO audit_trail VALUES("827","2023-02-22 19:06:35","Successfull User Login","5","178.162.198.18","1");
INSERT INTO audit_trail VALUES("828","2023-02-22 19:08:26","Registered new member contribution (Thomas Kamau)","5","178.162.198.18","1");
INSERT INTO audit_trail VALUES("829","2023-02-22 19:24:29","Successfull User Login","1","105.163.2.129","1");
INSERT INTO audit_trail VALUES("830","2023-02-22 21:25:30","Successfull User Login","5","212.103.50.78","1");
INSERT INTO audit_trail VALUES("831","2023-02-22 21:25:47","Updated Member Contribution for (Thomas Kamau) ID: 74","5","212.103.50.78","1");
INSERT INTO audit_trail VALUES("832","2023-02-23 08:45:00","Successfull User Login","1","105.163.158.149","1");
INSERT INTO audit_trail VALUES("833","2023-02-24 14:45:25","Successfull User Login","16","197.232.41.137","1");
INSERT INTO audit_trail VALUES("834","2023-02-25 17:29:01","Successfull User Login","1","105.163.1.118","1");
INSERT INTO audit_trail VALUES("835","2023-02-25 22:22:41","Successfull User Login","1","105.163.1.118","1");
INSERT INTO audit_trail VALUES("836","2023-02-27 19:55:59","Successfull User Login","1","105.163.1.56","1");
INSERT INTO audit_trail VALUES("837","2023-02-27 20:12:11","Successfull User Login","8","102.68.78.50","1");
INSERT INTO audit_trail VALUES("838","2023-02-27 20:17:49","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("839","2023-02-27 20:19:55","Successfull User Login","6","169.150.227.141","1");
INSERT INTO audit_trail VALUES("840","2023-02-27 20:21:15","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("841","2023-02-27 20:23:33","Successfull User Login","7","41.220.235.88","1");
INSERT INTO audit_trail VALUES("842","2023-02-27 20:24:42","Successfull User Login","14","196.250.212.71","1");
INSERT INTO audit_trail VALUES("843","2023-02-27 20:25:11","Successfull User Login","5","178.162.198.14","1");
INSERT INTO audit_trail VALUES("844","2023-02-27 20:28:56","Updated Member Contribution for (Sylvia Njango) ID: 6","5","178.162.198.14","1");
INSERT INTO audit_trail VALUES("845","2023-02-27 20:47:18","Successfull User Login","7","41.72.199.247","1");
INSERT INTO audit_trail VALUES("846","2023-02-27 20:56:53","Approved Guarantee for Loan Application No. (68/2023)  for (Timothy Kipkemei Arusei) Amount : 25,000.00","7","41.220.235.88","1");
INSERT INTO audit_trail VALUES("847","2023-02-27 21:00:03","Successfull User Login","6","169.150.227.3","1");
INSERT INTO audit_trail VALUES("848","2023-02-27 21:59:59","Successfull User Login","5","178.162.198.14","1");
INSERT INTO audit_trail VALUES("849","2023-02-27 22:02:31","Updated Member Contribution for (Wilfred Kipng\'etich) ID: 4","5","178.162.198.14","1");
INSERT INTO audit_trail VALUES("850","2023-02-27 22:05:18","Approved Member Loan Application  for (Timothy Kipkemei Arusei) Amount : 55000","5","178.162.198.14","1");
INSERT INTO audit_trail VALUES("851","2023-02-27 22:16:04","Registered new member contribution (Wilfred Kipng\'etich)","5","178.162.198.14","1");
INSERT INTO audit_trail VALUES("852","2023-02-28 07:23:56","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("853","2023-02-28 08:38:14","Successfull User Login","1","105.163.1.56","1");
INSERT INTO audit_trail VALUES("854","2023-02-28 19:32:10","Successfull User Login","1","105.163.1.56","1");
INSERT INTO audit_trail VALUES("855","2023-03-02 15:29:06","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("856","2023-03-02 17:06:14","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("857","2023-03-02 17:19:26","Successfull User Login","5","37.58.58.163","1");
INSERT INTO audit_trail VALUES("858","2023-03-02 17:22:28","Registered new member contribution (Charles Macharia)","5","37.58.58.163","1");
INSERT INTO audit_trail VALUES("859","2023-03-02 17:23:33","Registered new member contribution (Charles Macharia)","5","37.58.58.163","1");
INSERT INTO audit_trail VALUES("860","2023-03-02 17:29:39","Registered new member contribution (Sylvia Njango)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("861","2023-03-02 17:31:23","Registered new member contribution (Sammy Gathaiya)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("862","2023-03-02 17:32:16","Registered new member contribution (Sammy Gathaiya)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("863","2023-03-02 17:34:20","Registered new member contribution (Philip Njuguna)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("864","2023-03-02 17:39:00","Registered new member contribution (Philip Njuguna)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("865","2023-03-02 17:42:00","Registered new member contribution (Beth Kananu)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("866","2023-03-02 17:44:20","Registered new member contribution (Duncan Omwoyo)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("867","2023-03-02 17:47:30","Registered new member contribution (Thomas Kamau)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("868","2023-03-02 17:49:26","Registered new member contribution (Kelvin Njoroge)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("869","2023-03-02 17:51:08","Registered new member contribution (Samuel Njoroge)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("870","2023-03-02 17:53:25","Registered new member contribution (Lazz Korir)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("871","2023-03-02 21:22:19","Successfull User Login","7","41.60.238.87","1");
INSERT INTO audit_trail VALUES("872","2023-03-02 21:50:40","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("873","2023-03-02 21:51:58","Registered new member contribution (Sylvia Njango)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("874","2023-03-03 19:27:50","Successfull User Login","5","185.107.56.137","1");
INSERT INTO audit_trail VALUES("875","2023-03-03 19:28:44","Registered new member contribution (Thomas Kamau)","5","185.107.56.137","1");
INSERT INTO audit_trail VALUES("876","2023-03-04 08:58:47","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("877","2023-03-04 08:59:28","Applied for loan (Charles Macharia)","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("878","2023-03-04 09:20:31","Successfull User Login","5","185.107.56.136","1");
INSERT INTO audit_trail VALUES("879","2023-03-04 09:20:45","Approved Member Loan Application  for (Charles Macharia) Amount : 33000","5","185.107.56.136","1");
INSERT INTO audit_trail VALUES("880","2023-03-04 10:18:34","Successfull User Login","6","169.150.227.3","1");
INSERT INTO audit_trail VALUES("881","2023-03-04 14:09:01","Successfull User Login","13","105.235.158.176","1");
INSERT INTO audit_trail VALUES("882","2023-03-04 15:01:04","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("883","2023-03-05 12:37:32","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("884","2023-03-05 12:38:58","Registered new member contribution (Juliet Stonick)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("885","2023-03-05 21:34:39","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("886","2023-03-05 21:37:16","Registered new member contribution (Beth Kananu)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("887","2023-03-05 22:41:17","Successfull User Login","5","149.34.244.152","1");
INSERT INTO audit_trail VALUES("888","2023-03-05 22:42:19","Registered new member contribution (Wilfred Kipng\'etich)","5","149.34.244.152","1");
INSERT INTO audit_trail VALUES("889","2023-03-06 13:25:03","Successfull User Login","9","41.90.69.216","1");
INSERT INTO audit_trail VALUES("890","2023-03-06 13:28:08","Approved Guarantee for Loan Application No. (67/2023)  for (Sylvia Njango) Amount : 16,000.00","9","41.90.69.216","1");
INSERT INTO audit_trail VALUES("891","2023-03-06 14:13:24","Successfull User Login","9","41.90.69.216","1");
INSERT INTO audit_trail VALUES("892","2023-03-06 14:14:23","Applied for loan (Beth Kananu)","9","41.90.69.216","1");
INSERT INTO audit_trail VALUES("893","2023-03-06 14:26:15","Successfull User Login","13","102.113.255.242","1");
INSERT INTO audit_trail VALUES("894","2023-03-06 14:35:35","Successfull User Login","5","196.191.60.120","1");
INSERT INTO audit_trail VALUES("895","2023-03-06 14:35:48","Approved Member Loan Application  for (Beth Kananu) Amount : 20000","5","196.191.60.120","1");
INSERT INTO audit_trail VALUES("896","2023-03-06 14:36:07","Approved Member Loan Application  for (Sylvia Njango) Amount : 50000","5","196.191.60.120","1");
INSERT INTO audit_trail VALUES("897","2023-03-06 14:43:09","Applied for loan (Festus Simiyu)","13","102.113.255.242","1");
INSERT INTO audit_trail VALUES("898","2023-03-06 18:22:55","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("899","2023-03-06 20:18:34","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("900","2023-03-06 20:43:11","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("901","2023-03-06 20:43:49","Successfull User Login","6","169.150.227.151","1");
INSERT INTO audit_trail VALUES("902","2023-03-06 20:45:19","Successfull User Login","6","169.150.227.151","1");
INSERT INTO audit_trail VALUES("903","2023-03-06 22:45:49","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("904","2023-03-06 22:51:23","Registered new member contribution (Festus Simiyu)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("905","2023-03-06 22:53:22","Registered new member contribution (Samuel Njoroge)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("906","2023-03-06 22:55:32","Registered new member contribution (Duncan Omwoyo)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("907","2023-03-06 22:56:56","Registered new member contribution (Sammy Gathaiya)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("908","2023-03-07 16:12:18","Successfull User Login","1","196.200.42.148","1");
INSERT INTO audit_trail VALUES("909","2023-03-07 20:29:54","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("910","2023-03-08 11:23:55","Successfull User Login","12","102.220.12.54","1");
INSERT INTO audit_trail VALUES("911","2023-03-08 11:31:41","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("912","2023-03-08 11:56:07","Applied for loan (Juliet Stonick)","12","102.220.12.54","1");
INSERT INTO audit_trail VALUES("913","2023-03-08 12:11:39","Successfull User Login","10","77.75.244.15","1");
INSERT INTO audit_trail VALUES("914","2023-03-08 12:14:51","Approved Guarantee for Loan Application No. (73/2023)  for (Juliet Stonick) Amount : 13,560.00","10","77.75.244.15","1");
INSERT INTO audit_trail VALUES("915","2023-03-08 13:44:28","Successfull User Login","14","196.250.212.103","1");
INSERT INTO audit_trail VALUES("916","2023-03-08 14:05:45","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("917","2023-03-08 16:00:45","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("918","2023-03-08 16:42:20","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("919","2023-03-08 17:41:30","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("920","2023-03-08 21:52:11","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("921","2023-03-08 21:56:14","Approved Member Loan Application  for (Juliet Stonick) Amount : 50000","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("922","2023-03-08 21:57:55","Declined Member Loan Application  for (Festus Simiyu) Amount : 20000","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("923","2023-03-09 13:41:35","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("924","2023-03-09 17:58:18","Successfull User Login","1","105.163.1.166","1");
INSERT INTO audit_trail VALUES("925","2023-03-09 20:58:11","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("926","2023-03-09 23:01:09","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("927","2023-03-09 23:03:13","Registered new member contribution (Timothy Kipkemei Arusei)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("928","2023-03-10 08:34:37","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("929","2023-03-10 11:50:32","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("930","2023-03-10 17:38:50","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("931","2023-03-10 21:14:50","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("932","2023-03-11 11:35:23","Successfull User Login","5","212.102.51.248","1");
INSERT INTO audit_trail VALUES("933","2023-03-11 11:36:33","Registered new member contribution (Charles Macharia)","5","212.102.51.248","1");
INSERT INTO audit_trail VALUES("934","2023-03-11 20:01:40","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("935","2023-03-12 10:50:28","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("936","2023-03-12 15:59:14","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("937","2023-03-12 21:08:34","Successfull User Login","1","105.163.2.232","1");
INSERT INTO audit_trail VALUES("938","2023-03-13 11:13:50","Successfull User Login","18","62.182.98.184","1");
INSERT INTO audit_trail VALUES("939","2023-03-13 14:02:48","Successfull User Login","5","196.190.60.55","1");
INSERT INTO audit_trail VALUES("940","2023-03-13 14:04:51","Registered new member contribution (Thomas Kamau)","5","196.190.60.55","1");
INSERT INTO audit_trail VALUES("941","2023-03-13 16:06:16","Successfull User Login","1","105.163.156.82","1");
INSERT INTO audit_trail VALUES("942","2023-03-13 19:20:48","Successfull User Login","1","105.163.156.82","1");
INSERT INTO audit_trail VALUES("943","2023-03-13 20:14:25","Successfull User Login","1","105.163.156.82","1");
INSERT INTO audit_trail VALUES("944","2023-03-14 20:05:20","Successfull User Login","1","105.163.156.82","1");
INSERT INTO audit_trail VALUES("945","2023-03-15 10:02:12","Successfull User Login","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("946","2023-03-15 10:13:21","Successfull User Login","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("947","2023-03-15 10:15:49","Applied for loan (Festus Simiyu)","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("948","2023-03-15 11:05:12","Successfull User Login","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("949","2023-03-15 11:06:13","Successfull User Login","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("950","2023-03-15 11:08:02","Successfull User Login","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("951","2023-03-15 11:10:25","Updated Member details for (Festus Simiyu)","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("952","2023-03-15 13:07:16","Successfull User Login","13","105.235.158.187","1");
INSERT INTO audit_trail VALUES("953","2023-03-15 17:12:01","Successfull User Login","6","169.150.227.3","1");
INSERT INTO audit_trail VALUES("954","2023-03-15 17:35:14","Successfull User Login","1","105.163.157.89","1");
INSERT INTO audit_trail VALUES("955","2023-03-15 17:57:36","Successfull User Login","5","212.103.50.70","1");
INSERT INTO audit_trail VALUES("956","2023-03-15 17:58:02","Approved Member Loan Application  for (Festus Simiyu) Amount : 30000","5","212.103.50.70","1");
INSERT INTO audit_trail VALUES("957","2023-03-15 18:56:33","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("958","2023-03-17 09:52:06","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("959","2023-03-17 10:49:20","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("960","2023-03-17 20:01:48","Successfull User Login","5","83.143.245.230","1");
INSERT INTO audit_trail VALUES("961","2023-03-17 20:12:52","Registered new member contribution (Samuel Njoroge)","5","83.143.245.230","1");
INSERT INTO audit_trail VALUES("962","2023-03-18 10:37:04","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("963","2023-03-18 11:30:28","Successfull User Login","5","212.103.50.78","1");
INSERT INTO audit_trail VALUES("964","2023-03-18 11:32:06","Applied for loan (Lazz Korir)","5","212.103.50.78","1");
INSERT INTO audit_trail VALUES("965","2023-03-18 14:23:31","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("966","2023-03-18 18:02:34","Successfull User Login","5","212.103.50.78","1");
INSERT INTO audit_trail VALUES("967","2023-03-18 18:06:48","Registered new member contribution (Timothy Kipkemei Arusei)","5","212.103.50.78","1");
INSERT INTO audit_trail VALUES("968","2023-03-18 18:24:47","Successfull User Login","1","105.29.164.26","1");
INSERT INTO audit_trail VALUES("969","2023-03-18 19:09:01","Successfull User Login","1","105.29.164.26","1");
INSERT INTO audit_trail VALUES("970","2023-03-18 19:12:35","Successfull User Login","1","105.29.164.26","1");
INSERT INTO audit_trail VALUES("971","2023-03-19 09:31:50","Successfull User Login","13","102.163.30.75","1");
INSERT INTO audit_trail VALUES("972","2023-03-19 11:26:43","Successfull User Login","5","212.103.50.70","1");
INSERT INTO audit_trail VALUES("973","2023-03-19 11:27:09","Approved Member Loan Application  for (Lazz Korir) Amount : 35000","5","212.103.50.70","1");
INSERT INTO audit_trail VALUES("974","2023-03-19 12:49:22","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("975","2023-03-19 17:44:28","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("976","2023-03-20 19:47:11","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("977","2023-03-20 19:50:06","Registered new member contribution (Thomas Kamau)","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("978","2023-03-20 19:53:54","Successfull User Login","1","105.163.1.215","1");
INSERT INTO audit_trail VALUES("979","2023-03-20 20:02:37","Successfull User Login","14","196.250.212.183","1");
INSERT INTO audit_trail VALUES("980","2023-03-20 20:08:43","Successfull User Login","8","196.105.237.147","1");
INSERT INTO audit_trail VALUES("981","2023-03-20 20:43:58","Successfull User Login","6","169.150.227.148","1");
INSERT INTO audit_trail VALUES("982","2023-03-21 20:35:57","Successfull User Login","6","169.150.227.3","1");
INSERT INTO audit_trail VALUES("983","2023-03-22 13:47:56","Successfull User Login","14","196.250.212.126","1");
INSERT INTO audit_trail VALUES("984","2023-03-23 08:51:58","Successfull User Login","1","41.72.203.226","1");
INSERT INTO audit_trail VALUES("985","2023-03-23 09:07:56","Successfull User Login","1","41.72.203.226","1");
INSERT INTO audit_trail VALUES("986","2023-03-24 20:12:57","Successfull User Login","1","105.163.157.131","1");
INSERT INTO audit_trail VALUES("987","2023-03-24 22:31:18","Successfull User Login","5","196.189.180.180","1");
INSERT INTO audit_trail VALUES("988","2023-03-27 17:02:44","Successfull User Login","6","169.150.227.8","1");
INSERT INTO audit_trail VALUES("989","2023-03-27 18:30:33","Successfull User Login","5","217.138.194.198","1");
INSERT INTO audit_trail VALUES("990","2023-03-27 20:02:48","Successfull User Login","1","105.163.157.126","1");
INSERT INTO audit_trail VALUES("991","2023-03-27 20:25:51","Successfull User Login","11","197.248.99.18","1");
INSERT INTO audit_trail VALUES("992","2023-03-29 11:45:34","Successfull User Login","5","105.163.59.87","1");
INSERT INTO audit_trail VALUES("993","2023-03-29 11:50:18","Registered new member contribution (Philip Njuguna)","5","105.163.59.87","1");
INSERT INTO audit_trail VALUES("994","2023-03-31 21:30:10","Successfull User Login","5","105.163.59.87","1");
INSERT INTO audit_trail VALUES("995","2023-03-31 21:32:57","Registered new member contribution (Sylvia Njango)","5","105.163.59.87","1");
INSERT INTO audit_trail VALUES("996","2023-04-01 09:03:44","Successfull User Login","14","196.250.212.43","1");
INSERT INTO audit_trail VALUES("997","2023-04-01 09:05:55","Applied for loan (Thomas Kamau)","14","196.250.212.43","1");
INSERT INTO audit_trail VALUES("998","2023-04-01 09:10:44","Successfull User Login","13","105.235.158.132","1");
INSERT INTO audit_trail VALUES("999","2023-04-01 11:06:27","Successfull User Login","8","102.68.78.50","1");
INSERT INTO audit_trail VALUES("1000","2023-04-01 11:26:12","Successfull User Login","14","196.250.212.43","1");
INSERT INTO audit_trail VALUES("1001","2023-04-01 12:41:38","Successfull User Login","1","105.163.2.66","1");
INSERT INTO audit_trail VALUES("1002","2023-04-01 15:02:15","Updated Configuration Details","1","105.163.2.66","1");
INSERT INTO audit_trail VALUES("1003","2023-04-01 15:03:57","Updated Configuration Details","1","105.163.2.66","1");
INSERT INTO audit_trail VALUES("1004","2023-04-01 15:07:10","Updated Configuration Details","1","105.163.2.66","1");
INSERT INTO audit_trail VALUES("1005","2023-04-01 15:24:02","Updated Configuration Details","1","105.163.2.66","1");
INSERT INTO audit_trail VALUES("1006","2023-04-01 15:26:55","Updated Configuration Details","1","105.163.2.66","1");


CREATE TABLE `company_details` (
  `id` int(1) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `company_tel` varchar(500) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `town` varchar(100) NOT NULL,
  `physical_address` text NOT NULL,
  `company_pin` varchar(20) NOT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO company_details VALUES("1","Badili Self Help Group","","badiliselfhelpgroup3@gmail.com","P.O.BOX 424","20106","Roysambu, Kenya","","","2022-12-11");


CREATE TABLE `config` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `interest_rate` decimal(5,2) NOT NULL DEFAULT '12.00',
  `loan_formula` int(2) NOT NULL DEFAULT '1',
  `loan_grace_period` int(2) NOT NULL DEFAULT '30',
  `guarantors` int(2) NOT NULL DEFAULT '3',
  `adjust_loan_period` varchar(1) NOT NULL DEFAULT '0',
  `company_logo` varchar(250) NOT NULL,
  `mail_host` varchar(100) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `mail_port` varchar(11) NOT NULL,
  `mail_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO config VALUES("1","18.00","1","30","3","0","images/badili_group_logo.jpeg","mail.badilisacco.co.ke","notifications@badilisacco.co.ke","465","c-?2I8n9EwG&");


CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_date` date NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `brief_description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `loan_application` (
  `appl_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `appl_no` varchar(20) NOT NULL,
  `application_date` date NOT NULL,
  `loan_formula` varchar(1) NOT NULL,
  `interest_rate` decimal(5,2) NOT NULL,
  `loan_amount` varchar(20) NOT NULL,
  `repayment_amount` varchar(20) NOT NULL,
  `installment_amount` varchar(20) NOT NULL,
  `repayment_period` int(11) NOT NULL,
  `guaranteed` varchar(11) NOT NULL DEFAULT '0',
  `guarantors` int(11) NOT NULL DEFAULT '0',
  `approved_by` bigint(20) NOT NULL,
  `comments` text NOT NULL,
  `approval_date` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_application VALUES("2","8","66/2023","2023-02-10","1","18.00","25000","25944.48","6486.12","4","0","0","5","OK","2023-02-13 20:17:20","2023-02-10 19:41:26","1");
INSERT INTO loan_application VALUES("3","11","67/2023","2023-01-30","1","18.00","50000","52272.33","10454.47","5","1","1","5","ok","2023-03-06 14:36:06","2023-02-10 21:28:46","1");
INSERT INTO loan_application VALUES("4","1","68/2023","2023-01-21","1","18.00","55000","57499.56","11499.91","5","1","1","5","ok","2023-02-27 22:05:17","2023-02-13 20:15:31","1");
INSERT INTO loan_application VALUES("6","18","70/2023","2023-03-04","1","18.00","33000","34499.74","6899.95","5","0","0","5","OK","2023-03-04 09:20:45","2023-03-04 08:59:27","1");
INSERT INTO loan_application VALUES("7","9","71/2023","2023-03-06","1","18.00","20000","20908.93","4181.79","5","0","0","5","ok","2023-03-06 14:35:48","2023-03-06 14:14:22","1");
INSERT INTO loan_application VALUES("8","13","72/2023","2023-03-06","1","18.00","20000","20755.58","5188.9","4","0","0","5","Requested by submitter","2023-03-08 21:57:55","2023-03-06 14:43:08","3");
INSERT INTO loan_application VALUES("9","12","73/2023","2023-03-08","1","18.00","50000","52272.33","10454.47","5","1","1","5","ok","2023-03-08 21:56:14","2023-03-08 11:56:06","1");
INSERT INTO loan_application VALUES("10","13","74/2023","2023-03-15","1","18.00","30000","31363.4","6272.68","5","0","0","5","ok","2023-03-15 17:58:01","2023-03-15 10:15:48","1");
INSERT INTO loan_application VALUES("11","5","75/2023","2023-03-18","1","18.00","35000","36590.63","7318.13","5","0","0","5","ok","2023-03-19 11:27:06","2023-03-18 11:32:06","1");
INSERT INTO loan_application VALUES("12","14","76/2023","2023-01-18","1","18.00","20000","20602.98","6867.66","3","0","0","0","","0000-00-00 00:00:00","2023-04-01 09:05:54","0");


CREATE TABLE `loan_guarantors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) NOT NULL,
  `guarantor` int(11) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `comments` text NOT NULL,
  `approval_date` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_guarantors VALUES("1","3","9","16000.00","","2023-03-06 13:28:07","1");
INSERT INTO loan_guarantors VALUES("2","4","7","25000.00","","2023-02-27 20:56:52","1");
INSERT INTO loan_guarantors VALUES("3","9","10","13560.00","","2023-03-08 12:14:50","1");


CREATE TABLE `loan_repayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `repayment_date` date NOT NULL,
  `principal_paid` decimal(10,2) NOT NULL,
  `interest_paid` decimal(10,2) NOT NULL,
  `total_paid` decimal(10,2) NOT NULL,
  `outstanding_balance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `loan_schedule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) NOT NULL,
  `date_due` date NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `amount_paid` decimal(16,2) NOT NULL,
  `principal_paid` decimal(16,2) NOT NULL,
  `interest_amount` decimal(16,2) NOT NULL,
  `principal_bal` decimal(16,2) NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_schedule VALUES("1","2","2023-04-15","6486.12","6500.00","6125.00","375.00","18875.00","2023-03-29","1");
INSERT INTO loan_schedule VALUES("2","2","2023-05-15","6486.12","0.00","0.00","0.00","18875.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("3","2","2023-06-15","6486.12","0.00","0.00","0.00","18875.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("4","2","2023-07-15","6486.12","0.00","0.00","0.00","18875.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("5","4","2023-04-29","11499.91","21000.00","20175.00","825.00","34825.00","2023-03-18","1");
INSERT INTO loan_schedule VALUES("6","4","2023-05-29","11499.91","0.00","0.00","0.00","34825.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("7","4","2023-06-29","11499.91","0.00","0.00","0.00","34825.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("8","4","2023-07-29","11499.91","0.00","0.00","0.00","34825.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("9","4","2023-08-29","11499.91","0.00","0.00","0.00","34825.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("316","6","2023-05-03","6899.95","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("317","6","2023-06-03","6899.95","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("318","6","2023-07-03","6899.95","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("319","6","2023-08-03","6899.95","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("320","6","2023-09-03","6899.95","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("321","7","2023-05-05","4181.79","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("322","7","2023-06-05","4181.79","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("323","7","2023-07-05","4181.79","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("324","7","2023-08-05","4181.79","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("325","7","2023-09-05","4181.79","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("326","3","2023-05-05","10454.47","10700.00","9950.00","750.00","40050.00","2023-04-01","1");
INSERT INTO loan_schedule VALUES("327","3","2023-06-05","10454.47","0.00","0.00","0.00","40050.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("328","3","2023-07-05","10454.47","0.00","0.00","0.00","40050.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("329","3","2023-08-05","10454.47","0.00","0.00","0.00","40050.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("330","3","2023-09-05","10454.47","0.00","0.00","0.00","40050.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("331","9","2023-05-07","10454.47","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("332","9","2023-06-07","10454.47","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("333","9","2023-07-07","10454.47","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("334","9","2023-08-07","10454.47","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("335","9","2023-09-07","10454.47","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("336","10","2023-05-14","6272.68","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("337","10","2023-06-14","6272.68","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("338","10","2023-07-14","6272.68","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("339","10","2023-08-14","6272.68","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("340","10","2023-09-14","6272.68","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("341","11","2023-05-18","7318.13","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("342","11","2023-06-18","7318.13","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("343","11","2023-07-18","7318.13","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("344","11","2023-08-18","7318.13","0.00","0.00","0.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("345","11","2023-09-18","7318.13","0.00","0.00","0.00","0.00","0000-00-00","1");


CREATE TABLE `member_contribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(11) NOT NULL,
  `cr_dr` varchar(1) NOT NULL,
  `loan_id` bigint(20) NOT NULL,
  `contrib_id` bigint(20) NOT NULL,
  `expense_id` bigint(20) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `comments` text NOT NULL,
  `contribution_date` date NOT NULL,
  `contribution_amount` bigint(50) NOT NULL,
  `loan_interest` decimal(16,2) NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=642 DEFAULT CHARSET=utf8mb4;

INSERT INTO member_contribution VALUES("1","5","D","0","1","0","2","","2023-01-25","200","0.00","RAP85V804K","2023-01-25 14:01:58","5","1");
INSERT INTO member_contribution VALUES("2","5","D","0","1","0","3","","2023-01-25","100","0.00","RAP85V804K","2023-01-25 14:01:29","5","1");
INSERT INTO member_contribution VALUES("3","5","D","0","1","0","1","","2023-01-25","3100","0.00","RAP85V804K","2023-01-25 14:01:08","5","1");
INSERT INTO member_contribution VALUES("4","1","D","0","2","0","1","","2023-02-06","1000","0.00","RB601VK4U4","2023-02-06 20:34:37","5","1");
INSERT INTO member_contribution VALUES("5","6","D","0","3","0","1","","2023-02-06","1000","0.00","RB692OEC2P","2023-02-06 20:35:57","5","1");
INSERT INTO member_contribution VALUES("6","7","D","0","4","0","1","","2023-02-06","2800","0.00","RB46X16ULU","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution VALUES("7","7","D","0","4","0","3","","2023-02-06","100","0.00","RB46X16ULU","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution VALUES("8","7","D","0","4","0","2","","2023-02-06","200","0.00","RB46X16ULU","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution VALUES("9","14","D","0","5","0","1","","2023-02-06","1000","0.00","RB49WXYWRB","2023-02-06 20:38:18","5","1");
INSERT INTO member_contribution VALUES("10","11","D","0","6","0","1","","2023-02-06","2800","0.00","RB29ROGUMP","2023-02-06 20:39:21","5","1");
INSERT INTO member_contribution VALUES("11","11","D","0","6","0","3","","2023-02-06","100","0.00","RB29ROGUMP","2023-02-06 20:39:21","5","1");
INSERT INTO member_contribution VALUES("12","11","D","0","6","0","2","","2023-02-06","200","0.00","RB29ROGUMP","2023-02-06 20:39:21","5","1");
INSERT INTO member_contribution VALUES("13","5","D","0","7","0","1","","2022-12-31","3100","0.00","LazzDec","2023-02-07 14:44:46","5","1");
INSERT INTO member_contribution VALUES("14","5","D","0","7","0","3","","2022-12-31","100","0.00","LazzDec","2023-02-07 14:44:46","5","1");
INSERT INTO member_contribution VALUES("15","5","D","0","7","0","2","","2022-12-31","200","0.00","LazzDec","2023-02-07 14:44:46","5","1");
INSERT INTO member_contribution VALUES("16","1","D","0","8","0","1","","2022-12-31","3100","0.00","TimoDec","2023-02-07 18:20:59","5","1");
INSERT INTO member_contribution VALUES("17","1","D","0","8","0","3","","2022-12-31","100","0.00","TimoDec","2023-02-07 18:20:59","5","1");
INSERT INTO member_contribution VALUES("18","1","D","0","8","0","2","","2022-12-31","200","0.00","TimoDec","2023-02-07 18:20:59","5","1");
INSERT INTO member_contribution VALUES("19","6","D","0","9","0","1","","2022-12-31","3100","0.00","SammyDec","2023-02-07 18:21:45","5","1");
INSERT INTO member_contribution VALUES("20","6","D","0","9","0","3","","2022-12-31","100","0.00","SammyDec","2023-02-07 18:21:45","5","1");
INSERT INTO member_contribution VALUES("21","6","D","0","9","0","2","","2022-12-31","200","0.00","SammyDec","2023-02-07 18:21:45","5","1");
INSERT INTO member_contribution VALUES("22","7","D","0","10","0","1","","2022-12-31","3100","0.00","WilfredDec","2023-02-07 18:22:33","5","1");
INSERT INTO member_contribution VALUES("23","7","D","0","10","0","3","","2022-12-31","100","0.00","WilfredDec","2023-02-07 18:22:33","5","1");
INSERT INTO member_contribution VALUES("24","7","D","0","10","0","2","","2022-12-31","200","0.00","WilfredDec","2023-02-07 18:22:33","5","1");
INSERT INTO member_contribution VALUES("25","8","D","0","11","0","1","","2022-12-31","3100","0.00","PhilipDec","2023-02-07 18:23:15","5","1");
INSERT INTO member_contribution VALUES("26","8","D","0","11","0","3","","2022-12-31","100","0.00","PhilipDec","2023-02-07 18:23:15","5","1");
INSERT INTO member_contribution VALUES("27","8","D","0","11","0","2","","2022-12-31","200","0.00","PhilipDec","2023-02-07 18:23:15","5","1");
INSERT INTO member_contribution VALUES("28","9","D","0","12","0","1","","2022-12-31","3100","0.00","BethDec","2023-02-07 18:23:54","5","1");
INSERT INTO member_contribution VALUES("29","9","D","0","12","0","3","","2022-12-31","100","0.00","BethDec","2023-02-07 18:23:54","5","1");
INSERT INTO member_contribution VALUES("30","9","D","0","12","0","2","","2022-12-31","200","0.00","BethDec","2023-02-07 18:23:54","5","1");
INSERT INTO member_contribution VALUES("31","10","D","0","13","0","1","","2022-12-31","3100","0.00","DuncanDec","2023-02-07 18:24:39","5","1");
INSERT INTO member_contribution VALUES("32","10","D","0","13","0","3","","2022-12-31","100","0.00","DuncanDec","2023-02-07 18:24:39","5","1");
INSERT INTO member_contribution VALUES("33","10","D","0","13","0","2","","2022-12-31","200","0.00","DuncanDec","2023-02-07 18:24:39","5","1");
INSERT INTO member_contribution VALUES("34","11","D","0","14","0","1","","2022-12-31","3100","0.00","SylviaDec","2023-02-07 18:25:24","5","1");
INSERT INTO member_contribution VALUES("35","11","D","0","14","0","3","","2022-12-31","100","0.00","SylviaDec","2023-02-07 18:25:24","5","1");
INSERT INTO member_contribution VALUES("36","11","D","0","14","0","2","","2022-12-31","200","0.00","SylviaDec","2023-02-07 18:25:24","5","1");
INSERT INTO member_contribution VALUES("37","12","D","0","15","0","1","","2022-12-31","3100","0.00","JulietDec","2023-02-07 18:26:04","5","1");
INSERT INTO member_contribution VALUES("38","12","D","0","15","0","3","","2022-12-31","100","0.00","JulietDec","2023-02-07 18:26:04","5","1");
INSERT INTO member_contribution VALUES("39","12","D","0","15","0","2","","2022-12-31","200","0.00","JulietDec","2023-02-07 18:26:04","5","1");
INSERT INTO member_contribution VALUES("40","13","D","0","16","0","1","","2022-12-31","3100","0.00","FestusDec","2023-02-07 18:26:50","5","1");
INSERT INTO member_contribution VALUES("41","13","D","0","16","0","3","","2022-12-31","100","0.00","FestusDec","2023-02-07 18:26:50","5","1");
INSERT INTO member_contribution VALUES("42","13","D","0","16","0","2","","2022-12-31","200","0.00","FestusDec","2023-02-07 18:26:50","5","1");
INSERT INTO member_contribution VALUES("43","14","D","0","17","0","1","","2022-12-31","3100","0.00","ThomasDec","2023-02-07 18:27:42","5","1");
INSERT INTO member_contribution VALUES("44","14","D","0","17","0","3","","2022-12-31","100","0.00","ThomasDec","2023-02-07 18:27:42","5","1");
INSERT INTO member_contribution VALUES("45","14","D","0","17","0","2","","2022-12-31","200","0.00","ThomasDec","2023-02-07 18:27:42","5","1");
INSERT INTO member_contribution VALUES("46","16","D","0","18","0","1","","2022-12-31","3100","0.00","KelvinDec","2023-02-07 18:28:22","5","1");
INSERT INTO member_contribution VALUES("47","16","D","0","18","0","3","","2022-12-31","100","0.00","KelvinDec","2023-02-07 18:28:22","5","1");
INSERT INTO member_contribution VALUES("48","16","D","0","18","0","2","","2022-12-31","200","0.00","KelvinDec","2023-02-07 18:28:22","5","1");
INSERT INTO member_contribution VALUES("49","17","D","0","19","0","1","","2022-12-31","3100","0.00","SamuelDec","2023-02-07 18:29:04","5","1");
INSERT INTO member_contribution VALUES("50","17","D","0","19","0","3","","2022-12-31","100","0.00","SamuelDec","2023-02-07 18:29:04","5","1");
INSERT INTO member_contribution VALUES("51","17","D","0","19","0","2","","2022-12-31","200","0.00","SamuelDec","2023-02-07 18:29:04","5","1");
INSERT INTO member_contribution VALUES("52","18","D","0","20","0","1","","2022-12-31","3100","0.00","CharlesDec","2023-02-07 18:29:43","5","1");
INSERT INTO member_contribution VALUES("53","18","D","0","20","0","3","","2022-12-31","100","0.00","CharlesDec","2023-02-07 18:29:43","5","1");
INSERT INTO member_contribution VALUES("54","18","D","0","20","0","2","","2022-12-31","200","0.00","CharlesDec","2023-02-07 18:29:43","5","1");
INSERT INTO member_contribution VALUES("55","1","D","0","21","0","1","","2022-01-01","3150","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("56","1","D","0","21","0","1","","2022-02-01","2800","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("57","1","D","0","21","0","1","","2022-03-01","3100","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("58","1","D","0","21","0","1","","2022-04-01","3000","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("59","1","D","0","21","0","1","","2022-05-01","3100","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("60","1","D","0","21","0","1","","2022-06-01","3000","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("61","1","D","0","21","0","1","","2022-07-01","3100","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("62","1","D","0","21","0","1","","2022-08-01","3100","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("63","1","D","0","21","0","1","","2022-09-01","3000","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("64","1","D","0","21","0","1","","2022-10-01","3100","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("65","1","D","0","21","0","1","","2022-11-01","3000","0.00","TimoDaily2022","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution VALUES("66","18","D","0","22","0","1","","2022-01-01","3150","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("67","18","D","0","22","0","1","","2022-02-01","2800","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("68","18","D","0","22","0","1","","2022-03-01","3100","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("69","18","D","0","22","0","1","","2022-04-01","3000","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("70","18","D","0","22","0","1","","2022-05-01","3100","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("71","18","D","0","22","0","1","","2022-06-01","3000","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("72","18","D","0","22","0","1","","2022-07-01","3100","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("73","18","D","0","22","0","1","","2022-08-01","3100","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("74","18","D","0","22","0","1","","2022-09-01","3000","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("75","18","D","0","22","0","1","","2022-10-01","3100","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("76","18","D","0","22","0","1","","2022-11-01","3000","0.00","CharloDaily2022","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution VALUES("77","5","D","0","23","0","1","","2022-01-01","3150","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("78","5","D","0","23","0","1","","2022-02-01","2800","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("79","5","D","0","23","0","1","","2022-03-01","3100","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("80","5","D","0","23","0","1","","2022-04-01","3000","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("81","5","D","0","23","0","1","","2022-05-01","3100","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("82","5","D","0","23","0","1","","2022-06-01","3000","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("83","5","D","0","23","0","1","","2022-07-01","3100","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("84","5","D","0","23","0","1","","2022-08-01","3100","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("85","5","D","0","23","0","1","","2022-09-01","3000","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("86","5","D","0","23","0","1","","2022-10-01","3100","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("87","5","D","0","23","0","1","","2022-11-01","3000","0.00","LazzDaily2022","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution VALUES("88","18","D","0","24","0","2","","2022-01-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("89","18","D","0","24","0","2","","2022-02-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("90","18","D","0","24","0","2","","2022-03-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("91","18","D","0","24","0","2","","2022-04-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("92","18","D","0","24","0","2","","2022-05-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("93","18","D","0","24","0","2","","2022-06-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("94","18","D","0","24","0","2","","2022-07-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("95","18","D","0","24","0","2","","2022-08-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("96","18","D","0","24","0","2","","2022-09-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("97","18","D","0","24","0","2","","2022-10-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("98","18","D","0","24","0","2","","2022-11-01","200","0.00","CharloSecurity2022","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution VALUES("99","18","D","0","25","0","3","","2022-01-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","9");
INSERT INTO member_contribution VALUES("100","18","D","0","25","0","3","","2022-02-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("101","18","D","0","25","0","3","","2022-03-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("102","18","D","0","25","0","3","","2022-04-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("103","18","D","0","25","0","3","","2022-05-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("104","18","D","0","25","0","3","","2022-06-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("105","18","D","0","25","0","3","","2022-07-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("106","18","D","0","25","0","3","","2022-08-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("107","18","D","0","25","0","3","","2022-09-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("108","18","D","0","25","0","3","","2022-10-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("109","18","D","0","25","0","3","","2022-11-01","100","0.00","CharloWelfare2022","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution VALUES("110","6","D","0","26","0","1","","2022-01-01","3150","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("111","6","D","0","26","0","1","","2022-02-01","2800","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("112","6","D","0","26","0","1","","2022-03-01","3100","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("113","6","D","0","26","0","1","","2022-04-01","3000","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("114","6","D","0","26","0","1","","2022-05-01","3100","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("115","6","D","0","26","0","1","","2022-06-01","3000","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("116","6","D","0","26","0","1","","2022-07-01","3100","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("117","6","D","0","26","0","1","","2022-08-01","3100","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("118","6","D","0","26","0","1","","2022-09-01","3000","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("119","6","D","0","26","0","1","","2022-10-01","3100","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("120","6","D","0","26","0","1","","2022-11-01","3000","0.00","SammyDaily2022","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution VALUES("121","17","D","0","27","0","1","","2022-01-01","3150","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("122","17","D","0","27","0","1","","2022-02-01","2800","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("123","17","D","0","27","0","1","","2022-03-01","3100","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("124","17","D","0","27","0","1","","2022-04-01","3000","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("125","17","D","0","27","0","1","","2022-05-01","3100","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("126","17","D","0","27","0","1","","2022-06-01","3000","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("127","17","D","0","27","0","1","","2022-07-01","3100","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("128","17","D","0","27","0","1","","2022-08-01","3100","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("129","17","D","0","27","0","1","","2022-09-01","3000","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("130","17","D","0","27","0","1","","2022-10-01","3100","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("131","17","D","0","27","0","1","","2022-11-01","3000","0.00","SamNjoDaily2022","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution VALUES("132","17","D","0","28","0","2","","2022-01-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("133","17","D","0","28","0","2","","2022-02-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("134","17","D","0","28","0","2","","2022-03-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("135","17","D","0","28","0","2","","2022-04-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("136","17","D","0","28","0","2","","2022-05-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("137","17","D","0","28","0","2","","2022-06-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("138","17","D","0","28","0","2","","2022-07-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("139","17","D","0","28","0","2","","2022-08-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("140","17","D","0","28","0","2","","2022-09-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("141","17","D","0","28","0","2","","2022-10-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("142","17","D","0","28","0","2","","2022-11-01","200","0.00","SamNjoSecurity2022","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution VALUES("143","17","D","0","29","0","3","","2022-02-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("144","17","D","0","29","0","3","","2022-03-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("145","17","D","0","29","0","3","","2022-04-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("146","17","D","0","29","0","3","","2022-05-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("147","17","D","0","29","0","3","","2022-06-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("148","17","D","0","29","0","3","","2022-07-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("149","17","D","0","29","0","3","","2022-08-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("150","17","D","0","29","0","3","","2022-09-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("151","17","D","0","29","0","3","","2022-10-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("152","17","D","0","29","0","3","","2022-11-01","100","0.00","SamNjoWelfare2022","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution VALUES("153","7","D","0","30","0","1","","2022-01-01","3150","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("154","7","D","0","30","0","1","","2022-02-01","2800","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("155","7","D","0","30","0","1","","2022-03-01","3100","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("156","7","D","0","30","0","1","","2022-04-01","3000","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("157","7","D","0","30","0","1","","2022-05-01","3100","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("158","7","D","0","30","0","1","","2022-06-01","3000","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("159","7","D","0","30","0","1","","2022-07-01","3100","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("160","7","D","0","30","0","1","","2022-08-01","3100","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("161","7","D","0","30","0","1","","2022-09-01","3000","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("162","7","D","0","30","0","1","","2022-10-01","3100","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("163","7","D","0","30","0","1","","2022-11-01","3000","0.00","WilfredDaily2022","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution VALUES("164","16","D","0","31","0","1","","2022-01-01","3150","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("165","16","D","0","31","0","1","","2022-02-01","2800","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("166","16","D","0","31","0","1","","2022-03-01","3100","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("167","16","D","0","31","0","1","","2022-04-01","3000","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("168","16","D","0","31","0","1","","2022-05-01","3100","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("169","16","D","0","31","0","1","","2022-06-01","3000","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("170","16","D","0","31","0","1","","2022-07-01","3100","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("171","16","D","0","31","0","1","","2022-08-01","3100","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("172","16","D","0","31","0","1","","2022-09-01","3000","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("173","16","D","0","31","0","1","","2022-10-01","3100","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("174","16","D","0","31","0","1","","2022-11-01","3000","0.00","KelvDaily2022","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution VALUES("175","8","D","0","32","0","1","","2022-01-01","3150","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("176","8","D","0","32","0","1","","2022-02-01","2800","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("177","8","D","0","32","0","1","","2022-03-01","3100","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("178","8","D","0","32","0","1","","2022-04-01","3000","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("179","8","D","0","32","0","1","","2022-05-01","3100","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("180","8","D","0","32","0","1","","2022-06-01","3000","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("181","8","D","0","32","0","1","","2022-07-01","3100","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("182","8","D","0","32","0","1","","2022-08-01","3100","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("183","8","D","0","32","0","1","","2022-09-01","3000","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("184","8","D","0","32","0","1","","2022-10-01","3100","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("185","8","D","0","32","0","1","","2022-11-01","3000","0.00","PhilipDaily2022","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution VALUES("186","16","D","0","33","0","2","","2022-01-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("187","16","D","0","33","0","2","","2022-02-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("188","16","D","0","33","0","2","","2022-03-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("189","16","D","0","33","0","2","","2022-04-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("190","16","D","0","33","0","2","","2022-05-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("191","16","D","0","33","0","2","","2022-06-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("192","16","D","0","33","0","2","","2022-07-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("193","16","D","0","33","0","2","","2022-08-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("194","16","D","0","33","0","2","","2022-09-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("195","16","D","0","33","0","2","","2022-10-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("196","16","D","0","33","0","2","","2022-11-01","200","0.00","KelvSecurity2022","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution VALUES("197","9","D","0","34","0","1","","2022-01-01","3150","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("198","9","D","0","34","0","1","","2022-02-01","2800","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("199","9","D","0","34","0","1","","2022-03-01","3100","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("200","9","D","0","34","0","1","","2022-04-01","3000","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("201","9","D","0","34","0","1","","2022-05-01","3100","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("202","9","D","0","34","0","1","","2022-06-01","3000","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("203","9","D","0","34","0","1","","2022-07-01","3100","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("204","9","D","0","34","0","1","","2022-08-01","3100","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("205","9","D","0","34","0","1","","2022-09-01","3000","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("206","9","D","0","34","0","1","","2022-10-01","3100","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("207","9","D","0","34","0","1","","2022-11-01","3000","0.00","BethDaily2022","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution VALUES("208","16","D","0","35","0","3","","2022-01-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","9");
INSERT INTO member_contribution VALUES("209","16","D","0","35","0","3","","2022-02-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("210","16","D","0","35","0","3","","2022-03-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("211","16","D","0","35","0","3","","2022-04-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("212","16","D","0","35","0","3","","2022-05-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("213","16","D","0","35","0","3","","2022-06-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("214","16","D","0","35","0","3","","2022-07-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("215","16","D","0","35","0","3","","2022-08-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("216","16","D","0","35","0","3","","2022-09-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("217","16","D","0","35","0","3","","2022-10-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("218","16","D","0","35","0","3","","2022-11-01","100","0.00","KelvWelfare2022","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution VALUES("219","10","D","0","36","0","1","","2022-01-01","3150","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("220","10","D","0","36","0","1","","2022-02-01","2800","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("221","10","D","0","36","0","1","","2022-03-01","3100","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("222","10","D","0","36","0","1","","2022-04-01","3000","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("223","10","D","0","36","0","1","","2022-05-01","3100","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("224","10","D","0","36","0","1","","2022-06-01","3000","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("225","10","D","0","36","0","1","","2022-07-01","3100","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("226","10","D","0","36","0","1","","2022-08-01","3100","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("227","10","D","0","36","0","1","","2022-09-01","3000","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("228","10","D","0","36","0","1","","2022-10-01","3100","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("229","10","D","0","36","0","1","","2022-11-01","3000","0.00","DuncanDaily2022","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution VALUES("230","14","D","0","37","0","1","","2022-01-01","3150","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("231","14","D","0","37","0","1","","2022-02-01","2800","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("232","14","D","0","37","0","1","","2022-03-01","3100","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("233","14","D","0","37","0","1","","2022-04-01","3000","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("234","14","D","0","37","0","1","","2022-05-01","3100","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("235","14","D","0","37","0","1","","2022-06-01","3000","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("236","14","D","0","37","0","1","","2022-07-01","3100","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("237","14","D","0","37","0","1","","2022-08-01","3100","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("238","14","D","0","37","0","1","","2022-09-01","3000","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("239","14","D","0","37","0","1","","2022-10-01","3100","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("240","14","D","0","37","0","1","","2022-11-01","3000","0.00","ThomasDaily2022","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution VALUES("241","14","D","0","38","0","2","","2022-01-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("242","14","D","0","38","0","2","","2022-02-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("243","14","D","0","38","0","2","","2022-03-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("244","14","D","0","38","0","2","","2022-04-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("245","14","D","0","38","0","2","","2022-05-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("246","14","D","0","38","0","2","","2022-06-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("247","14","D","0","38","0","2","","2022-07-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("248","14","D","0","38","0","2","","2022-08-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("249","14","D","0","38","0","2","","2022-09-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("250","14","D","0","38","0","2","","2022-10-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("251","14","D","0","38","0","2","","2022-11-01","200","0.00","ThomasSecurity2022","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution VALUES("252","14","D","0","39","0","3","","2022-02-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("253","14","D","0","39","0","3","","2022-03-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("254","14","D","0","39","0","3","","2022-04-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("255","14","D","0","39","0","3","","2022-05-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("256","14","D","0","39","0","3","","2022-06-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("257","14","D","0","39","0","3","","2022-07-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("258","14","D","0","39","0","3","","2022-08-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("259","14","D","0","39","0","3","","2022-09-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("260","14","D","0","39","0","3","","2022-10-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("261","14","D","0","39","0","3","","2022-11-01","100","0.00","ThomasWelfare2022","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution VALUES("262","1","D","0","40","0","2","","2022-01-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("263","1","D","0","40","0","2","","2022-02-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("264","1","D","0","40","0","2","","2022-03-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("265","1","D","0","40","0","2","","2022-04-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("266","1","D","0","40","0","2","","2022-05-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("267","1","D","0","40","0","2","","2022-06-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("268","1","D","0","40","0","2","","2022-07-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("269","1","D","0","40","0","2","","2022-08-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("270","1","D","0","40","0","2","","2022-09-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("271","1","D","0","40","0","2","","2022-10-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("272","1","D","0","40","0","2","","2022-11-01","200","0.00","TimoSecurity","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution VALUES("273","13","D","0","41","0","1","","2022-01-01","3150","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("274","13","D","0","41","0","1","","2022-02-01","2800","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("275","13","D","0","41","0","1","","2022-03-01","3100","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("276","13","D","0","41","0","1","","2022-04-01","3000","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("277","13","D","0","41","0","1","","2022-05-01","3100","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("278","13","D","0","41","0","1","","2022-06-01","3000","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("279","13","D","0","41","0","1","","2022-07-01","3100","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("280","13","D","0","41","0","1","","2022-08-01","3100","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("281","13","D","0","41","0","1","","2022-09-01","3000","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("282","13","D","0","41","0","1","","2022-10-01","3100","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("283","13","D","0","41","0","1","","2022-11-01","3000","0.00","FestoDaily2022","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution VALUES("284","1","D","0","42","0","3","","2022-02-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("285","1","D","0","42","0","3","","2022-03-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("286","1","D","0","42","0","3","","2022-04-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("287","1","D","0","42","0","3","","2022-05-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("288","1","D","0","42","0","3","","2022-06-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("289","1","D","0","42","0","3","","2022-07-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("290","1","D","0","42","0","3","","2022-08-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("291","1","D","0","42","0","3","","2022-09-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("292","1","D","0","42","0","3","","2022-10-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("293","1","D","0","42","0","3","","2022-11-01","100","0.00","TimoWelfare2022","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution VALUES("294","13","D","0","43","0","2","","2022-01-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("295","13","D","0","43","0","2","","2022-02-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("296","13","D","0","43","0","2","","2022-03-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("297","13","D","0","43","0","2","","2022-04-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("298","13","D","0","43","0","2","","2022-05-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("299","13","D","0","43","0","2","","2022-06-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("300","13","D","0","43","0","2","","2022-07-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("301","13","D","0","43","0","2","","2022-08-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("302","13","D","0","43","0","2","","2022-09-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("303","13","D","0","43","0","2","","2022-10-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("304","13","D","0","43","0","2","","2022-11-01","200","0.00","FestoSecurity2022","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution VALUES("305","13","D","0","44","0","3","","2022-02-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("306","13","D","0","44","0","3","","2022-03-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("307","13","D","0","44","0","3","","2022-04-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("308","13","D","0","44","0","3","","2022-05-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("309","13","D","0","44","0","3","","2022-06-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("310","13","D","0","44","0","3","","2022-07-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("311","13","D","0","44","0","3","","2022-08-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("312","13","D","0","44","0","3","","2022-09-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("313","13","D","0","44","0","3","","2022-10-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("314","13","D","0","44","0","3","","2022-11-01","100","0.00","FestoWelfare2022","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution VALUES("315","5","D","0","45","0","2","","2022-01-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("316","5","D","0","45","0","2","","2022-02-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("317","5","D","0","45","0","2","","2022-03-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("318","5","D","0","45","0","2","","2022-04-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("319","5","D","0","45","0","2","","2022-05-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("320","5","D","0","45","0","2","","2022-06-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("321","5","D","0","45","0","2","","2022-07-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("322","5","D","0","45","0","2","","2022-08-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("323","5","D","0","45","0","2","","2022-09-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("324","5","D","0","45","0","2","","2022-10-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("325","5","D","0","45","0","2","","2022-11-01","200","0.00","LazzSecurity2022","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution VALUES("326","5","D","0","46","0","3","","2022-01-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","9");
INSERT INTO member_contribution VALUES("327","5","D","0","46","0","3","","2022-02-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("328","5","D","0","46","0","3","","2022-03-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("329","5","D","0","46","0","3","","2022-04-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("330","5","D","0","46","0","3","","2022-05-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("331","5","D","0","46","0","3","","2022-06-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("332","5","D","0","46","0","3","","2022-07-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("333","5","D","0","46","0","3","","2022-08-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("334","5","D","0","46","0","3","","2022-09-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("335","5","D","0","46","0","3","","2022-10-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("336","5","D","0","46","0","3","","2022-11-01","100","0.00","LazzWelfare2022","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution VALUES("337","12","D","0","47","0","1","","2022-01-01","3150","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("338","12","D","0","47","0","1","","2022-02-01","2800","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("339","12","D","0","47","0","1","","2022-03-01","3100","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("340","12","D","0","47","0","1","","2022-04-01","3000","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("341","12","D","0","47","0","1","","2022-05-01","3100","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("342","12","D","0","47","0","1","","2022-06-01","3000","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("343","12","D","0","47","0","1","","2022-07-01","3100","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("344","12","D","0","47","0","1","","2022-08-01","3100","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("345","12","D","0","47","0","1","","2022-09-01","3000","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("346","12","D","0","47","0","1","","2022-10-01","3100","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("347","12","D","0","47","0","1","","2022-11-01","3000","0.00","JulieDaily2022","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution VALUES("348","12","D","0","48","0","2","","2022-01-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("349","12","D","0","48","0","2","","2022-02-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("350","12","D","0","48","0","2","","2022-03-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("351","12","D","0","48","0","2","","2022-04-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("352","12","D","0","48","0","2","","2022-05-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("353","12","D","0","48","0","2","","2022-06-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("354","12","D","0","48","0","2","","2022-07-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("355","12","D","0","48","0","2","","2022-08-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("356","12","D","0","48","0","2","","2022-09-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("357","12","D","0","48","0","2","","2022-10-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("358","12","D","0","48","0","2","","2022-11-01","200","0.00","JulieSecurity2022","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution VALUES("359","6","D","0","49","0","2","","2022-01-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("360","6","D","0","49","0","2","","2022-02-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("361","6","D","0","49","0","2","","2022-03-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("362","6","D","0","49","0","2","","2022-04-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("363","6","D","0","49","0","2","","2022-05-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("364","6","D","0","49","0","2","","2022-06-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("365","6","D","0","49","0","2","","2022-07-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("366","6","D","0","49","0","2","","2022-08-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("367","6","D","0","49","0","2","","2022-09-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("368","6","D","0","49","0","2","","2022-10-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("369","6","D","0","49","0","2","","2022-11-01","200","0.00","SammySecurity2022","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution VALUES("370","12","D","0","50","0","3","","2022-02-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("371","12","D","0","50","0","3","","2022-03-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("372","12","D","0","50","0","3","","2022-04-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("373","12","D","0","50","0","3","","2022-05-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("374","12","D","0","50","0","3","","2022-06-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("375","12","D","0","50","0","3","","2022-07-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("376","12","D","0","50","0","3","","2022-08-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("377","12","D","0","50","0","3","","2022-09-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("378","12","D","0","50","0","3","","2022-10-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("379","12","D","0","50","0","3","","2022-11-01","100","0.00","JulieWelfare2022","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution VALUES("380","6","D","0","51","0","3","","2022-01-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","9");
INSERT INTO member_contribution VALUES("381","6","D","0","51","0","3","","2022-02-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("382","6","D","0","51","0","3","","2022-03-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("383","6","D","0","51","0","3","","2022-04-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("384","6","D","0","51","0","3","","2022-05-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("385","6","D","0","51","0","3","","2022-06-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("386","6","D","0","51","0","3","","2022-07-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("387","6","D","0","51","0","3","","2022-08-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("388","6","D","0","51","0","3","","2022-09-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("389","6","D","0","51","0","3","","2022-10-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("390","6","D","0","51","0","3","","2022-11-01","100","0.00","SammyWelfare2022","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution VALUES("391","11","D","0","52","0","1","","2022-01-01","3150","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("392","11","D","0","52","0","1","","2022-02-01","2800","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("393","11","D","0","52","0","1","","2022-03-01","3100","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("394","11","D","0","52","0","1","","2022-04-01","3000","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("395","11","D","0","52","0","1","","2022-05-01","3100","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("396","11","D","0","52","0","1","","2022-06-01","3000","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("397","11","D","0","52","0","1","","2022-07-01","3100","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("398","11","D","0","52","0","1","","2022-08-01","3100","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("399","11","D","0","52","0","1","","2022-09-01","3000","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("400","11","D","0","52","0","1","","2022-10-01","3100","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("401","11","D","0","52","0","1","","2022-11-01","3000","0.00","SylviaDaily2022","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution VALUES("402","11","D","0","53","0","2","","2022-01-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("403","11","D","0","53","0","2","","2022-02-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("404","11","D","0","53","0","2","","2022-03-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("405","11","D","0","53","0","2","","2022-04-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("406","11","D","0","53","0","2","","2022-05-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("407","11","D","0","53","0","2","","2022-06-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("408","11","D","0","53","0","2","","2022-07-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("409","11","D","0","53","0","2","","2022-08-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("410","11","D","0","53","0","2","","2022-09-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("411","11","D","0","53","0","2","","2022-10-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("412","11","D","0","53","0","2","","2022-11-01","200","0.00","SylviaSecurity2022","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution VALUES("413","7","D","0","54","0","2","","2022-01-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("414","7","D","0","54","0","2","","2022-02-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("415","7","D","0","54","0","2","","2022-03-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("416","7","D","0","54","0","2","","2022-04-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("417","7","D","0","54","0","2","","2022-05-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("418","7","D","0","54","0","2","","2022-06-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("419","7","D","0","54","0","2","","2022-07-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("420","7","D","0","54","0","2","","2022-08-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("421","7","D","0","54","0","2","","2022-09-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("422","7","D","0","54","0","2","","2022-10-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("423","7","D","0","54","0","2","","2022-11-01","200","0.00","WilfredSecurity","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution VALUES("424","11","D","0","55","0","3","","2022-02-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("425","11","D","0","55","0","3","","2022-03-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("426","11","D","0","55","0","3","","2022-04-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("427","11","D","0","55","0","3","","2022-05-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("428","11","D","0","55","0","3","","2022-06-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("429","11","D","0","55","0","3","","2022-07-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("430","11","D","0","55","0","3","","2022-08-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("431","11","D","0","55","0","3","","2022-09-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("432","11","D","0","55","0","3","","2022-10-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("433","11","D","0","55","0","3","","2022-11-01","100","0.00","SylviaWelfare2022","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution VALUES("434","7","D","0","56","0","3","","2022-01-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","9");
INSERT INTO member_contribution VALUES("435","7","D","0","56","0","3","","2022-02-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("436","7","D","0","56","0","3","","2022-03-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("437","7","D","0","56","0","3","","2022-04-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("438","7","D","0","56","0","3","","2022-05-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("439","7","D","0","56","0","3","","2022-06-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("440","7","D","0","56","0","3","","2022-07-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("441","7","D","0","56","0","3","","2022-08-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("442","7","D","0","56","0","3","","2022-09-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("443","7","D","0","56","0","3","","2022-10-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("444","7","D","0","56","0","3","","2022-11-01","100","0.00","WilfredWelfare2022","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution VALUES("445","8","D","0","57","0","2","","2022-01-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("446","8","D","0","57","0","2","","2022-02-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("447","8","D","0","57","0","2","","2022-03-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("448","8","D","0","57","0","2","","2022-04-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("449","8","D","0","57","0","2","","2022-05-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("450","8","D","0","57","0","2","","2022-06-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("451","8","D","0","57","0","2","","2022-07-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("452","8","D","0","57","0","2","","2022-08-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("453","8","D","0","57","0","2","","2022-09-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("454","8","D","0","57","0","2","","2022-10-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("455","8","D","0","57","0","2","","2022-11-01","200","0.00","PhilipSecurity2022","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution VALUES("456","8","D","0","58","0","3","","2022-02-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("457","8","D","0","58","0","3","","2022-03-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("458","8","D","0","58","0","3","","2022-04-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("459","8","D","0","58","0","3","","2022-05-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("460","8","D","0","58","0","3","","2022-06-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("461","8","D","0","58","0","3","","2022-07-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("462","8","D","0","58","0","3","","2022-08-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("463","8","D","0","58","0","3","","2022-09-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("464","8","D","0","58","0","3","","2022-10-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("465","8","D","0","58","0","3","","2022-11-01","100","0.00","PhilipWelfare2022","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution VALUES("466","9","D","0","59","0","2","","2022-01-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("467","9","D","0","59","0","2","","2022-02-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("468","9","D","0","59","0","2","","2022-03-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("469","9","D","0","59","0","2","","2022-04-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("470","9","D","0","59","0","2","","2022-05-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("471","9","D","0","59","0","2","","2022-06-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("472","9","D","0","59","0","2","","2022-07-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("473","9","D","0","59","0","2","","2022-08-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("474","9","D","0","59","0","2","","2022-09-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("475","9","D","0","59","0","2","","2022-10-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("476","9","D","0","59","0","2","","2022-11-01","200","0.00","BethSecurity2022","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution VALUES("477","9","D","0","60","0","3","","2022-02-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("478","9","D","0","60","0","3","","2022-03-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("479","9","D","0","60","0","3","","2022-04-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("480","9","D","0","60","0","3","","2022-05-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("481","9","D","0","60","0","3","","2022-06-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("482","9","D","0","60","0","3","","2022-07-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("483","9","D","0","60","0","3","","2022-08-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("484","9","D","0","60","0","3","","2022-09-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("485","9","D","0","60","0","3","","2022-10-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("486","9","D","0","60","0","3","","2022-11-01","100","0.00","BethWelfare2022","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution VALUES("487","10","D","0","61","0","2","","2022-01-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("488","10","D","0","61","0","2","","2022-02-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("489","10","D","0","61","0","2","","2022-03-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("490","10","D","0","61","0","2","","2022-04-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("491","10","D","0","61","0","2","","2022-05-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("492","10","D","0","61","0","2","","2022-06-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("493","10","D","0","61","0","2","","2022-07-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("494","10","D","0","61","0","2","","2022-08-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("495","10","D","0","61","0","2","","2022-09-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("496","10","D","0","61","0","2","","2022-10-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("497","10","D","0","61","0","2","","2022-11-01","200","0.00","DuncanSecurity2022","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution VALUES("498","10","D","0","62","0","3","","2022-02-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("499","10","D","0","62","0","3","","2022-03-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("500","10","D","0","62","0","3","","2022-04-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("501","10","D","0","62","0","3","","2022-05-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("502","10","D","0","62","0","3","","2022-06-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("503","10","D","0","62","0","3","","2022-07-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("504","10","D","0","62","0","3","","2022-08-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("505","10","D","0","62","0","3","","2022-09-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("506","10","D","0","62","0","3","","2022-10-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("507","10","D","0","62","0","3","","2022-11-01","100","0.00","DuncanWelfare2022","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution VALUES("508","5","D","0","63","0","1","","2023-02-01","2800","0.00","LazzFeb2023","2023-02-10 19:38:20","5","1");
INSERT INTO member_contribution VALUES("509","5","D","0","63","0","2","","2023-02-01","200","0.00","LazzFeb2023","2023-02-10 19:38:20","5","1");
INSERT INTO member_contribution VALUES("510","5","D","0","63","0","3","","2023-02-01","100","0.00","LazzFeb2023","2023-02-10 19:38:20","5","1");
INSERT INTO member_contribution VALUES("511","17","D","0","64","0","1","","2023-02-13","1400","0.00","RBD9JW8F2N","2023-02-13 11:56:57","5","1");
INSERT INTO member_contribution VALUES("512","16","D","0","65","0","1","","2023-01-01","3100","0.00","RBD9KHZ80J","2023-02-13 17:21:49","5","1");
INSERT INTO member_contribution VALUES("513","16","D","0","65","0","2","","2023-01-01","200","0.00","RBD9KHZ80J","2023-02-13 17:21:49","5","1");
INSERT INTO member_contribution VALUES("514","16","D","0","65","0","3","","2023-01-01","100","0.00","RBD9KHZ80J","2023-02-13 17:21:49","5","1");
INSERT INTO member_contribution VALUES("515","16","D","0","66","0","1","","2023-02-13","1300","0.00","RBD4KQA4AY","2023-02-13 17:23:02","5","1");
INSERT INTO member_contribution VALUES("516","8","C","2","0","0","5","","2023-02-13","25000","0.00","","2023-02-13 20:17:20","5","1");
INSERT INTO member_contribution VALUES("517","9","D","0","67","0","1","","2023-02-13","2000","0.00","RBD7LBMVYD","2023-02-13 20:25:01","5","1");
INSERT INTO member_contribution VALUES("518","12","D","0","68","0","1","","2023-01-01","3100","0.00","RBG3T3RBPD","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution VALUES("519","12","D","0","68","0","2","","2023-01-01","200","0.00","RBG3T3RBPD","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution VALUES("520","12","D","0","68","0","3","","2023-01-01","100","0.00","RBG3T3RBPD","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution VALUES("521","12","D","0","68","0","1","","2023-02-17","2800","0.00","RBG3T3RBPD","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution VALUES("522","12","D","0","68","0","2","","2023-02-17","200","0.00","RBG3T3RBPD","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution VALUES("523","12","D","0","68","0","3","","2023-02-17","100","0.00","RBG3T3RBPD","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution VALUES("524","1","D","0","69","0","1","","2023-02-20","1200","0.00","RBK32YZEQR","2023-02-20 11:26:21","5","1");
INSERT INTO member_contribution VALUES("525","1","D","0","69","0","2","","2023-02-20","200","0.00","RBK32YZEQR","2023-02-20 11:26:21","5","1");
INSERT INTO member_contribution VALUES("526","1","D","0","69","0","3","","2023-02-20","100","0.00","RBK32YZEQR","2023-02-20 11:26:21","5","1");
INSERT INTO member_contribution VALUES("527","8","D","0","70","0","1","","2023-02-20","1000","0.00","RBK24CJLG0","2023-02-20 19:56:19","5","1");
INSERT INTO member_contribution VALUES("528","13","D","0","71","0","1","","2023-01-01","2700","0.00","RBK04C2UP2","2023-02-20 19:57:52","5","1");
INSERT INTO member_contribution VALUES("529","1","D","0","72","0","1","","2023-02-20","600","0.00","TimoFeb2023","2023-02-20 20:19:52","5","1");
INSERT INTO member_contribution VALUES("530","1","D","0","73","0","1","","2023-01-01","3100","0.00","TimoJan2023","2023-02-20 20:20:53","5","1");
INSERT INTO member_contribution VALUES("531","1","D","0","73","0","2","","2023-01-01","200","0.00","TimoJan2023","2023-02-20 20:20:53","5","1");
INSERT INTO member_contribution VALUES("532","1","D","0","73","0","3","","2023-01-01","100","0.00","TimoJan2023","2023-02-20 20:20:53","5","1");
INSERT INTO member_contribution VALUES("533","14","D","0","74","0","1","","2023-02-22","800","0.00","S9104306","2023-02-22 19:08:26","5","1");
INSERT INTO member_contribution VALUES("534","14","D","0","74","0","2","","2023-02-22","200","0.00","S9104306","2023-02-22 19:08:26","5","1");
INSERT INTO member_contribution VALUES("535","14","D","0","74","0","3","","2023-02-22","100","0.00","S9104306","2023-02-22 21:25:47","5","1");
INSERT INTO member_contribution VALUES("536","1","C","4","0","0","5","","2023-02-27","55000","0.00","","2023-02-27 22:05:17","5","1");
INSERT INTO member_contribution VALUES("537","7","D","0","75","0","1","","2023-01-01","3100","0.00","WilfredJan2023","2023-02-27 22:16:04","5","1");
INSERT INTO member_contribution VALUES("538","7","D","0","75","0","2","","2023-01-01","200","0.00","WilfredJan2023","2023-02-27 22:16:04","5","1");
INSERT INTO member_contribution VALUES("539","7","D","0","75","0","3","","2023-01-01","100","0.00","WilfredJan2023","2023-02-27 22:16:04","5","1");
INSERT INTO member_contribution VALUES("540","18","D","0","76","0","1","","2023-01-01","3100","0.00","CharlesJan2023","2023-03-02 17:22:28","5","1");
INSERT INTO member_contribution VALUES("541","18","D","0","76","0","2","","2023-01-01","200","0.00","CharlesJan2023","2023-03-02 17:22:28","5","1");
INSERT INTO member_contribution VALUES("542","18","D","0","76","0","3","","2023-01-01","100","0.00","CharlesJan2023","2023-03-02 17:22:28","5","1");
INSERT INTO member_contribution VALUES("543","18","D","0","77","0","1","","2023-02-01","2800","0.00","CharlesFeb2023","2023-03-02 17:23:33","5","1");
INSERT INTO member_contribution VALUES("544","18","D","0","77","0","2","","2023-02-01","200","0.00","CharlesFeb2023","2023-03-02 17:23:33","5","1");
INSERT INTO member_contribution VALUES("545","18","D","0","77","0","3","","2023-02-01","100","0.00","CharlesFeb2023","2023-03-02 17:23:33","5","1");
INSERT INTO member_contribution VALUES("546","11","D","0","78","0","1","","2023-01-01","3100","0.00","SlyJan2023","2023-03-02 17:29:39","5","1");
INSERT INTO member_contribution VALUES("547","11","D","0","78","0","2","","2023-01-01","200","0.00","SlyJan2023","2023-03-02 17:29:39","5","1");
INSERT INTO member_contribution VALUES("548","11","D","0","78","0","3","","2023-01-01","100","0.00","SlyJan2023","2023-03-02 17:29:39","5","1");
INSERT INTO member_contribution VALUES("549","6","D","0","79","0","1","","2023-01-01","3100","0.00","SammyJan2023","2023-03-02 17:31:22","5","1");
INSERT INTO member_contribution VALUES("550","6","D","0","79","0","2","","2023-01-01","200","0.00","SammyJan2023","2023-03-02 17:31:22","5","1");
INSERT INTO member_contribution VALUES("551","6","D","0","79","0","3","","2023-01-01","100","0.00","SammyJan2023","2023-03-02 17:31:22","5","1");
INSERT INTO member_contribution VALUES("552","6","D","0","80","0","1","","2023-02-01","1800","0.00","SammyFeb2023","2023-03-02 17:32:16","5","1");
INSERT INTO member_contribution VALUES("553","6","D","0","80","0","2","","2023-02-01","200","0.00","SammyFeb2023","2023-03-02 17:32:16","5","1");
INSERT INTO member_contribution VALUES("554","6","D","0","80","0","3","","2023-02-01","100","0.00","SammyFeb2023","2023-03-02 17:32:16","5","1");
INSERT INTO member_contribution VALUES("555","8","D","0","81","0","1","","2023-01-01","3100","0.00","PhilipJan2023","2023-03-02 17:34:20","5","1");
INSERT INTO member_contribution VALUES("556","8","D","0","81","0","2","","2023-01-01","200","0.00","PhilipJan2023","2023-03-02 17:34:20","5","1");
INSERT INTO member_contribution VALUES("557","8","D","0","81","0","3","","2023-01-01","100","0.00","PhilipJan2023","2023-03-02 17:34:20","5","1");
INSERT INTO member_contribution VALUES("558","8","D","0","82","0","1","","2023-02-01","1800","0.00","677518580110","2023-03-02 17:38:59","5","1");
INSERT INTO member_contribution VALUES("559","8","D","0","82","0","2","","2023-02-01","200","0.00","677518580110","2023-03-02 17:38:59","5","1");
INSERT INTO member_contribution VALUES("560","8","D","0","82","0","3","","2023-02-01","100","0.00","677518580110","2023-03-02 17:38:59","5","1");
INSERT INTO member_contribution VALUES("561","8","D","0","82","0","1","","2023-03-02","2200","0.00","677518580110","2023-03-02 17:38:59","5","1");
INSERT INTO member_contribution VALUES("562","9","D","0","83","0","1","","2023-01-01","3100","0.00","BethJan2023","2023-03-02 17:42:00","5","1");
INSERT INTO member_contribution VALUES("563","9","D","0","83","0","2","","2023-01-01","200","0.00","BethJan2023","2023-03-02 17:42:00","5","1");
INSERT INTO member_contribution VALUES("564","9","D","0","83","0","3","","2023-01-01","100","0.00","BethJan2023","2023-03-02 17:42:00","5","1");
INSERT INTO member_contribution VALUES("565","10","D","0","84","0","1","","2023-01-01","3100","0.00","DuncanJanfeb2023","2023-03-02 17:44:20","5","1");
INSERT INTO member_contribution VALUES("566","10","D","0","84","0","1","","2023-02-01","2699","0.00","DuncanJanfeb2023","2023-03-02 17:44:20","5","1");
INSERT INTO member_contribution VALUES("567","10","D","0","84","0","2","","2023-01-01","200","0.00","DuncanJanfeb2023","2023-03-02 17:44:20","5","1");
INSERT INTO member_contribution VALUES("568","10","D","0","84","0","3","","2023-01-01","100","0.00","DuncanJanfeb2023","2023-03-02 17:44:20","5","1");
INSERT INTO member_contribution VALUES("569","14","D","0","85","0","1","","2023-01-01","3100","0.00","ThomasJanFeb2023","2023-03-02 17:47:29","5","1");
INSERT INTO member_contribution VALUES("570","14","D","0","85","0","1","","2023-02-01","1000","0.00","ThomasJanFeb2023","2023-03-02 17:47:29","5","1");
INSERT INTO member_contribution VALUES("571","14","D","0","85","0","2","","2023-01-01","200","0.00","ThomasJanFeb2023","2023-03-02 17:47:29","5","1");
INSERT INTO member_contribution VALUES("572","14","D","0","85","0","3","","2023-01-01","100","0.00","ThomasJanFeb2023","2023-03-02 17:47:29","5","1");
INSERT INTO member_contribution VALUES("573","16","D","0","86","0","1","","2023-02-01","1500","0.00","KelvinFeb2023","2023-03-02 17:49:26","5","1");
INSERT INTO member_contribution VALUES("574","16","D","0","86","0","2","","2023-02-01","200","0.00","KelvinFeb2023","2023-03-02 17:49:26","5","1");
INSERT INTO member_contribution VALUES("575","16","D","0","86","0","3","","2023-02-01","100","0.00","KelvinFeb2023","2023-03-02 17:49:26","5","1");
INSERT INTO member_contribution VALUES("576","17","D","0","87","0","1","","2023-01-01","3100","0.00","SamuelJan2023","2023-03-02 17:51:08","5","1");
INSERT INTO member_contribution VALUES("577","17","D","0","87","0","2","","2023-01-01","200","0.00","SamuelJan2023","2023-03-02 17:51:08","5","1");
INSERT INTO member_contribution VALUES("578","17","D","0","87","0","3","","2023-01-01","100","0.00","SamuelJan2023","2023-03-02 17:51:08","5","1");
INSERT INTO member_contribution VALUES("579","5","D","0","88","0","1","","2023-03-02","3100","0.00","RBQ8IHEN6A","2023-03-02 17:53:25","5","1");
INSERT INTO member_contribution VALUES("580","5","D","0","88","0","2","","2023-03-02","200","0.00","RBQ8IHEN6A","2023-03-02 17:53:25","5","1");
INSERT INTO member_contribution VALUES("581","5","D","0","88","0","3","","2023-03-02","100","0.00","RBQ8IHEN6A","2023-03-02 17:53:25","5","1");
INSERT INTO member_contribution VALUES("582","11","D","0","89","0","1","","2023-03-02","3100","0.00","RC20V26Q64","2023-03-02 21:51:58","5","1");
INSERT INTO member_contribution VALUES("583","11","D","0","89","0","2","","2023-03-02","200","0.00","RC20V26Q64","2023-03-02 21:51:58","5","1");
INSERT INTO member_contribution VALUES("584","11","D","0","89","0","3","","2023-03-02","100","0.00","RC20V26Q64","2023-03-02 21:51:58","5","1");
INSERT INTO member_contribution VALUES("585","14","D","0","90","0","1","","2023-03-03","1000","0.00","S6523724","2023-03-03 19:28:43","5","1");
INSERT INTO member_contribution VALUES("586","18","C","6","0","0","5","","2023-03-04","33000","0.00","","2023-03-04 09:20:45","5","1");
INSERT INTO member_contribution VALUES("587","12","D","0","91","0","1","","2023-03-05","3100","0.00","RC44ZY5WFS","2023-03-05 12:38:58","5","1");
INSERT INTO member_contribution VALUES("588","12","D","0","91","0","2","","2023-03-05","200","0.00","RC44ZY5WFS","2023-03-05 12:38:58","5","1");
INSERT INTO member_contribution VALUES("589","12","D","0","91","0","3","","2023-03-05","100","0.00","RC44ZY5WFS","2023-03-05 12:38:58","5","1");
INSERT INTO member_contribution VALUES("590","9","D","0","92","0","1","","2023-02-01","800","0.00","S355272","2023-03-05 21:37:16","5","1");
INSERT INTO member_contribution VALUES("591","9","D","0","92","0","2","","2023-02-01","200","0.00","S355272","2023-03-05 21:37:16","5","1");
INSERT INTO member_contribution VALUES("592","9","D","0","92","0","3","","2023-02-01","100","0.00","S355272","2023-03-05 21:37:16","5","1");
INSERT INTO member_contribution VALUES("593","9","D","0","92","0","1","","2023-03-05","900","0.00","S355272","2023-03-05 21:37:16","5","1");
INSERT INTO member_contribution VALUES("594","7","D","0","93","0","1","","2023-03-05","3100","0.00","S416113","2023-03-05 22:42:19","5","1");
INSERT INTO member_contribution VALUES("595","7","D","0","93","0","2","","2023-03-05","200","0.00","S416113","2023-03-05 22:42:19","5","1");
INSERT INTO member_contribution VALUES("596","7","D","0","93","0","3","","2023-03-05","100","0.00","S416113","2023-03-05 22:42:19","5","1");
INSERT INTO member_contribution VALUES("597","9","C","7","0","0","5","","2023-03-06","20000","0.00","","2023-03-06 14:35:48","5","1");
INSERT INTO member_contribution VALUES("598","11","C","3","0","0","5","","2023-03-06","50000","0.00","","2023-03-06 14:36:06","5","1");
INSERT INTO member_contribution VALUES("599","13","D","0","94","0","1","","2023-01-01","400","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("600","13","D","0","94","0","2","","2023-01-01","200","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("601","13","D","0","94","0","3","","2023-01-01","100","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("602","13","D","0","94","0","1","","2023-02-01","2800","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("603","13","D","0","94","0","2","","2023-02-01","200","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("604","13","D","0","94","0","3","","2023-02-01","100","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("605","13","D","0","94","0","1","","2023-03-06","1200","0.00","S2424400","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution VALUES("606","17","D","0","95","0","1","","2023-02-01","1400","0.00","S2340238","2023-03-06 22:53:21","5","1");
INSERT INTO member_contribution VALUES("607","17","D","0","95","0","1","","2023-02-01","200","0.00","S2340238","2023-03-06 22:53:21","5","1");
INSERT INTO member_contribution VALUES("608","17","D","0","95","0","1","","2023-02-01","100","0.00","S2340238","2023-03-06 22:53:21","5","1");
INSERT INTO member_contribution VALUES("609","17","D","0","95","0","1","","2023-03-06","400","0.00","S2340238","2023-03-06 22:53:21","5","1");
INSERT INTO member_contribution VALUES("610","10","D","0","96","0","1","","2023-02-01","101","0.00","54528885","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution VALUES("611","10","D","0","96","0","2","","2023-02-01","200","0.00","54528885","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution VALUES("612","10","D","0","96","0","3","","2023-02-01","100","0.00","54528885","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution VALUES("613","10","D","0","96","0","1","","2023-03-06","3100","0.00","54528885","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution VALUES("614","10","D","0","96","0","2","","2023-03-06","200","0.00","54528885","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution VALUES("615","10","D","0","96","0","3","","2023-03-06","100","0.00","54528885","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution VALUES("616","6","D","0","97","0","1","","2023-03-06","2000","0.00","S1539132","2023-03-06 22:56:56","5","1");
INSERT INTO member_contribution VALUES("617","12","C","9","0","0","5","","2023-03-08","50000","0.00","","2023-03-08 21:56:14","5","1");
INSERT INTO member_contribution VALUES("618","1","D","0","98","0","1","","2023-03-09","3100","0.00","S6043251","2023-03-09 23:03:13","5","1");
INSERT INTO member_contribution VALUES("619","18","D","0","99","0","1","","2023-03-11","3100","0.00","S640963","2023-03-11 11:36:33","5","1");
INSERT INTO member_contribution VALUES("620","18","D","0","99","0","2","","2023-03-11","200","0.00","S640963","2023-03-11 11:36:33","5","1");
INSERT INTO member_contribution VALUES("621","18","D","0","99","0","1","","2023-03-11","100","0.00","S640963","2023-03-11 11:36:33","5","1");
INSERT INTO member_contribution VALUES("622","18","D","0","99","0","1","","2023-04-01","600","0.00","S640963","2023-03-11 11:36:33","5","1");
INSERT INTO member_contribution VALUES("623","14","D","0","100","0","1","","2023-03-13","1000","0.00","S4019493","2023-03-13 14:04:51","5","1");
INSERT INTO member_contribution VALUES("624","13","C","10","0","0","5","","2023-03-15","30000","0.00","","2023-03-15 17:58:01","5","1");
INSERT INTO member_contribution VALUES("625","17","D","0","101","0","1","","2023-03-17","1400","0.00","S644501","2023-03-17 20:12:52","5","1");
INSERT INTO member_contribution VALUES("626","1","D","0","102","0","3","","2023-03-18","100","0.00","S2873788","2023-03-18 18:06:48","5","1");
INSERT INTO member_contribution VALUES("627","1","D","0","102","0","2","","2023-03-18","200","0.00","S2873788","2023-03-18 18:06:48","5","1");
INSERT INTO member_contribution VALUES("628","1","D","4","102","0","5","","2023-03-18","21000","825.00","S2873788","2023-03-18 18:06:48","5","1");
INSERT INTO member_contribution VALUES("629","5","C","11","0","0","5","","2023-03-19","35000","0.00","","2023-03-19 11:27:06","5","1");
INSERT INTO member_contribution VALUES("630","14","D","0","103","0","1","","2023-03-20","1100","0.00","S5434501","2023-03-20 19:50:05","5","1");
INSERT INTO member_contribution VALUES("631","14","D","0","103","0","2","","2023-03-20","200","0.00","S5434501","2023-03-20 19:50:05","5","1");
INSERT INTO member_contribution VALUES("632","14","D","0","103","0","3","","2023-03-20","100","0.00","S5434501","2023-03-20 19:50:05","5","1");
INSERT INTO member_contribution VALUES("633","8","D","0","104","0","1","","2023-03-29","1000","0.00","RCT3VIED39","2023-03-29 11:50:17","5","1");
INSERT INTO member_contribution VALUES("634","8","D","0","104","0","2","","2023-03-29","200","0.00","RCT3VIED39","2023-03-29 11:50:17","5","1");
INSERT INTO member_contribution VALUES("635","8","D","0","104","0","3","","2023-03-29","100","0.00","RCT3VIED39","2023-03-29 11:50:17","5","1");
INSERT INTO member_contribution VALUES("636","8","D","2","104","0","5","","2023-03-29","6500","375.00","RCT3VIED39","2023-03-29 11:50:17","5","1");
INSERT INTO member_contribution VALUES("637","8","D","0","104","0","1","","2023-04-01","1200","0.00","RCT3VIED39","2023-03-29 11:50:17","5","1");
INSERT INTO member_contribution VALUES("638","11","D","0","105","0","1","","2023-04-01","3000","0.00","54360224","2023-03-31 21:32:56","5","1");
INSERT INTO member_contribution VALUES("639","11","D","0","105","0","2","","2023-04-01","200","0.00","54360224","2023-03-31 21:32:56","5","1");
INSERT INTO member_contribution VALUES("640","11","D","0","105","0","3","","2023-04-01","100","0.00","54360224","2023-03-31 21:32:56","5","1");
INSERT INTO member_contribution VALUES("641","11","D","3","105","0","5","","2023-04-01","10700","750.00","54360224","2023-03-31 21:32:56","5","1");


CREATE TABLE `member_contribution_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(11) NOT NULL,
  `contribution_date` date NOT NULL,
  `contribution_amount` bigint(50) NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `rcpt_no` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;

INSERT INTO member_contribution_main VALUES("1","5","2023-01-25","3400","RAP85V804K","1/2022","2023-01-25 14:01:58","5","1");
INSERT INTO member_contribution_main VALUES("2","1","2023-02-06","1000","RB601VK4U4","24/2023","2023-02-06 20:34:37","5","1");
INSERT INTO member_contribution_main VALUES("3","6","2023-02-06","1000","RB692OEC2P","25/2023","2023-02-06 20:35:57","5","1");
INSERT INTO member_contribution_main VALUES("4","7","2023-02-06","3100","RB46X16ULU","26/2023","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution_main VALUES("5","14","2023-02-06","1000","RB49WXYWRB","27/2023","2023-02-06 20:38:18","5","1");
INSERT INTO member_contribution_main VALUES("6","11","2023-02-06","3100","RB29ROGUMP","28/2023","2023-02-06 20:39:21","5","1");
INSERT INTO member_contribution_main VALUES("7","5","2023-02-07","3400","LazzDec","29/2023","2023-02-07 14:44:46","5","1");
INSERT INTO member_contribution_main VALUES("8","1","2023-02-07","3400","TimoDec","30/2023","2023-02-07 18:20:59","5","1");
INSERT INTO member_contribution_main VALUES("9","6","2023-02-07","3400","SammyDec","31/2023","2023-02-07 18:21:45","5","1");
INSERT INTO member_contribution_main VALUES("10","7","2023-02-07","3400","WilfredDec","32/2023","2023-02-07 18:22:33","5","1");
INSERT INTO member_contribution_main VALUES("11","8","2023-02-07","3400","PhilipDec","33/2023","2023-02-07 18:23:15","5","1");
INSERT INTO member_contribution_main VALUES("12","9","2023-02-07","3400","BethDec","34/2023","2023-02-07 18:23:54","5","1");
INSERT INTO member_contribution_main VALUES("13","10","2023-02-07","3400","DuncanDec","35/2023","2023-02-07 18:24:39","5","1");
INSERT INTO member_contribution_main VALUES("14","11","2023-02-07","3400","SylviaDec","36/2023","2023-02-07 18:25:24","5","1");
INSERT INTO member_contribution_main VALUES("15","12","2023-02-07","3400","JulietDec","37/2023","2023-02-07 18:26:04","5","1");
INSERT INTO member_contribution_main VALUES("16","13","2023-02-07","3400","FestusDec","38/2023","2023-02-07 18:26:50","5","1");
INSERT INTO member_contribution_main VALUES("17","14","2023-02-07","3400","ThomasDec","39/2023","2023-02-07 18:27:42","5","1");
INSERT INTO member_contribution_main VALUES("18","16","2023-02-07","3400","KelvinDec","40/2023","2023-02-07 18:28:22","5","1");
INSERT INTO member_contribution_main VALUES("19","17","2023-02-07","3400","SamuelDec","41/2023","2023-02-07 18:29:04","5","1");
INSERT INTO member_contribution_main VALUES("20","18","2023-02-07","3400","CharlesDec","42/2023","2023-02-07 18:29:43","5","1");
INSERT INTO member_contribution_main VALUES("21","1","2023-02-10","33450","TimoDaily2022","43/2023","2023-02-10 17:46:53","5","1");
INSERT INTO member_contribution_main VALUES("22","18","2023-02-10","33450","CharloDaily2022","44/2023","2023-02-10 17:52:49","1","1");
INSERT INTO member_contribution_main VALUES("23","5","2023-02-10","33450","LazzDaily2022","45/2023","2023-02-10 17:55:13","5","1");
INSERT INTO member_contribution_main VALUES("24","18","2023-02-10","2200","CharloSecurity2022","46/2023","2023-02-10 17:56:04","1","1");
INSERT INTO member_contribution_main VALUES("25","18","2023-02-10","1000","CharloWelfare2022","47/2023","2023-02-10 18:00:45","1","1");
INSERT INTO member_contribution_main VALUES("26","6","2023-02-10","33450","SammyDaily2022","48/2023","2023-02-10 18:03:26","5","1");
INSERT INTO member_contribution_main VALUES("27","17","2023-02-10","33450","SamNjoDaily2022","49/2023","2023-02-10 18:03:57","1","1");
INSERT INTO member_contribution_main VALUES("28","17","2023-02-10","2200","SamNjoSecurity2022","50/2023","2023-02-10 18:06:48","1","1");
INSERT INTO member_contribution_main VALUES("29","17","2023-02-10","1000","SamNjoWelfare2022","51/2023","2023-02-10 18:09:24","1","1");
INSERT INTO member_contribution_main VALUES("30","7","2023-02-10","33450","WilfredDaily2022","52/2023","2023-02-10 18:09:49","5","1");
INSERT INTO member_contribution_main VALUES("31","16","2023-02-10","33450","KelvDaily2022","53/2023","2023-02-10 18:12:16","1","1");
INSERT INTO member_contribution_main VALUES("32","8","2023-02-10","33450","PhilipDaily2022","54/2023","2023-02-10 18:13:45","5","1");
INSERT INTO member_contribution_main VALUES("33","16","2023-02-10","2200","KelvSecurity2022","55/2023","2023-02-10 18:15:06","1","1");
INSERT INTO member_contribution_main VALUES("34","9","2023-02-10","33450","BethDaily2022","56/2023","2023-02-10 18:17:27","5","1");
INSERT INTO member_contribution_main VALUES("35","16","2023-02-10","1000","KelvWelfare2022","57/2023","2023-02-10 18:18:13","1","1");
INSERT INTO member_contribution_main VALUES("36","10","2023-02-10","33450","DuncanDaily2022","58/2023","2023-02-10 18:21:53","5","1");
INSERT INTO member_contribution_main VALUES("37","14","2023-02-10","33450","ThomasDaily2022","59/2023","2023-02-10 18:23:46","1","1");
INSERT INTO member_contribution_main VALUES("38","14","2023-02-10","2200","ThomasSecurity2022","60/2023","2023-02-10 18:26:40","1","1");
INSERT INTO member_contribution_main VALUES("39","14","2023-02-10","1000","ThomasWelfare2022","61/2023","2023-02-10 18:29:41","1","1");
INSERT INTO member_contribution_main VALUES("40","1","2023-02-10","2200","TimoSecurity","62/2023","2023-02-10 18:29:50","5","1");
INSERT INTO member_contribution_main VALUES("41","13","2023-02-10","33450","FestoDaily2022","63/2023","2023-02-10 18:32:57","1","1");
INSERT INTO member_contribution_main VALUES("42","1","2023-02-10","1000","TimoWelfare2022","64/2023","2023-02-10 18:33:58","5","1");
INSERT INTO member_contribution_main VALUES("43","13","2023-02-10","2200","FestoSecurity2022","65/2023","2023-02-10 18:35:40","1","1");
INSERT INTO member_contribution_main VALUES("44","13","2023-02-10","1000","FestoWelfare2022","66/2023","2023-02-10 18:38:11","1","1");
INSERT INTO member_contribution_main VALUES("45","5","2023-02-10","2200","LazzSecurity2022","67/2023","2023-02-10 18:38:40","5","1");
INSERT INTO member_contribution_main VALUES("46","5","2023-02-10","1000","LazzWelfare2022","68/2023","2023-02-10 18:42:27","5","1");
INSERT INTO member_contribution_main VALUES("47","12","2023-02-10","33450","JulieDaily2022","69/2023","2023-02-10 18:43:27","1","1");
INSERT INTO member_contribution_main VALUES("48","12","2023-02-10","2200","JulieSecurity2022","70/2023","2023-02-10 18:48:05","1","1");
INSERT INTO member_contribution_main VALUES("49","6","2023-02-10","2200","SammySecurity2022","71/2023","2023-02-10 18:48:22","5","1");
INSERT INTO member_contribution_main VALUES("50","12","2023-02-10","1000","JulieWelfare2022","72/2023","2023-02-10 18:50:20","1","1");
INSERT INTO member_contribution_main VALUES("51","6","2023-02-10","1000","SammyWelfare2022","73/2023","2023-02-10 18:51:42","5","1");
INSERT INTO member_contribution_main VALUES("52","11","2023-02-10","33450","SylviaDaily2022","74/2023","2023-02-10 18:53:02","1","1");
INSERT INTO member_contribution_main VALUES("53","11","2023-02-10","2200","SylviaSecurity2022","75/2023","2023-02-10 18:55:35","1","1");
INSERT INTO member_contribution_main VALUES("54","7","2023-02-10","2200","WilfredSecurity","76/2023","2023-02-10 18:55:54","5","1");
INSERT INTO member_contribution_main VALUES("55","11","2023-02-10","1000","SylviaWelfare2022","77/2023","2023-02-10 18:58:00","1","1");
INSERT INTO member_contribution_main VALUES("56","7","2023-02-10","1000","WilfredWelfare2022","78/2023","2023-02-10 19:00:17","5","1");
INSERT INTO member_contribution_main VALUES("57","8","2023-02-10","2200","PhilipSecurity2022","79/2023","2023-02-10 19:04:02","5","1");
INSERT INTO member_contribution_main VALUES("58","8","2023-02-10","1000","PhilipWelfare2022","80/2023","2023-02-10 19:07:18","5","1");
INSERT INTO member_contribution_main VALUES("59","9","2023-02-10","2200","BethSecurity2022","81/2023","2023-02-10 19:15:16","5","1");
INSERT INTO member_contribution_main VALUES("60","9","2023-02-10","1000","BethWelfare2022","82/2023","2023-02-10 19:18:47","5","1");
INSERT INTO member_contribution_main VALUES("61","10","2023-02-10","2200","DuncanSecurity2022","83/2023","2023-02-10 19:21:41","5","1");
INSERT INTO member_contribution_main VALUES("62","10","2023-02-10","1000","DuncanWelfare2022","84/2023","2023-02-10 19:24:48","5","1");
INSERT INTO member_contribution_main VALUES("63","5","2023-02-10","3100","LazzFeb2023","85/2023","2023-02-10 19:38:20","5","1");
INSERT INTO member_contribution_main VALUES("64","17","2023-02-13","1400","RBD9JW8F2N","86/2023","2023-02-13 11:56:57","5","1");
INSERT INTO member_contribution_main VALUES("65","16","2023-02-13","3400","RBD9KHZ80J","87/2023","2023-02-13 17:21:49","5","1");
INSERT INTO member_contribution_main VALUES("66","16","2023-02-13","1300","RBD4KQA4AY","88/2023","2023-02-13 17:23:02","5","1");
INSERT INTO member_contribution_main VALUES("67","9","2023-02-13","2000","RBD7LBMVYD","89/2023","2023-02-13 20:25:01","5","1");
INSERT INTO member_contribution_main VALUES("68","12","2023-02-17","6500","RBG3T3RBPD","90/2023","2023-02-17 09:54:22","5","1");
INSERT INTO member_contribution_main VALUES("69","1","2023-02-20","1500","RBK32YZEQR","91/2023","2023-02-20 11:26:21","5","1");
INSERT INTO member_contribution_main VALUES("70","8","2023-02-20","1000","RBK24CJLG0","92/2023","2023-02-20 19:56:19","5","1");
INSERT INTO member_contribution_main VALUES("71","13","2023-02-20","2700","RBK04C2UP2","93/2023","2023-02-20 19:57:52","5","1");
INSERT INTO member_contribution_main VALUES("72","1","2023-02-20","600","TimoFeb2023","94/2023","2023-02-20 20:19:52","5","1");
INSERT INTO member_contribution_main VALUES("73","1","2023-02-20","3400","TimoJan2023","95/2023","2023-02-20 20:20:53","5","1");
INSERT INTO member_contribution_main VALUES("74","14","2023-02-22","1100","S9104306","96/2023","2023-02-22 19:08:26","5","1");
INSERT INTO member_contribution_main VALUES("75","7","2023-02-27","3400","WilfredJan2023","97/2023","2023-02-27 22:16:04","5","1");
INSERT INTO member_contribution_main VALUES("76","18","2023-03-02","3400","CharlesJan2023","98/2023","2023-03-02 17:22:28","5","1");
INSERT INTO member_contribution_main VALUES("77","18","2023-03-02","3100","CharlesFeb2023","99/2023","2023-03-02 17:23:33","5","1");
INSERT INTO member_contribution_main VALUES("78","11","2023-03-02","3400","SlyJan2023","100/2023","2023-03-02 17:29:39","5","1");
INSERT INTO member_contribution_main VALUES("79","6","2023-03-02","3400","SammyJan2023","101/2023","2023-03-02 17:31:22","5","1");
INSERT INTO member_contribution_main VALUES("80","6","2023-03-02","2100","SammyFeb2023","102/2023","2023-03-02 17:32:16","5","1");
INSERT INTO member_contribution_main VALUES("81","8","2023-03-02","3400","PhilipJan2023","103/2023","2023-03-02 17:34:20","5","1");
INSERT INTO member_contribution_main VALUES("82","8","2023-03-02","4300","677518580110","104/2023","2023-03-02 17:38:59","5","1");
INSERT INTO member_contribution_main VALUES("83","9","2023-03-02","3400","BethJan2023","105/2023","2023-03-02 17:42:00","5","1");
INSERT INTO member_contribution_main VALUES("84","10","2023-03-02","6099","DuncanJanfeb2023","106/2023","2023-03-02 17:44:20","5","1");
INSERT INTO member_contribution_main VALUES("85","14","2023-03-02","4400","ThomasJanFeb2023","107/2023","2023-03-02 17:47:29","5","1");
INSERT INTO member_contribution_main VALUES("86","16","2023-03-02","1800","KelvinFeb2023","108/2023","2023-03-02 17:49:26","5","1");
INSERT INTO member_contribution_main VALUES("87","17","2023-03-02","3400","SamuelJan2023","109/2023","2023-03-02 17:51:08","5","1");
INSERT INTO member_contribution_main VALUES("88","5","2023-03-02","3400","RBQ8IHEN6A","110/2023","2023-03-02 17:53:25","5","1");
INSERT INTO member_contribution_main VALUES("89","11","2023-03-02","3400","RC20V26Q64","111/2023","2023-03-02 21:51:58","5","1");
INSERT INTO member_contribution_main VALUES("90","14","2023-03-03","1000","S6523724","112/2023","2023-03-03 19:28:43","5","1");
INSERT INTO member_contribution_main VALUES("91","12","2023-03-05","3400","RC44ZY5WFS","113/2023","2023-03-05 12:38:58","5","1");
INSERT INTO member_contribution_main VALUES("92","9","2023-03-05","2000","S355272","114/2023","2023-03-05 21:37:16","5","1");
INSERT INTO member_contribution_main VALUES("93","7","2023-03-05","3400","S416113","115/2023","2023-03-05 22:42:19","5","1");
INSERT INTO member_contribution_main VALUES("94","13","2023-03-06","5000","S2424400","116/2023","2023-03-06 22:51:23","5","1");
INSERT INTO member_contribution_main VALUES("95","17","2023-03-06","2100","S2340238","117/2023","2023-03-06 22:53:21","5","1");
INSERT INTO member_contribution_main VALUES("96","10","2023-03-06","3801","54528885","118/2023","2023-03-06 22:55:32","5","1");
INSERT INTO member_contribution_main VALUES("97","6","2023-03-06","2000","S1539132","119/2023","2023-03-06 22:56:56","5","1");
INSERT INTO member_contribution_main VALUES("98","1","2023-03-09","3100","S6043251","120/2023","2023-03-09 23:03:13","5","1");
INSERT INTO member_contribution_main VALUES("99","18","2023-03-11","4000","S640963","121/2023","2023-03-11 11:36:33","5","1");
INSERT INTO member_contribution_main VALUES("100","14","2023-03-13","1000","S4019493","122/2023","2023-03-13 14:04:51","5","1");
INSERT INTO member_contribution_main VALUES("101","17","2023-03-17","1400","S644501","123/2023","2023-03-17 20:12:52","5","1");
INSERT INTO member_contribution_main VALUES("102","1","2023-03-18","21300","S2873788","124/2023","2023-03-18 18:06:48","5","1");
INSERT INTO member_contribution_main VALUES("103","14","2023-03-20","1400","S5434501","125/2023","2023-03-20 19:50:05","5","1");
INSERT INTO member_contribution_main VALUES("104","8","2023-03-29","9000","RCT3VIED39","126/2023","2023-03-29 11:50:17","5","1");
INSERT INTO member_contribution_main VALUES("105","11","2023-03-31","14000","54360224","127/2023","2023-03-31 21:32:56","5","1");


CREATE TABLE `member_loans` (
  `loan_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_appl_id` bigint(20) NOT NULL,
  `disbursement_date` date NOT NULL,
  `repayment_startdate` date NOT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `href1` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `accessed_by` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `faicons` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `span_class` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'c-sidebar-nav-item c-sidebar-nav-dropdown',
  `spanclass2` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'c-sidebar-nav-link c-sidebar-nav-dropdown-toggle',
  `status` int(1) NOT NULL DEFAULT '1',
  `ordering` varchar(11) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO menu VALUES("1","Expenses","#","1,2,3,4,5,6","fa fa-money","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","4");
INSERT INTO menu VALUES("2","Loans","#","1,2,3,4,5,6","fa fa-table","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","3");
INSERT INTO menu VALUES("3","Contribution","#","1,2,3,4,5,6","fa fa-file-text-o","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","2");
INSERT INTO menu VALUES("4","Dashboard","./dashboard.php","1,2,3,4,5,6","fa fa-home","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","1");
INSERT INTO menu VALUES("5","Settings","#","1,2,3,4,5,6","fa fa-gear","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","7");
INSERT INTO menu VALUES("6","Manage Users","#","1,2,3,4,5,6","fa fa-user","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","6");
INSERT INTO menu VALUES("7","Documents","#","1,2,3,4,5,6","fa fa-file","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","5");


CREATE TABLE `menu_sub` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `description` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `href` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `accessed_by` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `ordering` varchar(11) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO menu_sub VALUES("1","1","Manage Expenses","./expenses/expense_list.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("2","6","Manage Users","./users/users_list.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("3","2","Loan Application","./loans/loan_application_list.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("4","2","Process Application","./loans/process_loan_applications.php","1,2,3,4,5,6","1","2");
INSERT INTO menu_sub VALUES("5","6","Manage User Roles","./users/users_roles.php","1,2,3,4,5,6","1","2");
INSERT INTO menu_sub VALUES("6","3","Contribution","./contributions/contributions_list.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("7","5","Company Details","./settings/company_details.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("8","5","Other Configurations","./settings/configurations.php","5","1","2");
INSERT INTO menu_sub VALUES("9","4","Dashboard","./dashboard.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("10","4","Admin Dashboard","./admin_dashboard.php","5","1","2");
INSERT INTO menu_sub VALUES("11","5","Loans Given","./clients_loans_given.php","1,2,3,4,5,6","0","5");
INSERT INTO menu_sub VALUES("12","3","Contribution Report","./contributions/contribution_report.php","1,2,3,4,5,6","1","2");
INSERT INTO menu_sub VALUES("13","7","Manage Documents","./documents/manage_documents.php","1,2,3,4,5,6","1","1");
INSERT INTO menu_sub VALUES("14","2","Pending Loans","./loans/pending_loans.php","1,2,3,4,5,6","1","3");


CREATE TABLE `payment_frequency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frequency` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO payment_frequency VALUES("1","Daily","1");
INSERT INTO payment_frequency VALUES("2","Weekly","1");
INSERT INTO payment_frequency VALUES("3","By Weekly","0");
INSERT INTO payment_frequency VALUES("4","Monthly","1");


CREATE TABLE `payment_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `item_amount` int(50) NOT NULL,
  `payment_frequency` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO payment_items VALUES("1","Daily Contributions","100","1","1");
INSERT INTO payment_items VALUES("2","Security","200","3","1");
INSERT INTO payment_items VALUES("3","Welfare","100","3","1");
INSERT INTO payment_items VALUES("4","Penalty","0","2","1");
INSERT INTO payment_items VALUES("5","Loan","0","3","1");
INSERT INTO payment_items VALUES("6","Expense","0","0","0");


CREATE TABLE `ser01` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `loan_no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `mem_no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rcpt_no` bigint(20) NOT NULL,
  `status` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO ser01 VALUES("1","1","77","16","128","1");


CREATE TABLE `user_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  `department_shortname` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_department VALUES("1","Member","MBR","1");
INSERT INTO user_department VALUES("2","Vice Secretary","VS","1");
INSERT INTO user_department VALUES("3","Secretary","SEC","1");
INSERT INTO user_department VALUES("4","Vice Chair","VC","1");
INSERT INTO user_department VALUES("5","Treasurer","TSR","1");
INSERT INTO user_department VALUES("6","Chair","CHAIR","1");


CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_roles VALUES("1","Add member contribution","1");
INSERT INTO user_roles VALUES("2","Approve Loan Application","1");
INSERT INTO user_roles VALUES("3","Approve Expenses","1");
INSERT INTO user_roles VALUES("4","View All Member Contributions and Loans","1");
INSERT INTO user_roles VALUES("5","Register and Manage Members","1");


CREATE TABLE `user_roles_assignment` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_roles_assignment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`member_id`),
  CONSTRAINT `user_roles_assignment_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `users` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_no` varchar(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `kra_pin` varchar(20) NOT NULL,
  `physical_address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `user_department` int(10) NOT NULL,
  `user_roles` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_expiry` datetime NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_image` varchar(500) NOT NULL DEFAULT 'uploads/user.png',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","1","Timothy Kipkemei","Arusei","31101093","1234","Nairobi kenya.","timothy.arusei@gmail.com","0729946994","1","","6b7c0dd303a83b39c5d46efa2bf273d8","2022-10-16 22:39:32","2022-10-16 15:32:51","uploads/user.png","1");
INSERT INTO users VALUES("5","2","Lazz","Korir","3110109","","Kenya ","lazaruskorir95@gmail.com","0723846453","5","","21e7d98946de43121f6e620749f3da27","2022-10-16 22:45:51","2022-10-16 22:39:32","uploads/user.png","1");
INSERT INTO users VALUES("6","3","Sammy","Gathaiya","3110109322","","Kenya","sammygathaiya@gmail.com","0790739037","6","","916f715a957614c39e9b6786a0b1240d","2023-10-18 11:15:37","2022-10-18 11:15:37","uploads/user.png","1");
INSERT INTO users VALUES("7","4","Wilfred","Kipng\'etich","456123","","Nairobi","wilfredkim5@gmail.com","0723787120","1","","3734ae5880d7fc518ee7806624952f9a","2023-10-18 21:49:45","2022-10-18 21:49:45","uploads/user.png","1");
INSERT INTO users VALUES("8","5","Philip","Njuguna","2456123","","Kenya","phlpnjuguna@gmail.com","0713861654","2","","ec16e7767394b077706ee1902889d2f5","2023-10-19 17:48:50","2022-10-19 17:48:50","uploads/user.png","1");
INSERT INTO users VALUES("9","6","Beth","Kananu","124512","","","kanabeth@gmail.com","0710592312","1","","c736dcff74e7661a33cc419d75db1fbb","2023-10-25 19:50:36","2022-10-25 19:50:36","uploads/user.png","1");
INSERT INTO users VALUES("10","7","Duncan","Omwoyo","4512245","","","omwoyoduncan@gmail.com","0707702078","1","","67640e5aab11baf0250d765644981247","2023-10-25 19:58:21","2022-10-25 19:58:21","uploads/user.png","1");
INSERT INTO users VALUES("11","8","Sylvia","Njango","31454545","A0000fds","Physical address","njango12@outlook.com","0725858725","4","","85bcace91f289eb7adc85ae60b611017","2023-12-12 09:42:06","2022-12-12 09:42:06","uploads/user.png","1");
INSERT INTO users VALUES("12","9","Juliet","Stonick","1313","aaaaa","Nairobi","julietstonick2015@gmail.com","0708128368","3","","3c96e8de98bc7e3f84859efebe74f41e","2024-01-03 20:50:16","2023-01-03 20:50:16","uploads/user.png","1");
INSERT INTO users VALUES("13","10","Festus","Simiyu","32020265","A007539709H","Nairobi","festosimiyu@gmail.com","0701660816","3","","8a550d6d3380819c22e38ee3ff0be537","2024-01-03 20:54:07","2023-01-03 20:54:07","uploads/user.png","1");
INSERT INTO users VALUES("14","11","Thomas","Kamau","123456","123456","Nairobi","thomaskamau6@gmail.com","0703970651","1","","0b0eb8ca628194681754453676b2ca99","2024-01-03 20:56:00","2023-01-03 20:56:00","uploads/user.png","1");
INSERT INTO users VALUES("15","12","Kamau","Muitiriri","","","Nairobi","kamaumuitiriri@gmail.com","0728950558","1","","3260e97cc89f6437f8d03c414bf21ab8","2024-01-03 20:57:51","2023-01-03 20:57:51","uploads/user.png","1");
INSERT INTO users VALUES("16","13","Kelvin","Njoroge","122333","154222","Nairobi","kelvinenjoroge@gmail.com","0715581655","1","","903ca3e4ea3c8b792299fb855240f248","2024-01-03 21:01:34","2023-01-03 21:01:34","uploads/user.png","1");
INSERT INTO users VALUES("17","14","Samuel","Njoroge","gfgfd","trtr54","Nairobi","samunjo16@gmail.com","0718297549","1","","4bb0782b96fb332d8bbc16050c927db0","2024-01-03 21:05:47","2023-01-03 21:05:47","uploads/user.png","1");
INSERT INTO users VALUES("18","15","Charles","Macharia","cm","12346","Nairobi","rotaractorcharles@gmail.com","0725209792","1","","7f9fa5136c8a5396b7a88339877da107","2024-01-03 21:21:22","2023-01-03 21:21:22","uploads/user.png","1");
