<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailables\Address;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // return new Envelope(
        //     subject: '[BOOK CLUB] - EMAIL REMINDER TO JOIN THE EVENT',
        // );
        return new Envelope(
            from: new Address('datdmgcc21047@fpt.edu.vn', 'Dang Minh Dat'),
            subject: '[BOOK CLUB] - EMAIL REMINDER TO JOIN THE EVENT',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        
        // $event = DB::table('events')
        //     ->join('member_event', 'events.id', '=', 'member_event.idEvent')
        //     ->join('members', 'member_event.idSt', '=', 'members.idSt')
        //     ->where('member_event.status', 1)
        //     ->whereBetween('events.time_start', [now(), now()->addHour()])
        //     ->select('events.nameEvent', 'events.time_start', 'events.time_end', 'events.date', 'members.name as memberName', 'members.email')
        //     ->first();
        // dd($event);
        // // Truyền danh sách sự kiện và thông tin thành viên cho view
        // return new Content(
        //     view: 'emails.eventreminder',
        //     with: [
        //         'event' => $event,    
        //     ],
        // );
        return new Content(
            view: 'emails.eventreminder',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
