<fieldset>

    <!-- Form Name -->
    <legend>Planet Form</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="PlanetName">Planet Name</label>
        <div class="col-md-4">
            <input id="PlanetName" name="PlanetName" type="text" placeholder="Earth" class="form-control input-md" required="">
            <span class="help-block">Name of the planets need to be unique</span>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="PosX">X Position</label>
        <div class="col-md-4">
            <input id="PosX" name="PosX" type="text" placeholder="0" class="form-control input-md" required="">
            <span class="help-block">A positive integer</span>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="PosY">Y Position</label>
        <div class="col-md-4">
            <input id="PosY" name="PosY" type="text" placeholder="0" class="form-control input-md" required="">
            <span class="help-block">Must Be a positive integer</span>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="PosZ">Z Position</label>
        <div class="col-md-4">
            <input id="PosZ" name="PosZ" type="text" placeholder="0" class="form-control input-md" required="">
            <span class="help-block">Must be a positive integer</span>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="Desc">Planet Description</label>
        <div class="col-md-4">
            <textarea class="form-control" id="Desc" name="Desc">A short description of the planet</textarea>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="Alignment">Faction Alignment</label>
        <div class="col-md-4">
            <select id="Alignment" name="Alignment" class="form-control">
                <option value="Alliance">Alliance</option>
                <option value="Pirates">Pirates</option>
                <option value="Rebels">Rebels</option>
                <option value="Imperial">Imperial</option>
                <option value="Free Worlds">Free Worlds</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="Action">Select One</label>
        <div class="col-md-4">
            <select id="Action" name="Action" class="form-control">
                <option value="Search">Search</option>
                <option value="Insert">Add</option>
                <option value="Update">Update</option>
            </select>
        </div>
    </div>
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="Submit">Submit</label>
        <div class="col-md-4">
            <input id="submit" name="Submit" class="btn btn-primary" type="submit"></input>
        </div>
    </div>
    <div class="name"></div>
    <input type="hidden" value=1 name="sneaky"></input>
</fieldset>