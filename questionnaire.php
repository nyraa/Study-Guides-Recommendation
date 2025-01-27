<?php
require_once "databaseLogin.php";

$dsn = "mysql:host=$hostname;dbname=$databasse;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("database connection error!$e");
}

$subject = $book = $category = $subcategory = $overall = $content = $difficulty = $answer = $layout = $comment = "";
$bookriver = 0;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $get_subject = $_GET["subject"];
    $get_bookId = $_GET["book"];
    //echo $get_subject;
    if (isset($_GET["code"])) {
        $code = $_GET["code"];
        echo "<script>window.onload = function(){ document.getElementById('bookriver').setAttribute('value', '" . addslashes($code) . "'); }</script>";
    }
}
?>
<!DOCTYPE HTML5>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZXCEF0Q5KK"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        button:hover {
            color: black;
        }

        @media (min-width: 200px) {
            .content {
                margin: 5% 10% 5%;
            }

            .head {
                margin-top: 60px;
            }
        }

        @media (min-width: 768px) {
            .content {
                margin: 5% 10% 5%;
            }

            .head {
                margin-top: 55px;
            }
        }

        @media (min-width: 992px) {
            .content {
                margin: 5% 20% 5%;
            }

            .head {
                margin-top: 40px;
            }
        }

        @media (min-width: 1200px) {
            .content {
                margin: 5% 30% 5%;
            }

            .head {
                margin-top: 30px;
            }
        }
    </style>
    <script src="book_questionnaire.js"></script>
    <script type="text/javascript">



    </script>
    <title>撰寫回饋</title>
</head>

