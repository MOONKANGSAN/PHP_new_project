<?
$conn = mysqli_connect("localhost","root","autoset","lotteworld");


$regdate = date('Y-m-d H:i:s');
// echo $regdate;
$datecode = date('YmdHis')."A";
// echo $datecode;
$year = date('Y-m-d');
// echo $year;
?>

<?
  if($_SERVER['HTTP_REFERER'] == '') exit("<script>alert('잘못된 접근입니다.'); history.back();</script>");
?>