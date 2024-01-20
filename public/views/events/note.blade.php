@extends('layout-leader')

@section('content')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ Comment for Event</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!--Form With Advance Form Elements Start-->
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Manage Events</h4>
                    <hr>
                    <a href="{{ route('events.index') }}">
                        <i class="ti ti-arrow-left"></i> Back to Events
                    </a>  
                </div>
                <div class="box-body">
                    <form method="POST" action="{{ route('events.updateComments', ['event' => $event->id]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername4">Event Name</label>
                                        <input type="text" id="nameEvent" name="nameEvent" value="{{ isset($event) ? $event->nameEvent : "" }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-3 mb-20">
                                        <label for="formLayoutUsername4">Time Start</label>
                                        <input type="time" id="time_start" name="time_start" value="{{ isset($event) ? \Carbon\Carbon::parse($event->time_start)->format('H:i') : "" }}" class="form-control" readonly>
                                    </div>
                                    <div class="col-3 mb-20">
                                        <label for="formLayoutUsername4">Time End</label>
                                        <input type="time" id="time_end" name="time_end" value="{{ isset($event) ? \Carbon\Carbon::parse($event->time_end)->format('H:i') : "" }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-12 mb-20">
                                        <label for="formLayoutDateofBirth4">Comment for Event</label>
                                        <textarea cols="40" id="comments" name="comments"  class="form-control" value="{{ isset($event) ? $event->comments : "" }}" placeholder="Comment">{{ isset($event) ? $event->comments : "" }}</textarea>
                                    </div>
                                </div> 
                            </div>                                                                        
                            <div class="col-12 mb-20">
                                <input type="submit" value="{{ isset($event) ? 'Update' : 'Submit' }}" class="button button-primary">
                                @if(isset($event))
                                    <hr>
                                    <a href="{{ route('events.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Events
                                    </a>                                
                                @else
                                    <input type="reset" value="cancel" class="button button-danger">
                                    <hr>
                                    <a href="{{ route('events.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Events
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
@endsection