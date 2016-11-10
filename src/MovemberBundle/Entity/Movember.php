<?php

namespace MovemberBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movember
 */
class Movember
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $codepost;

    /**
     * @var string
     */
    private $ville;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Movember
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Movember
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set codepost
     *
     * @param string $codepost
     * @return Movember
     */
    public function setCodepost($codepost)
    {
        $this->codepost = $codepost;

        return $this;
    }

    /**
     * Get codepost
     *
     * @return string 
     */
    public function getCodepost()
    {
        return $this->codepost;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Movember
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /****************************************************/
    /**
     * Set lati
     *
     * @param string $lati
     * @return Movember
     */
    public function setlati($lati)
    {
        $this->lati = $lati;

        return $this;
    }

    /**
     * Get lati
     *
     * @return string
     */
    public function getlati()
    {
        return $this->lati;
    }

    /**
     * Set longt
     *
     * @param string $longt
     * @return Movember
     */
    public function setlongt($longt)
    {
        $this->longt = $longt;

        return $this;
    }

    /**
     * Get longt
     *
     * @return string
     */
    public function getlongt()
    {
        return $this->longt;
    }


    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $lgt;


    /**
     * Set lat
     *
     * @param string $lat
     * @return Movember
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lgt
     *
     * @param string $lgt
     * @return Movember
     */
    public function setLgt($lgt)
    {
        $this->lgt = $lgt;

        return $this;
    }

    /**
     * Get lgt
     *
     * @return string 
     */
    public function getLgt()
    {
        return $this->lgt;
    }
    /**
     * @var string
     */
    private $lati;

    /**
     * @var string
     */
    private $longt;


}
