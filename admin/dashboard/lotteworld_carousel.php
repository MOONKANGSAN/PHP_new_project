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
            
            ?>
            <div class="col-10 mt-3 ms-1">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <div class="mb-3 pb-2 col-6">
                    <form action="lotteworld_carousel_form.php" class="needs-validation" enctype="multipart/form-data" method="POST">
                    <div class="input-group has-validation">
                        <div class="input-group">
                        <input type="file" accept=".gif,.jpg,.png" class="form-control" name="imgFile" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        </div>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                    <div class="">
                        <div class="input-group">
                            <input type="text" class="form-control mt-2 rounded" name="info" placeholder="캐러셀 정보"id="validationCustomUsername" autocomplete=off aria-describedby="inputGroupPrepend" requried>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>    
                        </div>
                    </div>
                        <input type="submit" class="btn btn-outline-success mt-2" value="Carousel Insert">
                    </form>
                </div>
                <div class="row">
                    <? 
                    $sql = "select * from lotteworld_carousel order by idx desc";
                    $query = $conn->query($sql);
                    for($i=0;$row=mysqli_fetch_array($query);$i++){?>
                        <div class="card p-0 me-1 mb-1 rounded-0 col-3" style="width:18rem;">
                            <img src="<?=$row['savename']?>" class="card-img-top rounded-0 m-0 w-100" width="height:60px;" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <? if($row['info']){
                                        echo $row['info'];
                                        }else{?>
                                            &nbsp;
                                        <?}?>
                                </h6>
                                <form action="lotteworld_carousel_delete.php" method="POST">
                                    <input type="hidden" name="idx" value="<?=$row['idx']?>">
                                    <input type="submit" onclick="delChk()" class="btn btn-outline-primary" value="삭제">
                                </form>
                            </div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
           
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>

<script>

    function delChk(){
        if(!confirm('정말로 삭제하십니까?')){
            event.preventDefault();
            return false;
        }
    } 
</script>