<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interactions
 *
 * @ORM\Table(name="interactions", indexes={@ORM\Index(name="idEcoute", columns={"idEcoute"})})
 * @ORM\Entity
 */
class Interactions
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
     * @ORM\Column(name="dateHeure", type="datetime", nullable=false)
     */
    private $dateheure;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=64, nullable=false)
     */
    private $type;

    /**
     * @var \Ecoute
     *
     * @ORM\ManyToOne(targetEntity="Ecoute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEcoute", referencedColumnName="id")
     * })
     */
    private $idecoute;



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
     * Set dateheure
     *
     * @param \DateTime $dateheure
     * @return Interactions
     */
    public function setDateheure($dateheure)
    {
        $this->dateheure = $dateheure;

        return $this;
    }

    /**
     * Get dateheure
     *
     * @return \DateTime 
     */
    public function getDateheure()
    {
        return $this->dateheure;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Interactions
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set idecoute
     *
     * @param \Loria\WebServiceBundle\Entity\Ecoute $idecoute
     * @return Interactions
     */
    public function setIdecoute(\Loria\WebServiceBundle\Entity\Ecoute $idecoute = null)
    {
        $this->idecoute = $idecoute;

        return $this;
    }

    /**
     * Get idecoute
     *
     * @return \Loria\WebServiceBundle\Entity\Ecoute 
     */
    public function getIdecoute()
    {
        return $this->idecoute;
    }
}
