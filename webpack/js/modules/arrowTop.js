export default () => {
  const arrow_top = document.querySelector('.arrows-top-footer')
  arrow_top.addEventListener('click', () => {
    window.scrollTo(0, 0)
  })
}