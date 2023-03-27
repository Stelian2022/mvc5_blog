<?php

$routes = array(
    array('home','default','index'),
    array('404','default','Page404'),
    array('contact','default','Contact'),
    //blog
    array('blog','blog','listing'),
    array('article','blog','show',['id']),
    array('add-article','blog','add')
);









