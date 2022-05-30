// console.log ("hello world");

// let tab = document.querySelector("#csv");

// for(let i = 0; i< tab.length; i++){
//     console.log(tab[i]);
// }

function handleFiles(files) {
    // Check for the various File API support.
    if (window.FileReader) {
        // FileReader are supported.
        getAsText(files[0]);
    } else {
        alert('FileReader are not supported in this browser.');
    }
  }

  function getAsText(fileToRead) {
    var reader = new FileReader();
    // Read file into memory as UTF-8      
    reader.readAsText(fileToRead);
    // Handle errors load
    reader.onload = loadHandler;
    reader.onerror = errorHandler;
  }

  function loadHandler(event) {
    var csv = event.target.result;
    processData(csv);
  }

  function processData(csv) {
      var allTextLines = csv.split(/\r\n|\n/);
      var lines = [];
      for (var i=0; i<allTextLines.length; i++) {
          var data = allTextLines[i].split(';');
              var tarr = [];
              for (var j=0; j<data.length; j++) {
                  tarr.push(data[j]);
              }
              lines.push(tarr);
      }
    console.log(lines[1]);
    let content = document.querySelector("#content");

    content.append(lines[0][0]);
    content.append(lines[0][1]);
    content.append(lines[0][2]);
    content.append(lines[1][0]);
    content.append(lines[1][1]);
  }

  function errorHandler(evt) {
    if(evt.target.error.name == "NotReadableError") {
        alert("Canno't read file !");
    }
  }