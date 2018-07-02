<?php

namespace JJ\ImageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bio
 *
 * @ORM\Table(name="bio")
 * @ORM\Entity(repositoryClass="JJ\ImageBundle\Repository\BioRepository")
 */
class Bio
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="JJ\ImageBundle\Entity\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Bio
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set categorie
     *
     * @param \JJ\ImageBundle\Entity\Categorie $categorie
     *
     * @return Bio
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
}
