@if ( session( 'success' ) )
    <div class="alert alert-success">
        <strong>{{ session( 'success' ) }}</strong>
    </div>
@endif

@if ( session( 'error' ) )
    <div class="alert alert-error">
        <strong>{{ session( 'error' ) }}</strong>
    </div>
@endif

@if ( session( 'message' ) )
    <div class="alert alert-info">
        <strong>{{ session( 'message' ) }}</strong>
    </div>
@endif
