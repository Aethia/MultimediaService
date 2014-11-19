<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=25, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="qualite", type="string", length=25, nullable=false)
     */
    private $qualite;

    /**
     * @var \Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     * })
     */
    private $iditem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Langue", inversedBy="idvideo")
     * @ORM\JoinTable(name="videolangue",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idVideo", referencedColumnName="idItem")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idLangue", referencedColumnName="id")
     *   }
     * )
     */
    private $idlangue;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idlangue = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set description
     *
     * @param string $description
     * @return Video
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
     * Set qualite
     *
     * @param string $qualite
     * @return Video
     */
    public function setQualite($qualite)
    {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * Get qualite
     *
     * @return string 
     */
    public function getQualite()
    {
        return $this->qualite;
    }

    /**
     * Set iditem
     *
     * @param \Loria\WebServiceBundle\Entity\Item $iditem
     * @return Video
     */
    public function setIditem(\Loria\WebServiceBundle\Entity\Item $iditem)
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
     * Add idlangue
     *
     * @param \Loria\WebServiceBundle\Entity\Langue $idlangue
     * @return Video
     */
    public function addIdlangue(\Loria\WebServiceBundle\Entity\Langue $idlangue)
    {
        $this->idlangue[] = $idlangue;

        return $this;
    }

    /**
     * Remove idlangue
     *
     * @param \Loria\WebServiceBundle\Entity\Langue $idlangue
     */
    public function removeIdlangue(\Loria\WebServiceBundle\Entity\Langue $idlangue)
    {
        $this->idlangue->removeElement($idlangue);
    }

    /**
     * Get idlangue
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdlangue()
    {
        return $this->idlangue;
    }
}
