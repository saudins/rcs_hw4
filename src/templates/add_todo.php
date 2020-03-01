<ul class='collapsible' data-collapsible='accordion'>
    <li>
        <div class="collapsible-header">
            <i class = "material-icons">playlist_add</i>Add New To-Do</div>
            <div class="collapsible-body">
                <span>
                    <form action="index.php" method="POST">

                    <label for="summary">Summary</label>
                    <input type="text" name="summary" required>

                    <label for="description">Description</label>
                    <input type="text" name="description" required>

                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" required min="2020-02-24">

                    <button type="submit" name="addBtn" class="waves-effect waves-light btn">ADD NEW TODO!</button>

                    </form>
                </span>
        </div>
    </li>
</ul>