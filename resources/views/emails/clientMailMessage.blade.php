<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
     <div>
         <p>Bonjour {{ $username}},</p>       
         <p>Nous vous confirmons que votre commande a bien été enregistrée.</p>
         <div>
             <p><strong>Détails de votre commande :</strong></p>
             <p>Numéro de commande : <strong>{{ $commande_number}}</strong></p>
             <p>Produit : <strong>{{ $product}}</strong></p>
             <p>Quantité : <strong>{{ $quantite}}</strong></p>
             <p>Prix total : <strong>{{ $total}} DH</strong></p>
         </div>
         
         @if($is_new_account==true)
         <p>Voici vos informations de connexion à notre platform DelivriX:</p>  
         <div>
             <p>Email : <strong>{{ $email}}</strong></p>
             <p>Mot de passe : <strong>{{ $password}}</strong></p>
         </div>        
         @endif     
         <p>Vous pouvez suivre l'état de votre commande en vous connectant à votre compte.</p>     
         <p">Merci de votre confiance,<br>L'équipe DelivriX</p>
     </div>
</body>
</html>