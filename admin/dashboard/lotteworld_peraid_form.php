<?
    include "../../lotteworld_db.php";
    session_start();

    $fille = $_FILES['imgFile'];
    $fille2 = $_FILES['imgFile2'];

    $path = "./peraid_photo/";
    if(!file_exists($path)) {
        mkdir($path,0777,true);
    }
    // var_dump($_FILES);

    $percode = password_hash($datecode,PASSWORD_DEFAULT);

    $tmpname = $fille['tmp_name'];
    $realname = $fille['name'];

    $tmpname2 = $fille2['tmp_name'];
    $realname2 = $fille2['name'];
   
    if(is_uploaded_file($tmpname)&&is_uploaded_file($tmpname2)){
        move_uploaded_file($tmpname,"./peraid_photo/".$realname);
        move_uploaded_file($tmpname2,"./peraid_photo/".$realname2);
    }
    if($_POST['idx']){
        $sql = "update lotteworld_peraid set
                        title = '".$_POST['title']."',
                        info  = '".$_POST['info']."',
                        place  = '".$_POST['place']."',
                        photo        = '".$realname."',
                        place_photo  = '".$realname2."',
                        savezone     = '".$path."',
                        peraid         = '".$_POST['peraid']."',
                        mainEv         = '".$_POST['main']."',
                        startdate      = '".$_POST['startdate']."',
                        enddate         = '".$_POST['enddate']."',
                        peraidtime         = '".$_POST['peraidtime']."',
                        playtime        = '".$_POST['playtime']."'
                    where idx = '".$_POST['idx']."'
                    ";
        $query = $conn->query($sql); ?>
        <script>
            alert('수정 되었습니다.');
            location.href = 'lotteworld_peraid.php';
        </script>
    <?}else{
            $sql = "insert into lotteworld_peraid set
                        title = '".$_POST['title']."',
                        info  = '".$_POST['info']."',
                        place  = '".$_POST['place']."',
                        photo        = '".$realname."',
                        place_photo  = '".$realname2."',
                        savezone     = '".$path."',
                        peraid         = '".$_POST['peraid']."',
                        mainEv         = '".$_POST['main']."',
                        startdate      = '".$_POST['startdate']."',
                        enddate         = '".$_POST['enddate']."',
                        peraidtime         = '".$_POST['peraidtime']."',
                        playtime        = '".$_POST['playtime']."',
                        regdate      = '".$_POST['main']."',
                        eventcode        = '".$percode."'
                       ";
            $query = $conn->query($sql);
            ?>
            <script>
                alert('새로운 행사가 등록되었습니다.');
                location.href = 'lotteworld_peraid.php';
            </script>
   <? }
   
?>

