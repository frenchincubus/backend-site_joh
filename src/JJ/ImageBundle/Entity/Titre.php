<?php

namespace JJ\ImageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titre
 *
 * @ORM\Table(name="titre")
 * @ORM\Entity(repositoryClass="JJ\ImageBundle\Repository\TitreRepository")
 */
class Titre
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
    * @ORM\ManyToOne(targetEntity="JJ\ImageBundle\Entity\Disque")
    * @ORM\JoinColumn(nullable=true)
    */
    private $disque;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="string", length=255, nullable=true)
     */
    private $duree;


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
     * @return Titre
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
     * Set duree
     *
     * @param string $duree
     *
     * @return Titre
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set disque
     *
     * @param \JJ\ImageBundle\Entity\Disque $disque
     *
     * @return Titre
     */
    public function setDisque(\JJ\ImageBundle\Entity\Disque $disque)
    {
        $this->disque = $disque;

        return $this;
    }

    /**
     * Get disque
     *
     * @return \JJ\ImageBundle\Entity\Disque
     */
    public function getDisque()
    {
        return $this->disque;
    }
}
