const vo={
    name:"văn võ",
    age:22,
    address:{
        number:35,
        location:"hoài đức",
    }
}
const {
    name:myname,
    age,
    address:{
        number,
        location:{
            okdi,
        }
    }
}=vo;
let xuat_ok=document.querySelector(".ok").innerHTML=myname;
// =========================
var t=[6,7,4];
const [s1,s2]=["hey",55,9.3,11];

// const [a1,a2,...a3]=[5,77,88,65,2.6];
// let u1=a1;
// let u2=a2;
// console.log("1: "+u1);
function root(s1){
    return [s1,s2];
    function setroot(ss1){
        return [ss1,ss2];
    }
}
const [x,y]=root(5,"số 2");
console.log("số X: "+x);
setroot();
// +-+-+-+-+-++-++--+-+-+-++
let ok = (so1, so2) => {
  function io(s1) {
    return [s1];
  }
  return [so1, io(9)];
};
let [a1, a2, a3, a4] = ok(50);
a1 = a2;
console.log("Số a1 changed là: " + a1);//9