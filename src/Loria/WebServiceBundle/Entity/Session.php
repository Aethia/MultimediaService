<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session", indexes={@ORM\Index(name="idUtilisateur", columns={"idUtilisateur"})})
 * @ORM\Entity
 */
class Session
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
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=true)
     */
    private $datefin;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ecoute", inversedBy="idsession")
     * @ORM\JoinTable(name="sessionecoute",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idSession", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEcoute", referencedColumnName="id")
     *   }
     * )
     */
    private $idecoute;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Playlist", mappedBy="idsession")
     */
    private $idplaylist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="idsession")
     */
    private $idtag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idecoute = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idplaylist = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idtag = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Session
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Session
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set idutilisateur
     *
     * @param \Loria\WebServiceBundle\Entity\Utilisateur $idutilisateur
     * @return Session
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
     * Add idecoute
     *
     * @param \Loria\WebServiceBundle\Entity\Ecoute $idecoute
     * @return Session
     */
    public function addIdecoute(\Loria\WebServiceBundle\Entity\Ecoute $idecoute)
    {
        $this->idecoute[] = $idecoute;

        return $this;
    }

    /**
     * Remove idecoute
     *
     * @param \Loria\WebServiceBundle\Entity\Ecoute $idecoute
     */
    public function removeIdecoute(\Loria\WebServiceBundle\Entity\Ecoute $idecoute)
    {
        $this->idecoute->removeElement($idecoute);
    }

    /**
     * Get idecoute
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdecoute()
    {
        return $this->idecoute;
    }

    /**
     * Add idplaylist
     *
     * @param \Loria\WebServiceBundle\Entity\Playlist $idplaylist
     * @return Session
     */
    public function addIdplaylist(\Loria\WebServiceBundle\Entity\Playlist $idplaylist)
    {
        $this->idplaylist[] = $idplaylist;

        return $this;
    }

    /**
     * Remove idplaylist
     *
     * @param \Loria\WebServiceBundle\Entity\Playlist $idplaylist
     */
    public function removeIdplaylist(\Loria\WebServiceBundle\Entity\Playlist $idplaylist)
    {
        $this->idplaylist->removeElement($idplaylist);
    }

    /**
     * Get idplaylist
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdplaylist()
    {
        return $this->idplaylist;
    }

    /**
     * Add idtag
     *
     * @param \Loria\WebServiceBundle\Entity\Tag $idtag
     * @return Session
     */
    public function addIdtag(\Loria\WebServiceBundle\Entity\Tag $idtag)
    {
        $this->idtag[] = $idtag;

        return $this;
    }

    /**
     * Remove idtag
     *
     * @param \Loria\WebServiceBundle\Entity\Tag $idtag
     */
    public function removeIdtag(\Loria\WebServiceBundle\Entity\Tag $idtag)
    {
        $this->idtag->removeElement($idtag);
    }

    /**
     * Get idtag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdtag()
    {
        return $this->idtag;
    }
}
