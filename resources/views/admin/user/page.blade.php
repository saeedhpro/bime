@extends("theme.default")
@section("container")
    <!-- DataTables -->
    <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="/assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="/assets/js/modernizr.min.js"></script>

    <div class="row">
        <div class="col-12 mb-3">
            <div  class="card-box table-responsive">
                <div class="m-t-0 m-b-30">

                    <h4 class="header-title d-inline-block ">فهرست کاربران</h4>
                    <a href="/admin/user/add" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5 float-right">افزودن کاربر</a>
                    <a href="/admin/user/add/xlsx" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5 ml-3 float-right"> افزودن کاربران با اکسل</a>
                </div>
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper  dt-bootstrap4 p-0 m-0 no-footer">
                    {{--<button type="button" id="basic"--}}
                            {{--class="btn btn-secondary btn-trans waves-effect "><i class="fa fa-print"></i></button>--}}
                    <table id="datatable-buttons" class="table demo datatable-buttons table-striped table-bordered p-0 m-0 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;direction: rtl;" width="100%" cellspacing="0">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc"  style="width: 15px;text-align: right !important;" >شناسه</th>
                                    <th class="sorting"  style="text-align: right !important;" >کداختصاصی</th>
                                    <th class="sorting"  style="text-align: right !important;" >نام</th>
                                    <th class="sorting"  style="text-align: right !important;" >نام خانوادگی</th>
                                    <th class="sorting"  style="text-align: right !important;" >شماره موبایل</th>
                                    <th class="sorting" style="text-align: right !important;" >شماره تلفن</th>
                                    <th class="sorting"  style="text-align: right !important;" >کدملی</th>
                                    <th class="sorting"  style="text-align: right !important;" >استان</th>
                                    <th class="sorting"  style="text-align: right !important;" >شهر</th>
                                    <th class="sorting"  style="text-align: right !important;" >تاریخ اشتراک</th>
                                    <th class="sorting"  style="text-align: right !important;" aria-label="Salary: activate to sort column ascending">اقدامات</th></tr>
                                </thead>


                                <tbody>
                                @foreach($users as $user)

                                    <tr role="row" class="odd">
                                        <td style="text-align: right !important;" class="sorting_1">{{$user["id"]}}</td>
                                        <td style="text-align: right !important;">{{$user["hash"]}}</td>
                                        <td style="text-align: right !important;">{{$user["name"]}}</td>
                                        <td style="text-align: right !important;">{{$user["name2"]}}</td>
                                        <td style="text-align: right !important;">{{$user["mobile"]}}</td>
                                        <td style="text-align: right !important;">{{$user["phone"]}}</td>
                                        <td style="text-align: right !important;">{{$user["kod"]}}</td>


                                        <td style="text-align: right !important;">{{$user["state"]}}</td>
                                        <td style="text-align: right !important;">{{$user["city"]}}</td>
                                        <td style="text-align: right !important;">{{$user["active_am"]}}</td>

                                        <td style="display: none;" class="d-block-s">
                                            <a href="/admin/user/data/{{$user["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="اطلاعات اختصاصی کاربر" class="btn btn-info"><i class=" fa fa-address-book "></i></a>
                                            <a href="/admin/user/invoice/{{$user["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="لیست پرداختی کاربر" class="btn btn-info"><i class=" mdi mdi-link "></i></a>
                                            <a href="/admin/user/grop/{{$user["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="لیست مجموعه ها" class="btn btn-success"><i class="fa fa fa-user-o"></i></a>
                                            <a href="/admin/user/pay/{{$user["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="لیست پرداخت ها" class="btn btn-primary"><i class="fa fa-paypal"></i></a>
                                            <a href="/admin/user/edit/{{$user["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="ویرایش" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a  data-toggle="tooltip" @if($user["password"]==null) class="btn btn-warning"@else class="btn btn-danger"  href="/admin/user/forgotPassword/{{$user["id"]}}"  @endif data-placement="top" data-original-title="تغیر رمز عبور" ><i class="fa fa-lock"></i></a>
                                            {{--<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="حذف" ><i class="fa fa-times"></i></button>--}}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table></div></div></div>
            </div>



            </div>

    </div>
    <script src="/assets/js/printThis.js"></script>
    <script>
        {{--$('#basic').on("click", function () {--}}
            {{--$('.demo').printThis({--}}
                {{--base: "https://jasonday.github.io/printThis/",--}}
                {{--header:"<h3 style='text-align: right !important;margin-bottom: 50px;'>فهرست کاربران</h3>",--}}
                {{--loadCSS: ["{{\Illuminate\Support\Facades\URL::to('/')}}/assets/css/bootstrap.min.css","{{\Illuminate\Support\Facades\URL::to('/')}}/assets/css/font.css"],--}}
                {{--importCSS:true,--}}
                {{--importStyle: true--}}
            {{--});--}}
        {{--})--}}
    </script>


@endsection
