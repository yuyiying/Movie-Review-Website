<!DOCTYPE html>
<html>
<head>
<style>
body
{
    background-color: linen;


}
#footer {
    background-color:orange;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;      
}

#section {

    float: left;
    padding:10px;    
    text-align: left;
    font-size: 12pt;
    padding: 10px,10px;
    color: orange;      
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

#nav {
    line-height:20px;
    width:200px;
    height: 500px;
    float:left;
    padding:5px;    
    background-color: moccasin;  
    color:white;    
}

ul#side {
    padding: 0px;
    text-align: left;
}


ul#side li a {
    
    font-size: 13pt;
    color: coral;
    padding: 5px 5px;
    text-decoration: none;
    text-align: left;
}

ul#side li a:hover {
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


<div id="nav">
<ul id="side">
  <li><a href="addActorDirector.php">Add Actor/Director</a></li>
  <br>
  <li><a href="addMovieInfo.php">Add Movie</a></li>
  <br>
  <li><a href="addMovieActor.php">Add Actor To Movie</a></li>
  <br>
  <li><a href="addMovieDirector.php"> Add Director to Movie</a></li>
  <br>
  <li><a href="addComment.php"> Add Review to Movie</a></li>
  <br>
</ul>
</div>

<div id = section>

<form method = "GET", action = "addMovieActor.php">
  Movie:
  <select name="movie">
    <?php
        $db_connection = mysql_connect("localhost","cs143","");
        if(!$db_connection)
        {
            $errmsg = mysql_error($db_connection);
            print "Connection failed: $errmsg <br />";
            exit(1);
        }
      mysql_select_db("CS143", $db_connection);
      $query = "select title from Movie order by title";
      $rs = mysql_query($query, $db_connection);
      while ($row = mysql_fetch_row($rs)){
        echo "<option value=\"$row[0]\"> $row[0] </option>";
      }
    ?>
  </select><br>
  <br>
  Actor:
  <select name="actor">
    <?php
        $db_connection = mysql_connect("localhost","cs143","");
        if(!$db_connection)
        {
            $errmsg = mysql_error($db_connection);
            print "Connection failed: $errmsg <br />";
            exit(1);
        }
      mysql_select_db("CS143", $db_connection);
      $query = "select concat(first,' ',last,'(',dob,')') from Actor order by first";
      $rs = mysql_query($query, $db_connection);
      while ($row = mysql_fetch_row($rs)){
        echo "<option value=\"$row[0]\"> $row[0] </option>";
      }
    ?>
  </select><br>
  <br>
  Role:
  <input type="text" name="role">
  <br>
  <br>
<input type = "submit" value = "add it!!">
</form>
</div>

<?php
	$db_connection = mysql_connect("localhost","cs143","");
	if(!$db_connection)
	{
	    $errmsg = mysql_error($db_connection);
	    print "Connection failed: $errmsg <br />";
	    exit(1);
	}
	mysql_select_db("CS143", $db_connection);
	if ($_GET["movie"]){
		$movie = $_GET["movie"];
		$actor = $_GET["actor"];
		$role = $_GET["role"];
		$query = "select id from Actor where concat(first,' ',last,'(',dob,')')=\"$actor\"";
		$rs = mysql_query($query, $db_connection);
		$row = mysql_fetch_row($rs);
		$aid = $row[0];
		$query = "select id from Movie where title=\"$movie\"";
		$rs = mysql_query($query, $db_connection);
		$row = mysql_fetch_row($rs);
		$mid = $row[0];
		$query = "insert into MovieActor values($mid,$aid,\"$role\")";
		if(mysql_query($query, $db_connection)){
		  echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		  echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
		  echo "<p>Add Successfully!</p>";
    }
    else{
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
      echo "<p>ERROR!</p>";  
    }
	}
?>

<div id = footer>
CS143 All Rights Reserved.
</div>


</body>
</head>
</html>