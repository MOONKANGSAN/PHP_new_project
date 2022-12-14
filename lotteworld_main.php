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
        </style>
    </head>
    <body>
            <?php 
            $conn = mysqli_connect("localhost","root","autoset","lotteworld");
            $regdate = date('Y-m-d H:i:s');
            $datecode = date('YmdHis')."A";
            $year = date('Y-m-d');

            include "lotteworld_visit.php";
            include "lotteworld_topmenu.php";
            
            $sql = "select * from lotteworld_amount";
            $query = $conn->query($sql);
            $amount = mysqli_fetch_array($query);

            $sql = "select * from lotteworld_carousel order by idx desc";
            $query = $conn->query($sql);
            ?>
           <!--상단 네비게이션 바-->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <? for($i=1;$row=mysqli_fetch_array($query);$i++){
                   if($i==1){?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <? }else {?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i-1?>" aria-label="Slide <?=$i?>"></button>
                    <?}
                    }?>
            </div>
            <div class="carousel-inner">
                <? 
                $sql = "select * from lotteworld_carousel order by idx desc";
                $query = $conn->query($sql);
                for($i=1;$row=mysqli_fetch_array($query);$i++){
                    if($i==1){?>
                    <div class="carousel-item active">
                        <img src="admin/dashboard/photo/<?=$row['photo_address']?>" class="d-block w-100" alt="...">
                    </div>
                    <?}else{?>
                    <div class="carousel-item">
                        <img src="admin/dashboard/photo/<?=$row['photo_address']?>" class="d-block w-100" alt="...">
                    </div>
                    <? }
                    } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<!--메인화면 캐러셀-->
        <ul id="nav2" class="nav justify-content-center bg-white border-bottom py-3  align-item-center">
            <li class="nav-item align-self-center">
                <span class="material-symbols-outlined" style="color:blueviolet;font-size:3rem">timer</span>&nbsp;
            </li>
            <li class="nav-item align-self-center">
                <div  style="color:black;font-size:24px;">오늘의 운영시간 09:00-22:00</div>
            </li>
        </ul>    
        <br><br>
<!--오늘의 운영시간-->
        <div class="container col-10 bg-white my-3">
            <div class="row justify-content-center my-3 fw-bold" style="font-size:32px;">나에게 맞는 혜택을 알아볼까요?</div>
            <div class="row text-secondary justify-content-center my-3" style="font-size:20px;">현재 진행중인 할인혜택을 알아보세요.</div>
            <!-- <hr style="border:solid 0.5px grey;"> -->
            <div id="card_group" class="row justify-content-center">
                <? $sql = "select * from lotteworld_sale where main = 'mainEv' order by idx desc limit 8";
                   $query2 = $conn->query($sql);
                for($i=0;$row2=mysqli_fetch_array($query2);$i++){
                    if($row2['percent']>0){
                        $sale_af = $amount['dayadult'] *(1-$row2['percent']) ;
                    }elseif($row2['percent']==0){
                        $sale_af = $amount['dayadult']-$row2['adult_sale'];
                    }
                    ?>
                <div onclick="location.href='lotteworld_amount_sale_view.php?salecode=<?=$row2['salecode']?>'" class="card rounded-0 m-0 p-0 col-3 card_sale" style="width:18rem;">
                    <img src="admin/dashboard/sale_photo/<?=$row2['photo']?>" class="card-img-top" alt="broken-image">
                    <div class="card-body">
                        <p class="ps-1 card-text" style="color:#5a07e0"><?=number_format($sale_af)?>원</p>
                        <p class="ps-1"><?=$row2['title']?></p>
                    </div>
                </div> 
                <?}?>
                <button class="col-2 m-3 rounded-pill btn btn-outline-primary justify-content-center" style="font-weight:bold" onclick="location.href='lotteworld_amount_sale.php'">할인혜택 전체보기</button>
            </div> 
        </div><br><br>
<!--할인혜택-->
        <div class="container col-12 bg-white my-3 border-top">
            <div class="row justify-content-center my-3 fw-bold" style="font-size:32px;">다양한 공연 및 퍼레이드 정보를 한눈에!</div>
            <div class="row text-secondary justify-content-center my-3" style="font-size:20px;">다양한 공연정보를 알아보세요.</div>
            <div class="row justify-content-center">
            <? $sql = "select * from lotteworld_peraid order by idx desc limit 5";
                   $query2 = $conn->query($sql);
                for($i=0;$row2=mysqli_fetch_array($query2);$i++){?>
                <div onclick="location.href='lotteworld_peraid_view.php?eventcode=<?=$row2['eventcode']?>'" class="card rounded-0 m-3 p-0 col-2 border-white" style="width:14rem;">
                    <img src="admin/dashboard/peraid_photo/<?=$row2['photo']?>" class="card-img-top rounded-0" style="width:100%;height:100%;border:none" alt="broken-image">
                </div> 
                <?}?>
                <button class="col-2 rounded-pill btn btn-outline-primary justify-content-center">이벤트 전체보기</button>
            </div>
        </div><br><br>
<!--진행중인 퍼레이드-->
        <div class="container col-10 bg-white my-3 border-top">
            <div id="notice" class="row justify-content-center my-3" style="font-size:32px;">공지사항/App 설치</div>
            <div class="row justify-content-center">
                    <div class="card col-5 mx-2 rounded-0 border-secondary">
                        <h4 class="mt-2">공지사항</h4>
                        <ul>
                        <? $sql = "select * from lotteworld_notice order by notice_idx desc limit 4";
                            $query2 = $conn->query($sql);
                            for($i=0;$row2=mysqli_fetch_array($query2);$i++){?>
                                <li onclick="location.href='lotteworld_notice_view.php?idx=<?=$row2['notice_idx']?>'" style="font-size:20px;"><?=$row2['notice_title']?></li>
                            <?}?>
                        </ul>
                    </div>
                    <div class="card col-5 mx-2 rounded-0 border-white">
                        <img src="lotteworld/app.jpg" alt="none-img" style="width:100%;height:100%;object-fit:cover">
                    </div>
            </div>
        </div>

<!--공지사항,앱 설치-->
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