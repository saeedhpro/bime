@extends("theme.manager")
@section("container")
@php
$first_invoice = isset($invoices[0]) ? $invoices[0] : array(
  'name' => '',
  'name2' => '',
  'ID_User' => '',
  'hash' => ''
);
@endphp
  <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <div  class="card-box table-responsive mb-4">
    <div class="m-b-30">
      <h4 class="header-title d-inline-block">فهرست صورت حساب {{$first_invoice['name']}} {{$first_invoice['name2']}} - شناسه کاربری {{$first_invoice['ID_User']}} - کد {{$first_invoice['hash']}} - تاریخ گزارش {{verta()->format('j-n-Y')}}</h4>
    </div>

    <div>
      <table id="datatable-buttons" class="table demo table-striped table-bordered" cellspacing="0">
        <thead>
          <tr>
            <th>شناسه</th>
            <th>شماره سند</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ تعهد</th>
            <th>عنوان</th>
            <th>شرح</th>
            <th>مبلغ تعهد (تومان) </th>
            <th>اقدامات</th>
          </tr>
        </thead>

        <tbody>
          @foreach($invoices as $invoice)
            <tr>
              <td>{{$invoice['id']}}</td>
              <td>{{$invoice['number']}}</td>
              <td>{{$invoice['am_start']}}</td>
              <td>{{$invoice['am_end']}}</td>
              <td>{{$invoice['title']}}</td>
              <td>{{$invoice['text']}}</td>
              <td>{{number_format($invoice['price'])}}</td>
              <td>
                <a href="/manager/invoice/user/{{$invoice['id']}}/{{$first_invoice['ID_User']}}" data-toggle="tooltip" data-original-title="فرم های پرشده" class="btn btn-success"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection