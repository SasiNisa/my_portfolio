<?php
// admin.php
session_start();

// Simple session check (replace with real login later)
if (!isset($_SESSION['admin'])) {
    // For now auto-login for testing
    $_SESSION['admin'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Projects</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            margin: 0px;
            padding: 20px;
            font-family: "poppins";
        }

        #projects-table td, #projects-table th {
        border: 1px solid #ccc;
        padding: 6px;
        white-space: normal;
        
        }

        #projects-table td {
            word-break: break-all;
        }
        #projects-table tr {
        height: 50px;   /* adjust as you like */
        }


    </style>
    <script>
        let editingId = null;

    async function loadProjects() {
    const res = await fetch('../backend/api/projects.php');
    const data = await res.json();
    const tbody = document.querySelector('#projects-table tbody');
    tbody.innerHTML = '';

    data.forEach(p => {
        const row = `
          <tr data-id="${p.proID}">
            <td>${p.proID}</td>
            <td>${p.name}</td>
            <td>${p.description}</td>
            <td>${p.skills}</td>
            <td>${p.platforms}</td>
            <td><a href="${p.url}" target="_blank">${p.url}</a></td>
            <td>${p.image}</td>
            <td>${p.video}</td>
            <td>
                <button onclick="editProject(${p.proID}, this)">Edit</button>
                <button onclick="deleteProject(${p.proID})">Delete</button>
            </td>
          </tr>
        `;
        tbody.innerHTML += row;
    });
}

        async function addProject(){
            const form = document.getElementById('add-form');
            const payload = {
                name: form.name.value,
                description: form.description.value,
                skills: form.skills.value,
                platforms: form.platforms.value,
                url: form.url.value,
                image: form.image.value,
                video: form.video.value
            };
            const res = await fetch('../backend/api/projects.php', {
                method:'POST',
                headers:{'Content-Type':'application/json'},
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if(data.status==='success'){
                loadProjects();
                form.reset();
            } else {
                alert(data.error || 'Error adding project');
            }
        }

        async function deleteProject(id){
            if(!confirm("Delete this project?")) return;
            const res = await fetch('../backend/api/projects.php', {
                method:'DELETE',
                headers:{'Content-Type':'application/json'},
                body: JSON.stringify({proID:id})
            });
            const data = await res.json();
            if(data.status==='success'){
                loadProjects();
            } else {
                alert(data.error || 'Error deleting project');
            }
        }

        function editProject(id, btn){
            if(editingId !== null){
                alert("Finish editing current project first!");
                return;
            }
            editingId = id;
            const tr = btn.closest('tr');
            const tds = tr.querySelectorAll('td');
            for(let i=1;i<tds.length-1;i++){
                const old = tds[i].innerText;
                tds[i].innerHTML = `<input value="${old}" style="width:100%">`;
            }
            tds[tds.length-1].innerHTML =
                `<button onclick="saveProject(${id}, this)">Save</button>
                 <button onclick="cancelEdit()">Cancel</button>`;
        }

        async function saveProject(id, btn){
            const tr = btn.closest('tr');
            const inputs = tr.querySelectorAll('input, textarea');
            const payload = {
                proID: parseInt(id), // ensure integer
                name: inputs[0].value,
                description: inputs[1].value,
                skills: inputs[2].value,
                platforms: inputs[3].value,
                url: inputs[4].value,
                image: inputs[5].value,
                video: inputs[6].value
            };

            try {
                const res = await fetch('../backend/api/projects.php', {
                    method:'PUT',
                    headers:{'Content-Type':'application/json'},
                    body: JSON.stringify(payload)
                });

                const text = await res.text();
                console.log("Raw response from backend:", text); // DEBUG
                const data = JSON.parse(text);

                if(data.status==='success'){
                    alert('Project updated!');
                } else {
                    alert(data.error || 'Unknown error while updating');
                }
            } catch(err){
                console.error("Save error:", err);
                alert("Failed to update project. Check console for details.");
            }

            editingId = null;
            loadProjects();
        }

        function cancelEdit(){
            editingId = null;
            loadProjects();
        }

        window.onload = loadProjects;
    </script>
</head>
<body>
    <h1>Admin Panel</h1>

    <section id="add-project">
        <h2>Add Project</h2>
        <form id="add-form" onsubmit="event.preventDefault(); addProject();">
            <input name="name" placeholder="Name"  required> <br><br>
            <input name="description" placeholder="Description" required><br><br>
            <input name="skills" placeholder="Skills" required><br><br>
            <input name="platforms" placeholder="Platforms" required><br><br>
            <input name="url" placeholder="URL" required><br><br>
            <input name="image" placeholder="Image Path" required><br><br>
            <input name="video" placeholder="Video Path" required><br><br>
            <button type="submit">Add</button><br><br>
        </form>
    </section>

    <section id="list-projects">
        <h2>Existing Projects</h2>
   <table id="projects-table" style="width: 100%; table-layout: fixed; border-collapse: collapse;">
  <colgroup>
    <col style="width: 30px; height: 50px;">   <!-- proID -->
    <col style="width: 120px;">  <!-- name -->
    <col style="width: 220px;">  <!-- description -->
    <col style="width: 150px;">  <!-- skills -->
    <col style="width: 140px;">  <!-- platforms -->
    <col style="width: 150px;">  <!-- url -->
    <col style="width: 100px;">  <!-- image -->
    <col style="width: 100px;">  <!-- video -->
    <col style="width: 100px;">  <!-- actions -->
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Skills</th>
      <th>Platforms</th>
      <th>URL</th>
      <th>Image</th>
      <th>Video</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

    </section>
</body>
</html>
