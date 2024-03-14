<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado</title>
    <style>

        html {
            height: 100%; /* coloque uma altura no html também */
        }

        body {
            background-image: url('{{  \Voyager::image($evento->cracha) }}');
            background-position: top center;
            background-repeat:  no-repeat;
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size:  cover;
            max-width: 100%;
            /* width: auto; romava esse width */
            /* height: auto; não use "auto" coloque um valor de100% ou 100vh */
            height: 100vh;
            overflow: hidden;
            display: block;
        }

        .certificate-wrapper {
            background-image: url('{{  \Voyager::image($evento->certificado) }}');
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            border-radius: 10px;
            padding: 20px;
            max-width: 70%;
            text-align: center;
            margin-top: 20vh

        }

        .certificado-texto {
            font-size: 1.5rem;
            line-height: 1.5;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .certificate-wrapper {
                background-image: url('{{  \Voyager::image($evento->certificado) }}');
                background-size: cover;
                background-position: center;
                width: 100vw;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                border-radius: 10px;
                padding: 20px;
                max-width: 70%;
                text-align: center;
                margin-top: 20vh

            }

            .certificado-texto {
                font-size: 1.5rem;
                line-height: 1.5;
            }

            @page {
                size: A4 landscape;
                margin: 0;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-wrapper">
        <div class="container">
            <p class="certificado-texto">Certificamos que <b><em> {{$inscrito->nome}} </b></em> participou do evento
                <b><em>{{$evento->titulo}} </b></em>, realizado no dia {{$evento->getDataInicioFormatadaCertificado()}}, no {{$evento->local}}.
            </p>
        </div>
    </div>
</body>
</html>
