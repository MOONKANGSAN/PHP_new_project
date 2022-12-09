<?
    include "../../lotteworld_db.php";
    session_start();

    $fille = $_FILES['imgFile'];

    $path = "./photo/";
    if(!file_exists($path)) {
        mkdir($path,0777,true);
    }
    // var_dump($_FILES);

    $tmpname = $fille['tmp_name'];
    $realname = $fille['name'];
    $realadd = "../../admin/dashboard/photo/".$realname;
   
    if(is_uploaded_file($tmpname)){
        move_uploaded_file($tmpname,"./photo/".$realname);
   }
   $savename = $path.$realname;

   $sql = "insert into lotteworld_carousel set
                       photo_address = '".$realname."',
                       savezone = '".$path."',
                       savename = '".$savename."',
                       regdate = '".$regdate."',
                       info    = '".$_POST['info']."',
                       user = '".$_SESSION['userid']."'
                       ";
    $query = $conn->query($sql);
?>

<script>
    alert('캐러셀 이미지가 등록됐습니다.');
    location.href = 'lotteworld_carousel.php';
</script>