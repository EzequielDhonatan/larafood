<x-app-layout>

    <x-slot name="header">

        <div class="row">

            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'dashboard' ) }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'plan.index' ) }}">Planos</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'plan.show', $plan->url ) }}">{{ $plan->name }}</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Detalhes do plano
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

                            <h1 class="text-center">Detalhes do plano</h1>

                            <div class="text-right">

                                <a class="btn btn-rounded btn-outline-black" href="{{  route( 'detail-plan.create', $plan->url ) }}">
                                    Novo
                                </a>

                            </div> <!-- text-right -->

                        </div> <!-- -->

                    </div> <!-- row -->

                    <br>

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <div class="table-responsive">

                                <table class="table table-hover table-sm">

                                    <thead>

                                        <tr>

                                            <th width="100" scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th></th>

                                        </tr> <!-- -->

                                    </thead> <!-- -->

                                    <tbody>

                                    @forelse( $details as $detail )

                                        <tr>

                                            <th scope="row">
                                                <a href="{{ route( 'plan.edit', $plan->url ) }}">
                                                    {{ $detail->id }}
                                                </a>
                                            </th>

                                            <td>
                                                <a href="{{ route( 'plan.edit', $plan->url ) }}">
                                                    {{ $detail->name }}
                                                </a>
                                            </td>

                                            <td>

                                                <form method="POST" action="{{ route( 'plan.destroy', $plan->url ) }}">

                                                    <a class="fas fa-eye" href="{{ route( 'plan.show', $plan->url ) }}"></a>

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

                                    @endforelse

                                    </tbody> <!-- -->

                                </table> <!-- -->

                            </div> <!-- table-responsive -->

                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                    </div> <!-- row -->

                    <div class="card footer">

                        @if( isset( $filters ) )
                            {!! $details->appends( $filters )->links() !!}
                        @else
                            {!! $details->links() !!}
                        @endif

                    </div> <!-- card footer -->

                </div> <!-- p-6 sm:px-20 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
