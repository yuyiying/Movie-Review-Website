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

<div id = "section">
<form method = "get", action = "addMovieInfo.php">
Title: <br><input type = "text" name = "title">
<br><br>
Year: <br><input type = "text" name = "year">
<br><br>
MPPA Rating:<br><select name = "rating">
<option value = "G"> G </option>
<option value = "NC17" > NC17 </option>
<option value = "PG" > PG </option>
<option value = "PG13" > PG13 </option>
<option value = "R" > R </option>
<option value = "Surrendere"> Surrendere </option>
</select>
<br><br>
Company:<br><input type = "text" name = "company">
<br><br>
Genre: <br>
<input type= "checkbox" name= "checkbox[]" value= "Drama"> Drama
<input type= "checkbox" name= "checkbox[]" value= "Comedy"> Comedy
<input type= "checkbox" name= "checkbox[]" value= "Romance"> Romance
<input type= "checkbox" name= "checkbox[]" value= "Crime"> Crime
<input type= "checkbox" name= "checkbox[]" value= "Horror"> Horror
<input type= "checkbox" name= "checkbox[]" value= "Mystery"> Mystery
<input type= "checkbox" name= "checkbox[]" value= "Thriller"> Thriller
<input type= "checkbox" name= "checkbox[]" value= "Action"> Action
<input type= "checkbox" name= "checkbox[]" value= "Adventure"> Adventure
<input type= "checkbox" name= "checkbox[]" value= "Fantasy"> Fantasy
<br>
<input type= "checkbox" name= "checkbox[]" value= "Documentary"> Documentary
<input type= "checkbox" name= "checkbox[]" value= "Family"> Family
<input type= "checkbox" name= "checkbox[]" value= "Sci-Fi"> Sci-Fi
<input type= "checkbox" name= "checkbox[]" value= "Animation"> Animation
<input type= "checkbox" name= "checkbox[]" value= "Musical"> Musical
<input type= "checkbox" name= "checkbox[]" value= "War"> War
<input type= "checkbox" name= "checkbox[]" value= "Western"> Western
<input type= "checkbox" name= "checkbox[]" value= "Adult"> Adult
<input type= "checkbox" name= "checkbox[]" value= "Short"> Short


<br>
<br>

<input type = "submit" name = "submit" value = "Add!!">
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

$title = $company="";
if($_GET["title"])
{
    $title = $_GET["title"];
    $year = $_GET["year"];
    $company = $_GET["company"];
    $rating = $_GET["rating"];
    $checkbox = $_GET["checkbox"];
    $i = 0;
    foreach($_REQUEST["checkbox"] as $checkbox1)
    {
        $checkbox[$i]= $checkbox1;
        $i ++;
    }
    $len = count($checkbox);

    $sql = "SELECT id FROM MaxMovieID";
    $rs = mysql_query($sql, $db_connection);
    $list = mysql_fetch_row($rs);
    $id = $list[0];
    $upd= "Update MaxMovieID SET id = id+1";
    mysql_query($upd,$db_connection);
    $que = "INSERT INTO Movie VALUES ($id,\"$title\",\"$year\",\"$rating\",\"$company\")";
    mysql_query($que,$db_connection);
    for ($a = 0; $a < $len; $a++)
    {
        $value = $checkbox[$a];
        $query = "INSERT INTO MovieGenre VALUES ($id,\"$value\")";
        if(!mysql_query($query,$db_connection))
        {
           echo"<br>";
           echo "<br>";
           echo"<br>";
           echo"<br>";
           echo"<br>";echo"<br>";
           echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";
           echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";
          echo "ERROR";
        }
    }
          echo"<br>";
             echo "<br>";
             echo"<br>";
             echo"<br>";
             echo"<br>";echo"<br>";
             echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";
             echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";echo"<br>";
             echo "New Movie added successfully!";
}
mysql_close($db_connection);
?>




<div id = footer>
CS143 All Rights Reserved.
</div>


</body>
</html>
