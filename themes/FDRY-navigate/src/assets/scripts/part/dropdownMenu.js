export default function dropdownMenu() {
  const parent = document.querySelectorAll('.menu-item-has-children');

  let showDelay = 100, hideDelay = 300;
  let menuEnterTimer, menuLeaveTimer;


  parent.forEach((link)=>{
  
    link.addEventListener('mouseenter', (el)=>{
        clearTimeout(menuLeaveTimer);
        let submenu = link.querySelector('.sub-menu');
        for (let j = 0; j < parent.length; j++) {
            let innerEl = parent[j].querySelector('.sub-menu');
            if(parent[j]!==link){
              innerEl.classList.remove('open')
              parent[j].classList.remove('open')
            }
        }
        menuEnterTimer = setTimeout(function() {
          submenu.classList.add('open');
          link.classList.add('open');
        }, showDelay);
      
     
    })

    link.addEventListener('mouseleave', (el)=>{
        let submenu = link.querySelector('.sub-menu');
        clearTimeout(menuEnterTimer);
        menuLeaveTimer = setTimeout(function() {
            submenu.classList.remove('open')
            link.classList.remove('open')
        }, hideDelay);
  
    })
   
  })

}