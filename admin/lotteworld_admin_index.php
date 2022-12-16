<!DOCTYPE html>
<?
     include "../lotteworld_db.php";
     session_start();
     include "lotteworld_admin_common.php"
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>LOTTE | ADMIN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
        *{
            font-family: 'Jeju Gothic', sans-serif;
        }
        /* #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        } */
        </style>
    </head>
    <body>
        <?
            include "lotteworld_admin_top.php";
        ?>
        <!--상단 네비게이션 바-->
        <div class="justify-content-start d-flex">
            <?
            include "lotteworld_admin_side.php";

            $year1 = date('Y-m-d');

            $sql = "select count(*) as cnt from lotteworld_visit where year = '".$year1."' ";
            $query = $conn->query($sql);
            $today = mysqli_fetch_array($query);

            $sql = "select count(*) as cnt from lotteworld_visit";
            $query = $conn->query($sql);
            $total = mysqli_fetch_array($query);

        //     $sql2 = "select count(*) as cnt from lotteworld_visit where year != date('Y-m-d')";
        //     $query2 = $conn->query($sql2);
        //    $today = mysqli_fetch_assoc($query2);

            $sql = "select count(*) as cnt from lotte_userinfo";
            $query = $conn->query($sql);
            $user = mysqli_fetch_array($query);

            $sql = "select count(*) as cnt from lotteworld_qna where conf = 0";
            $query = $conn->query($sql);
            $qna = mysqli_fetch_array($query);
            ?>
            
            <div class="col-10 mt-3 ms-1">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <div class="row">
                    <div class="card me-3 col-3" style="width:18rem;">
                        <div class="card-body">
                            <h4 class="card-title">오늘 방문자수</h4>
                            <p class="card-text" style="font-size:3rem"><?=$today['cnt']?>명</p>
                        </div>
                    </div>
                    <div class="card me-3 col-3" style="width:18rem;">
                        <div class="card-body">
                            <h4 class="card-title">누적 방문자수</h4>
                            <p class="card-text" style="font-size:3rem"><?=$total['cnt']?>명</p>
                            <!-- <a href="#" class="btn btn-primary">타임라인 조회</a> -->
                        </div>
                    </div>
                    <div class="card me-3 col-3" style="width:18rem;">
                        <div class="card-body">
                            <h4 class="card-title">회원 수</h4>
                            <p class="card-text" style="font-size:3rem"><?=$user['cnt']?>명</p>
                            <a href="user_dir/lotteworld_userlist.php" class="btn btn-primary">회원리스트 조회</a>
                        </div>
                    </div>
                    <div class="card me-3 col-3" style="width:18rem;">
                        <div class="card-body">
                            <h4 class="card-title">처리 안된 QnA</h4>
                            <p class="card-text" style="font-size:3rem"><?=$qna['cnt']?>개</p>
                            <a href="faqs/lotteworld_qna_admin.php" class="btn btn-primary">QnA리스트 조회</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>