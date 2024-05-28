<?php 
session_start();

$conn = mysqli_connect('localhost', 'root', '', '2048') or die(mysqli_error());

if (isset($_POST['submit'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($user_name) || empty($password)) {
        echo "<div class='message'>Potrebno je unijeti username i password.</div>";
    } else {
        $sql_check_user = "SELECT * FROM tbl_user WHERE user_name='$user_name'";
        $res_check_user = mysqli_query($conn, $sql_check_user);

        if (mysqli_num_rows($res_check_user) > 0) {
            $user_info = mysqli_fetch_assoc($res_check_user);
            if ($password === $user_info['password']) {
                $_SESSION['user_name'] = $user_name;
                $_SESSION['is_admin'] = $user_info['is_admin'];

                if ($user_info['is_admin'] == 1) {
                   
                    header("Location: tablica.php");
                    exit();
                } else {
                   
                    header("Location: 2048mp.php");
                    exit();
                }
            } else {
                echo "<div class='message'>Pogrešna lozinka. Pokušajte ponovno.</div>";
            }
        } else {
            echo "<div class='message'>Korisnik ne postoji.</div>";
        }
    }
}

if (isset($_POST['register'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    if (empty($user_name) || empty($password)) {
        echo "<div class='message'>Potrebno je unijeti username i password.</div>";
    } else {
        
        $sql_user_exists = "SELECT * FROM tbl_user WHERE user_name='$user_name'";
        $res_user_exists = mysqli_query($conn, $sql_user_exists);
        
        if (mysqli_num_rows($res_user_exists) > 0) {
            echo "<div class='message'>Korisničko ime već postoji. Odaberite drugo.</div>";
        } else {
            
            $sql_insert = "INSERT INTO tbl_user (user_name, password, high_score, is_admin) VALUES ('$user_name', '$password', 0, 0)";
            if (mysqli_query($conn, $sql_insert)) {
                echo "<div class='message'>Uspješna registracija. Možete se sada prijaviti.</div>";
            } else {
                echo "<div class='message'>Greška pri registraciji. Pokušajte ponovno.</div>";
            }
        }
    }
}
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
                    <input style="width: 70%;" type="text" id="user_name" name="user_name" placeholder="Enter your Username">
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input style="width: 70%;" type="password" id="password" name="password" placeholder="Enter your Password">
                </div>
                <div class="form-footer">
                    <button type="submit" name="submit" id="btn-play">Play</button>
                    <button type="submit" name="register" id="btn-play">Registriraj se</button>
                    <a href="index.html" class="btn-back">Nazad</a>
                </div>
            </form>
            <p id="test"></p>
        </div>
    </div>
</body>
</html>
