<h1 class="h3 mb-2 text-gray-800" style="text-align: center">Modification Coin</h1>
<!-- DataTales Example -->
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="card shadow mb-4" style="width:500px;">
            <div class="card-body">
                
                <p>Valeur actuelle:  <?php echo $coin['ariary']; ?> Ar </p>
                <form action="<?php echo site_url("Admin/updateConfig") ?>" method="post">
                    <input type="text" class="form-control bg-light border-0 small" name="ariary" placeholder="Valeur en Ariary">
                    <br>
                    <?php if(ISSET($message)) {
                        echo $message;
                    }?>
                    <br>
                    <button class="btn btn-primary" type="submit">
                        Valider
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>