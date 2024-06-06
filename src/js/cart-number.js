document.addEventListener('DOMContentLoaded', function() {
    function updateCartCount() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', cart_count_params.ajax_url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success && response.data.count !== undefined) {
                    document.querySelector('.cart span').textContent = response.data.count;
                }
            }
        };
        xhr.send('action=update_cart_count');
    }

    document.body.addEventListener('added_to_cart', updateCartCount);
    document.body.addEventListener('removed_from_cart', updateCartCount);

    // Initial call to update cart count
    updateCartCount();
});
