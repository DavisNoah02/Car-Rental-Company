 let carListing = document.querySelector(".car_listing");

carListing.addEventListener("click", goTOCardetails());

function goTOCarDetails(){
    window.open("http://localhost:3000/pages/car_details.php?car_id=<?php car_id ?>")
}