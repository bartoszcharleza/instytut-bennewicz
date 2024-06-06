document.addEventListener('DOMContentLoaded', function() {

    updateCartCount();  

    function updateCartCount() {
        var xhr = new XMLHttpRequest();   
        xhr.open('POST', ajaxurl, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = JSON.parse(xhr.responseText);
                document.querySelector('.cart span').textContent = response.count;   
            }
        };
        xhr.send('action=get_cart_count'); 
    }

    document.addEventListener('added_to_cart', updateCartCount);
    document.addEventListener('removed_from_cart', updateCartCount);
});
