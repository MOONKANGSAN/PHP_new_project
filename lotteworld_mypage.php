<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>LOTTE WORLD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
        header,.carousel,.container{
            font-family: 'Jeju Gothic', sans-serif;
        }
        #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        }
        #card_group,#nav2,#notice{
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: bold;
        }
        .card_sale:hover{
            border:blue solid 3px;
            transform:scale(1.00);
            transition: all 0.3s;
            color:#5a07e0;
            box-shadow: 1px 1px 20px #ddd;
        }
        a:visited{
            color:inherit;
        }
        </style>
    </head>
    <body>
        <?php 
        include "lotteworld_visit.php";
        include "lotteworld_db.php";
        include "lotteworld_topmenu.php";
        session_start(); 

            $sql = "select * from lotte_userinfo where userid = '".$_SESSION['userid']."'";
            $query = $conn->query($sql);
            $user = mysqli_fetch_array($query);

            $phone1 = substr($user['phoneNumber'],0,3);
            $phone2 = substr($user['phoneNumber'],3,4);
            $phone3 = substr($user['phoneNumber'],7,4);
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        
        <div class="container col-9 justify-content-center align-items-center">
            <h3 class="text-center fw-bold mb-2">마이페이지</h3>
            <hr style="color:black;">
            <div class="btn-group container justify-content-center text-center text-primary">
                <button onclick="location.href='lotteworld_qna_write.php'" class="btn btn-outline-primary" aria-current="page">QnA 작성</button>
                <button onclick="location.href='lotteworld_reserve.php'" class="btn btn-outline-primary" aria-current="page">지금 예매하기</button>
            </div>
            <br><br>
            <!-- <h5 class="text-center mb-4 pb-3 text-secondary">이===</h5> -->
            <div class="card_group row justify-content-center">
                <div class="card mx-2 py-2 border border-2" style="width:18rem;height:24rem;border-color:#b8b6b6">
                    <div class="card-body">
                        <h5 class="card-title">회원 정보</h5>
                        <ul>
                            <li class="my-1">ID : <?=$user['userid']?></li>
                            <li class="my-1">Name : <?=$user['username']?></li>
                            <li class="my-1">Email : <?=$user['Email']?></li>
                            <li class="my-1">P.H. : <?=$phone1?>-<?=$phone2?>-<?=$phone3?></li>
                        </ul>
                        <div class="text-center">
                            <img class="rounded-circle mt-1 border border-secondary" style="width:90px;height:90px;" src="<?=$user['savezone'].$user['profile']?>" alt="">
                        </div>
                    </div>
                    <!-- <form action="lotteworld_mypage_infocn"></form> -->
                    <button onclick="openPopup()" class="btn btn-outline-success justify-content-center">회원정보 수정하기</button>
                </div>
                <div class="card mx-2 p-2" style="width:18rem;height:24rem;">
                    <div class="card-body">
                        <h5 class="card-title">내가 작성한 QnA</h5>
                        <ul class="list-group">
                            <? 
                                $sql = "select * from lotteworld_qna where userid = '".$_SESSION['userid']."' order by idx desc limit 6";
                                $query = $conn->query($sql);
                                for($i=0;$qna=mysqli_fetch_array($query);$i++){?>
                                        <li onclick="location.href='lotteworld_qna_view.php?idx=<?=$qna['idx']?>'" class="list-group-item">
                                            <? 
                                            $qna_title = $qna['title'];
                                            if(strlen($qna_title)>20){?>
                                                <?=iconv_substr($qna_title,0,20)?>...     
                                            <?}else{?>
                                                <?=$qna_title?>
                                            <?}?>
                                        </li>
                                <?}?>
                        </ul>
                    </div>
                    <button onclick="location.href='lotteworld_mypage_qna.php'" class="btn btn-outline-success justify-content-center">내가 쓴 QnA 확인</button>
                </div>
                <div class="card mx-2 p-2" style="width:18rem;height:24rem;">
                    <div class="card-body">
                        <h5 class="card-title">나의 예매내역</h5>
                        <ul class="list-group">
                            <? 
                                $sql = "select * from lotteworld_reserve where reserve_userid = '".$_SESSION['userid']."' and conf = 0 and date >= $year  order by idx desc limit 6";
                                $query = $conn->query($sql);
                                for($i=0;$res=mysqli_fetch_array($query);$i++){?>
                                        <li onclick="location.href='lotteworld_reserve_confirm.php?reservecode=<?=$res['reservecode']?>'" class="list-group-item"><?=$res['date']?></li>
                                <?}?>
                        </ul>
                    </div>
                    <button onclick="location.href='lotteworld_mypage_reserve.php'" class="btn btn-outline-success justify-content-center">예매내역 전체 보기</button>
                </div>
                
            </div>
        </div>
        <br>
    
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script>
        function openPopup() {
            var _width = '650';
            var _height = '700';
            // 팝업을 가운데 위치시키기 위해 아래와 같이 값 구하기
            var _left = Math.ceil(( window.screen.width - _width )/2);
            var _top = Math.ceil(( window.screen.height - _height )/3); 

            window.open('lotteworld_mypage_infoup.php?userid=<?=$_SESSION['userid']?>', 'popup-test', 'width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top );
            }
            //이벤트 클릭을 통한 함수 호출
        </script>
    </body>
</html>