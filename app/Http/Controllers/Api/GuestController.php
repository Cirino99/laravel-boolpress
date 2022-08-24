<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\GuestToAdmin;
use App\Mail\GuestToGuest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        // validation
        $validation_rules = [
            'name'          => 'required|string|max:100',
            'email'          => 'required|email|max:256',
            'message'       => 'required|string|max:8000',
            'mailinglist'   => 'required|boolean',
        ];
        // $request->validate($validation_rules); // per le routes in api.php ritorna un json, in web.php invece fa il redirect

        // per avere più controllo nel comportamento del validator
        $validator = Validator::make($form_data, $validation_rules);
        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'response'  => $validator->errors(),
            ]);
        }

        try {
            // salvare nel db
            // throw new \Exception("Error Processing Request", 1); // riga per generare un errore di prova
            $guest = Guest::create($form_data);

            // inviare mail al guest
            Mail::to($guest->email)->send(new GuestToGuest($guest));
            // inviare mail all'admin del sito
            Mail::to('admin@bool.press')->send(new GuestToAdmin($guest));
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'response'  => 'C\'è stato un errore, riprova',
            ], 500);
        }

        return response()->json([
            'success'   => true,
            'response'  => 'Messaggio inviato, verrai contattato al più presto',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
