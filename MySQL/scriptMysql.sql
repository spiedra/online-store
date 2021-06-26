CREATE SCHEMA B97452_PROYECTO2_IF4101;
USE B97452_PROYECTO2_IF4101;

CREATE TABLE B97452_PROYECTO2_IF4101.tb_ROLE
(
	 ID        INT PRIMARY KEY 
    ,TYPE      VARCHAR(36) NOT NULL
);

-------------------------------------

INSERT INTO b97452_proyecto2_if4101.tb_role(ID, TYPE)VALUES(1,'Admin'),(2,'Customer');

------------------------------------

CREATE TABLE b97452_proyecto2_if4101.tb_CUSTOMER
(
	ID         INT AUTO_INCREMENT PRIMARY KEY,
    FIRST_NAME VARCHAR(36) NOT NULL,
    LAST_NAME  VARCHAR(36) NOT NULL,
    DATE_BIRTH DATE NOT NULL,      
    ADDRESS    VARCHAR(58) NOT NULL
);

------------------------------------

CREATE TABLE B97452_PROYECTO2_IF4101.tb_USERS
(
	 ID           INT AUTO_INCREMENT PRIMARY KEY
    ,USER_NAME    VARCHAR(36) NOT NULL UNIQUE
    ,PASSWORD     VARCHAR(36) NOT NULL
    ,ID_ROLE      INT NOT NULL
    ,ID_CUSTOMER  INT NULL
    ,CONSTRAINT FK_USER_ROLE FOREIGN KEY (ID_ROLE) REFERENCES B97452_PROYECTO2_IF4101.tb_ROLE (ID)
    ,CONSTRAINT FK_USER_CUSTOMER FOREIGN KEY (ID_CUSTOMER) REFERENCES B97452_PROYECTO2_IF4101.tb_CUSTOMER (ID)
);

-----------------------------------

INSERT INTO b97452_proyecto2_if4101.tb_users(USER_NAME, PASSWORD, ID_ROLE)VALUES('admin', 'superuser', 1);

-----------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_VALIDATE_USER
(
IN param_USER_NAME VARCHAR(36), 
IN param_PASSWORD VARCHAR(36),
OUT out_RETURN    INT)
BEGIN 
	IF NOT EXISTS (SELECT USER_NAME FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME) THEN
		SELECT -1 INTO out_RETURN;
	ELSE 
		IF(1 = (SELECT ID_ROLE FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME AND PASSWORD = param_PASSWORD)) THEN
			SELECT 1 INTO out_RETURN;
		ELSEIF(2 = (SELECT ID_ROLE FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME AND PASSWORD = param_PASSWORD)) THEN
			SELECT 2 INTO out_RETURN;
        END IF;
	END IF;
END;

-----------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_REGISTER_ADMIN
(
IN param_USER_NAME VARCHAR(36), 
IN param_PASSWORD VARCHAR(36),
OUT out_RETURN    INT)
BEGIN 
	IF EXISTS (SELECT USER_NAME FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME AND PASSWORD = param_PASSWORD) THEN
		SELECT 0 INTO out_RETURN;
	ELSE 
		INSERT INTO b97452_proyecto2_if4101.tb_users(USER_NAME, PASSWORD, ID_ROLE)
        VALUES(param_USER_NAME, param_PASSWORD, 1);
        SELECT 1 INTO out_RETURN;
	END IF;
END;

-----------------------------------

CREATE TABLE B97452_PROYECTO2_IF4101.tb_CATEGORY
(
	 ID   INT AUTO_INCREMENT PRIMARY KEY
	,TYPE VARCHAR(42) NOT NULL UNIQUE	
);

-----------------------------------

INSERT INTO B97452_PROYECTO2_IF4101.tb_CATEGORY(TYPE)VALUES('Cleaning products')

-----------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_ALL_CATEGORIES()
BEGIN
	SELECT ID, TYPE FROM b97452_proyecto2_if4101.tb_category;
END;

-----------------------------------

CREATE TABLE B97452_PROYECTO2_IF4101.tb_IMAGE
(
	 ID         INT AUTO_INCREMENT PRIMARY KEY
    ,IMAGE_NAME VARCHAR(52) NOT NULL
);

-----------------------------------

