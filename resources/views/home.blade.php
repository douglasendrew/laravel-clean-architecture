@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h6>Olá,</h6>
            <h2>{{ Auth::user()->name }}</h2>

            <hr>

            Acesse as funcionalidades do sistema clicando no seu nome do canto superior direito
        </div>
    </div>
</div>
@endsection
