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
            if (isset($_GET["page"])){
                $page = $_GET["page"]; //1,2,3,4,5
                 }else{
                $page = 1;
                }

                $sql2 = "select count(*) as cnt from lotte_userinfo where username like '%".$_GET['search']."%' ";
                $query2 = $conn->query($sql2);
                $total_record = mysqli_fetch_array($query2);
            
                $list = 12; 
                $block_cnt = 12; //페이지별 시작 번호 
                $block_num = ceil($page / $block_cnt); 
                $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
                $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...

                $total_page = ceil($total_record['cnt']/$list);

                if($block_end > $total_page){ 
                    $block_end = $total_page; 
                }
                $total_block = ceil($total_page / $block_cnt);
                $page_start = ($page - 1) * $list;
                
                $sql2 = "select * from lotte_userinfo where username like '%".$_GET['search']."%' order by idx desc limit $page_start, $list";
                $query2 = $conn->query($sql2);
            ?>
            <div class="col-10 mt-3">
                <h4 class="mb-3 pb-2 border-bottom border-2 col-10">관리자 페이지</h4>
                <h5 class="mb-1 pb-2 col-10">관리자 권한 부여</h5>
                <div class="col-9">
                    <table class="table table-hover ">
                        <thead class="border-bottom-2 border-secondary">
                            <tr>
                                <td class="text-center" style="width:10%"></td>
                                <td class="text-center" style="width:15%">회원명</td>
                                <td class="text-center" style="width:20%">회원 아이디</td>
                                <td class="text-center" style="width:10%">성별</td>
                                <td class="text-center" style="width:25%">E-mail</td>
                                <td class="text-center" style="width:20%">관리자 권한</td>
                            </tr>
                        </thead>
                        <tbody>
                            <? for($i=0;$row=mysqli_fetch_array($query2);$i++){
                                ?>
                            <tr onclick="location.href='lotteworld_admin_reserve_view.php?reservecode=<?=$row['reservecode']?>'">
                                <td class="text-center align-middle"><?=$i+1?></td>
                                <td class="text-center align-middle"><?=$row['username']?></td>
                                <td class=" align-middle"><?=$row['userid']?></td>
                                <td class="text-start align-middle"><?=$row['male']?></td>
                                <td class="text-start align-middle"><?=$row['Email']?></td>
                                <td class="text-center align-middle">
                                    <form action="lotteworld_adminplus_form.php" method="POST">
                                        <input type="hidden" value="<?=$row['usercode']?>" name="userC">
                                        <? if($row['admin']==1){?>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                            <input type="hidden" value="0" name="adPlus">
                                            <input type="submit" class="btn btn-primary" name="btnradio" id="btnradio1" autocomplete="off"  value="ADMIN">
                                            <input type="submit" class="btn btn-outline-primary" name="btnradio" id="btnradio1" autocomplete="off"  value="NORMAL">
                                        </div>
                                        <?}else{?>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                            <input type="hidden" value="1" name="adPlus">
                                            <input type="submit" class="btn btn-outline-primary" name="btnradio" id="btnradio1" autocomplete="off"  value="ADMIN">
                                            <input type="submit" class="btn btn-primary" name="btnradio" id="btnradio1" autocomplete="off"  value="NORMAL">
                                        </div>
                                        <?}?>
                                    </form>
                                </td>
                            </tr>
                            <?}?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <? if($page <= 1){?>
                                <li class="page-item disabled">
                                <a class="page-link" tabindex="-1" aria-disabled="true">처음</a>
                                </li>  
                            <?}else{?>
                                <li class="page-item">
                                <a class="page-link" href="lotteworld_adminplus.php?page=1&search=<?=$_GET['search']?>" tabindex="-1" aria-disabled="true">처음</a>
                                </li>   
                            <?}?>

                            <? if($page <= 1){?>
                                <li class="page-item disabled">
                                <a class="page-link" tabindex="-1" aria-disabled="true">이전</a>
                                </li>  
                            <?}else{
                                $pre = $page - 1;
                                ?>
                                <li class="page-item">
                                <a class="page-link" href="lotteworld_adminplus.php?page=<?=$pre?>&search=<?=$_GET['search']?>" tabindex="-1" aria-disabled="true">이전</a>
                                </li>   
                            <?}?>

                            <? for($i = $block_start; $i <= $block_end; $i++){
                                    if($page == $i){?>
                                            <li class="page-item disabled"><a class="page-link"><?=$i?></a></li>
                                        <?} else {?>
                                            <li class="page-item"><a class="page-link" href="lotteworld_adminplus.php?page=<?=$i?>&search=<?=$_GET['search']?>"><?=$i?></a></li>
                                        <?}
                                    }?>

                            <? if($page >= $total_page){?>
                                <li class="page-item disabled"><a class="page-link">다음</a></li>
                            <?}else{
                                $next = $page + 1;
                                ?>
                                <li class="page-item"><a class="page-link" href="lotteworld_adminplus.php?page=<?=$next?>&search=<?=$_GET['search']?>">다음</a></li>    
                            <?}?>
                            
                            <? if($page >= $total_page){?>
                                <li class="page-item disabled"><a class="page-link">마지막</a></li>
                            <?}else{?>
                                <li class="page-item"><a class="page-link" href="lotteworld_adminplus.php?page=<?=$total_page?>&search=<?=$_GET['search']?>">마지막</a></li>    
                            <?}?>
                        </ul>
                    </nav>
                    <div class="d-flex justify-content-center mt-2">
                        <form class="col-4" action="<?= $_SERVER['PHP_SELF']?>" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="검색어" name="search" value="<?=$_GET['search']?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input type="submit" value="검색" class="btn btn-outline-secondary" type="button" id="button-addon2">
                            </div>
                        </form>
                    </div>
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
</script>