<?php
session_start();
include "database.php";
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    
    if (isset($_POST["submit"])) {
        print("Helloworld");
        $sql = "select * from register where name='{$_POST["uname"]}' and password='{$_POST["upass"]}'";
        print($sql);
        $res = $db->query($sql);

        if ($res->num_rows > 0) {
            print("Hello");
            $row = $res->fetch_assoc();
            $_SESSION["ID"] = $row["id"];
            $_SESSION["NAME"] = $row["name"];

            header("location:thank.php");
        } else {
            print("<p class='alert alert-danger m-5'>Error in Login...</p>");
        }
    }
    ?>




    <div class="card">
        <h3>Account Login</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="uname">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="upass">
            </div>
            <div class="more">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#">Forget Password ?</a>
            </div>
            <button type="submit" name="submit" id="signin">Sign In</button>
        </form>
    </div>



</body>

</html>