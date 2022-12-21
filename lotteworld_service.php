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
        .signUpText,.title,.card_group,nav,.user{
            font-family: 'Jeju Gothic', sans-serif;
        }
        .icon:hover{
            transform:scale(1.05);
            transition: all 0.5s;
            color:#5a07e0;
        }
        </style>
    </head>
    <body>
            <?php 
            include "lotteworld_topmenu.php";
            include "lotteworld_db.php";
            session_start();
            ?>
            <hr class="border shadow-sm" style="color:#F8F8F8">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container col-9 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="lotteworld_main.php">
                    <i class="bi bi-house-door fs-3"></i>
                    <!-- <span class="material-symbols-outlined fs-4">home</span> -->
                </a></li>
                <li class="breadcrumb-item active fs-4" aria-current="page">소통서비스</li>
            </ol>
        </nav>
        <div class="container col-9 my-3">
            <div class="text-center fs-3 fw-bold my-3">소통서비스</div><br>
            <div class="card_group row justify-content-center">
                <div class="card mx-2 py-2 border border-2 icon" onclick="location.href='lotteworld_qna_list.php'" style="width:18rem;height:18rem;border-color:#b8b6b6">
                    <div class="card-body">
                        <h4 class="card-title text-center fw-bold">QnA 리스트 조회</h4>
                        <div class="text-center">
                            <span class="material-symbols-outlined" style="font-size:13rem">contact_support</span>
                        </div>
                    </div>
                    <!-- <form action="lotteworld_mypage_infocn"></form> -->
                </div>
                <div class="card mx-2 py-2 border border-2 icon" onclick="location.href='lotteworld_faq.php'" style="width:18rem;height:18rem;border-color:#b8b6b6">
                    <div class="card-body">
                        <h4 class="card-title text-center fw-bold">FAQs 자주묻는 질문</h4>
                        <div class="text-center">
                        <span class="material-symbols-outlined" style="font-size:13rem">checklist_rtl</span>
                        </div>
                    </div>
                    <!-- <form action="lotteworld_mypage_infocn"></form> -->
                </div>
            </div>
        </div><br>
      <? include "lotteworld_footer.php";?>
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