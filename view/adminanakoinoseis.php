<h2>Ανακοινώσεις</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Προσθήκη Ανακοίνωσης</button>

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
        <h4 class="modal-title">Προσθήκη Ανακοίνωσης</h4>
      </div>
      <div class="modal-body">
        <form id=form1>
      
                <table class="table">
                  <tr><td>Τίτλος</td><td><input type="text"  class="form-control" name=title id=ttl></td></tr>
                 
                  <tr><td>Αντικείμενα:</td><td>
                    <select id=items class="form-control"></select>
                  
                  <button type=button onclick="newItem()">Add</button>
                  </td></tr>

                  <tr><td>Προσθήκη Items:</td><td><input type=text  class="form-control" name="description" id=epilegmena readonly>
                  <input type='hidden' name=epilegmena id=idepil></td></tr>

                  <tr><td></td><td><input type=button id=btn10 class='btn btn-primary' value="Δημοσίευση Ανακοίνωσης"></td></tr>
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
            <a onclick='del(${res[i].id})'>Delete</a>
            </td></tr>`;
        }
        h+="</table>";

       
        $("#data1").html(h);
    })
  }
  getItems();

  
function del(id)
{

  $.post("index.php?page=delanak", {"id":id,"title":""},(res)=>
  {alert("H Ανακοίνωση διαγράφηκε");  getItems();});
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
       

       $.post("index.php?page=addanak",$("#form1").serialize(),(res)=>{
           if(res=="ok"){
               alert("Η ανακοίνωση προστέθηκε");
               getItems();
           }
           else
           {
               alert("Η ανακοίνωση δεν προστέθηκε !!");
           }
       });


   })







          </script>

