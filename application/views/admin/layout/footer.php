<!-- Essential javascripts for application to work-->
<script src="<?= base_url() ?>assets/admin/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?= base_url() ?>assets/admin/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="<?= base_url() ?>assets/admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/admin/js/plugins/dataTables.bootstrap.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    $('#sampleTable').DataTable();
    $('#dari').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd-mm-yyyy', 
        maxDate: function () {
            return $('#sampai').val();
        }
    });
    $('#sampai').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd-mm-yyyy', 
        minDate: function () {
            return $('#dari').val();
        }
    });
</script>
</body>

</html>