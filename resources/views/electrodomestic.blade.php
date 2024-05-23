<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del electrodomestico</title>
    <!-- CSS de Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="container mx-auto px-4">
        <h1 id="detailsElectrodomestic" class="text-3xl font-semibold text-center my-8">Detalles del Electrodomestico</h1>
        <form method="POST" action="/electrodomestics/{{ $electrodomestic['id'] }}" style="display:none"
            id="edit-form">
            @csrf
            @method('PUT')
            <label for="name">Nombre del electrodomestico:</label><br>
            <input type="text" name="name" value="{{ $electrodomestic['name'] }}"><br><br>
            <label for="description">Descripción del electrodomestico:</label><br>
            <input type="text" name="description" value="{{ $electrodomestic['description'] }}"><br><br>
            <label for="category">Categoría del electrodomestico:</label><br>
            <input type="text" name="image" value="{{ $electrodomestic['image'] }}"><br><br>
            <label for="brand">Marca del electrodomestico:</label><br>
            <input type="text" name="brand" value="{{ $electrodomestic['brand'] }}"><br><br>
            <label for="category">Categoría del electrodomestico:</label><br>
            <input type="text" name="category" value="{{ $electrodomestic['category'] }}"><br><br>
            <label for="price">Precio del electrodomestico:</label><br>
            <input type="number" name="price" value="{{ $electrodomestic['price'] }}"><br><br>
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md">Guardar</button>
        </form>
        <div id="deleteElectrodomestic" style="display:none">
            <h1 class="text-3xl font-semibold text-center my-8">¿Seguro que quieres borrar este electrodomestico?</h1>
            <form method="POST" action="/electrodomestics/{{ $electrodomestic['id'] }}" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" id="deleteBtn2"
                    class="ml-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">Borrar</button>
            </form>
        </div>
        <div id="electrodomesticData" class="bg-white shadow-lg rounded-lg p-4">
            <h2 id="name" class="text-lg font-semibold mb-2">{{ $electrodomestic['name'] }}</h2>
            <p id="description" class="text-gray-600 mb-4">Descripción: {{ $electrodomestic['description'] }}</p>
            <img id="image" src="{{ $electrodomestic['image'] }}"></img>
            <p id="brand" class="text-gray-700">Marca: {{ $electrodomestic['brand'] }}</p>
            <p id="category" class="text-gray-600 mb-4"> Categoría: {{ $electrodomestic['category'] }}</p>
            <p id="price" class="text-gray-700"> Precio: {{ $electrodomestic['price'] }}</p>
            <label for=""></label>
            <div class="mt-4">
                <button onclick="editElectrodomestic()" id="editBtn"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Actualizar</button>
                <button onclick="deleteElectrodomestic()" id="deleteBtn"
                    class="ml-2 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">Borrar</button>
            </div>
        </div>
    </div>

        <script>
            function editElectrodomestic() {

                var editForm = document.getElementById("edit-form");
                editForm.style = "display:block";
                var electrodomesticData = document.getElementById("electrodomesticData");
                electrodomesticData.style = "display:none";
                // Cambiar el botón "Actualizar" a "Guardar"
                document.getElementById("editBtn").outerHTML =
                '<button onclick="saveChanges()" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md">Guardar</button>';
                document.getElementById("deleteBtn").outerHTML = '';
            }

            function deleteElectrodomestic() {

                var deleteElectrodomestic = document.getElementById("deleteElectrodomestic");
                deleteElectrodomestic.style = "display:block";
                var detailsElectrodomestic = document.getElementById("detailsElectrodomestic");
                detailsElectrodomestic.style = "display:none";
                var electrodomesticData = document.getElementById("electrodomesticData");
                electrodomesticData.style = "display:none";
                // Cambiar el botón "Borrar" a "Cancelar"
                document.getElementById("deleteBtn").outerHTML =
                '<button onclick="cancelDelete()" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">Cancelar</button>';
                document.getElementById("editBtn").outerHTML = '';
            }
        </script>
    </body>

</html>
