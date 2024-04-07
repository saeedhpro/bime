@extends("theme.manager")
@section("container")
@php $accessOnlyShow = \App\Http\Controllers\managerController::managerAccessLevel(6.5) //فقط مشاهده @endphp
  <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <script src="/assets/js/modernizr.min.js"></script>

  <div class="row">
    <div class="col-12 mb-3">
        <div  class="card-box table-responsive">
            <div class="m-t-0 m-b-30">
              <h4 class="header-title d-inline-block ">فهرست پیام ها</h4>

              @if(
                !$accessOnlyShow
                &&
                \App\Http\Controllers\managerController::managerAccessLevel(8)
              )
                <a href="/manager/pm/add" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5 float-right">افزودن پیام</a>
              @endif
            </div>
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper  dt-bootstrap4 p-0 m-0 no-footer">
                {{--<button type="button" id="basic"--}}
                        {{--class="btn btn-secondary btn-trans waves-effect "><i class="fa fa-print"></i></button>--}}
                <table id="datatable-buttons" class="table demo_pm datatable-buttons table-striped table-bordered p-0 m-0 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;direction: rtl;" width="100%" cellspacing="0">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc"  style="width: 15px;text-align: right !important;" >شناسه</th>
                                <th class="sorting"  style="text-align: right !important;" >عنوان</th>
                                <th class="sorting"  style="text-align: right !important;" >متن پیام</th>
                                <th class="sorting"  style="text-align: right !important;" >نام مجموعه</th>
                                <th class="sorting"  style="text-align: right !important;" >تاریخ انتشار</th>
                                <th class="sorting"  style="text-align: right !important;" >تاریخ و ساعت خاتمه نمایش</th>
                                <th class="sorting"  style="text-align: right !important;" aria-label="Salary: activate to sort column ascending">اقدامات</th></tr>
                            </thead>


                            <tbody>
                            @foreach($pms as $pm)
                                <tr role="row" class="odd">
                                    <td style="text-align: right !important;" class="sorting_1">{{$pm["id"]}}</td>
                                    <td style="text-align: right !important;">{{$pm["title"]}}</td>
                                    <td style="text-align: right !important;">{{$pm["text"]}}</td>
                                    <td style="text-align: right !important;">{{$pm['grop']["name"]}}</td>
                                    <td style="text-align: right !important;">{{$pm['am']}}</td>
                                    <td style="text-align: right !important;">{{$pm['date_end_show']}}</td>

                                    <td style="display: none;" class="d-block-s">
                                      @if(\App\Http\Controllers\managerController::managerAccessLevel(9))
                                        <a href="/manager/pm/show/{{$pm["id"]}}" data-toggle="tooltip" data-placement="top" data-original-title="کاربرانی که پیام را مشاهده کردند" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                      @endif

                                      @if(!$accessOnlyShow)
                                        <a href="/manager/pm/edit/{{$pm['id']}}" data-toggle="tooltip" data-placement="top" data-original-title="ویرایش" class="btn btn-success mt-2 mb-2"><i class="fa fa-edit"></i></a>

                                        @if(\App\Http\Controllers\managerController::managerAccessLevel(10))
                                          <button class="btn btn-danger btn-delete" id="{{$pm["id"]}}" name="{{$pm["title"]}}" data-toggle="tooltip" data-placement="top" data-original-title="حذف" ><i class="fa fa-times"></i></button>
                                        @endif
                                      @endif
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @if(!$accessOnlyShow)
    <script type="text/javascript" language="JavaScript">
      $(".btn-delete").click(function(){
        var id=$(this).attr("id");
        var email=$(this).attr("name");

        Swal.fire({html:'<div class="mt-3 font-sans"><img src="/img/clipart2619611.png" style="width: 150px;"><div class="mt-4 pt-2 fs-15 mx-5"><h4 class="font-sans">مطمئن هستید ؟  </h4><p style="direction: rtl;" class="text-muted mx-4 mb-0">ایا از حذف پیام  '+email+' مطمئن هستید ؟</p>           <form class="d-inline-block" action="/manager/pm/delete/'+id+'" method="post">@csrf<input name="_method" type="hidden" value="delete"><button type="submit" class="btn btn-danger waves-effect w-md waves-light m-b-5 mt-3" aria-label="">بله , حذف </button> <button type="button" class="btn btn-secondary waves-effect w-md m-b-5 mt-3" id="close-delete">لغو</button></form></div></div>',showCancelButton:!0,confirmButtonClass:"d-none",confirmButtonText:"Yes, Delete It!",cancelButtonClass:"d-none",buttonsStyling:!1,showCloseButton:!0})

        $("#close-delete").click(function(e){
          $(".swal2-close").trigger('click')
        });
      });
    </script>
  @endif
@endsection