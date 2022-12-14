<?

include "../../lotteworld_db.php";
session_start();

$sql = "update lotteworld_qna set
                conf = '".$_POST['confBtn']."',
                answer = '".$_POST['answer']."',
                answer_user = '".$_SESSION['userid']."'
                where idx = '".$_POST['idx']."'
                ";
$query = $conn->query($sql);
?>

<script>
    alert('답변이 등록 되었습니다.');
    location.href = "lotteworld_qna_admin.php";
</script>