const canvas = document.getElementById('canvas');
	const ctx = canvas.getContext('2d');
	
canvas.width = 720;
canvas.height = 720;

// Load spritesheet
const spriteImage = new Image();
spriteImage.src = '/static/images/spritesheet.jpg';

// Define animation parameters
const spriteWidth = 720; // Width of each frame in the spritesheet
const spriteHeight = 720; // Height of each frame in the spritesheet
let frameIndex = 0; // Current frame index
let numFrames = 9; // Total number of frames in the spritesheet
const frameSpeed = 150; // Speed of animation (milliseconds per frame)
let animationInterval; // Interval ID for animation
let currentAnimation = null; // Variable to store the current animation

// Function to update the animation
function update(startFrame, endFrame) {
  // Clear canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw current frame
  ctx.drawImage(
    spriteImage,
    frameIndex * spriteWidth, // Source x-coordinate
    0, // Source y-coordinate
    spriteWidth, // Source width
    spriteHeight, // Source height
    0, // Destination x-coordinate
    0, // Destination y-coordinate
    spriteWidth, // Destination width
    spriteHeight // Destination height
  );

  // Move to the next frame
  frameIndex++;

  // If the current frame is the end frame, stop the animation
  if (frameIndex === endFrame + 1) {
    clearInterval(animationInterval);
    currentAnimation = null;
  }
}

// Function to start animation
function startAnimation(startFrame, endFrame) {
  frameIndex = startFrame;
  numFrames = endFrame - startFrame + 1;
  animationInterval = setInterval(function() {
    update(startFrame, endFrame);
  }, frameSpeed);
  currentAnimation = animationInterval; // Store the current animation
}

// Function to stop animation
function stopAnimation() {
  clearInterval(animationInterval);
  currentAnimation = null;
}

// CTA button hover event listeners
const ctaButton = document.getElementById('ctaButton');
ctaButton.addEventListener('mouseenter', function() {
  if (currentAnimation !== null) {
    stopAnimation(); // Stop the current animation if exists
  }
  startAnimation(0, 4); // Play frames 1 to 3 when hovering CTA button
});
ctaButton.addEventListener('mouseleave', function() {
  if (currentAnimation !== null) {
    stopAnimation(); // Stop the current animation if exists
  }
  // Show frame 4 when mouse leaves CTA button
  startAnimation(5, 8);
});

// Preload spritesheet
spriteImage.onload = function() {
  // Draw the initial state image on the canvas
  ctx.drawImage(
    spriteImage,
    0, // Source x-coordinate for initial state image
    0, // Source y-coordinate
    spriteWidth, // Source width
    spriteHeight, // Source height
    0, // Destination x-coordinate
    0, // Destination y-coordinate
    spriteWidth, // Destination width
    spriteHeight // Destination height
  );
};