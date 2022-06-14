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
$overige_info = $_POST['overig'];
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
header("Location:../Task/index.php?msg=Melding opgeslagen");
}


if($action == 'update')
{
	$id = $_POST['id'];
	$attractie = $_POST['attractie'];
	$type = $_POST['type'];
	$capaciteit = $_POST['capaciteit'];
	//
	if(isset($_POST['prioriteit']))
	{
		$prioriteit = true;
	}
	else
	{
		$prioriteit = false;
	}
	//
	$overige_info = $_POST['overig'];

	require_once 'conn.php';
	$query = "UPDATE meldingen SET attractie = :attractie, type = :type, capaciteit = :capaciteit, prioriteit = :prioriteit, overige_info = :overige_info WHERE id = :id";
	$statement = $conn->prepare($query);
	$statement->execute([
		":attractie" => $attractie,
		":type" => $type,	
		":capaciteit" => $capaciteit,
		":prioriteit" => $prioriteit,
		":overige_info" => $overige_info,
		":id" => $id
	]);
	header("Location:../Task/index.php?msg=Melding opgeslagen");
}