<?php
require_once 'connection.php';
require_once 'header.php';

$sql ="SELECT * FROM clienti WHERE provincia =? ORDER BY nome";
$provincia = "RM";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $provincia); // 's' specifies the variable type => 'string'
$stmt->execute();
$users = $stmt->get_result();
?>

<table class="table table-striped" id="table-users">
    <thead>
       
        <tr>
            <th>
                ID
            </th>
            <th>
                Nome
            </th>
            <th>
                Indirizzo
            </th>
            <th>
                Provincia
            </th>
            <th>
               Partita iva
            </th>
           
        </tr>

    </thead>  

    <?php if ($users) : ?>
        <tbody>
            <?php foreach ($users as $user) : ?>

                <tr>
                    <td>
                        <?= $user['id'] ?> 
                    </td>
                    <td>
                        <?= $user['nome'] ?>   
                    </td>
                    <td>
                        <?= $user['indirizzo'] ?>      
                    </td>
                    <td>
                      <?= $user['provincia'] ?> 
                    </td>
                    <td>
                        <?= $user['partitaiva'] ?>   
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

