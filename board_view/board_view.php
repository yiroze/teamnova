<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/firstapp/api/select_view_api.php";
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
            <link rel="stylesheet" type="text/css" href="/firstapp/board_view/view.css">
        <title>duo.gg</title>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#navbar").load("/firstapp/navbar.php"); //헤더 인클루드
            });
        </script>
    </head>
    <body>
        <!-- navbar -->
        <div id="navbar"></div>

        <div class="container-lg">
        <div class="row">
                <div class="col" id="title">
                    <?=$title?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    조회수:<?=$view_count?>
                </div>
                <div class="col">
                   <?=$name?>
                </div>
                <div class="col">
                     <?=$category?>
                </div>
                <div class="col-2">
                     <?=$created?>
                </div>
                <?php
                if ($board_type == "free"){
                    ?>
                      <div class="col">자유게시판</div>
                    <?php
                }
                else{
                    ?>
                    <div class="col">포지션 게시판</div>
                  <?php
                }
                ?>
                <?php
                if ($board_type == "position"){
                    ?>
                      <div class="col">
                     <?=$position?>
                </div>
                    <?php
                }
                else{
                    ?>
                    <div class="col">
              </div>
                  <?php
                }
                ?>
                <div class="col-2"></div>
                <?php
                if($_SESSION['user_idx'] == $idx ){
                    ?>
                    <div class="col">
                    <a href="/firstapp/update_board/update.php?id=<?=$_GET['id']?>">수정하기</a>
                    <form action="/firstapp/api/process_delete.php" method="post">
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <input type="hidden" name="board_type" value="<?=$board_type?>">
                        <input type="hidden" name="position" value="<?=$position?>">
                        <input type="submit" value="delete">
                    </form>
                </div>
                <?php
                }
                else{
                    ?>
                    <div class="col">
                </div>
                <?php
                }
                ?>
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