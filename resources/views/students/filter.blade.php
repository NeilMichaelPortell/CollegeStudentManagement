<form method="GET" action="{{ route('students.index') }}">
    <div class="form-group">
        <label for="college_filter">Filter by College</label>
                <!-- Dropdown to filter students by college, submits form on change -->
        <select id="college_filter" name="college_id" class="form-control" onchange="this.form.submit()">
            <option value="">All Colleges</option>
            @foreach($colleges as $college)
                <option value="{{ $college->id }}" {{ request('college_id') == $college->id ? 'selected' : '' }}>
                    {{ $college->name }}
                </option>
            @endforeach
        </select>
    </div>
</form>
