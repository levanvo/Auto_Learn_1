import data from "./db.json" assert{type:"json"}
var a1=document.querySelector("#vo1");
var a2=document.querySelector("#vo2");
var moi=data.cellphones.filter(function(vo){
    return vo.specifications.name==data.cellphones[0].specifications.name;
})
var h="";
moi.forEach(function(k){
    h+=`
        <div>Xem Đây: ${k.name}</div>
        <div>
    <p class="text-xl my-3">Thông số kỹ thuật</p>
    <table>
        ${data.cellphones[0].specifications.map(function(info){
            return `
            <tr class="border-slate-300 border ">
                <td>${info.name}</td>
                <td class="px-5">${info.value}</td>
            </tr>
            `
            }).join("")
        }
    </table>
</div>
    `
})
a2.innerHTML=h;

var dau=`
    <div>
    <img src="${data.cellphones[0].images.base_url}">
    </div>
`

var cuoi=`
    <div>${ data.cellphones[0].categories.name}</div>
`