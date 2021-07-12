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
                                        <a href="#">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </a>
                                    </td>

                                </tr> <!-- -->

                            {!! $plans->links() !!}

                            @empty

                                <div class="text-center">
                                    <h4>Ops... Nenhum registro encontrado!</h4>
                                </div>

                            @endforelse

                            </tbody> <!-- -->

                        </table> <!-- -->

                    </div> <!-- table-responsive -->

                </div> <!-- flex flex-col -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
