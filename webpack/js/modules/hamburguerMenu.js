export default () => {
  const hamburguer_menu = document.querySelector('.hamburguer-menu')
  const container_menu = document.querySelector('.header-middle-mobile .header-middle-menu')

  hamburguer_menu.addEventListener('click', () => {
    container_menu.classList.toggle('active')
  })
}