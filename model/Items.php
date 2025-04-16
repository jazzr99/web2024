<?php
include_once ("globals.php");

  class Item {
	  public $id;
      public $name;
      public $category;
      public $details;
      public $qty;
	  public $category_name;

	  function __construct()
	  {
        $this->id=0;
        $this->category=0;
        $this->name="";
        $this->details="";
        $this->qty=0;
		$this->category_name="";
		  
	  }
	  
	  function set($T)
	  {

		 
		  $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
          $this->name=(@$T["name"]!="" ? $T["name"] : $this->name );
		  $this->category=(@$T["category"]!="" ? $T["category"] : $this->category );
		  $this->details=(@$T["details"]!="" ? $T["details"] : $this->details );
		  $this->qty=(@$T["qty"]!=0 ? $T["qty"] : $this->qty );
		  $this->category_name=(@$T["category_name"]!="" ? $T["category_name"] : $this->category_name );
	  }

	  function set_category()
	  {
		$cat=Categories::findcategory($this->category);
		$this->category_name=$cat->category_name;
	  }
	  
	  function savedb()
	  {
		  $conn=connectdb();
		  $q=mysqli_query($conn,"select * from items where id=".$this->id);
		  if(mysqli_num_rows($q)==0)
		  {
			mysqli_query($conn,"insert into items 
			set id='".$this->id."',
			name='".$this->name."',
			category='".$this->category."',
			details='".$this->details."',
			qty='".$this->qty."'
			");
			$this->id=mysqli_insert_id($conn);
		  }
		  else
		  {
			

            mysqli_query($conn,"update items 
            set name='".$this->name."', 
            category='".$this->category."',
            details='".$this->details."',
            qty='".$this->qty."' 
            where id=".$this->id);

			
		  }
		  
	  }
	  
	  

	  function deletedb()
	  {
		  $conn=connectdb();
		  
		  mysqli_query($conn,"delete from items where id=".$this->id);
		  
		
		  
	  }
	  
	  static function getAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from items");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Item();
			 $u->set($row);
			 $u->set_category();
			 $A[]=$u;
		  }
		  
		  return $A;
	  }

	  static function getAll2()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from items");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Item();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }
	
	  static function delAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"delete from items");
		  
		 
		  
		  return 0;
	  }
	


	  function getJSON()
	  {
		  return json_encode($this);
		  
	  }


      		

		static function uploadData($url)
		{
	
			$conn=connectdb();
	
			try{
				$itemsData=file_get_contents($url);
				$C=json_decode($itemsData);
			 
				foreach($C->categories as $c)
				{
					$id=$c->id;
					$name=htmlspecialchars($c->category_name,ENT_QUOTES);
	
					try{
					mysqli_query($conn,"insert into categories(id,category_name) 
									value('$id','$name')");

									}
					catch(Exception $ee){
										mysqli_query($conn,"update categories set category_name='$name'
										where id=$id;");
									}
					
				}
		
				foreach($C->items as $itm)
				{
					$id=$itm->id;
					$name=htmlspecialchars($itm->name, ENT_QUOTES);
					$cat=$itm->category;
					
					$dt="";
					foreach($itm->details as $d)
					{
						$dt.=$d->detail_name.":".$d->detail_value.",";
						
					}
					$dt=htmlspecialchars($dt, ENT_QUOTES);
				
					
				

					
					try 
					{mysqli_query($conn,"insert into items(id,name,category,details,qty) 
					value('$id','$name','$cat','$dt',0)");
					}
					catch(Exception $ee){

						mysqli_query($conn,"update items set name='$name',category='$cat',details='$dt',qty=0
						where id=$id");
					};

					
				   
				}
		
				echo "true";
			}
			catch(Exception $ee)
			{
				echo "false";
			}
	
		}
	

		static function findItem($id)
		{
		  $tmp=new Item();
  
		  $conn=connectdb();
		  $q=mysqli_query($conn,"select * from items where id=$id");
		  if(mysqli_num_rows($q))
		  {
			  $r=mysqli_fetch_assoc($q);
			  $tmp->set($r);
  
		  }
		  
		  
		  return $tmp;
			
		}
	  
	



  }








