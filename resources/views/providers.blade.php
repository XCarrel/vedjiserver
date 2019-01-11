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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Entreprise</th>
                    <th>Téléphone</th>
                </tr>
                @foreach($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{$fournisseur->firstName}}</td>
                        <td>{{$fournisseur->lastName}}</td>
                        <td>{{$fournisseur->companyName}}</td>
                        <td>{{$fournisseur->phone}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection