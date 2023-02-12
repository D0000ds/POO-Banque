<?php

class Titulaire
{
    private string $nom;
    private string $prenom;
    private $dateDeNaissance;
    private string $ville;
    private array $comptes;

    public function __construct($nom, $prenom, $dateDeNaissance, $ville)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->ville = $ville;
        $this->comptes = [];
    }

    // set et get de $nom
    public function setNom($nom)
    {
        $this->nom = $nom;
        echo $this->nom."<br>";
    }
    public function getNom()
    {
        echo $this->nom."<br>";
    }
    // set et get de $prenom
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        echo $this->prenom."<br>";
    }
    public function getPrenom()
    {
        echo $this->prenom."<br>";
    }
    // set et get de $dateDeNaissance
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
        echo $this->dateDeNaissance."<br>";
    }
    public function getDateDeNaissance()
    {
        echo $this->dateDeNaissance."<br>";
    }
    // set et get de $ville
    public function setVille($ville)
    {
        $this->ville = $ville;
        echo $this->ville."<br>";
    }
    public function getVille()
    {
        echo $this->ville."<br>";
    }

    // methode getInfos
    public function getInfos()
    {
        echo "Nom et prénom: $this->nom $this->prenom <br>";
        echo "Date de naissance: $this->dateDeNaissance<br>";
        echo "Ville: $this->ville<br>";
        echo "Ensemble de compte: ".count($this->comptes)."<br>";
    }

    // methode ajouter un compte
    public function ajouterUnCompte(CompteBanquaire $compte)
    {
        $this->comptes[] = $compte;
    }

    // methode afficher un compte
    public function afficherUnCompte()
    {
        foreach ($this->comptes as $compte)
        {
            return $compte."<br>";
            
        }
    }

    public function __toString()
    {
        return "$this->nom $this->prenom $this->dateDeNaissance $this->ville<br>";
    }
}

class CompteBanquaire
{
    private string $libelle;
    private float $solde;
    private string $deviseMonetaire;
    private Titulaire $titulaire;
    private float $virementSomme;

    public function __construct($libelle, $solde, $deviseMonetaire, $titulaire)
    {
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->deviseMonetaire = $deviseMonetaire;
        $this->titulaire = $titulaire;
        $titulaire->ajouterUnCompte($this);
        $this->virementSomme = 0;
    }

    // set et get de $libelle
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        echo $this->libelle."<br>";
    }
    public function getLibelle()
    {
        echo $this->libelle;
    }
    // set et get de $solde
    public function setSolde($solde)
    {
        $this->solde = $solde;
        echo $this->solde."<br>";
    }
    public function getSolde()
    {
        echo $this->solde."<br>";
    }
    // set et get de $deviseMonetaire
    public function setDeviseMonetaire($deviseMonetaire)
    {
        $this->deviseMonetaire = $deviseMonetaire;
        echo $this->deviseMonetaire."<br>";
    }
    public function getDeviseMonetaire()
    {
        echo $this->deviseMonetaire."<br>";
    }
    // set et get de $titulaire
    public function setTitulaire($titulaire)
    {
        $this->ville = $titulaire;
        echo $this->titulaire."<br>";
    }
    public function getTitulaire()
    {
        echo $this->titulaire."<br>";
    }

    // methode getInfos
    public function getInfos()
    {
        echo "Titulaire: $this->titulaire";
        echo "Libellé: $this->libelle<br>";
        echo "Solde: $this->solde<br>";
        echo "Devise monetaire: $this->deviseMonetaire<br>";
    }

    // methode crediter
    public function crediter($virementSomme)
    {
        $this->solde = $this->solde + $virementSomme;
    }
    // methode debiter
    public function debiter($virementSomme)
    {
        $this->solde = $this->solde - $virementSomme;
    }

    // methode virement
    public function virement($virementSomme, $destinataire)
    {
        if($virementSomme <= $this->solde)
        {
            $destinataire->crediter($virementSomme);
            debiter($virementSomme);
            echo "Virement effectuer<br>";

        }
        else
        {
            echo "Echec solde insuffisant <br>";
        }
    }

    public function __toString()
    {
        return "$this->libelle $this->solde $this->deviseMonetaire $this->titulaire <br>";
    }
}

$t1 = new Titulaire("Mystere", "Martin", "2000-03-03", "Vice City");
$c1 = new CompteBanquaire("compte courant", 3000, "Euros", $t1);
$c2 = new CompteBanquaire("compte epargne", 100, "Euros", $t1);

$c1->virement(500, $c2);

$c1->getSolde();
$c2->getSolde();