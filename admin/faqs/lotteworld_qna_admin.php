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
            $sql = "select * from lotteworld_qna order by idx desc";
            $query = $conn->query($sql);
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-1 pb-2 col-10">QnA 리스트</h5>
                <div class="col-9">
                <table class="table table-hover border-start border-end text-center">
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
                            <? for($i=0;$row=mysqli_fetch_array($query);$i++){?>
                                <tr onclick="location.href='lotteworld_qna_conf.php?idx=<?=$row['idx']?>'">
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
                            <?}?>
                    </tbody>
                </table>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>