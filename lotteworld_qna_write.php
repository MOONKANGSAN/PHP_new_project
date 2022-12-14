<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>LOTTEWORLD | QNA</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
    
        #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        }
        .signUpText,.title,.table,header,.btn{
            font-family: 'Jeju Gothic', sans-serif;
        }
        </style>
    </head>
    <body>
            <?php 
            include "lotteworld_db.php";
            session_start();
            include "lotteworld_topmenu.php";
            ?>
        <div class="container col-9 my-3">
            <div class="mx-3 my-1 signUpText"><br>
                <h3>QnA 작성</h3>
                <h5 class="mx-2" style="color : grey">신속하게 답변해드립니다.</h5>
            </div><br>
            <form action="lotteworld_qna_form.php" method="POST" enctype="multipart/form-data">
                <? if($_GET['idx']==true){
                    $sql = "select * from lotteworld_qna where idx = '".$_GET['idx']."'";
                    $query = $conn->query($sql);
                    $row = mysqli_fetch_array($query);?>
                <?}?>
                <div class="mx-3 my-1 col-12 text-center">
                    <table class="table table-bordered align-middle fs-5">
                        <tr>
                            <td class="table-active" style="width:15%">제목</td>
                            <td style="width:45%">
                                <input type="text" name="title" value="<?=$row['title']?>" class="form-control" style="border:none;" required>
                            </td>
                            <td class="table-active" style="width:15%">질문유형</td>
                            <td style="width:25%">
                                <select name="qnaOther" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected value="none">유형을 선택해주세요</option>
                                    <option value="reserve">예매 시스템 관련</option>
                                    <option value="sale">할인혜택 관련</option>
                                    <option value="peraid">퍼레이드/이벤트 관련</option>
                                    <option value="others">기타</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-active">질문 내용</td>
                            <td colspan=3 style="height:300px;">
                                <textarea class="mt-1" name="info" style="width:100%;height:100%;border:none;" required><?=$row['info']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-active">첨부파일</td>
                            <td>
                                <div class="input-group col-8">
                                    <input type="file" class="form-control" name="imgFile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                            </td>
                            <td class="table-active">비공개</td>
                            <td>
                                <? if($row['open']=="close"){?>
                                    <input type="checkbox" name="close" value="close" class="form-check-input border-secondary" checked>
                                <?}else{?>
                                    <input type="checkbox" name="close" value="close" class="form-check-input border-secondary">
                                    <?}?>
                            </td>   
                        </tr>
                    </table>
                    <div class="position-relative">
                        <input type="hidden" name="no" value="<?=$row['idx']?>">
                        <input type="submit" onclick="chkBtn()" value="QnA 등록" class="position-absolute top-0 end-0 col-2 btn btn-outline-primary">
                    </div>
                </div>
            </form>
        </div><br><br><br>
        <?
            include "lotteworld_footer.php"
        ?>
       <!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
<script>
   function chkBtn(){
     if(!confirm('QnA 등록을 하시겠습니까?')){
        event.preventDefault();
        return false;
     }
   }
</script>