CREATE TABLE B97452_PROYECTO2_IF4101.tb_PRODUCTS
(
	 ID           INT AUTO_INCREMENT PRIMARY KEY
    ,NAME         VARCHAR(36) NOT NULL UNIQUE
    ,PRICE        DECIMAL(9, 2) NOT NULL
    ,DESCRIPTION  VARCHAR(50) NULL 
	,ID_CATEGORY  INT NOT NULL
    ,ID_IMAGE     INT NOT NULL
    ,NUMBER_LIKES INT NULL DEFAULT 0 
    ,CONSTRAINT FK_PRODUCTS_CATEGORY FOREIGN KEY (ID_CATEGORY) REFERENCES B97452_PROYECTO2_IF4101.tb_CATEGORY (ID)
    ,CONSTRAINT FK_PRODUCTS_IMAGE FOREIGN KEY (ID_IMAGE) REFERENCES B97452_PROYECTO2_IF4101.tb_IMAGE (ID)
);

-----------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_REGISTER_PRODUCT
(
IN param_NAME        VARCHAR(36), 
IN param_PRICE       DECIMAL(9, 2),
IN param_DESCRIPTION VARCHAR(50),
IN param_CATEGORY	 VARCHAR(36),		
IN param_IMAGE		 VARCHAR(52),
OUT out_RETURN       INT)
BEGIN
	DECLARE local_CATEGORY_ID INT;
    DECLARE local_IMAGE_ID    INT;
	IF EXISTS (SELECT NAME FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS WHERE NAME = param_NAME) THEN
		SELECT 0 INTO out_RETURN;
	ELSE 
		INSERT INTO B97452_PROYECTO2_IF4101.tb_IMAGE(IMAGE_NAME)VALUES(param_IMAGE);
        
		SET local_IMAGE_ID = (SELECT LAST_INSERT_ID());
		SET local_CATEGORY_ID = (SELECT ID FROM B97452_PROYECTO2_IF4101.tb_CATEGORY WHERE TYPE = param_CATEGORY);
        
		INSERT INTO B97452_PROYECTO2_IF4101.tb_PRODUCTS(NAME, PRICE, DESCRIPTION, ID_CATEGORY, ID_IMAGE)
        VALUES(param_NAME, param_PRICE, param_DESCRIPTION, local_CATEGORY_ID, local_IMAGE_ID);
        SELECT 1 INTO out_RETURN;
	END IF;
END;

---------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_REGISTER_CATEGORY
(
IN param_TYPE VARCHAR(42), 
OUT out_RETURN    INT)
BEGIN 
	IF EXISTS (SELECT TYPE FROM B97452_PROYECTO2_IF4101.tb_CATEGORY WHERE TYPE = param_TYPE) THEN
		SELECT 0 INTO out_RETURN;
	ELSE 
		INSERT INTO B97452_PROYECTO2_IF4101.tb_CATEGORY(TYPE)
        VALUES(param_TYPE);
        SELECT 1 INTO out_RETURN;
	END IF;
END;

--------------------------

-- INSERT INTO b97452_proyecto2_if4101.tb_PROMOTION(DISCOUNTED_PRICE, START_DATE, END_DATE)VALUES(12.55, NOW(), NOW())

--------------------------

CREATE TABLE b97452_proyecto2_if4101.tb_PROMOTION
(
	 ID               INT AUTO_INCREMENT PRIMARY KEY
    ,DISCOUNTED_PRICE DECIMAL(9, 2) NOT NULL
    ,START_DATE       DATETIME NOT NULL
	,END_DATE    	  DATETIME NOT NULL
)

--------------------------

CREATE TABLE b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION
(
 ID_PRODUCT   INT NOT NULL
,ID_PROMOTION INT NOT NULL
,IS_ACTIVE    BIT DEFAULT 0 NULL
,CONSTRAINT PK_PRODUCT_PROMOTION PRIMARY KEY (ID_PRODUCT, ID_PROMOTION)
,CONSTRAINT FK_PRODUCT_PROMOTION_PRODUCT FOREIGN KEY (ID_PRODUCT) REFERENCES b97452_proyecto2_if4101.tb_PRODUCTS (ID)
,CONSTRAINT FK_PRODUCT_PROMOTION_PROMOTION FOREIGN KEY (ID_PROMOTION) REFERENCES b97452_proyecto2_if4101.tb_PROMOTION (ID) 
);

