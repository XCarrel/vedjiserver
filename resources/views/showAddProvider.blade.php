@extends('layout')
@section('content')
    <form action="/providers/add" method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un produit</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Nom</label>
                        <input type="text" class="form-control" name="lastname">
                        @if ($errors->any() && $errors->has('lastname'))
                            @foreach ($errors->get('lastname') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Prénom</label>
                        <input type="text" class="form-control" name="firstname">
                        @if ($errors->any() && $errors->has('firstname'))
                            @foreach ($errors->get('firstname') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Entreprise</label>
                        <input type="text" class="form-control" name="company">
                        @if ($errors->any() && $errors->has('company'))
                            @foreach ($errors->get('company') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Téléphone</label>
                        <input type="text" class="form-control" name="phone">
                        @if ($errors->any() && $errors->has('phone'))
                            @foreach ($errors->get('phone') as $error)
                                <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                            <label for="description">Adresse</label>
                            <input type="text" class="form-control" name="address">
                            @if ($errors->any() && $errors->has('address'))
                                @foreach ($errors->get('address') as $error)
                                    <p style="background-color: red; color: #FFF;">{{ $error }}</p>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Type de fournisseur</label>
                        <select class="form-control" name="providerType">
                            @foreach($userTypes as $userType)
                                <option value='{{$userType->id}}'>{{$userType->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/providers" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </div>
        </div>
    </form>
@endsection