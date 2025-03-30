
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

const signUpLink = document.querySelector("#sign-up-link");
const signInLink = document.querySelector("#sign-in-link");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// Add event listeners to handle navigation from one form to another
signUpLink.addEventListener("click", (event) => {
  event.preventDefault();  // Prevent the default behavior (scrolling to the top)
  container.classList.add("sign-up-mode");
});

signInLink.addEventListener("click", (event) => {
  event.preventDefault();  // Prevent the default behavior (scrolling to the top)
  container.classList.remove("sign-up-mode");
});






/*
document.addEventListener("DOMContentLoaded", function () {
  const sign_in_btn = document.querySelector("#sign-in-btn");
  const sign_up_btn = document.querySelector("#sign-up-btn");
  const container = document.querySelector(".container");
  const signInLink = document.querySelector("#sign-in-link");

  sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });

  sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
  });

  // Add event listener for the "Sign In" link inside the sign-up form
  if (signInLink) {
    signInLink.addEventListener("click", (event) => {
      event.preventDefault();
      container.classList.remove("sign-up-mode");
    });
  }
});
*/