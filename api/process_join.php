<?php
include 'connectDB.php';

  $filtered = array(
    'email' =>mysqli_real_escape_string($conn, $_POST['email']),
    'password' =>mysqli_real_escape_string($conn, $_POST['password']),
    'name' =>mysqli_real_escape_string($conn, $_POST['name'])
  );


$email = $_POST['email'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];
 $check_sql ="SELECT * FROM user";
 $check_result = mysqli_query($conn,$check_sql);
if($password==$password_check){
 while ($row = mysqli_fetch_array($check_result)){
   $email_data = $row['email'];
   $name_data= $row['name'];
   if($email_data ==$email){
    ?>
    <script type="text/Javascript">
        alert('이미 존재하는 이메일입니다');
        window.location.href = "/firstapp/join.php";
    </script>
    <?php
   }
   else{
     if($name_data==$filtered['name']){
      ?>
      <script type="text/Javascript">
          alert('이미 존재하는 닉네임입니다');
          window.location.href = "/firstapp/join.php";
      </script>
      <?php
     }
    }
  }
  $create_sql = "
  INSERT INTO user
    ( email, password, name , join_date)
    VALUES(
        '{$filtered['email']}',
        SHA2('$password',256),
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
         alert('문제가 생겼습니다 관리자에게 문의해주세요');
         window.location.href = "/firstapp/join.php";
     </script>
     <?php
  }
}
else{
  ?>
  <script type="text/Javascript">
      alert('비밀번호를 확인해주세요');
      window.location.href = "/firstapp/join.php";
  </script>
  <?php
}
    
?>
