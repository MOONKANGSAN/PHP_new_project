<?
    include "../../lotteworld_db.php";

    $sql = "delete from lotteworld_carousel where idx = '".$_POST['idx']."'";
    $query = $conn->query($sql);

?>

<script>
    alert('삭제되었습니다.');
    location.href="lotteworld_carousel.php";
</script>