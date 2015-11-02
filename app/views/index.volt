<!DOCTYPE html>
<html>
    <head>
        {{ stylesheet_link('css/materialize.min.css') }}
        <!-- <link href="http://materializecss.com/templates/parallax-template/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="Kangoo as a WebMail manager">
        <meta name="author" content="Susana Corrales & Pablo Arce Cascante">
        {{ get_title()}}
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('js/jquery-2.1.4.min.js')}}
        {{ javascript_include('js/materialize.min.js') }}
    </body>
</html>
