<div class="row">

    <div class="col-sm-10 col-xs-10 col-lg-10 col-md-10">

        <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $product->title ?? old( 'title' ) }}">
        </div>

    </div>

    <div class="col-sm-2 col-xs-2 col-lg-2 col-md-2">

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $product->price ?? old( 'price' ) }}">
        </div>

    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

        <div class="form-group">
            <div class="form-outline">
                <textarea class="form-control" rows="4" id="description" name="description" value="{{ $product->description ?? old( 'description' ) }}">{{ $product->description ?? old( 'description' ) }}</textarea>
                <label for="description" class="form-label">Descrição</label>
            </div>
        </div>

    </div>

</div> <!-- row -->

<br>
