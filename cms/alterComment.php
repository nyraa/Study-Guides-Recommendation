<?php
require_once "auth.php";

require_once "../databaseLogin.php";
$dsn = "mysql:host=$hostname;dbname=$databasse;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("database connection error!");
}
//else echo "Success!";

$id = $choice = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $choice = $_POST["choice"];

    if($choice == "deleteAComment"){
        $select = "SELECT * FROM questionnaire WHERE id=:id";
        $stmt = $pdo->prepare($select);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(empty($result))
        {
            echo "查無此筆資料";
        }
        else
        {
            foreach($result as $row)
            {
                $bookId = $row['book'];
                $overall = $row['overall'];
                $content = $row['content'];
                $difficulty = $row['difficulty'];
                $answer = $row['answer'];
                $layout = $row['layout'];
                $review = $row["review"];
            }
            echo "data to delete: " . $bookId . " " . $overall . " " . $content . " " . $difficulty . " " . $answer . " " . $layout . "<br>";
            if($review == 1){
                $selectBook = "SELECT * FROM book WHERE id=:bookId";
                $stmt = $pdo->prepare($selectBook);
                $stmt->bindParam(':bookId', $bookId, PDO::PARAM_INT);
                $stmt->execute();
                $_result = $stmt->fetch(PDO::FETCH_ASSOC);

                if(empty($_result))
                {
                    echo "此評論之書籍不存在";
                }
                else
                {
                    foreach($_result as $_row)
                    {
                        $dataAmount = $_row['dataAmount'];
                        $_overall = $_row['overall'];
                        $_content = $_row['content'];
                        $_difficulty = $_row['difficulty'];
                        $_answer = $_row['answer'];
                        $_layout = $_row['layout'];
                    }
                    echo "<book> exist data: " . $dataAmount . " " . $_overall . " " . $_content . " " . $_difficulty . " " . $_answer . " " . $_layout . "<br>";

                    $newOverall = ($_overall * $dataAmount - $overall) / ($dataAmount - 1);
                    $newContent = ($_content * $dataAmount - $content) / ($dataAmount - 1);
                    $newDifficulty = ($_difficulty * $dataAmount - $difficulty) / ($dataAmount - 1);
                    $newAnswer = ($_answer * $dataAmount - $answer) / ($dataAmount - 1);     
                    $newLayout = ($_layout * $dataAmount - $layout) / ($dataAmount - 1);  
                    $newDataAmount = $dataAmount - 1;
                    echo "<book> new data: " . $newDataAmount . " " . $newOverall . " " . $newContent . " " . $newDifficulty . " " . $newAnswer . " " . $newLayout . "<br>";
                    $update = "UPDATE book SET dataAmount=:newDataAmount, overall=:newOverall, difficulty=:newDifficulty,
                    answer=:newAnswer, layout=:newLayout WHERE id=:bookId";
                    
                    $update = "UPDATE book SET dataAmount=:newDataAmount, overall=:newOverall, difficulty=:newDifficulty,answer=:newAnswer, layout=:newLayout WHERE id=:bookId";
                    $stmt_update = $pdo->prepare($update);
                    $stmt_update->bindParam(':newDataAmount', $newDataAmount, PDO::PARAM_INT);
                    $stmt_update->bindParam(':newOverall', $newOverall, PDO::PARAM_INT);
                    $stmt_update->bindParam(':newDifficulty', $newDifficulty, PDO::PARAM_INT);
                    $stmt_update->bindParam(':newAnswer', $newAnswer, PDO::PARAM_INT);
                    $stmt_update->bindParam(':newLayout', $newLayout, PDO::PARAM_INT);
                    $stmt_update->bindParam(':bookId', $bookId, PDO::PARAM_INT);
                    

                    $delete = "DELETE FROM questionnaire WHERE id=:id";
                    $stmt_delete = $pdo->prepare($delete);
                    $stmt_delete->bindParam(':id', $id, PDO::PARAM_INT);
                    
                    if($stmt_update->execute())
                    {
                        echo "成功更新 book 資料表 編號" . $bookId . "<br>";
                    }
                    else
                    {
                        echo "error1";
                    }
                    if($stmt_delete->execute())
                    {
                        echo "成功刪除編號" . $id . "評論";
                    }
                    else
                    {
                        echo "error2";
                    }

                }
            } else { // if not reviewed
                $delete = "DELETE FROM questionnaire WHERE id=:id";
                $stmt_delete = $pdo->prepare($delete);
                $stmt_delete->bindParam(':id', $id, PDO::PARAM_INT);
                
                if($stmt_delete->execute()){
                    echo "成功刪除編號" . $id . "評論";
                } else {
                    echo "error";
                }
            }
        }
    } else if($choice == "resetCommentOfABook"){
        $delete = "DELETE FROM questionnaire WHERE book=:id";
        $stmt_delete = $pdo->prepare($delete);
        $stmt_delete->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($stmt_delete->execute()){
            echo "成功刪除書籍編號為 " . $id . " 的所有評論<br>";
        } else {
            echo "error";
        }

        $update = "UPDATE book SET dataAmount=:dataAmount, overall=:overall, content=:content, difficulty=:difficulty, answer=:answer, layout=:layout WHERE id=:id";
        $stmt = $pdo->prepare($update);
        $stmt->bindValue(':dataAmount', 0, PDO::PARAM_INT);
        $stmt->bindValue(':overall', 0.000, PDO::PARAM_STR);
        $stmt->bindValue(':content', 0.000, PDO::PARAM_STR);
        $stmt->bindValue(':difficulty', 0.000, PDO::PARAM_STR);
        $stmt->bindValue(':answer', 0.000, PDO::PARAM_STR);
        $stmt->bindValue(':layout', 0.000, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            echo "成功重置書籍編號" . $id;
        } else {
            echo "error2";
        }
    } else if($choice == "deleteAMsg"){
        $delete = "DELETE FROM msgBoard WHERE id=:id";
        $stmt = $pdo->prepare($delete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            echo "成功刪除編號為 " . $id . " 的留言<br>";
        } else {
            echo "error";
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="robots" content="noindex">
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <select name="choice">
                <option value="deleteAComment">刪一則評論(請在下方輸入評論 id)</option>
                <option value="resetCommentOfABook">刪除一本書的所有評論(請在下方輸入書本 id)</option>
                <option value="deleteAMsg">刪除一則留言(請在下方輸入留言 id)</option>
            </select><br>
            <input type="text" name="id"><br>
            <input type="submit">
        </form>
    </body>
</html>