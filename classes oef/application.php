<?php
	
	function __autoload( $className ) {
	    include 'classes/' . $className.'.php';
	}

	$new	=	150;
	$unit	=	100;

	$percent = new Percent( $new, $unit );

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
        table
        {
            border:1px solid lightgrey;
            border-collapse:collapse;
            max-width:350px;
        }

        td
        {
            border:1px solid lightgrey;
            padding:12px;
        }
    </style>
<?php include('../style.php'); ?>
</head>
<body>
<table>
    <caption>Hoeveel procent is <?php echo $new ?> van <?php echo $unit ?>?</caption>
    <tbody>
        <tr>
            <td>Absoluut</td>
            <td><?php echo $percent->absolute ?></td>
        </tr>
        <tr>
            <td>Relatief</td>
            <td><?php echo $percent->relative ?></td>
        </tr>
        <tr>
            <td>Geheel getal</td>
            <td><?php echo $percent->hundred ?>%</td>
        </tr>
        <tr>
            <td>Nominaal</td>
            <td><?php echo $percent->nominal ?></td>
        </tr>
    </tbody>
</table>

</body>
</html>