<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Portfolio</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&family=Roboto+Condensed:wght@800&family=Roboto:wght@900&display=swap');
        
body, ul {
  margin: 0;
  padding: 0;
  font-family: "poppins";
}

header {
  background: #222;
  color: #fff;
}
.top-header {
  display: flex;                  /* put children in one line */
  justify-content: space-between; /* space between logo & icons */
  align-items: center;            /* vertically center them */
  padding: 10px 0px;             /* some spacing */
  background-color: #222;         /* or your preferred bg */
  
}
/* Top bar with icons */
.topbar {
  text-align: right;
  padding: 10px 20px;
}

.topbar a {
  color: #fff;
  margin-left: 15px;
  font-size: 18px;
  text-decoration: none;
}

.topbar a:hover {
  color: #e6e8e9ff;
}
.logo img {
    
 height: 45px;
  width: auto;  /* adjust logo size */
}

/* Navigation bar */
.navbar {
  background: #333;
}

.navbar ul {
  list-style: none;
  display: flex;
  justify-content: right;
}

.navbar li {
  margin: 0 20px;
}

.navbar a {
  text-decoration: none;
  color: #fff;
  font-weight: bold;
  padding: 15px;
  display: block;
}

.navbar a:hover {
  color: #b7babcff;
}
</style>
</head>
<body>
  <header class="top-header">
    <!-- Top bar with social icons -->
  <div class="logo">
    <img width="100px" src="assets/images/sasi.png" alt="My Logo">
    <!-- Or just text logo -->
    <!-- <h2>SasiHub</h2> -->
  </div>

    <div class="topbar">
     
      <a href="https://www.linkedin.com/in/sasikala-nisaharan-41371b218/" target="_blank"><i class="fab fa-linkedin"></i></a>
      <a href="https://github.com/yourusername" target="_blank"><i class="fab fa-github"></i></a>
      <a href="mailto:youremailmsasikala3@gmail.com"><i class="fas fa-envelope"></i></a>
    </div>
</header>
    <!-- Navigation menu -->
    <nav class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php#about">About Me</a></li>
        <li><a href="index.php#contact">Contact Me</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
      </ul>
    </nav>
</body>  
