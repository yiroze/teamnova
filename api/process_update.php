<?php
$conn = mysqli_connect(
  'localhost',
  'hojae',
  'ghwo1353',
  'Board');
  $filtered = array(
    'title' =>mysqli_real_escape_string($conn, $_POST['title']),
    'content' =>mysqli_real_escape_string($conn, $_POST['contents'])
  );
  $id =$_POST['id'];
  settype($id, 'integer');

$sql = "
  UPDATE table_free
  SET
  title = '{$filtered['title']}',
  content = '{$filtered['content']}'
  WHERE
  id = $id ";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
  error_log(mysqli_error($conn));
} else {
  echo '성공했습니다. <a href="free.php">돌아가기</a>';
  echo $sql;
}

?>