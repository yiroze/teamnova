<?php
$conn = mysqli_connect(
    'localhost',
    'hojae',
    'ghwo1353',
    'duo.gg'
);
$list ='';
$category=$_GET['category'];
if($category == 'all'){
    $sql = "SELECT*FROM table_free LEFT JOIN user ON table_free.user = user.num ORDER BY table_free.id DESC";
    $result = mysqli_query($conn, $sql);
    while( $row =mysqli_fetch_array($result)){
        $list = $list."<tr onclick=\"moveURL({$row['id']})\" >
        <th scope=\"row\">{$row['id']}</th>
        <td>{$row['category']}</td>
        <td>{$row['title']}</td>
        <td>{$row['name']}</td>
        <td>{$row['created']}</td>
        <td>{$row['view_count']}</td>
    </tr>";
    }
    
}
elseif($category == null){
    $sql = "SELECT*FROM table_free LEFT JOIN user ON table_free.user = user.num ORDER BY table_free.id DESC";
    $result = mysqli_query($conn, $sql);
    while( $row =mysqli_fetch_array($result)){
        $list = $list."<tr onclick=\"moveURL({$row['id']})\" >
        <th scope=\"row\">{$row['id']}</th>
        <td>{$row['category']}</td>
        <td>{$row['title']}</td>
        <td>{$row['name']}</td>
        <td>{$row['created']}</td>
        <td>{$row['view_count']}</td>
    </tr>";
    }
    
}
else{
    $sql ="SELECT*FROM table_free LEFT JOIN user ON table_free.user = user.num WHERE category='$category' ORDER BY table_free.id DESC";
$result = mysqli_query($conn, $sql);
while( $row =mysqli_fetch_array($result)){
    $list = $list."<tr onclick=\"moveURL({$row['id']})\" >
    <th scope=\"row\">{$row['id']}</th>
    <td>{$row['category']}</td>
    <td>{$row['title']}</td>
    <td>{$row['name']}</td>
    <td>{$row['created']}</td>
    <td>{$row['view_count']}</td>
</tr>";
}

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
            table {
                background-color: white;
            }
            ul.pagination {
                position: relative;
                left: 45%;
            }
            div.container {
                background-color: white;
                position: absolute;
                top: 20%;
                left: 15%;
            }
            div.col {
                margin: 60px 0 0;
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
            <div class="row">
                <div>
                    <div style="float:left;">
                        <form action="free.php" method="get" id="category">
                            <select name="category">
                                <option value="all">전체</option>
                                <option value="질문">질문</option>
                                <option value="공략">공략</option>
                                <option value="일반">일반</option>
                            </select>
                            <input type="submit" value="확인">
                        </form>
                    </div>
                    <div style="float:right;">
                        <button
                            type="button"
                            style="width:100px; height:40px;"
                            onclick="location.href='create_free.php'">
                            글쓰기
                        </button>
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
            function moveURL(param) {
                location.href = "free_view.php?id=" + param;
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