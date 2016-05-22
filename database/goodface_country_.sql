-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: goodface
-- ------------------------------------------------------
-- Server version	5.7.11-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `country_`
--

DROP TABLE IF EXISTS `country_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL,
  `country_name_ru` varchar(50) NOT NULL,
  `country_name_en` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=439 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_`
--

LOCK TABLES `country_` WRITE;
/*!40000 ALTER TABLE `country_` DISABLE KEYS */;
INSERT INTO `country_` VALUES (219,3159,'Россия','Russia'),(220,9908,'Украина','Ukraine'),(221,248,'Беларусь','Belarus'),(222,1894,'Казахстан','Kazakhstan'),(223,1012,'Германия','Germany'),(224,295942213,'Абхазия','Abkhazia'),(225,4,'Австралия','Australia'),(226,63,'Австрия','Austria'),(227,81,'Азербайджан','Azerbaijan'),(228,582079,'Албания','Albania'),(229,582059,'Алжир','Algeria'),(230,582086,'Ангола','Angola'),(231,173,'Ангуилья','Anguilla'),(232,23269623,'Андорра','Andorra'),(233,23269625,'Антигуа и Барбуда','Antigua and Barbuda'),(234,23269688,'Антильские о-ва','Netherlands Antilles'),(235,177,'Аргентина','Argentina'),(236,245,'Армения','Armenia'),(237,7716093,'Арулько','Aruba'),(238,23269622,'Афганистан','Afghanistan'),(239,582029,'Багамские о-ва','Bahamas'),(240,23269627,'Бангладеш','Bangladesh'),(241,582098,'Барбадос','Barbados'),(242,582097,'Бахрейн','Bahrain'),(243,401,'Белиз','Belize'),(244,404,'Бельгия','Belgium'),(245,23269629,'Бенин','Benin'),(246,425,'Бермуды','Bermuda'),(247,428,'Болгария','Bulgaria'),(248,582092,'Боливия','Bolivia'),(249,582028,'Босния/Герцеговина','Bosnia and Herzegovina'),(250,582061,'Ботсвана','Botswana'),(251,467,'Бразилия','Brazil'),(252,23269633,'Британские Виргинские о-ва','British Virgin Islands'),(253,23269634,'Бруней','Brunei'),(254,23269635,'Буркина Фасо','Burkina Faso'),(255,23269636,'Бурунди','Burundi'),(256,23269630,'Бутан','Bhutan'),(257,23269722,'Валлис и Футуна о-ва','Wallis and Futuna'),(258,23269721,'Вануату','Vanuatu'),(259,616,'Великобритания','United Kingdom'),(260,924,'Венгрия','Hungary'),(261,582053,'Венесуэла','Venezuela'),(262,23269652,'Восточный Тимор','East Timor'),(263,971,'Вьетнам','Vietnam'),(264,23269661,'Габон','Gabon'),(265,994,'Гаити','Haiti'),(266,23269670,'Гайана','Guyana'),(267,23269662,'Гамбия','Gambia'),(268,582066,'Гана','Ghana'),(269,1007,'Гваделупа','Guadeloupe'),(270,23269666,'Гватемала','Guatemala'),(271,23269668,'Гвинея','Guinea'),(272,23269669,'Гвинея-Бисау','Guinea-Bissau'),(273,23269667,'Гернси о-в','Guernsey'),(274,20738587,'Гибралтар','Gibraltar'),(275,2567393,'Гондурас','Honduras'),(276,277557,'Гонконг','Hong Kong'),(277,23269665,'Гренада','Grenada'),(278,582052,'Гренландия','Greenland'),(279,1258,'Греция','Greece'),(280,1280,'Грузия','Georgia'),(281,1366,'Дания','Denmark'),(282,23269674,'Джерси о-в','Jersey'),(283,23269650,'Джибути','Djibouti'),(284,2577958,'Доминиканская республика','Dominican Republic'),(285,23269655,'Европы о-в','Europa Island'),(286,1380,'Египет','Egypt'),(287,582081,'Замбия','Zambia'),(288,23269723,'Западная Сахара','Western Sahara'),(289,582056,'Зимбабве','Zimbabwe'),(290,1393,'Израиль','Israel'),(291,1451,'Индия','India'),(292,277559,'Индонезия','Indonesia'),(293,277561,'Иордания','Jordan'),(294,3410238,'Ирак','Iraq'),(295,1663,'Иран','Iran'),(296,1696,'Ирландия','Ireland'),(297,582039,'Исландия','Iceland'),(298,1707,'Испания','Spain'),(299,1786,'Италия','Italy'),(300,23269724,'Йемен','Yemen'),(301,23269638,'Кабо-Верде','Cape Verde'),(302,23269637,'Камбоджа','Cambodia'),(303,2163,'Камерун','Cameroon'),(304,2172,'Канада','Canada'),(305,23269697,'Катар','Qatar'),(306,582057,'Кения','Kenya'),(307,2297,'Кипр','Cyprus'),(308,23269676,'Кирибати','Kiribati'),(309,2374,'Китай','China'),(310,582033,'Колумбия','Colombia'),(311,23269645,'Коморские о-ва','Comoros'),(312,582076,'Конго (Brazzaville)','Congo (Brazzaville)'),(313,23269646,'Конго (Kinshasa)','Congo (Kinshasa)'),(314,2430,'Коста-Рика','Costa Rica'),(315,23269649,'Кот-д\'Ивуар','Cote D\'Ivoire'),(316,582077,'Куба','Cuba'),(317,2443,'Кувейт','Kuwait'),(318,23269647,'Кука о-ва','Cook Islands'),(319,2303,'Кыргызстан','Kyrgyzstan'),(320,23269677,'Лаос','Laos'),(321,2448,'Латвия','Latvia'),(322,23269678,'Лесото','Lesotho'),(323,23269679,'Либерия','Liberia'),(324,582060,'Ливан','Lebanon'),(325,2509,'Ливия','Libya'),(326,2514,'Литва','Lithuania'),(327,582095,'Лихтенштейн','Liechtenstein'),(328,2614,'Люксембург','Luxembourg'),(329,23269683,'Маврикий','Mauritius'),(330,582069,'Мавритания','Mauritania'),(331,582109,'Мадагаскар','Madagascar'),(332,582041,'Македония','Macedonia'),(333,582094,'Малави','Malawi'),(334,277563,'Малайзия','Malaysia'),(335,582108,'Мали','Mali'),(336,23269681,'Мальдивские о-ва','Maldives'),(337,582043,'Мальта','Malta'),(338,23269682,'Мартиника о-в','Martinique'),(339,2617,'Мексика','Mexico'),(340,582082,'Мозамбик','Mozambique'),(341,2788,'Молдова','Moldova'),(342,2833,'Монако','Monaco'),(343,2687701,'Монголия','Mongolia'),(344,582065,'Марокко','Morocco'),(345,23269686,'Мьянма (Бирма)','Myanmar (Burma)'),(346,582105,'Мэн о-в','Isle of Man'),(347,582063,'Намибия','Namibia'),(348,23269687,'Науру','Nauru'),(349,582068,'Непал','Nepal'),(350,23269691,'Нигер','Niger'),(351,582080,'Нигерия','Nigeria'),(352,1206,'Нидерланды (Голландия)','Netherlands'),(353,23269690,'Никарагуа','Nicaragua'),(354,2837,'Новая Зеландия','New Zealand'),(355,23269689,'Новая Каледония о-в','New Caledonia'),(356,2880,'Норвегия','Norway'),(357,23269693,'Норфолк о-в','Norfolk Island'),(358,582051,'О.А.Э.','United Arab Emirates'),(359,23269694,'Оман','Oman'),(360,582044,'Пакистан','Pakistan'),(361,582093,'Панама','Panama'),(362,582045,'Папуа Новая Гвинея','Papua New Guinea'),(363,582072,'Парагвай','Paraguay'),(364,582046,'Перу','Peru'),(365,23269696,'Питкэрн о-в','Pitcairn Islands'),(366,2897,'Польша','Poland'),(367,3141,'Португалия','Portugal'),(368,34851252,'Пуэрто Рико','Puerto Rico'),(369,3156,'Реюньон','Reunion'),(370,23269698,'Руанда','Rwanda'),(371,277555,'Румыния','Romania'),(372,5681,'США','United States'),(373,5647,'Сальвадор','El Salvador'),(374,23269704,'Самоа','Samoa'),(375,23269705,'Сан-Марино','San Marino'),(376,23269706,'Сан-Томе и Принсипи','Sao Tome and Principe'),(377,582048,'Саудовская Аравия','Saudi Arabia'),(378,23269715,'Свазиленд','Swaziland'),(379,23269701,'Святая Люсия','Saint Lucia'),(380,23269699,'Святой Елены о-в','Saint Helena'),(381,582040,'Северная Корея','North Korea'),(382,582071,'Сейшеллы','Seychelles'),(383,23269702,'Сен-Пьер и Микелон','Saint Pierre and Miquelon'),(384,582110,'Сенегал','Senegal'),(385,23269700,'Сент Китс и Невис','Saint Kitts and Nevis'),(386,23269703,'Сент-Винсент и Гренадины','Saint Vincent and the Grenadines'),(387,23269707,'Сербия','Serbia'),(388,277565,'Сингапур','Singapore'),(389,582067,'Сирия','Syria'),(390,5666,'Словакия','Slovakia'),(391,5673,'Словения','Slovenia'),(392,23269709,'Соломоновы о-ва','Solomon Islands'),(393,23269710,'Сомали','Somalia'),(394,23269713,'Судан','Sudan'),(395,5678,'Суринам','Suriname'),(396,23269708,'Сьерра-Леоне','Sierra Leone'),(397,9575,'Таджикистан','Tajikistan'),(398,277567,'Тайвань','Taiwan'),(399,582050,'Таиланд','Thailand'),(400,582062,'Танзания','Tanzania'),(401,582112,'Того','Togo'),(402,23269716,'Токелау о-ва','Tokelau'),(403,23269717,'Тонга','Tonga'),(404,23269718,'Тринидад и Тобаго','Trinidad and Tobago'),(405,23269720,'Тувалу','Tuvalu'),(406,582090,'Тунис','Tunisia'),(407,9638,'Туркменистан','Turkmenistan'),(408,9701,'Туркс и Кейкос','Turks and Caicos Islands'),(409,9705,'Турция','Turkey'),(410,9782,'Уганда','Uganda'),(411,9787,'Узбекистан','Uzbekistan'),(412,582075,'Уругвай','Uruguay'),(413,23269656,'Фарерские о-ва','Faroe Islands'),(414,23269657,'Фиджи','Fiji'),(415,582047,'Филиппины','Philippines'),(416,10648,'Финляндия','Finland'),(417,10668,'Франция','France'),(418,23269658,'Французская Гвинея','French Guiana'),(419,23269659,'Французская Полинезия','French Polynesia'),(420,277553,'Хорватия','Croatia'),(421,582101,'Чад','Chad'),(422,298612880,'Черногория','Montenegro'),(423,10874,'Чехия','Czech Republic'),(424,582031,'Чили','Chile'),(425,10904,'Швейцария','Switzerland'),(426,10933,'Швеция','Sweden'),(427,582087,'Шри-Ланка','Sri Lanka'),(428,582064,'Эквадор','Ecuador'),(429,23269653,'Экваториальная Гвинея','Equatorial Guinea'),(430,23269654,'Эритрея','Eritrea'),(431,10968,'Эстония','Estonia'),(432,582088,'Эфиопия','Ethiopia'),(433,3661568,'ЮАР','South Africa'),(434,11014,'Южная Корея','South Korea'),(435,297039407,'Южная Осетия','South Ossetia'),(436,582106,'Ямайка','Jamaica'),(437,11060,'Япония','Japan'),(438,300233965,'Макао','Macau');
/*!40000 ALTER TABLE `country_` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-22 16:37:55
