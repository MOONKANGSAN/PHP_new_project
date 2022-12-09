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
        include "lotteworld_visit.php";
        include "lotteworld_db.php";
        include "lotteworld_topmenu.php";
            $sql = "select * from lotteworld_notice where notice_idx = '".$_GET['idx']."'";
            $query = $conn->query($sql);
            $notice = mysqli_fetch_array($query);
        ?>
        <hr class="border shadow-sm" style="color:#F8F8F8">
           <!--상단 네비게이션 바-->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="container col-9 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="lotteworld_main.php">
                    <i class="bi bi-house-door fs-3"></i>
                    <!-- <span class="material-symbols-outlined fs-4">home</span> -->
                </a></li>
                <li class="breadcrumb-item active fs-4" aria-current="page"><a href="lotteworld_notice.php">공지사항</a></li>
            </ol>
        </nav>   
        <div class="container col-8 justify-content-center align-items-center">
            <h3 class="text-center fw-bold mb-2">공지사항</h3>
            <h5 class="text-center pb-3 text-secondary">NOTICE</h5>
            <h5 class="text-center mb-4 pb-3 text-dark fw-bold"><?=$notice['notice_title']?></h5> 
        </div>
        <div class="container col-9">
            <div class="row justify-content-center">
            <img class="" src="./admin/dashboard/notice_photo/<?=$notice['photo']?>" alt="">
            </div>
            <table class="table table-hover my-4 py-1">
                <?  
                    $no = $_GET['idx'];
                    $sql = "select * from lotteworld_notice where notice_idx < $no order by notice_idx desc limit 1";
                    $query = $conn->query($sql);
                    $izun = mysqli_fetch_array($query);
                    $sql = "select * from lotteworld_notice where notice_idx > $no order by notice_idx asc limit 1";
                    $query = $conn->query($sql);
                    $daum = mysqli_fetch_array($query);
                ?>
                    <? if(!$daum['notice_idx']){?>
                        <tr>
                            <td class="border-bottom-1 mb-2">다음글 ▲</td>
                            <td class="border-bottom-1 mb-2">다음글이 없습니다.</td>
                        </tr>
                    <?}else{?>
                        <tr onclick="location.href='lotteworld_notice_view.php?idx=<?=$daum['notice_idx']?>'">
                            <td class="border-bottom-1 mb-2">다음글 ▲</td>
                            <td class="border-bottom-1 mb-2"><?=$daum['notice_title']?></td>
                        </tr>
                    <?}?>
                    <? if(!$izun['notice_idx']){?>
                        <tr>
                            <td class="border-bottom-0 mt-2" >이전글 ▽</td>
                            <td class="border-bottom-0 mt-2" >이전글이 없습니다.</td>
                        </tr>
                    <?}else{?>
                        <tr onclick="location.href='lotteworld_notice_view.php?idx=<?=$izun['notice_idx']?>'">
                            <td class="border-bottom-0 mt-2" >이전글 ▽</td>
                            <td class="border-bottom-0 mt-2" ><?=$izun['notice_title']?></td>
                        </tr>
                    <?}?>
            </table>
        </div>    
        
       <? 
       include "lotteworld_footer.php";
       ?>
<!--기업정보-->        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>