<?php
include 'connectDB.php';
if($_POST['board'] == "free"){

  $filtered = array(
    'title' =>mysqli_real_escape_string($conn, $_POST['title']),
    'content' =>mysqli_real_escape_string($conn, $_POST['contents']),
    'category' =>mysqli_real_escape_string($conn, $_POST['category']),
    'user_idx' =>mysqli_real_escape_string($conn, $_POST['user'])
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
  ?><script>alert('ERROR');
   window.location.href="free.php";</script>
  <?php
} else {
    ?>
    <script type="text/Javascript">
    <!--
      alert('OK');
      window.location.href="free.php";
    //-->
    </script>
<?php
   exit;
}
} elseif($_POST['board'] == "position"){
  $conn = mysqli_connect(
    'localhost',
    'hojae',
    'ghwo1353',
    'duo.gg');
    $filtered = array(
      'title' =>mysqli_real_escape_string($conn, $_POST['title']),
      'content' =>mysqli_real_escape_string($conn, $_POST['contents']),
      'category' =>mysqli_real_escape_string($conn, $_POST['category']),
      'usernum' =>mysqli_real_escape_string($conn, $_POST['user']),
      'position' =>mysqli_real_escape_string($conn, $_POST['position']),
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
    ?><script>alert('ERROR');
    window.location.href="position_board.php?position=<?=$_POST['position']?>";</script>
   <?php
    
  } else {
      ?>
      <script type="text/Javascript">
        alert('OK');
        window.location.href="position_board.php?position=<?=$_POST['position']?>";
      </script>
  <?php
     exit;

}
}
?>