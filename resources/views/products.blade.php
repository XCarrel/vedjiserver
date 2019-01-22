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
                                <form method="post" action="/products/del">
                                    @csrf
                                    <button name="del" value="{{$product->id}}" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="/products/updateProduct">
                                    @csrf
                                    <button name="update" value="{{$product->id}}" class="btn btn-warning">Modifier</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                <tr>
                    <td colspan="6">
                        <!-- Button trigger modal -->
                        <button type="button" style="margin-top:20px" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Ajouter un produit
                        </button>
                    </td>
                </tr>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form action="/products/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un produit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Produit</label>
                                    <input type="text" class="form-control" name="product" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Stock</label>
                                    <input type="text" class="form-control" name="stock" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Unité</label>
                                    <select class="form-control" name="selectUnit" required>
                                        @foreach($units as $unit)
                                            <option value='{{$unit->id}}'>{{$unit->unitName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Prix</label>
                                    <input type="text" class="form-control" name="price" required>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="picture">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection