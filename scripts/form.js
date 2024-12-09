const form = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");
const feedbackMessage = document.getElementById("feedbackMessage");

const formHandle = async function (e) {
  e.preventDefault();
  const formData = {
    email: document.getElementById("email").value,
    name: document.getElementById("name").value,
    humanTest: document.getElementById("humanTest").value,
    message: document.getElementById("message").value,
  };

  if (formData.humanTest !== "true") {
    feedbackMessage.className = "error";
    feedbackMessage.textContent = "Human test failed.";
    feedbackMessage.classList.remove("hidden");
    return;
  }

  try {
    // Send form data using Fetch API
    const response = await fetch(this.action, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded", // Send form-encoded data
      },
      body: new URLSearchParams(formData).toString(),
    });

    const result = await response.json();

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
    // Show error message
    feedbackMessage.className = "error";
    feedbackMessage.textContent = "Something went wrong. Please try again.";
    feedbackMessage.classList.remove("hidden");
  }
};

form.addEventListener("submit", formHandle);
