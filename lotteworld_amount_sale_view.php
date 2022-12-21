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
        
            $sql = "select * from lotteworld_amount";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);

            $sql = "select * from lotteworld_sale where salecode = '".$_GET['salecode']."'";
            $query = $conn->query($sql);
            $sale = mysqli_fetch_array($query);

            if($sale['percent']>0){
                $dayadult_af = $row['dayadult'] * (1-$sale['percent']);
                $daystudent_af = $row['daystudent'] * (1-$sale['percent']);
                $daychild_af = $row['daychild'] * (1-$sale['percent']);
                $adult_af4 = $row['afteradult'] * (1-$sale['percent']);
                $student_af4 = $row['afterstudent'] * (1-$sale['percent']);
                $child_af4 = $row['afterchild'] * (1-$sale['percent']);
                $parkadult_af = $row['parkadult'] * (1-$sale['percent']);
                $parkstudent_af = $row['parkstudent'] * (1-$sale['percent']);
                $parkchild_af = $row['parkchild'] * (1-$sale['percent']);
            }elseif($sale['percent']==0){
                $dayadult_af = $row['dayadult'] - $sale['adult_sale'];
                $daystudent_af = $row['daystudent'] - $sale['student_sale'];
                $daychild_af = $row['daychild'] - $sale['child_sale'];
                $adult_af4 = $row['afteradult'] - $sale['adult_sale4'];
                $student_af4 = $row['afterstudent'] - $sale['student_sale4'];
                $child_af4 = $row['afterchild'] - $sale['child_sale4'];
                $parkadult_af = $row['parkadult']  - $sale['adult_sale_p'];
                $parkstudent_af = $row['parkstudent']- $sale['student_sale_p'];
                $parkchild_af = $row['parkchild'] - $sale['child_sale_p'];
            }
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container col-9 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="lotteworld_main.php"><i class="bi bi-house-door fs-3"></i></a></li>
                <li class="breadcrumb-item fs-4" aria-current="page"><a href="lotteworld_amount.php">요금/혜택 안내</a></li>
                <li class="breadcrumb-item active fs-4" aria-current="page"><a href="lotteworld_amount_sale.php">할인혜택 리스트</a></li>
            </ol>
        </nav>   
        <div class="container col-12 justify-content-center align-items-center">
            <h3 class="text-center fw-bold fs-2 mb-3"><?=$sale['title']?></h3>
            <h5 class="text-center mb-4 pb-3 text-secondary">오직 롯데월드에서! 누릴 수 있는 혜택을 살펴봐요</h5><br>
            <table class="col-12 col-sm-12 table border justify-content-center align-items-center">
                <thead class="border-bottom-1 fw-bold" style="background-color:#F8F8F8">
                    <tr>
                        <td class="border-bottom-0 border-end text-center align-middle" style="width:7%">분류</td>
                        <td class="border-end border-bottom-0 fs-4 text-center align-middle" colspan=3 style="width:31%;height:65px;color:#550ADF">1Day</td>
                        <td class="border-end border-bottom-0 fs-4 text-center align-middle" colspan=3 style="width:31%;color:#550ADF">After4(오후 4시부터 적용)</td>
                        <td class=" border-bottom-0 fs-4 text-center align-middle" colspan=3 style="width:31%;color:#550ADF">파크 입장권</td>
                    </tr>
                </thead>
                <tbody style="color:#555559">
                    <tr>
                        <td class="border-bottom-0 border-end align-middle fw-bold">어른</td>
                        <td class="border-bottom-0 fw-bold text-center"><?=number_format($row['dayadult'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>   
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($dayadult_af)?>원</td>
                        <td class="border-bottom-0 fw-bold text-center border-bottom-1"><?=number_format($row['afteradult'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold" ><?=number_format($adult_af4)?>원</td>
                        <td class="border-bottom-0 fw-bold text-center border-bottom-1"><?=number_format($row['parkadult'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($parkadult_af)?>원</td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0 border-end align-middle fw-bold">청소년</td>
                        <td class="border-bottom-0 fw-bold text-center" ><?=number_format($row['daystudent'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($daystudent_af)?>원</td>
                        <td class="border-bottom-0 fw-bold text-center border-bottom-1"><?=number_format($row['afterstudent'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($student_af4)?>원</td>
                        <td class="border-bottom-0 fw-bold text-center border-bottom-1"><?=number_format($row['parkstudent'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($parkstudent_af)?>원</td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0 border-end align-middle fw-bold">어린이</td>
                        <td class="border-bottom-0 fw-bold text-center" ><?=number_format($row['daychild'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($daychild_af)?>원</td>
                        <td class="border-bottom-0 fw-bold text-center border-bottom-1"><?=number_format($row['afterchild'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($child_af4)?>원</td>
                        <td class="border-bottom-0 fw-bold text-center border-bottom-1"><?=number_format($row['parkchild'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($parkchild_af)?>원</td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0 border-end fw-bold">베이비</td>
                        <td class="border-bottom-0 fs-5 text-center" >베이비</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['daybaby'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center border-bottom-1">베이비</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class="border-bottom-0 text-end pe-4 border-end fw-bold"><?=number_format($row['afterbaby'])?>원</td>
                        <td class="border-bottom-0 fs-5 text-center border-bottom-1">베이비</td>
                        <td class="border-bottom-0 fs-5 text-center">▶▶▶▶▶</td>
                        <td class=" border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['parkbaby'])?>원</td>
                    </tr>
                </tbody>
            </table>
            <div class="container col-12 justify-content-center text-center">
                * 베이비(만12개월~만36개월)은 할인혜택이 적용되지 않습니다. 
            </div><br>
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