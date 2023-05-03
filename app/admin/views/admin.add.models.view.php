<div class="Admin-container">
    <div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>
    </div>
    <div><br>
        <form action="/app/admin/tables/admin.add.models.php" class="createCategory" method="POST" enctype="multipart/form-data">
            <div class="createSelect">
            <div>
                <label for="name">Введите модель: <input type="text" class="form-control" name="name"></label>
                <label for="price">Введите описание: <input type="text" class="form-control" name="description"></label>
                <label for="image">Введите картинку: <input type="file" class="form-control" name="image"></label>
                <label for="category">Выберите бренд: <select name="brand_id" class="form-control" id="">
                        <?php foreach ($brands as $brand) : ?>
                            <option value="<?= $brand->id ?>"> <?= $brand->name ?></option>
                        <?php endforeach ?>
                    </select> </label>
            </div>
            <div  class="createBtn">
                <button class="buttonModels" name="InsertBtn" for="image">Добавить</button>
            </div>
            </div>
        </form>
    </div>
</div><br>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>