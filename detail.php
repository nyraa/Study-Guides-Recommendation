<?php
require_once "databaseLogin.php";

$dsn = "mysql:host=$hostname;dbname=$databasse;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("database connection error!");
}

$bookId = $_GET['id'];
$query = "SELECT * FROM book WHERE id=:bookId";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':bookId', $bookId);
$stmt->execute();
$bookDetail = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($bookDetail))
{
    echo "<script>alert('查無此書');location.href='/query.php'</script>";
}
else
{
    $subject = $bookDetail['subject'];
    $name = $bookDetail['name'];
    $exam = $bookDetail['exam'];
    $publisher = $bookDetail['publisher'];
    $picture = $bookDetail['picture'];
    $category = $bookDetail['category'];
    $dataAmount = $bookDetail['dataAmount'];
    $overall = $bookDetail['overall'];
    $content = $bookDetail['content'];
    $difficulty = $bookDetail['difficulty'];
    $answer = $bookDetail['answer'];
    $layout = $bookDetail['layout'];
}
function _date($str)
{
    $result = "";
    $result = $str[0] . $str[1] . $str[2] . $str[3] . " 年 " . $str[4] . $str[5] . " 月 " . $str[6] . $str[7] . " 日 ";
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZXCEF0Q5KK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-ZXCEF0Q5KK');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="no-cache">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($name); ?> 評價</title>
    <link rel="stylesheet" type="text/css" href="detail.css?id=<?php echo rand(1, 100) ?>">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
    <script>
        // function getAbsoluteHeight(el) {
        //   // Get the DOM Node if you pass in a string
        //   el = (typeof el === 'string') ? document.querySelector(el) : el; 

        //   var styles = window.getComputedStyle(el);
        //   var margin = parseFloat(styles['marginTop']) +
        //               parseFloat(styles['marginBottom']);

        //   return Math.ceil(el.offsetHeight + margin);
        // }
        // window.onload=function(){
        //   right_div = document.getElementById("name_rating");
        //   container = document.getElementById("container");

        //   div_height = getAbsoluteHeight("#rating_title"); + 
        //                getAbsoluteHeight("#rating") *7 +
        //                getAbsoluteHeight("#oldCover");
        //   console.log(div_height);
        //   right_div.setAttribute("style", "height: " + div_height.toString() + "px");
        //   container.setAttribute("style", "height: " + div_height.toString() + "px");
        // }
        function fixing() {
            alert("新功能，施工中");
        }
        (function() {
            emailjs.init('<?php echo $emailjsToken; ?>');
        })();

        function confirmEmail() {
            var check = confirm("感謝告知，我們將會傳送email提醒開發者更換封面。")
            if (check) {
                oldCover();
            }
        }

        function oldCover() {
            var message = {
                bookID: '<?php echo addslashes(htmlspecialchars($bookId)) ?>',
                bookName: '<?php echo addslashes(htmlspecialchars($name)) ?>',
                searchURL: 'www.google.com/search?q=<?php echo urlencode(htmlspecialchars($name)) ?>'
            };
            emailjs.send('service_ecyjr9k', 'template_egzx9ah', message)
                .then(function(response) {
                    console.log('SUCCESS!', response.status, response.text);
                    alert("已寄出郵件，謝謝您的合作，我們會盡快更新！");
                }, function(error) {
                    console.log('FAILED...', error);
                    alert("抱歉，出了一點問題...");
                });
        }
    </script>
</head>

<body>
    <div id="header">
        <nav class="navbar navbar-light fixed-top" style="background-color: #94c0af" ;>
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="https://i.imgur.com/vkflx0C.png" style="object-fit: cover; height: 55px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">早安</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">回首頁</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="about.html">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="query.php">瀏覽清單</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="newBook.php">新增參考書</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="questionnaire.php">撰寫回饋</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="message_board.php" onclick="">留言板</a>

                            </li>
                            <li>
                                <a class="nav-link" href="https://forms.gle/H1e8fs6Pp2gPj3xZ9" target="_blank">
                                    <span style="color: rgb(150, 79, 144)">填寫意見回饋表單 <i class="bi bi-pencil-square"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="head">hi</div>
    <div class="wrapping" style="margin-bottom: -5px; min-height: 100%;">
        <div class="content">
            <div class="detail">
                <div class="container" id="container">
                    <img id="image" class="image" src=<?php echo htmlspecialchars($picture); ?> alt="<?php echo htmlspecialchars($name); ?>"> <!--這裡放圖片-->
                </div>
                <div class="name_rating" id="name_rating">
                    <h2 id="rating_title"><?php echo $name ?></h2>
                    <span id="rating" style="color: #2a906b"><?php echo htmlspecialchars($exam) . ' / ' .  $subject . ' / ' . $category; ?></span>
                    <span class="rating">綜合給分 &#11088 <?php echo round($overall, 1); ?> </span>
                    <span class="rating">內容豐富程度 &#11088 <?php echo round($content, 1); ?></span>
                    <span class="rating">難易度 &#11088 <?php echo round($difficulty, 1); ?></span>
                    <span class="rating">詳解詳細程度 &#11088 <?php echo round($answer, 1); ?></span>
                    <span class="rating">排版/美編/顏色 &#11088 <?php echo round($layout, 1); ?></span>
                    <span style="color:rgb(124, 124, 124)">（評分人數：<?php echo htmlspecialchars($dataAmount); ?>）</span>

                    <button id="oldCover" class="btn btn-outline-success" onclick="confirmEmail()" style="margin: 1%">這本書不是這個封面</button>
                </div>
            </div>
            <div>
                <h3 style="margin: 5px;">其他評價</h3>
                <?php
                $query = "SELECT date, comment, bookriver FROM questionnaire WHERE book=:bookId AND review=1 ORDER BY id DESC";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':bookId', $bookId);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);

                //echo "<script language='javascript'>window.console.log('" . $connection->error . "');</script>";
                if(empty($result))
                {
                    echo "<span>尚無人評論</span>";
                }
                else
                {
                    foreach($result as $row)
                    {
                        echo "<div class='comment'>\n";
                        echo "<small style='color:rgb(142, 138, 138);'>" . _date($row['date']) . "</small>";
                        if ($row["bookriver"]) {
                            echo "&nbsp;&nbsp;<span class='badge badge-pill badge-primary' style='background: #478058;'>來自書愛流動的捐書者</span>";
                        }
                        echo "<br><span>" . nl2br(htmlspecialchars($row['comment'])) . "</span>\n</div>";
                    }
                }
                ?>
            </div>
            <div>
                <center>
                    <button class="btn btn-outline-success" style="margin: 2%;" onclick="location.href='/questionnaire.php?subject=<?php echo $subject ?>&book=<?php echo $bookId ?>'">去評論</button>
                    <a href='https://booksriver.q23rf.repl.co/get/id=<?php echo urlencode(htmlspecialchars($bookId)) ?>'><button class="btn btn-outline-success" style="margin: 2%;">找二手</button></a>
                </center>
            </div>
        </div>
    </div>
    <footer style="margin: 0px; padding: 20px; background-color: rgb(217, 217, 217); text-align: center;  position: sticky;">
        <a href="https://github.com/Today-Asked/Study-Guides-Recommendation" target="_blank" style="color:#000000"><small>Github</small></a>
        &nbsp;
        <a href="https://www.instagram.com/study_guides_recommend/" target="_blank" style="color:#000000"><small>Instagram</small></a>
        &nbsp;
        <a href="mailto:study.guides.recommend@gmail.com" target="_blank" style="color:#000000"><small>Contact us</small></a>
    </footer>
    <a href="#" style="position: fixed; bottom: 1%; right: 1%;"><img src="top.png" style="height: 2.5em;"></a>