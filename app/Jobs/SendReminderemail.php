<?php

namespace App\Jobs;
use App\Http\Model\HomeUser;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderemail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
         $user = $this->user;
        $mailer->send('email.active', ['user' => $user], function ($m) use ($user) {
            $m->to($user->user_email, $user->user_name)->subject('邮箱激活!');
        });
    }
}
