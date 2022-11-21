<?php
    $json = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon'));
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>
<table id="myTable">
    <thead>
        <tr>
            <th>Id</th>
		<th>Name</th>
        </tr>
    </thead>
    <tbody>
		<?php
            $i=1;
            foreach($json->results as $pokemon){
                echo "<tr><td>$i</td><td>$pokemon->name</td></tr>";
                $i++;
            }
	    ?>
    </tbody>
</table>