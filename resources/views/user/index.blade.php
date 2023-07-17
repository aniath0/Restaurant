@extends("layouts.app")

@section("content")

<nav class="navbar navbar-light bg-light">
<a class="navbar-brand mx-auto"  href="{{ route('signout') }}">Deconnexion</a>
    
</nav>



<div class="container mt-9">
    <div class="row mb-2">
        <div class="col-lg-12 d-flex align-items-center">
            <h5 class="mb-0">Tous les utilisateurs &nbsp</h5>
            <a href="{{ route('user.create') }}" class="btn btn-outline-primary" title="Créer ">Créer</a>
        </div>
    </div> </br>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <table class="table table-bordered" id="maTable">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prenom</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                    <tr>
                       <b> <td class="text-center">{{ $user->name }}</td></b>
                       <b> <td class="text-center">{{ $user->email }}</td></b>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-outline-secondary btn-sm" title="Modifier l'article">Modifier</a>
                            <form method="POST" action="{{ route('user.destroy', $user) }}" style="display: inline;">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette personne?')">Supprimer</button>
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
