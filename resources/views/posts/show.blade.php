<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            margin-top: 50px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
	<h3>Voir article</h3></br>
        <h6>Libellé : {{ $post->libelle }}</h6></br>

        <h6>Description :{{ $post->description }}</h6> </br>

        <h6>Utilisateur :{{ $post->getuser->name }}</h6></br>

        <p><a href="{{ route('posts.index') }}" class="btn btn-primary" title="Retourner aux articles">Retour</a></p>
    </div>
</body>
</html>
