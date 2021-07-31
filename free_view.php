<?php

$conn = mysqli_connect(
    'localhost',
    'hojae',
    'ghwo1353',
    'duo.gg'
);
$id = $_GET['id'];
$sql = "SELECT*FROM table_free LEFT JOIN user ON table_free.user = user.num WHERE table_free.id = $id";
$result = mysqli_query($conn, $sql);
$view = mysqli_fetch_array($result);
$title = $view['title'];
$content = $view['content'];
$user = $view['name'];
$created = $view['created'];
$category = $view['category'];
$view_count = $view['view_count'];
?>

<!doctype html>
<html lang="ko">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        <title>duo.gg</title>
        <style>
            body {
                background-color: cornflowerblue;
            }
            div.container-lg {
                background-color: white;
                position: relative;
                top: 100px;
                min-height: 500px;

            }
            #title {
                font-weight: 800;
                font-size: xx-large;
                text-align: center;
            }
            #content {
                font-weight: 500;
                font-size: x-large;
            }
            .row:nth-child(3) {
                height: 50px;
            }
            .row:last-child {
                position: relative;
                left: 20px;
                width: 95%;
                height: 100%;
                word-break: break-all;
            }
        </style>
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php">duo.gg</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="pick.php">픽률</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="ban.php">벤률</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="duo.php">듀오찾기</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="free.php"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                자유게시판
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <li>
                                    <a class="dropdown-item" href="free_top.php">탑</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="free_jg.php">정글</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="free_mid.php">미드</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="free_ad.php">원딜</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="free_sup.php">서폿</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="free.php?category=all">전체</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <?=$title?>
                </div>
                <div class="col">
                    <?=$view_count?>
                </div>
                <div class="col">
                    <?=$user?>
                </div>
                <div class="col">
                    <?=$created?>
                </div>
                <div class="col">
                    <a href="update.php?id=<?=$_GET['id']?>">수정하기</a>
                    <form action="process_delete.php" method="post">
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <input type="submit" value="delete">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?=$content?>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <!-- <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script> <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script> -->

    </body>

</html>