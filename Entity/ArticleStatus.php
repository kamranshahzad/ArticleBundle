<?php

namespace Kamran\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="article_status")
 * @ORM\Entity
 */
class ArticleStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=30)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200)
     */
    private $description;



    public function __toString()
    {
        return $this->name;
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
     * @return Tags
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }


    public function getStatus()
    {
        return $this->status;
    }


    public function setDescription($des)
    {
        $this->description = $des;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }


}
