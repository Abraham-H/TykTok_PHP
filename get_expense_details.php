<?php
 
//Following code will get one expenses details//Expense is identified by eid
 
//Array for JSON response
$response = array();
 
//Include db connect class
require_once __DIR__ . '/db_connect.php';
 
//Connecting to db
$db = new DB_CONNECT();
 
//Check for post data
if (isset($_GET["eid"])) {
    $eid = $_GET['eid'];
 
    //Get an expense from expense table
    $result = mysql_query("SELECT *FROM expenses WHERE eid = $eid");
 
    if (!empty($result)) {
        //Check for empty result
        if (mysql_num_rows($result) > 0) {
 
            $result = mysql_fetch_array($result);
 
            $expense = array();

            $expense["eid"] = $result["eid"];
            $expense["name"] = $result["name"];
            $expense["price"] = $result["price"];
            $expense["staffId"] = $result["staffId"];
            $expense["created_at"] = $result["created_at"];
            $expense["updated_at"] = $result["updated_at"];


/////////////////////////////////////////////////////////////////////Echoing JSON response/Testing///////////////////////////////////////////

            //Success
            $response["success"] = 1;
 
            //Node
            $response["expense"] = array();
 
            array_push($response["expense"], $expense);
 
            //Echoing JSON response
            echo json_encode($response);
        } else {
            //No expense found
            $response["success"] = 0;
            $response["message"] = "No expense found";
 
            //Echo no node JSON
            echo json_encode($response);
        }
    } else {
        //No expense found
        $response["success"] = 0;
        $response["message"] = "No expense found";
 
        //Echo no node JSON
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