<?php
include 'connectDB.php';
$id = $_GET['id'];
$view_count_update="UPDATE board SET view_count=view_count+1 WHERE id =$id ";
mysqli_query($conn,$view_count_update);
$sql = "SELECT*FROM board LEFT JOIN user ON board.user_idx = user.idx WHERE id=$id ";
$result = mysqli_query($conn, $sql);
$view = mysqli_fetch_array($result);
$title = $view['title'];
$content = $view['content'];
$idx = $view['idx'];
$name = $view['name'];
$created = $view['created'];
$category = $view['category'];
$view_count = $view['view_count'];
$board_type = $view['board_type'];
$position = $view['position'];
?>