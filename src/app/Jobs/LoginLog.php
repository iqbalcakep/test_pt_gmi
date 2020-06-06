<?php

namespace App\Jobs;
use Illuminate\Http\Request;
use App\UserLog;
use App\User;

class LoginLog extends Job
{
     /**
     * attribute
     *
     * @var array
     */
    private $attribute;
    /**
     * Create a new job instance.
     */
    public function __construct(Request $request, User $user)
    {
        $this->attribute = [
            'user_id' => $user->id,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'info' => [
                'ips' => $request->ips(),
                'fingerprint' => $request->fingerprint(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ajax' => $request->ajax(),
            ],
        ];
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        UserLog::create($this->attribute);
    }
}
