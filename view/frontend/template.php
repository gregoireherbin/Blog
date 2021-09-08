<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    </head>
        
    <body>
        <main class="container">
            <?php include('includes/header.php'); ?>

            <?=  $content ?>
            
            <?php include('includes/footer.php'); ?>
        </main>

    </body>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="public/js/masonry-docs.min.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
</html>