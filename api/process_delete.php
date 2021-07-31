<?php
include 'connectDB.php';

  $id =$_POST['id'];
  settype($id, 'integer');
  $from = $_POST['from'];
  $sql ="";
  if($from == 'free'){
    $sql .= "
    DELETE
     FROM table_free
     WHERE id = $id ";
     $result = mysqli_query($conn, $sql);
     if($result === false){
      ?>
<script>
    alert('ERROR');
    window.location.href = "free.php";
</script>
<?php
    } else {
      ?>
<script>
    alert('삭제되었습니다');
    window.location.href = "free.php?";
</script>
<?php
    }
  }
  else if($from == 'position'){
    $sql .= "
    DELETE
     FROM position_board
     WHERE id = $id ";
     $result = mysqli_query($conn, $sql);
     if($result === false){
      ?>
<script>
    alert('ERROR');
    window.location.href = "position_board.php?position=<?=$_POST['position']?>";
</script>
<?php
    } else {
      ?>
<script>
    alert('삭제되었습니다');
    window.location.href = "position_board.php?position=<?=$_POST['position']?>";
</script>
<?php
    }
  }

?>