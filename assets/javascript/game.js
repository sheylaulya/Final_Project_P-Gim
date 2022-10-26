var myGamePiece;
var myBackground;
var myObstacles = [];
var myScore;
var btnTry = document.getElementById("btn-try");
var btnExit = document.getElementById("btn-exit");
var over = document.getElementById("game-over");
var plyr = document.getElementById("player");
var img = document.getElementById("bg");
var cntnt = document.getElementById("content");
var btn = document.getElementById("btn-try");
var user = document.getElementById("user");
var fltr = document.getElementById("myfilter");
var load = document.getElementById("load");

// play game
function startGame() {
  let wrn = document.getElementById("style1").value;
  myGamePiece = new component(35, 35, wrn, 150, 180);
  myBackground = new component(750, 420, "assets/img/backgroundCanvas.png", 0, 0, "background");
  myScore = new component("20px", "silkscreen", "black", 520, 25, "text");
  myObstacles = [];
  myGameArea.start();
}

// function startGame() {
//   let wrnLoad = document.getElementById("style1").value;
//   load.removeAttribute("style");
//   load.style = "background-color:" + wrnLoad + ";";
//   // myGameArea.stop();
//   setTimeout(() => {    
//     let wrn = document.getElementById("style1").value;
//     myGamePiece = new component(35, 35, wrn, 150, 180);
//     myBackground = new component(750, 420, "assets/img/backgroundCanvas.png", 0, 0, "background");
//     myScore = new component("22px", "silkscreen", "black", 525, 27, "text");
//     myObstacles = [];
//     myGameArea.start();
//   }, 3000);
// }

// restart game
function restart() {
  myGameArea.stop();
  myGameArea.clear();
  startGame();
  btnTry.style = "display: none;"
  btnExit.style = "display: none;"
  over.style = "display: none;"
  fltr.style = "display: none;"
}

// CANVAS
var myGameArea = {
  canvas: document.createElement("canvas"),
  start: function () {
    var wrnPlyr = document.getElementById("style1").value;
    user.remove()
    plyr.style = "color:" + wrnPlyr + "; margin-top: -10px;";
    cntnt.style = "display: none;"
    load.style = "display: none;"
    user.style = "display: block;"
    this.canvas.width = 700;
    this.canvas.height = 400;
    this.context = this.canvas.getContext("2d");
    document.getElementById("container").insertBefore(this.canvas, document.getElementById("container").childNodes[0]);
    this.frameNo = 0;
    this.interval = setInterval(updateGameArea, 20);
  },
  clear: function () {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
  },
  stop: function () {
    clearInterval(this.interval);
    btnTry.removeAttribute("style");
    btnExit.removeAttribute("style");
    over.removeAttribute("style");
    fltr.removeAttribute("style");
  }
}

// component = objek, obstacel, bg
function component(width, height, color, x, y, type) {
  this.type = type;
  if (type == "image" || type == "background") {
    this.image = new Image();
    this.image.src = color;
  }
  this.width = width;
  this.height = height;
  this.speedX = 0;
  this.speedY = 0;
  this.x = x;
  this.y = y;
  this.update = function () {
    ctx = myGameArea.context;
    if (this.type == "text") {
      ctx.font = this.width + " " + this.height;
      ctx.fillStyle = color;
      ctx.fillText(this.text, this.x, this.y);
    }
    if (type == "image" || type == "background") {
      ctx.drawImage(this.image,
        this.x,
        this.y,
        this.width, this.height);
      if (type == "background") {
        ctx.drawImage(this.image, this.x + this.width, this.y, this.width, this.height);
      }
    } else {
      ctx.fillStyle = color;
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
  }
  this.newPos = function () {
    this.x += this.speedX;
    this.y += this.speedY;
    if (this.type == "background") {
      if (this.x == -(this.width)) {
        this.x = 0;
      }
    }
  }
  this.crashWith = function (otherobj) {
    var myleft = this.x;
    var myright = this.x + (this.width);
    var mytop = this.y;
    var mybottom = this.y + (this.height);
    var otherleft = otherobj.x;
    var otherright = otherobj.x + (otherobj.width);
    var othertop = otherobj.y;
    var otherbottom = otherobj.y + (otherobj.height);
    var crash = true;
    if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
      crash = false;
    }
    return crash;
  }
}

// update game / loop
function updateGameArea() {
  var x, height, gap, minHeight, maxHeight, minGap, maxGap, type;
  for (i = 0; i < myObstacles.length; i += 1) {
    if (myGamePiece.crashWith(myObstacles[i])) {
      myGameArea.stop();
      return;
    }
  }
  myGameArea.clear();
  myGameArea.frameNo += 1;
  myBackground.speedX = -3;
  myBackground.newPos();
  myBackground.update();
  
  if (myGameArea.frameNo == 1 || everyinterval(45)) {
    x = myGameArea.canvas.width;  
    minHeight = 50;
    maxHeight = 200;
    height = Math.floor(Math.random() * (maxHeight - minHeight + 1) + minHeight);
    minGap = 60;
    maxGap = 170;
    gap = Math.floor(Math.random() * (maxGap - minGap + 1) + minGap);
    myObstacles.push(new component(50, height, "assets/img/obstacle-top.png", x, 0, "image"));
    myObstacles.push(new component(50, x - height - gap, "assets/img/obstacle-bottom.png", x, height + gap, "image"));
  }
  for (i = 0; i < myObstacles.length; i += 1) {
    myObstacles[i].speedX = -5;
    myObstacles[i].newPos();
    myObstacles[i].update();
  }
  myScore.text = "SCORE: " + (myObstacles.length / 2 - 2);  
  myScore.update();
  myGamePiece.newPos();
  myGamePiece.update();
}

function everyinterval(n) {
  if ((myGameArea.frameNo / n) % 1 == 0) {
    return true;
  }
  return false;
}

// controller key code
function key() {
  var text = event.key;
  if (text === "w" || text === "ArrowUp") {
    myGamePiece.speedY = -4;
  } else if (text === "s" || text === "ArrowDown") {
    myGamePiece.speedY = +4;
  }
}

function key2() {
  var text = event.key;
  if (text === "w" || text === "ArrowUp") {
    myGamePiece.speedY = 0;
  } else if (text === "s" || text === "ArrowDown") {
    myGamePiece.speedY = 0;
  }
}

// burron exit $ logout
function exit() {
  Swal.fire({
    title: 'Are you sure?',
    text: "Do you want to exit the game?",
    icon: 'warning',
    iconColor: "red",
    showCancelButton: true,
    confirmButtonColor: "rgb(72, 140, 241)",
    cancelButtonColor: 'rgb(241, 72, 72)',
    confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.reload();
    }
  })
}

function logout() {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    iconColor: "red",
    showCancelButton: true,
    confirmButtonColor: "rgb(72, 140, 241)",
    cancelButtonColor: 'rgb(241, 72, 72)',
    confirmButtonText: 'Yes'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href= 'logout.php';
    }
  })
}
