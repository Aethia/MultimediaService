<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="idArtiste", columns={"idArtiste"}), @ORM\Index(name="idItem", columns={"idItem"}), @ORM\Index(name="idUtilisateur", columns={"idUtilisateur"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
     * })
     */
    private $idutilisateur;

    /**
     * @var \Artiste
     *
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     * })
     */
    private $idartiste;

    /**
     * @var \Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     * })
     */
    private $iditem;



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
     * Set note
     *
     * @param integer $note
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Note
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idutilisateur
     *
     * @param \Loria\WebServiceBundle\Entity\Utilisateur $idutilisateur
     * @return Note
     */
    public function setIdutilisateur(\Loria\WebServiceBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \Loria\WebServiceBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set idartiste
     *
     * @param \Loria\WebServiceBundle\Entity\Artiste $idartiste
     * @return Note
     */
    public function setIdartiste(\Loria\WebServiceBundle\Entity\Artiste $idartiste = null)
    {
        $this->idartiste = $idartiste;

        return $this;
    }

    /**
     * Get idartiste
     *
     * @return \Loria\WebServiceBundle\Entity\Artiste 
     */
    public function getIdartiste()
    {
        return $this->idartiste;
    }

    /**
     * Set iditem
     *
     * @param \Loria\WebServiceBundle\Entity\Item $iditem
     * @return Note
     */
    public function setIditem(\Loria\WebServiceBundle\Entity\Item $iditem = null)
    {
        $this->iditem = $iditem;

        return $this;
    }

    /**
     * Get iditem
     *
     * @return \Loria\WebServiceBundle\Entity\Item 
     */
    public function getIditem()
    {
        return $this->iditem;
    }
}
