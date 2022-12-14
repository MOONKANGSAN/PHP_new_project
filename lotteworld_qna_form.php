<?
    include "lotteworld_db.php";
    session_start();

    $sql = "select * from lotte_userinfo where userid = '".$_SESSION['userid']."'";
    $query = $conn->query($sql);
    $name = mysqli_fetch_array($query);
 
    $fille = $_FILES['imgFile'];

    $path = "./qna_photo/";
    if(!file_exists($path)) {
        mkdir($path,0777,true);
    }
    // var_dump($_FILES);
    
    if($_POST['close']=="close"){
        $open = "close";
    }else{
        $open = "open";
    }

    $tmpname = $fille['tmp_name'];
    $realname = $fille['name'];

    if(is_uploaded_file($tmpname)){
        move_uploaded_file($tmpname,"./qna_photo/".$realname);
    }

    $idx = $_POST['no'];

    if($_POST['no']==true){
        $sql = "update lotteworld_qna set
                        title = '".$_POST['title']."',
                        info  = '".$_POST['info']."',
                        qnaOther = '".$_POST['qnaOther']."',
                        qna_photo        = '".$realname."',
                        savezone     = '".$path."',
                        open = '".$open."'
                    where idx = $idx
                    ";
        $query = $conn->query($sql);
         ?>
        <script>
            alert('수정 되었습니다.');
            location.href = 'lotteworld_qna_list.php';
        </script>
    <?}else{
            $sql = "insert into lotteworld_qna set
                        title = '".$_POST['title']."',
                        info = '".$_POST['info']."',
                        qnaOther = '".$_POST['qnaOther']."',
                        qna_photo = '".$realname."',
                        savezone = '".$path."',
                        conf = '0',
                        open = '".$open."',
                        userid = '".$_SESSION['userid']."',
                        username = '".$name['username']."', 
                        regdate = '".$regdate."'
                       ";
            $query = $conn->query($sql);
            ?>
            <script>
                alert('QnA가 등록완료. 신속하게 답변해드리겠습니다.');
                location.href = 'lotteworld_mypage.php';
            </script>
   <? }
?>

