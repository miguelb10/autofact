<?php

namespace App\Http\Controllers;

use App\Models\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Throwable;

class QuizController extends Controller
{
    protected $client;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function index()
    {
        return view('result');
    }

    public function store()
    {
        $respuesta = "";
        try {
            $response = $this->client->post(
                '/api/quiz/save',
                ['headers' => ['Content-Type' => 'application/json'], 'body' => json_encode(
                    [
                        'opinion' => request('q1'),
                        'infoCorrecta' => request('q2'),
                        'sitioPerformance' => request('q3'),
                        'user' => [
                            'id' => 1
                        ]
                    ]
                )]
            );
            $this->$respuesta = "Su respuesta fue enviada con exito!";
        } catch (Throwable $e) {
            $this->$respuesta = "Error al registrar datos";
            Log::create([
                'user_id' => Auth::user()->id,
                'page' => 'quiz/send',
                'description' => $this->$respuesta
            ]);
        }
        return redirect()->route('result')->with('respuesta', $this->$respuesta);
    }
}
