<?php
	
	require('include/function.php');
	
	$hint = $_GET['hint'];
    $id = $_GET['id'];
    // echo $hint;
	// if($hint == 'souscat') {
		$souscat = souscatByIdcat2($id);
        $souscat = json_encode($souscat);
		echo json_encode($souscat);
    // } 
    // else if($hint == 'model') {
	// 	$model = getModelFamille($id);
	// 	$model = json_encode($model);
	// 	echo json_encode($model);
	// }

?>