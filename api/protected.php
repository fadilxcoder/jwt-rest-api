<?php
    include_once './config/Database.php';
    require "../vendor/autoload.php";

    use \Firebase\JWT\JWT;

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    $secret_key = "3600B52E2FF4D504190A53E0E43BC954194CD07C65A594CD27D9ECCFA753E3E0";
    $jwt = null;
    $databaseService = new DatabaseService();
    $conn = $databaseService->getConnection();

    $data = json_decode(file_get_contents("php://input"));

    $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    $arr = explode(" ", $authHeader);


    // print_r($arr);
    $jwt = $arr[1];

    if($jwt){
        try {
            $decoded = JWT::decode($jwt, $secret_key, array('HS256'));
            // Access is granted. Add code of the operation here 

            echo json_encode([
                "message" => "Access granted:",
                // "error" => $e->getMessage()
            ]);

        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode([
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ]);
        }
    }
?>