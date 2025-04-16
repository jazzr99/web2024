<?php
include_once ("globals.php");

  class Request {
	  public $id;
      public $item;
      public $qty;
	  public $qty_sup;
      public $type;
      public $id_anak;
      public $id_user;
      public $id_support;
      public $status;
      public $date_create; 
      public $date_anathesi;
      public $date_complete;
	  public $item_detail;
	  public $user_detail;
	  public $support_detail;



	  function __construct()
	  {
        $this->id=0;
        $this->item=0;
        $this->qty=0;
		$this->qty_sup=0;
        $this->type="";
        $this->id_anak=0;
        $this->id_user=0;
        $this->id_support=0;
        $this->status="";
        $this->date_create="";
        $this->date_anathesi="";
        $this->date_complete="";
        		  
	  }


      function set($T)
	  {
        $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
        $this->item=(@$T["item"]!="" ? $T["item"] : $this->item );
        $this->qty=(@$T["qty"]!="" ? $T["qty"] : $this->qty );
		$this->qty_sup=(@$T["qty_sup"]!="" ? $T["qty_sup"] : $this->qty_sup );
        $this->type=(@$T["type"]!="" ? $T["type"] : $this->type );
        $this->id_anak=(@$T["id_anak"]!="" ? $T["id_anak"] : $this->id_anak );
        $this->id_user=(@$T["id_user"]!="" ? $T["id_user"] : $this->id_user );
        $this->id_support=(@$T["id_support"]!="" ? $T["id_support"] : $this->id_support );
        $this->status=(@$T["status"]!="" ? $T["status"] : $this->status );
        $this->date_create=(@$T["date_create"]!="" ? $T["date_create"] : $this->date_create );
        $this->date_anathesi=(@$T["date_anathesi"]!="" ? $T["date_anathesi"] : $this->date_anathesi );
        $this->date_complete=(@$T["date_complete"]!="" ? $T["date_complete"] : $this->date_complete );
        		  
	  }
	  
	  function setProsf($T)
	  {
          $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
		  $this->item=(@$T["item"]!="" ? $T["item"] : $this->item );
          $this->qty=(@$T["qty"]!="" ? $T["qty"] : $this->title );
		  $this->qty_sup=(@$T["qty_sup"]!="" ? $T["qty_sup"] : $this->qty_sup );
		  $this->id_user=(@$T["id_user"]!="" ? $T["id_user"] : $this->id_user );
		  $this->id_anak=(@$T["id_anak"]!="" ? $T["id_anak"] : $this->id_anak );
          $this->type="Προσφορά";
          $this->status="Αναμονή";
          $this->date_create=date("Y-m-d H:i:s");
		  
	  }

	  
	  function setaitima($T)
	  {
          $this->id=(@$T["id"]!="" ? $T["id"] : $this->id );
		  $this->item=(@$T["item"]!="" ? $T["item"] : $this->item );
          $this->qty=(@$T["qty"]!="" ? $T["qty"] : $this->title );
		  $this->qty_sup=(@$T["qty_sup"]!="" ? $T["qty_sup"] : $this->qty_sup );
		  $this->id_user=(@$T["id_user"]!="" ? $T["id_user"] : $this->id_user );
		 
          $this->type="Αίτημα";
          $this->status="Αναμονή";
          $this->date_create=date("Y-m-d H:i:s");
		  
	  }
	  
	  function savedb()
	  {
		  $conn=connectdb();
		
          $q=mysqli_query($conn,"select * from requests where id=".$this->id);
		  if(mysqli_num_rows($q)==0)
		  {
		
            mysqli_query($conn,"insert into  requests
                        set 
                        item='".$this->item."',
						id_anak='".$this->id_anak."',
                        id_user='".$this->id_user."',
                        id_support='".$this->id_support."',
                        qty='".$this->qty."', 
						qty_sup='".$this->qty_sup."', 
                        type='".$this->type."', 
                        status='".$this->status."', 
                        date_create='".$this->date_create."',
                        date_anathesi='".$this->date_anathesi."',
                        date_complete='".$this->date_complete."'");
          
            
			$this->id=mysqli_insert_id($conn);
		  }
		  else
		  {
            mysqli_query($conn,"update  requests
                        set 
                        item='".$this->item."',
						id_anak='".$this->id_anak."',
                        id_user='".$this->id_user."',
                        id_support='".$this->id_support."',
                        qty='".$this->qty."', 
						qty_sup='".$this->qty_sup."', 
                        type='".$this->type."', 
                        status='".$this->status."', 
                        date_create='".$this->date_create."',
                        date_anathesi='".$this->date_anathesi."',
                        date_complete='".$this->date_complete."'
                        
                        where id=".$this->id);
           
		  }
		  
	  }

     
	  function deletedb()
	  {
		  $conn=connectdb();
		  
		  mysqli_query($conn,"delete from requests where id=".$this->id);
		
		  
	  }

	  static function getProsforesUser($idu)
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where id_user=$idu and type='Προσφορά'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $u->item_detail=Item::findItem($u->item);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }
	  

	  static function getRequestsUser($idu)
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where id_user=$idu and type='Αίτημα'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $u->item_detail=Item::findItem($u->item);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }


	  static function getAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Anakoinosi();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }
	

	  static function getAllAitimata()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Αίτημα'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			$u=new Request();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }

	  static function getAllProsfores()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Προσφορά'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }


      static function getmyAll()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where id_user=$_SESSION[idu]");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }


	  static function getAllProsforesWait()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Προσφορά' and status='Αναμονή'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			$u=new Request();
			$u->set($row);
			$u->item_detail=Item::findItem($u->item);
			$u->user_detail=User::findUser($u->id_user);
			
			$A[]=$u;
		  }
		  
		  return $A;
	  }


	  static function getAllAitimatasWait()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Αίτημα' and status='Αναμονή'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $u->item_detail=Item::findItem($u->item);
			 $u->user_detail=User::findUser($u->id_user);
			
			 $A[]=$u;
		  }
		  
		  return $A;
	  }


	  
	  static function getMyProsforesAnath()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Προσφορά' and status<>'Αναμονή' 
		  						and status<>'Ολοκλήρωση' and id_support=$_SESSION[idu]");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			$u=new Request();
			$u->set($row);
			$u->item_detail=Item::findItem($u->item);
			$u->user_detail=User::findUser($u->id_user);
			$A[]=$u;
		  }
		  
		  return $A;
	  }


	  static function getMyAitimataAnath()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Αίτημα' and status<>'Αναμονή' 
		  and status<>'Ολοκλήρωση' and id_support=$_SESSION[idu]");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $u->item_detail=Item::findItem($u->item);
			 $u->user_detail=User::findUser($u->id_user);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }

	  	  
	  static function getAllProsforesAnath()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Προσφορά' and status<>'Αναμονή' 
		  						and status<>'Ολοκλήρωση' ");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			$u=new Request();
			$u->set($row);
			$u->item_detail=Item::findItem($u->item);
			$u->user_detail=User::findUser($u->id_user);
			$u->support_detail=User::findUser($u->id_support);
			$A[]=$u;
		  }
		  
		  return $A;
	  }


	  static function getAllAitimataAnath()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select * from requests where type='Αίτημα' and status<>'Αναμονή' 
		  and status<>'Ολοκλήρωση'");
		  
		  $A=[];
		  while($row=mysqli_fetch_assoc($q))
		  {
			 $u=new Request();
			 $u->set($row);
			 $u->item_detail=Item::findItem($u->item);
			 $u->user_detail=User::findUser($u->id_user);
			 $u->support_detail=User::findUser($u->id_support);
			 $A[]=$u;
		  }
		  
		  return $A;
	  }


	  
	  static function Akyrosi($id)
	  {
		  $conn=connectdb();

		 
				$req=Request::findRequest($id);
				
				
				$q=mysqli_query($conn,"update requests set status='Αναμονή', qty_sup=0, id_support=0 where id=$id");
				if($req->type=="Αίτημα"){
					$item=Item::findItem($req->item);
					$item->qty=$item->qty + $req->qty_sup;

				}
				if($req->type=="Προσφορά"){
					$item=Item::findItem($req->item);
					$item->qty=$item->qty - $req->qty_sup;
					
				}
				$item->savedb();

				
		
		 
	  }

	  
	  static function Oloklirosi($id)
	  {
		  $conn=connectdb();
		  $req=Request::findRequest($id);

		
		  
		  if($req->type=="Αίτημα"){
			$req->status="Ολοκλήρωση";
			$req->qty_sup=0;
			$req->savedb();
			

		  }
		  if($req->type=="Προσφορά"){

			$req->status="Μεταφορά";
			$req->qty_sup=$req->qty;
			$req->savedb();
			
			  
		  }
		 
		  
		  
		
	  }


	  static function Fortosi()
	  {
		  $conn=connectdb();

		 
		  		$A=Request::getMyAitimataAnath();
				
				foreach ($A as $a){
					$itm=Item::findItem($a->item);
					$a->qty_sup=$a->qty;
					$itm->qty=$itm->qty - $a->qty;

					$a->status="Μεταφορά";
					
					$itm->savedb();
					$a->savedb();


				}
		
		 
	  }

	  static function Ekfortosi()
	  {
		  $conn=connectdb();

		 
		  $A= Request::getMyProsforesAnath();				
		  foreach ($A as $a){

			$itm=Item::findItem($a->item);
			  $a->qty_sup=0;
			  $itm->qty=$itm->qty + $a->qty;
			  $a->status="Ολοκλήρωση";
			  $itm->savedb();
			  $a->savedb();
			

		  }
		 
	  }

	  

	  static function countMyReq()
	  {
		  $conn=connectdb();
		  
		  $q=mysqli_query($conn,"select count(*) as cn from requests where status<>'Ολοκλήρωση' 
		  								and status<>'Αναμονή' and id_support=$_SESSION[idu]");
		$row=mysqli_fetch_assoc($q);
		  
		  return $row['cn'];
	  }


	  
	  function getJSON()
	  {
		  return json_encode($this);
		  
	  }


	  static function findRequest($id)
	  {
		$tmp=new Request();

		$conn=connectdb();
		$q=mysqli_query($conn,"select * from requests where id=$id");
		if(mysqli_num_rows($q))
		{
			$r=mysqli_fetch_assoc($q);
			$tmp->set($r);

		}
		
		
		return $tmp;
		  
	  }


      
	  
	



  }








