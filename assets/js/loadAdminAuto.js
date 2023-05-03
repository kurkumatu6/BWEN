document.addEventListener("DOMContentLoaded", () => {
  let productsContainer = document.querySelector(".product-container-admin");
  let categoryElements = document.querySelectorAll("[name='category']");
  let countProduct = document.querySelector(".count-products");
  let products = [];

  //загружаем все карточки с товарами
  getProducts("all");
  // при выборе категории будем подгружать их товары
  categoryElements.forEach((item) => {
    item.addEventListener("change", async (event) => {
      document.getElementById('all').checked = false
      //коллекцию флажков преобразовали в массив и нашли только включенные, а потом достали их значения
      let checkedCategories = [...categoryElements]
        .filter((item) => item.checked)
        .map((item) => item.value);
      await getProducts(checkedCategories);
    });
  });

  //создаем функцию для загрузки данных
  async function getProducts(categories) {
    //формируем параметр
    const param = new URLSearchParams();
    param.append("category", JSON.stringify(categories));

    // const param = new URLSearchParams({categories: JSON.stringify(categories)});

    products = await getData("/app/admin/tables/admin.search.check.php", param);
    //выведем полученные данные на страницу
    outOnPage(products);
  }
  //
  function outOnPage(products) {
    productsContainer.innerHTML = ``;
    products.forEach((item) => {
      productsContainer.insertAdjacentHTML("beforeend", createCard(item));
    });

    countProduct.textContent = `найдено ${products.length} шт.`;
  }
  //
  //создаем карточку товара
  function createCard({ id, model,imageAuto, price, count, color, year, power, volume, speed, weight, consumption, body}) {
    return `<div class="inModelsAuto">
    <div class="model">
        <img src="/upload/autoAll/${imageAuto}" alt="${imageAuto}" class="auto">
        <h4>Модель: ${model}</h4>
        <p style="color: #3c6d41;">${body}</p>
    </div>
    <div class="price">
        <h4>${price} ₽</h4>
        <p>Кол-во: ${count}</p>
        <p>Год: ${year}</p>
        <p>Цвет: ${color}</p>
    </div>
    <div class="xarak">
        <h5>Предоставляемые характеристики:</h5>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Мощность: от ${power} л.с</p>
        </div>

        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Объем бака: ${volume} литров</p>
        </div>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Скорость: до ${speed} км/ч</p>
        </div>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Масса: ${weight} кг</p>
        </div>
        <div class="characteristics">
            <img class="arrow" src="/upload/icons/Arrow.png" alt="">
            <p>Расход: ${consumption} л на 100 км</p>
        </div>
    </div>
    <div>
    <td><a href="/app/admin/tables/admin.show.php?id=${id}" class="update">изменить</a></th>
    <td><a href="/app/admin/tables/admin.autos.php?id=${id}" data-id="${id}" class="btn">X</a></td>
    </div>
  </div><hr>
    `;
  }

  document.addEventListener("click", async (e) => {
    if (e.target.classList.contains("btn")) {
      id = e.target.dataset.id;

      let response = await fetch("/app/admin/tables/admin.delete.auto.php", {
        method: "POST",
        headers: { "Content-Type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ id }),
      });
      await getData("/app/admin/tables/admin.delete.auto.php", id);
      e.target.closest(".product-container-admin").remove();
    }
  });
});

