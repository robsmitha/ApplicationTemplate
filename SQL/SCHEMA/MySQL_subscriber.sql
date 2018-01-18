/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen 
Date:			1/14/2018
Description:	Creates the subscriber table and respective stored procedures

*/


USE applicationtemplate;



-- ------------------------------------------------------------
-- Drop existing objects
-- ------------------------------------------------------------

DROP TABLE IF EXISTS `applicationtemplate`.`subscriber`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_subscriber_Load`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_subscriber_LoadAll`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_subscriber_Add`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_subscriber_Update`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_subscriber_Delete`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_subscriber_Search`;


-- ------------------------------------------------------------
-- Create table
-- ------------------------------------------------------------



CREATE TABLE `applicationtemplate`.`subscriber` (
Id INT AUTO_INCREMENT,
Email VARCHAR(255),
CreateDate DATETIME,
CONSTRAINT pk_subscriber_Id PRIMARY KEY (Id)
);


-- ------------------------------------------------------------
-- Create default SCRUD sprocs for this table
-- ------------------------------------------------------------


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_subscriber_Load`
(
	 IN paramId INT
)
BEGIN
	SELECT
		`subscriber`.`Id` AS `Id`,
		`subscriber`.`Email` AS `Email`,
		`subscriber`.`CreateDate` AS `CreateDate`
	FROM `subscriber`
	WHERE 		`subscriber`.`Id` = paramId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_subscriber_LoadAll`
()
BEGIN
	SELECT
		`subscriber`.`Id` AS `Id`,
		`subscriber`.`Email` AS `Email`,
		`subscriber`.`CreateDate` AS `CreateDate`
	FROM `subscriber`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_subscriber_Add`
(
	 IN paramEmail VARCHAR(255),
	 IN paramCreateDate DATETIME
)
BEGIN
	INSERT INTO `subscriber` (Email,CreateDate)
	VALUES (paramEmail, paramCreateDate);
	-- Return last inserted ID as result
	SELECT LAST_INSERT_ID() as id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_subscriber_Update`
(
	IN paramId INT,
	IN paramEmail VARCHAR(255),
	IN paramCreateDate DATETIME
)
BEGIN
	UPDATE `subscriber`
	SET Email = paramEmail
		,CreateDate = paramCreateDate
	WHERE		`subscriber`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_subscriber_Delete`
(
	IN paramId INT
)
BEGIN
	DELETE FROM `subscriber`
	WHERE		`subscriber`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_subscriber_Search`
(
	IN paramId INT,
	IN paramEmail VARCHAR(255),
	IN paramCreateDate DATETIME
)
BEGIN
	SELECT
		`subscriber`.`Id` AS `Id`,
		`subscriber`.`Email` AS `Email`,
		`subscriber`.`CreateDate` AS `CreateDate`
	FROM `subscriber`
	WHERE
		COALESCE(subscriber.`Id`,0) = COALESCE(paramId,subscriber.`Id`,0)
		AND COALESCE(subscriber.`Email`,'') = COALESCE(paramEmail,subscriber.`Email`,'')
		AND COALESCE(CAST(subscriber.`CreateDate` AS DATE), CAST(NOW() AS DATE)) = COALESCE(CAST(paramCreateDate AS DATE),CAST(subscriber.`CreateDate` AS DATE), CAST(NOW() AS DATE));
END //
DELIMITER ;


