<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnonceRepository")
 * @Vich\Uploadable
 * 
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

    // ==================================================================
    //                              Photo
    // ==================================================================
    /**
     * @var string
     *
     * @ORM\Column(name="ann_photo", type="string")
     */
    private $photo;

    /**
     * * @Assert\Image(
     *     maxSize = "500k",
     *     mimeTypes = {"image/jpeg", "image/png"},
     *     maxSizeMessage = "Le fichier est trop volumineux",
     *     mimeTypesMessage = "Mauvais format d'image"
     * )
     * @Vich\UploadableField(mapping="photo", fileNameProperty="photo")
     * @var File
     */
    private $photoFile;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

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


    public function setPhotoFile(File $photo = null)
    {
        $this->photoFile = $photo;

        if ($photo) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }
    public function getPhotoFile()
    {
        return $this->photoFile;
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

