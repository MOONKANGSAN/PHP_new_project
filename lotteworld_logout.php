<?php
session_start();
session_destroy();
?>
<script>
    alert('로그아웃합니다.');
    location.href = "lotteworld_main.php";
</script>