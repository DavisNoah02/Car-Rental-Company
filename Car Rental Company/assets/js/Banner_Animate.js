
//js code to change the banner text after some time has elapsed 10s

document.addEventListener("DOMContentLoaded", function () {
    const bannerText = document.querySelector(".banner-content h1");
    const texts = [
        "Discover Your Next Adventure",
        "Explore the World with WheelsWander",
        "Your Journey Begins Here"
    ];

    let currentIndex = 0;
    let letterIndex = 0;
    let isDeleting = false;

    function animateText() {
        const currentText = texts[currentIndex];

        if (isDeleting) {
            // Deleting letter by letter
            bannerText.textContent = currentText.substring(0, letterIndex - 1);
            letterIndex--;

            if (letterIndex === 0) {
                // Switching to the next text after deleting with delay on every iteration
                isDeleting = false;
                currentIndex = (currentIndex + 1) % texts.length;
                //setTimeout(animateText, 0); 
                animateText();
            } else {
                setTimeout(animateText, 100); 
            }
        } else {
            // Adding letter by letter
            bannerText.textContent = currentText.substring(0, letterIndex + 1);
            letterIndex++;

            if (letterIndex === currentText.length) {
                // Start deleting after adding the entire text
                isDeleting = true;
                //waiting for 10 sec
                setTimeout(animateText, 8000);
            } else {
                setTimeout(animateText, 100); 
            }
        }
    }

    function startAnimation() {
        animateText(); // Start the initial animation
    }
    setTimeout(startAnimation, 4000); // Initial delay before starting
});
