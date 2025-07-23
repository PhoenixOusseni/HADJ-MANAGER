<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Badge Hajj</title>
    <style>
        body {
            background-color: transparent;
            font-family: 'verdana';
        }

        .id-card-holder {
            width: 283px;
            padding: 4px;
            margin: 0 auto;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
        }

        .id-card-holder:after {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            border-radius: 0 5px 5px 0;
        }

        .id-card-holder:before {
            content: '';
            width: 7px;
            display: block;
            background-color: #0a0a0a;
            height: 100px;
            position: absolute;
            top: 105px;
            left: 283px;
            border-radius: 5px 0 0 5px;
        }

        .id-card {

            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }

        .id-card img {
            margin: 0 auto;
        }

        .header img {
            width: 100px;
            margin-top: 15px;
        }

        .photo img {
            width: 80px;
            margin-top: 15px;
        }

        h2 {
            font-size: 15px;
            margin: 5px 0;
        }

        h3 {
            font-size: 12px;
            margin: 2.5px 0;
            font-weight: 300;
        }

        .qr-code img {
            width: 50px;
        }

        p {
            font-size: 10px;
            margin: 2px;
        }

        .id-card-hook {
            background-color: black;
            width: 70px;
            margin: 0 auto;
            height: 15px;
            border-radius: 5px 5px 0 0;
        }

        .id-card-hook:after {
            content: '';
            background-color: white;
            width: 47px;
            height: 6px;
            display: block;
            margin: 0px auto;
            position: relative;
            top: 6px;
            border-radius: 4px;
        }

        .id-card-tag-strip {
            width: 45px;
            height: 40px;
            background-color: #d9300f;
            margin: 0 auto;
            border-radius: 5px;
            position: relative;
            top: 9px;
            z-index: 1;
            border: 1px solid #a11a00;
        }

        .id-card-tag-strip:after {
            content: '';
            display: block;
            width: 100%;
            height: 1px;
            background-color: #a11a00;
            position: relative;
            top: 10px;
        }

        .id-card-tag {
            width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-top: 100px solid #d9300f;
            margin: -10px auto -30px auto;

        }

        .id-card-tag:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-top: 100px solid white;
            margin: -10px auto -30px auto;
            position: relative;
            top: -30px;
            left: -50px;
        }

    </style>
</head>
<body>
    <div class="id-card-holder">
        <div class="id-card">
            <h2>Hadj 2025</h2>
            <div class="header">
                <img src="{{ public_path('candidat/photo/' . $candidat->photo) }}">
                {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('candidat/photo/' . $candidat->photo))) }}" alt="Drapeau"> --}}

            </div>
            <h3>{{ $candidat->nom ?? '' }} {{ $candidat->prenom ?? '' }}</h3>
            <p>Numero de piece : <strong>{{ $candidat->numero_piece ?? '' }}</strong></p>
            <p>Nationalite : <strong>{{ $candidat->nationalite ?? '' }}</strong></p>
            <p>Code d'inscription : <strong>{{ $candidat->id_inscription ?? '' }}</strong></p>
            <hr>
            <p><strong>{{ $candidat->agence->libelle ?? '' }}</strong> | <strong>Siege :</strong> {{ $candidat->agence->siege ?? '' }} | <strong>Adresse:</strong>{{ $candidat->agence->adress ?? '' }} | <strong>Email:<strong> {{ $candidat->agence->email ?? '' }} | <strong>Tel:<strong> {{ $candidat->agence->telephone ?? '' }}<p>
        </div>
    </div>
</body>
</html>
