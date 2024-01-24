<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        $totalMembers = $members->count();
        return view('leaders.members', compact('members', 'totalMembers'));
    }
    public function create()
    {  
        $users = User::where('role', '!=', 2)->get();
        return view('leaders.createMember', compact('users'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // if (empty($request->image)) {
        //     return redirect()->back()->with('warning', 'Image fields are required. Please fill in all the fields.');
        // }
        try {
        // Validate the request
        $request->validate([
            'idSt' => 'required|string|max:9|unique:members,idSt',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'name' => 'required|string',
            'dateOfBirth' => 'required|date',
            'course' => 'required|string|max:5',
            'email' => 'required|email|unique:members,email',
            'phoneNumber' => 'required|string|regex:/^0[0-9]{9}$/',
            'joiningDate' => 'required|date',
            'gender' => 'required|int',
        ]);
        
            // Lưu tập tin vào storage/app/public/images
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/members'), $imageName);

            $dateOfBirth = Carbon::createFromFormat('Y-m-d', $request->input('dateOfBirth'));
            $joiningDate = Carbon::createFromFormat('Y-m-d', $request->input('joiningDate'));

            // Lưu dữ liệu vào cơ sở dữ liệu với đường dẫn tập tin
            $member = Member::create([
                'idSt' => $request->input('idSt'),
                'image' => 'images/members/' . $imageName,
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'dateOfBirth' => $dateOfBirth,
                'course' => $request->input('course'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'joiningDate' => $joiningDate,
            ]);

            // Lưu idSt vào bảng funds
            Fund::create([
                'idSt' => $member->idSt,
                'jan' => 0,
                'feb' => 0,
                'mar' => 0,
                'apr' => 0,
                'may' => 0,
                'jun' => 0,
                'jul' => 0,
                'aug' => 0,
                'sept' => 0,
                'oct' => 0,
                'nov' => 0,
                'dec' => 0,
                'total' => 0,
            ]);
            // Chuyển hướng sau khi lưu dữ liệu
            return redirect('/members')->with('success', 'Member has been saved successfully!');
        } catch (\Exception $e) {
            // $errors = $validator->errors()->all();
            // // Display error messages using toastr
            // foreach ($errors as $error) {
            //     toastr()->error($error);
            // }
            return back()->withInput()->with('error', 'Enter information again!');
        }
    }
    

    public function edit(Member $member, User $users)
    {
        // dd($users, $member);
        $users = User::all();
        return view('leaders.createMember', compact('member','users'));
    }

    public function update(Request $request, Member $member)
    {
        // Validate the request
        $request->validate([
            'idSt' => 'required|string|max:9|unique:members,idSt,' . $member->id, // Thêm một điều kiện unique để loại trừ ID của thành viên hiện tại
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'name' => 'required|string',
            'dateOfBirth' => 'required|date',
            'course' => 'required|string|max:5',
            'email' => 'required|email|unique:members,email,' . $member->id, // Thêm một điều kiện unique để loại trừ ID của thành viên hiện tại
            'phoneNumber' => 'required|string',
            'joiningDate' => 'required|date',
        ]);

        // Lưu tập tin vào thư mục public/images nếu có sự thay đổi
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/members'), $imageName);

            // Cập nhật đường dẫn hình ảnh trong trường 'image'
            $member->update(['image' => 'images/members/' . $imageName]);
        }
        
        // Cập nhật thông tin thành viên
        $member->update([
            'idSt' => $request->input('idSt'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'dateOfBirth' => Carbon::createFromFormat('Y-m-d', $request->input('dateOfBirth')),
            'course' => $request->input('course'),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'joiningDate' => Carbon::createFromFormat('Y-m-d', $request->input('joiningDate')),
        ]);
        
        // Chuyển hướng sau khi cập nhật thông tin
        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        // Xóa thành viên từ cơ sở dữ liệu
        $member->delete();
        return redirect('/members')->with('success', 'Member deleted successfully.');
    }

    // Statistic by gender
    public function getChartData()
    {
        // Lấy dữ liệu từ cơ sở dữ liệu
        $maleCount = Member::where('gender', '0')->count();
        $femaleCount = Member::where('gender', '1')->count();

        // Trả về dữ liệu dưới định dạng JSON
        return response()->json([
            'labels' => ['Male', 'Female'],
            'datasets' => [
                [
                    'data' => [$maleCount, $femaleCount],
                    'backgroundColor' => [
                        '#428bfa',
                        '#fb7da4',
                    ],
                ],
            ],
        ]);
    }
    // Statistic by Month
    public function getBirthdayStats(Request $request)
    {
        $data = Member::selectRaw('MONTH(dateOfBirth) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $counts = [];

        foreach ($data as $item) {
            $labels[] = $item->month;
            $counts[] = $item->count;
        }

        return response()->json([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Members',
                    'data' => $counts,
                    'backgroundColor' => '#fb7da4',
                    'borderColor' => '#fb7da4',
                    'borderWidth' => 3,
                    'pointBackgroundColor' => '#ffffff',
                    'pointBorderColor' => '#fb7da4',
                    'pointBorderWidth' => 3,
                    'pointRadius' => 6,
                    'pointHoverBackgroundColor' => '#ffffff',
                    'pointHoverBorderWidth' => 3,
                    'pointHoverRadius' => 6,
                    'fill' => false,
                    'lineTension' => 0
                ],
            ],
        ]);
    }

    public function getMemberByIdSt($idSt)
    {
        $member = Member::where('idSt', $idSt)->first();

        if ($member) {
            return response()->json($member);
        } else {
            return response()->json(['error' => 'Member not found'], 404);
        }
    }

    public function checkIdStExists($idSt)
    {
        $exists = Member::where('idSt', $idSt)->exists();
        return response()->json(['exists' => $exists]);
    }
}
