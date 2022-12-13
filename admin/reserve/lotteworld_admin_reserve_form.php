<?
    include "../../lotteworld_db.php";
    session_start();

    $sql = "update lotteworld_reserve set
                conf = 1
                where reservecode = '".$_POST['reservecode']."'";
    $query = $conn->query($sql);
    
    

?>

<script>
    alert('확인 처리 했습니다.');
    location.href="lotteworld_admin_reserve.php";
</script>