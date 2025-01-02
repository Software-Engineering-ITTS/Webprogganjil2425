<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        $user->last_login = now();
        $user->save();

        // Log perubahan ke tabel History
        \App\Models\History::create([
            'table' => 'users',
            'action' => 'UPDATE',
            'attribute' => 'last_login',
            'old_value' => $user->getOriginal('last_login'),
            'new_value' => $user->last_login,
            'changed_by' => Auth::user()->id,
        ]);
    }
}
