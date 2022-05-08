<?Php 
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

if (isset($_POST['registration'])) {
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    

    $hashedPassw = password_hash($password,PASSWORD_DEFAULT);
    if (strlen($username) > 5 && strlen($password) > 8) {
        $stmt = mysqli_stmt_init($conn) or die("napaka pri inicializaciji");
        $sql = "INSERT INTO Users (username,email,password) VALUES(?,?,?)";
        mysqli_stmt_prepare($stmt,$sql) or die("Napak pri preparu");
        mysqli_stmt_bind_param($stmt,'sss',$username,$email,$hashedPassw) or die("Napaka pr bindanju");
        mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
       
        $getResult = mysqli_stmt_get_result($stmt);
        echo $getResult;

        $sql = "SELECT userID FROM Users WHERE username = ?";
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'s',$username);
        mysqli_stmt_execute($stmt) or die (mysqli_error($conn));
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['id'] = $row['userID'];
            Header("Location: main.php");
            exit;
        }

    } else {
        $errors["username"] = "Username must be at least 6 characters long";
        $errors["password"] = "Password must be at least 8 characters long";
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
    <title>PHOTOEDITOR | REGISTRATION</title>
</head>
<body>
    <div class="registracija">
        <div class="registracija-wrapper">
            
            <div class="right">
                
                <div class="form-wrapper">
                    <h1 class="register-heading">Register to LuPixl<span><img class="logo" src="./assets/letter_p.png"</span></h1>
                    <form class="form" action="registration.php" method="POST">
                       
                        <input type="text" name="username" placeholder="username" class="input" required value="<?php echo $username ?>">
                        <p class="error"><?php echo htmlspecialchars($errors["username"]) ?></p>
                        

                        <input type="email" name="email" placeholder="e-mail" class="input" required value="<?php echo $email ?>">
                        <p class="error"><?php echo htmlspecialchars($errors["email"]) ?></p>

                        <input type="password" name="password" placeholder="geslo" class="input" required value="<?php echo $password ?>">
                        <p class="error"><?php echo htmlspecialchars($errors["password"]) ?></p>
                        
            

                        <button type="submit" name="registration" class="registracija-gumb">Registracija</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>