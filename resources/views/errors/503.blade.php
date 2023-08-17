<!DOCTYPE html>
<html>
<head>
    <title>Site em Manutenção</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .img-container {
            text-align: center;
        }
        .img-logo {
            max-height: 20vh;
        }
        h1, p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="img-container">
        <img src="{{ asset('storage/' . setting('site.logo')) }}" alt="Logo" class="img-logo">
    </div>
    <h1>Site em Manutenção</h1>
    <p>O site está temporariamente indisponível. Pedimos desculpas pelo inconveniente e agradecemos a compreensão.</p>
</body>
</html>

