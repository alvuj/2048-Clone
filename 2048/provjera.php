<?php  

$conn = mysqli_connect('localhost', 'root', '', '2048') or die(mysqli_connect_error()); 

$sql = "SELECT user_name FROM tbl_user";
$result = $conn->query($sql);

$existingNames = array();
if ($result->num_rows > 0) {
  // Dodavanje svakog user_name u niz
  while($row = $result->fetch_assoc()) {
    $existingNames[] = $row["user_name"];
    
  }
} else {
  echo "0 results";
}



if(isset($_POST['suggestion'])){
    $name = $_POST['suggestion'];
}
if(!empty($name)){
    foreach($existingNames as $existingName){
        
        if(strpos($existingName, $name) !== false){
            echo $existingName;
            echo "<br>";
        }

}



}


?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<?php //za highscore

 
$conn = mysqli_connect('localhost', 'root', '', '2048') or die(mysqli_connect_error()); 

// Izmenjeni SQL upit da uključi i korisničko ime
$sql = "SELECT user_name, high_score FROM tbl_user";
$result = $conn->query($sql);

$db_high_scores = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $db_high_scores[] = $row;
    }
} else {
    echo "0 results";
}

if(isset($_POST['highscore'])){
    $submittedHighScore = $_POST['highscore'];

    //echo "<div class='footer_score'>"; // Početak div-a za rezultate

    foreach($db_high_scores as $db_high){
        if($submittedHighScore > $db_high['high_score']){
            echo "Prijeđen highscore: " . $db_high['high_score'] . " od korisnika " . $db_high['user_name'];
            echo "<br>";
           // echo "<p class='highscore-item'>Pređen highscore: " . $db_high['high_score'] . " od korisnika " . $db_high['user_name'] . "</p>";

        }
    }
    //echo "</div>";
}



     
     
     
     
     
     
     
     
     
     
     
     
?>
