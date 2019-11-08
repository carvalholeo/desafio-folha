@extends('layout.app', ["current" => "home"])

@section('title', 'Destino dos Engenheiros | Desafio Folha de S.Paulo')

@section('body')

<div class="container">
    <div class="card border">
        <div class="card-header">

@include('components.flash-messages')

            <div class="card-title">
                <h2>Qual o destino dos engenheiros?</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="text-justify">Sabendo que a resposta correta para o desafio é <strong>PROCION</strong>,
             você pode brincar com outros nomes de sistemas estelares, junto com a quantidade de engenheiros e verificar
              se está correto :)
            </p>
            <hr />
        
            <form method="POST" id="contactForm" action="{{ route('index.send') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="star">Sistema Estelar</label>
                    <select id="star" name="star" class="form-control" required>
                        <option disabled>Escolha uma opção</option>
                        <option value="SIRIUS">SIRIUS</option>
                        <option value="LALANDE">LALANDE</option>
                        <option value="PROCION">PROCION</option>
                        <option value="ALPHA CENTAURI">ALPHA CENTAURI</option>
                        <option value="BARNARD">BARNARD</option>
                    </select>
                </div>
                <hr />
                <p>Para brincar com outros sistemas estelares, digite as informações abaixo </p>
                <div class="form-group">
                    <label for="customStar">Sistema Estelar</label>
                    <input type="text" id="customStar" name="customStar" class="form-control" placeholder="Digite o nome de um sistema estelar">
                </div>
                <div class="form-group">
                    <label for="engineers">Quantidade de engenheiros</label>
                    <input type="number" id="engineers" name="engineers" class="form-control" placeholder="Digite a quantidade de engenheiros" min=0>
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Enviar</button>
                <button type="cancel" class="btn btn-danger" id="cancel">Apagar</button>
            </form>
        </div>        
    </div>
</div>

@endsection