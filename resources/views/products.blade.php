@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Administration des produits
            </div>

            <div class="links" style="padding-bottom: 30px;">
                <a href="/">Accueil</a>
                <a href="/admin">Administration</a>
            </div>

            <table class="table table-striped table-hover">
                <tr>
                    <th>Produits</th>
                    <th>Stock</th>
                    <th>Prix</th>
                    <th>Unité</th>
                    <th colspan="2">Actions</th>
                </tr>

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->productName}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->units->unitName}}</td>
                        <td>
                            <form method="post" action="/products/delete">
                                @csrf
                                <button name="del" value="{{$product->id}}" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        <td>
                            <a name="update" href="/products/getProducts/{{$product->id}}" class="btn btn-warning">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            
            <a href="/products/showAdd" style="margin-top:20px" class="btn btn-primary">Ajouter un produit</a>
        </div>
    </div>
@endsection