<?php  include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        /* Hero */

.hero {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 30px 20px;
   background: #f5f5f5; /* very light gray */
  background: url('assets/images/gray-background.jpg') no-repeat center center/cover;
 
  box-shadow: inset 0 0 50px rgba(0,0,0,0.03); /* subtle shading */
  color: #302828ff;
}

.hero-content {
  display: flex;
  max-width: 1000px;
  width: 100%;
  gap: 40px; /* space between text and image */
  align-items: center;
}

/* Text on left */
.hero-text {
  flex: 1;
}

/* Image on right */
.hero-image {
  flex: 1;
  text-align: center;
}

.hero-image img {
  width: 250px;
  height: auto;
  border-radius: 10px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Button styling */
.hero .btn {
  display: inline-block;
  padding: 10px 20px;
  margin-top: 20px;
  background: #113d67ff;
  color: #f8f4f4ff;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
}

/* Responsive for mobile */
@media (max-width: 768px) {
  .hero-content {
    flex-direction: column;
    text-align: center;
  }

  .hero-text {
    order: 2; /* optional: text comes below image */
  }

  
}

section {
  max-width: 1100px;      /* keeps content from stretching too wide */
  margin: 10px auto;      /* centers the whole section */
  padding: 0 5px;        /* space inside left/right */
  text-align: left;       /* ensures text is aligned left by default */
}

section h2 {
  font-size: 25px;
  margin-bottom: 5px;
  font-weight: bold;
  color: #222;
}

section p {
  font-size: 15px;
  line-height: 1.6;
  color: #323131ff;
}

section + section {
  margin-top: 20px; /* control space between consecutive sections */
}

/* About */
.about, .portfolio-preview, #contact {
  padding: 15px 20px;
  text-align: left;
  
}

/* Portfolio Grid */
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
  gap: 15px;
  margin-top: 0px;
  justify-items: center;
  
}

.card {
  background: #fffdfdff;
  padding: 20px;
  border-radius: px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.card-education {
  background: #fffdfdff;
  padding: 20px;
  border-radius: 0px;
  
}
.card-about{
  background: #fffdfdff;
  padding: 0px;
  border-radius: 0px;
  font-size: 10px;
}
.card-about p{
  font-size: 15px;
  line-height: 1.6;
  color: #323131ff;
}


#portfolio {
  padding: 60px 20px;
  background: #4c6e93ff;
}

#portfolio h2 {
  text-align: left;
  margin-bottom: 30px;
}

.portfolio-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.project-card {
  background: #f0f1f4ff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 14px 10px rgba(16, 2, 2, 0.1);
  transition: transform 0.2s;
}

.project-card:hover {
  transform: translateY(-5px);
}

.project-img {
  width: auto;
  height: 250px;
  margin-top: 10px;
  border-radius: 8px;
}
.p {
    font-size: 11px;
}

        </style>
</head>

<main>

    
<section class="hero">
  <div class="hero-content">
    <div class="hero-text">
      <h1>Hi, I’m Sasi! </h1>
      <h3><b>Software Engineer | Full Stack Developer </b><br>
         <br>Python | PHP | JavaScript | Data Analysis</h3>
      <a href="portfolio.php" class="btn">View My Work</a>
    </div>
    <div class="hero-image">
      <img src="assets/images/myphoto.jpg" alt="Sasi Photo">
    </div>
  </div>
</section>

  <!-- About -->
  <section class="about" id="about">
    <h2>About Me</h2>
     <div class="grid">
        <div class="card-about">
    <p>
I am Sasikala Nisaharan, a passionate and driven individual with a strong foundation in computer science and a deep-rooted love for software and web development. My journey into the tech world began after high school when I sought to dive into something both useful and advanced. This led me to pursue a two-year advanced diploma at Aptech Computer Education, a renowned institute where I discovered my passion for coding and problem-solving.</p>
<p>Realizing that technology was my calling, I decided to pursue a Bachelor of Computer Applications (BCA), a comprehensive computer science degree. My curiosity and enthusiasm for the ever-evolving tech landscape inspired me to expand my expertise, leading me to Canada, where I completed a program in Artificial Intelligence and Data Analytics at Durham College.</p></div>
<div class="card-about">
<p>
Throughout my academic and professional journey, I have honed a diverse set of skills. I am a fast learner, self-motivated, and thrive both as an effective team player and as an independent worker. </p>
<p>
Beyond technology, I have a keen interest in fashion design, enjoy experimenting with culinary creations, and am an avid reader of books that inspire personal and professional growth.</p>
<p>
I am eager to apply my skills as a Software Developer or Web Developer, contributing to innovative solutions that drive success. With a commitment to continuous learning and a passion for tackling challenges, I am ready to embark on new opportunities and make a meaningful impact in the tech industry.  </p></div>

