<?php
include 'config.php';

$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio</title>

  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="mediaqueries.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <nav id="desktop-nav">
    <div class="logo">MD. Ariful Alam Mahim</div>

    <div>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contacts</a></li>
        <button
          id="darkModeToggle"
          style="background: none; border: none; cursor: pointer">
          <i id="mode-icon" class="fas fa-sun"></i>
        </button>
      </ul>
    </div>
  </nav>

  <section id="profile">
    <div class="section__pic-container">
      <img
        src="./Assets/profile-pic.png"
        alt="MD. Ariful Alam profile picture" />
    </div>

    <div class="section__text">
      <p class="section__text__p1">Hello, I'm</p>
      <h1 class="title">Mahim</h1>
      <p class="section__text__p2">Frontend Developer</p>
      <div class="btn-container">
        <!-- <button
          class="btn btn-color-2"
          onclick="window.open('./Assets/Resume.pdf')">
          Download CV
        </button> -->
        <a href="./Assets/Resume.pdf" download="Resume.pdf" class="btn btn-color-2">
          Download CV
        </a>
        <button class="btn btn-color-1" onclick="location.href='./#contact'">
          Contact Info
        </button>
      </div>

      <div id="socials-container">
        <img
          src="./Assets/linkedin.png"
          alt="My LinkedIn profile"
          class="icon"
          onclick="location.href='https://www.linkedin.com/in/mahim21/'" />

        <img
          src="./Assets/github.png"
          alt="My Github profile"
          class="icon"
          onclick="location.href='https://github.com/Mahim021'" />
      </div>
    </div>
  </section>

  <section id="about">
    <p class="section__text__p1">Get to know more</p>
    <h1 class="title">About Me</h1>

    <div class="section-container">
      <div class="section__pic-container">
        <img src="Assets/about-pic.png" alt="Profile picture" class="about-pic" />
      </div>

      <div class="about-details-container">
        <div class="about-containers" style="display: flex; gap: 1rem;">
          <div class="details-container personal-info">
            <h3>Personal Info</h3>
            <p>
              Location: Bangladesh <br />
              Email: mahim@example.com <br />
              Phone: +880 1234 567890 <br />
              LinkedIn: linkedin.com/in/mahim <br />
              GitHub: github.com/mahim
            </p>
          </div>

          <div class="right-boxes" style="display: flex; flex-direction: column; gap: 1rem; flex: 1;">
            <div class="details-container">
              <h3>Interests</h3>
              <p>
                Football, Guitar, Coding, Adventure
              </p>
            </div>

            <div class="details-container">
              <h3>Hobbies</h3>
              <p>
                Playing games, Reading books, Exploring new tech
              </p>
            </div>
          </div>
        </div>
        
        <div class="text-container">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            sed, modi suscipit quibusdam quod sapiente recusandae asperiores.
            Nobis vitae impedit minima sunt quia totam facere, ad cupiditate
            molestias debitis! Officia at sunt corporis impedit minus aliquam
            dolor culpa et sit consequatur nesciunt omnis, dolore inventore
            quisquam sed illo quis commodi.
          </p>
        </div>
      </div>
    </div>

    <img src="Assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#experience'" />
  </section>

  <section id="experience">
    <p class="section__text__p1">Explore My</p>
    <h1 class="title">Experience</h1>

    <div class="skills-container">
      <div class="skill-category">
        <h2>Frontend</h2>
        <ul>
          <li><i class="fa-solid fa-code"></i> HTML</li>
          <li><i class="fa-brands fa-css3-alt"></i> CSS</li>
          <li><i class="fa-brands fa-sass"></i> SASS</li>
          <li><i class="fa-brands fa-js"></i> JavaScript</li>
        </ul>
      </div>
      <div class="skill-category">
        <h2>Backend</h2>
        <ul>
          <li><i class="fa-solid fa-database"></i> PostgreSQL</li>
          <li><i class="fa-brands fa-node"></i> Node.js</li>
          <li><i class="fa-solid fa-server"></i> Express.js</li>
        </ul>
      </div>
      <div class="skill-category">
        <h2>Tools</h2>
        <ul>
          <li><i class="fa-brands fa-git-alt"></i> Git</li>
          <li><i class="fa-brands fa-github"></i> GitHub</li>
          <li><i class="fa-solid fa-layer-group"></i> Material UI</li>
        </ul>
      </div>
    </div>

    <img src="Assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#experience'" />
  </section>

  <section id="projects">
    <p class="section__text__p1">Browse My Recent</p>
    <h1 class="title">Projects</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <!-- <div class="details-container color-container">
          <div class="article-container">
            <img
              src="./Assets/project-1.png"
              alt="Project 1"
              class="project-img" />
          </div>
          <h2 class="experience-sub-title project-title">Project One</h2>
          <div class="button-container">
            <button
              class="btn btn-color-2 project-btn"
              onclick="location.href='https://github.com/'">
              Github
            </button>
            <button
              class="btn btn-color-2 project-btn"
              onclick="location.href='https://github.com/'">
              Github
            </button>
          </div>
        </div> -->

        <?php

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<div class='details-container color-container'>";
            echo "  <div class='article-container'>";
            echo "      <img src='{$row['project_image']}' alt='{$row['project_title']}' class='project-img' />";
            echo "  </div>";
            echo "  <h2 class='experience-sub-title project-title'>{$row['project_title']}</h2>";
            echo "  <div class='button-container'>";
            echo "      <button class='btn btn-color-2 project-btn' onclick=\"location.href='{$row['link1']}'\">Github</button>";
            echo "      <button class='btn btn-color-2 project-btn' onclick=\"location.href='{$row['link2']}'\">Github</button>";
            echo "  </div>";
            echo "</div>";
          }
        } else {
          echo "<p>No projects found.</p>";
        }
        ?>

      </div>
    </div>
    <img
      src="Assets/arrow.png"
      alt="Arror icon"
      class="icon arrow"
      onclick="location.href='./#contact'" />
  </section>

  <section id="contact">
    <p class="section__text__p1">Get in Touch</p>
    <h1 class="title">Conatct Me</h1>
    <div class="contact-info-upper-container">
      <div class="contact-info-container">
        <img
          src="Assets/email.png"
          alt="Email Icon"
          class="icon contact-icon email-icon" />
        <p>
          <a href="mailto:arifulalam7865@gmail.com">arifulalam7865@gmail.com</a>
        </p>
      </div>

      <div class="contact-info-container">
        <img
          src="Assets/linkedin.png"
          alt="LinkedIn Icon"
          class="icon contact-icon" />
        <p><a href="https://www.linkedin.com">LinkedIn</a></p>
      </div>
    </div>
  </section>

  <footer>
    <p>Copyright &#169; 2025 Md. Ariful Alam. All Rights Reserved.</p>
  </footer>
  <script src="script.js"></script>
</body>

</html>