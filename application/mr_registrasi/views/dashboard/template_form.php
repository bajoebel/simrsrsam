<style type="text/css">
    div.box {
        text-align: center;
    }

    .content {
        position: relative;
    }

</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<?php
$datUser = getUserById(getUID());
?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Hi, <?=$datUser['nm_lengkap']?></h3>
                    <p><?= "User Level : " . ucwords(strtolower($datUser['level'])) ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-trophy"></i>
                </div>
                <div class="small-box-footer">
                    <div>
                        <h4><?= APP_TITLE ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>