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
        <div class="d-flex justify-content-start">
            <?
            include "lotteworld_admin_side.php";
            if($_GET['idx']){
            $sql = "select * from lotteworld_sale where idx = '".$_GET['idx']."'";
            $query = $conn->query($sql);
            $sale = mysqli_fetch_array($query);
            $amount = $sale['percent']*100;
        }
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-4 pb-2 col-10">할인혜택 정보</h5>
                <div class=" col-9">
                    <form action="lotteworld_sale_form.php" method="POST" class="needs-validation" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td class="border-end text-center align-middle" style="width:15%;background-color:#F8F8F8">타이틀</td>
                            <td>
                                <input type="text" class="form-control rounded-0 r-primary" name="title" value="<?=$sale['title']?>" placeholder="할인혜택 타이틀을 입력해주세요." required>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">사진</td>
                            <td>
                                <div class="input-group">
                                    <input type="file" accept=".gif,.jpg,.png" name="imgFile" class="form-control" id="inputGroupFile02" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">메인이벤트 여부</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <? if($sale['main']=="mainEv"){?>
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="main" value="mainEv" checked>
                                    <? }else{?>
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="main" value="mainEv">
                                    <?} ?>
                                    <label class="form-check-label" for="inlineCheckbox1">메인이벤트 처리</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">상시/기간 선택</td>
                            <td>
                                <? if($sale['sale_item']=="always"){?>
                                <div class="flex-wrap">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="item" value="always" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            기간미정 상시
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="item" value="time" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            기간제
                                        </label>
                                    </div>
                                </div>
                                <?}else{?>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="item" value="always" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        기간미정 상시
                                    </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="item" value="time" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        기간제
                                    </label>
                                    </div>
                                <?}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">정보</td>
                            <td>
                                <input type="text" class="form-control rounded-0 r-primary" value="<?=$sale['info']?>" placeholder="할인혜택 정보를 입력해주세요." name="info" required>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table">
                        <tr>
                            <td class="border-end text-center align-middle" style="width:15%;background-color:#F8F8F8">할인율(%)</td>
                            <td colspan=3>
                                <div class="col-1 d-flex"><input type="number" value="<?=$amount?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" max=80 min=0 class="col-1 form-control rounded-0 r-primary" name="percent"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">시작일</td>
                            <td>
                                <input type="date" class="form-control" name="startdate" value="<?=$sale['startdate']?>">
                                
                            </td>
                            <td class="border-end border-start text-center align-middle" style="background-color:#F8F8F8">종료일</td>
                            <td><input type="date" class="form-control" name="enddate" value="<?=$sale['enddate']?>"></td>
                        </tr>
                        <tr>
                        <td class="border-end text-center align-middle" style="background-color:#F8F8F8"></td>
                        <td class="border-end text-center align-middle" style="background-color:#F8F8F8">어른(Adult)</td>
                        <td class="border-end text-center align-middle" style="background-color:#F8F8F8">청소년(student)</td>
                        <td class="border-end text-center align-middle" style="background-color:#F8F8F8">어린이(child)</td>
                        </tr>
                        <tr>
                            <td class="border-end border-bottom-0 text-center align-middle fw-bold" style="background-color:#F8F8F8">Day</td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="adult_sale" value="<?=$sale['adult_sale']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="student_sale" value="<?=$sale['student_sale']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="child_sale" value="<?=$sale['child_sale']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                        </tr>
                        <tr>
                            <td class="border-end border-bottom-0 text-center align-middle fw-bold" style="background-color:#F8F8F8">After4</td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="adult_sale4" value="<?=$sale['adult_sale4']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="student_sale4" value="<?=$sale['student_sale4']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="child_sale4" value="<?=$sale['child_sale4']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                        </tr>
                        <tr>
                            <td class="border-end border-bottom-0 text-center align-middle fw-bold" style="background-color:#F8F8F8">파크 입장권</td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="adult_sale_p" value="<?=$sale['adult_sale_p']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="student_sale_p" value="<?=$sale['student_sale_p']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                            <td><input type="text" class="form-control rounded-0 r-primary text-end" name="child_sale_p" value="<?=$sale['child_sale_p']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></td>
                        </tr>
                    </table>
                    <div class="col-12 text-end">
                        <?if($sale['idx']){?>
                                <input type="hidden" name="idx" value="<?=$sale['idx']?>"> 
                        <?}?>
                        <input type="submit" class="btn btn-outline-primary rounded-pill fs-6 w-25" onclick="upChk()" value="할인혜택 추가">    
                    </div>
                    </form>
                </div>
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

<script>

    function upChk(){
        if(!confirm('수정하십니까?')){
            event.preventDefault();
            return false;
        }
    } 
</script>