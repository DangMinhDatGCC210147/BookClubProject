<?php

namespace App\Http\Controllers;

use App\Models\CurrentFund;
use App\Models\Fund;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funds = Fund::all();
        return view('funds.index', compact('funds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'money' => 'required|numeric',
        ]);

        $moneyToAdd = $request->money;

        // Tạo mới bản ghi trong bảng funds chỉ với trường money
        CurrentFund::create([
            'money' => $moneyToAdd,
        ]);

        return redirect()->route('total-funds.index')->with('success', 'Funds added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // dd(Auth::user());
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Lấy thông tin người dùng từ Auth
            $userData = Auth::user();
            
            $currentMonth = now()->format('n');

            $isPaymentMade = Payment::where('idSt', $userData->idSt)
                ->where('month', $currentMonth)
                ->exists();

            // dd($isPaymentMade);
            return view('fund-member', ['userData' => $userData, 'isPaymentMade' => $isPaymentMade]);
        }
        
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
    public function updateFund(Request $request)
    {
        try {
            $studentId = $request->input('student_id');
            $month = $request->input('month');
            $isChecked = $request->input('isChecked');
    
            // Kiểm tra xem studentId và month có giá trị hợp lệ hay không
            if (!$studentId || !$month) {
                throw new \Exception('Invalid student_id or month.');
            }
    
            // Xác định cột cần cập nhật dựa trên giá trị của month
            $columnToUpdate = strtolower($month);
    
            // Cập nhật dữ liệu trong cơ sở dữ liệu dựa trên trạng thái của checkbox
            $updateValue = $isChecked ? 1 : 0;
            Fund::where('idSt', $studentId)->update([$columnToUpdate => $updateValue]);
    
            // Lấy danh sách các cột tháng
            $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
    
            // Tính toán tổng số tiền dựa trên tổng số lượng tháng đã đóng
            $totalAmount = 0;
            foreach ($months as $m) {
                $totalAmount += Fund::where('idSt', $studentId)->value(DB::raw("`$m` * 15000"));
            }
    
            // Cập nhật tổng vào cơ sở dữ liệu
            Fund::where('idSt', $studentId)->update(['total' => $totalAmount]);
    
            return response()->json(['success' => true, 'total' => $totalAmount]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    
    public function checkout(Request $request)
    {
        // Validate the request data
        $request->validate([
            'idSt' => 'required|exists:members,idSt',
            'name' => 'required',
            'months' => 'required|array',
            'months.*' => 'integer|min:1|max:12',
        ]);
    
        // Retrieve existing payments for the selected student and months
        $existingPayments = Payment::whereIn('month', $request->input('months'))
            ->where('idSt', $request->input('idSt'))
            ->get();
    
        // Separate existing and new months
        $existingMonths = $existingPayments->pluck('month')->toArray();
        $newMonths = array_diff($request->input('months'), $existingMonths);
    
        if ($existingPayments->isNotEmpty()) {
            // Display a message for existing payments
            $existingMonthsNames = implode(', ', array_map(function ($month) {
                return date('F', mktime(0, 0, 0, $month, 1));
            }, $existingMonths));
    
            $message = 'You have already paid for the following months: ' . $existingMonthsNames . '. Try again!';
            return redirect()->route('funds.user.index')->with(['info' => $message]);
        }
    
        // Save payment information for each selected new month
        foreach ($newMonths as $selectedMonth) {
            Payment::create([
                'idSt' => $request->input('idSt'),
                'name' => $request->input('name'),
                'month' => $selectedMonth,
                'amount' => 15000,
                'checkout_time' => now(),
            ]);
        }
    
        // Display a success message
        $newMonthsNames = implode(', ', array_map(function ($month) {
            return date('F', mktime(0, 0, 0, $month, 1));
        }, $newMonths));
    
        $successMessage = 'You have successfully paid for the following months: ' . $newMonthsNames;
        return redirect()->route('funds.user.index')->with(['success' => $successMessage]);
    }       

}
