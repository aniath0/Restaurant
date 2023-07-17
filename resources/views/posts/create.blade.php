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
    
@include('sweetalert::alert')
    <h3 class="text-center">Créer un article</h3> </br>

    <!-- Formulaire de création -->
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="libelle" class="col-md-3 col-form-label">Libellé</label>
            <div class="col-md-6">
                <input type="text" name="libelle" id="libelle" class="form-control" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
        <label for="user_id" class="col-md-3 col-form-label">Utilisateur</label>
        <div class="col-md-6">
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Sélectionnez un utilisateur</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
</div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>
    </form>
</div>
