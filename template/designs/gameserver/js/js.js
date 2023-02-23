let wrapper = document.querySelector(".top-players__wrapper");

wrapper.onclick = function(evt) {
  let target = evt.target;
  let table = evt.target.closest(".top-players__table");
  if (!target.classList.contains("top-players__stat")) return;
  for (button of table.querySelectorAll("button.top-players__stat")) {
    button.classList.remove("top-players__stat_active");
  }
  target.classList.add('top-players__stat_active');
  if (target.classList.contains("top-players__stat-pvp")) {
    table.querySelector(".top-players__list-pvp").classList.add("top-players__list_active");
    table.querySelector(".top-players__list-pk").classList.remove("top-players__list_active");
  }
  if (target.classList.contains("top-players__stat-pk")) {
    table.querySelector(".top-players__list-pk").classList.add("top-players__list_active");
    table.querySelector(".top-players__list-pvp").classList.remove("top-players__list_active");
  }
};

const menuButton = document.querySelector('.menu-span');
const menuLink = document.querySelector('.page-header__button-menu');
const navList = document.querySelector('.page-header__nav-list');

menuLink.onclick = () => {
  menuButton.classList.toggle('active');
  if (navList.classList.contains('list_none')) {
    navList.classList.toggle('list_none');
    setTimeout(function() {
      navList.classList.toggle('list_active');
    }, 10);
  } else {
    navList.classList.toggle('list_active');
    setTimeout(function() {  
    navList.classList.toggle('list_none');
  }, 300);
  }
};