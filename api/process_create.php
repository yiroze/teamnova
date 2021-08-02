<?php
include 'connectDB.php';
session_start();

//자유게시판 등록 시작
if($_POST['board_type'] == "free"){
  $filtered = array(
    'board_type' =>mysqli_real_escape_string($conn, $_POST['board_type']),
    'title' =>mysqli_real_escape_string($conn, $_POST['title']),
    'content' =>mysqli_real_escape_string($conn, $_POST['contents']),
    'category' =>mysqli_real_escape_string($conn, $_POST['category']),
    'user_idx' =>mysqli_real_escape_string($conn, $_POST['user_idx'])
  );

$sql = "
  INSERT INTO board
    ( board_type, title, content ,category, view_count , created, user_idx )
    VALUES(
      'free',
        '{$filtered['title']}',
        '{$filtered['content']}',
        '{$filtered['category']}',
        '0',
        NOW(),
        '{$filtered['user_idx']}'
    )
";

$result = mysqli_query($conn, $sql);
if($result === false){
  ?><script>alert('저장과정중 문제가 생겼습니다');
   window.location.href="/firstapp/board/free.php";</script>
  <?php
} else {
    ?>
    <script type="text/Javascript">
    <!--
      alert('게시되었습니다');
      window.location.href="/firstapp/board/free.php";
    //-->
    </script>
<?php
   exit;
}
}
//포지션 게시판 등록 시작 
else if($_POST['board_type'] == "position"){
 
    $filtered = array(
      'title' =>mysqli_real_escape_string($conn, $_POST['title']),
      'content' =>mysqli_real_escape_string($conn, $_POST['contents']),
      'category' =>mysqli_real_escape_string($conn, $_POST['category']),
      'usernum' =>mysqli_real_escape_string($conn, $_POST['user']),
      'position' =>mysqli_real_escape_string($conn, $_POST['position']),
      'user_idx' =>mysqli_real_escape_string($conn, $_POST['user_idx'])
    );
  
    $sql = "
  INSERT INTO board
    ( board_type, title, content ,category, view_count , created, position, user_idx )
    VALUES(
      'position',
        '{$filtered['title']}',
        '{$filtered['content']}',
        '{$filtered['category']}',
        '0',
        NOW(),
        '{$filtered['position']}',
        '{$filtered['user_idx']}'
    )
";

  $result = mysqli_query($conn, $sql);
  if($result === false){
    ?><script>alert('저장과정중 문제가 생겼습니다');
    window.location.href="/firstapp/create_board/create_position.php";</script>
   <?php
    
  } else {
    if($_POST['position'] == "top"){
      ?>
      <script type="text/Javascript">
        alert('게시되었습니다');
        window.location.href="/firstapp/board/position_board_top.php";
      </script>
  <?php
    }
    else if($_POST['position'] == "jg"){
      ?>
      <script type="text/Javascript">
        alert('게시되었습니다');
        window.location.href="/firstapp/board/position_board_jg.php";
      </script>
  <?php
    }
    else if($_POST['position'] == "mid"){
      ?>
      <script type="text/Javascript">
        alert('게시되었습니다');
        window.location.href="/firstapp/board/position_board_mid.php";
      </script>
  <?php
    }
    else if($_POST['position'] == "ad"){
      ?>
      <script type="text/Javascript">
        alert('게시되었습니다');
        window.location.href="/firstapp/board/position_board_ad.php";
      </script>
  <?php
    }
    else if($_POST['position'] == "sup"){
      ?>
      <script type="text/Javascript">
        alert('게시되었습니다');
        window.location.href="/firstapp/board/position_board_sup.php";
      </script>
  <?php
    }
    else{
      ?>
      <script type="text/Javascript">
        alert('error');
        window.location.href="/firstapp/main.php";
      </script>
  <?php
    }
     exit;
}
}
?>