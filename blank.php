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
#section:
{
    padding-top: 100px;

}
#p1
{
    text-align: center;
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
ul#side {
    padding: 0px;
    text-align: center;
}


ul#side li a {
    
    font-size: 12pt;
    color: coral;
    padding: 0px 0px;
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

<?php
    $db_connection = mysql_connect("localhost","cs143","");
    if(!$db_connection)
    {
        $errmsg = mysql_error($db_connection);
        print "Connection failed: $errmsg <br />";
        exit(1);
    }
    mysql_select_db("CS143", $db_connection);
    if($_GET["search"])
    {
        $keyword = $_GET["search"];
        $keyword = explode(" ", $keyword);
        $i=0;
        mysql_query("drop view if exists av", $db_connection);
        mysql_query("create view av as select concat(first,' ',last,'(',dob,')') as title,id from Actor", $db_connection);
        $query = "select title,id from av where";
        while ($keyword[$i]){
            if ($i>0)
                $query = $query . " and";
            $query = $query . " title like " . "'%".$keyword[$i]."%'";
            $i++;
        }
        $rs = mysql_query($query, $db_connection);
        echo "<br>";
        echo "<div id =p1><p>Searching match records in Actor database ...</p></div>";
        echo "<ul id = side>";
        while($row = mysql_fetch_row($rs)) {
            echo "<li><a href='./showActorInfo.php?aid=$row[1]'> $row[0] </a></li>";
            echo "<br>";
        }
        echo "</ul>";
        $query = "select concat(title,'(',year,')'),id from Movie where";
        $i=0;
        while ($keyword[$i]){
            if ($i>0)
                $query = $query . " and";
            $query = $query . " title like " . "'%".$keyword[$i]."%'";
            $i++;
        }
        echo "<div id =p1><p>Searching match records in Movie database ...</p></div>";
        $rs = mysql_query($query, $db_connection);
        echo "<ul id = side>";
        while($row = mysql_fetch_row($rs)) {
            echo "<li><a href='./showMovieInfo.php?mid=$row[1]'> $row[0]</a></li>";
            echo "<br>";
        }
        echo "</ul>";
        mysql_query("drop view if exists av", $db_connection);
    }
    mysql_close($db_connection);
?>
<div id = section>
<br>
<br>
</div>

