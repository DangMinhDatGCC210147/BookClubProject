@extends('layout-leader')

@section('content')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ Update List Register</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!--Form With Advance Form Elements Start-->
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Manage List Register</h4>
                    <hr>
                    <a href="{{ route('events.list') }}">
                        <i class="ti ti-arrow-left"></i> Back to List Register
                    </a>  
                </div>
                <div class="box-body">
                    <form action="{{ route('update.list.register', $registration->member_event_id) }}" method="post">
                        @csrf
                        @if (isset($event))
                            @method('PUT')
                        @endif
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutUsername4">Student Name</label>
                                        <input type="text" id="student_name" name="student_name" value="{{ isset($registration) ? $registration->name : "" }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutUsername4">Student Id</label>
                                        <input type="text" id="student_id" name="student_id" value="{{ isset($registration) ? $registration->student_id : "" }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-3 mb-20">
                                        <label for="formLayoutUsername4">Event</label>
                                        <input type="text" id="event_name" name="event_name" value="{{ isset($registration) ? $registration->nameEvent : "" }}" class="form-control" readonly >
                                    </div>
                                    <div class="col-lg-3 mb-20">
                                        <label for="formLayoutUsername4">Time</label>
                                        <input type="text" id="registration_time" name="registration_time" value="{{ isset($registration) ? \Carbon\Carbon::parse($registration->time_start)->format('H:i') . ' - ' . \Carbon\Carbon::parse($registration->time_end)->format('H:i') : "" }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-3 mb-20">
                                        <label for="formLayoutDateofBirth4">Date</label>
                                        <input type="date" id="registration_date" name="registration_date" value="{{ isset($registration) ? $registration->date : "" }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-lg-3 mb-20">
                                        <label for="formLayoutDateofBirth4">Status</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="1" {{ $registration->status === 1 ? 'selected' : '' }}>Attending</option>
                                            <option value="0" {{ $registration->status === 0 ? 'selected' : '' }}>Absence</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                                                                                                         
                            <div class="col-12 mb-20">
                                <input type="submit" value="Update" class="button button-primary">
                                <hr>
                                <a href="{{ route('events.list') }}">
                                    <i class="ti ti-arrow-left"></i> Back to List Register
                                </a>                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Form With Advance Form Elements End-->
    </div>
</div><!-- Content Body End -->
@endsection