<?php
if (isset($_FILES['image'])) {
    $uploadedFile = $_FILES['image'];
    $uploadDirectory = '../uploads/';

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $filename = uniqid('image_') . '.png';
    $filePath = $uploadDirectory . $filename;

    if (move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
        echo json_encode(['success' => true, 'message' => 'Image saved successfully.', 'filename' => $filename]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving image.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Image not provided in the POST data.']);
}
?>
