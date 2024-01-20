@extends('layout-leader')

@section('content')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ Check Attendances</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!--Form With Advance Form Elements Start-->
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Check Attendances</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <a href="{{ route('attendances.index') }}">
                                <i class="ti ti-arrow-left"></i> Back to List Attendances
                            </a>
                        </div>
                        <div class="col-md-6 pb-1">
                            <select id="idEventSelect" name="idEvent" class="form-control">
                                <option value="" disabled selected>Select Event Name</option>
                                @foreach($events as $event)
                                    <option value="{{ $event->id }}">
                                        {{ $event->nameEvent }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>                                   
                </div>
                <div class="box-body">
                    <form id="attendanceForm" action="{{ route('attendances.store') }}" method="post">
                        @csrf
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername4">Student ID</label>
                                        <input type="text" id="idSt" name="idSt" class="form-control" placeholder="Please enter the Student Id first">
                                    </div>  
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername4">Fullname</label>
                                        <input type="text" id="name" name="name" value="{{ isset($member) ? $member->name : "" }}" class="form-control" placeholder="Full name" readonly>
                                    </div>                                                                    
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutEmail4">Email Address</label>
                                        <input type="email" id="email" name="email" value="{{ isset($member) ? $member->email : "" }}" class="form-control" placeholder="Email" readonly>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Course</label>
                                        <input type="text" id="course" name="course" value="{{ isset($member) ? $member->course : "" }}" class="form-control" placeholder="Course" readonly>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutPhone4">Phone</label>
                                        <input type="text" id="phoneNumber" name="phoneNumber" value="{{ isset($member) ? $member->phoneNumber : "" }}" class="form-control" placeholder="Phone Number" readonly>
                                    </div>
                                    <input type="text" id="idEventInput" name="idEvent" value="{{ isset($member) ? $member->idEvent : "" }}" class="form-control" placeholder="Event ID" style="{{ isset($member) && $member->idEvent ? '' : 'display: none;' }}" readonly>
                                </div> 
                            </div>                                                   
                            <div class="col-12 mb-20">
                                <input type="submit" value="Submit" class="button button-primary">
                                @if(isset($member))
                                    <hr>
                                    <a href="{{ route('attendances.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to List Attendances
                                    </a>                                 
                                @else
                                    <input type="reset" value="cancel" class="button button-danger">
                                    <hr>
                                    <a href="{{ route('attendances.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to List Attendances
                                    </a>                                 
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Form With Advance Form Elements End-->
    </div>
</div><!-- Content Body End -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var inputIdSt = document.getElementById('idSt');
        var form = document.querySelector('form');
        var selectEvent = document.querySelector('#idEventSelect');
        var initialEventName = document.querySelector('#idEventSelect option:checked').text;

            // Retrieve and set the stored event name
        var storedEventName = localStorage.getItem('selectedEventName');
        if (storedEventName) {
            selectEvent.innerHTML = ''; // Clear existing options

            var option = document.createElement('option');
            option.value = storedEventName;
            option.text = storedEventName;
            option.selected = true;
            selectEvent.add(option);
        }

        inputIdSt.addEventListener('input', function () {
            var enteredIdSt = inputIdSt.value;

            // Gửi yêu cầu AJAX đến server để lấy thông tin thành viên
            fetch('/api/members/' + enteredIdSt)
                .then(response => response.json())
                .then(user => {
                    // Nếu tìm thấy, điền thông tin vào các ô input khác
                    document.getElementById('name').value = user.name;
                    document.getElementById('email').value = user.email;
                    document.getElementById('phoneNumber').value = user.phoneNumber;
                    document.getElementById('course').value = user.course;
                })
                .catch(error => {
                    // Nếu không tìm thấy hoặc có lỗi, đặt giá trị các ô input khác về rỗng
                    document.getElementById('name').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('phoneNumber').value = '';
                    document.getElementById('course').value = '';
                });
            // Store the selected event name in localStorage
            localStorage.setItem('selectedEventName', selectedEventName);
        });

        form.addEventListener('submit', function (event) {
            // Lấy giá trị "Event Name" hiện tại trước khi form được submit
            var selectedEventName = document.querySelector('#idEvent option:checked').text;

            // Sau khi xử lý, giữ nguyên giá trị của "Event Name"
            selectEvent.innerHTML = ''; // Xóa tất cả các option hiện có

            // Thêm lại option đã chọn
            var option = document.createElement('option');
            option.value = selectEvent.value; // Lấy giá trị của selectEvent
            option.text = selectedEventName;
            option.selected = true;
            selectEvent.add(option);

            // Clear the stored event name after submitting the form
            localStorage.removeItem('selectedEventName');
        });

        // Additional code for handling select change and hidden input
        var selectEventInput = document.getElementById('idEventInput');

        selectEvent.addEventListener('change', function () {
            selectEventInput.value = selectEvent.value;
            console.log(selectEventInput.value);
            // Toggle visibility based on selection
            if (selectEvent.value !== '') {
                selectEventInput.style.display = 'none';
            } else {
                selectEventInput.style.display = 'none';
            }
        });

        var inputIdSt = document.getElementById('idSt');
        var form = document.querySelector('form');
        var selectEvent = document.querySelector('#idEventSelect');
        var initialEventName = document.querySelector('#idEventSelect option:checked').text;

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn chặn việc submit form mặc định

            var enteredIdSt = inputIdSt.value;

            fetch('/api/members/' + enteredIdSt, {
                method: 'POST',
                body: new FormData(form),
            })
            .then(response => response.text()) // Chuyển đổi response sang text
            .then(data => JSON.parse(data)) // Parse JSON từ text
            .then(data => {
                // Thông báo SweetAlert khi thành công
                Swal.fire({
                    title: 'Success!',
                    text: 'Attendance added successfully.',
                    icon: 'success',
                }).then((result) => {
                    // Chuyển hướng hoặc thực hiện các bước tiếp theo sau khi nhấn OK
                    if (result.isConfirmed) {
                        window.location.href = indexRoute;
                    }
                });
            })
            .catch(error => {
                // Thông báo SweetAlert khi có lỗi
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while adding attendance.',
                    icon: 'error',
                });
                console.error('Error:', error);
            });
        });
    });
</script>


@endsection