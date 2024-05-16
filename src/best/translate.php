<?php
require 'vendor/autoload.php';

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['inputText'];

    if(empty($userInput)){
        echo '<div class="alert alert-danger" role="alert">Lütfen metin girişi yapın!</div>';
    } else {
        $client = new Client('');
        $response = $client->geminiPro()->generateContent(
            new TextPart('Gireceğim metnin dilini yaz, çıktı olarak sadece metnin dilini yaz. "'. $userInput .'"'),
        );

        echo '<div class="yeah" role="alert">Girdiğiniz metnin dili: ' . $response->text() . '</div>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['inputText'];

    if(empty($userInput)){
    } else {
        $client = new Client('');
        $response = $client->geminiPro()->generateContent(
            new TextPart('Gireceğim metni türkçeye çevir, çıktı olarak sadece çeviriyi yaz. "'. $userInput .'"'),
        );
        echo '<div class="alert alert-success" role="alert">' . $response->text() . '</div>';
    }
}
