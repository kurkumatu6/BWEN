document.addEventListener("DOMContentLoaded", () => {
  let specs = document.querySelector("[name='model_id']");
  // console.log(specs);

  //функция спецы по услуге
  async function getServicesBySpec(servId) {
    //формируем параметр запроса
    let parameter = new URLSearchParams();
    parameter.append("serv_id", JSON.stringify(servId));

    let services = await getData("/app/tables/autos/search.btn.php", parameter);

    outOnPange(services);
    console.log(services);
  }
  //вывод спецов на странице функция
  function outOnPange(arr) {
    specs.innerHTML = "";
    arr.forEach((item) => {
      specs.insertAdjacentHTML("beforeend", getOneCard(item));
    });
  }
  //формирование 1 карточки
  function getOneCard({ id, name }) {
    return `<option value="${id}">${name}</option>`;
  }

  let service = document.querySelector(".brandSelect");
  console.log(service);
  service.addEventListener("change", async () => {
    console.log(service);
    let serv_id = service.value;

    await getServicesBySpec(serv_id);

    // let spec_id = specs.value;
    // await getDatesBySpec(spec_id);
  });
});
