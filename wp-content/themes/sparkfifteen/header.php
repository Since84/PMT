<?php

$context 				= Timber::get_context();
$context['logo']		= get_header_image();
$context['nav'] 		= new TimberMenu('main-nav');
$context['search']		= get_search_form(false);
$context['social']		= get_sidebar('social');

Timber::render('views/header.html.twig', $context);
