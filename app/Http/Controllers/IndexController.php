<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Event;
use App\Models\TotalFunds;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        if (Auth::check()) {
            // Nếu đã đăng nhập, hiển thị trang chính
            return view('index');
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect('/');
        }
    }

    public function indexleader()
    {
        $members = Member::all();
        $totalMembers = $members->count();

        $events = Event::all();
        $totalEvents = $events->count();

        $totalFunds = TotalFunds::all();

        $totalAmount = TotalFunds::sum('total_amount');
        $formattedtotalAmount = number_format($totalAmount, 0, '.', ',');
        return view('leaders/index', compact('totalMembers','totalEvents', 'totalFunds', 'formattedtotalAmount'));
    }

    public function event()
    {
        $events = Event::where('status', 1)->get();
    
        $events->transform(function ($event) {
            $eventDate = Carbon::parse($event->date);
            $event->day = $eventDate->format('d');
            $event->month = $eventDate->format('M');
            return $event;
        });
    
        return view('event', compact('events'));
    }    
}
