<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
mysqli_select_db($conn, '2048') or die(mysqli_error($conn));

if (isset($_POST['highscore']) && isset($_POST['username'])) {
    $newHighScore = intval($_POST['highscore']);
    $username = $_POST['username'];

    $sql_get_highscore = "SELECT high_score FROM tbl_user WHERE user_name = ?";
    $stmt_get = $conn->prepare($sql_get_highscore);
    $stmt_get->bind_param("s", $username);
    $stmt_get->execute();
    $result = $stmt_get->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentHighScore = intval($row['high_score']);
        
        if ($newHighScore > $currentHighScore) {
            $sql_update = "UPDATE tbl_user SET high_score = ? WHERE user_name = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("is", $newHighScore, $username);
            
            if ($stmt_update->execute()) {
            } else {
            }
            $stmt_update->close();
        } else {
        }
    } else {
        echo "User: " . htmlspecialchars($username) . " not found.";
    }
    
    $stmt_get->close();
}
?>
