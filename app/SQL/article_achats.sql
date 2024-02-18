-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 04:57 PM
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
-- Database: `gestion_de_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_achats`
--

CREATE TABLE `article_achats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `achat_id` bigint(20) UNSIGNED NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `prix_unitaire` decimal(10,2) NOT NULL,
  `quantite` int(11) NOT NULL,
  `montant_total` decimal(10,2) DEFAULT NULL,
  `pourcentage_tva` decimal(3,2) NOT NULL,
  `montant_tva` decimal(10,2) DEFAULT NULL,
  `montant_ttc` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_achats`
--

INSERT INTO `article_achats` (`id`, `achat_id`, `nom_article`, `prix_unitaire`, `quantite`, `montant_total`, `pourcentage_tva`, `montant_tva`, `montant_ttc`, `created_at`, `updated_at`) VALUES
(3, 1, 'RAM DDR 4', 20.00, 15, 300.00, 0.20, 60.00, 360.00, '2024-01-29 14:47:36', '2024-01-29 21:11:53'),
(7, 4, 'm.2 nvme SSD', 400.00, 5, 2000.00, 0.20, 400.00, 2400.00, '2024-02-01 14:04:38', '2024-02-01 14:04:38'),
(8, 4, 'cable usb type c', 5.00, 20, 100.00, 0.20, 20.00, 120.00, '2024-02-01 14:05:01', '2024-02-01 14:05:01'),
(9, 5, 'chargeur', 50.00, 10, 500.00, 0.20, 100.00, 600.00, '2024-02-01 14:22:28', '2024-02-01 14:22:28'),
(10, 5, 'usb', 60.00, 10, 600.00, 0.20, 120.00, 720.00, '2024-02-01 14:23:18', '2024-02-01 14:23:18'),
(11, 9, 'tapi corssair', 50.00, 12, 600.00, 0.20, 120.00, 720.00, '2024-02-01 14:37:10', '2024-02-01 14:37:10'),
(12, 9, 'calvier logitec', 300.00, 10, 3000.00, 0.20, 600.00, 3600.00, '2024-02-01 14:37:49', '2024-02-01 14:37:49'),
(13, 10, 'gaming fans', 15.00, 150, 2250.00, 0.20, 450.00, 2700.00, '2024-02-01 14:47:25', '2024-02-01 14:47:25'),
(14, 10, 'boit alimantation', 350.00, 20, 7000.00, 0.20, 1400.00, 8400.00, '2024-02-01 14:48:00', '2024-02-01 14:48:00'),
(15, 10, 'core i7', 1500.00, 8, 12000.00, 0.20, 2400.00, 14400.00, '2024-02-01 14:48:31', '2024-02-01 14:48:31'),
(16, 11, 'corn flex', 15.00, 45, 675.00, 0.20, 135.00, 810.00, '2024-02-07 20:44:44', '2024-02-07 20:44:44'),
(17, 11, 'farin', 120.00, 15, 1800.00, 0.07, 126.00, 1926.00, '2024-02-07 20:45:25', '2024-02-07 20:45:25'),
(18, 11, 'fromage rouge', 15.00, 25, 375.00, 0.20, 75.00, 450.00, '2024-02-07 20:45:56', '2024-02-07 20:45:56'),
(19, 12, 'oil d\'olive', 80.00, 20, 1600.00, 0.20, 320.00, 1920.00, '2024-02-07 20:54:28', '2024-02-07 20:54:28'),
(20, 12, 'confiture', 12.00, 20, 240.00, 0.20, 48.00, 288.00, '2024-02-07 20:54:51', '2024-02-07 20:54:51');

