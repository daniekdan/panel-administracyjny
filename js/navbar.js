let element = document.getElementById("logo");
let list = document.getElementById("list")
let hide = false;
// console.log(element)
element.addEventListener('click', () => {
    if (window.innerWidth < 526) {
        list.classList.toggle("hide-li");
        
    }
});
