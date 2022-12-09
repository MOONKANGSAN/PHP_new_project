<?
    include "../../lotteworld_db.php";
    session_start();

    $sql = "select * from lotteworld_amount";
    $query = $conn->query($sql);
    $amount = mysqli_fetch_array($query);

    $salecode = password_hash($datecode,PASSWORD_DEFAULT);

    $fille = $_FILES['imgFile'];
    $path = "./sale_photo/";
        if(!file_exists($path)) {
            mkdir($path,0777,true);
        }

    $tmpname = $fille['tmp_name'];
    $realname = $fille['name'];

    if(is_uploaded_file($tmpname)){
        move_uploaded_file($tmpname,"./sale_photo/".$realname);
   }

   $percent = $_POST['percent']*0.01;


   if($_POST['idx']){
       $sql = "update lotteworld_sale set
                    sale_item = '".$_POST['item']."',
                    main = '".$_POST['main']."',
                    title = '".$_POST['title']."',
                    photo = '".$realname."',
                    savezone = '".$path."',
                    info = '".$_POST['info']."',
                    startdate = '".$_POST['startdate']."',
                    enddate = '".$_POST['enddate']."',
                    percent = '".$percent."',
                    adult_sale = '".$_POST['adult_sale']."',
                    student_sale = '".$_POST['student_sale']."',
                    child_sale = '".$_POST['child_sale']."',
                    adult_sale4 = '".$_POST['adult_sale4']."',
                    student_sale4 = '".$_POST['student_sale4']."',
                    child_sale4 = '".$_POST['child_sale4']."',
                    adult_sale_p = '".$_POST['adult_sale_p']."',
                    student_sale_p = '".$_POST['student_sale_p']."',
                    child_sale_p = '".$_POST['child_sale_p']."',
                    user = '".$_SESSION['userid']."'
                    where idx = '".$_POST['idx']."'
       ";
       $query = $conn->query($sql);
       ?>
        <script>
            alert('수정 했습니다.');
            location.href="lotteworld_sale.php";
        </script>
   <?}else{
    $sql = "insert into lotteworld_sale set
                salecode = '".$salecode."',
                sale_item = '".$_POST['item']."',
                main = '".$_POST['main']."',
                title = '".$_POST['title']."',
                photo = '".$realname."',
                savezone = '".$path."',
                info = '".$_POST['info']."',
                startdate = '".$_POST['startdate']."',
                enddate = '".$_POST['enddate']."',
                percent = '".$percent."',
                adult_sale = '".$_POST['adult_sale']."',
                student_sale = '".$_POST['student_sale']."',
                child_sale = '".$_POST['child_sale']."',
                adult_sale4 = '".$_POST['adult_sale4']."',
                student_sale4 = '".$_POST['student_sale4']."',
                child_sale4 = '".$_POST['child_sale4']."',
                adult_sale_p = '".$_POST['adult_sale_p']."',
                student_sale_p = '".$_POST['student_sale_p']."',
                child_sale_p = '".$_POST['child_sale_p']."',
                user = '".$_SESSION['userid']."'
                ";
    $query = $conn->query($sql);
    ?>
        <script>
            alert('등록완료 했습니다.');
            location.href="lotteworld_sale.php";
        </script>
    <?}
?>

