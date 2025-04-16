<h2>Κατηγορίες</h2>


<div class="col-md-8">
Search: <input type=text id=search1 onkeyup="search()"><br> 

<div id=data1></div>

</div>



<script>

function getItems()
{
      
    $.get("index.php?page=getcategories", (res)=>{
        res=JSON.parse(res);
      h="<table class=table><tr><th>ID</th><th>Category Name</th></tr>";  
      for (i=0;i<res.length;i++)
        {
            h+=`<tr><td>${res[i].id}</td>
            
            
            <td>${res[i].category_name}</td>
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

  $.post("index.php?page=delcategory", {"id":id,"category_name":""},(res)=>
  {alert("H Κατηγορία διαγράφηκε");  getItems();});
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






          </script>

