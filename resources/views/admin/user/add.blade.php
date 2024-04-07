@extends("theme.default")
@section("container")
    <div id="alert_login" style="position: fixed;bottom: 0;right: 15px;width: 300px;z-index: 1000;">

    </div>
    <!-- DataTables -->
    <link href="/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/kamadatepicker.min.css" rel="stylesheet"/>
    <script src="/ckeditor/ckeditor.js" type="text/javascript"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mb-3">
                <div class="card-box ">
                    <div class="m-t-0 m-b-30">

                        <h4 class="header-title d-inline-block ">ایجاد کاربر</h4>
                        <a href="/admin/user"
                           class="btn btn-pink btn-trans waves-effect w-md waves-pink m-b-5 float-right">بازگشت</a>
                    </div>


                    <form onsubmit="return register();" id="form-register" class="form-horizontal m-t-20" method="post" action="/admin/user/add">
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
                                <label for="exampleInputEmail1"> نام خانوادگی : </label>
                                <input  class="form-control" name="name2" type="text" required=""   placeholder="نام خانوادگی">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="exampleInputEmail1">تلفن : </label>
                                <input  class="form-control" name="phone" type="text"  data-parsley-pattern="0[0-9]{10}" placeholder="تلفن">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="exampleInputEmail1">کدملی : </label>
                                <input  class="form-control" name="kod" type="text" required="" data-parsley-pattern="[0-9]{10}"  placeholder="کد ملی">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="exampleInputEmail1">کداختصاصی : </label>
                                <input  class="form-control" name="hash" type="text"   placeholder="کداختصاصی">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="exampleInputEmail1">استان : </label>
                                <input  class="form-control" name="state" type="text"    placeholder="استان محل اقامت">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="exampleInputEmail1">شهر : </label>
                                <input  class="form-control" name="city" type="text"    placeholder="شهر محل اقامت">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="inputEmail3" >انتخاب مجموعه :</label>
                                <select id="inputEmail34" required name="grop" class="form-control select2">
                                    <option selected="" disabled="">انتخاب مجموعه</option>
                                    @foreach($grops as $grop)
                                        <option value="{{$grop["id"]}}">{{$grop["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                                    ثبت کاربر
                                </button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>


    </div>


    <script src="/assets/plugins/fileuploads/js/dropify.min.js"></script>
    <script src="/assets/js/kamadatepicker.min.js"></script>
    <script>

        $('form').parsley();



        function register() {
            var error = 0;
            var mobile = $('input[name="mobile"]').val();

            var token = $('input[name="_token"]').val();
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
                                '                <span>این شماره موبایل قبلا ثبت شده .</span>\n' +
                                '            </div>')
                            setTimeout(function() {
                                $('#alert-1').remove();
                            }, 5000);

                        }

                    }
                })




           if (error!=0 ) {

               return false;
           }

        }





    </script>


@endsection
