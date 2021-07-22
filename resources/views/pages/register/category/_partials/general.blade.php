<div class="row">

    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name ?? old( 'name' ) }}">
        </div>

    </div>

</div> <!-- row -->

<br>

<div class="row">

    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">

        <div class="form-group">
            <div class="form-outline">
                <textarea class="form-control" rows="4" id="description" name="description" value="{{ $category->description ?? old( 'description' ) }}">{{ $category->description ?? old( 'description' ) }}</textarea>
                <label for="description" class="form-label">Descrição</label>
            </div>
        </div>

    </div>

</div> <!-- row -->

<br>
