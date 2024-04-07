@php
/* START انتقال کاربر به منوی دارای فرم اجباری مربوط به گروه کاربری کاربر */
$_get_id_last_form_required_in_menus = \App\Http\Controllers\Controller::_user__get_id_last_form_required_in_menus(session('id_grop_user')); //دریافت آیدی آخرین فرم اجباری در منوهای مربوط به کاربر
if(!empty($_get_id_last_form_required_in_menus)):
  $id_menu = $_get_id_last_form_required_in_menus['ID_Menu_Under'];
  $id_menu = !$id_menu ? $_get_id_last_form_required_in_menus['ID_Menu'] : $id_menu; //آیدی منو
  if($id_menu):
    $id_under = $_get_id_last_form_required_in_menus['ID_Under']; //آیدی زیرمنو

    $_url_menu = "/user/menu/$id_menu/$id_under";
    if($_url_menu != parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)):
      header("Location: $_url_menu");
      exit();
    endif;
  endif;
endif;
/* END انتقال کاربر به منوی دارای فرم اجباری مربوط به گروه کاربری کاربر */
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>مدیریت تعاونیها  </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <script src="/assets/js/modernizr.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</head>
@php
  $pms = \App\Http\Controllers\userController::pm();

  $menus = \App\Http\Controllers\userController::get_menus();
  $menus = !empty($menus) ? $menus : array();
