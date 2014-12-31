<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

if ( ! function_exists('is_admin')){
     function is_admin()
    {
        return Auth::check() && Auth::user()->id_rol == '1';
    }
}


if ( ! function_exists('is_user'))
{
    function is_user()
    {
        return Auth::check() && Auth::user()->id_rol == '2';
    }
}


if ( ! function_exists('is_ip'))
{
    function is_ip()
    {
        $valor = Configuration::where('label','=','Ip')->first();
        return $valor->value == '187.177.59.218';
        //return  $valor->value;
        //return 'la Ip es '.getRealIP();
    }
}



if(! function_exists('getRealIP')){

    function getRealIP()
    {

        if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
        {
            $client_ip =
                ( !empty($_SERVER['REMOTE_ADDR']) ) ?
                    $_SERVER['REMOTE_ADDR']
                    :
                    ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
                        $_ENV['REMOTE_ADDR']
                        :
                        "unknown" );

            // los proxys van añadiendo al final de esta cabecera
            // las direcciones ip que van "ocultando". Para localizar la ip real
            // del usuario se comienza a mirar por el principio hasta encontrar
            // una dirección ip que no sea del rango privado. En caso de no
            // encontrarse ninguna se toma como valor el REMOTE_ADDR

            $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);

            reset($entries);
            while (list(, $entry) = each($entries))
            {
                $entry = trim($entry);
                if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
                {
                    // http://www.faqs.org/rfcs/rfc1918.html
                    $private_ip = array(
                        '/^0\./',
                        '/^127\.0\.0\.1/',
                        '/^192\.168\..*/',
                        '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                        '/^10\..*/');

                    $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

                    if ($client_ip != $found_ip)
                    {
                        $client_ip = $found_ip;
                        break;
                    }
                }
            }
        }
        else
        {
            $client_ip =
                ( !empty($_SERVER['REMOTE_ADDR']) ) ?
                    $_SERVER['REMOTE_ADDR']
                    :
                    ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
                        $_ENV['REMOTE_ADDR']
                        :
                        "unknown" );
        }

        return $client_ip;

    }

}


require app_path().'/validators.php';
