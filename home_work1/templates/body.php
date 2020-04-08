
 <div class="container" >
    <form action="../create_tables.php" method="post">
      <button type="submit" class="btn btn-secondary btn-lg">Создать таблицу</button>
    </form>
 </div>

<div class="container ">


    <form  method="POST" action="../insert.php" name='create_user' id="for_form" >
        <div class="form-row">
            <div class="col-md-6">
                <label for="inputname">Имя</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder=""
                       id="inputname"
                       value=""
                       required
                >
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="inputsurname">Фамилия</label>
                <input type="text"
                       name="surname"
                       class="form-control"
                       placeholder=""
                       id="inputsurname"
                       value=""
                       required
                >
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <label for="inputage">Возраст</label>
                <input type="text"
                       name="age"
                       class="form-control"
                       placeholder=""
                       id="inputage"
                       value=""
                       required
                >
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="inpute-mail">E-mail</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder=""
                       id="inpute-mail"
                       value=""
                       required
                />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <label for="inputphone">Телефон</label>
                <input type="tel"
                       name="phone"
                       class="form-control"
                       placeholder=""
                       id="inputphone"
                       value=""
                       required
                >
            </div>
        </div>

        <input type="submit" name="register"  class="btn btn-primary">
    </form>
    <h2>Получить информацию о пользователе</h2>
    <form action="../getUserInfo.php" method="GET">
        <select name="user_id">
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user ?>">
                    <?php echo $user ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button>Получить</button>
    </form>

    <h2>Удалить пользователя</h2>
    <form action="../deleteUser.php" method="POST">
        <select multiple name="user_id[]">
            <?php foreach ($users as $user) : ?>
                <option value="<?php echo $user ?>">
                    <?php echo $user ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button>удалить</button>
    </form>
</div>