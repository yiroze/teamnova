<?php
include $_SERVER['DOCUMENT_ROOT']."/firstapp/api/select_pos_jg.php";
session_start();
$file_name = basename(__FILE__);
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
        <link rel="stylesheet" type="text/css" href="board_style.css">
        <title>duo.gg</title>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#navbar").load("/firstapp/navbar.php"); //헤더 인클루드
            });
        </script>
        <script type="text/javascript" src="moveURL.js"></script>
    </head>
    <body>
        <!-- navbar -->
        <div id="navbar"></div>
        <div class="container">
            <div class="row">
            <div class="page_name">정글 게시판</div>
            </div>
            <div class="row">
                <div>
                    <div style="float:left;">
                        <form action="position_board_jg.php" method="get" id="category">
                            <select name="category" onchange="submit()">
                                <option value="all">전체</option>
                                <option value="질문">질문</option>
                                <option value="공략">공략</option>
                                <option value="일반">일반</option>
                            </select>
                        </form>
                    </div>
                    <div style="float:right;">
                        <?php
                    if(isset($_SESSION['user_id'])){
                        ?>
                        <button
                            type="button"
                            style="width:100px; height:40px;"
                            class="btn btn-primary"
                            onclick="location.href='/firstapp/create_board/create_position.php?position=jg'">
                            글쓰기
                        </button>
                    <?php
                    }
                    else{
                        ?>
                        <button
                            type="button"
                            style="width:100px; height:40px;"
                            class="btn btn-primary"
                            onclick="alert('회원만 게시가 가능합니다')">
                            글쓰기
                        </button>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <table class="table table-striped" id="list">
                    <thead>
                        <tr>
                            <th scope="col" class="td1" style="width : 8%"></th>
                            <th scope="col" class="td1" style="width : 7%"></th>
                            <th scope="col" class="td2" style="width : 50%">제목</th>
                            <th scope="col" class="td3" style="width : 15%">유저</th>
                            <th scope="col" class="td4" style="width : 10%">작성일</th>
                            <th scope="col" class="td4" style="width : 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$list?>
                    </tbody>
                </table>
                <div class="text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                        include $_SERVER['DOCUMENT_ROOT']."/firstapp/api/page_api.php";
                        ?>
                        </ul>
                    </nav>
                </div>
                <div>
                    <form action="<?=$file_name?>" method="get">
                        <select name="target">
                            <option value="title">제목</option>
                            <option value="user_name">작성자</option>
                        </select>
                        <input type="text" class="form-control" placeholder="검색" name="q">
                        <button type="submit" class="btn btn-primary">검색</button>
                    </form>
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