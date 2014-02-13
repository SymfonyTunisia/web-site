<?php
namespace STC\BannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class BannerType {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $default_media;


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
     * Set name
     *
     * @param string $name
     * @return BannerType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return BannerType
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return BannerType
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return BannerType
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return BannerType
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return BannerType
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set default_media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $defaultMedia
     * @return BannerType
     */
    public function setDefaultMedia(\Application\Sonata\MediaBundle\Entity\Media $defaultMedia)
    {
        $this->default_media = $defaultMedia;

        return $this;
    }

    /**
     * Get default_media
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getDefaultMedia()
    {
        return $this->default_media;
    }
    public function __toString()
    {
    	return (string) $this->getName();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $banners;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->banners = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add banners
     *
     * @param \STC\BannerBundle\Entity\Banner $banners
     * @return BannerType
     */
    public function addBanner(\STC\BannerBundle\Entity\Banner $banners)
    {
        $this->banners[] = $banners;

        return $this;
    }

    /**
     * Remove banners
     *
     * @param \STC\BannerBundle\Entity\Banner $banners
     */
    public function removeBanner(\STC\BannerBundle\Entity\Banner $banners)
    {
        $this->banners->removeElement($banners);
    }

    /**
     * Get banners
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBanners()
    {
        return $this->banners;
    }
}
