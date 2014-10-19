<?
	
	$directory 	= 'preview';
	$files		= scandir($directory);
	sort($files, SORT_NUMERIC);


	$markup = '';
	$style  = '';

	foreach($files as &$file) {
		
		$file_position  = array_search($file, $files);

		if($file_position != 0) {
			$lower_file = $files[$file_position-1];
			$lower_resolution = explode(".", $lower_file)[0];
		}

		if($file_position+1 != count($files)) {
			$upper_file = $files[$file_position+1];
			$upper_resolution = explode(".", $upper_file)[0];
		}

		$resolution = explode(".", $file)[0];

		if(intval($resolution) > 0) {
			$markup .= '<img src="preview/' . $file . '" class="res_' . $resolution . '" />';
			
			if (isset($upper_resolution)) {
				$media_upper_limit = 'and (max-width: '.$upper_resolution.'px)';
			} else {
				$media_upper_limit = '';
			}
			$style .= 
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
	<style>
		body {
			margin: 0;
			padding: 0;
		}
		#respre img {
			display: none;
			width: 100%;
		}
		<? echo $style ?>
	</style>
</head>

<body>
	<div id="respre">
		<? echo $markup ?>
	</div>
</body>
</html>