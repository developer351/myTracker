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
     * @ORM\Column(name="date", type="integer")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="startFrom", type="integer", nullable=true)
     */
    private $startFrom;

    /**
     * @var bool
     *
     * @ORM\Column(name="isWorking", type="boolean")
     */
    private $isWorking;

    /**
     * @var int
     *
     * @ORM\Column(name="stopWork", type="integer", nullable=true)
     */
    private $stopWork;

    /**
     * @var int
     *
     * @ORM\Column(name="coffeeBreak", type="integer", nullable=true)
     */
    private $coffeeBreak;


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
     * @ORM\PrePersist
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
     * @param integer $startFrom
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
     * @return int
     */
    public function getStartFrom()
    {
        return $this->startFrom;
    }

    /**
     * Set isWorking
     *
     * @param boolean $isWorking
     *
     * @return WorkDay
     */
    public function setIsWorking($isWorking)
    {
        $this->isWorking = $isWorking;

        return $this;
    }

    /**
     * Get isWorking
     *
     * @return bool
     */
    public function getIsWorking()
    {
        return $this->isWorking;
    }

    /**
     * Set stopWork
     *
     * @param integer $stopWork
     *
     * @return WorkDay
     */
    public function setStopWork($stopWork)
    {
        $this->stopWork = $stopWork;

        return $this;
    }

    /**
     * Get stopWork
     *
     * @return int
     */
    public function getStopWork()
    {
        return $this->stopWork;
    }

    /**
     * Set coffeeBreak
     *
     * @param integer $coffeeBreak
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
     * @return int
     */
    public function getCoffeeBreak()
    {
        return $this->coffeeBreak;
    }
}

