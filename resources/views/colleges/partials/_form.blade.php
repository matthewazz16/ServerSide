@csrf
<div class="mb-3">
    <label class="form-label">College Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $college->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" name="address" class="form-control" value="{{ old('address', $college->address ?? '') }}" required>
</div>
