<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credits - Maradock</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/credit.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
  <!-- Container wrapper -->
  <div class="container-fluid px-4">
    <!-- Navbar brand -->
    <img src="assets/img/home/logo.png" alt="Maradock logo" width = "130"> 

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars text-light"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="credit.php">Credits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
     
      <!-- Left links -->

      </ul>
      <!-- Right links -->
       
      <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="pages/student/profile_selection.php">
            <button type="button" class="btn btn-outline-light btn-rounded">Login</button>
          </a>
        </li>
        <li class="nav-item text-center mx-2 mx-lg-1">
          <a class="nav-link" href="pages/auth/registration.html">
            <button type="button" class="btn btn-light btn-rounded">Sign up</button>
          </a>
        </li>
      </ul>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="darkModeToggle" />
        <label class="form-check-label" for="darkModeToggle" id = "themeLabel">Dark Mode</label>
       </div>
      <!-- Right links -->

      <!-- Search form -->
      <form class="d-flex input-group w-auto ms-lg-3 my-3 my-lg-0">
        <input type="search" class="form-control" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-light" type="button">
          Search
        </button>
      </form>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>

  <!-- Navbar -->

    <!--hero Section-->
    <section class="hero-section">
        <div class="container">
            <div class="hero-title">Credits</div>
            <p class="hero-subtitle opacity-0">Additional things added to the website</p>
        </div>

        <!--shape divider-->
        <div class="custom-shape-divider-bottom-1735808866">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Video cards Section -->
     <section class="video-section">
        <div class="container">
            <div class="row">
                <!-- video card 1 -->
                 <div class="col-md-4">
                    <div class="card video-card">
                        <div class="card-body">
                            <video class="card-video" controls autoplay muted loop>
                                <source src="assets/vid/Hint.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <h5 class="card-title">Hint</h5>
                            <p class="card-text">Added the hint feature to assist the user.</p>
                        </div>
                    </div>
                 </div>

                 <!-- video card 2 -->
                 <div class="col-md-4">
                    <div class="card video-card">
                        <div class="card-body">
                            <video class="card-video" controls autoplay muted loop>
                                <source src="assets/vid/button.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <h5 class="card-title">changeable assignment priority</h5>
                            <p class="card-text">Added the ability to change the assignment priority.</p>
                        </div>
                    </div>
                 </div>

                 <!-- video card 3 -->
                 <div class="col-md-4">
                    <div class="card video-card">
                        <div class="card-body">
                            <video class="card-video" controls autoplay muted loop>
                                <source src="assets/vid/gpa.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <h5 class="card-title">Gpa calculation</h5>
                            <p class="card-text">Added the gpa calculation.</p>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
     
     </section>
     <div class="custom-shape-divider-bottom-1735825831">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
     <!--top svg-->
     <div class="custom-shape-divider-top-1735823673">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
    </div>

    <!-- FAQ Section -->
     <section class="faq-section">
        <div class="container">
            <h2 class="text-center my-4">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is Maradock?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Maradock is a platform that helps students manage their assignments and grades.
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How do I use Maradock?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                To use Maradock, simply sign up and log in. You can then add your assignments and view your grades.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can I change my profile picture?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, you can change your profile picture by clicking on the "Profile" tab and then clicking "Change Picture".
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>

     <!-- Call to Action Section -->
      <section class="cta-section">
        <main id="cta-main">
            <div class="cta-card">
                <h2 class="reveal-text">Hop In</h2>
                <p class="reveal-text">Join us today and start your journey to success!</p>
                <a href="pages/student/profile_selection.php" class="btn btn-primary">Get Started</a>
            </div>

            <div class="overlay" aria-hidden="true">
                <!-- clone will be inserted here in Javascript -->
            </div>
        </main>
      </section>

   <!-- Footer -->
