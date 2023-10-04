

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CustomerData` ()   BEGIN
SELECT * FROM `customer` LEFT JOIN state ON customer.state_id=state.state_id LEFT JOIN city ON city.city_id=customer.city_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ProductData` ()   BEGIN
SELECT * FROM `product` LEFT JOIN seller on seller.seller_id=product.seller_id LEFT JOIN category ON category.category_id=product.category_id LEFT JOIN produce ON produce.produce_id=product.produce_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PurchaseRequestRecord` ()   BEGIN
SELECT * FROM `purchase_request` LEFT JOIN customer ON purchase_request.customer_id=customer.customer_id LEFT JOIN product ON product.product_id=purchase_request.product_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Purchase_Record` ()   BEGIN
SELECT * FROM `purchase_order` LEFT JOIN product ON product.product_id=purchase_order.product_id LEFT JOIN customer ON customer.customer_id=purchase_order.customer_id LEFT JOIN seller ON seller.seller_id=purchase_order.seller_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SellerData` ()   SELECT * FROM seller LEFT JOIN  state ON seller.state_id=state.state_id LEFT JOIN city ON city.city_id=seller.city_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `login_id`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(10) NOT NULL,
  `article_type` varchar(25) NOT NULL,
  `publish_date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `article_description` text NOT NULL,
  `article_img1` varchar(100) NOT NULL,
  `article_img2` varchar(100) NOT NULL,
  `article_img3` varchar(100) NOT NULL,
  `article_img4` varchar(100) NOT NULL,
  `article_img5` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category` varchar(25) NOT NULL,
  `category_type` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `category_type`, `description`, `img`, `status`) VALUES
(1, 'Fruits', 'Produce', 'Fruits are a rich source of many important nutrients like fibers, vitamins, water, etc. The daily consumption of fruits keeps one healthy and at the same time maintain a young look...', '849168229ONLINE CORONA TRACKER.png', 'Active'),
(2, 'Cereals and Pulses', 'Produce', 'Cereals are an integral part of our lives, as they are the only food products that provide instant energy. Rich in nutrients, cereals come in the form of rice or corns.', '28333cereals and pulses.jpg', 'Active'),
(3, 'Seeds', 'Produce', 'Seeds have stored foods inside them and are confined in coverings known as seed coats. The process of reproduction in a plant is completed after the seeds are developed fully.', '1506seeds.gif', 'Active'),
(4, 'Spices', 'Produce', 'Spices are defined as dried seed or fruit, in whole or powder form, used as \r\nfood additives for enhancing the flavor or taste of a particular food item. India produces 3.2 million tonnes of various spices.', '3443spices.jpg', 'Active'),
(5, 'Vegetables', 'Produce', 'Vegetables, the edible part of a plant, are rich sources of several vital nutrients, contributing immensely to the overall growth of the living being.', '29744veggie.jpg', 'Active'),
(6, 'Dry Fruit and Nuts', 'Produce', 'The need for having a healthy and tasty snack in between our regular food time can be satisfied with the consumption of dry fruits and nuts. They fully satisfy the taste buds, and one need not worry about gaining weight!', '18601dry fruit.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `customer_type` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `produce_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `produce` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`produce_id`, `category_id`, `produce`, `description`, `img`, `status`) VALUES
(1, 1, 'Banana', 'Banana, the fruit of a plant of the genus Musa (family Musaceae) is basically cultivated for food, and secondary for the production of fibers, and also for producing tissue-thin tea bags. Besides this, bananas are also cultivated for some ornamental purposes in various regions of the world. They are also known as Bananier Nain, Canbur, Curro and Plantain. These creamy, rich, and sweet fruits are favourite among the people of all ages right from infants to elders. Bananas consist mainly of sugars (glucose, fructose and sucrose) and fiber. They provide instant energy as they are the rich sources of Vitamin B6, Vitamin C, and potassium. \r\n', '19317banana.jpg', 'Active'),
(2, 1, 'Apple', 'Apple is a fleshy fruit of the tree of the species Malus domestica in the rose family Rosaceae. The trees of the Malus family require a long period of dormancy, a well drained soil, years of careful pruning and pest management. The apple tree usually grows to about 5-12 m in height, and is one of the most cultivated fruit trees in the world. Apples ripen in autumn, and generally are 5-9 cm in diameter. They are available in a number of sizes, shapes, colours, etc. but are mostly round and come in the shades of red or yellow.\r\n\r\nThe tree is believed to have originated from Asia, and now more than 7,500 varieties of apples are available worldwide. These large number of varieties may be grouped in three categories, cider, cooking, and dessert varieties. Those varieties, which ripen in late summer are often the ones, which cannot be stored for long, whereas the ones that ripen in autumn may be stored all year round.\r\n\r\nApples can be eaten fresh, cooked, baked or be converted into drinks, and are a rich source of vitamins A and C, fiber, carbohydrates, etc. To know if an apple is good or not, one should first look at its texture, which should be smooth, and be free of any bruises or cuts. The firmness of the apple is the proof of its sweetness. Storage of the apples in an important aspect and care should be taken to store them in a cool and dry place, wrapped in a poly bag.\r\n\r\nMillions of tonnes of apples are grown throughout the world every year. China, USA, Turkey, France, Italy and Iran are amongst the top exporters of apples in the world. Apples are used in many recipes made world over. The American Apple Pie is world famous and is a traditional dish made on special occasions. Apple can also be baked and eaten as a side dish with any kind of meat. Apple sauce made from blanched apples is an excellent accompaniment with pork. Dried apples also make a health snack. \r\n\r\n ', '30474apple.jpg', 'Active'),
(3, 1, 'Guava', 'Guava is a tropical fruit, which is in very much like the shape of a pear, and has a yellow-green skin and white, yellow, or red/pink flesh. The guava tree belongs to the myrtle family Myrtaceae. The tree is native to Mexico, as well as Central America, Northern South America and parts of the Carribbean. They are now cultivated throughout the tropics.\r\n\r\nThe fruit is known by many names in various countries. They are called Pera in Sri Lanka, Amrood in Hindi and Urdu. In Bengali it is known as Peyara. They are also referred to as the bayabas locals of Guayaba. Some people prefer eating guavas to oranges, as the former have more concentration of Vitamin C and are also a lot cheaper than the latter. ', '28056guava.jpg', 'Active'),
(4, 1, 'Pineapple', 'The Pineapple or the (Ananas Comosus) is a tropical berry fruit. It is a multiple fruit, as multiple spirally flowers grow along the axis and each flower produces a single fleshy fruit. Each fruit overlaps the other produced by a different flower adjacent to it, thus, making the pineapple appear as a single fruit. The leaves of the tree are 20-72 inches in length and are needle tipped and bear sharp, up curved spines on their margins. The stem grows straight, and has a tuff of short leaves at the top, which is known as the crown.\r\n\r\nA pineapple varies in colour from white to yellow and is sweet in taste. It can be had raw and is also relished when glazed or canned. It serves as an ideal dessert and is often added to salads to enhance their tastes. Pineapples are a rich source of Vitamin C and Manganese. They also contain ample amounts of vitamins B1, B6, Copper and other dietary fiber. ', '10737pineapple.jpg', 'Active'),
(5, 1, 'Grapes', 'Grape is a climacteric fruit that grows on the perennial and deciduous woody vines of the genus Vitis. Grapes are small round or oval berries, which have a translucent flesh, and a smooth textured skin. They sometimes have seeds, which are edible, but most of the varieties are seedless. The grapes, which are eaten are called table grapes, the ones used in the fabrication of wine are called wine grapes, and the ones used to make resins are called resin grapes.\r\n\r\nDifferent varieties of grapes range in colour, size, taste and physical characteristics. The colors range from green, amber, red, blue-black, and purple. In general, whole grapes have a slightly crunchy texture and have a dry, sweet and tart taste. Grapes generally grow in clusters of 6 to 300\r\n', '31190grapes.jpg', 'Active'),
(6, 1, 'Grapefruit', 'Grapefruit or the Forbidened fruit of Barbados is a subtropical citrus tree. The tree is an evergreen tree, which grows to a height of about 5-6m, though they may also attain a height upto 13-15m also. The leaves of the tree are long and and thin and dark green in colour. It bears four petaled flowers, which are usually white in colour.\r\n\r\nThe grapefruit is an oblate fruit, which ranges in diameter from 10-15 cm. The skin is usually yellow-orange in colour and the flesh is segmented and acidic. The colour of the flesh varies as per the cultivars; it may have a white, pink and red colour.', '17495grapefruit.jpg', 'Active'),
(7, 1, 'Kiwifruit', 'Kiwifruit is often referred to as the exotic fruit owing to the exquisiteness in its appearance., it is a fruit that holds great surprises. Actinidia deliciosa, commonly known as Hayward kiwi is the most commonly found variety of kiwi. The fruit though appears brown from outside has a translucent emerald green flesh, with scattered small white veins and small black seeds. The flesh of this fruit has a creamy consistency and a splendid taste, which reminds us of a mixture of bananas and strawberries. It has a distinct sweet taste of its own. With the growing awareness about the fruit more and more varieties are now available in the market.', '19268kiwifruit.jpg', 'Active'),
(8, 1, 'Chikku', 'Sapodilla or the Manilkara Zapota is an ever green tree, which is long living and is native to the new world tropics. Though it is a native of Mexico, it was brought to the Philippines by the Spanish Colonists. It is known by the name of chikoo or chiku, or chickoo in India. South Asia and Pakistan. An average Sapodilla tree grows to about 30-40m in height. The bark of the tree contains a white gummy latex called the chicle. \r\n\r\nThe sapodilla trees bear fruit twice a year, thour they flower all year round. The fruit, which grows has a brown skin, resembling a potato. It grows to about 4-8 cm in diameter, and may contain 2-10 seeds. Sapodilla has a high latex content, and does not ripen until picked. It is extremely sweet to taste, and tastes very much like cotton candy or caramel and has a grainy texture.', '29741chikku.jpg', 'Active'),
(9, 1, 'Orange', 'Oranges belong to the category of citrus fruits and are of the Citrus sinensis family. The citrus trees are of the same genus, Citrus, and remain largely interbreedable, that is to say that there is only one super species. Some citrus fruits include oranges, grapefruit, lemons, limes, etc. The fruits belonging to the citrus family are considered berries, as they are fleshy, soft, have seeds, and are derived from a single ovary. \r\n\r\nOranges are believed to be hybrids between the pomelo (Citrus maxima) and tangerine (Citrus reticulata) and are considered to be a hesperidium kind of a berry. The orange tree is a small flowering tree, which grows to a height of about 10 m. It has evergreen leaves, which grow to a length of about 4-10cm long. The seed inside an orange is referred to as the pip, whereas the thread like structures attached to the peel and the flesh are termed as the pith.', '23906orange.png', 'Active'),
(10, 1, 'Pomegranate', 'The pomegranate tree is a deciduous tree, which bears fruits and grows to an average height of 5â€“8 meters. The tree originally belongs to the regions of pakistan, Afganistan and Iran. The tree has been cultivated since time immemorial in the Mediterranean regions including Algeria, India, Turkey, Iran and also in some parts of South East Asia, Tropical Africa, peninsular Malaysia, etc. It is available in the months from September to January in the Northern Hemisphere and and from March to May in the Southern Hemisphere.  \r\n\r\nThe leaves of the tree are oblong and narrow and have a glossy texture. They are about 3-7 cms in length and are 2 cms broad. The fruit has a peculiar hexagonal shape with a thick red skin and around 600 seeds. The seeds of the fruit range in colour from white to deep red. There are also some varieties available in the market, which have a purple pulp colour. Pomegranate trees are drought tolerant and may be grown in dry areas as well. The tree is susceptible to root decay from fungal diseases in wetter regions. They are also tolerant to moderate frost, and can survive in a temperature of about 10o C.\r\n', '20211pomegranate.png', 'Active'),
(11, 1, 'Water Melon', 'The watermelon plant is a climber or a trailer or a vine like structure, originally from South Africa. Scientifically known as the Citrullus lanatus, it belongs to the family Cucurbitaceae. The fruit produced by this plant is called pepo by the scientists. This fruit has a thick rind (exocarp)and has a soft edible pulp (endocarp or mesocarp)on the inside, usually with a lot of seeds. The sweet and juicy flesh ranges in colour from pink, red to yellow. \r\n\r\nWatermelon is a tasty and filling fruit, which is low on calories and has absolutely no fat. Though, it is mostly the pulp which is consumed, but the outer shell and seeds are also consumed in many countries. In many Asian countries, roasted watermelon seeds are eaten as a snack. The rind is used in the form of pickles, jams, etc.', '9769water melon.jpg', 'Active'),
(12, 1, 'Papaya', 'Papaya is a Tropical fruit, with a soft musky taste and a butter like consistency. It is the fruit of the plant Carica papaya, in the genus Carica. It is native to the tropics of the Americas, and was cultivated in Mexico several centuries before the emergence of the Meso-American classic cultures. It is often referred to as the tree melon or the pawpaw. It was called the \"fruit of the angels\" by Christopher Columbus.\r\n\r\nA Papaya tree is a large tree, with a single stem. It grows to about 5 to 10 meters tall, and has spirally arranged leaves mainly confined to the top of the trunk. The leaves are large, ranging from 50-70 cm in diameter. They have deeply palmately lobes having an average of 7 lobes. The tree is generally \r\n\r\nunbranched if unlopped. ', '28078papaya.png', 'Active'),
(13, 1, 'Plums', 'Plums are stone fruit trees of the genus Prunus, subgenus Prunus. The other fruits belonging to this family include peaches, cherries, bird cherries, etc. There are more than 140 varieties of plums sold in the world market today. It comes in a wide array of shapes and sizes and skin colours. They exist in two absolutely contrasting flavours, both sweet and tart. Some varieties amongst the numerous existing ones are dried to make prunes. Even after drying, they do not loose their sweetness.\r\n\r\nAs there are a number of varieties of the fruit which are available, it is therefore not strange, that it has different places of origin. It is believed that the European plum was discovered some two thousand years ago, and it originated in the area near the caspian sea. Researchers are of the opinion that \r\n\r\nhundreds of varieties of European Plums existed during the Roman times. The Japanese Plums on the other hand originated in China,. USA, Russia, China and Romania are the main commercial producers of plums all over the globe.', '16092plums.jpg', 'Active'),
(14, 1, 'Strawberry', 'The Garden Strawberry or the strawberry is the most widely cultivated berry throughout the world. The strawberry plant belongs to the family of the Rosaceae, and is often referred to as the accessory fruit. The fleshy part of the fruit is derived not from the ovaries, but from the peg at the bottom of the bowl shaped hypanthium that holds the ovaries. The garden strawberry was first grown in Europe in the 18th century and represents the accidental cross of Fragaria virginiana from eastern North America, which is rich in flavour, and the Fragaria chiloensis from Chile, which is large in size. Today, these strawberries have been replaced by the Woodland Strawberries, which have been commercially cultivated.', '31717strawberry.jpg', 'Active');




