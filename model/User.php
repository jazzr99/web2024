<?php
include_once ("globals.php");

  class User {
	  public $email;
      public $username;
	  public $password;
	  public $phone;
	  public $id;
	  public $fullname;
      public $lat;
      public $lot;
	  public $type;
      
	  function __construct()
	  {
        $this->username="";
        $this->fullname="";
		  $this->email="";
		  $this->password="";
		  $this->phone="";
		  $this->id=0;
		  $this->lat=0;
          $this->lot=0;
          $this->type="";
		  
	  }
	  
	  function set($T)
	  {
        $this->type=(@$T["type"]!="" ? $T["type"] : $this->type );
        $this->lat=(@$T["lat"]!=0 ? $T["lat"] : $this->lat );
        $this->lot=(@$T["lot"]!=0 ? $T["lot"] : $this->lot );
        $this->fullname=(@$T["fullname"]!="" ? $T["fullname"] : $this->fullname );
        $this->username=(@$T["username"]!="" ? $T["username"] : $this->username );
		  $this->email=(@$T["email"]!="" ? $T["email"] : $this->email );
		  $this->password=(@$T["password"]!="" ? $T["password"] : $this->password );
		  $this->phone=(@$T["phone"]!="" ? $T["phone"] : $this->phone );
		  $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
		  
	  }
	  
	  function insertdb()
	  {
		  $conn=connectdb();
		
		  if(
            mysqli_query($conn,"insert into user 
          set email='".$this->email."',
          username='".$this->username."',
          fullname='".$this->fullname."',
          lat='".$this->lat."',
          lot='".$this->lot."',
          type='".$this->type."',
		  password='".$this->password."',
		  phone='".$this->phone."'")
          
          )
		  {
		  
			$this->id=mysqli_insert_id($conn);
		  }
		  else
		  {
			  throw new Exception("Insert User error");
		  }
		  
	  }
	  
	  
	  function updatedb()
	  {
		  $conn=connectdb();
		  
		  
		  if( mysqli_query($conn,"update user set email='".$this->email."',
		  phone='".$this->phone."',
		  lat='".$this->lat."',
		  lot='".$this->lot."'
		  where id=".$this->id))
		  {
		  
			echo "1";
		  }
		  else
		  {
			  throw new Exception("Update User error");
		  }
	  }
	  
	  function deletedb()
	  {
		  $conn=connectdb();
		  
		  mysqli_query($conn,"delete from user where id=".$this->id);
		  
		 
		  
	  }
	  
	  static function getAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from user");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new User();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }


	  
	  static function getAllSupports()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from user where type='support'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new User();
			 $u->set($row);
			 $u->password="";
			 $A[]=$u;
		  }
		  
		  return $A;
	  }
	  
	  function setUserById($id)
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from user where id=$id");
		  if(mysqli_num_rows($q)>0)
		  {
			  $row=mysqli_fetch_assoc($q);
			  $row["password"]="";
			
			  $this->set($row);
		  }
		  else
		  {
			throw new Exception("User not found");  
		  }
	  }

	  static function findUser($id)
	  {
		  $conn=connectdb();
		  $u=new User();
		  $q=mysqli_query($conn,"select * from user where id=$id");
		  if(mysqli_num_rows($q)>0)
		  {
			  $row=mysqli_fetch_assoc($q);
			  $row["password"]="";
			
			  $u->set($row);
			  return $u;
		  }
		  else
		  {
			throw new Exception("User not found");  
		  }
	  }


	  function getAdmin()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from user where type='admin'");
		  if(mysqli_num_rows($q)>0)
		  {
			  $row=mysqli_fetch_assoc($q);
			  $row["password"]="";
			
			  $this->set($row);
		  }
		  else
		  {
			throw new Exception("User not found");  
		  }
	  }
	  
	  function setUserByUsernamePss($u,$p, $t)
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from user where username='$u' and password='$p' and type='$t'");
		  
		  if(mysqli_num_rows($q)>0)
		  {
			  $row=mysqli_fetch_assoc($q);
			  
			
			  $this->set($row);
		  }
		  else
		  {
			throw new Exception("User not found");  
		  }
			
	  }

      function isUser()
      {
        if(this->type=="user") return true;
        else return false;
      }
	
      function isAdmin()
      {
        if(this->type=="admin") return true;
        else return false;
      }
	
      function isSupport()
      {
        if(this->type=="support") return true;
        else return false;
      }


	  function getJSON()
	  {
		  return json_encode($this);
		  
	  }


      
	  
	



  }








