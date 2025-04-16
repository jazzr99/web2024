

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">System-Support</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

<?php

if($menu==""){
?>
<li ><a href="index.php">Αρχική</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?page=eggrafi"><span class="glyphicon glyphicon-user"></span> Εγγραφή</a></li>
        <li><a href="index.php?page=syndesi"><span class="glyphicon glyphicon-log-in"></span> Σύνδεση</a></li>
      </ul>
   

<?php
}

?>


<?php
if($menu=="user"){
?>
        <li><a href="index.php?page=useraitimata">Αιτήματα</a></li>
        <li><a href="index.php?page=userprosfores">Προσφορές</a></li>
        <li><a href="index.php?page=useranakoinoseis">Ανακοινώσεις</a></li>
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
        <li><a href="index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση</a></li>
      </ul>
   

<?php
}

?>
        
   

        <?php
if($menu=="admin"){

?>
<li><a href="index.php?page=arxikimap">Χάρτης</a></li>
<li><a href="index.php?page=store">Αποθήκη</a></li>

        <li><a href="index.php?page=adminanak">Ανακοινώσεις</a></li>
        <li><a href="index.php?page=adminsupports">Διασώστες</a></li>
        <li><a href="index.php?page=adminstats">Στατιστικά</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
      <li><a href="index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
   
   

<?php
}

?>



<?php
if($menu=="support"){
?>
<li><a href="index.php?page=supportmap">Χάρτης</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
       
      <li><a href="index.php?page=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
   
   

<?php
}

?>
   
   
   
    </div>
  </div>
</nav>