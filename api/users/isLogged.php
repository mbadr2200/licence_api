<?php
session_start();
require_once("../../config/functions.php");
isLogged();

// headers 
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json");
header("Access-Control-Allow-Method: GET");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,,Authorization , X-Requested-With");

// includes 
include_once "../../config/Database.php";
include_once "../../models/User.php";

// database 
$database = new Database();
$db = $database->connect();

$User = new User($db);

if(isset($_SESSION["user_id"]))
{
    $user = [
        "userId" => $_SESSION["user_id"] ,
        "userName" => $_SESSION["user_name"]

    ];

    $res = [
        "message" => "user is logged in",
        "user" => $user
    ];

    print_r(json_encode($res));
}
else
{
    echo "no";
}