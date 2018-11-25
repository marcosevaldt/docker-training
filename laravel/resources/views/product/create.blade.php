@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Produtos</div>
              <div class="card-body">
                <form method="POST" action="{{ route('product.store') }}">
                    <div class="form-group">
                      <label for="name">Nome do Produto</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                      <label for="description">Descrição</label>
                      <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                      <label for="price">Valor Unitário</label>
                      <input type="text" class="form-control" name="price">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar">
                @csrf
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection