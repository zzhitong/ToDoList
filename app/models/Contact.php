<?php
/**
 * Created by PhpStorm.
 * User: zzhitong
 * Date: 8/16/14
 * Time: 11:57 AM
 */

class Contact {
    private $FirstName = "Zhitong";
    private $LastName = "Zhao";

    public  function getFullName()
    {
        return $this->FirstName . ' ' . $this->LastName;
    }

    public  $phone = "512-xxx-xxxx";
    public $email = "zhitong_z@yahoo.com";

} 