-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 11:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vital care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Vidhi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `content`) VALUES
(1, 'Migraine', 'Dr Bhavi Mody', 'What is Migraine?\r\n\r\nThere are 20 million migraine headaches happening in a day and 3 out of 4 people who suffer from migraine are women. Stress playing a major contributor. More than half of migraines in women occur right before, during, or after a woman hasher period. This often is called â€œmenstrual migraineâ€. 4 out of 5 migraine patients have a family history of migraine. Migraines occur in children about equally until puberty when migraines become more common in girls.Women who use acute pain-relief medicine more than two or three times a week or more than 10 days out of the month can set off a cycle called rebound.\r\n\r\nAs each dose of medicine wears Off the pain comes back with more intensity. These are called Rebound Headaches. Homeopathy has a sweet answer to these Headaches. It addresses the Psycho-somatic pathways hence gives long lasting relief. Holistic approach with Homeopathic medicines, stress management, Trigger management gives long lasting recovery than temporary results. '),
(2, 'No More Cramps: Treat PMS Naturally', 'Dr Bhavi Mody', ' Abdominal cramps, mood swings, back pain, bloating and a puffy face â€“ sound familiar? For almost every women these are just some of the PMS signs of their approaching menstrual cycle. And the minute they get through one month, they can be sure the next month will bring it all back once again! Sounds exhausting, right?\r\n\r\nCanâ€™t sleep? PMS affects more than just cramps!\r\n\r\nPMS or pre-menstrual syndrome can last for 5 to 10 days before the menstrual cycle and tend to stop once the cycle starts. Although this is a very common condition, affecting over 80% of menstruating women, the degree to which it could affect different women may vary. Some may just experience a light onset of cramps during the first couple of days, while for some, it may feel like a complete physical and emotional attack. Letâ€™s look at some of the common symptoms of PMS:\r\n\r\nAnxiety and irritability\r\nEmotional outbursts\r\nMood swings\r\nMuscle and joint pain\r\nHeadaches\r\nAbdominal cramps and bloating\r\nFood cravings\r\nDifficulties sleeping\r\nSocial withdrawal\r\nHeadache\r\nAcne\r\nFatigue\r\nBreast tenderness\r\nNow although not everyone receives the whole set of symptoms every month, even 3 or 4 of them at a time can have you refusing to get out of bed.Some women seem to receive maximum effects of PMS that can take a massive toll on their overall health for almost a week every month. While there is no exact cause for this condition, there are certain factors that can increase your risk for it. Some of these include:\r\nFamily history\r\nHormonal imbalance\r\nHistory of depression\r\nDo I have to suffer through it every month?And here comes the great news, no, you donâ€™t need to suffer through these each month. For most women, a stock of painkillers and a hot water bottle are the minimum requirements just to get through the week. However, these painkillers donâ€™t actually help the symptoms or your actual health. Hence, the problem keeps returning every month, not to mention the multiple side-effects of several over-the-counter medicines.Simple tips to ease PMS\r\nAlong with natural treatment, you can also try these simple tips to ease your symptoms during the week.\r\nEnsure you are drinking enough water and low-sugar fluids to lessen water retention and abdominal bloating.\r\nReduce caffeine and alcohol consumption at this time and try for nutritious food. Even though the binge craves may strike, try not to overload your body on carbs and sugar as they worsen physical and emotional symptoms.\r\nGet a full nightâ€™s sleep of 8 hours to give your body the rest it needs and reduce energy drain.\r\nA relaxed walk can also help ease symptoms by reducing bloating and stress levels.\r\nThus, even though it feels like the world is out to get you, PMS doesnâ€™t have to be a constant problem for you. Natural treatments and lifestyle changes can help control these symptoms and keep you healthy.For many women PMS is the dreaded enemy striking every month. '),
(3, 'Weight Loss- An Overrated Terminology?', 'Dr Bhavi Mody', 'Understand that it is important to lose weight not for that figure but to stay healthy. Do we clean our trash only because it makes the house look good? Do we send our kids to the School because all others are doing so? NO we do all this because it is IMPORTANT. You will make healthy choices stick to your exercise schedule and feel motivated only if you feel your weight loss is important.\r\nNow you are reading further because you feel itâ€™s important so letâ€™s figure out what to do next. Love and respect yourself the way you are. If you do not respect yourself no one else will. So raise your self-esteem chin high and work towards your goal.\r\nFind Buddies and seek support. A family support boosts your confidence and keeps you going\r\nSet smart doable goals. Set short term and long term goals. Reward yourself when you achieve your target. Long term goal should be overall health improvement. The scale may not move every time but you may feel good, feel lighter, happier your clothes may feel lose all this should motivate you.\r\nBe patient. We are talking of lifestyle modification and changes. This cannot happen in a day. Give yourself time. Look at each change minutely and positively. Do not give up if the scale does not move. Everything will not show on the scale. ROME WAS NOT BUILT IN A DAY and neither can u so keep patience and go on.\r\nEat right and not less is the mantra. Eat more healthy food. Small, divided meals. Relish your food. Feel the texture and the aroma. Love your food. Eat to nourish your body.\r\nVariety is the spice of life! Variate with exercise and food. Your body is a mean machine gets used to everything you do. Keep the body guessing so variate. Try new exercises. NO pain No gain.\r\nHydrate well. Flush the toxins out and what better than water the ELIXIR of life.\r\nSleep well and stress less. Your body repairs the wear and tear when you sleep. So sleep well. Sleep and wake up at the same time help the BIO-CLOCK of your body to set its rhythm. The happy hormones help you lose weight so keep smiling.\r\nHomeopathy supports you so go for it. Why homeopathy because itâ€™s safe, gentle, reliable effective and most importantly no side effects. Itâ€™s your friend in need that provides you with just that little support you need.HEALTHY WEIGHT-LOSS DOES HAPPEN AND LETâ€™S KEEP IT SIMPLE BABY. HAPPY LOSING!!!');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(1, 'Saloni Shah', 'salonishah147@gmail.com', 'Hello! Its me.'),
(2, 'Vidhi Poo', 'vidhimody6@gmail.com', 'Hi!');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `email`, `password`) VALUES
(1, 'Vidhi', 'vidhimody6@gmail.com', '123'),
(2, 'Dharmit Daftari', 'amamdaftari1997@gmail.com', '123456'),
(3, 'Vidhi1', 'vishnisobti@gmail.com', '111'),
(4, 'Bumble', 'vrushtimody98@gmail.com', '22'),
(5, 'as', 'vrushtimody6@gmail.com', '55'),
(6, 'kamal', 'mistrykamal8@gmail.com', 'kamal2790'),
(10, 'rorogers', 'rohanrocks.077@gmail.com', '123'),
(11, 'Bhavi', 'bhavidm@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `details` text NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `name`, `address`, `details`, `total`) VALUES
(1, 'crocin', 'xs<html>&nbsp;</html>scsc<html>&nbsp;</html>22', 'Pills&nbsp;x&nbsp;6<br><br><br>CCCC&nbsp;x&nbsp;2<br><br><br>', '520'),
(2, 'Vidhi Mody', 'A/201 Shanti Towers, Tamil Sangham Road<html>&nbsp;</html>Sion East, Mumbai<html>&nbsp;</html>400022', 'Pills&nbsp;x&nbsp;1<br>CCCC&nbsp;x&nbsp;1<br><br><br>', '350'),
(3, 'vrudhi_mody', 'cs<html>&nbsp;</html>fcef<html>&nbsp;</html>400022', 'CCCC&nbsp;x&nbsp;1<br><br><br>', '320'),
(4, 'ro', 'cgf<html>&nbsp;</html>dxf<html>&nbsp;</html>400022', 'CCCC&nbsp;x&nbsp;10<br><br><br>', '500'),
(5, 'Abc', 'def<html>&nbsp;</html>ghi<html>&nbsp;</html>22', 'CCCC&nbsp;x&nbsp;1<br><br><br>', '320'),
(6, 'Bhavi Mody', 'A/201 Shanti Towers, Tamil Sangham Road<html>&nbsp;</html>Sion East, Mumbai<html>&nbsp;</html>400022', 'ARNICA MONTANA PILLS&nbsp;x&nbsp;1<br><br><br>', '720');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(16) NOT NULL,
  `details` text NOT NULL,
  `category` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `details`, `category`) VALUES
