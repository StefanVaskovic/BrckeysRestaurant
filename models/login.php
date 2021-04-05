<?php
    ob_start();
    session_start();
    require "../config/connection.php";
    require "statistics/functions.php";
 
    if(isset($_POST['btnLogin'])){
        $email = $_POST['emailLogin'];
        $pass = $_POST['passLogin'];

        $errors = [];

        $emailregex = "/^[\w][\w\_\-\.\d]+\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/";
        $passRegex = "/^[\w\-\!\@\#\$\%\^\&\*\(\)\_\+\d]{6,}$/";


        if($email == ""){
            $errors[] = "Email should not be empty.";
        }elseif(!preg_match($emailregex,$email)){
            $errors[] = "Wrong email.";
        }
        if($pass == ""){
            $errors[] = "Password should not be empty.";
        }elseif(!preg_match($passRegex,$pass)){
            $errors[] = "Wrong password.";
            $query2 = "SELECT u.*,r.name as roleName FROM user u INNER JOIN role r ON u.idRole = r.idRole WHERE email = ? AND active = 1";

            try {
                $result = $conn->prepare($query2);

                $result->execute([$email]);
                $user2 = $result->fetch();

                if($result->rowCount() == 1){
                    $to  = $user2->email;
                    $subject = 'Login failed';
                    $message = 'Somebody tried to login and failed!';
                    $headers = 'From: admin@gmail.com' . "\r\n" .
                        'Reply-To:'.$user2->email . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    
                    mail($to, $subject, $message, $headers);
                }

                } catch (PDOException $e) {
                    echo $e->getMessage();
                    noteErrorInFile($e->getMessage());
                }

        }

        if(count($errors)!=0){
            $_SESSION['errors'] = $errors;
            header("Location: ../index.php?page=login");
        }else{
            $pass = md5($pass);

            $query = "SELECT u.*,r.name as roleName FROM user u INNER JOIN role r ON u.idRole = r.idRole WHERE email = ? AND password = ? AND active = 1";

            try {
                $stmt = $conn->prepare($query);

                $stmt->execute([$email,$pass]);
                $user = $stmt->fetch();

                if($user){
                    $_SESSION['user'] = $user;
                    noteLogin($user->idUser);
                    if($user->roleName == "user"){
                        header("Location: ../index.php?page=home");
                    }else{
                        header("Location: ../index.php?page=admin&admin=true");
                    }
                }else{
                  
                    $_SESSION['errors']=["Wrong email or password."];
                    noteErrorInFile("Wrong email or password.");
                    header("Location: ../index.php?page=login");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                noteErrorInFile($e->getMessage());
            }
        } 
    }
?>