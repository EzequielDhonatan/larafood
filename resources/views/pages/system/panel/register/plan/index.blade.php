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
                            Planos
                        </li>

                    </ol> <!-- breadcrumb -->

                </nav> <!-- breadcrumb -->

            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

        </div> <!-- row -->

    </x-slot> <!-- -->

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <h1 class="text-center">Planos</h1>

                            <div class="text-right">

                                <a class="btn btn-rounded btn-outline-black" href="{{  route( 'plan.create' ) }}">
                                    Novo
                                </a>

                            </div> <!-- text-right -->

                        </div> <!-- -->

                    </div> <!-- row -->

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <form class="form form-inline" method="POST" action="{{ route( 'plan.search' ) }}">

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

                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">URL</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col"></th>

                                        </tr> <!-- -->

                                    </thead> <!-- -->

                                    <tbody>

                                    @forelse( $plans as $plan )

                                        <tr>

                                            <th scope="row">{{ $plan->id }}</th>
                                            <td>{{ $plan->name }}</td>
                                            <td>{{ $plan->url }}</td>
                                            <td>R${{ number_format( $plan->price, 2, ',', ' ' ) }}</td>

                                            <td>

                                                <a class="fas fa-eye" href="{{ route( 'plan.show', $plan->url ) }}"></a>

                                                <form method="POST" action="{{ route( 'plan.destroy', $plan->url ) }}">

                                                    {{ csrf_field() }}
                                                    {!! method_field( 'DELETE' ) !!}

                                                    <button type="submit" class="far fa-trash-alt"></button>

                                                </form> <!-- -->

                                            </td> <!-- -->

                                        </tr> <!-- -->

                                    @empty

                                        <tr>
                                            <td class="text-center" colspan="200">Ops... Nenhum registro encontrado!</td>
                                        </tr>
                                        p-6 sm:px-20 bg-white border-b border-gray-200
                                    @endforelse

                                    </tbody> <!-- -->

                                </table> <!-- -->

                            </div> <!-- table-responsive -->

                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                    </div> <!-- row -->

                    <div class="card footer">

                        @if( isset( $filters ) )
                            {!! $plans->appends( $filters )->links() !!}
                        @else
                            {!! $plans->links() !!}
                        @endif

                    </div> <!-- card footer -->

                </div> <!-- p-6 sm:px-20 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
