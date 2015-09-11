function GameManager(size, InputManager, Actuator, ScoreManager) {
  this.size         = size; // Size of the grid
  this.inputManager = new InputManager;
  this.scoreManager = new ScoreManager;
  this.actuator     = new Actuator;

  this.startTiles   = 1;

  this.inputManager.on("move", this.move.bind(this));
  this.inputManager.on("restart", this.restart.bind(this));
  this.inputManager.on("keepPlaying", this.keepPlaying.bind(this));

  this.setup();
}

// Restart the game
GameManager.prototype.restart = function () {

					var textosSegunFase = {
						2: 'iPhone 1',
						4: 'iPhone 3g',
						8: 'iPhone 3gs',
						16: 'iPhone 4',
						32: 'iPhone 4s',
						64: 'iPhone 5',
//						128: 'iPhone 5c',
						128: 'iPhone 5s',
						256: 'iPhone 6',
						512: " Upcoming iPhone 7",
						1024: 'Really!'
					};

					var iPhoneInfo = {
						2: ' When the iPhone was first released in markets on 29 June, 2007, it sold 1 million pieces in a mere 74 days.',
						4: 'The Apple CEO, Steve Jobs used the first iphone to make a public prank call, ordering 4,000 lattes from a nearby Starbucks. This prank is still repeated by Apple fans.',
						8: 'The iPhone was originally called codenamed Purple and the iPhone development wing in the Apple headquarters is called the ‘Purple Dorm’.',
						16: 'Although iPhones have had cameras since their inception, it was with the iPhone 4 model that the accompanying flash was introduced. ',
						32: 'After announcing that Siri would be included in the iPhone 4S, Apple removed Siri from all existing models. The voice of Siri is provided by a voice-over artist called Susan Bennett.',
						64: ' The iPhone 5 added an interesting feature that allows users to find out which flights are flying overhead the iPhone user at that moment ',
//						128: 'iPhone 5c',
						128: ' The iPhone 5S denoted an advancement of the iPhone from the usual colours of slat grey and white. This phone became available in gold, silver and space grey.',
						256: ' You can send audio messages and videos on the iPhone 6 that self-destruct. ',
						512: "Even We don't know",
						1024: 'Really!'
					};

	document.getElementById("tile-message").innerHTML="Interesting Facts about "+textosSegunFase[2]+" :";
	document.getElementById("tile-facts").innerHTML=iPhoneInfo[2];

  $( "#progressbar" ).progressbar({
    value: 10,
		max: 90
  });

//	var v	=	[2,4,8,16,32,64,128];						
//	for(var index=0;index<v.length; index++)
//			document.getElementById(v[index]).className="";

//	document.getElementById("2").className="current-game-image";			

  this.actuator.continueGame();
  this.setup();

};

// Keep playing after winning
GameManager.prototype.keepPlaying = function () {
  this.keepPlaying = true;
  this.actuator.continueGame();
};

GameManager.prototype.isGameTerminated = function () {
  return this.over || (this.won && !this.keepPlaying);
};

// Set up the game
GameManager.prototype.setup = function () {
  this.grid        = new Grid(this.size);

  this.score       = 0;
  this.maxTileValue = 0;
  this.over        = false;
  this.won         = false;
  this.keepPlaying = false;

  // Add the initial tiles
  this.addStartTiles();

  // Update the actuator
  this.actuate();
};

// Set up the initial tiles to start the game with
GameManager.prototype.addStartTiles = function () {
  for (var i = 0; i < this.startTiles; i++) {
    this.addRandomTile();
  }
};

// Adds a tile in a random position
GameManager.prototype.addRandomTile = function () {
  if (this.grid.cellsAvailable()) {
    var value = Math.random() < 0.9 ? 2 : 2;
    var tile = new Tile(this.grid.randomAvailableCell(), value);

    this.grid.insertTile(tile);
  }
};

