<template id="orderTemplate">
    <tr class="item">
        <td class="number" scope="col"></td>
        <td class="subtotal" scope="col"></td>
        <td class="total" scope="col"></td>
        <td class="action" scope="col">
            <a href="" class="btn btn-sm btn-primary btnDetails">
                <i class="fa-solid fa-eye disabled"></i>
            </a>
            <button type="button" class="btn btn-sm btn-success btnAdd" data-bs-toggle="modal"
                data-bs-target="#modalAddProduct" number="">
                <i class="fa-solid fa-plus disabled"></i>
            </button>
        </td>
    </tr>
</template>