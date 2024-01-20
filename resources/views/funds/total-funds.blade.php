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
        <a href="{{ route('funds.index') }}">
            <i class="ti ti-arrow-left"></i> Back to Pay Fund
        </a>
    </div><!-- Page Headings End -->

    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head justify-content-end">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="title">Export Data Table</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <a href="{{ route('total-funds.create') }}" class="btn btn-info">
                                        Enter existing funds
                                    </a> --}}
                                    {{-- <span class="badge badge-primary" style="padding: 3%; font-size:15px">Current: {{$formattedCurrentFunds}}</span> --}}
                                    {{-- <input type="text" id="" class="form-control" value="" readonly placeholder=""> --}}
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>                
                <div class="box-body">                 
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="student-table-body">
                            @foreach($totalFunds as $totalFund)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $totalFund->month }}</td>
                                    <td>{{ $totalFund->year }}</td>
                                    <th>{{ $totalFund->total_amount }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
            </div>
        </div>
        <a href="{{ route('funds.index') }}">
            <i class="ti ti-arrow-left"></i> Back to Pay Fund
        </a>
        <!--Export Data Table End-->
    </div>

</div><!-- Content Body End -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Add this script after including jQuery -->



@endsection