<?php

namespace App\Http\Controllers;

use App\Models\CurrentFund;
use App\Models\Fund;
use App\Models\TotalFunds;
use Illuminate\Http\Request;

class TotalFundsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalFunds = TotalFunds::all();
        // $currentFund1 = CurrentFund::latest('created_at')->first();
        // $moneyValue = $currentFund1->money;

        // $totalAmountSum = TotalFunds::sum('total_amount');
        // dd($totalAmountSum . $currentFund1);
        // $currentFunds = $totalAmountSum + $moneyValue;
        // $formattedCurrentFunds = number_format($currentFunds, 0, '.', ',');
        return view('funds.total-funds', compact('totalFunds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $latestTotalFund = TotalFunds::latest()->first();

        // Kiểm tra xem có dữ liệu hay không trước khi gửi đến view
        if ($latestTotalFund) {
            $latestTotalAmount = $latestTotalFund->total_amount;
        } else {
            $latestTotalAmount = 0; // Hoặc giá trị mặc định khác nếu không có dữ liệu
        }

        return view('funds.create-total-fund', compact('latestTotalAmount'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lấy năm hiện tại
        $currentYear = now()->year;

        // Tên chữ cái viết tắt của các tháng
        $monthsAbbreviation = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

        foreach ($monthsAbbreviation as $monthAbbreviation) {
            // Đếm số lượng checked (đã tích) trong cột tương ứng của bảng funds
            $totalChecked = Fund::where($monthAbbreviation, 1)->count();

            // Tính tổng giá tiền cho tháng
            $totalAmount = $totalChecked * 15000;

            // Kiểm tra xem có bản ghi tổng fund cho tháng và năm đó chưa
            $existingTotalFund = TotalFunds::where('month', $monthAbbreviation)->where('year', $currentYear)->first();

            // Nếu đã có, cập nhật tổng giá tiền
            if ($existingTotalFund) {
                $existingTotalFund->update(['total_amount' => $totalAmount]);
            } else {
                // Nếu chưa có, tạo mới bản ghi tổng fund
                TotalFunds::create([
                    'month' => $monthAbbreviation,
                    'year' => $currentYear,
                    'total_amount' => $totalAmount,
                ]);
            }
        }

        return redirect()->route('total-funds.index')->with('success', 'Funds added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getChartData()
    {
        $data = TotalFunds::pluck('total_amount')->toArray();

        return response()->json($data);
    }
}
