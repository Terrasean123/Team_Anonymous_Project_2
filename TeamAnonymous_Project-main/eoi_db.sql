-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 02:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `id` int(11) NOT NULL,
  `job_reference_number` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `suburb_town` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `skills` text NOT NULL,
  `status` enum('New','Current','Final') NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date NOT NULL,
  `qualifications` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`id`, `job_reference_number`, `first_name`, `last_name`, `street_address`, `suburb_town`, `state`, `postcode`, `email`, `phone_number`, `skills`, `status`, `gender`, `dob`, `qualifications`) VALUES
(0, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '', '', '0000-00-00', '[value-15]'),
(3, 'ITD11', 'John', 'Smith', '456 Hill Rd', 'Sydney', 'NSW', '2000', 'john.smith@example.com', '0423456789', 'HTML, CSS, JavaScript', 'New', 'male', '1985-07-22', 'certificateIV, threeYearsExp'),
(5, 'UXD19', 'David', 'Lee', '321 Mountain Dr', 'Adelaide', 'SA', '5000', 'david.lee@example.com', '0445678901', 'UI/UX Design, Figma', 'New', 'male', '1998-12-01', 'certificateIV');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_reference_number` varchar(10) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `job_description` text NOT NULL,
  `job_salary_min` int(10) NOT NULL,
  `job_salary_max` int(10) NOT NULL,
  `reports_to` varchar(50) NOT NULL,
  `key_responsibilities` text NOT NULL,
  `essential_qualifications` text NOT NULL,
  `preferrable_qualifications` text NOT NULL,
  `ideal_applicant` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_reference_number`, `job_title`, `employer`, `location`, `job_description`, `job_salary_min`, `job_salary_max`, `reports_to`, `key_responsibilities`, `essential_qualifications`, `preferrable_qualifications`, `ideal_applicant`) VALUES
