<?php
include_once ("globals.php");

  class Anakoinosi {
	  public $id;
      public $title;
      public $description;

      public $items;
      

	  function __construct()
	  {
        $this->id=0;
        $this->title="";
        $this->description="";
        $this->items=[];
		;
		  
	  }
	  
	  function set($T)
	  {

		  $this->title=(@$T["title"]!="" ? $T["title"] : $this->title );
          $this->description=(@$T["description"]!="" ? $T["description"] : $this->description );
		  $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
		  
	  }
	  
	  function savedb()
	  {
		  $conn=connectdb();
		
          $q=mysqli_query($conn,"select * from anakoinoseis where id=".$this->id);
		  if(mysqli_num_rows($q)==0)
		  {
		
            mysqli_query($conn,"insert into  anakoinoseis
                        set 
                        title='".$this->title."',
                        description='".$this->description."'");
          
            
			$this->id=mysqli_insert_id($conn);
		  }
		  else
		  {
            mysqli_query($conn,"update  anakoinoseis
                        set 
                        title='".$this->title."',
                        description='".$this->description."',' 
                        where id=".$this->id);
           
		  }
		  
	  }

      function setItems()
      {
		$conn=connectdb();
		$q3=mysqli_query ($conn,"select * from anakoinosi_items where id_ananakoinosi=".$this->id);
		$this->items=[];
		while($r=mysqli_fetch_assoc($q3))
		{
			$itm=Item::findItem($r["id_item"]);
			$this->items[]=$itm;
		}

			
      }
	  
	  function addItems($items)
      {
        $conn=connectdb();
        $R=explode( "," , $items );
		$this->items=[];
        foreach($R as $x)
        {
                if($x!=""){
                    $q3=mysqli_query ($conn,"insert into anakoinosi_items 
					set id_item='$x' , id_ananakoinosi=".$this->id);
					$this->items[]=$x;
				}
          
        }

      }

	  function deletedb()
	  {
		  $conn=connectdb();
		  
		  mysqli_query($conn,"delete from anakoinoseis where id=".$this->id);
		
		  
	  }
	  
	  static function getAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from anakoinoseis");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Anakoinosi();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }
	
	  
	  function getJSON()
	  {
		  return json_encode($this);
		  
	  }


	  static function findAnakoinosi($id)
	  {
		$tmp=new Anakoinosi();

		$conn=connectdb();
		$q=mysqli_query($conn,"select * from anakoinoseis where id=$id");
		if(mysqli_num_rows($q)>0)
		{
			$r=mysqli_fetch_assoc($q);
			$tmp->set($r);
			$tmp->setItems();

		}
		
		
		return $tmp;
		  
	  }


      
	  
	



  }








