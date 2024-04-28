
// Code implementing Back-to-top button
   
    const backButton = document.getElementById('back-to-top');

    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backButton.style.display = 'block';
        } else {
            backButton.style.display = 'none';
        }
    }

    function topFunction() {
        //TODO: Make the to top function animate smoothly
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
