<?php
/**
 * Objet Compte Bancaire
 */
class Compte
{
    //Propriétés
    /**
     * titulaire du compte
     *
     * @var string
     */
    private $titulaire;
    
    /**
     * solde du compte
     *
     * @var float
     */
    private $solde;

    /**
     * Constructeur du compte bancaire 
     *
     * @param string $nom du titulaire
     */
    public function __construct(string $nom, float $montant =100)
    {
        //ON ATRIBUE LE NOM A LLA PROPRIETES TITULAIRE
        //DE L'INSTANCE CREER
        $this->titulaire = $nom;
        // on attribue le montant a la propriété solde
        $this->solde = $montant;
    }

    //accesseurs

    /**
     * getter de titulaire - retourne la valeur du titulaire du compte
     *
     * @return string
     */
    public function getTitulaire(): string
    {
        return $this->titulaire;
    }
    /**
     * modifie le nom du titulaire et retourne l'objet
     *
     * @param string $nom No du titulaire
     * @return self Compte bancaire
     */
    public function setTitulaire(string $nom):self
    {
        //on verifie si ont a un titulaire
        if ($nom != ""){
                $this->titulaire = $nom;
        }
        return $this;
    }
    /**
     * retourne le solde du compte
     *
     * @return float solde du compte
     */
    public function getSolde(): float
    {
        return $this->solde;
    }
    /**
     * modifie le solde du compte
     *
     * @param float $montant montant du solde
     * @return self compte bancaire
     */
    public function setSolde(float $montant):self
    {
        if ($montant >=0) {
            $this->solde = $montant;
        }
        return $this;
    }








    /**
     * Déposer de l'argent
     *
     * @param float $montant monatant déposé 
     * @return void
     */
    public function deposer(float $montant)
    {   
        //on verifie que le montant est positif
        if ($montant > 0) {
            $this->solde += $montant;
        }
    }
    /**
     * voir le solde du compte
     *
     * @return void
     */
    public function VoirSolde()
    {
        echo "le solde est de $this->solde €";
    }
    /**
     * retire un montant du compte
     *
     * @param float $montant monatant a retiré
     * @return void
     */
    public function retirer(float $montant){
        //on verifie le montant et le solde
        if($montant > 0 && $this->solde >= $montant){
            $this->solde -= $montant;
        }else{
            echo"montant invalide ou solde insufisant";
        }
    }
}
?>