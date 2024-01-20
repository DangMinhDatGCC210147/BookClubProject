@extends('layout-leader')

@section('content')

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Dashboard <span>/ Leaderboard</span></h3>
            </div>
        </div><!-- Page Heading End -->

        {{-- <!-- Page Button Group Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-date-range">
                <input type="text" class="form-control input-date-predefined">
            </div>
        </div><!-- Page Button Group End --> --}}

    </div><!-- Page Headings End -->

    <!-- Top Report Wrap Start -->
    <div class="row">
        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Total Members</h4>
                    {{-- <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a> --}}
                </div>

                <!-- Content -->
                <div class="content">
                    {{-- <h5>Todays</h5> --}}
                    <h2>{{$totalMembers}}</h2>
                </div>

                {{-- <!-- Footer -->
                <div class="footer">
                    <div class="progess">
                        <div class="progess-bar" style="width: 92%;"></div>
                    </div>
                    <p>92% of unique visitor</p>
                </div> --}}

            </div>
        </div><!-- Top Report End -->

        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Number of event in month</h4>
                    {{-- <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a> --}}
                </div>

                <!-- Content -->
                <div class="content">
                    {{-- <h5>Todays</h5> --}}
                    <h2>{{$totalEvents}}</h2>
                </div>

            </div>
        </div><!-- Top Report End -->

        <!-- Top Report Start -->
        <div class="col-xlg-3 col-md-6 col-12 mb-30">
            <div class="top-report">

                <!-- Head -->
                <div class="head">
                    <h4>Available total fund</h4>
                    {{-- <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a> --}}
                </div>

                <!-- Content -->
                <div class="content">
                    <h2>{{ $formattedtotalAmount }}</h2>
                </div>

            </div>
        </div><!-- Top Report End -->
    </div><!-- Top Report Wrap End -->

    <div class="row mbn-30">

        <!-- Revenue Statistics Chart Start -->
        <div class="col-md-8 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Statistics on the number of birthdays by month</h4>
                </div>
                <div class="box-body">
                    <div class="chart-legends-1 row">
                        <div class="chart-legend-1 col-12 col-sm-4">
                            <h5 class="title">Total of Members</h5>
                            <h3 class="value text-secondary">{{$totalMembers}}</h3>
                        </div>
                        {{-- <div class="chart-legend-1 col-12 col-sm-4">
                            <h5 class="title">Total View</h5>
                            <h3 class="value text-primary">10000,000</h3>
                        </div>
                        <div class="chart-legend-1 col-12 col-sm-4">
                            <h5 class="title">Total Support</h5>
                            <h3 class="value text-warning">100,000</h3>
                        </div> --}}
                    </div>
                    <div class="chartjs-revenue-statistics-chart">
                        <canvas id="chartjs-revenue-statistics-chart"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- Revenue Statistics Chart End -->

        <!-- Market Trends Chart Start -->
        <div class="col-md-4 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Gender of member</h4>
                </div>
                <div class="box-body">
                    <div class="chartjs-market-trends-chart">
                        <canvas id="chartjs-market-trends-chart"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- Market Trends Chart End -->

        <!-- Recent Transaction Start -->
            <!-- Basic Area Start -->

        <div class="row">
            <!-- Recent Transaction -->

            <!-- Basic Area -->
            <div class="col-lg-12 col-12 mb-30">
                <div class="box">
                    <div class="box-head">
                        <h4 class="title">Total fund collected each month</h4>
                    </div>
                    <div class="box-body">
                        <div id="example-echart-basic-area" class="example-echart-basic-area example-echarts"></div>
                    </div>
                </div>
            </div><!-- Line End -->
        </div>
        
        <!-- Daily Sale Report Start -->
        {{-- <div class="col-xlg-4 col-lg-6 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Daily Sale Report</h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table daily-sale-report">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Detail</th>
                                    <th>Payment</th>
                                </tr>
                            </thead><!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <tr>
                                    <td class="fw-600">Alexander</td>
                                    <td>
                                        <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                    </td>
                                    <td><span class="text-success d-flex justify-content-between fw-600">$500.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                </tr>
                                <tr>
                                    <td class="fw-600">Linda</td>
                                    <td>
                                        <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                    </td>
                                    <td><span class="text-success d-flex justify-content-between fw-600">$20.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                </tr>
                                <tr>
                                    <td class="fw-600">Patrick</td>
                                    <td>
                                        <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                    </td>
                                    <td><span class="text-danger d-flex justify-content-between fw-600">$120.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                </tr>
                                <tr>
                                    <td class="fw-600">Jose</td>
                                    <td>
                                        <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                    </td>
                                    <td><span class="text-success d-flex justify-content-between fw-600">$1750.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                </tr>
                                <tr>
                                    <td class="fw-600">Amber</td>
                                    <td>
                                        <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                    </td>
                                    <td><span class="text-warning d-flex justify-content-between fw-600">$165.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                </tr>
                                <tr>
                                    <td class="fw-600">Linda</td>
                                    <td>
                                        <p>Sed do eiusmod tempor <br>incididunt ut labore.</p>
                                    </td>
                                    <td><span class="text-success d-flex justify-content-between fw-600">$20.00<span class="tippy" data-tippy-content="Sed do eiusmod tempor <br/> incididunt ut labore."><i class="zmdi zmdi-info-outline"></i></span></span></td>
                                </tr>
                            </tbody><!-- Table Body End -->

                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Daily Sale Report End -->

        <!-- To Do List Start -->
        <div class="col-xlg-4 col-lg-6 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">To-do List</h4>
                </div>
                <div class="box-body p-0">

                    <!--Todo List Start-->
                    <ul class="todo-list">

                        <!--Todo Item Start-->
                        <li class="done">
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Sed ut perspiciatis unde omnis iste natus error.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                        <!--Todo Item Start-->
                        <li>
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Mistaken idea of denouncing pleasure.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                        <!--Todo Item Start-->
                        <li>
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Encounter consequences that are.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                        <!--Todo Item Start-->
                        <li>
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Sed ut perspiciatis unde omnis iste natus error.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                        <!--Todo Item Start-->
                        <li class="done">
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Sed ut perspiciatis unde omnis iste natus error.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                        <!--Todo Item Start-->
                        <li>
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Nor again is there anyone who loves.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                        <!--Todo Item Start-->
                        <li>
                            <div class="list-action">
                                <button class="status"><i class="zmdi zmdi-star-outline"></i></button>
                                <label class="adomx-checkbox"><input type="checkbox"> <i class="icon"></i></label>
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                            <div class="list-content">
                                <p>Sed ut perspiciatis unde omnis iste natus error.</p>
                            </div>
                            <div class="list-action right">
                                <button class="remove"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </li>
                        <!--Todo Item End-->

                    </ul>
                    <!--Todo List End-->

                    <!--Add Todo List Start-->
                    <form action="#" class="todo-list-add-new" data-date="false">
                        <label class="status"><input type="checkbox"><i class="icon zmdi zmdi-star-outline"></i></label>
                        <input class="content" type="text" placeholder="Type new Task">
                        <button class="submit"><i class="zmdi zmdi-plus-circle-o"></i></button>
                    </form>
                    <!--Add Todo List End-->

                </div>
            </div>
        </div><!-- To Do List End --> --}}

        <!-- Chat Start -->
        {{-- <div class="col-xlg-4 col-lg-6 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Recent Chats</h4>
                </div>
                <div class="box-body">

                    <div class="widget-chat-wrap custom-scroll">
                        <ul class="widget-chat-list">
                            <li>
                                <div class="widget-chat">
                                    <div class="head">
                                        <h5>Rebecca Mitchell</h5>
                                        <span>Yesterday 05.30 am</span>
                                        <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="image"><img src="../assets/images/comment/comment-1.jpg" alt=""></div>
                                        <div class="content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-chat">
                                    <div class="head">
                                        <h5>Jennifer White</h5>
                                        <span>Today 06.30 am</span>
                                        <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="image"><img src="../assets/images/comment/comment-2.jpg" alt=""></div>
                                        <div class="content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-chat">
                                    <div class="head">
                                        <h5>Roger Welch</h5>
                                        <span>Today 06.31 am</span>
                                        <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="image"><img src="../assets/images/comment/comment-3.jpg" alt=""></div>
                                        <div class="content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-chat">
                                    <div class="head">
                                        <h5>Rebecca Mitchell</h5>
                                        <span>Yesterday 05.30 am</span>
                                        <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="image"><img src="../assets/images/comment/comment-1.jpg" alt=""></div>
                                        <div class="content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-chat">
                                    <div class="head">
                                        <h5>Jennifer White</h5>
                                        <span>Today 06.30 am</span>
                                        <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="image"><img src="../assets/images/comment/comment-2.jpg" alt=""></div>
                                        <div class="content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-chat">
                                    <div class="head">
                                        <h5>Roger Welch</h5>
                                        <span>Today 06.31 am</span>
                                        <a href="#"><i class="zmdi zmdi-replay"></i></a>
                                    </div>
                                    <div class="body">
                                        <div class="image"><img src="../assets/images/comment/comment-3.jpg" alt=""></div>
                                        <div class="content">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget-chat-submission">
                        <form action="#">
                            <input type="text" placeholder="Type something">
                            <div class="buttons">
                                <label class="file-upload button button-sm button-box button-round button-primary" for="chat-file-upload">
                                    <input type="file" id="chat-file-upload" multiple>
                                    <i class="zmdi zmdi-attachment-alt"></i>
                                </label>
                                <button class="submit button button-sm button-box button-round button-primary"><i class="zmdi zmdi-mail-send"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- Chat End --> --}}

    </div>

</div><!-- Content Body End -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('./assets/js/plugins/echarts/echarts.min.js')}}"></script>
<script src="{{ asset('./assets/js/plugins/echarts/echarts.active.js')}}"></script>
@endsection