    let cartTotal = 0;

    function addToCart(val) {
        let id = val[0];
        let price = val[1];
        cartTotal += price ;
        console.log('The price is : ' + val[1] + ' : New Total is ' + cartTotal + ' : ID is ' + id);

        $.ajax({
            type: 'POST',
            url:'includes/calls.php',
            data: {
                'addToCart' : 1,
                'id' : id
            },
            success: function (data) {
                // let selected = response['id'];
                console.log(data);
            }
        })
    }

    function validateCoupon(val) {
        console.log('Coupon : ' + val[0] + 'size is : ' + val[1] + 'Total is : ' + val[2]);
        let message;
        let coupon = val[0];
        let size = val[1];
        let total = val[2];
        $.ajax({
            type: 'POST',
            url:'includes/calls.php',
            data: {
                'validateCoupon' : 1,
                'coupon' : coupon,
                'cart_total' : total,
                'quantity' : size
            },
            success: function (data) {
                // let selected = response['id'];
                console.log(data);
                if (parseInt(data) === parseInt(total)){
                    message = 'Coupon can not be used with this order'
                }
                else {
                    message = 'Coupon discount applied successfully'
                    $('#cart_total').val(data);
                }
                alert(message);
            }
        })
    }