document.addEventListener("DOMContentLoaded", function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(function(question) {
      question.addEventListener('click', function() {
        const answer = this.nextElementSibling;
        answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
        const arrow = this.querySelector('#faq-arrow');
        arrow.style.transform = (answer.style.display === 'block') ? 'rotate(90deg)' : 'rotate(0deg)';
      });
    });
  });