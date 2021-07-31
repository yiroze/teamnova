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
            img {
                height: 55px;
                width: 55px;
            }
            .container {
                background-color: white;
                height: 420px;
                position: absolute;
                top: 40%;
                left: 15%;
            }
            div.col {
                padding: 0;
                width: 50px;
                height: 50px;
            }
            .img_bnt {
                padding: 0;
                width: 50px;
                height: 50px;
            }
            select {
                position: relative;
                width: 100%;
                height: 35px;
            }
            #select {
                position: relative;
                width: 40%;
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

        <div class="container">
            <div class="row" id="select">
                <div class="col-4">
                    <select name="tier" onchange="tierListner(this)">
                        <option selected="selected">전체</option>
                        <option value="아이언">아이언</option>
                        <option value="브론즈">브론즈</option>
                        <option value="실버">실버</option>
                        <option value="골드">골드</option>
                        <option value="플레티넘">플레티넘</option>
                        <option value="다이아">다이아</option>
                        <option value="마스터">마스터</option>
                        <option value="그랜드마스터">그랜드마스터</option>
                        <option value="챌린저">챌린저</option>
                    </select>
                    <div><?php echo $_GET[tier]; ?></div>
                </div>
                <div class="col">
                    <button type="button" class="img-button" id="img_btn"><img src="src/top.png"></button>
                </div>
                <div class="col">
                    <button type="button" class="img-button" id="img_btn"><img src="src/jg.png"></button>
                </div>
                <div class="col">
                    <button type="button" class="img-button" id="img_btn"><img src="src/mid.png"></button>
                </div>
                <div class="col">
                    <button type="button" class="img-button" id="img_btn"><img src="src/ad.png"></button>
                </div>
                <div class="col">
                    <button type="button" class="img-button" id="img_btn"><img src="src/sup.png"></button>
                </div>

            </div>
            <div class="row">
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
                            <tr onclick="moveURL(1)">
                                <th scope="row">1</th>
                                <td>
                                    <?php
                                   echo $_GET[category];
                                   ?>
                                </td>
                                <td>글<?php echo $_GET[page] ?></td>
                                <td>usesssssssssrr1</td>
                                <td>0000-00-00</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    <?php
                                   echo $_GET[category];
                                   ?>
                                </td>
                                <td>글<?php echo $_GET[page] ?></td>
                                <td>user2</td>
                                <td>0000-00-00</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <?php
                                   echo $_GET[category];
                                   ?>
                                </td>
                                <td>글<?php echo $_GET[page] ?></td>
                                <td>user3</td>
                                <td>0000-00-00</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <?php
                                   echo $_GET[category];
                                   ?>
                                </td>
                                <td>글<?php echo $_GET[page] ?></td>
                                <td>user4</td>
                                <td>0000-00-00</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <?php
                                   echo $_GET[category];
                                   ?>
                                </td>
                                <td>글
                                    <?php echo $_GET[page] ?>
                                </td>
                                <td>user5</td>
                                <td>0000-00-00</td>
                                <td>0</td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                <li class="page-item">
                                    <a class="page-link" href="free_top.php?page=1">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="free_top.php?page=2">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="free_top.php?page=3">3</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script>
            function tierListner(obj) {
                location.href = "?tier=" + obj.value;
            }
        </script>

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