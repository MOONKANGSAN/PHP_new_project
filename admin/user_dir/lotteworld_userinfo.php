<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>회원가입</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    @import url('//fonts.googleapis.com/earlyaccess/jejugothic.css');
    *{
        font-family: 'Jeju Gothic', sans-serif;
    }
     body {
      min-height: 100vh;
      background: -webkit-gradient(linear, left bottom, right top, from(#92b5db), to(#1d466c));
      background: -webkit-linear-gradient(bottom left, #92b5db 0%, #1d466c 100%);
      background: -moz-linear-gradient(bottom left, #92b5db 0%, #1d466c 100%);
      background: -o-linear-gradient(bottom left, #92b5db 0%, #1d466c 100%);
      background: linear-gradient(to top right, #92b5db 0%, #1d466c 100%);
    }
    .input-form {
      max-width: 780px;
      margin-top: 40px;
      padding: 32px;
      background: #fff;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
      -moz-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15);
      box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.15)
    }

    input[type=password] {
        font-family: arial ;
    }
  </style>
</head>
<?
    include "../../lotteworld_db.php";

    $sql = "select * from lotte_userinfo where usercode = '".$_GET['usercode']."'";
    $query = $conn->query($sql);
    $row = mysqli_fetch_array($query);

    $secNo = explode("-",$row['securityNumber']);
    $email = explode("@",$row['Email']);

    $phone1 = substr($row['phoneNumber'],0,3);
    $phone2 = substr($row['phoneNumber'],3,4);
    $phone3 = substr($row['phoneNumber'],7,4);
?>
<body>
  <div class="container">
    <div class="input-form-backgroud row">
      <div class="input-form col-md-12 mx-auto">
        <h4 class="mb-1"><?=$row['username']?>님의 회원정보</h4>
        <form action="lotteworld_mypage_infocn.php" id="formSign"  enctype="multipart/form-data"  method="POST">
            <div class="row">
                <div class="col-6 mb-1">
                    <label for="name">이름</label>
                    <input type="text" class="form-control rounded-2 border-secondary" value="<?=$row['username']?>" id="username" name="username" disabled>
                    <div class="invalid-feedback">
                        이름을 입력해주세요.
                    </div>
                </div>
                <div class="col-3 mb-3">
                    <label for="secNum">주민등록번호</label>
                    <input type="text" class="form-control rounded-2 border-secondary" value="<?=$secNo[0]?>"  id="secNum1" name="secNum1" maxlength=6 disabled oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <div class="invalid-feedback" >
                        주민번호 앞자리를 입력해주세요.
                    </div>
                </div>
                <div class="col-3 mb-3">
                <label for="secNum">&nbsp;</label>
                    <input type="password" class="form-control rounded-2 border-secondary" value="<?=$secNo[1]?>"  id="secNum" name="secNum2" maxlength=7 disabled oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <div class="invalid-feedback">
                        주민번호 뒷자리를 입력해주세요.
                    </div>
                </div>
            </div>
            <div>
                <label for="name">ID</label>
                <div class="input-group mb-3 round-secondary" style="width:60%">
                    <input type="text" class="form-control rounded-start border-secondary" id="userid" name="userid" aria-describedby="button-addon2" value="<?=$row['userid']?>"  disabled >
                    <button class="btn btn-outline-secondary rounded-end" type="button" id="button-addon2" onclick="checkid()">Button</button>
                    <div class="invalid-feedback">
                    ID를 입력해주세요.
                    </div>
                </div>       
            </div>
            <div class="mb-3">
                <label for="nickname">E-Mail</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control border-secondary" value="<?=$email[0]?>" name="email1" disabled>
                    <span class="input-group-text border border-dark">@</span>
                    <input type="text" class="form-control border-secondary rounded-end" value="<?=$email[1]?>" name="email2" disabled>
                </div>
            </div>
            <div>
                <label for="Address">주소</label>
                <div class="input-group mb-3 round-secondary" style="width:40%">
                    <input type="text" class="form-control rounded-start border-secondary" readonly placeholder="PostNo" name="postno" id="sample6_postcode" value="<?=$row['postNo']?>" disabled>
                    <input type="button" class="btn btn-outline-primary rounded-end" onclick="sample6_execDaumPostcode()" value="조회" disabled>
                    <div class="invalid-feedback">
                        우편번호를 입력해주세요.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" value="<?=$row['address1']?>"  class="form-control border-secondary rounded-2" id="sample6_address" name="address1" placeholder="도로명 주소" readonly disabled>
                    <div class="invalid-feedback">
                    도로명 주소를 입력해주세요.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" value="<?=$row['address2']?>"  class="form-control border-secondary rounded-2" name="address2" id="sample6_detailAddress" placeholder="상세주소(선택)" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mb-1">
                    <label for="secNum">연락처</label>
                    <input type="text" class="form-control rounded-0 border-secondary" value="<?=$phone1?>" id="secNum1" name="phone[]" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" disabled>
                </div>
                <div class="col-3 mb-3">
                    <label for="secNum">&nbsp;</label>
                    <input type="text" class="form-control rounded-0 border-secondary" value="<?=$phone2?>" name="phone[]" id="secNum1" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" disabled>
                </div>
                <div class="col-3 mb-3">
                <label for="secNum">&nbsp;</label>
                    <input type="password" class="form-control rounded-0 border-secondary" value="<?=$phone3?>" name="phone[]" id="secNum" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" disabled>
                </div>
            </div>
            <label for="secNum">성별</label>
            <? if($row['male']=="Man"){?>
                <div class="input-group">
                    <input type="radio" class="btn-check" id="option1" name="sex" value="Man" autocomplete="off" checked>
                    <label class="btn btn-outline-primary rounded-start" for="option1">MAN</label>
                    <input type="radio" class="btn-check" name="sex" value="Woman" id="option2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="option2">WOMAN</label>
                </div>
                <?}else{?>
                <div class="input-group">
                    <input type="radio" class="btn-check" id="option1" name="sex" value="Man" autocomplete="off">
                    <label class="btn btn-outline-primary rounded-start" for="option1">MAN</label>
                    <input type="radio" class="btn-check" name="sex" value="Woman" id="option2" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="option2">WOMAN</label>
                </div>
            <?}?>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
    window.addEventListener('load', () => {
      const forms = document.getElementsByClassName('validation-form');
      Array.prototype.filter.call(forms, (form) => {
        form.addEventListener('submit', function (event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);  

    </script>
</html>
    


    <input type="hidden" id="sample6_postcode" placeholder="우편번호">
    <input type="hidden" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
    <input type="hidden" id="sample6_address" placeholder="주소"><br>
    <input type="hidden" id="sample6_detailAddress" placeholder="상세주소">
    <input type="hidden" id="sample6_extraAddress" placeholder="참고항목">
