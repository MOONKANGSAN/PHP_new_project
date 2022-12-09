<?
    include "../../lotteworld_db.php";
    session_start();

    $fille = $_FILES['imgFile'];

    $path = "./notice_photo/";
    if(!file_exists($path)) {
        mkdir($path,0777,true);
    }
    // var_dump($_FILES);

    $tmpname = $fille['tmp_name'];
    $realname = $fille['name'];
   
    if(is_uploaded_file($tmpname)){
        move_uploaded_file($tmpname,"./notice_photo/".$realname);
    }

    if($_POST['idx']){
        $sql = "update lotteworld_notice set
                        notice_title = '".$_POST['title']."',
                        notice_info  = '".$_POST['info']."',
                        photo        = '".$realname."',
                        savezone     = '".$path."',
                        user         = '".$_SESSION['userid']."',
                        regdate      = '".$regdate."',
                        main         = '".$_POST['main']."'
                        where notice_idx = '".$_POST['idx']."'
                       ";
        $query = $conn->query($sql);
        ?>
        <script>
            alert('수정 되었습니다.');
            location.href = 'lotteworld_notice.php';
        </script>
    <?}else{
        $sql = "insert into lotteworld_notice set
                        notice_title = '".$_POST['title']."',
                        notice_info  = '".$_POST['info']."',
                        photo        = '".$realname."',
                        savezone     = '".$path."',
                        user         = '".$_SESSION['userid']."',
                        regdate      = '".$regdate."',
                        main         = '".$_POST['main']."'
                       ";
        $query = $conn->query($sql);
        ?>
        <script>
            alert('새로운 공지사항이 등록되었습니다.');
            location.href = 'lotteworld_notice.php';
        </script>
    <?}
?>

