@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                Produtos
                <div style="float: right;">
                  <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Adicionar</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered datatable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Descrição</th>
                      <th>Valor Unitário</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description }}</td>
                      <td>R$ {{ $product->price }}</td>
                      <td>
                        <a href="{{ route('product.destroy', [
                          'id' => $product->id
                        ]) }}" class="btn btn-sm btn-danger">Deletar</a>
                      </td>
                    </tr>
                    @empty
                        <p>Nenhum produto cadastrado!</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection