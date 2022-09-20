@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.list_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    فاتورة الطالب
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row row-sm">
    <div class="col-md-12 col-xl-12">
        <div class=" main-content-body-student" id="print">
            <div class="card card-student">
                <div class="card-body">
                    <div class="table-responsive mg-t-40 w-75 mx-auto">
                        <table class="table table-bordered table-student border text-md-nowrap mb-0">
                            <thead>
                                <th colspan="4" class="text-center">|ايصال رقم {{ $student->id }} NO | مدرسة الراهبات
                                    الفرنسيسكانيات بمغاغة
                                </th>
                            </thead>
                            <tbody>

                                <tr>
                                    <div class="row">
                                        <td class="col-2">وصل من الطالب /</td>
                                        <td class="col-4">{{ $student->name }}</td>
                                        <td class="col-2">الرقم القومي</td>
                                        <td class="col-4">{{ $student->national_id }}</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="row">
                                        <td colspan="3" class="col-10 text-center">من قيمة المصروقات الدراسية عن الصف
                                        </td>
                                        <td colspan="1" class="col-2">{{ $student->classroom->Name_Class }}</td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="row">
                                        <td class="col-4">قيمة المصروفات</td>
                                        <td class="col-4">{{ $total_fees }}</td>

                                        <td class="col-4">للعام الدراسي</td>
                                        <td class="col-4">{{ $student->academic_year }}</td>
                                    </div>
                                </tr>


                                <tr>
                                    <div class="row">
                                        <td class="col-4">المبلغ المدفوع </td>
                                        <td class="col-4">{{ $previousPaidFees }}</td>
                                        <td class="col-4">نوع الرسوم</td>
                                        <td class="col-4">
                                            @foreach ($fee_title as $title)
                                            @if($loop->last)
                                            {{ $title }} <br>
                                            @endif
                                                
                                            @endforeach
                                        </td>
                                    </div>
                                </tr>

                                <tr>
                                    <div class="row">
                                        <td class="col-2">الباقي</td>
                                        <td class="col-4">{{ $remainingFees }}</td>
                                        <td class="col-2">تاريخ الدفع</td>
                                        <td class="col-4">{{ now()->format('Y-m-d') }}</td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        {{-- <hr class="mg-b-40"> --}}



        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                class="mdi mdi-printer ml-1"></i>طباعة</button>
    </div><!-- COL-END -->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<!--Internal  Chart.bundle js -->
<script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
<script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>

@endsection
