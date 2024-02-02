@extends('site.layout')
@section('conteudo')
    
<div class="row container">

    <h5>Seu carrinho possui {{ $itens->count() }} produtos.</h5>
        
    <table class="striped">

        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        @foreach ($itens as $item)
            <tr>
              <td><img src="attributes->image}}" alt="" width="70px" class="responsive-img circle"></td>
              <td>{{$item->name}}</td>
              <td>R${{ number_format($item->price, 2, ',', '.') }}</td>
              <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" name="quantity" value="{{$item->quantity}}"></td>
              <td> 
                <button class="btn-floating waves-effect waves-light orange"> <i class="material-icons">refresh</i></button>
                <button class="btn-floating waves-effect waves-light red"> <i class="material-icons">delete</i></button>
              </td>
            </tr>
        @endforeach
        </tbody>

      </table>

      <div class="row container center">
        <button class="btn waves-effect waves-light azul"> Continuar comprando <i class="material-icons">arrow_back</i></button>
        <button class="btn waves-effect waves-light azul"> Limpar carrinho <i class="material-icons">clear</i></button>
        <button class="btn waves-effect waves-light green"> Finalizar pedido <i class="material-icons">check</i></button>
      </div>

    </div>

@endsection