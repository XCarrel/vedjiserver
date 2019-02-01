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
                    <th>Nouvelle quantité</th>
                    <th>Frounisseur</th>
                    <th>Date</th>
                </tr>

                @foreach($commandes as $commande)
                    <tr>
                        <td>{{$commande->productName}}</td>
                        <td>{{$commande->quantity}}</td>
                        <td>{{$commande->firstName}} {{$commande->lastName}}</td>
                        <td>{{$commande->date}}</td>
                @endforeach
            </table>
            
            <a href="/admin" style="margin-top:20px" class="btn btn-primary">Retour</a>
        </div>
    </div>
@endsection