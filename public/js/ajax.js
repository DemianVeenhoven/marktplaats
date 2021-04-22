window.sort = function() {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('ajax').innerHTML = this.responseText;
      }
  };
  xhttp.open('POST', 'ads/sort', true);
  
  const form = document.getElementById('filterForm');
  
  const formData = new FormData(form);
  
  xhttp.send(formData);
}

function reset() {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("ajax").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ads", true);
    xmlhttp.send();
}