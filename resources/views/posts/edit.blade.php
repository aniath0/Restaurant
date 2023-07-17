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
        <h1 class="text-center">Modifier article</h1>

        <!-- Formulaire d'édition -->
        <div class="container">
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="libelle" class="col-md-3 col-form-label">Libellé</label>
                <div class="col-md-6">
                    <input type="text" name="libelle" id="libelle" class="form-control col-md-6 " value="{{ $post->libelle }}" required>
                </div>
            </div> </br>

            <div class="form-group row">
                <label for="description" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-6">
                    <input type="text" name="description" id="description" class="form-control col-md-6" value="{{ $post->description }}">
                </div>            
            </div> </br>

            <div class="form-group row">
            <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary btn-sm">Modifier</button>

            </div>
        </div>
           
    </div>

@endsection