

CREATE TABLE `audit_trail` (
  `trail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `trail_date` datetime NOT NULL,
  `trail_desc` longtext COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_addr` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `trail_status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`trail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=319 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
INSERT INTO audit_trail VALUES("252","2022-12-18 20:06:36","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("253","2022-12-18 21:45:43","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("254","2022-12-19 12:49:37","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("255","2022-12-21 14:58:08","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("256","2022-12-21 15:00:31","Posted new Expense (domain acquisition)","1","::1","1");
INSERT INTO audit_trail VALUES("257","2022-12-21 15:02:09","Approved Expense ID (1 )  ","1","::1","1");
INSERT INTO audit_trail VALUES("258","2022-12-21 15:02:44","Cancelled Expense ID (1 ) ","1","::1","1");
INSERT INTO audit_trail VALUES("259","2022-12-21 15:06:32","Updated Expense Details for (domain acquisition ) ID: 1","1","::1","1");
INSERT INTO audit_trail VALUES("260","2022-12-21 15:06:49","Approved Expense ID (1 )  ","1","::1","1");
INSERT INTO audit_trail VALUES("261","2022-12-21 15:07:25","Posted new Expense (Test two)","1","::1","1");
INSERT INTO audit_trail VALUES("262","2022-12-21 15:07:43","Posted new Expense (test 35)","1","::1","1");
INSERT INTO audit_trail VALUES("263","2022-12-21 15:07:53","Cancelled Expense ID (2 ) ","1","::1","1");
INSERT INTO audit_trail VALUES("264","2022-12-21 15:08:46","Posted new Expense (To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user. To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user.To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user. To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user.To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user.)","1","::1","1");
INSERT INTO audit_trail VALUES("265","2022-12-21 15:13:33","Approved Expense ID (3 )  ","1","::1","1");
INSERT INTO audit_trail VALUES("266","2022-12-21 17:41:23","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("267","2022-12-21 20:02:59","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("268","2022-12-21 21:53:23","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("269","2023-01-08 17:07:30","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("270","2023-01-25 15:24:10","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("271","2023-01-26 18:22:07","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("272","2023-01-27 22:07:41","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("273","2023-01-27 22:38:09","Registered new member contribution (Lazz Korir)","1","::1","1");
INSERT INTO audit_trail VALUES("274","2023-01-27 22:40:05","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("275","2023-01-27 23:16:02","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("276","2023-01-28 08:48:36","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("277","2023-01-28 08:57:23","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("278","2023-01-28 09:08:17","Cancelled Contribution for (Timothy Kipkemei Arusei) TXN ID :- nghgfhf","1","::1","1");
INSERT INTO audit_trail VALUES("279","2023-01-28 12:11:15","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("280","2023-01-28 13:10:55","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("281","2023-01-28 13:13:21","Deleted Contribution Item for (Timothy Kipkemei Arusei) TXN ID :- ","1","::1","1");
INSERT INTO audit_trail VALUES("282","2023-01-28 13:14:25","Deleted Contribution Item for (Timothy Kipkemei Arusei) TXN ID :- ","1","::1","1");
INSERT INTO audit_trail VALUES("283","2023-01-28 13:19:06","Deleted Contribution Item for (Timothy Kipkemei Arusei) TXN ID :- ","1","::1","1");
INSERT INTO audit_trail VALUES("284","2023-01-28 13:34:52","Registered new member contribution (Lazz Korir)","1","::1","1");
INSERT INTO audit_trail VALUES("285","2023-01-28 13:35:09","Deleted Contribution Item for (Lazz Korir) ","1","::1","1");
INSERT INTO audit_trail VALUES("286","2023-01-28 13:35:40","Deleted Contribution Item for (Lazz Korir) ","1","::1","1");
INSERT INTO audit_trail VALUES("287","2023-01-28 13:36:27","Deleted Contribution Item for (Lazz Korir) ","1","::1","1");
INSERT INTO audit_trail VALUES("288","2023-01-28 13:55:22","Deleted Contribution for (Sammy Gathaiya) TXN ID :- ","1","::1","1");
INSERT INTO audit_trail VALUES("289","2023-01-28 13:55:22","Deleted Contribution for (Timothy Kipkemei Arusei) TXN ID :- ","1","::1","1");
INSERT INTO audit_trail VALUES("290","2023-01-28 14:03:47","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("291","2023-01-28 14:10:32","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("292","2023-01-28 14:10:41","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("293","2023-01-28 14:30:49","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("294","2023-01-28 14:33:33","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("295","2023-01-28 14:34:47","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("296","2023-01-28 14:37:17","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("297","2023-01-28 14:37:24","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("298","2023-01-28 14:38:41","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("299","2023-01-28 14:40:32","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("300","2023-01-28 14:40:55","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("301","2023-01-28 14:41:25","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("302","2023-01-28 14:42:22","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("303","2023-01-28 14:42:31","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("304","2023-01-28 14:43:34","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("305","2023-01-28 14:43:57","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("306","2023-01-28 14:46:33","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("307","2023-01-28 14:52:09","Updated Member Contribution for (Timothy Kipkemei Arusei) ID: 5","1","::1","1");
INSERT INTO audit_trail VALUES("308","2023-01-28 15:23:09","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("309","2023-01-28 15:23:16","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("310","2023-01-28 15:23:38","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("311","2023-01-28 15:45:28","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("312","2023-01-28 15:45:48","Registered new member contribution (Timothy Kipkemei Arusei)","1","::1","1");
INSERT INTO audit_trail VALUES("313","2023-01-28 15:54:31","Registered new member contribution (Lazz Korir)","1","::1","1");
INSERT INTO audit_trail VALUES("314","2023-01-28 16:14:08","Registered new member contribution (Lazz Korir)","1","::1","1");
INSERT INTO audit_trail VALUES("315","2023-01-28 18:37:06","Deleted Contribution Item for (Timothy Kipkemei Arusei) ","1","::1","1");
INSERT INTO audit_trail VALUES("316","2023-01-28 18:37:20","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("317","2023-02-02 21:17:23","Successfull User Login","1","::1","1");
INSERT INTO audit_trail VALUES("318","2023-02-03 22:20:29","Successfull User Login","1","::1","1");


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
  `dbx_access_token` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO company_details VALUES("1","Badili Self Help Group","","badiliselfhelpgroup3@gmail.com","P.O.BOX 424","20106","Roysambu, Kenya","","","2022-12-11","sl.BYJyZ1vhtlvo7LjZZyUypsRIenp2GFNTqOM4J9SpF8CSvaHxKWUWixu4aizgyWhCrvisnZY4tqRe7tVjmnqD9Asyd_n-h0PYjkw-v1hKfidg618-7XSN_SoiwQff7n2ycmnldrQ");


CREATE TABLE `config` (
  `id` int(1) NOT NULL DEFAULT 1,
  `interest_rate` decimal(5,2) NOT NULL DEFAULT 12.00,
  `loan_formula` int(2) NOT NULL DEFAULT 1,
  `loan_grace_period` int(2) NOT NULL DEFAULT 30,
  `guarantors` int(2) NOT NULL DEFAULT 3,
  `dbx_access_token` varchar(255) NOT NULL,
  `dbx_client_id` varchar(255) NOT NULL,
  `dbx_client_secret` varchar(255) NOT NULL,
  `company_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO config VALUES("1","18.00","1","30","3","","rjjjpdqlu0lde5r","09bbt9j4pb9n0v6","images/badili_group_logo.jpeg");


CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_date` date NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `brief_description` text NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO expenses VALUES("1","2022-12-21","457877","400000.00","domain acquisition ","2022-12-21 15:00:31","1","9");
INSERT INTO expenses VALUES("2","2022-12-21","trterter","14000.00","Test two","2022-12-21 15:07:25","1","3");
INSERT INTO expenses VALUES("3","2022-12-21","gtesfdf","5000.00","test 35","2022-12-21 15:07:43","1","1");
INSERT INTO expenses VALUES("4","2022-12-21","adsdfsdf","45000.00","To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user. To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user.To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user. To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user.To run the test, you\'ll be connected to Measurement Lab (M-Lab) and your IP address will be shared with them and processed by them in accordance with their privacy policy. M-Lab conducts the test and publicly publishes all test results to promote Internet research. Published information includes your IP address and test results, but doesn’t include any other information about you as an Internet user.","2022-12-21 15:08:46","1","0");


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
  `guarantors` int(11) NOT NULL DEFAULT 0,
  `approved_by` bigint(20) NOT NULL,
  `comments` text NOT NULL,
  `approval_date` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_application VALUES("1","1","1/2022","2022-12-06","126720.00","0.00","0.00","0","0","0","0","","0000-00-00 00:00:00","0000-00-00 00:00:00","0");
INSERT INTO loan_application VALUES("2","1","2/2022","2022-12-06","126720.00","146575.87","7714.52","19","0","0","0","","0000-00-00 00:00:00","0000-00-00 00:00:00","0");
INSERT INTO loan_application VALUES("3","1","3/2022","2022-12-06","126720.00","146575.87","7714.52","0","0","0","0","","0000-00-00 00:00:00","0000-00-00 00:00:00","0");
INSERT INTO loan_application VALUES("4","1","4/2022","2022-12-06","167480.00","202079.08","8083.16","25","1","2","0","","0000-00-00 00:00:00","2022-12-07 00:02:49","0");
INSERT INTO loan_application VALUES("5","1","5/2022","2022-12-07","167480.00","200670.93","8361.29","24","1","2","0","","0000-00-00 00:00:00","2022-12-07 06:55:04","0");
INSERT INTO loan_application VALUES("6","1","16/2022","2022-12-07","126720","152898.62","6115.94","25","1","2","0","","0000-00-00 00:00:00","2022-12-07 22:12:38","0");
INSERT INTO loan_application VALUES("7","1","18/2022","2022-12-07","126720","152898.62","6115.94","25","1","1","0","","0000-00-00 00:00:00","2022-12-07 22:21:49","0");
INSERT INTO loan_application VALUES("8","1","19/2022","2022-12-07","126720","155043.47","5742.35","27","0","0","0","","0000-00-00 00:00:00","2022-12-07 22:23:01","0");
INSERT INTO loan_application VALUES("9","1","20/2022","2022-12-07","126720","155043.47","5742.35","27","0","0","0","","0000-00-00 00:00:00","2022-12-07 22:24:25","0");
INSERT INTO loan_application VALUES("10","1","21/2022","2022-12-07","126700","155019","5741.44","27","0","0","1","APPROVED LOAN","2022-12-17 00:30:27","2022-12-07 22:26:01","1");
INSERT INTO loan_application VALUES("11","1","22/2022","2022-12-07","126720","147617.99","7380.9","20","0","0","0","","0000-00-00 00:00:00","2022-12-07 22:31:15","0");
INSERT INTO loan_application VALUES("12","1","23/2022","2022-12-07","126720","146575.87","7714.52","19","0","0","0","","0000-00-00 00:00:00","2022-12-07 22:54:28","0");
INSERT INTO loan_application VALUES("13","1","24/2022","2022-12-07","126720","146575.87","7714.52","19","1","1","0","","0000-00-00 00:00:00","2022-12-07 23:05:38","0");
INSERT INTO loan_application VALUES("14","1","25/2022","2022-12-07","","NAN","NAN","0","0","0","0","","0000-00-00 00:00:00","2022-12-07 23:19:41","0");
INSERT INTO loan_application VALUES("15","1","26/2022","2022-12-07","126720","147617.99","7380.9","20","1","1","0","","0000-00-00 00:00:00","2022-12-07 23:30:46","0");
INSERT INTO loan_application VALUES("16","1","27/2022","2022-12-07","126720","142454.23","9496.95","15","0","0","0","","0000-00-00 00:00:00","2022-12-07 23:31:52","0");
INSERT INTO loan_application VALUES("17","1","28/2022","2022-12-07","126720","144505.68","8500.33","17","1","1","0","","0000-00-00 00:00:00","2022-12-07 23:32:01","0");
INSERT INTO loan_application VALUES("18","1","29/2022","2022-12-07","126720","144505.68","8500.33","17","1","2","0","","0000-00-00 00:00:00","2022-12-07 23:32:37","0");
INSERT INTO loan_application VALUES("19","1","30/2022","2022-12-07","126720","145538.44","8085.47","18","1","1","0","","0000-00-00 00:00:00","2022-12-07 23:33:24","0");
INSERT INTO loan_application VALUES("20","1","31/2022","2022-12-08","126720","147617.99","7380.9","20","1","1","0","","0000-00-00 00:00:00","2022-12-08 07:06:29","0");
INSERT INTO loan_application VALUES("21","1","32/2022","2022-12-08","126720","147617.99","7380.9","20","1","1","0","","0000-00-00 00:00:00","2022-12-08 07:09:25","0");
INSERT INTO loan_application VALUES("22","1","33/2022","2022-12-08","126720","143477.61","8967.35","16","1","1","0","","0000-00-00 00:00:00","2022-12-08 07:36:42","0");
INSERT INTO loan_application VALUES("23","1","34/2022","2022-12-08","126720","147617.99","7380.9","20","1","1","0","","0000-00-00 00:00:00","2022-12-08 07:41:44","0");
INSERT INTO loan_application VALUES("24","1","35/2022","2022-12-08","126720","144505.68","8500.33","17","1","1","0","","0000-00-00 00:00:00","2022-12-08 08:08:36","0");
INSERT INTO loan_application VALUES("25","1","36/2022","2022-12-08","126720","146575.87","7714.52","19","1","2","0","","0000-00-00 00:00:00","2022-12-08 08:59:33","0");
INSERT INTO loan_application VALUES("26","1","37/2022","2022-12-08","126720","143477.61","8967.35","16","1","1","0","","0000-00-00 00:00:00","2022-12-08 21:24:10","0");
INSERT INTO loan_application VALUES("27","1","38/2022","2022-12-10","126720","161589.22","4896.64","33","0","0","1","test approved","2022-12-17 00:24:13","2022-12-10 12:18:58","1");
INSERT INTO loan_application VALUES("28","1","39/2022","2022-12-11","126720","149716.25","6805.28","22","1","2","0","","0000-00-00 00:00:00","2022-12-11 00:09:27","0");
INSERT INTO loan_application VALUES("29","1","40/2022","2022-12-15","300000","330047.97","27504","12","1","2","0","","0000-00-00 00:00:00","2022-12-15 00:08:55","0");
INSERT INTO loan_application VALUES("30","1","41/2022","2022-12-15","126720","160486.71","5015.21","32","0","0","1","approved second","2022-12-17 00:18:12","2022-12-15 20:50:35","1");
INSERT INTO loan_application VALUES("31","1","42/2022","2022-12-15","126720","152898.62","6115.94","25","1","1","1","Approved","2022-12-17 00:15:45","2022-12-15 20:52:16","1");
INSERT INTO loan_application VALUES("32","1","43/2022","2022-12-15","126720","153968.72","5921.87","26","1","1","0","","0000-00-00 00:00:00","2022-12-15 20:53:21","0");
INSERT INTO loan_application VALUES("33","1","44/2022","2022-12-17","100000","110015.99","9168","12","0","0","1","Test","2022-12-17 20:25:26","2022-12-17 08:42:46","1");
INSERT INTO loan_application VALUES("34","1","45/2022","2022-12-18","126720","160486.71","5015.21","32","0","0","1","test 1234 approval","2022-12-18 15:47:14","2022-12-18 15:27:49","1");
INSERT INTO loan_application VALUES("35","1","46/2022","2022-12-18","50000","54611.61","4964.69","11","0","0","0","","0000-00-00 00:00:00","2022-12-18 15:53:05","0");


CREATE TABLE `loan_guarantors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) NOT NULL,
  `guarantor` int(11) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `comments` text NOT NULL,
  `approval_date` datetime NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_guarantors VALUES("1","4","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("2","4","7","40360.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("3","5","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("4","5","7","40360.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("5","0","7","40360.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("6","0","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("7","0","7","4000.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("8","6","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("9","6","7","40360.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("10","7","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("11","13","1","126720.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("12","15","0","0.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("13","17","0","0.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("14","18","0","0.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("15","18","0","0.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("16","19","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("17","20","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("18","21","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("19","22","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("20","23","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("21","24","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("22","25","5","400.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("23","25","7","40360.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("30","26","7","300.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("31","28","1","126720.00","Approved test","2022-12-14 21:42:33","1");
INSERT INTO loan_guarantors VALUES("32","28","6","12000.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("33","29","1","126720.00","comments","2022-12-15 00:09:50","3");
INSERT INTO loan_guarantors VALUES("34","29","7","40360.00","","0000-00-00 00:00:00","0");
INSERT INTO loan_guarantors VALUES("35","31","1","126720.00","approved","2022-12-15 20:55:53","1");
INSERT INTO loan_guarantors VALUES("36","32","5","400.00","","0000-00-00 00:00:00","0");


CREATE TABLE `loan_schedule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `loan_id` bigint(20) NOT NULL,
  `date_due` date NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `amount_paid` decimal(16,2) NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4;

INSERT INTO loan_schedule VALUES("1","31","2023-01-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("2","31","2023-02-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("3","31","2023-03-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("4","31","2023-04-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("5","31","2023-05-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("6","31","2023-06-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("7","31","2023-07-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("8","31","2023-08-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("9","31","2023-09-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("10","31","2023-10-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("11","31","2023-11-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("12","31","2023-12-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("13","31","2024-01-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("14","31","2024-02-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("15","31","2024-03-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("16","31","2024-04-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("17","31","2024-05-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("18","31","2024-06-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("19","31","2024-07-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("20","31","2024-08-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("21","31","2024-09-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("22","31","2024-10-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("23","31","2024-11-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("24","31","2024-12-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("25","31","2025-01-16","6115.94","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("26","30","2023-01-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("27","30","2023-02-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("28","30","2023-03-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("29","30","2023-04-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("30","30","2023-05-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("31","30","2023-06-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("32","30","2023-07-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("33","30","2023-08-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("34","30","2023-09-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("35","30","2023-10-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("36","30","2023-11-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("37","30","2023-12-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("38","30","2024-01-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("39","30","2024-02-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("40","30","2024-03-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("41","30","2024-04-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("42","30","2024-05-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("43","30","2024-06-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("44","30","2024-07-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("45","30","2024-08-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("46","30","2024-09-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("47","30","2024-10-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("48","30","2024-11-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("49","30","2024-12-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("50","30","2025-01-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("51","30","2025-02-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("52","30","2025-03-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("53","30","2025-04-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("54","30","2025-05-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("55","30","2025-06-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("56","30","2025-07-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("57","30","2025-08-16","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("58","27","2023-01-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("59","27","2023-02-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("60","27","2023-03-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("61","27","2023-04-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("62","27","2023-05-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("63","27","2023-06-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("64","27","2023-07-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("65","27","2023-08-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("66","27","2023-09-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("67","27","2023-10-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("68","27","2023-11-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("69","27","2023-12-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("70","27","2024-01-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("71","27","2024-02-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("72","27","2024-03-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("73","27","2024-04-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("74","27","2024-05-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("75","27","2024-06-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("76","27","2024-07-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("77","27","2024-08-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("78","27","2024-09-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("79","27","2024-10-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("80","27","2024-11-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("81","27","2024-12-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("82","27","2025-01-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("83","27","2025-02-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("84","27","2025-03-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("85","27","2025-04-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("86","27","2025-05-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("87","27","2025-06-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("88","27","2025-07-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("89","27","2025-08-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("90","27","2025-09-16","4896.64","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("91","10","2023-01-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("92","10","2023-02-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("93","10","2023-03-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("94","10","2023-04-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("95","10","2023-05-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("96","10","2023-06-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("97","10","2023-07-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("98","10","2023-08-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("99","10","2023-09-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("100","10","2023-10-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("101","10","2023-11-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("102","10","2023-12-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("103","10","2024-01-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("104","10","2024-02-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("105","10","2024-03-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("106","10","2024-04-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("107","10","2024-05-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("108","10","2024-06-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("109","10","2024-07-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("110","10","2024-08-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("111","10","2024-09-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("112","10","2024-10-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("113","10","2024-11-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("114","10","2024-12-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("115","10","2025-01-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("116","10","2025-02-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("117","10","2025-03-16","5741.44","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("118","33","2023-01-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("119","33","2023-02-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("120","33","2023-03-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("121","33","2023-04-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("122","33","2023-05-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("123","33","2023-06-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("124","33","2023-07-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("125","33","2023-08-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("126","33","2023-09-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("127","33","2023-10-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("128","33","2023-11-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("129","33","2023-12-16","9168.00","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("130","34","2023-01-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("131","34","2023-02-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("132","34","2023-03-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("133","34","2023-04-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("134","34","2023-05-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("135","34","2023-06-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("136","34","2023-07-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("137","34","2023-08-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("138","34","2023-09-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("139","34","2023-10-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("140","34","2023-11-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("141","34","2023-12-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("142","34","2024-01-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("143","34","2024-02-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("144","34","2024-03-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("145","34","2024-04-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("146","34","2024-05-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("147","34","2024-06-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("148","34","2024-07-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("149","34","2024-08-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("150","34","2024-09-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("151","34","2024-10-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("152","34","2024-11-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("153","34","2024-12-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("154","34","2025-01-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("155","34","2025-02-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("156","34","2025-03-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("157","34","2025-04-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("158","34","2025-05-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("159","34","2025-06-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("160","34","2025-07-17","5015.21","0.00","0000-00-00","1");
INSERT INTO loan_schedule VALUES("161","34","2025-08-17","5015.21","0.00","0000-00-00","1");


CREATE TABLE `member_contribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(11) NOT NULL,
  `cr_dr` varchar(1) NOT NULL,
  `loan_id` bigint(20) NOT NULL,
  `contrib_id` bigint(20) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `contribution_date` date NOT NULL,
  `contribution_amount` bigint(50) NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

INSERT INTO member_contribution VALUES("1","1","D","0","0","2","2022-03-15","500","nghgfhf","2022-03-20 07:22:19","1","9");
INSERT INTO member_contribution VALUES("2","5","D","0","0","2","2022-03-20","200","vcfg","2022-03-20 09:30:12","1","0");
INSERT INTO member_contribution VALUES("3","6","D","0","0","3","2022-03-20","100","","2022-03-20 09:31:31","1","9");
INSERT INTO member_contribution VALUES("4","1","D","0","0","1","2022-03-20","700","","2022-03-20 09:31:51","1","9");
INSERT INTO member_contribution VALUES("5","8","D","0","0","1","2022-03-20","5000","","2022-03-20 09:35:23","1","0");
INSERT INTO member_contribution VALUES("6","1","D","0","0","1","2022-10-24","45000","","2022-10-24 19:50:54","1","1");
INSERT INTO member_contribution VALUES("7","1","D","0","0","1","2022-10-24","45000","","2022-10-24 19:53:25","1","1");
INSERT INTO member_contribution VALUES("8","7","D","0","0","1","2022-10-24","50000","gddfgdfdf","2022-10-24 19:55:11","1","1");
INSERT INTO member_contribution VALUES("9","5","D","0","0","1","2022-10-25","500","hdfjfsvb","2022-10-25 20:14:02","1","1");
INSERT INTO member_contribution VALUES("10","6","D","0","0","2","2022-10-25","500","fgfh","2022-10-25 20:46:14","1","1");
INSERT INTO member_contribution VALUES("11","1","D","0","0","1","2022-11-15","41000","1245hhjj","2022-11-15 18:11:22","1","1");
INSERT INTO member_contribution VALUES("12","1","D","0","0","2","2022-11-15","400","fgdfgdgf","2022-11-15 20:01:15","1","1");
INSERT INTO member_contribution VALUES("13","1","D","0","0","1","2022-11-23","500","1245hhjjh","2022-11-23 14:35:38","1","1");
INSERT INTO member_contribution VALUES("14","1","D","0","0","1","2022-11-23","4000","123466hhh","2022-11-23 14:42:45","1","1");
INSERT INTO member_contribution VALUES("15","1","D","0","0","1","2022-11-23","500","123466hhhgg","2022-11-23 14:44:39","1","1");
INSERT INTO member_contribution VALUES("16","7","D","0","0","1","2022-11-23","450","ggg","2022-11-23 14:45:52","1","1");
INSERT INTO member_contribution VALUES("17","1","D","0","0","1","2022-11-23","8000","rrrrere","2022-11-23 14:46:45","1","1");
INSERT INTO member_contribution VALUES("18","1","D","0","0","1","2022-11-23","7200","ererere","2022-11-23 14:54:25","1","1");
INSERT INTO member_contribution VALUES("19","1","D","0","0","1","2022-11-23","7200","ererere","2022-11-23 14:56:02","1","1");
INSERT INTO member_contribution VALUES("20","6","D","0","0","1","2022-12-12","5000","ghfghfghfg","2022-12-12 11:29:41","1","1");
INSERT INTO member_contribution VALUES("21","1","D","0","0","2","2022-12-12","500","gfhgf","2022-12-12 11:33:23","1","1");
INSERT INTO member_contribution VALUES("22","6","D","0","0","1","2022-12-12","5000","gdfgdf","2022-12-12 11:38:26","1","1");
INSERT INTO member_contribution VALUES("23","6","D","0","0","1","2022-12-12","5000","gdfgdf","2022-12-12 11:59:40","1","1");
INSERT INTO member_contribution VALUES("24","9","D","0","0","1","2022-12-12","10000","gfgdfgdf","2022-12-12 12:00:07","1","1");
INSERT INTO member_contribution VALUES("25","1","C","34","0","5","2022-12-18","126720","","2022-12-18 15:47:14","1","1");
INSERT INTO member_contribution VALUES("26","5","","0","0","0","2023-01-27","3801","RAP85V804K","2023-01-27 22:38:09","1","1");
INSERT INTO member_contribution VALUES("27","5","D","0","26","1","2023-01-27","3201","RAP85V804K","2023-01-27 22:38:09","1","1");
INSERT INTO member_contribution VALUES("28","5","D","0","26","3","2023-01-27","200","RAP85V804K","2023-01-27 22:38:09","1","1");
INSERT INTO member_contribution VALUES("29","5","D","0","26","2","2023-01-27","400","RAP85V804K","2023-01-27 22:38:09","1","1");
INSERT INTO member_contribution VALUES("30","1","D","0","1","1","2023-01-27","3201","RAP85V804K","2023-01-27 22:40:05","1","0");
INSERT INTO member_contribution VALUES("31","1","D","0","1","2","2023-01-27","400","RAP85V804K","2023-01-27 22:40:05","1","0");
INSERT INTO member_contribution VALUES("32","1","D","0","1","3","2023-01-27","200","RAP85V804K","2023-01-27 22:40:05","1","0");
INSERT INTO member_contribution VALUES("33","1","D","0","2","1","2023-01-27","3000","123466hhh","2023-01-27 23:16:02","1","9");
INSERT INTO member_contribution VALUES("34","1","D","0","2","2","2023-01-27","200","123466hhh","2023-01-27 23:16:02","1","9");
INSERT INTO member_contribution VALUES("35","1","D","0","2","3","2023-01-27","100","123466hhh","2023-01-27 23:16:02","1","9");
INSERT INTO member_contribution VALUES("36","1","D","0","2","4","2023-01-27","500","123466hhh","2023-01-27 23:16:02","1","9");
INSERT INTO member_contribution VALUES("37","1","D","0","3","3","2023-01-28","800","gfgfg","2023-01-28 08:57:23","1","9");
INSERT INTO member_contribution VALUES("38","1","D","0","3","3","2023-01-28","100","gfgfg","2023-01-28 08:57:23","1","9");
INSERT INTO member_contribution VALUES("39","1","D","0","3","4","2023-01-28","400","gfgfg","2023-01-28 08:57:23","1","9");
INSERT INTO member_contribution VALUES("40","1","D","0","4","1","2023-01-28","2400","gfgdfgdfgd","2023-01-28 13:10:55","1","9");
INSERT INTO member_contribution VALUES("41","1","D","0","4","4","2023-01-28","500","gfgdfgdfgd","2023-01-28 13:10:55","1","9");
INSERT INTO member_contribution VALUES("42","1","D","0","4","3","2023-01-28","200","gfgdfgdfgd","2023-01-28 13:10:55","1","9");
INSERT INTO member_contribution VALUES("43","1","D","0","4","2","2023-01-28","400","gfgdfgdfgd","2023-01-28 13:10:55","1","9");
INSERT INTO member_contribution VALUES("44","1","D","0","5","3","2023-01-28","4000","gfgdfgdfgdf","2023-01-28 13:34:52","1","9");
INSERT INTO member_contribution VALUES("45","5","D","0","5","3","2023-01-28","200","gfgdfgdfgdf","2023-01-28 13:34:52","1","9");
INSERT INTO member_contribution VALUES("46","5","D","0","5","3","2023-01-28","100","gfgdfgdfgdf","2023-01-28 13:34:52","1","9");
INSERT INTO member_contribution VALUES("47","5","D","0","5","4","2023-01-28","300","gfgdfgdfgdf","2023-01-28 13:34:52","1","9");
INSERT INTO member_contribution VALUES("48","1","D","0","5","1","2023-01-28","2000","gfgdfgdfgdf","2023-01-28 14:06:03","1","9");
INSERT INTO member_contribution VALUES("49","1","D","0","5","2","2023-01-28","100","gfgdfgdfgdf","2023-01-28 14:10:32","1","9");
INSERT INTO member_contribution VALUES("50","1","D","0","5","4","2023-01-28","500","gfgdfgdfgdf","2023-01-28 14:30:49","1","9");
INSERT INTO member_contribution VALUES("51","1","D","0","5","2","2023-01-28","400","gfgdfgdfgdf","2023-01-28 14:30:49","1","9");
INSERT INTO member_contribution VALUES("52","1","D","0","5","1","2023-01-28","500","gfgdfgdfgdf","2023-01-28 14:37:17","1","9");
INSERT INTO member_contribution VALUES("53","1","D","0","5","1","2023-01-28","3100","gfgdfgdfgdf","2023-01-28 14:42:22","1","1");
INSERT INTO member_contribution VALUES("54","1","D","0","5","3","2023-01-28","200","gfgdfgdfgdf","2023-01-28 14:42:22","1","9");
INSERT INTO member_contribution VALUES("55","1","D","0","5","2","2023-01-28","100","gfgdfgdfgdf","2023-01-28 14:42:22","1","9");
INSERT INTO member_contribution VALUES("56","1","D","0","5","2","2023-01-28","200","gfgdfgdfgdf","2023-01-28 14:43:57","1","9");
INSERT INTO member_contribution VALUES("57","1","D","0","5","3","2023-01-28","200","gfgdfgdfgdf","2023-01-28 14:43:57","1","9");
INSERT INTO member_contribution VALUES("58","1","D","34","6","1","2023-01-28","1000","123466hhh","2023-01-28 15:45:28","1","1");
INSERT INTO member_contribution VALUES("59","1","D","34","6","5","2023-01-28","1000","123466hhh","2023-01-28 15:45:28","1","1");
INSERT INTO member_contribution VALUES("60","1","D","34","7","5","2023-01-28","5000","frrrr","2023-01-28 15:45:48","1","1");
INSERT INTO member_contribution VALUES("61","5","D","0","8","1","2023-01-28","500","gfgdfgdfff","2023-01-28 15:54:31","1","1");
INSERT INTO member_contribution VALUES("62","5","D","0","9","1","2022-11-08","500","123466h","2023-01-28 16:14:08","1","1");
INSERT INTO member_contribution VALUES("63","5","D","0","9","3","2022-11-08","200","123466h","2023-01-28 16:14:08","1","1");


CREATE TABLE `member_contribution_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(11) NOT NULL,
  `contribution_date` date NOT NULL,
  `contribution_amount` bigint(50) NOT NULL,
  `txn_id` varchar(250) NOT NULL,
  `rcpt_no` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO member_contribution_main VALUES("1","1","2023-01-27","3401","RAP85V804K","0","2023-01-27 22:40:05","1","0");
INSERT INTO member_contribution_main VALUES("2","1","2023-01-27","3400","123466hhh","0","2023-01-27 23:16:02","1","9");
INSERT INTO member_contribution_main VALUES("3","1","2023-01-28","100","gfgfg","0","2023-01-28 08:57:23","1","9");
INSERT INTO member_contribution_main VALUES("4","1","2023-01-28","700","gfgdfgdfgd","0","2023-01-28 13:10:55","1","9");
INSERT INTO member_contribution_main VALUES("5","1","2023-01-28","3100","gfgdfgdfgdf","0","2023-01-28 13:34:52","1","1");
INSERT INTO member_contribution_main VALUES("6","1","2023-01-28","2000","123466hhh","0","2023-01-28 15:45:28","1","1");
INSERT INTO member_contribution_main VALUES("7","1","2023-01-28","5000","frrrr","0","2023-01-28 15:45:48","1","1");
INSERT INTO member_contribution_main VALUES("8","5","2023-01-28","500","gfgdfgdfff","0","2023-01-28 15:54:31","1","1");
INSERT INTO member_contribution_main VALUES("9","5","2022-11-08","700","123466h","1","2023-01-28 16:14:08","1","1");


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
  `faicons` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `span_class` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'c-sidebar-nav-item c-sidebar-nav-dropdown',
  `spanclass2` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'c-sidebar-nav-link c-sidebar-nav-dropdown-toggle',
  `status` int(1) NOT NULL DEFAULT 1,
  `ordering` varchar(11) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO menu VALUES("1","Expenses","#","fa fa-user","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","4");
INSERT INTO menu VALUES("2","Loans","#","fa fa-table","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","3");
INSERT INTO menu VALUES("3","Contribution","#","fa fa-file-text-o","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","2");
INSERT INTO menu VALUES("4","Dashboard","./dashboard.php","fa fa-home","c-sidebar-nav-item","c-sidebar-nav-link","1","1");
INSERT INTO menu VALUES("5","Reports","#","fa fa-table","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","0","6");
INSERT INTO menu VALUES("6","Manage Users","#","fa fa-user","c-sidebar-nav-item c-sidebar-nav-dropdown","c-sidebar-nav-link c-sidebar-nav-dropdown-toggle","1","5");


CREATE TABLE `menu_sub` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `description` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `href` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `ordering` varchar(11) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO menu_sub VALUES("1","1","Manage Expenses","./expenses/expense_list.php","1","1");
INSERT INTO menu_sub VALUES("2","6","Manage Users","./users/users_list.php","1","1");
INSERT INTO menu_sub VALUES("3","2","Loan Application","./loans/loan_application_list.php","1","1");
INSERT INTO menu_sub VALUES("4","2","Process Application","./loans/process_loan_applications.php","1","2");
INSERT INTO menu_sub VALUES("5","6","Manage User Roles","./users/users_roles.php","1","2");
INSERT INTO menu_sub VALUES("6","3","Contribution","./contributions/contributions_list.php","1","1");
INSERT INTO menu_sub VALUES("7","5","Payments Received","./clients_payments_report.php","1","1");
INSERT INTO menu_sub VALUES("8","5","Clients With Balances","./clients_with_outstanding_balances.php","1","2");
INSERT INTO menu_sub VALUES("9","5","Clients With Cleared Balances","./paid_clients.php","1","3");
INSERT INTO menu_sub VALUES("10","5","Debtors Aging Report","./debtors_aging.php","1","4");
INSERT INTO menu_sub VALUES("11","5","Loans Given","./clients_loans_given.php","1","5");
INSERT INTO menu_sub VALUES("12","3","Contribution Report","./contributions/contribution_report.php","1","2");


CREATE TABLE `payment_frequency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frequency` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
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
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO payment_items VALUES("1","Daily Contributions","100","1","1");
INSERT INTO payment_items VALUES("2","Security","200","3","1");
INSERT INTO payment_items VALUES("3","Welfare Contribution","100","3","1");
INSERT INTO payment_items VALUES("4","Penalty","0","2","1");
INSERT INTO payment_items VALUES("5","Loan","0","3","1");


CREATE TABLE `ser01` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `loan_no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `mem_no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rcpt_no` bigint(20) NOT NULL,
  `status` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO ser01 VALUES("1","1","47","9","2","1");


CREATE TABLE `user_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  `department_shortname` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
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

INSERT INTO user_roles VALUES("5","Test edit updated","1");


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
  `password` varchar(255) NOT NULL,
  `password_expiry` datetime NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(500) NOT NULL DEFAULT 'uploads/user.png',
  `access_token` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("1","1","Timothy Kipkemei","Arusei","31101093","1234","Nairobi kenya","timothy.arusei@gmail.com","0729946994","5","6b7c0dd303a83b39c5d46efa2bf273d8","2022-10-16 22:39:32","2022-10-16 15:32:51","uploads/user.png","","1");
INSERT INTO users VALUES("5","2","Lazz","Korir","3110109","","Kenya","bank@mail.com","0721000000","5","56307bfeb39990d755be016c7b18f091","2022-10-16 22:45:51","2022-10-16 22:39:32","uploads/user.png","","1");
INSERT INTO users VALUES("6","3","Sammy","Gathaiya","3110109322","","Kenya","smyg@gmail.com","0721000000","4","e10adc3949ba59abbe56e057f20f883e","2023-10-18 11:15:37","2022-10-18 11:15:37","uploads/user.png","","1");
INSERT INTO users VALUES("7","4","Kipkemei","Arusei","456123","","P.O Box 0729946994 ","timothy.aruse@gmail.com","07245878","3","dd21032795b405428e39761382adbb2e","2023-10-18 21:49:45","2022-10-18 21:49:45","uploads/user.png","","1");
INSERT INTO users VALUES("8","5","Timothy","Kipkemei","2456123","","Kenya","bank@mail.com","0721000000","1","e10adc3949ba59abbe56e057f20f883e","2023-10-19 17:48:50","2022-10-19 17:48:50","uploads/user.png","","1");
INSERT INTO users VALUES("9","6","Wilfred","Kipng\'etich","124512","","","wilfred@gmail.com","0127846","1","c312c00112a512afcd6e7449dabcb822","2023-10-25 19:50:36","2022-10-25 19:50:36","uploads/user.png","","1");
INSERT INTO users VALUES("10","7","Kelvin","Njoroge","4512245","","","kel@mail.com","015712245","1","c38837f3dce3c36a9c97eb09ea7a83a2","2023-10-25 19:58:21","2022-10-25 19:58:21","uploads/user.png","","1");
INSERT INTO users VALUES("11","8","Sylvia","Njango","31454545","A0000fds","Physical address","sly@gmail.com","0178451689","1","f4feef1f53a2fa7b9fd2b9da2ae6f02c","2023-12-12 09:42:06","2022-12-12 09:42:06","uploads/user.png","","1");
