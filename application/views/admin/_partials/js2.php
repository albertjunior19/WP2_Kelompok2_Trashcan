<!-- keperluan untuk chained dropdown-->
<script src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>

<!-- <script type="text/javascript">
    $(document).ready(function() {

        $('#groupsoal').change(function() {
            var idgroup = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/dynamic_chart/fetch_subsoal'); ?>",
                method: "POST",
                data: {
                    id: idgroup
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_subsoal + '>' + data[i].subnama + '</option>';
                    }
                    // alert(html);
                    $('#subsoal').html(html);

                }
            });
            return false;
        });

    });
</script> -->



<script type="text/javascript">
    $(document).ready(function() {

        // $('#subsoal').change(function() {
            var idsubsoal = $(this).val();
            $.ajax({
                url: "<?php echo site_url('admin/dynamic_chart/fetch_yearwise2'); ?>",
                method: "POST",
                data: {
                    id_subsoal: idsubsoal
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    drawMonthwiseChart(data);
                }
            // });
            // return false;
        });

        function drawMonthwiseChart(chart_data) {
            var jsonData = chart_data;
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Jawaban');
            data.addColumn('number', 'Count');

            $.each(jsonData, function(i, jsonData) {
                var namajawaban = jsonData.namajawaban;
                var count = parseFloat($.trim(jsonData.total));
                data.addRows([
                    [namajawaban, count]
                ]);
            });

            var options = {
                title: "Hasil jumlah jawaban survey",
                hAxis: {
                    title: "Jawaban"
                },
                vAxis: {
                    title: 'Jumlah'
                },
                chartArea: {
                    width: '80%',
                    height: '85%'
                }
            }

            var chart = new google.visualization.ColumnChart(document.getElementById('year_pie'));

            chart.draw(data, options);
        }

    });
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('visualization', "1", {
        packages: ['corechart']
    });
</script>




<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js'); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('js/sb-admin.min.js'); ?>"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url('js/demo/datatables-demo.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/chart-area-demo.js'); ?>"></script>

<script>
    $(document).ready(function() {
        var i = 1;
        $('#addjawaban').click(function() {
            i++;
            html = "";
            html += '<tr id="row' + i + '">' +
                '<td>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<label for="groupname">Jawaban Sub Soal*</label>' +
                '</div>' +
                '<div class="col-md-1">:</div>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" name="namajawaban[]" value="" placeholder="Jawaban Soal">' +
                '<span style="color: red">' +
                '<?php echo form_error('namajawaban[]'); ?>' +
                '</span>' +
                '</div>' +
                '<div class="col-md-1">' +
                '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button>' +
                '</div>' +
                '</div>' +
                '</td>' +
                '</tr>';

            $('#dynamic_field').append(html);
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
<script>
    var delayInMilliseconds = 500; 
setTimeout(function() {
 //add your code here to execute
 window.print();
 }, delayInMilliseconds);
    
</script>