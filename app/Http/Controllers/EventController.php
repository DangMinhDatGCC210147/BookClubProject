<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    public function index()
    {
        try {
            $events = Event::all();
            return view('events.index', compact('events'));
        } catch (\Exception $e) {
            // In ra mã lỗi và thông điệp
            dd($e->getCode(), $e->getMessage());
        }
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
                'nameEvent' => 'required|string',
                'time_start' => 'required',
                'time_end' => 'required',
                'date' => 'required|date',
                'score' => 'required|integer',
                'venue' => 'required|string',
                'description_1' => 'required|string',
                'description_2' => 'required|string',
                'description_3' => 'required|string',
                'description_4' => 'required|string',
                'status' => 'required|int',
            ]);

            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/events'), $imageName);

            $date = Carbon::createFromFormat('Y-m-d', $request->input('date'));

            // Format time_start and time_end as strings
            $timeStart = $request->input('time_start');
            $timeEnd = $request->input('time_end');

            // Save data to the database
            Event::create([
                'image' => 'images/events/' . $imageName,
                'nameEvent' => $request->input('nameEvent'),
                'time_start' => $timeStart,
                'time_end' => $timeEnd,
                'date' => $date,
                'score' => $request->input('score'),
                'venue' => $request->input('venue'),
                'description_1' => $request->input('description_1'),
                'description_2' => $request->input('description_2'),
                'description_3' => $request->input('description_3'),
                'description_4' => $request->input('description_4'),
                'status' => $request->input('status')
            ]);

            // Redirect after successful data save
            return redirect('/events')->with('success', 'Event is created successfully.');
        } catch (\Exception $e) {
            // Output error code and message
            dd($e->getCode(), $e->getMessage());
        }
    }

    public function edit(Event $event)
    {
        return view('events.create', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        // dd($event);
        // Validate the request
        $date = Carbon::createFromFormat('Y-m-d', $request->input('date'));
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'nameEvent' => 'required|string',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'date' => 'required|date',
            'score' => 'required|integer',
            'venue' => 'required|string',
            'description_1' => 'required|string',
            'description_2' => 'required|string',
            'description_3' => 'required|string',
            'description_4' => 'required|string',
        ]);

        // Lưu tập tin vào thư mục public/images nếu có sự thay đổi
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/events'), $imageName);
            // Cập nhật đường dẫn hình ảnh trong trường 'image'
            $event->update(['image' => 'images/events/' . $imageName]);
        }

        // Cập nhật thông tin sự kiện
        $event->update([
            'nameEvent' => $request->input('nameEvent'),
            'time_start' => $request->input('time_start'),
            'time_end' => $request->input('time_end'),
            'date' =>  $date,
            'score' => $request->input('score'),
            'venue' => $request->input('venue'),
            'description_1' => $request->input('description_1'),
            'description_2' => $request->input('description_2'),
            'description_3' => $request->input('description_3'),
            'description_4' => $request->input('description_4'),
            'status' => $request->input('status')
        ]);
        // dd($event->all());
        // Chuyển hướng sau khi cập nhật thông tin
        return redirect()->route('events.index')->with('success', 'Event is updated successfully.');
    }

    public function destroy(Event $event)
    {
        // dd($event);
        $event->delete();
        return redirect('/events')->with('success', 'Event is deleted successfully.');
    }     

    public function eventDetail($id){
        $event = Event::find($id);
    
        // Kiểm tra xem người dùng có đã đăng ký sự kiện chưa
        $isRegistered = DB::table('member_event')
            ->where('idSt', Auth::user()->idSt)
            ->where('idEvent', $event->id)
            ->exists();

        $idStToCheck = session('idSt');
        $isMember = Member::where('idSt', $idStToCheck)->exists();

        $eventDate = Carbon::parse($event->date);
        $event->day = $eventDate->format('d');
        $event->month = $eventDate->format('M');
        
        // Kiểm tra nếu thời gian hiện tại lớn hơn thời gian bắt đầu sự kiện
        $eventDate = Carbon::parse($event->date);
        $dateOnly = $eventDate->format('Y-m-d');
        $currentTime = Carbon::now();
        $eventStartDateTime = Carbon::parse($dateOnly . ' ' . $event->time_start);
        $isEventStarted = $currentTime->gt($eventStartDateTime);

        return view('eventdetail', compact('event','isRegistered','isMember', 'isEventStarted'));
    }   
    
    public function registerOneEvent(Request $request, $event)
    {
        $idSt = $request->input('idSt');
        MemberEvent::create([
            'idSt' => $idSt,
            'idEvent' => $event,
            'status' => 1, // 1 for register
        ]);
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'Registered to participate successfully..');
    }
    
    public function cannotJoinEvent(Request $request, $event)
    {
        $idSt = $request->input('idSt');
        // Nếu không thể tham gia, thêm dữ liệu vào cơ sở dữ liệu với status là 0
        MemberEvent::create([
            'idSt' => $idSt,
            'idEvent' => $event,
            'status' => 0, // 0 for cannot join
        ]);
    
        // Redirect or return a response
        return redirect()->back()->with('success', 'You confirm that you will not participate in the event.');
    }
    

    public function eventList()
    {
        $eventRegisters = DB::table('member_event')
            ->join('members', 'member_event.idSt', '=', 'members.idSt')
            ->join('events', 'member_event.idEvent', '=', 'events.id')
            ->select('members.name', 'members.idSt as student_id', 'events.time_start', 'events.time_end', 'events.date', 'events.nameEvent', 'member_event.id as member_event_id', 'events.id as event_id', 'member_event.status as status')
            ->get();
        return view('events.listRegister', compact('eventRegisters'));
    }

    public function updateComments(Request $request, $id)
    {
        $event = Event::find($id);
        
        if (!$event) {
            return redirect()->route('events.index', ['event' => $id])->with('error', 'Event not found');
        }

        $event->update([
            'comments' => $request->input('comments'),
        ]);

        return redirect()->route('events.index', ['event' => $id])->with('success', 'Comments updated successfully');
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.note', compact('event'));
    }

    public function editRegistration($id){
        $registration = DB::table('member_event')
            ->join('members', 'member_event.idSt', '=', 'members.idSt')
            ->join('events', 'member_event.idEvent', '=', 'events.id')
            ->select('members.name', 'members.idSt as student_id', 'events.time_start', 'events.time_end', 'events.date', 'events.nameEvent', 'member_event.id as member_event_id', 'events.id as event_id', 'member_event.status as status')
            ->where('member_event.id', $id)
            ->first();
        return view('events.editListRegister', compact('registration'));
    }   
    
    public function updateListRegister($id) {
        $registration = MemberEvent::find($id);
        if (!$registration) {
            return redirect()->back()->with('error', 'Registration not found.');
        }
        $registration->status = request('status');
        $registration->save();
        return redirect()->route('events.list')->with('success', 'Registration status updated successfully.');
    }
}
