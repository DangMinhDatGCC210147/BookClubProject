@extends('layout-leader')

@section('content')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ {{isset($event) ? "Update Event" : "Create Event"}}</span></h3>
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
                    <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($event))
                            @method('PUT')
                        @endif
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername4">Event Name</label>
                                        <input type="text" id="nameEvent" name="nameEvent" value="{{ isset($event) ? $event->nameEvent : "" }}" class="form-control" placeholder="Event name">
                                    </div>
                                    <div class="col-3 mb-20">
                                        <label for="formLayoutUsername4">Time Start</label>
                                        <input type="time" id="time_start" name="time_start" value="{{ isset($event) ? \Carbon\Carbon::parse($event->time_start)->format('H:i') : "" }}" class="form-control" placeholder="Time">
                                    </div>
                                    <div class="col-3 mb-20">
                                        <label for="formLayoutUsername4">Time End</label>
                                        <input type="time" id="time_end" name="time_end" value="{{ isset($event) ? \Carbon\Carbon::parse($event->time_end)->format('H:i') : "" }}" class="form-control" placeholder="Time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Venue</label>
                                        <input type="text" id="venue" name="venue" value="{{ isset($event) ? $event->venue : "" }}" class="form-control" placeholder="Venue">
                                    </div>  
                                    <div class="col-lg-3 mb-20">
                                        <label for="formLayoutDateofBirth4">Date</label>
                                        <input type="date" id="date" name="date" value="{{ isset($event) ? $event->date->format('Y-m-d'): "" }}" class="form-control" placeholder="Date">
                                    </div> 
                                    <div class="col-lg-3 mb-20">
                                        <label for="formLayoutDateofBirth4">Score</label>
                                        <input type="number" id="score" name="score" min="1" max="20" value="{{ isset($event) ? $event->score: "" }}" class="form-control" placeholder="Score">
                                    </div>  
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Description 1</label>
                                        <textarea cols="40" id="description_1" name="description_1" value="{{ isset($event) ? $event->description_1 : "" }}" class="form-control" placeholder="Description 1">{{ isset($event) ? $event->description_1 : "" }}</textarea>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Description 2</label>
                                        <textarea cols="40" id="description_2" name="description_2" value="{{ isset($event) ? $event->description_2 : "" }}" class="form-control" placeholder="Description 2">{{ isset($event) ? $event->description_2 : "" }}</textarea>
                                    </div>  
                                </div> 
                            </div> 
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Description 3</label>
                                        <textarea cols="40" id="description_3" name="description_3" value="{{ isset($event) ? $event->description_3 : "" }}" class="form-control" placeholder="Description 3">{{ isset($event) ? $event->description_3 : "" }}</textarea>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="formLayoutDateofBirth4">Description 4</label>
                                        <textarea cols="40" id="description_4" name="description_4" value="{{ isset($event) ? $event->description_4 : "" }}" class="form-control" placeholder="Description 4">{{ isset($event) ? $event->description_4 : "" }}</textarea>
                                    </div>  
                                </div> 
                            </div>    
                            <div class="col-12 mb-20">
                                <div class="form-group">
                                    <label class="inline">
                                        <input type="radio" name="status" value="0" id="status" {{ isset($event) && $event->status == 0 ? 'checked' : '' }}>Hide
                                    </label>
                                    <label class="inline">
                                        <input type="radio" name="status" value="1" id="status" {{ isset($event) && $event->status == 1 ? 'checked' : '' }}>Presently
                                    </label>             
                                </div>
                            </div>                                                  
                            <div class="col-12 mb-20">
                                <label for="formLayoutFile2">Upload a File</label>
                                    <input type="file" id="image" name="image" class="dropify">
                                @if(isset($event) && $event->image)
                                    <p>Current Image*: There already has an image of {{ $event->nameEvent }}</p>
                                @endif
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