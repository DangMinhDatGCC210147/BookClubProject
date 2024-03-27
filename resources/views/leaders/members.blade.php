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
                            <a href="{{ route('members.create') }}" class="btn btn-info">
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
                                <th>Full Name</th>
                                <th>Image</th>
                                <th>Gender</th>
                                <th>Student ID</th>
                                <th>Date of Birth</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            @php
                                    switch ($member->gender) {
                                        case 0:
                                            $genderShow = "Male";
                                            break;
                                        case 1:
                                            $genderShow = "Female";
                                            break;
                                        default:
                                            $role = "Unknown";
                                    }
                            @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>
                                        <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" width="100">
                                    </td>
                                    <td>{{ $genderShow }}</td>
                                    <td>{{ $member->idSt }}</td>
                                    <td>{{ $member->dateOfBirth->format('d-m-Y') }}</td>
                                    <td>{{ $member->course }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->phoneNumber }}</td>
                                    <td>{{ $member->joiningDate ? $member->joiningDate->format('d-m-Y') : '' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('members.edit', ['member' => $member->id]) }}" class="mr-2"><i class="ti ti-pencil text-info"></i></a>
                                            <form class="product-form delete" action="{{ route('members.destroy', $member->id) }}" method="POST" id="deleteMemberForm{{ $member->id }}">
                                                @csrf
                                                @method('DELETE')                       
                                                <button type="submit" class="transparent-button delete-member-btn" style="background: none; border: none; padding: 0; cursor: pointer; outline: none;">
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
                                <th>Full Name</th>
                                <th>Image</th>
                                <th>Gender</th>
                                <th>Student ID</th>
                                <th>Date of Birth</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Joining Date</th>
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
        var deleteButtons = document.querySelectorAll('.delete-member-btn');
        
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