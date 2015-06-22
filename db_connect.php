
<?php
 

//The following code is used to connect to database
 

class DB_CONNECT {
 
    //Constructor
    function __construct() {
        //Connecting to database
        $this->connect();
    }
 
    //Destructor
    function __destruct() {
        //Closing db connection
        $this->close();
    }
 
   //Function to connect with db
     
    function connect() {

        //Import db variables
        require_once __DIR__ . '/db_config.php';
 
        //Connecting db
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
 
        //Selecing db
        $db = mysql_select_db(DB_DATABASE) or die(mysql_error()) or die(mysql_error());
 
        //Returing connection cursor
        return $con;
    }
 
   //Function to close db connection
     
    function close() {
        //Closing db connection
        mysql_close();
    }
 
}
 
?>