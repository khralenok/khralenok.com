document
  .getElementById("contactForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault(); // Prevent default form submission

    const submitBtn = document.getElementById("submitBtn");
    const spinner = document.getElementById("spinner");
    const feedbackMessage = document.getElementById("feedbackMessage");

    // Show spinner and disable the button
    spinner.style.display = "inline-block";
    submitBtn.disabled = true;

    // Collect form data
    const formData = new FormData(this);

    try {
      // Send form data using Fetch API
      const response = await fetch(this.action, {
        method: "POST",
        body: formData,
      });

      const result = await response.json();

      // Hide spinner
      spinner.style.display = "none";
      submitBtn.disabled = false;

      // Show feedback message
      feedbackMessage.className =
        result.status === "success" ? "success" : "error";
      feedbackMessage.textContent = result.message;
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
  });
