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
        
        if (isset($_GET["page"])){
            $page = $_GET["page"]; //1,2,3,4,5
             }else{
            $page = 1;
            }

            $sql2 = "select count(*) as cnt from lotteworld_faq where title like '%".$_GET['search']."%'";
            $query2 = $conn->query($sql2);
            $total_record = mysqli_fetch_array($query2);
        
            $list = 10; 
            $block_cnt = 10; //페이지별 시작 번호 
            $block_num = ceil($page / $block_cnt); 
            $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호  ex) 1,6,11 ...
            $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호 ex) 5,10,15 ...

            $total_page = ceil($total_record['cnt']/$list);

            if($block_end > $total_page){ 
                $block_end = $total_page; 
            }
            $total_block = ceil($total_page / $block_cnt);
            $page_start = ($page - 1) * $list;
            
            $sql2 = "select * from lotteworld_faq where title like '%".$_GET['search']."%' order by idx desc limit $page_start, $list";
            $query2 = $conn->query($sql2);
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
                <li class="breadcrumb-item active fs-4" aria-current="page">FAQs</li>
            </ol>
        </nav>   
        <div class="container col-8 justify-content-center align-items-center">
            <h3 class="text-center fw-bold mb-2">소통서비스</h3>
            <h5 class="text-center mb-4 pb-3 text-secondary">FAQs</h5>
            <table class="table table-hover border-start border-end text-center">
                            <thead>
                                <tr class="fw-bold fs-5 border border-top-1 border-start-0 border-end-0 ">
                                    <td></td>
                                    <td style="width:25%">작성자</td>
                                    <td style="width:40%">제목</td>
                                    <td style="width:20%">작성일</td>
                                </tr>
                            </thead>
                            <tbody>
                                    <? for($i=0;$row=mysqli_fetch_array($query2);$i++){
                                
                                        ?>
                                        <tr onclick="location.href='lotteworld_faq_view.php?idx=<?=$row['idx']?>'">
                                            <td><?=$i+1?></td>
                                            <td><?=$row['writer']?></td>
                                            <td><?=$row['title']?></td>
                                            <td><?=substr($row['regdate'],0,10)?></td>
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
                                <a class="page-link" href="lotteworld_faq.php?page=1&search=<?=$_GET['search']?>" tabindex="-1" aria-disabled="true">처음</a>
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
                                <a class="page-link" href="lotteworld_faq.php?page=<?=$pre?>&search=<?=$_GET['search']?>" tabindex="-1" aria-disabled="true">이전</a>
                                </li>   
                            <?}?>

                            <? for($i = $block_start; $i <= $block_end; $i++){
                                    if($page == $i){?>
                                            <li class="page-item disabled"><a class="page-link"><?=$i?></a></li>
                                        <?} else {?>
                                            <li class="page-item"><a class="page-link" href="lotteworld_faq.php?page=<?=$i?>&search=<?=$_GET['search']?>"><?=$i?></a></li>
                                        <?}
                                    }?>

                            <? if($page >= $total_page){?>
                                <li class="page-item disabled"><a class="page-link">다음</a></li>
                            <?}else{
                                $next = $page + 1;
                                ?>
                                <li class="page-item"><a class="page-link" href="lotteworld_faq.php?page=<?=$next?>&search=<?=$_GET['search']?>">다음</a></li>    
                            <?}?>
                            
                            <? if($page >= $total_page){?>
                                <li class="page-item disabled"><a class="page-link">마지막</a></li>
                            <?}else{?>
                                <li class="page-item"><a class="page-link" href="lotteworld_faq.php?page=<?=$total_page?>&search=<?=$_GET['search']?>">마지막</a></li>    
                            <?}?>
                        </ul>
                        </nav>
                        <div class="d-flex justify-content-center mt-2">
                            <form class="col-4" id="searchform" action="<?= $_SERVER['PHP_SELF']?>" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="제목 검색어" name="search" value="<?=$_GET['search']?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <input type="submit" formaction="<?= $_SERVER['PHP_SELF']?>" value="검색" class="btn btn-outline-secondary" type="button" id="button-addon2">
                                </div>
                            </form>
                        </div>
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