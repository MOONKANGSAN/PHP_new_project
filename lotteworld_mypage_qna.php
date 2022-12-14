<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://w7.pngwing.com/pngs/501/392/png-transparent-lotte-world-tower-everland-amusement-park-park-text-photography-logo.png" rel="shortcut icon" type="image/x-icon">
        <title>LOTTE WORLD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"><!--부트스트랩-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Jua&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic&family=Noto+Sans+KR&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap');
        @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
        header,.carousel,.container{
            font-family: 'Jeju Gothic', sans-serif;
        }
        #footerText{
            font-family: 'Noto Sans KR', sans-serif;
            color : #b8b6b6;
        }
        #card_group,#nav2,#notice{
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: bold;
        }
        .card_sale:hover{
            border:blue solid 3px;
            transform:scale(1.00);
            transition: all 0.3s;
            color:#5a07e0;
            box-shadow: 1px 1px 20px #ddd;
        }
        </style>
    </head>
    <body>
        <?php 
        include "lotteworld_db.php";
        session_start();
        include "lotteworld_topmenu.php";
        
            $sql = "select * from lotteworld_qna where userid = '".$_SESSION['userid']."' order by idx desc";
            $query = $conn->query($sql);
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->   
        <div class="container col-8 justify-content-center align-items-center">
            <h3 class="text-center fw-bold mb-2">내가 작성한 QNA</h3><br>
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="fw-bold fs-5 border border-top-1 border-start-0 border-end-0 ">
                            <td style="width:15%">작성자</td>
                            <td style="width:40%">제목</td>
                            <td style="width:20%">작성일</td>
                            <td style="width:15%">답변여부</td>
                            <td style="width:10%">공개여부</td>
                        </tr>
                    </thead>
                    <tbody>
                            <? for($i=0;$row=mysqli_fetch_array($query);$i++){
                                if($row['open']=='open'||$row['userid']==$_SESSION['userid']){?>
                                <tr onclick="location.href='lotteworld_qna_view.php?idx=<?=$row['idx']?>'">
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['title']?></td>
                                    <td><?=substr($row['regdate'],0,10)?></td>
                                    <td>
                                        <? if($row['conf']==0){?>
                                            확인 중
                                        <?}else{?>
                                            답변 완료
                                        <?}?>
                                    </td>
                                    <td>
                                    <? if($row['open']=='open'){?>
                                            공개
                                        <?}else{?>
                                            비공개
                                        <?}?>
                                    </td>
                                </tr>
                            <?}else{?>
                                <tr>
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['title']?></td>
                                    <td><?=substr($row['regdate'],0,10)?></td>
                                    <td>
                                        <? if($row['conf']==0){?>
                                            확인 중
                                        <?}else{?>
                                            답변 완료
                                        <?}?>
                                    </td>
                                    <td>
                                    <? if($row['open']=='open'){?>
                                            공개
                                        <?}else{?>
                                            비공개
                                        <?}?>
                                    </td>
                                </tr>
                                <?}  
                            }?>
                    </tbody>
                </table>
            <div class="container col-12 justify-content-center text-center">
            <br><br>
        </div>
        </div>
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>