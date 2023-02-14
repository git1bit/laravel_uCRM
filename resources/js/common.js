const nl2br = (str) => {
  // var res = str.replace(/"\r\n"/g, "<br>");
  var res = str.replace(/(\n)/g, "<br>");
  // res = res.replace(/(\n|\r)/g, "<br>");
  return res;
};

export { nl2br };

const tableToCSVadmin = {
  export: function(elm /*, delimiter */) {
    console.log("処理開始");
    var table = elm;
    var rows  = this.getRows(table);
    var lines = [];
    var delimiter = delimiter || ',';

    for (var i = 0, numOfRows = rows.length; i < numOfRows; i++) {
      var cols    = this.getCols(rows[i]);
      var line = [];

      for (var j = 0, numOfCols = cols.length-2; j < numOfCols; j++) {
          var text = cols[j].textContent || cols[j].innerText.toString();
          text = '"'+text.replace(/"/g, '""')+'"';
          
          line.push(text);
      }

      lines.push(line.join(delimiter));
    }
    console.log(lines);

    this.saveAsFile(lines.join("\r\n"));

    table = null;
    rows = null;
    lines = null;
  },

  saveAsFile: function(csv) {
    var blob = new Blob([csv], {type: 'text/csv'});
    var url  = URL.createObjectURL(blob);

    var a = document.createElement("a");

    a.href = url;
    a.target = '_blank';
    a.download = 'table.csv';

    a.click();

    console.log(a);

    a = null;
  },

  getRows: function(elm){
    return Util.getNodesByName(elm, 'tr');
  },

  getCols: function(elm){
    return Util.getNodesByName(elm, ['td', 'th']);
  }
}

var Util = {
  getNodesByName: function(elm /*, string or array*/) {
    var children  = elm.childNodes;
    var nodeNames = ('string' === typeof arguments[1]) ? [arguments[1]] : arguments[1] ;
    nodeNames = nodeNames.map(function(str){ return str.toLowerCase() });

    var results  = [];

    for (var i = 0, max = children.length; i < max; i++ ) {
      if (nodeNames.indexOf(children[i].nodeName.toLowerCase()) !== -1)
      {
         results.push(children[i]);
      }
      else
      {
         results = results.concat(this.getNodesByName(children[i], nodeNames));
      }
    }

    return results;
  }
}


export { tableToCSVadmin };

const tableToCSV = {
  export: function(elm /*, delimiter */) {
    var table = elm;
    var rows  = this.getRows(table);
    var lines = [];
    var delimiter = delimiter || ',';

    for (var i = 0, numOfRows = rows.length; i < numOfRows; i++) {
      var cols    = this.getCols(rows[i]);
      var line = [];

      for (var j = 0, numOfCols = cols.length-1; j < numOfCols; j++) {
          var text = cols[j].textContent || cols[j].innerText.toString();
          // text = text.toString();
          text = '"'+text.replace(/"/g, '""')+'"';

          line.push(text);
      }

      lines.push(line.join(delimiter));
    }

    this.saveAsFile(lines.join("\r\n"));

    table = null;
    rows = null;
    lines = null;
  },

  saveAsFile: function(csv) {
    var blob = new Blob([csv], {type: 'text/csv'});
    var url  = URL.createObjectURL(blob);

    var a = document.createElement("a");

    a.href = url;
    a.target = '_blank';
    a.download = 'table.csv';

    a.click();

    a = null;
  },

  getRows: function(elm){
    return Util.getNodesByName(elm, 'tr');
  },

  getCols: function(elm){
    return Util.getNodesByName(elm, ['td', 'th']);
  }
}

var Util = {
  getNodesByName: function(elm /*, string or array*/) {
    var children  = elm.childNodes;
    var nodeNames = ('string' === typeof arguments[1]) ? [arguments[1]] : arguments[1] ;
    nodeNames = nodeNames.map(function(str){ return str.toLowerCase() });

    var results  = [];

    for (var i = 0, max = children.length; i < max; i++ ) {
      if (nodeNames.indexOf(children[i].nodeName.toLowerCase()) !== -1)
      {
         results.push(children[i]);
      }
      else
      {
         results = results.concat(this.getNodesByName(children[i], nodeNames));
      }
    }

    return results;
  }
}

export { tableToCSV };
