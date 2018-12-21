@extends('layouts.app')
@section('css')
    <style>
        body {
            background-color: #000000;
            margin: 0;
            font-family: Helvetica, sans-serif;;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')

    <div id="webgl"></div>

@endsection

@section('js')
    <script src="{{ asset('js/three.min.js') }}"></script>
    <script src="{{ asset('js/tween.min.js') }}"></script>
    <script src="{{ asset('js/TrackballControls.js') }}"></script>
    <script src="{{ asset('js/renderers/CSS3DRenderer.js') }}"></script>
    <script>
        var camera, scene, renderer;
        var controls;
        var objects = [];
        var targets = { sphere: [] };
        var data = '{!! $articles !!}'
        var table = []
        var url_root = "https://www.sparki.cn"
        init()
        animate()
        function init() {
            table = JSON.parse(data)
            camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 10000 );
            camera.position.z = 3000;
            scene = new THREE.Scene();
            for ( var i = 0; i < table.length; i++ ) {
                var main_element = createMainElement(i);
                var layer = createLayer();
                var text = createText(i);
                layer.appendChild(text)
                main_element.appendChild(layer)
                var object = new THREE.CSS3DObject( main_element );
                object.position.x = Math.random() * 4000 - 2000;
                object.position.y = Math.random() * 4000 - 2000;
                object.position.z = Math.random() * 4000 - 2000;
                scene.add( object );
                objects.push( object );
            }
            var vector = new THREE.Vector3();
            for ( var i = 0, l = objects.length; i < l; i ++ ) {
                var phi = Math.acos( - 1 + ( 2 * i ) / l );
                var theta = Math.sqrt( l * Math.PI ) * phi;
                var object = new THREE.Object3D();
                object.position.setFromSphericalCoords( 1000, phi, theta );
                vector.copy( object.position ).multiplyScalar( 2 );
                object.lookAt( vector );
                targets.sphere.push( object );
            }
            renderer = new THREE.CSS3DRenderer();
            renderer.setSize( window.innerWidth, window.innerHeight );
            document.getElementById( 'webgl' ).appendChild( renderer.domElement );

            controls = new THREE.TrackballControls( camera, renderer.domElement );
            controls.rotateSpeed = 0.5;
            controls.minDistance = 500;
            controls.maxDistance = 6000;
            controls.addEventListener( 'change', render );

            transform( targets.sphere, 2000 );
        }

        function createMainElement(i) {
            var mainelement = document.createElement('div');
            mainelement.className = 'element';
            mainelement.style.background = 'url(' + url_root + table[i].thumbnail + ') no-repeat center center';
            mainelement.style.backgroundSize = 'cover';
            mainelement.style.display = 'flex';
            mainelement.style.alignItems = 'center';
            mainelement.style.justifyContent = 'center';
            mainelement.style.width = '600px';
            mainelement.style.height = '450px';
            return mainelement
        }

        function createLayer() {
            var layer = document.createElement('div');
            layer.className = 'layer';
            layer.style.width = '100%';
            layer.style.height = '100%';
            layer.style.display = 'flex';
            layer.style.alignItems = 'center';
            layer.style.justifyContent = 'center';
            layer.style.zIndex = 10
            layer.style.background = 'rgba(0,0,27,.6)'
            return layer
        }

        function createText(i) {
            var text = document.createElement('a')
            text.innerText = table[i].title
            text.style.color = 'rgba(207,226,243,' + ( Math.random() * 0.5 + 0.25 ) + ')';
            text.style.fontSize = '4rem';
            text.style.height = '100%';
            text.style.display = 'flex';
            text.style.alignItems = 'center';
            text.style.justifyContent = 'center';
            text.style.padding = '0 2rem';
            text.href = url_root + '/article/' + table[i].slug;
            return text
        }

        function transform( targets, duration ) {
            TWEEN.removeAll();
            for ( var i = 0; i < objects.length; i ++ ) {
                var object = objects[ i ];
                var target = targets[ i ];
                new TWEEN.Tween( object.position )
                    .to( { x: target.position.x, y: target.position.y, z: target.position.z }, Math.random() * duration + duration )
                    .easing( TWEEN.Easing.Exponential.InOut )
                    .start();
                new TWEEN.Tween( object.rotation )
                    .to( { x: target.rotation.x, y: target.rotation.y, z: target.rotation.z }, Math.random() * duration + duration )
                    .easing( TWEEN.Easing.Exponential.InOut )
                    .start();
            }
            new TWEEN.Tween( this )
                .to( {}, duration * 2 )
                .onUpdate( render )
                .start();
        }

        function onWindowResize() {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize( window.innerWidth, window.innerHeight );
            render();
        }

        function animate() {
            requestAnimationFrame( animate );
            TWEEN.update();
            controls.update();
        }

        function render() {
            renderer.render( scene, camera );
        }
    </script>
@endsection