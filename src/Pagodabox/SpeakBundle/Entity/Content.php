<?php

namespace Pagodabox\SpeakBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *  @ORM\Entity
 */
class Content
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @Assert\NotBlank(message = "Enter a message")
     * @ORM\Column(type="text",nullable=false)
     */
    private $message;

    /**
     * Sets message
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Gets id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}