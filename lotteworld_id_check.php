<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<head>
    <style>
         @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
        *{
            font-family: 'Jeju Gothic', sans-serif;
        }
        div{
            font-weight: bold;
        }
    </style>
</head>
<?php
	include "lotteworld_db.php";
	$uid = $_GET["userid"];
	$sql = "select * from lotte_userinfo where userid = '".$uid."'";
	$query = $conn->query($sql);

    $member = mysqli_fetch_array($query);

        if(strlen($uid)<10||strlen($uid)>20){?>
            <div class="text-center mx-3 mt-3" style='font-family:"malgun gothic"; color:red;'>아이디의 길이는 10글자 이상 20글자 미만의 <br> 규정에 맞춰 주십시오<div>
        <?}elseif($member==0){ ?>
            <div class="text-center mx-3 mt-3" style='font-family:"malgun gothic"';><?=$uid?>는 사용가능한 아이디입니다.</div>
        <? }else{?>
            <div class="text-center mx-3 mt-3" style='font-family:"malgun gothic"; color:red;'><?=$uid?>는 중복된 아이디입니다.<div>
        <?}?>
<div><button class="btn btn-primary m-3" value="닫기" onclick="window.close()">닫기</button></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>