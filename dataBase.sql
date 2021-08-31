CREATE TABLE `bachelorprogram` (
  `id` int(11) NOT NULL,
  `nameB` varchar(256) NOT NULL,
  `collegeId` int(11) NOT NULL,
  `duration` int(10) NOT NULL
);

--
-- Dumping data for table `bachelorprogram`
--

INSERT INTO `bachelorprogram` (`id`, `nameB`, `collegeId`, `duration`) VALUES
(1, 'B.Sc. Computer Science', 2, 4),
(2, 'Problem solving', 1, 3),
(3, 'Software developement', 3, 3),
(4, 'Psicology', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `collegebrach`
--

CREATE TABLE `collegebrach` (
  `id` int(11) NOT NULL,
  `nameC` varchar(256) NOT NULL,
  `addressC` varchar(256) NOT NULL,
  `phoneNumberC` varchar(256) NOT NULL
);

--
-- Dumping data for table `collegebrach`
--

INSERT INTO `collegebrach` (`id`, `nameC`, `addressC`, `phoneNumberC`) VALUES
(1, 'Dublin', '16 Dorset st. Lower, D01', '505663324'),
(2, 'Belfast', 's/n Main street', '2155'),
(3, 'Cork', '10000 different address', '11111111');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phoneNumber` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `collegeId` int(10) NOT NULL,
  `bachelorId` int(10) NOT NULL,
  `gender` varchar(256) NOT NULL
);

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `surname`, `address`, `phoneNumber`, `dob`, `collegeId`, `bachelorId`, `gender`) VALUES
(100, 'Pablo', 'Roca', '8 Garden Lane st.', '+353 089931353', '1995-10-21', 1, 1, 'Male'),
(101, 'Carol', 'Propato', '76 Gardiner St. Upper', '+353 0894121', '1988-10-31', 1, 1, 'Female'),
(103, 'Maya', 'Santos', '1000 Thomas street', '+35641200122', '1985-01-20', 2, 1, 'Female'),
(121, 'Marisol', 'Gonzalez', 'Not given', '002212', '1988-06-11', 2, 2, 'Female'),
(123, 'Juan', 'Caro', 'no address given', '0899639295', '1988-11-06', 1, 1, 'Male'),
(126, 'test', 'test', 'test', 'test', '2000-01-01', 1, 1, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL
);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Fernando', 'noemail@canbe.ie', '$2y$10$15Fi8iZJ0N5bfJDj6qRpPuraNkWWw5bKx/ERWGrrs6yWoc4cEM5PW', 'user'),
(2, 'Xiomara', 'noemail@canbe.ie', '$2y$10$gTqlbhIuDB1GJRny6R7hX.j4e9Oz825V5aXMYZDFNyDlfGTkOZDp.', 'user'),
(5, 'admin', 'admin@webdamn.com', '$2y$10$pFvHhT3JsPx/z.rY5QyMWuxMEhaIbmnNzpTLBJqHXBiWKd0IAk0Wu', 'admin'),
(6, 'AleUpdated', 'noemail', '$2y$10$Oonn9AtPtae7KHRiW3mrduV83Ur7/dOfOMrHtbohTclDO6ofP9gZO', 'user');