<?php
 
//Following code will delete an expense from table
 
 
//Array for JSON response
$response = array();
 
//Check for required fields
if (isset($_POST['eid'])) {
    $eid = $_POST['eid'];
 
    //Include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    //Connecting to db
    $db = new DB_CONNECT();
 
    //Mysql update row with matched eid
    $result = mysql_query("DELETE FROM expenses WHERE eid = $eid");
 

/////////////////////////////////////////////////////////////////////Echoing JSON response/Testing///////////////////////////////////////////

    //Check if row deleted or not
    if (mysql_affected_rows() > 0) {
        //Successfully updated
        $response["success"] = 1;
        $response["message"] = "Expense successfully deleted";
 
        //Echoing JSON response
        echo json_encode($response);
    } else {
        //No expense found
        $response["success"] = 0;
        $response["message"] = "No expense found";
 
        // echo no users JSON
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