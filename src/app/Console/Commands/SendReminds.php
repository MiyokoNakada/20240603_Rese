<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Mail\RemindMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class SendReminds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminds';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reservation reminders to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();
        $bookings = Booking::whereDate('date', $today)->get();

        foreach ($bookings as $booking) {
            Mail::to($booking->user->email)->send(new RemindMail($booking));
        }
        $this->info('Reminders sent successfully.');
    }
}
