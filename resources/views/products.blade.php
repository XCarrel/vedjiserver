@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Administration des produits
            </div>

            <div class="links">
                <a href="/">Accueil</a>
                <a href="/admin">Administration</a>
            </div>

            <table class="flex-center" style="padding-top: 20px;">
                <tr>
                    <th>Produits</th>
                    <th>Stock</th>
                    <th>Prix</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->productName}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->price}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection