<?php

namespace App\Http\Controllers\Register\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register\Product\Product;
use App\Http\Requests\Register\Product\StoreUpdateFormRequest;

class ProductController extends Controller
{
    private $repository;

    public function __construct( Product $product )
    {
        $this->repository = $product;

    } // __construct

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->latest()->paginate(); // Recupera, ordena e pagina

        return view( 'pages.register.product.index', compact( 'products') ); // retorna a view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'pages.register.product.create-edit' ); // Retorna a view
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

        return redirect()->route( 'product.index' ); // Retorna e redireciona para a view "index"
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $product = $this->repository->find( $id ); // Recupera o pelo "$id"

        if ( !$product )
            return redirect()->back(); // Verifica se não encontrou o registro pelo "$id" e retorna para a página de origem

        return view( 'pages.register.product.show', compact( 'product' ) ); // retorna a view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $product = $this->repository->find( $id ); // Recupera o pelo "$id"

        if ( !$product )
            return redirect()->back(); // Verifica se não encontrou o registro pelo "$id" e retorna para a página de origem

        return view( 'pages.register.product.create-edit', compact( 'product' ) ); // retorna a view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $product = $this->repository->find( $id ); // Recupera o pelo "$id"

        if ( !$product )
            return redirect()->back(); // Verifica se não encontrou o registro pelo "$id" e retorna para a página de origem

        $product->update( $request->all() ); // Atualiza

        return redirect()->route( 'product.index' ); // Retorna e redireciona para a view "index"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $product = $this->repository->find( $id ); // Recupera o pelo "$id"

        if ( !$product )
            return redirect()->back(); // Verifica se não encontrou o registro pelo "$id" e retorna para a página de origem

        $product->delete(); // Deleta

        return redirect()->route( 'product.index' ); // Retorna e redireciona para a view "index"
    }

    public function search( Request $request )
    {
        $filters = $request->except( '_token' ); // Filtra, exceto o "token"

        $products = $this->repository->search( $request->filter ); // Método "search" "Model Plan"

        return view( 'pages.register.product.index', compact( 'products', 'filters' ) ); // retorna a view
    }

} // ProductController
