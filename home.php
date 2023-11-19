<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .btn-custom {
            font-size: 1.5rem; /* Adjust the font size as needed */
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Library Management</h1>

        <button type="button" class="btn btn-primary btn-lg btn-custom" onclick="navigateTo('work.php')">Library Counter</button>
        <button type="button" class="btn btn-primary btn-lg btn-custom" onclick="navigateTo('booktrack.php')">Book Tracker</button>
        <button type="button" class="btn btn-primary btn-lg btn-custom" onclick="navigateTo('Due.php')">Due Log</button>
        <button type="button" class="btn btn-primary btn-lg btn-custom" onclick="navigateTo('Sanctioned.php')">Sanctioned Log</button>
    </div>

    <!-- Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
