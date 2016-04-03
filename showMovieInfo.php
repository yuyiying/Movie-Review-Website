<!DOCTYPE html>
<html>
<head>
<style>
body
{
    background-color: linen;


}
#p1
{
	color: orange;
	text-align: center;
	font-size: 20px;
}
#p2
{
	text-align: center;
}
#section {


    padding:0px;    
    padding: 100px,100px;
    height: 340px;
    color: orange;
    text-align: center;
    font-size: 20px;
       
}

#footer {
    background-color:orange;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;      
}

#header {
    background-color:orange;
    color:white;
    text-align:center;
    padding:5px;
}
ul#menu {
    padding: 0px;
    text-align: left;
}

ul#menu li {  
    display: inline;
}

ul#menu li a {
    background-color: orange;
    font-size: 20pt;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px 4px 0 0;
    text-align: left;
}

ul#menu li a:hover {
    background-color: white;
    color : orange;
    text-decoration: underline;
}


</style>
</head>
<body>

<div id = header>
<ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="add.php">Add Info</a></li>
  <li><a href="search.php">Search</a></li>
</ul>  </div>

<p style= "color:orange;text-align:center;font-size:20px">-- Show Movie Info -- </p>

<?php    
    $db_connection = mysql_connect("localhost","cs143","");
    if(!$db_connection)
    {
        $errmsg = mysql_error($db_connection);
        print "Connection failed: $errmsg <br />";
        exit(1);
    }
    mysql_select_db("CS143", $db_connection);
    if($_GET["mid"])
    {
		$id=$_GET["mid"];
		$query = "select * from Movie where id=$id";
		$rs = mysql_query($query, $db_connection);
		$row = mysql_fetch_row($rs);
		echo "<div id =p2>";
		echo "Title: $row[1] ($row[2])<br>";
		echo "Producer: $row[4]<br>";
		echo "MPAA Rating: $row[3]<br>";
		echo "</div>";
		$query = "select * from Director where id in (select did from MovieDirector where mid=$id);";
		$rs = mysql_query($query, $db_connection);
		$row = mysql_fetch_row($rs);
		if ($row)
			echo "<div id=p2>Director: $row[2] $row[1]($row[3])</div>";
		else
			echo "<div id = p2>Director: N/A </div>";
		$query = "select * from MovieGenre where mid=$id";
		$rs = mysql_query($query, $db_connection);
		$row = mysql_fetch_row($rs);
		echo "<div id = p2>";
		echo "Genre: $row[1]";
		while ($row = mysql_fetch_row($rs)){
			echo ", ";
			echo "$row[1]";
		}
		echo "</div>";
		echo "<br>";
		echo "<div id = p1><p>-- Actor in this movie -- </p></div>";
		$query = "select concat(first,' ',last), role, A.id from Actor as A,MovieActor as M where mid=$id and A.id=M.aid";
		$rs = mysql_query($query, $db_connection);
		echo "<div id = p2>";
        while($row = mysql_fetch_row($rs)) {
			echo "<a href='./showActorInfo.php?aid=$row[2]'> $row[0] </a>";
			echo " act as $row[1]<br>";
        }
        echo "</div>";
		echo "<div id = p1><p>-- User Review -- </p></div>";
		echo "<div id = p2>";
		echo "Average Score: ";
		$query = "select avg(rating),count(rating) from Review where mid=$id";
		$rs = mysql_query($query, $db_connection);
		$row = mysql_fetch_row($rs);
		if ($row[1]>0){
			echo "$row[0]/5 (5.0 is best) by $row[1] review(s). ";
		}
		else{
			echo "(Sorry, none review this movie)";
		}
		echo "<a href='./addComment.php?mid=$id'>Add your review now!</div></a><br>";
		echo "<br>";
		
		if ($row[1]>0){
			echo "<div id = p1>All Comments in Details:</div><br><br>";
			$query = "select time,name,rating,comment from Review where mid=$id";
			$rs = mysql_query($query, $db_connection);
			while ($row = mysql_fetch_row($rs)){
				echo "<div id = p2>In $row[0], $row[1] said: I rate this move score $row[2] point(s), here is my comment:<br>";
				echo "$row[3]<br>";
			}
			echo $row[3];
			echo "</div>";
		}
	}
    mysql_close($db_connection);
?>
<br>
<br>
<div id = section>
<p>Search for other actors/movies</p>

<form method = "GET", action = "blank.php">
	<input type="text" name="search">
<input type = "submit" value = "search">
</form>
</div>

<div id = footer>
CS143 All Rights Reserved.
</div>


</body>
</head>
</html>