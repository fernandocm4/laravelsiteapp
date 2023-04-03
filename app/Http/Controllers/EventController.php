<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        //comando do ORM "all" -> enviar todos os dados do banco para a view
        $events = Event::all();

        return view('welcome',['events'=>$events]);
    }

    public function create(){
        return view('events.create');
    }

    public function contacts(){
        return view('contact');
    }

    public function products(){
        /*Buscando parâmetros por query parameters/query string*/
    $busca = request('search');

    return view('products', ['busca' => $busca]);
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        $event->save();

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
    }
}
