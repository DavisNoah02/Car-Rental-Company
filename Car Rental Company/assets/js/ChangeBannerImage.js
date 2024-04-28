
// Code to change the background banner image after specified sec

document.addEventListener("DOMContentLoaded", function () {
    const banner = document.querySelector(".banner");
    const imageFolder = "/assets/images/Banner/";
    const imageNames = ["Banner1.jpg", "Banner3.jpg"];
    let currentIndex = 0;

    function changeBannerImage() {
        const imageUrl = imageFolder + imageNames[currentIndex];
        banner.style.backgroundImage = `url('${imageUrl}')`;

        currentIndex = (currentIndex + 1) % imageNames.length;
    }
    //interval delay
    function startImageChange() {
        setInterval(changeBannerImage, 12000);
    }

    startImageChange();
    // initial delay
    //setTimeout(startImageChange, 2000); 
});
