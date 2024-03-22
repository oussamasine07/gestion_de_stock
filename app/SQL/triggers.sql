DELIMITER $$
CREATE TRIGGER update_after_insert_etat_paiement_on_paiement
AFTER INSERT ON paiements
FOR EACH ROW 

BEGIN
	DECLARE fac_id INTEGER;
    SET fac_id = NEW.achat_id;

UPDATE etat_paiements
SET etat_paiements.montant_regle = (
	SELECT SUM(montant_regle)
    FROM paiements
    WHERE paiements.achat_id = fac_id
)
WHERE etat_paiements.achat_id = fac_id;
END$$
DELIMITER ;


-- create a trigger to calculate total of each bl
CREATE TRIGGER calc_total_bl_on_insert
AFTER INSERT ON produits_livres
FOR EACH ROW 

UPDATE livraisons 
SET total_bl = (
	SELECT SUM(montant_ttc)
    FROM produits_livres
    WHERE livraisons.id = produits_livres.livraison_id
    GROUP BY produits_livres.livraison_id
)
WHERE livraisons.id = NEW.id;



CREATE TRIGGER calc_rest_quantite_etat_produits_livres_on_insert
BEFORE INSERT ON etat_produits_livres
FOR EACH ROW 
SET NEW.rest_quantite = NEW.total_quantite - NEW.quantite_livre;


CREATE TRIGGER calc_rest_quantite_etat_produits_livres_on_update
BEFORE UPDATE ON etat_produits_livres
FOR EACH ROW 
SET NEW.rest_quantite = NEW.total_quantite - NEW.quantite_livre;

-- keep track the delivered quantity  
CREATE TRIGGER calc_quantite_livre_etat_produits_livres_on_insert 
AFTER INSERT ON produits_livres
FOR EACH ROW

UPDATE etat_produits_livres
SET etat_produits_livres.quantite_livre = (
	SELECT SUM(quantite)
    FROM produits_livres
    WHERE produits_livres.achat_id = NEW.achat_id AND produits_livres.nom_article = NEW.nom_article
    GROUP BY produits_livres.nom_article
)
WHERE etat_produits_livres.achat_id = NEW.achat_id AND etat_produits_livres.article = NEW.nom_article;




CREATE TRIGGER insert_in_etat_produits_livres
AFTER INSERT ON article_achats
FOR EACH ROW 

INSERT INTO etat_produits_livres
	(achat_id, article, total_quantite, quantite_livre, rest_quantite)
VALUES 
	(NEW);

DELIMITER $$
CREATE TRIGGER calc_rest_non_livre_on_insert 
AFTER INSERT ON produits_livres
FOR EACH ROW
BEGIN 
	DECLARE produit_id integer;
    DECLARE nom_art VARCHAR(255);
    SET produit_id = NEW.id;
    SET nom_art = produits_livres.nom_article;

	UPDATE etat_livraisons
    SET montant_livre = (
    	SUM(produits_livres.montant_ttc)
        FROM produits_livres
        WHERE produits_livres.id
        GROUP BY
    )
    WHERE etat_livraisons.montant_livre = 
    
END$$
DELIMITER ;




CREATE TRIGGER `calc_motant_total_produit_livre_on_insert` BEFORE INSERT ON `produits_livres`
 FOR EACH ROW SET NEW.montant_total = NEW.quantite * NEW.prix_unitaire;

CREATE TRIGGER `calc_motant_total_produit_livre_on_update` BEFORE UPDATE ON `produits_livres`
 FOR EACH ROW SET NEW.montant_total = NEW.quantite * NEW.prix_unitaire;

CREATE TRIGGER `calc_motant_ttc_produit_livre_on_insert` BEFORE INSERT ON `produits_livres`
 FOR EACH ROW SET NEW.montant_ttc = NEW.montant_total + NEW.montant_tva;

CREATE TRIGGER `calc_motant_ttc_produit_livre_on_update` BEFORE UPDATE ON `produits_livres`
 FOR EACH ROW SET NEW.montant_ttc = NEW.montant_total + NEW.montant_tva;

CREATE TRIGGER `calc_motant_tva_produit_livre_on_insert` BEFORE INSERT ON `produits_livres`
 FOR EACH ROW SET NEW.montant_tva = NEW.montant_total * NEW.pourcentage_tva;

CREATE TRIGGER `calc_motant_tva_produit_livre_on_update` BEFORE UPDATE ON `produits_livres`
 FOR EACH ROW SET NEW.montant_tva = NEW.montant_total * NEW.pourcentage_tva;


BEGIN 
	
    DECLARE pr_id INTEGER;
    DECLARE pr_type VARCHAR(255);
    DECLARE article VARCHAR(255);
    
    SET pr_id = NEW.produitLiverable_id;
    SET pr_type = NEW.produitLiverable_type;
    SET article = NEW.nom_article;
    
 	UPDATE etat_produits_livres 
    SET etat_produits_livres.quantite_livre = (
    	SELECT SUM(produits_livres.quantite)
        FROM produits_livres
        WHERE 
        	produits_livres.produitLiverable_id = pr_id 
        		AND 
        	produits_livres.produitLiverable_type = produits_livres
        		AND
       		produits_livres.nom_article = article COLLATE utf8mb4_unicode_ci
        GROUP BY
        	produits_livres.produitLiverable_id,
        	produits_livres.produitLiverable_type,
        	produits_livres.nom_article
    ) 
    WHERE 
    	etat_produits_livres.etat_produit_liverable_id = pr_id 
        	AND 
        etat_produits_livres.etat_produit_liverable_type = produits_livres
        	AND
       	etat_produits_livres.article = article COLLATE utf8mb4_unicode_ci;
END

SELECT 
	ventes.id,
    ventes.numero_facture, 
	ventes.date_facture, 
	etat_paiements.total_facture,
	etat_paiements.montant_regle,
	etat_paiements.rest_regle,
	etat_paiements.etat_reglement,
	clients.nom_ou_raison_social
FROM ventes
INNER JOIN 
	etat_paiements ON etat_paiements.payable_id = ventes.id
INNER JOIN 
	clients ON clients.id = ventes.client_id
INNER JOIN 
	societes ON societes.id = clients.societe_id;