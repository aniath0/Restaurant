@extends("layouts.app")
@section("title", "Tous les articles")
@section("content")

    
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
        <h5 class="text-center">Modifier personne</h5>

        <!-- Formulaire d'édition -->
        <div class="container">
        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="nom" class="col-md-3 col-form-label">Nom</label>
                <div class="col-md-6">
                    <input type="text" name="name" id="name" class="form-control col-md-6 " value="{{ $user->name }}" required>
                </div>
            </div> </br>
            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-6">
                    <input type="text" name="email" id="email" class="form-control col-md-6 " value="{{ $user->email }}" required>
                </div>
            </div> </br>

            

            <div class="form-group row">
            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
           
    </div>

@endsection