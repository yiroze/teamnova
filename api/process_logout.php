<?php
session_start();

if( isset($_SESSION['user_id'])){

  session_destroy();

  ?>
  <script>
      alert('로그아웃 되었습니다');
      window.location.href = "main.php";
  </script>
  <?php
}
else{
  ?>
  <script>
      alert('로그인 상태가 아닙니다');
      window.location.href = "main.php";
  </script>
  <?php

}

?>