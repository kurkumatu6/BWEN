<div class="Admin-container">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>
<div>
    <form action="/app/admin/tables/admin.auto.update.php" class="updateProduct" method="POST" enctype="multipart/form-data">
        <label for="model">Выберите модель: <select name="model_id" class="form-control" id="">
                <?php foreach ($models as $model) : ?>
                    <option value="<?= $model->id ?>" <?= $model->id == $autos->model_id ? 'selected' : ' ' ?>><?= $model->name ?></option>
                <?php endforeach ?>
            </select> </label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="price">Введите цену: <input type="text" class="form-control" name="price" value="<?= $autos->price ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="count">Введите кол-во: <input type="text" class="form-control" name="count" value="<?= $autos->count ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="year">Введите год: <input type="text" class="form-control" name="year" value="<?= $autos->year ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="country">Введите страну: <input type="text" class="form-control" name="country" value="<?= $autos->country ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="power">Введите мощность: <input type="text" class="form-control" name="power" value="<?= $autos->power ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="volume">Введите объем бака: <input type="text" class="form-control" name="volume" value="<?= $autos->volume ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="speed">Введите скорость: <input type="text" class="form-control" name="speed" value="<?= $autos->speed ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="weight">Введите массу: <input type="text" class="form-control" name="weight" value="<?= $autos->weight ?>"></label>
        <input type="hidden" class="form-control" name="id" value="<?= $autos->id ?>">
        <label for="consumption">Введите расход: <input type="text" class="form-control" name="consumption" value="<?= $autos->consumption ?>"></label>

        <label for="color">Выберите цвет: <select name="color_id" class="form-control" id="">
                <?php foreach ($colors as $color) : ?>
                    <option value="<?= $color->id ?>" <?= $color->id == $autos->color_id ? 'selected' : ' ' ?>> <?= $color->name ?></option>
                <?php endforeach ?>
            </select> </label>
        <label for="type_color">Выберите тип покрытия: <select name="type_color_id" class="form-control" id="">
                <?php foreach ($type_colors as $type) : ?>
                    <option value="<?= $type->id ?>" <?= $type->id == $autos->type_color_id ? 'selected' : ' ' ?>><?= $type->type ?></option>
                <?php endforeach ?>
            </select></label>
        <label for="class">Выберите класс: <select name="class_id" class="form-control" id="">
                <?php foreach ($classes as $class) : ?>
                    <option value="<?= $class->id ?>" <?= $class->id == $autos->class_id ? 'selected' : ' ' ?>><?= $class->name ?></option>
                <?php endforeach ?>
            </select></label>
        <label for="body">Выберите кузов: <select name="body_id" class="form-control" id="">
                <?php foreach ($bodies as $body) : ?>
                    <option value="<?= $body->id ?>" <?= $body->id == $autos->body_id ? 'selected' : ' ' ?>><?= $body->name ?></option>
                <?php endforeach ?>
            </select></label>
        <label for="gearbox">Выберите коробку передач: <select name="gearbox_id" class="form-control" id="">
                <?php foreach ($gearboxes as $gearbox) : ?>
                    <option value="<?= $gearbox->id ?>" <?= $gearbox->id == $autos->gearbox_id ? 'selected' : ' ' ?>><?= $gearbox->name ?></option>
                <?php endforeach ?>
            </select></label>
        <button class="button" name="saveBtn" for="image" value="<?= $autos->id ?>">Сохранить</button>
    </form>
    </div>
</div>
<script src="/assets/js/loadImg.js" defer></script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>