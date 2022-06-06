"use strict";

document.addEventListener("DOMContentLoaded", () => {


    const requestOptionsConfig = () => {
        let myHeaders = new Headers();
        myHeaders.append(
            "Authorization",
            "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJwUGFINU55VXRxTUkzMDZtajdZVHdHV3JIZE81cWxmaCIsImlhdCI6MTYyMDY2Mjk4NjIwM30.lhfzSXW9_TC67SdDKyDbMOYiYsKuSk6bG6XDE1wz2OL4Tq0Og9NbLMhb0LUtmrgzfWiTrqAFfnPldd8QzWvgVQ"
        );
        let requestOptions = {
            method: "GET",
            headers: myHeaders,
        };
        return requestOptions;
    };

    const getData = async () => {
        const List = document.querySelector("#list");
        const requestOptions = requestOptionsConfig();

        try {
            const request = await fetch(
                "https://eshop-deve.herokuapp.com/api/v2/orders",
                requestOptions
            );

            if (!request.ok) throw respuesta;

            List.innerHTML = "";
            const orderTemplate = document.querySelector("#orderTemplate");
            const fragment = document.createDocumentFragment();
            let data;
            if (!sessionStorage.getItem("orders")) {
                data = await request.json();
                data = data.orders;
            } else {
                data = JSON.parse(sessionStorage.getItem("orders"));
            }
            const clickItem = (e) => getDetails(e);

            const Orders = [];
            data.forEach((element) => {
                const clone = orderTemplate.content.firstElementChild.cloneNode(true);
                clone
                    .querySelector(".btnDetails")
                    .setAttribute("number", element.number);
                clone.querySelector(".btnDetails").href =
                    "cart?order=" + element.number;
                clone.querySelector(".btnAdd").setAttribute("number", element.number);
                clone.querySelector(".btnDetails").setAttribute("order", element.id);
                clone.querySelector(".number").textContent = element.number;
                clone.querySelector(".subtotal").textContent = element.totals.subtotal;
                clone.querySelector(".total").textContent = element.totals.total;
                clone.addEventListener("click", clickItem);
                fragment.appendChild(clone);
                Orders.push(element);
            });
            console.log("Orders", Orders);
            sessionStorage.setItem("orders", JSON.stringify(Orders));
            List.appendChild(fragment);

            $("#tableOrder").DataTable();//Iniciar DataTable
        } catch (error) {
            console.log(error);
        }
    };

    getData();


    const getDetails = async (e) => {
        console.log(e.target);
        const id_number = e.target.getAttribute("number");

        document.getElementById("modalAddProductLabel").innerHTML =
            "Order #" + id_number + " - Add Product";
        document.getElementById("numberAdd").value = id_number;
    };


    const addProducto = () => {

        const btnSave = document.querySelector(".btnSave");
        btnSave.addEventListener("click", function (e) {
            e.preventDefault();

            const valida = validaFormulario();
            if (!valida) return false;

            const data = {
                id_number: document.getElementById("numberAdd").value.trim(),
                sku: document.getElementById("skuAdd").value.trim(),
                name: document.getElementById("nameAdd").value.trim(),
                quantity: document.getElementById("quantityAdd").value.trim(),
                price: document.getElementById("priceAdd").value.trim(),
                subtotal: document.getElementById("priceAdd").value.trim(),
                total: document.getElementById("priceAdd").value.trim(),
                discount: document.getElementById("discountAdd").value.trim(),
            };

            const orders = JSON.parse(sessionStorage.getItem("orders"));
            console.log('todo bien hasta aqui');

            orders.forEach((element, index) => {
                if (element.number === data.id_number) {

                    orders[index].items.push(data);
                    const truck_modal = document.querySelector('#modalAddProduct');
                    const modal = bootstrap.Modal.getInstance(truck_modal);
                    modal.hide();

                    Swal.fire({
                        title: '¡Producto Guardado!',
                        text: 'El productos ha sido guardado con exito.',
                        icon: 'success',
                        showCancelButton: true,
                        cancelButtonText: 'Cerrar',
                        confirmButtonText: 'Ver detalles',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.href = 'cart?order=' + data.id_number
                        }

                    });
                    return;
                }
            });
            sessionStorage.setItem("orders", JSON.stringify(orders));
        });
    }
    addProducto();


    const validaFormulario = () => {
        const inputs = document.querySelectorAll(`#formAddProduct input`);
        let bandera = 0;

        inputs.forEach(input => {
            if (input.value.trim() == '') {
                input.classList.add('is-invalid');
                console.log('formulario incompleto', input);
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                bandera++;
            }
        });
        if (bandera < 5) {
            return false;
        } else {
            return true;
        }
    }

});