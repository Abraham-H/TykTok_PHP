<?php
 
//Following code will list all the expenses in expenses table
 
 
//Array for JSON response
$response = array();
 
//Include db connect class
require_once __DIR__ . '/db_connect.php';
 
//Connecting to db
$db = new DB_CONNECT();
 
//Get all expenses from expenses table
$result = mysql_query("SELECT *FROM expenses") or die(mysql_error());
 
//Check for empty result
if (mysql_num_rows($result) > 0) {
    //Looping through all results
  
    $response["expenses"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $expense = array();
        $expense["eid"] = $row["eid"];
        $expense["name"] = $row["name"];
        $expense["price"] = $row["price"];
        $expense["created_at"] = $row["created_at"];
        $expense["updated_at"] = $row["updated_at"];
 
        //Push single expense into final response array
        array_push($response["expenses"], $expense);
    }

    //Echoing JSON response/Testing

    //Success
    $response["success"] = 1;
 

    echo json_encode($response);
} else {
    //No expense found
    $response["success"] = 0;
    $response["message"] = "No expenses found";
 
    //Echo no users JSON
    echo json_encode($response);
}
?>