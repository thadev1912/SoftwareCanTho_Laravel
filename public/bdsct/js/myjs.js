var img=document.getElementsByClassName('show');
var index=0;

function active()
    {
       for(i=0;i<img.length;i++)
               {
                    img[i].classList.remove('active');
               }
    }

      function next()
       {
          
          active();
          img[index].classList.add('active');
          index++;
          if(index==img.length)
            {
               index=0;
            }
          

       }
      
       setInterval(function next()
       {
          
          active();
          img[index].classList.add('active');
          index++;
          if(index==img.length)
            {
               index=0;
            }
          

       },3000)
      

     //Javascript counter
     
       