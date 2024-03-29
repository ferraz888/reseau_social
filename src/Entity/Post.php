<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Tests\ORM\Tools\TargetEntity;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity()]
#[ORM\Table(name: "post")]
class Post  {
    #[ORM\Id()]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: "integer")]
    private int $id;
    #[ORM\Column(type: "string", nullable:true,length:140)]
    private ?string $title = NULL;
    #[ORM\Column(type: "text", length:240)]
    private string $content;
    #[ORM\Column(type: "text", nullable:true)]
    private ?string $image = NULL;
    #[ORM\ManyToOne(targetEntity: "App\Entity\User", inversedBy: "posts")]
    private $user;

    public function getId()
    {
        return $this-> id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of user
     */
    // public function getUser()
    // {
    //     return $this->user;
    // }

    // /**
    //  * Set the value of user
    //  *
    //  * @return  self
    //  */
    // public function setUser($user)
    // {
    //     $this->user = $user;

    //     return $this;
    // }
}