<?php
 session_start();
 ?>
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
                        소환사 게시판
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="position_board_top.php">탑</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="position_board_jg.php">정글</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="position_board_mid.php">미드</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="position_board_ad.php">원딜</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="position_board_sup.php">서폿</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="free.php">자유게시판</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php
            if( isset($_SESSION['user_id'])){
                ?>
                <button type="button" class="btn btn-outline-secondary">
                    <a href="/firstapp/api/process_logout.php">logout</a>
                </button>
                <button type="button" class="btn btn-outline-secondary">
                    <a href="mypage.php">mypage</a>
                </button>
                <?php
            }
            else{
             ?>
             <button type="button" class="btn btn-outline-secondary">
                 <a href="login.php">login</a>
             </button>
             <?php
            }
            ?>
        </div>
    </div>
</nav>