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

    
    padding:120px;    
    text-align: center;
    font-size: 15pt;
    padding: 100px,100px;
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
<h1>Make your own records now!</h1>

</div>

<div id = footer>
CS143 All Rights Reserved.
<div>


</body>
</html>
