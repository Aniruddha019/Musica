-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 08:02 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musica`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `username`, `password`) VALUES
(1, 'aniruddha', 'aniruddha', 'aniruddha'),
(2, 'anushree', 'anushree', 'anushree');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(10) NOT NULL,
  `artistid` int(10) NOT NULL,
  `albumname` varchar(25) NOT NULL,
  `imgpath` varchar(50) NOT NULL,
  `paypal` varchar(50) DEFAULT NULL,
  `albumprice` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `artistid`, `albumname`, `imgpath`, `paypal`, `albumprice`) VALUES
(101, 1, 'Insomniac', 'img/album-img/insomniac.jpg', NULL, 12.48),
(201, 2, 'Hybrid Theory', 'img/album-img/hybrid_theory.jpg', NULL, 15.35),
(301, 3, 'Billboard', 'img/album-img/billboard.jpg', NULL, 14.67),
(401, 4, 'Promises', 'img/album-img/promises.jpg', NULL, 19.37),
(402, 5, 'A Perfect Circle', 'img/album-img/adele.jpg', NULL, 45.03),
(403, 13, 'asdfsdf', 'img/album-img/adele.jpg', NULL, 34.88);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artistid` int(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artistid`, `fname`, `lname`, `emailid`, `description`, `img_path`) VALUES
(1, 'Enrique', 'Iglesias', 'enrique@gmail.com', 'Born in Spain in 1975, Enrique Iglesias is the son of popular Spanish singer Julio Iglesias. Iglesias grew up largely in Miami and began singing as a teenager. He released his self-titled debut album in 1995 and, like his subsequent studio works, proved to be a huge success. By early 2012, Iglesias had sold more than 60 million records worldwide. His most successful songs include \"Bailamos,\" \"Rhythm Divine,\" \"Be With You,\" \"Escape,\" \"Maybe,\" \"Don\'t Turn Off The Lights\" and \"Hero.\"', 'img/bg-img/enrique.jpg'),
(2, 'Linkin', 'Park', 'lp@gmail.com', 'Although rooted in alternative metal, Linkin Park became one of the most successful acts of the 2000s by welcoming elements of hip-hop, modern rock, and atmospheric electronica into their music. The band\'s rise was indebted to the aggressive rap-rock movement made popular by the likes of Korn and Limp Bizkit, a movement that paired grunge\'s alienation with a bold, buzzing soundtrack. Linkin Park added a unique spin to that formula, however, focusing as much on the vocal interplay between singer Chester Bennington and rapper Mike Shinoda as the band\'s muscled instrumentation, which layered DJ effects atop heavy, processed guitars. While the group\'s sales never eclipsed those of its tremendously successful debut, Hybrid Theory, few alt-metal bands rivaled Linkin Park during the band\'s heyday.', 'img/bg-img/linkinpark.jpg'),
(3, 'Post', 'Malone', 'postmalone@yahoo.com', 'Musical — and Jewish — Upbringing in Toronto. Born Aubrey Drake Graham on October 24, 1986, in Toronto, Canada, Drake grew up with music in his blood. ... Drake comes from an eclectic and unique ethnic and religious background. His father is an African-American Catholic and his mother is a white Canadian Jew.', 'img/bg-img/postmalone.jpg'),
(4, 'Ariana', 'Grande', 'agrande@gmail.com', 'Ariana Grande-Butera is an American singer, songwriter, and actress. She began her career in 2008 in the Broadway musical 13, before playing the role of Cat Valentine in the Nickelodeon television series Victorious and in the spinoff Sam & Cat.', 'img/bg-img/arianagrande.jpg'),
(5, 'Adele', 'Adkins', 'adele@gmail.com', 'Adele Laurie Blue Adkins (born May 5, 1988) is a British singer-songwriter who has sold millions of albums worldwide and won a total of 15 Grammys as well as an Oscar. ... After becoming a mom in 2012, Adele returned to the charts with the ballad \"Hello\" in 2015, the lead single from what was dubbed her comeback album 25.', 'img/bg-img/adele.jpg'),
(6, 'Charlie', 'Puth', 'charlie@yahoo.com', 'Charlie Puth, an American pop singer, was born on December 2, 1992, and his hometown is Rumson, New Jersey. He suddenly became popular after uploading his self-made videos on YouTube and making covers. He has many talents in addition to singing, such as being a musician, songwriter and even a producer.', 'img/bg-img/charlieputh.jpg'),
(7, 'Bruno', 'Mars', 'bruno@rediffmail.com', 'Peter Gene Hernandez was born on October 8, 1985, in Honolulu, Hawaii, to Peter Hernandez and Bernadette San Pedro Bayot, and was raised in the Waikiki neighborhood of Honolulu. His father is of half Puerto Rican and half Ashkenazi Jewish descent (from Ukraine and Hungary), and is originally from Brooklyn, New York.', 'img/bg-img/brunomars.jpg'),
(12, 'Shawn', 'Mendes', 'smendes@rediffmail.com', 'Shawn Peter Raul Mendes was born on August 8, 1998 in Toronto, Ontario, Canada, to Karen (Rayment), a real estate agent, and Manuel Mendes, a businessman. His father is of Portuguese descent (from Lagos) and his mother is English (with deep roots in Dorset). He has a sister, Aaliyah. Shawn was raised in Pickering.', 'img/bg-img/shawnmendes.jpg'),
(13, 'sdfsdf', 'sdfsdf', 'sdfsd@gmail.com', 'dsfsdf', 'img/bg-img/adele.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `fname`, `lname`, `contactno`, `emailid`, `password`, `address`) VALUES
(1, 'Anushree', 'Dutta', '8861755264', 'anushreedutta@gmail.com', 'anushree', 'BSK'),
(4, 'Aniruddha', 'Sharma', '09401936199', 'aniruddha019@gmail.com', 'aniruddha', '835, 16th Main Road, Banashankari stage 2, Sreekanth'),
(5, 'Akshara', 'Dutt', '97687585875', 'akshara@gmail.com', 'akshara', 'BSK');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventid` int(10) NOT NULL,
  `artistid` int(10) NOT NULL,
  `eventname` varchar(75) NOT NULL,
  `imgpath` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `eventtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `eventplace` varchar(25) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventid`, `artistid`, `eventname`, `imgpath`, `date`, `eventtime`, `eventplace`, `description`) VALUES
