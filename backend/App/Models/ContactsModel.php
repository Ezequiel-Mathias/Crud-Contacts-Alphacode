<?php

namespace App\Models;


final class ContactsModel
{
    /**
    * @var int 
    */

    private $id;

    /**
    * @var string 
    */

    private $name;

    /**
    * @var string
    */

    private $birthdayDate;
 
    /**
    * @var string
    */

    private $email;

    /**
    * @var string
    */

    private $profession;

    /**
    * @var string
    */

    private $phone;

    /**
    * @var string
    */

    private $cellphone;

    /**
    * @var string
    */

    private $haveWhatsapp;

    /**
    * @var string
    */

    private $permissionSendEmail;

    /**
    * @var string
    */

    private $permissionSendSms;

    /**
    * @var string
    */

    private $deleted;


    public function getId() : int{
        return $this -> id;
    }

    public function setId(int $id) : ContactsModel
    {

        $this -> id = $id;

        return $this;
        
    }
    
    /**
     * @return int
     */

    public function getName() : string {
        return $this -> name;
    }

    /**
     * @param string $name
     * @return ContactsModel
     */

    public function setName(string $name) : ContactsModel
    {
         $this -> name = $name;

        return $this;
    }

    /**
     * @return string
     */

    public function getBirthdayDate() : string {

        return $this -> birthdayDate;

    }

    /**
     * @param string $birthdayDate
     * @return ContactsModel
     */

    public function setBirthdayDate(string $birthdayDate) : ContactsModel {

        $this-> birthdayDate = $birthdayDate;

        return $this;

    }

      /**
     * @return string
     */
    
    public function getEmail () : string {

        return $this -> email;

    }

        /**
     * @param string $email
     * @return ContactsModel
     */


    public function setEmail(string $email) : ContactsModel {

        $this->email = $email;

        return $this;

    }

    /**
     * @return string
     */

    public function getProfession () : string {

        return $this -> profession;

    }

        /**
     * @param string $profession
     * @return ContactsModel
     */

    public function setProfession(string $profession) : ContactsModel {

        $this->profession = $profession;

        return $this;

    }

    /**
     * @return string
     */

     public function getPhone () : string {

        return $this -> phone;

    }

        /**
     * @param string $phone
     * @return ContactsModel
     */

    public function setPhone(string $phone) : ContactsModel {

        $this->phone = $phone;

        return $this;

    }

    /**
     * @return string
     */

     
     public function getCellphone () : string {

        return $this -> cellphone;

    }

        /**
     * @param string $cellphone
     * @return ContactsModel
     */

    public function setCellphone(string $cellphone) : ContactsModel {

        $this->cellphone = $cellphone;

        return $this;

    }

    /**
     * @return string
     */

     public function getHaveWhatsapp () : int {

        return $this -> haveWhatsapp;

    }

        /**
     * @param int $haveWhatsapp
     * @return ContactsModel
     */

    public function setHaveWhatsapp(int $haveWhatsapp) : ContactsModel {

        $this-> haveWhatsapp = $haveWhatsapp;

        return $this;

    }

    /**
     * @return int
     */

     public function getPermissionSendEmail () : int{

        return $this -> permissionSendEmail;

    }

        /**
     * @param int $haveWhatsapp
     * @return ContactsModel
     */

    public function setPermissionSendEmail(int $permissionSendEmail) : ContactsModel {

        $this-> permissionSendEmail = $permissionSendEmail;

        return $this;

    }

    /**
     * @return int
     */

     public function getPermissionSendSms() : int{

        return $this -> permissionSendSms;

    }

        /**
     * @param int $permissionSendSms
     * @return ContactsModel
     */

    public function setPermissionSendSms(int $permissionSendSms) : ContactsModel {

        $this-> permissionSendSms = $permissionSendSms;

        return $this;

    }

    /**
     * @return int
     */


     public function getDeleted() : int {

        return $this -> deleted;

    }

        /**
     * @param int $deleted
     * @return ContactsModel
     */

    public function setDeleted(int $deleted) : ContactsModel {

        $this-> deleted = $deleted;

        return $this;

    }

    /**
     * @return int
     */

     

}

?>