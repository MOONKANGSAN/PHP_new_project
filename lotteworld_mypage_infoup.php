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
    include "lotteworld_db.php";

    $sql = "select * from lotte_userinfo where userid = '".$_GET['userid']."'";
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
        <h4 class="mb-3">회원정보 수정</h4>
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
            <div>
                <label for="name">프로필 사진</label>
                <div class="input-group mb-3 round-secondary">
                    <input type="file" class="form-control" id="inputGroupFile04" name="profile" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept=".gif,.jpg,.png">
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">조회</button>
                </div>       
            </div>
            <div class="mb-3">
                <label for="nickname">E-Mail</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control border-secondary" value="<?=$email[0]?>" name="email1" required>
                    <span class="input-group-text border border-dark">@</span>
                    <input type="text" class="form-control border-secondary rounded-end" value="<?=$email[1]?>" name="email2" required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    이메일을 입력해주세요.
                    </div>
                </div>
            </div>
            <div>
                <label for="Address">주소</label>
                <div class="input-group mb-3 round-secondary" style="width:40%">
                    <input type="text" class="form-control rounded-start border-secondary" readonly placeholder="PostNo" name="postno" id="sample6_postcode" value="<?=$row['postNo']?>" required>
                    <input type="button" class="btn btn-outline-primary rounded-end" onclick="sample6_execDaumPostcode()" value="조회" >
                    <div class="invalid-feedback">
                        우편번호를 입력해주세요.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" value="<?=$row['address1']?>"  class="form-control border-secondary rounded-2" id="sample6_address" name="address1" placeholder="도로명 주소" readonly required>
                    <div class="invalid-feedback">
                    도로명 주소를 입력해주세요.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" value="<?=$row['address2']?>"  class="form-control border-secondary rounded-2" name="address2" id="sample6_detailAddress" placeholder="상세주소(선택)">
                </div>
            </div>
            <div class="row">
                <div class="col-3 mb-1">
                    <label for="secNum">연락처</label>
                    <input type="text" class="form-control rounded-0 border-secondary" value="<?=$phone1?>" id="secNum1" name="phone[]" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <div class="col-3 mb-3">
                    <label for="secNum">&nbsp;</label>
                    <input type="text" class="form-control rounded-0 border-secondary" value="<?=$phone2?>" name="phone[]" id="secNum1" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <div class="col-3 mb-3">
                <label for="secNum">&nbsp;</label>
                    <input type="password" class="form-control rounded-0 border-secondary" value="<?=$phone3?>" name="phone[]" id="secNum" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
          <hr class="mb-4">
          <div class="mb-4"></div>
          <input type="hidden" name="usercode" value="<?=$row['usercode']?>">
          <!-- <input value="가입완료" class="btn btn-primary btn-lg btn-block" type="submit" onclick="finCheck()"> -->
          <button  class="btn btn-primary btn-lg btn-block" onclick="finCheck()">회원정보 수정</button>
        </form>
      </div>
    </div>
    <footer class="my-3 text-center text-small">
      <p class="mb-1">&copy; LT 2022@</p>
    </footer>
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

    function finCheck(){
        if(confirm('입력하신 정보가 맞습니까?')==false){
            event.preventDefault();
            return false;
        };
    }

    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("sample6_extraAddress").value = extraAddr;
                
                } else {
                    document.getElementById("sample6_extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode;
                document.getElementById("sample6_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("sample6_detailAddress").focus();
            }
        }).open();
    };

    </script>
</html>
    


    <input type="hidden" id="sample6_postcode" placeholder="우편번호">
    <input type="hidden" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
    <input type="hidden" id="sample6_address" placeholder="주소"><br>
    <input type="hidden" id="sample6_detailAddress" placeholder="상세주소">
    <input type="hidden" id="sample6_extraAddress" placeholder="참고항목">
