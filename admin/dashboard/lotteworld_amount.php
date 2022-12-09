<!DOCTYPE html>
<?
     include "../../lotteworld_db.php";
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
            $sql = "select * from lotteworld_amount";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);
            ?>
            <div class="col-10 mt-3 ms-1">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-4 pb-2 col-10">이용요금</h5>
                <div class="col-9">
                    <table class="col-12 col-sm-6 table border">
                        <thead class="border-bottom-1 fw-bold" style="background-color:#F8F8F8">
                            <tr>
                                <td class="border-end fs-5 text-start border-bottom-0" style="width:16%;color:#550ADF">파크 이용권</td>
                                <td class="border-end border-bottom-0 fs-4 ps-4" style="width:42%;height:60px;color:#550ADF">1Day</td>
                                <td class="fs-4 border-bottom-0 ps-4 " style="width:42%;color:#550ADF">After4(오후 4시부터 적용)</td>
                            </tr>
                        </thead>
                        <tbody style="color:#555559">
                            <tr>
                                <td class="border-end text-center border-bottom-1">어른</td>
                                <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['dayadult'])?>원</td>
                                <td class="border-bottom-0 text-end pe-4 fw-bold" ><?=number_format($row['afteradult'])?>원</td>
                            </tr>
                            <tr>
                                <td class="border-end text-center" >청소년</td>
                                <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['daystudent'])?>원</td>
                                <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['afterstudent'])?>원</td>
                            </tr>
                            <tr>
                                <td class="border-end text-center" >어린이</td>
                                <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['daychild'])?>원</td>
                                <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['afterchild'])?>원</td>
                            </tr>
                            <tr>
                                <td class="border-end text-center" >베이비</td>
                                <td class="border-end text-end pe-4 fw-bold"><?=number_format($row['daybaby'])?>원</td>
                                <td class="text-end pe-4 fw-bold"><?=number_format($row['afterbaby'])?>원</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-7 pt-3">
                        <table class="col-12 col-sm-6 table border">
                            <thead class="border-bottom-1 fw-bold" style="background-color:#F8F8F8">
                                <tr>
                                    <td class="border-end fs-5 text-start border-bottom-0" colspan=2 style="width:32%;color:#550ADF">파크 입장권</td>
                                </tr>
                            </thead>
                            <tbody style="color:#555559">
                                <tr>
                                    <td class="border-end text-center border-bottom-1" style="width:32%;">어른</td>
                                    <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['parkadult'])?>원</td>
                                </tr>
                                <tr>
                                    <td class="border-end text-center" >청소년</td>
                                    <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['parkstudent'])?>원</td>
                                </tr>
                                <tr>
                                    <td class="border-end text-center" >어린이</td>
                                    <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['parkchild'])?>원</td>
                                </tr>
                                <tr>
                                    <td class="border-end text-center" >베이비</td>
                                    <td class="border-end text-end pe-4 fw-bold"><?=number_format($row['parkbaby'])?>원</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                    <button class="btn btn-primary rounded-pill fs-5" onclick="location.href='lotteworld_amount_update.php'">가격정보 수정</button>    
                </div>
                </div>
                
            </div>
        </div>
           
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

<script>

    // function delChk(){
    //     if(!confirm('정말로 삭제하십니까?')){
    //         event.preventDefault();
    //         return false;
    //     }
    // } 
</script>