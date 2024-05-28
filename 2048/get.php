<?php  



$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_connect_error()); 

$db_select = mysqli_select_db($conn, '2048') or die(mysqli_error());

$sql = "SELECT * FROM tbl_user ORDER BY id DESC LIMIT 1";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
     
     while($row = mysqli_fetch_assoc($res)) {
        echo " Name: " . $row["user_name"]."<br>";
     }
} else {
    echo "0 results"; 
}




if (isset($_POST['highscore'])) {
    $highScore = $_POST['highscore'];

    
    $stmt = $conn->prepare("INSERT INTO `tbl-user` (high_score) VALUES ($highScore)");
    $stmt->bind_param("i", $highScore); 
    $res = $stmt->execute();
    echo"Nemere";
    if ($res) {
        echo "High score successfully saved.";
    } else {
        echo "Error saving high score: " . $stmt->error;
    }
}


?>