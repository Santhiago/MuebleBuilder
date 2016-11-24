<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MuebleBuilder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    ONLINE MUEBLE BUILDER
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">SALON</a>
                    <a href="https://laracasts.com">COMEDOR</a>
                    <a href="https://laravel-news.com">DORMITORIO</a>
                    <a href="https://forge.laravel.com">BAÑO</a>
                    
                </div>
            </div>
        </div>

        <div id="contenedorSvg" align="center">
        </div>
        <script>
            function crearSvg(ancho,alto){
            try{
            var svgNS="http://www.w3.org/2000/svg";
            var xlinkNS="http://www.w3.org/1999/xlink";
            var miSvgNew=document.createElementNS(svgNS,"svg");

            var capaContenedor=document.getElementById("contenedorSvg");
            capaContenedor.appendChild(miSvgNew);

            var miAtt=document.createAttributeNS(xlinkNS,"xlink");
            miAtt.nodeValue=xlinkNS;

            miSvgNew.setAttributeNodeNS(miAtt);

            miSvgNew.setAttribute("version","1.0");
            miSvgNew.setAttribute("width",""+ ancho +"px");
            miSvgNew.setAttribute("height",""+ alto +"px");
            miSvgNew.setAttribute("id","miSvg1");

            var miSvg1=document.getElementById("miSvg1");

            var miSvgShape=document.createElementNS(svgNS,"g");
            miSvgNew.appendChild(miSvgShape);
            miSvgShape.setAttribute("id","Cubo");


            var miSvgMarco=document.createElementNS(svgNS,"g");
            miSvgShape.appendChild(miSvgMarco);
            miSvgMarco.setAttribute("id","caras_bordes.Cubo");
            miSvgMarco.setAttribute("stroke-width","1.0px");
            miSvgMarco.setAttribute("stroke-linejoin","miter");
            miSvgMarco.setAttribute("stroke-linecap","round");
            miSvgMarco.setAttribute("stroke","rgb(51,26,0)");


            var miSvgPoligon1=document.createElementNS(svgNS,"polygon");
            miSvgMarco.appendChild(miSvgPoligon1);
            miSvgPoligon1.setAttribute("fill","rgb(45,20,0)");
            miSvgPoligon1.setAttribute("points","288.0611,131.3717 179.4857,124.30176 87.0314,143.82837 241.66351,166.68231");


            var miSvgPoligon2=document.createElementNS(svgNS,"polygon");
            miSvgMarco.appendChild(miSvgPoligon2);
            miSvgPoligon2.setAttribute("fill","rgb(47,21,0)");
            miSvgPoligon2.setAttribute("points","270.74426,239.27365 288.0611,131.3717 241.66351,166.68231 229.75984,324.47355");


            var miSvgPoligon3=document.createElementNS(svgNS,"polygon");
            miSvgMarco.appendChild(miSvgPoligon3);
            miSvgPoligon3.setAttribute("fill","rgb(154,69,0)");
            miSvgPoligon3.setAttribute("points","229.75984,324.47355 241.66351,166.68231 87.0314,143.82837 116.26482,267.61168");




            }catch(e){
            alert(e)
            }
            }
            window.onload=function(){
            crearSvg(400,400);
            var miOjSvg=document.getElementById("miSvg1");
            /*
            el objeto svg se puede recuperar
            */
            
            }
        </script>
    </body>
</html>
