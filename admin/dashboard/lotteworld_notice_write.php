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
            $sql = "select * from lotteworld_notice where notice_idx = '".$_GET['idx']."'";
            $query = $conn->query($sql);
            $notice = mysqli_fetch_array($query);
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-4 pb-2 col-10">공지사항</h5>
                <div class=" col-9">
                    <form action="lotteworld_notice_form.php" method="POST" class="needs-validation" enctype="multipart/form-data" >
                    <table class="table">
                        <tr>
                            <td class="border-end text-center align-middle" style="width:15%;background-color:#F8F8F8">타이틀</td>
                            <td>
                                <input type="text" class="form-control rounded-0" name="title" value="<?=$notice['notice_title']?>" id="validationCustom03" placeholder="공지사항 타이틀을 입력해주세요." required>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">사진</td>
                            <td>
                            <div class="input-group">
                                <input type="file" name="imgFile" class="form-control" id="inputGroupFile02" accept=".gif,.jpg,.png" required >
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">중요사안 여부</td>
                            <td>
                            <?if($notice['main']=='mainEv'){?>    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="main" value="mainEv" checked>                              
                                <label class="form-check-label" for="inlineCheckbox1">메인이벤트 처리</label>
                            </div>
                            <?}else{?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="main" value="mainEv">                              
                                <label class="form-check-label" for="inlineCheckbox1">메인이벤트 처리</label>
                            </div>
                            <?}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-end text-center align-middle" style="background-color:#F8F8F8">정보</td>
                            <td>
                                <input type="text" class="form-control rounded-0 r-primary" value="<?=$notice['notice_info']?>" placeholder="공지사항 정보를 입력해주세요." name="info" required>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="col-12 text-end">
                        <? if($_GET['idx']){?>
                            <input type="hidden" name="idx" value="<?=$notice['notice_idx']?>">
                            <input type="submit" class="btn btn-outline-primary rounded-pill fs-6 w-25" onclick="upChk()" value="수정">
                        <?}else{?>
                            <input type="submit" class="btn btn-outline-primary rounded-pill fs-6 w-25" onclick="upChk()" value="새로운 공지사항 등록">
                        <?}?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function upChk(){
        if(!confirm('아래와 같이 등록하십니까?')){
            event.preventDefault();
            return false;
        }
    } 
    // 퍼센트 텍스트칸 입력시 금액 입력 텍스트 비활성화 기능 추가 예정
</script>