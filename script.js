function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");

  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

function toggleDarkMode() {
  const toggle = document.getElementById("darkModeToggle");
  const icon = document.getElementById("mode-icon");

  // Load theme from localStorage on page load
  const savedTheme = localStorage.getItem("theme");

  if (savedTheme === "dark") {
    document.body.classList.add("dark-mode");
    icon.className = "fas fa-moon";
  } else {
    icon.className = "fas fa-sun";
  }

  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");

    const isDarkMode = document.body.classList.contains("dark-mode");

    // Toggle icon
    icon.className = isDarkMode ? "fas fa-moon" : "fas fa-sun";

    // Save to localStorage
    localStorage.setItem("theme", isDarkMode ? "dark" : "light");
  });
}
toggleDarkMode();

/* const toggle = document.getElementById("toggleDarkMode");
    const icon = document.getElementById("mode-icon");

    if (localStorage.getItem("theme") === "dark") {
      document.body.classList.add("dark-mode");
      icon.className = "fas fa-sun"; 
    }

    toggle.addEventListener("click", () => {
      document.body.classList.toggle("dark-mode");

      icon.className = document.body.classList.contains("dark-mode")
        ? "fas fa-moon"
        : "fas fa-sun"; 

      const mode = document.body.classList.contains("dark-mode")
        ? "dark"
        : "light";
      localStorage.setItem("theme", mode); */
