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

<form method = "get", action = "addActorDirector.php">
Add new actor/director:<br><br>
Identity: 
<input type= "radio" name= "identity" value= "actor">Actor
<input type= "radio" name= "identity" value= "director"> Director
<br><br>
Last: <br><input type = "text" name = "last">
<br><br>
First: <br><input type = "text" name = "first">
<br><br>
Gender: 
<input type= "radio" name= "gender" value= "female">Female
<input type= "radio" name= "gender" value= "male"> Male
<br><br>
DOB:<br><input type = "date" name = "dob">
<br><br>
DOD:<br><input type = "date" name = "dod">(Leave blank if alive)
<br><br>
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

$last = $first = $gender = "";
$id = 0;

if($_GET["last"])
{
    $identity = $_GET["identity"];
    if($identity == "actor"){
    $last = $_GET["last"];
    $first = $_GET["first"];
    $gender = $_GET["gender"];
    $dob = $_GET["dob"];
    $dod = $_GET["dod"];
    $sql = "SELECT id FROM MaxPersonID";
    $rs = mysql_query($sql, $db_connection);
    $list = mysql_fetch_row($rs);
    $id = $list[0];
    $upd= "Update MaxPersonID SET id = id+1";
    mysql_query($upd,$db_connection);
    if($dod=="")
    {
        $query = "INSERT INTO Actor VALUES ($id,\"$last\",\"$first\",\"$gender\",\"$dob\",NULL)";
    }
    else{
       $query = "INSERT INTO Actor VALUES ($id,\"$last\",\"$first\",\"$gender\",\"$dob\",\"$dod\")";
    }
    if(mysql_query($query,$db_connection))
    {
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<p>New Actor added successfully</p>";
    }
    else
    {
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<p>ERROR</p>";

    }
    }
    if($identity == "director")
    {
        $last = $_GET["last"];
    $first = $_GET["first"];
    $dob = $_GET["dob"];
    $dod = $_GET["dod"];
    $sql = "SELECT id FROM MaxPersonID";
    $rs = mysql_query($sql, $db_connection);
    $list = mysql_fetch_row($rs);
    $id = $list[0];
    $upd= "Update MaxPersonID SET id = id+1";
    mysql_query($upd,$db_connection);
    if($dod=="")
    {
        $query = "INSERT INTO Director VALUES ($id,\"$last\",\"$first\",\"$dob\",NULL)";
    }
    else{
       $query = "INSERT INTO Director VALUES ($id,\"$last\",\"$first\",\"$dob\",\"$dod\")";
    }
    if(mysql_query($query,$db_connection))
    {
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<p>New Director added successfully</p>";
    }
    else
    {
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";
        echo "ERROR";

    }
    }
}





mysql_close($db_connection);
?>





<div id = footer>
CS143 All Rights Reserved.
</div>


</body>
</html>
