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
<body>
  <div class="container">
    <div class="input-form-backgroud row">
      <div class="input-form col-md-12 mx-auto">
        <h4 class="mb-3">회원가입</h4>
        <form action="lotteworld_signup_confirm.php" class="validation-form" novalidate id="formSign" method="POST">
            <div class="row">
                <div class="col-6 mb-1">
                    <label for="name">이름</label>
                    <input type="text" class="form-control rounded-2 border-secondary" id="username" name="username" required>
                    <div class="invalid-feedback">
                        이름을 입력해주세요.
                    </div>
                </div>
                <div class="col-3 mb-3">
                    <label for="secNum">주민등록번호</label>
                    <input type="text" class="form-control rounded-2 border-secondary" id="secNum1" name="secNum1" maxlength=6 required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <div class="invalid-feedback">
                        주민번호 앞자리를 입력해주세요.
                    </div>
                </div>
                <div class="col-3 mb-3">
                <label for="secNum">&nbsp;</label>
                    <input type="password" class="form-control rounded-2 border-secondary" id="secNum" name="secNum2" maxlength=7 required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    <div class="invalid-feedback" >
                        주민번호 뒷자리를 입력해주세요.
                    </div>
                </div>
            </div>
            <div>
                <label for="name">ID</label>
                <div class="input-group mb-3 round-secondary" style="width:60%">
                    <input type="text" class="form-control rounded-start border-secondary" id="userid" name="userid" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary rounded-end" type="button" id="button-addon2" onclick="checkid()">Button</button>
                    <div class="invalid-feedback">
                    ID를 입력해주세요.
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="name">비밀번호</label>
                        <input type="password" style="color:black" class="form-control rounded-2 border-secondary" id="pw1" name="password" required>
                        <div class="invalid-feedback">
                        비밀번호를 입력해주세요.
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="nickname">비밀번호 확인</label>
                        <input type="password" style="color:black" class="form-control rounded-2 border-secondary" id="pw2">
                        <div class="mt-2" id="msg"></div>
                    </div>
                </div>        
               
            </div>
            <div class="mb-3">
                <label for="nickname">E-Mail</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control border-secondary" name="email1" required>
                    <span class="input-group-text border-secondary">@</span>
                    <input type="text" class="form-control border-secondary rounded-end" name="email2" required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    이메일을 입력해주세요.
                    </div>
                </div>
            </div>
            <div>
            
                <label for="name">주소</label>
                <div class="input-group mb-3 round-secondary" style="width:40%">
                    <input type="text" class="form-control rounded-start border-secondary" readonly placeholder="PostNo" name="postno" id="sample6_postcode" required>
                    <button class="btn btn-outline-primary rounded-end" onclick="sample6_execDaumPostcode()" value="조회" >조회</button>
                    <div class="invalid-feedback">
                        우편번호를 입력해주세요.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control border-secondary rounded-2" id="sample6_address" name="address1" placeholder="도로명 주소" readonly required>
                    <div class="invalid-feedback">
                    도로명 주소를 입력해주세요.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control border-secondary rounded-2" name="address2" id="sample6_detailAddress" placeholder="상세주소(선택)">
                </div>
            </div>
            <div class="row">
                <div class="col-3 mb-1">
                    <label for="secNum">연락처</label>
                    <input type="text" class="form-control rounded-2 border-secondary" id="secNum1" name="phone[]" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <div class="col-3 mb-3">
                    <label for="secNum">&nbsp;</label>
                    <input type="text" class="form-control rounded-2 border-secondary" name="phone[]" id="secNum1" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <div class="col-3 mb-3">
                <label for="secNum">&nbsp;</label>
                    <input type="password" class="form-control rounded-2 border-secondary" name="phone[]" id="secNum" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
            </div>
            <label for="secNum">성별</label>
            <div class="input-group">
                <input type="radio" class="btn-check" id="option1" name="sex" value="Man" autocomplete="off" checked>
                <label class="btn btn-outline-primary rounded-start" for="option1">MAN</label>
                <input type="radio" class="btn-check" name="sex" value="Woman" id="option2" autocomplete="off">
                <label class="btn btn-outline-primary" for="option2">WOMAN</label>
            </div>
          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="aggrement" required>
            <label class="custom-control-label" for="aggrement">개인정보 수집 및 이용에 동의합니다.</label>
          </div>
          <div class="mb-4"></div>
          <!-- <input value="가입완료" class="btn btn-primary btn-lg btn-block" type="submit" onclick="finCheck()"> -->
          <button  class="btn btn-primary btn-lg btn-block">가입완료</button>
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
    
    function checkid(){
    var _width = '500';
    var _height = '150';
    // 팝업을 가운데 위치시키기 위해 아래와 같이 값 구하기
    var _left = Math.ceil(( window.screen.width - _width )/2);
    var _top = Math.ceil(( window.screen.height - _height )/3); 

	var userid = document.getElementById("userid").value;
	if(userid)
	{
        url = "lotteworld_id_check.php?userid="+userid;
        window.open(url,'chkid','width='+ _width +', height='+ _height +', left=' + _left + ', top='+ _top);          
		}else{
			alert("아이디를 입력하세요");
		}
	}

    function finCheck(){
        confirm('입력하신 정보가 맞습니까?');
        var userid = document.getElementById('userid').value;
        if(userid.length<10){
            alert('아이디는 10글자 이상이여야 합니다.');
            event.preventDefault();
        }
    }

    $(function(){
                $("#pw2").on("keyup",function(){
                    var msg = $("#msg").val();
                    var leng = $("#pw1").val();
                    if(leng.length<8){
                        $("#msg").html("비밀번호는 최소 8자 이상입력해주세요.");
                        $("#msg").css("color","red");
                    }else if($("#pw1").val() == $("#pw2").val()){
                        $("#msg").html("패스워드가 일치합니다.");
                        $("#msg").css("color","blue");
                    }else{
                        $("#msg").html("패스워드가 일치하지 않습니다.");
                        $("#msg").css("color","red");
                    }
                })
            });

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