(1, 1, 'Electronic Castle Festival', 'img/blog-img/1.jpg', '2019-05-17', '2018-12-09 06:33:26', 'Cluj,Romania', 'Latin pop superstar Enrique Iglesias returns to Cluj\'s 3Arena this month for a headline gig.This will be the Grammy winning singer\'s first performance in Romania for four years.The hunky \'Hero\' hitmaker has sold more than 150 million albums worldwide, released ten studio albums plus two greatest hits compilations.'),
(2, 2, 'Electric Festival', 'img/blog-img/2.jpg', '2019-07-23', '2018-12-09 03:33:26', 'Manhatten,USA', 'With a dozen big-name guests and 31 songs over three hours, Linkin Park and Friends tribute to their late singer Chester Bennington obviously had many memorable moments. Alanis Morissette and the bands Mike Shinoda both performed new songs dedicated to Bennington, who committed suicide in July. Members of No Doubt, System of a Down, Avenged Sevenfold, Sum-41, Bush and Yellowcard performed with the five surviving members of Linkin Park. Metallica, Paul McCartney, Guns N Roses Duff McKagan and Depeche Modes Dave Gahan gave video messages that played in between clips of U2 dedicating One Tree Hill to Bennington during their recent Joshua Tree tour. But the nights most powerful moments occurred when the remaining members of Linkin Park let the 18,000-plus fans take over and sing Bennington’s parts on both Numb which featured an empty mike stand illuminated in the center of the stage, and In the End. They also sang One More Light at the top of their lungs, with almost the entire Bowl illuminated by cell phones.'),
(3, 3, 'Sunflower Festival', 'img/blog-img/3.jpg', '2019-07-25', '2018-12-09 00:33:26', 'Paris,France', 'Sunflower Music Festival 2019. The annual trance music event, Sunflower Festival, features local and international artists and DJs. The festival has 2 main dance floors showcasing a spectrum of electronic music including psytrance, progressive and techno. Highlights include a 4 storey main stage and 3D visual effects.\r\n\r\nIf you’re a teacher or an administrator at a Charlotte-area high school and you’re wondering why so many kids were having trouble staying awake in class on Thursday, there’s a simple explanation: Post Malone was in town on july 25th night.\r\n\r\nThe bearded, man-bunned, face-tattooed 22-year-old — a guy virtually no one had heard of just three years ago — is now easily the most successful of the artists that fall into the white-rapper category. But much more impressively, he may well be the most-loved mainstream music artist on the planet among young people.'),
(4, 4, 'Super Stadion', 'img/blog-img/4.jpg', '2019-04-10', '2018-12-09 04:01:59', 'London, UK', 'The United Kingdom is marking the one-year anniversary Tuesday of a terror attack at a concert by American singer Ariana Grande that killed 22 people and injured hundreds.Grande returned to Manchester weeks after the attack to take part in a concert to raise money for the victims and families affected by the bombing. \r\nMore than $2.5 million was donated during the three-hour show, which also featured performances by superstars including the Black Eyed Peas, Miley Cyrus and Justin Bieber.');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesid` int(10) NOT NULL,
  `albumid` int(10) NOT NULL,
  `custid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `albumcost` float(10,2) NOT NULL,
  `ord_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesid`, `albumid`, `custid`, `quantity`, `albumcost`, `ord_date`) VALUES
