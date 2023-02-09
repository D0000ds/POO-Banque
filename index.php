<?php

class Titulaire
{
    protected $nom;
    protected $prenom;
    protected $ville;
    protected $dateDeNaissance;
    protected $compte;
    protected $soldeTitu;

    public function __construct($nom, $prenom, $dateDeNaissance, $ville, $compte)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->ville = $ville;
        $this->compte = $compte;
        $this->soldeTitu = 0;
    }
    // get et set de nom
    public function getNom()
    {
        echo "$this->nom<br>";
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    // get et set de prenom
    public function getPrenom()
    {
        echo "$this->prenom<br>";
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    // get et set de dateDeNaissance
    public function getDateDeNaissance()
    {
        echo "$this->dateDeNaissance<br>";
    }
    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    }
    // get et set de solde
    public function getSolde()
    {
        echo "$this->solde<br>";
    }
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }
    // get et set de ville
    public function getVille()
    {
        echo "$this->ville<br>";
    }
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    // methode get Infos du titulaire
    public function getInfos()
    {
        $this->getNom();
        $this->getPrenom();
        $this->getDateDeNaissance();
        $this->getVille();
        
    }
}

class Banque extends Titulaire
{
    private $solde;
    private $libelle;
    private $deviseMonetaire;
    private $titulaire;
    private $virementSomme = 0;

    public function __construct($nom, $prenom, $dateDeNaissance, $ville, $libelle, $solde, $deviseMonetaire, $titulaire, $compte)
    {
        parent::__construct($nom ,$prenom ,$dateDeNaissance ,$ville, $compte);
        $this->titulaire = $titulaire;

        if ("$nom $prenom"  == $titulaire)
        {
            $this->libelle = $libelle;
            $this->solde = $solde;
            $this->deviseMonetaire = $deviseMonetaire;
            $this->saveSolde =0;
        }
        else
        {
            echo "Titulaire inexistant<br>";
        }

    }
    // get et set de solde
    public function getSolde()
    {
        echo "$this->solde<br>";
    }
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }
    // get et set de libellé
    public function getLibelle()
    {
        echo "$this->libelle<br>";
    }
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
    // get et set de deviseMonetaire
    public function getDeviseMonetaire()
    {
        echo "$this->deviseMonetaire<br>";
    }
    public function setDeviseMonetaire($deviseMonetaire)
    {
        $this->deviseMonetaire = $deviseMonetaire;
    }
    // get et set de titulaire
    public function getTitulaire()
    {
        echo "$this->titulaire<br>";
    }
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;
    }

    // methode get Infos du compte en banque
    public function getInfos()
    {
        $this->getTitulaire();
        $this->getLibelle();
        $this->getSolde();
        $this->getDeviseMonetaire();   
    }

    // methode de virement
    public function virement($titulaire, $compte, $virementSomme)
    {
        if ($titulaire == $this->titulaire)
        {
            if ($virementSomme <= $this->solde)
            {
                $this->solde = $this->solde - $virementSomme;
                $this->soldeTitu = $virementSomme + $this->soldeTitu;
                echo "virement effectuer<br>";
            }
            else 
            {
                echo "Echec virement cause solde insuffisant<br>";
            }
        }
        else 
        {
            echo "Titulaire inexistant<br>";
        }
    }
}

$t1 = new Titulaire("Siegel", "Djibril", "14/01/2004", "Mulhouse", 2);
$t1->getInfos();

$c1 = new Banque("Siegel", "Djibril", "14/01/2004", "Mulhouse", "compte courant", 1400, "Euros", "Siegel Djibril", 2);
$c1->virement("Siegel Djibril", 2, 200);
$c1->getInfos();
