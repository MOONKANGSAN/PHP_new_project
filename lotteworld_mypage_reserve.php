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
        
        session_start();

        $sql = "select * from lotteworld_reserve where reserve_userid = '".$_SESSION['userid']."' and conf = 0 and date >= $year order by idx desc";
        $query = $conn->query($sql);
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        
        <div class="container col-9 justify-content-center align-items-center">
            <h3 class="text-start fw-bold mb-2">나의 예매내역 확인</h3>
            <hr style="color:black;">
            <!-- <h5 class="text-center mb-4 pb-3 text-secondary">이===</h5> -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="text-center" style="width:20%">방문일자</td>
                        <td class="text-center" style="width:15%">방문인원 수</td>
                        <td class="text-center" style="width:30%">할인혜택</td>
                        <td class="text-center" style="width:20%">할인 금액</td>
                        <td class="text-center" style="width:25%">총 합계금액</td>
                    </tr>
                </thead>
                <tbody>
                    <? for($i=0;$row=mysqli_fetch_array($query);$i++){
                        $person = $row['adult'] + $row['student'] + $row['child'] + $row['baby'];
                        ?>
                    <tr onclick="location.href='lotteworld_reserve_confirm.php?reservecode=<?=$row['reservecode']?>'">
                        <td class="text-center"><?=$row['date']?></td>
                        <td class="text-end"><?=$person?>명</td>
                        <td><?=$row['sale_item']?></td>
                        <td><?=number_format($row['sale_price'])?>원</td>
                        <td><?=number_format($row['total_price'])?>원</td>
                    </tr>
                    <?}?>
                </tbody>
            </table>
        </div>
        <br>
    
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>