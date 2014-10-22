<?
	
	// Directory listing for 'preview' directory – used to generate page nav
	$preview_directory 	= 'preview';
	$preview_files = scandir($preview_directory);

	// Directory listing for the target preview folder. 
	// If the '?page=' query string is unset, this is the same as the preview directory above. 
	if (isset($_GET['page'])) {
		$display_directory = 'preview/' . $_GET['page'];
		$display_files = scandir($display_directory);
	} else {
		$display_directory = $preview_directory;
		$display_files = $preview_files;
	}

	sort($preview_files, SORT_NUMERIC);
	sort($display_files, SORT_NUMERIC);

	$preview_markup = '';
	$preview_style  = '';
	$nav_markup = '';

	// Loop through the top level of files and build the navigation.
	foreach($preview_files as &$file) {
		$resolution = explode(".", $file)[0];
		if (intval($resolution) == 0 && strpos($file, '.') === FALSE) {
			$nav_markup .= '<a href="?page='.$file.'">'.$file.'</a>';
		}
		unset($resolution);
	}

	// Loop through the target preview folder and build the markup for the comp previews.
	foreach($display_files as &$file) {
		
		$resolution = explode(".", $file)[0];

		if(intval($resolution) > 0) {
			$file_position  = array_search($file, $display_files);

			if($file_position != 0) {
				$lower_file = $display_files[$file_position-1];
				$lower_resolution = explode(".", $lower_file)[0];
			}

			if($file_position+1 != count($display_files)) {
				$upper_file = $display_files[$file_position+1];
				$upper_resolution = explode(".", $upper_file)[0];
			}

			$preview_markup .= '<img src="'.$display_directory.'/' . $file . '" class="res_' . $resolution . '" />';
			
			if (isset($upper_resolution)) {
				$media_upper_limit = 'and (max-width: '.$upper_resolution.'px)';
			} else {
				$media_upper_limit = '';
			}
			$preview_style .= 
				'@media (min-width: '.$resolution.'px) '. $media_upper_limit .' {
					#respre img.res_'.$resolution.' {
						display: block;
					}
				}';
		}

		unset($file_position);
		unset($lower_file);
		unset($lower_resolution);
		unset($upper_file);
		unset($upper_resolution);
		unset($resolution);
		unset($media_upper_limit);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Responsive Preview</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="app/app.css">
	<script type="text/javascript" src="app/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="app/app.js"></script>
	<style>
		<? echo $preview_style ?>
	</style>
</head>

<body>
	<? if(strlen($nav_markup) > 0) { ?>
		<div id="nav-handle">Menu</div>
		<div id="nav">
			<div class="links">
				<a href="index.php">Home</a>
				<? echo $nav_markup ?>
				<a class="close">Close</a>
			</div>
		</div>
	<? } ?>

	<div id="respre">
		<? echo $preview_markup ?>
	</div>
</body>
</html>