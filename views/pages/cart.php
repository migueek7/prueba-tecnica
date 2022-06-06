<div class="container">
    <a href="<?=BASE_URL?>" class="pt-3 position-absolute"><< Volver al inicio</a>
</div>

<div class="container py-5 mt-5">

    <div class="row products">

        <div class="col-12 d-flex text-uppercase animate__animated animate__fadeInRight animate__delay-1s">
            <h1 class="mb-4">Orden #<?=$_GET['order']?></h1>
        </div>

        <!-- Table Card Products -->
        <?php require_once('./views/components/tableCartProducts.php'); ?>
        
        <!-- Amount Cart Products -->
        <?php require_once('./views/components/amountCartProducts.php'); ?>


    </div>
</div>

<!-- Template Item Card -->
<?php require_once('./views/components/templateItemCart.php'); ?>