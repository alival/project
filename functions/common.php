<?php

function redirect($url) {
	header('Location: '.$url);
	exit;
}

function pagination($array, $limit, $page) {

	if (isset($_GET['page']))
    {
        $page = $_GET['page']-1;
    }
    else
    {
        $page = 0;
    }
	$count_array = count($array);
	$max_page = ceil($count_array/$limit);
	$pagination = '';
	for($i = 0; $i < $max_page; $i++)
	{	
	    $pagination .= '<a href="'. $pageName .'.php?page='.($i+1).'">'.($i+1).'</a>';
	}
	$sliced_array = array_slice($array, $limit*$page, $limit);
	foreach ($sliced_array as $pieces)
	{
	    echo $pieces.'<br />';	
	}
}