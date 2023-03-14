<?php
echo "<head><meta name='robots' content='noindex'></head>";
require_once "databaseLogin.php";

$dsn = "mysql:host=$hostname;dbname=$databasse;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("database connection error!$e");
}

function test_input($data) {
    $data = trim($data);
    // $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $s = test_input($_GET["search"]);
    $split = preg_split('//u', $s);
    foreach ($split as $i){
        $search[] = "%%" . $i . "%%";
    }
    //print_r($search);
    //echo "<br>";
    for($i = 1; $i < 200; $i = $i + 1){
        $cnt[$i] = 0;
    }
    for($i = 1; $search[$i] != "%%%%"; $i = $i + 1){
        $select = "SELECT id, name FROM book WHERE name LIKE :search";
        $stmt = $pdo->prepare($select);
        $stmt->bindValue(':search', '%' . $search[$i] . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(empty($result))
        {
            //echo $search[$i] . ": no data selected<br>";
        }
        else
        {
            foreach($result as $row)
            {
                $cnt[$row["id"]] = $cnt[$row["id"]] + 1;
                //echo "    " . $row["id"] . " " . $row["name"] . "<br>";
            }
        }
    }
    $threshold = mb_strlen($s, 'utf-8') / 2;
    echo "<script>alert('以下為資料庫內相似的書籍，請檢查是否有您要找的書籍\u000a";
    $flag = 0;
    for($i = 1; $i < 200; $i = $i + 1){
        if($cnt[$i] > $threshold){
            $flag = 1;
            $select = "SELECT name, subject, publisher FROM book WHERE id=:id";
            $stmt = $pdo->prepare($select);
            $stmt->bindValue(':id', $i, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($result))
            {
                echo addslashes($result["publisher"]) . "    " . addslashes($result["subject"]) . "    " . addslashes($result["name"] . "\u000a");
            }
        }
    }
    if($flag == 0){
        echo "\u000a沒有相似的書籍！";
    }
    echo "');</script>";
}
?>