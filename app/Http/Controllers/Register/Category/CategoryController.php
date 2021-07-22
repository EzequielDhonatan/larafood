<?php

namespace App\Http\Controllers\Register\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register\Category\Category;
use App\Http\Requests\Register\Category\StoreUpdateFormRequest;

class CategoryController extends Controller
{
    private $repository;

    public function __construct( Category $category )
    {
        $this->repository   = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->latest()->paginate(); // Recupera, ordena e pagina

        return view( 'pages.register.category.index', compact( 'categories') ); // retorna a view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'pages.register.category.create-edit' ); // Retorna a view
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

        return redirect()->route( 'category.index' ); // Retorna e redireciona para a view "index"
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

    public function search( Request $request )
    {
        # code...
    }

} // CategoryController
