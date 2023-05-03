<div class="Admin-container">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/header.admin.php'; ?>

<form action="/app/admin/tables/update.role.php" class="updateProduct" method="POST" enctype="multipart/form-data">

    <label for="role">Роль: <select name="role_id" class="form-control" id="">
            <?php foreach ($roles as $role) : ?>
                <option name="role_id" value="<?= $role->id ?>"> <?= $role->name ?></option>
                <!-- <option value="<?= $role->id ?>"> <?= $role->name ?></option> -->
            <?php endforeach ?>
            <input hidden type="number" name="id" value="<?= $users->id ?>">

        </select> </label>
    <button class="button" name="saveBtn">Сохранить</button>
</form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>