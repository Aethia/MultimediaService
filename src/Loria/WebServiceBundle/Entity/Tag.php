<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=25, nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Item", mappedBy="idtag")
     */
    private $iditem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", inversedBy="idtag")
     * @ORM\JoinTable(name="tagartiste",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idTag", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     *   }
     * )
     */
    private $idartiste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Playlist", inversedBy="idtag")
     * @ORM\JoinTable(name="tagplaylist",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idTag", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idPlaylist", referencedColumnName="id")
     *   }
     * )
     */
    private $idplaylist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Session", inversedBy="idtag")
     * @ORM\JoinTable(name="tagsession",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idTag", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idSession", referencedColumnName="id")
     *   }
     * )
     */
    private $idsession;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idartiste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idplaylist = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Tag
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add iditem
     *
     * @param \Loria\WebServiceBundle\Entity\Item $iditem
     * @return Tag
     */
    public function addIditem(\Loria\WebServiceBundle\Entity\Item $iditem)
    {
        $this->iditem[] = $iditem;

        return $this;
    }

    /**
     * Remove iditem
     *
     * @param \Loria\WebServiceBundle\Entity\Item $iditem
     */
    public function removeIditem(\Loria\WebServiceBundle\Entity\Item $iditem)
    {
        $this->iditem->removeElement($iditem);
    }

    /**
     * Get iditem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Add idartiste
     *
     * @param \Loria\WebServiceBundle\Entity\Artiste $idartiste
     * @return Tag
     */
    public function addIdartiste(\Loria\WebServiceBundle\Entity\Artiste $idartiste)
    {
        $this->idartiste[] = $idartiste;

        return $this;
    }

    /**
     * Remove idartiste
     *
     * @param \Loria\WebServiceBundle\Entity\Artiste $idartiste
     */
    public function removeIdartiste(\Loria\WebServiceBundle\Entity\Artiste $idartiste)
    {
        $this->idartiste->removeElement($idartiste);
    }

    /**
     * Get idartiste
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdartiste()
    {
        return $this->idartiste;
    }

    /**
     * Add idplaylist
     *
     * @param \Loria\WebServiceBundle\Entity\Playlist $idplaylist
     * @return Tag
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
     * Add idsession
     *
     * @param \Loria\WebServiceBundle\Entity\Session $idsession
     * @return Tag
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
