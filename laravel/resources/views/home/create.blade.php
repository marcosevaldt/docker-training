@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Home Checkout</div>
              <div class="card-body">
                <form method="POST" action="{{ route('home.store') }}">
                    <div class="form-group">
                      <label for="name">Nome do Produto</label>
                      <input type="text" class="form-control" value="{{ $product->name }}" disabled="">
                    </div>
                    <div class="form-group">
                      <label for="description">Descrição</label>
                      <input type="text" class="form-control" value="{{ $product->description }}" disabled="">
                    </div>
                    <div class="form-group">
                      <label for="price">Valor Unitário</label>
                      <input type="text" class="form-control" value="{{ $product->price }}" disabled="">
                    </div>
                    <div class="form-group">
                      <label for="date">Data</label>
                      <input type="date" class="form-control" name="date" required="">
                    </div>
                    <input type="hidden" class="form-control" id="senderHash" name="senderHash">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input onclick="generateHash()" type="submit" class="btn btn-primary" value="Comprar">
                @csrf
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

<script type="text/javascript">
  function generateHash()
  {
      document.getElementById('senderHash').value = PagSeguroDirectPayment.getSenderHash();
  }
</script>