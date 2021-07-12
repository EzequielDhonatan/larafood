<div class="row">

    <div class="col-sm-5 col-xs-5 col-lg-5 col-md-5">

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $plan->name ?? old( 'name' ) }}">
        </div>

    </div>

    <div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $plan->price ?? old( 'price' ) }}">
        </div>

    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

        <div class="form-group">
            <div class="form-outline">
                <textarea class="form-control" rows="4" id="description" name="description" value="{{ $plan->description ?? old( 'description' ) }}">{{ $plan->description ?? old( 'description' ) }}</textarea>
                <label for="description" class="form-label">Descrição</label>
            </div>
        </div>

    </div>

</div> <!-- row -->

<br>
