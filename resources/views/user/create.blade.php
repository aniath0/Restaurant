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
    @include('sweetalert::alert')
<div class="container">
    <h3 class="text-center">Ajouter un utilisateur</h3> </br>

    <!-- Formulaire de création -->
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">Nom</label>
            <div class="col-md-6">
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-3 col-form-label">Mot de passe</label>
            <div class="col-md-6">
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>

        

        <div class="form-group row">
            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
</div>
