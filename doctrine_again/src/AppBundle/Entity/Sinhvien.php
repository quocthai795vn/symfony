<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sinhvien
 *
 * @ORM\Table(name="sinhvien")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SinhvienRepository")
 */
class Sinhvien
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="gerder", type="string", length=255)
     */
    private $gerder;

    /**
     * @var string
     *
     * @ORM\Column(name="birthday", type="string", length=255)
     */
    private $birthday;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Sinhvien
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
     * Set gerder
     *
     * @param string $gerder
     *
     * @return Sinhvien
     */
    public function setGerder($gerder)
    {
        $this->gerder = $gerder;

        return $this;
    }

    /**
     * Get gerder
     *
     * @return string
     */
    public function getGerder()
    {
        return $this->gerder;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     *
     * @return Sinhvien
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
}

