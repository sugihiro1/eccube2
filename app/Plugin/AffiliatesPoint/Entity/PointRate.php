<?php

namespace Plugin\AffiliatesPoint\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointRate
 */
class PointRate extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $user_type;

    /**
     * @var string
     */
    private $user_type_name;

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $point_rate;

    /**
     * @var string
     */
    private $unit;

    /**
     * @var \DateTime
     */
    private $created_date;

    /**
     * @var \DateTime
     */
    private $updated_date;


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
     * Set user_type
     *
     * @param string $userType
     * @return PointRate
     */
    public function setUserType($userType)
    {
        $this->user_type = $userType;

        return $this;
    }

    /**
     * Get user_type
     *
     * @return string 
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Set user_type_name
     *
     * @param string $userTypeName
     * @return PointRate
     */
    public function setUserTypeName($userTypeName)
    {
        $this->user_type_name = $userTypeName;

        return $this;
    }

    /**
     * Get user_type_name
     *
     * @return string 
     */
    public function getUserTypeName()
    {
        return $this->user_type_name;
    }

    /**
     * Set start_date
     *
     * @param \DateTime $startDate
     * @return PointRate
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get start_date
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set end_date
     *
     * @param \DateTime $endDate
     * @return PointRate
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get end_date
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set point_rate
     *
     * @param string $pointRate
     * @return PointRate
     */
    public function setPointRate($pointRate)
    {
        $this->point_rate = $pointRate;

        return $this;
    }

    /**
     * Get point_rate
     *
     * @return string 
     */
    public function getPointRate()
    {
        return $this->point_rate;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return PointRate
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set created_date
     *
     * @param \DateTime $createdDate
     * @return PointRate
     */
    public function setCreatedDate($createdDate)
    {
        $this->created_date = $createdDate;

        return $this;
    }

    /**
     * Get created_date
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * Set updated_date
     *
     * @param \DateTime $updatedDate
     * @return PointRate
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updated_date = $updatedDate;

        return $this;
    }

    /**
     * Get updated_date
     *
     * @return \DateTime 
     */
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }
}
