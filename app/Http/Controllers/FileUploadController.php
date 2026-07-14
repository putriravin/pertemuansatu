<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Tampilkan form upload file.
     */
    public function showUploadForm()
    {
        return view('upload');
    }

    /**
     * Simpan file yang diupload ke storage.
     * Tugas 1: Validasi hanya jpg/jpeg/png, max 2MB.
     */
    public function storeFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
        ], [
            'file.required'  => 'Pilih file terlebih dahulu.',
            'file.mimes'     => 'File harus berformat JPG, JPEG, atau PNG.',
            'file.max'       => 'Ukuran file tidak boleh lebih dari 2MB.',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $path = $file->store('uploads', 'public');

        return back()->with('success', 'File berhasil diupload!')->with('file', $path)->with('filename', $originalName);
    }

    /**
     * Tugas 2: Tampilkan daftar semua file yang sudah diupload.
     */
    public function listFiles()
    {
        $files = Storage::disk('public')->files('uploads');
        return view('file_list', compact('files'));
    }

    /**
     * Tugas 3: Hapus file dari storage.
     */
    public function deleteFile($filename)
    {
        Storage::disk('public')->delete('uploads/' . $filename);
        return back()->with('success', 'File "' . $filename . '" berhasil dihapus!');
    }
}
