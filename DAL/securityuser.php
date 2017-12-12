<?php
/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen
Date:			12/9/2017
Description:	Creates the DAL class for  securityuser table and respective stored procedures

*/



class Securityuser {

    // This is for local purposes only! In hosted environments the db_settings.php file should be outside of the webroot, such as: include("/outside-webroot/db_settings.php");
    protected static function getDbSettings() { return "DAL/db_localsettings.php"; }

    /******************************************************************/
    // Properties
    /******************************************************************/

    protected $Id;
    protected $Username;
    protected $Password;
    protected $Email;
    protected $RoleId;
    protected $CreateDate;


    /******************************************************************/
    // Constructors
    /******************************************************************/
    public function __construct() {
        $argv = func_get_args();
        switch( func_num_args() ) {
            case 0:
                self::__constructBase();
                break;
            case 1:
                self::__constructPK( $argv[0] );
                break;
            case 6:
                self::__constructFull( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5] );
        }
    }


    public function __constructBase() {
        $this->Id = 0;
        $this->Username = "";
        $this->Password = "";
        $this->Email = "";
        $this->RoleId = 0;
        $this->CreateDate = "";
    }


    public function __constructPK($paramId) {
        $this->load($paramId);
    }


    public function __constructFull($paramId,$paramUsername,$paramPassword,$paramEmail,$paramRoleId,$paramCreateDate) {
        $this->Id = $paramId;
        $this->Username = $paramUsername;
        $this->Password = $paramPassword;
        $this->Email = $paramEmail;
        $this->RoleId = $paramRoleId;
        $this->CreateDate = $paramCreateDate;
    }


    /******************************************************************/
    // Accessors / Mutators
    /******************************************************************/

    public function getId(){
        return $this->Id;
    }
    public function setId($value){
        $this->Id = $value;
    }
    public function getUsername(){
        return $this->Username;
    }
    public function setUsername($value){
        $this->Username = $value;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function setPassword($value){
        $this->Password = $value;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function setEmail($value){
        $this->Email = $value;
    }
    public function getRoleId(){
        return $this->RoleId;
    }
    public function setRoleId($value){
        $this->RoleId = $value;
    }
    public function getCreateDate(){
        return $this->CreateDate;
    }
    public function setCreateDate($value){
        $this->CreateDate = $value;
    }


    /******************************************************************/
    // Public Methods
    /******************************************************************/


    public function load($paramId) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_Load(?)');
        $stmt->bind_param('i', $paramId);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) die($conn->error);

        while ($row = $result->fetch_assoc()) {
            $this->setId($row['Id']);
            $this->setUsername($row['Username']);
            $this->setPassword($row['Password']);
            $this->setEmail($row['Email']);
            $this->setRoleId($row['RoleId']);
            $this->setCreateDate($row['CreateDate']);
        }
    }


    public function save() {
        if ($this->getId() == 0)
            $this->insert();
        else
            $this->update();
    }

    /******************************************************************/
    // Private Methods
    /******************************************************************/



    private function insert() {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_Add(?,?,?,?,?)');
        $arg1 = $this->getUsername();
        $arg2 = $this->getPassword();
        $arg3 = $this->getEmail();
        $arg4 = $this->getRoleId();
        $arg5 = $this->getCreateDate();
        $stmt->bind_param('sssis',$arg1,$arg2,$arg3,$arg4,$arg5);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        while ($row = $result->fetch_assoc()) {
            // By default, the DALGen generated INSERT procedure returns the scope identity as id
            $this->load($row['id']);
        }
    }


    private function update() {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_Update(?,?,?,?,?,?)');
        $arg1 = $this->getId();
        $arg2 = $this->getUsername();
        $arg3 = $this->getPassword();
        $arg4 = $this->getEmail();
        $arg5 = $this->getRoleId();
        $arg6 = $this->getCreateDate();
        $stmt->bind_param('isssis',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6);
        $stmt->execute();
    }

    private static function setNullValue($value){
        if ($value == "")
            return null;
        else
            return $value;
    }

    /******************************************************************/
    // Static Methods
    /******************************************************************/



    public static function loadall() {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_LoadAll()');
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $securityuser = new Securityuser($row['Id'],$row['Username'],$row['Password'],$row['Email'],$row['RoleId'],$row['CreateDate']);
                $arr[] = $securityuser;
            }
            return $arr;
        }
        else {
            die("The query yielded zero results.No rows found.");
        }
    }


    public static function remove($paramId) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_Remove(?)');
        $stmt->bind_param('i', $paramId);
        $stmt->execute();
    }


    public static function search($paramId,$paramUsername,$paramPassword,$paramEmail,$paramRoleId,$paramCreateDate) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_Search(?,?,?,?,?,?)');
        $arg1 = Securityuser::setNullValue($paramId);
        $arg2 = Securityuser::setNullValue($paramUsername);
        $arg3 = Securityuser::setNullValue($paramPassword);
        $arg4 = Securityuser::setNullValue($paramEmail);
        $arg5 = Securityuser::setNullValue($paramRoleId);
        $arg6 = Securityuser::setNullValue($paramCreateDate);
        $stmt->bind_param('isssis',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $securityuser = new Securityuser($row['Id'],$row['Username'],$row['Password'],$row['Email'],$row['RoleId'],$row['CreateDate']);
                $arr[] = $securityuser;
            }
            return $arr;
        }
        else {
            die("The query yielded zero results.No rows found.");
        }
    }
    public static function lookup($paramUsername) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_securityuser_Lookup(?)');
        $arg1 = Securityuser::setNullValue($paramUsername);
        $stmt->bind_param('s',$arg1);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Securityuser($row['Id'],$row['Username'],$row['Password'],$row['Email'],$row['RoleId'],$row['CreateDate']);
        }
        else {
            return 0;
        }
    }
}



