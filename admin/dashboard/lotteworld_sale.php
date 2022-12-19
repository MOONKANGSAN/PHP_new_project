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
            $sql = "select * from lotteworld_sale order by idx desc";
            $query = $conn->query($sql);
            
            ?>
            <form class="col-12" action="lotteworld_sale_del.php" method="POST">
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-4 pb-2 col-10">할인혜택 정보</h5>
                <div class=" col-9">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>타이틀</td>
                                <td>기간</td>
                                <td>작성일</td>
                                <td>담당자</td>
                                <td>할인율</td>
                                <td><input class="form-check-input" type="checkbox" value="" onclick="selectAll(this)" id="flexCheckDefault"></td>
                            </tr>
                        </thead>
                        <tbody>
                                <? for($i=0;$row=mysqli_fetch_array($query);$i++){?>
                                    <tr>
                                        <td><?=$i+1?></td>
                                        <td onclick="location.href='lotteworld_sale_write.php?idx=<?=$row['idx']?>'"><?=$row['title']?></td>
                                        <td onclick="location.href='lotteworld_sale_write.php?idx=<?=$row['idx']?>'"><?=$row['startdate']?>~<?=$row['enddate']?></td>
                                        <td onclick="location.href='lotteworld_sale_write.php?idx=<?=$row['idx']?>'"><?=substr($row['regdate'],0,10)?></td>
                                        <td onclick="location.href='lotteworld_sale_write.php?idx=<?=$row['idx']?>'"><?=$row['user']?></td>
                                        <td><?=$row['percent']*100?>%</td>
                                        <td><input class="form-check-input" type="checkbox" name="chk[]" value="<?=$row['idx']?>" id="flexCheckDefault"></td>
                                    </tr>
                                <?}?>
                        </tbody>
                    </table>
                </div>
                <div class="col-9 row">
                    <div class="col-6 text-start">
                        <a class="btn btn-outline-primary rounded-pill fs-6 w-50" onclick="location.href='lotteworld_sale_write.php'">할인혜택 추가</a>    
                    </div>
                    <div class="col-6 text-end">
                        <input type="submit" class="btn btn-outline-primary rounded-pill fs-6 w-50" onclick="delChk()" value="선택항목 삭제">    
                    </div>
                </div>
            </div>
            </form>
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
    
    function selectAll(selectAll)  {
             const checkboxes 
            = document.querySelectorAll('input[type="checkbox"]');
  
                checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAll.checked
            })
        }
</script>