--
-- Triggers `article_achats`
--
DELIMITER $$
CREATE TRIGGER `calc_montant_montant_tva_on_insert` BEFORE INSERT ON `article_achats` FOR EACH ROW SET NEW.montant_tva = NEW.montant_total * NEW.pourcentage_tva
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_montant_montant_tva_on_update` BEFORE UPDATE ON `article_achats` FOR EACH ROW SET NEW.montant_tva = NEW.montant_total * NEW.pourcentage_tva
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_montant_total_on_insert` BEFORE INSERT ON `article_achats` FOR EACH ROW SET NEW.montant_total = NEW.prix_unitaire * NEW.quantite
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_montant_total_on_update` BEFORE UPDATE ON `article_achats` FOR EACH ROW SET NEW.montant_total = NEW.prix_unitaire * NEW.quantite
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_montant_ttc_on_insert` BEFORE INSERT ON `article_achats` FOR EACH ROW SET NEW.montant_ttc = NEW.montant_total + NEW.montant_tva
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_montant_ttc_on_update` BEFORE UPDATE ON `article_achats` FOR EACH ROW SET NEW.montant_ttc = NEW.montant_total + NEW.montant_tva
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `calc_total_facture_on_insert` AFTER INSERT ON `article_achats` FOR EACH ROW BEGIN
	DECLARE Fac_id INTEGER;
    SET Fac_id = NEW.achat_id;
    
    UPDATE achats
    SET achats.total_facture = (
    	SELECT SUM(article_achats.montant_ttc)
        FROM article_achats
        WHERE article_achats.achat_id = Fac_id 
        GROUP BY article_achats.achat_id
    )
    WHERE achats.id = Fac_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_total_facture_on_update` AFTER UPDATE ON `article_achats` FOR EACH ROW BEGIN
	DECLARE Fac_id INTEGER;
    SET Fac_id = NEW.achat_id;
    
    UPDATE achats
    SET achats.total_facture = (
    	SELECT SUM(article_achats.montant_ttc)
        FROM article_achats
        WHERE article_achats.achat_id = Fac_id 
        GROUP BY article_achats.achat_id
    )
    WHERE achats.id = Fac_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calc_total_fature_on_delete` AFTER DELETE ON `article_achats` FOR EACH ROW BEGIN
	DECLARE Fac_id INTEGER;
    SET Fac_id = OLD.achat_id;
    
    UPDATE achats
    SET achats.total_facture = (
    	SELECT SUM(article_achats.montant_ttc)
        FROM article_achats
        WHERE article_achats.achat_id = Fac_id 
        GROUP BY article_achats.achat_id
    )
    WHERE achats.id = Fac_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `etat_produits_livres_on_insert` AFTER INSERT ON `article_achats` FOR EACH ROW INSERT INTO etat_produits_livres
	(achat_id, article, total_quantite)
VALUES
	(NEW.achat_id, NEW.nom_article, NEW.quantite)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_achats`
--
ALTER TABLE `article_achats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_achats_achat_id_foreign` (`achat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_achats`
--
ALTER TABLE `article_achats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_achats`
--
ALTER TABLE `article_achats`
  ADD CONSTRAINT `article_achats_achat_id_foreign` FOREIGN KEY (`achat_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



DELIMITER $$
CREATE TRIGGER `calc_produit_livre_total_bl_on_insert` 
AFTER INSERT ON produits_livres 
FOR EACH ROW 
BEGIN
	DECLARE Fac_id INTEGER;
    SET Fac_id = NEW.achat_id;
    
    UPDATE livraisons
    SET livraisons.total_bl = (
    	SELECT SUM(produits_livres.montant_ttc)
        FROM produits_livres
        WHERE produits_livres.achat_id = Fac_id 
        GROUP BY produits_livres.achat_id
    )
    WHERE livraisons.achat_id = Fac_id;
END$$
DELIMITER ;




BEGIN 
	DECLARE fac_id INTEGER;
    DECLARE article_produit VARCHAR(255);
    
    SET fac_id = NEW.achat_id;
    SET article_produit = NEW.nom_article;
    
    UPDATE etat_produits_livres
    SET quantite_livre = (
    	SELECT 
        	SUM(quantite)
        FROM produits_livres
        WHERE produits_livres.achat_id = fac_id AND produits_livres.nom_article = article_produit
        GROUP BY produits_livres.nom_article
    )
    WHERE etat_produits_livres.achat_id = fac_id AND etat_produits_livres.article = article_produit;
END






