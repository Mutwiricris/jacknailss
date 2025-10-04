<?php

require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Testing Service Creation Process ===\n\n";

// 1. Check if we can access the controller
echo "1. Testing AdminController instantiation...\n";
try {
    $controller = new AdminController();
    echo "✅ AdminController created successfully\n\n";
} catch (Exception $e) {
    echo "❌ Error creating AdminController: " . $e->getMessage() . "\n";
    exit(1);
}

// 2. Test service creation without image first
echo "2. Testing service creation without image...\n";
try {
    // Create a mock request
    $request = Request::create('/admin/services', 'POST', [
        'name' => 'Test Service ' . time(),
        'description' => 'This is a test service created programmatically',
        'price' => 2500.00,
        'duration_minutes' => 60,
        'is_popular' => 1
    ]);
    
    // Add CSRF token
    $request->session()->put('_token', 'test-token');
    $request->headers->set('X-CSRF-TOKEN', 'test-token');
    
    // Authenticate as admin user
    $admin = User::where('email', 'admin@jacknails.co.ke')->first();
    if (!$admin) {
        echo "❌ Admin user not found\n";
        exit(1);
    }
    
    Auth::login($admin);
    echo "✅ Authenticated as: " . $admin->name . "\n";
    
    // Test the service creation
    $response = $controller->serviceStore($request);
    echo "✅ Service creation completed\n";
    
    // Check if service was created
    $latestService = Service::latest()->first();
    echo "✅ Latest service: " . $latestService->name . " (ID: " . $latestService->id . ")\n\n";
    
} catch (Exception $e) {
    echo "❌ Error creating service: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n\n";
}

// 3. Test image upload functionality
echo "3. Testing image upload functionality...\n";
try {
    // Create a simple test image
    $testImagePath = '/tmp/test_service_image.jpg';
    
    // Create a simple colored image using GD if available
    if (extension_loaded('gd')) {
        $img = imagecreate(400, 300);
        $bg = imagecolorallocate($img, 100, 150, 200);
        $textColor = imagecolorallocate($img, 255, 255, 255);
        imagestring($img, 5, 150, 140, 'TEST IMAGE', $textColor);
        imagejpeg($img, $testImagePath, 90);
        imagedestroy($img);
        echo "✅ Test image created at: $testImagePath\n";
    } else {
        // Create a minimal JPEG file manually
        $jpegHeader = "\xFF\xD8\xFF\xE0\x00\x10JFIF\x00\x01\x01\x01\x00H\x00H\x00\x00\xFF\xDB\x00C\x00\x08\x06\x06\x07\x06\x05\x08\x07\x07\x07\t\t\x08\n\x0C\x14\r\x0C\x0B\x0B\x0C\x19\x12\x13\x0F\x14\x1D\x1A\x1F\x1E\x1D\x1A\x1C\x1C $.' \",#\x1C\x1C(7),01444\x1F'9=82<.342\xFF\xC0\x00\x11\x08\x00\x01\x00\x01\x01\x01\x11\x00\x02\x11\x01\x03\x11\x01\xFF\xC4\x00\x14\x00\x01\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x08\xFF\xC4\x00\x14\x10\x01\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\xFF\xDA\x00\x0C\x03\x01\x00\x02\x11\x03\x11\x00\x3F\x00\xAA\xFF\xD9";
        file_put_contents($testImagePath, $jpegHeader);
        echo "✅ Minimal test image created at: $testImagePath\n";
    }
    
    // Create an UploadedFile instance
    $uploadedFile = new UploadedFile(
        $testImagePath,
        'test_service_image.jpg',
        'image/jpeg',
        null,
        true
    );
    
    // Create request with image
    $request = Request::create('/admin/services', 'POST', [
        'name' => 'Test Service with Image ' . time(),
        'description' => 'This is a test service with an uploaded image',
        'price' => 3000.00,
        'duration_minutes' => 90,
        'is_popular' => 0
    ]);
    
    $request->files->set('image', $uploadedFile);
    $request->session()->put('_token', 'test-token');
    
    // Test the service creation with image
    $response = $controller->serviceStore($request);
    echo "✅ Service with image creation completed\n";
    
    // Check if service was created with image
    $latestService = Service::latest()->first();
    echo "✅ Latest service with image: " . $latestService->name . " (ID: " . $latestService->id . ")\n";
    echo "✅ Image path: " . ($latestService->image ?: 'No image') . "\n";
    echo "✅ Image URL: " . $latestService->image_url . "\n";
    
    // Check if image file exists in storage
    if ($latestService->image && \Storage::disk('public')->exists($latestService->image)) {
        echo "✅ Image file exists in storage\n";
    } else {
        echo "❌ Image file not found in storage\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error testing image upload: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}

echo "\n=== Test Complete ===\n";
