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

        $details = $plan->details()->latest()->paginate();

        return view( 'pages.system.panel.register.plan.details.index',
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
    public function create( $urlPlan )
    {
        if ( !$plan = $this->plan->where( 'url', $urlPlan )->first() )
            return redirect()->back();

        return view( 'pages.system.panel.register.plan.details.create-edit',
        [
            'plan'      => $plan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, $urlPlan )
    {
        if ( !$plan = $this->plan->where( 'url', $urlPlan )->first() )
            return redirect()->back();

        // $data = $request->all();
        // $data[ 'plan_id' ] = $plan->id;
        // $this->repository->create( $data );

        $plan->details()->create( $request->all() );

        return redirect()->route( 'detail-plan.index', $plan->url );
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
    public function edit( $urlPlan, $idDetail )
    {
        $plan = $this->plan->where( 'url', $urlPlan )->first();
        $detail = $this->repository->find( $idDetail );

        if ( !$plan || !$idDetail )
            return redirect()->back();

        return view( 'pages.system.panel.register.plan.details.create-edit',
        [
            'plan'          => $plan,
            'detail'        => $detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $urlPlan, $idDetail )
    {
        $plan = $this->plan->where( 'url', $urlPlan )->first();
        $detail = $this->repository->find( $idDetail );

        if ( !$plan || !$idDetail )
            return redirect()->back();

        $detail->update( $request->all() );

        return redirect()->route( 'detail-plan.index', $plan->url );
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
