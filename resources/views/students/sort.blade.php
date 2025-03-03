<form method="GET" action="{{ route('students.index') }}">
    <input type="hidden" name="college_id" value="{{ request('college_id') }}">
    <div class="form-group">
        <label for="sort_order">Sort by Name</label>
        <select id="sort_order" name="sort_order" class="form-control" onchange="this.form.submit()">
            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>A to Z</option>
            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Z to A</option>
        </select>
    </div>
</form>