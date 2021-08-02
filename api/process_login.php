<?php
include 'connectDB.php';

$filtered = array(
    'email' =>mysqli_real_escape_string($conn, $_POST['email']),
    'password' =>mysqli_real_escape_string($conn, $_POST['password']),
  );
  $email =$_POST['email'];
  $password_hash = hash( "sha256" ,$_POST['password']);//비밀번호 해쉬
  $sql = "SELECT * FROM user WHERE email='$email'";

$result = mysqli_query($conn, $sql);
$exist =mysqli_num_rows($result);
if ( !empty($email) && !empty($_POST['password'])){
if ($exist==1){
    //ID존재
    $row =mysqli_fetch_array($result);
    $password = $row['password'];
    if($password==$password_hash){
        //패스워드 일치
        session_start();
        $name = $row['name'];
        $idx = $row['idx'];
        $_SESSION['user_id'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_idx'] = $idx;
        ?>
<script type="text/Javascript">
    alert('로그인 되었습니다<?=$_SESSION[' user_id ']?>');
    window.location.href = "/firstapp/main.php";
</script>
<?php
    }
    else{
        //패스워드 불일치
        ?>
<script type="text/Javascript">
    alert('비밀번호가 일치하지 않습니다');
    window.location.href = "/firstapp/login.php";
</script>
<?php
    }
}
else {
   //존재하지 않는 email
   ?>
<script type="text/Javascript">
    alert('존재하지 않는 이메일입니다');
    window.location.href = "/firstapp/login.php";
</script>
<?php
}
} else{
    //email과 비밀번호를 입력해주세요
    ?>
<script type="text/Javascript">
    alert('이메일과 비밀번호를 입력해주세요');
    window.location.href = "/firstapp/login.php";
</script>
<?php
}


?> 