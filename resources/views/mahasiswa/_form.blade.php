<div style="margin-bottom: 16px;">
    <label for="nama" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Nama Lengkap:</label>
    <input type="text" name="nama" id="nama" style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;" value="{{ old('nama', $mahasiswa->nama ?? '') }}" placeholder="Masukkan nama lengkap">
    @error('nama') <span style="color: #d93025; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
</div>

<div style="margin-bottom: 16px;">
    <label for="nim" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">NIM:</label>
    <input type="text" name="nim" id="nim" style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;" value="{{ old('nim', $mahasiswa->nim ?? '') }}" placeholder="Masukkan Nomor Induk Mahasiswa">
    @error('nim') <span style="color: #d93025; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
</div>

<div style="margin-bottom: 24px;">
    <label for="alamat" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Alamat:</label>
    <textarea name="alamat" id="alamat" rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;" placeholder="Masukkan alamat lengkap">{{ old('alamat', $mahasiswa->alamat ?? '') }}</textarea>
    @error('alamat') <span style="color: #d93025; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
</div>
