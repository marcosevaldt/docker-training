@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Detalhes do Produto</div>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nome do Produto</label>
                  <input type="text" class="form-control" name="name" disabled="" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                  <label for="description">Descrição</label>
                  <input type="text" class="form-control" name="description" disabled="" value="{{ $product->description }}">
                </div>
                <div class="form-group">
                  <label for="price">Valor Unitário</label>
                  <input type="text" class="form-control" name="price" disabled="" value="R$ {{ $product->price }}">
                </div>
                <div class="form-group">
                  <label for="price">Data Reserva</label>
                  <input type="text" class="form-control" name="price" disabled="" value="{{ $sale->date->format('d/m/Y') }}">
                </div>
                <div class="form-group">
                  <label for="price">Código de Compra</label>
                  <input type="text" class="form-control" name="price" disabled="" value="{{ $sale->code }}">
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection