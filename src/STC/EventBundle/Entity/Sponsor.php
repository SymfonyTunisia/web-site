<?php

namespace STC\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Sponsor
 */
class Sponsor
{

   
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $enable;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var string
     */
    private $type;

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    const TYPE_GOLD = 'GOLD';
    const TYPE_BRONZE = 'BRONZE';
    const TYPE_PLATINIUM = 'PLATINIUM';

    public static $typeList = array(
        self::TYPE_GOLD => 'Gold',
        self::TYPE_BRONZE => 'Bronze',
        self::TYPE_PLATINIUM => 'Platinium'
    );

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $logo;

    /**
     * @var \STC\EventBundle\Entity\Event
     */
    private $event;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Sponsor
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
     * Set enable
     *
     * @param boolean $enable
     * @return Sponsor
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean 
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Sponsor
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
        if ($this->url == null) {
            return null;
        }

        if (preg_match('@^(?:http://)([^/]+)@i', $this->url) || preg_match(
                '@^(?:https://)([^/]+)@i',
                $this->url
            )
        ) {
            return $this->url;
        }

        $website = preg_replace('/\s+/', '', $this->url);
        if (strlen($website) > 1 && (strpos($website, "http://") === false)) {
            return 'http://' . $this->url;
        }

        return null;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Sponsor
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
     * Set type
     *
     * @param string $type
     * @return Sponsor
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
     * Set logo
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $logo
     * @return Sponsor
     */
    public function setLogo(\Application\Sonata\MediaBundle\Entity\Media $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set event
     *
     * @param \STC\EventBundle\Entity\Event $event
     * @return Sponsor
     */
    public function setEvent(\STC\EventBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \STC\EventBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
    /**
     * @return string
     */
    public function getLabelType()
    {
        return isset(self::$typeList[$this->type]) ? self::$typeList[$this->type] : '';
    }
}
