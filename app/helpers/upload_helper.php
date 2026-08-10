<?php

/**
 * Upload Helper Functions
 * 
 * Provides file upload and deletion utilities.
 */

/**
 * Upload a file and return the relative path
 *
 * @param string $fieldName    Form field name (e.g., 'profile_photo')
 * @param string $uploadPath   Folder inside public/uploads/ (e.g., 'profile')
 * @param string|null $oldFile Path to old file to delete (optional)
 * @param array $options       Optional settings [maxSize, allowedTypes]
 * @return array               ['success' => bool, 'path' => string|null, 'error' => string|null]
 */
function upload_file(string $fieldName, string $uploadPath, ?string $oldFile = null, array $options = []): array
{
    // No file uploaded
    if (empty($_FILES[$fieldName]['name']) || $_FILES[$fieldName]['error'] === UPLOAD_ERR_NO_FILE) {
        return [
            'success' => true,
            'path' => null,  // null means "no new file, keep existing"
            'error' => null
        ];
    }

    $file = $_FILES[$fieldName];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return [
            'success' => false,
            'path' => null,
            'error' => 'Upload failed with error code: ' . $file['error']
        ];
    }

    // Default options (SVG excluded: it can carry inline scripts and is a
    // stored-XSS vector)
    $maxSize = $options['maxSize'] ?? 2048 * 1024; // 2MB default in bytes
    $allowedTypes = $options['allowedTypes'] ?? ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];

    // Validate file type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);

    if (!in_array($mimeType, $allowedTypes)) {
        return [
            'success' => false,
            'path' => null,
            'error' => 'Invalid file type. Allowed: ' . implode(', ', $allowedTypes)
        ];
    }

    // Validate file size
    if ($file['size'] > $maxSize) {
        return [
            'success' => false,
            'path' => null,
            'error' => 'File size exceeds ' . ($maxSize / 1024 / 1024) . 'MB limit.'
        ];
    }

    // Create upload directory if not exists
    $baseDir = dirname(__DIR__, 2) . '/public/uploads/' . $uploadPath;
    if (!is_dir($baseDir)) {
        mkdir($baseDir, 0755, true);
    }

    // Generate unique filename
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = bin2hex(random_bytes(16)) . '.' . $ext;
    $targetPath = $baseDir . '/' . $newName;

    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        return [
            'success' => false,
            'path' => null,
            'error' => 'Failed to move uploaded file.'
        ];
    }

    // Delete old file if provided
    if ($oldFile) {
        delete_uploaded_file($oldFile);
    }

    return [
        'success' => true,
        'path' => 'uploads/' . $uploadPath . '/' . $newName,
        'error' => null
    ];
}

/**
 * Delete a file from uploads folder
 *
 * @param string|null $filePath Relative path to file
 * @return bool
 */
function delete_uploaded_file(?string $filePath): bool
{
    if (!$filePath) return false;

    $fullPath = dirname(__DIR__, 2) . '/public/' . $filePath;
    if (file_exists($fullPath)) {
        return unlink($fullPath);
    }
    return false;
}
