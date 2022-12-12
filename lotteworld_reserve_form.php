<?
    include "lotteworld_db.php";
    session_start();
    
    $sql = "select * from lotte_userinfo where userid = '".$_SESSION['userid']."'";
    $query = $conn->query($sql);
    $user = mysqli_fetch_array($query);

    $reservecode = password_hash($datecode,PASSWORD_DEFAULT);

    $sql = "select * from lotteworld_amount where conf = 1";
    $query = $conn->query($sql);
    $amount = mysqli_fetch_array($query);

    $sql = "select * from lotteworld_sale where salecode = '".$_POST['salecode']."'";
    $query = $conn->query($sql);
    $sale = mysqli_fetch_array($query);

    $str = $_POST['saleprice'];
    $saleprice = preg_replace("/[^0-9]*/s", "", $str);

    $str = $_POST['finalprice'];
    $finalprice = preg_replace("/[^0-9]*/s", "", $str);

    if($_POST['ticket']=="day"){
        $adultprice = (int)$amount['dayadult'] * (int)$_POST['adult'];
        $childprice = (int)$amount['daychild'] *(int)$_POST['child'];
        $studentprice = (int)$amount['daystudent'] * (int)$_POST['student'];
        $babyprice = (int)$amount['daybaby'] * (int)$_POST['baby'];
    }elseif($_POST['ticket']=="after4"){
        $adultprice = (int)$amount['afteradult'] * (int)$_POST['adult'];
        $childprice = (int)$amount['afterchild'] * (int)$_POST['child'];
        $studentprice = (int)$amount['afterstudent'] * (int)$_POST['student'];
        $babyprice = (int)$amount['afterbaby'] *(int)$_POST['baby'];
    }elseif($_POST['ticket']=="park"){
        $adultprice = (int)$amount['parkadult'] * (int)$_POST['adult'];
        $childprice =(int)$amount['parkchild'] * (int)$_POST['child'];
        $studentprice = (int)$amount['parkstudent'] * (int)$_POST['student'];
        $babyprice = (int)$amount['parkbaby'] * (int)$_POST['baby'];
    }

    if($_POST['updatecode']){
        $sql = "update lotteworld_reserve set
                date = '".$_POST['date']."',
                adult = '".$_POST['adult']."',
                student = '".$_POST['student']."',
                child = '".$_POST['child']."',
                baby = '".$_POST['baby']."',
                ticket = '".$_POST['ticket']."',
                sale_item = '".$sale['title']."',
                salecode = '".$_POST['salecode']."',
                adult_price = '".$adultprice."',
                student_price = '".$studentprice."',
                child_price = '".$childprice."',
                baby_price = '".$babyprice."',
                sale_price = '".$saleprice."',
                total_price = '".$finalprice."',
                reserve_userid = '".$user['userid']."',
                reserve_username = '".$user['username']."' 
                where reservecode = '".$_POST['updatecode']."'
            ";
            $query = $conn->query($sql);  
            ?>
                <script>
                alert('예매내용이 수정 되었습니다.');
                location.href="lotteworld_reserve_confirm.php?reservecode=<?=$_POST['updatecode']?>";
                </script>
            <?
    }else{
        $sql = "insert into lotteworld_reserve set
                reservecode = '".$reservecode."',
                date = '".$_POST['date']."',
                adult = '".$_POST['adult']."',
                student = '".$_POST['student']."',
                child = '".$_POST['child']."',
                baby = '".$_POST['baby']."',
                ticket = '".$_POST['ticket']."',
                sale_item = '".$sale['title']."',
                salecode = '".$_POST['salecode']."',
                adult_price = '".$adultprice."',
                student_price = '".$studentprice."',
                child_price = '".$childprice."',
                baby_price = '".$babyprice."',
                sale_price = '".$saleprice."',
                total_price = '".$finalprice."',
                reserve_userid = '".$user['userid']."',
                reserve_username = '".$user['username']."',
                regdate = '".$regdate."',
                conf = 0
            ";
            $query = $conn->query($sql);  
            ?>
            <script>
                alert('예매가 완료되었습니다.');
                location.href="lotteworld_reserve_confirm.php?userid=<?=$user['userid']?>";
            </script>
    <?}?>
