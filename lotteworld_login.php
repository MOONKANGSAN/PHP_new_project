<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>로그인 | LOGIN</title>
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
        .signUpText,.title,input,label{
            font-family: 'Jeju Gothic', sans-serif;
        }
        .icon:hover{
            transform:scale(1.05);
            transition: all 0.5s;
            color:#5a07e0;
        }
        input[type=password]{
            font-family:arial;
        }
        </style>
    </head>
    <body>
            <?php 
            include "lotteworld_db.php";
            ?>
        <div class="container col-9 my-3">
            <div class="border-bottom text-start">
                <img onclick="location.href='lotteworld_main.php'" src="lotteworld/logo4.jpg" alt="" width=100 height=85>
            </div>
            <div class="mx-3 my-3 signUpText"><br>
                <h3>로그인</h3>
                <h5 class="mx-2 my-2" style="color : grey">로그인 후 다양한 기능을 사용하세요.</h5>
            </div><br><br>
            <div class="container col-4 justify-content-center">
                <form action="lotteworld_login_form.php" method="POST">
                    <label for="userid" class="fs-5 fw-bold">ID</label>
                    <input type="text" name="userid" class="form-control my-2 rounded-1 border-secondary" autocomplete="off">
                    <label for="userpw" class="fs-5 fw-bold">P.W.</label>
                    <input type="password" name="password" class="form-control my-2 rounded-1 border-secondary ">
                    <div class="row">
                        <input type="submit" class="btn btn-outline-primary mx-3 my-2 fw-bold" style="width:100px;" value="LOGIN">
                        <a href="lotteworld_search.php" class="float-end col-9" style="font-weight:bold">아이디,비밀번호를 잊어버렸나요?</a>
                    </div>
                </form>
            </div>    
        </div><br><br><br>
        <? include "lotteworld_footer.php" ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
<script>
    function openPopup() {
 var _width = '650';
 var _height = '700';
 // 팝업을 가운데 위치시키기 위해 아래와 같이 값 구하기
 var _left = Math.ceil(( window.screen.width - _width )/2);
 var _top = Math.ceil(( window.screen.height - _height )/3); 

 window.open('lotteworld_signupinfo.php', 'popup-test', 'width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top );
}
</script>