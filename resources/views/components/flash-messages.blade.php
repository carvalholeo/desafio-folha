@if($errors->any())
    @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endforeach
@endif

@if ($message = Session::get('default'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    {{ $message }}
            </div>
@endif

@if ($message = Session::get('customSuccess'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    {{ $message }}
            </div>
@endif

@if ($message = Session::get('customWrong'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    {{ $message }}
            </div>
@endif