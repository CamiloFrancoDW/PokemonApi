<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pokemons Api</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .container {
                overflow: hidden;
                }

            .filterDiv {
                float: left;
                background-color: #ffffff;
                
                text-align: center;
                display: none; /* Hidden by default */
                }

                /* The "show" class is added to the filtered elements */
            .show {
                display: block;
                }

                /* Style the buttons */
            .btn {
                border: none;
                outline: none;
                padding: 12px 16px;
                background-color: #f1f1f1;
                cursor: pointer;
                }

                /* Add a light grey background on mouse-over */
            .btn:hover {
                background-color: #ddd;
                }

                /* Add a dark background to the active button */
            .btn.active {
                background-color: #666;
                color: white;
                }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Pokemons
                </div>
                <div id="myBtnContainer">
                    <button class="btn active" onclick="filterSelection('all')">Todos</button>
                    @foreach($personajes as $personaje)
                        <button class="btn" style="margin-top: 5px;" onclick="filterSelection('{{ $personaje['name'] }}')">{{ $personaje['name'] }}</button>
                    @endforeach
                    </div>
                
                <div class="row">
                    @foreach($personajes as $personaje)
                    <div class="card col-lg-3 filterDiv {{ $personaje['name'] }}" style="width: 18rem;margin: 4%;">
                            <img src="{{ $personaje['img'] }}" class="card-img-top" alt="{{ $personaje['name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">Nombre: {{ $personaje['name'] }}</h5>
                                <p class="card-text">Nro: {{ $personaje['nro'] }}</p>
                                <p class="card-text">Tipo: {{ $personaje['tipo'] }}</p>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
               

            </div>
        </div>
    </body>
    
    <script>
        filterSelection("all")
            function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
            }

            // Show filtered elements
            function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
                }
            }
            }

            // Hide elements that are not selected
            function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
            }

            // Add active class to the current control button (highlight it)
            var btnContainer = document.getElementById("myBtnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
            }
    </script>
</html>
