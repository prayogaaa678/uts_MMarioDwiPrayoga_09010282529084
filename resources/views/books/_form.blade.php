<div class="row g-3">
    <div class="col-12">
        <label for="title" class="form-label">Judul</label>
        <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}"
               class="form-control @error('title') is-invalid @enderror" required>
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="author" class="form-label">Penulis</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}"
               class="form-control @error('author') is-invalid @enderror" required>
        @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label for="publisher" class="form-label">Penerbit</label>
        <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}"
               class="form-control @error('publisher') is-invalid @enderror" required>
        @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="year" class="form-label">Tahun terbit</label>
        <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" min="1000" max="{{ date('Y') }}"
               class="form-control @error('year') is-invalid @enderror" required>
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $book->stock) }}" min="0"
               class="form-control @error('stock') is-invalid @enderror" required>
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label for="category_id" class="form-label">Kategori</label>
        <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="" disabled @selected(! old('category_id', $book->category_id))>Pilih kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
