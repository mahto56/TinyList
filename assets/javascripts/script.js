var grid = new Muuri('.main', {
  dragEnabled: true,
  layout: {
    fillGaps: true
  }
});

window.addEventListener('load', function () {
  grid.refreshItems().layout();
});


let editables = document.getElementsByClassName("editable");


Array.from(editables).forEach(e => {
    e.addEventListener("input", function() {
    console.log("input event fired");
    grid.refreshItems().layout();
    }, false);
});


function pintoggle(id){
    let pin_white = document.getElementById(id+'-pin_white');
    let pin_black = document.getElementById(id+'-pin_black');
    
    let toggle = pin_white.style.display != "none";
    if(toggle){
        pin_white.style.display = "none";
        pin_black.style.display = "";
    }else{
        pin_white.style.display = "";
        pin_black.style.display = "none";
    }
    
    toggle = !toggle;
}

 function getRandomColor() {
                var letters = 'BCDEF'.split('');
                var color = '#';
                for (var i = 0; i < 6; i++ ) {
                    color += letters[Math.floor(Math.random() * letters.length)];
                }
                return color;
  }
  
let cards = document.getElementsByClassName("card");

Array.from(cards).forEach(e => {
    e.style.background = randomColor({luminosity: 'light'});
    e.style.borderColor = e.style.background;
});
