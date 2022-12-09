<?
    include "lotteworld_db.php";

    $usercode = $_POST['usercode'];
    $password = $_POST['password'];

    $hashpw = password_hash($password, PASSWORD_DEFAULT);
    $sql = "update lotte_userinfo set password = '".$hashpw."' where usercode = '".$usercode."' ";
    $query = $conn->query($sql);

?>

<script>
    alert('비밀번호를 재설정 했습니다.');
    location.href="lotteworld_login.php";
</script>

