document.addEventListener('DOMContentLoaded', function () {
  const contactForm = document.getElementById('contactForm');
  const nameField = document.getElementById('name');
  const emailField = document.getElementById('email');
  const messageField = document.getElementById('textarea');
  const responseMessage = document.getElementById('responseMessage');
  const errorMessage = document.getElementById('errorMessage');

  contactForm.addEventListener('submit', function (event) {
    event.preventDefault(); 
    
    if (nameField.value === '' || emailField.value === '' || messageField.value === '') {
      errorMessage.textContent = "Please fill out all fields.";
      errorMessage.style.display = 'block';
      return;
    }
    
    setTimeout(function() {
      contactForm.reset(); 
      responseMessage.style.display = 'block';
      errorMessage.style.display = 'none';
    }, 1000); 

  });
});
