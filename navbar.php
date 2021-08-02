<?php
 session_start();
 ?>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/firstapp/main.php">duo.gg</a>
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
                    <a class="nav-link active" aria-current="page" href="/firstapp/pick.php">픽률</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/firstapp/ban.php">벤률</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/firstapp/duo.php">듀오찾기</a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="/firstapp/board/free.php"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        소환사 게시판
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="/firstapp/board/position_board_top.php">탑</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/firstapp/board/position_board_jg.php">정글</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/firstapp/board/position_board_mid.php">미드</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/firstapp/board/position_board_ad.php">원딜</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/firstapp/board/position_board_sup.php">서폿</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="/firstapp/board/free.php">자유게시판</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
            if( isset($_SESSION['user_id'])){
                ?>
                <button type="button" class="btn btn-primary " onclick="location.href='/firstapp/api/process_logout.php'">
                logout
                </button>
                <button type="button" class="btn btn-primary" onclick="location.href='/firstapp/firstapp/mypage.php'">
                my page
                </button>
                <?php
            }
            else{
             ?>
             <button type="button" class="btn btn-primary" onclick="location.href='/firstapp/login.php'">
             login
             </button>
             <?php
            }
            ?>
        </div>
    </div>
</nav>