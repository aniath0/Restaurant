<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
     // Afficher tous les Post
     public function index() {
        //On récupère tous les Post
        $user = User::orderBy('id', 'desc')->get();

        // On transmet les Post à la vue "/resources/views/posts/index.blade.php"
        return view("user.index", compact("user"));
    }

    // Créer un nouvelle Personne
    public function create() {
  
        return view("user.create");
    }

    // Enregistrer un nouvelle personne
    public function store(Request $request) {
      
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
            
        ]);

        // 3. On enregistre les informations de la personne
        $user = new User();
        $user->setAttribute("name", $request->name); 
        $user->setAttribute("email", $request->email);
        $user->setAttribute("password", $request->password);
        $user->setAttribute("created_at", new \Datetime());
        $user->save();
        Alert::success('Succès', 'Enregistrement reussi');
        // 4. On retourne vers toutes les personnes : route("user.index")
        return redirect(route("user.index"));
        Alert::error("Erreur", "Erreur lors de l'enregistrement");
    }



    



// Editer une personne enregistré
public function edit(User $user) {
    return view("user.edit", compact("user"));
}

// Mettre à jour une personne
public function update(Request $request, User $user) {
    // 1. La validation

    
    $this->validate($request, [
        'name' => 'required',
    ]);

   
    $user->update([
        "name" => $request->name,
        "email" => $request->email,
        
    ]);

    return redirect(route("user.index"));
}

// Supprimer une personne
public function destroy(User $user) {
    $user->delete();
    return redirect(route('user.index'));
}
     
}