--------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_INSERT_PRODUCT_PROMOTION
(
IN param_NAME_PRODUCT        VARCHAR(36), 
IN param_DISCOUNTED_PRICE    DECIMAL(9, 2),
IN param_START_DATE          DATETIME,
IN param_END_DATE            DATETIME,
OUT out_RETURN               INT)
BEGIN
	DECLARE local_START_DATE   DATETIME;
    DECLARE local_END_DATE     DATETIME;
    DECLARE local_PROMOTION_ID INT;
    DECLARE local_PRODUCT_ID   INT;
    
    SET SQL_SAFE_UPDATES = 0;
    UPDATE b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
		JOIN b97452_proyecto2_if4101.tb_promotion PR ON (PP.ID_PROMOTION = PR.ID)
		SET IS_ACTIVE = 0
	WHERE NOW() > PR.END_DATE;
	
    SET SQL_SAFE_UPDATES = 0;
    DELETE FROM b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION
    WHERE IS_ACTIVE = 0;
    
	SET local_START_DATE = (
							SELECT  
								START_DATE 
							FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS P
								JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
									ON P.ID = PP.ID_PRODUCT
                                    JOIN b97452_proyecto2_if4101.tb_promotion PRM
										ON PRM.ID = PP.ID_PROMOTION
							WHERE P.NAME = 'MASK'
                            ORDER BY PRM.START_DATE DESC
                            LIMIT 1
                            );
                            
	SET local_END_DATE = (
							SELECT  
								END_DATE 
							FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS P
								JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
									ON P.ID = PP.ID_PRODUCT
                                    JOIN b97452_proyecto2_if4101.tb_promotion PRM
										ON PRM.ID = PP.ID_PROMOTION
							WHERE P.NAME = param_NAME_PRODUCT
                            ORDER BY PRM.END_DATE DESC
							LIMIT 1
                            );
	IF(param_START_DATE <= local_END_DATE) THEN
        SELECT 0 INTO out_RETURN;
	ELSE
		 INSERT INTO b97452_proyecto2_if4101.tb_PROMOTION(DISCOUNTED_PRICE, START_DATE, END_DATE)
         VALUES(param_DISCOUNTED_PRICE, param_START_DATE, param_END_DATE);
         
		 SET local_PROMOTION_ID = (SELECT LAST_INSERT_ID());
         
		 SET local_PRODUCT_ID = (SELECT ID FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS WHERE NAME = param_NAME_PRODUCT);
	
         INSERT INTO b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION(ID_PRODUCT, ID_PROMOTION, IS_ACTIVE)
         VALUES(local_PRODUCT_ID, local_PROMOTION_ID, 1);
        
		SELECT 1 INTO out_RETURN;
    END IF;
END;

select CURRENT_TIMESTAMP()	

---------------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_HISTORY_PROMOTIONS(
IN param_PRODUCT_ID INT,
OUT out_RETURN      INT)
BEGIN
		SELECT  
		P.NAME,
		P.PRICE,
		PRM.DISCOUNTED_PRICE,
		PRM.START_DATE,
		PRM.END_DATE
		FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS P
			JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
				ON P.ID = PP.ID_PRODUCT
					JOIN b97452_proyecto2_if4101.tb_promotion PRM
						ON PRM.ID = PP.ID_PROMOTION
		WHERE P.ID = param_PRODUCT_ID;
END;

--------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_ALL_PRODUCTS()
BEGIN
	    SELECT  
			PR.ID,
			PR.NAME,
			PR.PRICE,
			PR.DESCRIPTION,
			CT.TYPE,
			IM.IMAGE_NAME,
            PR.NUMBER_LIKES
		FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS PR
			LEFT JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
				ON PR.ID = PP.ID_PRODUCT
				LEFT JOIN b97452_proyecto2_if4101.tb_promotion PRM
						ON PRM.ID = PP.ID_PROMOTION
                    JOIN b97452_proyecto2_if4101.tb_category CT
							ON PR.ID_CATEGORY = CT.ID
                       JOIN b97452_proyecto2_if4101.tb_image IM
								ON PR.ID_IMAGE = IM.ID
		WHERE PP.ID_PRODUCT IS NULL OR PP.ID_PROMOTION IS NULL OR PP.IS_ACTIVE = 0
        ORDER BY PR.NUMBER_LIKES DESC;
END;

