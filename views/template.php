<?php
    $linkPage = new LinkController();
    $page = $linkPage->linkPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Tecnica FrontEnd</title>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/load.css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/global.css">
    <?php if (!isset($_GET['url']) || $_GET['url'] == 'home') :  ?>
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/home.css">
    <?php else : ?>
        <link rel="stylesheet" href="<?=BASE_URL?>assets/css/cart.css">
    <?php endif; ?>
    
</head>
<body>

    <div id="loading" class="loading">
        <div class="spinner"></div>
    </div>

    <main>
        <?php
			include $page["page"];
		?>
    </main>


    <script src="<?=BASE_URL?>assets/js/jquery.min.js"></script>
    <script src="<?=BASE_URL?>assets/js/datatables.min.js"></script>
    <script src="<?=BASE_URL?>assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?=BASE_URL?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

    <?php if (!isset($_GET['url'])) :  ?>
        <script src="<?=BASE_URL?>assets/js/data.js"></script>
    <?php elseif (rutas()[0] == 'cart') : ?>
        <script src="<?=BASE_URL?>assets/js/cart.js"></script>
    <?php endif; ?>

    
    <script>
        window.addEventListener('load', function () {
            setInterval(function () {
                document.querySelector('#loading').classList.add('loading-inactivo')
            }, 1000);
        });
    </script>
    
</body>
</html>