<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use App\Repositories\Pokemons;


use Illuminate\Http\Request;

class PokemonsController extends Controller
{
    protected $pokemons;

    public function __contruct(Pokemons $pokemons){
        $this->pokemons = $pokemons;
    }

    public function index(){
        
        
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://pokeapi.co/api/v2/pokemon/',
            // You can set any number of default request options.
            'timeout'  => 20.0,
        ]);
        
        $response = $client->request('GET', '?limit=15&offset=00"');
    
        $pokemons = json_decode( $response->getBody()->getContents() );
        
        $personajes = [];
        foreach ($pokemons->results as $pokemon) {

            $name = $pokemon->name;
            $responsePoke = $client->request('GET', $name);
            $poke = json_decode( $responsePoke->getBody()->getContents() );
            
            $personajes[] = [
                    'name' => $poke->name,
                    'nro' => $poke->id,
                    'img' => $poke->sprites->front_default,
                    'tipo' => $poke->types[0]->type->name
                ];   
            }
        return view('welcome', compact('personajes'));
    }
}
