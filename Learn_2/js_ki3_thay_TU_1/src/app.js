import data from '../db.json' assert{type:'json'}
console.log(data)
var content = document.querySelector('#content')
var product = document.querySelector('#product')
var listproduct = data.cellphones.filter(function(phone){
return phone.categories.name == data.cellphones[0].categories.name;
})
var _product = '';
listproduct.forEach(function(ph){
_product = _product + `
    <div>
        <div>
            <img src="${ph.images.base_url}" alt="">
        </div>

        <div>
            <p>${ph.name}</p>
            <div>
                <span class="">1.490.000 ₫</span>
                <span>${ph.sale_price} ₫</span>
            </div>
        </div>
    </div>
`
})

product.innerHTML = _product
var _content = `
<div>
    <div>
        <img src="${data.cellphones[0].images.base_url}" alt="">
    </div>

    <div class="flex my-3">
        <img class="max-h-20" src="./img/Rectangle (1).png" alt="">
        <img class="max-h-20" src="./img/Rectangle (1).png" alt="">
        <img class="max-h-20" src="./img/Rectangle (1).png" alt="">
        <img class="max-h-20" src="./img/Rectangle (1).png" alt="">
        <img class="max-h-20" src="./img/Rectangle (1).png" alt="">
    </div>
</div>

<div class="">
    <p class="text-xl my-2"><del>${data.cellphones[0].name}</del></p>
    <div class="">
        <span class="text-xl">11.690.000 ₫</span>
        <span>${data.cellphones[0].sale_price} ₫</span>
    </div>
    <p>Chọn màu để xem giá và chi nhánh có hàng</p>
    <div class="flex my-2">
        <div class=" border-slate-300 border rounded p-1">
            <p>Trắng</p>
            <p>11.690.000 ₫</p>
        </div>

        <div class="flex ml-2 border-slate-300 border rounded p-1">
            <img class="max-h-10" src="./img/Rectangle (1).png" alt="">
            <div>
                <p>Trắng</p>
                <p>11.690.000 ₫</p>
            </div>
        </div>

        <div class="flex ml-2 border-slate-300 border rounded p-1">
            <img class="max-h-10" src="./img/Rectangle (1).png" alt="">
            <div>
                <p>Trắng</p>
                <p>11.690.000 ₫</p>
            </div>
        </div>
    </div>

    <div>
        <div class="bg-rose-300 p-2">
            <i class="fa-solid fa-gift"></i>
            Khuyến Mãi
        </div>

        <div class="border-rose-400 border p-2">
            <p>Combo 02 Mã ưu đãi CGV trị giá 200.000đ</p>
            <p>Tặng gói bảo hành Samsung Care+ 12 tháng trị giá 1.099.000đ (Từ 01/06-15/06)</p>
            <p>Giảm thêm 1.500.000đ khi thu cũ đổi mới</p>
            <p>Nhận thêm khuyến mãi sau:</p>
            <p>Thu cũ đổi mới - Trợ giá đến 300.000đ</p>
        </div>
    </div>

    <div class="w-full flex my-2">
        <div class="bg-blue-400 w-1/2 p-1 rounded text-center">
            <p>TRẢ GÓP</p>
            <p>(Xét duyệt qua điện thoại)</p>
        </div>
        <div class="bg-blue-400 w-1/2 p-1 rounded text-center ml-2">
            <p>TRẢ GÓP</p>
            <p>(Xét duyệt qua điện thoại)</p>
        </div>
    </div>

    <div>
        <div class="bg-slate-300 p-2">
            <i class="fa-solid fa-gift"></i>
            Khuyến Mãi
        </div>

        <div class="border-slate-400 border p-2">
            <p>Giảm thêm tới 1% cho thành viên Smember (áp dụng tùy sản phẩm)</p>
            <p>Mở thẻ tín dụng Citibank - Nhận e-voucher tới 2 triệu</p>
            <p>Nhập mã KVCPS - Giảm thêm 5% (tối đa 250.000đ) khi thanh toán qua Kredivo cho đơn hàng từ 500.000đ</p>
            <p>Nhận thêm khuyến mãi sau:</p>
            <p>Thu cũ đổi mới - Trợ giá đến 300.000đ</p>
        </div>
    </div>
</div>

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
        }).join("")}

    </table>
</div>
`
content.innerHTML = _content