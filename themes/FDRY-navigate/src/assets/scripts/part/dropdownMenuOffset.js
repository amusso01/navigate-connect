export default function dropdownMenuOffset() {
  const subMenus = document.querySelectorAll('#menu_main .sub-menu')
  const root = document.querySelector(":root")
  let left = '0px';

  subMenus.forEach(element => {
    left = element.getBoundingClientRect().left + 'px'
    root.style.setProperty("--pseudo-dropdown-left", '-' + left )
  });

}