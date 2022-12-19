<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>비밀번호 재설정</title>
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
        .signUpText,.title,input,.password{
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
                <h3>비밀번호 재설정</h3>
            </div><br><br>
            <div class="container col-4 justify-content-center">
                <form action="lotteworld_search_pw.php" method="POST">
                    <input type="text" name="username" placeholder="이름" class="form-control my-2 rounded-1 border-secondary" autocomplete="off">
                    <input type="text" name="userid" placeholder="아이디" class="form-control my-2 rounded-1 border-secondary" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-secondary round-start" placeholder="주민번호" name="secNo[]" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        <span class="input-group-text border-secondary">-</span>
                        <input type="password" class="form-control password border-secondary round-end" name="secNo[]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-primary mx-3 my-2 col-5 align-item-center" style="font-weight:bold" value="패스워드 재설정">
                    </div>
                </form>
            </div>    
        </div><br><br><br>
        <footer id="footerText" class="container col-10 border-top my-4">
            <div class="row">
                <img src="lotteworld/logo3.png" alt="none image" style="width:220px;height:100px;">
                <div class="col-8 align-self-center">
                    부산광역시 남구 OOO로 롯데월드  |  대표 : 아무개<br>
                    사업자등록번호 | 000-00-0001통신판매업신고번호 | 송파 제0003호전화 | 0000-2000
                </div>
                <div style="width:220px;height:100px;"></div>
                <div class="col-8">상기정보는 허위 사실입니다. <br>
                COPYRIGHT 2018 LOTTEWORLD. ALL RIGHTS RESERVED.
                </div>
            </div>
        </footer>
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