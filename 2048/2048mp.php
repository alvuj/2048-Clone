<?php include('provjera.php') ?>
<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2048</title>
    <link rel="stylesheet" href="3333.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="3333.js"></script>

</head>

<body>
    <h1>2048</h1>
    <hr> <!--horizontalna linija    -->
    <h2>Score: <span id="score">0</span></h2>

    <h3></h3>
    <h2>Username: <span id="username"><?php echo "{$_SESSION['us']}"; ?></span></h2>
    <h2><?php include 'get.php' ?></h2>


    <button type="button" id="btn-rst" onclick="location.reload()">Restart</button>
    <a href="in3.php"><button type="button" id="btn-rst">Go back</button></a>
    <br><br>
   
    <div id="board">
    </div>

    <br>

    <div id="footer_score">
        <br>
        <p id="hs"></p>
        <br>
        <p id="end"></p>

    </div>
</body>

</html>

<script type="text/javascript">
    if (fin = true) {
        console.log("izvrsilo se");
    }
</script>

<script>
    document.addEventListener('keydown', function(event) {
        if (event.keyCode == 38 || event.keyCode == 40) {
            event.preventDefault();
        }
    }, false);

    //šalje trenutačni high score i username kojeg ocita sa html-a 
    

    $(document).ready(function() {
        var scoreObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type == 'childList') {
                    var newScore = $('#score').text(); 
                    var username = $('#username').text(); 
                    $.post("update_high_score.php", {
                        highscore: newScore,
                        username: username 
                    }, function(data, status) {
                        $("#hs").html(data);
                    });
                }
            });
        });

        var config = {
            childList: true
        };

        scoreObserver.observe(document.getElementById('score'), config);
    });


    //salje high score
    $(document).ready(function() {
        var scoreObserver = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type == 'childList') {
                    var newScore = $('#score').text();
                    $.post("provjera.php", {
                        highscore: newScore
                    }, function(data, status) {
                        $("#hs").html(data);
                    });
                }
            });
        });

        var config = {
            childList: true
        };

        scoreObserver.observe(document.getElementById('score'), config);

    });
</script>