----------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_REGISTER_CUSTOMER
(
IN param_USER_NAME  VARCHAR(36), 
IN param_PASSWORD   VARCHAR(36),
IN param_FIRST_NAME VARCHAR(36),
IN param_LAST_NAME  VARCHAR(36),
IN param_DATE_BIRTH DATE,
IN param_ADDRESS    VARCHAR(58),
OUT out_RETURN      INT)
BEGIN 
	DECLARE local_CUSTOMER_ID INT;
	IF EXISTS (SELECT USER_NAME FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME AND PASSWORD = param_PASSWORD) THEN
		SELECT 0 INTO out_RETURN;
	ELSE 
		INSERT INTO b97452_proyecto2_if4101.tb_CUSTOMER(FIRST_NAME, LAST_NAME, DATE_BIRTH, ADDRESS)
        VALUES(param_FIRST_NAME, param_LAST_NAME, param_DATA_BIRTH, param_ADDRESS);
		SET local_CUSTOMER_ID = (SELECT LAST_INSERT_ID());
		INSERT INTO b97452_proyecto2_if4101.tb_users(USER_NAME, PASSWORD, ID_ROLE, ID_CUSTOMER)
        VALUES(param_USER_NAME, param_PASSWORD, 2, local_CUSTOMER_ID);
        SELECT 1 INTO out_RETURN;
	END IF;
END;

-------------------------------

CREATE TABLE  b97452_proyecto2_if4101.tb_USER_PRODUCT -- SHOPPING CART 
(
 ID              INT AUTO_INCREMENT PRIMARY KEY
,ID_USER         INT NOT NULL
,ID_PRODUCT      INT NOT NULL
,IS_PURCHASED    BIT(1) DEFAULT 0
,ID_ORDER_HEADER INT NULL
,AMOUNT_PRODUCTS INT NOT NULL
,TOTAL_DETAIL    DECIMAL(9,2) NOT NULL
,CONSTRAINT FK_USER_PRODUCT_USER FOREIGN KEY (ID_USER) REFERENCES b97452_proyecto2_if4101.tb_USERS (ID)
,CONSTRAINT FK_USER_PRODUCT_PRODUCT FOREIGN KEY (ID_PRODUCT) REFERENCES b97452_proyecto2_if4101.tb_products (ID)
,CONSTRAINT FK_USER_PRODUCT_ORDER_HEADER FOREIGN KEY (ID_ORDER_HEADER) REFERENCES b97452_proyecto2_if4101.tb_order_header(ID)
);

-------------------------------
-- RECEIPT
CREATE TABLE b97452_proyecto2_if4101.tb_ORDER_HEADER 
(
	ID            INT AUTO_INCREMENT PRIMARY KEY,
    ID_USER       INT NOt NULL,
    TOTAL         DECIMAL(9, 2) NULL,
    MODIFIED_DATE DATETIME NOT NULL,
	CONSTRAINT FK_ORDER_HEADER_USER FOREIGN KEY (ID_USER) REFERENCES b97452_proyecto2_if4101.tb_USERS (ID)
);

----------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_ALL_PRODUCTS_PROMOTION()
BEGIN 
	SELECT  
		 PR.ID
		,PR.NAME
        ,PR.PRICE
        ,PR.DESCRIPTION
        ,CT.TYPE
        ,IM.IMAGE_NAME
        ,PR.NUMBER_LIKES
        ,PRM.DISCOUNTED_PRICE
        ,PRM.START_DATE
        ,PRM.END_DATE
		,PR.NUMBER_LIKES
	FROM b97452_proyecto2_if4101.tb_products PR
		JOIN b97452_proyecto2_if4101.tb_category CT
			ON PR.ID_CATEGORY = CT.ID
			JOIN b97452_proyecto2_if4101.tb_image IM
				ON PR.ID_IMAGE = IM.ID
                JOIN b97452_proyecto2_if4101.tb_products_promotion PP
					ON PP.ID_PRODUCT = PR.ID
                    JOIN b97452_proyecto2_if4101.tb_promotion PRM
						ON PRM.ID = PP.ID_PROMOTION;
END;

