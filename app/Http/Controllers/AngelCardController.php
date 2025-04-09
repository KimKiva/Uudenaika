<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngelCardController extends Controller
{
    public function draw()
    {
        // Enkelikortin viestit
        $messages = [
            "Luota itseesi – valo ohjaa sinua oikeaan suuntaan.",
            "Olet suojassa, vaikka et aina tunne niin.",
            "Uusi alku on lähempänä kuin uskotkaan.",
            "Sisäinen äänesi on enkeleiden kuiskaus – kuuntele sitä.",
            "Rauha löytyy sisältäsi, ei ulkopuolelta.",
        ];

        // Hae kaikki kuvat kansiosta, jotka alkavat 'angelcard_' ja päättyvät '.png'
        $images = glob(public_path('images/angels/angelcard_*.png'));

        // Muunna tiedostopolut URL-osoitteiksi
        $imageUrls = array_map(function ($image) {
            return asset('images/angels/' . basename($image));
        }, $images);

        // Valitse satunnainen viesti ja satunnainen kuva
        $randomMessage = $messages[array_rand($messages)];
        $randomImage = $imageUrls[array_rand($imageUrls)];

        // Palauta JSON-vastaus satunnaisella viestillä ja kuvalla
        $response = [
            'message' => $randomMessage,
            'image' => $randomImage,
        ];

        return response()->json($response);
    }
}
