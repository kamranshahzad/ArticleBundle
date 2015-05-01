<?php

namespace Kamran\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections;

/**
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity
 */
class Articles
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
     * @ORM\Column(name="title", type="string", length=150)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="Kamran\TechnologyBundle\Entity\TechnologyTools")
     * @ORM\JoinColumn(name="tool_id", referencedColumnName="id")
    */
    private $technology;

    /**
     * @ORM\ManyToOne(targetEntity="ArticleStatus")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="Kamran\TagsBundle\Entity\TechnologyTags")
     * @ORM\JoinTable(name="article_technology_tags",
     *      joinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    private $technology_tags;

    /**
     * @var datetime $createdate
     *
     * @ORM\Column(name="createdate", type="datetime", nullable=true)
     */
    private $createdate;


    public function __construct(){
        $this->technology_tags = new ArrayCollection();
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


    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }


    public function setComments($comments){
        $this->comments = $comments;
        return $this;
    }

    public function getComments(){
        return $this->comments;
    }

    public function setCreatedate($createdate){
        $this->createdate = $createdate;
        return $this;
    }

    public function getCreatedate(){
        return $this->createdate;
    }

    /*
    * Relationships
    */
    public function setTechnology($tech){
        $this->technology = $tech;
        return $this;
    }

    public function getTechnology(){
        return $this->technology;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function getStatus(){
        return $this->status;
    }

    public function addTechnologyTags(\Kamran\TagsBundle\Entity\TechnologyTags $tags){
        $this->technology_tags[] = $tags;
    }

    public function getTechnologyTags(){
        return $this->technology_tags;
    }

    public function __toString()
    {
        return $this->title;
    }

}
