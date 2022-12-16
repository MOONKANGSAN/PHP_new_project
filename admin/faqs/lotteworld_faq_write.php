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
                <h5 class="mb-1 pb-2 col-10">FAQ 리스트</h5>
                <div class="col-9">
                <form action="lotteworld_faq_form.php" method="POST">
                <? if($_GET['idx']==true){
                    $sql = "select * from lotteworld_faq where idx = '".$_GET['idx']."'";
                    $query = $conn->query($sql);
                    $row = mysqli_fetch_array($query);?>
                    <input type="hidden" name="idx" value="<?=$row['idx']?>">
                <?}?>
                <div class="mx-3 my-1 col-12 text-center">
                <table class="table table-bordered align-middle fs-5">
                <tr>
                    <td class="table-active text-center" style="width:15%">제목</td>
                    <td style="width:85%">
                        <input type="text" class="form-control" name="title" value="<?=$row['title']?>">
                    </td>
                </tr>
                <tr>
                    <td class="table-active text-center">메인 여부</td>
                    <td class="align-top text-start fs-6">
                        <input type="checkbox" class="text-start form-check-input align-middle" name="main" value="1">
                    </td>
                </tr>
                <tr>
                    <td class="table-active text-center" style="width:15%">내용</td>
                    <td style="width:85%;height:300px;">
                        <textarea name="info" class="fs-6" style="width:100%;height:100%;border:none;"> <?=$row['info']?></textarea>
                    </td>
                </tr>
            </table>
                    <div class="position-relative">
                        <input type="submit" onclick="chkBtn()" value="등록" class="position-absolute top-0 end-0 col-2 btn btn-outline-primary">
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
   function chkBtn(){
    if(!confirm('등록하십니까?')){
        event.preventDefault();
        return false;
    }
   }
    
</script>