<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vedjiserver</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Arial', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
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
    </body>
</html>
