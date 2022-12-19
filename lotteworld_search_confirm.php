<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>회원가입 | SIGNUP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
    
        #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        }
        .signUpText,.title,.btn{
            font-family: 'Jeju Gothic', sans-serif;
        }
        </style>
    </head>
    <body>
            <? 
            include "lotteworld_db.php";
            $idx = $_GET['usercode'];
            if($_SERVER['HTTP_REFERER'] == '') exit("잘못된 접근입니다.");

            // GET을 POST로 바꾸거나 URL로 접속 막기
            $sql = "select * from lotte_userinfo where usercode = '".$idx."'";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);
            ?>
        <div class="container col-9 my-3">
            <div class="border-bottom text-start">
                <img onclick="location.href='lotteworld_main.php'" src="lotteworld/logo4.jpg" alt="" width=100 height=85>
            </div>
            <div class="mx-3 my-3 signUpText"><br>
                <h3>아이디 찾기</h3>
            </div><br>
            <div class="mx-3 my-3 col-12 row text-center justify-content-center icon" onclick="location.href='lotteworld_search_userinfo.php'">
                <span class="material-symbols-outlined mx-2" style="font-size:5rem;color:blue"><i class="bi bi-person-lines-fill"></i></span><br>
                <h4 class="mx-3 title align-self-center"><?=$row['username']?>님의 아이디는 <?=$row['userid']?> 입니다.</h4>
            </div>
            <div class="mx-3 my-3 col-12 row text-center justify-content-center">
                <a href="lotteworld_main.php" class="btn btn-primary col-2 mx-2 rounded-pill">HOME</a>
                <a href="lotteworld_search_userpw.php" class="btn btn-primary col-2 mx-2 rounded-pill">비밀번호 찾기</a>
            </div>
        </div><br><br><br>
        <? include "lotteworld_footer.php";?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
