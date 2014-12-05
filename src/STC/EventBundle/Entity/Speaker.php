<?php

namespace STC\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Speaker
 */
class Speaker
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $function;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $blog;

    /**
     * @var string
     */
    private $urlTwitter;

    /**
     * @var string
     */
    private $urlGit;

    /**
     * @var string
     */
    private $topic;

    /**
     * @var string
     */
    private $topicDescription;

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;
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
        return (string) $this->getFirstName();
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
     * Set firstName
     *
     * @param string $firstName
     * @return Speaker
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Speaker
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set function
     *
     * @param string $function
     * @return Speaker
     */
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get function
     *
     * @return string 
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Speaker
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Speaker
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
     * Set blog
     *
     * @param string $blog
     * @return Speaker
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return string 
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set urlTwitter
     *
     * @param string $urlTwitter
     * @return Speaker
     */
    public function setUrlTwitter($urlTwitter)
    {
        $this->urlTwitter = $urlTwitter;

        return $this;
    }

    /**
     * Get urlTwitter
     *
     * @return string 
     */
    public function getUrlTwitter()
    {
        return $this->urlTwitter;
    }

    /**
     * Set urlGit
     *
     * @param string $urlGit
     * @return Speaker
     */
    public function setUrlGit($urlGit)
    {
        $this->urlGit = $urlGit;

        return $this;
    }

    /**
     * Get urlGit
     *
     * @return string 
     */
    public function getUrlGit()
    {
        return $this->urlGit;
    }

    /**
     * Set topic
     *
     * @param string $topic
     * @return Speaker
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set topicDescription
     *
     * @param string $topicDescription
     * @return Speaker
     */
    public function setTopicDescription($topicDescription)
    {
        $this->topicDescription = $topicDescription;

        return $this;
    }

    /**
     * Get topicDescription
     *
     * @return string 
     */
    public function getTopicDescription()
    {
        return $this->topicDescription;
    }

    /**
     * Set logo
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $logo
     * @return Speaker
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
     * @return Speaker
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

}
