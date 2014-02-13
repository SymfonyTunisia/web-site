<?php
namespace STC\BannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Banner {

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
    private $client;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $last_version;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $media;

    /**
     * @var \STC\BannerBundle\Entity\BannerType
     */
    private $banner_type;


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
     * @return Banner
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
     * Set client
     *
     * @param string $client
     * @return Banner
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return Banner
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Banner
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Banner
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
     * Set url
     *
     * @param string $url
     * @return Banner
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
     * Set created
     *
     * @param \DateTime $created
     * @return Banner
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Banner
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Banner
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set last_version
     *
     * @param integer $lastVersion
     * @return Banner
     */
    public function setLastVersion($lastVersion)
    {
        $this->last_version = $lastVersion;

        return $this;
    }

    /**
     * Get last_version
     *
     * @return integer 
     */
    public function getLastVersion()
    {
        return $this->last_version;
    }

    /**
     * Set media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $media
     * @return Banner
     */
    public function setMedia(\Application\Sonata\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set banner_type
     *
     * @param \STC\BannerBundle\Entity\BannerType $bannerType
     * @return Banner
     */
    public function setBannerType(\STC\BannerBundle\Entity\BannerType $bannerType = null)
    {
        $this->banner_type = $bannerType;

        return $this;
    }

    /**
     * Get banner_type
     *
     * @return \STC\BannerBundle\Entity\BannerType 
     */
    public function getBannerType()
    {
        return $this->banner_type;
    }
    
    public function __toString()
    {
    	return (string) $this->getName();
    }
}
