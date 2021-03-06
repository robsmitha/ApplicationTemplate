<?php
/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen 
Date:			12/12/2017
Description:	Creates the DAL class for  cartitem table and respective stored procedures

*/



class Cartitem {

	// This is for local purposes only! In hosted environments the db_settings.php file should be outside of the webroot, such as: include("/outside-webroot/db_settings.php");
	protected static function getDbSettings() { return "DAL/db_localsettings.php"; }

	/******************************************************************/
	// Properties
	/******************************************************************/

	protected $Id;
	protected $CartId;
	protected $ItemId;
	protected $AddDate;
	protected $Quantity;
	protected $ItemStartDate;
	protected $ItemEndDate;
	protected $ItemTypeId;


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
			case 8:
				self::__constructFull( $argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7] );
		}
	}


	public function __constructBase() {
		$this->Id = 0;
		$this->CartId = 0;
		$this->ItemId = 0;
		$this->AddDate = "";
		$this->Quantity = 0;
		$this->ItemStartDate = "";
		$this->ItemEndDate = "";
		$this->ItemTypeId = 0;
	}


	public function __constructPK($paramId) {
		$this->load($paramId);
	}


	public function __constructFull($paramId,$paramCartId,$paramItemId,$paramAddDate,$paramQuantity,$paramItemStartDate,$paramItemEndDate,$paramItemTypeId) {
		$this->Id = $paramId;
		$this->CartId = $paramCartId;
		$this->ItemId = $paramItemId;
		$this->AddDate = $paramAddDate;
		$this->Quantity = $paramQuantity;
		$this->ItemStartDate = $paramItemStartDate;
		$this->ItemEndDate = $paramItemEndDate;
		$this->ItemTypeId = $paramItemTypeId;
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
	public function getCartId(){
		return $this->CartId;
	}
	public function setCartId($value){
		$this->CartId = $value;
	}
	public function getItemId(){
		return $this->ItemId;
	}
	public function setItemId($value){
		$this->ItemId = $value;
	}
	public function getAddDate(){
		return $this->AddDate;
	}
	public function setAddDate($value){
		$this->AddDate = $value;
	}
	public function getQuantity(){
		return $this->Quantity;
	}
	public function setQuantity($value){
		$this->Quantity = $value;
	}
	public function getItemStartDate(){
		return $this->ItemStartDate;
	}
	public function setItemStartDate($value){
		$this->ItemStartDate = $value;
	}
	public function getItemEndDate(){
		return $this->ItemEndDate;
	}
	public function setItemEndDate($value){
		$this->ItemEndDate = $value;
	}
	public function getItemTypeId(){
		return $this->ItemTypeId;
	}
	public function setItemTypeId($value){
		$this->ItemTypeId = $value;
	}


	/******************************************************************/
	// Public Methods
	/******************************************************************/


	public function load($paramId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_cartitem_Load(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);

		while ($row = $result->fetch_assoc()) {
		 $this->setId($row['Id']);
		 $this->setCartId($row['CartId']);
		 $this->setItemId($row['ItemId']);
		 $this->setAddDate($row['AddDate']);
		 $this->setQuantity($row['Quantity']);
		 $this->setItemStartDate($row['ItemStartDate']);
		 $this->setItemEndDate($row['ItemEndDate']);
		 $this->setItemTypeId($row['ItemTypeId']);
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
		$stmt = $conn->prepare('CALL usp_cartitem_Add(?,?,?,?,?,?,?)');
		$arg1 = $this->getCartId();
		$arg2 = $this->getItemId();
		$arg3 = $this->getAddDate();
		$arg4 = $this->getQuantity();
		$arg5 = $this->getItemStartDate();
		$arg6 = $this->getItemEndDate();
		$arg7 = $this->getItemTypeId();
		$stmt->bind_param('iisissi',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7);
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
		$stmt = $conn->prepare('CALL usp_cartitem_Update(?,?,?,?,?,?,?,?)');
		$arg1 = $this->getId();
		$arg2 = $this->getCartId();
		$arg3 = $this->getItemId();
		$arg4 = $this->getAddDate();
		$arg5 = $this->getQuantity();
		$arg6 = $this->getItemStartDate();
		$arg7 = $this->getItemEndDate();
		$arg8 = $this->getItemTypeId();
		$stmt->bind_param('iiisissi',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8);
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
		$stmt = $conn->prepare('CALL usp_cartitem_LoadAll()');
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$cartitem = new Cartitem($row['Id'],$row['CartId'],$row['ItemId'],$row['AddDate'],$row['Quantity'],$row['ItemStartDate'],$row['ItemEndDate'],$row['ItemTypeId']);
				$arr[] = $cartitem;
			}
			return $arr;
		}
		else {
			//die("The query yielded zero results.No rows found.");
		}
	}


	public static function remove($paramId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_cartitem_Delete(?)');
		$stmt->bind_param('i', $paramId);
		$stmt->execute();
	}


	public static function search($paramId,$paramCartId,$paramItemId,$paramAddDate,$paramQuantity,$paramItemStartDate,$paramItemEndDate,$paramItemTypeId) {
		include(self::getDbSettings());
		$conn = new mysqli($servername, $username, $password, $dbname);
		$stmt = $conn->prepare('CALL usp_cartitem_Search(?,?,?,?,?,?,?,?)');
		$arg1 = Cartitem::setNullValue($paramId);
		$arg2 = Cartitem::setNullValue($paramCartId);
		$arg3 = Cartitem::setNullValue($paramItemId);
		$arg4 = Cartitem::setNullValue($paramAddDate);
		$arg5 = Cartitem::setNullValue($paramQuantity);
		$arg6 = Cartitem::setNullValue($paramItemStartDate);
		$arg7 = Cartitem::setNullValue($paramItemEndDate);
		$arg8 = Cartitem::setNullValue($paramItemTypeId);
		$stmt->bind_param('iiisissi',$arg1,$arg2,$arg3,$arg4,$arg5,$arg6,$arg7,$arg8);
		$stmt->execute();

		$result = $stmt->get_result();
		if (!$result) die($conn->error);
		if ($result->num_rows > 0) {
			$arr = array();
			while ($row = $result->fetch_assoc()) {
				$cartitem = new Cartitem($row['Id'],$row['CartId'],$row['ItemId'],$row['AddDate'],$row['Quantity'],$row['ItemStartDate'],$row['ItemEndDate'],$row['ItemTypeId']);
				$arr[] = $cartitem;
			}
			return $arr;
		}
		else {
			//die("The query yielded zero results.No rows found.");
		}
	}
    public static function loadbycartid($paramCartId) {
        include(self::getDbSettings());
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare('CALL usp_cartitem_LoadByCartId(?)');
        $stmt->bind_param('i', $paramCartId);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) die($conn->error);
        if ($result->num_rows > 0) {
            $arr = array();
            while ($row = $result->fetch_assoc()) {
                $cartitem = new Cartitem($row['Id'],$row['CartId'],$row['ItemId'],$row['AddDate'],$row['Quantity'],$row['ItemStartDate'],$row['ItemEndDate'],$row['ItemTypeId']);
                $arr[] = $cartitem;
            }
            return $arr;
        }
        else {
            //echo "The query yielded zero results.No rows found.";
        }
    }
}
