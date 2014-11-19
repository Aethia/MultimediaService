<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecoute
 *
 * @ORM\Table(name="ecoute", indexes={@ORM\Index(name="idItem", columns={"idItem"})})
 * @ORM\Entity
 */
class Ecoute
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="typeEcoute", type="string", length=1, nullable=false)
     */
    private $typeecoute;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Session", mappedBy="idecoute")
     */
    private $idsession;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idsession = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set date
     *
     * @param \DateTime $date
     * @return Ecoute
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
     * Set typeecoute
     *
     * @param string $typeecoute
     * @return Ecoute
     */
    public function setTypeecoute($typeecoute)
    {
        $this->typeecoute = $typeecoute;

        return $this;
    }

    /**
     * Get typeecoute
     *
     * @return string 
     */
    public function getTypeecoute()
    {
        return $this->typeecoute;
    }

    /**
     * Set iditem
     *
     * @param \Loria\WebServiceBundle\Entity\Item $iditem
     * @return Ecoute
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

    /**
     * Add idsession
     *
     * @param \Loria\WebServiceBundle\Entity\Session $idsession
     * @return Ecoute
     */
    public function addIdsession(\Loria\WebServiceBundle\Entity\Session $idsession)
    {
        $this->idsession[] = $idsession;

        return $this;
    }

    /**
     * Remove idsession
     *
     * @param \Loria\WebServiceBundle\Entity\Session $idsession
     */
    public function removeIdsession(\Loria\WebServiceBundle\Entity\Session $idsession)
    {
        $this->idsession->removeElement($idsession);
    }

    /**
     * Get idsession
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdsession()
    {
        return $this->idsession;
    }
}
