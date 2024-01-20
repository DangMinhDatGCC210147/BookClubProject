@extends('layout-leader')

@section('content')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ Create Total Fund</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!--Form With Advance Form Elements Start-->
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Manage Total Fund</h4>
                    <hr>
                    <a href="{{ route('total-funds.index') }}">
                        <i class="ti ti-arrow-left"></i> Back to Total Fund table
                    </a>  
                </div>
                <div class="box-body">
                    <form action="{{ route('funds.store') }}" method="post">
                        @csrf
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    {{-- <div class="col-6 mb-20">
                                        <label for="formLayoutUsername4">Current Funds</label>
                                        <input type="text" id="currentFund" name="currentFund" value="{{ isset($latestTotalAmount) ? $latestTotalAmount : "" }}" class="form-control" readonly>
                                    </div> --}}
                                    <div class="col-6 mb-20">
                                        <label for="formLayoutUsername4">Fund want to add</label>
                                        <input type="number" id="money" min="0" name="money" value="" class="form-control" placeholder="Money">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <input type="submit" value="{{ isset($event) ? 'Update' : 'Submit' }}" class="button button-primary">
                                @if(isset($event))
                                    <hr>
                                    <a href="{{ route('total-funds.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Total Fund table
                                    </a>                                 
                                @else
                                    <input type="reset" value="cancel" class="button button-danger">
                                    <hr>
                                    <a href="{{ route('total-funds.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Total Fund table
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