// Sends the updated grid to the actuator
GameManager.prototype.actuate = function () {
  if (this.scoreManager.get() < this.score) {
    this.scoreManager.set(this.score);
  }

  this.actuator.actuate(this.grid, {
    score:      this.score,
    maxTileValue: this.maxTileValue,
    over:       this.over,
    won:        this.won,
    bestScore:  this.scoreManager.get(),
    terminated: this.isGameTerminated()
  });

};

// Save all tile positions and remove merger info
GameManager.prototype.prepareTiles = function () {
  this.grid.eachCell(function (x, y, tile) {
    if (tile) {
      tile.mergedFrom = null;
      tile.savePosition();
    }
  });
};

// Move a tile and its representation
GameManager.prototype.moveTile = function (tile, cell) {
  this.grid.cells[tile.x][tile.y] = null;
  this.grid.cells[cell.x][cell.y] = tile;
  tile.updatePosition(cell);
};

// Move tiles on the grid in the specified direction
GameManager.prototype.move = function (direction) {
  // 0: up, 1: right, 2:down, 3: left
  var self = this;

  if (this.isGameTerminated()) return; // Don't do anything if the game's over

  var cell, tile;

  var vector     = this.getVector(direction);
  var traversals = this.buildTraversals(vector);
  var moved      = false;

  // Save the current tile positions and remove merger information
  this.prepareTiles();

  // Traverse the grid in the right direction and move tiles
  traversals.x.forEach(function (x) {
    traversals.y.forEach(function (y) {
      cell = { x: x, y: y };
      tile = self.grid.cellContent(cell);

      if (tile) {
        var positions = self.findFarthestPosition(cell, vector);
        var next      = self.grid.cellContent(positions.next);

        // Only one merger per row traversal?
        if (next && next.value === tile.value && !next.mergedFrom) {
          var merged = new Tile(positions.next, tile.value * 2);
          merged.mergedFrom = [tile, next];

          self.grid.insertTile(merged);
          self.grid.removeTile(tile);

          // Converge the two tiles' positions
          tile.updatePosition(positions.next);

          // Update the score
          self.score += merged.value;
          self.maxTileValue = Math.max(merged.value, self.maxTileValue);

					var textosSegunFase = {
						2: 'iPhone 1',
						4: 'iPhone 3g',
						8: 'iPhone 3gs',
						16: 'iPhone 4',
						32: 'iPhone 4s',
						64: 'iPhone 5',
//						128: 'iPhone 5c',
						128: 'iPhone 5s',
						256: 'iPhone 6',
						512: "iPhone 6 Plus",
						1024: 'Really!'
					};

					var iPhoneInfo = {
						2: ' When the iPhone was first released in markets on 29 June, 2007, it sold 1 million pieces in a mere 74 days.',
						4: 'The Apple CEO, Steve Jobs used the first iphone to make a public prank call, ordering 4,000 lattes from a nearby Starbucks. This prank is still repeated by Apple fans.',
						8: 'The iPhone was originally called codenamed Purple and the iPhone development wing in the Apple headquarters is called the ‘Purple Dorm’.',
						16: 'Although iPhones have had cameras since their inception, it was with the iPhone 4 model that the accompanying flash was introduced. ',
						32: 'After announcing that Siri would be included in the iPhone 4S, Apple removed Siri from all existing models. The voice of Siri is provided by a voice-over artist called Susan Bennett.',
						64: ' The iPhone 5 added an interesting feature that allows users to find out which flights are flying overhead the iPhone user at that moment ',
//						128: 'iPhone 5c',
						128: ' The iPhone 5S denoted an advancement of the iPhone from the usual colours of slat grey and white. This phone became available in gold, silver and space grey.',
						256: ' You can send audio messages and videos on the iPhone 6 that self-destruct. ',
						512: "IT’S THE BIGGEST IPHONE EVER with A 1080P DISPLAY, 7.1mm thick DIMENSION, A NEW LANDSCAPE MODE, A ‘REACHABILITY’ GESTURE, A HUGE BATTERY, Optical Image Stabilisation.",
						1024: 'Really!'
					};

					var v	=	[2,4,8,16,32,64,128,256,512,1024];		

//					alert($.cookie("maxTileValue"));	

					if($.cookie("maxTileValue")!=self.maxTileValue){

							$.cookie("maxTileValue",self.maxTileValue);

							$.notify({
								// options
								message: "Congratulations! You've just unlocked "+textosSegunFase[self.maxTileValue]
							},{
								// settings
								type: 'info',
								newest_on_top: true,delay:1000,
								animate: 
								{
									enter: 'animated bounceInDown',
									exit: 'animated bounceOut'
								},										
											template: '<div id="wrapper"><div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert" id="notify-container">' +
														'<img data-notify="icon" class="img-circle pull-left">' +
														'<span data-notify="title">{1}</span>' +
														'<span data-notify="message">{2}</span>' +
													'</div></div>'
							});

					}


					document.getElementById("tile-message").innerHTML="Interesting Facts about "+textosSegunFase[self.maxTileValue]+" :";
					document.getElementById("tile-facts").innerHTML=iPhoneInfo[self.maxTileValue];

					$( "#progressbar" ).progressbar({
						value: (v.indexOf(self.maxTileValue)+1)*10
					});

					for(var index=0;index<v.length; index++){

						if(self.maxTileValue==v[index]){}else{
//							document.getElementById(v[index]).className="";												
						}

					}
//					document.getElementById(self.maxTileValue).className="current-game-image";					

					

          // The mighty 2048 tile
          if (merged.value === 512) self.won = true;

        } else {
          self.moveTile(tile, positions.farthest);
        }

        if (!self.positionsEqual(cell, tile)) {
          moved = true; // The tile moved from its original cell!
        }
      }
    });
  });

  if (moved) {
    this.addRandomTile();

    if (!this.movesAvailable()) {
      this.over = true; // Game over!
    }

    this.actuate();
  }
};

