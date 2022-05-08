<?php 
session_start();
require_once("db_connect.php");


$username = "";
$password = "";
$email = "";

$errors = array(
    "username" => false,
    "password" => false,
    "email" => false
);


    if (isset($_POST['login'])) {
        //echo "Login setan";
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT userID,username,password FROM Users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn) or die("napaka pri inicializaciji");
        mysqli_stmt_prepare($stmt,$sql) or die("Napak pri preparu");
        mysqli_stmt_bind_param($stmt,'s',$username) or die("Napaka pr bindanju");
        mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            //echo "Vrnilo je vsaj 1 rezultat";
            while ($row = mysqli_fetch_assoc($result)) {
                //echo "Smo v while loopu";
                if ($row['username'] === $username && password_verify($password,$row['password']) == 1) {
                    //echo "Smo v if stavku";
                    $_SESSION['id'] = $row['userID'];
                    Header("Location: main.php");
                    exit;
                }
                $errors["username"] = "Incorrect username";
            }
        } else {
            $errors["password"] = "Incorrect username or password";    
        }
       
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/photoEditor.css" rel="stylesheet">
    <title>PHOTOEDITOR - LOGIN</title>
</head>
<body>
<div class="registracija">
        <div class="registracija-wrapper">
            
            <div class="right">
                
                <div class="form-wrapper">
                    <h1 class="register-heading">Login to LuPixl<span><img class="logo" src="./assets/letter_p.png"</span></h1>
                    <form class="form" action="login.php" method="POST">
                       
                        <input type="text" name="username" placeholder="username" class="input" required value="<?php echo $username ?>">
                        <p class="error"><?php echo htmlspecialchars($errors["username"]) ?></p>
                        

                    
                        <input type="password" name="password" placeholder="geslo" class="input" required value="<?php echo $password ?>">
                        <p class="error"><?php echo htmlspecialchars($errors["password"]) ?></p>
                        
                        <button type="submit" name="login" class="registracija-gumb">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>