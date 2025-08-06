<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture AGENCE AT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 30px;
            color: #000;
        }

        .header {
            width: 100% !important;
            margin-bottom: 30px;
            text-align: center;
        }

        .header td {
            padding: 10px;
            vertical-align: top;
        }

        img {
            width: 150px;
            height: auto;
        }

        .header-text {
            line-height: 1.4;
            text-align: right;
        }

        .header-text h1 {
            margin: 0;
            font-size: 22px;
            color: #009879;
        }

        .info,
        .footer {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .info-table td {
            padding: 6px;
        }

        .payment-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .payment-table th,
        .payment-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .amounts {
            margin-top: 10px;
            font-size: 16px;
        }

        .bold-red {
            color: red;
            font-weight: bold;
        }

        .bold-text {
            font-weight: bold;
        }

        .signatures {
            width: 100%;
            margin-top: 40px;
            font-size: 13px;
        }

        .signatures td {
            padding: 10px;
            vertical-align: top;
            text-align: center;
        }

        .footer-note {
            margin-top: 20px;
            font-size: 12px;
        }

        .highlight {
            background-color: yellow;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <table class="header">
        <tr>
            <td><img src="{{ $logoPath }}" alt="Logo Agence AT"></td>
            <td>
                <div class="header-text">
                    <h1>{{ $paiement->service->agence->libelle ?? 'N/A' }}</h1>
                    <div>Agence de voyages-Tourisme - Hadj et Oumra</div>
                    <div>{{ $paiement->service->agence->adress ?? 'N/A' }}</div>
                    <div>Email: {{ $paiement->service->agence->email ?? 'N/A' }}</div>
                    <div>Tel: {{ $paiement->service->agence->telephone ?? 'N/A' }} / {{ $paiement->service->agence->whatsapp ?? 'N/A' }}</div>
                </div>
            </td>
        </tr>
    </table>

    <table class="info-table">
        <tr>
            <td><strong>ID INSCRIT:</strong> {{ $paiement->candidat->id_inscription ?? 'N/A' }}</td>
            <td><strong>NOM:</strong> {{ $paiement->candidat->nom ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>N°PASSEPORT/CNIB:</strong> <span class="bold-text">{{ $paiement->candidat->numero_piece ?? 'N/A' }}</span></td>
            <td><strong>PRENOMS:</strong> {{ $paiement->candidat->prenom ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>ID OFFICE:</strong> {{ $paiement->candidat->office_code ?? 'N/A' }}</td>
            <td><strong>Date inscription:</strong> {{ $paiement->candidat->date_delivrance ?? 'N/A' }}</td>
        </tr>
    </table>

    <table class="payment-table">
        <thead>
            <tr>
                <th>N° versement</th>
                <th>Type versement</th>
                <th>Motif</th>
                <th>Date versement</th>
                <th>Montant du versement</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->mode_paiement ?? 'N/A' }}</td>
                <td>{{ $payment->service->libelle ?? 'N/A' }}</td>
                <td>{{ $payment->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                <td>{{ $payment->montant ?? 'N/A'}} FCFA</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="amounts">
        Montant payé : <strong>{{ number_format($paiement->montant ?? 0, 0, ',', ' ') }}</strong> &nbsp;&nbsp; | &nbsp;&nbsp;
        Total versé : <strong>{{ number_format($total ?? 0, 0, ',', ' ') }} FCFA</strong> &nbsp;&nbsp; | &nbsp;&nbsp;
        Reste à payer : <span class="bold-red">{{ number_format($remain ?? 0, 0, ',', ' ') }} FCFA</span><br><br>
    </div>

    <table class="signatures">
        <tr>
            <td>Agent Comptoir<br><br><strong>{{ auth()->user()->code ?? '--------' }}</strong></td>
            <td>Délégué ou facilitateur<br><br><strong>{{ $paiement->candidat->agent->code ?? '--------' }}</strong></td>
            <td>Imprimé et Remis le<br><br>{{ date('d/m/Y H:i:s') }}</td>
            <td>La caisse<br><br>--------------------</td>
        </tr>
    </table>

    <div class="footer-note">
        Decompte : <span class="highlight">{{ $paiement->id ?? '0'}}</span><br><br>
        Merci de bien vouloir vérifier le montant de vos versements sur le reçu devant notre caissier(e)<br>
        Original pour client
    </div>
</body>
</html>
