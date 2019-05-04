<?php

namespace Plugin\AffiliatesPoint\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointHistory
 */
class PointHistory extends \Eccube\Entity\AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $my_id;

    /**
     * @var string
     */
    private $my_type;

    /**
     * @var string
     */
    private $from_user_name;

    /**
     * @var integer
     */
    private $from_user_id;

    /**
     * @var integer
     */
    private $order_id;

    /**
     * @var string
     */
    private $order_amount;

    /**
     * @var string
     */
    private $point_amount;

    /**
     * @var string
     */
    private $point_rate;

    /**
     * @var \DateTime
     */
    private $point_get_date;

    /**
     * @var \DateTime
     */
    private $point_cancel_date;

    /**
     * @var string
     */
    private $point_status;

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
     * Set my_id
     *
     * @param integer $myId
     * @return PointHistory
     */
    public function setMyId($myId)
    {
        $this->my_id = $myId;

        return $this;
    }

    /**
     * Get my_id
     *
     * @return integer 
     */
    public function getMyId()
    {
        return $this->my_id;
    }

    /**
     * Set my_type
     *
     * @param string $myType
     * @return PointHistory
     */
    public function setMyType($myType)
    {
        $this->my_type = $myType;

        return $this;
    }

    /**
     * Get my_type
     *
     * @return string 
     */
    public function getMyType()
    {
        return $this->my_type;
    }

    /**
     * Set from_user_name
     *
     * @param string $fromUserName
     * @return PointHistory
     */
    public function setFromUserName($fromUserName)
    {
        $this->from_user_name = $fromUserName;

        return $this;
    }

    /**
     * Get from_user_name
     *
     * @return string 
     */
    public function getFromUserName()
    {
        return $this->from_user_name;
    }

    /**
     * Set from_user_id
     *
     * @param integer $fromUserId
     * @return PointHistory
     */
    public function setFromUserId($fromUserId)
    {
        $this->from_user_id = $fromUserId;

        return $this;
    }

    /**
     * Get from_user_id
     *
     * @return integer 
     */
    public function getFromUserId()
    {
        return $this->from_user_id;
    }

    /**
     * Set order_id
     *
     * @param integer $orderId
     * @return PointHistory
     */
    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;

        return $this;
    }

    /**
     * Get order_id
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set order_amount
     *
     * @param string $orderAmount
     * @return PointHistory
     */
    public function setOrderAmount($orderAmount)
    {
        $this->order_amount = $orderAmount;

        return $this;
    }

    /**
     * Get order_amount
     *
     * @return string 
     */
    public function getOrderAmount()
    {
        return $this->order_amount;
    }

    /**
     * Set point_amount
     *
     * @param string $pointAmount
     * @return PointHistory
     */
    public function setPointAmount($pointAmount)
    {
        $this->point_amount = $pointAmount;

        return $this;
    }

    /**
     * Get point_amount
     *
     * @return string 
     */
    public function getPointAmount()
    {
        return $this->point_amount;
    }

    /**
     * Set point_rate
     *
     * @param string $pointRate
     * @return PointHistory
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
     * Set point_get_date
     *
     * @param \DateTime $pointGetDate
     * @return PointHistory
     */
    public function setPointGetDate($pointGetDate)
    {
        $this->point_get_date = $pointGetDate;

        return $this;
    }

    /**
     * Get point_get_date
     *
     * @return \DateTime 
     */
    public function getPointGetDate()
    {
        return $this->point_get_date;
    }

    /**
     * Set point_cancel_date
     *
     * @param \DateTime $pointCancelDate
     * @return PointHistory
     */
    public function setPointCancelDate($pointCancelDate)
    {
        $this->point_cancel_date = $pointCancelDate;

        return $this;
    }

    /**
     * Get point_cancel_date
     *
     * @return \DateTime 
     */
    public function getPointCancelDate()
    {
        return $this->point_cancel_date;
    }

    /**
     * Set point_status
     *
     * @param string $pointStatus
     * @return PointHistory
     */
    public function setPointStatus($pointStatus)
    {
        $this->point_status = $pointStatus;

        return $this;
    }

    /**
     * Get point_status
     *
     * @return string 
     */
    public function getPointStatus()
    {
        return $this->point_status;
    }

    /**
     * Set created_date
     *
     * @param \DateTime $createdDate
     * @return PointHistory
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
     * @return PointHistory
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
