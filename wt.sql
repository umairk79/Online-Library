-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 11:00 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `uid` int(5) NOT NULL,
  `action` varchar(30) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `uid`, `action`, `ISBN`, `date`) VALUES
(48, 2, 'Issued a copy of', 440241022, '2016-10-02'),
(49, 1, 'Issued a copy of', 440241022, '2016-10-02'),
(50, 3, 'Issued a copy of', 440241022, '2016-10-02'),
(51, 5, 'Issued a copy of', 440241022, '2016-10-02'),
(52, 5, 'Returned a copy of', 440241022, '2016-10-02'),
(53, 5, 'Issued a copy of', 440241022, '2016-10-02'),
(54, 6, 'Issued a copy of', 440241022, '2016-10-02'),
(55, 3, 'Reviewed', 440241022, '2016-10-02'),
(56, 3, 'Returned a copy of', 440241022, '2016-10-02'),
(57, 6, 'Reviewed', 440241022, '2016-10-02'),
(58, 5, 'Reviewed', 440241022, '2016-10-02'),
(59, 2, 'Returned a copy of', 440241022, '2016-10-02'),
(60, 5, 'Reviewed', 440241022, '2016-10-02'),
(61, 5, 'Reviewed', 440241022, '2016-10-02'),
(63, 2, 'Reviewed', 7240198, '2016-10-02'),
(66, 3, 'Reviewed', 55357342, '2016-10-02'),
(67, 3, 'Reviewed', 440241022, '2016-10-02'),
(68, 1, 'Returned a copy of', 440241022, '2016-10-02'),
(69, 1, 'Reviewed', 55357342, '2016-10-02'),
(70, 2, 'Reviewed', 450040186, '2016-10-02'),
(71, 2, 'Reviewed', 55357342, '2016-10-02'),
(72, 7, 'Reviewed', 55357342, '2016-10-02'),
(73, 6, 'Reviewed', 55357342, '2016-10-02'),
(74, 5, 'Reviewed', 55357342, '2016-10-02'),
(75, 5, 'Returned a copy of', 440241022, '2016-10-02'),
(76, 1, 'Reviewed', 55357342, '2016-10-02'),
(77, 3, 'Reviewed', 55357342, '2016-10-02'),
(78, 7, 'Issued a copy of', 440241022, '2016-10-02'),
(79, 7, 'Reviewed', 440241022, '2016-10-02'),
(80, 7, 'Returned a copy of', 440241022, '2016-10-02'),
(81, 6, 'Returned a copy of', 440241022, '2016-10-02'),
(82, 6, 'Reviewed', 440241022, '2016-10-02'),
(85, 7, 'Reviewed', 440241022, '2016-10-02'),
(87, 2, 'Reviewed', 440241022, '2016-10-02'),
(88, 1, 'Reviewed', 55357342, '2016-10-02'),
(89, 3, 'Reviewed', 55357342, '2016-10-02'),
(90, 2, 'Issued a copy of', 6472613, '2016-10-02'),
(91, 2, 'Issued a copy of', 385339089, '2016-10-02'),
(92, 2, 'Issued a copy of', 1847022987, '2016-10-02'),
(93, 2, 'Issued a copy of', 55357342, '2016-10-02'),
(94, 2, 'Issued a copy of', 515128635, '2016-10-02'),
(95, 1, 'Issued a copy of', 440241022, '2016-10-02'),
(96, 3, 'Reviewed', 440241022, '2016-10-02'),
(97, 3, 'Reviewed', 440241022, '2016-10-02'),
(98, 5, 'Reviewed', 440241022, '2016-10-02'),
(99, 7, 'Issued a copy of', 440241022, '2016-10-02'),
(100, 7, 'Returned a copy of', 440241022, '2016-10-02'),
(101, 7, 'Issued a copy of', 440241022, '2016-10-02'),
(102, 7, 'Reviewed', 440241022, '2016-10-02'),
(103, 6, 'Reviewed', 440241022, '2016-10-02'),
(104, 6, 'Issued a copy of', 440241022, '2016-10-02'),
(105, 6, 'Returned a copy of', 440241022, '2016-10-02'),
(106, 6, 'Issued a copy of', 440241022, '2016-10-02'),
(107, 5, 'Issued a copy of', 440241022, '2016-10-02'),
(108, 3, 'Issued a copy of', 440241022, '2016-10-02'),
(109, 8, 'Issued a copy of', 593065700, '2016-10-02'),
(110, 8, 'Returned a copy of', 593065700, '2016-10-07'),
(111, 6, 'Returned a copy of', 440241022, '2016-10-07'),
(112, 6, 'Issued a copy of', 440241022, '2016-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `author_details`
--

CREATE TABLE `author_details` (
  `author_name` varchar(50) NOT NULL,
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_details`
--

INSERT INTO `author_details` (`author_name`, `authorid`) VALUES
('Bram Stoker', 1),
('Stephen King', 2),
('Ben Goldacre', 3),
('Arthur Clarke', 4),
('Chetan Bhagat', 5),
('Sidney sheldon', 6),
('John Grisham', 7),
('J.K. Rowling', 8),
('Emma Cline', 9),
('Yaa Gyasi', 10),
('Don DeLillo', 11),
('Lin-Manuel Miranda', 12),
('Emma Straub ', 13),
('Matthew Desmond ', 14),
('Ian McEwan', 15),
('J.D. Robb', 16),
('George R.R. Martin', 17),
('Lee Child', 18);

-- --------------------------------------------------------

--
-- Table structure for table `book_copies`
--

CREATE TABLE `book_copies` (
  `ISBN` bigint(20) NOT NULL,
  `acn1` bigint(20) NOT NULL,
  `acn2` bigint(20) NOT NULL,
  `acn3` bigint(20) NOT NULL,
  `acn4` bigint(20) NOT NULL,
  `acn5` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_copies`
--

INSERT INTO `book_copies` (`ISBN`, `acn1`, `acn2`, `acn3`, `acn4`, `acn5`) VALUES
(6472613, 0, 64726132, 64726133, 64726134, 64726135),
(7240198, 72401981, 72401982, 72401983, 72401984, 72401985),
(43965548, 439655481, 439655482, 439655483, 439655484, 439655485),
(55357342, 0, 553573422, 553573423, 553573424, 553573425),
(55358202, 553582021, 553582022, 553582023, 553582024, 553582025),
(61728306, 617283061, 617283062, 617283063, 617283064, 617283065),
(61883166, 618831661, 618831662, 618831663, 618831664, 618831665),
(62073419, 620734191, 620734192, 620734193, 620734194, 620734195),
(62073427, 620734271, 620734272, 620734273, 620734274, 620734275),
(81299860, 812998601, 812998602, 812998603, 812998604, 812998605),
(159463467, 1594634671, 1594634672, 1594634673, 1594634674, 1594634675),
(307588378, 3075883781, 3075883782, 3075883783, 3075883784, 3075883785),
(345347951, 3453479511, 3453479512, 3453479513, 3453479514, 3453479515),
(385199570, 3851995701, 3851995702, 3851995703, 3851995704, 3851995705),
(385338600, 3853386001, 3853386002, 3853386003, 3853386004, 3853386005),
(385339089, 0, 3853390892, 3853390893, 3853390894, 3853390895),
(385339100, 3853391001, 3853391002, 3853391003, 3853391004, 3853391005),
(385339690, 3853396901, 3853396902, 3853396903, 3853396904, 3853396905),
(393970124, 3939701241, 3939701242, 3939701243, 3939701244, 3939701245),
(439064864, 4390648641, 4390648642, 4390648643, 4390648644, 4390648645),
(439139600, 4391396001, 4391396002, 4391396003, 4391396004, 4391396005),
(439358078, 4393580781, 4393580782, 4393580783, 4393580784, 4393580785),
(439554934, 4395549341, 4395549342, 4395549343, 4395549344, 4395549345),
(439785960, 4397859601, 4397859602, 4397859603, 4397859604, 4397859605),
(440241022, 0, 0, 0, 0, 0),
(446677949, 4466779491, 4466779492, 4466779493, 4466779494, 4466779495),
(450040186, 4500401861, 4500401862, 4500401863, 4500401864, 4500401865),
(450411435, 4504114351, 4504114352, 4504114353, 4504114354, 4504114355),
(450417395, 4504173951, 4504173952, 4504173953, 4504173954, 4504173955),
(451457994, 4514579941, 4514579942, 4514579943, 4514579944, 4514579945),
(451528522, 4515285221, 4515285222, 4515285223, 4515285224, 4515285225),
(451933028, 4519330281, 4519330282, 4519330283, 4519330284, 4519330285),
(486207676, 4862076761, 4862076762, 4862076763, 4862076764, 4862076765),
(515128635, 0, 5151286352, 5151286353, 5151286354, 5151286355),
(515130974, 5151309741, 5151309742, 5151309743, 5151309744, 5151309745),
(515141429, 5151414291, 5151414292, 5151414293, 5151414294, 5151414295),
(515142247, 5151422471, 5151422472, 5151422473, 5151422474, 5151422475),
(545010225, 5450102251, 5450102252, 5450102253, 5450102254, 5450102255),
(553116606, 5531166061, 5531166062, 5531166063, 5531166064, 5531166065),
(553381695, 5533816951, 5533816952, 5533816953, 5533816954, 5533816955),
(553447432, 5534474321, 5534474322, 5534474323, 5534474324, 5534474325),
(553588486, 5535884861, 5535884862, 5535884863, 5535884864, 5535884865),
(582418275, 5824182751, 5824182752, 5824182753, 5824182754, 5824182755),
(593065700, 5930657001, 5930657002, 5930657003, 5930657004, 5930657005),
(750914688, 7509146881, 7509146882, 7509146883, 7509146884, 7509146885),
(751565350, 7515653501, 7515653502, 7515653503, 7515653504, 7515653505),
(812988906, 8129889061, 8129889062, 8129889063, 8129889064, 8129889065),
(1101947136, 11019471361, 11019471362, 11019471363, 11019471364, 11019471365),
(1101987979, 11019879791, 11019879792, 11019879793, 11019879794, 11019879795),
(1402743386, 14027433861, 14027433862, 14027433863, 14027433864, 14027433865),
(1455539740, 14555397401, 14555397402, 14555397403, 14555397404, 14555397405),
(1483911896, 14839118961, 14839118962, 14839118963, 14839118964, 14839118965),
(1501135392, 15011353921, 15011353922, 15011353923, 15011353924, 15011353925),
(1587155761, 15871557611, 15871557612, 15871557613, 15871557614, 15871557615),
(1590860624, 15908606241, 15908606242, 15908606243, 15908606244, 15908606245),
(1847022960, 18470229601, 18470229602, 18470229603, 18470229604, 18470229605),
(1847022987, 0, 18470229872, 18470229873, 18470229874, 18470229875),
(1857230213, 18572302131, 18572302132, 18572302133, 18572302134, 18572302135),
(1857987632, 18579876321, 18579876322, 18579876323, 18579876324, 18579876325),
(1905177356, 19051773561, 19051773562, 19051773563, 19051773564, 19051773565),
(1911214330, 19112143301, 19112143302, 19112143303, 19112143304, 19112143305),
(4321678933, 43216789331, 43216789332, 43216789333, 43216789334, 43216789335),
(8129115301, 81291153011, 81291153012, 81291153013, 81291153014, 81291153015),
(8129120216, 81291202161, 81291202162, 81291202163, 81291202164, 81291202165),
(8129135728, 81291357281, 81291357282, 81291357283, 81291357284, 81291357285),
(9780976604853, 97809766048531, 97809766048532, 97809766048533, 97809766048534, 97809766048535),
(9781435140370, 97814351403701, 97814351403702, 97814351403703, 97814351403704, 97814351403705),
(9781780660264, 97817806602641, 97817806602642, 97817806602643, 97817806602644, 97817806602645),
(9788129113726, 97881291137261, 97881291137262, 97881291137263, 97881291137264, 97881291137265);

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `ISBN` bigint(20) NOT NULL,
  `authorid` int(5) DEFAULT NULL,
  `bookname` varchar(100) COLLATE utf8_bin NOT NULL,
  `genre` varchar(20) COLLATE utf8_bin NOT NULL,
  `des` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `yop` year(4) NOT NULL,
  `rating` float NOT NULL,
  `photo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `publisher` varchar(50) COLLATE utf8_bin NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '5',
  `pages` int(11) NOT NULL,
  `adminrating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`ISBN`, `authorid`, `bookname`, `genre`, `des`, `yop`, `rating`, `photo`, `publisher`, `stock`, `pages`, `adminrating`) VALUES
(6472613, 6, 'Master of the Game', 'Thriller', 'One of Sidney Sheldon''s most popular and bestselling titles, repackaged and reissued for a new generation of fans. Kate Blackwell is one of the richest and most powerful women in the world. She is an enigma, a woman surrounded by a thousand unanswered questions. Her father was a diamond prospector who struck it rich beyond his wildest dreams. Her mother was the daughter of a crooked Afrikaaner merchant. Her conception was itself an act of hate-filled vengeance. At the extravagent celebrations of her ninetieth birthday, there are toasts from a Supreme Court Judge and a telegram from the White House. And for Kate there are ghosts, ghosts of absent friends and of enemies. Ghosts from a life of blackmail and murder. Ghosts from an empire spawned by naked ambition! Sidney Sheldon is one of the most popular storytellers in the world. This is one of his best-loved novels, a compulsively readable thriller, packed with suspense, intrigue and passion. It will recruit a new generation of fans to his writing.', 1993, 5, '../images/Master of the Game.jpg', 'Harper Collins', 4, 489, 5),
(7240198, 3, 'Bad Science', 'Scifi', 'Full of spleen, this is a hilarious, invigorating and informative journey through the world of Bad Science. When Dr Ben Goldacre saw someone on daytime TV dipping her feet in an ''Aqua Detox'' footbath, releasing her toxins into the water, turning it brown, he thought he''d try the same at home. ''Like some kind of Johnny Ball cum Witchfinder General'', using his girlfriend''s Barbie doll, he gently passed an electrical current through the warm salt water. It turned brown. In his words: ''before my very eyes, the world''s first Detox Barbie was sat, with her feet in a pool of brown sludge, purged of a weekend''s immorality.'' Dr Ben Goldacre is the author of the Bad Science column in the Guardian. His book is about all the ''bad science'' we are constantly bombarded with in the media and in advertising. At a time when science is used to prove everything and nothing, everyone has their own ''bad science'' moments from the useless pie-chart on the back of cereal packets to the use of the word ''visibly'' in cosmetics ads. ', 2008, 0.5, '../images/Bad Science.jpg', 'Fourth Estate', 5, 200, 1),
(43965548, 8, 'Harry Potter and the Prisoner of Azkaban', 'Fantasy', 'Harry Potter is lucky to reach the age of thirteen, since he has already survived the murderous attacks of the feared Dark Lord on more than one occasion. But his hopes for a quiet term concentrating on Quidditch are dashed when a maniacal mass-murderer escapes from Azkaban, pursued by the soul-sucking Dementors who guard the prison. It''s assumed that Hogwarts is the safest place for Harry to be. But is it a coincidence that he can feel eyes watching him in the dark, and should he be taking Professor Trelawney''s ghoulish predictions seriously?', 2004, 3, '../images/hp3.jpg', 'Scholastic', 5, 435, 3),
(55357342, 17, 'A Storm of Swords', 'Fantasy', 'Here is the third volume in George R.R. Martin''s magnificent cycle of novels that includes A Game of Thrones and A Clash of Kings. Together, this series comprises a genuine masterpiece of modern fantasy, destined to stand as one of the great achievements of imaginative fiction.\n\nOf the five contenders for power, one is dead, another in disfavor, and still the wars rage as alliances are made and broken. Joffrey sits on the Iron Throne, the uneasy ruler of the Seven Kingdoms. His most bitter rival, Lord Stannis, stands defeated and disgraced, victim of the sorceress who holds him in her thrall. Young Robb still rules the North from the fortress of Riverrun. Meanwhile, making her way across a blood-drenched continent is the exiled queen, Daenerys, mistress of the only three dragons still left in the world. And as opposing forces manoeuver for the final showdown, an army of barbaric wildlings arrives from the outermost limits of civilization, accompanied by a horde of mythical Others, a supernatural army of the living dead whose animated corpses are unstoppable. As the future of the land hangs in the balance, no one will rest until the Seven Kingdoms have exploded in a veritable storm of swords', 2003, 4.34523, '../images/A Storm of Swords.jpg', 'Bantam', 4, 1177, 4),
(55358202, 17, 'A Feast for Crows', 'Fantasy', 'With A Feast for Crows, Martin delivers the long-awaited fourth volume of the landmark series that has redefined imaginative fiction and stands as a modern masterpiece in the making.\r\n\r\nAfter centuries of bitter strife, the seven powers dividing the land have beaten one another into an uneasy truce. But it''s not long before the survivors, outlaws, renegades, and carrion eaters of the Seven Kingdoms gather. Now, as the human crows assemble over a banquet of ashes, daring new plots and dangerous new alliances are formed while surprising faces—some familiar, others only just appearing—emerge from an ominous twilight of past struggles and chaos to take up the challenges of the terrible times ahead. Nobles and commoners, soldiers and sorcerers, assassins and sages, are coming together to stake their fortunes...and their lives. For at a feast for crows, many are the guests—but only a few are the survivors.', 2011, 4, '../images/A Feast for Crows.jpg', 'Bantam', 5, 1061, 4),
(61728306, 6, 'Sidney Sheldon''s After the Darkness', 'Thriller', 'Author Tillie Bagshawe brilliantly recaptured the late superstar author’s magic with Sidney Sheldon’s Mistress of the Game—and now she does it again with Sidney Sheldon’s After the Darkness. A classic tale of love and betrayal, and a struggle for survival in the new world order, this is an enthralling novel with ripped-from-the-headlines immediacy, perfect for the post-Bernie Madoff era in America. A tribute to one of America’s most popular and bestselling authors, Sidney Sheldon’s After the Darkness is a novel that the master himself would have been proud to call his own. ', 2010, 4, '../images/After the Darkness.jpg', 'William Morrow', 5, 352, 4),
(61883166, 6, 'Sidney Sheldon''s Mistress of the Game', 'Thriller', 'Sidney Sheldon’s masterful #1 New York Times bestseller Master of the Game has enthralled millions of readers the world over. Now, at long last, the breathtaking saga of the ambitious and powerful MacGregor/Blackwell family continues in Sidney Sheldon’s Mistress of the Game. Author Tilly Bagshawe has picked up the master’s baton and delivered a magnificent tale of determination, greed, and very dark secrets in the distinct Sheldon vein that will mesmerize newcomers and confirmed Sidney Sheldon fans alike.', 2009, 4, '../images/Mistress of the Game.jpg', 'HarperLuxe', 5, 592, 4),
(62073419, 6, 'Sidney Sheldon''s Angel of the Dark', 'Crime', 'It was his first big murder case-and one of the bloodiest and most violent crimes LAPD detective Danny McGuire would ever encounter. Andrew Jakes, an elderly multimillionaire art dealer, had been brutally murdered in his Hollywood home, his lifeless body tied to his naked young wife. Raped and beaten, the lovely Angela Jakes had barely survived the attack herself. Gazing into her deep, soulful eyes, Danny swore that he''d find the psychopath behind this barbarous act. But the investigation didn''t turn up a single solid lead, and within days of Angela''s release from the hospital, the stunning young widow—Danny''s only witness—had vanished.\n\nFor ten years Danny McGuire could not forget the sweet face of Angela Jakes and the terrible crime that had shattered her life; his obsession with her nearly cost him his sanity. Now in France, thousands of miles from the past—with a new life, a new job with Interpol, and a ravishing new wife—he''s happier than he''s ever been . . . until he meets Andrew Jakes''s estranged son, Matt Daley.\n\nCurious about his father''s murder, Matt has been digging into the cold case—and made some shocking discoveries. Three killings nearly identical to his father''s have taken place across the globe. The victims were elderly, newlywed millionaires, their young wives assaulted. And in each case the widow, the sole beneficiary of the will, donated her newfound wealth to children''s charities and then vanished. Could it be true? Had the Jakes killer struck again? If so, Danny knows he must tread carefully or risk losing everything for good.\n\nThe evidence points to a single killer—a brilliant and ruthless criminal who travels across the globe under a string of assumed identities, cleverly keeping one step ahead of the law. Joining forces, Danny and Matt pursue this intriguing shadow from Los Angeles to London, New York to Italy and the French Riviera, in a tantalizing game of cat and mouse filled with promising leads and frustrating dead ends. When another murder fitting the profile occurs, Matt heads to Hong Kong, hoping to get answers from the latest widow, Lisa Baring, and perhaps uncover the hard evidence they need.\n\nBut Matt becomes besotted with the irresistible beauty, nearly derailing the investigation, and Danny wonders whether Lisa is truly a victim or something more sinister. When a break in the case sends Danny to Mumbai, he knows he must act quickly, for the clever killer is poised to strike again.\n\nA fast-paced story full of mystery, glamour, excitement, and spectacular twists that build to a stunning ending, Sidney Sheldon''s Angel of the Dark is quintessential Sheldon from first page to last. ', 2012, 4, '../images/Angel of the Dark.jpg', 'HarperCollins ', 5, 304, 4),
(62073427, 6, 'Sidney Sheldon''s The Tides of Memory', 'Thriller', 'New York Times bestselling author Tilly Bagshawe, who delivered the late beloved author’s brilliance in Sidney Sheldon’s After the Darkness, is back with a stunning tale of duplicity and vengeance in Sidney Sheldon’s The Tides of Memory.\r\n\r\nThe members of the formidable and captivating De Vere family of London live enviable lives in the world’s most powerful and desirable places, from London’s poshest neighborhoods to influential boardrooms. But when old secrets begin to unravel and threaten everything the De Veres have worked for, the ramifications are deadly.\r\n\r\nBagshawe upholds Sheldon’s legacy with a blistering story of revenge, passion, and betrayal in a book that is quintessential Sheldon.', 2013, 4, '../images/The Tides of Memory.jpg', 'William Morrow', 5, 393, 4),
(81299860, 9, 'The Girls', 'Fiction', 'Northern California, during the violent end of the 1960s. At the start of summer, a lonely and thoughtful teenager, Evie Boyd, sees a group of girls in the park, and is immediately caught by their freedom, their careless dress, their dangerous aura of abandon. Soon, Evie is in thrall to Suzanne, a mesmerizing older girl, and is drawn into the circle of a soon-to-be infamous cult and the man who is its charismatic leader. Hidden in the hills, their sprawling ranch is eerie and run down, but to Evie, it is exotic, thrilling, charged—a place where she feels desperate to be accepted. As she spends more time away from her mother and the rhythms of her daily life, and as her obsession with Suzanne intensifies, Evie does not realize she is coming closer and closer to unthinkable violence, and to that moment in a girl’s life when everything can go horribly wrong. ', 2016, 4, '../images/The Girls.jpg', 'Random House', 5, 355, 4),
(159463467, 13, 'Modern Lovers', 'Fiction', 'Friends and former college bandmates Elizabeth and Andrew and Zoe have watched one another marry, buy real estate, and start businesses and families, all while trying to hold on to the identities of their youth. But nothing ages them like having to suddenly pass the torch (of sexuality, independence, and the ineffable alchemy of cool) to their own offspring.\r\n\r\nBack in the band''s heyday, Elizabeth put on a snarl over her Midwestern smile, Andrew let his unwashed hair grow past his chin, and Zoe was the lesbian all the straight women wanted to sleep with. Now nearing fifty, they all live within shouting distance in the same neighborhood deep in gentrified Brooklyn, and the trappings of the adult world seem to have arrived with ease. But the summer that their children reach maturity (and start sleeping together), the fabric of the adults'' lives suddenly begins to unravel, and the secrets and revelations that are finally let loose—about themselves, and about the famous fourth band member who soared and fell without them—can never be reclaimed.\r\n\r\nStraub packs wisdom and insight and humor together in a satisfying book about neighbors and nosiness, ambition and pleasure, the excitement of youth, the shock of middle age, and the fact that our passions—be they food, or friendship, or music—never go away, they just evolve and grow along with us.', 2016, 4, '../images/Modern Lovers.jpg', 'Riverhead Books', 5, 353, 4),
(345347951, 4, 'Childhood''s End', 'Scifi', 'Without warning, giant silver ships from deep space appear in the skies above every major city on Earth. Manned by the Overlords, in fifty years, they eliminate ignorance, disease, and poverty. Then this golden age ends--and then the age of Mankind begins....', 1987, 4, '../images/Childhood''s End.jpg', 'Del Rey', 5, 224, 4),
(385199570, 2, 'The Stand', 'Fiction', 'This is the way the world ends: with a nanosecond of computer error in a Defense Department laboratory and a million casual contacts that form the links in a chain letter of death.\r\n\r\nAnd here is the bleak new world of the day after: a world stripped of its institutions and emptied of 99 percent of its people. A world in which a handful of panicky survivors choose sides -- or are chosen. A world in which good rides on the frail shoulders of the 108-year-old Mother Abagail -- and the worst nightmares of evil are embodied in a man with a lethal smile and unspeakable powers: Randall Flagg, the dark man.\r\n\r\nIn 1978 Stephen King published The Stand, the novel that is now considered to be one of his finest works. But as it was first published, The Stand was incomplete, since more than 150,000 words had been cut from the original manuscript.\r\n\r\nNow Stephen King''s apocalyptic vision of a world blasted by plague and embroiled in an elemental struggle between good and evil has been restored to its entirety. The Stand : The Complete And Uncut Edition includes more than five hundred pages of material previously deleted, along with new material that King added as he reworked the manuscript for a new generation. It gives us new characters and endows familiar ones with new depths. It has a new beginning and a new ending. What emerges is a gripping work with the scope and moral complexity of a true epic.\r\n\r\nFor hundreds of thousands of fans who read The Stand in its original version and wanted more, this new edition is Stephen King''s gift. And those who are reading The Stand for the first time will discover a triumphant and eerily plausible work of the imagination that takes on the issues that will determine our survival. ', 1990, 3, '../images/The Stand.jpg', 'Doubleday', 5, 1153, 3),
(385338600, 7, 'A Time to Kill', 'Thriller', 'Before The Firm and The Pelican Brief made him a superstar, John Grisham wrote this riveting story of retribution and justice -- at last it''s available in a Doubleday hardcover edition. In this searing courtroom drama, best-selling author John Grisham probes the savage depths of racial violence...as he delivers a compelling tale of uncertain justice in a small southern town...Clanton, Mississippi. \r\n\r\nThe life of a ten-year-old girl is shattered by two drunken and remorseless young men. The mostly white town reacts with shock and horror at the inhuman crime. Until her black father acquires an assault rifle and takes matters into his hands.\r\n\r\nFor ten days, as burning crosses and the crack of sniper fire spread through the streets of Clanton, the nation sits spellbound as young defense attorney Jake Brigance struggles to save his client''s life...and then his own. ', 2004, 4, '../images/A Time to Kill.jpg', 'Delta', 5, 515, 4),
(385339089, 7, 'The Client', 'Scifi', 'In a weedy lot on the outskirts of Memphis, two boys watch a shiny Lincoln pull up to the curb...Eleven-year-old Mark Sway and his younger brother were sharing a forbidden cigarette when a chance encounter with a suicidal lawyer left Mark knowing a bloody and explosive secret: the whereabouts of the most sought-after dead body in America. Now Mark is caught between a legal system gone mad and a mob killer desperate to cover up his crime. And his only ally is a woman named Reggie Love, who has been a lawyer for all of four years. Prosecutors are willing to break all the rules to make Mark talk. The mob will stop at nothing to keep him quiet. And Reggie will do anything to protect her client --even take a last, desperate gamble that could win Mark his freedom... or cost them both their lives.', 2010, 4, '../images/The Client.jpg', 'Delta', 4, 483, 4),
(385339100, 7, 'The Partner', 'Thriller', 'They watched Danilo Silva for days before they finally grabbed him. He was living alone, a quiet life on a shady street in Brazil; a simple life in a modest home, certainly not one of luxury. Certainly no evidence of the fortune they thought he had stolen. He was much thinner and his face had been altered. He spoke a different language, and spoke it very well.But Danilo had a past with many chapters. Four years earlier he had been Patrick Lanigan, a young partner in a prominent Biloxi law firm. He had a pretty wife, a new daughter, and a bright future. Then one cold winter night Patrick was trapped in a burning car and died a horrible death. When he was buried his casket held nothing more than his ashes.From a short distance away, Patrick watched his own burial. Then he fled. Six weeks later, a fortune was stolen from his ex-law firm''s offshore account. And Patrick fled some more.But they found him.\r\n', 2005, 4, '../images/The Partner.jpg', 'Delta', 5, 416, 4),
(385339690, 7, 'The Runaway Jury', 'Fiction', 'Every jury has a leader, and the verdict belongs to him. In Biloxi, Mississippi, a landmark tobacco trial with hundreds of millions of dollars at stake begins routinely, then swerves mysteriously off course. \r\n\r\nThe jury is behaving strangely, and at least one juror is convinced he''s being watched. Soon they have to be sequestered. Then a tip from an anonymous young woman suggests she is able to predict the jurors'' increasingly odd behavior. \r\n\r\nIs the jury somehow being manipulated, or even controlled? If so, by whom? And, more importantly, why?', 2006, 3, '../images/The Runaway Jury.jpg', 'Delta', 5, 451, 3),
(439064864, 8, 'Harry Potter and the Chamber of Secrets', 'Fantasy', 'The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he''s packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike.\r\n\r\nAnd strike it does. For in Harry''s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls'' bathroom, and the unwanted attentions of Ron Weasley''s younger sister, Ginny. But each of these seem minor annoyances when the real trouble begins, and someone, or something, starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects: Harry Potter himself?', 1999, 4, '../images/hp2.jpg', 'Scholastic Inc', 5, 352, 4),
(439139600, 8, 'Harry Potter and the Goblet of Fire', 'Fantasy', 'Harry Potter is midway through both his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup with Hermione, Ron, and the Weasleys. He wants to dream about Cho Chang, his crush (and maybe do more than dream). He wants to find out about the mysterious event that supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn''t happened for hundreds of years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he''s not normal - even by wizarding standards.\r\nAnd in his case, different can be deadly.', 2002, 4, '../images/hp4.jpg', 'Scholastic', 5, 734, 4),
(439358078, 8, 'Harry Potter and the Order of the Phoenix', 'Fantasy', 'Harry Potter is due to start his fifth year at Hogwarts School of Witchcraft and Wizardry. His best friends Ron and Hermione have been very secretive all summer and he is desperate to get back to school and find out what has been going on. However, what Harry discovers is far more devastating than he could ever have expected...\r\n\r\nSuspense, secrets and thrilling action from the pen of J.K. Rowling ensure an electrifying adventure that is impossible to put down. ', 2004, 4, '../images/hp5.jpg', 'Scholastic', 5, 870, 4),
(439554934, 8, 'Harry Potter and the Sorcerers Stone', 'Fantasy', 'Harry Potter''s life is miserable. His parents are dead and he''s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he''s a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry.\r\n\r\nAfter a lifetime of bottling up his magical powers, Harry finally feels like a normal kid. But even within the Wizarding community, he is special. He is the boy who lived: the only person to have ever survived a killing curse inflicted by the evil Lord Voldemort, who launched a brutal takeover of the Wizarding world, only to vanish after failing to kill Harry.\r\n\r\nThough Harry''s first year at Hogwarts is the best of his life, not everything is perfect. There is a dangerous secret object hidden within the castle walls, and Harry believes it''s his responsibility to prevent it from falling into evil hands. But doing so will bring him into contact with forces more terrifying than he ever could have imagined.\r\n\r\nFull of sympathetic characters, wildly imaginative situations, and countless exciting details, the first installment in the series assembles an unforgettable magical world and sets the stage for many high-stakes adventures to come.', 1997, 4, '../images/hp1.jpg', 'Arthur A. Levine Books', 5, 320, 4),
(439785960, 8, 'Harry Potter and the Half-Blood Prince', 'Fantasy', 'It is the middle of the summer, but there is an unseasonal mist pressing against the windowpanes. Harry Potter is waiting nervously in his bedroom at the Dursleys'' house in Privet Drive for a visit from Professor Dumbledore himself. One of the last times he saw the Headmaster was in a fierce one-to-one duel with Lord Voldemort, and Harry can''t quite believe that Professor Dumbledore will actually appear at the Dursleys'' of all places. Why is the Professor coming to visit him now? What is it that cannot wait until Harry returns to Hogwarts in a few weeks'' time? Harry''s sixth year at Hogwarts has already got off to an unusual start, as the worlds of Muggle and magic start to intertwine...\r\n\r\nJ.K. Rowling charts Harry Potter''s latest adventures in his sixth year at Hogwarts with consummate skill and in breathtaking fashion. ', 2006, 4, '../images/hp6.jpg', 'Scholastic', 5, 652, 4),
(440241022, 18, 'One Shot', 'Crime', 'Six shots. Five dead. One heartland city thrown into a state of terror. But within hours the cops have it solved: a slam-dunk case. Except for one thing. The accused man says: You got the wrong guy. Then he says: Get Reacher for me. And sure enough, from the world he lives in--no phone, no address, no commitments-ex-military investigator Jack Reacher is coming. In Lee Child''s astonishing new thriller, Reacher''s arrival will change everything--about a case that isn''t what it seems, about lives tangled in baffling ways, about a killer who missed one shot-and by doing so give Jack Reacher one shot at the truth.... \r\nThe gunman worked from a parking structure just thirty yards away-point-blank range for a trained military sniper like James Barr. His victims were in the wrong place at the wrong time. But why does Barr want Reacher at his side? There are good reasons why Reacher is the last person Barr would want to see. But when Reacher hears Barr''s own words, he understands. And a slam-dunk case explodes. Soon Reacher is teamed with a young defense lawyer who is working against her D.A. father and dueling with a prosecution team that has an explosive secret of its own. Like most things Reacher has known in life, this case is a complex battlefield. But, as always, in battle, Reacher is at his best. \r\nMoving in the shadows, picking his spots, Reacher gets closer and closer to the unseen enemy who is pulling the strings. And for Reacher, the only way to take him down is to know his ruthlessness and respect his cunning-and then match him shot for shot.... "From the Hardcover edition."', 2006, 2.73334, '../images/One Shot.jpg', 'Dell Publishing Company', 0, 466, 4),
(446677949, 4, 'The Fountains of Paradise', 'Scifi', 'This Hugo and Nebula Award-winning novel is reissued in this trade paperback edition. Vannemar Morgan''s dream of linking Earth with the stars requires a 24,000-mile-high space elevator. But first he must solve a million technical, political, and economic problems while allaying the wrath of God. Includes a new introduction by the author.', 2001, 4, '../images/The Fountains of Paradise.jpg', 'Aspect', 5, 352, 4),
(450040186, 2, 'The Shining', 'Horror', 'Danny was only five years old but in the words of old Mr Halloran he was a ''shiner'', aglow with psychic voltage. When his father became caretaker of the Overlook Hotel his visions grew frighteningly out of control. \r\n\r\nAs winter closed in and blizzards cut them off, the hotel seemed to develop a life of its own. It was meant to be empty, but who was the lady in Room 217, and who were the masked guests going up and down in the elevator? And why did the hedges shaped like animals seem so alive? \r\n\r\nSomewhere, somehow there was an evil force in the hotel - and that too had begun to shine... ', 1980, 4.5, '../images/The Shining.jpg', 'New English Library', 5, 416, 4),
(450411435, 2, 'It', 'Horror', 'To the children, the town was their whole world. To the adults, knowing better, Derry, Maine was just their home town: familiar, well-ordered for the most part. A good place to live.\r\n\r\nIt was the children who saw - and felt - what made Derry so horribly different. In the storm drains, in the sewers, IT lurked, taking on the shape of every nightmare, each one''s deepest dread. Sometimes IT reached up, seizing, tearing, killing . . .\r\n\r\nThe adults, knowing better, knew nothing.\r\n\r\nTime passed and the children grew up, moved away. The horror of IT was deep-buried, wrapped in forgetfulness. Until they were called back, once more to confront IT as IT stirred and coiled in the sullen depths of their memories, reaching up again to make their past nightmares a terrible present reality. ', 1987, 4, '../images/It.jpg', 'New English Library', 5, 1116, 4),
(450417395, 2, 'Misery', 'Horror', 'Paul Sheldon. He''s a bestselling novelist who has finally met his biggest fan. Her name is Annie Wilkes and she is more than a rabid reader - she is Paul''s nurse, tending his shattered body after an automobile accident. But she is also his captor, keeping him prisoner in her isolated house.', 1988, 4, '../images/Misery.jpg', 'New English Library', 5, 370, 4),
(451933028, 2, 'The Green Mile', 'Crime', 't Cold Mountain Penitentiary, along the lonely stretch of cells known as the Green Mile, killers are depraved as the psychopathic "Billy the Kid" Wharton and the possessed Eduard Delacroix await death strapped in "Old Sparky." Here guards as decent as Paul Edgecombe and as sadistic as Percy Wetmore watch over them. But good or evil, innocent or guilty, none have ever seen the brutal likes of the new prisoner, John Coffey, sentenced to death for raping and murdering two young girls. Is Coffey a devil in human form? Or is he a far, far different kind of being?\r\n\r\nThe complete Green Mile serial, this set includes The Green Mile #1: The Two Dead Girls, The Green Mile #2: The Mouse on the Mile, The Green Mile #3: Coffey''s Hands, The Green Mile #4: The Bad Death of Eduard Delacroix, The Green Mile #5: Night Journey and The Green Mile #6', 1996, 4, '../images/The Green Mile.jpg', 'Penguin Signet', 5, 592, 4),
(515128635, 18, 'Tripwire', 'Crime', 'Jack Reacher, ex-military policeman relaxed in Key West until Costello turned up dead. The amiable PI was hired in New York by the daughter of Reacher''s mentor and former commanding officer, General Garber. Garber''s investigation into a Vietnam MIA sets Reacher on collision with hand-less "Hook" Hobie, hours away from his biggest score', 2000, 4, '../images/Tripwire.jpg', 'Jove', 4, 432, 4),
(515130974, 18, 'Running Blind', 'Crime', 'Women are being murdered nationwide by a killer who leaves no trace of evidence, no fatal wounds, no signs of struggle, and no clues to an apparent motive. All the victims have one thing in common: they each knew Jack Reacher.', 2001, 2, '../images/Running Blind.jpg', 'Jove', 5, 512, 2),
(515141429, 18, 'Killing Floor', 'Crime', 'Ex-military policeman Jack Reacher is a drifter. He''s just passing through Margrave, Georgia, and in less than an hour, he''s arrested for murder. Not much of a welcome. All Jack knows is that he didn''t kill anybody. At least not here. Not lately. But he doesn''t stand a chance of convincing anyone. not in Margrave, Georgia. Not a chance in hell.', 2006, 4, '../images/Killing Floor.jpg', 'Jove', 5, 525, 4),
(515142247, 18, 'Die Trying', 'Crime', 'In a Chicago suburb, a dentist is met in his office parking lot by three men and ordered into the trunk of his Lexus. On a downtown sidewalk, Jack Reacher and an unknown woman are abducted in broad daylight by two men - practiced and confident - who stop them at gunpoint and hustle them into the same sedan. Then Reacher and the woman are switched into a second vehicle and hauled away, leaving the dentist bound and gagged inside his car with the woman''s abandoned possessions, two gallons of gasoline. . . and a burning match. The FBI is desperate to rescue the woman, a Special Agent from the Chicago office, because the FBI always - always - takes care of its own, and because this woman is not just another agent. Reacher and the woman join forces, against seemingly hopeless odds, to outwit their captors and escape. But the FBI thinks Jack is one of the kidnappers - and when they close in, the Bureau snipers will be shooting to kill.', 2008, 3.5, '../images/Die Trying.jpg', 'Jove', 5, 552, 4),
(545010225, 8, 'Harry Potter and the Deathly Hallows', 'Fantasy', 'It''s no longer safe for Harry at Hogwarts, so he and his best friends, Ron and Hermione, are on the run. Professor Dumbledore has given them clues about what they need to do to defeat the dark wizard, Lord Voldemort, once and for all, but it''s up to them to figure out what these hints and suggestions really mean.\r\n\r\nTheir cross-country odyssey has them searching desperately for the answers, while evading capture or death at every turn. At the same time, their friendship, fortitude, and sense of right and wrong are tested in ways they never could have imagined.\r\n\r\nThe ultimate battle between good and evil that closes out this final chapter of the epic series takes place where Harry''s Wizarding life began: at Hogwarts. The satisfying conclusion offers shocking last-minute twists, incredible acts of courage, powerful new forms of magic, and the resolution of many mysteries.\r\n\r\nAbove all, this intense, cathartic book serves as a clear statement of the message at the heart of the Harry Potter series: that choice matters much more than destiny, and that love will always triumph over death.', 2007, 4, '../images/hp7.jpg', 'Scholasti', 5, 784, 4),
(553381695, 17, 'A Clash of Kings', 'Fantasy', 'Time is out of joint. The summer of peace and plenty, ten years long, is drawing to a close, and the harsh, chill winter approaches like an angry beast. Two great leaders—Lord Eddard Stark and Robert Baratheon—who held sway over an age of enforced peace are dead...victims of royal treachery. Now, from the ancient citadel of Dragonstone to the forbidding shores of Winterfell, chaos reigns, as pretenders to the Iron Throne of the Seven Kingdoms prepare to stake their claims through tempest, turmoil, and war. \r\n\r\nAs a prophecy of doom cuts across the sky—a comet the color of blood and flame—six factions struggle for control of a divided land. Eddard''s son Robb has declared himself King in the North. In the south, Joffrey, the heir apparent, rules in name only, victim of the scheming courtiers who teem over King''s Landing. Robert''s two brothers each seek their own dominion, while a disfavored house turns once more to conquest. And a continent away, an exiled queen, the Mother of Dragons, risks everything to lead her precious brood across a hard hot desert to win back the crown that is rightfully hers. \r\n\r\nA Clash of Kings transports us into a magnificent, forgotten land of revelry and revenge, wizardry and wartime. It is a tale in which maidens cavort with madmen, brother plots against brother, and the dead rise to walk in the night. Here a princess masquerades as an orphan boy; a knight of the mind prepares a poison for a treacherous sorceress; and wild men descend from the Mountains of the Moon to ravage the countryside. \r\n\r\nAgainst a backdrop of incest and fratricide, alchemy and murder, the price of glory may be measured in blood. And the spoils of victory may just go to the men and women possessed of the coldest steel...and the coldest hearts. For when rulers clash, all of the land feels the tremors. \r\n\r\nAudacious, inventive, brilliantly imagined, A Clash of Kings is a novel of dazzling beauty and boundless enchantment;a tale of pure excitement you will never forget.', 2002, 4, '../images/A Clash of Kings.jpg', 'Bantam', 5, 761, 4),
(553447432, 14, 'Evicted: Poverty and Profit in the American City', 'Fiction', 'In this brilliant, heartbreaking book, Matthew Desmond takes us into the poorest neighborhoods of Milwaukee to tell the story of eight families on the edge. Arleen is a single mother trying to raise her two sons on the $20 a month she has left after paying for their rundown apartment. Scott is a gentle nurse consumed by a heroin addiction. Lamar, a man with no legs and a neighborhood full of boys to look after, tries to work his way out of debt. Vanetta participates in a botched stickup after her hours are cut. All are spending almost everything they have on rent, and all have fallen behind.\r\n\r\nThe fates of these families are in the hands of two landlords: Sherrena Tarver, a former schoolteacher turned inner-city entrepreneur, and Tobin Charney, who runs one of the worst trailer parks in Milwaukee. They loathe some of their tenants and are fond of others, but as Sherrena puts it, “Love don’t pay the bills.” She moves to evict Arleen and her boys a few days before Christmas.\r\n\r\nEven in the most desolate areas of American cities, evictions used to be rare. But today, most poor renting families are spending more than half of their income on housing, and eviction has become ordinary, especially for single mothers. In vivid, intimate prose, Desmond provides a ground-level view of one of the most urgent issues facing America today. As we see families forced  into shelters, squalid apartments, or more dangerous neighborhoods, we bear witness to the human cost of America’s vast inequality—and to people’s determination and intelligence in the face of hardship.\r\n\r\nBased on years of embedded fieldwork and painstakingly gathered data, this masterful book transforms our understanding of extreme poverty and economic exploitation while providing fresh ideas for solving a devastating, uniquely American problem. Its unforgettable scenes of hope and loss remind us of the centrality of home, without which nothing else is possible.', 2016, 4, '../images/Evicted Poverty and Profit.jpg', 'Crown', 5, 456, 4),
(553588486, 17, 'A Game of Thrones', 'Fantasy', 'As Warden of the north, Lord Eddard Stark counts it a curse when King Robert bestows on him the office of the Hand. His honour weighs him down at court where a true man does what he will, not what he must … and a dead enemy is a thing of beauty.\r\n\r\nThe old gods have no power in the south, Stark’s family is split and there is treachery at court. Worse, the vengeance-mad heir of the deposed Dragon King has grown to maturity in exile in the Free Cities. He claims the Iron Throne.', 2005, 4, '../images/A Game of Thrones.jpg', 'Bantam', 5, 835, 4),
(582418275, 7, 'The Firm', 'Thriller', 'When Mitch McDeere signed on with Bendini, Lambert & Locke of Memphis, he thought that he and his beautiful wife, Abby, were on their way. The firm leased him a BMW, paid off his school loans, arranged a mortgage, and hired the McDeeres a decorator. Mitch should have remembered what his brother Ray–doing fifteen years in a Tennessee jail–already knew: You never get nothing for nothing. Now the FBI has the lowdown on Mitch’s firm and needs his help. Mitch is caught between a rock and a hard place, with no choice–if he wants to live.', 2000, 2, '../images/The Firm.jpg', 'Addison Wesley', 5, 560, 2),
(593065700, 18, 'The Affair', 'Crime', 'March 1997. A woman has her throat cut behind a bar in Carter Crossing, Mississippi. Just down the road is a big army base. Is the murderer a local guy - or is he a soldier?\r\n\r\nJack Reacher, still a major in the military police, is sent in undercover. The county sheriff is a former US Marine - and a stunningly beautiful woman. Her investigation is going nowhere. Is the Pentagon stonewalling her? Or doesn''t she really want to find the killer?\r\n\r\nThe adrenaline-pumping, high-voltage action in The Affair is set just six months before the opening of Killing Floor, and it marks a turning point in Reacher''s career. If he does what the army wants, will he be able to live with himself? And if he doesn''t, will the army be able to live with him?\r\n\r\nIs this his last case in uniform?', 2011, 4, '../images/The Affair.jpg', 'Bantam Press', 5, 427, 4),
(750914688, 1, 'The Mystery of the Sea', 'Horror', 'When Archibald Hunter comes to Cruden Bay, Aberdeenshire for his annual holiday he is looking forward to a tranquil few days by the sea, but he is disturbed by strange visions and portents of doom. Where are these terrible visions taking him? And what is the significance of the pages of cipher?', 1997, 2, '../images/The Mystery of the Sea.jpg', 'Sutton Publishing', 5, 300, 2),
(751565350, 8, 'Harry Potter and the Cursed Child - Parts One and Two', 'Fantasy', 'Based on an original new story by J.K. Rowling, Jack Thorne and John Tiffany, a new play by Jack Thorne, Harry Potter and the Cursed Child is the eighth story in the Harry Potter series and the first official Harry Potter story to be presented on stage. The play will receive its world premiere in London’s West End on July 30, 2016.', 2016, 4, '../images/Harry Potter and the Cursed Child.jpg', 'Little, Brown UK', 5, 327, 4),
(1101947136, 10, 'Homegoing', 'Fiction', 'The unforgettable New York Times best seller begins with the story of two half-sisters, separated by forces beyond their control: one sold into slavery, the other married to a British slaver. Written with tremendous sweep and power, Homegoing traces the generations of family who follow, as their destinies lead them through two continents and three hundred years of history, each life indelibly drawn, as the legacy of slavery is fully revealed in light of the present day.\r\n\r\nEffia and Esi are born into different villages in eighteenth-century Ghana. Effia is married off to an Englishman and lives in comfort in the palatial rooms of Cape Coast Castle. Unbeknownst to Effia, her sister, Esi, is imprisoned beneath her in the castle’s dungeons, sold with thousands of others into the Gold Coast’s booming slave trade, and shipped off to America, where her children and grandchildren will be raised in slavery. One thread of Homegoing follows Effia’s descendants through centuries of warfare in Ghana, as the Fante and Asante nations wrestle with the slave trade and British colonization. The other thread follows Esi and her children into America. From the plantations of the South to the Civil War and the Great Migration, from the coal mines of Pratt City, Alabama, to the jazz clubs and dope houses of twentieth-century Harlem, right up through the present day, Homegoing makes history visceral, and captures, with singular and stunning immediacy, how the memory of captivity came to be inscribed in the soul of a nation.\r\n', 2016, 4, '../images/Homegoing.jpg', 'Knopf', 5, 305, 4),
(1101987979, 16, 'Apprentice in Death', 'Fantasy', 'The shots came quickly, silently, and with deadly accuracy. Within seconds, three people were dead at Central Park’s ice skating rink. The victims: a talented young skater, a doctor, and a teacher. As random as random can be.\r\n\r\nEve Dallas has seen a lot of killers during her time with the NYPSD, but never one like this. After reviewing security videos, it becomes clear that the victims were killed by a sniper firing a tactical laser rifle, who could have been miles away when the trigger was pulled. And though the locations where the shooter could have set up seem endless, the list of people with that particular skill set is finite: police, military, professional killer.\r\n\r\nEve’s husband, Roarke, has unlimited resources—and genius—at his disposal. And when his computer program leads Eve to the location of the sniper, she learns a shocking fact: There were two—one older, one younger. Someone is being trained by an expert in the science of killing, and they have an agenda. Central Park was just a warm-up. And as another sniper attack shakes the city to its core, Eve realizes that though we’re all shaped by the people around us, there are those who are just born evil...', 2016, 4, '../images/Apprentice in Death.jpg', 'Berkley', 5, 375, 4),
(1402743386, 4, 'Frankenstein', 'Horror', 'Mary Shelley’s groundbreaking classic—begun as a ghost story for friends—is a potent blend of science fiction and horror that has inspired countless movie and other adaptations. Nothing, however, equals the depth and beauty of Shelley’s original, which emains as relevant as ever. In his arrogance, Dr. Victor Frankenstein dreams of discovering the very secret of life…and he succeeds, bringing a new creature into existence. But should man ever play God—and if he does, what does he owe his creation? ', 2007, 2, '../images/Frankenstein.jpg', 'Sterling', 5, 224, 2),
(1455539740, 12, 'Hamilton: The Revolution', 'Crime', 'Lin-Manuel Miranda''s groundbreaking musical Hamilton is as revolutionary as its subject, the poor kid from the Caribbean who fought the British, defended the Constitution, and helped to found the United States. Fusing hip-hop, pop, R&B, and the best traditions of theater, this once-in-a-generation show broadens the sound of Broadway, reveals the storytelling power of rap, and claims our country''s origins for a diverse new generation.\r\n\r\nHAMILTON: THE REVOLUTION gives readers an unprecedented view of both revolutions, from the only two writers able to provide it. Miranda, along with Jeremy McCarter, a cultural critic and theater artist who was involved in the project from its earliest stages--"since before this was even a show," according to Miranda--traces its development from an improbable perfor­mance at the White House to its landmark opening night on Broadway six years later. In addition, Miranda has written more than 200 funny, revealing footnotes for his award-winning libretto, the full text of which is published here.\r\n\r\nTheir account features photos by the renowned Frank Ockenfels and veteran Broadway photographer, Joan Marcus; exclusive looks at notebooks and emails; interviews with Questlove, Stephen Sond­heim, leading political commentators, and more than 50 people involved with the production; and multiple appearances by Presi­dent Obama himself. The book does more than tell the surprising story of how a Broadway musical became a national phenomenon: It demonstrates that America has always been renewed by the brash upstarts and brilliant outsiders, the men and women who don''t throw away their shot', 2016, 4, '../images/Hamilton The Revolution.jpg', 'Central Publishing', 5, 288, 4),
(1501135392, 11, 'Zero K: A Novel', 'Scifi', 'The wisest, richest, funniest, and most moving novel in years from Don DeLillo, one of the great American novelists of our time—an ode to language, at the heart of our humanity, a meditation on death, and an embrace of life.\r\n\r\nJeffrey Lockhart’s father, Ross, is a billionaire in his sixties, with a younger wife, Artis Martineau, whose health is failing. Ross is the primary investor in a remote and secret compound where death is exquisitely controlled and bodies are preserved until a future time when biomedical advances and new technologies can return them to a life of transcendent promise. Jeff joins Ross and Artis at the compound to say “an uncertain farewell” to her as she surrenders her body.\r\n\r\n“We are born without choosing to be. Should we have to die in the same manner? Isn’t it a human glory to refuse to accept a certain fate?”\r\n\r\nThese are the questions that haunt the novel and its memorable characters, and it is Ross Lockhart, most particularly, who feels a deep need to enter another dimension and awake to a new world. For his son, this is indefensible. Jeff, the book’s narrator, is committed to living, to experiencing “the mingled astonishments of our time, here, on earth.”\r\n\r\nDon DeLillo’s seductive, spectacularly observed and brilliant new novel weighs the darkness of the world—terrorism, floods, fires, famine, plague—against the beauty and humanity of everyday life; love, awe, “the intimate touch of earth and sun.”', 2016, 4, '../images/Zero K A Novel.jpg', 'Scribner', 5, 274, 4),
(1587155761, 1, 'The Jewel of Seven Stars', 'Horror', 'An Egyptologist, attempting to raise from the dead the mummy of Tera, an ancient Egyptian queen, finds a fabulous gem and is stricken senseless by an unknown force. Amid bloody and eerie scenes, his daughter is possessed by Tera''s soul, and her fate depends upon bringing Tera''s mummified body to life.', 2001, 3, '../images/The Jewel of Seven Stars.jpg', 'Wildside Press', 5, 304, 3),
(1590860624, 18, 'Without Fail', 'Crime', 'Skilled, cautious, and anonymous, Jack Reacher is perfect for the job: to assassinate the vice president of the United States. Theoretically, of course. A female Secret Service agent wants Reacher to find the holes in her system, and fast - because a covert group already has the vice president in their sights. They''ve planned well. There''s just one thing they didn''t plan on: Reacher.', 2002, 3, '../images/Without Fail.jpg', 'Brilliance Audio', 5, 144, 3),
(1847022960, 1, 'The Lady of the Shroud', 'Fiction', '1909. Bram Stoker wrote numerous novels, short stories, essays, and lectures, but Dracula is by far his most famous work. Stoker coined the term undead, and his interpretation of vampire folklore continues to this day to shape the portrayals of legendary monsters. Contents: From The Journal of Occultism; The Will of Roger Melton; Vissarion; The Coming of the Lady; Under the Flagstaff; A Ritual at Midnight; The Pursuit in the Forest; The Empire of the Air; The Flashing of the Handjar; and Balka. See other titles by this author available from Kessinger Publishing.', 2006, 3, '../images/The Lady of the Shroud.jpg', 'Echo Library ', 5, 228, 3),
(1847022987, 1, 'The Man', 'Horror', 'Think straight-up horror was Bram Stoker''s only gig? Think again. In The Man, the renowned author of Dracula delves into lush Gothic romance. This tale brings the mystery and intrigue that still delights readers of Dracula into the realm of romance, and will disappoint neither Stoker enthusiasts nor fans of the romantic genre.', 2006, 4, '../images/The Man.jpg', 'Echo Library', 4, 204, 4),
(1857230213, 4, 'The Garden of Rama ', 'Scifi', 'In the year 2130 a mysterious spaceship, Rama, arrived in the solar system. It was huge - big enough to contain a city and a sea - and empty, apparently abandoned. By the time Rama departed for its next, unknown, destination many wonders had been uncovered, but few mysteries solved. Only one thing was clear: everything the enigmatic builders of Rama did, they did in threes.\r\n\r\nEighty years later the second alien craft arrived in the solar system. This time, Earth had been waiting. But all the years of preparation were not enough to unlock the Raman enigma.\r\n\r\nNow Rama II is on its way out of the solar system. Aboard it are three humans, two men and a woman, left behind when the expedition departed. Ahead of them lies the unknown, a voyage no human has ever experienced. And at the end of it - and who could tell how many years away that might be? - may lie the truth about Rama... ', 1993, 4, '../images/The Garden of Rama.jpg', 'Orbit', 5, 608, 4);
INSERT INTO `book_details` (`ISBN`, `authorid`, `bookname`, `genre`, `des`, `yop`, `rating`, `photo`, `publisher`, `stock`, `pages`, `adminrating`) VALUES
(1857987632, 4, 'The City and the Stars', 'Scifi', 'Clarke''s masterful evocation of the far future of humanity, considered his finest novel.', 2001, 4, '../images/The City and the Stars.jpg', 'Gollancz', 5, 254, 4),
(1905177356, 3, 'Testing Treatments: Better Research For Better Healthcare', 'Scifi', 'The second edition of Testing Treatments has been extensively revised and updated with a thought-provoking chapter on screening, explaining why early diagnosis is not always better. Other new chapters explore how over-regulation of research can work against the best interests of patients, and how robust evidence from research can be drawn together to shape the practice of healthcare in ways that allow treatment decisions to be reached jointly by patients and clinicians.', 2010, 3, '../images/Testing Treatments.jpg', 'Pinter & Martin Ltd', 5, 116, 3),
(1911214330, 15, 'Nutshell', 'Fiction', 'Trudy has betrayed her husband, John. She''s still in the marital home – a dilapidated, priceless London townhouse – but not with John. Instead, she''s with his brother, the profoundly banal Claude, and the two of them have a plan. But there is a witness to their plot: the inquisitive, nine-month-old resident of Trudy''s womb.\r\n\r\nTold from a perspective unlike any other, Nutshell is a classic tale of murder and deceit from one of the world’s master storytellers. ', 2016, 4, '../images/Nutshell.jpg', 'Jonathan Cape', 5, 208, 4),
(4321678933, 17, 'A Dance with Dragons', 'Fantasy', 'In the aftermath of a colossal battle, the future of the Seven Kingdoms hangs in the balance — beset by newly emerging threats from every direction. In the east, Daenerys Targaryen, the last scion of House Targaryen, rules with her three dragons as queen of a city built on dust and death. But Daenerys has thousands of enemies, and many have set out to find her. As they gather, one young man embarks upon his own quest for the queen, with an entirely different goal in mind.\r\n\r\nFleeing from Westeros with a price on his head, Tyrion Lannister, too, is making his way to Daenerys. But his newest allies in this quest are not the rag-tag band they seem, and at their heart lies one who could undo Daenerys''s claim to Westeros forever.\r\n\r\nMeanwhile, to the north lies the mammoth Wall of ice and stone — a structure only as strong as those guarding it. There, Jon Snow, 998th Lord Commander of the Night''s Watch, will face his greatest challenge. For he has powerful foes not only within the Watch but also beyond, in the land of the creatures of ice.\r\n\r\nFrom all corners, bitter conflicts reignite, intimate betrayals are perpetrated, and a grand cast of outlaws and priests, soldiers and skinchangers, nobles and slaves, will face seemingly insurmountable obstacles. Some will fail, others will grow in the strength of darkness. But in a time of rising restlessness, the tides of destiny and politics will lead inevitably to the greatest dance of all.\r\n', 2011, 4, '../images/A Dance with Dragons.jpg', 'Bantam', 5, 1125, 4),
(8129115301, 5, '2 States: The Story of My Marriage', 'Fiction', 'Love marriages around the world are simple: Boy loves girl. Girl loves boy. They get married. In India, there are a few more steps: Boy loves Girl. Girl loves Boy. Girl''s family has to love boy. Boy''s family has to love girl. Girl''s Family has to love Boy''s Family. Boy''s family has to love girl''s family. Girl and Boy still love each other. They get married. Welcome to 2 States, a story about Krish and Ananya. They are from two different states of India, deeply in love and want to get married. Of course, their parents don t agrees. To convert their love story into a love marriage, the couple have a tough battle in front of them. For it is easy to fight and rebel, but it is much harder to convince. Will they make it? From the author of blockbusters Five Point Someone, One Night @ the Call Center and The 3 Mistakes of My Life, comes another witty tale about inter-community marriages in modern india.', 2009, 4, '../images/2 States The Story of My Marriage.jpg', 'Rupa and Co', 5, 269, 4),
(8129120216, 5, 'What Young India Wants', 'Fiction', 'In his latest book, What Young India Wants, Chetan Bhagat asks hard questions, demands answers and presents solutions for a better, more prosperous India.\r\n\r\nWhy do our students regularly commit suicide?\r\nWhy is there so much corruption in India?\r\nCant our political parties ever work together?\r\nDoes our vote make any difference at all?\r\nWe love our India, but shouldnt some things be different?\r\nAll of us have asked these questions at some time or the other. So does Chetan Bhagat, Indias most loved writer, in What Young India Wants, his first book of non-fiction.\r\n\r\nWhat Young India Wants is based on Chetan Bhagats vast experience as a very successful writer and motivational speaker. In clear, simple prose, and with great insight, he analyses some of the complex issues facing modern India, offers solutions and invites discussion on them. And, at the end, he asks this important question: Unless we are all in agreement on what it is going to take to make our country better, how will things ever change? Non-fiction If you want to understand contemporary India, the problems that face it, and want to be a part of the solution, What Young India Wants is the book for you.', 2012, 3, '../images/What Young India Wants.jpg', 'Rupa Publications', 5, 181, 3),
(8129135728, 5, 'Half Girlfriend', 'Fiction', 'HALF GIRLFRIEND (HINDI) Once upon a time, there was a Bihari boy called Madhav. He fell in love with a girl from Delhi called Riya. Madhav didn''t speak English well. Riya did. Madhav wanted a relationship. Riya didn''t. Riya just wanted friendship. Madhav didn''t. Riya suggested a compromise. She agreed to be his half girlfriend. From the author of the blockbuster novels Five Point Someone, One Night @ the Call Center, The 3 Mistakes of My Life, 2 States and Revolution 2020 comes a simple and beautiful love story that will touch your heart and inspire you to chase your dreams. ', 2014, 3, '../images/Half Girlfriend.jpg', 'Rupa Publications', 5, 260, 3),
(9780976604853, 1, 'The Snake''s Pass', 'Fiction', 'Arthur Severn, a young Englishman on holiday in the west of Ireland, is forced by a storm to stop for the night in a mysterious village, where he hears the legend of "The Snake''s Pass." Long ago, it is said, St. Patrick battled the King of the Snakes, who hid his crown of gold and jewels in the hills near the village. But it is not only legend that haunts the town. The figure of the demonic money-lender Black Murdock looms over the village, as he searches for the lost treasure while manipulating the townsfolk to his own evil ends. Even more threatening than Murdock is the shifting bog, personified as a baneful "carpet of death," which will swallow up anything -- and anyone -- in its path. Art and his friend Dick will brave the dangers of the bog to seek out the treasure, but the sinister machinations of Murdock will lead to a deadly conclusion! Featuring a slow accumulation of terror worthy of Le Fanu, The Snake''s Pass was Bram Stoker''s first novel. A clear precursor to Dracula, The Snake''s Pass was the only of Stoker''s novels set in his native Ireland. This edition follows the text of the first edition published at New York in 1890.', 2006, 4, '../images/The Snake''s Pass.jpg', 'Valancourt Books', 5, 224, 4),
(9781780660264, 3, 'Irrationality: the enemy within', 'Fiction', 'New, 21st anniversary edition, with a new foreword by Ben Goldacre, author of Bad Science and Bad Pharma, and an afterword by James Ball, covering developments in our understanding of irrationality over the last two decades.\r\n\r\nWhy do doctors, army generals, high-ranking government officials and other people in positions of power make bad decisions that cause harm to others? Why do prizes serve no useful function? Why are punishments so ineffective? Why is interviewing such an unsatisfactory method of selection?\r\n\r\nIrrationality is a challenging and thought-provoking book that draws on statistical concepts, probability theory and a mass of intriguing research to expose the failings of human reasoning, judgement and intuition. The author explores the inconsistencies of human behaviour, and discovers why even the experts find it so hard to make rational and unbiased decisions.\r\n\r\nWritten with clarity and occasional flashes of wry humour, this classic volume is just as relevant today as when it was first written twenty-one years ago.', 2013, 4, '../images/Irrationality the enemy within.jpg', 'Pinter and Martin', 5, 326, 4),
(9788129113726, 5, 'The 3 Mistakes of My Life', 'Fiction', 'In late-2000, a young boy in Ahmedabad called Govind dreamt of having a business. To accomodate his friends Ish and Omi''s passion, they open a cricket shop. Govind''s wants to make money and thinks big. Ish is all about nurturing Ali, the batsman with a rare gift. Omi knows his limited capabiltiies and just wants to be with his friends. However, nothing comes easy in a turbulent city. To realize their goals, they will have to face it all - religious politics, earthquakes, riots, unacceptable love and above all, their own mistakes. Will they make it? Can an individual''s dreams overcome the nightmares offered by real life? Can we succeed despite a few mistakes?', 2008, 3, '../images/The 3 Mistakes of My Life.jpg', 'rupa and co', 5, 258, 3);

--
-- Triggers `book_details`
--
DELIMITER $$
CREATE TRIGGER `addcopy` AFTER INSERT ON `book_details` FOR EACH ROW insert into book_copies(ISBN,acn1,acn2,acn3,acn4,acn5) values(new.ISBN,new.ISBN*10+1,new.ISBN*10+2,new.ISBN*10+3,new.ISBN*10+4,new.ISBN*10+5)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `issue_register`
--

CREATE TABLE `issue_register` (
  `id` int(10) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `ACN` bigint(21) NOT NULL,
  `uid` int(5) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_register`
--

INSERT INTO `issue_register` (`id`, `ISBN`, `ACN`, `uid`, `issue_date`, `return_date`) VALUES
(27, 6472613, 64726131, 2, '2016-10-02', '2016-10-12'),
(28, 385339089, 3853390891, 2, '2016-10-02', '2016-10-10'),
(29, 1847022987, 18470229871, 2, '2016-10-02', '2016-10-06'),
(30, 55357342, 553573421, 2, '2016-10-02', '2016-10-12'),
(31, 515128635, 5151286351, 2, '2016-10-02', '2016-10-11'),
(32, 440241022, 4402410221, 1, '2016-10-02', '2016-10-12'),
(34, 440241022, 4402410222, 7, '2016-10-02', '2016-10-11'),
(37, 440241022, 4402410224, 5, '2016-10-02', '2016-10-18'),
(38, 440241022, 4402410225, 3, '2016-10-02', '2016-10-19'),
(40, 440241022, 4402410223, 6, '2016-10-07', '2016-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(5) NOT NULL,
  `uname` varchar(25) DEFAULT NULL,
  `pword` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `uname`, `pword`) VALUES
(1, 'uk29', 'Nvidia@8500'),
(2, 'adk32', 'Nvidia@8500'),
(3, 'hk30', 'Nvidia@8500'),
(5, 'kk28', 'Nvidia@8500'),
(6, 'km37', 'Nvidia@8500'),
(7, 'sm35', 'Nvidia@8500'),
(8, 'mk31', 'Nvidia@8500');

-- --------------------------------------------------------

--
-- Table structure for table `review_log`
--

CREATE TABLE `review_log` (
  `id` int(10) NOT NULL,
  `ISBN` int(20) NOT NULL,
  `uid` int(5) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '1',
  `comment` varchar(1000) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_log`
--

INSERT INTO `review_log` (`id`, `ISBN`, `uid`, `rating`, `comment`, `date`) VALUES
(23, 440241022, 6, 3, 'Good mystery-crime novel with lots of fast-paced action and even a bit of romance.', '2016-10-02'),
(24, 440241022, 5, 5, 'I picked this up because I needed something to read. I wasnâ€™t impressed with the first several pages because I had a difficult time sorting out who was speaking, but as I got into the book, I began to like the main character, Jack Reacher. I was hooked. The back and forth got me to recall my obsession during college forays into used book stores hunting for early Mickey Spillane novels.', '2016-10-02'),
(29, 55357342, 2, 5, 'Stop killing everyone!!!!', '2016-10-02'),
(35, 440241022, 7, 1, 'Its boring as heck and life is too short.', '2016-10-02'),
(37, 55357342, 1, 4, 'This book is brutal.\nThis book is cruel .\nThis book holds no punches .\nIf you are looking for a fairy tale story where the prince meets the princess and they live happily ever after? NOT HAPPENING IN THIS BOOK.', '2016-10-02'),
(38, 55357342, 3, 5, 'This book is heart-wrenching, and not just because this book contains the Red Wedding, but because this book leaves you with a sense of hopelessness. Many of these characters with good hearts and souls have such terrible things happen to them, while liars and killers prosper.', '2016-10-02'),
(39, 440241022, 3, 2, 'Overrated!', '2016-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` int(10) NOT NULL,
  `ISBN` int(20) NOT NULL,
  `ACN` bigint(21) NOT NULL,
  `uid` int(5) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `returned_date` date NOT NULL,
  `fee` int(11) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`id`, `ISBN`, `ACN`, `uid`, `issue_date`, `return_date`, `returned_date`, `fee`, `fine`) VALUES
(38, 440241022, 4402410224, 5, '2016-10-02', '1970-01-01', '2016-10-02', 85380, 170760),
(39, 440241022, 4402410223, 3, '2016-10-02', '2016-10-05', '2016-10-02', 15, 0),
(40, 440241022, 4402410221, 2, '2016-10-02', '2016-10-04', '2016-10-02', 10, 0),
(41, 440241022, 4402410222, 1, '2016-10-02', '2016-10-19', '2016-10-02', 85, 0),
(42, 440241022, 4402410224, 5, '2016-10-02', '2016-10-19', '2016-10-02', 85, 0),
(43, 440241022, 4402410221, 7, '2016-10-02', '2016-10-12', '2016-10-02', 50, 0),
(44, 440241022, 4402410225, 6, '2016-10-02', '2016-10-18', '2016-10-02', 80, 0),
(45, 440241022, 4402410222, 7, '2016-10-02', '1970-01-01', '2016-10-02', 85380, 170760),
(46, 440241022, 4402410223, 6, '2016-10-02', '1970-01-01', '2016-10-02', 85380, 170760),
(47, 593065700, 5930657001, 8, '2016-10-02', '2016-10-05', '2016-10-07', 15, 20),
(48, 440241022, 4402410223, 6, '2016-10-02', '2016-11-02', '2016-10-07', 155, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(5) NOT NULL,
  `uname` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `pword` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `contact` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `fullname` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `uname`, `pword`, `email`, `contact`, `fullname`, `address`, `image`) VALUES
(1, 'uk29', 'Nvidia@8500', 'khanumair.79@gmail.com', '8789858486', 'Umair Khan', 'Azad Nagar', NULL),
(2, 'adk32', 'Nvidia@8500', 'adityakuchekar@gmail.com', '9478963632', 'Aditya Kuchekar', 'Mulund', 'IMG-20160821-WA0056.jpg'),
(3, 'hk30', 'Nvidia@8500', 'huzi.kothari@gmail.com', '9822564547', 'Huzaifa Kothari', 'Marol', 'IMG-20160405-WA0002.jpg'),
(5, 'kk28', 'Nvidia@8500', 'kaulkanishk96@gmail.com', '8789858486', 'Kanishk Kaul', 'Kandivali', 'IMG-20160821-WA0041.jpg'),
(6, 'km37', 'Nvidia@8500', 'kmodi47@gmail.com', '8785828362', 'Krish Modi', 'Amboli', 'IMG-20160821-WA0023.jpg'),
(7, 'sm35', 'Nvidia@8500', 'shubh96@gmail.com', '8754213669', 'Shubham Mahajan', 'S.P.C.E. Hostel', 'IMG_20160101_180805453.jpg'),
(8, 'mk31', 'Nvidia@8500', 'mehulkothari2@gmail.com', '7475251436', 'Mehul Kothari', 'Byculla', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_details`
--
ALTER TABLE `author_details`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `book_copies`
--
ALTER TABLE `book_copies`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `issue_register`
--
ALTER TABLE `issue_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `review_log`
--
ALTER TABLE `review_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `author_details`
--
ALTER TABLE `author_details`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `issue_register`
--
ALTER TABLE `issue_register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `review_log`
--
ALTER TABLE `review_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
