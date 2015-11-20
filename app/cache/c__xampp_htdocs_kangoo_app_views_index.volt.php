<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->tag->stylesheetLink('css/materialize.min.css'); ?>
        <!-- <link href="http://materializecss.com/templates/parallax-template/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="Kangoo as a WebMail manager">
        <meta name="author" content="Susana Corrales & Pablo Arce Cascante">
        <?php echo $this->tag->getTitle(); ?>
    </head>
    <body>
        <?php echo $this->getContent(); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery-2.1.4.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/boot.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/materialize.min.js'); ?>
    </body>
</html>
