document.addEventListener('DOMContentLoaded', () => {
  const ACTIVE_CLASS = 'is-active';
  const menuWrapper = document.querySelector('.main-menu-wrapper');
  const menu = document.querySelector('.main-navigation');
  const burgerBtn = document.querySelector('.burger-toggle-btn');

  const toggleActive = () => {
    menu.classList.toggle(ACTIVE_CLASS);
    burgerBtn.classList.toggle(ACTIVE_CLASS);
  }

  const closeBurgerOnOutsideClick = (event) => {
    if (!menuWrapper.contains(event.target)) {
      menu.classList.remove(ACTIVE_CLASS);
      burgerBtn.classList.remove(ACTIVE_CLASS);
    }
  }

  burgerBtn.addEventListener('click', toggleActive);
  document.addEventListener('click', closeBurgerOnOutsideClick);
});

document.addEventListener('DOMContentLoaded', () => {
  const swiper = new Swiper('.carousel-js', {
    loop: true,
    autoHeight: true,
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

});

document.querySelectorAll('.cards-button').forEach(button => {
  button.addEventListener('click', function () {
    const petId = this.getAttribute('data-id');
    document.getElementById('hiddenInput').value = petId;
    document.getElementById('hiddenForm').submit();
  });
});

