<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Türkçe Çeviri Aracı</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        AI ile herhangi bir dilden Türkçe çeviri aracı
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="inputText">Metin</label>
                                <input type="text" class="form-control" id="inputText" name="inputText" placeholder="Metni girin...">
                            </div>
                            <button type="submit" class="btn btn-primary">Çevir</button>
                        </form>
                        <br>
<?php
    require 'vendor/autoload.php';

    use GeminiAPI\Client;
    use GeminiAPI\Resources\Parts\TextPart;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userInput = $_POST['inputText'];

        if(empty($userInput)){
            echo '<div class="alert alert-danger" role="alert">Lütfen metin girişi yapın!</div>';
        } else {
            $client = new Client('AIzaSyDCJerCvcr0-jAgcJO4jGxEqSszOAc8IxY');
            $response = $client->geminiPro()->generateContent(
                new TextPart('Gireceğim metni türkçeye çevir, çıktı olarak sadece çeviriyi yaz. "'. $userInput .'"'),
            );

            echo '<div class="alert alert-success" role="alert">' . $response->text() . '</div>';
        }
    }
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>