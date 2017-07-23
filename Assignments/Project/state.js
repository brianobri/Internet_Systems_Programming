

function getPlace(state) {
  var xhr;
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else {
    xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Because IE versions prior to 7 do not support the XMLHttpRequest object.
  }

// Register the embedded handler function
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var result = xhr.responseText;
        document.getElementById("mystatename").value = result;
    }
  }
  
  if (state.trim() != "") {
    xhr.open("GET", "getState.php?state=" + state);
    xhr.send(null);
  }
}


