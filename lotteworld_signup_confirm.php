<?
    include "lotteworld_db.php";

    $securityNum = $_POST['secNum1']."-".$_POST['secNum2'];
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phoneNum = implode("",$_POST['phone']);
    $email = $_POST['email1']."@".$_POST['email2'];

    // echo $hash; 
    // echo "<br>";
    // echo $phoneNum;

    $sql = "insert into lotte_userinfo set
                  userid = '".$_POST['userid']."', 
                  password = '".$hash."',
                  usercode = '".$datecode."',
                  username = '".$_POST['username']."',
                  profile = 'basic_1.jpg',
                  savezone = './profile_photo/',
                  securityNumber = '".$securityNum."',
                  phoneNumber = '".$phoneNum."',
                  male = '".$_POST['sex']."',
                  postNo = '".$_POST['postno']."',
                  address1 = '".$_POST['address1']."',
                  address2 = '".$_POST['address2']."',
                  Email   = '".$email."'
                  ";
    $query = $conn->query($sql);
?>
<script>
    alert('회원가입이 완료됐습니다.');
    opener.location.href="lotteworld_main.php";
    window.close();
</script>