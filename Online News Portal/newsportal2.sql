-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 10:38 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsportal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'international'),
(2, 'bangladesh'),
(3, 'sports'),
(4, 'life style ');

-- --------------------------------------------------------

--
-- Table structure for table `commenter`
--

CREATE TABLE `commenter` (
  `com_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commenter`
--

INSERT INTO `commenter` (`com_id`, `user_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 1),
(6, 3),
(7, 3),
(8, 3),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `details` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `time_date`, `details`) VALUES
(1, '2017-09-19 21:35:06', 'nice'),
(2, '2017-09-19 21:35:16', 'wow'),
(3, '2017-09-19 21:36:08', 'Regular repairs and maintenance has become as daily a habit as commuting'),
(4, '2017-09-19 21:36:43', 'DSCC Mayor Khokon reiterated that repair all the damaged roads will be repaired as monsoon ends.\r\nFor DNCC, Chief Executive Officer Mohammad Mesbaul Islam denied allegations of low quality constructio'),
(5, '2017-09-20 03:08:56', ' a passenger has to pay around Tk330 for a UberX ride from Banani 11 to the airport now. Under the new fare structure, the same passenger has to pay around Tk290 for a UberX ride and Tk370 for the sam'),
(6, '2017-09-20 05:03:45', 'â€œWe have employed 250 workers for the supervision and maintenance of the road for the next 10 years. â€œThey will have Wi-Fi access and walkie-talkies so they can perform their duties without any tr'),
(7, '2017-09-20 05:04:53', 'Real Madrid striker Cristiano Ronaldo will return to action against Real Betis on Wednesday after serving a five-match suspension, as the champions look to keep the pressure on La Liga leaders Barcelona.\r\nRonaldo was sent off during the Spanish Super Cup win over Barcelona on Aug. 13 and banned for five matches after pushing the referee, meaning he is yet to feature in the league this season.'),
(8, '2017-09-20 05:08:13', 'â€œWe have employed 250 workers for the supervision and maintenance of the road for the next 10 years. â€œThey will have Wi-Fi access and walkie-talkies so they can perform their duties without any trouble,â€ he told the Dhaka Tribune. Security is also a major part of the project, he added. â€œThe total stretch of the road will be monitored via 350 CCTV cameras that provide feeds to a control room and a mother control room,â€ he said.'),
(9, '2017-09-20 07:08:37', 'The total stretch of the road will be monitored via 350 CCTV cameras that provide feeds to a control room and a mother control room,â€ he said.');

-- --------------------------------------------------------

--
-- Table structure for table `newspost`
--

CREATE TABLE `newspost` (
  `post_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` longtext,
  `image` varchar(50) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approved` varchar(25) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newspost`
--

INSERT INTO `newspost` (`post_id`, `title`, `content`, `image`, `time_date`, `approved`) VALUES
(2, 'Rohingya refugees wish to return home', '<p>He said he has been \"sleeping well\" in Bangladesh even though it was as a refugee. \"We\'ll go back if they give us citizenship.\"</p>\r\n<p>Rohingya Muslims make up 40 percent of the population in Rakhine where the Myanmar army responding to insurgent attacks have been launching a violent \'clearance operation\'.</p>\r\n<p>Over 400,000 have already fled to Bangladesh using border routes amid reports of indiscriminate shooting of civilians, mass rape, looting and arson.</p>\r\n<p>They joined another approximately 400,000 Rohingyas, who after fleeing past violence in Myanmar, have been living in squalid, overcrowded camps in Bangladesh\'s southeast district of Cox\'s Bazar.</p>', 'upload/f2ff7fda6f.jpg', '2017-09-19 20:51:47', 'yes'),
(3, 'PM: We expect no help from Trump', '<p>Bangladesh Prime Minister Sheikh Hasina said she spoke to US President Donald Trump on Monday about Rohingya Muslims flooding into her country from Myanmar, but she expects no help from him as he has made clear how he feels about refugees.<br />As Trump left an event he hosted at the United Nations on reforming the world body, Hasina said she stopped him for a few minutes.<br />&ldquo;He just asked how is Bangladesh? I said &lsquo;it&rsquo;s doing very well, but the only problem that we have is the refugees from Myanmar&rsquo;,&rdquo; Hasina told Reuters in an interview. &ldquo;But he didn&rsquo;t make any comment about refugees.&rdquo;</p>', 'upload/71778ba4f7.jpg', '2017-09-19 20:54:22', 'yes'),
(4, 'Russia unveils statue of AK-47 inventor Kalashniko', '<p>Russian officials and Orthodox priests on Tuesday unveiled a statue in Moscow of inventor Mikhail Kalashnikov, whose iconic AK-47 assault rifle has claimed countless lives worldwide.<br />A priest sprinkled holy water on the seven-metre tall statue of Kalashnikov gripping his deadly creation, which will now loom over motorists from a traffic island in one of the sprawling capital&rsquo;s central thoroughfares.<br />Culture minister Vladimir Medinsky praised the inventor and called the rifle &ndash; which has been reproduced an estimated 100 million times worldwide &ndash; a &ldquo;cultural brand for Russia.&rdquo;<br />Kalashnikov had &ldquo;the best traits of a Russian: an extraordinary natural gift, simplicity, integrity,&rdquo; Medinsky said.<br />Born in a Siberian village in 1919, Mikhail Kalashnikov died in December 2013 in Izhevsk, the capital of the Russian republic of Udmurtia, where he lived.<br />Kalashnikov came up with the idea of inventing a new automatic rifle that could work in all conditions after becoming disgruntled by the Soviet weaponry as he recovered from an injury during WWII.<br />Eventually that would lead to the creation of the AK-47 &ndash; short in Russian for Avtomat Kalashnikova 1947 (Kalashnikov Automatic Rifle 1947) &ndash; that would become the standard issue for the Soviet Union&rsquo;s vast armed forces.<br />Known for its simplicity, the gun became a symbol for independence struggles and leftist radicals around the world during the Cold War, finding its way onto the national flag of Mozambique and the banner of Lebanese Shias movement Hezbollah.<br />But Mikhail Kalashnikov never touched the fortunes from the sales of millions of the rifles that bear his name and used by the armies of over 80 countries. He stopped working only a year before his death, at the age of 93.<br />While his invention made Kalashnikov a household name around the globe, the man himself had a more nuanced view of his lethal creation.<br />Six months before his death he wrote to the head of the Russian Orthodox Church, expressing regret for his role in making the world&rsquo;s most commonly used rifle.<br />&ldquo;My spiritual pain is unbearable,&rdquo; he wrote in the letter which was later published in the Izvestia newspaper.<br />The erection of a monument to the gunmaker &ndash; who met personally with Russian President Vladimir Putin in 2013 &ndash; has raised eyebrows among some Muscovites.<br />But the move chimes with a surge of nationalist pride under Putin that has seen the Kremlin glorify the military achievements of the Soviet period while playing down the gross abuses.<br />The Kalashnikov factory that makes the rifles, in decline since the death of the inventor, has since been modernised, with most of its capital coming from private investors.<br />It has also been transformed by a PR campaign to improve its image in Russia and abroad, even opening a souvenir store in Moscow&rsquo;s main Sheremetyevo Airport.</p>', 'upload/cf27ec8816.jpg', '2017-09-19 20:56:02', 'yes'),
(5, 'Myanmar to halt military', '<p>UN Secretary-General Antonio Guterres on Tuesday urged Myanmar to halt its military campaign against Rohingya Muslims, just hours after Aung San Suu Kyi failed to quell an international outcry in a much-anticipated address.<br />Addressing the opening of the UN General Assembly, Guterres said he &ldquo;took note&rdquo; of Suu Kyi&rsquo;s pledge to abide by the recommendations of a report by former UN chief Kofi Annan that has advocated citizenship for the Rohingyas.<br />&ldquo;But let me be clear,&rdquo; Guterres said. &ldquo;The authorities in Myanmar must end the military operations, and allow unhindered humanitarian access.&rdquo;<br />More than 420,000 Rohingya have been forced to flee violence in Myanmar&rsquo;s northern Rakhine state in what the United Nations has described as &ldquo;ethnic cleansing.&rdquo;<br />&ldquo;We are all shocked by the dramatic escalation of sectarian tensions in Myanmar&rsquo;s Rakhine state,&rdquo; Guterres told world leaders.<br />In an interview earlier this week, Guterres described the address by Suu Kyi as &ldquo;a last chance&rdquo; to speak out and put in motion an end to the mass exodus.<br />The 1.1-million strong Rohingya have suffered years of discrimination in Myanmar, where they are denied citizenship even though many have longstanding roots in the country.<br />Myanmar&rsquo;s second Vice President, Henry van Thio, is to take the podium at the assembly on Wednesday after Suu Kyi decided against attending this year&rsquo;s world gathering.</p>', 'upload/f105fb36bf.jpg', '2017-09-19 21:04:05', 'yes'),
(6, 'BCB HP captain Shanto terms England tour successfu', '<p>The BCB High Performance Unit returned home on Monday following their two-week long tour of England.<br />The BCB HP Unit played eight matches, against different county second XI teams, among which the tourist won five and lost one.<br />The other two matches got washed off by rain.<br />Nazmul Hossain Shanto, who captained the BCB HP Unit in a few matches, said tours like these will help the national cricketers in the pipeline to be in the thick of action.<br />The side before travelling to England underwent a similar tour in Australia.<br />Also read: Exciting pacemen in Tigers pipeline, says BCB HP coach Ramanayake<br />&ldquo;The more we get to play in foreign condition, the better for us. Such experiences will always help us if are given opportunity to play in the national team. I hope the board will continue with camps similar to these. Being able to practise and score runs in conditions like England always gives you confidence and makes your job at home easy,&rdquo; Shanto told the media Tuesday.<br />Shanto believes the tour to England was a successful one.<br />&ldquo;We had different condition in Australia, it was hot there while in England it was totally the opposite, it was cold and windy. It was tough condition to be honest but we as a team had adapted to the condition well and got some wins,&rdquo; said Shanto, who has played one Test match for Bangladesh.</p>', 'upload/75a52f8081.jpg', '2017-09-19 21:04:04', 'yes'),
(7, 'Ronaldo returns as Madrid aim to pressure leaders ', '<p>Real Madrid striker Cristiano Ronaldo will return to action against Real Betis on Wednesday after serving a five-match suspension, as the champions look to keep the pressure on La Liga leaders Barcelona.<br />Ronaldo was sent off during the Spanish Super Cup win over Barcelona on Aug. 13 and banned for five matches after pushing the referee, meaning he is yet to feature in the league this season.<br />The Portuguese hitman struck twice in his only appearance since the incident, a comfortable 3-0 win over Apoel Nicosia in the Champions League last Wednesday.</p>', 'upload/2387dfd9cb.jpg', '2017-09-19 21:04:02', 'yes'),
(8, 'A â€˜biriyaniâ€™ wardrobe on a â€˜bhortaâ€™ budget', '<p>Whether your bonus came in late and you weren&rsquo;t able to splurge on an Eid outfit, or browsing through all the fabulous A/W/Eid fashion catalogues is giving you FOMO, but your wallet is saying &ldquo;no no&rdquo;, fear not. A few quick hacks can give your regular wardrobe a luxe update, to help you up your style game, not just for the festival season, but for every day.<br />Change the buttons<br />Taking a cue from the Button Masala designer Anuj Sharma, who wowed the crowds at FDCB&rsquo;s Khadi Festival in Dhaka last winter, changing one seemingly miniscule detail about your everyday clothes can really take them from &ldquo;discount&rdquo; to &ldquo;designer&rdquo;. Replace the regular buttons on your outfit with pearl or metal buttons, or upholster the regular buttons with printed fabric in a colour that pops, and watch your outfit take on a new dimension.<br />Border relations<br />You can completely transform a basic kameez or kurti by stitching on some colourful borders, available at any local button and lace store. Readymade &ldquo;paars&rdquo;, everything from Benarasi silk borders, to mirror-work, or crochet lace, you have plenty of options to choose from. Get a few rolls, mix, match and contrast, and add them to hems and cuffs, or even border your saris to give them a festive update.<br />Bling it up<br />Add life to a plain cotton print with a little zari. Put some sparkle on your monochrome kameez with some subtle sequins. The more courageous types can go to town with some rhinestones and a glue gun. If you&rsquo;re not the crafty type, fear not. Repurposing old stud earrings into creative brooches, and layering on costume jewellery with beads and pearls can add some shine and substance to an old buy.<br />Final note:<br />A clean well-ironed outfit, worn confidently with good shoes and impeccable grooming can sometimes look far more flattering and stylish than a splurge, so if you missed out on the shopping, don&rsquo;t fret. Just put on a smile and own it!</p>', 'upload/bdd594d4ea.jpg', '2017-09-19 21:04:01', 'yes'),
(9, 'Baliati Beats', '<p>With two Bangladeshis winning the prestigious Aga Khan Award for Architecture, four Bangladeshi women in the fashion and style industries making it to the hallowed pages of Vogue India, and 2016 being Tourism Year for the country, the Fashion Design Council of Bangladesh (FDCB) has once again shown forethought in their choice of theme for this year&rsquo;s Khadi Festival, to be held on December 9 and 10.</p>\r\n<p>&nbsp;</p>\r\n<p>Last year, the challenge presented to participating designers was to take inspiration from local crafts such as sheetol pati, shokher hari, shondesh, paper cutting and nakshi, for example. This year, posing as muse for the (larger) pool of participants is a list of nine heritage sites around the country. Over the next few weeks, we shall look at some of these sites and the designers drawing inspiration from them.</p>\r\n<p>This week, we start with the graceful columns and sublime facade of the Baliati zaminder-bari in Manikganj, and chat with the two creative minds who have selected this as their inspiration.</p>', 'upload/e087cfa0ea.jpg', '2017-09-19 21:03:59', 'yes'),
(10, 'A touch of tradition', '<p>Wedding season is knocking on the door and everyone has their demands for the special day. If you are looking for something differently traditional, apart from gold and diamonds, then visit 6 YARDS STORY&lsquo;s offical facebook page. Their wedding collection is full of contemporary designs in silver, brass, meenakari and pearl jewellery. You can find all the classic styles in choker, necklaces, earrings, nose-ring, bangles, and tiaras. They will also take orders for unique custom-made designs for brides.</p>', 'upload/2aea4717dd.jpg', '2017-09-19 21:03:57', 'yes'),
(11, 'Dhaka gets ready for Asia Cup Hockey', '<p>Dhaka is all set to host Asia&rsquo;s biggest hockey event, the Asia Cup, after a span of 32 years as the Asian Hockey Federation on Monday officially announced the world&rsquo;s largest two-wheeler manufacturer Hero MotoCorp as the title sponsor of the tournament&rsquo;s 10th edition, scheduled to be held in the middle of this October.<br />Bangladesh, who have been placed in a tough group along with India, Pakistan and Japan in Pool A, will begin their journey against Pakistan in the inaugural day of the tournament on October 11.<br />Also read: First Security Islami Bank new sponsor of Bangladesh hockey team<br />Malaysia, China, Korea and Oman make up Pool B.<br />The newly titled Hero Asia Cup, featuring eight top hockey countries from Asia, will conclude on October 22 with all the matches scheduled to be played in Dhaka&rsquo;s Maulana Bhasani National Hockey Stadium.<br />The champion will get direct entry to the World Cup, which is slated for Bhubaneswar, India in November, 2018.</p>', 'upload/acbffc009e.jpg', '2017-09-19 21:06:48', 'yes'),
(12, 'Uber also made marginal changes in the fare struct', '<p>Uber, the popular on-demand ride-sharing company, on Friday announced the launch of PREMIER, an in-app upscale ride option.<br />With this, riders will now be able to select and enjoy a &ldquo;plush ride every day,&ldquo; according to a press release.<br />According the release, Uber also made marginal changes in the fare structure for UberX and UberPREMIER rides.<br />For example, a passenger has to pay around Tk330 for a UberX ride from Banani 11 to the airport now. Under the new fare structure, the same passenger has to pay around Tk290 for a UberX ride and Tk370 for the same ride.</p>', 'upload/8bd5a266f0.jpg', '2017-09-20 04:59:15', 'yes'),
(13, 'Family claims DB picked up accused militant Anwar ', '<p>Anwar Hossain, one of the two suspected New JMB militants said to have been arrested on Friday from Dhaka, was in fact picked up by Detective Branch (DB) members from Savar in late July, his family and police say.<br />Anwar&rsquo;s family filed a general diary with Savar model police the day after he was taken away from his garage.<br />Sub-Inspector Rafiqul Islam, who investigated the complaint, confirmed the family that Anwar had been picked up by DB members.<br />On Saturday, Counter-Terrorism and Transnational Crime (CTTC) unit announced arresting two suspected members of New JMB from Nikunja in Khilkhet on Friday night with 30 detonators.<br />CTTC claimed the arrestees &ndash; Anwar and Nayeem Ahmed alias Anas alias Abu Hamza &ndash; were planning to carry out a car bomb attack.<br />The Dhaka Tribune attempted, on multiple occasions, to reach out to DB Joint Commissioner Abdul Baten and CTTC Additional Commissioner Monirul Islam over phone to get their comment on the matter. Neither of them answered the calls.<br />Sub-Inspector Rafiqul said he had learned that Anwar was in DB custody long before the announcement. He had advised Anwar&rsquo;s family to go to the DB office.<br />He had traced Anwar&rsquo;s phone to 23, Shaheed Captain Mansur Arli Sarani, Ward 38, Moghbazar in Dhaka. The DB office is situated at Minto Road, which is under old ward 38 and is now marked as Ward 19 under Dhaka South City Corporation.<br />Locals and family members said Anwar had been working at his car garage Anwar Workshop at Hemayetpur&rsquo;s Jadurchar for over 10 years. His younger brother Rejaul Kabir also works with him.Anwar Hossain, one of the two suspected New JMB militants said to have been arrested on Friday from Dhaka, was in fact picked up by Detective Branch (DB) members from Savar in late July, his family and police say.<br />Anwar&rsquo;s family filed a general diary with Savar model police the day after he was taken away from his garage.<br />Sub-Inspector Rafiqul Islam, who investigated the complaint, confirmed the family that Anwar had been picked up by DB members.<br />On Saturday, Counter-Terrorism and Transnational Crime (CTTC) unit announced arresting two suspected members of New JMB from Nikunja in Khilkhet on Friday night with 30 detonators.<br />CTTC claimed the arrestees &ndash; Anwar and Nayeem Ahmed alias Anas alias Abu Hamza &ndash; were planning to carry out a car bomb attack.<br />The Dhaka Tribune attempted, on multiple occasions, to reach out to DB Joint Commissioner Abdul Baten and CTTC Additional Commissioner Monirul Islam over phone to get their comment on the matter. Neither of them answered the calls.<br />Sub-Inspector Rafiqul said he had learned that Anwar was in DB custody long before the announcement. He had advised Anwar&rsquo;s family to go to the DB office.<br />He had traced Anwar&rsquo;s phone to 23, Shaheed Captain Mansur Arli Sarani, Ward 38, Moghbazar in Dhaka. The DB office is situated at Minto Road, which is under old ward 38 and is now marked as Ward 19 under Dhaka South City Corporation.<br />Locals and family members said Anwar had been working at his car garage Anwar Workshop at Hemayetpur&rsquo;s Jadurchar for over 10 years. His younger brother Rejaul Kabir also works with him.</p>', 'upload/ed14b8ebfa.jpg', '2017-09-20 04:58:45', 'yes'),
(14, 'School enrollment high but dropouts even higher', '<p>One in five children dropped out of school last year due to high levels of poverty, child marriage, social insecurity and marginalisation, experts have said.<br />Although data from Bangladesh Bureau of Educational Information and Statistics (BANBEIS) showed a 10% increase in the net enrollment rate for secondary and primary schools in the last ten years, it also pointed to an alarming dropout rate.<br />The rate of 19.2% recorded in 2016 was just a single percentage point lower than that of 2015.<br />The executive director of the Campaign for Popular Education (CAMPE), Rasheda K Chowdhury, said there were socio-economic reasons for children dropping out of school.<br />&ldquo;Although primary education is free and the textbooks are provided by the government, a large number of children from ultra poor areas &ndash; such as char areas, haor areas and the Hill Tracts &ndash; are barely enrolled in the public school system,&rdquo; she said.<br />&ldquo;Things like poor teaching methods, incompetent untrained teachers, lack of encouragement has caused children to not continue their schooling.<br />&ldquo;The problem is worse for indigenous children because even though the government has published textbooks in five indigenous languages, the teachers are not equipped to teach them in it. These children are simply not comfortable in a mainstream classroom and so their dropout rates are higher&rdquo;.<br />The government, however, claims steps are being taken to reduce the high level of dropouts.<br />Director General of Directorate of Primary Education (DPE), Dr Abu Hena Mostafa Kamal, said the national rate had fallen to 19.2% in 2016 from 47.2% in 2005.<br />&ldquo;This is progress,&rdquo; he said. &ldquo;The government has introduced stipend and stipulation to encourage school enrollment. The school feeding and take-home ration programmes have also played a pivotal role in eliminating the school dropout rate.&rdquo;<br />The government&rsquo;s statistics from BANBEIS show that in 2015, the national dropout rate in the secondary level was 40.29%, out of which 45.92% were girls and 33.72% were boys. That number slightly decreased last year with an overall dropout rate at of 38.30% with 42.19% being girls and 33.80% being boys.<br />&ldquo;Physical disability is one of the major reasons behind the existing dropout rate while in some parts of the country, poverty plays a big role too,&rdquo; said Dr Kamal.<br />The overall enrollment in secondary level in 2016 was 67.84%, out of which 73.10% were girls and 63.85% were boys.<br />Prof Md Elias Hossain, the director (secondary) of the Directorate of Secondary and Higher Secondary Education, said child marriage was the key reason for girls dropping out of the secondary level.<br />&ldquo;Most of the female students under class VIII and IX drop out from school because of child marriage,&rdquo; he said. &ldquo;A lot of them are forced to get married if they fail their exams.<br />&ldquo;If these child marriages can be prevented, the dropout rate would be reduced significantly.&rdquo;<br />DSHE Director Elias suggested that if the students who failed the PSC and JSC level examinations were allowed to take admission in the next level or class, and a recovery system was introduced to retake the previous examination, then the rate of school dropout might reduce significantly.<br />Rasheda K Chowdhury added that social insecurity for female students is a big reason for their higher percentage of dropout rate from secondary level.<br />&ldquo;There is also a gender preference still prevalent in many rural families where they actively choose to educate their male child and keep the girl child/children at home to do chores,&rdquo; she said.<br />The CAMPE Executive Director recommended special measures to provide support, supervision and academic backing to those who are at risk of dropping from both primary and secondary levels of education.</p>', 'upload/54f3867637.jpg', '2017-09-20 04:57:32', 'yes'),
(15, 'Bangladesh Zoos to exchange gharials in bid to boo', '<p>In the wake of rapid decline in the gharial population, an initiative has been taken to exchange captive gharials among Bangladesh&rsquo;s zoos, with the aim of increasing numbers of the critically endangered freshwater reptile.<br />&ldquo;There are a few captive gharials in the country&rsquo;s zoos, but there are no pairs of the species. That&rsquo;s why they&rsquo;re unable to breed,&rdquo; said ABM Sarowar Alam, principal gharial investigator of the International Union for Conservation of Nature (IUCN) Bangladesh, as quoted by UNB.<br />With support from the Bangladesh Forest Department, a male gharial from the National Zoo in Dhaka will be released in Rajshahi Zoo for the first time in Bangladesh on August 13, 2017, under a gharial exchange programme as there is no male Gharial there, Sarowar said.<br />In 2016, IUCN Bangladesh and the Bangladesh Forest Department jointly conducted a survey at Bangladesh National Zoo, Rajshahi Zoo, Rangpur Zoo and Bangabandhu Safari Park in Gazipur to ascertain the number and condition of captive gharials in the country.<br />The survey found that four adult males rescued from fishermen&rsquo;s nets between 1983 and 1997 are currently at the National Zoo and are in healthy condition, but there are no female gharials or any breeding facility.<br />Three adult females were found in Rajshahi Zoo. The gharial enclosure at the zoo is a circular one, with a small island in the centre. The lack of a gentle slope makes it difficult for the gharials to reach the island to bask.<br />Furthermore, four adult females of the species are kept in Rangpur Zoo, in an enclosure that is comparatively smaller than that of other zoos. The facilities for basking and nesting of gharials in the zoo were poor.<br />According to the survey, only one juvenile male of 115 cm was found in Bangabandhu Safari Park, Gazipur. The husbandry condition in the Safari park seemed to be very poor, and the gharial was kept in a small pond with more than a thousand freshwater turtles.<br />Sarowar Alam said the gharials would be exchanged between the National Zoo, Rajshahi Zoo, Rangpur Zoo and Bangabandhu Safari Park, so that they can make their pairs and facilitate breeding.<br />&ldquo;All the zoo authorities have agreed to do so. And we&rsquo;ve already prepared a breeding ground of gharials in Rajshahi Zoo,&rdquo; he said.<br />According to IUCN, there are only 200 Gharials in the wild across the world. It was declared a critically endangered species in Bangladesh in 2015.<br />&ldquo;We don&rsquo;t find any breeding pairs of gharial in nature in the country, but five to 10 juveniles are found in the Padma and Jamuna rivers every year, after they get caught in fishermen&rsquo;s nets,&rdquo; Sarowar said.<br />The gharial investigator said that if the Gharial exchange programme was successful, the engendered freshwater reptile would be released in some select gharial hotspots of the Padma and Jamuna rivers to increase its population.<br />Gharial (Gavialis gangeticus) is a unique crocodilian species characterised by its long and slender snout.<br />According to experts, gharials mostly live in large-bodied, deep and fast-flowing rivers, and primarily live on eating fish. They help distribute nutrients from the bottom of the riverbed to the surface of the water while balancing fish populations, helping maintain aquatic ecosystems.</p>', 'upload/9184f57acf.jpg', '2017-09-19 21:13:17', 'yes'),
(16, 'Vinyl World to conduct maintenance of Banani Railw', '<p>The government is set to award the beautification and maintenance work for the planned eight-lane Banani Railway overpass, which connects to the airport national highway, to Bangladeshi firm Vinyl World and Sign for the next 10 years, an official of the Road Transport and Bridges Ministry said . Vinyl World and Sign has previously conducted beautification work of the road from Jahangir gate to Kakoli intersection. It is alleged that Vinyl World and Sign firm have planted foreign trees and bonsai instead of local trees and flowers for beautification of the Banani Railway overpass to airport national highway. The Bangladeshi firm has already planted 100 bonsai on either side of the six kilometre road. A Road Transport and Bridges Ministry proposal to grant the beautification work for the overpass is to be placed before the Cabinet Committee on Economic Affairs at the cabinet division on Wednesday, presided over by Finance Minister AMA Muhith. The proposal, signed by secretary M.A.N Siddique, reads: &ldquo;VVIPs , VIPs, foreign citizens and locals are using this highway to go Hazrat Shahjalal International Airport, so it is necessary to beautify the six kilometre long Banani Railway overpass to the airport national highway . Also Read- Imported bonsai trees out, local trees to line Airport Road &ldquo;It is necessary to modify the 90&rsquo;s beautification of the aforementioned highway, which will enhanced the image of Bangladesh,&rdquo; the proposal reads . It adds that the government has no financial involvement in the beautification project, as it will be handled by a sponsor. The proposal also said that Vinyl World and Sign has submitted a proposal to procure LED display boards, digital displays, overhead boarding, and digit bill boards for a cost of Tk 99.38cr. In the international tender floated by the Roads, Highways and Bridges Ministry, only Vinyl World and Sign submitted a bid, which was reviewed and approved for 10 years by a seven member tender evaluation committee in September, 2016. CEO of Vinyl World and Sign Abaid Monsur told Dhaka Tribune: &ldquo;The project has an estimated to cost of around Tk140 crore, which may increase, and is expected to be complete by December this year instead of July.&rdquo; The private Vinyl World Group, under the supervision of the Roads and Highways Department, is financing the project and will also be in charge of the new road&rsquo;s maintenance work until November 2026, he said . &ldquo;We have employed 250 workers for the supervision and maintenance of the road for the next 10 years. &ldquo;They will have Wi-Fi access and walkie-talkies so they can perform their duties without any trouble,&rdquo; he told the Dhaka Tribune. Security is also a major part of the project, he added. &ldquo;The total stretch of the road will be monitored via 350 CCTV cameras that provide feeds to a control room and a mother control room,&rdquo; he said.</p>', 'upload/76649e2cfe.jpg', '2017-09-19 21:15:31', 'yes'),
(17, 'Padma Bridge cost likely to shoot up by Tk1400cr', '<p>he estimated cost of the much-hyped Padma Multipurpose Bridge Project is likely to see a rise for the third time as more lands have to be acquired for the completion of the project.<br />With the proposed additional cost of Tk1,400cr, the overall cost for the long-awaited bridge would be standing at Tk30,193.38cr, reports UNB.<br />A Planning Commission official preferring anonymity said the initial amount of Tk1,299cr, which was allocated for the acquisition of some 1,530 hectares of land in the original Development Project Proforma (DPP), has already been spent.<br />&ldquo;But, now there&rsquo;s a need to acquire some additional 1168 hectares of land in Munshiganj, Madaripur and Shariatpur districts for which additional Tk 1,400 crore is needed,&rdquo; the official added.<br />The project, when approved in 2007, was supposed to cost Tk10,162cr, but in 2011 it was revised upwards to Tk20,507cr.<br />The last and second revision of the Padma Bridge Project was approved by the Executive Committee of the National Economic Council (Ecnec) on January 5, 2016, with an estimated cost of Tk28,793.38cr assuming December 2018 as the completion deadline.</p>', 'upload/07b59cc88c.jpg', '2017-09-20 05:56:37', 'yes'),
(18, 'A tainted legacy', '<p>Aung San Suu Kyi&rsquo;s name was once synonymous with the struggle against oppression when she had been under house arrest for almost a decade during military rule in Myanmar.</p>\r\n<p>&nbsp;</p>\r\n<p>In accepting the Nobel Peace Prize, she called for &ldquo;a world free from the displaced, the homeless, and the hopeless.&rdquo;</p>\r\n<p>But she has missed perhaps her greatest opportunity to make good on those words as the leader of Myanmar&rsquo;s first civilian government after a half-century of military rule.</p>\r\n<p>Suu Kyi has watched as 270,000 minority Rohingya Muslims &mdash; one-quarter of their population &mdash; have fled Myanmar over the past two weeks, escaping a bloody military crackdown in which soldiers set fire to homes and shot civilians as they tried to escape, according to accounts published by human rights groups.</p>\r\n<p>Many have been crammed into muddy, overcrowded camps in neighbouring Bangladesh, whose authorities this week raised concerns that Myanmar&rsquo;s military was planting land mines along the border while civilians fled.</p>\r\n<p>Dozens have drowned in river crossings. In displacement camps inside Myanmar, Rohingya activists say the government has blocked delivery of food and humanitarian supplies.</p>\r\n<p>Suu Kyi&rsquo;s questionable stance</p>\r\n<p>As condemnations pour in from across the world, Suu Kyi has defended not the displaced Rohingya but the army, saying critics of the crackdown were being deceived by &ldquo;a huge iceberg of misinformation.&rdquo;</p>\r\n<p>The army calls its actions &ldquo;clearance operations&rdquo; aimed at Rohingya insurgents who attacked police on August 25, killing 12 officers.</p>\r\n<p>Reconciling an activist&rsquo;s ideals with the hard realities of governing is never easy, but rarely has an international icon fallen so fast as Suu Kyi.</p>', 'upload/b491ddf30b.gif', '2017-09-20 05:56:34', 'yes'),
(19, 'Dhaka roads: A post-rain disaster', '<p>When it rains in Dhaka, the threat of waterlogging is ever-present. Once the waters recede, the lifelines of the city &ndash; from narrow by-lanes to major roads &ndash; frequently fracture and the pitch begins to come off.<br />This year, the problem has been far more severe than the previous years, despite repeated pledges from city authorities to combat this nuisance once and for all.<br />No matter what part of the city someone lives in, be it under the Dhaka North City Corporation (DNCC) or Dhaka South City Corporation (DSCC), there is little to no chance of not complaining about the roads and the problems they cause &ndash; potholes, defaced pitch, and perennial maintenance &ndash; all resulting in sluggish traffic and incredible loss of time.<br />After the 2015 city corporation elections, Annisul Huq and Sayeed Khokon, both pledged Dhaka would be transformed into a &ldquo;smart city&rdquo; under their tenure.<br />Sayeed Khokon, mayor of Dhaka South, announced at the Digital World Conference 2016 in Dhaka that the city would be &ldquo;smart&rdquo; before 2017 calendars became obsolete.<br />Two years have passed and Mayor Khokon&rsquo;s deadline is closer than ever, but Dhaka roads are still littered with potholes.<br />The pain brought by the rain<br />The roads of Dhaka tend to cave in by the end of every monsoon. This monsoon was no different.<br />Subrata Mallik, a resident of Nurjahan Road in Mohammadpur, fumed over the aggravated conditions of the roads in Mohammadpur.<br />&ldquo;Every single year they talk about easing the life of commuters, and now look at the roads!&rdquo; he spat.<br />Subrata said: &ldquo;The smart city is a pipe dream for all the bluster and the fuss, the city corporation cannot even provide standard roads.&rdquo;<br />From Saat Masjid to Shia Masjid in Mohammadpur, the entire road is a debacle. The road from Mohammadpur bus stand to Rayerbazar is yet another mess. There are very few words which can sum up so efficiently, that a major road in a major city hub is in such poor condition.<br />After the July-August downpour, roads all over Mirpur, Kallyanpur, Nakhalpara, Shantinagar, Shahjadpur, Badda and Old Dhaka are in terrible condition.<br />Manholes, an urban pitfall<br />Unfinished manhole covers jeopardise pedestrians and passengers alike. Yet so many roads in the city have their covers either missing or half-finished.<br />The manhole covers are now around 5-6 inches lower than the roads, whereas the box culverts used for drainage are about 5-6 inches higher than the roads.<br />&ldquo;If you only take a look at Mirpur Road, one of the busiest roads of the city stretching from Nilkhet intersection to Mirpur Technical, you will see every problem a Dhaka road could have. Unfinished manhole covers and slabs, potholes, maintenance, missing pitch, you name it,&rdquo; said Mahbub Ali, a Kallyanpur resident.<br />&ldquo;It is a nightmare to drive a motorbike on Dhaka&rsquo;s roads,&rdquo; he claimed, saying: &ldquo;If you try to merely get by while ignoring the flaws in the characters of the city roads, you might just have a road accident. One has to be extra-cautious when driving a motorbike in Dhaka.&rdquo;<br />Allegations of inferior construction and curse of maintenance<br />Numerous people frequently question the quality of material used to construct and repair the roads.<br />Saiful Islam, a resident of Shahjadpur claimed regardless of rain, the roads have always had potholes due to poor construction.<br />&ldquo;They use very little asphalt in building and repairing the roads. The contractors also use more sand than cement in construction&rdquo; he alleged.<br />Although authorities announced there would not be any road maintenance from June to October, the reality is very different.<br />Fresh potholes have exposed the inferiority of the repair work. On top of all this, the monsoon maintenance has only exacerbated the problem.<br />The missing DSCC technologies<br />DSCC introduced two new technologies &ndash; Cold Asphalt Recycling Plant and Cold Milling Machine &ndash; to facilitate their road works.<br />The Cold Asphalt Recycling Plant is uses cold-mix asphalt recycling, a process where asphalt pavement materials are mixed with new asphalt and/or recycling agents to produce cold-base mixtures.<br />The Cold Milling Machine is used for highly efficient removal of asphalt and concrete pavements. In doing so, they create an even, true-to-profile base for the construction of new surface courses of uniform layer thickness.<br />They were inaugurated in November 2016 to make a road in Palashi. But there were no dramatic changes in DSCC roads afterwards.<br />Hollow promises<br />DSCC Mayor Khokon reiterated that repair all the damaged roads will be repaired as monsoon ends.<br />For DNCC, Chief Executive Officer Mohammad Mesbaul Islam denied allegations of low quality construction material. He said the DNCC will swiftly repair the roads in their area as soon as the rain stops.<br />Regular repairs and maintenance has become as daily a habit as commuting, but neither the DSCC mayor nor the DNCC spokesperson could provide a reason as to why the roads are not built to weather the heavy rain, waterlogging and the heavy traffic.</p>', 'upload/5659630d80.jpg', '2017-09-20 05:56:31', 'yes'),
(21, 'test post ', '<p style=\"text-align: justify;\">Aung San Suu Kyi&rsquo;s name was once synonymous with the struggle against oppression when she had been under house arrest for almost a decade during military rule in Myanmar.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">In accepting the Nobel Peace Prize, she called for &ldquo;a world free from the displaced, the homeless, and the hopeless.&rdquo;</p>\r\n<p style=\"text-align: justify;\">But she has missed perhaps her greatest opportunity to make good on those words as the leader of Myanmar&rsquo;s first civilian government after a half-century of military rule.</p>\r\n<p style=\"text-align: justify;\">Suu Kyi has watched as 270,000 minority Rohingya Muslims &mdash; one-quarter of their population &mdash; have fled Myanmar over the past two weeks, escaping a bloody military crackdown in which soldiers set fire to homes and shot civilians as they tried to escape, according to accounts published by human rights groups.</p>\r\n<p style=\"text-align: justify;\">Many have been crammed into muddy, overcrowded camps in neighbouring Bangladesh, whose authorities this week raised concerns that Myanmar&rsquo;s military was planting land mines along the border while civilians fled.</p>\r\n<p style=\"text-align: justify;\">Dozens have drowned in river crossings. In displacement camps inside Myanmar, Rohingya activists say the government has blocked delivery of food and humanitarian supplies.</p>\r\n<p style=\"text-align: justify;\">Suu Kyi&rsquo;s questionable stance</p>\r\n<p style=\"text-align: justify;\">As condemnations pour in from across the world, Suu Kyi has defended not the displaced Rohingya but the army, saying critics of the crackdown were being deceived by &ldquo;a huge iceberg of misinformation.&rdquo;</p>\r\n<p style=\"text-align: justify;\">The army calls its actions &ldquo;clearance operations&rdquo; aimed at Rohingya insurgents who attacked police on August 25, killing 12 officers.</p>\r\n<p style=\"text-align: justify;\">Reconciling an activist&rsquo;s ideals with the hard realities of governing is never easy, but rarely has an international icon fallen so fast as Suu Kyi.</p>', 'upload/03e6d787fe.jpg', '2017-09-20 07:19:19', 'yes'),

(22, 'Dhaka City', '<p>One of the biggest Traffic congestion occurd today</p>','upload/img1.jpg', '2017-09-19 20:51:47', 'yes'),
(23, 'White House', '<p>Is people of USA happy with D.Trump</p>','upload/img2.jpg', '2017-09-19 20:51:47', 'yes'),
(24, 'Amazon', '<p>New tourism.New hope for Brazilian economy</p>','upload/img3.jpg', '2017-09-19 20:51:47', 'yes');



-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `menu`, `categoryid`) VALUES
(1, 'BANGLADESH', 2),
(2, 'INTERNATIONAL', 1),
(3, 'SPORTS', 3),
(5, 'POLITICS', 5),
(6, 'CULTURE', 6),
(7, 'CULTURE', 7),
(8, 'Education', 8),
(4, 'LIFE STYLE', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `cat_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`cat_id`, `post_id`) VALUES
(1, 2),
(2, 3),
(1, 4),
(1, 5),
(3, 6),
(3, 7),
(4, 8),
(4, 9),
(4, 10),
(3, 11),
(1, 12),
(2, 13),
(1, 14),
(2, 15),
(2, 16),
(2, 17),
(1, 18),
(2, 19),
(4, 21);

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `com_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`com_id`, `post_id`) VALUES
(1, 9),
(2, 9),
(3, 19),
(4, 19),
(5, 12),
(6, 16),
(7, 7),
(8, 16),
(9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `details` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `details`) VALUES
(1, 'Habib', 'md.ahsanhabib123@gmail.com', '1234', 'admin', 'Habib\r\nmd.ahsanhabib@gmail.com\r\nadmin'),
(2, 'shahi', 'shahi@gmail.com', '12345', 'editor', 'shahi@gmail.com\r\neditor'),
(3, 'mehedi', 'mehedi@gmail.com', '12345', 'subscriber', 'mehedi@gmail.com\r\nmehedi'),
(6, 'sajid', 'sajid@gmail.com', '1234', 'subscriber', 'sajid\nsajid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `writes`
--

CREATE TABLE `writes` (
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writes`
--

INSERT INTO `writes` (`user_id`, `post_id`) VALUES
(1, 2),
(2, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD KEY `com_id` (`com_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `newspost`
--
ALTER TABLE `newspost`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD KEY `com_id` (`com_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writes`
--
ALTER TABLE `writes`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `newspost`
--
ALTER TABLE `newspost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `comments` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `newspost` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `comments` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `newspost` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `writes`
--
ALTER TABLE `writes`
  ADD CONSTRAINT `writes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `writes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `newspost` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
