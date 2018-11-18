<?php
require_once 'connection.php';
require_once 'header.php';
        
$sql ="SELECT sum(importo)  as totale, clienti.provincia"
        . " FROM fatture"
        . " inner join clienti on clienti.partitaiva = fatture.partitaiva"
        . " GROUP BY clienti.provincia"
        . " ORDER BY totale desc";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$fatturato = $stmt->get_result();        
?>

<table class="table table-striped" id="table-users">
    <thead>
       
        <tr>
            <th>
                Provincia
            </th>
            <th>
                Totale fatturato
            </th>
        </tr>

    </thead>  

    <?php if ($fatturato) : ?>
        <tbody>
            <?php foreach ($fatturato as $totale) : ?>

                <tr>
                    <td>
                        <?= $totale['provincia'] ?> 
                    </td>
                    <td>
                        <?= $totale['totale'] ?>   
                    </td>
                    
                    
                </tr>

            <?php endforeach; ?>
        </tbody>
        <tfoot>

            </tfoot>
        <?php
        else : ?>
        <tr><th class="text-info text-xs-center" colspan="6"><h3>Nessun record trovato!</h3></th></tr>
        <?php
        
    endif;
    ?>

</table>
<?php
require_once 'footer.php';

