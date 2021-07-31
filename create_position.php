<?php
$conn = mysqli_connect(
    'localhost',
    'hojae',
    'ghwo1353',
    'duo.gg');
    $list ="";
    $sql = "SELECT*FROM user";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)){
        $user = $row['name'];
        $id = $row['num'];
        $list = $list."<option value=\"$id\">$user</option>";
    }
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
            div.container {
                background-color: white;
                position: relative;
                top: 150px;
            }
            div.col-2 {
                padding: 0;
            }
            select {
                width: 100px;
            }
        </style>
         <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#navbar").load("navbar.php"); //헤더 인클루드
            });
        </script>

    </head>
    <body>
        <!-- navbar -->
        <div id="navbar"></div>
        <!-- 게시판 글쓰기 양식 영역 시작 -->

        <div class="container">
            <form action="process_create.php" method="post">
                <input type="hidden" value="<?=$_GET['position']?>" name="position">
                <input type="hidden" value="position" name="board">
                <div class="row">
                    <div class="col">
                        게시판
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <input type="text" class="form-control" placeholder="글 제목" name="title">
                        </div>
                        <div class="col-1">
                            <select name="category" id="category">
                                <option value="질문">질문</option>
                                <option value="공략">공략</option>
                                <option value="일반">일반</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <select name="user" id="user">
                                <?= $list ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <textarea
                                class="form-control"
                                placeholder="글 내용"
                                name="contents"
                                style="height: 350px;"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">글쓰기</button>
                        </div>
                    </form>
                </div>

                <!-- 게시판 글쓰기 양식 영역 끝 -->

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