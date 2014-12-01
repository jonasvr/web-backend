<?php
    
    $message            =   false;
    $deleteConfirm      =   false;
    $deleteId           =   false;
    $brouwersEdit       =   false;


    try
    {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' ); //db verbinden

        if ( isset( $_REQUEST['delete'] ) ) //knop ingedrukt?
        {
            $query    =   'DELETE FROM brouwers
                                    WHERE brouwernr = :brouwernr';

            $statement = $db->prepare( $query );

            $statement->bindParam( ':brouwernr', $_POST['delete'] );

            $delete  =   $statement->execute();

            if ( $delete )
            {
                $message = 'Deze record is succesvol verwijderd.';
            }
            else
            {
                $message = 'Deze record kon niet verwijderd worden. Reden: ' . $statement->errorInfo(2); // php.net/manual/en/pdo.errorinfo.php
            }
        }

        $brouwersQuery  =   'SELECT * FROM brouwers';

        $brouwersStatement = $db->prepare( $brouwersQuery );
        
        $brouwersStatement->execute();

        //namen ophalen
        $brouwersNames =   array();

        for ( $nummer = 0; $nummer < $brouwersStatement->columnCount(); ++$nummer )
        {
            $brouwersNames[]   =   $brouwersStatement->getColumnMeta( $nummer ); //http://php.net/manual/en/pdostatement.getcolumnmeta.php
        }

        //brouwers ophalen
        $brouwers   =   array();

        while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) )
        {
            $brouwers[] = $row;
        }

    }
    catch ( PDOException $e )
    {
        
        $message=   'De connectie is niet gelukt.';
    }
    ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD delete</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <style>
            .voorbeeld-query-01 
            {

            }
            .voorbeeld-query-01 table
            {
                font-size:12px;
                overflow:auto;
            }

            .voorbeeld-query-01 table th,
            .voorbeeld-query-01 table td
            {
                padding:4px;
            }

            .voorbeeld-query-01 table th
            {
                background: #DFDFDF;
                text-align:center;
            }

            .voorbeeld-query-01 table tr
            {
                transition: all 0.2s ease-out;
            }

            .voorbeeld-query-01 table tr:hover
            {
                background-color:lightgreen;
            }

            .voorbeeld-query-01 .odd
            {
                background: #F1F1F1;
            }

            .deletion
            {
                color: #b94a48;
                background-color: #f2dede;
            }

            .input-icon-button
            {
                border: none;
                background-color:transparent;
                cursor:pointer;
                text-indent:-1000px;
            }

            .delete
            {
                width:16px;
                height:16px;
                background: url("http://web-backend.local/img/icon-delete.png") no-repeat;
            }
        </style>
        
        <section class="body">
            
            <h1>Opdracht CRUD delete: deel 1</h1>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <table>
                    
                    <thead>
                        <tr>
                            <?php foreach ($brouwersNames as $brouwerName): ?>
                                <th><?= $fieldname ?></th>
                            <?php endforeach ?>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($brouwers as $key => $brouwer): ?>
                            <tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?>">
                                <?php foreach ($brouwer as $value): ?>
                                    <td><?= $value ?></td>
                                <?php endforeach ?>
                                <td>
                                    <!-- http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value -->
                                    <button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
                                        <img src="icon-delete.png" alt="Delete button">
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        
                    </tbody>

                </table>
            </form>
            
        </section>
     
    </body>
</html>
