<?php
    $json = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon'));
?>
<link rel="stylesheet" href="cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<table id="myTable">
</table>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable(
            data: <?php $json->results ?>
        );
    });
</script>