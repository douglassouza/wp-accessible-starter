(function() {
    let html = document.getElementsByTagName("html")[0];
    let body = document.getElementsByTagName("body")[0];

    function enableHighContrast() {
        body.classList.add('contrast');
        html.classList.add('font-size');
        document.cookie = 'high-contrast=1';        
    }

    document.getElementById('btn-contrast').addEventListener('click', function (e) {
        e.preventDefault();
        
        if(!body.classList.contains('contrast')) {
            enableHighContrast();
        } else {
            body.classList.remove('contrast');
            html.classList.remove('font-size');
            document.cookie = 'high-contrast=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }
    });

    if (document.cookie.split(';').some(function(item) {
        return item.trim().indexOf('high-contrast=1') == 0
    })) {
        enableHighContrast();
    }
})();

