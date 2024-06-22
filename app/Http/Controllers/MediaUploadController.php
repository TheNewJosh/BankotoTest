<?php

namespace App\Http\Controllers;

use App\Models\MediaUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaUploadController extends Controller
{
    public function index()
    {
        return view('mediaCreate');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'media_upload' => 'required|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx', // Validate file type
        ]);

        // Store the uploaded file
        $filePath = $request->file('media_upload')->store('media_uploads', 'public');

        $validatedData['media_upload'] = $filePath;

        $mediaUpload = MediaUpload::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'media_upload' => $filePath,
        ]);

        return redirect()->back()->with('status', 'Save');
    }

    public function show($id)
    {
        $data = MediaUpload::find($id);
        return view('mediaEdit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'media_upload' => 'sometimes|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx', // Validate file type
        ]);

        $mediaUpload = MediaUpload::find($request->id);

        // Handle file upload
        if ($request->hasFile('media_upload')) {
            // Delete the old file if exists
            if ($mediaUpload->media_upload) {
                Storage::disk('public')->delete($mediaUpload->media_upload);
            }

            // Store the new file
            $filePath = $request->file('media_upload')->store('media_uploads', 'public');

            $mediaUpload->update([
                'media_upload' => $filePath,
            ]);
        }

        $mediaUpload->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        return redirect()->back()->with('status', 'Save');
    }

    public function destroy($id)
    {
        $mediaUpload = MediaUpload::find($id);
        // Delete the file
        if ($mediaUpload->media_upload) {
            Storage::disk('public')->delete($mediaUpload->media_upload);
        }

        $mediaUpload->delete();

        return redirect()->back()->with('status', 'Deleteted');
    }
}
