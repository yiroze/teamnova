<?php
include 'connectDB.php';
for($i = 0; $i <200 ; $i++){
        $sql = "
        INSERT INTO board
          ( board_type, title, content ,category, view_count , created, position, user_idx )
          VALUES(
            'position',
              '원딜 일반글$i',
              '일반글$i',
              '일반',
              '0',
              NOW(),
              'ad',
              '6'
          )
        ";
$result = mysqli_query($conn, $sql);
}
?>