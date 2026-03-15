<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ReminderEmail;
use Carbon\Carbon;

class SendPaymentReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "reminders:send-payment";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Send reminders to users who have not paid their subscription fee within 14 days";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Define the current date using Carbon
        $today = \Carbon\Carbon::now();

        $unpaidUsers = User::where("paystatus", 0)
            ->whereDate("created_at", "<=", $today->subDays(14))
            ->where(function ($query) use ($today) {
                $query
                    ->whereNull("last_reminder_sent_at")
                    ->orWhereDate(
                        "last_reminder_sent_at",
                        "<",
                        $today->subDays(7)
                    ); // Throttle reminders
            })
            ->get();

        foreach ($unpaidUsers as $user) {
            Mail::to($user->email)->send(new ReminderEmail($user));
            $this->info("Reminder sent to: {$user->email}");
        }

        $this->info("Payment reminders sent successfully.");
    }
}
