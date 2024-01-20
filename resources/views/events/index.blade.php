@extends('layout-leader')

@section('content')

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">Table <span>/ Members</span></h3>
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
                            <a href="{{ route('events.create') }}" class="btn btn-info">
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
                                <th>Image</th>
                                <th>Event Name</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" width="100">
                                    </td>
                                    <td>{{ $event->nameEvent }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->time_end)->format('H:i') }}</td>
                                    <td>{{ $event->date->format('d-m-Y') }}</td>
                                    <td>{{ $event->venue }}</td>
                                    <td>    
                                        @if($event->status == 0)
                                            Hide
                                        @elseif($event->status == 1)
                                            Presently
                                        @else
                                            Unknown Status
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('events.edit', ['event' => $event->id]) }}" class="pr-5"><i class="ti ti-pencil text-info"></i></a>
                                        
                                            <form id="deleteForm{{ $event->id }}" class="product-form delete" action="{{ url('events/' . $event->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')                       
                                                <button type="submit" class="transparent-button delete-button pr-5 delete-event-btn" data-id="{{ $event->id }}" style="background: none; border: none; padding: 0; cursor: pointer; outline: none;">
                                                    <i class="ti ti-trash text-danger"></i>
                                                </button>
                                            </form>
                                            
                                            <a href="{{ route('events.show', ['event' => $event->id]) }}" class="ml-2"><i class="ti-notepad text-primary"></i></a>
                                        </div>                                                                                                                                                                                                                                   
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Event Name</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Status</th>
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
        // Chọn tất cả các nút xóa và thêm sự kiện click
        var deleteButtons = document.querySelectorAll('.delete-event-btn');
        
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
@endsection