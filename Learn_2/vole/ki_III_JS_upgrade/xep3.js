import data from "./db.json" assert{type:"json"};
var t1=document.querySelector("#vo2");
var t2=document.querySelector("#vo1");
// var t3=data.cellphones.filter(function(h){
//     return h.specifications.name==data.cellphones[0].specifications.name;
// })
var t4=data.cellphones.filter(function(h2){
    return h2.specifications.name==data.cellphones[0].specifications.name;
})

var a1=`
    <h1>${data.cellphones[0].name}</h1>
`;
t1.innerHTML=a1;

var a2="";
    t4.forEach(function(x){
        a2=`
        ${x.name} + 
        ${x.code}
        <br>
        ${data.cellphones[0].specifications.map(function(g){
            return `
                ${g.name}:${g.value};<br>
            `;
        }).join("")}
    `;
    })
    
t2.innerHTML=a2;
// t2.innerHTML=a2;