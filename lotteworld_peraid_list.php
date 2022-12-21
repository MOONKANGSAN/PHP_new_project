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
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container col-9 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="lotteworld_main.php"><i class="bi bi-house-door fs-3"></i></a></li>
                <li class="breadcrumb-item fs-4" aria-current="page">이벤트 안내</li>
            </ol>
        </nav>   
        <div class="container col-10 justify-content-center align-items-center">
            <h3 class="text-center fw-bold fs-2 mb-2">이벤트/퍼레이드 안내</h3>
            <h5 class="text-center pb-3 text-secondary">화려한 퍼레이드를 보며 추억을 쌓아요!</h5>
            <div class="row justify-content-center">
            <? $sql = "select * from lotteworld_peraid order by idx desc";
                   $query2 = $conn->query($sql);
                for($i=0;$row2=mysqli_fetch_array($query2);$i++){?>
                <div onclick="location.href='lotteworld_peraid_view.php?eventcode=<?=$row2['eventcode']?>'" class="card rounded-0 m-3 p-0 col-2 border-white" style="width:14rem;">
                    <img src="admin/dashboard/peraid_photo/<?=$row2['photo']?>" class="card-img-top rounded-0" style="width:100%;height:100%;border:none" alt="broken-image">
                </div> 
                <?}?>
            </div>
            <div class="container col-12 justify-content-center text-center">
                <a href="lotteworld_main.php" class="btn btn-outline-primary fs-4 mt-4 justify-content-center col-2 rounded-pill">HOME</a>
            </div><br><br>
        </div>
    
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>