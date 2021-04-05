<?php
    require_once "../config/connection.php";
    require_once "functions.php";
    session_start();
    ob_start();
    header("Content-type:application/json");
    $data = null;
    $code = 404;

    if(isset($_POST['sent'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confPass = $_POST['confPass'];

        $nameSurnameRegex="/^[A-Z][a-z]{1,29}(\s[A-Z][a-z])?$/";
        $emailRegex = "/^[\w][\w\_\-\.\d]+\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/";
        $passRegex = "/^[\w\-\!\@\#\$\%\^\&\*\(\)\_\+\d]{6,}$/";

        $errors = [];

        if($name == ""){
            $errors[] = "Name mustn't be blank.";
        }elseif(!preg_match($nameSurnameRegex,$name)){
            $errors[] = "Name can contain maximum 2 words,with first letter uppercase";
        }

        if($surname == ""){
            $errors[] = "Surname mustn't be blank.";
        }elseif(!preg_match($nameSurnameRegex,$surname)){
            $errors[] = "Surname can contain maximum 2 words,with first letter uppercase";
        }

        if($email == ""){
            $errors[] = "Email mustn't be blank.";
        }elseif(!preg_match($emailRegex,$email)){
            $errors[] = "Email isn't in good format.";
        }

        if($pass == ""){
            $errors[] = "Password mustn't be blank.";
        }elseif(!preg_match($passRegex,$pass)){
            $errors[] = "Password should contains at least 6 characters.";
        }

        if($confPass == ""){
            $errors[] = "You need to confirm password.";
        }elseif($confPass != $pass){
            $errors[] = "Passwords do not match.";
        }

        if(count($errors) != 0){
            $code = 422;
            $data = $errors;
        }else{
            $pass = md5($pass);

            $query = "INSERT INTO user(name,surname,password,email) VALUES(?,?,?,?)";

            try {
                $result = $conn->prepare($query);

                $success = $result->execute([$name,$surname,$pass,$email]);

                $code = $success ? 201 : 500;

            } catch (PDOException $e) {
                $code = 409;
                echo $e->getMessage();
                noteErrorInFile($e->getMessage());
            }

        }
    }

    echo json_encode($data);
    http_response_code($code);
?>