<?php
 
//Following code will create a new coords row
 
//Array for JSON response
$response = array();
 
//Check for required fields
if (isset($_POST['staffId']) && isset($_POST['lat']) && isset($_POST['longit'])) {
 
    $staffId = $_POST['staffId'];
    $lat = $_POST['lat'];
    $longit= $_POST['longit'];

    //Include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    //Connecting to db
    $db = new DB_CONNECT();
 
    //Mysql inserting a new row
    $result = mysql_query("INSERT INTO coords(staffId, lat, longit) VALUES('$staffId', '$lat', '$longit')");
 

/////////////////////////////////////////////////////////////////////Echoing JSON response/Testing///////////////////////////////////////////

    //Check if row inserted or not
    if ($result) {
        //Successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Successfully added.";
 
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