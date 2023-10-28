@extends('layouts.app')

@section('content')
    <!-- Modal Criar Permissão -->
    <div class="modal fade" id="createPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Nova Permissão') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Registre funções na sua conta para facilitar a organização.') }}</p>

                    <form action="{{ route('permissions.create') }}" method="post" id="createNewUserPermission">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>

                        <h5 class="text-bold"><b>{{ __('Funções') }}</b></h5>

                        <div>
                            <input type="radio" name="funcao" id="" value="1" checked required> {{ __('Criar Novos Locais') }}
                        </div>

                        <div>
                            <input type="radio" name="funcao" id="" value="2"> {{ __('Acessar Permissões') }}
                        </div>

                        <div>
                            <input type="radio" name="funcao" id="" value="3"> {{ __('Ambos') }}
                        </div>
                    </form>
                </div>
                <div class="text-center p-3">
                    <button type="button" class="btn btn-success rounded-0 w-100"
                        onclick="event.preventDefault(); document.getElementById('createNewUserPermission').submit();">Enviar solicitação de permissão</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Permissão -->
    <div class="modal fade" id="editPermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Visualizar/Editar Permissão') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Edite funções na sua conta para facilitar a organização.') }}</p>

                    <form action="" method="post" id="updateUserPermission">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>

                        <h5 class="text-bold"><b>{{ __('Funções') }}</b></h5>

                        <div>
                            <input type="radio" name="funcao" id="" value="1" required> {{ __('Criar Novos Locais') }}
                        </div>

                        <div>
                            <input type="radio" name="funcao" id="" value="2"> {{ __('Acessar Permissões') }}
                        </div>

                        <div>
                            <input type="radio" name="funcao" id="" value="3"> {{ __('Ambos') }}
                        </div>
                    </form>
                </div>
                <div class="text-center p-3">
                    <button type="button" class="btn btn-success rounded-0 w-100"
                        onclick="event.preventDefault(); document.getElementById('updateUserPermission').submit();">Atualizar permissão</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Excluir Permissão -->
    <div class="modal fade" id="deletePermission" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Excluir Permissão') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Tem certeza que você deseja exluir este usuário?') }}</p>
                    <p>{{ __('Após a confirmação não será possível obter novamente dados deste usuário.') }}</p>

                    <form action="{{ route('permissions.delete') }}" method="post" id="deleteUserPermission">
                        @csrf
                        <input type="text" hidden name="id">
                    </form>
                </div>
                <div class="text-center p-3">
                    <button type="button" class="btn btn-danger rounded-0 w-100"
                        onclick="event.preventDefault(); document.getElementById('deleteUserPermission').submit();">Excluir</button>
                </div>
            </div>
        </div>
    </div>
  

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ __('Permissões') }}</h2>

                <button class="btn btn-success w-100 mt-4 rounded-0" data-bs-toggle="modal" data-bs-target="#createPermission">
                    Criar Nova Permissão
                </button>

                <div class="card mt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ __($item->name) }}</td>
                                    <td class="text-center"><span class="badge bg-success">{{ __('Ativo') }}</span></td>
                                    <td class="text-center">
                                        @if ($item->id == Auth::user()->id)
                                            <b>(Você)</b>
                                        @else
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editPermission"
                                                onclick="$('#updateUserPermission').attr('action', '{{ route('permissions.update', ['id_user' => $item->id]) }}')
                                                    $('#updateUserPermission [name=nome]').val('{{ $item->name }}')
                                                    $('#updateUserPermission [name=email]').val('{{ $item->email }}')
                                                    $('#updateUserPermission input[type=radio][value={{ $item->permission_level }}]').prop('checked', true);"><i class="text-secondary fa-regular fa-pen-to-square"></i></a>

                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deletePermission"
                                                onclick="$('[name=id]').val('{{ __($item->id) }}')"><i class="text-secondary fa-regular fa-trash-can"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection