@extends("theme.manager")
@section("container")
  <style type="text/css">
    @media screen and (min-width: 451px){
      #id-or-hash-user-or-receipt-number-invoice{
        width: 335px
      }
    }
    @media screen and (max-width: 450px){
      #id-or-hash-user-or-receipt-number-invoice{
        width: 245px;
        font-size: 10px
      }
      .buttons{
        float: right;
        width: 100%;
        margin-bottom: 10px
      }
    }
  </style>

  <div class="card-box table-responsive">
    <div class="m-b-30">
      <h4 class="header-title d-inline-block">جستجوی صورتحساب های کاربر</h4>
    </div>

    <div class="text-center">
      <input type="text" placeholder="شناسه ، کد اختصاصی کاربر یا شماره فیش صورتحساب ..." id="id-or-hash-user-or-receipt-number-invoice" class="p-2">

      <div class="float-right w-100 mt-4">
        <a class="buttons d-inline-block bg-primary text-white p-3">صورتحساب ها</a>
        <a class="buttons bg-warning text-white p-3">صورتحساب نهایی</a>
        <a class="buttons bg-success text-white p-3">لیست پرداختی ها</a>
      </div>
    </div>
  </div>

  <script type="text/javascript" language="JavaScript">
    $('#id-or-hash-user-or-receipt-number-invoice').on('input change keyup keydown keypress', function(){
      var id_or_hash_user_or_receipt_number_invoice = $(this).val();
      if(id_or_hash_user_or_receipt_number_invoice == ''){
        $('.buttons').removeAttr('href')
        return;
      }

      $('.buttons').each(function(counter_number){
        var action = (counter_number == 0) ? 'invoices' : '';
        action = (counter_number == 1) ? 'final' : action;
        action = (counter_number == 2) ? 'payments' : action;

        $(this).attr('href', '/manager/invoice/user/single/' + action + '/' + id_or_hash_user_or_receipt_number_invoice)
      })
    })
  </script>
@endsection