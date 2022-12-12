<head>
    <?
    include "lotteworld_db.php";
    session_start();

    $sql = "select * from lotte_userinfo where userid = '".$_SESSION['userid']."'";
    $query = $conn->query($sql);
    $user = mysqli_fetch_array($query);
    ?>
    <style>
        i{
            font-size:45px;
        }
        a{
          color:black;
          text-decoration:none;
        }
        a:visited{
          color:black;
          text-decoration:none;
        }
    </style>
</head>
    <header class="sticky-top bg-white d-flex align-items-center justify-content-center justify-content-md-between py-3">
      <a href="lotteworld_main.php" class="d-flex align-items-center col-md-3 mb-2 mx-4 mb-md-0 text-dark text-decoration-none">
      <img src="lotteworld/logo.jpg" alt="Bootstrap" width="75" height="50">
      </a>
      <ul class="nav col-12 col-md-auto mb-2 fs-5 fw-bold justify-content-center mb-md-0" style="font-size:24px;">
        <li><a href="lotteworld_amount.php" class="nav-link mx-2 px-2 link-dark">요금/혜택 안내</a></li>
        <li><a href="lotteworld_peraid_list.php" class="nav-link  mx-2 px-2 link-dark">이벤트 안내</a></li>
        <li><a href="lotteworld_qna_list.php" class="nav-link  mx-2 px-2 link-dark">소통 서비스</a></li>
        <li><a href="lotteworld_faq.php" class="nav-link  mx-2 px-2 link-dark">이용 가이드</a></li>
        <li><a href="lotteworld_notice.php" class="nav-link px-2 link-dark">공지사항</a></li>
      </ul>
      <?
        if(isset($_SESSION['userid'])){
          if($user['admin']==1){?>
          <ul class="nav col-3 col-md-3 justify-content-end text-end mx-4 align-middle align-items-center">
            <li><img src="<?=$user['savezone'].$user['profile']?>" class="rounded-circle" style="width:35px;height:35px;" alt="" onclick="location.href='lotteworld_mypage.php'"></li>
            <li class="mx-2"><?=$user['username']?>님</li>
            <li class="" >|</li>
            <li class="mx-2"><a href="lotteworld_logout.php">LOGOUT</a></li>
            <li class="" >|</li>
            <li class="mx-2 fs-6"><a href="admin/lotteworld_admin_index.php" style="color:blue;font-size:16px;"><span class="material-symbols-outlined">admin_panel_settings</span></a></li> 
          </ul>
        <?}elseif($user['admin']!=1){?>
          <ul class="nav col-3 col-md-3 justify-content-end text-end mx-4 align-middle align-items-center">
            <li><img src="<?=$user['savezone'].$user['profile']?>" class="rounded-circle" style="width:45px;height:45px;" alt="" onclick="location.href='lotteworld_mypage.php'"></li>
            <li class="mx-2"><?=$user['username']?>님</li>
            <li class="" >|</li>
            <li class="mx-2"><a href="lotteworld_logout.php">LOGOUT</a></li>
          </ul>
            <?}
              }else{?>
              <ul class="nav col-3 col-md-3 justify-content-end text-end mx-4 align-middle align-items-center">
                <li class="mx-2"><a href="lotteworld_login.php">LOGIN</a></li>
                <li class="" >|</li>
                <li class="mx-2"><a href="lotteworld_signup.php">SIGNUP</a></li> 
              </ul>
        <?}?>  
    </header>
