<?php require 'views/header.php'; ?>

    <div id="content" class="row">
        <h1 class="col-md-12">Fehler - <?php echo $this->params['error_title']; ?></h1>
        <div class="col-md-8 col-md-offset-2" style="padding:4rem;text-align: center">
            <p style="font-size: 2rem">
                <?php
                    echo $this->params['error_message'];
                ?>
            </p>
        </div>
    </div>


<?php require 'views/footer.php'; ?>