--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `produce_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img_1` varchar(100) NOT NULL,
  `img_2` varchar(100) NOT NULL,
  `img_3` varchar(100) NOT NULL,
  `img_4` varchar(100) NOT NULL,
  `img_5` varchar(100) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `quantity_type` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `uploaded_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchase_order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `purchase_request_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `purchase_order_date` date NOT NULL,
  `purchase_order_time` time NOT NULL,
  `purchase_amt` float(10,2) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_bill`
--

CREATE TABLE `purchase_order_bill` (
  `purchase_order_bill_id` int(10) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_description` text NOT NULL,
  `paid_date` date NOT NULL,
  `paid_amt` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `purchase_request_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `request_date` date NOT NULL,
  `request_date_expire` date NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) NOT NULL,
  `seller_name` varchar(25) NOT NULL,
  `seller_address` text NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_branch` varchar(50) NOT NULL,
  `bank_IFSC` varchar(25) NOT NULL,
  `bank_acno` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) NOT NULL,
  `state` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`produce_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `purchase_order_bill`
--
ALTER TABLE `purchase_order_bill`
  ADD PRIMARY KEY (`purchase_order_bill_id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`purchase_request_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `produce_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `purchase_order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_bill`
--
ALTER TABLE `purchase_order_bill`
  MODIFY `purchase_order_bill_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `purchase_request_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

