function search(event) {
    event.preventDefault(); // Prevent the form from submitting normally
  
    var query = document.getElementById("search-input").value;
  
    // Make an AJAX request to a server-side script
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Handle the response from the server
        var results = JSON.parse(this.responseText);
        displayResults(results);
      }
    };
    xhttp.open("GET", "search.php?query=" + encodeURIComponent(query), true);

    xhttp.send();
  }
  
  function displayResults(results) {
    var searchResultsDiv = document.getElementById("search-results");
  
    // Clear previous results
    searchResultsDiv.innerHTML = "";
  
    if (results.length === 0) {
      searchResultsDiv.textContent = "No results found.";
    } else {
      // Loop through the results and create a new paragraph element for each result
      results.forEach(function(result) {
        var paragraph = document.createElement("p");
        paragraph.textContent = result.nama_album; // Replace "nama_album" with the actual column name from your database
        searchResultsDiv.appendChild(paragraph);
      });
    }
  }
  
  window.onload = function() {
    var searchForm = document.getElementById("search-form");
  
    // Add an event listener for submit event
    searchForm.addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent the default form submission
      search(event); // Trigger the search function
    });
  
    var searchInput = document.getElementById("search-input");
  
    // Add an event listener for keyup event
    searchInput.addEventListener("keyup", function(event) {
      // Check if the pressed key is Enter (key code 13)
      if (event.keyCode === 13) {
        search(event); // Trigger the search function
      }
    });
  };
  