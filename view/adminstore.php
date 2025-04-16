<h2>Αποθήκη</h2>
<div class="col-md-4">


        <a href="index.php?page=categories">
        <button class="btn btn-primary">Κατηγορίες</button>
        </a>
        
        <h3>Προσθήκη ITEMS Από εξωτερική πηγή</h3>
        
       
        
                <form id="frm1">
                Από URL: <input type="url" class="form-control" value="http://usidas.ceid.upatras.gr/web/2023/export.php" name=url><br>
                <button type=button class="btn btn-primary" id=add1 >Add Data</button>
                </form>
       
        <form id="frm2">
                Από Αρχείο: <input type="File" name=fl id=fl  class="form-control" ><Br> <button id=add2 type=button class="btn btn-primary">Add Data</button>
                </form>
       

 <h3>Προσθήκη ITEMS Και Κατηγοριών</h3>
  
        <form id="frm3">
          <h3>Προσθήκη κατηγορίας</h3>
          ID Κατηγορίας: <br>
          <input class="form-control" type="number" name=id><br>
          Όνομα Κατηγορίας:<br>
          <input class="form-control" type="text" name=category_name><br>


     
         <button type=button class="btn btn-primary" id=add3 >Add Category</button>
        </form>

        <form id="frm4">
          <h3>Προσθήκη Item</h3>
          ID Item: <br>
          <input class="form-control" type="number" name=id><br>
          Όνομα Item:<br>
          <input class="form-control" type="text" name="name"><br>
          Κατηγορία:<br>
          <select name=category id=categ>

          </select><br>

          <script>

           
          </script>
          <h2></h2>


         <button type=button class="btn btn-primary" id=add4 >Add Item</button>
    </form>
<br><br>
    <button type=button class="btn btn-danger" id=delall >Delete All</button>




</div>

<div class="col-md-8">
Search: <input type=text id=search1 onkeyup="search()"><br> 

<div id=data1></div>

</div>



<script>

function getItems()
{
  $("#data1").html("Wait data");
    $.get("index.php?page=getitems", (res)=>{
        res=JSON.parse(res);
      h="<table class=table><tr><th>ID</th><th>Name</th><th>Category</th><th>Ποσότητα</th>";  
      for (i=0;i<res.length;i++)
        {
            h+=`<tr><td>${res[i].id}</td>
            
            
            <td>${res[i].name}</td><td>${res[i].category_name}</td>
            <td><input type=text value='${res[i].qty}' id=posotita${res[i].id} size=4 name=posotita></td>
            <td>
            <a onclick='save(${res[i].id})'>Save</a> | 
            <a onclick='del(${res[i].id})'>Delete</a>
            </td></tr>`;
        }
        h+="</table>";

       
        $("#data1").html(h);
        getCats();
        
    })
  }
  getItems();

  
function del(id)
{

  $.post("index.php?page=delitembyid", {"id":id,"name":""},
  (res)=>{
    alert('Το item διαγράφηκε')
    
    getItems();});
}
  

function save(id,pos)
{

  $.post("index.php?page=saveitembyid", {"id":id, "name":"", "pos":$("#posotita"+id).val()},
                        (res)=>{alert('Η ποσότητα ανανεώθηκε')});
}
   


function search()
{
  x=$("#search1").val();

    A=$("tr");

    for (i=0; i<A.length;i++)
    {
        if($(A[i]).text().toUpperCase().indexOf(x.toUpperCase())<0)  $(A[i]).hide();
        else $(A[i]).show();        
      }
    
}





$("#add1").click(()=>{

$.post("index.php?page=uploaddata2",$("#frm1").serialize(),(result)=>{
    if(result=="true"){
        alert("Τα δεδομένα ανέβηκαν");
        getItems();
    }
    else
    {
        alert("Λάθος στην αποθήκευση δεδομένων");
    }
}); 


})


$("#add2").click(()=>{

var fdata=new FormData();
var f=$("#fl")[0].files[0];
fdata.append("fl",f);

$.ajax({
type: "POST",
url: "index.php?page=uploaddata1",
success: function (result){
  if(result=="true"){
        alert("Τα δεδομένα ανέβηκαν");
        getItems();
    }
    else
    {
        alert("Λάθος στην αποθήκευση δεδομένων");
    }
},
async: true,
data: fdata,
cache: false,
contentType: false,
processData: false,
timeout: 60000
});
});



$("#add3").click(()=>{

$.post("index.php?page=addcat",$("#frm3").serialize(),(result)=>{
  if(result=="ok"){
    alert("Η κατηγορία αποθηκεύτηκε");
    getCats();
  }
  else
  {
    alert("Λάθος στην αποθήκευση δεδομένων");
  }
  }); 


})




$("#add4").click(()=>{

  $.post("index.php?page=additem",$("#frm4").serialize(),(result)=>{
        if(result=="ok"){
          alert("Το Item αποθηκεύτηκε");
          getItems();
        }
        else
        {
          alert("Το Item υπάρχει");
        }
  }); 

})



$("#delall").click(()=>{

    $.post("index.php?page=delall",{},(result)=>{
      alert("Τα δεδομένα διαγράφηκαν");
      getItems();
    }); 

})





function getCats()
            {
                $.getJSON("index.php?page=getcategories", (res)=>{
                  h="";  
                  for (i=0;i<res.length;i++)
                    {
                        h+=`<option value='${res[i].id}'>${res[i].category_name}</option>`;
                    }
                    $("#categ").html(h);
                })
              }
              getCats();



          </script>

