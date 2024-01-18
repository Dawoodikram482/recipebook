<?php include __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <div class="p-4 rounded">
        <h1 class="mb-3">Welcome to Taste Book</h1>
        <h3 class="mb-4">You can search recipes by entering name of category</h3>
        <p>Categories: </p>
        <ol><li>Breakfast</li>
            <li>Lunch</li>
            <li>Dinner</li>
        <form>
            <div class="mb-3">
                <label for="searchCategory" class="form-label">Categrories</label>
                <input type="text" class="form-control" id="searchCategory" placeholder="Enter Category">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="posts-grid mt-4">
    </div>
</div>
<?php include __DIR__ .'/footer.php'; ?>
