function getStaffNameById(id) {
    // Make an AJAX request to the PHP script
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'dapatstaf.php?id=' + id, true);
    xhr.onload = function() {
      if (this.status == 200) {
        // Update the web page with the staff name
        document.getElementById('staff-name').innerHTML = this.responseText;
      }
    };
    xhr.send();
  }  