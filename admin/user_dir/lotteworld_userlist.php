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
            $sql = "select * from lotte_userinfo order by idx desc";
            $query = $conn->query($sql);
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-1 pb-2 col-10">회원 리스트</h5>
                <div class="col-9">
                    <table class="table table-hover ">
                        <thead class="border-bottom-2 border-secondary">
                            <tr>
                                <td class="text-center" style="width:5%"></td>
                                <td class="text-center" style="width:15%">회원명</td>
                                <td class="text-center" style="width:20%">회원 아이디</td>
                                <td class="text-center" style="width:10%">성별</td>
                                <td class="text-center" style="width:25%">E-mail</td>
                                <td class="text-center" style="width:20%">전화번호</td>
                            </tr>
                        </thead>
                        <tbody>
                            <? for($i=0;$row=mysqli_fetch_array($query);$i++){
                                ?>
                            <tr onclick=" window.open('lotteworld_userinfo.php?usercode=<?=$row['usercode']?>', 'popup-test', 'width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top );">
                                <td class="text-center"><?=$i+1?></td>
                                <td class="text-center"><?=$row['username']?></td>
                                <td><?=$row['userid']?></td>
                                <td class="text-start"><?=$row['male']?></td>
                                <td class="text-start"><?=$row['Email']?></td>
                                <td class="text-center"><?=$row['phoneNumber']?></td>
                            </tr>
                            <?}?>
                        </tbody>
                    </table>
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