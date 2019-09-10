<?php
session_start();

$img=array("slotimg/cherry.png","slotimg/club.png","slotimg/bat.png","slotimg/spade.png","slotimg/heart.png","slotimg/diomond.png","slotimg/seven.png");
	
if (isset($_POST["ROLL"]))
{
	if($_SESSION["win"] != 0)
	{
		$n1=rand(0, 6);
		$n2=rand(0, 6);
		$n3=rand(0, 6);
			
		$total="<p>TOKENS:{$_SESSION["win"]}</p>";
		
		if($n1 == 0 && $n2 == 0 && $n3 == 0)
		{
		   $_SESSION["win"]=$_SESSION["win"]-1;
		   $spin="<p>after spinning you have {$_SESSION["win"]} tokens</p>"; 
		   $_SESSION["win"] = $_SESSION["win"] + 10;
		   $won="<p>you won 10 tokens</p>";  
		}
		elseif($n1 == $n2 && $n2 == $n3)
		{
		   $_SESSION["win"]=$_SESSION["win"]-1;
		   $spin="<p>after spinning you have {$_SESSION["win"]} tokens</p>"; 
		   $_SESSION["win"] = $_SESSION["win"] + 7;
		   $won="<p>you won 7 tokens</p>";   
		}
		elseif($n1 == 0 && $n2 == 0 && $n3 != 0)
		{
		   $_SESSION["win"]=$_SESSION["win"]-1;
		   $spin="<p>after spinning you have {$_SESSION["win"]} tokens</p>"; 
		   $_SESSION["win"] = $_SESSION["win"] + 5;
		   $won="<p>you won 5 tokens</p>";   
		}
		elseif($n1 == $n2 && $n3 != $n2)
		{
		   $_SESSION["win"]=$_SESSION["win"]-1;
		   $spin="<p>after spinning you have {$_SESSION["win"]} tokens</p>"; 
		   $_SESSION["win"] = $_SESSION["win"] + 2; 
		   $won="<p>you won 2 tokens</p>";	  
		}
		elseif($n1 == 0 && $n2 != 0 && $n3 != 0)
		{
		   $_SESSION["win"]=$_SESSION["win"]-1;
		   $spin="<p>after spinning you have {$_SESSION["win"]} tokens</p>"; 
		   $_SESSION["win"] = $_SESSION["win"] + 1; 
		   $won="<p>you won 1 tokens</p>";
		}
		else
		{
		   $_SESSION["win"]=$_SESSION["win"]-1;
		   $spin="<p>after spinning you have {$_SESSION["win"]} tokens</p>"; 
		   $_SESSION["win"] = $_SESSION["win"] + 0; 
		   $won="<p>YOU WIN NOTHING!!!</p>"; 
		}
		$newtot= "<p>total is: {$_SESSION["win"]}</p>"; 
	}
	else
	{ 
		session_destroy();
		header("Location: slot.php");
	}
	
}
else
{
	$_SESSION["win"]=10;
	
	$n1=0;
	$n2=0;
	$n3=0;
		
	$total="<p>TOKENS:{$_SESSION["win"]}<br>Ready to Lose?</p>";

}
	
?>

<!DOCTYPE html>
<head>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
   
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
<body style="padding-top:2cm; background-color: #00a700;">
    	<div class="center">
    	 	<div class="col-md-4" style="padding-top:1cm;">
		   <img src="<?=$img[$n1] ?>" width="280px" height="280px"/>
		</div>
		<div class="col-md-4" style="padding-top:1cm;">
		   <img src="<?=$img[$n2] ?>" width="280px" height="280px"/>
		</div>
		<div class="col-md-4" style="padding-top:1cm;">
		   <img src="<?=$img[$n3] ?>" width="280px" height="280px"/>
		</div>
	</div>

	<div class="container" style="width:50%; text-align:center; padding-top:10cm; background-color:green; border: 2px solid gold;">
		<div class="container" style="width:50%; text-align:center; background-color:darkgreen; border: 2px solid gold;">
			<p><?php echo $total ?></p>
			<p><?php echo $spin ?></p>
			<p><?php echo $won ?></p>
			<p><?php echo $newtot ?></p>
		</div>
		<br>
		<form role="form" method="post" action="slot.php">
			<button input id="ROLL" name="ROLL" type="ROLL" value="ROLL">ROLL</button> 
		</form>
		<br>
		<form role="form" method="post" action="CO.php">
			<button input id="CO" name="CO" type="CO" value="CO">Cash Out</button> 
		</form>
		<br>
	</div>
</body>

















