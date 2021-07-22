<?php

namespace App\Observers\Register;

use App\Models\Register\Plan\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the Plan "creating" event.
     *
     * @param  \App\Models\Register\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab( $plan->name ); // Recupera o "name" do plano e converte em "url"
    }

    /**
     * Handle the Plan "updating" event.
     *
     * @param  \App\Models\Register\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab( $plan->name ); // Recupera o "name" do plano e converte em "url"
    }

    /**
     * Handle the Plan "deleted" event.
     *
     * @param  \App\Models\Register\Plan  $plan
     * @return void
     */
    public function deleted(Plan $plan)
    {
        //
    }

    /**
     * Handle the Plan "restored" event.
     *
     * @param  \App\Models\Register\Plan  $plan
     * @return void
     */
    public function restored(Plan $plan)
    {
        //
    }

    /**
     * Handle the Plan "force deleted" event.
     *
     * @param  \App\Models\Register\Plan  $plan
     * @return void
     */
    public function forceDeleted(Plan $plan)
    {
        //
    }
}
