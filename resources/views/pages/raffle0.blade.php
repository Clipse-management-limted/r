<!--
    Winhweel.js pins and sound example by Douglas McKechie @ www.dougtesting.net
    See website for tutorials and other documentation.

    The MIT License (MIT)

    Copyright (c) 2018 Douglas McKechie

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.

    ============================================================================
    Note:
        Tick Sound was recorded by DeepFrozenApps and was downloaded from http://soundbible.com/2044-Tick.html
        It has an attribution 3.0 licence.
-->
<html>
    <head>
        <title>HTML5 Canvas Winning Wheel</title>
        <link rel="stylesheet" href="main.css" type="text/css" />
          <script src="{{ asset('js2/jquery.min.js') }}"></script>
        <script type="text/javascript" src="../../Winwheel.js"></script>
        <script src="{{ asset('js/TweenMax.min.js') }}"></script>
        <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script> -->
    </head>
    <body>
        <div align="center">

            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                      <div style="padding: ">
                        <div class="power_controls">
                        <span class="danger">
                          <div id="mydiv" style="background-color:lightblue;font-size:30px;">   </div>
                        </span>
                            <br />
                            <br />
                            <table class="power" cellpadding="10" cellspacing="0">
                                <tr>
                                    <th align="center">Power</th>
                                </tr>
                                <tr>
                                    <td hidden width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                                </tr>
                                <tr>
                                    <td hidden align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                                </tr>
                                <tr>
                                    <td hidden align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                                </tr>
                            </table>
                            <br />
                            <img id="spin_button" src="spin_off.png" alt="Spin" onClick="startSpin();" />
                            <br /><br />
                            &nbsp;&nbsp;<a href="#" onClick="resetWheel(); return false;">Play Again</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(reset)
                        </div>

                      </div>
                    </td>
                    <td width="438" height="582" class="the_wheel" align="center" valign="center">
                        <canvas id="canvas" width="434" height="434">
                            <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                        </canvas>
                    </td>
                </tr>
            </table>
        </div>
        <script>
          shuffle();
            // Create new wheel object specifying the parameters at creation time.
            const theWheel = new Winwheel({
                'numSegments'  : 20,     // Specify number of segments.
                'outerRadius'  : 212,   // Set outer radius so wheel fits inside the background.
                'textFontSize' : 28,    // Set font size as desired.
                'segments'     :        // Define segments including colour and text.
                [
                    // {'fillStyle' : '#eae56f', 'text' : 'Prize 1'},
                   // {'fillStyle' : '#89f26e', 'text' : 'Prize 2'},
                   // {'fillStyle' : '#7de6ef', 'text' : 'Prize 3'},
                   // {'fillStyle' : '#e7706f', 'text' : 'Prize 4'},
                   // {'fillStyle' : '#eae56f', 'text' : 'Prize 5'},
                   // {'fillStyle' : '#89f26e', 'text' : 'Prize 6'},
                   // {'fillStyle' : '#7de6ef', 'text' : 'Prize 7'},
                   // {'fillStyle' : '#e7706f', 'text' : 'Prize 8'}
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 15,
                    'spins'    : 8,
                    'callbackFinished' : alertPrize,
                    'callbackSound'    : playSound,   // Function to call when the tick sound is to be triggered.
                    'soundTrigger'     : 'pin'        // Specify pins are to trigger the sound, the other option is 'segment'.
                },
                'pins' :
                {
                    'number' : 16   // Number of pins. They space evenly around the wheel.
                }
            });

            function addSegment(text, index)
{
    // Use a date object to set the text of each added segment to the current minutes:seconds
    // (just to give each new segment a different label).

    // The Second parameter in the call to addSegment specifies the position,
    // in this case 1 meaning the new segment goes at the start of the wheel.
    theWheel.addSegment({
        text,
        'fillStyle' : 'orange'
    }, 1);


    // The draw method of the wheel object must be called in order for the changes
    // to be rendered.
    theWheel.draw();
}

function deleteSegment()
{
    // Call function to remove a segment from the wheel, by default the last one will be
    // removed; you can pass in the number of the segment to delete if desired.
    theWheel.deleteSegment();

    // The draw method of the wheel object must be called to render the changes.
    theWheel.draw();
}

            // -----------------------------------------------------------------
            // This function is called when the segment under the prize pointer changes
            // we can play a small tick sound here like you would expect on real prizewheels.
            // -----------------------------------------------------------------
            let audio = new Audio('tick.mp3');  // Create audio object and load tick.mp3 file.

            function playSound()
            {
                // Stop and rewind the sound if it already happens to be playing.
                audio.pause();
                audio.currentTime = 0;

                // Play the sound.
                audio.play();
            }
              let winaudio = new Audio('sounds/Buzzer-SoundBible.com-188422102.mp3');  // Create audio object and load tick.mp3 file.
            function playWinSound()
            {
                // Stop and rewind the sound if it already happens to be playing.
                winaudio.pause();
                winaudio.currentTime = 0;

                // Play the sound.
                winaudio.play();
            }

            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters
            // note the indicated segment is passed in as a parmeter as 99% of the time you will want to know this to inform the user of their prize.
            // -------------------------------------------------------
            function alertPrize(indicatedSegment)
            {
              playWinSound();
                // Do basic alert of the segment text.
                // You would probably want to do something more interesting with this information.
                var content =  setWon(indicatedSegment.text);

              //  alert("You have won " + indicatedSegment.text);
                  console.log("You have won " + indicatedSegment.text);
                 $('#mydiv').html("Ticket Number " + indicatedSegment.text + " You have won " );
                    // var content ="You have won " + indicatedSegment.text;
                    // document.getElementById('#mydiv').innerHTML = content;
            }

            function setWon(key)  {
                fetch(`/won?key=${key}`)
                .then((data) => data.json())
                .then((data) => {
                })
            }

            // =======================================================================================================================
            // Code below for the power controls etc which is entirely optional. You can spin the wheel simply by
            // calling theWheel.startAnimation();
            // =======================================================================================================================
            let wheelPower    = 0;
            let wheelSpinning = false;

            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false) {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";

                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1) {
                        document.getElementById('pw1').className = "pw1";
                    }

                    if (powerLevel >= 2) {
                        document.getElementById('pw2').className = "pw2";
                    }

                    if (powerLevel >= 3) {
                        document.getElementById('pw3').className = "pw3";
                    }

                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;

                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }



            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false) {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1) {
                        theWheel.animation.spins = 3;
                    } else if (wheelPower == 2) {
                        theWheel.animation.spins = 8;
                    } else if (wheelPower == 3) {
                        theWheel.animation.spins = 15;
                    }

                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "spin_off.png";
                    document.getElementById('spin_button').className = "";

                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();

                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                      shuffle();


                }
            }

            function shuffle() {
      fetch('/lucks')
      .then((data) => data.json())
      .then((data) => {
        for (var i = 0; i < 19; i++) {
          deleteSegment()
        }
        data.map(({qr_code}, index) => {
          addSegment(qr_code, index+1)
        })
      })
    }

            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.

                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";

                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
                  shuffle();
            }
        </script>
    </body>
</html>
