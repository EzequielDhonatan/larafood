<?php

namespace App\Http\Controllers\Register\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register\Plan\Plan;
use App\Http\Requests\Register\Plan\StoreUpdateFormRequest;

class PlanController extends Controller
{
    private $repository;

    public function __construct( Plan $plan )
    {
        $this->repository = $plan;

    } // __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = $this->repository->latest()->paginate(); // Recupera, ordena e pagina

        return view(

            'pages.register.plan.index',
            [
                'plans' => $plans
            ]

        ); // retorna a view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'pages.register.plan.create-edit' ); // Retorna a view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreUpdateFormRequest $request)
    {
        $this->repository->create( $request->all() ); // Cadastra

        return redirect()->route( 'plan.index' ); // Retorna e redireciona para a view "index"
    }

    /**plan
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $url )
    {
        $plan = $this->repository->where( 'url', $url )->first(); // Recupera o primeiro registro pela "url"

        if ( !$plan )
            return redirect()->back(); // Verifica se não encontrou o registro pela "url" e retorna para a página de origem

        return view(

            'pages.register.plan.show',
            [
                'plan' => $plan
            ]

        ); // retorna a view
    }

    /**
     * Show the form for editing the specified resource.
     *redirect()->route
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $url )
    {
        $plan = $this->repository->where( 'url', $url )->first(); // Recupera o primeiro registro pela "url"

        if ( !$plan )
            return redirect()->back(); // Verifica se não encontrou o registro pela "url" e retorna para a página de origem

        return view(

            'pages.register.plan.create-edit',
            [
                'plan' => $plan
            ]

        ); // retorna a view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( StoreUpdateFormRequest $request, $url )
    {
        $plan = $this->repository->where( 'url', $url )->first(); // Recupera o primeiro registro pela "url"

        if ( !$plan )
            return redirect()->back(); // Verifica se não encontrou o registro pela "url" e retorna para a página de origem

        $plan->update( $request->all() ); // Atualiza

        return redirect()->route( 'plan.index' ); // Retorna e redireciona para a view "index"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $url )
    {
        $plan = $this->repository->with( 'details' )->where( 'url', $url )->first(); // Recupera o primeiro registro pela "url"

        if ( !$plan )
            return redirect()->back(); // Verifica se não encontrou o registro pela "url" e retorna para a página de origem

        if ( $plan->details->count() > 0 )
            return redirect()->back()->with( 'error', 'Ops... Existem detalhes vinculados a esse plano, portanto o mesmo não pode ser deletado!' );

        $plan->delete(); // Deleta

        return redirect()->route( 'plan.index' ); // Retorna e redireciona para a view "index"
    }

    public function search( Request $request )
    {
        $filters = $request->except( '_token' ); // Filtra, exceto o "token"

        $plans = $this->repository->search( $request->filter ); // Método "search" "Model Plan"

        return view(

            'pages.register.plan.index',
            [
                'plans'     => $plans,
                'filters'   => $filters
            ]

        ); // retorna a view
    }

} // PlanController
