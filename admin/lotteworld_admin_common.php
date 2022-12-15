<?
  session_start();

  $sql ="select * from lotte_userinfo where userid = '".$_SESSION['userid']."'";
  $query = $conn->query($sql);
  $user = mysqli_fetch_array($query);

  if($user['admin']==0){
    echo"
    <script>
      alert('접근 권한이 없습니다!');
      history.back();
    </script>
    ";
  }else{
    
  }
?>