<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PUNTOS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>main.css">
	</head>

	<body>
		<script src="<?php echo base_url()?>jszip.min.js"></script>

		<script type="module">

			import * as THREE from '<?php echo base_url();?>three.module.js';

			import { OrbitControls } from '<?php echo base_url();?>OrbitControls.js';

			var camera, scene, renderer;
			
			var puntos = <?php echo $puntos; ?>;

			init();

			function init() {

				scene = new THREE.Scene();
				scene.background = new THREE.Color( 0x999999 );

				var light = new THREE.DirectionalLight( 0xffffff );
				light.position.set( 0.5, 1.0, 0.5 ).normalize();

				scene.add( light );

				camera = new THREE.PerspectiveCamera( 60, window.innerWidth / window.innerHeight, 1, 10000 );
				camera.position.y = 10;
				camera.position.z = 10;

				scene.add( camera );
				
				var grid = new THREE.GridHelper( 50, 50, 0xffffff, 0x555555 );
				scene.add( grid );

				renderer = new THREE.WebGLRenderer( { antialias: true } );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				document.body.appendChild( renderer.domElement );


				var punto;
				for (punto of puntos) {
				
					var radius = 0.1, segments = 16, rings = 16;
					var geometry = new THREE.SphereGeometry( radius, segments, rings);
					var sphereMaterial = new THREE.MeshLambertMaterial(
					{
						// red.
						color: 0xCC0000
					});					
					var sphere = new THREE.Mesh( geometry,sphereMaterial );
											sphere.position.x = punto.x;
											sphere.position.z = punto.y;
											sphere.position.y = punto.z;
										
					scene.add( sphere );				
					render();
				}
				render();

				
		

				var controls = new OrbitControls( camera, renderer.domElement );
				controls.addEventListener( 'change', render );
				controls.update();

				window.addEventListener( 'resize', onWindowResize, false );
			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

				render();

			}

			function render() {

				renderer.render( scene, camera );

			}

		</script>
	</body>
</html>
