<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Boujour</h1>
    </body>
</html>

<script>
    var request = new XMLHttpRequest();
    request.open('GET', 'localhost:8080/api/swipes', true);
    request.send();

    Http.onreadystatechange=(e)=>{
        console.log(Http.responseText)
    }



</script>
