<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>예매 | RESERVE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
    
        #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        }
        .signUpText,.title,table,.btn{
            font-family: 'Jeju Gothic', sans-serif;
        }
        </style>
         <script>
            $(function() {
                $("#datepicker").datepicker({
                        minDate:0,
                        dateFormat:'yy-mm-dd'
                    });
            });
        </script>
    </head>
    <body>
            <?php 
            include "lotteworld_db.php";

            $sql = "select * from lotteworld_amount";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);

            $sql = "select * from lotteworld_reserve where reservecode = '".$_GET['reservecode']."'";
            $query = $conn->query($sql);
            $reserve=mysqli_fetch_array($query);
            ?>
        <div class="container col-9 my-3">
            <div class="border-bottom text-start">
                <img onclick="location.href='lotteworld_main.php'" src="lotteworld/logo4.jpg" alt="" width=100 height=85>
            </div>
            <div class="mx-3 my-3 signUpText"><br>
                <h3>온라인 예매</h3>
                <h5 class="mx-2 my-2" style="color:grey">다양한 혜택을 적용하여 예매 하세요!</h5>
            </div>
            <form action="lotteworld_reserve_ok.php" method="POST">
            <div class="card p-3 border-1 border-dark rounded-2 col-10">
                <table class="table fs-5">
                    <tbody>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">방문일자</td>
                            <td colspan=3><input type="text" id="datepicker" name="date"  style="width:40%" class="form-control rounded-0" value="<?=$reserve['date']?>" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end border-start" style="width:20%">어른</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="adult" class="form-control border-0" value="<?=$reserve['adult']?>"></td>
                            <td class="align-middle text-center border-end" style="width:20%" >청소년</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="student" class="form-control border-0" value="<?=$reserve['student']?>"></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end border-start" style="width:20%">어린이</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="child" class="form-control border-0" value="<?=$reserve['child']?>"></td>
                            <td class="align-middle text-center border-end" style="width:20%" >베이비</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="baby" class="form-control border-0" value="<?=$reserve['baby']?>"></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end border-start" colspan=4 style="width:20%;">
                                <div class="accordion border-0" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            롯데월드 나이 규정확인
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body text-start fs-6" style="color:grey">
                                                <ul>
                                                    <li><strong>만 19세</strong> 이상부터 성인(어른) 요금을 적용합니다.</li>
                                                    <li><strong>만 13세</strong> 이상부터 만 18세 이하의 경우 청소년의 요금을 적용합니다.</li>
                                                    <li><strong>만 7세</strong> 이상부터 만 12세 이하의 경우 어린이 요금이 적용됩니다.</li>
                                                    <li><strong>만 36개월</strong> 이상부터 만6세 이하까지 베이비 요금이 적용됩니다.(만 36개월 미만의 경우 미취학아동으로 별도의 요금이 필요하지 않습니다.)</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            가격 정보 확인
                                        </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body text-start fs-6" style="color:grey">
                                            <table class="col-12 col-sm-12 fs-6 table border justify-content-center align-items-center">
                                                <thead class="border-bottom-1 fw-bold" style="background-color:#F8F8F8">
                                                    <tr>
                                                        <td class="border-end border-bottom-0 fs-6 ps-4 align-middle text-center" colspan=2 style="width:33%;height:65px;color:#550ADF">1Day</td>
                                                        <td class="border-end fs-6 border-bottom-0 ps-4 align-middle text-center" colspan=2 style="width:33%;color:#550ADF">After4(오후 4시부터 적용)</td>
                                                        <td class="fs-6 border-bottom-0 ps-4 align-middle text-center" colspan=2 style="width:33%;color:#550ADF">파크 입장권</td>
                                                    </tr>
                                                </thead>
                                                <tbody style="color:#555559">
                                                    <tr>
                                                        <td class="border-bottom-0 fs-6 text-center">어른</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['dayadult'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">어른</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold" ><?=number_format($row['afteradult'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">어른</td>
                                                        <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['parkadult'])?>원</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0 fs-6 text-center" >청소년</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['daystudent'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">청소년</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['afterstudent'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">청소년</td>
                                                        <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['parkstudent'])?>원</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0 fs-6 text-center" >어린이</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['daychild'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">어린이</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['afterchild'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">어린이</td>
                                                        <td class="border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['parkchild'])?>원</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-bottom-0 fs-6 text-center" >베이비</td>
                                                        <td class="border-bottom-0 border-end text-end pe-4 fw-bold"><?=number_format($row['daybaby'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">베이비</td>
                                                        <td class="border-bottom-0 text-end pe-4 border-end fw-bold"><?=number_format($row['afterbaby'])?>원</td>
                                                        <td class="border-bottom-0 fs-6 text-center border-bottom-1">베이비</td>
                                                        <td class=" border-bottom-0 text-end pe-4 fw-bold"><?=number_format($row['parkbaby'])?>원</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">티켓 분류</td>
                            <td colspan=3>
                                <? if($reserve['ticket']=="day"||$reserve['ticket']==""){?>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="width:60%">
                                        <input type="radio" class="btn-check" name="btnradio" value="day" id="btnradio1" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="btnradio1">Day</label>
                                        <input type="radio" class="btn-check" name="btnradio" value="after4" id="btnradio2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio2">After4</label>
                                        <input type="radio" class="btn-check" name="btnradio" value="park" id="btnradio3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio3">파크 입장권</label>
                                    </div>
                                <?}elseif($reserve['ticket']=="after4"){?>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="width:60%">
                                        <input type="radio" class="btn-check" name="btnradio" value="day" id="btnradio1" autocomplete="off" >
                                        <label class="btn btn-outline-primary" for="btnradio1">Day</label>
                                        <input type="radio" class="btn-check" name="btnradio" value="after4" id="btnradio2" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="btnradio2">After4</label>
                                        <input type="radio" class="btn-check" name="btnradio" value="park" id="btnradio3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio3">파크 입장권</label>
                                    </div>
                                    <?}elseif($reserve['ticket']=="park"){?>
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="width:60%">
                                            <input type="radio" class="btn-check" name="btnradio" value="day" id="btnradio1" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio1">Day</label>
                                            <input type="radio" class="btn-check" name="btnradio" value="after4" id="btnradio2" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btnradio2">After4</label>
                                            <input type="radio" class="btn-check" name="btnradio" value="park" id="btnradio3" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary" for="btnradio3">파크 입장권</label>
                                        </div>
                                <?}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">할인 선택</td>
                            <td colspan=3>
                                <select class="form-select" name="sale" aria-label="Default select example">
                                    <option value="none">선택 안함</option>
                                  <? 
                                    $sql = "select * from lotteworld_sale order by idx desc";
                                    $query = $conn->query($sql);
                                    for($i=0;$option=mysqli_fetch_array($query);$i++){?>
                                        <option value="<?=$option['salecode']."/".$option['title']?>"><?=$option['title']?>(<?=$option['percent']*100?>%)</option>        
                                    <?}?>
                                </select>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan=4 class="align-middle text-center border-end" >
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agree" value="agree" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        예매
                                    </label>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                <div class="text-end">
                    <?if($_GET['reservecode']){?>
                        <input type="hidden" name="updatecode" value="<?=$reserve['reservecode']?>">
                        <input type="submit" value="예매내역 확인" class="btn btn-outline-primary col-4 justify-content-end rounded-pill">
                    <?}else{?>
                        <input type="submit" value="예매내역 확인" class="btn btn-outline-primary col-4 justify-content-end rounded-pill">
                    <?}?>
                </div>
            </div>
            </form>
        </div><br>
        <?
            include "lotteworld_footer.php";
        ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>