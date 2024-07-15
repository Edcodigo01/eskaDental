<?php

// use App\Models\Article;
function clean_text($description){
    $description = str_replace('<strong>','',$description );
    $description = str_replace('</strong>','',$description);
    $description = str_replace('<p>','',$description);
    $description = str_replace('</p>','',$description);
    $description = str_replace('<ul>','',$description);
    $description = str_replace('</ul>','',$description);
    $description = str_replace('<h1>','',$description);
    $description = str_replace('</h1>','',$description);
    $description = str_replace('<h2>','',$description);
    $description = str_replace('</h2>','',$description);
    $description = str_replace('<h3>','',$description);
    $description = str_replace('</h3>','',$description);
    $description = str_replace('<h4>','',$description);
    $description = str_replace('</h4>','',$description);
    $description = str_replace('<h5>','',$description);
    $description = str_replace('</h5>','',$description);
    $description = str_replace('<h6>','',$description);
    $description = str_replace('</h6>','',$description);
    $description = str_replace('<li>','',$description);
    $description = str_replace('</li>','',$description);
    $description = str_replace('<span>','',$description);
    $description = str_replace('</span>','',$description);
    $description = str_replace('<i>','',$description);
    $description = str_replace('</i>','',$description);
    $description = str_replace('<a>','',$description);
    $description = str_replace('</a>','',$description);
    $description = str_replace('<a href="','',$description);
    $description = str_replace('</a>','',$description);
    return $description;
}

function cutTextClean($text,$limit){
   $text = clean_text($text);
   $new = mb_substr($text, 0, $limit);
   $length = strlen($text);
   if ( $length  > $limit ) {
      $new = $new.'...';
   }
   return $new;
}
function cutText($text,$limit){

   $new = mb_substr($text, 0, $limit);
   $length = strlen($text);
   if ( $length  > $limit ) {
      $new = $new.'...';
   }
   return $new;
}

function imageP($model){
    if($model->imageP){
        return asset($model->imageP->path);
    }else{
        return asset('public/images/default/defaultArticle/noImage.jpg');
    }
}

function clientWidth(){
    echo "<script type='text/javascript'>document.write(document.body.clientWidth)</script>";
}
