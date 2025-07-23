<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Badge Candidat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            {{-- padding: 10px; --}}
        }

        .badge-container {
            {{-- width: 280px; --}}
            height: 180px;
            border: 2px solid #004080;
            border-radius: 12px;
            padding: 15px;
            background: #f4f8fb;
            color: #333;
            position: relative;
        }

        .badge-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .badge-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #004080;
            object-fit: cover;
        }

        .badge-name {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
            color: #004080;
        }

        .badge-role {
            font-size: 13px;
            margin: 2px 0;
            color: #333;
        }

        .badge-footer {
            position: absolute;
            bottom: 15px;
            left: 15px;
            right: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #666;
        }

        .badge-id {
            font-weight: bold;
            color: #004080;
        }

        .badge-logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 40px;
        }
    </style>
</head>
<body>

    <div class="badge-container">
        <!-- Logo -->
        <img src="{{ asset('candidat/photo/' . $candidat->photo) }}" alt="Logo" class="badge-logo">

        <!-- Header -->
        <div class="badge-header">
            <img src="{{ asset('candidat/photo/' . $candidat->photo) }}" alt="Photo" class="badge-photo">
            <div>
                <p class="badge-name">{{ $candidat->nom ?? 'Nom Prénom' }}</p>
                <p class="badge-role">{{ $candidat->poste ?? 'Fonction du candidat' }}</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="badge-footer">
            <span class="badge-id">ID: {{ $candidat->id_inscription ?? '00000' }}</span>
            <span>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
        </div>
    </div>

</body>
</html>
