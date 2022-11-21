<?php
    $json = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon'));
?>

<table>
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
		<?php
            foreach($json->results as $pokemon){
                echo "<tr><td>$pokemon->name</td></tr>";
            }
	    ?>
    </tbody>
</table>