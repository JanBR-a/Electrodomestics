<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="antialiased bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="fixed top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <main>
        <div id="store" class="container mx-auto px-4">
            <h1 class="text-3xl font-semibold text-center my-8">Lista de Electrodomesticos</h1>
            <div id="listaElectrodomestics" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($electrodomestics as $electrodomestic)
                <a href="/electrodomestics/{{$electrodomestic['id']}}"><div class="bg-white shadow-lg rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $electrodomestic['name'] }}</h2>
                    <img src="{{ $electrodomestic['image']}}"></img>
                    <p class="text-gray-600 mb-4">Marca: {{ $electrodomestic['brand'] }}</p>
                </div></a>
                @endforeach
            </div>
            <br><br>
            @auth
            <div class="flex justify-center my-4" >
                <button id="addElectrodomestic" onclick="addElectrodomestics()" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Añadir Electrodomesticos</button>
            </div>
            @else
            @endauth
        </div>
        <div id="addForm" class="container mx-auto px-4" style="display:none">
            <h1 class="text-3xl font-semibold text-center my-8">Añadir Electrodomesticos</h1>
            <form action="/" method="post">
                @csrf
                @method('POST')
                <label for="name">Nombre del electrodomestico:</label><br>
                <input type="text" name="name" value=""><br><br>
                <label for="description">Descripción del electrodomestico:</label><br>
                <input type="text" name="description" value=""><br><br>
                <label for="category">Categoría del electrodomestico:</label><br>
                <input type="text" name="image" value=""><br><br>
                <label for="brand">Marca del electrodomestico:</label><br>
                <input type="text" name="brand" value=""><br><br>
                <label for="category">Categoría del electrodomestico:</label><br>
                <input type="text" name="category" value=""><br><br>
                <label for="price">Precio del electrodomestico:</label><br>
                <input type="number" name="price" value=""><br><br>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md">Guardar</button>
            </form>
        </div>
    </main>
    <script>
    function mostrarElectrodomestics(electrodomestics) {
        var listaElectrodomestics = document.getElementById('listaElectrodomestics');
        listaElectrodomestics.innerHTML = '';

            electrodomestics.forEach(electrodomestic => {
            var card = document.createElement('div');
            card.classList.add('bg-white', 'shadow-lg', 'rounded-lg', 'p-4');

            var nom = document.createElement('h2');
            nombre.classList.add('text-lg', 'font-semibold', 'mb-2');
            nombre.textContent = electrodomestic.name;

            var marca = document.createElement('p');
            marca.classList.add('text-gray-600', 'mb-4');
            marca.textContent = 'Marca: ' + electrodomestic.brand;

            var descripcion = document.createElement('p');
            descripcion.classList.add('text-gray-700');
            descripcion.textContent = electrodomestic.description;

            card.appendChild(nom);
            card.appendChild(marca);
            card.appendChild(description);

            listaElectrodomesticos.appendChild(card);
        });
    }

    function addElectrodomestics() {
        document.getElementById('addForm').style.display = 'block';
        document.getElementById('store').style.display = 'none';


    }
    </script>
</body>
</html>


