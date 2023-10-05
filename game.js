const buttonColours = ["red","blue","green","yellow"];
var gamePattern = [];
var userClickedPattern = [];

var started = false;
var level = 0;
var userIndex;


$(document).keypress(function() {
  if (!started) {
    $("#level-title").text("Level " + level);
    nextSequence();
    started = true;
  }
});


function nextSequence(){
    userClickedPattern = [];
    userIndex=-1;
    level++;
    $("#level-title").html("Level " + level);  

    var randomNumber = (Math.floor(4 * Math.random()));
    const randomChosenColour = buttonColours[randomNumber];
    gamePattern.push(randomChosenColour);
    playSound(randomChosenColour);
    console.log(gamePattern);
}
  

$(".btn").click(function(event){
    userIndex++;
    handler($(this).attr('id'));
});

  
function handler(event){
    var userChosenColour = event;
    userClickedPattern.push(userChosenColour);
    animatePress($(this).attr('id'));
    playSound(userChosenColour);

    if(userClickedPattern[userIndex] != gamePattern [userIndex]){
        playSound("wrong");
        $("body").addClass("game-over");
        setTimeout(function () {
            $("body").removeClass("game-over");
        }, 200);

        $("#level-title").html("Game over! Press Any key to start over!");  
        startOver();
    }else{
        if(userIndex + 1 == gamePattern.length){
            setTimeout(nextSequence,1000);
        }
    }
    
}

function playSound(key){
    $("#" + key).fadeOut(100).fadeIn(100);
    var audio = new Audio("sounds/" + key + ".mp3");
    audio.play();
}

function animatePress(currentColor){
    $("#" + currentColor).addClass("pressed");
    setTimeout(function(){$("#" + currentColor).removeClass("pressed")} , 100);
}


function startOver() {
    if (level > high_score) {
        high_score = level;

        $.ajax({
            type: "POST",
            url: "high_score.php", // Replace with the actual URL of your PHP script
            data: { high_score: high_score },
            success: function(response) {
                console.log("High_score set in database");
            },
            error: function() {
                console.log("Couldn't set High_score in database");
            }
        });
    }
    level = 0;
    gamePattern = [];
    started = false;
    $("#high-score").text("High Score: " + high_score);
}