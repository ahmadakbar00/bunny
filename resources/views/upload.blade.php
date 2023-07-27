<!-- resources/views/uploadVideo.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Upload Video</title>
</head>
<body>
    <h1>Form Upload Video</h1>
    <!-- <form action="/api/upload-vidio/99484876-1ba7-48dc-a050-642abe5cea46" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="video">Select Video File:</label>
        <input type="file" id="video" name="video" accept="video/*" required>
        <br>
        <button type="submit">Upload</button>
    </form> -->

    <!-- <form action="/videos/store" method="post"> -->
    <form action="/api/simple-upload-vidio" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}">

    <label for="publish_status">Publish Status:</label>
    <input type="text" name="publish_status" id="publish_status" value="{{ old('publish_status') }}">

    <label for="last_activity_date">Last Activity Date:</label>
    <input type="date" name="last_activity_date" id="last_activity_date" value="{{ old('last_activity_date') }}">

    <label for="image">Image:</label>
    <input type="text" name="image" id="image">

    <label for="rating">Rating:</label>
    <input type="number" name="rating" id="rating" value="{{ old('rating') }}">

    <label for="total_views">Total Views:</label>
    <input type="number" name="total_views" id="total_views" value="{{ old('total_views') }}">

    <label for="size">Size:</label>
    <input type="text" name="size" id="size" value="{{ old('size') }}">

    <label for="created_by">Created By:</label>
    <input type="text" name="created_by" id="created_by" value="{{ old('created_by') }}">

    <label for="active">Active:</label>
    <input type="checkbox" name="active" id="active" {{ old('active') ? 'checked' : '' }}>

    <label for="video">Select Video File:</label>
    <input type="file" id="video" name="video" accept="video/*" required>

    <button type="submit">Submit</button>
</form>

</body>
</html>
