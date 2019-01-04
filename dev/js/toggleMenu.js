export default function () {
  const spNav = document.getElementsByClassName('headerSpNav')[0];
  const btn = document.getElementById('menuToggle');

  btn.addEventListener('click', () => {
    if (spNav.classList.contains('active')) {
      spNav.className =  'headerSpNav';
    } else {
      spNav.className =  'headerSpNav active';
    }

    if (btn.classList.contains('active')) {
      btn.className =  'headerSpNav_btn';
    } else {
      btn.className =  'headerSpNav_btn active';
    }
  })
}
