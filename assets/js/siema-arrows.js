class SiemaArrows extends Siema {
  addArrow(){
    // make buttons & append them inside Siema's container
      this.containerArrow = document.createElement('div')
      this.containerArrow.classList.add('arrows-container')

      this.prevSpan = document.createElement('span')
      this.prevSpan.classList.add('arrows','arrows-left', 'fa-stack')
      this.nextSpan = document.createElement('span')
      this.nextSpan.classList.add('arrows','arrows-right', 'fa-stack')

      this.nextCircle = document.createElement('i')
      this.nextCircle.classList.add('fas','fa-circle','fa-stack-2x','text-white')
      this.prevCircle = document.createElement('i')
      this.prevCircle.classList.add('fas','fa-circle','fa-stack-2x','text-white')

      this.prevArrow = document.createElement('i')
      this.prevArrow.classList.add('fas', 'fa-angle-left', 'text-black', 'fa-stack-1x')

      this.nextArrow = document.createElement('i')
      this.nextArrow.classList.add('fas', 'fa-angle-right', 'text-black', 'fa-stack-1x')


      this.prevSpan.appendChild(this.prevCircle)
      this.nextSpan.appendChild(this.nextCircle)
      this.prevSpan.appendChild(this.prevArrow)
      this.nextSpan.appendChild(this.nextArrow)

      this.containerArrow.appendChild(this.prevSpan)
      this.containerArrow.appendChild(this.nextSpan)

      this.selector.appendChild(this.containerArrow)
      
      // event handlers on buttons
      this.prevArrow.addEventListener('click', () => this.prev());
      this.nextArrow.addEventListener('click', () => this.next());
    }
}