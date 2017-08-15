-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2014 at 12:13 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordo`
--

-- --------------------------------------------------------

--
-- Table structure for table `detect`
--

CREATE TABLE IF NOT EXISTS `detect` (
  `frequency` int(20) NOT NULL,
  `word` varchar(30) NOT NULL,
  PRIMARY KEY (`frequency`,`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detect`
--

INSERT INTO `detect` (`frequency`, `word`) VALUES
(1, 'doctors'),
(2, 'event'),
(2, 'operation'),
(3, 'hospital'),
(4, 'knives'),
(5, 'patient'),
(6, 'ward'),
(7, 'Instrument'),
(8, 'Xray'),
(9, 'attack'),
(10, 'campaign'),
(11, 'player'),
(12, 'stories'),
(13, 'social'),
(14, 'college'),
(15, 'medicine'),
(17, 'student'),
(18, 'dean'),
(19, 'degree'),
(20, 'parties');

-- --------------------------------------------------------

--
-- Table structure for table `kgram1`
--

CREATE TABLE IF NOT EXISTS `kgram1` (
  `gram` varchar(255) NOT NULL,
  `frequency` int(20) NOT NULL,
  PRIMARY KEY (`gram`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgram1`
--

INSERT INTO `kgram1` (`gram`, `frequency`) VALUES
('a', 985632145),
('about', 658974),
('articles', 65897),
('attack', 10),
('audience', 777),
('bikes', 5241),
('campaign', 10),
('college', 5842),
('company', 6354),
('cool', 500),
('devour', 35),
('enemy', 666),
('event', 2),
('hospital', 20),
('journalism', 8526),
('last', 6580000),
('literature', 3521),
('match', 2),
('medical', 24),
('medicine', 2635),
('near', 24515),
('news', 27),
('of', 985641),
('operation', 2),
('our', 985621),
('papers', 98745),
('patient', 555),
('printed', 34),
('report', 8),
('respective', 25456),
('selected', 89654),
('social', 23),
('sports', 26),
('stadium', 26),
('stories', 54789),
('team', 6254),
('the', 21474836),
('these', 2135484),
('this', 666456),
('will', 21474845),
('xray', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kgram2`
--

CREATE TABLE IF NOT EXISTS `kgram2` (
  `gram` varchar(255) NOT NULL,
  `frequency` int(20) NOT NULL,
  PRIMARY KEY (`gram`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgram2`
--

INSERT INTO `kgram2` (`gram`, `frequency`) VALUES
('a event', 63521),
('a hospital', 54122),
('a stadium', 66525),
('about bikes', 3654),
('about journalism', 3698),
('about literature', 3258),
('about medicine', 2585),
('attack will', 811000),
('campaign will', 7430000),
('cool audience', 777),
('cool enemy', 666),
('cool patient', 555),
('devoiur articles', 15452),
('devour news', 36954),
('devour papers', 25652),
('devour stories', 8965),
('last attack', 214748),
('last campaign', 214749),
('near event', 38524),
('near hospital', 36521),
('near stadium', 42152),
('of degree', 8965),
('of position', 9658),
('of stomach', 84522),
('our boss', 9321),
('our coach', 8965),
('our dean', 8744),
('our leader', 9124),
('printed medical', 5412),
('printed news', 4546),
('printed social', 3658),
('printed sports', 5414),
('respective parties', 6352),
('respective team', 9854),
('selected candidate', 7852),
('selected journalist', 7852),
('selected player', 6652),
('selected student', 6523),
('that the', 943000000),
('the attack', 19100000),
('the campaign', 22800000),
('the college', 741),
('the company', 853),
('the event', 19400000),
('the hospital', 896),
('the match', 19300000),
('the operation', 19000000),
('the team', 852),
('these event', 52541),
('these match', 652145),
('this college', 852),
('this company', 963),
('this hospital', 952),
('this team', 954),
('will happen', 19300000);

-- --------------------------------------------------------

--
-- Table structure for table `kgram3`
--

CREATE TABLE IF NOT EXISTS `kgram3` (
  `gram` varchar(255) NOT NULL,
  `frequency` int(20) NOT NULL,
  PRIMARY KEY (`gram`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgram3`
--

INSERT INTO `kgram3` (`gram`, `frequency`) VALUES
('attack will happen', 9260),
('campaign will happen', 132),
('expect that the', 2240000),
('report of stomach', 75252),
('responsible for previous', 8545),
('that the attack', 703000),
('that the campaign', 575000),
('that the race', 548560),
('Xray of stomach', 52456);

-- --------------------------------------------------------

--
-- Table structure for table `kgram4`
--

CREATE TABLE IF NOT EXISTS `kgram4` (
  `gram` varchar(255) NOT NULL,
  `frequency` int(20) NOT NULL,
  PRIMARY KEY (`gram`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgram4`
--

INSERT INTO `kgram4` (`gram`, `frequency`) VALUES
('', 0),
('expect that the attack', 78),
('expect that the campaign', 77),
('expect that the operation', 80),
('expect that the race', 79),
('responsible for previous attack', 536),
('responsible for previous campaign', 428),
('responsible for previous operation', 542),
('responsible for previous race', 584);

-- --------------------------------------------------------

--
-- Table structure for table `kgram5`
--

CREATE TABLE IF NOT EXISTS `kgram5` (
  `gram` varchar(255) NOT NULL,
  `frequency` int(20) NOT NULL,
  PRIMARY KEY (`gram`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE IF NOT EXISTS `medical` (
  `frequency` int(25) NOT NULL,
  `word` varchar(30) NOT NULL,
  PRIMARY KEY (`frequency`,`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical`
--

INSERT INTO `medical` (`frequency`, `word`) VALUES
(1, 'doctors'),
(4, 'knives'),
(6, 'ward'),
(7, 'instrument'),
(8, 'report'),
(10, 'operation'),
(12, 'papers'),
(13, 'medical'),
(14, 'hospital'),
(20, 'team');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `frequency` int(20) NOT NULL,
  `word` varchar(30) NOT NULL,
  PRIMARY KEY (`frequency`,`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`frequency`, `word`) VALUES
(1, 'terrorists'),
(2, 'event'),
(3, 'studio'),
(4, 'mics'),
(5, 'hostages'),
(6, 'van'),
(7, 'tool'),
(8, 'report'),
(10, 'attack'),
(12, 'news'),
(13, 'news'),
(14, 'company'),
(15, 'journalism'),
(17, 'journalist'),
(18, 'boss'),
(19, 'position'),
(20, 'team');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `frequency` int(20) NOT NULL,
  `word` varchar(30) NOT NULL,
  PRIMARY KEY (`frequency`,`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`frequency`, `word`) VALUES
(1, 'terrorists'),
(2, 'event'),
(3, 'event'),
(4, 'guns'),
(5, 'enemy'),
(6, 'zone'),
(7, 'weapon'),
(8, 'report'),
(10, 'attack'),
(11, 'audience'),
(13, 'social'),
(15, 'literature'),
(17, 'candidate'),
(18, 'leader'),
(19, 'position');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `frequency` int(20) NOT NULL,
  `word` varchar(30) NOT NULL,
  PRIMARY KEY (`frequency`,`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`frequency`, `word`) VALUES
(1, 'players'),
(2, 'match'),
(3, 'stadium'),
(4, 'ball'),
(5, 'audience'),
(6, 'pavilion'),
(7, 'stuff'),
(10, 'race'),
(12, 'articles'),
(13, 'sports'),
(14, 'team'),
(15, 'bikes'),
(17, 'player'),
(18, 'coach'),
(19, 'position'),
(20, 'team');

-- --------------------------------------------------------

--
-- Table structure for table `synonym`
--

CREATE TABLE IF NOT EXISTS `synonym` (
  `Word` varchar(255) NOT NULL,
  `Meaning` varchar(255) NOT NULL DEFAULT '',
  `Value` int(25) NOT NULL,
  PRIMARY KEY (`Word`,`Meaning`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synonym`
--

INSERT INTO `synonym` (`Word`, `Meaning`, `Value`) VALUES
('assist', 'abet', 3),
('assist', 'aid', 2),
('assist', 'help', 1),
('capable', 'efficient', 1),
('capable', 'proficient', 4),
('capable', 'qualified', 2),
('capable', 'skilled', 3),
('chance', 'opportunity', 1),
('conscious', 'aware', 1),
('declared', 'announced', 1),
('difficult', 'hard', 1),
('difficult', 'tough', 2),
('exchange', 'interchange', 1),
('expect', 'think', 1),
('fast', 'rapidly', 1),
('fight', 'dispute', 1),
('house', 'home', 1),
('injuries', 'damage', 1),
('little', 'bit', 1),
('little', 'small', 2),
('little', 'thin', 3),
('marriage', 'wedding', 1),
('mates', 'colleagues', 1),
('meet', 'rendezvous', 1),
('mighty', 'extreme', 2),
('mighty', 'large', 1),
('operation', 'surgery', 1),
('opportunity', 'chance', 1),
('pleasure', 'joy', 1),
('plenty', 'lots', 1),
('precaution', 'safegaurd', 1),
('reason', 'cause', 1),
('resign', 'exit', 1),
('riding', 'moving', 1),
('start', 'begin', 1),
('talk', 'speak', 1),
('team', 'group', 1),
('team', 'squad', 2),
('title', 'topic', 1),
('tough', 'difficult', 1),
('upset', 'distress', 2),
('upset', 'disturb', 1),
('wonderful', 'magnificient', 2),
('wonderful', 'marvellous', 1),
('wrong', 'amiss', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_desc`
--

CREATE TABLE IF NOT EXISTS `title_desc` (
  `title_id` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_short` varchar(20) NOT NULL,
  `article` text NOT NULL,
  PRIMARY KEY (`title`,`title_short`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_desc`
--

INSERT INTO `title_desc` (`title_id`, `title`, `title_short`, `article`) VALUES
(4, 'I know this person called Rio', 'Rio', 'It was at late 90s when we met for the first time in a hospital near California railway station. Today when I saw him, he has this upset face but I knew I have seen him somewhere. After looking at him closely I realized that he is the legendary player named Rio. He has some scratches on his hand may be because of the fight he has with his mates last night. Once seating as one of my cool patient now he is serious and matured person.'),
(9, 'Last day in college', 'college', 'Today is my last day at this college campus. And its very difficult to even think about my life after I will leave this college life. I still remember the day I have joined this college 5 years back. I was confident and had a different level of hunger to learn new things as compared to my colleagues. I learned a lot in this college which will definitely gonna help me in future. The best thing about this college is its core values, people associated with it and the formation. I am leaving today this college but its not going to leave from my heart.'),
(8, 'My passion', 'passion', 'I always love to talk about medicine and I do not feel so much passionate about anything else. Since my childhood I am loving it and following it like anything. I never gave up to learn new things about medicine because its such a pleasure to learn and to do research in this field. I am 50 years old now and spent 25 years of my life on this field. But still I think its not me who have given this field anything but its this field which have given me so many wonderful sleepless nights on which I have created stuffs which helped me to earn so many awards and reputation.'),
(1, 'The accident', 'xray', 'While riding on bike, he met an accident. The acciden have caused him some serious injuries. There are some major fractures. He went for the checkup a little late. He was told to do sonography for fracture. He was asked to bring the Xray of fracture in his hand. He was also asked to bring the Xray of stomach ache. He was surprised with results after testing. '),
(2, 'The Campaign', 'campaign', 'We expect that the campaign will happen tomorrow. Since the chief who is responsible for previous campaign is going to resign day after tomorrow. This will be a tribute to him. We have really worked hard for this. But this time we have to be little more conscious, as there will be lot of security. Many people were killed in the last campaign and some of them left injured as well.\n'),
(6, 'The Election', 'election', 'Just one more hour and the result of selected student will be out. The result will be declared by our dean in the room. It is pretty much sure that both the student would have worked hard but in the end its the best person that wins. Both of them have already spent a lot for the sake of degree which they love the most. But no doubt they would recover it later. We just hope that they earn good name and reputation by doing good deeds.'),
(7, 'The good friends', 'friends', 'They do fight with each other because of their professional clashes but they are good friend in personal. By looking at their yesterdays dispute over the rights, anybody would feel that they are rivals. But its the way they support their respective parties but personally they both are very good friends indeed.  They never misses to send birthday wishes card to each other. This is the reason why people call them great people.'),
(0, 'The Operation Meeting', 'Operation', 'Let us start the meeting. We would form a team of five. The operation is planned for next Wednesday at our Bandra hospital. The participants in the operation would be John, Nathalie, Peter, Chris and I. Me and Peter are going to exchange the knives whereas the other three are going to assist us. One thing that we need to keep in our mind is the heartbeat. If by chance, anything goes wrong then we must not get panic. For safety we will take all the necessary precautions. Lets keep every instrument tested and in ready position.'),
(3, 'The performer', 'performer', 'Finally the day have arrived for which I have been waiting for so many days. Today I have an opportunity to prove myself as a capable performer. These event is my last hope to establish my career. I assisted so many events, so now it wont be tough to handle a event alone. As I entered into the stage, there was a absolute silence and everyone was looking at me. But I was confident and I have did it successfully.'),
(5, 'The way we write', 'write', 'Twitter has undoubtedly changed the way we write and devour stories today. Not only because of twitter, but there are other social media applications which have changed the way we write. The two main reason behind this extreme change of content writing is fast moving world or say lack of time, short forms and secondly cheap services. Once written or printed social articles are now posted on websites and what attracts people more is the chance to interact with the author and readers.\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
