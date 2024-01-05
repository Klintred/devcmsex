$(document).ready(function () {
    $('#sort-by').change(function () {
        var sortBy = $(this).val();
        sortProducts(sortBy);
    });

    function sortProducts(sortBy) {
        var $productsContainer = $('.allProducts');
        var $products = $productsContainer.find('.products');

        $products.sort(function (a, b) {
            var priceA = parseFloat($(a).find('.product-price').text().replace('€', '').trim());
            var priceB = parseFloat($(b).find('.product-price').text().replace('€', '').trim());

            if (sortBy === 'asc') {
                return priceA - priceB;
            } else {
                return priceB - priceA;
            }
        });

        $productsContainer.html($products);
    }
});
