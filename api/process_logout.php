<?php
include 'connectDB.php';

  $filtered = array(
    'id' =>mysqli_real_escape_string($conn, $_POST['id']),
    'password' =>mysqli_real_escape_string($conn, $_POST['password']),
    'name' =>mysqli_real_escape_string($conn, $_POST['name'])
  );
$id = $_POST['id'];
 $check_sql ="SELECT id FROM user WHERE ID='$id'";
 $check_result = mysqli_query($conn ,$check_sql);
$exist =mysqli_num_rows($check_result);

if($exist==0){
    $create_sql = "
    INSERT INTO user
      ( idx, password, name , join_date)
      VALUES(
          '{$filtered['id']}',
          SHA2('{$filtered['password']}',256),
          '{$filtered['name']}',
          NOW()
      )
  ";
  $result = mysqli_query($conn, $create_sql);
  if($result === false){
      echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
      print_r(mysqli_error($conn));
      echo $create_sql;
    } else {
      echo '성공했습니다. <a href="login.php">돌아가기</a>';
      echo $create_sql;
    }
}
else{
    echo '중복된 ID입니다';
}
?>