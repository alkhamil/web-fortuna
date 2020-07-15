    <script src="<?= base_url() ?>assets/admin/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#check-in').datepicker({
        format: 'dd mmm yyyy', 
        uiLibrary: 'bootstrap4',
        minDate: today,
        close: function() {
            var d = new Date($(this).val());
            var month = new Array();
            month[0] = "Jan";
            month[1] = "Feb";
            month[2] = "Mar";
            month[3] = "Apr";
            month[4] = "May";
            month[5] = "Jun";
            month[6] = "Jul";
            month[7] = "Aug";
            month[8] = "Sep";
            month[9] = "Oct";
            month[10] = "Nov";
            month[11] = "Dec";
            var date = d.getDate() + 1;
            date.toString();
            var month = month[d.getMonth()];
            var year = d.getFullYear().toString();
            var result = date+' '+month+' '+year;
            $('#check-out').val(result);
            var checkin = new Date($(this).val());
            var checkout = new Date(result);
            var days   = (checkout - checkin)/1000/60/60/24;
            $('#durasi-menginap').val(days);
        }
    });

    $('#tgl_lahir').datepicker({
        format: 'dd mmm yyyy', 
        uiLibrary: 'bootstrap4',
        maxDate: today,
        minDate: new Date(1898, 0, 0),
        close : function() {
            var tgllahir = new Date($(this).val());
            var tglsekarang = new Date();
            var usia   = (tglsekarang - tgllahir)/1000/60/60/24;
            if (usia < 6209.25) {
                alert("Belum cukup umur silahkan ganti form usia");
                $(this).val("");
            }
        }
    });



    $('#check-out').datepicker({
        format: 'dd mmm yyyy', 
        uiLibrary: 'bootstrap4',
        minDate: function () {
            var d = new Date($('#check-in').val());
            var month = new Array();
            month[0] = "Jan";
            month[1] = "Feb";
            month[2] = "Mar";
            month[3] = "Apr";
            month[4] = "May";
            month[5] = "Jun";
            month[6] = "Jul";
            month[7] = "Aug";
            month[8] = "Sep";
            month[9] = "Oct";
            month[10] = "Nov";
            month[11] = "Dec";
            var date = d.getDate() + 1;
            date.toString();
            var month = month[d.getMonth()];
            var year = d.getFullYear().toString();
            var result = date+' '+month+' '+year;
            return result;
        },
        close : function() {
            var checkin = new Date($('#check-in').val());
            var checkout = new Date($(this).val());
            var days   = (checkout - checkin)/1000/60/60/24;
            $('#durasi-menginap').val(days);
        }
    });

    var harga = $('#harga').val();
    var durasi = $('#durasi').val();
    var hasil = harga * durasi;
    var num = formatRupiah(hasil);
    $('#visa').on('click', function(){
        $('#bank').html(`<table class="table">
                        <tr>
                            <td>Nama Bank</td>
                            <td>:</td>
                            <td>Mandiri</td>
                        </tr>
                        <tr>
                            <td>No Rekening</td>
                            <td>:</td>
                            <td>10000029987</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td>Rakacia Hotel</td>
                        </tr>
                    </table>`);
        var d = new Date();
        var n = d.getHours();
        if (n<17) {
            $('#btn-lanjut').removeAttr('disabled');
            $('#btn-lanjut').removeAttr('style');
        }else {
            $('#btn-lanjut').attr('disabled');
            $('#btn-lanjut').attr('style', 'cursor:not-allowed');
        }
        $('#total').html('<h3>Total yang harus dibayar: Rp. '+num+'</h3>');
        $('#bangCus').show();
    });

    $('#mastercard').on('click', function(){
        $('#bank').html(`<table class="table">
                        <tr>
                            <td>Nama Bank</td>
                            <td>:</td>
                            <td>BCA</td>
                        </tr>
                        <tr>
                            <td>No Rekening</td>
                            <td>:</td>
                            <td>2099389898</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td>Rakacia Hotel</td>
                        </tr>
                    </table>`);
        var d = new Date();
        var n = d.getHours();
        if (n<17) {
            $('#btn-lanjut').removeAttr('disabled');
            $('#btn-lanjut').removeAttr('style');
        }else {
            $('#btn-lanjut').attr('disabled','disabled');
            $('#btn-lanjut').attr('style', 'cursor:not-allowed');
            $('#jam').text('Sudah jam 17.00 anda tidak bisa checkin, silahkan checkin sebelum pukul 17.00');
        }
        $('#total').html('<h3>Total yang harus dibayar: Rp. '+num+'</h3>');
        $('#bangCus').show();
    });

    function formatRupiah(bilangan){
        var	number_string = bilangan.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah;
    }

    
</script>
  </body>
</html>