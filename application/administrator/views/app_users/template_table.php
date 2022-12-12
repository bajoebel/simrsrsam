<style>
    div#pagination b {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    div#pagination a {
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }

    .modal-content {
        max-height: 500px;
        overflow: scroll;
    }
</style>


<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="tab">
            <li class="active"><a href="<?php echo base_url() . 'administrator.php/app_users/getTabAdminApp' ?>">Admin App</a></li>
            <li><a href="<?php echo base_url() . 'administrator.php/app_users/getTabMrRegistrasiApp' ?>">MR Registrasi App</a></li>
            <li><a href="<?php echo base_url() . 'administrator.php/app_users/getTabMrDokumenApp' ?>">MR Dokumen App</a></li>
            <li><a href="<?php echo base_url() . 'administrator.php/app_users/getTabNotaTagihanApp' ?>">Nota Tagihan App</a></li>
            <li><a href="<?php echo base_url() . 'administrator.php/app_users/getTabFarmasiApp' ?>">Farmasi App</a></li>
            <li><a href="<?php echo base_url() . 'administrator.php/app_users/getTabKasirApp' ?>">Kasir App</a></li>
        </ul>
        <div id="ajax-content"></div>

    </div>

</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tab li a").click(function() {
            $("#ajax-content").empty().append("<div id='loading' style='text-align:center'><img src='<?php echo base_url() . 'assets/' ?>images/loading.gif' alt='Loading' /></div>");
            $("#tab li a").parent().removeClass('active');
            $(this).parent().addClass('active');

            $.ajax({
                url: this.href,
                success: function(html) {
                    $("#ajax-content").empty().append(html);
                }
            });
            return false;
        });

        $.ajax({
            url: '<?php echo base_url() . 'administrator.php/app_users/getTabAdminApp' ?>',
            success: function(html) {
                $("#ajax-content").empty().append(html);
            }
        });
    });

    function setLevelNota(nrp, levelid) {

    }
</script>
</body>

</html>