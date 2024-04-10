/* Kiểm tra số lượng người dùng nhập có phải là một số hay không */
function validateInputQty() {
    let inputQty = document.querySelector('.input-qty');
    let value = inputQty.value.trim();
    
    if(isNaN(value) || value === '' || value < 1) {
        alert("Vui lòng nhập vào số lượng hợp lệ");
        setTimeout(function() {
            inputQty.value = "";
            inputQty.focus();
        }, 0);
        return false;
    }
    else {
        inputQty.value = parseInt(value);
        updateQuantity(inputQty);
        return true;
    }

}

function updateQuantity(element) {
    //Lấy ô số lượng
    let inputQty = element.parentNode.querySelector('.input-qty');
    let qtyValue = parseInt(inputQty.value);

    //Lấy index của sản phẩm
    let productIndex = element.dataset.index;   //lấy giá trị của thuộc tính data-index
    
    //Tăng/ giảm số lượng
    if(element.classList.contains('minus') && (qtyValue > inputQty.min)) {
        qtyValue--;
    }
    else if(element.classList.contains('plus')) {
        qtyValue++;
    }

    //Cập nhật giá trị vào ô số lượng
    inputQty.value = qtyValue;

    //Gửi yêu cầu AJAX
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "../controller/cart.php",
            data: {
                pro_index: productIndex,
                quantity: qtyValue
            },
            success: function (response) {
                console.log(response);
                let data = JSON.parse(response);
                if(data.status == 'success') {
                    //Cập nhật tổng số sản phẩm trong giỏ và tổng tiền
                    $('.total-qty').text(data.totalQty);
                    $('.total-price').text(data.totalPrice); 
                }
            },
            // error: function(jqXHR, textStatus, errorThrown) {
            //     console.log(textStatus, errorThrown);
            // }
        });
    });
}
