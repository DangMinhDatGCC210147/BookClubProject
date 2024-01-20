<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with('member', 'event')->get();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $events = Event::all();
        return view('attendances.create', compact('users','events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'idEvent' => 'required|exists:events,id',
            'idSt' => 'required|exists:members,idSt',
        ]);
    
        try {
            // Check if the attendance already exists for the student in the specified event
            $existingAttendance = Attendance::where('idEvent', $request->input('idEvent'))
                ->where('idSt', $request->input('idSt'))
                ->first();
    
            if ($existingAttendance) {
                // Attendance already exists, you can handle this case (e.g., redirect back with a message)
                return redirect()->back()->with('error', 'Attendance already recorded for this student in the selected event.');
            }
    
            // Create a new attendance record
            Attendance::create([
                'idEvent' => $request->input('idEvent'),
                'idSt' => $request->input('idSt'),
                'attendance_date' => now(),
            ]);
    
            return redirect()->back()->with('success', 'Attendance recorded successfully.');
        } catch (\Exception $e) {
            // Output error code and message
            dd($e->getCode(), $e->getMessage());
        }
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
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->back()->with('success', 'Delete successful.');
    }

}
