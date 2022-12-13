<?
    include "../../lotteworld_db.php";

    $sql = "update lotte_userinfo set admin = '".$_POST['adPlus']."' where usercode = '".$_POST['userC']."'";
    $query = $conn->query($sql);
    
?>

<script>
    location.href="lotteworld_adminplus.php";
</script>