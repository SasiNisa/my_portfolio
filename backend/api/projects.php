<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-ADMIN-TOKEN");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

include '../includes/db.php';

// Simple admin check (for testing)
$writeMethods = ['POST','PUT','DELETE'];
if (in_array($_SERVER['REQUEST_METHOD'], $writeMethods)) {
    $authorized = true; // later replace with session/token check
    if (!$authorized) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }
}

$input = json_decode(file_get_contents('php://input'), true);

function getRequestId() {
    if (isset($_GET['proID'])) return intval($_GET['proID']);
    $body = json_decode(file_get_contents('php://input'), true);
    if (isset($body['proID'])) return intval($body['proID']);
    return null;
}

$method = $_SERVER['REQUEST_METHOD'];

try {
    if ($method === 'GET') {
        if (isset($_GET['proID'])) {
            $id = intval($_GET['proID']);
            $stmt = $conn->prepare("SELECT * FROM projects WHERE proID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result();
            $project = $res->fetch_assoc();
            echo json_encode($project ?: []);
            $stmt->close();
        } else {
            $result = $conn->query("SELECT * FROM projects ORDER BY proID ASC");
            $projects = [];
            while($row = $result->fetch_assoc()) $projects[] = $row;
            echo json_encode($projects);
        }
    }

    elseif ($method === 'POST') {
        $name = $input['name'] ?? '';
        $description = $input['description'] ?? '';
        $skills = $input['skills'] ?? '';
        $platforms = $input['platforms'] ?? '';
        $url = $input['url'] ?? '';
        $image = $input['image'] ?? '';
        $video = $input['video'] ?? '';

        $stmt = $conn->prepare("INSERT INTO projects (name, description, skills, platforms, url, image, video) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $description, $skills, $platforms, $url, $image, $video);

        if($stmt->execute()) echo json_encode(['status'=>'success','proID'=>$stmt->insert_id]);
        else { http_response_code(500); echo json_encode(['error'=>$stmt->error]); }

        $stmt->close();
    }

    elseif ($method === 'PUT') {
        $id = getRequestId();
        if (!$id) { http_response_code(400); echo json_encode(['error'=>'Missing proID']); exit; }

        $name = $input['name'] ?? '';
        $description = $input['description'] ?? '';
        $skills = $input['skills'] ?? '';
        $platforms = $input['platforms'] ?? '';
        $url = $input['url'] ?? '';
        $image = $input['image'] ?? '';
        $video = $input['video'] ?? '';

        $stmt = $conn->prepare("UPDATE projects SET name=?, description=?, skills=?, platforms=?, url=?, image=?, video=? WHERE proID=?");
        $stmt->bind_param("sssssssi",$name,$description,$skills,$platforms,$url,$image,$video,$id);
        if($stmt->execute()) echo json_encode(['status'=>'success','message'=>'Project updated']);
        else { http_response_code(500); echo json_encode(['error'=>$stmt->error]); }
        $stmt->close();
    }

    elseif ($method === 'DELETE') {
        $id = getRequestId();
        if (!$id) { http_response_code(400); echo json_encode(['error'=>'Missing proID']); exit; }

        $stmt = $conn->prepare("DELETE FROM projects WHERE proID=?");
        $stmt->bind_param("i",$id);
        if($stmt->execute()) echo json_encode(['status'=>'success','message'=>'Project deleted']);
        else { http_response_code(500); echo json_encode(['error'=>$stmt->error]); }
        $stmt->close();
    }
    else { http_response_code(405); echo json_encode(['error'=>'Method not allowed']); }
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
}

$conn->close();
?>
