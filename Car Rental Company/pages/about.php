<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - WheelsWander</title>
    <link rel="stylesheet" type="text/css" href="\assets\css\about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
</head>
<body>
<?php
    // Check if the user is logged in; if not, redirect to the login page
    session_start();
    // header to maintain a consistent layout
    include("../includes/header.php");
?>

<section class="about-us">
    <h2>About Us</h2>
    <p>Welcome to WheelsWander, your trusted partner for car rentals. We are dedicated to providing you with the best car rental experience, whether you're traveling for business, leisure or other personal needs.</p>

    <h3>Our History</h3>
    <p>Founded in 2023, WheelsWander has grown from a small startup to a leading car rental service. Our commitment to quality and customer satisfaction has been the driving force behind our success.</p>

    <h3>Our Mission</h3>
    <p>At WheelsWander, our mission is to offer our customers a wide range of high-quality cars at competitive prices. We aim to make car rental a hassle-free experience and ensure your journey is memorable.</p>

    <h3>Our Values</h3>
    <ul>
        <li><strong>Customer-Centric:</strong> We prioritize the needs and satisfaction of our customers.</li>
        <li><strong>Quality:</strong> We maintain a fleet of well-maintained and reliable vehicles.</li>
        <li><strong>Transparency:</strong> We provide clear pricing and terms for our services.</li>
        <li><strong>Teamwork:</strong> Our dedicated team works together to exceed customer expectations.</li>
    </ul>

    <h2>Our Team</h2>

    <div class="all-team-members">
        <img src="/assets/images/Banner/Banner4.jpg" alt="All Members profile image">
        <h3>Executive Committee</h3>
    </div>
    <hr>
    
    <h2>All Members</h2>

    <div class="team-members">
        <div class="team-member">
            <img src="/assets/images/Members/Noah Dave Munene passport.jpg" alt="CEO profile image">
            <h3>Noah Dave Munene</h3>
            <p>Chief Executive Officer (CEO)</p>
        </div>

        <div class="team-member">
            <img src="/assets/images/Members/Emmanuel Otieno.jpg" alt="COO profile image">
            <h3>Emmanuel Otieno</h3>
            <p>Chief Operations Officer (COO)</p>
        </div>

        <div class="team-member">
            <img src="/assets/images/Members/Victor Mati.jpg" alt="CTO profile image">
            <h3>Victor Mati</h3>
            <p>Chief Technology Officer (CTO)</p>
        </div>
        
        <div class="team-member">
            <img src="/assets/images/Members/Dismas Onyango.jpg" alt="CTO profile image">
            <h3>Dismas Onyango</h3>
            <p>Chief Financial Officer (CFO)</p>
        </div>
        
        <div class="team-member">
            <img src="/assets/images/Members/Phyllis Kututa.jpg" alt="CTO profile image">
            <h3>Phyllis Kututa</h3>
            <p>Chief Marketing Officer (CMO)</p>
        </div>
        
        <div class="team-member">
            <img src="/assets/images/Members/Dancane Odiwuor passport.jpg" alt="CTO profile image">
            <h3>Dancane Odiwuor</h3>
            <p>Chief Security Officer (CSO)</p>
        </div>
        
        <div class="team-member">
            <img src="/assets/images/Banner/Banner2.jpg" alt="CTO profile image">
            <h3>Danny Maina</h3>
            <p>Chief Information Officer (CIO)</p>
        </div>
                
        <div class="team-member">
            <img src="/assets/images/Members/Cleophas morara passport.jpg" alt="CTO profile image">
            <h3>Cleophas morara</h3>
            <p>Chief Customer Officer (CCO)</p>
        </div>
        <div class="team-member">
            <img src="/assets/images/Members/Nicholas Murithi.jpg" alt="CTO profile image">
            <h3>Nicholas Murithi</h3>
            <p>Chief Human Resources Officer (CHRO)</p>
        </div>
    </div>
</section>

    <button onclick="topFunction()" id="back-to-top" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="/assets/js/ToTopButton.js"></script>

<?php
    include("../includes/Footer.php");
?>

</body>
</html>


