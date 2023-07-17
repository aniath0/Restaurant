<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Alert;
use App\Models\User;


class PostController extends Controller
{
    //
     // Afficher tous les Post
     public function index() {
        //On récupère tous les Post
        $posts = Post::orderBy('id', 'desc')->get();
        // On transmet les Post à la vue "/resources/views/posts/index.blade.php"
        return view("posts.index", compact("posts"));
    }

    // Créer un nouveau Post
    public function create() {
        // On retourne la vue "/resources/views/posts/edit.blade.php"
        $users = User::all();
        return view("posts.create", compact("users"));
    }

    // Enregistrer un nouveau Post
    public function store(Request $request) {
       try {
        //code...
         // 1. La validation
         $this->validate($request, [
            'libelle' => 'required|unique:posts,libelle|max:255',
        ]);

        // 3. On enregistre les informations du Post
        $post = new Post();
        $post->setAttribute("libelle", $request->libelle);
        $post->setAttribute("description", $request->description);
        $post->setAttribute("user_id", $request->user_id); // Ajouter l'ID de l'utilisateur sélectionné
        $post->setAttribute("created_at", new \Datetime());
        $post->save();
        Alert::success('Succès', 'Enregistrement reussi');
        // 4. On retourne vers tous les posts : route("posts.index")
        return redirect(route("posts.index"));
       } catch (\Throwable $th) {
        //throw $th;
        Alert::error('Erreur', 'Le libellé existe déjà');
        return redirect(route("posts.create"));
        }
    }



    


// Afficher un Post
public function show(Post $post) {
    return view("posts.show", compact("post"));
}

// Editer un Post enregistré
public function edit(Post $post) {
    return view("posts.edit", compact("post"));
}

// Mettre à jour un Post
public function update(Request $request, Post $post) {
    // 1. La validation

    // Les règles de validation pour "title" et "content"
    $this->validate($request, [
        'libelle' => 'required',
    ]);

    // 2. On upload l'image dans "/storage/app/public/posts"
    

    // 3. On met à jour les informations du Post
    $post->update([
        "libelle" => $request->libelle,
        "description" => $request->description,
        
    ]);

    // 4. On affiche le Post modifié : route("posts.show")
    return redirect(route("posts.index"));
}

// Supprimer un Post
public function destroy(Post $post) {
  

    // On les informations du $post de la table "posts"
    $post->delete();
    // Redirection route "posts.index"
    return redirect(route('posts.index'));
}
     
}
