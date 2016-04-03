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


    padding:170px;    
    text-align: center;
    font-size: 30pt;
    padding: 50px,50px;
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


</style>
</head>
<body>

<div id = header>
<ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="add.php">Add Info</a></li>
  <li><a href="search.php">Search</a></li>
</ul>  </div>





<div id = "section">
<p> Search for Actors/Movies</p>
<form method = "GET", action = "blank.php",target="_blank">
    <input type="text" name="search">
<input type = "submit" value = "search">
</form>
</div>





<div id = footer>
CS143 All Rights Reserved.
</div>


</body>
</html>
