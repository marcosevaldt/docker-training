@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Migrações</div>
              <div class="card-body">
                <form method="POST" action="{{ route('migration.create') }}">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Selecionar Migração</label>
                      <select class="form-control" name="migrationType">
                          <option value="1">Clientes</option>
                      </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Migrar!">
                @csrf
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
