document.addEventListener("click", async (e) => {
  
    if (e.target.classList.contains("trash")) {
    id = e.target.dataset.id;
    let response = await fetch("/app/admin/tables/admin.model.delete.php", {
      method: "POST",
      headers: {"Content-Type": "application/json;charset=UTF-8",},
      body: JSON.stringify({ id }),
    });

    e.target.closest(".nameBtnModels").remove();

    await response.json();
  }
});
