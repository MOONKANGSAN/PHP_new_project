<?
    include "lotteworld_db.php";

    $secNo = implode("-",$_POST['secNo']);

    $sql = "select * from lotte_userinfo where username = '".$_POST['username']."' and securityNumber = '".$secNo."' and userid = '".$_POST['userid']."'";
    $query = $conn->query($sql);
    $row = mysqli_fetch_array($query);

    if(!$row['userid']){?>
    <script>
        alert('일치하는 정보가 없습니다.');
        history.back();
    </script>
    <?}else{?>
        <script>
            alert('확인완료');
            location.href="lotteworld_search_re_pw.php?usercode=<?=$row['usercode']?>";
        </script>

    <?}?>

