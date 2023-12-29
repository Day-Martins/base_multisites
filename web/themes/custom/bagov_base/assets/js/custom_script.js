window.addEventListener('load', addDarkmodeWidget);

function addDarkmodeWidget() {
  var darkmode = new Darkmode();
  
  document.getElementById("contrast-btn").onclick = function(){
    darkmode.toggle();
  }
}
  