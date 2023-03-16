<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index()
    {
        echo '<h4>';
        echo 'Ruta actual donde esta el controlador: '.__DIR__.'';
        echo 'Recuerda agregar el fichero de configuracion en la raiz del proyecto y no en los controladores.';
        echo '</h4>';
        
        $firebase = (new Factory)
            ->withServiceAccount(__DIR__.'/l9-firebase-firebase-adminsdk.json') 
            ->withDatabaseUri( env('FIREBASE_DATABASE_URL') );
 
        $database = $firebase->createDatabase();
        $blog = $database
        ->getReference('blog');
        echo '<h1>';
        print_r($blog->getvalue());
        echo '</h1>';
        
    }
}
