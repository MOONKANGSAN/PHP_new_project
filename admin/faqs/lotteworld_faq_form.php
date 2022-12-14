<?
    include "../../lotteworld_db.php";
    session_start();


    if($_POST['idx']==true){
        $sql = "update lotteworld_faq set
                title = '".$_POST['title']."',
                info =  '".$_POST['info']."',
                main = '".$_POST['main']."',
                writer = '".$_SESSION['userid']."'
                where idx = '".$_POST['idx']."'
                ";
        $query = $conn->query($sql);?>
        <script>
            alert('수정 했습니다.');
            location.href="lotteworld_faq_admin.php";
        </script>
    <?}else{
        $sql = "insert into lotteworld_faq set
                title = '".$_POST['title']."',
                info =  '".$_POST['info']."',
                regdate = '".$regdate."',
                main = '".$_POST['main']."',
                writer = '".$_SESSION['userid']."'
            ";
        $query = $conn->query($sql); ?>
        <script>
            alert('등록 했습니다.');
            location.href="lotteworld_faq_admin.php";
        </script>
    <?}
?>