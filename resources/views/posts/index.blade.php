@extends("layouts.app")

@section("content")

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand mx-auto"  href="{{ route('signout') }}">Deconnexion</a>
    
</nav>


<div class="container mt-9">
    <div class="row mb-2">
        <div class="col-lg-12 d-flex align-items-center">
            <h1 class="mb-0">Tous les articles &nbsp</h1> 
            <a href="{{ route('posts.create') }}" class="btn btn-outline-primary btn-sm" title="Créer un article">Créer</a>
        </div>
    </div></br>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered" id="maTable">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-center">Libellé</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Utilisateur</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td class="text-center">{{ $post->libelle }}</td>
                    <td class="text-center">{{ $post->description }}</td>
                    <td class="text-center">{{ $post->getuser->name }}</td>
                    <td class="text-center">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm" title="Lire l'article">Voir</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-secondary btn-sm" title="Modifier l'article">Modifier</a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline;">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript de jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- JavaScript de DataTables -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>



@endsection
