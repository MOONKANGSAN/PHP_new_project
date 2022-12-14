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
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-1 pb-2 col-10">QnA 리스트</h5>
                <div class="col-9">
                <form action="lotteworld_qna_ad_form.php" method="POST">
                <? if($_GET['idx']==true){
                    $sql = "select * from lotteworld_qna where idx = '".$_GET['idx']."'";
                    $query = $conn->query($sql);
                    $row = mysqli_fetch_array($query);?>
                <?}?>
                <div class="mx-3 my-1 col-12 text-center">
                <table class="table table-bordered align-middle fs-5">
                <tr>
                    <td class="table-active text-center" style="width:15%">제목</td>
                    <td style="width:45%">
                        <?=$row['title']?>
                    </td>
                    <td class="table-active text-center" style="width:15%">질문유형</td>
                    <td style="width:25%">
                        <?=$row['qnaOther']?>    
                    </td>
                </tr>
                <tr>
                    <td class="table-active text-center">질문 내용</td>
                    <td class="align-top text-start fs-6" colspan=3 style="height:300px;">
                    <?=$row['info']?>
                    </td>
                </tr>
                <tr>
                    <td class="table-active text-center">답변여부</td>
                    <td class="text-start">
                        <?if($row['conf']==0){?>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="confBtn" value="0" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">확인 중</label>
                                <input type="radio" class="btn-check" name="confBtn" value="1" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">답변완료</label>
                            </div>
                            <?}else{?>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="confBtn" value="0" id="btnradio1" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btnradio1">확인 중</label>
                                    <input type="radio" class="btn-check" name="confBtn" value="1" id="btnradio2" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="btnradio2">답변완료</label>
                                </div>
                            <?}?>
                    </td>
                    <td class="table-active text-center">공개여부</td>
                    <td>
                        <? if($row['open']=='open'){?>
                            공개
                        <?}else{?>
                            비공개
                        <?}?>
                    </td>   
                </tr>
                <tr>
                    <td class="table-active text-center">답변 내용</td>
                    <td class="align-top text-start fs-6" colspan=3 style="height:300px;">
                    <textarea name="answer" class="align-top" style="width:100%;height:100%;border:none;"><?=$row['answer']?></textarea>
                    </td>
                </tr>
            </table>
                    <div class="position-relative">
                        <input type="hidden" name="answer_user" value="<?=$_SESSION['userid']?>">
                        <input type="hidden" name="idx" value="<?=$row['idx']?>">
                        <input type="submit" onclick="chkBtn()" value="답변 등록" class="position-absolute top-0 end-0 col-2 btn btn-outline-primary">
                    </div>
                </div>
            </form>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

<script>
    function delChk(){
        if(!confirm('삭제시 복구할 수 없습니다. 정말로 삭제하십니까?')){
            event.preventDefault();
            return false;
        }
    } 
        var _width = '650';
        var _height = '700';
        // 팝업을 가운데 위치시키기 위해 아래와 같이 값 구하기
        var _left = Math.ceil(( window.screen.width - _width )/2);
        var _top = Math.ceil(( window.screen.height - _height )/3); 
    
</script>