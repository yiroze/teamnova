<?php
include 'connectDB.php';
// 현재 페이지 번호 받아오기
if(isset($_GET["page"])){
    $page = $_GET["page"]; // 하단에서 다른 페이지 클릭하면 해당 페이지 값 가져와서 보여줌
} else {
    $page = 1; // 게시판 처음 들어가면 1페이지로 시작
}
$list ="";
$category=$_GET['category'];
$q=$_GET['q'];
$target=$_GET['target'];
//카테고리 별로 글 전체 받아오기
if(!isset($_GET['q'])&&!isset($_GET['target'])){
if($category == 'all'){
    $cnt_sql = "SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' ORDER BY board.id DESC";
    $cnt_result = mysqli_query($conn, $cnt_sql);
}
elseif($category == null){
    $cnt_sql = "SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' ORDER BY board.id DESC";
    $cnt_result = mysqli_query($conn, $cnt_sql);
}
else{
    $cnt_sql ="SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE category='$category' AND board_type= 'free' ORDER BY board.id DESC";
    $cnt_result = mysqli_query($conn, $cnt_sql);
}
}else{
    if($target=="title"){
        $cnt_sql ="SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' AND title LIKE '%$q%' ORDER BY board.id DESC";
        $cnt_result = mysqli_query($conn, $cnt_sql);
    }
    elseif($target=="user_name"){
        $cnt_sql ="SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' AND user.name LIKE '%$q%' ORDER BY board.id DESC";
        $cnt_result = mysqli_query($conn, $cnt_sql);
    }
}
$total_record =mysqli_num_rows($cnt_result); //게시물 갯수
$scale = 10; //페이지당 보여줄 게시물 개수
$block_cnt = 5; //블록 개수
$block_num = ceil($page / $block_cnt); //현재 페이지 블록
$block_start = (($block_num-1)*$block_cnt)+1;//블록 시작번호
$block_end = $block_start + $block_cnt- 1 ; //블록 끝번호
$total_page = ceil($total_record/$scale);
if($block_end>$total_page){
    $block_end=$total_page;//블록 마지막 번호가 총 페이지수보다 크면 마지막 페이지 번호를 총 페이지 수로 정함
}
$total_block = ceil($total_page/$block_cnt);//블록 총 개수
$page_start= ($page-1)*$scale ; //sql limit걸때 사용
if(!isset($_GET['q'])&&!isset($_GET['target'])){
if($category == 'all'){
    $sql = "SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' ORDER BY board.id DESC LIMIT $page_start,$scale";
    $result = mysqli_query($conn, $sql);
  
}
elseif($category == null){
    $sql = "SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' ORDER BY board.id DESC LIMIT $page_start,$scale";
    $result = mysqli_query($conn, $sql);
 
}
else{
    $sql ="SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE category='$category' AND board_type= 'free' ORDER BY board.id DESC LIMIT $page_start,$scale";
    $result = mysqli_query($conn, $sql);
} 
}else{
    if($target=="title"){
        $sql ="SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' AND title LIKE '%$q%' ORDER BY board.id DESC LIMIT $page_start,$scale";
        $result = mysqli_query($conn, $sql);
    }
    elseif($target=="user_name"){
        $sql ="SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE board_type= 'free' AND user.name LIKE '%$q%' ORDER BY board.id DESC LIMIT $page_start,$scale";
        $result = mysqli_query($conn, $sql);
    }
}
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


?>