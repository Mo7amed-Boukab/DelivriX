<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Détails du Colis - {{ $colis->colie_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            color: black;
        }
        .container-value{
          display: block;
          margin-top: 5px;
        }
        .container-value span {
          display: block;
          margin-bottom: 5px;
          padding-left: 10px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Détails du Colis</h1>
        <p>Numéro: {{ $colis->colie_number }}</p>
        <p>Date: {{ $colis->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="section">
        <div class="section-title">Informations du Colis</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="label">Poids:</span>
                <span>{{ $colis->poids }} kg</span>
            </div>
            <div class="info-item">
                <span class="label">Dimensions:</span>
                <span>{{ $colis->longueur }} × {{ $colis->largeur }} × {{ $colis->hauteur }} cm</span>
            </div>
            <div class="info-item">
                <span class="label">Commande associée:</span>
                <span>{{ $colis->commande->commande_number }}</span>
            </div>
            <div class="info-item">
                <span class="label">Details commande:</span>
                <div class="container-value">
                    <span>Produit : {{ $colis->commande->nom_produit }}</span>
                    <span>Prix : {{ $colis->commande->prix }} DH</span>
                    <span>Quantité : {{ $colis->commande->details_produit }}</span>
                    <span>Total à payer : {{ $colis->commande->total_a_payer }} DH</span>
                </div> 
            </div>
            <div class="info-item">
                <span class="label">Client:</span>
                <span>{{ $colis->commande->client->utilisateur->name }}</span>
            </div>
            <div class="info-item">
                <span class="label">Adresse de livraison:</span>
                <span>{{ $colis->commande->client->utilisateur->adresse }}</span>
            </div>
            <div class="info-item">
                <span class="label">Status de colie:</span>
                <span>{{ $colis->statut == 'en_préparation' ? "En préparation" :( $colis->statut == 'en_route' ? "En route" : "Livrée")}}</span>
            </div>
            <div class="info-item">
                <span class="label">Méthode de paiement:</span>
                <span>{{ $colis->commande->paiement_type == 'a_la_livraison' ? "Paiement à la livraison" : "Paiement en ligne" }}</span>
            </div>
            <div class="info-item">
                <span class="label">Status de paiement:</span>
                <span>{{ $colis->commande->paiement_status == 0 ? "Pas encore payer" : "Payé" }}</span>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informations du Livreur</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="label">Entreprise:</span>
                <span>{{ $colis->commande->livreur->nom_entreprise }}</span>
            </div>
            <div class="info-item">
                <span class="label">Nom du livreur:</span>
                <span>{{ $colis->commande->livreur->utilisateur->name }}</span>
            </div>
            <div class="info-item">
                <span class="label">Téléphone:</span>
                <span>{{ $colis->commande->livreur->utilisateur->phone }}</span>
            </div>
            <div class="info-item">
                <span class="label">Email:</span>
                <span>{{ $colis->commande->livreur->utilisateur->email }}</span>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Document généré le {{ now()->format('d/m/Y H:i') }}</p>
        <p>© {{ date('Y') }} DelivriX - Tous droits réservés</p>
    </div>
</body>
</html> 