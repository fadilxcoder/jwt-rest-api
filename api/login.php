<?php
    include_once './config/Database.php';
    require "../vendor/autoload.php";
    
    use \Firebase\JWT\JWT;

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $email = '';
    $password = '';

    $databaseService = new DatabaseService();
    $conn = $databaseService->getConnection();

    $data = json_decode(file_get_contents("php://input"));
    $email = $data->email;
    $password = $data->password;

    $table_name = 'jwt_users';
    $query = "SELECT id, full_name, password FROM " . $table_name . " WHERE email = ? LIMIT 0,1";
    $stmt = $conn->prepare( $query );
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        $fullname = $row['full_name'];
        $password2 = $row['password'];

        if(password_verify($password, $password2))
        {
            $secret_key = "3600B52E2FF4D504190A53E0E43BC954194CD07C65A594CD27D9ECCFA753E3E0";
            $token = [
            #    'iss' => 'localhost', # A string containing the name or identifier of the issuer application. Can be a domain name and can be used to discard tokens from other applications.
            #    'aud' => 'mobile apps', # The audience
            #    'iat' => time(), # Issued At
            #    'nbf' => time(), # Timestamp of when the token should start being considered valid. Should be equal to or greater than iat. (seconds)
            #    'exp' => time() + 3600, # Timestamp of when the token should stop to be valid. Needs to be greater than iat and nbf. (seconds)
                'data' => [
                    'id' => $id,
                    'fullname' => $fullname,
                ]
            ];

            http_response_code(200);
            $jwt = JWT::encode($token, $secret_key);
            echo json_encode(
                [
                    "message" => "Successful login.",
                    "jwt" => $jwt,
                    "id" => $id,
                    "name" => $fullname
                ]
            );
        }else{
            http_response_code(401);
            echo json_encode(array("message" => "Login failed.", "password" => $password));
        }
    }
?>