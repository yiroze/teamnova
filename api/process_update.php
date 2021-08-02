<?php
include 'connectDB.php';

  $filtered = array(
    'title' =>mysqli_real_escape_string($conn, $_POST['title']),
    'content' =>mysqli_real_escape_string($conn, $_POST['contents'])
  );
  $id =$_POST['id'];
  $position = $_POST['position'];
  $board_type = $_POST['board_type'];
  settype($id, 'integer');

$sql = "
  UPDATE board
  SET
  title = '{$filtered['title']}',
  content = '{$filtered['content']}'
  WHERE
  id = $id ";

$result = mysqli_query($conn, $sql);
if($result === false){
  ?>
  <script>
      alert('서버에 문제가 생겼습니다 다시시도해주세요');
      window.location.href = "/firstapp/update_board/update.php?id=<?=$id?>";
  </script>
  <?php
} else {
  if($board_type ==="free"){
    ?>
    <script>
        alert('수정되었습니다');
        window.location.href = "/firstapp/board/free.php";
    </script>
    <?php
  }
  else if($board_type ==="position"){
    ?>
    <script>
        alert('수정되었습니다');
        window.location.href = "/firstapp/board/position_board_<?=$position?>.php";
    </script>
    <?php
  }
}

?>