-------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_REGISTER_USER_PRODUCT
(
IN param_USER_NAME       VARCHAR(36), 
IN param_ID_PRODUCT      INT,
IN param_AMOUNT_PRODUCTS INT,
OUT out_RETURN           INT)
BEGIN 
	DECLARE local_USER_ID INT;
    DECLARE local_TOTAL_DETAIL DECIMAL(9,0);
    SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);

	IF EXISTS (SELECT ID_USER, ID_PRODUCT FROM b97452_proyecto2_if4101.tb_USER_PRODUCT WHERE ID_USER = local_USER_ID AND ID_PRODUCT = param_ID_PRODUCT 
    AND IS_PURCHASED = 0) THEN
		SELECT 0 INTO out_RETURN;
	ELSE 	
	SET local_TOTAL_DETAIL = (SELECT  PRICE * param_AMOUNT_PRODUCTS FROM b97452_proyecto2_if4101.tb_PRODUCTS  WHERE ID = param_ID_PRODUCT);
    INSERT INTO b97452_proyecto2_if4101.tb_USER_PRODUCT(ID_USER, ID_PRODUCT, AMOUNT_PRODUCTS, TOTAL_DETAIL)
    VALUES(local_USER_ID, param_ID_PRODUCT, param_AMOUNT_PRODUCTS, local_TOTAL_DETAIL);
	SELECT 1 INTO out_RETURN;
    END IF;
END;

-----------------------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_ALL_PRODUCTS_CUSTOMER(IN param_USER_NAME  VARCHAR(36))
BEGIN 
	DECLARE local_USER_ID INT;
    SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);
	SELECT 
		P.ID,
        P.NAME,
        P.PRICE,
        UP.AMOUNT_PRODUCTS,
        IMG.IMAGE_NAME
	FROM b97452_proyecto2_if4101.tb_user_product UP
		JOIN b97452_proyecto2_if4101.tb_products P
			ON UP.ID_PRODUCT = P.ID
				JOIN b97452_proyecto2_if4101.tb_users U
					ON UP.ID_USER = U.ID
                    JOIN b97452_proyecto2_if4101.tb_image IMG
						ON IMG.ID = P.ID_IMAGE
	WHERE U.ID = local_USER_ID AND UP.IS_PURCHASED = 0;
END;

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_DELETE_PRODUCT_CUSTOMER(
IN param_USER_NAME  VARCHAR(36), 
IN param_ID_PRODUCT INT
)
BEGIN 
	DECLARE local_USER_ID INT;
    SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);
	DELETE FROM b97452_proyecto2_if4101.tb_USER_PRODUCT
	WHERE ID_USER = local_USER_ID AND ID_PRODUCT = param_ID_PRODUCT AND IS_PURCHASED = 0;
END;

----------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_PURCHASE_PRODUCTS(
IN param_USER_NAME VARCHAR(36))
BEGIN 
    DECLARE local_TOTAL_PURCHASE DECIMAL(9,2);
    DECLARE local_USER_ID INT;
    DECLARE local_ID_ORDER_HEADER INT;
    
    SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);
    
    INSERT INTO b97452_proyecto2_if4101.tb_order_header(ID_USER, MODIFIED_DATE)
    VALUES(local_USER_ID, NOW());
    
   SET local_ID_ORDER_HEADER = (SELECT LAST_INSERT_ID());

    UPDATE b97452_proyecto2_if4101.tb_user_product
    SET ID_ORDER_HEADER = local_ID_ORDER_HEADER
	WHERE ID_USER = local_USER_ID AND IS_PURCHASED = 0;
    
	UPDATE b97452_proyecto2_if4101.tb_user_product 
    SET IS_PURCHASED = 1
    WHERE ID_USER = local_USER_ID AND IS_PURCHASED = 0;
    
	SET local_TOTAL_PURCHASE = (SELECT SUM(TOTAL_DETAIL) FROM b97452_proyecto2_if4101.tb_user_product WHERE ID_USER = local_USER_ID AND ID_ORDER_HEADER = local_ID_ORDER_HEADER);
    UPDATE b97452_proyecto2_if4101.tb_order_header
	SET TOTAL = local_TOTAL_PURCHASE
    WHERE ID = local_ID_ORDER_HEADER;
END;

