@extends('layout-leader')

@section('content')

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Submit Paying</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head justify-content-end">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="title">Export Data Table</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <a href="{{ route('total-funds.create') }}" class="btn btn-info">
                                        Enter existing funds
                                    </a> --}}
                                    {{-- <span class="badge badge-primary" style="padding: 3%; font-size:15px">Current: {{$formattedCurrentFunds}}</span> --}}
                                    {{-- <input type="text" id="" class="form-control" value="" readonly placeholder=""> --}}
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>                
                <div class="box-body">                 
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Month</th>
                                <th>Checkout Time</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody id="student-table-body">
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->idSt }}</td>
                                    <td>{{ $payment->name }}</td>
                                    <th>{{ $payment->month }}</th>
                                    <th>{{ $payment->checkout_time }}</th>
                                    {{-- <th>
                                        <form class="product-form delete" action="{{ route('submit-paying.destroy', $payment->id) }}" method="POST" id="{{ $payment->id }}">
                                            @csrf
                                            @method('DELETE')                       
                                            <button type="submit" class="transparent-button delete-payment-btn" style="background: none; border: none; padding: 0; cursor: pointer; outline: none;">
                                                <i class="ti ti-trash text-danger"></i>
                                            </button>
                                        </form> 
                                    </th> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Month</th>
                                <th>Checkout Time</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!--Export Data Table End-->
    </div>

</div><!-- Content Body End -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Chọn tất cả các nút xóa và thêm sự kiện click
        var deleteButtons = document.querySelectorAll('.delete-payment-btn');
        
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                // Hiển thị cửa sổ xác nhận
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Nếu người dùng xác nhận, gửi form để xóa
                        var formId = button.closest('form').id;
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Add this script after including jQuery -->


@endsection