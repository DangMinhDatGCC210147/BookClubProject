@extends('layout-leader')
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.17.2/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/file-saver@2.0.5/dist/FileSaver.min.js"></script>

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
                        <div class="col-md-2">
                            <h3 class="title">Export Data Table</h3>
                        </div>
                        <div class="col-md-7">
                            {{-- <button id="exportButton" class="btn btn-primary">Export to Excel</button> --}}
                        </div>
                        {{-- <div class="col-md-3">
                            <select id="eventDropdown" class="form-control">
                                <option value="" disabled selected>Select Event</option>
                                @foreach ($eventRegisters->unique('event_id') as $eventRegister)
                                    <option value="{{ $eventRegister->event_id }}">{{ $eventRegister->nameEvent }}</option>
                                @endforeach
                                <hr>
                                <option value="" >Show All</option>
                            </select>
                        </div>                      --}}
                    </div>
                </div>                
                <div class="box-body">                 
                    <table class="table table-bordered data-table data-table-export">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Student Id</th>
                                <th>Event</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach($eventRegisters as $eventRegister)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $eventRegister->name }}</td>
                                    <td>{{ $eventRegister->student_id }}</td>
                                    <td>{{ $eventRegister->nameEvent }}</td>
                                    <td>{{ \Carbon\Carbon::parse($eventRegister->time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($eventRegister->time_end)->format('H:i') }}</td>
                                    <td>{{ $eventRegister->date }}</td>
                                    <td>    
                                        @if($eventRegister->status == 0)
                                            Absence
                                        @elseif($eventRegister->status == 1)
                                            Attending
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href=" {{ route('registration.edit', $eventRegister->member_event_id) }}" class="pr-5"><i class="ti ti-pencil text-info"></i></a>
                                            <form class="product-form delete" action="{{ route('event.registerDestroy', $eventRegister->member_event_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="transparent-button" style="background: none; border: none; padding: 0; cursor: pointer; outline: none;">
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
                                <th>Student Name</th>
                                <th>Student Id</th>
                                <th>Event</th>
                                <th>Time</th>
                                <th>Date</th>
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
<script>

    // document.addEventListener('DOMContentLoaded', function () {
    //     var eventDropdown = document.getElementById('eventDropdown');
    //     var tableBody = document.getElementById('tableBody');
    //     var eventRegisters = {!! json_encode($eventRegisters) !!};

    //     eventDropdown.addEventListener('change', function () {
    //         // Lọc dữ liệu theo sự kiện được chọn
    //         var selectedEventId = eventDropdown.value;

    //         if (selectedEventId === "") {
    //             // Nếu chọn "Show All", hiển thị toàn bộ dữ liệu
    //             updateTable(eventRegisters);
    //         } else {
    //             // Ngược lại, lọc dữ liệu theo sự kiện được chọn
    //             var filteredData = eventRegisters.filter(function (eventRegister) {
    //                 return eventRegister.event_id == selectedEventId;
    //             });

    //             // Cập nhật nội dung bảng
    //             updateTable(filteredData);
    //         }
    //     });

    //     data.forEach(function (item, index) {
    //         // Kiểm tra nếu có giá trị và không phải null
    //         var startTime = item.time_start ? moment(item.time_start, "YYYY-MM-DDTHH:mm:ss") : null;
    //         var endTime = item.time_end ? moment(item.time_end, "YYYY-MM-DDTHH:mm:ss") : null;

    //         // Nếu có giá trị và không phải null, định dạng lại thời gian
    //         var formattedStartTime = startTime ? startTime.format('H:mm').replace(/^0(\d)/, '$1') : 'N/A';
    //         var formattedEndTime = endTime ? endTime.format('H:mm').replace(/^0(\d)/, '$1') : 'N/A';

    //         var row = '<tr>' +
    //             '<td>' + (index + 1) + '</td>' +
    //             '<td>' + item.name + '</td>' +
    //             '<td>' + item.student_id + '</td>' +
    //             '<td>' + item.nameEvent + '</td>' +
    //             '<td>' + formattedStartTime + ' - ' + formattedEndTime + '</td>' +
    //             '<td>' + item.date + '</td>' +
    //             '<td>' +
    //             '<div class="d-flex align-items-center">' +
    //             '<form class="product-form delete" action="{{ route('event.registerDestroy', ':id') }}" method="POST">'.replace(':id', item.member_event_id) +
    //             '@csrf' +
    //             '@method("DELETE")' +
    //             '<button type="submit" class="transparent-button" style="background: none; border: none; padding: 0; cursor: pointer; outline: none;">' +
    //             '<i class="ti ti-trash text-danger"></i>' +
    //             '</button>' +
    //             '</form>' +
    //             '</div>' +
    //             '</td>' +
    //             '</tr>';

    //         tableBody.innerHTML += row;
    //     });
    //     // Hiển thị tất cả dữ liệu khi trang được tải lần đầu
    //     updateTable(eventRegisters); 
    // });

</script>

@endsection