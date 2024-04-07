@extends("theme.manager")
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

                    <h4 class="header-title d-inline-block ">فهرست مدیران مجموعه {{$grop["name"]}}</h4>
                    @if(\App\Http\Controllers\managerController::managerAccessLevel(63))
                    <a href="/manager/grop/manager/add/{{$grop["id"]}}" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5 float-right">افزودن مدیر جدید</a>
                        @endif
                </div>
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper  dt-bootstrap4 p-0 m-0 no-footer">
                    {{--<button type="button" id="basic"--}}
                            {{--class="btn btn-secondary btn-trans waves-effect "><i class="fa fa-print"></i></button>--}}
                    <table id="datatable-buttons" class="table demo datatable-buttons table-striped table-bordered p-0 m-0 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;direction: rtl;" width="100%" cellspacing="0">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc"  style="width: 15px;text-align: right !important;" >شناسه</th>
                                    <th class="sorting"  style="text-align: right !important;" >نام مدیر</th>
                                    <th class="sorting"  style="text-align: right !important;" >سطح دسترسی</th>
                                    @if(\App\Http\Controllers\managerController::managerAccessLevel(64) or \App\Http\Controllers\managerController::managerAccessLevel(65))

                                    <th class="sorting"  style="text-align: right !important;" aria-label="Salary: activate to sort column ascending">اقدامات</th></tr>
                               @endif
                                </thead>


                                <tbody>
                                @foreach($managers as $manager)

                                    <tr role="row" class="odd">
                                        <td style="text-align: right !important;" class="sorting_1">{{$manager["id"]}}</td>
                                        <td style="text-align: right !important;">{{$manager['Name User']}}</td>
                                              <td style="text-align: right !important;">
                                                  @foreach($manager["access"] as $item)
                                                       {{$item}} -
                                                      @endforeach
                                                      @foreach($manager["accessGropUser"] as $item2)
                                                       {{$item2}} -
                                                      @endforeach
                                              </td>
                                          @if(\App\Http\Controllers\managerController::managerAccessLevel(64) or \App\Http\Controllers\managerController::managerAccessLevel(65))
                                        <td style="display: none;" class="d-block-s">
                                            @if(\App\Http\Controllers\managerController::managerAccessLevel(64))
                                            <a href="/manager/grop/manager/edit/{{$manager["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="ویرایش" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                             @endif
                                            @if(\App\Http\Controllers\managerController::managerAccessLevel(65))
                                                <button class="btn btn-danger btn-delete" id="{{$manager["id"]}}" name="{{$manager['Name User']}}" data-toggle="tooltip" data-placement="top" data-original-title="حذف" ><i class="fa fa-times"></i></button>
                                                @endif
                                        </td>
                                              @endif
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table></div></div></div>
            </div>



            </div>

    </div>

    <script src="/assets/js/printThis.js"></script>
    <script>

        $(".btn-delete").click(function(){
            var id=$(this).attr("id");
            var email=$(this).attr("name");


            Swal.fire({html:'<div class="mt-3 font-sans"><img src="/img/clipart2619611.png" style="width: 150px;"><div class="mt-4 pt-2 fs-15 mx-5"><h4 class="font-sans">مطمئن هستید ؟  </h4><p style="direction: rtl;" class="text-muted mx-4 mb-0">ایا از حذف مدیر '+email+' مطمئن هستید ؟</p>           <form class="d-inline-block" action="/manager/grop/manager/delete/'+id+'" method="post">@csrf<input name="_method" type="hidden" value="delete"><button type="submit" class="btn btn-danger waves-effect w-md waves-light m-b-5 mt-3" aria-label="">بله , حذف </button> <button type="button" class="btn btn-secondary waves-effect w-md m-b-5 mt-3" id="close-delete">لغو</button></form></div></div>',showCancelButton:!0,confirmButtonClass:"d-none",confirmButtonText:"Yes, Delete It!",cancelButtonClass:"d-none",buttonsStyling:!1,showCloseButton:!0})

            $("#close-delete").click(function(e){
                $(".swal2-close").trigger('click');

            });
        });
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
