<?php

namespace Loria\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
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
     * @ORM\Column(name="url", type="string", length=50, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=25, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $duree;

    /**
     * @var boolean
     *
     * @ORM\Column(name="typeItem", type="boolean", nullable=false)
     */
    private $typeitem;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbVues", type="integer", nullable=false)
     */
    private $nbvues;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", inversedBy="iditem")
     * @ORM\JoinTable(name="itemartiste",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="iditem")
     * @ORM\JoinTable(name="itemgenre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idGenre", referencedColumnName="id")
     *   }
     * )
     */
    private $idgenre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Item", inversedBy="iditem")
     * @ORM\JoinTable(name="itemitem",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idAlbum", referencedColumnName="id")
     *   }
     * )
     */
    private $idalbum;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Playlist", mappedBy="iditem")
     */
    private $idplaylist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="iditem")
     */
    private $idtag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idartiste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idgenre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idalbum = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set url
     *
     * @param string $url
     * @return Item
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Item
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
     * Set note
     *
     * @param integer $note
     * @return Item
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
     * Set duree
     *
     * @param string $duree
     * @return Item
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
     * Set typeitem
     *
     * @param boolean $typeitem
     * @return Item
     */
    public function setTypeitem($typeitem)
    {
        $this->typeitem = $typeitem;

        return $this;
    }

    /**
     * Get typeitem
     *
     * @return boolean 
     */
    public function getTypeitem()
    {
        return $this->typeitem;
    }

    /**
     * Set nbvues
     *
     * @param integer $nbvues
     * @return Item
     */
    public function setNbvues($nbvues)
    {
        $this->nbvues = $nbvues;

        return $this;
    }

    /**
     * Get nbvues
     *
     * @return integer 
     */
    public function getNbvues()
    {
        return $this->nbvues;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Item
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
     * Add idartiste
     *
     * @param \Loria\WebServiceBundle\Entity\Artiste $idartiste
     * @return Item
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
     * Add idgenre
     *
     * @param \Loria\WebServiceBundle\Entity\Genre $idgenre
     * @return Item
     */
    public function addIdgenre(\Loria\WebServiceBundle\Entity\Genre $idgenre)
    {
        $this->idgenre[] = $idgenre;

        return $this;
    }

    /**
     * Remove idgenre
     *
     * @param \Loria\WebServiceBundle\Entity\Genre $idgenre
     */
    public function removeIdgenre(\Loria\WebServiceBundle\Entity\Genre $idgenre)
    {
        $this->idgenre->removeElement($idgenre);
    }

    /**
     * Get idgenre
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdgenre()
    {
        return $this->idgenre;
    }

    /**
     * Add idalbum
     *
     * @param \Loria\WebServiceBundle\Entity\Item $idalbum
     * @return Item
     */
    public function addIdalbum(\Loria\WebServiceBundle\Entity\Item $idalbum)
    {
        $this->idalbum[] = $idalbum;

        return $this;
    }

    /**
     * Remove idalbum
     *
     * @param \Loria\WebServiceBundle\Entity\Item $idalbum
     */
    public function removeIdalbum(\Loria\WebServiceBundle\Entity\Item $idalbum)
    {
        $this->idalbum->removeElement($idalbum);
    }

    /**
     * Get idalbum
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdalbum()
    {
        return $this->idalbum;
    }

    /**
     * Add idplaylist
     *
     * @param \Loria\WebServiceBundle\Entity\Playlist $idplaylist
     * @return Item
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
     * @return Item
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
