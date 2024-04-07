@php
  $role = session()->has('admin') ? 'admin' : 'manager';
  $check_access_27_manager = ($role == 'admin' || $role == 'manager' && \App\Http\Controllers\managerController::managerAccessLevel(27)) ? true : false
@endphp
@section('container')
  <style type="text/css">
    .checkbox{
      height: 20px;
      width: 20px;
      cursor: pointer;
      cursor: hand
    }

    .file-selected-for-field{ width: 140px } /* فایل انتخاب شده برای فیلد */
  </style>

  <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <script src="/assets/js/modernizr.min.js"></script>

  @foreach($user_forms as $user_form)
    <!--  Modal content for the above example -->
    <form action="/{{$role}}/form/user/edit" method="post" enctype="multipart/form-data" class="modal fade bs-example-modal-lg{{$user_form["id"]}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mt-0" id="myLargeModalLabel">نمایش اطلاعات پر شده</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            @foreach($form_fild as $fild)
                                @if($fild["type"]==1 or $fild["type"]==2 or $fild["type"]==3 || $fild["type"]==7)
                                  @php
                                    //بدست آوردن محتوای فیلد
                                    $value = '';
                                    foreach($user_form['form'] as $form_from_user):
                                      if($form_from_user['name_itme'] == $fild['name']):
                                        $value = $form_from_user[$fild['name']];
                                        break;
                                      endif;
                                    endforeach
                                  @endphp

                                  <div class="col-lg-6 mt-3 position-relative">
                                    <label for="inputEmail31">{{$fild["title"]}}</label>
                                    <input @if($fild["type"]==1) type="text"
                                           @elseif($fild["type"]==2) type="email"
                                           @elseif($fild["type"]==3) type="number"
                                           @elseif($fild['type']==7) type="file"
                                           @endif

                                           name="{{$fild['name']}}"
                                           class="form-control"
                                           @if($fild['type'] != 7 && $value) value="{{$value}}" @endif
                                           @if($fild['type'] == 7) accept="{{implode(',', $formats_allowed_file)}}" @endif />

                                    @if($fild['type'] == 7 && $value)
                                      <a href="/{{$directory_files_user}}{{$user_form['id_user']}}/form/{{$user_form['id_form']}}/{{$value}}" target="_blank" class="float-right mt-2">
                                        @if(!empty(getimagesize(url('/') . "/$directory_files_user" . $user_form['id_user'] . '/Form/' . $user_form['id_form'] . "/$value"))) <img src="/{{$directory_files_user}}{{$user_form['id_user']}}/Form/{{$user_form['id_form']}}/{{$value}}" class="file-selected-for-field" /> @else{{'باز کردن فایل فعلی'}}@endif
                                      </a>
                                    @endif
                                  </div>
                                @elseif($fild["type"]==5)
                                  <div class="col-lg-6 mt-3 position-relative height-77px">
                                    <div class="checkbox checkbox_input w-100">
                                      <input type="checkbox" name="{{$fild['name']}}" @foreach($user_form["form"] as $form) @if(array_key_exists($fild['name'], $form)) checked="checked" @endif @endforeach  id="checkbox{{$fild["name"]}}" />
                                      <label for="checkbox{{$fild["name"]}}">{{$fild["title"]}}</label>
                                    </div>
                                  </div>
                                @elseif($fild["type"]==4)
                                    <div class="col-lg-6 mt-3 position-relative " >
                                        <label for="inputEmail3">{{$fild["title"]}}</label>
                                        <select name="{{$fild['name']}}" id="inputEmail34"  class="form-control select2">
                                            <option disabled="disabled" selected="selected" value="0">انتخاب کنید</option>
                                            @foreach($fild["itme"] as $itme)
                                                <option @foreach($user_form["form"] as $form) @if($form["name_itme"]==$fild["name"]) @if($form[$fild["name"]]==$itme["title"]) selected="selected" @endif @endif @endforeach value="{{$itme["title"]}}">{{$itme["title"]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif($fild["type"]==6)
                                    <div class="col-lg-6 mt-3 position-relative ">
                                        <label class="d-block" for="inputEmail3">{{$fild["title"]}}</label>
                                        @foreach($fild["itme"] as $number=>$itme)
                                            <div class="checkbox d-inline">
                                                <div class="radio radio-info form-check-inline">
                                                    <input type="radio" name="{{$fild['name']}}" value="{{$itme['title']}}" id="inlineRadio_{{$fild["name"]}}_{{$number}}" @foreach($user_form["form"] as $form) @if(array_key_exists($fild['name'], $form)) @if($form[$fild["name"]]==$itme["title"]) checked @endif @endif @endforeach />
                                                    <label for="inlineRadio_{{$fild["name"]}}_{{$number}}"> {{$itme["title"]}} </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                            <button type="submit" class="btn btn-success w-100 mt-5 py-3">ویرایش</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </form><!-- /.modal -->
  @endforeach

  <div class="row">
    <div class="col-12 mb-3">
      <form method="get" action="/{{$role}}/form/user/delete/group/1" class="card-box table-responsive">
        <div class="float-right w-100 m-t-0 m-b-30">
          <h4 class="header-title d-inline-block ">فهرست فرم های تکمیل شده {{$name_form}}</h4>
          @if($check_access_27_manager)
            <a href="/{{$role}}/form/user/add/xlsx/{{$id_form}}" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5 float-right">افزودن اطلاعات با اکسل</a>
          @endif
        </div>

        <button type="button" id="select-all" class="btn btn-success mb-4">انتخاب همه</button>

        <div style="overflow: auto; width: 100%" id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 pb-3 m-0 no-footer">
          {{--<button type="button" id="basic"--}}
          {{--class="btn btn-secondary btn-trans waves-effect "><i class="fa fa-print"></i></button>--}}
          <table id="datatable-buttons" class="table demo datatable-buttons table-striped table-bordered p-0 m-0 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;direction: rtl;overflow: auto;" width="100%" cellspacing="0">
              <thead>
              <tr role="row">
                <th>انتخاب</th>
                <th class="sorting_asc"  style="width: 15px;text-align: right !important;" >شناسه</th>
                <th class="sorting"  style="text-align: right !important;" >شناسه کاربر</th>
                <th class="sorting"  style="text-align: right !important;" >کد اختصاصی</th>
                <th class="sorting"  style="text-align: right !important;" >نام نام خانوادگی کاربر</th>
                <th class="sorting"  style="text-align: right !important;" >شماره موبایل کاربر</th>
                <th class="sorting"  style="text-align: right !important;" >کدملی کاربر</th>
                @foreach($form_fild as $fild)
                  <th class="sorting_asc"  style="width: 15px;text-align: right !important;" >{{$fild["title"]}}</th>
                @endforeach
                <th class="sorting"  style="text-align: right !important;" aria-label="Salary: activate to sort column ascending">اقدامات</th></tr>
              </thead>

            <tbody>
              @foreach($user_forms as $user_form)
                <tr role="row" class="odd">
                  <td class="text-center"><input type="checkbox" name="ids[{{$user_form['id']}}]" class="checkbox" /></td>
                  <td style="text-align: right !important" class="sorting_1">{{$user_form["id"]}}</td>
                  <td style="text-align: right !important">{{$user_form['ID_User']}}</td>
                  <td style="text-align: right !important">{{$user_form['hash']}}</td>
                  <td style="text-align: right !important">{{$user_form['name']}} {{$user_form['name2']}}</td>
                  <td style="text-align: right !important">{{$user_form['mobile']}}</td>
                  <td style="text-align: right !important">{{$user_form['kod']}}</td>
                  @foreach($form_fild as $fild)
                    <td style="text-align: right !important">
                      @foreach($user_form["form"] as $form) @if($form["name_itme"]==$fild["name"]) {{$form[$fild["name"]]}} @endif @endforeach
                    </td>
                  @endforeach
                  <td style="display: none;" class="d-block-s">
                    <button type="button" class="show-fields-filled-user btn btn-primary waves-effect waves-light" id="{{$user_form['id']}}" data-toggle="modal" data-target=".bs-example-modal-lg{{$user_form["id"]}}" ><i class="fa fa-eye"></i></button>

                    @if($check_access_27_manager)
                      <button type="button" class="btn btn-danger btn-delete" id="{{$user_form["id"]}}" name="{{$user_form['name']}}" data-toggle="tooltip" data-placement="top" data-original-title="حذف" ><i class="fa fa-times"></i></button>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        @if($check_access_27_manager)
          <button type="submit" name="group-deletion" class="btn btn-danger mt-4">حذف گروهی</button>
        @endif
      </form>
    </div>
  </div>

  <script>
    /* START ثبت آیدی فرم پر شده توسط کاربر در مدال */
    $('.show-fields-filled-user').click(function(){
      var selector = $(this)
      $('#id-user-form').remove()
      $(selector.data('target') + ' .modal-content').append('<input type="hidden" name="id-user-form" value="' + selector.attr('id') + '" id="id-user-form" class="d-none" />')
    })
    /* END ثبت آیدی فرم پر شده توسط کاربر در مدال */


    /* START چک باکس انتخاب همه */
    var button_select_all = jQuery('#select-all')
    button_select_all.click(function(){
      var status = (button_select_all.text() == 'انتخاب همه') ? true : false
      jQuery('#datatable-buttons [type="checkbox"]').prop('checked', status ? true : false)

      if(status){ button_select_all.text('برداشتن انتخاب ها')
      }else{ button_select_all.text('انتخاب همه') }
    })

    jQuery(document).on('input change keyup keydown keypress', '[type="search"]', function(){ button_select_all.text('انتخاب همه') })
    jQuery(document).on('click', '.paginate_button', function(){ button_select_all.text('انتخاب همه') }) //بعد تغییر صفحه
    /* END چک باکس انتخاب همه */


    $('.btn-delete').click(function(){
      var id=$(this).attr('id'),
          email=$(this).attr('name')

      Swal.fire({html:'<div class="mt-3 font-sans"><img src="/img/clipart2619611.png" style="width: 150px;"><div class="mt-4 pt-2 fs-15 mx-5"><h4 class="font-sans">مطمئن هستید ؟  </h4><p style="direction: rtl;" class="text-muted mx-4 mb-0">ایا از حذف فرم پر شده   '+email+' مطمئن هستید ؟</p>           <form class="d-inline-block" action="/{{$role}}/form/user/delete/'+id+'" method="post">@csrf<input name="_method" type="hidden" value="delete"><button type="submit" class="btn btn-danger waves-effect w-md waves-light m-b-5 mt-3" aria-label="">بله , حذف </button> <button type="button" class="btn btn-secondary waves-effect w-md m-b-5 mt-3" id="close-delete">لغو</button></form></div></div>',showCancelButton:!0,confirmButtonClass:"d-none",confirmButtonText:"Yes, Delete It!",cancelButtonClass:"d-none",buttonsStyling:!1,showCloseButton:!0})

      $('#close-delete').click(function(){ $('.swal2-close').trigger('click') })
    });
  </script>
@endsection