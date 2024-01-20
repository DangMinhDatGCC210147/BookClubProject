@extends('layout-leader')

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3 class="title">Table <span>/ Funds</span></h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <div class="row">
            <!--Export Data Table Start-->
            <div class="col-12 mb-30">
                <div class="box">
                    <div class="box-head justify-content-end">
                        <div class="row">
                            <div class="col-md-10">
                                <h3 class="title">Export Data Table</h3>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('total-funds.store') }}" method="post" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info" style="cursor: pointer; text-decoration: none; border: none;">
                                        Total In Month
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered data-table data-table-export">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>ID</th> --}}
                                    <th>Name</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>May</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Aug</th>
                                    <th>Sept</th>
                                    <th>Oct</th>
                                    <th>Nov</th>
                                    <th>Dec</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="student-table-body">
                                @foreach ($funds as $fund)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $fund->idSt }}</td> --}}
                                        <td>{{ $fund->member->name }}</td>
                                        @foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'] as $month)
                                            <td>
                                                <label class="adomx-checkbox primary custom-checkbox buttons-print-checkbox">
                                                    <input type="checkbox" data-student-id="{{ $fund->idSt }}"
                                                        data-month="{{ $month }}"
                                                        {{ $fund->$month == 1 ? 'checked' : '' }}>
                                                    <i class="icon"></i>
                                                </label>
                                            </td>
                                        @endforeach
                                        <td id="total_{{ $fund->idSt }}">{{ $fund->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>ID</th> --}}
                                    <th>Name</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>May</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Aug</th>
                                    <th>Sept</th>
                                    <th>Oct</th>
                                    <th>Nov</th>
                                    <th>Dec</th>
                                    <th>Total</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--Export Data Table End-->
        </div>

    </div><!-- Content Body End -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Lắng nghe sự kiện khi checkbox được chọn (tick)
        $('input[type="checkbox"]').on('change', function () {
            var checkbox = $(this);
            var studentId = checkbox.data('student-id');
            var month = checkbox.data('month');
            var isChecked = checkbox.prop('checked') ? 1 : 0;

            // Gửi yêu cầu AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route('update-fund') }}',
                data: {
                    student_id: studentId,
                    month: month,
                    isChecked: isChecked,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Xử lý phản hồi thành công nếu cần
                    console.log(response);
                    // console.log(isChecked);
                    // Cập nhật giá trị total trên giao diện
                    $('#total_' + studentId).text(response.total);
                },
                error: function (error) {
                    // Xử lý lỗi nếu cần
                    toastr.error('An error occurred. Please try again.');
                    console.error(error);
                }
            });
        });
    });
</script>
    
@endsection
