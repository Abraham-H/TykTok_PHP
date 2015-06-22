<?php
 
//Following code will update expense information
 
//Array for JSON response
$response = array();
 
//Check for required fields
if (isset($_POST['eid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['staffId'])) {
 
    $eid = $_POST['eid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $staffId = $_POST['staffId'];
 
    //Include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    //Connecting to db
    $db = new DB_CONNECT();
 
    //Mysql update row with matched eid
    $result = mysql_query("UPDATE expenses SET name = '$name', price = '$price', staffId = '$staffId' WHERE eid = $eid");
 

/////////////////////////////////////////////////////////////////////Echoing JSON response/Testing///////////////////////////////////////////

    //Check if row inserted or not
    if ($result) {
        //Successfully updated
        $response["success"] = 1;
        $response["message"] = "Expense successfully updated.";
 
        //Echoing JSON response
        echo json_encode($response);
    } else {
 
    }
} else {
    //Required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    //Echoing JSON response
    echo json_encode($response);
}
?>