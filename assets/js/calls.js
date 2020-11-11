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

    function validateCoupon(coupon) {
        $.ajax({
            type: 'POST',
            url:'includes/calls.php',
            data: {
                'validateCoupon' : 1,
                'coupon' : coupon
            },
            success: function (data) {
                // let selected = response['id'];
                console.log(data);
            }
        })
    }