<?php
include 'connectDB.php';
$list ='';
$category=$_GET['category'];
if($category == 'all'){
    $sql = "SELECT*FROM board LEFT JOIN user ON board.user = user.num WHERE board_type= 'free' ORDER BY board.idx DESC";
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
    $sql = "SELECT*FROM board LEFT JOIN user ON board.user = user.num WHERE board_type= 'free' ORDER BY board.idx DESC";
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
    $sql ="SELECT*FROM board LEFT JOIN user ON board.user = user.num WHERE category='$category' AND board_type= 'free' ORDER BY board.idx DESC";
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