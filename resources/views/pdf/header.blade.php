<!DOCTYPE html>
<html>
    <head>
        <title>Cabecera</title>
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td width="50%">
                    <h3>Dra. Nora Mohr de Krause</h3>
                </td>
                <td width="50%" class="text-right">
                    {{ $pdfData['titulo'] }}
                </td>
            </tr>
        </table>
    </body>
</html>
