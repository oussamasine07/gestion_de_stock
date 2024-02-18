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