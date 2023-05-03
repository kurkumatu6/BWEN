<div class="Admin-container">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php';
    if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
        $_SESSION["error"] = "Вы не администратор";
        header("Location: /app/admin/tables/admin.auth.php");
        die();
    } ?>
    <div>
        <form action="/app/admin/tables/admin.add.php" class="addAutos " method="POST" enctype="multipart/form-data">
            <label for="brand">Выберите бренд: <select name="brand_id" class="form-control brandSelect" id="">
                    <?php foreach ($brands as $brand) : ?>
                        <option value="<?= $brand->id ?>"> <?= $brand->name ?></option>
                    <?php endforeach ?>
                </select> </label>
            <label for="model">Выберите модель: <select name="model_id" class="form-control" id="">
                    <?php foreach ($models as $model) : ?>
                        <option value="<?= $model->id ?>"> <?= $model->name ?></option>
                    <?php endforeach ?>
                </select> </label>
            <label for="price">Введите цену: <input type="number" class="form-control" name="price"></label>
            <label for="count">Введите кол-во: <input type="number" class="form-control" name="count"></label>
            <label for="year">Введите год: <input type="number" class="form-control" name="year"></label>
            <label for="image">Введите картинку: <input type="file" class="form-control" name="image"></label>
            <label for="country">Введите страну: <input type="text" class="form-control" name="country"></label>
            <label for="power">Введите мощность: <input type="number" class="form-control" name="power"></label>
            <label for="volume">Введите объем бака: <input type="number" class="form-control" name="volume"></label>
            <label for="speed">Введите скорость: <input type="number" class="form-control" name="speed"></label>
            <label for="weight">Введите массу: <input type="number" class="form-control" name="weight"></label>
            <label for="consumption">Введите расход: <input type="number" step="0.01" class="form-control" name="consumption"></label>
            <label for="color">Выберите цвет: <select name="color_id" class="form-control" id="">
                    <?php foreach ($colors as $color) : ?>
                        <option value="<?= $color->id ?>"> <?= $color->name ?></option>
                    <?php endforeach ?>
                </select> </label>
            <label for="type_color_id">Выберите тип покрытия: <select name="type_color_id" class="form-control" id="">
                    <?php foreach ($type_colors as $type) : ?>
                        <option value="<?= $type->id ?>"><?= $type->type ?></option>
                    <?php endforeach ?>
                </select></label>
            <label for="class_id">Выберите класс: <select name="class_id" class="form-control" id="">
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?= $class->id ?>"><?= $class->name ?></option>
                    <?php endforeach ?>
                </select></label>
            <label for="body_id">Выберите кузов: <select name="body_id" class="form-control" id="">
                    <?php foreach ($bodies as $body) : ?>
                        <option value="<?= $body->id ?>"><?= $body->name ?></option>
                    <?php endforeach ?>
                </select></label>
            <label for="gearbox_id">Выберите коробку передач: <select name="gearbox_id" class="form-control" id="">
                    <?php foreach ($gearboxes as $gearbox) : ?>
                        <option value="<?= $gearbox->id ?>"><?= $gearbox->name ?></option>
                    <?php endforeach ?>
                </select></label>
            <button class="button" name="InsertBtn" for="image">Добавить</button>
        </form>
    </div>
</div>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/select.js"></script>