@extends('layout')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Vedjserver
            </div>

            <h4>Points d'appel</h4>
            <table style="text-align: left">
                <tr>
                    <th>Méthode</th>
                    <th>Description</th>
                    <th>URL</th>
                </tr>
                <tr>
                    <td>GET</td>
                    <td style="padding: 5px">Date de la dernière mise à jour</td>
                    <td style="padding: 5px">api/v1/lastupdate</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td style="padding: 5px">Liste des légumes</td>
                    <td style="padding: 5px">api/v1/vegetables</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td style="padding: 5px">Liste des légumes (sans les images)</td>
                    <td style="padding: 5px">api/v1/vegetables/nopics</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td style="padding: 5px">Liste des légumes modifiés après une certaine date<br>(format: YYYY-MM-DD HH:MM:SS)</td>
                    <td style="padding: 5px">api/v1/vegetables/{datetime}</td>
                </tr>
                <tr>
                    <td>PATCH</td>
                    <td style="padding: 5px">Modification du stock d'un ou plusieurs légume(s)</td>
                    <td style="padding: 5px">api/v1/newstock</td>
                    <td>{"changes":[{"id": ... , "stock": ...},{"id": ... , "stock": ...}]}</td>
                </tr>
                <tr>
                    <td>PATCH</td>
                    <td style="padding: 5px">Modification des informations d'un légume</td>
                    <td style="padding: 5px">api/v1/vegetables</td>
                    <td>{"changes":[{"id": ... , "stock": ...},{"id": ... , "stock": ...}]}</td>
                </tr>
            </table><p>
                <small style="color: lightgray">
            <p>ePJyBAswxEsRNzAhhekmwxdQ4HbOb7Ddfzy5uhLhVUWp2M0lYHG3GCCc9uuh</p>
            <p>dCpZ5j8Wx3JDNMUEMVuat4WVbM6nIo9gGBFdqCAUeEPtPGj74fOghh5QQ7cX</p>
            <p>2VGDijsqBYDERH8qrDzGO9O78lJbGq5a6yQCivuz89S2AVRFmXQc45q6LT7v</p>
            <p>ZW5GDIyWdnJhQYOThUMosxpSurqM6vKp6FK9bQvTxSQSXIrMwjpBPzp2ahR4</p>'
            <p>Naatdk5l4Fr7lZWMaWQY9DmYaUuWM85CQYeMJSh8SEpYV9qBot87OKr7HHoI</p>
            <p>CbKnbXLQIKs5oaiRgDLembED2TlDI0Zn1DTfk7oPHAyAjqg7EqiGWpoK9lPw</p>
            <p>iHTTC1ie5LL1ggkrFYmB7LvFk0q92fXaarHL6RV0cApNtRGpXm7dKkooCbzU</p>

            </small>
        </div>
    </div>
@endsection