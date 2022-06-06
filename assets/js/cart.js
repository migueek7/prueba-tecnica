"use strict";

const params = new URLSearchParams(location.search);

document.addEventListener("DOMContentLoaded", () => {
  //   console.log(sessionStorage.getItem("orders"));

  const itemCartTemplate = document.querySelector("#itemCartTemplate");

  if (sessionStorage.getItem("orders")) {
    console.log("todo bien");
    const orders = JSON.parse(sessionStorage.getItem("orders"));
    const tableCart = document.querySelector("#tableCart");

    const fragment = document.createDocumentFragment();

    const ItemFiltrado = orders.filter(
      (element) => element.number == params.get("order")
    );
    console.log(ItemFiltrado);

    let Subtotal = 0;
    let Descuento = 0;
    let Total = 0;
    let Cantidad = 0;
    let Calculo = 0;
    ItemFiltrado[0].items.forEach((element) => {
      console.log(element);
      const clone = itemCartTemplate.content.firstElementChild.cloneNode(true);
      clone.querySelector(".sku").textContent = element.sku;
      clone.querySelector(".quantity").textContent = element.quantity;
      clone.querySelector(".name").textContent = element.name;
      clone.querySelector(".price").textContent = element.price;
      fragment.appendChild(clone);

      Cantidad = Number(element.quantity);
      Descuento += parseFloat(Number(element.discount));
      Calculo = parseFloat(Number(element.price) * Cantidad);
      Subtotal += parseFloat(Calculo);
    });
    console.log(Cantidad);
    Subtotal = Subtotal.toFixed(2);
    console.log(Subtotal);
    Descuento = Descuento.toFixed(2);
    Total = (Subtotal - Descuento).toFixed(2);
    tableCart.appendChild(fragment);

    document.querySelector(".subtotal").textContent = "$ " + Subtotal;
    document.querySelector(".descuento").textContent = "$ " + Descuento;
    document.querySelector(".total").textContent = "$ " + Total;
  } else {
    console.log("todo mal");
    window.location.href = "/";
  }
});
