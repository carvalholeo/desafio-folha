<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark rounded">
    <a class="navbar-brand" href="{{ route('index') }}">

    <img src="{{ asset('storage/images/logo_folha.png') }}" class="rounded img-fluid"
                                    alt="Logo da Folha de S.Paulo" title="Logo da Folha de S.Paulo">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if($current=='home') active @endif ">
                <a class="nav-link" href="{{ route('index') }}">
                    <i class="fa fa-home"></i>
                    Página Inicial
                </a>
            </li>
        </ul>
    </div>
</nav>