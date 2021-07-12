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

                        <li class="breadcrumb-item active" aria-current="page">
                            Dados do plano
                        </li>

                    </ol> <!-- breadcrumb -->

                </nav> <!-- breadcrumb -->

            </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

        </div> <!-- row -->

    </x-slot> <!-- -->

    <div class="messages">

        @include( 'pages.system.panel.includes.alerts' ) <!-- Alerts -->
        @include( 'pages.system.panel.includes.errors' ) <!-- Errors -->

    </div> <!-- messages -->

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    @if ( isset( $plan ) )

                        <form class="form" method="POST" action="{{ route( 'plan.update', $plan->url ) }}">

                        {!! method_field('PUT') !!}

                    @else

                        <form class="form" method="POST" action="{{ route( 'plan.store' ) }}">

                    @endif

                        {{ csrf_field() }}

                        @include( 'pages.system.panel.register.plan._partials.general' )

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <div class="form-group">
                                <button type="submit" class="btn btn-rounded btn-outline-black">Salvar</button>
                                <a class="btn btn-rounded btn-outline-danger" href="{{ route( 'plan.index' ) }}">Cancelar</a>
                            </div>

                        </div>

                    </div> <!-- row -->

                    </form> <!-- form -->

                </div> <!-- p-6 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
