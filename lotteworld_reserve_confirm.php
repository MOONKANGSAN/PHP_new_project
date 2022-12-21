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
            session_start();

            $sql = "select * from lotteworld_amount";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);
            if($_GET['reservecode']){
                $sql = "select * from lotteworld_reserve where reservecode = '".$_GET['reservecode']."'";
            }else{
                $sql = "select * from lotteworld_reserve where reserve_userid = '".$_SESSION['userid']."' order by idx desc limit 1";
            }
            $query = $conn->query($sql);
            $reserve = mysqli_fetch_array($query);

            ?>
        <div class="container col-9 my-3">
            <div class="border-bottom text-start">
                <img onclick="location.href='lotteworld_main.php'" src="lotteworld/logo4.jpg" alt="" width=100 height=85>
            </div>
            <div class="mx-3 my-3 signUpText"><br>
                <h3>온라인 예매</h3>
                <h5 class="mx-2 my-2" style="color:grey">예약이 확정 되었습니다.</h5>
            </div>
            <form action="lotteworld_reserve_ok.php" method="POST">
            <div class="card p-3 border-1 border-dark rounded-2 col-10">
            <table class="table fs-5">
                    <tbody>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">방문일자</td>
                            <td colspan=3><input type="date" id="datepicker" name="date" style="width:40%" class="form-control rounded-0" value="<?=$reserve['date']?>" readonly></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end border-start" style="width:20%">어른</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="adult" value="<?=$reserve['adult']?>" readonly class="form-control border-0 fs-5"></td>
                            <td class="align-middle text-center border-end" style="width:20%">청소년</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="student" value="<?=$reserve['student']?>" readonly class="form-control border-0 fs-5"></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end border-start" style="width:20%">어린이</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="child" value="<?=$reserve['child']?>" readonly class="form-control border-0 fs-5"></td>
                            <td class="align-middle text-center border-end" style="width:20%">베이비</td>
                            <td class="border-end"><input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=10 min=0 placeholder="0" name="baby" value="<?=$reserve['baby']?>" readonly class="form-control border-0 fs-5"></td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">티켓 분류</td>
                            <td colspan=3>
                                <input type="text" name="ticket" value="<?=$reserve['ticket']?>" readonly class="form-control border-0 fs-5">
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">할인 선택</td>
                            <td colspan=3>
                                <?
                                $sale = explode("/",$_POST['sale']);
                                $sql = "select * from lotteworld_sale where salecode = '".$reserve['salecode']."'";
                                $query = $conn->query($sql);
                                $row2 = mysqli_fetch_array($query);
                                ?>
                                <input type="text" name="sale" value="<?=$reserve['sale_item']?>(<?=$row2['percent']*100?>%)" readonly class="form-control border-0 fs-5">
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle text-center border-end" style="width:10%;">총 할인 금액</td>
                            <td>
                                <input type="text" name="saleprice" value="<?=number_format($reserve['sale_price'])?>원" readonly class="fs-5 fw-bold form-control border-0">
                            </td>
                            <td class="border-start border-end align-middle text-center">총 합계 금액</td>
                            <td> <input type="text" name="finalprice" value="<?=number_format($reserve['total_price'])?>원" readonly class="fs-5 fw-bold form-control border-0"></td>
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
                        <input type="hidden" name="idx" value="<?=$reserve['idx']?>">
                        <input type="submit" formaction="lotteworld_reserve_del.php" onclick="delChk()" class="btn col-4 rounded-pill btn-outline-primary" value="예매 취소">
                   
                    <a href="lotteworld_reserve.php?reservecode=<?=$reserve['reservecode']?>" class="btn btn-outline-primary col-4 justify-content-end rounded-pill">예매내역 수정</a>
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

<script>
     function delChk(){
                if(!confirm("정말로 삭제하시겠습니까?")){
                    event.preventDefault();
                    return false;
                }
            }
</script>