-------------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_PURCHASE_PRODUCT(
IN param_USER_NAME VARCHAR(36),
IN param_ID_PRODUCT INT,
IN param_AMOUNT_PRODUCTS INT)
BEGIN 
     DECLARE local_TOTAL_PURCHASE DECIMAL(9,2);
     DECLARE local_USER_ID INT;
     DECLARE local_ID_ORDER_HEADER INT;
	 SET local_TOTAL_PURCHASE = (SELECT PRICE * param_AMOUNT_PRODUCTS FROM b97452_proyecto2_if4101.tb_products WHERE ID = param_ID_PRODUCT);
     SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);
    
     INSERT INTO b97452_proyecto2_if4101.tb_order_header(ID_USER, TOTAL ,MODIFIED_DATE)
     VALUES(local_USER_ID, local_TOTAL_PURCHASE, NOW());

	 SET local_ID_ORDER_HEADER = (SELECT LAST_INSERT_ID());

	 INSERT INTO b97452_proyecto2_if4101.tb_user_product(ID_USER, ID_PRODUCT,IS_PURCHASED, ID_ORDER_HEADER, AMOUNT_PRODUCTS, TOTAL_DETAIL)
     VALUES(local_USER_ID, param_ID_PRODUCT, 1, local_ID_ORDER_HEADER, param_AMOUNT_PRODUCTS, local_TOTAL_PURCHASE);
END;


-------------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_ORDER_HEADER_CUSTOMER(
IN param_USER_NAME VARCHAR(36))
BEGIN
	DECLARE local_USER_ID INT;    
    SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);
    
    SELECT 
		ID,
        TOTAL,
        MODIFIED_DATE
    FROM b97452_proyecto2_if4101.tb_order_header
    WHERE ID_USER = local_USER_ID;
END;

--------------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_PURCHASED_PRODUCTS(
IN param_USER_NAME       VARCHAR(36),
IN param_ID_ORDER_HEADER INT)
BEGIN
	DECLARE local_USER_ID INT;    
    SET local_USER_ID = (SELECT ID FROM b97452_proyecto2_if4101.tb_users WHERE USER_NAME = param_USER_NAME);
    
    SELECT 
	P.NAME,
    p.PRICE,
    UP.TOTAL_DETAIL,
    SUM(UP.AMOUNT_PRODUCTS) as amount_products
    FROM b97452_proyecto2_if4101.tb_user_product UP
		JOIN b97452_proyecto2_if4101.tb_products P
			ON UP.ID_PRODUCT = P.ID
            JOIN b97452_proyecto2_if4101.tb_users U
				ON U.ID = UP.ID_USER
    WHERE ID_USER = local_USER_ID AND UP.IS_PURCHASED = 1 AND UP.ID_ORDER_HEADER = param_ID_ORDER_HEADER
    GROUP BY P.NAME, UP.ID_ORDER_HEADER;
END;

------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_SEARCH_PRODUCTS(
IN param_PRODUCT_NAME  VARCHAR(36),
IN param_CATEGORY_TYPE VARCHAR(36))
BEGIN
	SELECT  
		PR.ID,
		PR.NAME,
		PR.PRICE,
		PR.DESCRIPTION,
		CT.TYPE,
		IM.IMAGE_NAME,
        PRM.DISCOUNTED_PRICE,
        PR.NUMBER_LIKES
	FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS PR
		LEFT JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
			ON PR.ID = PP.ID_PRODUCT
			LEFT JOIN b97452_proyecto2_if4101.tb_promotion PRM
					ON PRM.ID = PP.ID_PROMOTION
				JOIN b97452_proyecto2_if4101.tb_category CT
						ON PR.ID_CATEGORY = CT.ID
					JOIN b97452_proyecto2_if4101.tb_image IM
							ON PR.ID_IMAGE = IM.ID
	WHERE PR.NAME LIKE CONCAT('%', param_PRODUCT_NAME , '%') AND CT.TYPE = param_CATEGORY_TYPE
	ORDER BY PR.ID ASC;
END;

---------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_PRODUCTS_BY_PRICE_ASC()
BEGIN
   SELECT  
		PR.ID,
		PR.NAME,
		PR.PRICE,
		PR.DESCRIPTION,
		CT.TYPE,
		IM.IMAGE_NAME,
		PR.NUMBER_LIKES
	FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS PR
		LEFT JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
			ON PR.ID = PP.ID_PRODUCT
			LEFT JOIN b97452_proyecto2_if4101.tb_promotion PRM
					ON PRM.ID = PP.ID_PROMOTION
				JOIN b97452_proyecto2_if4101.tb_category CT
						ON PR.ID_CATEGORY = CT.ID
					JOIN b97452_proyecto2_if4101.tb_image IM
							ON PR.ID_IMAGE = IM.ID
	WHERE PP.ID_PRODUCT IS NULL OR PP.ID_PROMOTION IS NULL OR PP.IS_ACTIVE = 0
	ORDER BY PR.PRICE ASC;