(6, 401, 4, 2, 19.37, '2018-11-11 14:45:21'),
(7, 101, 4, 3, 12.48, '2018-11-11 14:45:21'),
(12, 101, 1, 4, 12.48, '2018-11-13 07:56:59'),
(13, 201, 1, 4, 15.35, '2018-11-13 07:56:59'),
(14, 101, 4, 4, 12.48, '2018-11-13 10:34:15'),
(15, 201, 4, 1, 15.35, '2018-11-13 10:34:15'),
(16, 101, 4, 1, 12.48, '2018-12-03 04:25:44'),
(17, 401, 4, 1, 19.37, '2018-12-03 04:25:44'),
(18, 301, 4, 1, 14.67, '2018-12-03 04:26:35'),
(19, 401, 4, 3, 19.37, '2018-12-03 04:26:35'),
(20, 402, 4, 2, 45.03, '2018-12-03 04:29:55'),
(21, 201, 4, 1, 15.35, '2018-12-03 04:29:55'),
(22, 402, 4, 2, 45.03, '2018-12-03 04:32:09'),
(23, 101, 4, 2, 12.48, '2018-12-03 04:32:09'),
(24, 201, 4, 2, 15.35, '2018-12-03 04:33:25'),
(25, 301, 4, 2, 14.67, '2018-12-03 04:35:10'),
(26, 401, 4, 3, 19.37, '2018-12-03 04:36:11'),
(27, 403, 5, 3, 34.88, '2018-12-08 07:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `trackid` int(10) NOT NULL,
  `albumid` int(10) NOT NULL,
  `artistid` int(10) NOT NULL,
  `trackname` varchar(50) NOT NULL,
  `trackgenre` varchar(25) DEFAULT NULL,
  `trackpath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`trackid`, `albumid`, `artistid`, `trackname`, `trackgenre`, `trackpath`) VALUES
(1001, 101, 1, 'Do You Know', 'pop', 'audio/Do You Know.mp3'),
(1002, 101, 1, 'Tired of Being Sorry ', 'pop', 'audio/Tired of Being Sorry.mp3'),
(1003, 101, 1, 'Ring My Bells', 'pop', 'audio/Ring My Bells.mp3'),
(1004, 101, 1, 'On Top of You', 'pop', 'audio/On Top of You.mp3'),
(1005, 201, 2, 'Numb', 'alternative', 'audio/Numb.mp3'),
(1007, 201, 2, 'Papercut', 'alternative', 'audio/Papercut.mp3'),
(1008, 201, 2, 'Runaway', 'alternative', 'audio/Runaway.mp3'),
(1015, 402, 5, 'the closure.mp3', 'pop', 'audio/the closure.mp3'),
(1016, 402, 5, 'the red.mp3', 'pop', 'audio/the red.mp3'),
(1017, 403, 13, 'OBB- Mona Lisa (Official Lyric Video) - YouTube (4', 'pop', 'audio/OBB- Mona Lisa (Official Lyric Video) - YouT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `artistid` (`artistid`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artistid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`trackid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artistid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `trackid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