('DAN92', 'Data Analyst', 'Team Anonymous', 'Melbourne VIC', 'We are seeking a skilled and detail-oriented Data Analyst to join our team. The successful candidate will be responsible for collecting, processing, and analyzing large datasets to help drive business decisions. The role involves working closely with cross-functional teams to provide actionable insights through data visualization and reporting, ensuring that the organization’s data-driven strategies are executed effectively.', 55000, 85000, 'Data Scientist Manager', 'Collect, clean, and process data from various sources to ensure accuracy and reliability.\nPerform exploratory data analysis (EDA) to uncover trends, patterns, and insights.\nCreate and maintain dashboards and reports that present complex data in a clear, understandable manner.\nPerform statistical analysis and modeling to support business decisions and predict trends.\nConduct data validation and quality assurance to ensure data integrity and consistency.\nProvide recommendations based on data analysis to optimize business operations and performance.\nDevelop and maintain automated processes to streamline data collection and reporting.\nContinuously monitor key performance indicators (KPIs) to track and evaluate business performance.\nAssist with data-related training and mentoring of junior team members.', 'Bachelor’s degree in Data Science, Statistics, Mathematics, Computer Science, or a related field.\nMinimum of 2 years of professional experience in a data analysis role.\nStrong proficiency in data analysis tools and programming languages (e.g., Excel, SQL, Python, R).\nExperience with data visualization tools (e.g., Tableau, Power BI, or similar platforms).\nSolid understanding of statistical methods and techniques for data analysis.\nAbility to interpret and communicate complex data insights to non-technical stakeholders.\nStrong attention to detail and excellent problem-solving skills.\nFamiliarity with databases and data management concepts.', 'Master’s degree in Data Science, Statistics, Mathematics, or a related field.\n4+ years of experience in data analysis or business intelligence.\nExperience with big data technologies (e.g., Hadoop, Spark).\nFamiliarity with machine learning algorithms and predictive analytics.\nProficiency in advanced statistical techniques (e.g., regression analysis, time-series forecasting).\nKnowledge of cloud-based data storage solutions (e.g., AWS, Google BigQuery).\nExperience with programming languages for data manipulation (e.g., Pandas, NumPy).', 'The successful candidate will be an analytical thinker with a passion for data and a strong drive to deliver actionable insights. We are looking for a team player who can navigate complex data challenges and provide meaningful recommendations to enhance business performance.'),
('ISA58', 'IT System Administrator', 'Team Anonymous', 'Melbourne VIC', 'We are looking for a dedicated and experienced IT Systems Administrator to join our team. The successful candidate will be responsible for managing and maintaining our company’s IT infrastructure, ensuring that all systems and networks run smoothly, securely, and efficiently. This role requires a hands-on approach to troubleshooting, installation, configuration, and providing technical support to end-users.\r\n\r\n', 60000, 90000, 'IT Manager', 'Install, configure, and maintain company servers, networks, and systems.\nMonitor system performance, identifying and resolving potential issues proactively.\nProvide support and troubleshooting for hardware and software issues for all employees.\nManage user accounts, permissions, and access control across company systems and applications.\nEnsure system security through regular patches, updates, and antivirus management.\nConduct regular data backups and ensure disaster recovery procedures are in place.\nCollaborate with the development and support teams to implement new IT solutions.\nPerform network configuration, setup, and maintenance, ensuring optimal system uptime.\nMaintain documentation for system configurations, processes, and troubleshooting guides.', 'Bachelor’s degree in Information Technology, Computer Science, or a related field, or equivalent practical experience.\nMinimum of 3 years of experience as a Systems Administrator or in a similar IT support role.\nStrong knowledge of Windows and Linux server operating systems.\nExperience with network protocols, such as TCP/IP, DNS, DHCP, and VPNs.\nHands-on experience with virtualization technologies (e.g., VMware, Hyper-V).\nProficiency with cloud platforms such as AWS, Microsoft Azure, or Google Cloud.\nFamiliarity with backup and recovery tools, and disaster recovery processes.\nExperience with monitoring tools and software to assess system performance (e.g., Nagios, Zabbix).', 'Certifications such as CompTIA Network+, Microsoft Certified Systems Administrator (MCSA), or Cisco Certified Network Associate (CCNA).\n5+ years of experience in systems administration or a similar role.\nExperience with managing Active Directory, Group Policy, and Exchange.\nFamiliarity with automation and scripting languages (e.g., PowerShell, Bash, Python).\nExperience with ITIL frameworks and practices.\nKnowledge of containerization tools such as Docker.\nFamiliarity with network troubleshooting tools (e.g., Wireshark, tcpdump).', 'The ideal candidate will be self-motivated, detail-oriented, and possess excellent time management skills to ensure the smooth operation of the company’s IT systems. We offer a collaborative environment where continuous learning and professional development are highly encouraged.'),
('SDT21', 'Software Developer', 'Team Anonymous', 'Melbourne VIC', 'We are seeking a skilled and dynamic Software Developer to join our development team. The successful candidate will be responsible for designing, developing, and maintaining high-quality software applications. This role involves collaborating with cross-functional teams to meet the needs of our clients and ensure the delivery of robust and scalable solutions.', 100000, 140000, 'Software Developer Manager', 'Design, develop, and implement software solutions that meet the business requirements.\nWrite clean, scalable, and efficient code, following best practices and coding standards.\nPerform code reviews and provide constructive feedback to peers.\nCollaborate with project managers, designers, and other developers to deliver high-quality solutions on time.\nTroubleshoot, debug, and upgrade existing software applications.\nTest and deploy applications and systems, ensuring cross-platform functionality.\nDocument development processes, code changes, and technical specifications.\nStay up-to-date with emerging trends and technologies in software development.\nProvide technical support and guidance to other team members when necessary.', 'Bachelor\'s degree in Computer Science, Software Engineering, or a related field, or equivalent practical experience.\nMinimum of 3 years of professional experience in software development.\nStrong proficiency in at least two programming languages such as Java, Python, C#, or JavaScript.\nExperience with software development frameworks and technologies (e.g., .NET, React, Angular, Spring, Django).\nStrong understanding of object-oriented design principles and software architecture.\nProficient in version control systems, such as Git.\nFamiliarity with relational and non-relational databases (e.g., MySQL, MongoDB).\nAbility to work independently and as part of a team in a fast-paced environment.', 'Master\'s degree in Computer Science, Software Engineering, or a related field.\n5+ years of experience in software development.\nExperience with cloud platforms such as AWS, Azure, or Google Cloud.\nKnowledge of containerization technologies such as Docker and Kubernetes.\nFamiliarity with CI/CD pipelines and automated testing tools.\nUnderstanding of Agile methodologies, such as Scrum or Kanban.\nExperience with mobile development frameworks (e.g., React Native, Swift, Kotlin).', 'The successful applicant will be expected to work in an environment that values innovation, collaboration, and continuous improvement.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE users (
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_reference_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
