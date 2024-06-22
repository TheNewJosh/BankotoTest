<?php

namespace App\Http\Controllers;

use App\Models\MediaUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaUploadController extends Controller
{
    public function index()
    {
        return MediaUpload::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'media_upload' => 'required|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx', // Validate file type
        ]);

        // Store the uploaded file
        $filePath = $request->file('media_upload')->store('media_uploads', 'public');

        $validatedData['media_upload'] = $filePath;

        $mediaUpload = MediaUpload::create($validatedData);

        return response()->back()->with('status', 'Save');
    }

    public function show(MediaUpload $mediaUpload)
    {
        return $mediaUpload;
    }

    public function update(Request $request, MediaUpload $mediaUpload)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'sometimes|required|string|max:255',
            'media_upload' => 'sometimes|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx', // Validate file type
        ]);

        // Handle file upload
        if ($request->hasFile('media_upload')) {
            // Delete the old file if exists
            if ($mediaUpload->media_upload) {
                Storage::disk('public')->delete($mediaUpload->media_upload);
            }

            // Store the new file
            $filePath = $request->file('media_upload')->store('media_uploads', 'public');
            $validatedData['media_upload'] = $filePath;
        }

        $mediaUpload->update($validatedData);

        return response()->json($mediaUpload);
    }

    public function destroy(MediaUpload $mediaUpload)
    {
        // Delete the file
        if ($mediaUpload->media_upload) {
            Storage::disk('public')->delete($mediaUpload->media_upload);
        }

        $mediaUpload->delete();

        return response()->json(null, 204);
    }
}
