/*
!(i) 
Код попадает в итоговый файл, только когда вызвана функция, например FLSFunctions.spollers();
Или когда импортирован весь файл, например import "files/script.js";
Неиспользуемый (не вызванный) код в итоговый файл не попадает.

Если мы хотим добавить модуль следует его расскоментировать
*/
import {
  isWebp,
  headerFixed,
  togglePopupWindows,
  addTouchClass,
  addLoadedClass,
  menuInit,
} from './modules'
/* Раскомментировать для использования */
// import { MousePRLX } from './libs/parallaxMouse'

/* Раскомментировать для использования */
// import AOS from 'aos'

/* Раскомментировать для использования */
// import Swiper, { Navigation, Pagination } from 'swiper'

// Включить/выключить FLS (Full Logging System) (в работе)
window['FLS'] = true

/* Проверка поддержки webp, добавление класса webp или no-webp для HTML
! (i) необходимо для корректного отображения webp из css 
*/
isWebp()
/* Добавление класса touch для HTML если браузер мобильный */
/* Раскомментировать для использования */
// addTouchClass();
/* Добавление loaded для HTML после полной загрузки страницы */
/* Раскомментировать для использования */
// addLoadedClass();
/* Модуль для работы с меню (Бургер) */
/* Раскомментировать для использования */
// menuInit()

/* Библиотека для анимаций ===============================================================================
 *  документация: https://michalsnik.github.io/aos
 */
// AOS.init();
// =======================================================================================================

// Паралакс мышей ========================================================================================
// const mousePrlx = new MousePRLX({})
// =======================================================================================================

// Фиксированный header ==================================================================================
// headerFixed()
// =======================================================================================================

/* Открытие/закрытие модальных окон ======================================================================
* Чтобы модальное окно открывалось и закрывалось
* На окно повешай атрибут data-type="<название окна>"
* И на кнопку, которая вызывает окно так же повешай атрибут data-type="<название окна>"

* На обертку(враппер) окна добавь класс _overlay-bg
* На кнопку для закрытия окна добавь класс button-close
*/
/* Раскомментировать для использования */
// togglePopupWindows()
// =======================================================================================================
// Отправка данных на сервер

function send(event, php) {
  console.log("Sending a request");
  event.preventDefault ? event.preventDefault() : event.returnValue = false;
  var req = new XMLHttpRequest();
  req.open('POST', php, true);
  req.onload = function () {
    if (req.status >= 200 && req.status < 400) {
      json = JSON.parse(this.response); //
      console.log(json);

      // ЗДЕСЬ УКАЗЫВАЕМ ДЕЙСТВИЯ В СЛУЧАЕ УСПЕХА ИЛИ НЕУДАЧИ
      if (json.result == "success") {
        // Если сообщение отправлено
        document.querySelector('.send-modal').classList.add("active");;
        document.querySelector('body').classList.add("fixed");;
      } else {
        // Если произошла ошибка
        alert("Error. The message has not been sent");
      }
      // Если не удалось связаться с php файлом
    } else { alert("Server error. Number:" + req.status); }
  };

  // Если не удалось отправить запрос. Стоит блок на хостинге
  req.onerror = function () { alert("Request sending error"); };
  req.send(new FormData(event.target));
}
const burgerBtn = document.querySelector('.burger-btn');
const navMenu = document.querySelector('.navmenu .navigation');
const navLinks = document.querySelectorAll('.nav-link');
const btnDemos = document.querySelectorAll('.btn-demo');
const btnDones = document.querySelectorAll('.done-btn');
const letsBtn = document.querySelectorAll('.lets');
const letsModal = document.querySelector('.lets-modal');
const bodyItem = document.querySelector('body');
const btnClose = document.querySelectorAll('.btn-close');
const sendModal = document.querySelector('.send-modal');
const btnReload = document.querySelector('.send-modal .send-modal__body .done-btn');
function closeMenu() {
  burgerBtn.classList.remove("active");
  navMenu.classList.remove("active");
  return;
}
burgerBtn.addEventListener('click', function () {
  if (navMenu.classList.contains("active")) {
    closeMenu();
  } else {
    burgerBtn.classList.add("active");
    navMenu.classList.add("active");
  }
});
navLinks.forEach(function (navLink) {
  navLink.onclick = function () {
    closeMenu();
  }
});
// navLink.addEventListener('click', function () {
//   burgerBtn.classList.remove("active");
//   navMenu.classList.remove("active");
// });
btnDemos.forEach(function (btnDemo) {
  btnDemo.onclick = function () {
    closeMenu();
  }
});

btnDones.forEach(function (btnDone) {
  btnDone.onclick = function () {
    closeMenu();
  }
});
letsBtn.forEach(function (letBtn) {
  letBtn.onclick = function () {
    letsModal.classList.add("active");
    bodyItem.classList.add("fixed");
  }
});

btnClose.forEach(function (btnCloseFun) {
  btnCloseFun.onclick = function () {
    letsModal.classList.remove("active");
    bodyItem.classList.remove("fixed");
    sendModal.classList.remove("active");
  }
});
btnReload.addEventListener('click', function () {
  location.reload()
});
