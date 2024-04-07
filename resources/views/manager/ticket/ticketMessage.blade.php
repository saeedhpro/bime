@extends("theme.manager")
@section("container")
@php $accessOnlyShow = \App\Http\Controllers\managerController::managerAccessLevel(11.5) //فقط مشاهده @endphp
  <style>
      #chat2 .form-control {
          border-color: transparent;
      }

      #chat2 .form-control:focus {
          border-color: transparent;
          box-shadow: inset 0px 0px 0px 1px transparent;
      }

      .divider:after,
      .divider:before {
          content: "";
          flex: 1;
          height: 1px;
          background: #eee;
      }
      .rounded-3 {
          border-radius: 5px !important;
          font-size: 12px;
          padding: 9px 16px !important;
          line-height: 24px;
      }
     .btn-download-container {
          border-radius: 50%;
          background-color: white;
          color: #3498db;
          width: 50px;
          height: 50px;
          position: relative;
          float: right;
         text-align: center;
         line-height: 55px;
         font-size: 22px;
      }
      .widget-user .wid-u-info {
          margin-right: 58px;
      }
  </style>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6 ">

            <div class="card" id="chat2">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h5 class="mb-0">تیکت </h5>
                    <a href="/manager/ticket" class="btn btn-primary btn-trans waves-effect w-md waves-primary m-b-5 float-right">برگشت</a>
                </div>
                <div class="card-body" id="card-body22" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;overflow: auto;">
                    @foreach($messages as $message)
                        @if($message["type"]==1)
                            @if($message["file"]!=null)
                                <div style="box-shadow: none;background-color: #f5f6f7;display: inline-block;min-height: auto; margin-bottom: 3px;" class="card-box  widget-user position-relative">
                                    <div>
                                        <div class="btn-download-container">
                                            <a rel="nofollow" class="no-link-inherit" href="/file_ticket/{{$message["file"]}}" download>
                                                <div class="btn-download">
                                                    <i class="fa fa-download"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="wid-u-info">
                                            <h5 class="mt-0 m-b-5"> {{$message["text"]}}</h5>
                                            <small class="text-custom"><a rel="nofollow" class="no-link-inherit tc-white" href="/file_ticket/{{$message["file"]}}" download>دانلود</a></small>
                                        </div>
                                    </div>
                                    @if(
                                      !$accessOnlyShow
                                      &&
                                      \App\Http\Controllers\managerController::managerAccessLevel(14)
                                    )
                                      <a class="btn btn-danger btn-delete" id="{{$message["id"]}}" style="position: absolute;left: 0;bottom: 0;" data-toggle="tooltip" data-placement="top" data-original-title="حذف"><i class="fa fa-times"></i></a>
                                    @endif
                                </div>
                                <p class="small ms-3 mb-3 text-muted">{{$message["am"]}} {{$message["user"]["name"]}} {{$message["user"]["name2"]}} [{{$message["user"]["id"]}}] [{{$message["user"]["hash"]}}] </p>
                                @else
                                <div class="d-flex flex-row justify-content-start">
                                  <div>
                                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">{{$message["text"]}}</p>
                                    <p class="small ms-3 mb-3 text-muted">{{$message["am"]}} {{$message["user"]["name"]}} {{$message["user"]["name2"]}} [{{$message["user"]["id"]}}] [{{$message["user"]["hash"]}}]</p>
                                  </div>
                                </div>
                                @endif
                            @else
                            @if($message["file"]!=null)
                                <div class="d-flex flex-row justify-content-end ">
                                    <div>
                                <div style="box-shadow: none;background-color: #188ae2;display: inline-block;min-height: auto; margin-bottom: 3px;" class="card-box  widget-user position-relative">
                                    <div>
                                        <div class="btn-download-container">
                                            <a rel="nofollow" class="no-link-inherit" href="/file_ticket/{{$message["file"]}}" download>
                                                <div class="btn-download">
                                                    <i class="fa fa-download"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="wid-u-info">
                                            <h5 class="mt-0 m-b-5 text-white"> {{$message["text"]}}</h5>
                                            <small class="text-custom"><a rel="nofollow" class="no-link-inherit tc-white text-white" href="/file_ticket/{{$message["file"]}}" download>دانلود</a></small>
                                        </div>
                                    </div>
                                    @if(
                                      !$accessOnlyShow
                                      &&
                                      \App\Http\Controllers\managerController::managerAccessLevel(14)
                                    )
                                      <a class="btn btn-danger btn-delete"  id="{{$message["id"]}}" style="position: absolute;left: 0;bottom: 0;" data-toggle="tooltip" data-placement="top" data-original-title="حذف"><i class="fa fa-times"></i></a>
                                    @endif
                                </div>
                                <p class="small text-right ms-3 mb-3 text-muted">{{$message["am"]}}</p>
                                    </div>
                                </div>
                            @else
                            <div class="d-flex flex-row justify-content-end ">
                              <div>
                                @php $name_extra_class = ($message['id_user'] > 0) ? 'mb-0' : 'mb-3' @endphp
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{$message["text"]}}</p>
                                <p class="small me-3 {{$name_extra_class}} text-muted d-flex justify-content-end">{{$message["am"]}} ({{$message["id_user"]}})</p>
                              </div>
                            </div>
                                @endif
                            @endif

                        @endforeach
                </div>

                @if(
                  !$accessOnlyShow
                  &&
                  $ticket["active"] != 0 //وضعیت بسته
                  &&
                  $ticket["active"] != 5 //وضعیت بایگانی
                )
                  <form class="form-horizontal form" method="post" action="" role="form" enctype="multipart/form-data"
                              data-parsley-validate novalidate>
                    @csrf

                    <div class="card-footer p-3">
                      <select name="status" class="w-100 p-2 border-info">
                        <option>تغییر وضعیت به ...</option>
                        <option value="0">بسته</option>
                        <option value="4">در انتظار اقدام کاربر</option>
                        <option value="5">بایگانی</option>
                      </select>
                    </div>

                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                      <input name="file" style="display: none;" type="file">
                      <input type="text" name="text" class="form-control form-control-lg"
                             id="exampleFormControlInput1"
                             placeholder="متن پیام ...">

                      <button style="width: 139px;min-width: 98px;" id="input_file" type="button"
                              class="btn btn-icon waves-effect waves-light btn-info m-b-5 m-l-15 m-r-10">انتخاب فایل</button>
                      <button type="submit" style="width: 71px;min-width: 62px;" class="btn btn-icon waves-effect waves-light btn-success m-b-5">ارسال</button>
                    </div>
                  </form>
                @endif
            </div>

        </div>

    </div>


  @if(!$accessOnlyShow)
    <script src="/assets/js/printThis.js"></script>
    <script>
      var body = $("#card-body22");

      body.stop().animate({scrollTop:body.height()}, 500, 'swing');

      $("#input_file").click(function () {
        $('input[name="file"]').trigger('click')
      })

      $(".btn-delete").click(function(){
        var id=$(this).attr("id");

        Swal.fire({html:'<div class="mt-3 font-sans"><img src="/img/clipart2619611.png" style="width: 150px;"><div class="mt-4 pt-2 fs-15 mx-5"><h4 class="font-sans">مطمئن هستید ؟  </h4><p style="direction: rtl;" class="text-muted mx-4 mb-0">ایا از حذف فایل مطمئن هستید ؟</p>           <form class="d-inline-block" action="/manager/ticket/message/delete/'+id+'" method="post">@csrf<input name="_method" type="hidden" value="delete"><button type="submit" class="btn btn-danger waves-effect w-md waves-light m-b-5 mt-3" aria-label="">بله , حذف </button> <button type="button" class="btn btn-secondary waves-effect w-md m-b-5 mt-3" id="close-delete">لغو</button></form></div></div>',showCancelButton:!0,confirmButtonClass:"d-none",confirmButtonText:"Yes, Delete It!",cancelButtonClass:"d-none",buttonsStyling:!1,showCloseButton:!0})

        $("#close-delete").click(function(e){
          $(".swal2-close").trigger('click')
        })
      });
    </script>
  @endif
@endsection