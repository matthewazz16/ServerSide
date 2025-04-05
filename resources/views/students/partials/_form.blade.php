@csrf
<div class="mb-3">
    <label class="form-label">Student Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control" value="{{ old('dob', $student->dob ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">College</label>
    <select name="college_id" class="form-select" required>
        <option value="">-- Select College --</option>
        @foreach($colleges as $college)
            <option value="{{ $college->id }}"
                {{ (old('college_id', $student->college_id ?? '') == $college->id) ? 'selected' : '' }}>
                {{ $college->name }}
            </option>
        @endforeach
    </select>
</div>
