<?
    include "lotteworld_db.php";
    session_start();

    $fille = $_FILES['profile'];

    $path = "./profile_photo/";
    if(!file_exists($path)) {
        mkdir($path,0777,true);
    }
    // var_dump($_FILES);

    $tmpname = $fille['tmp_name'];
    $realname = $fille['name'];
   
    if(is_uploaded_file($tmpname)){
        move_uploaded_file($tmpname,"./profile_photo/".$realname);
   }
   $savename = $path.$realname;

    $securityNum = $_POST['secNum1']."-".$_POST['secNum2'];
    $phoneNum = implode("",$_POST['phone']);
    $email = $_POST['email1']."@".$_POST['email2'];

    // echo $hash; 
    // echo "<br>";
    // echo $phoneNum;

    $sql = "update lotte_userinfo set
                  profile = '".$realname."',
                  savezone = '".$path."',
                  phoneNumber = '".$phoneNum."',
                  male = '".$_POST['sex']."',
                  postNo = '".$_POST['postno']."',
                  address1 = '".$_POST['address1']."',
                  address2 = '".$_POST['address2']."',
                  Email   = '".$email."'
                  where usercode = '".$_POST['usercode']."'
                  ";
    $query = $conn->query($sql);

?>

<script>
    alert('수정이 완료됐습니다.');
    opener.location.reload();
    window.close();
</script>