<?php

//$file_name = basename(__FILE__);
//사용하는 페이지에 넣어야함


if(!isset($_GET['category'])){
    if($page <= 1){//페이징 없음
    }
    else{
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?page=1">첫 페이지</a>
    </li>
    <?php
    }
    if($page<= 1){//페이징 없음
    }
    else{
        $pre=$page-1;
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?page=<?=$pre?>">이전</a>
    </li>
    <?php
    }
    for($i=$block_start ; $i<=$block_end ; $i++){
        if($page == $i){
            ?>
            <li class="page-item">
            <a class="page-link" href="<?=$file_name?>?page=<?=$i?>"><b style="color:#df7366;"><?=$i?></b></a>
        </li>
        <?php
        }
        else{
            ?>
            <li class="page-item">
            <a class="page-link" href="<?=$file_name?>?page=<?=$i?>"><?=$i?></a>
        </li>
        <?php
        }
    }
    if($page >= $total_page){
    }
    else{
        $next =$page+1;
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?page=<?=$next?>">다음</a>
    </li>
    <?php
    }
    if($page>=$total_page){
    }
    else{
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?page=<?=$total_page?>">마지막 페이지</a>
    </li>
    <?php
    }
}
else{
    if($page <= 1){//페이징 없음
    }
    else{
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?category=<?=$_GET['category']?>&page=1">첫 페이지</a>
    </li>
    <?php
    }
    if($page<= 1){//페이징 없음
    }
    else{
        $pre=$page-1;
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?category=<?=$_GET['category']?>&page=<?=$pre?>">이전</a>
    </li>
    <?php
    }
    for($i=$block_start ; $i<=$block_end ; $i++){
        if($page == $i){
            ?>
            <li class="page-item">
            <a class="page-link" href="<?=$file_name?>?category=<?=$_GET['category']?>&page=<?=$i?>"><b style="color:#df7366;"><?=$i?></b></a>
        </li>
        <?php
        }
        else{
            ?>
            <li class="page-item">
            <a class="page-link" href="<?=$file_name?>?category=<?=$_GET['category']?>&page=<?=$i?>"><?=$i?></a>
        </li>
        <?php
        }
    }
    if($page >= $total_page){
    }
    else{
        $next =$page+1;
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?category=<?=$_GET['category']?>&page=<?=$next?>">다음</a>
    </li>
    <?php
    }
    if($page>=$total_page){
    }
    else{
        ?>
        <li class="page-item">
        <a class="page-link" href="<?=$file_name?>?category=<?=$_GET['category']?>&page=<?=$total_page?>">마지막 페이지</a>
    </li>
    <?php
    }
}
?>