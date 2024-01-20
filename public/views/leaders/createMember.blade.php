@extends('layout-leader')

@section('content')
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ {{isset($member) ? "Update Member" : "Create member"}}</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!--Form With Advance Form Elements Start-->
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Manage Member Accounts</h4>
                    <hr>
                    <a href="{{ route('members.index') }}">
                        <i class="ti ti-arrow-left"></i> Back to Members
                    </a>  
                </div>
                <div class="box-body">
                    <form action="{{ isset($member) ? route('members.update', $member->id) : route('members.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($member))
                            @method('PUT')
                        @endif
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <label for="formLayoutUsername4">Fullname</label>
                                <input type="text" id="name" name="name" value="{{ isset($member) ? $member->name : "" }}" class="form-control" placeholder="Full name">
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutUsername4">Student ID </label>
                                        <select id="idSt" name="idSt" class="form-control">
                                            <option value="" disabled selected>Please select the Student Id first</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->idSt }}" data-fullname="{{ $user->name }}" data-email="{{ $user->email }}" {{ (isset($member) && $member->idSt == $user->idSt) ? 'selected' : '' }}>
                                                    {{ $user->idSt }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <p id="idStErrorMessage" style="color: red; margin-top: 5px;"></p>
                                    </div>                               
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Joining Date</label>
                                        <input type="date" id="joiningDate" name="joiningDate" value="{{ isset($member) ? $member->joiningDate->format('Y-m-d'): "" }}" class="form-control" placeholder="Birthday">
                                    </div>  
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutEmail4">Email Address</label>
                                        <input type="email" id="email" name="email" value="{{ isset($member) ? $member->email : "" }}" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Date of Birth</label>
                                        <input type="date" id="dateOfBirth" name="dateOfBirth" value="{{ isset($member) ? $member->dateOfBirth->format('Y-m-d'): "" }}" class="form-control" placeholder="Birthday">
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutPhone4">Phone</label>
                                        <input type="text" id="phoneNumber" name="phoneNumber" value="{{ isset($member) ? $member->phoneNumber : "" }}" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Course</label>
                                        {{-- <input type="text" id="course" name="course" value="{{ isset($member) ? $member->course : "" }}" class="form-control" placeholder="Course"> --}}
                                        <select id="course" name="course" class="form-control">
                                            <option value="" disabled selected>Please select the course</option>
                                            <option value="K8" {{ (isset($member) && $member->course == 'K8') ? 'selected' : '' }}>
                                                K8
                                            </option>
                                            <option value="K9" {{ (isset($member) && $member->course == 'K9') ? 'selected' : '' }}>
                                                K9
                                            </option>
                                            <option value="K10" {{ (isset($member) && $member->course == 'K10') ? 'selected' : '' }}>
                                                K10
                                            </option>
                                            <option value="K11" {{ (isset($member) && $member->course == 'K11') ? 'selected' : '' }}>
                                                K11
                                            </option>
                                            <option value="K12" {{ (isset($member) && $member->course == 'K12') ? 'selected' : '' }}>
                                                K12
                                            </option>
                                            <option value="K13" {{ (isset($member) && $member->course == 'K13') ? 'selected' : '' }}>
                                                K13
                                            </option>
                                            <option value="K14" {{ (isset($member) && $member->course == 'K14') ? 'selected' : '' }}>
                                                K14
                                            </option>
                                        </select>
                                    </div>  
                                </div> 
                            </div>
                            <div class="col-12 mb-20">
                                <div class="form-group">
                                    <label class="inline">
                                        <input type="radio" name="gender" value="0" id="gender" {{ isset($member) && $member->gender == 0 ? 'checked' : '' }}>Male
                                    </label>
                                    <label class="inline">
                                        <input type="radio" name="gender" value="1" id="gender" {{ isset($member) && $member->gender == 1 ? 'checked' : '' }}>Female
                                    </label>             
                                </div>
                            </div>                                                      
                            <div class="col-12 mb-20">
                                <label for="formLayoutFile2">Upload a File</label>
                                    <input type="file" id="image" name="image" class="dropify">
                                @if(isset($member) && $member->image)
                                    <p>Current Image*: There already has an image of {{ $member->name }}</p>
                                @endif
                            </div>                            

                            <div class="col-12 mb-20">
                                <input type="submit" value="{{ isset($member) ? 'Update' : 'Submit' }}" class="button button-primary">
                                @if(isset($member))
                                    <hr>
                                    <a href="{{ route('members.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Members
                                    </a>                                
                                @else
                                    <input type="reset" value="cancel" class="button button-danger">
                                    <hr>
                                    <a href="{{ route('members.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Members
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
        var idStSelect = document.getElementById('idSt');
        var fullnameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');

        idStSelect.addEventListener('change', function () {
            // Lấy giá trị tên đầy đủ từ thuộc tính data-fullname của option được chọn
            var selectedOption = idStSelect.options[idStSelect.selectedIndex];
            var fullname = selectedOption.getAttribute('data-fullname');

            // Lấy giá trị địa chỉ email từ thuộc tính data-email của option được chọn
            var email = selectedOption.getAttribute('data-email');

            // Cập nhật giá trị của trường fullname và email
            fullnameInput.value = fullname;
            emailInput.value = email;
        });
    });

    document.getElementById('idSt').addEventListener('change', function () {
        var selectedIdSt = this.value;

        // Make an AJAX request to check if the selected idSt already exists
        // Replace 'check-idSt-exists' with the actual route or endpoint for checking idSt existence
        fetch('/check-idSt-exists/' + selectedIdSt)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    document.getElementById('idStErrorMessage').innerText = 'Student ID already is a member .';
                } else {
                    document.getElementById('idStErrorMessage').innerText = '';
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>

@endsection