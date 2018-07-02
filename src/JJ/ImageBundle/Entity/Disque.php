<?php

namespace JJ\ImageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disque
 *
 * @ORM\Table(name="disque")
 * @ORM\Entity(repositoryClass="JJ\ImageBundle\Repository\DisqueRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Disque
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee", type="date")
     */
    private $annee;

    /**
     * @ORM\ManyToOne(targetEntity="JJ\ImageBundle\Entity\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
    * @ORM\ManyToOne(targetEntity="JJ\ImageBundle\Entity\Image", cascade={"persist", "remove"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $image;

    /**
    * @ORM\OneToMany(targetEntity="JJ\ImageBundle\Entity\Titre", mappedBy="disque", cascade={"persist"})
    */
    private $titres;

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
     * @return Disque
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
     * Set annee
     *
     * @param \DateTime $annee
     *
     * @return Disque
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \DateTime
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set categorie
     *
     * @param \JJ\ImageBundle\Entity\Categorie $categorie
     *
     * @return Disque
     */
    public function setCategorie(\JJ\ImageBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \JJ\ImageBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set image
     *
     * @param \JJ\ImageBundle\Entity\Image $image
     *
     * @return Disque
     */
    public function setImage(\JJ\ImageBundle\Entity\Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \JJ\ImageBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->titres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add titre
     *
     * @param \JJ\ImageBundle\Entity\Titre $titre
     *
     * @return Disque
     */
    public function addTitre(\JJ\ImageBundle\Entity\Titre $titre)
    {
        $this->titres[] = $titre;

        return $this;
    }

    /**
     * Remove titre
     *
     * @param \JJ\ImageBundle\Entity\Titre $titre
     */
    public function removeTitre(\JJ\ImageBundle\Entity\Titre $titre)
    {
        $this->titres->removeElement($titre);
    }

    /**
     * Get titres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTitres()
    {
        return $this->titres;
    }

    /**
    * @ORM\PrePersist
    */
    public function setCategorieImage()
    {
      $this->image->setCategorie($this->categorie);
    }

  
    // public function setDisqueOfTitre()
    // {
    //   foreach ($this->titres as $title) {
    //     $title->setDisque($this->id);
    //   }
    // }
}
