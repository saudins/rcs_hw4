<form action="index.php" method="POST">

<label for="summary">Summary</label>
<input type="text" name="summary" required>
<label for="description">Description</label>
<input type="text" name="description" required>
<label for="deadline">Deadline</label>
<input type="date" name="deadline" required min="2020-02-24">

<button type="submit" name="addBtn">ADD NEW TODO!</button>

</form>