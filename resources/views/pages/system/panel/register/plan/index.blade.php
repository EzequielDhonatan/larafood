<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __( 'Planos' ) }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex flex-col">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-100">

                                        <tr>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nome
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                URL
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Preço
                                            </th>

                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only"></span>
                                            </th>

                                        </tr> <!-- -->

                                    </thead> <!-- bg-gray-50 -->

                                    <tbody class="bg-white divide-y divide-gray-200">

                                        @foreach( $plans as $plan )

                                            <tr>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $plan->name }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $plan->url }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $plan->price }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </td>

                                            </tr> <!-- -->

                                        @endforeach

                                    </tbody> <!-- bg-white divide-y divide-gray-200 -->

                                </table> <!-- min-w-full divide-y divide-gray-200 -->

                                {!! $plans->links() !!}

                            </div> <!-- shadow overflow-hidden border-b border-gray-200 sm:rounded-lg -->

                        </div> <!-- py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 -->

                    </div> <!-- -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 -->

                </div> <!-- flex flex-col -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
