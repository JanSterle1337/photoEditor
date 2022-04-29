<?php 
    header('Access-Control-Allow-Origin: *');
    if (isset($_POST['submit'])) {
        $filename = $_FILES['datoteka']['name'];
            $allowed_extensions = array('jpg','jpeg','png');
            $extension = pathinfo($filename,PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $allowed_extensions)) {
                if (move_uploaded_file($_FILES['datoteka']['tmp_name'], "./assets/".$filename)) {
                    header("Location: main.php");
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
    } else {
        echo 0;
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHOTOEDITOR - UPLOAD</title>
</head>
<body>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="datoteka"/>
        <button name="submit" type="submit">Upload photo</button>
    </form>
</body>
</html>