//  Select DOM Items
const menuBtn = document.querySelector(".menu-btn");
const menu = document.querySelector(".menu");
const menuNav = document.querySelector(".menu-nav");
const navItems = document.querySelectorAll(".nav-item");
const navlinks = document.querySelectorAll(".nav-link");

// set initial state of MENU
let showMenu = false;

menuBtn?.addEventListener("click", toggleMenu);

function toggleMenu() {
  if (!showMenu) {
    menuBtn.classList.add("close");
    menu.classList.add("show");
    menuNav.classList.add("show");
    navItems.forEach((navItem) => navItem.classList.add("show"));

    //  set menu state
    showMenu = true;
  } else {
    menuBtn.classList.remove("close");
    menu.classList.remove("show");
    menuNav.classList.remove("show");
    // menuBranding.classList.remove("show");
    navItems.forEach((navItem) => navItem.classList.remove("show"));

    //  set menu state
    showMenu = false;
  }
}

navlinks.forEach((navLink) => {
  navLink.addEventListener("click", () => {
      menuNav.querySelector(".current").classList.remove("current")

      navLink.classList.add("current")
    })
})



const iconSearchs = document.querySelectorAll(".search i");
const inputSearchs = document.querySelectorAll(".search .search-input");

iconSearchs.forEach(icon =>{

  icon.addEventListener("click", showSearchInput);
})
// console.log(inputSearch);

function showSearchInput(){
  inputSearchs.forEach(input =>{
    input.classList.add("show");
    iconSearch.classList.add("icon");
    
  })
}


var swiper = new Swiper('.swiper-container', {
  slidesPerView: 1,
  loop: true,
 
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

  // change nav when scroll
  const nav = document.querySelector("header");
  const menuContainer = document.querySelector(".menu-container");
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 30) {
      nav.classList.add("nav__scroll");
      menuContainer.classList.add("show")
    } else {
      nav.classList.remove("nav__scroll");
      menuContainer.classList.remove("show")
    }
  });




var swiper = new Swiper('.swiper-container', {
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});


// show button to top by add class active
const toTop = document.querySelector(".scrolltop");

window.addEventListener("scroll", () => {
  if (window.pageYOffset > 400) {
    toTop.classList.add("active");
  } else {
    toTop.classList.remove("active");
  }
});


// swiper 2
var swiper = new Swiper('.slider-container .swiper-container', {
  slidesPerView: 3,
  spaceBetween: 30,
  slidesPerGroup: 3,
  // loopFillGroupWithBlank: true,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      spaceBetween: 60,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    350: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
    300: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
  },
});