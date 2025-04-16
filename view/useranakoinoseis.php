<h2>Ανακοινώσεις</h2>


<div class="col-md-8">
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
        <h4 class="modal-title">Προσθήκη Προσφοράς</h4>
      </div>
      <div class="modal-body">
        <form id=form1>
              <input type="hidden"  class="form-control" name=id_anak id=idanak>
              <input type="hidden"  class="form-control" name=id_user id=id_user value="<?php echo $_SESSION['idu']; ?>">
              
                <table class="table">
                
                  <tr><td>Τίτλος</td><td><input type="text"  class="form-control" name=title id=ttl readonly></td></tr>
                  <tr><td>Περιγραφή</td><td><input type="text"  class="form-control" name=description id=dsc readonly></td></tr>
                  <tr><td>Αντικείμενο Προσφοράς:</td><td>
                    <select id=items name=item class="form-control"></select>
                  
                  
                  </td></tr>
                  <tr><td>Ποσότητα</td><td><input type="text"  class="form-control" name=qty id=qty></td></tr>
                 

                  <tr><td></td><td><input type=button id=btn10 class='btn btn-primary' value="Κάνε προσφορά"></td></tr>
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
            $("#items").append(`<option value=${i}>${res[i].name}</option>`);
        }
    });


    function newItem()
    {
        i=$("#items").val(); 
        epil=$("#epilegmena").val();
        epil2= $("#idepil").val()
        $("#epilegmena").val(epil+Items_mem[i].name+" - ");
        $("#idepil").val(epil2+Items_mem[i].id+",");

    }

function getItems()
{
      
    $.get("index.php?page=getanakoinoseis", (res)=>{
        res=JSON.parse(res);
      h="<table class=table><tr><th>ID</th><th>Title</th><th>Description</th></tr>";  
      for (i=0;i<res.length;i++)
        {
            h+=`<tr><td>${res[i].id}</td>

            <td>${res[i].title}</td>
            <td>${res[i].description}</td>
            <td>
            <a onclick='addprosfora(${res[i].id})'>Κάνε Προσφορά</a>
            </td></tr>`;
        }
        h+="</table>";

       
        $("#data1").html(h);
    })
  }
  getItems();

  
function addprosfora(id)
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


$("#btn10").click(()=>{
       

       $.post("index.php?page=addprosf",$("#form1").serialize(),(res)=>{
           if(res=="ok"){
               alert("Η προσφορά προστέθηκε");
               getItems();
           }
           else
           {
               alert("Η προσφορά δεν προστέθηκε !!");
           }
       });


   })







          </script>

