<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MuebleBuilder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="../js/build/three.min.js"></script>
        <script src="../js/loaders/STLLoader.js"></script>
        <script src="../js/build/Detector.js"></script>
        <script src="../js/build/Stats.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .full-height {
                height: 35vh;
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

            #container_id {
                position: absolute;
                width: 100%;
                height: 100%;
            }

        </style>

             

    </head>
    <body>
        
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    ONLINE MUEBLE BUILDER
                </div>

                <div class="links">
                    <a href="">SALON</a>
                    <a href="">COMEDOR</a>
                    <a href="">DORMITORIO</a>
                    <a href="">BAÑO</a>
                    
                </div>
            </div>
        </div>

        <div id="container_id">
            <script>

            if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

            var container, stats;

            var camera, scene, renderer, objects;

            init();
            animate();

            function init() {

                container = document.createElement( 'div' );
                document.body.appendChild( container );

                camera = new THREE.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 1, 15 );
                camera.position.set( 3, 0.5, 3 );

                scene = new THREE.Scene();

                scene.fog = new THREE.Fog( 0xffffff, 2, 15 );
                scene.fog.color.setHSV( 1.0, 1.0, 1.0 );

                // Grid

                // var size = 20, step = 0.25;

                // var geometry = new THREE.Geometry();
                // var material = new THREE.LineBasicMaterial( { color: 0x000000 } );

                // for ( var i = - size; i <= size; i += step ) {

                //  geometry.vertices.push( new THREE.Vector3( - size, - 0.04, i ) );
                //  geometry.vertices.push( new THREE.Vector3(   size, - 0.04, i ) );

                //  geometry.vertices.push( new THREE.Vector3( i, - 0.04, - size ) );
                //  geometry.vertices.push( new THREE.Vector3( i, - 0.04,   size ) );

                // }

                // var line = new THREE.Line( geometry, material, THREE.LinePieces );
                // line.position.y = -0.46;
                // scene.add( line );

                // Ground

                // var plane = new THREE.Mesh( new THREE.PlaneGeometry( 40, 40 ), new THREE.MeshPhongMaterial( { ambient: 0x999999, color: 0x999999, specular: 0x101010, perPixel: true } ) );
                // plane.rotation.x = -Math.PI/2;
                // plane.position.y = -0.5;
                // scene.add( plane );

                // plane.receiveShadow = true;

                // Object

                var loader = new THREE.STLLoader();
                loader.addEventListener( 'load', function ( event ) {

                    var geometry = event.content;
                    var material = new THREE.MeshPhongMaterial( { ambient: 0xff5533, color: 0xff5533, specular: 0x111111, shininess: 200, perPixel: true } );
                    var mesh = new THREE.Mesh( geometry, material );

                    mesh.castShadow = true;
                    mesh.receiveShadow = true;

                    scene.add( mesh );

                } );
                loader.load( '../models/stl/slotted_disk.stl' );

                // Lights

                scene.add( new THREE.AmbientLight( 0x777777 ) );

                addShadowedLight( 1, 1, 1, 0xffffff, 1.35 );
                addShadowedLight( 0.5, 1, -1, 0xffaa00, 1 );

                // renderer

                renderer = new THREE.WebGLRenderer( { antialias: true, clearColor: 0x111111, clearAlpha: 1, alpha: false } );
                renderer.setSize( window.innerWidth, window.innerHeight );

                renderer.setClearColor( scene.fog.color, 1 );

                renderer.gammaInput = true;
                renderer.gammaOutput = true;
                renderer.physicallyBasedShading = true;

                renderer.shadowMapEnabled = true;
                renderer.shadowMapCullFrontFaces = false;

                container.appendChild( renderer.domElement );

                // // stats

                // stats = new Stats();
                // stats.domElement.style.position = 'absolute';
                // stats.domElement.style.top = '0px';
                // container.appendChild( stats.domElement );

                //

                window.addEventListener( 'resize', onWindowResize, false );

            }

            function addShadowedLight( x, y, z, color, intensity ) {

                var directionalLight = new THREE.DirectionalLight( color, intensity );
                directionalLight.position.set( x, y, z )
                scene.add( directionalLight );

                directionalLight.castShadow = true;
                //directionalLight.shadowCameraVisible = true;

                var d = 1;
                directionalLight.shadowCameraLeft = -d;
                directionalLight.shadowCameraRight = d;
                directionalLight.shadowCameraTop = d;
                directionalLight.shadowCameraBottom = -d;

                directionalLight.shadowCameraNear = 1;
                directionalLight.shadowCameraFar = 4;

                directionalLight.shadowMapWidth = 2048;
                directionalLight.shadowMapHeight = 2048;

                directionalLight.shadowBias = -0.005;
                directionalLight.shadowDarkness = 0.15;

            }

            function onWindowResize() {

                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();

                renderer.setSize( window.innerWidth, window.innerHeight );

            }

            //

            function animate() {

                requestAnimationFrame( animate );

                render();
                //stats.update();

            }

            function render() {

                var timer = Date.now() * 0.0005;

                camera.position.x = Math.cos( timer ) * 5;
                camera.position.z = Math.sin( timer ) * 5;

                camera.lookAt( scene.position );

                renderer.render( scene, camera );

            }

        </script>
        </div>

       
    </body>
</html>
