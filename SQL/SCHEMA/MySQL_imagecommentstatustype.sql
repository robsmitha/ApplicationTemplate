/*
Author:			This code was generated by DALGen version 1.1.0.0 available at https://github.com/H0r53/DALGen
Date:			12/16/2017
Description:	Creates the imagecommentstatustype table and respective stored procedures

*/


USE applicationtemplate;



-- ------------------------------------------------------------
-- Drop existing objects
-- ------------------------------------------------------------

DROP TABLE IF EXISTS `applicationtemplate`.`imagecommentstatustype`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_imagecommentstatustype_Load`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_imagecommentstatustype_LoadAll`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_imagecommentstatustype_Add`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_imagecommentstatustype_Update`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_imagecommentstatustype_Delete`;
DROP PROCEDURE IF EXISTS `applicationtemplate`.`usp_imagecommentstatustype_Search`;


-- ------------------------------------------------------------
-- Create table
-- ------------------------------------------------------------



CREATE TABLE `applicationtemplate`.`imagecommentstatustype` (
Id INT AUTO_INCREMENT,
Name VARCHAR(255),
Description VARCHAR(1025),
CONSTRAINT pk_imagecommentstatustype_Id PRIMARY KEY (Id)
);


-- ------------------------------------------------------------
-- Create default SCRUD sprocs for this table
-- ------------------------------------------------------------


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecommentstatustype_Load`
(
	 IN paramId INT
)
BEGIN
	SELECT
		`imagecommentstatustype`.`Id` AS `Id`,
		`imagecommentstatustype`.`Name` AS `Name`,
		`imagecommentstatustype`.`Description` AS `Description`
	FROM `imagecommentstatustype`
	WHERE 		`imagecommentstatustype`.`Id` = paramId;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecommentstatustype_LoadAll`
()
BEGIN
	SELECT
		`imagecommentstatustype`.`Id` AS `Id`,
		`imagecommentstatustype`.`Name` AS `Name`,
		`imagecommentstatustype`.`Description` AS `Description`
	FROM `imagecommentstatustype`;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecommentstatustype_Add`
(
	 IN paramName VARCHAR(255),
	 IN paramDescription VARCHAR(1025)
)
BEGIN
	INSERT INTO `imagecommentstatustype` (Name,Description)
	VALUES (paramName, paramDescription);
	-- Return last inserted ID as result
	SELECT LAST_INSERT_ID() as id;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecommentstatustype_Update`
(
	IN paramId INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	UPDATE `imagecommentstatustype`
	SET Name = paramName
		,Description = paramDescription
	WHERE		`imagecommentstatustype`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecommentstatustype_Delete`
(
	IN paramId INT
)
BEGIN
	DELETE FROM `imagecommentstatustype`
	WHERE		`imagecommentstatustype`.`Id` = paramId;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE `applicationtemplate`.`usp_imagecommentstatustype_Search`
(
	IN paramId INT,
	IN paramName VARCHAR(255),
	IN paramDescription VARCHAR(1025)
)
BEGIN
	SELECT
		`imagecommentstatustype`.`Id` AS `Id`,
		`imagecommentstatustype`.`Name` AS `Name`,
		`imagecommentstatustype`.`Description` AS `Description`
	FROM `imagecommentstatustype`
	WHERE
		COALESCE(imagecommentstatustype.`Id`,0) = COALESCE(paramId,imagecommentstatustype.`Id`,0)
		AND COALESCE(imagecommentstatustype.`Name`,'') = COALESCE(paramName,imagecommentstatustype.`Name`,'')
		AND COALESCE(imagecommentstatustype.`Description`,'') = COALESCE(paramDescription,imagecommentstatustype.`Description`,'');
END //
DELIMITER ;


