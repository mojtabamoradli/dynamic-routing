<?php
	if(isset($_GET['route'])) {
		$route = $_GET['route'];

		if($route == "home") { echo json_encode(array( 'url' => '', 'data'=>file_get_contents('./index.php'), )); }
		else if($route == "page1") { echo json_encode(array( 'url' => $route, 'data'=>file_get_contents('./page1.php'), )); }
		else if($route == "page2") { echo json_encode(array( 'url' => $route, 'data'=>file_get_contents('./page2.php'), )); }
		else if($route == "page3") { echo json_encode(array( 'url' => $route, 'data'=>file_get_contents('./page3.php'),)); } 
}

