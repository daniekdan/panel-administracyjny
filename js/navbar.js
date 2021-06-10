var element = document.getElementById("logo");
var menu_list = document.getElementById("menu_list")
var hide = false;
// console.log(element)
element.addEventListener('click', () => {
    if (window.innerWidth < 526) {
        menu_list.classList.toggle("hide-li");
        
    }
});
