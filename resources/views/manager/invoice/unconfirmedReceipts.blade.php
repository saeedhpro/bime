@extends("theme.manager")
@section("container")
  <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <div  class="card-box table-responsive mb-4">
    <div class="m-b-30">
      <h4 class="header-title d-inline-block">فهرست فیش های ثبت شده توسط کاربر</h4>
    </div>

    <div>
      <table id="datatable-buttons" class="table demo table-striped table-bordered" cellspacing="0">
        <thead>
          <tr>
            <th>شماره</th>
            <th>مبلغ (تومان)</th>
            <th>شرح</th>
            <th>تاریخ</th>
            <th>تصویر</th>
            <th>شناسه صورتحساب</th>
            <th>شناسه کاربر</th>
            <th>کد کاربر</th>
            <th>نام و نام خانوادگی کاربر</th>
            <th>اقدامات</th>
          </tr>
        </thead>

        <tbody>
          @foreach($invoice_pays as $invoice_pay)
            <tr>
              <td>{{$invoice_pay['id']}}</td>
              <td>{{$invoice_pay['price']}}</td>
              <td>@if(strstr($invoice_pay['text'], 'کاربر > '))<span class="d-inline-block bg-info text-white px-3 py-1 rounded-pill mb-1 ml-2">کاربر</span>{{str_replace('کاربر > ', '', $invoice_pay['text'])}}@else{{$invoice_pay['text']}}@endif</td>
              <td>{{$invoice_pay['am']}}</td>
              <td>@if($invoice_pay['picture'] != '')
                <a href="{{directory_files_user}}{{$invoice_pay['picture']}}" target="_blank">باز کردن</a>
              @endif</td>
              <td>{{$invoice_pay['id_invoice']}}</td>
              <td>{{$invoice_pay['id_user']}}</td>
              <td>{{$invoice_pay['hash']}}</td>
              <td>{{$invoice_pay['name']}} {{$invoice_pay['name2']}}</td>
              <td style="white-space: nowrap">
                <a href="/manager/invoice/pay/active/{{$invoice_pay['id']}}" data-toggle="tooltip" data-original-title="تایید" class="btn btn-success">
                  <i class="fa fa-check"></i>
                </a>

                <a href="/manager/invoice/user/{{$invoice_pay['id_invoice']}}/{{$invoice_pay['id_user']}}" data-toggle="tooltip" data-original-title="فهرست پرداخت" class="btn btn-success"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection