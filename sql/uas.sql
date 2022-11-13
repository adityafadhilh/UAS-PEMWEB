-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 00.30
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `requester` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Waiting for approval'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`book_id`, `facility_id`, `date`, `start_time`, `end_time`, `requester`, `status`) VALUES
(3, 3, '2021-11-08', '09.00', '12.00', 'Toyota', 'Approve'),
(5, 1, '2021-12-13', '14:57', '15:57', 'Saya', 'Approve'),
(7, 1, '2021-12-14', '11:19', '12:19', 'Saya', 'Approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`facility_id`, `img`, `nama`, `deskripsi`) VALUES
(1, 'Lab-AI.jpg', 'Artificial Intelligence Lab', 'This laboratory is a collaboration between UMN and RIIxGRID Japan. This server can be accessed without any limits and facilitates the course of computation specifically for machine learning and deep learning. With a facility equipped with image processing, voice identification and a discussion room, UMN students are aspired to become expert data scientists who are qualified to work in advanced technological industries.'),
(2, 'Kompascorner.jpg', 'Kompas Corner', 'UMN became the first campus established by Kompas Corner. Here, UMN students can access information from the KOMPAS Information Center (PIK) which is the bank data and information that belongs to Kompas. With a designated concept of futuristic green room, students find comfort to read books from Kompas publishers and hold limited events such as book and reviews.'),
(3, 'LectureTheatreNewMediaTower.jpg', 'Lecture Theatre PK Ojong-Jakob Oetama Tower', 'With a larger capacity compared to the other halls, the Lecture Theatre can accommodate up to 500 people running various activities such as seminars, workshops, lectures with guest lecturers, and UKM shows (Student Activity Unit) which are all displayed in this theater room.'),
(4, 'appliednetworklab.jpg', 'Applied Network Computer Lab', 'In this laboratory, students can adaptively learn routing and switching on computer networks ranging from small scale (LAN) to medium scale (ISP). Routing and switching devices in this laboratory are officially facilitated by Cisco. Due to this, firewall devices are facilitated by Huawei. Computer engineering study programs in UMN is partnered with Huawei Authorized Information &amp; Network Academy which is the first and the only one in Indonesia.'),
(5, 'lab-big-data.jpg', 'Big Data Lab', 'This laboratory is used for research purposes and analysis of data. The facilities that has been provided accounts for high performance computing server, workstation based on Linux, Microsoft and Mac, also monitor displays.'),
(6, 'game-dev-lab2.jpg', 'Game Development Lab', 'This laboratory is dedicated to desktop and mobile based games. To improve the interactivity of student’s creativity, UMN provides input devices such as hand gesture recognition sensors (Leap Motion), full body movement (Kinect V2) and a head-mounted VR headset devices (Occulus Rift) which is covered with a hand-tracking technological device. Besides supporting hardware technology, this lab also has software development of digital game content, such as game engines, sound and graphics editing software.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'User',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `password`, `role`, `image`) VALUES
(20, 'admin@umn.ac.id', 'Bapak Admin', '098f6bcd4621d373cade4e832627b4f6', 'Admin', NULL),
(21, 'test@gmail.com', 'Saya', '202cb962ac59075b964b07152d234b70', 'User', NULL),
(25, 'manage@gmail.com', 'Bapak Management', '81dc9bdb52d04dc20036dbd8313ed055', 'Management', NULL),
(28, 'aditya.herindro@student.umn.ac.id', 'Aditya ', '523af537946b79c4f8369ed39ba78605', 'User', NULL),
(29, 'orang@gmail.com', 'Orang', '6512bd43d9caa6e02c990b0a82652dca', 'User', NULL),
(30, 'dina@student.umn.ac.id', 'Dina', '6512bd43d9caa6e02c990b0a82652dca', 'User', NULL),
(31, 'budi.pambudi@gmail.com', 'Budi', '00dfc53ee86af02e742515cdcf075ed3', 'User', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `booking_FK` (`facility_id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_FK` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`facility_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
