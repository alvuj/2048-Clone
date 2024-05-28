<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User High Scores</title>
    <style>
        /* Add your CSS styles for responsive design here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        @media screen and (max-width: 600px) {
            /* Define CSS styles for smaller screens here */
            table {
                border: 0;
            }
            th, td {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body>
    <a href="index.html"><button>Nazad</button></a>
    <h2>User High Scores</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>High Score</th>
            <th>Rank</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "2048";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Povezivanje nije uspjelo: " . $conn->connect_error);
        }

        $sql = "
            SELECT u.user_name, hs.high_score, r.rank
            FROM tbl_user u
            LEFT JOIN tbl_high_score hs ON u.user_name = hs.user_name
            LEFT JOIN tbl_rank r ON hs.high_score > r.score
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Ispis svakog reda podataka
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["high_score"] . "</td>";
                echo "<td>" . $row["rank"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nema rezultata</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
