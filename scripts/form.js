const form = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");
const spinner = document.getElementById("spinner");
const feedbackMessage = document.getElementById("feedbackMessage");

const formHandle = async function (e) {
  e.preventDefault();
  const formData = {
    email: document.getElementById("email").value,
    name: document.getElementById("name").value,
    humanTest: document.getElementById("humanTest").value,
    message: document.getElementById("message").value,
  };

  if (formData.humanTest === "false" ? true : false) {
    try {
      // Send form data using Fetch API
      const response = await fetch(this.action, {
        method: "POST",
        body: JSON.stringify(formData),
      });

      const result = await response.json();

      // Hide spinner
      spinner.style.display = "none";
      submitBtn.disabled = false;

      // Show feedback message
      feedbackMessage.className =
        result.status === "success" ? "success" : "error";
      feedbackMessage.textContent = result.message;
      console.log(result.message);
      feedbackMessage.classList.remove("hidden");

      // Clear form on success
      if (result.status === "success") {
        this.reset();
      }
    } catch (error) {
      // Hide spinner and re-enable button
      spinner.style.display = "none";
      submitBtn.disabled = false;

      // Show error message
      feedbackMessage.className = "error";
      feedbackMessage.textContent = "Something went wrong. Please try again.";
      feedbackMessage.classList.remove("hidden");
    }
  }
};

form.addEventListener("submit", formHandle);
