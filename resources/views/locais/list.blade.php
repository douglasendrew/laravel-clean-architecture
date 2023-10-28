@extends('layouts.app')

@section('content')
    <!-- Modal Criar Local -->
    <div class="modal fade" id="createLocal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Nova Permissão') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Cadastre um novo local para seus eventos, este cadastro é direcionado a localização.') }}</p>

                    <form action="{{ route('locais.create') }}" method="post" id="createLocalForm">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nome Local" name="local_nome">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="CEP" name="local_cep">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Cidade" name="local_cidade">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Rua" name="local_rua">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Número" name="local_numero">
                        </div>
                    </form>
                </div>
                <div class="text-center p-3">
                    <button type="button" class="btn btn-success rounded-0 w-100"
                        onclick="event.preventDefault(); document.getElementById('createLocalForm').submit();">Criar novo local</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Excluir Permissão -->
    <div class="modal fade" id="deleteLocal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Excluir Local') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Tem certeza que você deseja exluir este local?') }}</p>
                    <div>{{ __('Após a confirmação não será possível obter novamente dados deste local.') }}</div>

                    <form action="{{ route('locais.delete') }}" method="post" id="deleteLocalForm">
                        @csrf
                        <input type="text" hidden name="id">
                    </form>
                </div>
                <div class="text-center p-3">
                    <button type="button" class="btn btn-danger rounded-0 w-100"
                        onclick="event.preventDefault(); document.getElementById('deleteLocalForm').submit();">Excluir</button>

                    <button class="btn btn-light rounded-0 w-100 mt-3"
                        type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Voltar</button>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal Editar Local -->
    <div class="modal fade" id="editLocal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Visualizar/Editar Permissão') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="updateLocalForm">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nome Local" name="local_nome" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="CEP" name="local_cep" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Cidade" name="local_cidade" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Rua" name="local_rua" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Número" name="local_numero" required>
                        </div>
                    </form>
                </div>
                <div class="text-center p-3">
                    <button type="button" class="btn btn-success rounded-0 w-100"
                        onclick="event.preventDefault(); document.getElementById('updateLocalForm').submit();">Editar local</button>
                </div>
            </div>
        </div>
    </div>
  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ __('Locais') }}</h2>

                <button class="btn btn-success w-100 mt-4 rounded-0" data-bs-toggle="modal" data-bs-target="#createLocal">
                    Criar Novo Local
                </button>

                <div class="card mt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome Local</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($locais as $item)
                                <tr>
                                    <td>{{ __($item->local_name) }}</td>
                                    <td class="text-center">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editLocal"
                                            onclick="
                                                $('#updateLocalForm').attr('action', '{{ route('locais.update', ['id_local' => $item->id]) }}')
                                                $('#updateLocalForm [name=local_nome]').val('{{ $item->local_name }}')
                                                $('#updateLocalForm [name=local_cep]').val('{{ $item->local_cep }}')
                                                $('#updateLocalForm [name=local_cidade]').val('{{ $item->local_city }}')
                                                $('#updateLocalForm [name=local_numero]').val('{{ $item->local_number }}')
                                                $('#updateLocalForm [name=local_rua]').val('{{ $item->local_address }}')"><i class="text-secondary fa-regular fa-pen-to-square"></i></a>

                                        <a href="#"
                                            data-bs-toggle="modal" data-bs-target="#deleteLocal"
                                            onclick="$('#deleteLocalForm [name=id]').val('{{ $item->id }}')"><i class="text-secondary fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $locais->links() }}
            </div>
        </div>
    </div>
@endsection