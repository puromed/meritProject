document.addEventListener('DOMContentLoaded', function() {
    // Get form element
    const form = document.getElementById('registrationForm');
    if (!form) {
        console.error('Form not found!');
        return;
    }
    // Get form steps, progress steps, next buttons, and submit button
    // Debug element existence
    console.log('Form steps:', document.querySelectorAll('.form-step').length);
    console.log('Progress steps:', document.querySelectorAll('.progress-step').length);
    console.log('Next buttons:', document.querySelectorAll('.next-step').length);

    const formSteps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.progress-step');
    const prevBtns = document.querySelectorAll('.prev-step');
    const nextBtns = document.querySelectorAll('.next-step');
    const submitBtn = document.querySelector('.submit-form');
    let currentStep = 0;

     // Submit form handling
     form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');
        // Submit form using regular form submission
        this.submit();
    });


    function updateProgress() {
        progressSteps.forEach((step, index) => {
            if (index < currentStep) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (index === currentStep) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('active', 'completed');
            }
        });
    }

    function showStep(stepIndex) {
        console.log('Showing step:', stepIndex);
        
        formSteps.forEach((step, index) => {
            if (index === stepIndex) {
                step.classList.add('active');
                step.style.display = 'block';
            } else {
                step.classList.remove('active');
                step.style.display = 'none';
            }
        });

        // Update button visibility
        prevBtns.forEach(btn => {
            btn.style.display = stepIndex === 0 ? 'none' : 'block';
        });

        nextBtns.forEach(btn => {
            btn.style.display = stepIndex === formSteps.length - 1 ? 'none' : 'block';
        });

        submitBtn.style.display = stepIndex === formSteps.length - 1 ? 'block' : 'none';

        updateProgress();
    }

    // Add click event listeners with preventDefault
    nextBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent form submission
            console.log('Next button clicked, current step:', currentStep);
            if (currentStep < formSteps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    prevBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent form submission
            console.log('Previous button clicked, current step:', currentStep);
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Add validation function
    function validateStep(stepIndex) {
        const currentStepElement = formSteps[stepIndex];
        const inputs = currentStepElement.querySelectorAll('input, select');
        let isValid = true;

        inputs.forEach(input => {
            if (input.hasAttribute('required') && !input.value) {
                isValid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        return isValid;
    }

    // Initialize first step
    showStep(currentStep);
});