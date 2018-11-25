@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">Mensagens</div>
              <div class="card-body">
                <table class="table table-bordered datatable">
                  <thead>
                    <tr>
                      <th>Mensagem</th>
                      <th>Quem Enviou</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($messages as $message)
                    <tr>
                      <td>{{ $message->description }}</td>
                      <td>{{ $message->user->name }}</td>
                      <td>
                        <a href="{{ route('message.update.status', [
                          'id' => $message->id,
                          'status' => $message_readed->id
                        ]) }}" class="btn btn-sm btn-primary">Marcar como lida</a>
                      </td>
                    </tr>
                    @empty
                        <p>Nenhuma mensagem recebida!</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection