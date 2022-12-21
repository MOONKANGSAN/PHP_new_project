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
        
            $sql = "select * from lotteworld_qna where idx = '".$_GET['idx']."'";
            $query = $conn->query($sql);
            $row = mysqli_fetch_array($query);

            if($row['open']=="close"){
                if($row['userid']!=$_SESSION['userid']){
                    echo "<script>
                        alert('접근 권한이 없습니다.');
                        history.back();
                    </script>";
                }
            }

            if($row['qnaOther']=="sale"){
                $sale = "할인혜택 관련";
            }elseif($row['qnaOther']=="peraid"){
                $sale = "퍼레이드/이벤트 관련";
            }elseif($row['qnaOther']=="reserve"){
                $sale = "예매시스템 관련";
            }elseif($row['qnaOther']=="others"){
                $sale = "기타";
            }
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container col-9 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="lotteworld_main.php">
                    <i class="bi bi-house-door fs-3"></i>
                    <!-- <span class="material-symbols-outlined fs-4">home</span> -->
                </a></li>
                <li class="breadcrumb-item fs-4" aria-current="page"><a href="lotteworld_service.php">소통서비스</a></li>
                <li class="breadcrumb-item fs-4" aria-current="page"><a href="lotteworld_qna_list.php">소통서비스</a></li>
            </ol>
        </nav>   
        <div class="container col-8 justify-content-center align-items-center">
            <h3 class="text-start fw-bold mb-2">소통서비스</h3>
            <h5 class="text-start pb-1 text-secondary">QnA</h5>
            <table class="table table-bordered align-middle fs-5">
                <tr>
                    <td class="table-active text-center" style="width:15%">제목</td>
                    <td style="width:45%">
                        <?=$row['title']?>
                    </td>
                    <td class="table-active text-center" style="width:15%">문의유형</td>
                    <td style="width:25%">
                        <?=$sale?>    
                    </td>
                </tr>
                <tr>
                    <td class="table-active text-center">문의 내용</td>
                    <td class="align-top fs-6" colspan=3 style="height:300px;">
                    <?=$row['info']?>
                    </td>
                </tr>
                <tr>
                    <td class="table-active text-center">첨부파일</td>
                    <td>
                        <div class="input-group col-8">
                            <input type="file" class="form-control" name="imgFile" id="inputGroupFile04" disabled aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
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
                <?if($row['answer']==true){?>
                <tr>
                    <td class="table-active text-center">답변</td>
                    <td class="align-top fs-6" colspan=3 style="height:300px;">
                    <?=$row['answer']?>
                    </td>
                </tr>
                    <?}?>
            </table>
            <? if($row['userid']==$_SESSION['userid']&&$row['conf']==0){?>
                <div class="position-relative row d-flex">
                    <input type="submit" onclick="chkBtn()" value="QnA 수정" class="position-absolute top-0 end-0 col-2 btn btn-outline-primary">
                    <form action="lotteworld_qna_del.php" class="col-12" method="POST">
                        <input type="hidden" value="<?=$row['idx']?>" name="delno">
                        <input type="submit" onclick="delChk()" value="QnA 삭제" class="col-2 btn btn-outline-primary">
                    </form>
                </div><br>
            <?}?>
            <table class="table table-hover my-4 py-1">
                <?  
                    $no = $_GET['idx'];
                    $sql = "select * from lotteworld_qna where open = 'open' and idx < $no order by idx desc limit 1";
                    $query = $conn->query($sql);
                    $izun = mysqli_fetch_array($query);
                    $sql = "select * from lotteworld_qna where open = 'open' and idx > $no order by idx asc limit 1";
                    $query = $conn->query($sql);
                    $daum = mysqli_fetch_array($query);
                ?>
                    <? if(!$daum['idx']){?>
                        <tr>
                            <td class="border-bottom-1 mb-2">다음글 ▲</td>
                            <td class="border-bottom-1 mb-2">다음글이 없습니다.</td>
                        </tr>
                    <?}else{?>
                        <tr onclick="location.href='lotteworld_qna_view.php?idx=<?=$daum['idx']?>'">
                            <td class="border-bottom-1 mb-2">다음글 ▲</td>
                            <td class="border-bottom-1 mb-2"><?=$daum['title']?></td>
                        </tr>
                    <?}?>
                    <? if(!$izun['idx']){?>
                        <tr>
                            <td class="border-bottom-0 mt-2" >이전글 ▽</td>
                            <td class="border-bottom-0 mt-2" >이전글이 없습니다.</td>
                        </tr>
                    <?}else{?>
                        <tr onclick="location.href='lotteworld_qna_view.php?idx=<?=$izun['idx']?>'">
                            <td class="border-bottom-0 mt-2" >이전글 ▽</td>
                            <td class="border-bottom-0 mt-2" ><?=$izun['title']?></td>
                        </tr>
                    <?}?>
            </table>
        </div><br>
        
        <br>
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script>
            function chkBtn(){
                location.href="lotteworld_qna_write.php?idx=<?=$row['idx']?>"
            }

            function delChk(){
                if(!confirm("정말로 삭제하시겠습니까?")){
                    event.preventDefault();
                    return false;
                }
            }
        </script>
    </body>
</html>