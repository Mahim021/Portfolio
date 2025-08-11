function toggleMenu() {
  const menu = document.querySelector(".menu-links");
  const icon = document.querySelector(".hamburger-icon");

  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

function toggleDarkMode() {
  const toggle = document.getElementById("darkModeToggle");
  const icon = document.getElementById("mode-icon");

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

    icon.className = isDarkMode ? "fas fa-moon" : "fas fa-sun";

    localStorage.setItem("theme", isDarkMode ? "dark" : "light");
  });
}
toggleDarkMode();
