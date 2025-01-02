<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogUserLogout
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
        $user->updated_at = now();
        $user->save();

        // Log perubahan ke tabel History
        \App\Models\History::create([
            'table' => 'users',
            'action' => 'UPDATE',
            'attribute' => 'updated_at',
            'old_value' => $user->getOriginal('updated_at'),
            'new_value' => $user->updated_at,
            'changed_by' => Auth::user()->id,
        ]);
    }
}
