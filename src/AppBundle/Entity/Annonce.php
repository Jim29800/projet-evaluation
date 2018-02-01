<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="ann_oid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ann_titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="ann_description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ann_photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="ann_nombre_piece", type="integer")
     */
    private $nombrePiece;

    // ==================================================================
    //                              Relations
    // ==================================================================

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="annonces")
     * @ORM\JoinColumn(name="uti_oid", referencedColumnName="uti_oid", nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="cli_oid", referencedColumnName="cli_oid", nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="categories")
     * @ORM\JoinColumn(name="cat_oid", referencedColumnName="cat_oid", nullable=false)
     */
    private $categorie;

    public function __toString()
    {
        return $this->getTitre();
    }
    // public function __construct($utilisateur)
    // {
    //     $this->setUtilisateur($utilisateur);
    // }
    // ==================================================================
    //                              GET / SET
    // ==================================================================

    /**
     * Get utilisateur
     *
     * @return Utilisateur
     * 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    /**
     * Set utilisateur
     *
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
    /**
     * Get client
     *
     * @return Client
     * 
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * Set client
     *
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }
    /**
     * Get categorie
     *
     * @return Categorie
     * 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    /**
     * Set categorie
     *
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Annonce
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set nombrePiece
     *
     * @param integer $nombrePiece
     *
     * @return Annonce
     */
    public function setNombrePiece($nombrePiece)
    {
        $this->nombrePiece = $nombrePiece;

        return $this;
    }

    /**
     * Get nombrePiece
     *
     * @return int
     */
    public function getNombrePiece()
    {
        return $this->nombrePiece;
    }
}

