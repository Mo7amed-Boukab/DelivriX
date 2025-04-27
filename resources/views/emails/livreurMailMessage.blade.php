<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
     <div>
         <p>Bonjour {{ $username}},</p>   
         <p>Voici vos informations de connexion à notre platform :</p>
        
        <div>
            <p><strong>Email :</strong> {{ $email }}</p>
            <p><strong>Mot de passe :</strong> {{ $password }}</p>
        </div>
        
        <p>Vous pouvez vous connecter à votre compte en visitant : <a href="{{ url('http://127.0.0.1:8000/login') }}"> {{ url('/login') }}</a></p>
        
        <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
        
        <p>Cordialement,<br>L'équipe DelivriX</p>
    </div>
</body>
</html> 