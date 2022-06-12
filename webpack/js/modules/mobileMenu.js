export default () => {

  const menu_drop = document.querySelectorAll('.header-middle-mobile .menu-item-has-children>a')
  const container_menu_drop = document.querySelectorAll('.header-middle-mobile .menu-item-has-children .sub-menu')

  menu_drop.forEach((item, index) => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      container_menu_drop[index].classList.toggle('active')
    })
  })

}