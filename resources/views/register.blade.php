<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>مدیریت تعاونیها</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="/public/images/favicon.ico">

    <!-- App css -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="/public/css/style.css" rel="stylesheet" type="text/css"/>

    <script src="/public/js/modernizr.min.js"></script>

</head>

<body>
<div id="alert_login" style="position: fixed;bottom: 0;right: 15px;width: 300px;z-index: 1000;">

</div>
<div class="account-pages" style="background-image: url('/img_login_register/{{$img_register["input1"]}}') !important;background-size: auto; background-repeat: no-repeat, repeat; background-size: cover;"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <div class="text-center">
            <img id="img_advertising1" width="300px" height="100px" img_active="1" img1="{{\App\Http\Controllers\userController::img_advertising(1)}}" img2="{{\App\Http\Controllers\userController::img_advertising(2)}}" img3="{{\App\Http\Controllers\userController::img_advertising(3)}}" img4="{{\App\Http\Controllers\userController::img_advertising(4)}}" src="/advertising_img/{{\App\Http\Controllers\userController::img_advertising(1)}}">
        </div>
        <a href="index.html" class="logo"><span>{{$setting2["input1"]}}</span></a>

    </div>
    <div class="m-t-30 card-box">

        <div class="text-center">
            <h4 class="text-uppercase font-bold mb-0">ثبت نام</h4>
        </div>
        <div class="p-20" id="div-form">
            <form onsubmit="return register();" id="form-register" class="form-horizontal m-t-20" method="post" action="/">
                @csrf

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="exampleInputEmail1">شماره موبایل : </label>
                        <input style="text-align: center;font-weight: bold;letter-spacing: 10px;text-shadow: 1px 1px 1px #999;font-size: 1.5em;padding: 10px 0;height: auto;" class="form-control" name="mobile" type="text" required=""  data-parsley-pattern="09[0-9]{9}" placeholder=".........09">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="exampleInputEmail1">نام : </label>
                        <input  class="form-control" name="name" type="text" required=""   placeholder="نام ">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="exampleInputEmail1">نام خانوادگی : </label>
                        <input  class="form-control" name="name2" type="text" required=""   placeholder=" نام خانوادگی">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<label for="exampleInputEmail1">تلفن : </label>--}}
                        {{--<input  class="form-control" name="phone" type="hidden"    placeholder="تلفن">--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="exampleInputEmail1">کدملی : </label>
                        <input  class="form-control" name="kod" type="text" required="" data-parsley-pattern="[0-9]{10}"  placeholder="کد ملی">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<label for="exampleInputEmail1">استان : </label>--}}
                        {{--<input  class="form-control" name="state" type="hidden"    placeholder="استان محل اقامت">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<label for="exampleInputEmail1">شهر : </label>--}}
                        {{--<input  class="form-control" name="city" type="hidden"  placeholder="شهر محل اقامت">--}}
                    {{--</div>--}}
                {{--</div>--}}
                @if($setting["input1"]==0)
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="exampleInputEmail1">کد ثبت نام : </label>
                        <input  class="form-control" name="code_grop" type="text"  placeholder="کد ثبت نام">
                    </div>
                </div>
                   @endif
                <div class=" text-center">
                    <canvas id="canvas"></canvas>
                </div>
                <div class="form-group mb-3">
                    <label for="captcha" class="form-label"> کد امنیتی  </label>
                    <input type="text" class="form-control" required="" data-parsley-minlength="5" data-parsley-maxlength="5" id="captcha" name="captcha" placeholder="کد امنیتی">
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                            ثبت نام
                        </button>
                    </div>
                </div>


            </form>


        </div>
    </div>
    <!-- end card-box-->
    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">حساب کاربری دارید ؟ <a href="/" class="text-primary m-l-5"><b>ورود</b></a></p>
        </div>
    </div><!-- end wrapper page -->
    <div class="text-center">
        <img  id="img_advertising2" width="300px" height="100px" img_active="1" img1="{{\App\Http\Controllers\userController::img_advertising(5)}}" img2="{{\App\Http\Controllers\userController::img_advertising(6)}}" img3="{{\App\Http\Controllers\userController::img_advertising(7)}}" img4="{{\App\Http\Controllers\userController::img_advertising(8)}}" src="/advertising_img/{{\App\Http\Controllers\userController::img_advertising(5)}}">
    </div>
    <div class="text-center m-2">
        <img id="img_advertising3" width="300px" height="100px" img_active="1" img1="{{\App\Http\Controllers\userController::img_advertising(9)}}" img2="{{\App\Http\Controllers\userController::img_advertising(10)}}" img3="{{\App\Http\Controllers\userController::img_advertising(11)}}" img4="{{\App\Http\Controllers\userController::img_advertising(12)}}" src="/advertising_img/{{\App\Http\Controllers\userController::img_advertising(9)}}">
    </div>
</div>
<!-- end wrapper page -->


