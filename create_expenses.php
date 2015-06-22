<?php

//Following code will create a new expense row
 
// array for JSON response
$response = array();
 
//Check for required fields
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['staffId'])) {
 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $staffId = $_POST['staffId'];
 
    //Include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    //Connecting to db
    $db = new DB_CONNECT();
 
    //Mysql inserting a new row
    $result = mysql_query("INSERT INTO expenses(name, price, staffId) VALUES('$name', '$price', '$staffId')");
 
    //Check if row inserted or not
    if ($result) {
        //Successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Expense successfully created.";
 
///////////////////////////////////////////////////////////Echoing JSON response/Testing////////////////////////////////////////////////////////////////////////////

        echo json_encode($response);
    } else {
        //Failed to insert row
        $response["success"] = 0;
        $response["message"] = "An error occurred.";
 
        //Echoing JSON response
        echo json_encode($response);
    }
} else {
    //Required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    //Echoing JSON response
    echo json_encode($response);
}
?>