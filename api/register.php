<?php
    include_once './config/Database.php';

    header("Access-Control-Allow-Origin: * ");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $fname = '';
    $email = '';
    $password = '';
    $conn = null;

    $databaseService = new DatabaseService();
    $conn = $databaseService->getConnection();

    $data = json_decode(file_get_contents("php://input"));
    $fname = $data->fname;
    $email = $data->email;
    $password = $data->password;
    $password = password_hash($password, PASSWORD_BCRYPT);

    $table_name = 'jwt_users';
    $query = "INSERT INTO " . $table_name . " SET full_name = :fname, email = :email, password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(array("message" => "User was successfully registered."));
    }else{
        http_response_code(400);
        echo json_encode(array("message" => "Unable to register the user."));
    }
?>