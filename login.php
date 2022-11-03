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
        $email = $_POST["uemail"];
        $sql = "select * from register where email='{$_POST["uemail"]}' and password='{$_POST["upass"]}'";
        $res = $db->query($sql);

        print_r($res);

        if ($res->num_rows > 0) {
            print("bello");
            $row = $res->fetch_assoc();
            $_SESSION["ID"] = $row["id"];
            $_SESSION["NAME"] = $row["name"];

            header("location:thank.php");
        } else {
            print("<p class='alert alert-danger m-5'>Error in Login...</p>");
        }
    }
    ?>


    <div class="card col-lg-5 col-sm-6 col-6">
        <h3>Account Login</h3>
        <form action="" method="post">
            <div class="form-group">
                <div class="holder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                    </svg>

                    <label for="name">E-mail</label>
                </div>
                <input type="email" id="uemail" name="uemail">
            </div>
            <div class="form-group">
                <div class="holder">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                    <label for="name">Phone</label>
                </div>
                <input type="password" id="upass" name="upass">
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