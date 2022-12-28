let imgs = document.querySelectorAll(".slider .img_container");
let box = document.querySelector(".slider > div");
let offset = imgs[0].clientWidth;
let box_width = offset * imgs.length;
let nav_imgs = document.querySelectorAll(".slider_nav .img_container");
let nav_box = document.querySelector(".slider_nav > div");
let nav_offset = nav_imgs[0].clientWidth + 15;
let nav_box_height = nav_offset * nav_imgs.length;
imgs[0].classList.add("current");
nav_imgs[0].classList.add("current");
//////////////////////////////////////////////////////////////////////////
//boxの幅を設定
box.setAttribute("style","width: " + box_width + "px");
//nextbtn
document.querySelector(".slider > .next").addEventListener("mouseover",(e)=>{
    let current = document.querySelector(".slider .current" );
    let index = [].slice.call(imgs).indexOf(current) + 1;
    if(index >= imgs.length){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
    }
    /////////////////////////
    let nav_current = document.querySelector(".slider_nav .current" );
    let nav_index = [].slice.call(nav_imgs).indexOf(nav_current) + 1;
    if(nav_index >= nav_imgs.length){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
    }
});
document.querySelector(".slider > .next").addEventListener("click",(e)=>{
    let current = document.querySelector(".slider .current" );
    let index = [].slice.call(imgs).indexOf(current) + 1;
    if(index >= imgs.length){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
        let distance = index * offset;
        box.setAttribute("style","transform: translateX(-" + distance + "px)");
        current.classList.remove("current");
        current.nextElementSibling.classList.add("current");
    }
    //////////////////////////
    let nav_current = document.querySelector(".slider_nav .current" );
    let nav_index = [].slice.call(nav_imgs).indexOf(nav_current) + 1;
    if(nav_index >= nav_imgs.length){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
        let distance = nav_index * nav_offset;
        nav_box.setAttribute("style","transform: translateY(-" + distance + "px)");
        nav_current.classList.remove("current");
        nav_current.nextElementSibling.classList.add("current");
    }
});
//previewbtn
document.querySelector(".slider > .prev").addEventListener("mouseover",(e)=>{
    let current = document.querySelector(".slider .current" );
    let index = [].slice.call(imgs).indexOf(current) + 1;
    if(index <= 1){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
    }
    ///////////
    let nav_current = document.querySelector(".slider_nav .current" );
    let nav_index = [].slice.call(nav_imgs).indexOf(nav_current) + 1;
    if(nav_index <= 1){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
    }
});
document.querySelector(".slider > .prev").addEventListener("click",(e)=>{
    let current = document.querySelector(".slider .current" );
    let index = [].slice.call(imgs).indexOf(current);
    if(index <= 0){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
        let distance = index * offset - offset;
        box.setAttribute("style","transform: translateX(-" + distance + "px)");
        current.classList.remove("current");
        current.previousElementSibling.classList.add("current");
    }
    ////////////
    let nav_current = document.querySelector(".slider_nav .current" );
    let nav_index = [].slice.call(nav_imgs).indexOf(nav_current);
    if(nav_index <= 0){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
        let distance = nav_index * nav_offset - nav_offset;
        nav_box.setAttribute("style","transform: translateY(-" + distance + "px)");
        nav_current.classList.remove("current");
        nav_current.previousElementSibling.classList.add("current");
    }
});
//////////////////////////////////////////////////////////////////////////////////////
//nav_boxの幅を設定
nav_box.setAttribute("style","height: " + nav_box_height + "px");
//nextbtn
document.querySelector(".slider_nav > .next").addEventListener("mouseover",(e)=>{
    let current = document.querySelector(".slider_nav .current" );
    let index = [].slice.call(nav_imgs).indexOf(current) + 1;
    if(index >= nav_imgs.length){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
    }
});
document.querySelector(".slider_nav > .next").addEventListener("click",(e)=>{
    let current = document.querySelector(".slider_nav .current" );
    let index = [].slice.call(nav_imgs).indexOf(current) + 1;
    if(index >= nav_imgs.length){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
        let distance = index * nav_offset;
        nav_box.setAttribute("style","transform: translateY(-" + distance + "px)");
        current.classList.remove("current");
        current.nextElementSibling.classList.add("current");
    }
});
//previewbtn
document.querySelector(".slider_nav > .prev").addEventListener("mouseover",(e)=>{
    let current = document.querySelector(".slider_nav .current" );
    let index = [].slice.call(nav_imgs).indexOf(current) + 1;
    if(index <= 1){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
    }
});
document.querySelector(".slider_nav > .prev").addEventListener("click",(e)=>{
    let current = document.querySelector(".slider_nav .current" );
    let index = [].slice.call(nav_imgs).indexOf(current);
    if(index <= 0){
        e.target.setAttribute("style","opacity:0; cursor: initial");
    }else{
        e.target.setAttribute("style","");
        let distance = index * nav_offset - nav_offset;
        nav_box.setAttribute("style","transform: translateY(-" + distance + "px)");
        current.classList.remove("current");
        current.previousElementSibling.classList.add("current");
    }
});
for (let i = 0; i < nav_imgs.length; i++) {
    nav_imgs[i].addEventListener("click",(e)=>{
        let index = [].slice.call(nav_imgs).indexOf(e.currentTarget);
        console.log(index);
        let distance = index * offset;
        box.setAttribute("style","transform: translateX(-" + distance + "px)");
        imgs[index].classList.remove("current");
        imgs[index].previousElementSibling.classList.add("current");
        ////
        distance = index * nav_offset;
        nav_box.setAttribute("style","transform: translateY(-" + distance + "px)");
        nav_imgs[index - 1].classList.remove("current");
        nav_imgs[index - 1].nextElementSibling.classList.add("current");
    });
};
///////////////////////////スライダーここまで///////////////////////
