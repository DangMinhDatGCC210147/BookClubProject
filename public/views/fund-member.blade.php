@extends('layout-user')

@section('content')
    <main id="mt-main">
        <section class="mt-contact-banner mt-banner-22 wow fadeInUp" data-wow-delay="0.4s"
            style="background-image: url(http://placehold.it/1920x325);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">PAY FUND</h1>
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('user.index') }}">Home <i class="fa fa-angle-right"></i></a></li>
                                <li>Pay fund</li>
                            </ul>
                        </nav>
                        <!-- Breadcrumbs of the Page end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Process Section of the Page -->
        {{-- <div class="mt-process-sec wow fadeInUp" data-wow-delay="0.4s">
        </div><!-- Mt Process Section of the Page end --> --}}
        <!-- Mt Detail Section of the Page -->
        @if ($isPaymentMade == false)
            <div class="text" style="text-align:center; padding-top: 2vw !important; padding-bottom: 2vw">
                <h2 class="text-warning" style="font-weight:bold; font-size:2vw">YOU HAVE NOT PAID YOUR FUND FOR THIS MONTH
                </h2>
            </div>
        @else
            <div class="text" style="text-align:center; padding-top: 3vw; padding-bottom:2vw">
                <h2 class="text-info" style="font-weight:bold; font-size:2vw">YOU HAVE PAID YOUR FUND FOR THIS MONTH</h2>
            </div>
        @endif
        <section class="mt-detail-sec toppadding-zero wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h2>BILLING FUND</h2>
                        <!-- Bill Detail of the Page -->
                        <form action="{{ route('funds.checkout') }}" method="POST" class="bill-detail">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Full Name" value="{{ $userData->name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="idSt" class="form-label">Student Id</label>
                                    <input type="text" class="form-control" id="idSt" name="idSt"
                                        placeholder="Student Id" value="{{ $userData->idSt }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="row">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="months[]"
                                                        value="{{ $i }}" {{ date('n') == $i ? 'checked' : '' }}>
                                                    <label
                                                        class="form-check-label">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</label>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="border:none" class="process-btn">SUBMIT FORM AFTER PAYING</button>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="holder">
                            <h2>Your amount needs to be paid</h2>
                            <h4>Remember to capture your transaction screen result and send to treasurer</h4>
                            <h5 style="font-weight: bold; color: rgb(181, 25, 25)">Syntax for transaction: [Yourname] +
                                [Month]</h5>
                                <ul class="list-unstyled block">
                                    <li>
                                        <div class="txt-holder">
                                            <div class="text-wrap pull-left">
                                                <strong class="title">Months</strong>
                                                <span id="monthList"></span>
                                            </div>
                                            <div class="text-wrap txt text-right pull-right">
                                                <strong class="title">PRICE</strong>
                                                <span id="monthPrice"></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li style="border-bottom: none;">
                                        <div class="txt-holder">
                                            <strong class="title sub-title pull-left">TOTAL</strong>
                                            <div class="txt pull-right">
                                                <span id="totalAmount"></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="img-qr">
                                            <img src="{{asset('/images/QR.png')}}" alt="" style="max-width: 100%">
                                        </div>
                                    </li>
                                </ul>                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
    </main><!-- Main of the Page end here -->

    <!-- Đảm bảo bạn đã bao gồm thư viện jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Mặc định giá cho mỗi tháng
        var monthlyPrice = 15000;
    
        // Sự kiện thay đổi khi chọn tháng
        $('input[name="months[]"]').change(function() {
            updateMonthList();
            updateTotal();
        });
    
        // Gọi sự kiện thay đổi để cập nhật ngay khi trang được tải
        $('input[name="months[]"]').change();
    
        // Hàm cập nhật danh sách tháng
        function updateMonthList() {
            var monthListHTML = '';
            var monthPriceHTML = '';
    
            // Lặp qua các checkbox được chọn và cập nhật danh sách tháng
            $('input[name="months[]"]:checked').each(function() {
                var monthName = $(this).next('label').text();
                var monthAmount = monthlyPrice.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                monthListHTML += '<span>' + monthName + '</span><br>';
                monthPriceHTML += '<span>' + monthAmount + '</span><br>';
            });
    
            // Hiển thị danh sách tháng và giá trong HTML
            $('#monthList').html(monthListHTML);
            $('#monthPrice').html(monthPriceHTML);
        }
    
        // Hàm cập nhật tổng số tiền
        function updateTotal() {
            var total = 0;
    
            // Lặp qua các checkbox được chọn và cập nhật tổng số tiền
            $('input[name="months[]"]:checked').each(function() {
                total += monthlyPrice;
            });
    
            // Hiển thị tổng số tiền trong HTML
            $('#totalAmount').text(formatCurrency(total));
        }
    
        // Hàm định dạng số tiền sang định dạng tiền tệ
        function formatCurrency(amount) {
            return amount.toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    });
    </script>
    
@endsection
