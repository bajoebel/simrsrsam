<style type="text/css">
    button.btn-dash {
        margin: 50px 20px;
        width: 200px;
        padding: 30px 0;
        border: 1px solid #3c8dbc;
    }

    div.box {
        text-align: center;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="error-page">
            <h5 class="headline text-yellow"> 404</h5>
            <div class="error-content">
                <h1><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h1>
                <p>Kami tidak menemukan halaman yang anda minta. Sementara itu, kamu mungkin ingin <a href="<?= base_url() . 'dashboard'; ?>">Kembali ke dashboard</a> </p>
            </div>
        </div>
    </div>
</section>