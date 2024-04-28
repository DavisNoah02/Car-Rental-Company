confirmButton = document.getElementById('book_btn');

confirmButton.addEventListener('click', displayConfirmation);

function BookingConfirmationMsg(){
    confirm("Vehicle booked successfully.\nCheck your Email for additional details");
}
function FormSubmissionMessage(){
    confirm("Form submitted successfully.\nCheck your Email for additional details");
}