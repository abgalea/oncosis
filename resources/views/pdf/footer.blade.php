<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script>
            function subst() {
                var vars = {};
                var x = window.location.search.substring(1).split('&');
                for (var i in x) {
                    var z = x[i].split('=',2);
                    vars[z[0]] = unescape(z[1]);
                }
                var x = ['frompage', 'topage', 'page', 'webpage', 'section', 'subsection', 'subsubsection'];
                for (var i in x) {
                    var y = document.getElementsByClassName(x[i]);
                    for (var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
                }
            }
        </script>
    </head>
    <body style="border:0; margin: 0; font-size: 11px;" onload="subst()">
        <table style="width: 100%;">
            <tr>
                <td style="width: 33%; text-align: left;">
                    {{ $pdfData['nombres'] }}
                </td>
                <td style="text-align: center; font-size: 12px;">
                    {{ \Carbon\Carbon::now()->setTimezone('America/Argentina/Buenos_Aires')->format('d/m/Y h:i a') }}
                </td>
                <td style="width: 33%; text-align: right;">
                    Página <span class="page"></span> de <span class="topage"></span>
                </td>
            </tr>
        </table>
    </body>
</html>