<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Maradock</h5>
                <p>Your one-stop student hub for managing courses, assignments, and academic progress.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-light">Home</a></li>
                    <li><a href="credit.php" class="text-light">Credits</a></li>
                    <li><a href="contact.php" class="text-light">Contact</a></li>
                </ul>
            </div>
            <!-- Social Media Icons -->
            <div class="col-md-4">
                <h5>Social Media</h5>
                <div class="d-flex justify-content-start">
                    <a href="https://www.facebook.com/maradock" class="text-light me-3"><i class="fab fa-facebook fa-1x"></i></a>
                    <a href="https://www.twitter.com/maradock" class="text-light me-3"><i class="fab fa-twitter fa-1x"></i></a>
                    <a href="https://www.instagram.com/maradock" class="text-light"><i class="fab fa-instagram fa-1x"></i></a>
                </div>
            </div>
            <!-- Contact Us -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>123 Education Street, Learning City, 12345</p>
                <p>
                    <i class="fas fa-envelope me-2"></i>
                    contact@maradock.com
                </p>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col text-center">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> Maradock. All rights reserved.</p>
        </div>
    </div>
</footer>


     <!--javascript-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        //dark mode toggle
        function setTheme(theme){
        document.documentElement.setAttribute('data-bs-theme', theme);
        localStorage.setItem('theme', theme);
        document.getElementById('themeLabel').innerText = theme === 'dark' ? 'Dark Mode On' : 'Dark Mode Off';
      }

      document.getElementById('darkModeToggle').addEventListener('change', function(event){
        if(event.target.checked){
          setTheme('dark');
        }else{
          setTheme('');
        }
      });

      document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme');  // Fixed variable name
        if(savedTheme) {
            setTheme(savedTheme);
            if(savedTheme === 'dark') {
                document.getElementById('darkModeToggle').checked = true;
            }
        }
    });

        //Scroll animation for subtitle
        window.addEventListener('scroll', function(){
            const subtitle = document.querySelector('.hero-subtitle');
            const elementTop = subtitle.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if(elementTop < windowHeight) {
                subtitle.classList.remove('opacity-0');
                subtitle.classList.add('fade-in');
            }
        })

        // Clone the CTA card for overlay
        const ctaMain = document.querySelector("#cta-main");
        const ctaContent = ctaMain.querySelector(".cta-card");
        const ctaClone = ctaContent.cloneNode(true);
        const ctaOverlay = ctaMain.querySelector(".overlay");
        ctaOverlay.insertAdjacentElement("beforeend", ctaClone);

        // Hover effect
        const applyOverlayMask = (e) => {
            const overlayEl = ctaOverlay;
            const rect = ctaMain.getBoundingClientRect()
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            if (e.type === 'mouseleave') {
                overlayEl.style.setProperty('--opacity', '0');
            } else {
                overlayEl.style.setProperty('--opacity', '1');
                overlayEl.style.setProperty('--x', `${x}px`);
                overlayEl.style.setProperty('--y', `${y}px`);
            }
        };

        //Text reveal on scroll
        const revealText = () => {
            const reveals = document.querySelectorAll('.reveal-text');
            reveals.forEach((element, index) => {
                const elementTop = element.getBoundingClientRect().top;
                const elementBottom = element.getBoundingClientRect().bottom;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight && elementBottom > 0) {
                    // add delay for each element
                    setTimeout(() => {
                        element.classList.add('visible');
                    }, index * 200);
                }
            });
        };

        //Change text on hover
        ctaMain.addEventListener('mouseenter', (e) => {
            const overlayTitle = ctaOverlay.querySelector('h2');
            overlayTitle.style.opacity = '0';
            setTimeout(() => {
                overlayTitle.textContent = "Extra mark please,sir.";
                overlayTitle.style.opacity = '1';
            }, 200);
            applyOverlayMask(e);
        });

        ctaMain.addEventListener('mouseleave', (e) =>{
            const overlayTitle = ctaOverlay.querySelector('h2');
            overlayTitle.style.opacity = '0';
            setTimeout(() => {
                overlayTitle.textContent = "Hop In";
                overlayTitle.style.opacity = '1';
            }, 200);
            applyOverlayMask(e);
        });

        //Event listeners
        ctaMain.addEventListener("mousemove", applyOverlayMask);
        ctaMain.addEventListener("mouseleave", applyOverlayMask);
        window.addEventListener("scroll", revealText);
        document.addEventListener("DOMContentLoaded", revealText);
     </script>


</body>
</html>