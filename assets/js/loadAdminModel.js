document.addEventListener("DOMContentLoaded", () => {
  let productsContainer = document.querySelector(".model-container-admin");
  let categoryElements = document.querySelectorAll("[name='category']");
  let countProduct = document.querySelector(".count-products");
  let products = [];

  //загружаем все карточки с товарами
  getProducts("all");
  // при выборе категории будем подгружать их товары
  categoryElements.forEach((item) => {
    item.addEventListener("change", async (event) => {
      //коллекцию флажков преобразовали в массив и нашли только включенные, а потом достали их значения
      document.getElementById('all').checked = false
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

    products = await getData("/app/admin/tables/admin.search.check.model.php", param);
    //выведем полученные данные на страницу
    outOnPage(products);
  }
  //
  function outOnPage(products) {
    productsContainer.innerHTML = ``;
    products.forEach((item) => {
      productsContainer.insertAdjacentHTML("beforeend", createCard(item));
    });

    // countProduct.textContent = `найдено ${products.length} шт.`;
  }
  //
  //создаем карточку товара
  function createCard({ id, image, brand, name, description }) {
    return `<div class="admin">
    <div class="admin-p">
        <img class="image-admin" src="/upload/models/${image}" alt="${image}" >
        <p class="p-admin">${brand}</p>
        <p class="p-admin pp">${name}</p>
        <p class="p-admin">${description}</p>
       

        <td><a href="/app/admin/tables/in.models.php?id=${id}" class="btn">просмотр</a></td>
        <td><a href="/app/admin/tables/admin.model.php?id=${id}" data-id="${id}" class="btn">X</a></td>
        </div>
        </div>`;
  }

  document.addEventListener("click", async (e) => {
    if (e.target.classList.contains("btn")) {
      id = e.target.dataset.id;

      let response = await fetch("/app/admin/tables/admin.delete.model.php", {
        method: "POST",
        headers: { "Content-Type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ id }),
      });
      await getData("/app/admin/tables/admin.delete.model.php", id);
      e.target.closest(".model-container-admin").remove();
    }
  });
});
