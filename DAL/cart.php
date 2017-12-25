<?php
/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen 
Date:			12/9/2017
Description:	Creates the DAL class for  cart table and respective stored procedures

*/



class Cart {

	// This is for local purposes only! In hosted environments the db_settings.php file should be outside of the webroot, such as: include("/outside-webroot/db_settings.php");
	protected static function getDbSettings() { return "DAL/db_localsettings.php"; }

	/******************************************************************/
	// Properties
	/******************************************************************/

	protected $Id;
	protected $CustomerId;
	protected $CartStatusTypeId;
	protected $CreateDate;
	protected $CheckoutDate;


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
			case 5:
				self::__constructFull( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4] );
		}
	}


	public function __constructBase() {
		$this->Id = 0;
		$this->CustomerId = 0;
		$this->CartStatusTypeId = 0;
		$this->CreateDate = "";
		$this->CheckoutDate = "";
	}


	public function __constructPK($paramId) {
		$this->load($paramId);
	}


	public function __constructFull($paramId,$paramCustomerId,$paramCartStatusTypeId,$paramCreateDate,$paramCheckoutDate) {
		$this->Id = $paramId;
		$this->CustomerId = $paramCustomerId;
		$this->CartStatusTypeId = $paramCartStatusTypeId;
		$this->CreateDate = $paramCreateDate;
		$this->CheckoutDate = $paramCheckoutDate;
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
	public function getCustomerId(){
		return $this->CustomerId;
	}
	public function setCustomerId($value){
		$this->CustomerId = $value;
	}
	public function getCartStatusTypeId(){
		return $this->CartStatusTypeId;
	}
	public function setCartStatusTypeId($value){
		$this->CartStatusTypeId = $value;
	}
	public function getCreateDate(){
		return $this->CreateDate;
	}
	public function setCreateDate($value){
		$this->CreateDate = $value;
	}
	public function getCheckoutDate(){
		return $this->CheckoutDate;
	}
	public function setCheckoutDate($value){
		$this->CheckoutDate = $value;
	}


	/******************************************************************/
	// Public Methods
	/******************************************************************/


	public function load($paramId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_cart_Load(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);

		while ($row = $result->fetch_assoc()) {
		 $this->setId($row['Id']);
		 $this->setCustomerId($row['CustomerId']);
		 $this->setCartStatusTypeId($row['CartStatusTypeId']);
		 $this->setCreateDate($row['CreateDate']);
		 $this->setCheckoutDate($row['CheckoutDate']);
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
		$stmt = $conn->prepare('CALL usp_cart_Add(?,?,?,?)');
		$arg1 = $this->getCustomerId();
		$arg2 = $this->getCartStatusTypeId();
		$arg3 = $this->getCreateDate();
		$arg4 = $this->getCheckoutDate();
		$stmt->bind_param('iiss',$arg1,$arg2,$arg3,$arg4);
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
		$stmt = $conn->prepare('CALL usp_cart_Update(?,?,?,?,?)');
		$arg1 = $this->getId();
		$arg2 = $this->getCustomerId();
		$arg3 = $this->getCartStatusTypeId();
		$arg4 = $this->getCreateDate();
		$arg5 = $this->getCheckoutDate();
		$stmt->bind_param('iiiss',$arg1,$arg2,$arg3,$arg4,$arg5);
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
		$stmt = $conn->prepare('CALL usp_cart_LoadAll()');
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$cart = new Cart($row['Id'],$row['CustomerId'],$row['CartStatusTypeId'],$row['CreateDate'],$row['CheckoutDate']);
				$arr[] = $cart;
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
		$stmt = $conn->prepare('CALL usp_cart_Remove(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();
	}


	public static function search($paramId,$paramCustomerId,$paramCartStatusTypeId,$paramCreateDate,$paramCheckoutDate) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_cart_Search(?,?,?,?,?)');
		$arg1 = Cart::setNullValue($paramId);
		$arg2 = Cart::setNullValue($paramCustomerId);
		$arg3 = Cart::setNullValue($paramCartStatusTypeId);
		$arg4 = Cart::setNullValue($paramCreateDate);
		$arg5 = Cart::setNullValue($paramCheckoutDate);
		$stmt->bind_param('iiiss',$arg1,$arg2,$arg3,$arg4,$arg5);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$cart = new Cart($row['Id'],$row['CustomerId'],$row['CartStatusTypeId'],$row['CreateDate'],$row['CheckoutDate']);
				$arr[] = $cart;
			}
			return $arr;
		}
		else {
			die("The query yielded zero results.No rows found.");
		}
	}

    public static function loadbycustomerid($paramCustomerId) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_cart_LoadByCustomerId(?)');
        $stmt->bind_param('i', $paramCustomerId);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $cart = new Cart($row['Id'],$row['CustomerId'],$row['CartStatusTypeId'],$row['CreateDate'],$row['CheckoutDate']);
        }
        else {
            return 0;
        }
    }
}
