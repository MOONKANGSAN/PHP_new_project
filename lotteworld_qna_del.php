<?php

include "lotteworld_db.php";

$idx = $_POST['delno'];

$sql = "delete from lotteworld_qna where idx  = '".$idx."'";
$query = $conn->query($sql);

?>

<script>
    alert('삭제 되었습니다.');
    location.href="lotteworld_mypage.php";
</script>