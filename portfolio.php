
<?php  include 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
    <title>My Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        #portfolioContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* spacing between cards */
            justify-content: center;
        }
        .project-card {
            border: 1px solid #ccc;
            padding: 15px;
            width: calc(50% - 20px); /* two per row with gap */
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .project-card:hover {
            transform: translateY(-5px);
        }
        .project-card img, .project-card video {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 5px;
        }
        .project-card h2 {
            margin-top: 0;
        }
        @media (max-width: 768px) {
            .project-card {
                width: 100%; /* single column on mobile */
            }
        }
    </style>
</head>
<body>

<h1>Portfolio</h1>
<div id="portfolioContainer"></div>

<script>
async function loadPortfolio(){
    try {
        const res = await fetch('backend/api/projects.php');
        const projects = await res.json();
        const container = document.getElementById('portfolioContainer');
        container.innerHTML = '';

        projects.forEach(p => {
            const card = document.createElement('div');
            card.classList.add('project-card');
            card.innerHTML = `
                <h2>${p.name}</h2>
                <p>${p.description}</p>
                <p><b>Skills:</b> ${p.skills}</p>
                <p><b>Platforms:</b> ${p.platforms}</p>
                ${p.url ? `<p><a href="${p.url}" target="_blank">Visit Project</a></p>` : ''}
                ${p.image ? `<img width="350px" height="auto" src="../assets/${p.image}" alt="${p.name}">` : ''}
                ${p.video ? `<video src="${p.video}" controls></video>` : ''}
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

</body>
</html>
