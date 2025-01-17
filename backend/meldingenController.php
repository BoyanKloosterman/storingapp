<?php 
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        $msg="Jemoeteerstinloggen!";
        header("Location: ../login.php?msg=$msg");
        exit;
    }
?>
<?php

$action = $_POST["action"];
//Variabelen vullen
if ($action == "create")
{
$attractie = $_POST['attractie'];
if(empty($attractie))
{
	$errors[] = "Vul de attractie-naam in";
}
//
$type = $_POST['type'];
if(empty($type))
{
	$errors[] = "Kies uw type";
}
//
if (isset($_POST['prioriteit']))
{
	$prioriteit = true;
}
else
{
	$prioriteit = false;
}
//
$capaciteit = $_POST['capaciteit'];
if(!is_numeric($capaciteit))
{
	$errors[] = "Vul voor capaciteit een geldig getal in";
} 
//
$melder = $_POST['melder'];
if(empty($melder))
{
	$errors [] = "Vul uw naam in";
}
//
$overige_info = $_POST['overige_info'];
if(isset($errors))
{
	var_dump($errors);
	die();
}


//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type, prioriteit, capaciteit, melder, overige_info) VALUES(:attractie, :type, :prioriteit, :capaciteit, :melder, :overige_info)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
	":attractie" => $attractie,
	":type" => $type,
	":prioriteit" => $prioriteit,
	":capaciteit" => $capaciteit,
	":melder" => $melder,
	":overige_info" => $overige_info
]);
header("Location:../meldingen/index.php?msg=Melding opgeslagen");
}


if($action == 'update')
{
	$id = $_POST['id'];
	$attractie = $_POST['attractie'];
	if(empty($attractie))
	{
		$errors[] = "Vul de attractie-naam in";
	}
	//
	$capaciteit = $_POST['capaciteit'];
	if(!is_numeric($capaciteit))
	{
		$errors[] = "Vul voor capaciteit een geldig getal in";
	} 
	//
	$overige_info = $_POST['overige_info'];
	if(isset($errors))
	{
		var_dump($errors);
		die();
	}
	require_once 'conn.php';
	$query = "UPDATE meldingen SET attractie = :attractie, capaciteit = :capaciteit, overige_info = :overige_info WHERE id = :id";
	$statement = $conn->prepare($query);
	$statement->execute([
		":attractie" => $attractie,
		":capaciteit" => $capaciteit,
		":overig_info" => $overige_info,
		":id" => $id
	]);
	header("Location:../meldingen/index.php?msg=Melding opgeslagen");
}


if($action == 'delete')
    {
        $id = $_POST['id'];
        require_once 'conn.php';
        $query = "DELETE FROM meldingen WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);
        header("Location:../meldingen/index.php?msg=Melding verwijderd");
    }