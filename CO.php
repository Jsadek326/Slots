<?php
session_start();

$mess= "<p>you won a total of</p>";
$fintot= $_SESSION["win"];

if($_SESSION["win"] <= 0)
{
	session_destroy(); 
	header("Location: slot.php");
}

$gain=10-$fintot;

if($_SESSION["win"] >= 10)
{
	$buylose= "";
}
else
{
	$buylose="<button input id=\"MORE\" name=\"MORE\" type=\"MORE\" value=\"MORE\" style=\"font-size: 24px;\">Buy $gain More Tokens and Gamble </button>";
}

if (isset($_POST["MORE"]))
{

	session_destroy(); 
	header("Location: slot.php");
}

if (isset($_POST["LESS"]))
{
	header("Location: http://www.rehabs.com/about/gambling-addiction-rehabs/");	
}

?>
<!DOCTYPE html>
<head>

   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

   <style>
    .center{
    margin: auto;
    width: 50%;
    padding: 10px;
    }
    p{
    text-align: center;
    font-size: 150%;
    color: gold !important;
    }
    button{
    background-color: green;
    color: gold;
    border: 2px solid gold;
    }
    button:hover {background-color: darkgreen}
    button:active {
    background-color: darkgreen;
    transform: translateY(4px);
    }
   </style>
</head>
<body style="background-color:green;">

	<div class="column">
		<div class="container" style="width:50%; text-align:center; padding-top:1cm;">
			<h3><?php echo $mess ?></h3>
			<h2 style="color: gold"><?php echo $fintot ?> Tokens</h2>
		</div>
	<div class="container" style="width:50%; text-align:center; padding-top:5cm;">

		<form role="form" method="post" action="slot.php">
			<button input id="ROLL" name="ROLL" type="ROLL" value="ROLL" style="font-size: 24px;">Gamble Again</button>  
		</form>
		<br>
		<form role="form" method="post" action="slot.php">
			<?php echo $buylose ?>  
		</form>
		<br>
		<form role="form" method="post" action="">
			<button input id="LESS" name="LESS" type="LESS" value="LESS" style="font-size: 24px;">Use your Tokens on An Luxurious Trip</button>  
		</form>
	</div>
	  

  	</div>
</body>