<?php
include 'connectDB.php';
  $board_type =$_POST['board_type'];
  $position = $_POST['position'];
  $id =$_POST['id'];
  settype($id, 'integer');
  $sql = "
  DELETE
   FROM board
   WHERE id = $id ";
   $result = mysqli_query($conn, $sql);
     if($result === false){
       if($board_type == "free"){
              ?>
<script>
    alert('ERROR');
    window.location.href = "/firstapp/board/free.php";
</script>
<?php 
       }
       else if($board_type == "position"){
        ?>
        <script>
            alert('ERROR');
            window.location.href = "/firstapp/board/position_board_<?=$position?>.php";
        </script>
        <?php 
       }

    } else {
      if($board_type == "free"){
        ?>
<script>
alert('삭제되었습니다');
window.location.href = "/firstapp/board/free.php";
</script>
<?php 
 }
 else if($board_type == "position"){
  ?>
  <script>
      alert('삭제되었습니다');
      window.location.href = "/firstapp/board/position_board_<?=$position?>.php";
  </script>
  <?php 
 }
    }
?>