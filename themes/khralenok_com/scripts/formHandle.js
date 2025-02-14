const formHandle = function () {
  const form = document.getElementById("the-form");
  const submitter = form.querySelector("input[type=submit]");
  const statusMessage = document.getElementById("form-status");
  const banner = document.querySelector(".banner");
  const startTime = Date.now();
  const spinner = document.getElementById("form-spinner");

  const validateEmail = function (email) {
    const normalizedEmail = email.toLowerCase().trim();
    /* prettier-ignore */
    const regexp = /^[a-z0-9._-]+@[a-z]+\.[a-z]+$/;

    if (normalizedEmail.match(regexp)) {
      if (normalizedEmail.match(regexp)[0] === normalizedEmail) {
        return true;
      }
    }
    return false;
  };

  const validateName = function (name) {
    /* prettier-ignore */
    const regexp = /^[A-Za-z\s]+$/;
    if (name.match(regexp)) {
      if (name.match(regexp)[0] === name) {
        return true;
      }
    }
    return false;
  };

  const sendData = async function (data) {
    fetch("/wp-json/custom/v1/send-email", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-type": "application/json",
      },
    })
      .then((response) => response.json())

      .then((data) => {
        if (data.success) {
          displayResult(
            "Thank you for your submission!",
            "I'll get back to you within one business day.",
            false
          );
        } else {
          displayResult(`Error: ${data.error}`);
        }
      })
      .catch((error) => console.error("Error:", error));
  };

  const getFormData = function (e) {
    e.preventDefault();
    spinner.style.display = "block";
    const formData = new FormData(form, submitter);

    if (Date.now() - startTime < 2000) {
      displayResult("Not so fast. Read the form first, please");
      return;
    }

    if (
      formData.get("name") === "" ||
      formData.get("email") === "" ||
      formData.get("privacy-policy" === false)
    ) {
      displayResult("Please, fill the firm first");
      return;
    }

    if (
      !validateName(formData.get("name")) ||
      !validateEmail(formData.get("email"))
    ) {
      displayResult("The data seems invalid. Please double-check it");
      return;
    }

    const formDataValid = {
      name: formData.get("name"),
      email: formData.get("email"),
      fav_pow_ranger: formData.get("fav-power-ranger"),
      privacy_policy: formData.get("privacy-policy"),
      time: Date.now() - startTime,
    };
    sendData(formDataValid);
    form.name.value = "";
    form.email.value = "";
  };

  const displayResult = function (body, heading = "", isError = true) {
    spinner.style.display = "none";
    if (isError) {
      const markup = body;
      statusMessage.classList.add("active");
      statusMessage.textContent = markup;
    }
    if (!isError) {
      const markup = `<div class="title"><div class="molecule vertical"><h2>${heading}</h2><p>${body}</p></div></div>`;
      banner.innerHTML = markup;
    }
  };

  form.addEventListener("submit", getFormData);
};

window.addEventListener("load", formHandle);
