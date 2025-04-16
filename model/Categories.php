<?php
include_once ("globals.php");

  class Categories {
	  public $id;
      public $category_name;

	  function __construct()
	  {
        $this->id=0;
        $this->category_name="";
		;
		  
	  }
	  
	  function set($T)
	  {

		  $this->category_name=(@$T["category_name"]!="" ? $T["category_name"] : $this->category_name );
		  $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
		  
	  }
	  
	  function savedb()
	  {
		  $conn=connectdb();
		
		  if(
            mysqli_query($conn,"insert into categories 
          set id='".$this->id."',
          category_name='".$this->category_name."'")
          
          )
		  {
		  
			$this->id=mysqli_insert_id($conn);
		  }
		  else
		  {
            mysqli_query($conn,"update categories 
            set category_name='".$this->category_name."' where id='".$this->id);
		  }
		  
	  }
	  
	  

	  function deletedb()
	  {
		  $conn=connectdb();
		  
		  mysqli_query($conn,"delete from categories where id=".$this->id);
		  mysqli_query($conn,"delete from items where category=".$this->id);
		  
		 
		  
	  }
	  
	  static function getAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from categories");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Categories();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }
	
	  static function delAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"delete from categories");
		  
		  return 0;
	  }

	  function getJSON()
	  {
		  return json_encode($this);
		  
	  }


	  static function findCategory($id)
	  {
		$tmp=new Categories();

		$conn=connectdb();
		$q=mysqli_query($conn,"select * from categories where id=$id");
		if(mysqli_num_rows($q))
		{
			$r=mysqli_fetch_assoc($q);
			$tmp->set($r);

		}
		
		
		return $tmp;
		  
	  }


      
	  
	



  }








