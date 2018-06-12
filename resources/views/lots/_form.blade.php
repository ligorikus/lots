<form id="lotsform">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title: </label>
        <input type="text" name="title" />
        <span id="title" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="description">Description: </label>
        <input type="text" name="description" />
        <span id="description" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="start_price">Start price: </label>
        <input type="number" name="start_price" />
        <span id="start_price" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="step">Step: </label>
        <input type="number" name="step" />
        <span id="step" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="blitz">Blitz: </label>
        <input type="number" name="blitz" />
        <span id="blitz" class="text-danger"></span>
    </div>
    <div class="form-group">
        <button class="btn btn-theme margintop10 pull-left" type="submit">Отправить</button>
    </div>
</form>