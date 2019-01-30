@extends('layout')
@section('content')
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                <div class="row" style="padding-top: 30px;">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <h3>{{$data->productName}} - Modification</h3>
                        <div class="info-form">
                            <form method="post" action="/products/update" enctype="multipart/form-data" class="form-inlin justify-content-center">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Produit</label>
                                    <input type="text" class="form-control" name="updateName"  value='{{$data->productName}}' style="margin-right: 200px;">
                                    @if ($errors->any() && $errors->has('updateName'))
                                        @foreach ($errors->get('updateName') as $error)
                                            <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Stock</label>
                                    <input type="text" class="form-control" name="updateStok" value='{{$data->stock}}'>
                                    @if ($errors->any() && $errors->has('updateStok'))
                                        @foreach ($errors->get('updateStok') as $error)
                                            <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Prix</label>
                                    <input type="text" class="form-control" name="updatePrice" value='{{$data->price}}'>
                                    @if ($errors->any() && $errors->has('updatePrice'))
                                        @foreach ($errors->get('updatePrice') as $error)
                                            <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                                        @endforeach
                                    @endif
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
                                        <input type="checkbox" class="form-check-input" name="selectProviders[]" value="{{$user->id}}" {{$user->provides ? "checked" : "" }}>{{$user->firstName}} {{$user->lastName}}<br>
                                    @endforeach
                                </div>
                                <a href="/products"> <button type="button" class="btn btn-secondary">Annuler</button> </a>
                                <button type="submit" class="btn btn-primary" value="{{$data->id}}" name="btnUpdate">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection