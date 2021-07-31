<?php
include 'connectDB.php';

  $filtered = array(
    'email' =>mysqli_real_escape_string($conn, $_POST['email']),
    'password' =>mysqli_real_escape_string($conn, $_POST['password']),
    'name' =>mysqli_real_escape_string($conn, $_POST['name'])
  );


$email = $_POST['email'];
$password = $_POST['password'];
 $check_sql ="SELECT * FROM user WHERE email='$email'";
 $check_result = mysqli_query($conn ,$check_sql);
$exist =mysqli_num_rows($check_result);

if($exist==0){
    $create_sql = "
    INSERT INTO user
      ( email, password, name , join_date)
      VALUES(
          '{$filtered['email']}',
          SHA2($password,256),
          '{$filtered['name']}',
          NOW()
      )
  ";

  $result = mysqli_query($conn, $create_sql);
  if($result == true){
    ?>
    <script type="text/Javascript">
        alert('회원가입이 완료되었습니다');
        window.location.href = "/firstapp/login.php";
    </script>
    <?php
    } else {
       ?>
       <script type="text/Javascript">
           alert(' 문제가 생겼습니다 관리자에게 문의해주세요');
           window.location.href = "/firstapp/join.php";
       </script>
       <?php
    }

}

else{
  ?>
  <script type="text/Javascript">
      alert('이미 존재하는 아이디입니다');
      window.location.href = "/firstapp/join.php";
  </script>
  <?php
}

?>
