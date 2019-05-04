<?php

namespace Plugin\AffiliatesPoint\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserInfo
 */
class UserInfo extends \Eccube\Entity\AbstractEntity
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
     * @var int
     */
    private $my_level;

    /**
     * @var string
     */
    private $my_affiliate_code;

    /**
     * @var string
     */
    private $my_name;

    /**
     * @var string
     */
    private $my_mail;

    /**
     * @var string
     */
    private $my_status;

    /**
     * @var string
     */
    private $from_user_id;

    /**
     * @var string
     */
    private $from_user_type;

    /**
     * @var string
     */
    private $from_user_affiliate_code;

    /**
     * @var string
     */
    private $from_user_level;

    /**
     * @var string
     */
    private $from_user_name;

    /**
     * @var string
     */
    private $from_user_mail;

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
     * @return UserInfo
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
     * @return UserInfo
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
     * Set my_level
     *
     * @param \int $myLevel
     * @return UserInfo
     */
    public function setMyLevel($myLevel)
    {
        $this->my_level = $myLevel;

        return $this;
    }

    /**
     * Get my_level
     *
     * @return \int 
     */
    public function getMyLevel()
    {
        return $this->my_level;
    }

    /**
     * Set my_affiliate_code
     *
     * @param string $myAffiliateCode
     * @return UserInfo
     */
    public function setMyAffiliateCode($myAffiliateCode)
    {
        $this->my_affiliate_code = $myAffiliateCode;

        return $this;
    }

    /**
     * Get my_affiliate_code
     *
     * @return string 
     */
    public function getMyAffiliateCode()
    {
        return $this->my_affiliate_code;
    }

    /**
     * Set my_name
     *
     * @param string $myName
     * @return UserInfo
     */
    public function setMyName($myName)
    {
        $this->my_name = $myName;

        return $this;
    }

    /**
     * Get my_name
     *
     * @return string 
     */
    public function getMyName()
    {
        return $this->my_name;
    }

    /**
     * Set my_mail
     *
     * @param string $myMail
     * @return UserInfo
     */
    public function setMyMail($myMail)
    {
        $this->my_mail = $myMail;

        return $this;
    }

    /**
     * Get my_mail
     *
     * @return string 
     */
    public function getMyMail()
    {
        return $this->my_mail;
    }

    /**
     * Set my_status
     *
     * @param string $myStatus
     * @return UserInfo
     */
    public function setMyStatus($myStatus)
    {
        $this->my_status = $myStatus;

        return $this;
    }

    /**
     * Get my_status
     *
     * @return string 
     */
    public function getMyStatus()
    {
        return $this->my_status;
    }

    /**
     * Set from_user_id
     *
     * @param string $fromUserId
     * @return UserInfo
     */
    public function setFromUserId($fromUserId)
    {
        $this->from_user_id = $fromUserId;

        return $this;
    }

    /**
     * Get from_user_id
     *
     * @return string 
     */
    public function getFromUserId()
    {
        return $this->from_user_id;
    }

    /**
     * Set from_user_type
     *
     * @param string $fromUserType
     * @return UserInfo
     */
    public function setFromUserType($fromUserType)
    {
        $this->from_user_type = $fromUserType;

        return $this;
    }

    /**
     * Get from_user_type
     *
     * @return string 
     */
    public function getFromUserType()
    {
        return $this->from_user_type;
    }

    /**
     * Set from_user_affiliate_code
     *
     * @param string $fromUserAffiliateCode
     * @return UserInfo
     */
    public function setFromUserAffiliateCode($fromUserAffiliateCode)
    {
        $this->from_user_affiliate_code = $fromUserAffiliateCode;

        return $this;
    }

    /**
     * Get from_user_affiliate_code
     *
     * @return string 
     */
    public function getFromUserAffiliateCode()
    {
        return $this->from_user_affiliate_code;
    }

    /**
     * Set from_user_level
     *
     * @param string $fromUserLevel
     * @return UserInfo
     */
    public function setFromUserLevel($fromUserLevel)
    {
        $this->from_user_level = $fromUserLevel;

        return $this;
    }

    /**
     * Get from_user_level
     *
     * @return string 
     */
    public function getFromUserLevel()
    {
        return $this->from_user_level;
    }

    /**
     * Set from_user_name
     *
     * @param string $fromUserName
     * @return UserInfo
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
     * Set from_user_mail
     *
     * @param string $fromUserMail
     * @return UserInfo
     */
    public function setFromUserMail($fromUserMail)
    {
        $this->from_user_mail = $fromUserMail;

        return $this;
    }

    /**
     * Get from_user_mail
     *
     * @return string 
     */
    public function getFromUserMail()
    {
        return $this->from_user_mail;
    }

    /**
     * Set created_date
     *
     * @param \DateTime $createdDate
     * @return UserInfo
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
     * @return UserInfo
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
