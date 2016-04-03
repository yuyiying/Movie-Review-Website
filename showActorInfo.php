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
	font-size: 20px;
    color: orange;
    text-align: center;
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

<p style= "color:orange;text-align:center;font-size:20px">-- Show Actor Info -- </p>


<?php    
    $db_connection = mysql_connect("localhost","cs143","");
    if(!$db_connection)
    {
        $errmsg = mysql_error($db_connection);
        print "Connection failed: $errmsg <br />";
        exit(1);
    }
    mysql_select_db("CS143", $db_connection);
    if($_GET["aid"])
    {
        $id=$_GET["aid"];
        $query = "select * from Actor where id=$id";
        $rs = mysql_query($query, $db_connection);
        $row = mysql_fetch_row($rs);
        echo "<div id = p2>";
        echo "Name: $row[2] $row[1]<br>";
        echo "Sex: $row[3]<br>";
        echo "Date Of Birth: $row[4]<br>";
        if ($row[5])
            echo "Date of Death: $row[5]<br>";
        else
            echo "Date Of Death: --Still Alive--<br>";
        echo "</div>";
        echo "<div id = p1><p>-- Act in -- </p></div>";
        $query = "select role,M.title,M.id from Movie as M,MovieActor as MA where aid=$id and M.id=MA.mid";
        $rs = mysql_query($query, $db_connection);
        echo "<div id = p2>";
        while($row = mysql_fetch_row($rs)) {
            echo "Act \"$row[0]\" in ";
            echo "<a href='./showMovieInfo.php?mid=$row[2]'>$row[1]</a><br>";
        }
        echo "</div>";
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