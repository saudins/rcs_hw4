<form action='index.php' method='GET'>
    <ul class='collapsible'>
        <li>
            <div class='collapsible-header'><i class='material-icons'>search</i>Search a To-Do</div>
            <div class='collapsible-body'>
                <label for='summary'>Summary</label>
                <input class='todos-cell' type='text' name='search-sum' id ='search' onkeyup='enableSearch(); disableSearch();'></input>
                <button type='submit' name='searchBtn' id='searchBtn' class='waves-effect waves-teal btn' disabled>Search
                    <i class="material-icons right">send</i>
                </button>
                </form>
            </div>
        </li>
    </ul>
</form>