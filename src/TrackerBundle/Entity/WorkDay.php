<?php

namespace TrackerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WorkDay
 *
 * @ORM\Table(name="work_day")
 * @ORM\Entity(repositoryClass="TrackerBundle\Repository\WorkDayRepository")
 */
class WorkDay
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="UserId", type="integer")
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startFrom", type="datetime")
     */
    private $startFrom = 'now()';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="coffeeBreak", type="string", nullable=true)
     */
    private $coffeeBreak;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="goHome", type="datetime",nullable=true)
     */
    private $goHome;

    /**
     * @var int
     *
     * @ORM\Column(name="isWorking", type="integer")
     */
    private $isWorking;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return WorkDay
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return WorkDay
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set startFrom
     *
     * @param \DateTime $startFrom
     *
     * @return WorkDay
     */
    public function setStartFrom($startFrom)
    {
        $this->startFrom = $startFrom;

        return $this;
    }

    /**
     * Get startFrom
     *
     * @return \DateTime
     */
    public function getStartFrom()
    {
        return $this->startFrom;
    }

    /**
     * Set coffeeBreak
     *
     * @param \DateTime $coffeeBreak
     *
     * @return WorkDay
     */
    public function setCoffeeBreak($coffeeBreak)
    {
        $this->coffeeBreak = $coffeeBreak;

        return $this;
    }

    /**
     * Get coffeeBreak
     *
     * @return \DateTime
     */
    public function getCoffeeBreak()
    {
        return $this->coffeeBreak;
    }

    /**
     * Set goHome
     *
     * @param \DateTime $goHome
     *
     * @return WorkDay
     */
    public function setGoHome($goHome)
    {
        $this->goHome = $goHome;

        return $this;
    }

    /**
     * Get goHome
     *
     * @return \DateTime
     */
    public function getGoHome()
    {
        return $this->goHome;
    }

    /**
     * @return int
     */
    public function getisWorking()
    {
        return $this->isWorking;
    }

    /**
     * @param int $isWorking
     */
    public function setIsWorking($isWorking)
    {
        $this->isWorking = $isWorking;
    }
}

