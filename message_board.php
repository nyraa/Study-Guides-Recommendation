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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body{
            width: 100%;
            height: 100%;
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
        .tab-content{
            padding-top:   3%; 
            padding: 2%; 
            border-left:   5px solid #4aa184; 
            border-right:  5px solid #4aa184; 
            border-top:    7px solid #4aa184; 
            border-bottom: 7px solid #4aa184; 
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            border-top-right-radius: 5px;
            margin-bottom: 5%;
        }
        .myButton:hover{
            background-color: #e6e6e6;
        }
        .myButton{
            padding-top: 1.5%;
            padding-left: 2%;
            padding-right: 2%;
            padding-bottom: 1.5%;
            
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-width: 0;
        }
        ul{
            margin-bottom: 35px;
        }
    </style>
    <script>
        function btn_onclick(){  
            var study = document.getElementById("studyPlan");
            var emo = document.getElementById("emotion");
            if(study.getAttribute("aria-selected") == "true"){ //按下心情板
                study.setAttribute("aria-selected", "false");
                emo.setAttribute("aria-selected", "true");
                study.setAttribute("style", "background-color: #ffffff; color: #4aa184;margin-bottom: 0px;");
                emo.setAttribute("style", "background-color: #4aa184; color: #ffffff; margin-bottom: -1px;");
                document.getElementById("pills-tabContent").setAttribute("style", "border-top-left-radius: 5px");
                document.getElementById("theme").setAttribute("value", "emotion");
            }
            else if(study.getAttribute("aria-selected") == "false"){ //按下讀書板
                study.setAttribute("aria-selected", "true");
                emo.setAttribute("aria-selected", "false");
                study.setAttribute("style", "background-color: #4aa184; color: #ffffff; margin-bottom: -1px;");
                emo.setAttribute("style", "background-color: #ffffff; color: #4aa184; margin-bottom: 0px;");
                document.getElementById("pills-tabContent").setAttribute("style", "border-top-left-radius: 0px");
                document.getElementById("theme").setAttribute("value", "studyPlan");
            }
        }
    </script>
    <title>留言板</title>
    <link rel="stylesheet" type="text/css" href="message_board.css">
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
            <h2>留言板</h2>
            <p>這裡是一個匿名的小空間，無論是互助或者是取暖，都在這裡留下你的心情吧！<br>
                注意：留言要經過審核才會刊登在網頁上，請勿發表具有攻擊性、冒犯性以及歧視性等字眼。
            </p>

            <div class="nav">
                <button class="myButton" id="studyPlan" onclick="btn_onclick()" style="background-color: #4aa184; color: #ffffff;" data-bs-toggle="pill"  data-bs-target="#pills-studyPlan" aria-controls="nav-studyPlan" aria-selected="true">讀書技巧版</button>
                <button class="myButton" id="emotion" onclick="btn_onclick()" style="background-color: #ffffff; color: #4aa184;" data-bs-toggle="pill"  data-bs-target="#pills-emotion" aria-controls="nav-studyPlan" aria-selected="false">心情版</button>
            </div>

            <!--nav bar
            <div>
                <ul>
                    <li class="nav nav-pills" id="pill-tab" role="tablist" style="float:left;">
                        <button class="nav-link active" id="nav-studyPlan-pill" data-bs-toggle="pill" data-bs-target="#pills-studyPlan" type="button" role="tab" aria-controls="nav-studyPlan" aria-selected="true">讀書技巧版</button>
                        <button class="nav-link" id="nav-emotion-pill" data-bs-toggle="pill" data-bs-target="#pills-emotion" type="button" role="tab" aria-controls="nav-emotion" aria-selected="false">心情版</button>
                    </li>
                </ul>
            -->
                <!-- box-shadow: 0px 3px 3px 2px rgb(196, 255, 213); clip-path: inset(0px -15px -10px -15px)-->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-studyPlan" role="tabpanel" aria-labelledby="pills-studyPlan-tab" tabindex="0">
                        <!--模板-->
                        <div style="margin:1%">
                            <strong>這是標題</strong><br>
                            <div>這是內文，然後我在想換行的問題不知道怎麼辦。</div>
                            <small style='color:rgb(157, 157, 157); float:right'>2023年1月23日</small><BR>

                        </div>

                        <!--記得水平線-->
                        <hr style="margin-left: 1%; margin-right: 1%;">

                        <div style="margin:1%">
                            <strong>這是另一個標題</strong><br>
                            <div>【我超會複製貼上】嗨學妹，我知道你們現在對於考試超級迷茫，不知道要從哪裡開始。<br>
                                不過沒關係，這裡提供一些和學測有關的小知識，有什麼問題也都可以點下面的「Contact us」來問我們喔。<br>
                                學長姐如果想分享其他經驗，也可以點右上角的意見回饋表單來告知我們喔！
                            </div>
                            <small style='color:rgb(157, 157, 157); float:right'>2023年1月22日</small><BR>
                        </div>
                    </div>        

                    <div class="tab-pane fade" id="pills-emotion" role="tabpanel" aria-labelledby="pills-emotion-tab" tabindex="0">
                        尚無人留言
                    </div>
                </div>
                    <!--留言區-->
                        
                        <form action="" method="" class="needs-validation" style="margin:1%">
                            <strong style="margin:0.5em;">來留言吧！</strong>
                            <textarea class="form-control" name="title" rows="1" cols="20" placeholder="標題（選填）" style="margin-bottom:1%;"></textarea>
                            <textarea class="form-control" name="comment" rows="4" cols="50" placeholder="留下想說的話..." style="margin-bottom:1%;" required></textarea>
                            <input type="hidden" name="theme" id="theme" value="studyPlan">
                            <center><input type="submit" class="btn btn-outline-success" style="margin-bottom: 5%;"></center>
                        </form>
                
        </div>
    </div>
    <footer style="margin: 0px; padding: 20px; background-color: rgb(217, 217, 217); text-align: center;  position: sticky;">
            Copyright © 2022 玉米糖粉. All rights reserved.<br>
            111 級雄女資研出品<br>
            Contact us:
            <a href="mailto:study.guides.recommend@gmail.com" target="_blank"><small>study.guides.recommend@gmail.com</small></a>
        </footer>
    </div>

</body>

<?php
?>