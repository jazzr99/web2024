<h2>Προσφορές</h2>


<div class="col-md-8">
Search: <input type=text id=search1 onkeyup="search()"><br> 

<div id=data1></div>

</div>










<script>





function getItems()
{
      
    $.get("index.php?page=getprosfores", (res)=>{
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
               alert("Η προσφορά ακυρωθηκε");
               getItems();
           }
           else
           {
               alert("Η προσφορά δεν ακυρώθηκε !!");
           }
       });


   }







          </script>

