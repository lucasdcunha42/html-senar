<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Etiqueta</title>
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            h1 {
                font-size: 70%;
            }

            @page {
                size: auto;
                margin: 0;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div>
        <h1>{{ $inscrito->nome }}</h1>
    </div>
</body>
</html>
