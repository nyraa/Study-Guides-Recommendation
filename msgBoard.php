<?php
echo "<head><meta name='robots' content='noindex'></head>";
require_once "databaseLogin.php";
$dsn = "mysql:host=$hostname;dbname=$databasse;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("database connection error!$e");
}
//else echo "Success!";
$connection->set_charset("utf8");

function test_input($data) {
    $data = trim($data);
    // $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "GET") { // study or emo 
    $category = $_GET["type"];
    if($category == 0) $type = "studyPlan";
    else $type = "emotion";
    echo "<script>console.log('" . addslashes($category) . "');</script>";
    $select = "SELECT * FROM msgBoard WHERE category=:category AND review=1";
    $stmt = $pdo->prepare($select);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($result))
    {
        echo "尚無人留言";
    }
    else
    {
        $flag = 0;
        foreach($result as $row)
        {
            if($flag == 1){
                echo "<hr style='margin-left: 1%; margin-right: 1%;'>";
            }
            echo "<div style='margin:1%'>";
            echo "<strong>" . $row["title"] . "</strong><br>";
            echo "<div>" . nl2br($row["msg"]) . "</div>";
            echo "<small style='color:rgb(157, 157, 157); float:right'>" . substr($row["time"], 0, 10) . "</small><BR>";
            echo "</div>";
            $flag = 1;
        }
    }
}
?>