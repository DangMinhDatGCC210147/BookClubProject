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
        $members = Member::where('idSt', '!=', 'GCC210147')->get();
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
        try {
            // Validate the request
            $request->validate([
                'idSt' => 'required|string|max:9|unique:members,idSt',
                'name' => 'required|string',
                'dateOfBirth' => 'required|date',
                'course' => 'required|string|max:5',
                'email' => 'required|email|unique:members,email',
                'gender' => 'required|int',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            // Check if image is uploaded
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images/members'), $imageName);
            }

            // Check if joiningDate is provided, otherwise set it to null
            $joiningDate = $request->input('joiningDate') ? Carbon::createFromFormat('Y-m-d', $request->input('joiningDate')) : null;

            // Check if phoneNumber is provided, otherwise set it to null
            $phoneNumber = $request->input('phoneNumber') ? $request->input('phoneNumber') : null;

            // Create member
            $member = Member::create([
                'idSt' => $request->input('idSt'),
                'image' => $imageName ? 'book-club-management/public/images/members/' . $imageName : null,
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'dateOfBirth' => Carbon::createFromFormat('Y-m-d', $request->input('dateOfBirth')),
                'course' => $request->input('course'),
                'email' => $request->input('email'),
                'phoneNumber' => $phoneNumber,
                'joiningDate' => $joiningDate,
            ]);

            // Create corresponding fund entry
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

            // Redirect after successful submission
            return redirect('/members')->with('success', 'Member has been saved successfully!');
        } catch (\Exception $e) {
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
        try {
            // Validate the request
            $request->validate([
                'idSt' => 'required|string|max:9|unique:members,idSt,' . $member->id,
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'name' => 'required|string',
                'dateOfBirth' => 'required|date',
                'course' => 'required|string|max:5',
                'email' => 'required|email|unique:members,email,' . $member->id,
                'phoneNumber' => 'string',
                'joiningDate' => 'date',
            ]);

            // Check if image is uploaded
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('images/members'), $imageName);
                // Update image path
                $member->update(['image' => 'book-club-management/public/images/members/' . $imageName]);
            }

            // Check if joiningDate is provided, otherwise set it to null
            $joiningDate = $request->input('joiningDate') ? Carbon::createFromFormat('Y-m-d', $request->input('joiningDate')) : null;

            // Check if phoneNumber is provided, otherwise set it to null
            $phoneNumber = $request->input('phoneNumber') ? $request->input('phoneNumber') : null;

            // Update member information
            $member->update([
                'idSt' => $request->input('idSt'),
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'dateOfBirth' => Carbon::createFromFormat('Y-m-d', $request->input('dateOfBirth')),
                'course' => $request->input('course'),
                'email' => $request->input('email'),
                'phoneNumber' => $phoneNumber,
                'joiningDate' => $joiningDate,
            ]);

            // Redirect after successful update
            return redirect()->route('members.index')->with('success', 'Member updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Enter information again!');
        }
    }


    public function destroy(Member $member)
    {
        $imagePath = public_path('images/members/') . $member->image;
        if (file_exists($imagePath)) {
            // Xoá hình ảnh từ thư mục
            unlink($imagePath);
        }
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
