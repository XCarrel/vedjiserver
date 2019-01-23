@extends('layout')
@section('content')
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <h3>{{$data->productName}} - Modification</h3>
                        <div class="info-form">
                            <form method="post" action="/products/updateDataProducts" enctype="multipart/form-data" class="form-inlin justify-content-center">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Produit</label>
                                    <input type="text" class="form-control" name="updateName"  value='{{$data->productName}}' style="margin-right: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="title">Stock</label>
                                    <input type="text" class="form-control" name="updateStok" value='{{$data->stock}}'>
                                </div>
                                <div class="form-group">
                                    <label for="title">Prix</label>
                                    <input type="text" class="form-control" name="updatePrice" value='{{$data->price}}'>
                                </div>
                                <div class="form-group">
                                    <label for="description">Unité</label>
                                    <select class="form-control" name="updateUnit">
                                        @foreach($units as $unit)
                                            <option value='{{$unit->id}}' {{$unit->id == $data->unit_id ? "selected" : "" }}>{{$unit->unitName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="updatePicture">
                                </div>
                                <div class="form-check">
                                    @foreach($users as $user)
                                        <input type="checkbox" class="form-check-input" name="selectProviders[]" value="{{$user->id}}" {{$provider->supplier_id == $user->id ? "checked" : "" }}>{{$user->firstName}} {{$user->lastName}}</input><br>
                                    @endforeach
                                </div>
                                <a href="/products"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> </a>
                                <button type="submit" class="btn btn-primary" value="{{$data->id}}" name="btnUpdate">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection