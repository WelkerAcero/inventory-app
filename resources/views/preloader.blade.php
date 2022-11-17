<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preloader</title>
    <link rel="stylesheet" href="css/preloader.css" />
</head>

<body>
    <div class="contenedor--preloader">
        <div class="preloader" id="loader">
            <p>Loading</p>
        </div>
    </div>

    <script>
        var myVar;

        window.onload = function preloader() {
            myVar = setTimeout(showPage, 2000);

            function showPage() {
                window.location.replace("/")
            }
        };
    </script>
</body>


</html>
