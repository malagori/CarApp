<?php

/**
 * Author: Mehmood Alam Khan
 * Email: malagori@kth.se
 * Dated: 5 April 2014
 */

class MyConstants{
	public function __construct()
	{}

	public function __destruct()
	{

	}
	const ABS_URL = "http://localhost/carapp/";
	const APP_NAME="Car Application";			//name of our application

	const KUND_REG_FAILURE_PAGE = "src/html_code/KundRegFailure.php?msg=";
	const CAR_REG_FAILURE_PAGE = "src/html_code/CarRegFailure.php?msg=";
	const DAMAGE_REG_FAILURE_PAGE = "src/html_code/DamageRegFailure.php?msg=";
	const KUND_REG_SUCCESS_PAGE = "../html_code/KundRegSuccess.php?msg=";
	const KUND_REG_EXCEPTION = "Problem in registering Customer !!! Please try again ...";
	const CAR_REG_EXCEPTION = "Problem in registering Car !!! Please try again ...";
	const DAMAGE_REG_EXCEPTION = "Problem in registering Damage !!! Please try again ...";
    const PERMISSION_DENIED= "Location: http://localhost/carapp/index.php?msg=Permission Denied!!!";

	//database Constants
	const DB_HOST = "localhost";			// database server hostname
	const DB_USER = "mehmood";				// database access username
	const DB_PASSWORD = "123";					// database access password
	const DB_NAME = "Nisha_car1";			// name of database
	
	const ADMIN_USERNAME= "Admin";

	const POST='post';

	// defining constant for CRUD
	const CREATE	='create';
	const UPDATE	='update';
	const DELETE	='delete';
	const SEARCH	='search';

	const EXPIRED = "expired";
	const ONE = 1;
	const ZERO= 0;
	const OFF ="off";
	const ON = "on";


	//these two variables are used for pagination
	const RECORDS_PER_PAGE=4;
	const RECORDS_DIVISION=2;

	// Allowed length for deferent text fields on html pages
	const FIRSTNAME_LENGTH	=50;		//allowed character length for first name
	const LASTNAME_LENGTH	=50;		//allowed character length for last name
	const ADDRESS_LENGTH 	=500;
	const EMAIL_LENGTH		=50;

	//Login Session Contants
	const ADMIN_SET = 1;
	const ADMIN_CLEAR = 0;
	const ADMIN_SESSION_EXPIRE_TIME = 1000;


	const SESSION_EXPIRED_MSG = "Location: http://localhost/carapp/index.php?msg=Session Expired!!! You have to login again...";
	const NOT_LOGGED_MSG = "Location: http://localhost/carapp/index.php?msg=You are not logged in!!!";



				
	}

 ?>