<?php

namespace App\Http\Controllers\Register\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register\Product\Product;
use App\Http\Requests\Register\Product\StoreUpdateFormRequest;
use Illuminate\Support\Facades\Storage;

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
        $products = $this->repository->latest()->paginate(); // Recupera, ordena e pagina todos os dados

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
        $input = $request->all(); // Recupera todos os dados do input
        $tenant = auth()->user()->tenant; // Recupera o tenant logado

        // Verifica
        if ( $request->hasFile( 'image' ) && $request->image->isValid() ) {
            $input[ 'image' ] = $request->image->store( "tenants/{$tenant->uuid}/products" ); // Salva a imagem
        }

        $this->repository->create( $input ); // Cadastra o(s) registro(s)

        return redirect()->route( 'product.index' ); // Retorna e redireciona para a view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        // Verifica se não encontrou o registro pelo "$id"
        if ( !$product = $this->repository->find( $id ) )
            return redirect()->back(); // Retorna para a página de origem

        return view( 'pages.register.product.show', compact( 'product' ) ); // Retorna a view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        // Verifica se não encontrou o registro pelo "$id"
        if ( !$product = $this->repository->find( $id ))
            return redirect()->back(); // Retorna para a página de origem

        return view( 'pages.register.product.create-edit', compact( 'product' ) ); // Retorna a view
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
        // Verifica se não encontrou o registro pelo "$id"
        if ( !$product = $this->repository->find( $id ) )
            return redirect()->back(); // Retorna para a origem da requisição

        $input = $request->all(); // Recupera todos os dados do input
        $tenant = auth()->user()->tenant; // Recupera o tenant logado

        // Verifica
        if ( $request->hasFile( 'image' ) && $request->image->isValid() ) {

            if ( Storage::exists( $product->image ) ) {
                Storage::delete( $product->image );
            }

            $input[ 'image' ] = $request->image->store( "tenants/{$tenant->uuid}/products" ); // Salva a imagem
        }

        $product->update( $input ); // Atualiza o(s) registro(s)

        return redirect()->route( 'product.index' ); // Retorna e redireciona para a view
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        // Verifica se não encontrou o registro pelo "$id"
        if ( !$product = $this->repository->find( $id ) )
            return redirect()->back(); // Retorna para a página de origem

        if ( Storage::exists( $product->image ) ) {
                Storage::delete( $product->image );
        }

        $product->delete(); // Deleta o registro

        return redirect()->route( 'product.index' ); // Retorna e redireciona para a view
    }

    public function search( Request $request )
    {
        $filters = $request->except( '_token' ); // Filtra, exceto o "token"

        $products = $this->repository->search( $request->filter ); // Método "search" "Model Plan"

        return view( 'pages.register.product.index', compact( 'products', 'filters' ) ); // Retorna a view
    }

} // ProductController
