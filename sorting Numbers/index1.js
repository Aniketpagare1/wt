
$(document).ready(function() {
    $('#sortButton').click(function() {
      var inputArray = $('#arrayInput').val().split(',').map(Number);
      inputArray.sort(function(a, b) {
        return a - b;
      });
      displaySortedArray(inputArray);
    });
  
    $('#searchButton').click(function() {
      var inputArray = $('#arrayInput').val().split(',').map(Number);
      var searchValue = parseInt(prompt("Enter the element to search:"));
      var result = inputArray.indexOf(searchValue);
      if (result !== -1) {
        alert("Element found at index: " + result);
      } else {
        alert("Element not found.");
      }
    });
  
    function displaySortedArray(array) {
      $('#sortedArray').empty();
      for (var i = 0; i < array.length; i++) {
        $('#sortedArray').append('<li class="list-group-item">' + array[i] + '</li>');
      }
    }
  });
  
