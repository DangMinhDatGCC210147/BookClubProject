@extends('layout-leader')

@section('content')

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Attendances</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head justify-content-end">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="title">Export Data Table</h3>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('attendances.create') }}" class="btn btn-info">
                                    Create
                            </a>
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
                                <th>Time</th>
                                <th>Date Check-in</th>
                                <th>Event Name</th>
                                <th>Event Score</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendance->idSt }}</td>
                                    <td>{{ $attendance->member->name }}</p></td>
                                    <td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('H:i:s') }}</td>
                                    <td>{{ $attendance->attendance_date->format('d-m-Y') }}</td>
                                    <td>{{ $attendance->event->nameEvent }}</td>
                                    <td>{{ $attendance->event->score}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            {{-- <a href="{{ route('attendances.edit', ['event' => $event->id]) }}" class="mr-2"><i class="ti ti-pencil text-info"></i></a> --}}
                                            <form id="deleteForm{{ $attendance->id }}" class="product-form delete" action="{{ route('attendances.destroy', $attendance->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')                       
                                                <button type="button" class="transparent-button delete-button" data-id="{{ $attendance->id }}" style="background: none; border: none; padding: 0; cursor: pointer; outline: none;">
                                                    <i class="ti ti-trash text-danger"></i>
                                                </button>                                                
                                            </form>                                            
                                        </div>                                                                                                                                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Student Id</th>
                                <th>Student Name</th>
                                <th>Time</th>
                                <th>Date Check-in</th>
                                <th>Event Name</th>
                                <th>Event Score</th>
                                <th>Action</th>
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
        // Lặp qua tất cả các nút xoá và thêm sự kiện onclick
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Lấy id từ thuộc tính data-id
                var attendanceId = button.getAttribute('data-id');

                // Hiển thị SweetAlert để xác nhận xoá
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // Nếu người dùng xác nhận xoá
                    if (result.isConfirmed) {
                        // Gửi form để xoá
                        document.getElementById('deleteForm' + attendanceId).submit();
                    }
                });
            });
        });
    });
</script>

@endsection