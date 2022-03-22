<?php
// INT to DEV
// Variables utiles que pour les intés

$layout    = (isset($_GET['layout'])) ? $_GET['layout'] : false;
$page      = (isset($_GET['page'])) ? $_GET['page'] : false;
$title     = (isset($_GET['title']) ? $_GET['title'] : $page);
$theme     = (isset($_GET['color']) ? 'theme-' . $_GET['color'] : '');
$bodyClass = (isset($_GET['body-class']) ? $_GET['body-class'] : '');

function lorem($min, $max = false)
{
   $length = $min;
   if ($max) {
       $length = rand($min, $max);
   }
   $dummy_text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis lectus sed nisl tempor lacinia. Nam nec augue nec lacus vehicula sagittis id eu elit. Praesent molestie nunc a quam consequat sollicitudin auctor ligula cursus. Nunc at lacinia augue. Aliquam vel lectus tortor, eget scelerisque erat. Nunc ornare cursus rutrum. Proin enim libero, mattis vitae tristique ac, auctor sit amet lorem. Nullam tincidunt facilisis dolor non cursus. Nullam fringilla tempus velit. Integer leo urna, porttitor porta cursus vel, laoreet at nisi. Sed dictum accumsan metus ut porta. Suspendisse a lectus ac tortor varius suscipit non in mauris. Morbi ullamcorper, orci et volutpat aliquam, leo orci facilisis tortor, eget viverra magna ante ac nunc. Nunc lacus sapien, hendrerit nec elementum ut, faucibus quis eros. Vivamus libero dui, euismod vel euismod vel, porta vitae ligula. Pellentesque et orci id odio luctus mollis. Nulla condimentum, felis et scelerisque eleifend, dui lectus convallis dolor, nec feugiat dui purus id nunc. Praesent a nunc ac metus dignissim aliquet. Duis lectus est, venenatis vitae feugiat sed, ultricies id augue. Aliquam quis fringilla ipsum. Nunc ornare mollis eros, sit amet commodo sapien congue in. Nullam placerat, nibh at fermentum viverra, tellus urna bibendum lectus, sed luctus arcu tellus nec lorem. Fusce eleifend pulvinar purus, id auctor nunc convallis at. Mauris rhoncus cursus risus, vel laoreet felis vestibulum quis. Nulla vitae diam dui. ";

   return ucfirst(trim(substr($dummy_text, rand(0, 100), $length)));
}


function pkg_collection_js($name)
{
    $pkgFile = __DIR__ . '/../gulp/config.json';
    $pkg     = json_decode(file_get_contents($pkgFile));

    if (empty($pkg->collections)) {
        return;
    }

    $items = object_get($pkg->collections, $name);
    if (!$items) {
        return;
    }

    foreach ($items as $item) {
        echo '<script src="' . $item . '"></script>' . PHP_EOL;
    }
}


if ( ! function_exists('object_get'))
{
    /**
     * Get an item from an object using "dot" notation.
     *
     * @param  object  $object
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function object_get($object, $key, $default = null)
    {
        if (is_null($key) || trim($key) == '') return $object;

        foreach (explode('.', $key) as $segment)
        {
            if ( ! is_object($object) || ! isset($object->{$segment}))
            {
                return value($default);
            }

            $object = $object->{$segment};
        }

        return $object;
    }
}




