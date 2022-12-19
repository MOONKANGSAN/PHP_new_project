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
        .signUpText,.title,input,#msg,label{
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
            $usercode = $_GET['usercode'];
            if($_SERVER['HTTP_REFERER'] == '') exit("잘못된 접근입니다.");
            ?>
        <div class="container col-9 my-3">
            <div class="border-bottom text-start">
                <img onclick="location.href='lotteworld_main.php'" src="lotteworld/logo4.jpg" alt="" width=100 height=85>
            </div>
            <div class="mx-3 my-3 signUpText"><br>
                <h3>비밀번호 재설정</h3>
            </div><br><br>
            <div class="container col-6 justify-content-center">
                <form action="lotteworld_search_re_pw_conf.php" method="POST">
                    <!-- <input type="text" name="password" placeholder="비밀번호" class="form-control my-2 rounded-1 border-secondary">
                    <input type="text" placeholder="비밀번호 확인" class="form-control my-2 rounded-1 border-secondary"> -->
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name">비밀번호</label>
                            <input type="password" style="color:black" class="form-control rounded-2 border-secondary" id="pw1" name="password" required>
                            <div class="invalid-feedback">
                            비밀번호를 입력해주세요.
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nickname">비밀번호 확인</label>
                            <input type="password" style="color:black" class="form-control rounded-2 border-secondary" id="pw2">
                            <div class="mt-2" id="msg"></div>
                        </div>
                    </div> 
                    <input type="hidden" name="usercode" value="<?=$usercode?>">
                    <div class="row">
                        <input type="submit" class="btn btn-primary mx-3 my-2 col-5 align-item-center" style="font-weight:bold" value="패스워드 재설정">
                    </div>
                </form>
            </div>    
        </div><br><br><br>
       <? include "lotteworld_footer.php"?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(function(){
                $("#pw2").on("keyup",function(){
                    var msg = $("#msg").val();
                    var leng = $("#pw1").val();
                    if(leng.length<8){
                        $("#msg").html("비밀번호는 최소 8자 이상입력해주세요.");
                        $("#msg").css("color","red");
                    }else if($("#pw1").val() == $("#pw2").val()){
                        $("#msg").html("패스워드가 일치합니다.");
                        $("#msg").css("color","blue");
                    }else{
                        $("#msg").html("패스워드가 일치하지 않습니다.");
                        $("#msg").css("color","red");
                    }
                })
            });
</script>