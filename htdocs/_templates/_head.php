<head>
	<meta charset="UTF-8">
    <meta name="author" content="Saran SNA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=2, viewport-fit=cover -->
	<meta name="description" content="the page description">
	<link rel="canonical" href="http://photogram.saran.com/">
    <title>photogram - <?=basename($_SERVER['PHP_SELF'], ".php");?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?=get_config('base_path')?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=get_config('base_path')?>assets/dist/css/font-awesome.min.css" rel="stylesheet">

	<!-- JS has to be loaded in footer not header as it impacts page load time. -->

	<?php if (file_exists($_SERVER['DOCUMENT_ROOT'] .get_config('base_path').'css/' . basename($_SERVER['PHP_SELF'], ".php") . ".css")) { ?>
		<link href="<?=get_config('base_path')?>css/<?= basename($_SERVER['PHP_SELF'], ".php") ?>.css" rel="stylesheet">
	<?php } ?>

	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/logreg.css">

</head>