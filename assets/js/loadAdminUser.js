document.addEventListener("DOMContentLoaded", () => {
  let productsContainer = document.querySelector(".role-container-admin");
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

    products = await getData("/app/admin/tables/admin.search.check.role.php", param);
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
  function createCard({ id,role, name, surname, email }) {
    return `<div class="conteiner-role">
    <div class="">
            <p>${role} </p>
            <p>${name} ${surname}</p>
            <p>${email} </p>
            <div class="p-role">
            <p><a href="/app/admin/tables/role.php?id=${id}">✎</a></th>
            <p><a href="/app/admin/tables/admin.role.php?id=${id}" data-id="${id}" class="btn">X</a></th>
            </div>
            </div>
  </div>`;
  }

  document.addEventListener("click", async (e) => {
    if (e.target.classList.contains("btn")) {
      id = e.target.dataset.id;

      let response = await fetch("/app/admin/tables/admin.delete.user.php", {
        method: "POST",
        headers: { "Content-Type": "application/json;charset=UTF-8" },
        body: JSON.stringify({ id }),
      });
      await getData("/app/admin/tables/admin.delete.user.php", id);
      e.target.closest(".product-container-admin").remove();
    }
  });
});
