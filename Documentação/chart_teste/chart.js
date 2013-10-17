
      google.load('visualization', '1', {packages: ['corechart']});

    var visualization;

    function drawVisualization() {
      // To see the data that this visualization uses, browse to
      // http://spreadsheets.google.com/ccc?key=pCQbetd-CptGXxxQIG7VFIQ
      var query = new google.visualization.Query(
          'https://docs.google.com/spreadsheet/ccc?key=0AtKvW_osi2jqdE1aNGVaQW1Gc3Z5LXMwb2tNSDRNYXc');
    
      // Apply query language.
      query.setQuery('SELECT B,A');
    
      // Send the query with a callback function.
      query.send(handleQueryResponse);
    }
    
    function handleQueryResponse(response) {
      if (response.isError()) {
        alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
        return;
      }
    
      var data = response.getDataTable();
      visualization = new google.visualization.PieChart(document.getElementById('grafico'));
      visualization.draw(data, {legend: 'bottom', is3D: true});
    }
    

    google.setOnLoadCallback(drawVisualization);