// Get the vector representing the chosen direction
GameManager.prototype.getVector = function (direction) {
  // Vectors representing tile movement
  var map = {
    0: { x: 0,  y: -1 }, // up
    1: { x: 1,  y: 0 },  // right
    2: { x: 0,  y: 1 },  // down
    3: { x: -1, y: 0 }   // left
  };

  return map[direction];
};

// Build a list of positions to traverse in the right order
GameManager.prototype.buildTraversals = function (vector) {
  var traversals = { x: [], y: [] };

  for (var pos = 0; pos < this.size; pos++) {
    traversals.x.push(pos);
    traversals.y.push(pos);
  }

  // Always traverse from the farthest cell in the chosen direction
  if (vector.x === 1) traversals.x = traversals.x.reverse();
  if (vector.y === 1) traversals.y = traversals.y.reverse();

  return traversals;
};

GameManager.prototype.findFarthestPosition = function (cell, vector) {
  var previous;

  // Progress towards the vector direction until an obstacle is found
  do {
    previous = cell;
    cell     = { x: previous.x + vector.x, y: previous.y + vector.y };
  } while (this.grid.withinBounds(cell) &&
           this.grid.cellAvailable(cell));

  return {
    farthest: previous,
    next: cell // Used to check if a merge is required
  };
};

GameManager.prototype.movesAvailable = function () {
  return this.grid.cellsAvailable() || this.tileMatchesAvailable();
};

// Check for available matches between tiles (more expensive check)
GameManager.prototype.tileMatchesAvailable = function () {
  var self = this;

  var tile;

  for (var x = 0; x < this.size; x++) {
    for (var y = 0; y < this.size; y++) {
      tile = this.grid.cellContent({ x: x, y: y });

      if (tile) {
        for (var direction = 0; direction < 4; direction++) {
          var vector = self.getVector(direction);
          var cell   = { x: x + vector.x, y: y + vector.y };

          var other  = self.grid.cellContent(cell);

          if (other && other.value === tile.value) {
            return true; // These two tiles can be merged
          }
        }
      }
    }
  }

  return false;
};

GameManager.prototype.positionsEqual = function (first, second) {
  return first.x === second.x && first.y === second.y;
};