(1, 'OPTIMUM NUTRITION Instantized BCAA Capsules', '1500', 'BCAA 1000 Caps contains a potent balance of Branched Chain Amino Acids which are building blocks of muscle mass and size. Metabolized directly in the muscle, BCAAs, may improve nitrogen retention by sparing other amino acid groups for repair and rebuilding.\r\n\r\nExpiry Date: N/A', 'HEALTH & FITNESS'),
(2, 'OPTIMUM NUTRITION ESSENTIAL AMINO ENERGY Anytime Energy Powder with Amino Acids', '1165', 'Easy to Mix Anytime Energy Powder with Amino Acids.\r\nAMINO BLEND â€“ a perfectly blended mix of amino acids to aid in muscle recovery*\r\nENERGY BLEND â€“ With 100MG of caffeine coming from green tea and/or green coffee extracts to supply you with a boost of energy to help you get through the day or a grueling workout*\r\nMENTAL FOCUS â€“ donâ€™t allow the day to get the best of you, the unique formula in ESSENTIAL AMINO. ENERGY helps provide you with the mental focus you need*\r\nANY-TIME FORMULA â€“ this unique formula is perfect for any time of the day such as helping you get energized and focused in the morning, helping to stay focused and productive in the afternoon, or even supporting your energy levels and focus in the gym*\r\n\r\nExpiry Date: N/A', 'HEALTH & FITNESS'),
(3, 'AYURVEDIC VITAMIN C SKIN CARE SERUM', '849', 'Natural Vibes Ayurvedic Vitamin C serum is a proprietary blend that will help you fight multiple signs of ageing and maintain a healthy, youthful complexion much longer into the future. Made with natural sources of Vitamin C such as Peach, Amla, Lemon, Orange, Grape Seed and Aloe Vera, this serum will prevent your skin from oxidative damage and reduce premature signs of ageing such as fine lines, wrinkles, acne, blemishes, pigmentation and dark spots. It will further promote skin lightening and firming leaving you with a toned, well-nourished skin. Our Vitamin C serum blend will help you reap the healing benefits of aromatherapy. Guess what? It is absolutely non sticky. We promise you wonâ€™t feel a thing.\r\n\r\nExpiry Date: Best Before 12 months of Manufacture', 'HEALTH & FITNESS'),
(4, 'BEAUTY FLUID AYURVEDIC NIGHT SERUM', '2395', 'Prescribed in Ayurveda for glowing complexion and even skin tone. This unique blend of oils and herbs is formulated to help skin look young and healthy. In Ayurveda, rare pure Saffron helps illuminate the complexion. Extracts of Indian Madder and Banyan tree help smooth fine lines and repair early signs of ageing. Sandalwood, Vetiver and Lotus have a cooling and cleansing effect while clearing blemishes. Liquorice, an antiseptic, protects against bacterial and fungal infections and also helps improve skin texture. An essential night beauty treatment.\r\nBest Before 18 months from manufacture.', 'AYURVEDA'),
(5, 'PARK AVENUE LUXURY GROOMING COLLECTION KIT ', '685', 'The Kit addresses all your grooming needs and also makes an ideal gift for all occasions. Add the edge to your personality with the perfect shave, fresh look and masculine fragrances from Park Avenue Grooming Kits.', 'PERSONAL CARE'),
(6, 'LOREAL PARIS WHITE PERFECT CLINICAL LOTION', '995', 'After years of advanced research, the LOreal laboratories have developed White Perfect Clinical New Skin Essence Lotion, its most concentrated whitening essence water to activate skin regeneration, to help remove spots and reveal a new fair skin. Soft and rich, the White Perfect Clinical Essence Lotion is instantly absorbed and gives an immediate sensation of comfort. Refines smooth skin texture, stimulates skin renewal and helps remove spots. Skin immediately looks brighter and more refined with incredible radiance. Day after day skin quality gets better, fairer and more radiant.', 'PERSONAL CARE'),
(7, 'ARNICA MONTANA PILLS', '420', 'Indicated for Bruises, Boils, Jet lag. Arnica montana is a homeopathic remedy commonly used for bruises and muscle soreness. Its actually made from a plant that has been used for centuries in folk medicine to treat the effects of accidents and injuries. The name refers to the genus and species of the yellow flowering plant, which is endemic to the mountains of Central Europe, commonly called Leopards Bane or Mountain Daisy. The homeopathic remedy is made from this plant. ', 'HOMEOPATHY'),
(8, 'ALLIUM CEPA PILLS', '420', 'Indicated for Head cold, Colds, Cough, Hay fever, Headache, Hoarseness. Allium cepa is a homeopathic remedy often used to treat head colds, hay fever, coughs, headaches and hoarseness. Other indications for its use include a runny nose with frequent sneezing, profuse discharge from the nose often irritating to the nose and lip, tearing of the eyes of a bland nature, and colds that extend to the chest with coughing. Worse in a warm room and in the evening - better in open air. This homeopathic remedy is made from the bulb of red onion. ', 'HOMEOPATHY');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `pid` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
