@extends('layout')
@section('content')
    <form action="/products/add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un produit</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Produit</label>
                        <input type="text" class="form-control" name="product">
                        @if ($errors->any() && $errors->has('product'))
                            @foreach ($errors->get('product') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Stock</label>
                        <input type="text" class="form-control" name="stock">
                        @if ($errors->any() && $errors->has('stock'))
                            @foreach ($errors->get('stock') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Unité</label>
                        <select class="form-control" name="selectUnit">
                            @foreach($units as $unit)
                                <option value='{{$unit->id}}'>{{$unit->unitName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Prix</label>
                        <input type="text" class="form-control" name="price">
                        @if ($errors->any() && $errors->has('price'))
                            @foreach ($errors->get('price') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="file" name="picture">
                        @if ($errors->any() && $errors->has('picture'))
                            @foreach ($errors->get('picture') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/products" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </div>
        </div>
    </form>
@endsection