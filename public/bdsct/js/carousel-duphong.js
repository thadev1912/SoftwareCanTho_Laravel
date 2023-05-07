//decalre varible from html 
const galleryContainer = document.querySelector('.gallery-container'); 
const galleryControlsContainer = document.querySelector('.gallery-controls');
const galleryControls = ['KếTiếp','VềTrước'];
const galleryItems = document.querySelectorAll('.gallery-item');

// create class carousel for progam
class Carousel {
                   constructor(container, items, controls)/* this constructor are 3 paramater insert to*/ 
                  {
                          this.carouselContainer = container;
                          this.carouselControls = controls;
                          this.carouselArray = [...items]; /* declare array item */
                          
                          this.myslide= setInterval(this.autoslide.bind(this),2000);
                  }
                     autoslide()
                  {
                    this.carouselArray.push(this.carouselArray.shift());
                    this.updateGallery();
                  }
                  
  // Update css classes for gallery
  //let's launch program
  
  updateGallery() {
             this.carouselArray.forEach(el =>
                 {      //call proptery for carousel array,then remove all and add all right now!!
                        el.classList.remove('gallery-item-1');
                        el.classList.remove('gallery-item-2');
                        el.classList.remove('gallery-item-3');
                        el.classList.remove('gallery-item-4');
                        el.classList.remove('gallery-item-5');
                      
                });

                       this.carouselArray.slice(0, 5).forEach((el, i) => 
                        {
                                 el.classList.add(`gallery-item-${i+1}`);
                        });
                       
                   }
   // part important
  // Update the current order of the carouselArray and gallery
  //Setup auto slide for this programs

  

setauto()
{
  this.carouselArray.push(this.carouselArray.shift());
  this.updateGallery();
}

  
   
  

  
  setCurrentState(direction) 
             {

                       if (direction.className == 'gallery-controls-VềTrước') 
                       {
                              this.carouselArray.unshift(this.carouselArray.pop());
                       }
                        else
                         {
                              this.carouselArray.push(this.carouselArray.shift());
                         }
                              clearInterval(this.myslide);
                              this.updateGallery();
                             this.myslide= setInterval(this.autoslide.bind(this),3000);
                }



  // create code event listener for this programs

  useControls() 
                {
                      const triggers = [...galleryControlsContainer.childNodes]; //create varible triiger to get array "control_cointerner "
                      triggers.forEach(control => {
                                   control.addEventListener('click', e =>
                         {
                                               e.preventDefault();                      
                                              this.setCurrentState(control);
                        });
                                                });
              }  
            }
//main code 

const exampleCarousel = new Carousel(galleryContainer, galleryItems, galleryControls);
exampleCarousel.setControls();    
exampleCarousel.useControls(); 
exampleCarousel.autoslide();




