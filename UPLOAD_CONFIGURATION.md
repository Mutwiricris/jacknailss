# Image Upload Configuration - Updated to 10MB

## Changes Made

### 1. Livewire Component Updated
- **File**: `app/Livewire/Admin/ServiceManager.php`
- **Change**: Validation rule updated from `max:2048` to `max:10240` (10MB)
- **Error message**: Updated to "Image size cannot exceed 10MB"

### 2. AdminController Updated
- **File**: `app/Http/Controllers/AdminController.php`
- **Change**: All validation rules updated to `max:10240` (10MB)
- **Error handling**: Updated size check to 10MB limit

### 3. Frontend Updated
- **File**: `resources/views/livewire/admin/service-manager.blade.php`
- **Change**: UI text updated to show "up to 10MB" instead of "up to 2MB"

### 4. PHP Configuration Files Created

#### .htaccess (for Apache servers)
```apache
php_value upload_max_filesize 10M
php_value post_max_size 12M
php_value max_execution_time 300
php_value max_input_time 300
```

#### .user.ini (for shared hosting)
```ini
upload_max_filesize = 10M
post_max_size = 12M
max_execution_time = 300
max_input_time = 300
```

## Testing the Upload

1. **Navigate to**: `http://127.0.0.1:8000/admin/services`
2. **Click**: "Add Service" button
3. **Upload**: Try uploading an image larger than 2MB (up to 10MB)
4. **Verify**: The upload should work without errors

## Troubleshooting

If uploads still fail with large files:

1. **Check PHP-FPM configuration** (if using Nginx):
   ```
   client_max_body_size 10M;
   ```

2. **Check server error logs** for specific PHP errors

3. **Verify configuration is loaded**:
   ```bash
   php -i | grep upload_max_filesize
   ```

## Current Status

✅ **Laravel validation**: Updated to 10MB
✅ **Livewire component**: Updated to 10MB  
✅ **Frontend UI**: Updated to show 10MB limit
✅ **Error messages**: Updated to reflect 10MB limit
✅ **PHP configuration files**: Created for server-level limits

The system now supports image uploads up to **10MB** instead of the previous 2MB limit.
