const  navHam = document.querySelector('.navbar-toggler')
const navItems = document.querySelector('.nav-item-div')
navHam.addEventListener('click' , function(e) {
  console.log('hello');
  navItems.classList.toggle('navbar-nav-click')
  })

  const prev = document.querySelector('.prev')
const next = document.querySelector('.next')
const indicators = document.querySelectorAll('.indicator')
const slides = document.querySelectorAll('.slide')
const slideDescription = document.querySelectorAll('.slide-description')
let timeoutID
let index = 0 ;
for (let i = 0; i < slides.length; i++) {
    if (slides[i].classList.contains("active")) {
        index = i
    } 
}

prev.addEventListener('click' , () => {
    slides[index].classList.remove("active");
    indicators[index].classList.remove("active");
    slideDescription[index].classList.remove("active");
    index--;
    console.log(index);
    if (index < 0) {
      index = slides.length - 1;
    }
    slides[index].classList.add("active");
    indicators[index].classList.add("active");
    slideDescription[index].classList.add("active");
    pauseTime()

})
next.addEventListener('click' , () => {
    slides[index].classList.remove('active')
    indicators[index].classList.remove('active')
    slideDescription[index].classList.remove('active')
    index++
    if(index == slides.length) {
        index = 0
    }
    slides[index].classList.add('active')
    indicators[index].classList.add('active')
    slideDescription[index].classList.add('active')
    pauseTime()
})

indicators.forEach( x => {
    x.addEventListener('click' , function() {
  let num;
      for (let i = 0; i < indicators.length; i++) {
        indicators[i].classList.remove("active");
        slides[i].classList.remove("active");
        slideDescription[i].classList.remove("active");
      }
      this.classList.add("active");
      console.log(this);
      for (let i =0; i < indicators.length; i++) {
        if (indicators[i].classList.contains("active")) {
         num = i;
        }
      }
      slides[num].classList.add("active");
      slideDescription[num].classList.add("active");
      index = num;
      pauseTime()
    })
})
let holo
function startTime() {
  timeoutID = setInterval(() => {
    slides[index].classList.remove('active')
    indicators[index].classList.remove('active')
    slideDescription[index].classList.remove('active')
    index++
    if(index == slides.length) {
        index = 0
    }
    slides[index].classList.add('active')
    indicators[index].classList.add('active')
    slideDescription[index].classList.add('active')
  }, 4000);
}
startTime()

function pauseTime() {
  if(timeoutID) {
    clearInterval(timeoutID)
    if(holo) {
      clearTimeout(holo)
    }
    holo = setTimeout(() => {
       startTime()
       console.log(holo);
    }, 1000);
  }
}


const sliderContainerPlus = document.querySelector('.sliderSlider-container-plus')
const prevSlider = document.querySelector('.prevSlider')
const nextSlider = document.querySelector('.nextSlider')
const slidesSlider = document.querySelectorAll('.slideSlider')

let timeoutSliderID
let indexSlider = 0 ;
for (let i = 0; i < slidesSlider.length; i++) {
    if (slidesSlider[i].classList.contains("active")) {
        indexSlider = i
    } 
}



sliderContainerPlus.addEventListener('mouseover' , () => {
  pauseTimeSlider()
})
sliderContainerPlus.addEventListener('mouseout' , () => {
  startTimeSlider()
})

let holoSlider
function startTimeSlider() {
  timeoutSliderID = setInterval(() => {
    slidesSlider[indexSlider].classList.remove('active')
    indexSlider++
    if(indexSlider == slidesSlider.length) {
        indexSlider = 0
    }
    slidesSlider[indexSlider].classList.add('active')
  }, 4000);
}
startTimeSlider()

function pauseTimeSlider() {
  if(timeoutSliderID) {
    clearInterval(timeoutSliderID)
    if(holoSlider) {
      clearTimeout(holoSlider)
    }
  
  }
}



const inputBox = document.querySelector('.input-box')
inputBox.addEventListener('mouseover' , () => {
  inputBox.setAttribute("placeholder" , "عبارتی وارد کنید")
})
inputBox.addEventListener('mouseout' , () => {
  inputBox.setAttribute("placeholder" , "")
  inputBox.value = ""
})



