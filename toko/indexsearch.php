<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Harga Pangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .search-container {
            display: flex;
            align-items: center;
            background-color: #1f331d;
            padding: 10px 20px;
            border-radius: 30px;
            width: 100%; 
            max-width: 600px; 
            margin: 20px auto;
        }
        .search-container i {
            color: white;
            font-size: 18px;
        }
        .search-container input {
            padding: 10px;
            background: transparent;
            border: none;
            outline: none;
            flex-grow: 1;
            color: white;
            font-size: 16px;
        }
        .search-container input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body class="bg-green-100 font-sans">
    <nav class="bg-green-900 text-white p-4 flex justify-between items-center shadow-md">
        <div class="flex items-center">
            <img src="assets/logo.jpg" alt="Logo" class="rounded-full mr-4" width="40" height="40">
            <span class="text-xl font-bold">Monitoring Harga Pangan</span>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <!-- Form Pencarian -->
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="searchBox" placeholder="Cari bahan pokok..." autofocus>
        </div>

        <!-- Hasil Pencarian -->
        <div id="listBarang" class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6"></div>
    </div>

    <script>
        function loadBarang(searchText = "") {
            $.ajax({
                url: "search.php",
                method: "GET",
                data: { search: searchText },
                success: function(response){
                    $("#listBarang").html(response);
                }
            });
        }

        $(document).ready(function(){
            loadBarang(); // Load semua barang saat halaman dibuka

            $("#searchBox").on("keyup", function(){
                let searchText = $(this).val();
                loadBarang(searchText);
            });
        });
    </script>
</body>
</html>
