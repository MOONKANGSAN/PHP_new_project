<?
    include "../../lotteworld_db.php";
    session_start();  

    $sql = "select * from lotteworld_amount ";
    $query = $conn->query($sql);
    $row = mysqli_fetch_array($query);

    if(!$row['idx']){
        $sql = "insert into lotteworld_amount set
                conf = 1,
                dayadult = '".$_POST['dayadult']."',
                daystudent = '".$_POST['daystudent']."',
                daychild = '".$_POST['daychild']."',
                daybaby = '".$_POST['daybaby']."',
                afteradult = '".$_POST['afteradult']."',
                afterstudent = '".$_POST['afterstudent']."',
                afterchild = '".$_POST['afterchild']."',
                afterbaby = '".$_POST['afterbaby']."',
                parkadult = '".$_POST['parkadult']."',
                parkstudent = '".$_POST['parkstudent']."',
                parkchild = '".$_POST['parkchild']."',
                parkbaby = '".$_POST['parkbaby']."',
                info = 'INFO',
                regdate = '".$regdate."'
                ";
    }else{
        $sql = "update lotteworld_amount set
                    dayadult = '".$_POST['dayadult']."',
                    daystudent = '".$_POST['daystudent']."',
                    daychild = '".$_POST['daychild']."',
                    daybaby = '".$_POST['daybaby']."',
                    afteradult = '".$_POST['afteradult']."',
                    afterstudent = '".$_POST['afterstudent']."',
                    afterchild = '".$_POST['afterchild']."',
                    afterbaby = '".$_POST['afterbaby']."',
                    parkadult = '".$_POST['parkadult']."',
                    parkstudent = '".$_POST['parkstudent']."',
                    parkchild = '".$_POST['parkchild']."',
                    parkbaby = '".$_POST['parkbaby']."',
                    regdate = '".$regdate."'
                    where conf = 1";  
    }
    $query = $conn->query($sql);
?>

<script>
    alert('가격정보가 수정 됐습니다.');
    location.href = 'lotteworld_amount.php';
</script>