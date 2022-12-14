<?
    include "../lotteworld_db.php";

  $sql ="select * from lotte_userinfo where userid = '".$_SESSION['userid']."'";
  $query = $conn->query($sql);
  $user = mysqli_fetch_array($query);

  if($user['admin']!=1){?>
      <script>
        alert('º접근 권한이 없습니다!');
        history.back();
      </script><?
  } 
?>