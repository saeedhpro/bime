@extends("theme.manager")
@section("container")
  <link href="/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/css/kamadatepicker.min.css" rel="stylesheet"/>
  <script src="/ckeditor/ckeditor.js" type="text/javascript"></script>

  <style type="text/css">
    .select2-container .select2-selection--multiple .select2-selection__choice{
      background-color: #71b6f9;
      -webkit-border: 1px solid transparent;
      -moz-border: 1px solid transparent;
      -ms-border: 1px solid transparent;
      -ms-ie-border: 1px solid transparent;
      -o-border: 1px solid transparent;
      -khtml-border: 1px solid transparent;
      border: 1px solid transparent;
      color: #ffffff;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      -ms-border-radius: 3px;
      -ms-ie-border-radius: 3px;
      -o-border-radius: 3px;
      -khtml-border-radius: 3px;
      border-radius: 3px;
      padding: 0 7px
    }
  </style>

  <div class="container">
      <div class="row">
          <div class="col-12 mb-3">
              <div class="card-box ">
                  <div class="m-t-0 m-b-30">

                      <h4 class="header-title d-inline-block ">ویرایش منو {{$menu["name"]}}</h4>
                      <a href="/manager/menu"
                         class="btn btn-pink btn-trans waves-effect w-md waves-pink m-b-5 float-right">بازگشت</a>
                  </div>


                  <form class="form-horizontal form" method="post" action="/manager/menu/edit/{{$menu["id"]}}" role="form" enctype="multipart/form-data" data-parsley-validate novalidate>
  @csrf                     @foreach($errors->all() as $ereor)
                          <div class="alert col-12 mb-3 alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{$ereor}}</div>
                      @endforeach
                  <div class="row">

                      <div class="col-12">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">انتخاب گروه کاربری مجموعه </label>
                          <div class="col-sm-8">
                            <select name="gropUser[]" class="form-control select2 select2-multiple select2-hidden-accessible" multiple="multiple" data-placeholder="انتخاب گروه کاربری مجموعه" tabindex="-1" aria-hidden="true" required>
                              @foreach($user_grops as $info_user_grop)
                                <option value="{{$info_user_grop['id']}}"@if(in_array($info_user_grop['id'], $user_grops_selected)) selected="selected" @endif>{{$info_user_grop['name']}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                          <div class="form-group row">
                          <label for="inputEmail31" class="col-sm-3 col-form-label">نام منو</label>
                          <div class="col-sm-8">
                              <input parsley-trigger="change" value="{{$menu["name"]}}" required name="name" type="text" class="form-control"
                                     id="inputEmail31" placeholder="نام منو را وارد کنید">
                          </div>
                      </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">انتخاب فرم </label>
                              <div class="col-sm-8">
                                  <select name="form" class="form-control select2">
                                      <option selected="" disabled="">انتخاب فرم</option>
                                      @foreach($forms as $form)
                                          @if($form["id"]==$menu["id_form"])
                                              <option selected value="{{$form["id"]}}">{{$form["name"]}}</option>
                                          @else
                                              <option value="{{$form["id"]}}">{{$form["name"]}}</option>
                                          @endif
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-12 mb-3 text-right">
                              <textarea  id="editor2" name="text">{{$menu["text"]}}</textarea>
                          </div>











                      </div>
                      <div class="col-12">
                          <div class="form-group">
                              <div class="offset-sm-4 text-right col-sm-12">
                                  <button type="submit" class="btn btn-primary btn-trans waves-effect waves-primary w-md m-b-5">
                                     ویرایش
                                  </button>
                              </div>
                          </div>
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
      $('.dropify').dropify({
          messages: {
              'default': 'Drag and drop a file here or click',
              'replace': 'Drag and drop or click to replace',
              'remove': 'Remove',
              'error': 'Ooops, something wrong appended.'
          },
          error: {
              'fileSize': 'The file size is too big (1M max).'
          }
      });
      var customOptions = {
          placeholder: "روز / ماه / سال"
          , twodigit: true
          , closeAfterSelect: true
          , nextButtonIcon: "fa fa-arrow-circle-right"
          , previousButtonIcon: "fa fa-arrow-circle-left"
          , buttonsColor: "blue"
          , forceFarsiDigits: true
          , markToday: true
          , markHolidays: true
          , highlightSelectedDay: true
          , sync: true
          , gotoToday: true
      }
      CKEDITOR.replace( 'editor2', {
          format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;div'
      });

      // function register() {
      //     var error = 0;
      //
      //     var username = $("input[name='grop']").val();
      //     var email = $("input[name='email']").val();
      //     var token = $("input[name='_token']").val();
      //
      //         $.ajax('/manager/addUser/check',
      //             {
      //                 type: 'post',
      //                 async: false
      //                 , data: {_token: token,username: username}
      //                 , success: function (data1) {
      //                     if (data1 == 0) {
      //                         error = error + 1;
      //                         $("input[name='username']").addClass('red rtl').attr("placeholder", "این نام کاربری قبلا ثبت شده است").val('');
      //                     } else {
      //                     }
      //                 }
      //             })
      //
      //     $.ajax('/manager/addUser/checkEmail',
      //             {
      //                 type: 'post',
      //                 async: false
      //                 , data: {_token: token,email: email}
      //                 , success: function (data1) {
      //                     if (data1 == 0) {
      //                         error = error + 1;
      //                         $("input[name='email']").addClass('red rtl').attr("placeholder", "این ایمیل قبلا ثبت شده است").val('');
      //                     } else {
      //                     }
      //                 }
      //             })
      //
      //
      //     if (error > 0) {
      //         return false;
      //     }
      // }
  </script>
@endsection