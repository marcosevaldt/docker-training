@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                Reservas Realizadas
              </div>
              <div class="card-body">
                <table class="table table-bordered datatable">
                  <thead>
                    <tr>
                      <td>Descrição</td>
                      <th>Status</th>
                      <th>Produto</th>
                      <th>Link</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($sales as $sale)
                    <tr>
                      <td>{{ $sale->product->name }}</td>
                      <td>{{ $sale->status->name }}</td>
                      <td width="30px;">
                        <a href="{{ route('product.show', [
                        'id'      => $sale->product_id,
                        'sale_id' => $sale->id,
                        ]) }}">Detalhes</a>
                      </td>
                      <td width="30px;">
                        <a href="{{ $sale->payment_link }}">Acessar</a>
                      </td>
                      <td width="135px;">
                      <a href="{{ route('home.status', [
                        'code' => $sale->code,
                        'id'   => $sale->id,
                      ]) }}" class="btn btn-sm btn-primary">Atualizar</a>
                      <a href="{{ route('sale.destroy', [
                        'id' => $sale->id
                      ]) }}" class="btn btn-sm btn-danger">Deletar</a>
                      </td>
                    </tr>
                    @empty
                        <p>Nenhuma compra realizada!</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
      </div>
      <div class="col-md-12" style="margin-top: 15px;">
          <div class="card">
              <div class="card-header">
                Reservas Confirmadas
              </div>
              <div class="card-body">
                <table class="table table-bordered datatable">
                  <thead>
                    <tr>
                      <td>Descrição</td>
                      <th>Status</th>
                      <th>Produto</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($reservations as $reservation)
                    <tr>
                      <td>{{ $reservation->sale->product->name }}</td>
                      <td>{{ $reservation->status->name }}</td>
                      <td width="30px;">
                        <a href="{{ route('product.show', [
                        'id'      => $reservation->sale->product_id,
                        'sale_id' => $reservation->sale->id,
                        ]) }}">Detalhes</a>
                      </td>
                    </tr>
                    @empty
                        <p>Nenhuma compra realizada!</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection