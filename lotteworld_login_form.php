<?php
   include "lotteworld_db.php";
      
      $id = $_POST['userid'];
      $pw = $_POST['password'];
      
      $sql = "select * from lotte_userinfo where userid = '".$id."'";
      $query = $conn->query($sql);
      $row = mysqli_fetch_array($query);

      $hashpw = $row['password'];
      $passwordResult = password_verify($pw, $hashpw);

      if($row['userid']==$id){
        if($passwordResult===true){
          session_start();
            $_SESSION['userid'] = $row['userid'];
            ?>
        <script>
            location.href="lotteworld_main.php";
         </script>
       <? }else{?>
        <script>
                alert('비밀번호가 일치하지 않습니다.');
                history.back();
        </script>
      <? }
      }else{?>
        <script>
                alert('존재하지 않는 아이디 입니다.');
                history.back();
        </script>
      <?}?>