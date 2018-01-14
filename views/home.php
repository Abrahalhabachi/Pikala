<div id="home">
  <div class="bg-container">
            <div class=bg-text>
                <h2>Bike Sharing</h2>
                <p>Not <strong>quite</strong> exactly</br> what we mean</p>
            </div>
            <form action="<?=$_SERVER['PHP_SELF'].'?p=result';?>" method="post">
                <div class="bg-grid-container">
                <div class="bg-grid">
                <div>
                    <label for="place">City</label>
                    <input type="text" name="place" id="place" placeholder="where" required>
                </div>
                <div>
                    <label for="from">Starting</label>
                    <input type="datetime-local" name="datestart" id="from">
                </div>
                <div>
                    <label for="To">Until</label>
                    <input type="datetime-local" name="dateend" id="to">
                    <input id="search-button" type="submit" name="search" value="Search">
                </div>
        </div>
        </div>
        </form>

</div>