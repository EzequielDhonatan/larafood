<?php

namespace App\Http\Controllers\System\Panel\Register\DetailPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\System\Panel\Register\DetailPlan\DetailPlan;
use App\Models\System\Panel\Register\Plan\Plan;

class DetailPlanController extends Controller
{
    private $repository, $plan;

    public function __construct( DetailPlan $detailPlan, Plan $plan )
    {
        $this->repository   = $detailPlan;
        $this->plan         = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $urlPlan )
    {
        if ( !$plan = $this->plan->where( 'url', $urlPlan )->first() )
            return redirect()->back();

        $details = $plan->details()->paginate();

        return view( 'pages.system.panel.register.plan.details',
        [
            'plan'      => $plan,
            'details'   => $details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
