<?php

namespace App\Observers;

use App\Models\History;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HistoryObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created($model): void
    {
        if ($model instanceof User) {
            // Jika pengguna baru, gunakan ID pengguna yang baru saja dibuat
            $changedBy = $model->id;
        } else {
            // Jika bukan pengguna, gunakan ID pengguna yang sedang login
            $changedBy = Auth::check() ? Auth::user()->id : null;
        }

        History::create([
            'table' => $model->getTable(),
            'action' => 'CREATE',
            'attribute' => 'Menambah Data ' . $model->getTable(),
            'old_value' => null,
            'new_value' => null,
            'changed_by' => $changedBy,
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated($model): void
    {
        $changes = $model->getChanges();

        // Abaikan logging untuk last_login dan updated_at
        unset($changes['last_login'], $changes['updated_at']);

        if (empty($changes)) {
            return; // Tidak ada perubahan signifikan
        }

        foreach ($changes as $attribute => $newValue) {
            $oldValue = $model->getOriginal($attribute);

            History::create([
                'table' => $model->getTable(),
                'action' => 'UPDATE',
                'attribute' => $attribute,
                'old_value' => $oldValue,
                'new_value' => $newValue,
                'changed_by' => Auth::user()->id,
            ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted($model): void
    {
        History::create([
            'table' => $model->getTable(),
            'action' => 'DELETE',
            'attribute' => 'Menghapus Data ' . $model->getTable(),
            'old_value' => null,
            'new_value' => null,
            'changed_by' => Auth::user()->id,
        ]);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
