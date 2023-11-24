<?php session_start();



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="user-page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1>Unesite username</h1>
            <form action="" method="POST" class="form-container">
                <div class="input-group">
                    <label for="user_name">Username:</label>
                    <input type="text" id="user_name" name="user_name" placeholder="Enter your Username">
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your Password">
                </div>
                <div class="form-footer">
                    <button type="submit" name="submit" id="btn-play">Play</button>
                    <a href="index.html" class="btn-back">Nazad</a>
                </div>
            </form>
            <p id="test"></p>
        </div>
    </div>
</body>
</html>


<?php 
if (isset($_POST['submit'])){

    $user_name = $_POST['user_name'];
    $password = ($_POST['password']);
    $_SESSION['us'] = $user_name;
     
            $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_connect_error()); 
            $db_select = mysqli_select_db($conn, '2048') or die(mysqli_error());
            
            if (isset($_POST['submit'])) {
                $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                
                if (empty($user_name) || empty($password)) {
                    echo "Potrebno je unijeti username i password.";
                } else {
                    $sql_check_user = "SELECT * FROM tbl_user WHERE user_name='$user_name'";
                    $res_check_user = mysqli_query($conn, $sql_check_user);
            
                    if (mysqli_num_rows($res_check_user) > 0) {
                        // Postoji korisnik dohvati njegove podatke
                        $user_info = mysqli_fetch_assoc($res_check_user);
            
                        // Pogledaj jel lozinka tocna
                        if ($password === $user_info['password']) {
                            //  Lozinka tocna, postavi session varijablu i redirect
                            $_SESSION['user_name'] = $user_name;
                            header("Location: 2048mp.php");
                            exit();
                        } else {
                           
                            echo "Pogrešna lozinka. Pokušajte ponovno.";
                        }
                    } else {
                        //  KOrisnik nepostojeci, unesi ga
                        $sql_insert = "INSERT INTO tbl_user (user_name, password, high_score) VALUES ('$user_name', '$password', 0)";
                        $res_insert = mysqli_query($conn, $sql_insert);
            
                        if ($res_insert == TRUE) {
                            // Korisnik uspjesno dodan, postavi session varijablu i redirect
                            $_SESSION['user_name'] = $user_name;
                            header("Location: 2048mp.php");
                            exit();
                        } else {
                           
                            echo "Failed to add new user.";
                        }
                    }
                }
            }
            
            
 
 
 } ?>

<script>
     $(document).ready(function(){
            $("input").keyup(function(){
                var name = $("input").val();
                $.post("provjera.php", {
                    suggestion: name
                }, function(data, status){
                    $("#test").html(data);
                });
            })
        });
</script>