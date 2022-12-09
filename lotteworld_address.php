<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            $(function(){
                $("#pw2").on("keyup",function(){
                    var msg = $("#msg").val();
                    if($("#pw1").val() == $("#pw2").val()){
                        $("#msg").html("패스워드가 일치합니다.");
                        $("#msg").css("color","blue");
                        
                    }else{
                        $("#msg").html("패스워드가 일치하지 않습니다.");
                        $("#msg").css("color","red");
                    }
                })
            })

        </script>
        <style>
            *{box-sizing: border-box;}
            div{border: 1px solid black;}
            .wrapper{
                width: 300px;
                height: 150px;
                margin: auto;
            }

            input{
                width: 100%;
                height: 50px;
                text-align: center;
            }
            .wrapper>div{
                height: 50px;
                line-height: 50px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div>
                <input type="text" id="pw1">
            </div>

            <div>
                <input type="text" id="pw2">
            </div>

            <div id="msg">

            </div>

        </div>

    </body>
</html>