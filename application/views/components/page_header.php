<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title ?></title>
		<?php (ENVIRONMENT == 'development') ? $this->load->view('components/assets') : $this->load->view('components/assets_min') ?>
	</head>
	<body>
		<h1 class="logo ir">agCompliance</h1>
		<?php $this->load->view('components/nav/' . $nav) ?>
