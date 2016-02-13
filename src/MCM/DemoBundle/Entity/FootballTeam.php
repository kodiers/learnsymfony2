<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 13/02/16
 * Time: 03:01
 */
namespace MCM\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="football_team")
 */
class FootballTeam
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Person", mappedBy="favFootballTeam")
     */
    protected $fans;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100, name="stadium_name")
     */
    protected $stadiumName;

    public function __construct()
    {
        $this->fans = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStadiumName()
    {
        return $this->stadiumName;
    }

    /**
     * @param mixed $stadiumName
     */
    public function setStadiumName($stadiumName)
    {
        $this->stadiumName = $stadiumName;
    }

    /**
     * @return mixed
     */
    public function getFans()
    {
        return $this->fans;
    }

    /**
     * @param mixed $fans
     */
    public function setFans($fans)
    {
        $this->fans = $fans;
    }




}