import data from "../semi.json" assert{type:"json"}
var tiu=new URLSearchParams(location.search)
var hi=tiu.get('id')
var xem=data.filter(function(mo){
    return mo.id==hi;
})
xem=xem[0];
var ki=document.querySelector("#vo2")
var êu=/*html*/`
    <h1 class="text-center animate__animated animate__infinite animate__rubberBand">ALL CONTENT</h1>
    <img class="w-[888px] h-[444px] mx-auto animate__animated animate__infinite animate__flash" src="${xem.images.base_url}">
    <hr>
    ${xem.description}
    <hr>
    <img src="https://picsum.photos/800/400">
`
ki.innerHTML=êu;