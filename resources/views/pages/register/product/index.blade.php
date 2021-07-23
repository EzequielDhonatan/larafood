<x-app-layout>

    <x-slot name="header">

        <div class="row">

            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'dashboard' ) }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Produtos
                        </li>

                    </ol> <!-- breadcrumb -->

                </nav> <!-- breadcrumb -->

            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

        </div> <!-- row -->

    </x-slot> <!-- -->

    <div class="messages">

        @include( 'pages.includes.alerts' ) <!-- Alerts -->
        @include( 'pages.includes.errors' ) <!-- Errors -->

    </div> <!-- messages -->

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <h1 class="text-center">Produtos</h1>

                            <div class="text-right">

                                <a class="btn btn-rounded btn-outline-black" href="{{  route( 'product.create' ) }}">
                                    Novo
                                </a>

                            </div> <!-- text-right -->

                        </div> <!-- -->

                    </div> <!-- row -->

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <form class="form form-inline" method="POST" action="{{ route( 'product.search' ) }}">

                                {{ csrf_field() }}

                                <div class="input-group">

                                    <div class="form-outline">
                                        <input type="text" class="form-control" id="filter" name="filter" value="{{ $filters[ 'filter' ] ?? '' }}"/>
                                        <label class="form-label" for="filter">Nome</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>

                                </div> <!-- input-group -->

                            </form> <!-- form form-inline -->

                        </div> <!-- -->

                    </div> <!-- row --->

                    <br>

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <div class="table-responsive">

                                <table class="table table-hover table-sm">

                                    <thead>

                                        <tr>

                                            <th width="100" scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col"></th>

                                        </tr> <!-- -->

                                    </thead> <!-- -->

                                    <tbody>

                                    @forelse( $products as $product )

                                        <tr>

                                            <th scope="row">
                                                <a href="{{ route( 'product.edit', $product->id ) }}">
                                                    {{ $product->id }}
                                                </a>
                                            </th>

                                            <td>
                                                <a href="{{ route( 'product.edit', $product->id ) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ route( 'product.edit', $product->id ) }}">
                                                    R${{ number_format( $product->price, 2, ',', ' ' ) }}
                                                </a>
                                            </td>

                                            <td>

                                                <form method="POST" action="{{ route( 'product.destroy', $product->id ) }}">

                                                    <a style="padding-right: 5px;" class="fas fa-eye" href="{{ route( 'product.show', $product->id ) }}"></a>

                                                    {{ csrf_field() }}
                                                    {!! method_field( 'DELETE' ) !!}

                                                    <button style="color: red" type="submit" class="far fa-trash-alt"></button>

                                                </form> <!-- -->

                                            </td> <!-- -->

                                        </tr> <!-- -->

                                    @empty

                                        <tr>
                                            <td class="text-center" colspan="200">Ops... Nenhum registro encontrado!</td>
                                        </tr>

                                    @endforelse

                                    </tbody> <!-- -->

                                </table> <!-- -->

                            </div> <!-- table-responsive -->

                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                    </div> <!-- row -->

                    <div class="card footer">

                        @if( isset( $filters ) )
                            {!! $products->appends( $filters )->links() !!}
                        @else
                            {!! $products->links() !!}
                        @endif

                    </div> <!-- card footer -->

                </div> <!-- p-6 sm:px-20 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
