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
                $sql = "select * from lotteworld_peraid where idx = '".$_GET['idx']."'";
                $query = $conn->query($sql);
                $per = mysqli_fetch_array($query);
            }
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-4 pb-2 col-10">공연정보 등록</h5>
                <div class=" col-9">
                    <form action="lotteworld_peraid_form.php" method="POST" class="needs-validation" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td class="border-end text-center align-middle" style="width:15%;background-color:#F8F8F8">타이틀</td>
                            <td colspan=3>
                                <input type="text" class="form-control rounded-0 r-primary" name="title" value="<?=$per['title']?>" placeholder="타이틀을 입력해주세요." required>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle border-bottom-2" style="width:15%;background-color:#F8F8F8">공연장소</td>
                            <td class="border-bottom-2" colspan=3>
                                <input type="text" class="form-control rounded-0 r-primary" name="place" value="<?=$per['place']?>" placeholder="공연장소 입력해주세요." required>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">정보</td>
                            <td colspan=3>
                                <input type="text" class="form-control rounded-0 r-primary" value="<?=$per['info']?>" placeholder="공연정보를 입력해주세요." name="info" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">타이틀 사진</td>
                            <td colspan=3>
                                <div class="input-group">
                                    <input type="file" accept=".gif,.jpg,.png" name="imgFile" class="form-control" id="inputGroupFile02" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle border-bottom-2" style="background-color:#F8F8F8">공연위치</td>
                            <td class="border-bottom-2" colspan=3>
                                <div class="input-group">
                                    <input type="file" accept=".gif,.jpg,.png" name="imgFile2" class="form-control" id="inputGroupFile02" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">메인이벤트 여부</td>
                            <td colspan=3>
                                <div class="form-check form-check-inline">
                                    <? if($per['mainEv']=="mainEv"){?>
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="main" value="mainEv" checked>
                                    <? }else{?>
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="main" value="mainEv">
                                    <?} ?>
                                    <label class="form-check-label" for="inlineCheckbox1">메인이벤트 처리</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">퍼레이드/공연</td>
                            <td colspan=3>
                                <? if($per['peraid']=="P"){?>
                                <div class="flex-wrap">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraid" value="P" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            퍼레이드
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraid" value="E" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            이벤트
                                        </label>
                                    </div>
                                </div>
                                <?}else{?>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="peraid" value="P" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        퍼레이드
                                    </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="peraid" value="E" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        이벤트
                                    </label>
                                    </div>
                                <?}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8;width:20%">공연기간(시작)</td>
                            <td style="width:30%"><input type="date" class="form-control" name="startdate" value="<?=$per['startdate']?>"></td>
                            <td class="border-end border-start text-center border-top align-middle" style="background-color:#F8F8F8;width:20%">공연기간(종료)</td>
                            <td style="width:30%" class="border-top"><input type="date" class="form-control" name="enddate" value="<?=$per['enddate']?>"></td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8;width:20%">시작시간</td>
                            <td style="width:30%"><input type="time" class="form-control" name="peraidtime" value="<?=$per['peraidtime']?>"></td>
                            <td class="border-end border-start text-center border-top align-middle" style="background-color:#F8F8F8;width:20%">소요시간(분)</td>
                            <td style="width:30%"><input type="number" max=120 min=5 oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="playtime" value="<?=$per['playtime']?>"></td>
                        </tr>
                    </table>
                    <br>
                    <div class="col-12 text-end">
                        <?if($per['idx']){?>
                                <input type="hidden" name="idx" value="<?=$per['idx']?>">
                                <input type="submit" class="btn btn-outline-primary rounded-pill fs-6 w-25" onclick="upChk()" value="수정"> 
                        <?}else{?>
                        <input type="submit" class="btn btn-outline-primary rounded-pill fs-6 w-25" onclick="upChk()" value="추가"> 
                    <?}?>   
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
        <? if($per['idx']){?>
        if(!confirm('수정하십니까?')){
            event.preventDefault();
            return false;
        }
    <?}else{?>
        if(!confirm('등록하십니까?')){
            event.preventDefault();
            return false;
        }
    <?}?>
    }
</script>