<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 17/02/16
 * Time: 03:45
 */
namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="colour")
 */
class Colour
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $favColour;

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
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFavColour()
    {
        return $this->favColour;
    }

    /**
     * @param mixed $favColour
     */
    public function setFavColour($favColour)
    {
        $this->favColour = $favColour;
        return $this;
    }


}