<body>
    <script>
        function fixing() {
            alert("新功能，施工中");
        }
    </script>
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
                                <a class="nav-link" href="message_board.php">留言板</a>
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

    <div class="wrapping" style="margin-bottom: -20px; min-height: 100%;">
        <div class="content">
            <h1 style="text-align: center;">撰寫回饋
                <button type="button" data-bs-toggle="modal" data-bs-target="#Modal" style="border: none; background: none;">
                    <i class="bi bi-question-circle-fill" style="font-size: 0.7em; color: rgb(139, 139, 139)"></i>
                </button>
            </h1>
            現在撰寫評論，待審核通過之後將會發放書愛流動的知識貨幣，能夠至該網站換取書籍！
            <div class="alert alert-warning" role="alert">
                注意：評論經過審查後才會出現在網頁上，請勿發表髒話、過激（e.g. 這本書是垃圾）或一切與此書無關、無意義的言論，這樣是不會通過審核的喔！
            </div>
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">使用說明</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="fakeIllustration">
                            直接從下拉式選單選取科目，就可以看到想評論的書了喔<BR>
                            若是沒看到想評論的書，麻煩在<a href="newBook.php">這裡</a>新增<BR>
                            另外文字評論越詳細越好！講一些關於這本書的八卦也行（？），還有好多人等著吃瓜。<BR>
                            就這樣，祝大嘎都期末歐趴，段考把同學電的體無完膚（不可以這樣吧？）
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                豪
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" novalidate onsubmit="return newComment();">
                <label>科目：</label>

                <select class="form-select" name="subject" onchange="window.location='<?php echo htmlspecialchars($PHP_SELF); ?>?subject='+this.value+'&code='+document.getElementById('bookriver').getAttribute('value');" required>
                    <option value=""> </option>
                    <option value="國文" <?php if (isset($get_subject) && $get_subject === "國文") echo "selected"; ?>>國文</option>
                    <option value="數學" <?php if (isset($get_subject) && $get_subject === "數學") echo "selected"; ?>>數學</option>
                    <option value="英文" <?php if (isset($get_subject) && $get_subject === "英文") echo "selected"; ?>>英文</option>
                    <option value="物理" <?php if (isset($get_subject) && $get_subject === "物理") echo "selected"; ?>>物理</option>
                    <option value="化學" <?php if (isset($get_subject) && $get_subject === "化學") echo "selected"; ?>>化學</option>
                    <option value="地科" <?php if (isset($get_subject) && $get_subject === "地科") echo "selected"; ?>>地科</option>
                    <option value="生物" <?php if (isset($get_subject) && $get_subject === "生物") echo "selected"; ?>>生物</option>
                    <option value="自然" <?php if (isset($get_subject) && $get_subject === "自然") echo "selected"; ?>>自然</option>
                    <option value="歷史" <?php if (isset($get_subject) && $get_subject === "歷史") echo "selected"; ?>>歷史</option>
                    <option value="地理" <?php if (isset($get_subject) && $get_subject === "地理") echo "selected"; ?>>地理</option>
                    <option value="公民" <?php if (isset($get_subject) && $get_subject === "公民") echo "selected"; ?>>公民</option>
                    <option value="社會" <?php if (isset($get_subject) && $get_subject === "社會") echo "selected"; ?>>社會</option>
                    <option value="其他" <?php if (isset($get_subject) && $get_subject === "其他") echo "selected"; ?>>其他</option>
                </select><br>

                <label>書名：</label>
                <select class="form-select" name="book" id="book" required>
                    <?php
                    if (isset($get_bookId)) {
                        $select = "SELECT name, publisher FROM book WHERE id=:book_id";
                        $stmt = $pdo->prepare($select);
                        $stmt->bindParam(':book_id', $get_bookId);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                        if(empty($result))
                        {
                            echo "error";
                        }
                        else
                        {
                            foreach($result as $row)
                            {
                                echo "<option value=" . $get_bookId . ">" . $row['publisher'] . '&nbsp&nbsp' . $row['name'] . "</option>";
                            }
                        }
                    } else if (isset($get_subject)) {
                        $select = "SELECT * FROM book WHERE subject=:subject";
                        $stmt = $pdo->prepare($select);
                        $stmt->bindParam(':subject', $get_subject, PDO::PARAM_STR);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if(empty($result))
                        {
                            echo "error";
                        }
                        else
                        {
                            foreach($result as $row)
                            {
                                echo "<option value=" . $row['id'] . ">" . $row['publisher'] . '&nbsp&nbsp' . $row['name'] . "</option>";
                            }
                        }
                    } else {
                        echo "<option value=''> </option>";
                    } ?>
                </select>
                找不到想要的書嗎？ <a href="newBook.php">這裡新增</a><br><br>

                <span>各項評分：</span>
                <table style="margin: 0px;" class="table table-striped">
                    <tr>
                        <th></th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                    </tr>


                    <tr>
                        <th><label>綜合給分</label></th>
                        <th><input class="form-check-input" type="radio" name="overall" id="overall" value="1" required><label></label></th>
                        <th><input class="form-check-input" type="radio" name="overall" id="overall" value="2"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="overall" id="overall" value="3"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="overall" id="overall" value="4"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="overall" id="overall" value="5"><label></label></th>
                    </tr>

                    <tr>
                        <th><label>內容豐富程度</label></th>
                        <th><input class="form-check-input" type="radio" name="content" id="content" value="1" required><label></label></th>
                        <th><input class="form-check-input" type="radio" name="content" id="content" value="2"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="content" id="content" value="3"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="content" id="content" value="4"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="content" id="content" value="5"><label></label></th>
                    </tr>

                    <tr>
                        <th><label>難易度</label></th>
                        <th><input class="form-check-input" type="radio" name="difficulty" id="difficulty" value="1" required><label></label>
                        </th>
                        <th><input class="form-check-input" type="radio" name="difficulty" id="difficulty" value="2"><label></label>
                        </th>
                        <th><input class="form-check-input" type="radio" name="difficulty" id="difficulty" value="3"><label></label>
                        </th>
                        <th><input class="form-check-input" type="radio" name="difficulty" id="difficulty" value="4"><label></label>
                        </th>
                        <th><input class="form-check-input" type="radio" name="difficulty" id="difficulty" value="5"><label></label>
                        </th>
                    </tr>

                    <tr>
                        <th><label>詳解詳細程度</label></th>
                        <th><input class="form-check-input" type="radio" name="answer" id="answer" value="1" required><label></label></th>
                        <th><input class="form-check-input" type="radio" name="answer" id="answer" value="2"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="answer" id="answer" value="3"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="answer" id="answer" value="4"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="answer" id="answer" value="5"><label></label></th>
                    </tr>

                    <tr>
                        <th><label>排版/美編/顏色</label></th>
                        <th><input class="form-check-input" type="radio" name="layout" id="layout" value="1" required><label></label></th>
                        <th><input class="form-check-input" type="radio" name="layout" id="layout" value="2"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="layout" id="layout" value="3"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="layout" id="layout" value="4"><label></label></th>
                        <th><input class="form-check-input" type="radio" name="layout" id="layout" value="5"><label></label></th>
                    </tr>

                </table><br>
                <label>對這本書的其他評價或想說的話（必填）</label><br>
                <textarea class="form-control" name="comment" rows="10" cols="50" required></textarea>
                <div class="invalid-feedback">請輸入評價</div>
                <br>
                <details class="alert alert-success" style="margin-top: 1%;">
                    <summary>不知道要寫什麼嗎?</summary>
                    小提示：可以詳細描述自己在這本書上花了多少時間、寫了這本書之後有什麼進步，
                    或是書的結構（舉例來說，如果是題庫的話，每一篇會有哪些大題，如克漏字或文意選填；
                    也可以寫講義的內容編排方式，是主題式還是依據課綱）...等等,希望有給你一些幫助:D
                </details>
                <input type="hidden" name="bookriver" id="bookriver" value="none">
                <center><input type="submit" class="btn btn-outline-success" id="submitBtn" style="margin-bottom: 5%;"></center>
            </form>
        </div>
        <!--redeem code alert (modal)-->
        <div class="modal fade" id="redeemCodeAlert" tabindex="-1" aria-labelledby="redeemCodeAlertLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="redeemCodeAlertLabel">感謝您！</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="redeemCodeAlertBody"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
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
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = test_input($_POST["book"]);
    $overall = test_input($_POST["overall"]);
    $content = test_input($_POST["content"]);
    $difficulty = test_input($_POST["difficulty"]);
    $answer = test_input($_POST["answer"]);
    $layout = test_input($_POST["layout"]);
    $comment = test_input($_POST["comment"]);
    $code = test_input($_POST["bookriver"]);
    $bookriver = 0;
    if ($code != "none") {
        $sum = 0;
        for ($i = 0; $i < 5; $i = $i + 1) $sum = $sum + (int)$code[$i + 1] * $verifyConst[$i];
        if ($code[0] == $sum % 10)  $bookriver = 1;
    }

    $acceptedChar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@#%^&*+=-_";
    $redeemCode = substr(str_shuffle($acceptedChar), 0, 7);
    $insert = "INSERT INTO questionnaire (book, overall, content, difficulty, answer, layout, comment, redeemCode, bookriver) 
           VALUES (:id, :overall, :content, :difficulty, :answer, :layout, :comment, :redeemCode, :bookriver)";

    $stmt = $pdo->prepare($insert);
    // types are not verified
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':overall', $overall, PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_INT);
    $stmt->bindValue(':difficulty', $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(':answer', $answer, PDO::PARAM_INT);
    $stmt->bindValue(':layout', $layout, PDO::PARAM_INT);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindValue(':redeemCode', $redeemCode, PDO::PARAM_STR);
    $stmt->bindValue(':bookriver', $bookriver, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo "
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js'></script>
        <script>
          emailjs.init('" . $emailjsToken . "');
            var tmp = {type: '評論'};
            emailjs.send('service_ecyjr9k', 'template_qfesiq6', tmp)
                    .then(function(response) {
                        console.log('SUCCESS!');
                    }, function(error) {
                        console.log('FAILED...', error);
                    });
        </script>";
        if ($bookriver) {
            echo "<script>
            $('document').ready(function(){
              var data = 'Hello, 來自書愛流動的使用者<br>成功新增評論，感謝您的協助！<br>您的兌換碼: " . $redeemCode . "<br>（評論經審核通過後可至合作網站書愛流動兌知識貨幣換）';
              $('#redeemCodeAlertBody').html(data);
              $('#redeemCodeAlert').modal('show');
              $('#redeemCodeAlert').on('hidden.bs.modal', function(){
                location.href='/questionnaire.php';
              });
            });
          </script>";
        } else {
            echo "<script>
            $('document').ready(function(){
              var data = '成功新增評論，感謝您的協助！<br>您的兌換碼: " . $redeemCode . "<br>（評論經審核通過後可至合作網站書愛流動兌換知識貨幣）';
              $('#redeemCodeAlertBody').html(data);
              $('#redeemCodeAlert').modal('show');
              $('#redeemCodeAlert').on('hidden.bs.modal', function(){
                location.href='/questionnaire.php';
              });
            });
          </script>";
        }
    } else {
        echo "<script>
          $('document').ready(function(){
            var data = '抱歉，發生錯誤，請再試一次';
            $('#redeemCodeAlertBody').html(data);
            $('#redeemCodeAlert').modal('show');
            $('#redeemCodeAlert').on('hidden.bs.modal', function(){
              location.href='/questionnaire.php';
            });
          });
        </script>";
    }
}

//echo $subject . $book . $category . $subcategory . $overall . $comment . "<br>";

function test_input($data)
{
    $data = trim($data);
    // $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>