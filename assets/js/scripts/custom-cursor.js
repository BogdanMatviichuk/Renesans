jQuery(function ($) {
  'use strict';
  const cursor = document.querySelector('.cursor');
  let showCustomCursor = document.querySelectorAll('.show-custom-cursor');

  let mouseX = null
  let mouseY = null

  document.addEventListener('mousemove', e => {
    mouseX = e.clientX
    mouseY = e.clientY
  })

  const render = () => {
    cursor.style.transform = `matrix(1, 0, 0, 1, ${mouseX}, ${mouseY})`;

    showCustomCursor.forEach(item => {
      item.addEventListener('mouseover', (e) => {
        cursor.classList.add('hover');
        if (e.target.classList.contains('default-cursor')) {
          cursor.classList.remove('hover');
        }
      });
      item.addEventListener('mouseleave', () => {
        cursor.classList.remove('hover');
      });

    })

    requestAnimationFrame(render)
  }

  render()
});