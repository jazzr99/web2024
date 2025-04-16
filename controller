<?php
session_start();
	include "./model/User.php";
	include "./model/Items.php";
	include "./model/Categories.php";
	include "./model/Requests.php";
	include "./model/Anakoinoseis.php";


	class Controller
	{
		public $page; 
		function __construct()
		{
			$this->page=@$_GET['page'];
			
		}
		
		function route()
		{
			if($this->page=="")
			{
				
					$menu="";
					$page="arxiki";
				
				
				
			}
			
			if($this->page=="eggrafi")
			{
				
					$menu="";
					$page="eggrafi";
				
				
			}

				
			if($this->page=="syndesi")
			{
				
					$menu="";
					$page="syndesi";
				
				
			}


			if($this->page=="arxikiuser")
			{
				$this->checkconnect();	
					$menu="user";
					$page="arxikiuser";
				
				
			}

			if($this->page=="arxikisupport")
			{
				$this->checkconnect();	
					$menu="support";
					$page="arxikiuser";
				
				
			}

			if($this->page=="arxikiadmin")
			{
				$this->checkconnect();	
					$menu="admin";
					$page="arxikiadmin";
				
				
			}

			if($this->page=="arxikimap")
			{
				$this->checkconnect();	
					$menu="admin";
					$page="arxikimap";
				
				
			}


			if($this->page=="adminsupports")
			{
				$this->checkconnect();	
					$menu="admin";
					$page="adminsupports";
				
				
			}


			if($this->page=="adminlistsupports")
			{
				$this->checkconnect();	
					$menu="admin";
					$page="adminlistsupports";
				
			}


			if($this->page=="store")
			{
				$this->checkconnect();	
					$menu="admin";
					$page="adminstore";
				
			}

			if($this->page=="categories")
			{
				$this->checkconnect();	
					$menu="admin";
					$page="admincategories";
				
			}

			if($this->page=="adminanak")
			{

				$this->checkconnect();	
					$menu="admin";
					$page="adminanakoinoseis";
				
				
			}

			if($this->page=="adminstats")
			{

				$this->checkconnect();	
					$menu="admin";
					$page="adminstats";
				
				
			}


			if($this->page=="useranakoinoseis")
			{
				$this->checkconnect();	
					$menu="user";
					$page="useranakoinoseis";
				
			}


			
			if($this->page=="userprosfores")
			{
				$this->checkconnect();	
					$menu="user";
					$page="userprosfores";
				
			}

			
			
			if($this->page=="useraitimata")
			{
				$this->checkconnect();	
					$menu="user";
					$page="useraitimata";
				
			}

			if($this->page=="supportmap")
			{
				$this->checkconnect();	
					$menu="support";
					$page="supportmap";
				
			}



			if($this->page=="uploaddata1")
			{
				$this->checkconnect();	
				$file=$_FILES["fl"]["tmp_name"];
				if(move_uploaded_file($file,"items.json"))
				{
						
					Item::uploadData("items.json");
				}
				else
				{
					echo "false";
		
				}
				die();
				
			}


			if($this->page=="uploaddata2")
			{
				$this->checkconnect();	
				$fl=$_POST['url'];
				Item::uploadData($fl);
				die();
				
			}


			if($this->page=="getitems")
			{
				$this->checkconnect();	
				
				$A=Item::getAll();

				echo json_encode($A);

				die();
				
			}

			if($this->page=="getitems2")
			{
				$this->checkconnect();	
				
				$A=Item::getAll2();

				echo json_encode($A);

				die();
				
			}

			
			if($this->page=="getcategories")
			{
				$this->checkconnect();	
				
				$A=Categories::getAll();

				echo json_encode($A);

				die();
				
			}

			
			if($this->page=="getanakoinoseis")
			{
				$this->checkconnect();	
				
				$A=Anakoinosi::getAll();

				echo json_encode($A);

				die();
				
			}


			if($this->page=="getanakoinosi")
			{
				$this->checkconnect();	
				
				$a=Anakoinosi::findAnakoinosi($_POST['id']);

				echo json_encode($a);

				die();
				
			}

			if($this->page=="getprosfores")
			{
				$this->checkconnect();	
				
				$A=Request::getProsforesUser($_SESSION['idu']);

				echo json_encode($A);

				die();
				
			}

			if($this->page=="getaitimata")
			{
				$this->checkconnect();	
				
				$A=Request::getRequestsUser($_SESSION['idu']);

				echo json_encode($A);

				die();
				
			}

			if($this->page=="delall")
			{
				$this->checkconnect();	
				Categories::delAll();
				Item::delAll();

				echo json_encode($A);

				die();
				
			}

			if($this->page=="addcat")
			{
				$this->checkconnect();	
				$tmp=new Categories();
				$tmp->set($_POST);
				$tmp->savedb();
				
				echo 'ok';
				die();
				
			}


			if($this->page=="additem")
			{
				$this->checkconnect();	
				$tmp=new Item();
				$tmp->set($_POST);
				$tmp->savedb();
				
				echo 'ok';
				die();
				
			}


			if($this->page=="addanak")
			{
				$this->checkconnect();	
				$tmp=new Anakoinosi();
				$tmp->set($_POST);
				$tmp->savedb();

				$tmp->addItems($_POST["epilegmena"]);

				echo 'ok';
				die();
				
			}

			
			if($this->page=="addprosf")
			{
				$this->checkconnect();	
				$tmp=new Request();
				$tmp->setprosf($_POST);
				$tmp->savedb();

				echo 'ok';
				die();
				
			}

			
			if($this->page=="addaitima")
			{
				$this->checkconnect();	
				$tmp=new Request();
				$tmp->setaitima($_POST);
				$tmp->savedb();

				echo 'ok';
				die();
				
			}
			
			if($this->page=="delitembyid")
			{
				$this->checkconnect();	
				$tmp=new Item();
				$tmp->set($_POST);
				$tmp->deletedb();
				
				echo 'ok';
				die();
				
			}

				
			if($this->page=="delcategory")
			{
				$this->checkconnect();	
				$tmp=new Categories();
				$tmp->set($_POST);
				$tmp->deletedb();
				
				echo 'ok';
				die();
				
			}

			if($this->page=="delanak")
			{
				$this->checkconnect();	
				$tmp=new Anakoinosi();
				$tmp->set($_POST);
				$tmp->deletedb();
				
				echo 'ok';
				die();
				
			}


			if($this->page=="delprosf")
			{
				$this->checkconnect();	
				$tmp=Request::findRequest($_POST['idp']);
				
				$tmp->deletedb();
				
				echo 'ok';
				die();
				
			}


			if($this->page=="saveitembyid")
			{
				$this->checkconnect();	
				$tmp=Item::findItem($_POST['id']);
				$tmp->qty=$_POST['pos'];
				$tmp->savedb();
				
				echo 'ok';
				die();
				
			}




			/// leitoyrgies
			if($this->page=="adduser")
			{
				$u=new User();
				$u->set($_POST);
				try{
					$u->insertdb();
					echo "true";
				}
				catch(Exception $ee)
				{
					echo "false";
				}
				die();
				
			}


			if($this->page=="addsupport")
			{
				$u=new User();
				$u->set($_POST);

				try{
					$u->insertdb();
					echo "true";
				}
				catch(Exception $ee)
				{
					echo "false";
				}
				die();
				
			}

			if($this->page=="updateAdminPlace")
			{
				$u=User::findUser($_SESSION["idu"]);
				$u->lat=$_POST['lat'];
				$u->lot=$_POST['lot'];
				$u->updatedb();
				die();
				
			}

			if($this->page=="updateSupportPlace")
			{
				$u=User::findUser($_SESSION["idu"]);
				$u->lat=$_POST['lat'];
				$u->lot=$_POST['lot'];
				$u->updatedb();
				die();
				
			}

			
			if($this->page=="anathesi")
			{

				$c=Request::countMyReq();
				if($c<4){
					$r=Request::findRequest($_POST['ida']);
					$r->status="Ανάθεση";
					$r->id_support=$_SESSION["idu"];
					$r->date_anathesi=date("Y-m-d H:i:s");
					
					$r->savedb();
					echo 1;
				}
				else
				{
					echo 0;
				}
				die();
				
			}

			if($this->page=="akyrosi")
			{

				try{
					Request::Akyrosi($_POST['ida']);
					echo 1;
				} 
				catch(Exception $ee){
					echo 0;
				}
				die();
				
			}

			if($this->page=="oloklirosi")
			{

				try{
					Request::Oloklirosi($_POST['ida']);
					echo 1;
				} 
				catch(Exception $ee){
					echo 0;
				}
				die();
				
			}


			
			if($this->page=="fortosi")
			{

				try{
					$r=Request::Fortosi();
					echo 1;
				} 
				catch(Exception $ee){
					echo 0;
				}
				die();
				
			}

			if($this->page=="ekfortosi")
			{

				try{
					$r=Request::Ekfortosi();
					echo 1;
				} 
				catch(Exception $ee){
					echo 0;
				}
				die();
				
			}


			/// leitoyrgies
			

			if($this->page=="syndesixristi")
			{
				$u=new User();
				
				try{
					$u->setUserByUsernamePss($_POST['username'],$_POST['password'],$_POST['type']);
					$_SESSION['idu']=$u->id;
					echo "true";
				}
				catch(Exception $ee)
				{
					echo "false";
				}
				die();
				
			}

			if($this->page=="logout")
			{
				session_destroy();
				header("Location: index.php");
				
			}
			


			
			if($this->page=="getAllSupports")
			{
				$U=User::getAllSupports();
				echo json_encode($U);
				die();
				
			}
		
					
			if($this->page=="delsupport")
			{
				$u=new User();
				$u->setUserById($_POST['id']);
				$u->deletedb();
				echo "ok";
				die();
				
			}


			if($this->page=="getMapSupportData")
			{
				$A=[];
				$support=new User();
				$support->setUserById($_SESSION['idu']);
				$A["support"]=$support;

				$admin=new User();
				$admin->getAdmin();
				$A["admin"]=$admin;

					
				$A1=Request::getAllAitimatasWait();

				$A["aitimata_wait"]=$A1;

				$B1=Request::getAllProsforesWait();

				$A["prosfores_wait"]=$B1;

				$A2=Request::getMyAitimataAnath();

				$A["aitimata_anath"]=$A2;

				$B2=Request::getMyProsforesAnath();

				$A["prosfores_anath"]=$B2;

				echo json_encode($A);
				die();
				
			}


			
			if($this->page=="getMapAdminData")
			{

				$A=[];
				
				$supports=User::getAllSupports();
				
				$A["supports"]=$supports;

				$admin=new User();
				$admin->getAdmin();
				$A["admin"]=$admin;


				$A1=Request::getAllAitimatasWait();

				$A["aitimata_wait"]=$A1;

				$B1=Request::getAllProsforesWait();

				$A["prosfores_wait"]=$B1;

				$A2=Request::getAllAitimataAnath();

				$A["aitimata_anath"]=$A2;

				$B2=Request::getAllProsforesAnath();

				$A["prosfores_anath"]=$B2;

				echo json_encode($A);
				die();
				
			}


			
			if($this->page=="getStats")
			{

				$A=[];
				
				$A0=Request::getAllAitimata();

				$A["aitola"]=count($A0);
			
				$B0=Request::getAllProsfores();

				$A["prosfola"]=count($B0);
			
				$A1=Request::getAllAitimatasWait();

				$A["aitanamoni"]=count($A1);

				$B1=Request::getAllProsforesWait();

				$A["prosfanamoni"]=count($B1);

				$A2=Request::getAllAitimataAnath();

				$A["aitanath"]=count($A2);

				$B2=Request::getAllProsforesAnath();

				$A["prosfanath"]=count($B2);

				echo json_encode($A);
				die();
				
			}
		
		
			
			include ("view/master.php");
		}

		function checkconnect()
		{
			if(@$_SESSION["idu"]=="")
			{
				header("Location: index.php");
			}
			
		}
		



	
	
		
		
		
	}




?>
