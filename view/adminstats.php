<h2>Στατιστικά</h2>
<div class="col-md-12">
    <canvas id="myChart"></canvas>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
  const ctx = document.getElementById('myChart');

  $.post("index.php?page=getStats",{},(res)=>{

        var A=JSON.parse(res);

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Όλα τα αιτήματα', 'Αιτήματα σε αναμονή', 'Αιτήματα σε ανάθεση', 'Όλες οι προσφορές', 'Προσφορές σε αναμονή', 'Προσφορές σε ανάθεση'],
            datasets: [{
                label: '# Πλήθος',
                data: [A.aitola, A.aitanamoni, A.aitanath, A.prosfola, A.prosfanamoni, A.prosfanath],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });

});
</script>
 