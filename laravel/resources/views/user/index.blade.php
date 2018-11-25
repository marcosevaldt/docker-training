@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Usuários</div>
              <div class="card-body">
                <table class="table table-bordered datatable">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>Telefone</th>
                      <th>Documento</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->document }}</td>
                    </tr>
                    @empty
                        <p>Nenhum usuário cadastrado!</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
