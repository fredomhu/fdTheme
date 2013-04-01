<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no">

<title><?php wp_title(' | ', true, 'right'); echo get_option('blogname'); if (is_home ()) echo " | ", get_option('blogdescription'); if ($paged > 1) echo ' | Page ', $paged; ?></title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/fontdiao.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome-ie7.min.css">
<![endif]-->

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

<!--[if lt IE 9]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/lib/html5.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/lib/css3-mediaqueries.js"></script>
<![endif]-->

</head>
<body class="body-normal">
	<header class="header">
		<div class="page header-inner clearfix">
			<div class="title">
				<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
			</div>
			<a href="#" id="toggle-nav" class="toggle-nav">菜单</a>
			<div class="toggle-menu">
				<div class="search">
					<?php get_search_form(); ?>
				</div>
				<nav class="nav">
					<?php wp_nav_menu(); ?>
				</nav>
				</div>
		</div>
	</header>
	<section class="page clearfix">