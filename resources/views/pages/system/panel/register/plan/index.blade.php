<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Planos' ) }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="text-right">

                <a class="btn btn-rounded btn-outline-black" href="{{  route( 'plan.create' ) }}">
                    Novo
                </a>

            </div> <!-- text-right -->

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

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

                            {!! $plans->links() !!}

                            @empty

                                <tr>
                                    <td colspan="200">Ops... Nenhum registro encontrado!</td>
                                </tr>

                            @endforelse

                            </tbody> <!-- -->

                        </table> <!-- -->

                    </div> <!-- table-responsive -->

                </div> <!-- flex flex-col -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
