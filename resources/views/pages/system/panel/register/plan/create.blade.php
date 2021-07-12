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

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">

                        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                            <form method="POST" action="{{ route( 'plan.store' ) }}">

                                {{ csrf_field() }}

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-sm-5 col-xs-5 col-lg-5 col-md-5">

                                                <div class="form-group">
                                                    <label for="name">Nome</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>

                                            </div>

                                            <div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">

                                                <div class="form-group">
                                                    <label for="price">Preço</label>
                                                    <input type="text" class="form-control" id="price" name="price">
                                                </div>

                                            </div>

                                        </div> <!-- row -->

                                        <br>

                                        <div class="row">

                                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                                <div class="form-group">
                                                    <div class="form-outline">
                                                        <textarea class="form-control" rows="4" id="description" name="description"></textarea>
                                                        <label for="description" class="form-label">Descrição</label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div> <!-- row -->

                                        <br>

                                        <div class="row">

                                            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-rounded btn-outline-black">Salvar</button>
                                                    <a class="btn btn-rounded btn-outline-danger" href="{{ route( 'plan.index' ) }}">Cancelar</a>
                                                </div>

                                            </div>

                                        </div> <!-- row -->

                                    </div> <!-- card-body -->

                                </div> <!-- card -->

                            </form> <!-- -->

                        </div> <!-- col-sm-12 col-xs-12 col-lg-12 col-md-12 -->

                    </div> <!-- row -->

                </div> <!-- p-6 bg-white border-b border-gray-200 -->

            </div> <!-- bg-white overflow-hidden shadow-xl sm:rounded-lg -->

        </div> <!-- max-w-7xl mx-auto sm:px-6 lg:px-8 -->

    </div> <!-- py-12 -->

</x-app-layout> <!-- -->