</section>

  <!-- Portfolio Preview -->
  <section class="portfolio-preview">
    <h2>Featured Projects</h2>
    <div class="portfolio-container" id="portfolioContainer"></div>
   <!--  <div class="grid">
      <div class="card">Project 1</div>
      <div class="card">Project 2</div>
    </div> -->
    <br>
    <a href="portfolio.php" class="btn">See All Projects</a>
  </section>


  <!-- Skills & Coursework -->
    <section class="portfolio-preview" id=Skills>
    <h2>Skills & CERTIFICATIONS</h2>
    <div class="grid">
    <div class="card-education"><h3>SKILLS & TOOLS</h3>
      <p><b>BACKEND DEVELOPMENT </b> : &nbsp;&nbsp;&nbsp;Python, &nbsp;     PHP, &nbsp;      JavaScript</p> 

  <p><b>FRONT END DEVELOPMENT :</b> &nbsp;&nbsp;&nbsp;JavaScript,&nbsp;   Html,&nbsp;          CSS </p>

  <p><b>MACHINE LEARNIN (AI/ML) :</b>   &nbsp;&nbsp;&nbsp;AI Algorithms,&nbsp;     Deep learning,&nbsp;      Neural Networks,&nbsp;    Pandas.</p>

    <p> <b>MISCELLANEOUS  :</b> &nbsp;&nbsp;&nbsp;Tableau,&nbsp;  GitHub,&nbsp; MySQL,&nbsp; VS Code </p>

    <p><b>SOFT SKILLS  :</b>  &nbsp;&nbsp;&nbsp;Team Player,&nbsp; Learn independently,&nbsp; Deliver result </p>
    </div>

     <div class="card-education"><h3>CERTIFICATIONS FOLLOWING</h3>
      <p><b>CERTIFICATIONS </b> : Complete Python with DSA Bootcamp + LEETCODE Exercises – Udemy -At the finishing stage</p> 
      <p><b>CERTIFICATIONS </b> : Complete Python with DSA Bootcamp + LEETCODE Exercises – Udemy -At the finishing stage</p> 

  
    </div>
    </div>
     </section>

  
  <!-- Education & Experience -->
    <section class="portfolio-preview">
    <h2>Education and Experience</h2>
    <div class="grid">
    <div class="card-education"><h3>EDUCATION</h3>
      <p><b>Durham College - CANADA</b><br>
      Artificial Intelligence Analysis, Design, and Implementation
      (Graduate Certificate) August 2023<br>
      Data Analytics in Business Decision Making (Graduate Certificate) August 2024</p>
        
      <p><b>University of Madras - INDIA</b>
      Bachelor of Computer Application (BCA)</p>

      <p><b>Aptech Computer Education - INDIA</b>
      HDSE (Higher Diploma in Software Engineering)
      </p>
    </div>

      <div class="card-education"><h3>EXPERIENCE</h3>

     <p><b>ChemiCheck Inc – Junior Data Analyst</b> <br>
      October 2024 - April 2025<br> Scarborough, Ontario</p> 
    
      <p><b>SChemiCheck Inc - IT System Support Engineer</b><br>
      Jan 2023 - May 2023<br> Scarborough, Ontario</p>

      <p><b>DatacessPro - Software Engineer </b><br>
      December 2012 - August 2022<br> Colombo, Sri Lanka.</p>

      <p><b>Iceberg Software- Software Engineer</b> <br>
      Dec 2008 - Dec 2012
     <br> Colombo, Sri Lanka</p> 
      
    </div>
    </div>
     </section>


  <!-- Contact -->
  <section id="contact">
    <h2>Contact Me</h2>
    <p>Email: <a href="mailto:msasikala3@gmail.com">msasikala3@gmail.com</a></p> 
    <p><a href="https://www.linkedin.com/in/sasikala-nisaharan-41371b218/" target="_blank">LinkedIn</a>
     | <a href="https://github.com/SasiNisa" target="_blank">GitHub</a></p>
  </section>

<script>
async function loadPortfolio(){
    try {
        const res = await fetch('backend/api/projects.php');
        const projects = await res.json(); 
        const container = document.getElementById('portfolioContainer');
        container.innerHTML = '';

        projects.slice(0, 3).forEach(p => {
            const card = document.createElement('div');
            card.classList.add('project-card');
            card.innerHTML = `
                <h3>${p.name}</h3>
                ${p.image ? `<img  width="300px" height="auto" src="assets/${p.image}" alt="${p.name}">` : ''}
                <p><b>Skills:</b> ${p.skills}</p>
                <p><b>Platforms:</b> ${p.platforms}</p>
                ${p.url ? `<p><a href="${p.url}" target="_blank">Visit Project</a></p>` : ''}
                
                
            `;
            container.appendChild(card);
        });
    } catch (err) {
        console.error("Failed to load portfolio:", err);
        document.getElementById('portfolioContainer').innerHTML = "<p>Failed to load projects.</p>";
    }
}

loadPortfolio();
</script>
</main>