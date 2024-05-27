// script.js

const box = document.getElementById('box');

// Function to toggle animation
function toggleAnimation() {
  if (box.style.animationPlayState === 'running') {
    box.style.animationPlayState = 'paused';
  } else {
    box.style.animationPlayState = 'running';
  }
}

// Call toggleAnimation function when the box is clicked
box.addEventListener('click', toggleAnimation);
