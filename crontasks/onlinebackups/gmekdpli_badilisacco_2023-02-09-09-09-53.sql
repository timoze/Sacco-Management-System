

CREATE TABLE `audit_trail` (
  `trail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `trail_date` datetime NOT NULL,
  `trail_desc` longtext COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_addr` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `trail_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`trail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=715 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  `company_logo` varchar(250) NOT NULL,
  `mail_host` varchar(100) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `mail_port` varchar(11) NOT NULL,
  `mail_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO config VALUES("1","18.00","1","30","3","images/badili_group_logo.jpeg","mail.badilisacco.co.ke","notifications@badilisacco.co.ke","465","c-?2I8n9EwG&");


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `loan_guarantors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) NOT NULL,
  `guarantor` int(11) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `comments` text NOT NULL,
  `approval_date` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `loan_schedule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) NOT NULL,
  `date_due` date NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `amount_paid` decimal(16,2) NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_schedule VALUES("289","47","2023-03-15","4090.22","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("290","47","2023-04-15","4090.22","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("291","48","2023-03-03","9653.89","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("292","48","2023-03-31","9653.89","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("293","48","2023-05-01","9653.89","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("294","48","2023-05-31","9653.89","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("295","48","2023-07-01","9653.89","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("296","48","2023-07-31","9653.89","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("297","49","2023-03-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("298","49","2023-04-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("299","49","2023-05-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("300","49","2023-06-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("301","49","2023-07-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("302","49","2023-08-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("303","49","2023-09-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("304","49","2023-10-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("305","49","2023-11-17","6072.31","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("306","49","2023-12-17","6072.31","0.00","0000-00-00","1");


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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

INSERT INTO member_contribution VALUES("1","5","D","0","1","0","2","","2023-01-25","200","0.00","RAP85V804K","2023-01-25 14:01:58","5","1");
INSERT INTO member_contribution VALUES("2","5","D","0","1","0","3","","2023-01-25","100","0.00","RAP85V804K","2023-01-25 14:01:29","5","1");
INSERT INTO member_contribution VALUES("3","5","D","0","1","0","1","","2023-01-25","3100","0.00","RAP85V804K","2023-01-25 14:01:08","5","1");
INSERT INTO member_contribution VALUES("4","1","D","0","2","0","1","","2023-02-06","1000","0.00","RB601VK4U4","2023-02-06 20:34:37","5","1");
INSERT INTO member_contribution VALUES("5","6","D","0","3","0","1","","2023-02-06","1000","0.00","RB692OEC2P","2023-02-06 20:35:57","5","1");
INSERT INTO member_contribution VALUES("6","7","D","0","4","0","1","","2023-02-06","2900","0.00","RB46X16ULU","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution VALUES("7","7","D","0","4","0","3","","2023-02-06","100","0.00","RB46X16ULU","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution VALUES("8","7","D","0","4","0","2","","2023-02-06","200","0.00","RB46X16ULU","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution VALUES("9","14","D","0","5","0","1","","2023-02-06","1000","0.00","RB49WXYWRB","2023-02-06 20:38:18","5","1");
INSERT INTO member_contribution VALUES("10","11","D","0","6","0","1","","2023-02-06","2900","0.00","RB29ROGUMP","2023-02-06 20:39:21","5","1");
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO member_contribution_main VALUES("1","5","2023-01-25","3400","RAP85V804K","1/2022","2023-01-25 14:01:58","5","1");
INSERT INTO member_contribution_main VALUES("2","1","2023-02-06","1000","RB601VK4U4","24/2023","2023-02-06 20:34:37","5","1");
INSERT INTO member_contribution_main VALUES("3","6","2023-02-06","1000","RB692OEC2P","25/2023","2023-02-06 20:35:57","5","1");
INSERT INTO member_contribution_main VALUES("4","7","2023-02-06","3200","RB46X16ULU","26/2023","2023-02-06 20:37:32","5","1");
INSERT INTO member_contribution_main VALUES("5","14","2023-02-06","1000","RB49WXYWRB","27/2023","2023-02-06 20:38:18","5","1");
INSERT INTO member_contribution_main VALUES("6","11","2023-02-06","3200","RB29ROGUMP","28/2023","2023-02-06 20:39:21","5","1");
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO menu_sub VALUES("1","1","Manage Expenses","./expenses/expense_list.php","","1","1");
INSERT INTO menu_sub VALUES("2","6","Manage Users","./users/users_list.php","","1","1");
INSERT INTO menu_sub VALUES("3","2","Loan Application","./loans/loan_application_list.php","","1","1");
INSERT INTO menu_sub VALUES("4","2","Process Application","./loans/process_loan_applications.php","","1","2");
INSERT INTO menu_sub VALUES("5","6","Manage User Roles","./users/users_roles.php","","1","2");
INSERT INTO menu_sub VALUES("6","3","Contribution","./contributions/contributions_list.php","","1","1");
INSERT INTO menu_sub VALUES("7","5","Company Details","./settings/company_details.php","","1","1");
INSERT INTO menu_sub VALUES("8","5","Other Configurations","./settings/configurations.php","","1","2");
INSERT INTO menu_sub VALUES("9","4","Dashboard","./dashboard.php","","1","1");
INSERT INTO menu_sub VALUES("10","4","Admin Dashboard","./admin_dashboard.php","","1","2");
INSERT INTO menu_sub VALUES("11","5","Loans Given","./clients_loans_given.php","","0","5");
INSERT INTO menu_sub VALUES("12","3","Contribution Report","./contributions/contribution_report.php","","1","2");
INSERT INTO menu_sub VALUES("13","7","Manage Documents","./documents/manage_documents.php","","1","1");


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
INSERT INTO payment_items VALUES("3","Welfare Contribution","100","3","1");
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

INSERT INTO ser01 VALUES("1","1","65","16","43","1");


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
INSERT INTO users VALUES("5","2","Lazz","Korir","3110109","","Kenya ","lazaruskorir95@gmail.com","0721000000","5","","21e7d98946de43121f6e620749f3da27","2022-10-16 22:45:51","2022-10-16 22:39:32","uploads/user.png","1");
INSERT INTO users VALUES("6","3","Sammy","Gathaiya","3110109322","","Kenya","sammygathaiya@gmail.com","0721000000","6","","916f715a957614c39e9b6786a0b1240d","2023-10-18 11:15:37","2022-10-18 11:15:37","uploads/user.png","1");
INSERT INTO users VALUES("7","4","Wilfred","Kipng\'etich","456123","","Nairobi","wilfredkim5@gmail.com","07245878","1","","3734ae5880d7fc518ee7806624952f9a","2023-10-18 21:49:45","2022-10-18 21:49:45","uploads/user.png","1");
INSERT INTO users VALUES("8","5","Philip","Njuguna","2456123","","Kenya","phlpnjuguna@gmail.com","0721000000","1","","ec16e7767394b077706ee1902889d2f5","2023-10-19 17:48:50","2022-10-19 17:48:50","uploads/user.png","1");
INSERT INTO users VALUES("9","6","Beth","Kananu","124512","","","kanabeth@gmail.com","0127846","1","","c736dcff74e7661a33cc419d75db1fbb","2023-10-25 19:50:36","2022-10-25 19:50:36","uploads/user.png","1");
INSERT INTO users VALUES("10","7","Duncan","Omwoyo","4512245","","","omwoyoduncan@gmail.com","015712245","1","","67640e5aab11baf0250d765644981247","2023-10-25 19:58:21","2022-10-25 19:58:21","uploads/user.png","1");
INSERT INTO users VALUES("11","8","Sylvia","Njango","31454545","A0000fds","Physical address","njango12@outlook.com","0725858725","4","","85bcace91f289eb7adc85ae60b611017","2023-12-12 09:42:06","2022-12-12 09:42:06","uploads/user.png","1");
INSERT INTO users VALUES("12","9","Juliet","Stonick","1313","aaaaa","Nairobi","julietstonick2015@gmail.com","0708128368","3","","3c96e8de98bc7e3f84859efebe74f41e","2024-01-03 20:50:16","2023-01-03 20:50:16","uploads/user.png","1");
INSERT INTO users VALUES("13","10","Festus","Simiyu","13456","123123","Nairobi","festosimiyu@gmail.com","0701660816","2","","8a550d6d3380819c22e38ee3ff0be537","2024-01-03 20:54:07","2023-01-03 20:54:07","uploads/user.png","1");
INSERT INTO users VALUES("14","11","Thomas","Kamau","123456","123456","Nairobi","thomaskamau6@gmail.com","0703970651","1","","c5d3bb85aaf490c9807fdb1067b73c89","2024-01-03 20:56:00","2023-01-03 20:56:00","uploads/user.png","1");
INSERT INTO users VALUES("15","12","Kamau","Muitiriri","","","Nairobi","kamaumuitiriri@gmail.com","0728950558","1","","3260e97cc89f6437f8d03c414bf21ab8","2024-01-03 20:57:51","2023-01-03 20:57:51","uploads/user.png","1");
INSERT INTO users VALUES("16","13","Kelvin","Njoroge","122333","154222","Nairobi","kelvinenjoroge@gmail.com","0715581655","1","","903ca3e4ea3c8b792299fb855240f248","2024-01-03 21:01:34","2023-01-03 21:01:34","uploads/user.png","1");
INSERT INTO users VALUES("17","14","Samuel","Njoroge","gfgfd","trtr54","Nairobi","samunjo16@gmail.com","0718297549","1","","4bb0782b96fb332d8bbc16050c927db0","2024-01-03 21:05:47","2023-01-03 21:05:47","uploads/user.png","1");
INSERT INTO users VALUES("18","15","Charles","Macharia","cm","12346","Nairobi","rotaractorcharles@gmail.com","0725209792","1","","7f9fa5136c8a5396b7a88339877da107","2024-01-03 21:21:22","2023-01-03 21:21:22","uploads/user.png","1");