@endphp
<body @if(count($pms)>0) class="modal-open" @endif>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                <!--<span class="logo-small"><i class="mdi mdi-radar"></i></span>-->
                <!--<span class="logo-large"><i class="mdi mdi-radar"></i> Adminto</span>-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="/" class="logo">
                    <img height="63px" width="110px" src="/grop_img/{{session("logo")}}">
                    @if(session("name_grop")!=null)
                        <strong style="overflow: clip;width: 113px;display: inline-flex;height: 63px;" class="mr-2 w-lg-100">{{session("name_grop")}}</strong>
                    @endif

                </a>
            </div>
            <!-- End Logo container-->

            <div class="menu-extras topbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li>
                        <!-- Notification -->
                        {{--<div class="notification-box">--}}
                            {{--<ul class="list-inline mb-0">--}}
                                {{--@if(session()->has('announcement'))--}}
                                {{--<li class="position-relative">--}}
                                    {{--<a href="javascript:void(0);" class="right-bar-toggle">--}}
                                        {{--<i class="mdi mdi-bell-outline noti-icon"></i>--}}
                                    {{--</a>--}}
                                    {{--@php--}}
                                        {{--$announcements_count=count(\App\announcement::where("active",0)->get());--}}
                                    {{--@endphp--}}
                                        {{--<span style="bottom: 0; left: 0;" class="badge position-absolute badge-danger">{{$announcements_count}}</span>--}}

                                {{--</li>--}}
                                    {{--@endif--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        <!-- End Notification bar -->
                    </li>
                    <li>
                        <!-- Notification -->
                        <div class="notification-box">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="dripicons-broadcast"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i style="font-size: 34px;line-height: 63px;" class="fa d-block fa-gear"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <!-- item-->
                            <a href="/logout" class="dropdown-item notify-item">
                                <i class="ti-power-off m-r-5"></i> خروج
                            </a>

                        </div>
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu ">
                        <a href="#"><i class="mdi mdi-view-dashboard"></i> <span> پیشخوان </span> </a>
                        <ul class="submenu">
                            <li><a href="/user"> پیشخوان من</a></li>
                            <!--<li><a href="/user/data">اطلاعات اختصاصی کاربر</a></li>-->
                            <li><a href="/user/setting">تنظیمات</a></li>
                            <li><a href="/user/product">اشتراک </a></li>

                        </ul>
                    </li>

                    @foreach($menus as $menu)
                      @if($menu['info_unders'])
                        <li class="has-submenu">
                          <a href="#"><i class="mdi mdi-texture"></i><span> {{$menu['name']}} </span> </a>
                          <ul class="submenu">
                            @foreach($menu['info_unders'] as $info_under)
                              <li>
                                <a href="/user/menu/{{$menu['id']}}/{{$info_under['ID']}}">{{$info_under['Name']}}</a>
                              </li>
                            @endforeach
                          </ul>
                        </li>
                      @else
                        <li class="has-submenu ">
                          <a href="/user/menu/{{$menu['id']}}"><i class="mdi mdi-view-dashboard"></i> <span> {{$menu['name']}} </span> </a>
                        </li>
                      @endif
                    @endforeach

                    <li class="has-submenu ">
                        <a href="/user/ticket"><i class="mdi mdi-view-dashboard"></i> <span>  تیکت/گفتگو </span> </a>

                    </li>
                    <li class="has-submenu ">
                        <a href="/user/pm"><i class="mdi mdi-view-dashboard"></i> <span>  صندوق پیام  </span> </a>
                    </li>
                    <li class="has-submenu ">
                        <a href="#"><i class="mdi mdi-view-dashboard"></i> <span>  صورت حساب ها </span> </a>

                        <ul class="submenu">
                                <li><a href="/user/invoice">صورت حساب ها</a></li>
                                <li><a href="/user/invoice/all">صورت حساب نهایی</a></li>
                                <li><a href="/user/invoice/pay">لیست پرداختی ها</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu ">
                        <a href="/user/crop"><i class="mdi mdi-view-dashboard"></i> <span>  محصولات </span> </a>
                    </li>
                    <li class="has-submenu ">
                        <a href="/user/advertising/list"><i class="mdi mdi-view-dashboard"></i> <span>  تبلیغات </span> </a>
                    </li>


                    {{--<li class="has-submenu">--}}


                        {{--<a href="#"><i class="mdi mdi-texture"></i><span> مجموعه ها </span> </a>--}}
                        {{--<ul class="submenu">--}}
                            {{--<li><a  href="/admin/grop">لیست مجموعه ها</a></li>--}}
                            {{--<li><a href="/admin/grop/add">ایجاد مجموعه جدید</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="has-submenu">--}}

                        {{--<a href="#"><i class="mdi mdi-texture"></i><span> منو ها </span> </a>--}}
                        {{--<ul class="submenu">--}}
                            {{--<li><a  href="/admin/menu">لیست منو ها</a></li>--}}
                            {{--<li><a href="/admin/menu/add">ایجاد منو جدید</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="has-submenu ">--}}


                        {{--<a href="#"><i class="mdi mdi-texture"></i><span> کاربران </span> </a>--}}
                        {{--<ul class="submenu">--}}
                            {{--<li><a  href="/admin/user">لیست کاربران</a></li>--}}
                            {{--<li><a href="/admin/user/add">ایجاد کاربر جدید</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->

@if(count($pms)>0)
<div id="myModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block; padding-left: 17px;background-color: #000000db;" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myModalLabel">{{$pms[0]["title"]}}</h4>
            </div>
            <div class="modal-body py-5">
                @if($pms[0]["img"])
                    <div class="text-center">
                    <img style="max-width: 440px;" src="/pm_img/{{$pms[0]["img"]}}">
                    </div>
                    @endif
                {{$pms[0]["text"]}}
            </div>
            <div class="modal-footer">
                <a href="/user/pm/active/{{$pms[0]["id"]}}" type="button" class="btn btn-primary waves-effect waves-light">مشاهده کردم</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endif

<div class="wrapper pb-lg-5"  style="padding-bottom: 250px;">
    <div class="side-bar right-bar" style="width: 336px;">
        <a href="javascript:void(0);" class="right-bar-toggle">
            <i class="mdi mdi-close-circle-outline"></i>
        </a>

        <h4 class="  ">تبلبغات </h4>


        <div class="notification-list nicescroll" style="overflow: auto;width: 101%;">
            <ul class="list-group w-100 list-no-border user-list">
                @foreach(\App\Http\Controllers\userController::img_advertising(25) as $advertising)
                <li class="list-group-item">
                        <img width="300px" height="100px" src="/advertising_img/{{$advertising["img"]}}">
                </li>
                @endforeach





            </ul>
        </div>
    </div>


    <div class="container-fluid">

        @yield("container")


    </div> <!-- end container -->


    <!-- Right Sidebar -->

    <!-- /Right-bar -->

</div>
<!-- end wrapper -->


<!-- Footer -->
<footer class="footer" style="padding-top: 5px;padding-bottom: 5px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img width="300px" height="100px" id="img_advertising1" img_active="1" img1="{{\App\Http\Controllers\userController::img_advertising(13)}}" img2="{{\App\Http\Controllers\userController::img_advertising(14)}}" img3="{{\App\Http\Controllers\userController::img_advertising(15)}}" img4="{{\App\Http\Controllers\userController::img_advertising(16)}}" src="/advertising_img/{{\App\Http\Controllers\userController::img_advertising(13)}}">

            </div>
            <div class="col-12 col-lg-4 text-center">
                <img width="300px" height="100px" id="img_advertising2" img_active="1" img1="{{\App\Http\Controllers\userController::img_advertising(17)}}" img2="{{\App\Http\Controllers\userController::img_advertising(18)}}" img3="{{\App\Http\Controllers\userController::img_advertising(19)}}" img4="{{\App\Http\Controllers\userController::img_advertising(20)}}" src="/advertising_img/{{\App\Http\Controllers\userController::img_advertising(17)}}">
            </div>
            <div class="col-12 col-lg-4 text-center">
                <img width="300px" height="100px" id="img_advertising3" img_active="1" img1="{{\App\Http\Controllers\userController::img_advertising(21)}}" img2="{{\App\Http\Controllers\userController::img_advertising(22)}}" img3="{{\App\Http\Controllers\userController::img_advertising(23)}}" img4="{{\App\Http\Controllers\userController::img_advertising(24)}}" src="/advertising_img/{{\App\Http\Controllers\userController::img_advertising(21)}}">
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->





<script src="/assets/js/waves.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<!-- Required datatable js -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables/jszip.min.js"></script>
<script src="/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<!-- Key Tables -->
<script src="/assets/plugins/datatables/dataTables.keyTable.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Selection table -->
<script src="/assets/plugins/datatables/dataTables.select.min.js"></script>
<script src="/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>

<script src="/assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
<script src="/assets/plugins/tiny-editable/numeric-input-example.js"></script>
<!-- App js -->
<script src="/assets/js/jquery.core.js"></script>
<script src="/assets/js/jquery.app.js"></script>
<script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
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


        // Default Datatable
        $('.datatable').DataTable();

        //Buttons examples
        var table = $('.datatable-buttons').DataTable();


        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        // Responsive Datatable
        $('#responsive-datatable').DataTable();

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });
        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
        $('textarea#textarea').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-success",
            limitReachedClass: "badge badge-danger"
        });


        $('form[not="menu-with-form"]').each(function (){
            $(this).parsley();
        })
    });

</script>
</body>
</html>