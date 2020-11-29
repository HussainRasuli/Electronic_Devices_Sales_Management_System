CREATE DATABASE electronic_device_sales_management_system CHARACTER SET utf8 COLLATE utf8_general_ci;
					
					USE electronic_device_sales_management_system;
				
					CREATE TABLE employee (
						employee_id			INT PRIMARY KEY AUTO_INCREMENT,
						firstname 			VARCHAR(32) NOT NULL ,
						lastname			VARCHAR(32) NOT NULL,
						gross_salary		INT NOT NULL,
						currency			CHAR(3) NOT NULL,
						email				VARCHAR(128) UNIQUE ,
						dob					INT NOT NULL,
						phone				CHAR(10) UNIQUE NOT NULL	 ,
						gender				BOOLEAN NOT NULL,
						photo				VARCHAR(128) NOT NULL,
						province			VARCHAR(32) NOT NULL,
						district			VARCHAR(64) NOT NULL,
						location			VARCHAR(128) ,
						position			VARCHAR(64) NOT NULL
					);
					
					CREATE TABLE attendance (
						employee_id	  		INT  ,
						date_year			INT  ,
						date_month			INT  ,
						date_day 			INT ,
						absent_hour			INT NOT NULL,
						CONSTRAINT attendance_pk PRIMARY KEY (employee_id, date_year, date_month, date_day),
						CONSTRAINT employee_attendance_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
					);
					
					CREATE TABLE overtime (
						employee_id			INT  ,
						date_year			INT  ,
						date_month			INT  ,
						date_day			INT  ,
						overtime_hour		INT NOT NULL,
						CONSTRAINT overtime_pk PRIMARY KEY (employee_id, date_year, date_month, date_day),
						CONSTRAINT employee_overtime_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
					);
					
					CREATE TABLE payroll (
						employee_id	 		INT  ,
						date_year			INT  ,
						date_month	 		INT ,
						absent_amount		FLOAT NOT NULL DEFAULT 0,
						overtime_amount		FLOAT NOT NULL DEFAULT 0,
						bonus				FLOAT NOT NULL DEFAULT 0,
						tax					FLOAT NOT NULL DEFAULT 0,
						net_salary			FLOAT NOT NULL	,
						exchange			FLOAT NOT NULL DEFAULT 1,
						changed_amount		FLOAT NOT NULL,
						paid				BOOLEAN NOT NULL DEFAULT 1,
						CONSTRAINT payroll_pk PRIMARY KEY (employee_id, date_year, date_month),
						CONSTRAINT employee_payroll_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE NO ACTION ON UPDATE CASCADE
					);
					
					CREATE TABLE  purchase (
						purchase_id			INT PRIMARY KEY AUTO_INCREMENT,
						purchase_date		DATE NOT NULL,
						employee_id			INT ,
						CONSTRAINT employee_purchase_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE SET NULL ON UPDATE CASCADE
					);
					
					CREATE TABLE  purchase_detail (
						detail_id			INT PRIMARY KEY AUTO_INCREMENT,
						item_name			VARCHAR(64) NOT NULL,
						category			VARCHAR(64) NOT NULL,
						quantity			INT NOT NULL,
						unitprice			FLOAT NOT NULL,		
						totalprice			FLOAT NOT NULL,
						purchase_id			INT NOT NULL ,
						CONSTRAINT purchase_purcahse_detail_fk FOREIGN KEY (purchase_id) REFERENCES purchase (purchase_id) ON DELETE CASCADE ON UPDATE CASCADE
					);
					
					CREATE TABLE raw_item (
						item_id					INT PRIMARY KEY AUTO_INCREMENT,
						item_name				VARCHAR(64) NOT NULL,
						category				VARCHAR(64) NOT NULL,
						quantity				FLOAT NOT NULL
					);
					
					CREATE TABLE product (
						product_id				INT PRIMARY KEY AUTO_INCREMENT,
						product_name			VARCHAR(64) NOT NULL,
						warranty				VARCHAR(32) NOT NULL,
						unitprice				FLOAT NOT NULL,
						quantity				INT NOT NULL
					);
					
					CREATE TABLE customer (
						customer_id				INT PRIMARY KEY AUTO_INCREMENT,
						customer_name			VARCHAR(64) NOT NULL,
						address					VARCHAR(128) NOT NULL,
						phone					VARCHAR(16) ,
						email				    VARCHAR(128) UNIQUE
						
					);
					
					CREATE TABLE sales (
						sales_id				INT PRIMARY KEY AUTO_INCREMENT,
						customer_id				INT NOT NULL ,
						sale_date				DATE NOT NULL,
						CONSTRAINT customer_sales_fk FOREIGN KEY (customer_id) REFERENCES customer (customer_id) ON DELETE CASCADE ON UPDATE CASCADE
					);
					
					CREATE TABLE sales_detail (
						detail_id				INT PRIMARY KEY AUTO_INCREMENT,
						product_id				INT NOT NULL ,
						quantity				INT NOT NULL,
						unitprice				FLOAT NOT NULL,
						totalprice				FLOAT NOT NULL,
						sales_id				INT NOT NULL ,
						CONSTRAINT product_sales_detail_fk FOREIGN KEY (product_id) REFERENCES product (product_id) ON DELETE CASCADE ON UPDATE CASCADE ,
						CONSTRAINT sales_sales_detail_fk FOREIGN KEY (sales_id) REFERENCES sales (sales_id) ON DELETE CASCADE ON UPDATE CASCADE
					);
					
					CREATE TABLE  income (
						income_id				INT PRIMARY KEY AUTO_INCREMENT,
						customer_id				INT NOT NULL ,
						sales_id				INT NOT NULL ,
						income_date				DATE NOT NULL,
						amount					FLOAT NOT NULL,
						CONSTRAINT customer_income_fk FOREIGN KEY (customer_id) REFERENCES customer (customer_id) ON DELETE NO ACTION ON UPDATE CASCADE,
						CONSTRAINT sales_income_fk FOREIGN KEY (sales_id) REFERENCES sales (sales_id) ON DELETE NO ACTION ON UPDATE CASCADE
					);
					
					CREATE TABLE chartofaccount (
						account_id				INT PRIMARY KEY AUTO_INCREMENT,
						account_name			VARCHAR(64) NOT NULL UNIQUE
					);
					
					CREATE TABLE expense (
						expense_id				INT PRIMARY KEY AUTO_INCREMENT,
						account_id				INT NOT NULL ,
						amount					FLOAT NOT NULL,
						expense_date			DATE NOT NULL,
						employee_id				INT ,
						CONSTRAINT chartofaccount_expense_fk FOREIGN KEY (account_id) REFERENCES chartofaccount (account_id) ON DELETE NO ACTION ON UPDATE CASCADE,
						CONSTRAINT employee_expense_fk FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE SET NULL ON UPDATE CASCADE
					);
					
					CREATE TABLE loan (
						loan_id					INT PRIMARY KEY AUTO_INCREMENT,
						company_name			VARCHAR(64) NOT NULL,
						amount					FLOAT NOT NULL,
						currency				CHAR(3) NOT NULL,
						loan_date				DATE NOT NULL,
						pay_date				DATE NOT NULL
					);
					
					CREATE TABLE users (
						user_id					INT PRIMARY KEY AUTO_INCREMENT,
						username				VARCHAR(32) NOT NULL ,
						email       			VARCHAR(32) NOT NULL UNIQUE ,
						password				VARCHAR(64) NOT NULL 
						
					);