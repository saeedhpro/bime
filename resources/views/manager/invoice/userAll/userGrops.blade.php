@extends("theme.manager")
@section("container")
  <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <div class="row">
    <div class="col-12">
      <div  class="card-box table-responsive">
        <div class="m-b-30">
          <h4 class="header-title d-inline-block">فهرست گروه های کاربری</h4>
        </div>

        <table id="datatable-buttons" class="table demo table-bordered" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 15px">شناسه</th>
              <th>نام گروه کاربری</th>
              <th>اقدامات</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>همه</td>
              <td>همه</td>
              <td><a href="/manager/invoice/user/all/0" data-toggle="tooltip" data-placement="top" data-original-title="نمایش صورتحساب ها" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
            </tr>

            @foreach($user_grops as $user_grop)
              <tr>
                <td>{{$user_grop['id']}}</td>
                <td>{{$user_grop['name']}}</td>
                <td><a href="/manager/invoice/user/all/{{$user_grop['id']}}" data-toggle="tooltip" data-placement="top" data-original-title="نمایش صورتحساب ها" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection