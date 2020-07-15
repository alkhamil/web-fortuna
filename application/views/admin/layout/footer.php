<!-- Essential javascripts for application to work-->
<script src="<?= base_url() ?>assets/admin/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="<?= base_url() ?>assets/admin/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/main.js"></script>
<script src="<?= base_url() ?>assets/admin/js/Chart.js"></script>
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
	function getGrafik(s, e) {
		var canvas = document.getElementById('grafik')
		var ctx = canvas.getContext('2d');
		ctx.setTransform(1, 0, 0, 1, 0, 0);
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		var url = "<?= base_url('/grafik') ?>";
		var labels = [];
		var datas = [];
		$.ajax({
			type: "GET",
			url: url,
			data: {
				start_date: s,
				end_date: e,
			},
			dataType: "JSON",
			success: function (res) {
				res.forEach(val => {
					labels.push(val.class_name);
					datas.push(val.trx_count);
				});
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: labels,
						datasets: [{
							label: '#',
							data: datas,
							backgroundColor: [
								'rgba(255, 99, 132, 0.2)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)'
							],
							borderColor: [
								'rgba(255, 99, 132, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)',
							],
							borderWidth: 2
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						}
					}
				});
			}
		});
	}

	var start = moment().subtract(29, 'days');
    var end = moment();
	getGrafik(start.format('D-MM-YYYY'), end.format('D-MM-YYYY'))

	function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

	$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
		var startDATE = picker.startDate.format('D-MM-YYYY');
		var endDATE = picker.endDate.format('D-MM-YYYY');
		getGrafik(startDATE, endDATE);
	});

	cb(start, end);
</script>

</body>

</html>