END;

-------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_PRODUCTS_BY_PRICE_DESC()
BEGIN
		SELECT  
			PR.ID,
			PR.NAME,
			PR.PRICE,
			PR.DESCRIPTION,
			CT.TYPE,
			IM.IMAGE_NAME,
            PR.NUMBER_LIKES
		FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS PR
			LEFT JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
				ON PR.ID = PP.ID_PRODUCT
				LEFT JOIN b97452_proyecto2_if4101.tb_promotion PRM
						ON PRM.ID = PP.ID_PROMOTION
                    JOIN b97452_proyecto2_if4101.tb_category CT
							ON PR.ID_CATEGORY = CT.ID
                       JOIN b97452_proyecto2_if4101.tb_image IM
								ON PR.ID_IMAGE = IM.ID
		WHERE PP.ID_PRODUCT IS NULL OR PP.ID_PROMOTION IS NULL OR PP.IS_ACTIVE = 0
        ORDER BY PR.PRICE DESC;
END

--------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_PRODUCTS_PROMOTIONS_BY_DATE()
BEGIN
		SELECT  
		PR.ID,
        PR.NAME,
        PR.PRICE,
		PR.DESCRIPTION,
        CT.TYPE,
        IM.IMAGE_NAME,
        PRM.DISCOUNTED_PRICE,
        PR.NUMBER_LIKES
		FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS PR
			JOIN b97452_proyecto2_if4101.tb_PRODUCTS_PROMOTION PP
				ON PR.ID = PP.ID_PRODUCT
					JOIN b97452_proyecto2_if4101.tb_promotion PRM
						ON PRM.ID = PP.ID_PROMOTION
                        JOIN b97452_proyecto2_if4101.tb_category CT
							ON PR.ID_CATEGORY = CT.ID
                            JOIN b97452_proyecto2_if4101.tb_image IM
								ON PR.ID_IMAGE = IM.ID
		WHERE NOW() <= PRM.END_DATE;
END

-------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_INSERT_PRODUCT_LIKE(
IN param_ID_PRODUCT INT)
BEGIN
	UPDATE B97452_PROYECTO2_IF4101.tb_PRODUCTS
		SET NUMBER_LIKES = NUMBER_LIKES + 1
	WHERE ID = param_ID_PRODUCT;
    
    SELECT 
		NUMBER_LIKES
	FROM B97452_PROYECTO2_IF4101.tb_PRODUCTS
    WHERE ID = param_ID_PRODUCT;
END

-------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_REPORT_SALES()
BEGIN
	SELECT 
		ID,
        ID_USER,
        TOTAL,
        MODIFIED_DATE
    FROM b97452_proyecto2_if4101.tb_order_header;
END

-------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_REPORT_SALES_DETAILS(
IN param_ID_ORDER_HEADER INT)
BEGIN
    SELECT 
	P.NAME,
    p.PRICE,
    UP.TOTAL_DETAIL,
    SUM(UP.AMOUNT_PRODUCTS) as amount_products,
    U.USER_NAME
    FROM b97452_proyecto2_if4101.tb_user_product UP
		JOIN b97452_proyecto2_if4101.tb_products P
			ON UP.ID_PRODUCT = P.ID
            JOIN b97452_proyecto2_if4101.tb_users U
				ON U.ID = UP.ID_USER
    WHERE UP.IS_PURCHASED = 1 AND UP.ID_ORDER_HEADER = param_ID_ORDER_HEADER
    GROUP BY P.NAME, UP.ID_ORDER_HEADER;
END;

-------------------------------------------------

DELIMITER $$
CREATE PROCEDURE b97452_proyecto2_if4101.sp_GET_REPORT_SALES_SEARCH(
IN param_START_DATE datetime,
IN param_END_DATE   datetime)
BEGIN
  	SELECT 
		ID,
        ID_USER,
        TOTAL,
        MODIFIED_DATE
    FROM b97452_proyecto2_if4101.tb_order_header
	WHERE MODIFIED_DATE >= param_START_DATE AND MODIFIED_DATE <= param_END_DATE;
END;

