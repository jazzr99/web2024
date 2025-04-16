<h2>Αιτήματα</h2>



<div class="col-md-8">
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Νέο Αίτημα</button><br><br>
Search: <input type=text id=search1 onkeyup="search()"><br> 

<div id=data1></div>

</div>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Προσθήκη Αιτήματος</h4>
      </div>
      <div class="modal-body">
        <form id=form1>
              <input type="hidden"  class="form-control" name=id_anak id=idanak>
              <input type="hidden"  class="form-control" name=id_user id=id_user value="<?php echo $_SESSION['idu']; ?>">
              
                <table class="table">
                
                  <tr><td>Ζητούμενο Item:</td><td>
                    <select id=items name=item class="form-control"></select>
                  </td></tr>
                  <tr><td>Ποσότητα</td><td><input type="text"  class="form-control" name=qty id=qty></td></tr>
                 

                  <tr><td></td><td><input type=button id=btn10 class='btn btn-primary' value="Στείλε το αίτημα"></td></tr>
              </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<script>

let Items_mem;
    $.getJSON("index.php?page=getitems2", (res)=>{
      Items_mem=res;
        for(i=0;i<res.length;i++)
        {
            $("#items").append(`<option value=${res[i].id}>${res[i].name}</option>`);
        }
    });



function getItems()
{
      
    $.get("index.php?page=getaitimata", (res)=>{
        res=JSON.parse(res);
      h="<table class=table><tr><th>ID</th><th>Item</th><th>Quantity</th><th>Date Create</th><th>Status</th></tr>";  
      for (i=0;i<res.length;i++)
        {
          xx=(res[i].status=="Αναμονή"? ` <a onclick='akyrosi(${res[i].id})'>Ακύρωση</a>` : "" );
            h+=`<tr><td>${res[i].id}</td>

            <td>${res[i].item_detail.name}</td>
            <td>${res[i].qty}</td>
            <td>${res[i].date_create}</td>
            <td>${res[i].status}</td>
            <td>
            ${xx}
            </td></tr>`;
        }
        h+="</table>";

       
        $("#data1").html(h);
    })
  }
  getItems();

  
function akyrosi(id)
{
  
  $("#myModal").modal("show");
  $.post("index.php?page=getanakoinosi",{"id":id},(res)=>{

   res=JSON.parse(res);
    
    $("#idanak").val(res.id);
    $("#ttl").val(res.title);
    $("#dsc").val(res.description);
    h="";
    for(i=0;i<res.items.length;i++)
    {

      h+=`<option value="${res.items[i].id}">${res.items[i].name}</option>`;
    }
    $("#items").html(h);
   
    

  });
 

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



function akyrosi(id){
       

       $.post("index.php?page=delprosf",{idp:id},(res)=>{
           if(res=="ok"){
               alert("Η αίτημα ακυρωθηκε");
               getItems();
           }
           else
           {
               alert("Η αίτημα δεν ακυρώθηκε !!");
           }
       });


   }



$("#btn10").click(()=>{
       

       $.post("index.php?page=addaitima",$("#form1").serialize(),(res)=>{
           if(res=="ok"){
               alert("Το αίτημα προστέθηκε");
               getItems();
           }
           else
           {
               alert("Το αίτημα δεν προστέθηκε !!");
           }
       });


   })







          </script>

