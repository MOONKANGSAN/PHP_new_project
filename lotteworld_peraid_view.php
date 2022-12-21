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
        include "lotteworld_visit.php";
        include "lotteworld_db.php";
        include "lotteworld_topmenu.php";
        
            $sql = "select * from lotteworld_peraid where eventcode = '".$_GET['eventcode']."'";
            $query = $conn->query($sql);
            $peraid = mysqli_fetch_array($query);
            
   $date = date_create($peraid['startdate']);
   $startdate = date_format($date, "Y.m.d.");
   $date = date_create($peraid['enddate']);
   $enddate = date_format($date, "Y.m.d.");
   
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container col-9 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="lotteworld_main.php"><i class="bi bi-house-door fs-3"></i></a></li>
                <li class="breadcrumb-item fs-4" aria-current="page"><a href="lotteworld_peraid_list.php">이벤트 안내</a></li>
            </ol>
        </nav>   
        <div class="container col-9 justify-content-center align-items-center">
            <h3 class="text-center fw-bold fs-2 mb-2"><?=$peraid['title']?></h3>
            <h5 class="text-center pb-3 text-secondary">화려한 퍼레이드를 보며 추억을 쌓아요!</h5>
            <div class="row justify-content-center">
                <div class="card col-4 rounded-0 border border-2 text-center justify-content-center mx-2" style="width:16rem;height:20rem;background-color:#F5F5F5;">
                    <div class="card-body align-middle align-items-center">
                        <br>
                        <div class="align-middle"><h3><i class="bi bi-calendar3"></i></h3></div>
                        <h4 class="card-subtitle mb-2 text-muted">공연기간</h4>
                        <hr>
                        <h5 class="card-subtitle mb-2 text-dark"><?=$startdate?></h5>
                        <h6>~</h6> 
                        <h5 class="card-subtitle mb-2 text-dark"><?=$enddate?></h5> 
                    </div>
                </div>
                <div class="card col-4 rounded-0 border border-2 text-center justify-content-center mx-2" style="width:16rem;height:20rem;background-color:#F5F5F5;">
                    <div class="card-body align-middle align-items-center">
                        <br>
                        <div class="align-middle"><h3><i class="bi bi-alarm"></i></h3></div>
                        <h4 class="card-subtitle mb-2 text-muted">시작시간</h4>
                        <hr><br>
                        <h5 class="card-subtitle mb-2 text-dark"><?=$peraid['peraidtime']?></h5>
                        
                    </div>
                </div>
                <div class="card col-4 rounded-0 border border-2 text-center justify-content-center mx-2" style="width:16rem;height:20rem;background-color:#F5F5F5;">
                    <div class="card-body align-middle align-items-center">
                        <br>
                        <div class="align-middle"><h3><i class="bi bi-hourglass-split"></i></h3></div>
                        <h4 class="card-subtitle mb-2 text-muted">공연시간</h4>
                        <hr><br>
                        <h5 class="card-subtitle mb-2 text-dark"><?=$peraid['playtime']?>분</h5>
                        
                    </div>
                </div>
            </div><br>
            <h3 class="text-dark text-center mt-3 fw-bold">공연장소</h3>
            <div class="col-9 container align-items-center justify-content-center my-3 text-center border border-2">
            <div class="fw-bold mx-1 my-3 text-start"><h5>· <?=$peraid['place']?></h5></div>
            <img  src="./admin/dashboard/peraid_photo/<?=$peraid['place_photo']?>" alt="..." width=700 height=380>
            </div>
            <div class="container col-12 justify-content-center text-center">
                <button onclick="location.href='lotteworld_peraid_list.php'" class="btn btn-outline-primary fs-6 fw-bold mt-4 justify-content-center col-2 rounded-pill">목록</button>
            </div><br><br>
        </div>
    
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>