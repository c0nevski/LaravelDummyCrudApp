@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ( $successMsg = Session::get('success') )
    <div class="alert alert-success alert-block">
        <button class="close" type="button" data-dismiss="alert">x</button>
        <strong>{{ $successMsg }}</strong>
    </div>
@endif