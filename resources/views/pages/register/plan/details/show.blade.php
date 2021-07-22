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

                        <li class="breadcrumb-item">
                            <a href="{{ route( 'detail-plan.index', $plan->url ) }}">Detalhes</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Detalhes do detalhe do plano
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

                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <ul>

                                <li>
                                    <strong>Nome:</strong> {{ $detail->name }}
                                </li>

                            </ul> <!-- -->

                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                    </div> <!-- row -->

                    <br>

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <div class="form-group">
                                <a class="btn btn-rounded btn-outline-primary" href="{{ route( 'detail-plan.index', $plan->url ) }}">
                                    Voltar
                                </a>
                            </div>

                        </div> <!-- -->

                    </div> <!-- row -->

                </div> <!-- p-6 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