<!-- jQuery  -->
<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/popper.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/waves.js"></script>
<script src="/public/js/jquery.slimscroll.js"></script>

<!-- App js -->
<script src="/public/js/jquery.core.js"></script>
<script src="/public/js/jquery.app.js"></script>
<script src="/js/jquery-captcha.min.js"></script>
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="/public/plugins/parsleyjs/dist/parsley.min.js"></script>
<script>


    setTimeout(img_advertising1, 2000);


    function img_advertising1(){

        var img_active=$("#img_advertising1").attr("img_active");

        if (img_active==1){
            var img=$("#img_advertising1").attr("img2");
            $("#img_advertising1").attr("src","/advertising_img/"+img);
            $("#img_advertising1").attr("img_active","2");
        }
        if (img_active==2){
            var img=$("#img_advertising1").attr("img3");
            $("#img_advertising1").attr("src","/advertising_img/"+img);
            $("#img_advertising1").attr("img_active","3");
        }
        if (img_active==3){
            var img=$("#img_advertising1").attr("img4");
            $("#img_advertising1").attr("src","/advertising_img/"+img);
            $("#img_advertising1").attr("img_active","4");
        }
        if (img_active==4){
            var img=$("#img_advertising1").attr("img1");
            $("#img_advertising1").attr("src","/advertising_img/"+img);
            $("#img_advertising1").attr("img_active","1");
        }
        setTimeout(img_advertising1, 2000);
    }

    setTimeout(img_advertising2, 2000);
    function img_advertising2(){

        var img_active=$("#img_advertising2").attr("img_active");

        if (img_active==1){
            var img=$("#img_advertising2").attr("img2");
            $("#img_advertising2").attr("src","/advertising_img/"+img);
            $("#img_advertising2").attr("img_active","2");
        }
        if (img_active==2){
            var img=$("#img_advertising2").attr("img3");
            $("#img_advertising2").attr("src","/advertising_img/"+img);
            $("#img_advertising2").attr("img_active","3");
        }
        if (img_active==3){
            var img=$("#img_advertising2").attr("img4");
            $("#img_advertising2").attr("src","/advertising_img/"+img);
            $("#img_advertising2").attr("img_active","4");
        }
        if (img_active==4){
            var img=$("#img_advertising2").attr("img1");
            $("#img_advertising2").attr("src","/advertising_img/"+img);
            $("#img_advertising2").attr("img_active","1");
        }
        setTimeout(img_advertising2, 2000);
    }

    setTimeout(img_advertising3, 2000);


    function img_advertising3(){

        var img_active=$("#img_advertising3").attr("img_active");

        if (img_active==1){
            var img=$("#img_advertising3").attr("img2");
            $("#img_advertising3").attr("src","/advertising_img/"+img);
            $("#img_advertising3").attr("img_active","2");
        }
        if (img_active==2){
            var img=$("#img_advertising3").attr("img3");
            $("#img_advertising3").attr("src","/advertising_img/"+img);
            $("#img_advertising3").attr("img_active","3");
        }
        if (img_active==3){
            var img=$("#img_advertising3").attr("img4");
            $("#img_advertising3").attr("src","/advertising_img/"+img);
            $("#img_advertising3").attr("img_active","4");
        }
        if (img_active==4){
            var img=$("#img_advertising3").attr("img1");
            $("#img_advertising3").attr("src","/advertising_img/"+img);
            $("#img_advertising3").attr("img_active","1");
        }
        setTimeout(img_advertising3, 2000);
    }




    $('form').parsley();
    function code11() {
        var error = 0;
        var code = $('input[name="code"]').val();
        var pass = $('input[name="pass"]').val();
        var token = $('input[name="_token"]').val();

        $.ajax('/check/register/code', {
            type: 'post',
            async: false
            , data: {_token: token,code:code,pass:pass}
            , success: function (msg) {

                if (msg == 100) {
                    error = error + 1;
                    $("#alert_login").prepend('<div id="alert-1" class="alert alert-danger alert-dismissable">\n' +
                        '                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '                <span>کد تایید اشتباه می باشد .</span>\n' +
                        '            </div>')
                    setTimeout(function() {
                        $('#alert-1').remove();
                    }, 5000);
                }


            }
        })
        if (error>0 ){
            return false;
        }

    }
    const captcha = new Captcha($('#canvas'),{
        width: 200,
        length: 5,
        caseSensitive: true,
        height: 70,
        font: 'bold 40px IRANSans',
        resourceType: '0',

    });

    function register() {
        var error = 0;
        var mobile = $('input[name="mobile"]').val();
        var name = $('input[name="name"]').val();
        var name2 = $('input[name="name2"]').val();
        // var phone = $('input[name="phone"]').val();
        var kod = $('input[name="kod"]').val();
        // var state = $('input[name="state"]').val();
        // var city = $('input[name="city"]').val();
        var code_grop = $('input[name="code_grop"]').val();

        var token = $('input[name="_token"]').val();
        var factor= $('input[name="captcha"]').val();
        const ans = captcha.valid(factor);
        if(!ans){
            error = error + 1;
            $("#alert_login").prepend('<div id="alert-1" class="alert alert-danger alert-dismissable">\n' +
                '                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '                <span>کد امنیتی  اشتباه می باشد</span>\n' +
                '            </div>')
            setTimeout(function() {
                $('#alert-1').remove();
            }, 5000);
        }
        $.ajax('/check/register',
            {
                type: 'post',
                async: false
                , data: {_token: token, mobile: mobile}
                , success: function (msg) {

                    if (msg == 100) {
                        error = error + 1;
                        $("#alert_login").prepend('<div id="alert-1" class="alert alert-danger alert-dismissable">\n' +
                            '                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                            '                <span>شما قبلا ثبتنام کرده اید لطفا <a href="/" class="text-primary">وارد</a> شوید</span>\n' +
                            '            </div>')
                        setTimeout(function() {
                            $('#alert-1').remove();
                        }, 5000);

                    }

                }
            })


        if (error==0 && $("#form-register").parsley().isValid()){
            $.ajax('/register',
                {
                    type: 'post',
                    async: false
                    , data: {_token: token, mobile: mobile,name:name,name2:name2,kod:kod,code_grop:code_grop}
                    , success: function (msg) {

                        if (msg == 100) {
                                 $("#form-register").remove();
                                 $("#div-form").append(
                                     '<form onsubmit="return code11();" id="form-register2" class="form-horizontal m-t-20" method="post" action="/register/code">\n' +
                                     '                @csrf\n' +
                                     '\n' +
                                     '                <div class="form-group">\n' +
                                     '                    <div class="col-xs-12">\n' +
                                     '                        <label for="exampleInputEmail1">کد تایید : </label>\n' +
                                     '                        <input style="text-align: center;font-weight: bold;letter-spacing: 10px;text-shadow: 1px 1px 1px #999;font-size: 1.5em;padding: 10px 0;height: auto;" class="form-control" name="code" type="text" required=""  data-parsley-pattern="[0-9]{5}" placeholder=".....">\n' +
                                     '                    </div>\n' +
                                     '                </div>\n' +
                                     '                <div class="form-group">\n' +
                                     '                    <div class="col-xs-12">\n' +
                                     '                        <label for="exampleInputEmail1">رمز عبور : </label>\n' +
                                     '                        <input class="form-control" name="pass" data-parsley-minlength="6" type="password" required=""  id="pass1" placeholder="رمز عبور">\n' +
                                     '                    </div>\n' +
                                     '                </div>\n' +
                                     '                <div class="form-group">\n' +
                                     '                    <div class="col-xs-12">\n' +
                                     '                        <label for="pass2">تکرار رمز عبور : </label>\n' +
                                     '                        <input id="pass2" class="form-control" name="pass2" type="password" required="" data-parsley-equalto="#pass1"   placeholder="تکرار رمز عبور">\n' +
                                     '                    </div>\n' +
                                     '                </div>\n' +
                                     '\n' +
                                     '\n' +
                                     '                <div class="form-group text-center m-t-30">\n' +
                                     '                    <div class="col-xs-12">\n' +
                                     '                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">\n' +
                                     '                            ورود\n' +
                                     '                        </button>\n' +
                                     '                    </div>\n' +
                                     '                </div>\n' +
                                     '\n' +
                                     '\n' +
                                     '            </form>'
                                 )

                        }if (msg == 50) {
                                 $("#form-register").remove();
                                 $("#div-form").append(
                                     '<form onsubmit="return code11();" id="form-register2" class="form-horizontal m-t-20" method="post" action="/register/code">\n' +
                                     '                @csrf\n' +
                                     '\n' +
                                     '                <div class="form-group">\n' +
                                     '                    <div class="col-xs-12">\n' +
                                     '                        <label for="exampleInputEmail1">کد تایید : </label>\n' +
                                     '                        <input style="text-align: center;font-weight: bold;letter-spacing: 10px;text-shadow: 1px 1px 1px #999;font-size: 1.5em;padding: 10px 0;height: auto;" class="form-control" name="code" type="text" required=""  data-parsley-pattern="[0-9]{5}" placeholder=".....">\n' +
                                     '                    </div>\n' +
                                     '                </div>\n' +
                                     '\n' +
                                     '\n' +
                                     '                <div class="form-group text-center m-t-30">\n' +
                                     '                    <div class="col-xs-12">\n' +
                                     '                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">\n' +
                                     '                            ورود\n' +
                                     '                        </button>\n' +
                                     '                    </div>\n' +
                                     '                </div>\n' +
                                     '\n' +
                                     '\n' +
                                     '            </form>'
                                 )

                        }
                        $('form').parsley();
                    }
                })
        }


            return false;

    }





</script>

</body>
</html>
