<?php

namespace App\Observers;

use App\Models\Cta;

class CtaObserver
{

    public function saving(Cta $cta)
    {
        if ($cta->is_active) {
            // Deactivate all others
            Cta::where('id', '!=', $cta->id)->where('is_active', true)->update(['is_active' => false]);
        }
    }

    /**
     * Handle the Cta "created" event.
     */
    public function created(Cta $cta): void
    {
        //
    }

    /**
     * Handle the Cta "updated" event.
     */
    public function updated(Cta $cta): void
    {
        //
    }

    /**
     * Handle the Cta "deleted" event.
     */
    public function deleted(Cta $cta): void
    {
        //
    }

    /**
     * Handle the Cta "restored" event.
     */
    public function restored(Cta $cta): void
    {
        //
    }

    /**
     * Handle the Cta "force deleted" event.
     */
    public function forceDeleted(Cta $cta): void
    {
        //
    }
}
